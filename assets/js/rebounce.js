((function($) {
    $(document).on('click', 'a[href^="#"]', function(event) {
        event.preventDefault();
        $('.navbar-collapse').collapse('hide');
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 1000, "easeInOutExpo");
    });

    $('body').scrollspy({
        target: '#nav'
    });
})(jQuery));
