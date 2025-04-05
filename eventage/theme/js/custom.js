// Table of Contents:
// 1. Parallax
// 2. Slider Work
// 3. Slider Banner CTA
// 4. Testimonials Slider
// 5. Logo Slider Section
// 6. Custom Swipe Slider Team


(function($) { "use strict";

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
# Slider Work
--------------------------------------------------------------*/
$(function() {
   var owl = $('.slider-works')
   owl.owlCarousel({
      loop: true,
      margin: 10,
      dots: false, 
      nav: true,
      items: 1,      
      center: false,
      navText: [
          '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16" fill="none"><path d="M0.292894 7.29289C-0.0976314 7.68342 -0.0976315 8.31658 0.292894 8.7071L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34314C8.46159 1.95262 8.46159 1.31946 8.07107 0.928931C7.68054 0.538407 7.04738 0.538406 6.65686 0.928931L0.292894 7.29289ZM22 7L1 7L1 9L22 9L22 7Z" fill="#C4C4C4"/></svg>',
          '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16" fill="none"><path d="M21.7071 8.70711C22.0976 8.31658 22.0976 7.68342 21.7071 7.2929L15.3431 0.928934C14.9526 0.538409 14.3195 0.538409 13.9289 0.928933C13.5384 1.31946 13.5384 1.95262 13.9289 2.34315L19.5858 8L13.9289 13.6569C13.5384 14.0474 13.5384 14.6805 13.9289 15.0711C14.3195 15.4616 14.9526 15.4616 15.3431 15.0711L21.7071 8.70711ZM-8.74228e-08 9L21 9L21 7L8.74228e-08 7L-8.74228e-08 9Z" fill="#C4C4C4"/></svg>'
      ],
      responsive: {
          0: {
              items: 1,
             
          },               
          1024: {
              items: 1,
          },
      },
     
     });  
    
});

/*--------------------------------------------------------------
# Slider Banner CTA
--------------------------------------------------------------*/


 $(function() {
    var owl = $('.slider-banner-cta')
    owl.owlCarousel({
      loop: true,    
      responsiveClass: true,
      nav: true, 
      dots: false,
      margin: 0, 
      items: 1,
      autoplay: true,
      autoplayTimeout: 10000,
      smartSpeed: 1000,  
      touchDrag: true,
      mouseDrag: true,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',  
     
    });  
    
    });
/*--------------------------------------------------------------
# Testimonials Slider
--------------------------------------------------------------*/

var rev = jQuery('.testimonials_slider');

rev.on('init', function(event, slick) {
    var cur = jQuery(slick.$slides[slick.currentSlide]),
        next = cur.next(),
        next2 = cur.next().next(),
        prev = cur.prev(),
        prev2 = cur.prev().prev();

    prev.addClass('slick-sprev');
    next.addClass('slick-snext');
    prev2.addClass('slick-sprev2');
    next2.addClass('slick-snext2');

    cur.removeClass('slick-snext slick-sprev slick-snext2 slick-sprev2');

    slick.$prev = prev;
    slick.$next = next;
});

rev.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
    var cur = jQuery(slick.$slides[nextSlide]),
        next = cur.next(),
        prev = cur.prev();

    // Ensure elements exist before removing classes
    if (slick.$prev) slick.$prev.removeClass('slick-sprev');
    if (slick.$next) slick.$next.removeClass('slick-snext');
    if (slick.$prev && slick.$prev.prev()) slick.$prev.prev().removeClass('slick-sprev2');
    if (slick.$next && slick.$next.next()) slick.$next.next().removeClass('slick-snext2');

    prev.addClass('slick-sprev');
    next.addClass('slick-snext');
    if (prev.prev()) prev.prev().addClass('slick-sprev2');
    if (next.next()) next.next().addClass('slick-snext2');

    slick.$prev = prev;
    slick.$next = next;

    cur.removeClass('slick-snext slick-sprev slick-snext2 slick-sprev2');
});

rev.slick({
    speed: 1000,
    arrows: true,
    dots: false,
    focusOnSelect: true,
    prevArrow: '<button title="Prev Arrow" class="prev-arrow wow fadeInRight" data-wow-duration="0.3s" data-wow-delay="0.2s"><svg xmlns="http://www.w3.org/2000/svg" width="110" height="12" viewBox="0 0 110 12" fill="none"><path d="M109.03 6.53033C109.323 6.23744 109.323 5.76256 109.03 5.46967L104.257 0.696699C103.964 0.403806 103.49 0.403806 103.197 0.696699C102.904 0.989593 102.904 1.46447 103.197 1.75736L107.439 6L103.197 10.2426C102.904 10.5355 102.904 11.0104 103.197 11.3033C103.49 11.5962 103.964 11.5962 104.257 11.3033L109.03 6.53033ZM0.5 6.75H108.5V5.25H0.5V6.75Z" fill="white"/></svg></button>',
    nextArrow: '<button title="Next Arrow" class="next-arrow wow fadeInRight" data-wow-duration="0.3s" data-wow-delay="0.2s"><svg xmlns="http://www.w3.org/2000/svg" width="110" height="12" viewBox="0 0 110 12" fill="none"><path d="M109.03 6.53033C109.323 6.23744 109.323 5.76256 109.03 5.46967L104.257 0.696699C103.964 0.403806 103.49 0.403806 103.197 0.696699C102.904 0.989593 102.904 1.46447 103.197 1.75736L107.439 6L103.197 10.2426C102.904 10.5355 102.904 11.0104 103.197 11.3033C103.49 11.5962 103.964 11.5962 104.257 11.3033L109.03 6.53033ZM0.5 6.75H108.5V5.25H0.5V6.75Z" fill="white"/></svg></button>',
    infinite: true,
    centerMode: true,
    slidesPerRow: 1,
    slidesToShow: 1,
    slidesToScroll: 1,
    centerPadding: '0',
    swipe: true,
    customPaging: function() {
        return '';
    },
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
      prevArrow: '<button class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><mask id="mask0_129_33" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><rect x="24" y="24" width="24" height="24" transform="rotate(-180 24 24)" fill="#D9D9D9"/></mask><g mask="url(#mask0_129_33)"><path d="M15.975 2L17.75 3.775L9.525 12L17.75 20.225L15.975 22L5.975 12L15.975 2Z" fill="#313932"/></g></svg></button>',
      nextArrow: '<button class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><mask id="mask0_129_36" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><rect width="24" height="24" fill="#D9D9D9"/></mask><g mask="url(#mask0_129_36)"><path d="M8.025 22L6.25 20.225L14.475 12L6.25 3.775L8.025 2L18.025 12L8.025 22Z" fill="#313932"/></g></svg></button>',
      responsive: [
        {
          breakpoint: 1200,
          settings: { slidesToShow: 4 }
        },
        {
          breakpoint: 992,
          settings: { slidesToShow: 3 }
        },
        {
          breakpoint: 768,
          settings: { slidesToShow: 2 }
        },
        {
          breakpoint: 520,
          settings: { slidesToShow: 1 }
        }
      ]
    });
  });
  
/*--------------------------------------------------------------
# Custom Swipe Slider Team
--------------------------------------------------------------*/
var $swiperSelector = $('.swiper-container');

$swiperSelector.each(function(index) {
    var $this = $(this);
    $this.addClass('swiper-slider-' + index);
    
    var dragSize = $this.data('drag-size') ? $this.data('drag-size') : 164;
    var freeMode = $this.data('free-mode') ? $this.data('free-mode') : false;
    var loop = $this.data('loop') ? $this.data('loop') : false;
    var slidesDesktop = 4.5; // 5.5 slides on desktop
    var slidesSmallDesktop = 3.5;  // 3.5 slides on small desktop
    var slidesTablet = 2.5;  // 2.5 slides on tablet
    var slidesMobile = 1.5;  // 1.5 slides on mobile
    var spaceBetween = $this.data('space-between') ? $this.data('space-between') : 32;

    var swiper = new Swiper('.swiper-slider-' + index, {
      direction: 'horizontal',
      loop: loop,
      freeMode: freeMode,
      spaceBetween: spaceBetween,
      watchOverflow: true, // Ensures scrollbar shows when needed
      breakpoints: {
        1920: {
          slidesPerView: slidesDesktop
        },
        1200: {
          slidesPerView: slidesSmallDesktop
        },
        768: {
          slidesPerView: slidesTablet
        },
        320: {
           slidesPerView: slidesMobile
        }
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      },
      scrollbar: {
        el: '.swiper-scrollbar',
        draggable: true,
        dragSize: dragSize,
        hide: false // Keeps scrollbar visible
      }
   });
});


    // eslint-disable-next-line no-undef
    })(jQuery); 

    
 