(function ($) {
    "use strict"; // Start of use strict
    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });
    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top'
        , offset: 100
    });
    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function () {
        $('.navbar-toggle:visible').click();
    });
    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 50
        }
    });
    if (screen.width >= 768) {
        $('ul.nav li.dropdown').hover(function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(500);
        }, function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(500);
        });
    }
})(jQuery); // End of use strict