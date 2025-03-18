jQuery(function($) {
    // Run the script once the document is ready
    $(document).ready(function() {

        $('.actions-carousel').owlCarousel({
            items:3,
            loop: true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            animateIn: 'fadeIn',
            dots: false,
            smartSpeed:650,
            nav: true,
            navText : ["<i class='fas fa-chevron-left animated fadeInRight'></i>","<i class='fas fa-chevron-right animated fadeInLeft'></i>"],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    margin: 5

                },
                375: {
                    items: 2,
                    margin: 10
                },
                575: {
                    items: 2,
                    margin: 10
                },
                768: {
                    items: 3,
                    margin: 20
                },
                991: {
                    items: 3,
                    margin: 25
                },
                1000: {
                    items: 3,
                    margin: 30

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
        if ($(this).scrollTop() > 52) {
            $('#site-header').addClass('header-scrolled');
            $('body').addClass('body-scrolled');
        } else {
            $('#site-header').removeClass('header-scrolled');
            $('body').removeClass('body-scrolled');
        }
    });

});

