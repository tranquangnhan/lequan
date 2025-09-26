document.addEventListener('DOMContentLoaded', function() {
    const colorPicker = document.getElementById('colorPicker');
    const addColorBtn = document.getElementById('addColor');
    const selectedColors = document.getElementById('selectedColors');
    const colorInput = document.getElementById('colorInput');
    
    // Load existing colors if any
    if (colorInput.value) {
        const colors = colorInput.value.split(',').filter(color => color.trim() !== '');
        colors.forEach(color => addColorChip(color));
    }

    addColorBtn.addEventListener('click', function() {
        const newColor = colorPicker.value.toUpperCase();
        addColorChip(newColor);
        updateColorInput();
    });

    function addColorChip(color) {
        // Validate color format
        if (!color.startsWith('#')) {
            color = '#' + color;
        }
        
        // Check if color already exists
        const existingColors = Array.from(selectedColors.getElementsByClassName('color-chip'))
            .map(chip => chip.getAttribute('data-color'));
        
        if (existingColors.includes(color)) return;

        const chip = document.createElement('div');
        chip.className = 'color-chip';
        chip.style.backgroundColor = color;
        chip.setAttribute('data-color', color);
        
        // Add remove button
        const removeBtn = document.createElement('span');
        removeBtn.className = 'remove-color';
        removeBtn.innerHTML = '×';
        
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
            chip.getAttribute('data-color')
        ).filter(color => color); // Remove any null/undefined values
        colorInput.value = colors.join(',');
        
        // Trigger change event to ensure form validation catches the update
        const event = new Event('change', { bubbles: true });
        colorInput.dispatchEvent(event);
    }
});