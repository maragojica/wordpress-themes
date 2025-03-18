jQuery(function($) {

    // Add custom script here. Please backup the file before editing/modifying. Thanks

    // Run the script once the document is ready
    $(document).ready(function() {



        $(window).scroll(function() {
            var scrollTop = $(this).scrollTop();
        });

        $(window).resize(function() {


        });
        $("li.cta-header a").attr('uk-toggle', 'target: #modal-form');

        $('.waitlist-carousel').owlCarousel({
            loop: true,
            center: true,
            autoplay:true,
            autoplayTimeout:8000,
            autoplayHoverPause:true,
            animateIn: 'fadeIn',
            dots: false,
            smartSpeed:1000,
            mouseDrag: true,
            touchDrag: true,
            nav: true,
            navText : ["<i class='fa-solid fa-caret-left animated fadeInRight'></i>","<i class='fa-solid fa-caret-right animated fadeInLeft'></i>"],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2,
                    margin: 15,
                },
                1000: {
                    items: 3,
                    margin: 10
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
                        }, 80, function() {
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
        if ($(this).scrollTop() > 70) {
            $('#main-header').addClass('header-scrolled');
            $('#main-body').addClass('body-scrolled');
        } else {
            $('#main-header').removeClass('header-scrolled');
            $('#main-body').removeClass('body-scrolled');
        }
    });

    $(window).on('load', function(){


        $('.navicon').on('click', function (e) {
            e.preventDefault();
            $('#main-header').toggleClass('masthead--active');
            $('.navicon-box').toggleClass('navicon-box--active');

            $(this).toggleClass('navicon--active');

            $('.toggle').toggleClass('toggle--active');
        });
        $('.navicon-open').on('click', function (e) {
            e.preventDefault();
            $('#main-header').toggleClass('masthead--active');

            $('.navicon-box').toggleClass('navicon-box--active');

            $('.navicon').toggleClass('navicon--active');

            $('.toggle').toggleClass('toggle--active');
        });

    });


});
