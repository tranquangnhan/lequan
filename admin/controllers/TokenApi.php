<?php
require_once "./models/Token_api.php";
class TokenApi {
    private $db;
    function __construct()
    {
        $this->model = new ModelTokenAPI();
       $act = "token_api";

        if(isset($_GET["act"])==true) $act = $_GET['act'];

        switch ($act) {
            case 'save':
                $this->saveFcmToken();
                break; 
        }

    }

    public function saveFcmToken() {
        // Use site user session key `sid` (as your DB uses `user` table)
        if (!isset($_SESSION['sid'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            return;
        }

        // Get raw POST data
        $rawData = file_get_contents('php://input');
        if (empty($rawData)) {
            // If raw data is empty, try $_POST
            $data = $_POST;
        } else {
            // Try to decode JSON data
            $data = json_decode($rawData, true);
        }
     
        if (empty($data) || !isset($data['fcm_token'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Token not provided']);
            return;
        }

        $result = $this->model->updateToken($_SESSION['sid'], $data['fcm_token']);

        echo json_encode(['success' => (bool)$result]);
    }

   
}