<?php 
    require_once "../../../system/config.php";
    require_once "../../../system/database.php";
    require_once "../../models/home.php";
    require_once "../../../lib/myfunctions.php";
    $model = new Model_home();
    $lib = new lib();


    $canhbao= '';
    if(isset($_POST['id'])&&($_POST['id']>0)&&
    isset($_POST['sl'])&&($_POST['sl'])>0&&
    isset($_POST['size'])&&($_POST['size'] !== '')&&
    isset($_POST['mausac'])&&($_POST['mausac'] !== '')
    ){

            $id= $_POST['id'];
            $sl = $_POST['sl'];
            $size = $_POST['size'];
            $mausac = $_POST['mausac'];
            
            $sp = $model->getProById($id);
            $name = $sp['name'];
            $price = $sp['price'];
            $gia =($price - ($sp['discount']*$price)/100);
            $img = explode(",",$sp['image_list'])[0];
            $cart = array ();
            if ($sl > 0) {
                if (! isset ( $_SESSION ['cart'] )) {
                    $cart [] = array ($id, $sl, $size,$mausac,$name,$gia,$img); //lần đầu mua hàng
                } else { //lần thứ 2 mua hàng
                    $cart = $_SESSION ['cart']; 
                    $glad = 0; //cờ 
                    for($i = 0; $i < count ( $cart ); $i ++) {
                        $product = $cart [$i]; // gán giỏ hàng bằng product
                        if ($product [0] == $id&&($product [2] == $size)&&($product [3] == $mausac)) { //kiểm tra id    
                            $product [1] = $product [1] + $sl; //nếu đúng thì tăng sl
                            $cart [$i] = $product; //gán lại cho nó
                            $glad = 1; //cờ bằng 0
                            break;
                        }
                    }
                    if ($glad == 0) {
                        $cart [] = array ($id, $sl, $size,$mausac,$name,$gia,$img);
                    }
                }
                $_SESSION ['cart'] = $cart;
        }
    }
    // xoá cart
    if(isset($_POST['iddel'])){
        $iddel = $_POST['iddel'];   
        array_splice($_SESSION['cart'],$iddel,1);
    };
    

    // show cart
    showSp();
    function showSp(){
        // require_once "../../../languages/".$_SESSION['lang'].".php";
        global $canhbao,$pathimg,$lib;
       
            if(isset($_SESSION['cart']) &&($_SESSION['cart'])){
                $tatcasp = $_SESSION['cart'];
                $sltotal = 0; 
                $tongtien = 0;
                $tongslsp= 0;
                foreach ($tatcasp as $motsp) {
                    $tongslsp += $motsp[1];
                }
                $kq ='<div id="_desktop_cart">
                        <div class="shopping-cart">
                      
                            <div class="blockcart cart-preview active" onclick="cart()">
                                <div class="header">
                                    <div class="cart-link" id="showcart" >
                                        <a rel="nofollow" >
                                            <i class="material-icons shopping-cart" >shopping_cart</i>
                                            <span class="hidden-sm-down">Cart</span>
                                            <span class="cart-products-count">'.$tongslsp.'</span>
                                        </a>
                                    </div>
                                    <!---dropdown-->
                                   
                                    <div class="dropdown-menu dropdown-menu-right">

                                        <div class="product-container">
                                       ';
                $i = 0;
                foreach ($tatcasp as $motsp) {
                    $i++;
                    $img = PATH_IMG_SITE.$motsp[6];
                    $sltotal += $motsp[1];
                    $tongtien += $motsp[5]*$motsp[1];
                    $name = $motsp[4];
                    $id = $motsp[0];
                        $gia =$motsp[5];
                    
                    
                    $slmotsp = $motsp[1];
                    $size = $motsp[2];
                    $mau = $motsp[3];
                    if($size != 'null'){
                        $size = '  <span class="label">Size: '.$size .'</span>';
                    }else{
                        $size ='';
                    }
                    if($mau != 'null'){
                        $mau = ' <span class="color" id="color" style="background-color:'.$mau.'"><span class="sr-only">'.$mau.'</span></span>';
                    }else{
                        $mau ='';
                    }
                    $kq .= '  <div class="product">
                    <!--  image-->
                    <div class="cart-img">
                        <img class="img-responsive" width="80" height="80"
                            src="'.$img.'"
                            alt="Duis Aute Irure begins">
                    </div>

                    <div class="product-details">
                        <!--  name -->
                        <div class="product-name">
                            <!--  qty -->
                            <span>'.$slmotsp.' x </span>
                            <!-- End qty -->
                            <a class="label name-cart2"
                                href=""
                                data-id_customization="0">'. $name.'
                            </a>
                        </div>
                        <!-- price -->
                        <div class="product-price"> <span>'.$lib->forMatTien($gia).' đ</span>
                        </div>

                        <ul class="product-atributes">
                            <li class="atributes">
                                '.$size.'
                                '.$mau.'
                            </li>
                        </ul>

                    </div>

                    <span class="remove-link">
                        <a class="remove-from-cart" rel="nofollow" 
                            data-link-action="delete-from-cart" data-id-product="7"
                            data-id-product-attribute="0" data-id-customization="">
                            <i class="material-icons pull-xs-left" onclick="delCart('.($i-1).')">delete</i>
                        </a>
                    </span>
                </div>';
                }
                $kq .= '</div>
                            <div class="cart-info col-xs-12" border="1">
                                <div class="row">
                                    
                                    <div class="Total col-xs-12 clearfix">
                                        <span class="label  text-xs-left">Tổng</span>
                                        <span class="value   text-xs-right">'.$lib->forMatTien($tongtien).' đ</span>
                                    </div>

                                </div>
                            </div>
                            <!-- checkout -->
                            <div class="cart-btn col-xs-12">
                                <div class="row">
                                    <a href="'.ROOT_URL.'/gio-hang'.'"
                                        class="btn btn-primary">Giỏ hàng</a>
                                    <a href="'.ROOT_URL.'/checkout'.'"
                                    class="btn btn-primary">Thanh Toán</a>
                                </div>
                                <!--dropdown-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>';
                echo $kq;
              
            }else{
               $kq = '  <div id="_desktop_cart">
                            <div class="shopping-cart">
                                <div class="blockcart cart-preview inactive" onclick="cart()"
                                    data-refresh-url="">
                                    <div class="header">
                                        <div class="cart-link">
                                            <a rel="nofollow">
                                                <i class="material-icons shopping-cart">shopping_cart</i>
                                                <span class="hidden-sm-down">Cart</span>
                                                <span class="cart-products-count">0</span>
                                            </a>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">

                                            <li class="cart-det2"
                                                data-refresh-url="">
                                                <span class="no-items">Giỏ hàng trống !</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>';
                    echo $kq;
            }
    }

   
?>

