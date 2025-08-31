<aside id="notifications">
    <div class="container">



    </div>
</aside>








<section id="wrapper">


    <div class="container">
        <div class="row">




            <div id="content-wrapper" class="col-xs-12">



                <section id="main">
                    <div class="cart-grid row">

                        <!-- Left Block: cart product informations & shpping -->
                        <div class="cart-grid-body col-xs-12 col-lg-8">

                            <!-- cart products detailed -->
                            <div class="card cart-container">
                                <div class="card-block">
                                    <h1 class="h1">Giỏ Hàng </h1>
                                </div>
                                <hr class="separator">


                                <div class="cart-overview js-cart"
                                    data-refresh-url="//infinitytemplate.com/Prestashop/PRS01/PRS012/en/cart?ajax=1&action=refresh">
                                    <ul class="cart-items">
                                        <?php 
                                         if(empty($_SESSION['cart'])) echo 'Giỏ hàng trống';
                                        $i=0;
                                          foreach ($_SESSION['cart'] as $row) {
                                              $i++;
                                            if(is_file(PATH_IMG_SITE.explode(",",$row[6])[0])){
                                              $img = PATH_IMG_SITE.explode(",",$row[6])[0];
                                          }else{
                                              $img = PATH_IMG_SITE.'logo.png';
                                          }
                                          $tongtien = 0;
                                          $sl = 0;
                                          foreach ($_SESSION['cart'] as $motsp) {
                                            $tongtien += $motsp[5]*$motsp[1];
                                            $sl += $motsp[1];
                                          }
                                         
                                          if(!empty($_SESSION['cart'])){
                                            echo ' <li class="cart-item">

                                            <div class="product-line-grid">
                                                <!--  product left content: image-->
                                                <div class="product-line-grid-left col-md-3 col-xs-4">
                                                    <span class="product-image media-middle">
                                                        <img src="'. $img.'"
                                                            alt="Pack Mug + Esse Cillum Dolore">
                                                        <input type="hidden" value="'.$row[0].'" class="idsp">
                                                    </span>
                                                </div>

                                                <!--  product left body: description -->
                                                <div class="product-line-grid-body col-md-4 col-xs-8">
                                                    <div class="product-line-info">
                                                        <a class="label"data-id_customization="0" >'.$row[4].'</a>
                                                    </div>

                                                    <div class="product-line-info product-price h5 ">
                                                        <div class="current-price">
                                                            <span class="price">$15.99</span>
                                                        </div>
                                                    </div>

                                                    <br />


                                                </div>

                                                <!--  product left body: description -->
                                                <div
                                                    class="product-line-grid-right product-line-actions col-md-5 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-xs-1 hidden-md-up"></div>
                                                        <div class="col-md-10 col-xs-10 p-0">
                                                            <div class="row">
                                                                <div class="col-md-6 col-xs-6 qty p-0">
                                                                    <input class="js-cart-line-product-quantity getquantity" data-product-id="15" type="number" value="'.$row[1].'"
                                                                        name="product-quantity-spin" min="1" />
                                                                </div>
                                                                <div class="col-md-6 col-xs-6 price p-0">
                                                                    <span class="product-price">
                                                                        <strong class="totalmoney">
                                                                           '.$this->lib->forMatTien($row[5] * $row[1]).' đ
                                                                        </strong>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-xs-0 p-0 text-xs-right">
                                                            <div class="cart-line-product-actions">
                                                                <a class="remove-from-cart" rel="nofollow"
                                                                   
                                                                    data-link-action="delete-from-cart"
                                                                    data-id-product="15" data-id-product-attribute="0"
                                                                    data-id-customization="">
                                                                    <i class="material-icons float-xs-left" onclick="del('.($i-1).')">delete</i>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </li>';
                                          }else{
                                              echo ' <div class="product-line-grid-left col-md-3 col-xs-4">
                                                        <span class="product-image media-middle">
                                                            <img src=""
                                                                alt="Pack Mug + Esse Cillum Dolore">
                                                            <input type="hidden" value="" class="idsp">
                                                        </span>
                                                    </div>';
                                          }

                                          }
                                        ?>
                                       

                                    </ul>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-3">
                                        <a  class="btn btn-primary" id="updatecart">Cập nhật giỏ hàng</a>
                                    </div>
                                </div>
                                
                                

                            </div>




                            <!-- shipping informations -->



                        </div>

                        <!-- Right Block: cart subtotal & cart total -->
                        <div class="cart-grid-right col-xs-12 col-lg-4">


                            <div class="card cart-summary">







                                <div class="cart-detailed-totals">

                                    <div class="card-block">
                                        <div class="cart-summary-line" id="cart-subtotal-products">
                                            <span class="label js-subtotal" >
                                                <span id="quantity"> <?=($sl>0)?$sl:'0'?></span> Sản Phẩm
                                            </span>
                                            <span class="value" >
                                                
                                            </span>
                                        </div>
                                        <div class="cart-summary-line" id="cart-subtotal-shipping">
                                        
                                            <div><small class="value"></small></div>
                                        </div>
                                    </div>



                                    <hr class="separator">
                                    <div class="card-block ">


                                        <div class="cart-summary-line cart-total">
                                            <span class="label">Tổng Tiền </span>
                                            <span class="value" id="total"><?=$this->lib->forMatTien($tongtien)?> đ</span>
                                        </div>



                                    </div>
                                    <hr class="separator">



                                </div>




                                <div class="checkout cart-detailed-actions card-block">
                                    <div class="text-sm-center">
                                        <a 
                                           href="<?=ROOT_URL.'/checkout'?>" class="btn btn-primary" >Tiến Hành Thanh Toán</a>

                                    </div>
                                </div>



                            </div>



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
        </div>



    </div>
    </div>



    </div>

</section>



<div class="container">
    <div id="_mobile_left_column" class=""></div>
    <div id="_mobile_right_column" class=""></div>
    <div class="clearfix"></div>
</div>
