jQuery(function($) {

    // Add custom script here. Please backup the file before editing/modifying. Thanks
    
    // Run the script once the document is ready
    $(document).ready(function() {
        $('.owl-casestudies-slider-three-columns').owlCarousel({

            loop: true,
            center: true,
            margin: 30,
            smartSpeed: 1000,
            autoplay:false,
            autoplayTimeout:8000,
            autoplayHoverPause:true,
            nav: true,
            navText : ["<i class='fa fa-angle-left animated fadeInRight'></i>","<i class='fa fa-angle-right animated fadeInLeft'></i>"],
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    margin: -25
                },
                573: {
                    items: 2,
                    margin: 8
                },
                768: {
                    items: 3,
                    margin: 8
                },
                1000: {
                    items: 3,
                    margin: 8
                }
            }

        });





        $(window).resize(function() {



        });



    });


    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#masthead').addClass('header-scrolled');
        } else {
            $('#masthead').removeClass('header-scrolled');
        }
    });


});
