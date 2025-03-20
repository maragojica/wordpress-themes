// Table of Contents:
// 1. Parallax Img
// 2. Parallax
// 3. Counters
// 4. Logo Slider
// 5. Partners Slider
// 6. Testimonials Slider
// 7. Timeline Slider
// 8. Blog Slider
// 9. Cards Slider
// 10. Criteria Slider
// 11. Mansory Slider
// 12. Focus Area Slider
// 13. Logos List Slider



(function($) { "use strict";

/*--------------------------------------------------------------
# Parallax Img
--------------------------------------------------------------*/
var $images = $('.parallax-img');
var window_h = $(window).height();

$(window).scroll(function() {
    var windowScrollTop = $(window).scrollTop();
  
    if (windowScrollTop == 0) {
       TweenLite.to($images, 1.2, {
          yPercent: 0,
          ease: Power1.easeOut,
          overwrite: 0
       });
    }
    else{   
       $images.each(function() {
          var elementOffsetTop = $(this).offset().top,
             element_h = $(this).height(),          
             velocity = $(this).data('velocity');

             if (windowScrollTop + window_h > elementOffsetTop && windowScrollTop  < elementOffsetTop + element_h) {
                //if in view:
                
               TweenLite.to($(this), 1.2, {
                 yPercent: (windowScrollTop + window_h - elementOffsetTop) / window_h * velocity,
                 ease: Power1.easeOut,
                 overwrite: 0
               });
             }
       });
    }
});
/*--------------------------------------------------------------
# Parallax
--------------------------------------------------------------*/
$(document).ready(function ($) {
    var images = document.querySelectorAll('.parallax-image');
    new simpleParallax(images, {
      delay: .6,
      transition: 'cubic-bezier(0,0,0,1)'
    });
  });

/*--------------------------------------------------------------
# Logo Slider Section
--------------------------------------------------------------*/

jQuery(document).ready(function () {
    jQuery('.logo-glider').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      autoplay: false, // Autoplay disabled, removed autoplaySpeed
      speed: 1500,
      arrows: true,
      dots: false,
      pauseOnHover: true,
      prevArrow: '<button class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><mask id="mask0_745_695" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><rect x="24" y="24" width="24" height="24" transform="rotate(-180 24 24)" fill="#D9D9D9"/></mask><g mask="url(#mask0_745_695)"><path d="M15.975 2L17.75 3.775L9.525 12L17.75 20.225L15.975 22L5.975 12L15.975 2Z" fill="#313932"/></g></svg></button>',
      nextArrow: '<button class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><mask id="mask0_745_698" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><rect width="24" height="24" fill="#D9D9D9"/></mask><g mask="url(#mask0_745_698)"><path d="M8.025 22L6.25 20.225L14.475 12L6.25 3.775L8.025 2L18.025 12L8.025 22Z" fill="#313932"/></g></svg></button>',
      responsive: [
        {
          breakpoint: 1200,
          settings: { slidesToShow: 5 }
        },
        {
          breakpoint: 992,
          settings: { slidesToShow: 4 }
        },
        {
          breakpoint: 768,
          settings: { slidesToShow: 3 }
        },
        {
          breakpoint: 520,
          settings: { slidesToShow: 2 }
        },
        {
            breakpoint: 480,
            settings: { slidesToShow: 1 }
       }
      ]
    });
  });

    // eslint-disable-next-line no-undef
    })(jQuery); 

    
 