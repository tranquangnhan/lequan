<?php include "header.php" ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Chỉnh sửa bình luận</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?ctrl=binhluan">Bình luận</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Thông tin bình luận</h3>
                </div>
                <form action="?ctrl=binhluan&act=update" method="post">
                    <div class="card-body">
                        <input type="hidden" name="id" value="<?= $binhluan['id'] ?>">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sản phẩm</label>
                                    <input type="text" class="form-control" value="<?= htmlspecialchars($binhluan['product_name']) ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Người dùng</label>
                                    <input type="text" class="form-control" value="<?= htmlspecialchars($binhluan['user_name']) ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nội dung bình luận</label>
                            <textarea name="noidung" class="form-control" rows="4" required><?= htmlspecialchars($binhluan['noidung']) ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Đánh giá sao</label>
                            <div class="rating-input">
                                <?php for($i = 5; $i >= 1; $i--): ?>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" 
                                               id="rating<?= $i ?>" 
                                               name="rating" 
                                               value="<?= $i ?>" 
                                               class="custom-control-input"
                                               <?= $binhluan['rating'] == $i ? 'checked' : '' ?> 
                                               required>
                                        <label class="custom-control-label" for="rating<?= $i ?>">
                                            <?php for($j = 1; $j <= 5; $j++): ?>
                                                <i class="fas fa-star <?= $j <= $i ? 'text-warning' : 'text-muted' ?>"></i>
                                            <?php endfor ?>
                                        </label>
                                    </div>
                                <?php endfor ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Trạng thái</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" 
                                       class="custom-control-input" 
                                       id="trangthai" 
                                       name="trangthai" 
                                       value="1" 
                                       <?= $binhluan['trangthai'] ? 'checked' : '' ?>>
                                <label class="custom-control-label" for="trangthai">Hiển thị bình luận</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Thời gian bình luận</label>
                            <input type="text" class="form-control" value="<?= date('d/m/Y H:i', strtotime($binhluan['ngaybinhluan'])) ?>" readonly>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-1"></i> Lưu thay đổi
                        </button>
                        <a href="?ctrl=binhluan" class="btn btn-secondary">
                            <i class="fas fa-times mr-1"></i> Hủy
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
// Preview rating stars on hover
document.querySelectorAll('.rating-input .custom-control-label').forEach(label => {
    label.addEventListener('mouseover', function() {
        const stars = this.querySelectorAll('.fa-star');
        stars.forEach(star => star.classList.add('text-warning'));
    });
    
    label.addEventListener('mouseout', function() {
        const input = this.previousElementSibling;
        if (!input.checked) {
            const stars = this.querySelectorAll('.fa-star');
            stars.forEach(star => star.classList.remove('text-warning'));
        }
    });
});
</script>

<?php include "footer.php" ?>