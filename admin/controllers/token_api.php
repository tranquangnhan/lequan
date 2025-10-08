<?php
class TokenApi {
    private $db;
    function __construct()
    {
        $this->model = new ModelTokenAPI();
       
    }

    public function saveFcmToken() {
        // Use site user session key `sid` (as your DB uses `user` table)
        if (!isset($_SESSION['sid'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            return;
        }

        $data = json_decode(file_get_contents('php://input'), true);
        if (!isset($data['fcm_token'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Token not provided']);
            return;
        }

    $result = $this->model->updateToken($_SESSION['sid'], $data['fcm_token']);

        echo json_encode(['success' => (bool)$result]);
    }

    public function removeFcmToken() {
        if (!isset($_SESSION['admin_id'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            return;
        }

        $result = $this->model->removeToken($_SESSION['admin_id']);

        echo json_encode(['success' => (bool)$result]);
    }
}