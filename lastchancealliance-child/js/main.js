
jQuery(document).ready(function() {
    $(".ellipsis").each(function(){
        $(this).html("<span style>" + $(this).text() + "</span>");
    });
    $(".ellipsis").hover(function(){

        var speed = parseInt($(this).attr("speed"));
        var length = $(this).find("span").width() - $(this).width();
        var time = length/speed;
        $(this).find("span").css("transition", "left " + time + "s linear").css("left", "-" + length + "px");
    }, function(){
        $(this).find("span").attr("style", "");
    });
    $(".ellipsis").on("click",function(){;
        if($(this).find("span").attr("style") == "") {
            var speed = parseInt($(this).attr("speed"));
            var length = $(this).find("span").width() - $(this).width();
            var time = length/speed;
            $(this).find("span").css("transition", "left " + time + "s linear").css("left", "-" + length + "px");
            var $this = $(this);
        } else {
            $(this).find("span").attr("style", "");
        }
    });


        $('.events-carousel').owlCarousel({
            items:3,
            loop: true,
            margin: 200,
            autoplay:true,
            autoplayTimeout:8000,
            autoplayHoverPause:true,
            animateIn: 'fadeIn',
            dots: false,
            smartSpeed:650,
            nav: true,
            navText : ["<i class='fas fa-chevron-circle-left animated fadeInRight'></i>","<i class='fas fa-chevron-circle-right animated fadeInLeft'></i>"],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    margin: 8

                },
                768: {
                    items: 1,
                    margin: 8
                },
                991: {
                    items: 2,
                    margin: 8
                },
                1000: {
                    items: 3,
                    margin: 8

                }
            }
        });

    $('.actions-carousel').owlCarousel({
        items:3,
        loop: true,
        margin: 200,
        autoplayTimeout:8000,
        autoplayHoverPause:true,
        animateIn: 'fadeIn',
        dots: false,
        smartSpeed:650,
        nav: true,
        navText : ["<i class='fas fa-chevron-circle-left animated fadeInRight'></i>","<i class='fas fa-chevron-circle-right animated fadeInLeft'></i>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                margin: 8

            },
            768: {
                items: 1,
                margin: 8
            },
            991: {
                items: 2,
                margin: 15
            },
            1000: {
                items: 3,
                margin: 15

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
