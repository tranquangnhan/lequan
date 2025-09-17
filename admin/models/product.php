<?php

class Model_product extends Model_db{
 
    function listRecords() 
    {
        $sql = "SELECT * FROM product order by id";
        return $this->result1(0,$sql);
    }
   
    function addNewProduct($name,$slug,$price,$discount,$imgs,$IDCate,$hot,$size,$cosan,$brand,$color,$Description)
    {   
        
       
        $sql = "INSERT INTO product(name,slug,price,discount,image_list,catalog_id,hot,size,cosan,brand,color,description) VALUE(?,?,?,?,?,?,?,?,?,?,?,?)";
        return $this->getLastId($sql,$name,$slug,$price,$discount,$imgs,$IDCate,$hot,$size,$cosan,$brand,$color,$Description);
    }

    function deleteProduct($id)
    {   
        $sql = "DELETE FROM product WHERE id = ?";
        return $this->exec1($sql,$id);
    }
    
    function editProduct($name,$slug,$price,$discount,$imgs,$IDCate,$hot,$size,$cosan,$brand,$color,$Description,$id){
        $old_images = isset($_POST['old_images']) ? trim($_POST['old_images']) : '';
        $new_images = [];
        $errors = [];
        

        // Thư mục lưu ảnh (đảm bảo là đường dẫn filesystem, không phải URL)
        $uploadDir = rtrim(PATH_IMG_SITE, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true)) {
                $errors[] = "Không tạo được thư mục: $uploadDir";
            }
        }
        if (!is_writable($uploadDir)) {
            @chmod($uploadDir, 0755);
            if (!is_writable($uploadDir)) {
                $errors[] = "Thư mục không có quyền ghi: $uploadDir";
            }
        }

        // Nếu có file gửi lên - chuẩn hoá để hỗ trợ single & multiple
        if (isset($_FILES['img'])) {
            $files = $_FILES['img'];

            // chuẩn hoá thành mảng
            $names = is_array($files['name']) ? $files['name'] : [$files['name']];
            $tmp_names = is_array($files['tmp_name']) ? $files['tmp_name'] : [$files['tmp_name']];
            $errors_code = is_array($files['error']) ? $files['error'] : [$files['error']];
            $sizes = is_array($files['size']) ? $files['size'] : [$files['size']];

            // nếu không có file thực sự (tên rỗng) thì bỏ qua
            $hasFile = false;
            
            foreach ($names as $n) { if (strlen(trim((string)$n))>0) { $hasFile = true; break; } }
           
            if ($hasFile) {
                
                foreach ($names as $key => $originalName) {
                    $originalName = (string)$originalName;
                    $tmp_name = $tmp_names[$key] ?? null;
                    $errCode = $errors_code[$key] ?? UPLOAD_ERR_NO_FILE;

                    $safeName = basename($originalName);
                    $targetPath = $uploadDir . $safeName;
                    move_uploaded_file($tmp_name, $targetPath);
                    $new_images[] = $safeName;
                }
            }
        }


        // Ghép ảnh cũ còn lại và ảnh mới
        if ($old_images && !empty($new_images)) {
            $all_images = $old_images . ',' . implode(',', $new_images);
        } elseif ( !empty($new_images)) {
            $all_images = implode(',', $new_images);
        } else {
            $all_images = $old_images;
        }

         
        // Cập nhật DB
        $sql = "UPDATE product SET name= ?,slug=?,price=?,discount=?,image_list=?,catalog_id=?,hot=?,size=?,cosan=?,brand=?,color=?,description=? WHERE id=?";
        return $this->exec1($sql,$name,$slug,$price,$discount,$all_images,$IDCate,$hot,$size,$cosan,$brand,$color,$Description,$id);
    }

    function showOnePhone($id)
    {
        $sql = "SELECT * FROM product WHERE id=?";
        return $this->result1(1,$sql,$id);
    }
    function countAllProduct()
    {
        $sql = "SELECT count(*) AS sodong FROM product";
        return $this->result1(1,$sql)['sodong'];
    }

    public function Page (int $TotalProduct, int $CurrentPage)
    {
        $LimitPage = 5; // 5 sản phẩm 2 trang

        $PagedHTML = ''; // khởi tạo

        $CurrentQuery = $_GET; //query hiện tại

        $NextQuery = $_GET; //next query
        $PrevQuery = $_GET; // query trước

        $LastQuery = $_GET; // query trước đây
        $FirstQuery = $_GET; // query đầu tiên

        $IsLastButtonHidden = '';
        $IsNextButtonHidden = '';

        $IsFirstButtonHidden = '';
        $IsPreviousButtonHidden = '';

        $TotalPage = ceil($TotalProduct / PAGE_SIZE); // tổng số page

        if($CurrentPage === 1)
        {
            $IsFirstButtonHidden = 'hidden';
            $IsPreviousButtonHidden = 'hidden';
        }
        // nếu page == 1 thì không cho quay về trang trước

        if ((int) $CurrentPage === (int) $TotalPage)
        {
            $IsLastButtonHidden = 'hidden';
            $IsNextButtonHidden = 'hidden';
        }
        // nếu tổng số page hiện tại == current page thì không có tiếp tục

        $NextQuery['Page'] = $CurrentPage + 1;     //tạo ra query tiếp theo
        $LastQuery['Page'] = $TotalPage; // tạo ra query cuối
   


        $NextButton = '<li class="'.$IsNextButtonHidden.' page-item"><a class="page-link" href="?'.http_build_query($NextQuery).'">></a></li>';
        $LastButton = '<li class="'.$IsLastButtonHidden.' page-item"><a class="page-link" href="?'.http_build_query($LastQuery).'">>|</a></li>';

        $PrevQuery['Page'] = $CurrentPage - 1; //trở về trang trước
        $FirstQuery['Page'] = 1; // trở về trang 1

        $PreviousButton = '<li class="'.$IsFirstButtonHidden.' page-item"><a class="page-link" href="?'.http_build_query($PrevQuery).'"><</a></li>';
        $FirstButton = '<li class="'.$IsPreviousButtonHidden.' page-item"><a class="page-link" href="?'.http_build_query($FirstQuery).'">|<</a></li>';
        // trở về trang trước
        // trở về trang đâu
        $PagedHTML .= $FirstButton.$PreviousButton;
        //tạo html
        if ($CurrentPage <= $TotalPage && $TotalPage >= 1) // nếu page hiện tại nhỏ hơn hoặc bằng tổng số page và và tổng số page >=1
        {
            $PageBreak = 1; // break page

            if ($CurrentPage > ($LimitPage / 2)) // nếu page hiện tại lớn hon 5/2 
            {
                $CurrentQuery['Page'] = 1; // page hiện tại bằng 1 

                $PagedHTML .= '<li class="page-item"><a class="page-link" href="?'.http_build_query($CurrentQuery).'">1</a></li>'; // trang đầu
                $PagedHTML .= '<li class="page-item"><a class="page-link">...</a></li>'; // đến ....
            }

            $Loop = $CurrentPage; // lặp = page hiện tại
           
            while ($Loop <= $TotalPage) // curren page => tổng số page
            {
                if ($PageBreak < $LimitPage) // nếu pagebreak ++ nếu pagebreak < 5 (limit page)
                {
                    $CurrentQuery['Page'] = $Loop; // gán lại cho current query

                    if ($CurrentPage === $Loop) // nếu currentpage == loop
                    {
                        $PagedHTML .= '<li class="active page-item"><a class="page-link" href="?'.http_build_query($CurrentQuery).'">'.$Loop.'</a></li>';
                    } else $PagedHTML .= '<li class="page-item"><a class="page-link" href="?'.http_build_query($CurrentQuery).'">'.$Loop.'</a></li>';
                }

                $PageBreak++;
                $Loop++;
            }

            if ($CurrentPage < ($TotalPage - ($LimitPage / 2))) 
            {
                $CurrentQuery['Page'] = $TotalPage;

                $PagedHTML .= '<li class="page-item"><a class="page-link"  href="?'.http_build_query($CurrentQuery).'">...</a></li>';
                $PagedHTML .= '<li class="page-item"><a class="page-link" href="?'.http_build_query($CurrentQuery).'">'.$TotalPage.'</a></li>';
            }
        }

        return $PagedHTML.$NextButton.$LastButton;
    }
    function GetProductList($CurrentPage){
        $sql = "SELECT * FROM product WHERE id != 0 ";
        if ($CurrentPage !== 0)
        {
            $sql .= " GROUP BY id order by id desc";
        }
        return $this->result1(0,$sql);
    }
    
    function getLastestIdProduct(){
        $sql = "SELECT id as lastid FROM product ORDER BY id DESC LIMIT 1";
        return $this->result1(1,$sql)['lastid'];
    }
}