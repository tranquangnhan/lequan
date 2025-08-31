<?php 
require_once "models/order.php"; 
require_once "models/product.php"; 
require_once "../lib/myfunctions.php"; 
class order{
    function __construct()
    {
        $this->model = new Model_order();
        $this->modelpro = new Model_product();
        $this->lib = new lib();
        $act = "index";

        if(isset($_GET["act"])==true) $act = $_GET['act'];

        switch ($act) {
            case 'index':
                $this->index();
                break; 
            case 'detail':
                $this->detail();
                break; 
            case 'edit':
                $this->edit();
                break;
            case 'delete':
                $this->del();
                break;
            default:
                break;
        }

    }
    function index(){
        $getAllBill = $this->model->getAllBill();
       
        $page_file = "views/order_index.php";
        require_once "views/layout.php";
    }
    function detail()
    {
        $getProDetail = $this->model->getProDetail($_GET['id']);
        $getInfoDetail = $this->model->getInfoDetail($_GET['id']);
        $page_file = "views/order_detail.php";
        require_once "views/layout.php";
    }
    function edit()
    {
        $getBillDetail = $this->model->getBillDetail($_GET['id']);
        if(isset($_POST['sua']) && ($_POST['sua'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $dienthoai = $_POST['dienthoai'];
            $diachi = $_POST['diachi'];
            $ghichucuakhach = $_POST['ghichucuakhach'];
            $ghichucuaadmin = $_POST['ghichucuaadmin'];
            $thoidiemgiaohang = $_POST['thoidiemgiaohang'];
            $thoidiemdathang = $_POST['thoidiemdathang'];
            $trangthai = $_POST['trangthai'];
            $anhien = $_POST['anhien'];
            $idDH = $_GET['id'];
            if($this->model->editBIllDetail($name,$email,$dienthoai,$diachi,$ghichucuakhach,$ghichucuaadmin,$thoidiemgiaohang,$thoidiemdathang,$trangthai,$anhien,$idDH)){
                header("location: ?ctrl=donhang&act=index");
            }
         }

        $page_file = "views/donhang_edit.php";
        require_once "views/layout.php";
    }
    function del()
    {   
        if(isset($_GET['id'])&&($_GET['ctrl']=='donhang')){
            $id = $_GET['id'];
            settype($id,"int");
            
            if($this->model->del($id)){
                header("location: ?ctrl=donhang&act=index");
            }else{
                echo "<script>alert('Xoá thất bại')</script>";
            }
        }
        require_once "views/layout.php";
    }
   
}
?>