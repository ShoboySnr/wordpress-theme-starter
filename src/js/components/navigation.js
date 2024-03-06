import $ from 'jquery';

$(document).on('ready', () => {

    navTopPosition();

    $(window).on('resize', () => {
        navTopPosition();
    });

    //Position header correctly accounting for wp admin bar and set appropriate padding on main site content
    function navTopPosition() {
        if($('body').hasClass('admin-bar')){
            $('.site-header').css("top", $('#wpadminbar').outerHeight() + 'px');
        }
        var y = $(".site-header").outerHeight();
        $('.margin-for-header').css('margin-top', y + 'px');
        document.documentElement.style.setProperty('--header-height', y + 'px');
    }

    $('.menu-icon').on("click", function(){
        $('#mobile-nav').addClass('open');
    });
    
    $('#nav-close').on("click", () => {
        $('#mobile-nav').removeClass('open');
    });
    
    $('#mobile-menu li.menu-item-has-children > a').on('click', function(e){
        if(!$(this).hasClass('open')){
            e.preventDefault();
            $(this).toggleClass('open');
            $(this).next('.sub-menu').slideToggle();
        } 
    });

});