<?php 
require_once "models/banner.php"; 
require_once "../lib/myfunctions.php"; 
class banner{
    function __construct()
    {
        $this->model = new Model_banner();
        $this->lib = new lib();
        $act = "index";

        if(isset($_GET["act"])==true) $act = $_GET['act'];

        switch ($act) {
            case 'index':
                $this->index();
                break;
           
            case 'edit':
                $this->edit();
                break;
   
            default:
         
                break;
        }

    }
    function index()
    {  
        $list = $this->model->listRecords();
        $page_title ="Danh sách danh mục";
        $page_file = "views/banner_index.php";
        require_once "views/layout.php";
    }
    function edit(){

        $oneRecord = $this->model->getOneRecord($_GET['id']);
        if(isset($_POST['sua'])){
            $img = $_FILES['img1'];
            
            $imgs = $this->lib->checkUpLoadMany($img);
            if($this->model->editImage($imgs,$_GET['id'])){
                header("location: ?ctrl=banner");
            } 
        }
       
        $page_title ="Danh sách danh mục";
        $page_file = "views/banner_edit.php";
        require_once "views/layout.php";
    }

}
?>