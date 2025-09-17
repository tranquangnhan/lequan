document.addEventListener('DOMContentLoaded', function(){
    // thumbnail -> main image swap
    document.querySelectorAll('.product-images .thumb').forEach(function(t){
        t.addEventListener('click', function(){
            document.querySelectorAll('.product-images .thumb').forEach(function(x){x.classList.remove('selected')});
            t.classList.add('selected');
            var src = t.getAttribute('data-image-large-src') || t.getAttribute('src');
            var main = document.querySelector('.product-cover img#zoom');
            if(main && src){ main.src = src; }
            // if modal exists, update modal cover too
            var modalCover = document.querySelector('.js-modal-product-cover');
            if(modalCover) modalCover.src = src;
        });
    });

    // color selection visual
    document.querySelectorAll('.input-color').forEach(function(inp){
        inp.addEventListener('change', function(){
            document.querySelectorAll('.input-color').forEach(function(i){
                var el = i.closest('li');
                if(el) el.classList.remove('selected');
            });
            var li = inp.closest('li'); if(li) li.classList.add('selected');
        });
    });

    // sticky CTA on small screens: clone add-to-cart to bottom
    var addBlock = document.querySelector('.product-add-to-cart');
    if(window.innerWidth < 768 && addBlock){
        var sticky = document.createElement('div'); sticky.className='sticky-cta';
        var clone = addBlock.cloneNode(true);
        sticky.appendChild(clone);
        document.body.appendChild(sticky);
        // wire up add-to-cart button inside cloned node
        var origBtn = addBlock.querySelector('.add-to-cart');
        var clonedBtn = sticky.querySelector('.add-to-cart');
        if(origBtn && clonedBtn){
            clonedBtn.addEventListener('click', function(e){
                e.preventDefault(); origBtn.click();
            });
        }
    }
});
