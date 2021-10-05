$(document).ready(function() {
    $('.dropdown-main-menu').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).fadeIn(100);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).fadeOut(500);
    });

    $('.accordion-faq').click(function() {
        var accordion = $(this).next()
        $('.icon-faq').addClass("icon-accordion-faq");
        $('.icon-faq').removeClass("icon-accordion-faq-active");
        if ($(this).hasClass('collapsed')) {
            accordion.removeClass("icon-accordion-faq");
            accordion.addClass("icon-accordion-faq-active");
        } else {
            accordion.removeClass("icon-accordion-faq-active");
            accordion.addClass("icon-accordion-faq");
        }
    });

    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
         //>=, not <=
        if (scroll >= 30) {
            //clearHeader, not clearheader - caps H
            $(".main-nav").addClass("nav-scrolled");
        }else{
            $(".main-nav").removeClass("nav-scrolled");
        }
    });
});