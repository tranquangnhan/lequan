<link rel="stylesheet" href="views/assets/css/checkout.css">
<link rel="stylesheet" href="views/assets/css/stripe.css">
<img src="https://www.paypalobjects.com/webstatic/i/logo/rebrand/ppcom-white.svg" width="25%;"
   style="opacity: 0.05;">
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="https://js.stripe.com/v3/"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>

<aside id="notifications">
   <div class="container">
   </div>
</aside>
<section id="wrapper">
   <nav data-depth="1" class="breadcrumb hidden-sm-down">
      <div class="container">
         <ol itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
               <a itemprop="item" href="#">
               <span itemprop="name">Trang chủ</span>
               </a>
               <meta itemprop="position" content="1">
            </li>
         </ol>
      </div>
   </nav>
   <div class="container">
      <section id="content">
         <div class="row">
            <div class="cart-grid-body col-xs-12 col-lg-8">
               <section id="checkout-personal-information-step"
                  class="checkout-step -current -reachable js-current-step">
                  <h1 class="step-title h3">
                     <!-- <i class="material-icons rtl-no-flip done">&#xE876;</i> -->
                     <!-- <span class="step-number">1</span> -->
                     <!-- <?=$lang['person']?> -->
                     <!-- <span class="step-edit text-muted"><i class="material-icons edit">mode_edit</i> Edit</span> -->
                  </h1>
                  <div class="content">
                     <div class="tab-content">
                        <div class="tab-pane active" id="checkout-guest-form" role="tabpanel">
                        <form action="" 
                                        id="customer-form" class="js-customer-form" method="post">
                                        <section>



                                            <div class="form-group row ">
                                                <label class="col-md-3 form-control-label required">
                                                   Họ và tên
                                                </label>
                                                <div class="col-md-6">



                                                    <input class="form-control" name="name" type="text" value=""
                                                        required>






                                                </div>

                                                <div class="col-md-3 form-control-comment">


                                                </div>
                                            </div>







                                            <div class="form-group row ">
                                                <label class="col-md-3 form-control-label required">
                                                  Điện thoại
                                                </label>
                                                <div class="col-md-6">



                                                    <input class="form-control" name="phone" type="number" value=""
                                                        required>

                                                </div>

                                                <div class="col-md-3 form-control-comment">


                                                </div>
                                            </div>







                                            <div class="form-group row ">
                                                <label class="col-md-3 form-control-label required">
                                                    Email
                                                </label>
                                                <div class="col-md-6">



                                                    <input class="form-control" name="email" type="email" value=""
                                                        required>






                                                </div>

                                                <div class="col-md-3 form-control-comment">


                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label class="col-md-3 form-control-label required">
                                                    Địa chỉ
                                                </label>
                                                <div class="col-md-6">



                                                    <input class="form-control" name="address" type="text" value=""
                                                        required>


                                                </div>

                                                <div class="col-md-3 form-control-comment">


                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label class="col-md-3 form-control-label required">
                                                    Ghi chú
                                                </label>
                                                <div class="col-md-6">



                                                    <textarea class="textarea" name="note" id="" cols="55" rows="10"></textarea>


                                                </div>

                                                <div class="col-md-3 form-control-comment">


                                                </div>
                                            </div>

                                        </section>


                                        <footer class="form-footer clearfix">
                                            <input type="hidden" name="submitCreate" value="1">

                                            <button class="continue btn btn-primary float-xs-right" name="continue"
                                                data-link-action="register-new-customer" type="submit" value="1">
                                                Tiếp tục
                                            </button>

                                        </footer>


                                    </form>
                        </div>
                     </div>
                  </div>
               </section>
			   
           
			   
            </div>
			
            <div class="cart-grid-right col-xs-12 col-lg-4">
               <section id="js-checkout-summary" class="card js-cart"
                  data-refresh-url="https://infinitytemplate.com/Prestashop/PRS01/PRS012/en/cart?ajax=1&action=refresh">
                  <div class="card-block">
                     <div class="cart-summary-products">
                        <p><?=count($_SESSION['cart'])?> Sản phẩm</p>
                        <p>
                           <a href="#" data-toggle="collapse" data-target="#cart-summary-product-list">
                           Hiện chi tiết
                           <i class="material-icons">expand_more</i>
                           </a>
                        </p>
                        <div class="collapse" id="cart-summary-product-list">
                           <ul class="media-list">
                              <?php 
                                 if(isset($_SESSION['cart']) &&($_SESSION['cart'])){
                                 $tatcasp = $_SESSION['cart'];
                                 $sltotal = 0; 
                                 $tongtien = 0;
								 $shoptotal = 0;
                                 $kq ='';
                                     
                                 $i = 0;
                                 foreach ($tatcasp as $motsp) {
                                     $i++;
                                     $img = PATH_IMG_SITE.$motsp[6];
                                 
                                     $sltotal += $motsp[1];
                                     $tongtien += $motsp[5]*$motsp[1];
                                     $name = $motsp[4];
                                     $id = $motsp[0];
                                     $slmotsp = $motsp[1];
                                     $size = $motsp[2];
                                     $mau = $motsp[3];
                                       $gia =$motsp[5];
                                     
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
                                     $kq .= ' <li class="media">
                                     <div class="media-left imgcart">
                                         <a href="#"
                                             title="Pack Mug + Esse Cillum Dolore">
                                             <img class="media-object" width="70" height="100"
                                                 src="'.$img.'"
                                                 alt="Pack Mug + Esse Cillum Dolore">
                                         </a>
                                     </div>
                                     <div class="media-body">
                                         <span class="product-name">'.$name.'</span>
                                         <span class="product-quantity">x'.$slmotsp.'</span>
                                         <span class="product-price float-xs-right">'.$this->lib->forMatTien($gia).' đ</span>
                                         '. $size .'
                                         '. $mau .'
                                         <br />
                                 
                                     </div>
                                 
                                 </li>';
                               
								         $shoptotal += $this->lib->forMatTien($motsp[5]*$motsp[1]);
                                 }
                                 $kq .= '';
                                 echo $kq;
                                 
                                 }else{
                                 $kq = '  <div id="_desktop_cart">
                                             <div class="shopping-cart">
                                                 <div class="blockcart cart-preview inactive"
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
                                                                 <span class="no-items">Giỏ hàng đang trống!</span>
                                                         </div>
                                                     </div>
                                 
                                                 </div>
                                             </div>
                                         </div>';
                                     echo $kq;
                                 }
                                 ?>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <hr class="separator">
                  <div class="card-block ">
                     <div class="cart-summary-line cart-total">
                        <span class="label">Tổng </span>
                        <span class="value"><?=$this->lib->forMatTien($tongtien)?> đ</span>
                     </div>
                  </div>
                  <hr class="separator">
                  
                  <br>
                  <hr class="separator">
               </section>
               <div id="block-reassurance">
                  <ul>
                     <li>
                        <div class="block-reassurance-item">
                           <img src="views/assets/img/ic_verified_user_black_36dp_1x.png"
                              alt="Security policy (edit with Customer reassurance module)">
                           <span class="h6">Bảo mật</span>
                        </div>
                     </li>
                     <li>
                        <div class="block-reassurance-item">
                           <img src="views/assets/img/ic_local_shipping_black_36dp_1x.png"
                              alt="Delivery policy (edit with Customer reassurance module)">
                           <span class="h6">Giao hàng</span>
                        </div>
                     </li>
                     <li>
                        <div class="block-reassurance-item">
                           <img src="views/assets/img/ic_swap_horiz_black_36dp_1x.png"
                              alt="Return policy (edit with Customer reassurance module)">
                           <span class="h6">Đổi trả</span>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </section>
   </div>
   

</section>