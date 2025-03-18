jQuery(function($) {

    // Add custom script here. Please backup the file before editing/modifying. Thanks

    // Run the script once the document is ready
    $(document).ready(function() {

        var $grid = $('.grid').isotope({
            masonry: {
                itemSelector: '.element-item',
                layoutMode: 'fitRows'
            }
        });
        // Add hidden class if item hidden
        var itemReveal = Isotope.Item.prototype.reveal;
        Isotope.Item.prototype.reveal = function() {
            itemReveal.apply( this, arguments );
            $( this.element ).removeClass('isotope-hidden');
        };
        var itemHide = Isotope.Item.prototype.hide;
        Isotope.Item.prototype.hide = function() {
            itemHide.apply( this, arguments );
            $( this.element ).addClass('isotope-hidden');
        };

        // Show alert if no items returned
        var noItemsAlert = $('#noresources');
        $grid.isotope( 'on', 'layoutComplete', function() {
            var numItems = $grid.find('.element-item:not(.isotope-hidden)').length;
            if (numItems == 0) {
                noItemsAlert.removeClass('hide');
            } else {
                noItemsAlert.addClass('hide');
            }
        });
        var filterFns = {
            // show if number is greater than 50
            numberGreaterThan50: function() {
                var number = $(this).find('.number').text();
                return parseInt( number, 10 ) > 50;
            },
            // show if name ends with -ium
            ium: function() {
                var name = $(this).find('.name').text();
                return name.match( /ium$/ );
            }
        };

// bind filter button click
        $('.filters-button-group').on( 'click', 'button', function() {
            var filterValue = $( this ).attr('data-filter');
            // use filterFn if matches value
            filterValue = filterFns[ filterValue ] || filterValue;
            $grid.isotope({ filter: filterValue });
        });



// change is-checked class on buttons
        $('.button-group').each( function( i, buttonGroup ) {
            var $buttonGroup = $( buttonGroup );
            $buttonGroup.on( 'click', 'button', function() {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $( this ).addClass('is-checked');
            });
        });

        $(window).scroll(function() {
            var scrollTop = $(this).scrollTop();
        });

        $(window).resize(function() {


        });

        $('.posts-carousel').owlCarousel({
            loop: false,
            autoplay:false,
            autoplayTimeout:8000,
            autoplayHoverPause:true,
            animateIn: 'fadeIn',
            dots: true,
            smartSpeed:1000,
            nav: false,
            navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    slideBy: 1,
                    margin: 10,
                    dots: false,
                    center: false,
                    nav: true

                },
                768: {
                    items: 1,
                    slideBy: 1,
                    margin: 10,
                    dots: false,
                    center: false,
                    nav: true
                },
                992: {
                    items: 3,
                    slideBy: 2,
                    margin: 15,
                    dots: true

                },
                1200: {
                    items: 3,
                    slideBy: 2,
                    margin: 15,
                    dots: true

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
