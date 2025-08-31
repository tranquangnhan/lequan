<aside id="notifications">
    <div class="container">



    </div>
</aside>

<div class="container">
    <div class="row ">
        
        <div class="col-md-3" id="danhmucdoc">
            <div class="card" style="width: 100%;">
                <div class="card-header" style="background-color: var(--it-brand-primary); color: white;">
                    SẢN PHẨM
                </div>
                <ul class="list-group list-group-flush">
                    <?php
                        foreach ($getMenuParentdoc as $row) {
                            echo '<li class="list-group-item">
                            <a href="#">'.$row['name'].'
                                
                            </a>';
                            $getMenuchilddoc = $this->model->showDmCondoc($row['id']);
                            if($getMenuchilddoc){
                                echo '<div class="pro_already">
                                <ul>';
                                foreach ($getMenuchilddoc as $row) {
                                    $link = ROOT_URL."/hang/".$row['slug']."-".$row['hangcosan']."/trang-1";
                                    echo '<li><a href="'.$link.'">'.$row['name'].'</a>';
                                    // show danh mục con cấp 3
                                    $getMenuchilddoc1 = $this->model->showDmCondoc($row['id']);
                                    if($getMenuchilddoc1){
                                        echo '<div class="pro_already1">
                                        <ul>';
                                        foreach ($getMenuchilddoc1 as $row) {
                                            $link = ROOT_URL."/hang/".$row['slug']."-".$row['hangcosan']."/trang-1";
                                            echo '<li><a href="'.$link.'">'.$row['name'].'</a>';
                                                 // show sản phẩm của danh mục
                                                $probybrand = $this->model->getProByBrand($row['slug'].'-'.$row['hangcosan'],$row['hangcosan']);
                                                if($probybrand){
                                                    echo '<div class="pro_already2">
                                                    <ul>';
                                                    foreach ($probybrand as $row) {
                                                        $link = ROOT_URL."/san-pham-chi-tiet/".$row['slug'];
                                                        echo '<li><a href="'.$link.'">'.$row['name'].'</a></li>';
                                                    }
                                                    echo '</ul></div>';
                                                }
                                            echo '</li>';
                                        }
                                        echo '</ul></div>';
                                    }
                                    
                                   
                                    echo '</li>';
                                }
                                echo '</ul></div>';
                            }
                            echo ' </li>';
                        }
                    ?>
                    
                </ul>
                
            </div>
            
        </div>
        
        <div class="col-md-9 ">
        <div id="top_column">
    <div class="kkimgslider clearfix ">
        <div class="flexslider" data-interval="5000" data-pause="hover">
            <ul class="slides">
                <li class="slide">

                    <a href="<?=ROOT_URL?>/san-pham/tat-ca/trang-1"
                        title="kslider-1">
                        <img src="<?=PATH_IMG_SITE.$banner[0]['bannerImage']?>" alt="kslider-1" title="KSlider1" />
                    </a>

                </li>
                <li class="slide">

                    <a href="<?=ROOT_URL?>/san-pham/tat-ca/trang-1"
                        title="kslider-2">
                        <img src="<?=PATH_IMG_SITE.$banner[1]['bannerImage']?>" alt="kslider-2" title="KSlider2" />
                    </a>

                </li>
                <li class="slide">
                    <a href="<?=ROOT_URL?>/san-pham/tat-ca/trang-1"
                        title="kslider-3">
                        <img src="<?=PATH_IMG_SITE.$banner[2]['bannerImage']?>" alt="kslider-3" title="KSlider3" />
                    </a>
                </li>
             
            </ul>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
<div id="Home_top">
    <div class="container">
        <div class="kk_banner hb-animate-element  bottom-to-top clearfix ">
            <div class="row">
                <div class="center-banner list-unstyled">
                    <div class="slider banner2 col-lg-4 col-md-12">
                        <a href="<?=ROOT_URL?>/san-pham/tat-ca/trang-1" class="kk-customhover-fadeintopbottom">
                            <img src="<?=PATH_IMG_SITE.$banner[3]['bannerImage']?>" alt="kbanner-1"
                                class="img-responsive center-block" />
                        </a>
                        <div class="overlay"></div>
                    </div>

                    <div class="slider banner2  col-lg-4 col-md-12">
                        <a href="<?=ROOT_URL?>/san-pham/tat-ca/trang-1" class="kk-customhover-fadeintopbottom">
                            <img src="<?=PATH_IMG_SITE.$banner[4]['bannerImage']?>" alt="kbanner-2"
                                class="img-responsive center-block" />
                        </a>
                        <div class="overlay"></div>
                    </div>
                    <div class="slider banner2  col-lg-4 col-md-12">
                        <a href="<?=ROOT_URL?>/san-pham/tat-ca/trang-1" class="kk-customhover-fadeintopbottom">
                            <img src="<?=PATH_IMG_SITE.$banner[5]['bannerImage']?>" alt="kbanner-3"
                                class="img-responsive center-block" />
                        </a>
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="kkproductsblock" class="clearfix hb-animate-element bottom-to-top">
            <div class="kkproductsblock-container">
                <div class="producttab">
                    <h2 class="kk-title">Sản phẩm hot</h2>

                    <ul id="kkproductstab" class="nav nav-tabs clearfix">
                        <li class="nav-item first_item">
                            <a class="nav-link active" href="#featured-products-block" data-toggle="tab">Đặc sắc</h2></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="#new-products-block" data-toggle="tab">Mới nhất</h2></a>
                        </li>
                        <li class="nav-item last_item">
                            <a class="nav-link " href="#bestseller-products-block" data-toggle="tab">Bán chạy</h2></a>
                        </li>
                    </ul>
                </div>

                <div class="product_content ">
                    <div class="tab-content">

                        <div id="featured-products-block" class="tab-pane fadeIn animated active">
                            <div class="block_content row">
                                <div id="kk-featured-products" class="owl-carousel owl-loaded owl-drag">
                                    <?php
                                        foreach ($getAllProAsc as $row){
                                          if(is_file(PATH_IMG_SITE.explode(",",$row['image_list'])[0])){
                                            $img = PATH_IMG_SITE.explode(",",$row['image_list'])[0];
                                        }else{
                                            $img = PATH_IMG_SITE.'logo.png';
                                        }
                                        if(is_file(PATH_IMG_SITE.explode(",",$row['image_list'])[1])){
                                            $imgCover = PATH_IMG_SITE.explode(",",$row['image_list'])[1];
                                        }else{
                                            $imgCover =  PATH_IMG_SITE.explode(",",$row['image_list'])[0];
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
                                            $giaDiscount = '';
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
                        <div id="new-products-block" class="tab-pane fadeIn animated ">
                            <div class="block_content row">
                                <div id="kk-featured-products" class="owl-carousel">
                                    <?php
                                        foreach ($getAllByHotAsc as $row){
                                          if(is_file(PATH_IMG_SITE.explode(",",$row['image_list'])[0])){
                                            $img = PATH_IMG_SITE.explode(",",$row['image_list'])[0];
                                        }else{
                                            $img = PATH_IMG_SITE.'logo.png';
                                        }
                                        if(is_file(PATH_IMG_SITE.explode(",",$row['image_list'])[1])){
                                          $imgCover = PATH_IMG_SITE.explode(",",$row['image_list'])[1];
                                        }else{
                                            $imgCover =  PATH_IMG_SITE.explode(",",$row['image_list'])[0];
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
                                            $giaDiscount = '';
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
                        <div id="bestseller-products-block" class="tab-pane fadeIn animated ">
                            <div class="block_content row">
                                <div id="kk-featured-products" class="owl-carousel">
                                    <?php
                                        foreach ($getAllByBuyed as $row){
                                          if(is_file(PATH_IMG_SITE.explode(",",$row['image_list'])[0])){
                                            $img = PATH_IMG_SITE.explode(",",$row['image_list'])[0];
                                        }else{
                                            $img = PATH_IMG_SITE.'logo.png';
                                        }
                                        if(is_file(PATH_IMG_SITE.explode(",",$row['image_list'])[1])){
                                          $imgCover = PATH_IMG_SITE.explode(",",$row['image_list'])[1];
                                        }else{
                                            $imgCover =  PATH_IMG_SITE.explode(",",$row['image_list'])[0];
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
                                            $giaDiscount = '';
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
                    </div>
                </div>
            </div>
        </div>
        <div id="kkparallaxcms" class="parallax parallaxcms-outer hb-animate-element bottom-to-top "
            data-source-url="<?=PATH_IMG_SITE.$banner[6]['bannerImage']?>">
            <div class="container">
                <div class="parallaxcms-inner container">
                    <div class="parallaxcms">
                        <div class="parallax-inner">

                            <div class="parallax-caption1 ">Thời trang và hàng hiệu</div>
                            <div class="parallax-caption2 ">Sản phẩm được chọn lọc những phiên bản cao cấp và tốt nhất
                            </div>
                            <div class="parallax-btn "><a href="<?=ROOT_URL?>/san-pham/tat-ca/trang-1" class="shopnow-button">Mua ngay</a></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="container infinityspecial-products hb-animate-element bottom-to-top  clearfix">

            <h3 class="kk-title">Sản phẩm đặc biệt</h3>

            <div class="kkspecial-list bottom-to-top hb-animate-element">
                <div class="row">
                    <div id="infinityspecial-carousel" class="owl-carousel">
                        <?php 
                          foreach ($getAllProSpecial as $row) {
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
                                $giaDiscount = '';
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
    </div>
</div>





<section id="wrapper">


    <div class="container">
        <div class="row">




            <div id="content-wrapper" class="col-xs-12">



                <section id="main">







                    <section id="content" class="page-home">





                        
                        <div class="col-lg-12 col-xs-12 kk_banner clearfix hb-animate-element bottom-to-top">
                            <div class="kk_sub_banner row">
                                <div class="slider banner1  col-lg-4 col-xs-12 hb-animate-element bottom-to-top">
                                    <div  class="kk-customhover-fadeintopbottom" title="This is Caption">
                                        <div class="kkmultibanner-hover">
                                            <img src="<?=PATH_IMG_SITE.$banner[7]['bannerImage']?>" class="img-responsive"
                                                alt="This is Caption" />
                                                
                                        </div>
                                        <div class="image_cate">
                                            <h4 class="display-4" >QUẦN ÁO</h4>
                                            <p></p>
                                            <a href="<?=ROOT_URL?>/danh-muc/quan-ao-7/trang-1" class="btn btn-light">XEM THÊM</a>
                                        </div>
                                        
                                    </div>
                                </div><div class="slider banner1  col-lg-4 col-xs-12 hb-animate-element bottom-to-top">
                                    <div  class="kk-customhover-fadeintopbottom" title="This is Caption">
                                        <div class="kkmultibanner-hover">
                                            <img src="<?=PATH_IMG_SITE.$banner[8]['bannerImage']?>" class="img-responsive"
                                                alt="This is Caption" />
                                                
                                        </div>
                                        <div class="image_cate">
                                            <h4 class="display-4" >GIÀY</h4>
                                            <p></p>
                                            <a href="<?=ROOT_URL?>/danh-muc/giay-6/trang-1" class="btn btn-light">XEM THÊM</a>
                                        </div>
                                        
                                    </div>
                                </div><div class="slider banner1  col-lg-4 col-xs-12 hb-animate-element bottom-to-top">
                                    <div  class="kk-customhover-fadeintopbottom" title="This is Caption">
                                        <div class="kkmultibanner-hover">
                                            <img src="<?=PATH_IMG_SITE.$banner[9]['bannerImage']?>" class="img-responsive"
                                                alt="This is Caption" />
                                                
                                        </div>
                                        <div class="image_cate">
                                            <h4 class="display-4" >PHỤ KIỆN</h4>
                                            <p></p>
                                            <a href="<?=ROOT_URL?>/danh-muc/phu-kien-8/trang-1" class="btn btn-light">XEM THÊM</a>
                                        </div>
                                        
                                    </div>
                                </div>
                                



                            </div>
                        </div>
                    </section>

                    <!-- Footer Start-->
                </section>
                <footer class="page-footer">

                    <!-- Footer content -->

                </footer>
</section>
</div>
</div>
</div>
</div>
</div>
</section>


<div id="bottom_home">
    <section id="itspecialdeals" class="container featured-products clearfix mt-3 hb-animate-element bottom-to-top">

        <h2 class="kk-title">Kinh doanh trong ngày</h2>

        <div id="itspecialdeals-carousel" class="owl-carousel products collapse data-toggler">
                  
             <?php
              foreach ($getAllProByDeal as $row) {
                if(is_file(PATH_IMG_SITE.explode(",",$row['image_list'])[0])){
                  $img = PATH_IMG_SITE.explode(",",$row['image_list'])[0];
              }else{
                  $img = PATH_IMG_SITE.'logo.png';
              }
              if(is_file(PATH_IMG_SITE.explode(",",$row['image_list'])[1])){
                $imgCover = PATH_IMG_SITE.explode(",",$row['image_list'])[1];
            }else{
                $imgCover =  PATH_IMG_SITE.explode(",",$row['image_list'])[0];
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
                $giaDiscount = '';
            }
            
                $name = $row['name'];
            
                $link = ROOT_URL."/san-pham-chi-tiet/".$row['slug'];
                echo '<article class="product-miniature js-product-miniature " data-id-product="17" data-id-product-attribute="46"
                itemscope itemtype="http://schema.org/Product">
                <div class="thumbnail-container">
                    <div class="product-inner col-xs-12">
                        <div class="thumbnail-inner col-xs-12 col-sm-4">
                            <div class="inner">

                                <div class="product-img">

                                    <a href="'.$link.'"
                                        class="thumbnail product-thumbnail ">

                                        <img src="'.$img.'" alt="Pellentesque augue"
                                            data-full-size-image-url="'.$img.'" class="img-deal" width="200" height="200">
                                        <img class="second_image img-responsive" width="200" height="200"
                                            src="'.$imgCover.'" alt="" title="" />
                                    </a>

                                </div>
                            </div>

                            <div class="kkproducthover">
              

                            </div>
                        </div>


                        <div class="product-description col-xs-12 col-sm-8">

                            <h3 class="h3 product-title" itemprop="name"><a
                                    href="'.$link.'">'.$name.'</a></h3>



                            '.$giaDiscount.'

                            <p class="product-desc" itemprop="description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris
                                eleifend, quam a vulputate dictum, massa quam dapibus leo.
                            </p>



                        </div>
                    
                    </div>
                </div>
            </article>';
              }
             ?>             
            


        </div>

    </section>



    <div class="kkmanufacturer container hb-animate-element bottom-to-top clearfix">

        <h3 class="kk-title">Thương hiệu phổ biến</h3>


        <div class="block_content row">
            <div id="kkbrandlogo" class="owl-carousel">
                <div class="items">
                    <div class="image-container">
                        <a href="#"
                            title="Manufacture3">
                            <img src="views/assets/img/nike-logo.jpg" alt="Manufacture3" />
                        </a>
                    </div>
                </div>
                <div class="items">
                    <div class="image-container">
                        <a href="#"
                            title="Manufacture4">
                            <img src="views/assets/img/adidas-logo.jpg" alt="Manufacture4" />
                        </a>
                    </div>
                </div>
                <div class="items">
                    <div class="image-container">
                        <a href="#"
                            title="Manufacture4">
                            <img src="views/assets/img/logo-chanel.jpg" alt="Manufacture4" />
                        </a>
                    </div>
                </div>
                <div class="items">
                    <div class="image-container">
                        <a href="#"
                            title="Manufacture4">
                            <img src="views/assets/img/logo-dior.png" alt="Manufacture4" />
                        </a>
                    </div>
                </div>
                <div class="items">
                    <div class="image-container">
                        <a href="#"
                            title="Manufacture4">
                            <img src="views/assets/img/logo-gucci.png" alt="Manufacture4" />
                        </a>
                    </div>
                </div>
                <div class="items">
                    <div class="image-container">
                        <a href="#"
                            title="Manufacture4">
                            <img src="views/assets/img/logo-jordan.png" alt="Manufacture4" />
                        </a>
                    </div>
                </div>
                <div class="items">
                    <div class="image-container">
                        <a href="#"
                            title="Manufacture4">
                            <img src="views/assets/img/logo-louis-vuitton.jpg" alt="Manufacture4" />
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>