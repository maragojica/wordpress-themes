jQuery(function($) {

    // Add custom script here. Please backup the file before editing/modifying. Thanks

    // Run the script once the document is ready
    $(document).ready(function() {

        var qsRegex;
        var buttonFilter;
        var $grid = $('.grid').isotope({
            itemSelector: '.element-item',
            layoutMode: 'fitRows',
            fitRows: {
                gutter: 40
            },
            filter: function() {
                var $this = $(this);
                var searchResult = qsRegex ? $this.text().match( qsRegex ) : true;
                var buttonResult = buttonFilter ? $this.is( buttonFilter ) : true;
                return searchResult && buttonResult;
            }
        });

// filter functions
       /* var filterFns = {
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
        };*/



// bind filter button click
       /* $('#filters').on( 'click', 'button', function() {
            var filterValue = $( this ).attr('data-filter');
            // use filterFn if matches value
            filterValue = filterFns[ filterValue ] || filterValue;
            $grid.isotope({ filter: filterValue });
        });*/

       /* $('#regions').on( 'click', 'button', function() {
            var filterValue = $( this ).attr('data-filter');
            // use filterFn if matches value
            filterValue = filterFns[ filterValue ] || filterValue;
            $grid.isotope({ filter: filterValue });
        });*/


// change is-checked class on buttons
       /* $('.button-group').each( function( i, buttonGroup ) {
            var $buttonGroup = $( buttonGroup );
            $buttonGroup.on( 'click', 'button', function() {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $( this ).addClass('is-checked');
            });
        });*/

        // store filter for each group
        var filters = {};

        $('.section-resources-filter').on( 'click', '.button', function( event ) {
            var $button = $( event.currentTarget );
            // get group key
            var $buttonGroup = $button.parents('.button-group');
            var filterGroup = $buttonGroup.attr('data-filter-group');
            // set filter for group
            filters[ filterGroup ] = $button.attr('data-filter');
            // combine filters
            var filterValue = concatValues( filters );
            // set filter for Isotope
            $grid.isotope({ filter: filterValue });
        });

// change is-checked class on buttons
        $('.button-group').each( function( i, buttonGroup ) {
            var $buttonGroup = $( buttonGroup );
            $buttonGroup.on( 'click', 'button', function( event ) {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                var $button = $( event.currentTarget );
                $button.addClass('is-checked');
            });
        });
        // use value of search field to filter
        var $quicksearch = $('#quicksearch').keyup( debounce( function() {
            qsRegex = new RegExp( $quicksearch.val(), 'gi' );
            $grid.isotope();
        }) );

// flatten object by concatting values
        function concatValues( obj ) {
            var value = '';
            for ( var prop in obj ) {
                value += obj[ prop ];
            }
            return value;
        }


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

        // debounce so filtering doesn't happen every millisecond
        function debounce( fn, threshold ) {
            var timeout;
            threshold = threshold || 100;
            return function debounced() {
                clearTimeout( timeout );
                var args = arguments;
                var _this = this;
                function delayed() {
                    fn.apply( _this, args );
                }
                timeout = setTimeout( delayed, threshold );
            };
        }



        $(window).scroll(function() {
            var scrollTop = $(this).scrollTop();
        });

        $(window).resize(function() {


        });

        $('.partner-carousel').owlCarousel({
            loop: true,
            autoplay:true,
            autoplayTimeout:8000,
            autoplayHoverPause:true,
            animateIn: 'fadeIn',
            dots: false,
            smartSpeed:1000,
            mouseDrag: true,
            touchDrag: true,
            nav: true,
            navText : ["<i class='fas fa-chevron-left animated fadeInRight'></i>","<i class='fas fa-chevron-right animated fadeInLeft'></i>"],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    margin: 30
                },
                768: {
                    items: 3,
                    margin: 35
                },
                992: {
                    items: 3,
                    margin: 40
                },
                1200: {
                    items: 4,
                    margin: 50

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
