import $ from 'jquery';

$(document).on('ready', () => {

    setStickyPosition();

    $(window).on('resize', () => setStickyPosition());

    function setStickyPosition() {
        $('.sticky-column').each(function(){
            let top = $(".site-header").outerHeight() + 20;
            if($('body').hasClass('admin-bar')){
                top += $('#wpadminbar').outerHeight();
            }
            $(this).css('top', top + 'px');
        });
       
    }
});