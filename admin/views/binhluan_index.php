
<div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

    
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="mt-0 header-title">Quản lý bình luận</h4>
                                    <p class="text-muted font-14 mb-3">
                                    Bình luận của người dùng về sản phẩm của bạn.
                                    </p>
                                    <table class="table mb-0" id="table_product">
                                            <thead class="thead-light">
                                               <tr>
                                                <th width="5%">ID</th>
                                                <th width="15%">Sản phẩm</th>
                                                <th width="15%">Người dùng</th>
                                                <th width="25%">Nội dung</th>
                                                <th width="10%">Đánh giá</th>
                                                <th width="15%">Ngày bình luận</th>
                                                <th width="5%">Trạng thái</th>
                                                <th width="10%">Thao tác</th>
                                            </tr>
                                            </thead>
                                             <tbody>
                                                <?php if(!empty($data)):   ;?>
                                                    <?php foreach ($data as $item): ?>
                                                    <tr>
                                                        <td><?= $item['binhluan_id'] ?></td>
                                                        <td>
                                                            <a href="?ctrl=product&act=edit&id=<?= $item['id_product'] ?>" title="Xem sản phẩm">
                                                                <?= $item['product_name'] ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a  title="Xem thông tin người dùng">
                                                                <?= $item['user_name'] ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <div class="text-wrap"><?= nl2br(htmlspecialchars($item['noidung'])) ?></div>
                                                        </td>
                                                        <td>
                                                            <div class="rating-stars">
                                                                <?php for($i = 1; $i <= 5; $i++): ?>
                                                                    <i class="fas fa-star <?= $i <= $item['rating'] ? 'text-warning' : 'text-muted' ?>"></i>
                                                                <?php endfor ?>
                                                            </div>
                                                        </td>
                                                        <td><?= date('d/m/Y H:i', strtotime($item['ngaybinhluan'])) ?></td>
                                                        <td>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input status-switch" 
                                                                    id="status_<?= $item['binhluan_id'] ?>" 
                                                                    <?= $item['trangthai'] ? 'checked' : '' ?> 
                                                                    data-id="<?= $item['binhluan_id'] ?>"
                                                                    onchange="updateStatus(this)">
                                                                <label class="custom-control-label" for="status_<?= $item['binhluan_id'] ?>"></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="?ctrl=binhluan&act=edit&id=<?= $item['binhluan_id'] ?>" 
                                                                class="btn btn-sm btn-info" 
                                                                title="Sửa">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <a href="?ctrl=binhluan&act=delete&id=<?= $item['binhluan_id'] ?>" 
                                                                class="btn btn-sm btn-danger" 
                                                                onclick="return confirm('Bạn có chắc muốn xóa bình luận này?')"
                                                                title="Xóa">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="8" class="text-center">Không có bình luận nào</td>
                                                    </tr>
                                                <?php endif ?>
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
    


<script>

    
function updateStatus(element) {
    const id = element.dataset.id;
    const status = element.checked ? 1 : 0;
    console.log(id, status);
    fetch(`?ctrl=binhluan&act=update_status&id=${id}&status=${status}`, {
        method: 'POST'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.alert('Cập nhật trạng thái thành công');
        } else {
           window.alert('Có lỗi xảy ra, vui lòng thử lại');
            element.checked = !element.checked;
        }
    })
    .catch(error => {
       window.alert('Có lỗi xảy ra, vui lòng thử lại');
        element.checked = !element.checked;
    });
}
</script>

