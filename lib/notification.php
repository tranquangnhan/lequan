<?php
require_once "../system/database.php";
require_once "../system/firebase-config.php";

class NotificationHelper {
    private $model;

    public function __construct() {
        require_once "../admin/models/admin.php";
        $this->model = new Model_admin();
    }

    public function sendToAdmins($title, $message, $data = []) {
        // Get all admin FCM tokens
        $tokens = $this->model->getAllAdminFcmTokens();
        
        if (empty($tokens)) {
            error_log("No admin FCM tokens found");
            return false;
        }
        $tokens = array_column($tokens, 'fcm_token');

        // obtain access token from service account
        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            error_log('Unable to obtain FCM access token');
            return false;
        }

        // FCM HTTP v1 endpoint: projects/{project_id}/messages:send
        // load project id from service account
        $serviceAccount = json_decode(file_get_contents(FIREBASE_SERVICE_ACCOUNT_FILE), true);
        if (!$serviceAccount || empty($serviceAccount['project_id'])) {
            error_log('Invalid service account file or missing project_id');
            return false;
        }
        $projectId = $serviceAccount['project_id'];
        $url = "https://fcm.googleapis.com/v1/projects/{$projectId}/messages:send";

        $headers = [
            'Authorization: Bearer ' . $accessToken,
            'Content-Type: application/json'
        ];

        $results = [];
        foreach ($tokens as $token) {
            $payload = [
                'message' => [
                    'token' => $token,
                    'notification' => [
                        'title' => $title,
                        'body' => $message
                    ],
                    'data' => $data,
                    'webpush' => [
                        'fcm_options' => ['link' => ROOT_URL . '/admin/?ctrl=order']
                    ]
                ]
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

            $result = curl_exec($ch);
            if ($result === false) {
                $err = curl_error($ch);
                error_log('Curl error sending FCM v1: ' . $err);
                curl_close($ch);
                $results[] = ['token' => $token, 'success' => false, 'error' => $err];
                continue;
            }

            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            $decoded = json_decode($result, true);
            if ($httpCode >= 200 && $httpCode < 300 && isset($decoded['name'])) {
                $results[] = ['token' => $token, 'success' => true, 'response' => $decoded];
            } else {
                error_log('FCM v1 send failed: HTTP ' . $httpCode . ' response: ' . $result);
                $results[] = ['token' => $token, 'success' => false, 'response' => $decoded, 'http' => $httpCode];
            }
        }
        print_r($results);
        exit();
        return $results;
    }

    private function getAccessToken() {
        // Simple file cache for access token
        $cacheFile = sys_get_temp_dir() . '/fcm_access_token.json';
        if (file_exists($cacheFile)) {
            $cached = json_decode(file_get_contents($cacheFile), true);
            if ($cached && isset($cached['expires']) && $cached['expires'] > time() + 30) {
                return $cached['access_token'];
            }
        }

        if (!file_exists(FIREBASE_SERVICE_ACCOUNT_FILE)) {
            error_log('Service account file not found: ' . FIREBASE_SERVICE_ACCOUNT_FILE);
            return false;
        }

        $sa = json_decode(file_get_contents(FIREBASE_SERVICE_ACCOUNT_FILE), true);
        if (!$sa) {
            error_log('Invalid service account JSON');
            return false;
        }

        $now = time();
        $claims = [
            'iss' => $sa['client_email'],
            'scope' => 'https://www.googleapis.com/auth/firebase.messaging https://www.googleapis.com/auth/cloud-platform',
            'aud' => 'https://oauth2.googleapis.com/token',
            'iat' => $now,
            'exp' => $now + 3600,
        ];

        // Create JWT
        $header = ['alg' => 'RS256', 'typ' => 'JWT'];
        $jwt = $this->jwtEncode($header, $claims, $sa['private_key']);

        // Exchange JWT for access token
        $ch = curl_init('https://oauth2.googleapis.com/token');
        $post = http_build_query([
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

        $result = curl_exec($ch);
        if ($result === false) {
            error_log('Curl error obtaining access token: ' . curl_error($ch));
            curl_close($ch);
            return false;
        }
        curl_close($ch);

        $decoded = json_decode($result, true);
        if (!$decoded || !isset($decoded['access_token'])) {
            error_log('Failed to obtain access token: ' . $result);
            return false;
        }

        $accessToken = $decoded['access_token'];
        $expiresIn = isset($decoded['expires_in']) ? intval($decoded['expires_in']) : 3600;

        file_put_contents($cacheFile, json_encode(['access_token' => $accessToken, 'expires' => time() + $expiresIn]));

        return $accessToken;
    }

    private function jwtEncode($header, $payload, $privateKey) {
        $segments = [];
        $segments[] = $this->base64UrlEncode(json_encode($header));
        $segments[] = $this->base64UrlEncode(json_encode($payload));
        $signing_input = implode('.', $segments);

        $signature = '';
        openssl_sign($signing_input, $signature, $privateKey, OPENSSL_ALGO_SHA256);
        $segments[] = $this->base64UrlEncode($signature);

        return implode('.', $segments);
    }

    private function base64UrlEncode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}