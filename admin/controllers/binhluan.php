<?php
require_once "./models/binhluan.php";

class BinhLuan {
    private $model;

    function __construct() {
        $this->model = new ModelBinhLuan();
        
        // Check if user is logged in
        if (!isset($_SESSION['sid'])) {
            header('Location: ?ctrl=login');
            return;
        }

        $act = "index";
        if(isset($_GET["act"])) $act = $_GET["act"];

        switch ($act) {
            case "index": 
                $this->index(); 
                break;
            case "edit": 
                $this->edit(); 
                break;
            case "update": 
                $this->update(); 
                break;
            case "delete": 
                $this->delete(); 
                break;
            case "update_status":
                $this->updateStatus();
                break;
        }
    }

    function index() {
       
        $data = $this->model->getAll($start, $limit, $search);

        $page_file = "views/binhluan_index.php";
        require_once "views/layout.php";
    }

    function edit() {
        if (!isset($_GET['id'])) {
            header('Location: ?ctrl=binhluan');
            return;
        }

        $id = (int)$_GET['id'];
        $binhluan = $this->model->getById($id);
     
        $page_file = "views/binhluan_edit.php";
        require_once "views/layout.php";
    }

    function update() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?ctrl=binhluan');
            return;
        }

        $id = (int)$_POST['id'];
        $data = [
            'noidung' => trim($_POST['noidung']),
            'rating' => (int)$_POST['rating'],
            'trangthai' => isset($_POST['trangthai']) ? 1 : 0
        ];

        if ($this->model->update($id, $data)) {
            $_SESSION['message'] = 'Cập nhật bình luận thành công';
        } else {
            $_SESSION['error'] = 'Cập nhật bình luận thất bại';
        }

        header('Location: ?ctrl=binhluan');
    }

    function delete() {
        if (!isset($_GET['id'])) {
            header('Location: ?ctrl=binhluan');
            return;
        }

        $id = (int)$_GET['id'];
        if ($this->model->delete($id)) {
            $_SESSION['message'] = 'Xóa bình luận thành công';
        } else {
            $_SESSION['error'] = 'Xóa bình luận thất bại';
        }

        header('Location: ?ctrl=binhluan');
    }

    function updateStatus() {
        ob_clean(); // Xóa mọi dữ liệu đã in ra trước đó
        header('Content-Type: application/json; charset=utf-8');
        if (!isset($_GET['id']) || !isset($_GET['status'])) {
            echo json_encode(['success' => false]);
            return;
        }

        $id = (int)$_GET['id'];
        $status = (int)$_GET['status'];

        $success = $this->model->updateStatus($id, $status);
        echo json_encode(['success' => $success]);
          exit; // <--- CỰC KỲ QUAN TRỌNG
    }
}