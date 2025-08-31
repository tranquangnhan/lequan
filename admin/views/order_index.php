<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

    
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="mt-0 header-title">Đơn hàng</h4>
                                   

                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                        <th>STT</th>
                                        <th>Tên KH</th>
                                        <th>Giờ đặt</th>
                                        <th>SĐT</th>
                                        <th>Địa chỉ</th>
                                    
                                        <th>Ghi chú</th>  
                                        <th>Tổng Tiền</th>
                                        <th>Trạng thái</th>                                       
                                        <th>Chi tiết</th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        <?php
                                        $stt = 0;
                                            foreach ($getAllBill as $row) {
                                                $stt++;                  
                                                if($row['status'] == 0 ) $status = '<td><button type="button" class="btn btn-dark" onclick="checkStatus('.$row['id'].')">Chờ</button></td>';    
                                                if($row['status'] == 1 ) $status = '<td><button type="button" class="btn btn-danger" >Xong</button></td>';                    
                
                                                $linkDel = "'?ctrl=order&act=delete&id=".$row['id']."'";
                                                $linkEdit = '?ctrl=order&act=edit&id='.$row['id'];
                                                $linkDetail = '?ctrl=order&act=detail&id='.$row['id'];
                                                echo '<tr>
                                                        <td>'.$stt.'</td>
                                                        <td>'.$row['firstname'].' '.$row['lastname'].'</td>
                                                        <td>'.$row['ngaydat'].'</td>
                                                        <td>'.$row['phone'].'</td>
                                                        <td>'.$row['address'].'</td>
                                                        <td>'.strip_tags(substr($row['note'],0,100)).'</td>
                                                        <td>'.$this->lib->forMatTien($row['total']).' đ</td>   
                                                        '.$status.'
                                                      
                                                        <td><a name="" id="" class="btn btn-success" href="'.$linkDetail.'" role="button"><i class="fa fa-bookmark"></i></a></td>    
                                                    </tr>';
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->


            </div>
    