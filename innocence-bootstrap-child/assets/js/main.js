jQuery(function($) {

    // Add custom script here. Please backup the file before editing/modifying. Thanks

    // Run the script once the document is ready
    $(document).ready(function() {

        $(window).scroll(function() {
            var scrollTop = $(this).scrollTop();
        });

        $(window).resize(function() {


        });
        var owlmainslider = $('.slider-main-slider');

        owlmainslider.owlCarousel({
            loop: true,
            autoplay: true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            autoplayTimeout:8000,
            autoplayHoverPause:false,
            dots: false,
            smartSpeed:1000,
            mouseDrag: false,
            touchDrag: false,
            nav: false,
            dotsData: false,
            items: 1,
            responsiveClass: false
        });

        var owl = $('.slider-timeline');

        owl.owlCarousel({
            loop: true,
            autoplay:false,
            autoplayTimeout:8000,
            autoplayHoverPause:true,
            dots: true,
            smartSpeed:1000,
            mouseDrag: true,
            touchDrag: true,
            nav: false,
            dotsData: true,
            navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    slideBy: 1,
                    margin: 7,
                    dots: true,
                    dotsData: true,
                    stagePadding: 20,
                    autoplay:false

                },
                768: {
                    items: 1,
                    slideBy: 1,
                    margin: 5,
                    dots: true,
                    dotsData: true,
                    stagePadding: 50,
                    autoplay:false
                },
                991: {
                    items: 1,
                    slideBy: 1,
                    margin: 5,
                    dots: true,
                    dotsData: true,
                    stagePadding: 135,
                    autoplay:false
                }
            }
        });
        /*owl.on('mousewheel', '.owl-stage', function (e) {

            if (e.deltaY>0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            }

            e.preventDefault();
        });*/
        var owlicons = $('.slider-icons');

        owlicons.owlCarousel({
            loop: false,
            autoplay:false,
            autoplayTimeout:6000,
            autoplayHoverPause:true,
            dots: false,
            smartSpeed:1000,
            mouseDrag: false,
            touchDrag: true,
            nav: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    slideBy: 1,
                    margin: 17,
                    stagePadding: 70,
                    autoplay:false,
                    autoHeight:true,
                    autoHeightClass: 'owl-height'

                },
                768: {
                    items: 2,
                    slideBy: 1,
                    margin: 17,
                    stagePadding: 123,
                    autoplay:false,
                    autoHeight:true,
                    autoHeightClass: 'owl-height'
                },
                991: {
                    items: 3,
                    slideBy: 2,
                    margin: 53,
                    stagePadding: 135,
                    autoplay:false
                }
            }
        });
        var owltiktok = $('.slider-tiktok');

        owltiktok.owlCarousel({
            loop: true,
            autoplay:false,
            autoplayTimeout:8000,
            autoplayHoverPause:true,
            dots: false,
            smartSpeed:1000,
            mouseDrag: true,
            touchDrag: true,
            nav: false,
            responsiveClass: true,
            responsive: {
                0: {
                    loop: true,
                    items: 1,
                    slideBy: 1,
                    margin: 10,
                    stagePadding: 0,
                    autoplay:true,
                    autoHeight:true,
                    autoHeightClass: 'owl-height',
                    nav: true

                },
                768: {
                    loop: true,
                    items: 2,
                    slideBy: 1,
                    margin: 10,
                    stagePadding: 113,
                    autoplay:true,
                    autoHeight:true,
                    autoHeightClass: 'owl-height'
                },
                991: {
                    loop: true,
                    items: 2,
                    slideBy: 1,
                    margin: 10,
                    stagePadding: 113,
                    autoplay:true
                }
            }
        });
        var owldonors = $('.slider-donors');

        owldonors.owlCarousel({
            loop: false,
            autoplay:false,
            autoplayTimeout:8000,
            autoplayHoverPause:true,
            dots: true,
            dotsData: true,
            smartSpeed:1000,
            mouseDrag: true,
            touchDrag: true,
            nav: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    slideBy: 1,
                    margin: 50,
                    stagePadding: 0

                },
                768: {
                    items: 3,
                    slideBy: 1,
                    margin: 100,
                    stagePadding: 0
                },
                991: {
                    items: 4,
                    slideBy: 1,
                    margin: 70,
                    stagePadding: 70
                },
                1200: {
                    items: 5,
                    slideBy: 1,
                    margin: 80,
                    stagePadding: 120
                }
                }

        });
        owldonors.each(function() {
            //Find each set of dots in this carousel
            $(this).find('.slide-donor').each(function(index) {
                //Add one to index so it starts from 1
                $(this).attr('aria-label', index + 1);
            });
        });


        function isScrolledIntoView(elem)
        {
            var docViewTop = $(window).scrollTop();
            var docViewBottom = docViewTop + $(window).height();

            var elemTop = $(elem).offset().top;
            var elemBottom = elemTop + $(elem).height();

            return ((elemTop <= docViewBottom) && (elemBottom >= docViewTop));
        }
        var inView = false;
        $(window).scroll(function () {
            if (isScrolledIntoView('#ChartRevenue')) {
                if (inView) {
                    return;
                }
                inView = true;
                var xValues = ["Individuals", "Foundations", "Corporation", "Events", "Yeshiva", "Investments", "Other Income"];
                var yValues = [63, 22, 6, 6, 1, 1, 1];
                var barColors = [
                    "#5660FE",
                    "#D58A6D",
                    "#E8EBFC",
                    "#242781",
                    "#F0E4D5",
                    "#030303",
                    "#9BA1FF"
                ];

                new Chart("ChartRevenue", {
                    type: "pie",
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            },
							tooltip: {
								callbacks: {
									label: (Item) => (Item.formattedValue) + '%'
								}
							}
                        },
                        title: {
                            display: false,
                            text: "Revenue"
                        }
                    }
                });
            } else {
                inView = false;
            }

            var inView = false;
            if (isScrolledIntoView('#ChartRevenue')) {
                if (inView) {
                    return;
                }
                inView = true;
                var xValuesR = ["Program", "Management & General", "Fundraising"];
                var yValuesR = [76, 12, 12];
                var barColorsR = [
                    "#5660FE",
                    "#D58A6D",
                    "#E8EBFC"
                ];

                new Chart("ChartExpenditures", {
                    type: "pie",
                    data: {
                        labels: xValuesR,
                        datasets: [{
                            backgroundColor: barColorsR,
                            data: yValuesR
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            },
							tooltip: {
								callbacks: {
									label: (Item) => (Item.formattedValue) + '%'
								}
							}
                        },
                        title: {
                            display: false,
                            text: "Expenditures"
                        }
                    }
                });
            } else {
                inView = false;
            }
        });
        $('a[href*="#"]')
        // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function(event) {
                $('#main-header').removeClass('masthead--active');

                $('.navicon-box').removeClass('navicon-box--active');

                $('.navicon').removeClass('navicon--active');

                $('.toggle').removeClass('toggle--active');
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
		
	if ($("section.module-block-map .map_wrapper").length) {
		
	        var mapIds = ['US-VA', 'US-OR', 'US-IL', 'US-MD', 'US-GA', 'US-DE', 'US-NJ', 'US-IN', 'US-UT', 'US-RI'];
	        var mapActive = 'US-OR';
  
	        var btnPrev = document.createElement("button");
		btnPrev.type = "button";
		btnPrev.innerHTML = "<";
		btnPrev.className = 'map-btn-prev';

		btnPrev.onclick = function() {
		    var key = 0;
		    mapActive = iMapsManager.getSelected(362);
		    if (mapActive.length) {
		        key = mapIds.indexOf(mapActive[0].id);
		    }
		    if (key < 1){
		        key = mapIds.length;
		    }
		    iMapsManager.select(362, mapIds[mapActive.length ? (key-1) : 0]);
		};
		
		var btnNext = document.createElement("button");
		btnNext.type = "button";
		btnNext.innerHTML = ">";
		btnNext.className = 'map-btn-next';

		btnNext.onclick = function() {
		    var key = 0;
		    mapActive = iMapsManager.getSelected(362);
		    if (mapActive.length) {
		        key = mapIds.indexOf(mapActive[0].id);
		    }
		    if (key < mapIds.length - 1){
		        iMapsManager.select(362, mapIds[mapActive.length ? (key+1) : 0]);
		    } else {
		    	iMapsManager.select(362, mapIds[0]);
		    }
		};
		
		var arrowContainer = document.createElement("div");
		arrowContainer.className = 'map-arrow-container';
		$(arrowContainer).append(btnPrev);
		$(arrowContainer).append(btnNext);

		$("section.module-block-map .map_wrapper .map_container").append(arrowContainer);

		$(".imapsContainer .imapsSprite-group.imapsContainer-group.imapsMapObject-group.imapsMapPolygon-group").click(function () {
		  mapActive = iMapsManager.getSelected(362);
		  mapActive = mapActive[0].id;
		});
		
		iMapsManager.select(362, mapActive);
	}
	
	UIkit.util.on('#uk-accordion-home', 'shown', function () {
	    var width=$(window).width();
	    
	    if (width < 1600) {
                UIkit.scroll('#uk-accordion-home .uk-open').scrollTo('#uk-accordion-home .uk-open');
            }
	});
		
    });
   /* var oldScrollY = window.scrollY;
    var directionText = document.getElementById('header');
    window.onscroll = function(e) {
        if(oldScrollY <= window.scrollY){
            $('#main-header').addClass('header-scrolled');
            $('#main-body').addClass('body-scrolled');
        } else {
            $('#main-header').removeClass('header-scrolled');
            $('#main-body').removeClass('body-scrolled');
        }
        oldScrollY = window.scrollY;
    };*/

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
