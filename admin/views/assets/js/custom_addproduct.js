

// js upload ảnh
let filesArr = [];

const dropArea = document.getElementById('drop-area');
const fileElem = document.getElementById('fileElem');
const preview = document.getElementById('preview');

dropArea.addEventListener('click', () => fileElem.click());

dropArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropArea.style.background = '#f0f0f0';
});

dropArea.addEventListener('dragleave', (e) => {
    e.preventDefault();
    dropArea.style.background = '';
});

dropArea.addEventListener('drop', (e) => {
    e.preventDefault();
    dropArea.style.background = '';
    addFiles(e.dataTransfer.files);
});

fileElem.addEventListener('change', (e) => {
    addFiles(e.target.files);
});

function addFiles(files) {
    for (let i = 0; i < files.length; i++) {
        filesArr.push(files[i]);
    }
    renderPreview();
}

function renderPreview() {
    preview.innerHTML = '';
    filesArr.forEach((file, idx) => {
        let div = document.createElement('div');
        div.style.position = 'relative';
        div.style.margin = '5px';

        let img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.style.maxWidth = '100px';
        img.style.maxHeight = '100px';
        img.style.display = 'block';

        let btn = document.createElement('button');
        btn.innerHTML = 'X';
        btn.type = 'button';
        btn.style.position = 'absolute';
        btn.style.top = '2px';
        btn.style.right = '2px';
        btn.style.background = 'red';
        btn.style.color = 'white';
        btn.style.border = 'none';
        btn.style.borderRadius = '50%';
        btn.style.width = '24px';
        btn.style.height = '24px';
        btn.style.cursor = 'pointer';
        btn.onclick = function() {
            filesArr.splice(idx, 1);
            renderPreview();
        };

        div.appendChild(img);
        div.appendChild(btn);
        preview.appendChild(div);
    });

    // Cập nhật lại input file để submit đúng file đã chọn
    let dataTransfer = new DataTransfer();
    filesArr.forEach(file => dataTransfer.items.add(file));
    fileElem.files = dataTransfer.files;
}
// js upload ảnh file product_add