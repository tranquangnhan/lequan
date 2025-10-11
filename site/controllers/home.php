<?php 
   require_once "../system/config.php";
   require_once "../lib/notification.php";
//    require_once "../languages/".$_SESSION['lang'].".php";	

   require_once "../system/database.php";
   require_once "../lib/myfunctions.php";
   require_once "models/home.php"; 
   require_once "models/user.php";
   class Home{
       function __construct()   {
           $this->model = new model_home();
           $this->modelUser = new Model_user();
           $this->lib = new lib();
           $this->notification = new NotificationHelper();

           if(isset($_GET['q'])){
               $this->cat();
            }
           $act = "home";
           if(isset($_GET["act"])==true) $act=$_GET["act"];
           switch ($act) {    
   	      case "home": $this->home(); break;
            case "detail": $this->detail(); break;
            case "cart": $this->cart(); break;
            case "cartview": $this->cartView(); break;
            case "checkout": $this->checkout(); break;
            case "paymentchecking": $this->paymentchecking(); break;
            case "stripecheckout": $this->stripecheckout(); break;
            case "createklarnaqr": $this->createklarnaqr(); break;
            case "createcheckoutsession": $this->createcheckoutsession(); break;
            case "saveorder": $this->SaveOrder(); break;
			case "unsetsession": $this->unsetsession(); break;
            case "savebill": $this->saveBill(); break;
            case "thankyou": $this->thankYou(); break;
            case "cat": $this->cat(); break;
            case "register": $this->register(); break;
            case "ttthanhcong": $this->ttthanhcong(); break;
            case "login": $this->login();break;
            case "active":$this->active();break;
            case "logout":$this->logout();break; 
            case "product":$this->product();break;
            case "changepass":$this->changePass();break;
            case "contact":$this->contact();break;
            case "aboutus":$this->baohanh();break;
            case "impressum":$this->impressum();break;
            case "privacypolicy":$this->privacypolicy();break;
            case "termofservice":$this->termofservice();break;
			case "notification":$this->notification();break;
			case "donecheckout": $this->donecheckout();break;
           case "gioithieu": $this->gioithieu();break;
           case "add_review": $this->addReview();break;
           }
		}
        function addReview() {
            if (!isset($_SESSION['sid'])) {
                header('location: ?ctrl=user&act=login');
                return;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = [
                    'id_product' => $_POST['id_product'],
					'id_user' => $_SESSION['sid'],
                    'rating' => $_POST['rating'],
                    'noidung' => $_POST['noidung']
                ];

                if ($this->model->addReview($data)) {
				
                    $_SESSION['message'] = 'Cảm ơn bạn đã đánh giá sản phẩm!';
                } else {
                    $_SESSION['error'] = 'Có lỗi xảy ra, vui lòng thử lại sau.';
                }

                header('location: '.ROOT_URL.'/san-pham-chi-tiet/' . $_POST['slug']);
            }        
		}
 
        function home()
        {
			$banner = $this->model->getAllBanner();
           $getAllProSpecial = $this->model->getAllProSpecial();
           $getAllProAsc = $this->model->getAllProAsc(10,0);
           $getAllByHotAsc = $this->model->getAllByHotAsc();
           $getAllByBuyed = $this->model->getAllByBuyed(10,0);
           $getAllProByDeal =  $this->model->getAllProByDeal();
           $getMenuParent = $this->model->getMenuParent();
		   $getMenuParentdoc = $this->model->getMenuParentdoc();
		   $getProPhuKien   =$this->model->getProPhuKien();
		   $getProQuanAo    =$this->model->getProQuanAo();
		   $getGiayCoSan    =$this->model->getGiayCoSan();          
           $viewFile = "views/home.php";
           require_once "views/layout.php";  
        }
   
        function product()
        {
			
		 $banner = $this->model->getAllBanner();
         $getMenuParent = $this->model->getMenuParent();
		 if(isset($_GET['maloai'])){
			 $getCateFromId = $this->model->getCateFromId($_GET['maloai']);
		 }else{
			$getCateFromId = $this->model->getCateFromId(2);
		 }
         
         $getAllProDesc = $this->model->getAllProDesc(3,0);
         
         $getAllProDescoffset = $this->model->getAllProDesc(3,3);
         $getAllByBuyed = $this->model->getAllByBuyed(3,0);
         $etAllByBuyedoffset = $this->model->getAllByBuyed(3,3);
		 $PageNum=1;
         if(isset($_GET['Page'])==true) $PageNum = $_GET['Page'];
         settype($maLoai,"int");
         settype($PageNum,"int");
   
         if($PageNum<=0) $PageNum = 1;
		
       
   
         $page_title ="Danh sách nhà sản xuất";
         $viewFile = "views/product.php";
         require_once "views/layout.php";  
        }
		
        function detail()
        {
           $getAllProSpecial = $this->model->getAllProSpecial();
           $getMenuParent = $this->model->getMenuParent();
           
           $slug = $_GET['slug'];
         
           $sp = $this->model->getOnePro($slug);  
           $this->model->increaseProductView($sp['id']);
         
           // Handle review submission
           if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rating'])) {
               if (!isset($_SESSION['sid'])) {
                   $_SESSION['error'] = 'Vui lòng đăng nhập để đánh giá';
                   header('Location: ?ctrl=user&act=login');
                   return;
               }

               $reviewData = [
                   'id_product' => $sp['id'],
                   'rating' => (int)$_POST['rating'],
                   'noidung' => $_POST['noidung']
               ];

               if ($this->model->addReview($reviewData)) {
                   $_SESSION['message'] = 'Cảm ơn bạn đã đánh giá sản phẩm!';
               } else {
                   $_SESSION['error'] = 'Có lỗi xảy ra, vui lòng thử lại sau.';
               }

               header('Location: ' . $_SERVER['REQUEST_URI']);
               return;
           }
		 
           $viewFile = "views/Product-Detail.php";     
           require_once "views/layout.php";  
        }
		function gioithieu()
        {
			$getMenuParent = $this->model->getMenuParent();
           $viewFile = "views/gioithieu.php";     
           require_once "views/layout.php";  
        }
        function cat(){
			 $getMenuParent = $this->model->getMenuParent();
         
            $slug = $_GET['slug'];
            
   
            if (isset($_GET['Page'])) $CurrentPage = $_GET['Page']; else $CurrentPage = 1;
            
            if(isset($_GET['q'])) $query = $_GET['q']; else $query = NULL;
   
            $TotalProduct = $this->model->countAllProductSearch($query);
            if($TotalProduct == 0) $TotalProduct =1;
      
            $ProductList = $this->model-> GetProductList($slug,$CurrentPage,$query);
            
            $Pagination =  $this->model->Page($TotalProduct, $CurrentPage);
			
            $viewFile ="views/shop.php";
            require_once "views/layout.php";
        }
   
        function cartView(){
   			$getMenuParent = $this->model->getMenuParent();
            $viewFile ="views/cart.php";
            require_once "views/layout.php";
        }
   
        function cart()
        {
            $id = $_GET['id'];
           
            $what = "";
            if(isset($_GET['what'])) $what = $_GET['what'];
           
            if ($what=="remove")
            {
               unset($_SESSION['giohang'][$id]);
               header("location: ". ROOT_URL."/gio-hang");
            }
        }
     
   	
	 function checkout()
	 {
		$getMenuParent = $this->model->getMenuParent();
		$this->saveBill();
		$viewFile ="views/checkout.php";
		require_once "views/layout.php";
	 }
	 function unsetsession()
	 {
		 echo $_SESSION['idDH'];
		 unset($_SESSION['idDH']);
	 }
	 function SaveOrder()
	 {
		 $result = array();
		 $result["data"] = $_POST;
		 
		if(isset($_POST['fname']) && $_POST['fname'] != ""){
	
		$fname = trim(strip_tags($_POST['fname']));
		$lname = trim(strip_tags($_POST['lname']));
		$email = trim(strip_tags($_POST['email']));
		$phone = trim(strip_tags($_POST['phone']));
		$street = trim(strip_tags($_POST['street']));
		$housenumber = trim(strip_tags($_POST['housenumber']));
		$city = trim(strip_tags($_POST['city']));
		$country = trim(strip_tags($_POST['country']));
		$postcode = trim(strip_tags($_POST['postcode']));
		// $address = trim(strip_tags($_POST['address']));
		$note = trim(strip_tags($_POST['note']));
		
		if (isset($_SESSION['idDH']))
		   $idDH= $_SESSION['idDH'];
		else $idDH="-1";
		   
		$tongtien = 0;
		foreach ($_SESSION['cart'] as $row) {
		   $tongtien += $row[5]*$row[1];
		}
		$result["oidold"] = $_SESSION['idDH'];
		
		$idDH = $this->model->luudonhangnhe($idDH, $fname,$lname, $email,$phone,$street,$housenumber,$city,$country,$postcode,$note,$tongtien); 
		
		   if ($idDH){
			  $_SESSION['idDH'] = $idDH;
			  $result["oidnew"] = $idDH;
			  $giohang = $_SESSION['cart'];
			  $this->model->luugiohangnhe($idDH, $giohang);

			  //unset($_SESSION['cart']);
			  $result["status"] = 200;
			  
		   }
			else		   
			{
				$result["status"] = 500;
				$result["message"] = "Cannot Create Order";
			}
			   
		}
		else		   
			{
				$result["status"] = 503;
				$result["message"] = "Bad Request";
			}
			
		echo json_encode($result);
	 }
	 
	 function saveBill()
	 {
		if(isset($_POST['continue'])){
	

		$hoten = trim(strip_tags($_POST['name']));
		$email = trim(strip_tags($_POST['email']));
		$phone = trim(strip_tags($_POST['phone']));
		$address = trim(strip_tags($_POST['address']));
		$note = trim(strip_tags($_POST['note']));

		if (isset($_SESSION['idDH']))
		   $idDH= $_SESSION['idDH'];
		else $idDH="-1";
		   
		$tongtien = 0;
		foreach ($_SESSION['cart'] as $row) {
		   $tongtien += $row[5]*$row[1];
		}
		$idDH = $this->model->luudonhangnhe($idDH,  $hoten, $email,$phone,$address,$note,$tongtien); 
	  
		   if ($idDH){
			  $_SESSION['idDH'] = $idDH;
			  
			  $giohang = $_SESSION['cart'];
			
				if ($this->model->luugiohangnhe($idDH, $giohang)) {
					//  unset($_SESSION['cart']);
					// Send notification to admins
					 try {
						$notificationResult = $this->notification->sendToAdmins(
							'Đơn hàng mới', 
							"Có đơn hàng mới #{$idDH} từ {$phone}",
							['order_id' => $idDH]
						);
						
						// if ($notificationResult === false) {
						// 	// Log notification failure but continue
						// 	print_r("Failed to send admin notification for order #{$idDH}");
						// }
					} catch (Exception $e) {
						// Log the error but don't stop the order process
						print_r("Error sending notification: " . $e->getMessage());
					}
					//   header('location: '.ROOT_URL.'/donecheckout');
				}
			  // optionally log or ignore $smsResult
			
		   }  
			   
		}
	 }
	 
	 function vnpay()
	 {
		
		$viewFile ="views/vnpay/vnpay.php";
		require_once "views/layout.php";
	 }
	 function ttthanhcong()
	 {
		  unset($_SESSION['giohang']);
		  unset($_SESSION['discount']);
		$viewFile ="views/vnpay/vnpay_return.php";
		require_once "views/layout.php";
	 }
	 
	 function thankYou()
	 {
		
		$getMenuParent = $this->model->getMenuParent();
		$viewFile ="views/thankyou.php";
		require_once "views/layout.php";
	 }

	 function login()
	 {  
		if(isset($_POST['login'])){
		   $email= $_POST['email'];
		   $pass = $_POST['password'];
		   $exist = $this->modelUser->checkEmailTonTai($email);
		   if($exist != null){
			  $checklogin = $this->modelUser->checkUser($email,$pass);
			  if($checklogin == true){
				 header('location: ./trang-chu');
			  }else{
				 $checkloginwarn = 'Mật khẩu của bạn không hợp lệ';
			  }
		   }else{
			  $emailexist= 'Email của bạn không tồn tại!';
		   }
		}
		$getMenuParent = $this->model->getMenuParent();
		$viewFile ="views/login.php";
		require_once "views/layout.php";
	 }
	 function register()
	 {
		// require_once "../languages/".$_SESSION['lang'].".php";	
		if(isset($_POST['register'])){
		   $name = $_POST['name'];
		   $email = $_POST['email'];
		   $password = $_POST['password'];
		   $exist = $this->modelUser->checkEmailTonTai($email);
		   if($name == '' || $email == '' ||$password == '' ){
			  $nullerror = "Bạn chưa nhập đủ thông tin";
		   }else{
			  if($exist != null){
				 $emailexist= 'Email đã tồn tại!';
			  }else{
				 $exist = $this->modelUser->registerUser($name,$email,$password);
				$_SESSION['thongbao'] = "Đăng kí thành công";
				header("location: ".ROOT_URL."/notification");
			  }
		   } 
		}
		$getMenuParent = $this->model->getMenuParent();
		$viewFile ="views/register.php";
		require_once "views/layout.php";
	 }
	 function active()
	 {
		
	   $userId =  $_GET['userid'];
	   $token = $_GET['token'];
	   if($this->modelUser->selectRanDomKey($userId) == $_GET['token']){
		$this->modelUser->setThanhVien($userId);

		echo '<script>window.location.href="index.php"</script>';
	   }else{
		  echo 'Mày hack à ?';
	   }
	 
	 }
	 function logout()
	 {
		unset($_SESSION['suser']);
		unset($_SESSION['sid']);
		unset($_SESSION['srole']);
		header('location: ./trang-chu');
	 }
	 function forgotPass(){

		$viewFile ="views/forgotpass.php";
		require_once "views/layout.php";
	 }
	 function changePass()
	 {
		$viewFile ="views/changepass.php";
		require_once "views/layout.php";
	 }
	 function contact(){
		$getMenuParent = $this->model->getMenuParent();
		if(isset($_POST['submitMessage'])){
		   $name = $_POST['name'];
		   $phone = $_POST['phone'];
		   $subject = $_POST['id_contact'];
		   $message = $_POST['message'];
		   if($name == '' || $phone == '' ||$message == '' ){
			  $nullerror = "Bạn chưa điền đủ thông tin";
		   }else{
			  $this->model->storeContact($name,$phone,$subject,$message);
			  echo '<script>alert("Chúng tôi sẽ liên hệ bạn sớm nhất !")</script>';
		   } 
		}
		$viewFile ="views/contact.php";
		require_once "views/layout.php";
	 }
	 function baohanh(){
		$getMenuParent = $this->model->getMenuParent();
		$viewFile = "views/baohanh.php";
	   require_once "views/layout.php";
	 }
	 function impressum(){
		$viewFile = "views/impressum.php";
	   require_once "views/layout.php";
	 }
	 function privacypolicy(){

		$viewFile = "views/privacypolicy.php";
	   require_once "views/layout.php";
	 }
	 function termofservice(){
		$getMenuParent = $this->model->getMenuParent();
		$viewFile = "views/termofservice.php";
	   require_once "views/layout.php";
	 }
	 function notification(){
			
		if(isset($_SESSION['thongbao'])){
			$thongbao = $_SESSION['thongbao'];
			unset($_SESSION['thongbao']);
		}else{
		
			$thongbao = "no notification";
		}
		require_once "views/thankyou.php";
	 }
	 function donecheckout(){
		$viewFile ="views/donecheckout.php";
		require_once "views/layout.php";
	 }

	
}
   
   ?>