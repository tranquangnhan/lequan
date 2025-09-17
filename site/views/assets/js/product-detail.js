// Xử lý đổi ảnh chính
function changeMainImage(src) {
    document.getElementById('main-product-image').src = src;
}

// Xử lý chọn size
document.querySelectorAll('.size-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.size-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
    });
});

// Xử lý chọn màu
document.querySelectorAll('.color-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.color-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
    });
});

// Xử lý số lượng
document.querySelector('.qty-btn.minus').addEventListener('click', function() {
    let input = document.getElementById('quantity_wanted');
    let value = parseInt(input.value);
    if (value > 1) input.value = value - 1;
});

document.querySelector('.qty-btn.plus').addEventListener('click', function() {
    let input = document.getElementById('quantity_wanted');
    let value = parseInt(input.value);
    input.value = value + 1;
});