<?php 
if(is_array($sp)){
  $avt = PATH_IMG_SITE.explode(",",$sp['image_list'])[0];
  
  ?>

<aside id="notifications">
    <div class="container">

    </div>
</aside>

<section id="wrapper">


    <div class="container">
        <div class="row">
            <div id="content-wrapper" class="col-xs-12 mobile-rp" style="margin-top:2rem">



                <section id="main" itemscope itemtype="https://schema.org/Product">
                <link rel="stylesheet" href="views/assets/css/custom-product.css">
                <link rel="stylesheet" href="views/assets/css/product-media.css">
                <script src="views/assets/js/product-media.js" defer></script>
                <link rel="stylesheet" href="views/assets/css/product-media.css">
                <script src="views/assets/js/product-media.js" defer></script>
                <link rel="stylesheet" href="views/assets/css/product-media.css">
                
                    <meta itemprop="url"
                        content="#">

                    <div class="row">
                        <div class="col-xs-12 col-md-5">

                            <section class="page-content" id="content">
                                <!-- <ul class="product-flags">
                                    <li class="product-flag new">New</li>
                                </ul>  -->
                                <div class="images-container">

                                    <div class="product-cover">


                                        <img id="zoom" class="js-qv-product-cover zoomLens imgdetail main-product-image"
                                            src="<?=$avt?>"
                                            alt="" title="" style="min-height:350px; width:100%" itemprop="image">

                                        <div class="layer hidden-sm-down" data-toggle="modal"
                                            data-target="#product-modal">
                                            <i class="material-icons zoom-in">&#xE8FF;</i>
                                        </div>


                                    </div>



                                    <div class="js-qv-mask mask">
                                        <ul class="product-images js-qv-product-images">
                                            <?php
                                              $allImgSp = explode(",",$sp['image_list']);
                                              $videoLinks = !empty($sp['videoLinks']) ? json_decode($sp['videoLinks'], true) : [];
                                              
                                              // Display images
                                              for ($i=0; $i < count($allImgSp); $i++) { 
                                                  $imgdetail[] = PATH_IMG_SITE.$allImgSp[$i];
                                                  if(is_file($imgdetail[$i])){
                                                      $imgdetail[$i] = $imgdetail[$i];
                                                  }else{
                                                      $imgdetail[$i] = '../view/images/logo.jpg';
                                                  }
                                                  echo '<li class="thumb-container">
                                                        <img class="thumb js-thumb'.($i==0? ' selected':'').'" data-image-large-src="'.$imgdetail[$i].'"
                                                                src="'.$imgdetail[$i].'"
                                                                alt="" title="" width="100" height="120" itemprop="image">
                                                    </li>';
                                              }

                                              // Display video thumbnails
                                              if (!empty($videoLinks)) {
                                                  foreach ($videoLinks as $videoUrl) {
                                                      if (strpos($videoUrl, 'youtube') !== false || strpos($videoUrl, 'youtu.be') !== false) {
                                                          preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $videoUrl, $matches);
                                                          if (!empty($matches[1])) {
                                                              $videoId = $matches[1];
                                                              echo '<li class="thumb-container video-thumb" data-video-type="youtube" data-video-id="'.$videoId.'">
                                                                    <img class="thumb" src="https://img.youtube.com/vi/'.$videoId.'/mqdefault.jpg"
                                                                         alt="Video Thumbnail" width="100" height="120">
                                                                    <span class="video-play-icon">▶</span>
                                                                  </li>';
                                                          }
                                                      } elseif (strpos($videoUrl, 'tiktok.com') !== false) {
                                                          preg_match('/\/video\/(\d+)/', $videoUrl, $matches);
                                                          if (!empty($matches[1])) {
                                                              echo '<li class="thumb-container video-thumb" data-video-type="tiktok" data-video-id="'.$matches[1].'">
                                                                    <div class="tiktok-thumb">TikTok Video</div>
                                                                    <span class="video-play-icon">▶</span>
                                                                  </li>
                                                                  
                                                                  ';
                                                          }
                                                      }
                                                  }
                                              }
                                            ?>
                                            
                                        </ul>
                                    </div>

                                </div>


                                <div class="scroll-box-arrows">
                                    <i class="material-icons left">&#xE314;</i>
                                    <i class="material-icons right">&#xE315;</i>
                                </div>


                            </section>

                        </div> 
                         <div class="col-xs-12 col-md-7">
                            <h1 class="h1 kk-producttitle" itemprop="name"><?php  echo $sp['name'];?></h1>

                            <?php if($sp['price'] == 0 || $sp['price'] ==''){?>
                                <div class="product-prices">

                                <div class="product-price h5 " itemprop="offers" itemscope
                                    itemtype="https://schema.org/Offer">
                                    <link itemprop="availability" href="https://schema.org/InStock" />
                                    <meta itemprop="priceCurrency" content="USD">

                                </div>

                                <div class="tax-shipping-delivery-label">


                                </div>
                            </div>


                            <div class="product-information">


                                <div class="product-actions">

            

                                
                                        <section class="product-discounts">
                                        </section>


                                              
                                        <div class="product-add-to-cart">
                                            


                                            <div class="product-quantity clearfix">
                                           
                                                <div class="add">
                                                    <input type="hidden" id="sp" value="<?=$sp['id']?>">
                                                    <button class="btn btn-primary " onclick="contact()">
                                                       Liên hệ để đặt hàng
                                                    </button>
                                                </div>


                                            </div>



                                            <span id="product-availability">
                                                <i class="material-icons rtl-no-flip product-available">&#xE5CA;</i>
                                               Trong kho
                                            </span>



                                            <p class="product-minimal-quantity">
                                            </p>

                                        </div>
                            <?php }else{ ?>
                            <div class="product-prices">

                                <div class="product-price h5 " itemprop="offers" itemscope
                                    itemtype="https://schema.org/Offer">
                                    <link itemprop="availability" href="https://schema.org/InStock" />
                                    <meta itemprop="priceCurrency" content="USD">

                                    <div class="current-price">
                                        <?php
                                        if($sp['discount']>0){
                                        ?>
                                        <span itemprop="price" content="32.89" style="font-size:13pt;text-decoration:line-through"><?=$this->lib->forMatTien($sp['price'])?> đ</span><br>
                                        <span itemprop="price" content="32.89" style="color:var(--it-brand-primary)"><?=$this->lib->forMatTien($sp['price'] - ($sp['discount']*$sp['price'])/100); ?> đ</span>
                                       
                                         <?php }
                                        else{?>
                                            <span itemprop="price" content="32.89" style="color:var(--it-brand-primary)"><?=$this->lib->forMatTien($sp['price']); ?> đ</span>
                                        <?php   } ?>
                                    </div>



                                </div>

                                <div class="tax-shipping-delivery-label">


                                </div>
                            </div>


                            <div class="product-information">


                                <div class="product-actions">

            

                                        <div class="product-variants">
                                          <?php 
                                            if($sp['size']){
                                                $size = explode(',',$sp['size']);
                                                $kq .= ' <div class="clearfix product-variants-item">
                                            <span class="control-label">Kích cỡ</span>
                                            <select class="form-control form-control-select" id="group_1"
                                                data-product-attribute="1" name="group[1]">';
                                              foreach ($size as $row) {
                                                $kq .= '<option value="'.$row.'" title="M" selected="selected">'.$row.'</option>';
                                              }
                                              $kq .='   </select> </div>';
                                              echo $kq;
                                            }
                                            
                                          ?>
                                          <!-- size -->
                                          <?php 
                                              if($sp['color']){
                                                  $color = explode(',',$sp['color']);
                                                  $kq1 .= '<div class="clearfix product-variants-item">
                                                  <span class="control-label">Màu</span>
                                                  <ul id="group_2">';
                                                foreach ($color as $row) {
                                                  $kq1 .= ' <li class="float-xs-left input-container">
                                                              <label>
                                                                  <input class="input-color" type="radio" data-product-attribute="2" name="group[2]" value="'.$row.'">
                                                                  <span class="color" id="color" style="background-color:'.$row.'"><span
                                                                          class="sr-only">'.$row.'</span></span>
                                                              </label>
                                                          </li>';
                                                }
                                                $kq1 .='   </ul>
                                                        </div>';
                                                echo $kq1;
                                              }
                                              // color
                                            ?>
                                         
                                    <script src="views/assets/js/custom-product.js"></script>
                                        </div>
                                            




                                        <section class="product-discounts">
                                        </section>


                                              
                                        <div class="product-add-to-cart">
                                            <span class="control-label">Số lượng</span>


                                            <div class="product-quantity clearfix">
                                                <div class="qty">
                                                    <input type="number" name="qty" id="quantity_wanted" value="1"
                                                        class="input-group" min="1" aria-label="Quantity">
                                                </div>

                                                <div class="add">
                                                    <button class="btn btn-primary add-to-cart"
                                                         onclick="return addCart(<?= $sp['id'] ?>)">
                                                       
                                                         Thêm giỏ hàng
                                                    </button>
                                                       <button id="openBookingBtn" class="btn-open">Đặt lịch thử giày</button>
                                                </div>


                                            </div>



                                            <span id="product-availability">
                                                <i class="material-icons rtl-no-flip product-available">&#xE5CA;</i>
                                                Trong kho
                                            </span>

                                          


                                            <p class="product-minimal-quantity">
                                            </p>

                                        </div>
                                 <?php }?>


                                        <div class="product-additional-info">


                                            <div class="social-sharing">
                                                Chia sẻ 
                        
                                                  <div class="social-icons">
                                                     <?php 
                                                    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                                    ?>
                                                    <!-- Zalo -->
                                                    <a href="http://www.facebook.com/sharer.php?u=<?=$actual_link?>" target="_blank" class="zalo-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" viewBox="0 0 48 48">
                                                        <path d="M24 4C12.96 4 4 12.96 4 24c0 11.04 8.96 20 20 20 11.04 0 20-8.96 20-20 0-11.04-8.96-20-20-20zm0 2c9.94 0 18 8.06 18 18s-8.06 18-18 18S6 33.94 6 24 14.06 6 24 6z"/>
                                                        <text x="50%" y="60%" text-anchor="middle" fill="white" font-size="14" font-family="Arial" font-weight="bold">Z</text>
                                                    </svg>
                                                    Zalo
                                                    </a>

                                                    <!-- Facebook -->
                                                    <a href="http://www.facebook.com/sharer.php?u=<?=$actual_link?>" target="_blank" class="fb-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" viewBox="0 0 48 48">
                                                        <path d="M24 4C12.95 4 4 12.95 4 24c0 10.1 7.45 18.45 17.1 19.85V30.3h-5.15v-6.3h5.15v-4.65c0-5.05 3-7.8 7.55-7.8 2.15 0 4.4.4 4.4.4v4.85h-2.5c-2.45 0-3.2 1.5-3.2 3.05v4.15h5.45l-.9 6.3h-4.55v13.55C36.55 42.45 44 34.1 44 24c0-11.05-8.95-20-20-20z"/>
                                                    </svg>
                                                    Facebook
                                                    </a>
                                                </div>
                                            </div>


                                        </div>


                                </div>


                                <div id="block-reassurance">
                                    <ul>
                                        <li>
                                            <div class="block-reassurance-item">
                                                <img src="views/assets/img/ic_verified_user_black_36dp_1x.png"
                                                    alt="Security policy (edit with Customer reassurance module)">
                                                <span class="h6">Bảo hành keo vĩnh viễn</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="block-reassurance-item">
                                                <img src="views/assets/img/ic_local_shipping_black_36dp_1x.png"
                                                    alt="Delivery policy (edit with Customer reassurance module)">
                                                <span class="h6">Giao hàng tận nơi, nhận hàng xong thanh toán</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="block-reassurance-item">
                                                <img src="views/assets/img/ic_swap_horiz_black_36dp_1x.png"
                                                    alt="Return policy (edit with Customer reassurance module)">
                                                <span class="h6">Đổi trả dễ dàng<br>(trong vòng 7 ngày nếu lỗi nhà sản xuất)</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="product-tab">

                        <div class="tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#description" role="tab"
                                        aria-controls="description" aria-selected="true">Mô tả</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#product-details" role="tab"
                                        aria-controls="product-details"></a>
                                </li> -->
                            </ul>

                            <div class="tab-content" id="tab-content">
                                <div class="tab-pane fade in active" id="description" role="tabpanel">

                                    <div class="product-description">
                                        <p>
                                            <?php  echo $sp['description']; ?>
                                        </p>
                                    </div>

                                </div>


                                <div class="tab-pane fade" id="product-details"
                                    data-product=""
                                    role="tabpanel">
                                    <div class="product-description">
                                        <p>
                                            <?php  echo $sp['properties']; ?>
                                        </p>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>





                    <section class="container  hb-animate-element bottom-to-top ">

                   <div class="producttab">
                    <h2 class="kk-title">Sản phẩm liên quan</h2>

                   
                 </div>

                    <div class="kkspecial-list bottom-to-top hb-animate-element">
                        <div class="row">
                            <div id="infinityspecial-carousel" class="owl-carousel">
                                <?php 
                                // Gợi ý sản phẩm dựa vào hành vi người dùng
                                $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
                                $currentProductId = isset($sp['id']) ? $sp['id'] : null;
                                $getRecommendedProducts = $this->model->getRecommendedProducts($userId, $currentProductId);
                                // print_r($getRecommendedProducts);
                                // die();
                                foreach ($getRecommendedProducts as $row) {
                                    if(is_file(PATH_IMG_SITE.explode(",",$row['image_list'])[0])){
                                        $img = PATH_IMG_SITE.explode(",",$row['image_list'])[0];
                                    }else{
                                        $img = PATH_IMG_SITE.'logo.png';
                                    }
                                    if(is_file(PATH_IMG_SITE.explode(",",$row['image_list'])[1])){
                                        $imgCover = PATH_IMG_SITE.explode(",",$row['image_list'])[1];
                                    }else{
                                        $imgCover = PATH_IMG_SITE.explode(",",$row['image_list'])[0];
                                    }
                                    if($row['new'] == 1){
                                    $new = ' <li class="product-flag new">New</li>';
                                    }else{
                                    $new = '';
                                    }
                                    $price = $row['price'];
                                    if($row['discount'] > 0){
                                
                                        $discount = ' <li class="product-flag discount">'.$row['discount'].'%</li>';
                                        $giaDiscount = ' <div class="product-price-and-shipping">
                            
                                                        <span class="sr-only">Regular price</span>
                                                        <span class="regular-price">'.$this->lib->forMatTien($price).' đ</span>
                                                        <span class="discount-percentage discount-product">-'.$row['discount'].'%</span>
                            
                            
                                                        <span class="sr-only">Price</span>
                                                        <span itemprop="price" class="price">'.$this->lib->forMatTien(($price - ($row['discount']*$price)/100)).' đ</span>
                                                    </div>';
                                        }else{
                                        $discount = '';
                                        $giaDiscount = '<div class="product-price-and-shipping">
                                
                            
                                                            <span class="sr-only">Price</span>
                                                            <span itemprop="price" class="price">'.$this->lib->forMatTien($price).' đ</span>
                            
                                                    </div>';
                                        }
                                    if($price<=0 ||$price =='' ){
                                        $giaDiscount = ' <span class="discount-percentage discount-product">contact</span>';
                                    }
                                        $name = $row['name'];
                                    
                                    $link = ROOT_URL."/san-pham-chi-tiet/".$row['slug'];
                                    echo '<div class="kktab-block">
                                    <article class="product-miniature js-product-miniature " data-id-product="17"
                                    data-id-product-attribute="46" itemscope itemtype="http://schema.org/Product">
                                    <div class="thumbnail-container">
                                        <div class="product-inner">
                                            <div class="thumbnail-inner">
                                                <div class="inner">

                                                    <div class="product-img">

                                                        <a href="'. $link.'"
                                                            class="thumbnail product-thumbnail">

                                                            <img src="'. $img.'"
                                                                alt="Pellentesque augue"
                                                                data-full-size-image-url="'. $img.'" height="250" >
                                                            <img class="second_image img-responsive"
                                                                src="'. $imgCover.'"
                                                                alt="" title="" height="250" width="200" />
                                                        </a>
                                                    </div>
                                                    <ul class="product-flags">
                                                        '.$discount.'
                                                        '.$new.'
                                                        
                                                    </ul>

                                                </div>

                                                <div class="kkproducthover">
                                        
                                                    <div class="quick-view-block">
                                                        <a href="'. $link.'" class=" btn" 
                                                            title="Quick view">
                                                        
                                                        </a>
                                                    </div>


                                                </div>
                                            </div>


                                            <div class="product-description">


                                                <h3 class="h3 product-title" itemprop="name"><a
                                                        href="'. $link.'">'.$name.'</a></h3>


                                                '.$giaDiscount.'


                                            </div>
                        

                                        </div>
                                    </div>
                                </article>
                                </div>';
                                }
                                ?>


                            </div>
                        </div>
                    </div>
                    </section>



                    <div class="modal fade js-product-images-modal" id="product-modal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <figure>
                                        <img class="js-modal-product-cover product-cover-modal" width="771"
                                            src="<?=$img?>"
                                            alt="" title="" itemprop="image">
                                        <figcaption class="image-caption">

                                            <div id="product-description-short" itemprop="description">
                                                <p><span
                                                        style="font-size:10pt;font-family:Arial;font-weight:normal;font-style:normal;color:#000000;">Printed
                                                        on rigid paper with matt finish and smooth surface.</span></p>
                                            </div>

                                        </figcaption>
                                    </figure>
                                    <aside id="thumbnails" class="thumbnails js-thumbnails text-sm-center">

                                        <div class="js-modal-mask mask  nomargin ">
                                            <ul class="product-images js-modal-product-images">
                                                
                                                
                                                <?php
                                              $allImgSp = explode(",",$sp['image_list']);
                                              for ($i=0; $i < count($allImgSp); $i++) { 
                                                  $imgdetail[] = PATH_IMG_SITE.$allImgSp[$i];
                                                  if(is_file($imgdetail[$i])){
                                                      $imgdetail[$i] = $imgdetail[$i];
                                                  }else{
                                                      $imgdetail[$i] = '../view/images/logo.jpg';
                                                  }
                                                  echo '<li class="thumb-container">
                                                        <img data-image-large-src="'.$imgdetail[$i].'"
                                                            class="thumb js-modal-thumb"
                                                            src="'.$imgdetail[$i].'"
                                                            alt="" title="" width="370" itemprop="image">
                                                    </li>';
                                                }
                                                
                                            ?>
                                            </ul>
                                        </div>

                                    </aside>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    </section>
            </div>
        </div>
    </div>
</section>
                   <?php
}else{
    echo 'Sản phẩm này không có !';
}
?>

<script src="views/assets/js/product-media.js"></script>
<!-- Nút mở modal -->

<!-- Modal overlay -->
<div id="bookingModal" class="modal">
  <div class="modal-content">
    <span id="closeModal" class="close-btn">&times;</span>
    <form id="bookingForm">
      <!-- Hidden product ID -->
      <input type="hidden" name="idsanpham" id="idsanpham" value="">

      <h2>Đặt lịch thử</h2>

      <!-- Họ tên -->
      <div class="form-group">
        <label for="name">Họ và tên</label>
        <input type="text" id="name" name="name" placeholder="Nhập họ tên" required>
      </div>

      <!-- Số điện thoại -->
      <div class="form-group">
        <label for="phone">Số điện thoại</label>
        <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
      </div>

      <!-- Size muốn thử -->
      <div class="form-group">
        <label for="size">Size muốn thử</label>
        <input type="text" id="size" name="size" placeholder="Ví dụ: 39, M, L..." required>
      </div>

      <!-- Thời gian thử -->
      <div class="form-group">
        <label for="time">Thời gian thử</label>
        <input type="datetime-local" id="time" name="time" required>
      </div>

      <!-- Submit -->
      <button type="submit" class="btn-submit">Đặt lịch thử</button>
    </form>

    <!-- Đặt lịch qua MXH -->
    <div class="social-booking">
      <p>Hoặc đặt lịch qua:</p>
      <div class="social-icons">
        <!-- Zalo -->
        <a href="https://zalo.me/yourZaloID" target="_blank" class="zalo-btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" viewBox="0 0 48 48">
            <path d="M24 4C12.96 4 4 12.96 4 24c0 11.04 8.96 20 20 20 11.04 0 20-8.96 20-20 0-11.04-8.96-20-20-20zm0 2c9.94 0 18 8.06 18 18s-8.06 18-18 18S6 33.94 6 24 14.06 6 24 6z"/>
            <text x="50%" y="60%" text-anchor="middle" fill="white" font-size="14" font-family="Arial" font-weight="bold">Z</text>
          </svg>
          Zalo
        </a>

        <!-- Facebook -->
        <a href="https://m.me/yourFacebookPage" target="_blank" class="fb-btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" viewBox="0 0 48 48">
            <path d="M24 4C12.95 4 4 12.95 4 24c0 10.1 7.45 18.45 17.1 19.85V30.3h-5.15v-6.3h5.15v-4.65c0-5.05 3-7.8 7.55-7.8 2.15 0 4.4.4 4.4.4v4.85h-2.5c-2.45 0-3.2 1.5-3.2 3.05v4.15h5.45l-.9 6.3h-4.55v13.55C36.55 42.45 44 34.1 44 24c0-11.05-8.95-20-20-20z"/>
          </svg>
          Facebook
        </a>
      </div>
    </div>
  </div>
</div>



<script>
// Lấy id sản phẩm từ URL (nếu có)
const urlParams = new URLSearchParams(window.location.search);
document.getElementById("idsanpham").value = urlParams.get("idsanpham") || "";

// Modal logic
const modal = document.getElementById("bookingModal");
const openBtn = document.getElementById("openBookingBtn");
const closeBtn = document.getElementById("closeModal");

openBtn.onclick = () => {
  modal.style.display = "flex";

  // Set mặc định: ngày mai 09:00
  const timeInput = document.getElementById("time");
  const now = new Date();
  now.setDate(now.getDate() + 1); // ngày mai
  now.setHours(9,0,0,0); // 09:00
  timeInput.value = now.toISOString().slice(0,16);
};

closeBtn.onclick = () => modal.style.display = "none";
window.onclick = (e) => { if (e.target === modal) modal.style.display = "none"; };

// Submit form
document.getElementById("bookingForm").addEventListener("submit", function(e) {
  e.preventDefault();
  const data = {
    idsanpham: document.getElementById("idsanpham").value,
    name: document.getElementById("name").value,
    phone: document.getElementById("phone").value,
    size: document.getElementById("size").value,
    time: document.getElementById("time").value
  };
  console.log("Data gửi đi:", data);
  alert("Đặt lịch thử thành công!");
  modal.style.display = "none";
  this.reset();
});
</script>
