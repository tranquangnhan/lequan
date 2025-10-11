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
        $accessToken = $this->getAccessToken(FIREBASE_SERVICE_ACCOUNT_FILE);
       
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
                'webpush' => [
                    'notification' => [
                        'title' => $title,
                        'body' => $message,
                        'icon' => ROOT_URL . '/favicon.ico',
                    ],
                    'fcm_options' => [
                        'link' => ROOT_URL . '/admin/?ctrl=order'
                    ]
                ],
                'data' => $data
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
      
        return $results;
    }
    public function base64UrlEncode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    private function getAccessToken($credentialsFilePath) {
        // Đọc file JSON service account
        $credentials = json_decode(file_get_contents($credentialsFilePath), true);
        // print_r(1111);
        // exit();
        if (!$credentials) {
            throw new Exception('Không thể đọc file credentials.');
        }
        
        $now = time();
        $tokenPayload = [
            "iss" => $credentials["client_email"],
            "sub" => $credentials["client_email"],
            "aud" => "https://oauth2.googleapis.com/token",
            "iat" => $now,
            "exp" => $now + 3600,
            "scope" => "https://www.googleapis.com/auth/firebase.messaging"
        ];
        
        // Tạo header JWT
        $header = $this->base64UrlEncode(json_encode(["alg" => "RS256", "typ" => "JWT"]));
        $payload = $this->base64UrlEncode(json_encode($tokenPayload));
        $signatureInput = "$header.$payload";
        
        // Ký JWT bằng private key
        $privateKey = openssl_pkey_get_private($credentials["private_key"]);
        if (!$privateKey) {
            throw new Exception('Không thể load private key.');
        }
        openssl_sign($signatureInput, $signature, $privateKey, "SHA256");
        $signature = $this->base64UrlEncode($signature);
        
        $jwt = "$signatureInput.$signature";
        
        // Gửi request lấy access token
        $url = "https://oauth2.googleapis.com/token";
        $data = http_build_query([
            "grant_type" => "urn:ietf:params:oauth:grant-type:jwt-bearer",
            "assertion" => $jwt
        ]);
        
        $options = [
            "http" => [
                "header"  => "Content-Type: application/x-www-form-urlencoded",
                "method"  => "POST",
                "content" => $data
            ]
        ];
        
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
       
        $result = @file_get_contents($url, false, $context);

        if ($result === false) {
            $error = error_get_last();
            echo "❌ Request lỗi: " . ($error['message'] ?? 'Không rõ') . "\n\n";
            echo "Header phản hồi:\n";
            print_r($http_response_header ?? []);
            exit;
        }
   
        $response = json_decode($result, true);
     
        return $response['access_token'] ?? null;
    }
        // Hàm hỗ trợ base64Url encode
  
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

  
}