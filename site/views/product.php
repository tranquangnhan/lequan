<aside id="notifications">
    <div class="container">



    </div>
</aside>








<section id="wrapper">


    <div class="container">
        <div class="row">

            <div id="_desktop_left_column" class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                <div id="left-column" class="">




                    
                <div class="featured-products clearfix mt-3 hb-animate-element right-to-left hb-in-viewport ">

                <p class="text-uppercase h6 hidden-sm-down">Lọc Giá</p>


                <section class="facet clearfix">
                    <p class="h6 facet-title hidden-sm-down"></p>
                    <ul class="collapse">
                        <input type="hidden" id="hidden_minimum_price" value="1" />
                        <label for="customRange3" class="form-label">0đ - 60.000.000đ</label>
                        <input type="range" class="form-range" min="10000" max="60000000" step="10000" id="hidden_maximum_price" value="60000000"> <br>
                        <span class="ml-0 mt-2" id="SHOW_PRICE_FILTER">60000000đ</span>
                    </ul>


                </section>

                </div>
                    <div id="search_filters_wrapper" class="hidden-sm-down">
                        <div id="search_filter_controls" class="hidden-md-up">
                            <span id="_mobile_search_filters_clear_all"></span>
                            <button class="btn btn-secondary ok">
                                <i class="material-icons rtl-no-flip">&#xE876;</i>
                                OK
                            </button>
                        </div>
                       
                        <?php
                            function getCateFromSlugAndCosan($slug,$cosan)
                            {
                                $db = new Model_db();
                                $sql ="SELECT * FROM catalog WHERE slug = ? AND hangcosan = ?";
                                return  $db->result1(1,$sql,$slug,$cosan);
                            }
                            function getCateFromParent($par)
                            {
                                $db = new Model_db();
                                $sql ="SELECT * FROM catalog WHERE parent = ?";
                                return  $db->result1(0,$sql,$par);
                            }
                            if(isset($_GET['slug']) && $_GET['slug'] != "")
                            {
                                $par = getCateFromSlugAndCosan($_GET['slug'],$_GET['maloai']);
                                if($par['parent'] != 129 && $par['parent'] != 130){
                                    // air 2020
                           ?>

                        

                        <?php } else{ ?>

                            <div id="search_filters">

                            <p class="text-uppercase h6 hidden-sm-down">Lọc</p>


                            <section class="facet clearfix">
                                <ul id="facet_21014" class="collapse p-1">
                                <?php
                                    $this->model = new Model_home();
                                    $getCateBrand1 = $this->model->getCateBrand1($_GET['slug'],$_GET['maloai']);
                                    $getbrandofbrand = $this->model->getbrandofbrandbyid($getCateBrand1['id']);

                                    $arr = [];
                                    $i =0;
                                    foreach ($getbrandofbrand as $row) {
                                            // echo '<p class="h6 facet-title ">'.$row['name'].'</p>';
                                        echo '  <li>
                                            <label class="facet-label" for="facet_input_21014_0'.$i.'">
                                                <span class="custom-checkbox">
                                                    <input id="facet_input_21014_0'.$i.'" type="checkbox" value="'.$row['slug'].'-'.$_GET['maloai'].'" class="common_selector brand">
                                                    <span class="ps-shown-by-js"><i
                                                            class="material-icons rtl-no-flip checkbox-checked">&#xE5CA;</i></span>
                                                </span>

                                                <a  class="" >
                                                    '.$row['name'].'
                                                
                                                </a>
                                            </label>
                                        </li>';
                                        $i++;
                                    }
                                ?>
                                

                                </ul>


                            </section>

                            </div>
                        <?php }}else if(isset($_GET['slug1']) && $_GET['slug1'] != ""){ 
                            $par = $this->model->getCateFromId($_GET['maloai']); 
                            if($par['parent'] !=2){
                                
                             
                        ?>
                            <div id="search_filters">

                                <p class="text-uppercase h6 hidden-sm-down">Lọc</p>
                                    <?php
                                        $this->model = new Model_home();
                                        
                                        $getCateBrand1 = $this->model->getCateBrandcap1($par['hangcosan']);

                                        $arr = [];
                                        $i =0;
                                        $h=0;
                                        foreach ($getCateBrand1 as $key) {
                                            
                                            $getCateBrand2 = $this->model->getCateBrandcap2($key['id']);
                                            if($getCateBrand2){
                                                echo '<section class="facet clearfix">
                                                <div class="title " data-target="#facet_47311'.$h.'" data-toggle="collapse">
                                                  <p class="h6 facet-title">'.$key['name'].'</p>
                                                  <span class="float-xs-right">
                                                    <span class="navbar-toggler collapse-icons">
                                                      <i class="material-icons add">&#xE145;</i>
                                                      <i class="material-icons remove">&#xE15B;</i>
                                                    </span>
                                                  </span>
                                                </div>
                                                <ul id="facet_47311'.$h.'" class="collapse"> ';
                                                $h++;
                                                foreach ($getCateBrand2 as $row) {
                                                    echo '  <li>
                                                    <label class="facet-label" for="facet_input_21014_0'.$i.'">
                                                        <span class="custom-checkbox">
                                                            <input id="facet_input_21014_0'.$i.'" type="checkbox" value="'.$row['slug'].'-'.$key['hangcosan'].'" class="common_selector brand">
                                                            <span class="ps-shown-by-js"><i
                                                                    class="material-icons rtl-no-flip checkbox-checked">&#xE5CA;</i></span>
                                                        </span>
    
                                                        <a  class="" >
                                                            '.$row['name'].'
                                                        
                                                        </a>
                                                    </label>
                                                </li>';
                                                $i++;
                                                }
                                                echo '</ul>
                                                </section>';
                                            }
                                            
                                           
                                        }
                                    ?>
                            </div>
                        <?php }else{ ?>
                            <div id="search_filters">

                                <p class="text-uppercase h6 hidden-sm-down">Lọc</p>

                                    <?php
                                         $this->model = new Model_home();
                                        
                                         $getCateBrand1 = $this->model->getCateBrandcap1All();
 
                                         $arr = [];
                                         $i =0;
                                         $h=0;
                                         foreach ($getCateBrand1 as $key) {
                                             
                                             $getCateBrand2 = $this->model->getCateBrandcap2($key['id']);
                                             if($getCateBrand2){
                                                 if($key['hangcosan'] == 1){
                                                     echo '<section class="facet clearfix">
                                                     <div class="title " data-target="#facet_47311'.$h.'" data-toggle="collapse">
                                                       <p class="h6 facet-title">'.$key['name'].' - ORDER</p>
                                                       <span class="float-xs-right">
                                                         <span class="navbar-toggler collapse-icons">
                                                           <i class="material-icons add">&#xE145;</i>
                                                           <i class="material-icons remove">&#xE15B;</i>
                                                         </span>
                                                       </span>
                                                     </div>
                                                     
                                             
                                                               
                                                         <ul id="facet_47311'.$h.'" class="collapse"> 
                                                         ';
                                                 } 
                                                 else{
                                                     echo '<section class="facet clearfix">
                                                     <div class="title " data-target="#facet_47311'.$h.'" data-toggle="collapse">
                                                       <p class="h6 facet-title">'.$key['name'].'</p>
                                                       <span class="float-xs-right">
                                                         <span class="navbar-toggler collapse-icons">
                                                           <i class="material-icons add">&#xE145;</i>
                                                           <i class="material-icons remove">&#xE15B;</i>
                                                         </span>
                                                       </span>
                                                     </div>
                                                    
                                             
                                                               
                                                         <ul id="facet_47311'.$h.'" class="collapse">  
                                                             ';
                                                 } 
                                                 $h++;
                                                     foreach ($getCateBrand2 as $row) {
                                                         echo '  <li>
                                                                     <label class="facet-label" for="facet_input_21014_0'.$i.'">
                                                                         <span class="custom-checkbox">
                                                                             <input id="facet_input_21014_0'.$i.'" type="checkbox" value="'.$row['slug'].'-'.$key['hangcosan'].'" class="common_selector brand">
                                                                             <span class="ps-shown-by-js">
                                                                             <i class="material-icons rtl-no-flip checkbox-checked">&#xE5CA;</i></span>
                                                                         </span>
 
                                                                         <a class="_gray-darker search-link js-search-link">
                                                                             '.$row['name'].'
                                                                         
                                                                         </a>
                                                                     </label>
                                                                 </li>';
                                                     $i++;
                                                     }
                                                 echo '</ul>
                                                 </section>';
                                             }
                                             
                                             
                                         }
                                    ?>
                                    
<!-- 
                                        </ul>


                                    </section> -->

                                </div>
                        <?php }}else{
                            ?>
                            <div id="search_filters">

                                <p class="text-uppercase h6 hidden-sm-down">Lọc</p>

                                    <?php
                                        $this->model = new Model_home();
                                        
                                        $getCateBrand1 = $this->model->getCateBrandcap1All();

                                        $arr = [];
                                        $i =0;
                                        $h=0;
                                        foreach ($getCateBrand1 as $key) {
                                            
                                            $getCateBrand2 = $this->model->getCateBrandcap2($key['id']);
                                            if($getCateBrand2){
                                                if($key['hangcosan'] == 1){
                                                    echo '<section class="facet clearfix">
                                                    <div class="title " data-target="#facet_47311'.$h.'" data-toggle="collapse">
                                                      <p class="h6 facet-title">'.$key['name'].' - ORDER</p>
                                                      <span class="float-xs-right">
                                                        <span class="navbar-toggler collapse-icons">
                                                          <i class="material-icons add">&#xE145;</i>
                                                          <i class="material-icons remove">&#xE15B;</i>
                                                        </span>
                                                      </span>
                                                    </div>
                                                    
                                            
                                                              
                                                        <ul id="facet_47311'.$h.'" class="collapse"> 
                                                        ';
                                                } 
                                                else{
                                                    echo '<section class="facet clearfix">
                                                    <div class="title " data-target="#facet_47311'.$h.'" data-toggle="collapse">
                                                      <p class="h6 facet-title">'.$key['name'].'</p>
                                                      <span class="float-xs-right">
                                                        <span class="navbar-toggler collapse-icons">
                                                          <i class="material-icons add">&#xE145;</i>
                                                          <i class="material-icons remove">&#xE15B;</i>
                                                        </span>
                                                      </span>
                                                    </div>
                                                   
                                            
                                                              
                                                        <ul id="facet_47311'.$h.'" class="collapse">  
                                                            ';
                                                } 
                                                $h++;
                                                    foreach ($getCateBrand2 as $row) {
                                                        echo '  <li>
                                                                    <label class="facet-label" for="facet_input_21014_0'.$i.'">
                                                                        <span class="custom-checkbox">
                                                                            <input id="facet_input_21014_0'.$i.'" type="checkbox" value="'.$row['slug'].'-'.$key['hangcosan'].'" class="common_selector brand">
                                                                            <span class="ps-shown-by-js">
                                                                            <i class="material-icons rtl-no-flip checkbox-checked">&#xE5CA;</i></span>
                                                                        </span>

                                                                        <a class="_gray-darker search-link js-search-link">
                                                                            '.$row['name'].'
                                                                        
                                                                        </a>
                                                                    </label>
                                                                </li>';
                                                    $i++;
                                                    }
                                                echo '</ul>
                                                </section>';
                                            }
                                            
                                            
                                        }
                                    ?>
                                    

                                      

                            </div>
                            <?php }?>
                        
                    </div>
                    <section class="featured-products clearfix mt-3 hb-animate-element right-to-left">
                        <h3 class="h1 products-section-title left-product-title text-uppercase hidden-md-down ">
                            Sản phẩm mới
                        </h3>


                        <div class="left-product-title  clearfix hidden-md-up collapsed"
                            data-target="#newproducts-container" data-toggle="collapse">
                            <span class="h1 text-uppercase">Sản phẩm mới</span>

                            <span class="float-xs-right">
                                <span class="navbar-toggler collapse-icons">
                                    <i class="material-icons add">&#xE145;</i>
                                    <i class="material-icons remove">&#xE15B;</i>
                                </span>
                            </span>

                        </div>



                        <div id="newproducts-container" class="collapse data-toggler">
                            <div id="owl-new" class="owl-carousel products">
                                <!-- Number of Row -->
                                <ul>
                                    <li>
                                        <?php
                                            foreach ($getAllProDesc as $row) {
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
                                                $giaDiscount = '<span class="sr-only">'.$this->lib->forMatTien($price).' đ</span>
                                                                <span class="regular-price">'.$this->lib->forMatTien($price).' đ</span>
                                                                <span class="discount-percentage discount-product">'.$row['discount'].' %</span>
                                                                <span itemprop="price" class="price">'.$this->lib->forMatTien($price - ($row['discount']*$price)/100).' đ</span>
                                                                ';
                                                           
                                              }else{
                                                $discount = '';
                                                $giaDiscount = '<span class="sr-only">Price</span>
                                                                <span itemprop="price" class="price">'.$this->lib->forMatTien($price).' đ</span>';
                                              }
                                              if($price<=0 ||$price =='' ){
                                                $giaDiscount = ' ';
                                             }
                                                $name = $row['name'];
                                            
                                              $link = ROOT_URL."/san-pham-chi-tiet/".$row['slug'];
                                                echo '<article class="product-miniature js-product-miniature" data-id-product="19"
                                                data-id-product-attribute="0" itemscope
                                                itemtype="http://schema.org/Product">
                                                <div class="product-container">
                                                
                                                    <div class="thumbnail-container">
                                                        <div class="thumbnail-inner">
    
                                                            <a href="'.$link.'"
                                                                class="thumbnail product-thumbnail">
                                                                <img src="'.$img.'"
                                                                    alt="Neque Porro Suisquam"
                                                                    data-full-size-image-url="'.$img.'" width="70" height="90">
                                                                <img class="second_image img-responsive" width="70" height="90"
                                                                    src="'.$imgCover.'"
                                                                    alt="" title="" />
                                                            </a>
    
    
                                                        </div>
                                                    </div>
                                                    <div class="product-description">
    
                                                        <h1 class="h3 product-title" itemprop="name"><a
                                                                href="'.$link.'">'.$name.'</a></h1>
    
    
    
                                                        <div class="product-price-and-shipping">
    
    
                                                           '.$giaDiscount.'

    
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>';
                                            }
                                        
                                        ?>
                                    

                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                    <?php
                                            foreach ($getAllProDescoffset as $row) {
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
                                                $giaDiscount = '<span class="sr-only">'.$this->lib->forMatTien($price).' đ</span>
                                                                <span class="regular-price">'.$this->lib->forMatTien($price).' đ</span>
                                                                <span class="discount-percentage discount-product">'.$row['discount'].' %</span>
                                                                <span itemprop="price" class="price">'.$this->lib->forMatTien($price - ($row['discount']*$price)/100).' đ</span>
                                                                ';
                                                            
                                                }else{
                                                $discount = '';
                                                $giaDiscount = '<span class="sr-only">Price</span>
                                                                <span itemprop="price" class="price">'.$this->lib->forMatTien($price).' đ</span>';
                                                }
                                              if($price<=0 ||$price =='' ){
                                                $giaDiscount = ' ';
                                              }
                                                $name = $row['name'];
                                            
                                              $link = ROOT_URL."/san-pham-chi-tiet/".$row['slug'];
                                                echo '<article class="product-miniature js-product-miniature" data-id-product="19"
                                                data-id-product-attribute="0" itemscope
                                                itemtype="http://schema.org/Product">
                                                <div class="product-container">
                                                
                                                    <div class="thumbnail-container">
                                                        <div class="thumbnail-inner">
    
                                                            <a href="'.$link.'"
                                                                class="thumbnail product-thumbnail">
                                                                <img src="'.$img.'"
                                                                    alt="Neque Porro Suisquam"
                                                                    data-full-size-image-url="'.$img.'" width="70" height="90">
                                                                <img class="second_image img-responsive" width="70" height="90"
                                                                    src="'.$imgCover.'"
                                                                    alt="" title="" />
                                                            </a>
    
    
                                                        </div>
                                                    </div>
                                                    <div class="product-description">
    
                                                        <h1 class="h3 product-title" itemprop="name"><a
                                                                href="'.$link.'">'.$name.'</a></h1>
    
    
    
                                                        <div class="product-price-and-shipping">
    
    
                                                           '.$giaDiscount.'

    
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>';
                                            }
                                        
                                        ?>

                                    </li>
                                </ul></div>
                       
                        </div>
                    </section>
                    
                    <section class="featured-products clearfix mt-3 hb-animate-element left-to-right">
                        <h3 class="h1 products-section-title left-product-title text-uppercase hidden-md-down ">
                            Bán chạy
                        </h3>

                        <div class="left-product-title  clearfix hidden-md-up collapsed"
                            data-target="#BestSellers-container" data-toggle="collapse">
                            <span class="h1 text-uppercase">Bán chạy</span>
                            <span class="float-xs-right">
                                <span class="navbar-toggler collapse-icons">
                                    <i class="material-icons add">&#xE145;</i>
                                    <i class="material-icons remove">&#xE15B;</i>
                                </span>
                            </span>
                        </div>

                        <div id="BestSellers-container" class="collapse data-toggler">
                            <div id="owl-best" class="owl-carousel products">

                                <ul>
                                    <li>
                                    <?php
                                            foreach ($getAllByBuyed as $row) {
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
                                                $giaDiscount = '<span class="sr-only">'.$this->lib->forMatTien($price).' đ</span>
                                                                <span class="regular-price">'.$this->lib->forMatTien($price).' đ</span>
                                                                <span class="discount-percentage discount-product">'.$row['discount'].' %</span>
                                                                <span itemprop="price" class="price">'.$this->lib->forMatTien($price - ($row['discount']*$price)/100).' đ</span>
                                                                ';
                                                            
                                                }else{
                                                $discount = '';
                                                $giaDiscount = '<span class="sr-only">Price</span>
                                                                <span itemprop="price" class="price">'.$this->lib->forMatTien($price).' đ</span>';
                                                }
                                              if($price<=0 ||$price =='' ){
                                                $giaDiscount = ' ';
                                             }
                                                $name = $row['name'];
                                            
                                              $link = ROOT_URL."/san-pham-chi-tiet/".$row['slug'];
                                                echo '<article class="product-miniature js-product-miniature" data-id-product="19"
                                                data-id-product-attribute="0" itemscope
                                                itemtype="http://schema.org/Product">
                                                <div class="product-container">
                                                
                                                    <div class="thumbnail-container">
                                                        <div class="thumbnail-inner">
    
                                                            <a href="'.$link.'"
                                                                class="thumbnail product-thumbnail">
                                                                <img src="'.$img.'"
                                                                    alt="Neque Porro Suisquam"
                                                                    data-full-size-image-url="'.$img.'" width="70" height="90">
                                                                <img class="second_image img-responsive"
                                                                    src="'.$imgCover.'"
                                                                    alt="" title="" />
                                                            </a>
    
    
                                                        </div>
                                                    </div>
                                                    <div class="product-description">
    
                                                        <h1 class="h3 product-title" itemprop="name"><a
                                                                href="'.$link.'">'.$name.'</a></h1>
    
    
    
                                                        <div class="product-price-and-shipping">
    
    
                                                           '.$giaDiscount.'

    
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>';
                                            }
                                        
                                        ?>

                                    </li>
                                </ul>
                                <ul>
                                         <?php
                                            foreach ($etAllByBuyedoffset as $row) {
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
                                                $giaDiscount = '<span class="sr-only">'.$this->lib->forMatTien($price).' đ</span>
                                                                <span class="regular-price">'.$this->lib->forMatTien($price).' đ</span>
                                                                <span class="discount-percentage discount-product">'.$row['discount'].' %</span>
                                                                <span itemprop="price" class="price">'.$this->lib->forMatTien($price - ($row['discount']*$price)/100).' đ</span>
                                                                ';
                                                           
                                              }else{
                                                $discount = '';
                                                $giaDiscount = '<span class="sr-only">Price</span>
                                                                <span itemprop="price" class="price">'.$this->lib->forMatTien($price).' đ</span>';
                                              }
                                              if($price<=0 ||$price =='' ){
                                                $giaDiscount = ' ';
                                                }
                                                    $name = $row['name'];
                                               
                                              $link = ROOT_URL."/san-pham-chi-tiet/".$row['slug'];
                                                echo '<article class="product-miniature js-product-miniature" data-id-product="19"
                                                data-id-product-attribute="0" itemscope
                                                itemtype="http://schema.org/Product">
                                                <div class="product-container">
                                                
                                                    <div class="thumbnail-container">
                                                        <div class="thumbnail-inner">
    
                                                            <a href="'.$link.'"
                                                                class="thumbnail product-thumbnail">
                                                                <img src="'.$img.'"
                                                                    alt="Neque Porro Suisquam"
                                                                    data-full-size-image-url="'.$img.'" width="70" height="90">
                                                                <img class="second_image img-responsive"
                                                                    src="'.$imgCover.'"
                                                                    alt="" title="" />
                                                            </a>
    
    
                                                        </div>
                                                    </div>
                                                    <div class="product-description">
    
                                                        <h1 class="h3 product-title" itemprop="name"><a
                                                                href="'.$link.'">'.$name.'</a></h1>
    
    
    
                                                        <div class="product-price-and-shipping">
    
    
                                                           '.$giaDiscount.'

    
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>';
                                            }
                                        
                                        ?>
                                </ul>

                            </div>

                            <!--  <a class="all-product-link h4" href="https://infinitytemplate.com/Prestashop/PRS01/PRS012/en/best-sales">
      All new products<i class="material-icons">&#xE315;</i>
    </a> -->

                        </div>
                    </section>
                </div>
            </div>



            <div id="content-wrapper" class="left-column col-xs-12 col-sm-12 col-md-12 col-lg-9">

                <nav data-depth="2" class="breadcrumb hidden-sm-down m-0">
                    <div class="container">
                        <ol itemscope itemtype="http://schema.org/BreadcrumbList">


                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a itemprop="item" href="#">
                                    <span itemprop="name">Trang chủ</span>
                                </a>
                                <meta itemprop="position" content="1">
                            </li>


                                    <?php
                                        if(isset($getCateFromId['name']) && $getCateFromId['name']!=""){
                                            echo ' <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                            <a itemprop="item" href="#">
                                                <span itemprop="name">'.$getCateFromId['name'].'</span>
                                            </a>
                                            <meta itemprop="position" content="2">
                                        </li>';
                                        }
                                    ?>
                           



                        </ol>
                    </div>
                </nav>






                <section id="main">


                    <div class="block-category card card-block hidden-sm-down">

                        <div class="category-cover">
                            <img src="<?=PATH_IMG_SITE.$banner[10]['bannerImage']?>" 
                                alt="Clothes">
                        </div>
                        <?php
                            
                        
                        ?>
                        <h1 class="h1 title-category"><?php echo $getCateFromId['name']; ?></h1>
                        <p><?php echo $getCateFromId['description']; ?></p>

                        <div class="text-sm-center hidden-md-up">
                            <h1 class="h1"><?php echo $getCateFromId['name']; ?></h1>
                        </div>






                        <section id="products">

                            <div>

                                <div id="js-product-list-top" class="row products-selection">
                                    <div class="col-md-6 hidden-sm-down total-products">
                                        <!-- Grid-List Buttons -->
                                        <div class="grid-list col-md-3">
                                            <span id="kkgrid" class="active"></span>
                                            <span id="kklist"></span>
                                        </div>


                                        <p>Có tất cả <span id="total_product"></span> sản phẩm. </p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row sort-by-row">
                                            <span class="col-sm-3 col-md-3 hidden-sm-down sort-by"> Sắp xếp</span>
                                            <div class="col-sm-9 col-xs-8 col-md-9 products-sort-order dropdown">
                                                <div class="input-group ">
                                                    <select class="custom-select " id="sort_by">
                                                    <i class="material-icons float-xs-right">&#xE5C5;</i>
                                                        <option value="price ASC" class="select-list ">
                                                            Giá từ thấp - cao
                                                        </option>
                                                        <option value="price DESC" class="select-list" >
                                                            Giá từ cao - thấp
                                                        </option>
                                                        <option value="hot DESC" class="select-list ">
                                                            Sản phẩm hot nhất
                                                        </option>
                                                    </select>
                                                    
                                                </div>
                                            </div>


                                            <div class="col-sm-3 col-xs-4 hidden-md-up filter-button">
                                                <button id="search_filter_toggler" class="btn btn-secondary">
                                                    Lọc
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 hidden-md-up text-sm-center showing">

                                    </div>
                                </div>

                            </div>
                            

                            <div id="" class="hidden-sm-down">
                                <section id="js-active-search-filters" class="hide">

                                    <h1 class="h6 hidden-xs-up">Active filters</h1>


                                </section>

                            </div>


                            <div>
                                <!-- kiểm trả chuyển danh mục thì xóa filter  -->
                               <?php
                               
                               if($_GET['maloai'] == ""){
                                   $bool = false;
                                   if(isset($_SESSION['slug2'])){
                                       if($_SESSION['slug2'] == $_GET['slug2']){
                                            $bool=true;
                                       }
                                    }else{
                                    $_SESSION['slug2'] = $_GET['slug2'];
                                    }
                                    
                                     if($bool == false ){
                                        ?>
                                            <script>
                                                sessionStorage.removeItem("brand")
                                                sessionStorage.removeItem("price")
                                                sessionStorage.removeItem("sort_by")
                                            </script>
                                        <?php
                                        
                                     }
                                }
                                if(isset($_GET['maloai']) && $_GET['maloai']>0){
                                    unset($_SESSION['slug2']);
                                    if(isset($_SESSION['maloai'])){
                                        if($_SESSION['maloai'] != $_GET['maloai']){
                                            ?>
                                            <script>
                                                sessionStorage.removeItem("brand")
                                                sessionStorage.removeItem("price")
                                                sessionStorage.removeItem("sort_by")
                                            </script>
                                            <?php
                                            $_SESSION['maloai'] = $_GET['maloai'];
                                        }
                                    }else{
                                        $_SESSION['maloai'] = $_GET['maloai'];
                                    }
                                }         

                               ?>

                                <script>
                                    //ajax filter
                                        $(document).ready(function() {
                                            // var page = $('#offset').val();
                                            filter_data();

                                            async function filter_data() {
                                                var action = 'fetch_data';
                                                // var sort_by = $('#sort_by').val();
                                                var minimum_price = $('#hidden_minimum_price').val();
                                                var maximum_price = $('#hidden_maximum_price').val();
                                                var slug = $("#slug").val();
                                                var slug1 = $("#slug1").val();
                                                var slug2 = $("#slug2").val();
                                                var maloai = $("#maloai").val();
                                                var page = <?php if(isset($_GET['Page']) && $_GET['Page']>0) echo $_GET['Page']; else echo 1;?>;
                                                
                                                var brand = get_filter('brand');
                                                var arrBrand = brand.join();
                                                console.log(brand);
                                                if(brand.length == 0) {
                                                    if(sessionStorage.getItem("brand") && sessionStorage.getItem("brand") !=""){
                                                        brand = sessionStorage.getItem("brand").split(",");
                                                        let checkBrand = document.getElementsByClassName('common_selector');
                                                        for (let i = 0; i < checkBrand.length; i++) {
                                                            for (let j = 0; j < brand.length; j++) {
                                                                if(brand[j] == checkBrand[i].value)
                                                                {
                                                                    checkBrand[i].setAttribute("checked","")
                                                                    if (checkBrand[i].checked == false) {
                                                                        sessionStorage.removeItem("brand")
                                                                        brand = "";
                                                                    }
                                                                }
                                                            }
                                                            
                                                        }
                                                        
                                                    }
                                                }else{
                                                    sessionStorage.setItem("brand",arrBrand);
                                                    if(sessionStorage.getItem("brand") && sessionStorage.getItem("brand") !=""){
                                                        brand = sessionStorage.getItem("brand").split(",");
                                                    }
                                                }
                                                
                                                if(maximum_price == 60000000){
                                                    if(sessionStorage.getItem("price") && sessionStorage.getItem("price") !=""){
                                                        maximum_price = sessionStorage.getItem("price")
                                                        let filterPrice = $('#hidden_maximum_price').val(maximum_price);
                                                    }
                                                }else{
                                                    sessionStorage.setItem("price",maximum_price);
                                                    if(sessionStorage.getItem("price") && sessionStorage.getItem("price") !=""){
                                                        maximum_price = sessionStorage.getItem("price")
                                                        let filterPrice = $('#hidden_maximum_price').val(maximum_price);
                                                    }
                                                }
                                                if(sessionStorage.getItem("sort_by") && sessionStorage.getItem("sort_by") !=""){
                                                   
                                                    
                                                   let oke = document.getElementsByTagName('option');
                                                   for (let i = 0; i < oke.length; i++) {
                                                       if(sessionStorage.getItem("sort_by") == oke[i].value){
                                                           oke[i].setAttribute("selected","");
                                                       } 
                                                   }
                                                   sessionStorage.setItem("sort_by", $('#sort_by').val());
                                                   sort_by = sessionStorage.getItem("sort_by")
                                                }else{
                                                    sort_by = $('#sort_by').val()
                                                    sessionStorage.setItem("sort_by",sort_by);
                                                }
                                               
                                                await $.ajax({
                                                    url: "views/fetch_data.php",
                                                    method: "POST",
                                                    // contentType: false,
                                                    // processData: false,
                                                    dataType: 'JSON',
                                                    data: { action: action, minimum_price: minimum_price, maximum_price: maximum_price, brand: brand, key: sort_by, slug: slug, slug1: slug1,slug2: slug2, maloai: maloai,page:page },
                                                    success: function(data) {
                                                        console.log(data.query);
                                                        $("#total_product").html(data.tongsp);
                                                        $('#filter_data').html(data.html);
                                                        let sotrang = Math.ceil(data.tongsp / data.tongsp1trang);
                                                        let pageString = '';
                                                        if(data.choose == ""){
                                                            if(page > 3){
                                                                    let link2 = "<?=ROOT_URL?>/" +data.ca+"/tat-ca/trang-1"
                                                                    pageString += '<li><a href="'+link2+'" class="page ">Đầu</a></li>';
                                                            }
                                                            if(page > 1){
                                                                    let prev = page - 1
                                                                    let link3 = "<?=ROOT_URL?>/" +data.ca+"/tat-ca/trang-"+prev
                                                                    pageString += '<li><a href="'+link3+'" class="page "><</a></li>';
                                                            }
                                                            for (let i = 1; i <= sotrang; i++) {
                                                                let link = "<?=ROOT_URL?>/" +data.ca+"/tat-ca/trang-"+i
                                                                
                                                                if(page == i){
                                                                    pageString += '<li><a href="'+link+'" class="page active">'+ i + '</a></li>';
                                                                }else{
                                                                    if(i > page - 3 && i < page + 3){
                                                                        pageString += '<li><a href="'+link+'" class="page ">'+ i + '</a></li>';
                                                                    }  
                                                                }
                                                            }
                                                            if(page < sotrang - 1){
                                                                    let next = page + 1
                                                                    let link3 = "<?=ROOT_URL?>/" +data.ca+"/tat-ca/trang-"+next
                                                                    pageString += '<li><a href="'+link3+'" class="page ">></a></li>';
                                                            }
                                                            if(page < sotrang - 3){
                                                                let link2 = "<?=ROOT_URL?>/" +data.ca+"/tat-ca/trang-"+sotrang
                                                                    pageString += '<li><a href="'+link2+'" class="page ">Cuối</a></li>';
                                                            }
                                                        }else{
                                                            if(page > 3){
                                                                    let link2 = "<?=ROOT_URL?>/" +data.ca+"/"+data.choose+ "-" + <?php if(isset($_GET['maloai'])) echo $_GET['maloai'];?>+ "/trang-1"
                                                                    pageString += '<li><a href="'+link2+'" class="page ">Đầu</a></li>';
                                                            }
                                                            if(page > 1){
                                                                    let prev = page - 1
                                                                    let link3 = "<?=ROOT_URL?>/" +data.ca+"/"+data.choose+ "-" + <?php if(isset($_GET['maloai'])) echo $_GET['maloai'];?>+ "/trang-"+prev
                                                                    pageString += '<li><a href="'+link3+'" class="page "><</a></li>';
                                                            }
                                                            for (let i = 1; i <= sotrang; i++) {
                                                                let link = "<?=ROOT_URL?>/" +data.ca+"/" +data.choose+ "-" + <?php if(isset($_GET['maloai'])) echo $_GET['maloai'];?> +"/trang-"+i
                                                                if(page == i){
                                                                    pageString += '<li><a href="'+link+'" class="page active">'+ i + '</a></li>';
                                                                }else{
                                                                    if(i > page - 3 && i < page + 3){
                                                                        pageString += '<li><a href="'+link+'" class="page ">'+ i + '</a></li>';
                                                                    }            
                                                                }
                                                            }
                                                            if(page < sotrang - 1){
                                                                    let next = page + 1
                                                                    let link3 = "<?=ROOT_URL?>/" +data.ca+"/"+data.choose+ "-" + <?php if(isset($_GET['maloai'])) echo $_GET['maloai'];?>+ "/trang-"+next
                                                                    pageString += '<li><a href="'+link3+'" class="page ">></a></li>';
                                                            }
                                                            if(page < sotrang - 3){
                                                                let link2 = "<?=ROOT_URL?>/" +data.ca+"/"+data.choose+ "-" + <?php if(isset($_GET['maloai'])) echo $_GET['maloai'];?>+ "/trang-"+sotrang
                                                                    pageString += '<li><a href="'+link2+'" class="page ">Cuối</a></li>';
                                                            }
                                                        }
                                                       
                                                        document.getElementById('pageString').innerHTML = pageString;
                                                        localStorage.setItem('tongsp', data.tongsp);

                                                    }
                                                });

                                            }

                                            function get_filter(class_name) {
                                                var filter = [];
                                                $('.' + class_name + ':checked').each(function() {
                                                    filter.push($(this).val());
                                                });
                                              
                                                return filter;

                                            }

                                            $('.common_selector').click(function() {
                                                filter_data();
                                            });
                                            $('#hidden_maximum_price').change(function() {
                                                let oke = $('#hidden_maximum_price').val();
                                                $('#SHOW_PRICE_FILTER').text(oke + "đ");
                                                filter_data();
                                            });
                                           
                                            
                                            $('#sort_by').change(function() {
                                                let oke = $('#sort_by').val();

                                                // $('#SHOW_PRICE_FILTER').text(oke + "đ");
                                                filter_data();
                                            });


                                        });
                                </script>
                                <div id="js-product-list">
                                    <input type="hidden" name="" id="slug" value="<?php if(isset($_GET['slug'])) echo $_GET['slug'];  ?>">
                                    <input type="hidden" name="" id="slug1" value="<?php if(isset($_GET['slug1'])) echo $_GET['slug1'];  ?>">
                                    <input type="hidden" name="" id="slug2" value="<?php if(isset($_GET['slug2'])) echo $_GET['slug2'];  ?>">
                                    <input type="hidden" name="" id="maloai" value="<?php if(isset($_GET['maloai'])) echo $_GET['maloai']; ?>">
                                    <div class="products product-thumbs row" id="filter_data">

                                        
                                    </div>


                                    <nav class="pagination">
                                        <div class="col-md-4 col-xs-12 pagination-desc">


                                        </div>

                                        <div class="col-md-8 col-xs-12 pr-0 pagination-kkbtn">

                                            <ul class="page-list clearfix" id="pageString">
                                            <!-- <input type="hidden" name="" id="tongsp" value=""> -->
                                                
                                                
                                                <!-- <li><a href=""><</a></li>
                                                <li><a href="">1</a></li>
                                                <li><a href="">2</a></li>
                                                <li><a href="">3</a></li>
                                                <li><a href="">></a></li> -->
                                            </ul>

                                        </div>

                                    </nav>


                                </div>
                            </div>

                            <div id="js-product-list-bottom">

                                <div id="js-product-list-bottom"></div>

                            </div>

                        </section>

                </section>


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