<?php
//fetch_data.php

require_once "../../lib/myfunctions.php";
require_once "../../system/config.php";
require_once "../../system/database.php";
require_once "../models/home.php";
$home = new Model_home();
$model = new Model_db();
    $lib = new lib();
function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}
function getCateFromSlugAndCosan($slug,$cosan)
   {
    $model = new Model_db();
    $sql ="SELECT * FROM catalog WHERE slug = ? AND hangcosan = ?";
    return  $model->result1(1,$sql,$slug,$cosan);
   }
   function getCateFromParent($par)
   {
    $model = new Model_db();
    $sql ="SELECT * FROM catalog WHERE parent = ?";
    return  $model->result1(0,$sql,$par);
   }
if(isset($_POST["action"]))
{
    $array = array();
       
    if(isset($_POST['slug']) && $_POST['slug'] != "")
    {
        $par = getCateFromSlugAndCosan($_POST['slug'],$_POST['maloai']);
        if($par['parent'] != 129 && $par['parent'] != 130){
            $query ="SELECT * from product where cosan=? and Brand=?"; 
            if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
            {
                $query .= " AND price BETWEEN 0 AND ".$_POST["maximum_price"]."";
            }
            if(isset($_POST["brand"]) && $_POST["brand"] !="")
            {
                $brand_filter = implode("','", $_POST["brand"]);
                $query .= " AND Brand IN('".$brand_filter."')";
            }
            
            if(isset($_POST["key"]))
            {
                $key = $_POST["key"];
                $query .= " ORDER BY ".$key;
            }
            $kqtongsp = $model->result1(0,$query,$_POST['maloai'],$_POST['slug'].'-'.$_POST['maloai']);
                $query .=" LIMIT ".($_POST["page"] - 1) * PAGE_SIZE_PRO.", ".PAGE_SIZE_PRO; 
            $kqne = $model->result1(0,$query,$_POST['maloai'],$_POST['slug'].'-'.$_POST['maloai']);  
            
        }else{
            $par1 = getCateFromParent($par['id']);
            $slug_brand = [];
            foreach ($par1 as $row) {
                  array_push($slug_brand,$row['slug'].'-'.$_POST['maloai']);
            }
            $slug_brand = implode("','",$slug_brand);
            if(isset($_POST["brand"]) && $_POST["brand"] !="")
            {
                $query ="SELECT * from product where cosan=? "; 
                for ($i=0; $i < count($_POST['brand']); $i++) { 
                    $_POST["brand"][$i] = str_replace(" ","-",$_POST["brand"][$i]);
                }
                $brand_filter = implode("','", $_POST["brand"]);
                $query .= "AND Brand IN('".$brand_filter."')";
            }
            else
            {
                $query ="SELECT * from product where cosan=? and Brand IN('".$slug_brand."')"; 
            }
            if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
            {
                $query .= " AND price BETWEEN 0 AND ".$_POST["maximum_price"]."";
            }
            
            
            if(isset($_POST["key"]))
            {
                $key = $_POST["key"];
                $query .= " ORDER BY ".$key;
            }
            $kqtongsp = $model->result1(0,$query,$_POST['maloai']);
                $query .=" LIMIT ".($_POST["page"] - 1) * PAGE_SIZE_PRO.", ".PAGE_SIZE_PRO; 
            $kqne = $model->result1(0,$query,$_POST['maloai']);  
            
        }
        $choose = 1;
    }
    else if(isset($_POST['slug1']) && $_POST['slug1'] != "")
    {
        $query ="SELECT * from product where catalog_id=?"; 
        $par = $home->getCateFromId($_POST['maloai']);
        if ($par['parent'] != 2) {
            $idcatalog = $par['parent'];
            $query .= " AND cosan=?";
            $id = $par['hangcosan'];
            if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
            {
                $query .= " AND price BETWEEN 0 AND ".$_POST["maximum_price"]."";
            }
            if(isset($_POST["brand"]) && $_POST["brand"] !="")
            {
                for ($i=0; $i < count($_POST['brand']); $i++) { 
                    $_POST["brand"][$i] = str_replace(" ","-",$_POST["brand"][$i]);
                }
                $brand_filter = implode("','", $_POST["brand"]);
                $query .= " AND Brand IN('".$brand_filter."')";
            }
            
            if(isset($_POST["key"]))
            {
                $key = $_POST["key"];
                $query .= " ORDER BY ".$key;
            }
                $kqtongsp = $model->result1(0,$query,$idcatalog,$id);
                $query .=" LIMIT ".($_POST["page"] - 1) * PAGE_SIZE_PRO.", ".PAGE_SIZE_PRO; 
                $kqne = $model->result1(0,$query,$idcatalog,$id);
        } else {
            $idcatalog = $par['id'];
            if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
            {
                $query .= " AND price BETWEEN 0 AND ".$_POST["maximum_price"]."";
            }
            if(isset($_POST["brand"]) && $_POST["brand"] !="")
            {
                for ($i=0; $i < count($_POST['brand']); $i++) { 
                    $_POST["brand"][$i] = str_replace(" ","-",$_POST["brand"][$i]);
                }
                $brand_filter = implode("','", $_POST["brand"]);
                $query .= " AND Brand IN('".$brand_filter."')";
            }
            
            if(isset($_POST["key"]))
            {
                $key = $_POST["key"];
                $query .= " ORDER BY ".$key;
            }
                $kqtongsp = $model->result1(0,$query,$idcatalog);
                $query .=" LIMIT ".($_POST["page"] - 1) * PAGE_SIZE_PRO.", ".PAGE_SIZE_PRO; 
                $kqne = $model->result1(0,$query,$idcatalog);
        }
        $choose = 2;
         
    }
    else if(isset($_POST['slug2']) && $_POST['slug2'] !=  "")
    {
        $query ="SELECT * from product"; 
        if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
        {
            $query .= " WHERE price BETWEEN 0 AND ".$_POST["maximum_price"]."";
        }
        if(isset($_POST["brand"]) && $_POST["brand"] !="")
        {
            for ($i=0; $i < count($_POST['brand']); $i++) { 
                $_POST["brand"][$i] = str_replace(" ","-",$_POST["brand"][$i]);
            }
            $brand_filter = implode("','", $_POST["brand"]);
            $query .= " AND Brand IN('".$brand_filter."')";
        }
        
        if(isset($_POST["key"]))
        {
            $key = $_POST["key"];
            $query .= " ORDER BY ".$key;
        }
        $kqtongsp = $model->result1(0,$query);
        $query .=" LIMIT ".($_POST["page"] - 1) * PAGE_SIZE_PRO.", ".PAGE_SIZE_PRO; 
        $kqne = $model->result1(0,$query);  
        $choose = 3;
    }
    
    // echo $query;
    $kq_Dem2 = count($kqtongsp);
    $kq_Dem = count($kqne);
    // echo $kq_Dem;
    if($kq_Dem > 0)
    {
        foreach ($kqne as $row) {
            if(is_file("../".PATH_IMG_SITE.explode(",",$row['image_list'])[0])){
                $img = PATH_IMG_SITE.explode(",",$row['image_list'])[0];
            }else{
                $img = PATH_IMG_SITE.'logo.png';
            }
            if(is_file(PATH_IMG_SITE.explode(",",$row['image_list'])[1])){
              $imgCover = PATH_IMG_SITE.explode(",",$row['image_list'])[1];
            }else{
                $imgCover = PATH_IMG_SITE.explode(",",$row['image_list'])[0];
            }
                $price = $row['price'];
                if($row['discount'] > 0){
                                        
                    $discount = ' <li class="product-flag discount">'.$row['discount'].'%</li>';
                    $giaDiscount = ' <div class="product-price-and-shipping">

                                    <span class="sr-only">Regular price</span>
                                    <span class="regular-price">'.$lib->forMatTien($price).' đ</span>
                                    <span class="discount-percentage discount-product">-'.$row['discount'].'%</span>


                                    <span class="sr-only">Price</span>
                                    <span itemprop="price" class="price">'.$lib->forMatTien(($price - ($row['discount']*$price)/100)).' đ</span>
                                </div>';
                    }else{
                    $discount = '';
                    $giaDiscount = '<div class="product-price-and-shipping">
            
    
                                        <span class="sr-only">Price</span>
                                        <span itemprop="price" class="price">'.$lib->forMatTien($price).' đ</span>

                                </div>';
                    }
            if($price<=0 ||$price =='' ){
              $giaDiscount = ' ';
              }
                  $name = $row['name'];
              
            $link = ROOT_URL."/san-pham-chi-tiet/".$row['slug'];
            $output .= ' <article class="product-miniature js-product-miniature col-lg-3 col-md-4 col-sm-6 col-xs-12  " data-id-product="19" data-id-product-attribute="0" itemscope itemtype="">
            <div class="thumbnail-container">
              <div class="product-inner">
                <div class="thumbnail-inner">
                  <div class="inner">
                    <div class="product-img">
                                      <a href="'.$link.'" class="thumbnail product-thumbnail">
                          <img
                              src = "'.$img.'"
                              alt = "loading..."
                              data-full-size-image-url = "'.$img.'"  height="250">
                              
                            </a> </div>
                </div><div class="kkproducthover"></div>
                </div>
                <div class="product-description">
                    <h1 class="h3 product-title" itemprop="name"><a href="'. $link.'">'.$name.'</a></h1><div class="product-price-and-shipping"><span class="sr-only">Regular price</span>
                    '.$giaDiscount.'
                </div>
                
                <div class="cart-block">
                  <div class="product-add-to-cart">
          
          </div>        </div>
    
        </article>';
        }
    }
    else
    {
        $output = '<h3 class="ml-5">Không có sản phẩm nào hết</h3>';
    }
    if($choose == 1){
        $ca = "hang";
        $choose = $_POST['slug']; 
    }else if($choose == 2){
        $choose = $_POST['slug1'];
        $ca = "danh-muc";
    }else{
        $ca = "san-pham";
        $choose = "";
    }
    $array = [];
    $array["html"] = $output;
    $array["tongsp"] = $kq_Dem2;
    $array["tongsp1trang"] = PAGE_SIZE_PRO;
    $array["choose"] = $choose;
    $array["ca"] = $ca;
    $array['query'] = $query;
    echo json_encode($array);
}