/*OWL Carrousel*/
$(document).ready(function() {
    $('.owl-fourcol-sponsor').owlCarousel({
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        loop: true,
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
                items: 2,
                margin: 15
            },
            768: {
                items: 3,
                margin: 20
            },
            1000: {
                items: 4,
                margin: 30
            }
        }

    });

});
$(document).ready(function() {
    $('.owl-onecol-testimonials').owlCarousel({
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        loop: true,
        margin: 30,
        smartSpeed: 1000,
        autoplay:false,
        autoplayTimeout:8000,
        autoplayHoverPause:true,
        nav: false,
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }

    });

});
$(document).ready(function() {
    $('.owl-onecol-testimonials-clients').owlCarousel({
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        loop: true,
        margin: 30,
        smartSpeed: 1000,
        autoplay:false,
        autoplayTimeout:8000,
        autoplayHoverPause:true,
        nav: false,
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }

    });

});
$(document).ready(function() {
    $('.owl-three-testimonials-clients').owlCarousel({
        loop: true,
        margin: 30,
        center: true,
        smartSpeed: 1000,
        autoplay:true,
        autoplayTimeout:8000,
        autoplayHoverPause:true,
        nav: false,
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                margin: -15

            },
            768: {
                items: 2

            },
            1000: {
                items: 3
            }
        }

    });

});
$(document).ready(function() {
    $('.owl-casestudies-slider-three-columns').owlCarousel({

        loop: true,
        center: true,
        margin: 30,
        smartSpeed: 1000,
        autoplay:false,
        autoplayTimeout:8000,
        autoplayHoverPause:true,
        nav: false,
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                margin: -25
            },
            573: {
                items: 2,
                margin: 20
            },
            768: {
                items: 3,
                margin: 20
            },
            1000: {
                items: 3
            }
        }

    });

});

( function( $ ) {
    $( document ).ready( function() {
        $( 'ul' ).on( 'hover', '.submenu-menu-item.uk-open .sub-menu li', function() {
            let parentSubmenu = $( this ).parents('.submenu-menu-item');
            let tabContainerId = $('.col-md-6 > .uk-switcher', parentSubmenu).attr('id');
            UIkit.switcher('#' + tabContainerId).show($( this ).index());
        } );
    } );
} )( jQuery );

/*End OWL Carrousel*/

$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 300) {
        $(".fixed-sidebar .box-become-partner-form").removeClass("box-contact-fixed");
    } else {
        $(".fixed-sidebar .box-become-partner-form").addClass("box-contact-fixed");
    }
    if (scroll >= 100) {
        $("header#header").addClass("scrolling");
    } else {
        $("header#header").removeClass("scrolling");

    }
});

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

function openNav() {
    document.getElementById("side-list-menu").style.width = "375px";
    document.getElementById("main").style.marginLeft = "375";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}
function closeNav() {
    document.getElementById("side-list-menu").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}

/*Back top top*/
/*window.scroll({
    top: 2500,
    left: 0,
    behavior: 'smooth'
});*/

// Scroll certain amounts from current position
window.scrollBy({
    top: 0, // could be negative value
    left: 0,
    behavior: 'smooth'
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

