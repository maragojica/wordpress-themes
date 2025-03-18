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

        if ($(window).width() <= 1000) {
            $(".nav-menu-action .menu-item-has-children").click(function(){
                $(".nav-menu-action .menu-item-has-children").toggleClass("menu-hover");
            });
        }

        $('.post-carousel').owlCarousel({
            items:3,
            loop: true,
            margin: 200,
            autoplayTimeout:8000,
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
                    margin: 20

                },
                768: {
                    items: 2,
                    margin: 25
                },
                991: {
                    items: 2,
                    margin: 35
                },
                1000: {
                    items: 3,
                    margin: 40

                }
            }
        });
        $('.updates-home-carousel').owlCarousel({
            items:1,
            loop: true,
            margin: 20,
            autoplay:true,
            autoplayTimeout:8000,
            autoplayHoverPause:true,
            animateIn: 'fadeIn',
            dots: false,
            smartSpeed:850,
            nav: true,
            navText : ["<i class='fas fa-chevron-left animated fadeInRight'></i>","<i class='fas fa-chevron-right animated fadeInLeft'></i>"]
        });


    });


    $(window).scroll(function() {
        if ($(this).scrollTop() > 40) {
            $('#site-header').addClass('header-scrolled');
        } else {
            $('#site-header').removeClass('header-scrolled');
        }
    });


});
