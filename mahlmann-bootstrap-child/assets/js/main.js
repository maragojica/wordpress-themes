jQuery(function($) {

    // Add custom script here. Please backup the file before editing/modifying. Thanks

    // Run the script once the document is ready
    $(document).ready(function() {

        $(window).scroll(function() {
            var scrollTop = $(this).scrollTop();
        });

        $(window).resize(function() {


        });
        $('.logos-carousel').owlCarousel({
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            loop: true,
            margin: 80,
            smartSpeed: 500,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            nav: false,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2
                },
                576: {
                    items: 3
                },
                768: {
                    items: 4
                },
                1000: {
                    items: 5
                }
            }

        });
        $('a[href*="#"]')
        // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function(event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                    &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function() {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                }
            });

    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#masthead').addClass('header-scrolled');
        } else {
            $('#masthead').removeClass('header-scrolled');
        }
    });

    $(window).on('load', function(){
        $('.navicon').on('click', function (e) {
            e.preventDefault();
            $('#masthead').toggleClass('masthead--active');

            $(this).toggleClass('navicon--active');

            $('.toggle').toggleClass('toggle--active');
        });


    });


});
