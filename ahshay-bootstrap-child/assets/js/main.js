jQuery(function($) {

    // Add custom script here. Please backup the file before editing/modifying. Thanks

    // Run the script once the document is ready
    $(document).ready(function() {

        $(window).scroll(function() {
            var scrollTop = $(this).scrollTop();
        });

        $(window).resize(function() {


        });
     
      
       

        $('.posts-carousel').owlCarousel({
            loop: true,
            autoplay:true,
            autoplayTimeout:5000,
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
                    margin: 0,
                    dots: false,
                    center: false,
                    nav: false,
                    autoplay:true

                },
                768: {
                    items: 2,
                    slideBy: 1,
                    margin: 10,
                    dots: false,
                    center: true,
                    nav: false
                },
                992: {
                    items: 2,
                    slideBy: 1,
                    margin: 20,
                    dots: false,
                    center: true,
                    nav: false
                }
            }
        });
        $('.partner-carousel').owlCarousel({
            loop: true,
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:true,
            animateIn: 'fadeIn',
            dots: false,
            smartSpeed:1000,
            mouseDrag: true,
            touchDrag: true,
            nav: false,
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
        $('.testimonials-carousel').owlCarousel({
            loop: true,
            autoplay:false,
            autoplayTimeout:8000,
            autoplayHoverPause:true,
            animateIn: 'fadeIn',
            dots: false,
            smartSpeed:3000,
            mouseDrag: false,
            touchDrag: false,
            nav: true,
            responsiveClass: false,
            items: 1,
            navText : ["<svg class='animated fadeInRight' xmlns='http://www.w3.org/2000/svg' width='43' height='43' viewBox='0 0 43 43' fill='none'> <g clip-path='url(#clip0_2014_8553)'> <path d='M38.0015 21.5L6.71895 21.5' stroke='white' stroke-width='5' stroke-linecap='round' stroke-linejoin='round'/><path d='M18.2393 35.8333L6.1276 22.5212C5.62594 21.9658 5.62594 21.052 6.1276 20.4966L18.2393 7.1845' stroke='white' stroke-width='5' stroke-linecap='round' stroke-linejoin='round'/></g> <defs><clipPath id='clip0_2014_8553'><rect width='43' height='43' fill='white' transform='translate(43 43) rotate(-180)'/> </clipPath> </defs></svg>","<svg class='animated fadeInLeft' xmlns='http://www.w3.org/2000/svg' width='43' height='43' viewBox='0 0 43 43' fill='none'> <g clip-path='url(#clip0_2012_8549)'> <path d='M4.99902 21.5H36.2815' stroke='white' stroke-width='5' stroke-linecap='round' stroke-linejoin='round'/><path d='M24.7607 7.16675L36.8724 20.4788C37.3741 21.0342 37.3741 21.948 36.8724 22.5034L24.7607 35.8155' stroke='white' stroke-width='5' stroke-linecap='round' stroke-linejoin='round'/></g><defs><clipPath id='clip0_2012_8549'><rect width='43' height='43' fill='white'/></clipPath></defs> </svg>"],          
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
              $('.btn-card-1').on('click', function (e) {
            e.preventDefault();
            $('.overlay-values-back-1').toggleClass('hide-back');   
           
        });
        $('.btn-card-back-1').on('click', function (e) {
            e.preventDefault();
            $('.overlay-values-back-1').toggleClass('hide-back');   
           
        });
        $('.btn-card-2').on('click', function (e) {
            e.preventDefault();
            $('.overlay-values-back-2').toggleClass('hide-back');   
           
        });
        $('.btn-card-back-2').on('click', function (e) {
            e.preventDefault();
            $('.overlay-values-back-2').toggleClass('hide-back');   
           
        });
        $('.btn-card-3').on('click', function (e) {
            e.preventDefault();
            $('.overlay-values-back-3').toggleClass('hide-back');   
           
        });
        $('.btn-card-back-3').on('click', function (e) {
            e.preventDefault();
            $('.overlay-values-back-3').toggleClass('hide-back');   
           
        });
        $('.btn-card-4').on('click', function (e) {
            e.preventDefault();
            $('.overlay-values-back-4').toggleClass('hide-back');   
           
        });
        $('.btn-card-back-4').on('click', function (e) {
            e.preventDefault();
            $('.overlay-values-back-4').toggleClass('hide-back');   
           
        });

    });
      


    $(window).on('load', function(){


        $('.navicon').on('click', function (e) {
            e.preventDefault();
            $('#main-header').toggleClass('masthead--active');
            $('#main-body').toggleClass('body--active');
            $('.navicon-box').toggleClass('navicon-box--active');

            $(this).toggleClass('navicon--active');

            $('.toggle').toggleClass('toggle--active');
        });
        $('.navicon-open').on('click', function (e) {
            e.preventDefault();
            $('#main-header').toggleClass('masthead--active');
            $('#main-body').toggleClass('body--active');

            $('.navicon-box').toggleClass('navicon-box--active');

            $('.navicon').toggleClass('navicon--active');

            $('.toggle').toggleClass('toggle--active');
        });

    });
	
    /*
    $(window).scroll(function() {
        if ($(this).scrollTop() > 70) {
            $('#main-header').addClass('header-scrolled');
            $('#main-body').addClass('body-scrolled');
        } else {
            $('#main-header').removeClass('header-scrolled');
            $('#main-body').removeClass('body-scrolled');
        }
		
		var fixStickyshare = $('.content-share').offset().top;   
        var currentScroll = $(window).scrollTop();
        if (currentScroll >= fixStickyshare) {
            $('.content-share').addClass('sticky-share');
        } else {
            $('.content-share').removeClass('sticky-share');
        }
       
    }); 
    */

});
