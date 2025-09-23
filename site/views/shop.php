<?php
// Product listing view used by Home::cat() for search results and category pages
// Expects: $ProductList (array), $Pagination (html), $TotalProduct (int)
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <h2 class="">Kết quả tìm kiếm</h2>
        </div>
    </div>

    <div id="kkproductsblock" class="clearfix hb-animate-element bottom-to-top">
			<div class="product_content ">
                    <div class="tab-content">

                     
                        <div id="new-products-block" class="tab-pane fadeIn animated ">
                            <div class="block_content row">
                                <div id="kk-featured-products" class="owl-carousel">
                            <?php if (!empty($ProductList)) {
                 
                                    foreach ($ProductList as $row){
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
								
                            
                       
                            } else { ?>
                                <div class="col-12">
                                    <div class="alert alert-info">Không có sản phẩm phù hợp.</div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($Pagination) && $Pagination) { ?>
    <!-- <div class="row">
        <div class="col-12">
            <nav class="pagination">
                <div class="col-md-8 col-xs-12 pr-0 pagination-kkbtn">
                    <ul class="page-list clearfix">
                        <?=$Pagination?>
                    </ul>
                </div>
            </nav>
        </div>
    </div> -->
    <?php } ?>
</div>