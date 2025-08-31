<?php 
require_once "models/categories.php"; 
require_once "../lib/myfunctions.php"; 
class categories{
    function __construct()
    {
        $this->model = new Model_categories();
        $this->lib = new lib();
        $act = "index";

        if(isset($_GET["act"])==true) $act = $_GET['act'];

        switch ($act) {
            case 'index':
                $this->index();
                break;
            case 'addnew':
                $this->addNew();
                break; 
            case 'edit':
                $this->addNew();
                break;
            case 'delete':
                $this->delete();
                break;   
            default:
         
                break;
        }

    }
    function index()
    {   $list = $this->model->listRecords();
        
        $page_title ="Danh sách danh mục";
        $page_file = "views/categories_index.php";
        require_once "views/layout.php";
    }
    function addNew()
    {  
        if(isset($_GET['id'])&&($_GET['ctrl']='categories')){
            $oneRecode = $this->model->showOneProducer($_GET['id']);
            $listchild = $this->model->showChildrenCategori();
            $page_title ="Sửa danh mục";
            $page_file = "views/categories_edit.php";
        }else{
            $oneRecode = $this->model->showOneProducer($_GET['id']);
            $listchild = $this->model->showChildrenCategori();
            $page_title ="Thêm danh mục";
            $page_file = "views/categories_add.php";
        }

        if(isset($_POST['them'])&&$_POST['them']){
            $name = $_POST['name_category'];
            $img = $_FILES['img1'];
            
            // $imgs = $this->lib->checkUpLoadMany($img);
            
            // if($imgs){
            //     $checkIMG = explode(",",$imgs);
            
            //     for ($i=0; $i <count($checkIMG) ; $i++) { 
            //         $checkIMG[$i] = explode(".",$checkIMG[$i]);
            //         $checkIMG[$i][1] = strtolower($checkIMG[$i][1]);
            //         if($checkIMG[$i][1] != "jpg" && $checkIMG[$i][1] != "jpeg" && $checkIMG[$i][1] != "png" && $checkIMG[$i][1] != "gif" && $checkIMG[$i][1] != "webp"){
            //             $checkimg = "This is not IMAGE";
            //             break;
            //         }
            //     }
            // }
            $IDcate = $_POST['IDcate'];
            $kieu = $_POST['kieu_menu'];
            $cosan = $_POST['cosan'];
            if (isset($cosan)) {
                $hang = 0;
            }else{
                $hang = 1;
            }
            
            
            $des_category = $_POST['des_category'];
            $slug = $this->lib->slug($name);
            $slug = strtolower($slug);
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                settype($id,"int");
                $this->edit($name,$IDcate,$slug,$des_category,$kieu,$hang,$id);
            }else{
                $this->store($name,$IDcate,$slug,$des_category,$kieu,$hang);
            }
           
        }
     
        require_once "views/layout.php";
    }//thêm mới dữ liệu vào db


    function store($name,$IDcate,$slug,$des_category,$kieu,$hang){   
        $name = $this->lib->stripTags($name);
        if($this->model->addNewCate($name,$IDcate,$slug,$des_category,$kieu,$hang))
        {
            echo "<script>alert('Thêm thành công')</script>";
            header("location: ?ctrl=categories");
        }else
        {
            echo "<script>alert('Thêm thất bại')</script>";
        }

        require_once "views/layout.php";
    }

    function edit($name,$IDcate,$slug,$des_category,$kieu,$hang,$id)
    {
        if(isset($_GET['id']))
        {
            
            if($this->model->editCategory($name,$IDcate,$slug,$des_category,$kieu,$hang,$id))
            {
                echo "<script>alert('Sửa thành công')</script>";
                header("location: ?ctrl=categories");
            }else
            {
                echo "<script>alert('Sửa thất bại')</script>";
            }
        }
        require_once "views/layout.php";
    }

    function delete()
    {
        echo 'oke';
        if(isset($_GET['id'])&&($_GET['ctrl']=='categories')){
            $id = $_GET['id'];
            settype($id,"int");
            if($this->model->deleteCate($id)){
                echo "<script>alert('Xoá thành công')</script>";
                header("location: ?ctrl=categories");
            }else{
                echo "<script>alert('Xoá thất bại')</script>";
            }
        }
        require_once "views/layout.php";
    }
}
?>