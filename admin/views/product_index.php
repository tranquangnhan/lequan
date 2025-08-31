<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

    
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="mt-0 header-title">Product</h4>
                                    <p class="text-muted font-14 mb-3">
                                    This is product.
                                    </p>
                                    <table class="table mb-0" id="table_product">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th width="5px">STT</th>
                                                    <th width="120px">Tên</th>
                                                    <th width="50px">Giá</th>
                                                    <th width="20px">Hình</th>
                                                    <th width="5px">Nổi</th>
                                                    
                                                    <th width="280px">Mô tả</th>
                                                    <!-- <th width="5">Thuộc tính</th> -->
                                                    <th width="5px">Xóa</th>
                                                    <th width="5px">Sửa</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                        $stt = 0;
                                            foreach ($ProductList as $row) {
                                                $stt++;
                                                // $anHien = ($row['AnHien']=='1') ? '<span class="badge badge-success">Hiện</span>': '<span class="badge badge-danger">Ẩn</span>';
                                                 ($row['hot']=='1') ? $hot= '<input type="radio" checked >' : $hot='<input  type="radio" >';
                                                
                                                $linkProperty = '?ctrl=properties&act=edit&idedit='.$row['id'];
                                                $linkDel = "'?ctrl=product&act=delete&id=".$row['id']."'";
                                                $linkEdit = '?ctrl=product&act=edit&id='.$row['id'];
                                                
                                                if(is_file(PATH_IMG_SITE.explode(",",$row['image_list'])[0])){
                                                    $img = PATH_IMG_SITE.explode(",",$row['image_list'])[0];
                                                }else{
                                                    $img = PATH_IMG_SITE.'logo.png';
                                                }
                                                echo '<tr>
                                                        <td>'.$stt.'</td>
                                                        <td class="" >'.$row['name'].'</td>
                                                        <td><div >'.$this->lib->forMatTien($row['price']).' đ</div><br>  </td>
                                                        <td><img style="object-fit:cover;" class="img-admin" width="100" height="100" src="'.$img.'"></td>
                                                        <td> '.$hot.'</td>
                                                        
                                                        <td>'.addslashes(substr($row['description'],0,60)).' ..</td>
                                                        
                                                        <td><div  onclick="checkDelete('.$linkDel.')"  class="btn btn-danger" role="button"><i class="fa fa-trash"></i></div></td>
                                                        <td><a href=""><a name="" id="" class="btn btn-primary" href="'.$linkEdit.'" role="button"><span class="mdi mdi-pencil"></span></a></a></a></td>
                                                    </tr>';
                                            }
                                        ?>
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row d-flex justify-content-end">
                            <div class="col-lg-5">
                                <nav>
                                    <ul class="pagination pagination-split">
                                          
                                    </ul>
                                </nav>    
                                  
                            </div>
                        </div>
                             
                     
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->


            </div>
    