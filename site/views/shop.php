<?php
// Product listing view used by Home::cat() for search results and category pages
// Expects: $ProductList (array), $Pagination (html), $TotalProduct (int)
?>
<section id="wrapper">
    <div class="container">
        <div class="row">
         
            <!-- Main Content -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="content-wrapper">
                    <div class="kkproductsblock-container">
                        <div class="producttab">
                            <h2 class="kk-title">Kết quả tìm kiếm</h2>
                            <?php if(isset($_GET['q'])) { ?>
                            <p class="search-tag">Từ khóa: "<?=htmlspecialchars($_GET['q'])?>"</p>
                            <?php } ?>
                        </div>

                        <div class="product_content">
                            <div class="tab-content">
                                <div class="tab-pane fadeIn animated active">
                                    <div class="block_content_search"><?php 
                                    if (!empty($ProductList)) {
                                        foreach ($ProductList as $row) {
                                            if(is_file(PATH_IMG_SITE.explode(",",$row['image_list'])[0])){
                                                $img = PATH_IMG_SITE.explode(",",$row['image_list'])[0];
                                            } else {
                                                $img = PATH_IMG_SITE.'logo.png';
                                            }
                                            if(is_file(PATH_IMG_SITE.explode(",",$row['image_list'])[1])){
                                                $imgCover = PATH_IMG_SITE.explode(",",$row['image_list'])[1];
                                            } else {
                                                $imgCover = $img;
                                            }
                                            
                                            $price = isset($row['price']) ? $row['price'] : 0;
                                            $new = '';
                                            $discount = '';
                                            $giaDiscount = '';
                                            
                                            if(isset($row['new']) && $row['new'] == 1) {
                                                $new = '<li class="product-flag new">New</li>';
                                            }
                                            
                                            if(isset($row['discount']) && $row['discount'] > 0) {
                                                $discount = '<li class="product-flag discount">'.$row['discount'].'%</li>';
                                                $giaDiscount = '<div class="product-price-and-shipping">
                                                    <span class="sr-only">Regular price</span>
                                                    <span class="regular-price">'.$this->lib->forMatTien($price).' đ</span>
                                                    <span class="discount-percentage discount-product">-'.$row['discount'].'%</span>
                                                    <span class="sr-only">Price</span>
                                                    <span itemprop="price" class="price">'.$this->lib->forMatTien($price - ($row['discount']*$price)/100).' đ</span>
                                                </div>';
                                            } else {
                                                $giaDiscount = '<div class="product-price-and-shipping">
                                                    <span class="sr-only">Price</span>
                                                    <span itemprop="price" class="price">'.$this->lib->forMatTien($price).' đ</span>
                                                </div>';
                                            }

                                            $name = htmlspecialchars($row['name']);
                                            $link = ROOT_URL."/san-pham-chi-tiet/".$row['slug'];
                                    ?>
                                        <div class="col-6 col-md-3 col-lg-3 mb-3">
                                            <article class="product-miniature js-product-miniature" data-id-product="<?=$row['id']?>" 
                                                data-id-product-attribute="0" itemscope itemtype="http://schema.org/Product">
                                                <div class="thumbnail-container">
                                                    <div class="product-inner">
                                                        <div class="thumbnail-inner">
                                                            <div class="inner">
                                                                <div class="product-img">
                                                                    <a href="<?=$link?>" class="thumbnail product-thumbnail">
                                                                        <img src="<?=$img?>" alt="<?=$name?>" 
                                                                            data-full-size-image-url="<?=$img?>" height="250">
                                                                        <img class="second_image img-responsive" src="<?=$imgCover?>"
                                                                            alt="" title="" height="250" width="200" />
                                                                    </a>
                                                                </div>
                                                                <ul class="product-flags">
                                                                    <?=$discount?>
                                                                    <?=$new?>
                                                                </ul>
                                                            </div>
                                                            <div class="kkproducthover">
                                                                <div class="quick-view-block">
                                                                    <a href="<?=$link?>" class="btn" title="Quick view"></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-description">
                                                            <h3 class="h3 product-title" itemprop="name">
                                                                <a href="<?=$link?>"><?=$name?></a>
                                                            </h3>
                                                            <?=$giaDiscount?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    <?php }
                                    } else { ?>
                                        <div class="col-12">
                                            <div class="alert alert-info">Không có sản phẩm phù hợp.</div>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if (isset($Pagination) && $Pagination) { ?>
                        <!-- <div class="row mt-4">
                            <div class="col-12">
                                <nav class="pagination">
                                    <div class="col-md-12 col-xs-12 pagination-kkbtn">
                                        <ul class="page-list clearfix text-center">
                                            <?=$Pagination?>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div> -->
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.block_content_search{
    display: flex;
      flex-wrap: wrap;
    justify-content: flex-start; /* luôn căn trái */
}
#kkproductsblock .kkproductsblock-container .kk-title, .producttab .kk-title {
    margin: 3rem 0 0px 0;
    padding: 0 0 0 10px;
    }
</style>
