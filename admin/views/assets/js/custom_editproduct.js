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

// Add color picker functionality
document.addEventListener('DOMContentLoaded', function() {
    const colorPicker = document.getElementById('colorPicker');
    const addColorBtn = document.getElementById('addColor');
    const selectedColors = document.getElementById('selectedColors');
    const colorInput = document.getElementById('colorInput');
    
    // Load existing colors if any
    if (colorInput.value) {
        const colors = colorInput.value.split(',');
        colors.forEach(color => addColorChip(color));
    }

    addColorBtn.addEventListener('click', function() {
        addColorChip(colorPicker.value);
        updateColorInput();
    });

    function addColorChip(color) {
        const chip = document.createElement('div');
        chip.className = 'color-chip';
        chip.style = `
            background-color: ${color};
            width: 30px;
            height: 30px;
            margin: 5px;
            border-radius: 5px;
            display: inline-block;
            cursor: pointer;
            position: relative;
        `;
        
        // Add remove button
        const removeBtn = document.createElement('span');
        removeBtn.innerHTML = '×';
        removeBtn.style = `
            position: absolute;
            top: -8px;
            right: -8px;
            background: #fff;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            text-align: center;
            line-height: 20px;
            box-shadow: 0 0 3px rgba(0,0,0,0.2);
        `;
        
        removeBtn.onclick = function(e) {
            e.stopPropagation();
            chip.remove();
            updateColorInput();
        };
        
        chip.appendChild(removeBtn);
        selectedColors.appendChild(chip);
    }

    function updateColorInput() {
        const chips = selectedColors.getElementsByClassName('color-chip');
        const colors = Array.from(chips).map(chip => 
            rgb2hex(chip.style.backgroundColor)
        );
        colorInput.value = colors.join(',');
    }

    // Helper function to convert RGB to HEX
    function rgb2hex(rgb) {
        if (rgb.startsWith('#')) return rgb;
        const rgbValues = rgb.match(/\d+/g);
        return '#' + rgbValues.map(x => {
            const hex = parseInt(x).toString(16);
            return hex.length === 1 ? '0' + hex : hex;
        }).join('');
    }
});