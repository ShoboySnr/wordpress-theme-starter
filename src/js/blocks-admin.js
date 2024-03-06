// bundle.js
import $ from 'jquery';


$(document).on('ready', () => {

    if(window.acf){
        window.acf.addAction('render_block_preview/type=image', ($block) => {
            if(!$block[0].querySelector('img')){
                let inner = $block[0].querySelector('.block-image');
                let img = document.createElement('img');
                img.classList.add('placeholder-image');
                img.src = theme.templateURL + '/dist/images/img-placeholder-16x9.svg';
                inner.appendChild(img);
            } else {
                let inner = $block[0].querySelector('.block-image');
                let placeholder = inner.querySelector('.placeholder-image');
                if(placeholder) placeholder.remove();
            }
        });
    }
});