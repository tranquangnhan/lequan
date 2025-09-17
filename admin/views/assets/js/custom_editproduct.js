document.querySelectorAll('.btn-delete-img').forEach(btn => {
    btn.addEventListener('click', function() {
        const idx = parseInt(this.getAttribute('data-index'));
        let images = document.getElementById('old_images').value.split(',');
        images.splice(idx, 1);
        document.getElementById('old_images').value = images.join(',');
        this.parentElement.remove();
    });
});

// Xử lý kéo thả và upload ảnh
const dropArea = document.getElementById('drop-area');
const fileInput = document.getElementById('fileElem');
const preview = document.getElementById('preview');

// Ngăn chặn hành vi mặc định của trình duyệt
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults (e) {
    e.preventDefault();
    e.stopPropagation();
}

// Highlight drop zone khi kéo file vào
['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, highlight, false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, unhighlight, false);
});

function highlight(e) {
    dropArea.style.border = '2px dashed #4CAF50';
}

function unhighlight(e) {
    dropArea.style.border = '2px dashed #ccc';
}

// Xử lý khi thả file
dropArea.addEventListener('drop', handleDrop, false);

function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
    handleFiles(files);
}

// Click để chọn file
dropArea.addEventListener('click', () => fileInput.click());

fileInput.addEventListener('change', function() {
    handleFiles(this.files);
});

function handleFiles(files) {
    preview.innerHTML = ''; // Xóa preview cũ
    [...files].forEach(file => {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = function() {
                const img = document.createElement('img');
                img.src = reader.result;
                img.style.width = '150px';
                img.style.height = '150px';
                img.style.objectFit = 'cover';
                img.style.margin = '10px';
                preview.appendChild(img);
            }
        }
    });
}

// Thêm CSS vào file theme