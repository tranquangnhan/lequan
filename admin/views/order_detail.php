<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

    
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="mt-0 header-title">Đơn hàng chi tiết</h4>
                                    

                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                        <th>STT</th>
                                        <th>ID đơn hàng </th>
                                        <th>ID sản phẩm</th>
                                        <th>Tên SP</th>
                                        <th>Hình </th>
                                        <th>Giá</th>
                                        <th>Kích cỡ</th>
                                        <th>Màu</th>
                                        <th>Số lượng</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <?php
                                        $stt = 0;
                                            foreach ($getProDetail as $row) {
                                                $inforPro = $this->modelpro->showOnePhone($row['product_id']);
                                                $stt++;
                                                if(is_file(PATH_IMG_SITE.explode(",",$inforPro['image_list'])[0])){
                                                    $img = PATH_IMG_SITE.explode(",",$inforPro['image_list'])[0];
                                                }else{
                                                    $img = PATH_IMG_SITE.'logo.png';
                                                }
                                          
                                                echo '<tr>
                                                        <td>'.$stt.'</td>
                                                        <td>'.$row['donhang_id'].'</td>
                                                        <td>'.$row['product_id'].'</td>
                                                        <td>'.$inforPro['name'].'</td>
                                                        <td><img width="50" height="50" src="'.$img.'"></td>
                                                        <td>'.$this->lib->forMatTien($row['price']).' đ</td>
                                                        <td>'.$row['size'].'</td>
                                                        <td>'.$row['color'].'</td>
                                                        <td>'.$row['quantity'].'</td>
                                                    </tr>';
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <table>
                                    <tr>
                                        <td>Tên KH:  </td>
                                        <td><strong><?= $getInfoDetail['firstname']?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Email: </td>
                                        <td><strong><?= $getInfoDetail['email']?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại: </td>
                                        <td><strong><?= $getInfoDetail['phone']?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ: </td>
                                        <td><strong><?php echo $getInfoDetail['address']  ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Ghi chú: </td>
                                        <td><strong><?=strip_tags($getInfoDetail['note'])?></strong></td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Ghi Chú Của Admin: </td>
                                        <td><strong><?= $getInfoDetail['GhiChuCuaAdmin']?></strong></td>
                                    </tr> -->
                                    <tr>
                                        <td>Status: </td>
                                        <td><strong><?= ($getInfoDetail['status']==0) ? 'Đang Xử Lý':'Hoàn thành' ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Order time: </td>
                                        <td><strong><?= $getInfoDetail['ngaydat']?></strong></td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Thời Điểm Giao Hàng: </td>
                                        <td><strong><?= $getInfoDetail['ThoiDiemGiaoHang']?></strong></td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>Ẩn Hiện: </td>
                                        <td><strong><?= ($getInfoDetail['AnHien'] =='1') ? 'Hiện' : 'Ẩn'?></strong></td>
                                    </tr> -->
                                </table>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row d-flex justify-content-end">
                            <div class="col-lg-2">
                                <a name="" id="" class="btn btn-danger" href="<?=ROOT_URL?>/admin/?ctrl=order" role="button">Back</a>
                                <!-- <a name="" id="" class="btn btn-primary" href="?ctrl=donhang&act=edit&id=<?=$_GET['id']?>" role="button">Sửa</a> -->
                            </div>
                        </div>
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->


            </div>
    