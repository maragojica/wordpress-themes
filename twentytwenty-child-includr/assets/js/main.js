jQuery(function($) {

    // Add custom script here. Please backup the file before editing/modifying. Thanks
    
    // Run the script once the document is ready
    $(document).ready(function() {
        $("#link-newsletter").click(function(){
            $(".alert-newssletter").toggle();
            $("#site-content").toggleClass("main-sm-pad");
            $(".icon-newsletter").toggleClass("icon-rotate");
        });
        $("#link-news-close").click(function(){
            $(".alert-newssletter").toggle();
            $("#site-content").toggleClass("main-sm-pad");
            $(".icon-newsletter").toggleClass("icon-rotate");
        });

        $('.pod-carousel').owlCarousel({
            loop: false,
            autoplay:false,
            autoplayTimeout:8000,
            autoplayHoverPause:true,
            animateIn: 'fadeIn',
            dots: true,
            smartSpeed:1000,
            nav: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    slideBy: 1,
                    margin: 10,
                    dots: true,
                    center: true

                },
                400: {
                    items: 1,
                    slideBy: 1,
                    margin: 10,
                    dots: true,
                    center: true
                },
                575: {
                    items: 2,
                    slideBy: 1,
                    margin: 10,
                    dots: true,
                    center: true
                },
                768: {
                    items: 3,
                    slideBy: 2,
                    margin: 15,
                    dots: true
                },
                1000: {
                    items: 4,
                    slideBy: 3,
                    margin: 15,
                    dots: true

                },
                1200: {
                    items: 5,
                    slideBy: 4,
                    margin: 15,
                    dots: true

                }
            }
        });

        $(window).resize(function() {


        });

    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#site-header').addClass('header-scrolled');
        } else {
            $('#site-header').removeClass('header-scrolled');
        }
    });


});
