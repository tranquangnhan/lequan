<?php 
   require_once "../system/config.php";
//    require_once "../languages/".$_SESSION['lang'].".php";	

   require_once "../system/database.php";
   require_once "../lib/myfunctions.php";
   echo $lang['title'];
   require_once "models/home.php"; 
   require_once "models/user.php";
   class Home{
       function __construct()   {
           $this->model = new model_home();
           $this->modelUser = new Model_user();
           $this->lib = new lib();
           
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
		   
           $page_title ="Lê Quân Sneaker";
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
   
            $producer = $this->model->getAllProducer();
         
            $slug = $_GET['slug'];
            
            if(isset($_GET['to'])) $to = $_GET['to']; else $to = NULL;
            if(isset($_GET['from'])) $from = $_GET['from']; else $from = NULL;
            if(isset($_POST['hot'])) $hot = $_POST['hot']; else $hot = NULL;
   
            if (isset($_GET['Page'])) $CurrentPage = $_GET['Page']; else $CurrentPage = 1;
            
            if(isset($_GET['q'])) $query = $_GET['q']; else $query = NULL;
   
            $TotalProduct = $this->model->countAllPhone($slug,$from,$to,$hot,$query);
    
            if($TotalProduct == 0) $TotalProduct =1;
      
            $ProductList = $this->model-> GetProductList($slug,$CurrentPage,$from,$to,$hot,$query);
            
    
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
      function createcheckoutsession()
	  {
		  //echo dirname(__FILE__) . '/vendor/autoload.php';
		  
		  require dirname(__FILE__) . '/vendor/autoload.php';
		
		\Stripe\Stripe::setApiKey('sk_test_51Ila2jLKgBvDvyCU7Aqlt5aeu1LIBByZoqZ6PgAqUAXDqLTuutDkhj5ZqLxd79wuEF86Ke07U9hrPjpl6tCH70B8003iKIrfWQ');

		header('Content-Type: application/json');
		
		$YOUR_DOMAIN = ROOT_URL;

		$checkout_session = \Stripe\Checkout\Session::create([
		  'payment_method_types' => ['card'],
		  'line_items' => [[
			'price_data' => [
			  'currency' => 'usd',
			  'unit_amount' => 2000,
			  'product_data' => [
				'name' => 'Stubborn Attachments',
				'images' => ["https://i.imgur.com/EHyR2nP.png"],
			  ],
			],
			'quantity' => 1,
		  ]],
		  'mode' => 'payment',
		  'success_url' => $YOUR_DOMAIN . '/cam-on',
		  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
		]);
/*
		echo json_encode(['id' => $checkout_session->id]);
		*/
	  }		  
   	function paymentchecking()
   	{
   		$result = array();
		if (isset($_SESSION['idDH']))
		   $oid= $_SESSION['idDH'];
		else $oid="-1";
		$result["data"] = $_POST;
   		switch($_POST['method'])
		{
			case "paypal":
			{
				$paymentID = $_POST['paymentID'];
				$payerID = $_POST['payerID'];
				$token = $_POST['token'];
				if($token != "")
				{
					$update_result = $this->model->updatepaymentstatus($oid,1,'paypal');
				   if ($update_result){
					  $_SESSION['idDH'] = "-1";
					  unset($_SESSION['cart']);
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
					$result["status"] = 500;
					   $result["message"] = "Bad Request";
				}
				break;
			}
			case "stripe":
			{
				$paymentID = $_POST['id'];
				if($paymentID != "")
				{
					$update_result = $this->model->updatepaymentstatus($oid,1,'stripe');
				   if ($update_result){
					  $_SESSION['idDH'] = "-1";
					  unset($_SESSION['cart']);
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
					$result["status"] = 500;
					   $result["message"] = "Bad Request";
				}
				break;

			}
			case "cod":
			{
				$paymentID = $_POST['id'];
				$update_result = $this->model->updatepaymentstatus($oid,0,'cod');
			   if ($update_result){
				  $_SESSION['idDH'] = "-1";
				  unset($_SESSION['cart']);
				  $result["status"] = 200;
			   }  
			   else
			   {
				   $result["status"] = 500;
				   $result["message"] = "Cannot Create Order";
			   }
				break;

			}
			default:
			{
				$result["status"] = 500;
				$result["message"] = "Invaild payment";
			}
		}
   		
   		echo json_encode($result);
   	}
	function stripecheckout()
	{
		require 'vendor/autoload.php';
		$tongtien = 0;
		foreach ($_SESSION['cart'] as $row) {
		   $tongtien += $row[5]*$row[1];
		}
		\Stripe\Stripe::setApiKey('sk_test_51Ila2jLKgBvDvyCU7Aqlt5aeu1LIBByZoqZ6PgAqUAXDqLTuutDkhj5ZqLxd79wuEF86Ke07U9hrPjpl6tCH70B8003iKIrfWQ');
		try {
		  $json_str = file_get_contents('php://input');
		  $json_obj = json_decode($json_str);
		
		  $paymentIntent = \Stripe\PaymentIntent::create([
			'amount' => $tongtien*100,
			'currency' => 'eur',
		  ]);

		  $output = [
			'clientSecret' => $paymentIntent->client_secret,
		  ];

		  echo json_encode($output);
		} catch (Error $e) {
		  http_response_code(500);
		  echo json_encode(['error' => $e->getMessage()]);
		}
	}
	function createklarnaqr()
	{
		$result = array();
		$items = array();
		$tatcasp = $_SESSION['cart'];
		 $sltotal = 0; 
		 $tongtien = 0;
		 $kq ='';
			 
		 $i = 0;
		 foreach ($tatcasp as $motsp) {
			 $item = '{
			  "type": "physical",
			  "reference": "'.$motsp[0].'",
			  "name": "'.$motsp[4].'",
			  "unit_price": '.$motsp[5].',
			  "total_amount": '.$motsp[5]*$motsp[1].',
			  "total_tax_amount": 0,
			  "tax_rate": 0,
			  "total_discount_amount": 0,
			  "group_identifier": "demo.store.items"
			}';
			 array_push($items,$item);
		 }
		 $itemtext = implode(",",$items);
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.playground.klarna.com/instantshopping/v1/buttons',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>'{
		  "purchase_country": "GB",
		  "purchase_currency": "EUR",
		  "locale": "en-GB",
		  "merchant_urls": {
			"place_order": "'.ROOT_URL.'/verifyklarna",
			"terms": "'.ROOT_URL.'/terms"
		  },
		  "items": [
			'.$itemtext.'
		  ]
		}',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Basic UEszODkzNV9kMDNkMzc3NTYzMTc6b2tCYTFGeVZPalJyanF2eQ==',
			'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		$response = json_decode($response,true);
		if(count($response["links"]))
		{
			$result["status"] = 200;
			$result["url"] = $response["links"][0]["href"];
			$result["qr"] = $response["links"][1]["href"];
		}
		else
		{
			$result["status"] = 500;
			$result["message"] = "Can not create payment!";
		}
		$result["data"] = $response;
		echo json_encode($result);
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
unset($_SESSION['cart']);
			  $this->model->luugiohangnhe($idDH, $giohang);
			  header('location: '.ROOT_URL.'/donecheckout');
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