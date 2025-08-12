// Table of Contents:
// 1. AOS
// 2. Custom Swipe Slider Team
// 3. Custom Swipe Slider Testimonials
// 4. Custom Swipe Slider Partners Logos
// 5. Custom Swipe Slider Before After
// 6. Before & After
// 7. Counters


(function($, window, document) { "use strict";

  /*--------------------------------------------------------------
  # AOS
  --------------------------------------------------------------*/
 
// Ensure AOS.js is loaded before initializing
if (typeof AOS !== 'undefined') {
  document.addEventListener('DOMContentLoaded', () => {
    AOS.init({     
      duration: 400, // Adjust animation duration
      easing: 'ease-out-cubic', // Adjust easing for smoother animations
      once: true, // Ensure animations happen only once
      offset: 20, 
      delay: 5,
    });
  });

  window.addEventListener('load', () => {
    AOS.refresh();
  });
} else {
  console.error('AOS library is not loaded. Please include AOS.js in your project.');
}

/*--------------------------------------------------------------
# Custom Swipe Slider Team
--------------------------------------------------------------*/
var $swiperSelectorTeam = $('#team-slider');

$swiperSelectorTeam.each(function(index) {
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

    var swiperTeam = new Swiper('.swiper-slider-' + index, {
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
  

/*--------------------------------------------------------------
# Custom Swipe Slider Testimonials
--------------------------------------------------------------*/
 // Testimonials Slider
 var $testimonialsSlider = $('#testimonials-slider');

 $testimonialsSlider.each(function (index) {
   var $this = $(this);
   $this.addClass('testimonials-slider-' + index);
 
   var dragSize = $this.data('drag-size') || 164;
   var freeMode = $this.data('free-mode') || false;
   var loop = $this.data('loop') || true;
   var spaceBetween = $this.data('space-between') || 32;
 
   console.log('Initializing Testimonials Slider');
 
   new Swiper('.testimonials-slider-' + index, {
     direction: 'horizontal',
     loop: loop,
     freeMode: freeMode,
     spaceBetween: spaceBetween,
     watchOverflow: false,
     breakpoints: {
       1920: { slidesPerView: 1 },
       320: { slidesPerView: 1 },
     },
     navigation: {
       nextEl: '.testimonials-slider-next',
       prevEl: '.testimonials-slider-prev',
     },
   });
 });


/*--------------------------------------------------------------
# Custom Swipe Slider Partners Logos
--------------------------------------------------------------*/
 // Partners Slider
 var $partnersSlider = $('#partners-slider');

 $partnersSlider.each(function (index) {
   var $this = $(this);
   $this.addClass('partners-slider-' + index);
 
   var dragSize = $this.data('drag-size') || 50;
   var freeMode = $this.data('free-mode') || false;
   var loop = $this.data('loop') || true;
   var spaceBetween = $this.data('space-between') || 32;
 
   console.log('Initializing Partners Slider');
 
   new Swiper('.partners-slider-' + index, {
     direction: 'horizontal',
     loop: true,
     freeMode: freeMode,
     spaceBetween: spaceBetween,
     watchOverflow: false,
     slidesPerView: 2,
     autoplay: {
      delay: 0, // Delay between slides in milliseconds
      disableOnInteraction: false, // Autoplay continues even after user interaction
    },
    speed: 3000,
    loopedSlides: 6,
     breakpoints: {
       1220: { slidesPerView: 4 },
       991: { slidesPerView: 3 },
       768: { slidesPerView: 3 },
       550: { slidesPerView: 2 },
     },
     navigation: {
       nextEl: '.partners-slider-next',
       prevEl: '.partners-slider-prev',
     },
   });
 });
  
 /*--------------------------------------------------------------
# Custom Swipe Slider Before After
--------------------------------------------------------------*/
 // Before After Slider
 var $beforeafterSlider = $('#before-after-slider');

 $beforeafterSlider.each(function (index) {
   var $this = $(this);
   $this.addClass('before-after-slider-' + index);
 
   var dragSize = $this.data('drag-size') || 164;
   var freeMode = $this.data('free-mode') || false;
   var loop = $this.data('loop') || true;
   var spaceBetween = $this.data('space-between') || 0;
 
   console.log('Initializing Before After Slider');
 
   new Swiper('.before-after-slider-' + index, {
     direction: 'horizontal',
     loop: loop,
     freeMode: freeMode,
     spaceBetween: spaceBetween,
     watchOverflow: false,
     allowTouchMove: false, // 🔒 disables both mouse and touch drag
     breakpoints: {
       1920: { slidesPerView: 1 },
       320: { slidesPerView: 1 },
     },
     navigation: {
       nextEl: '.before-slider-slider-next',
       prevEl: '.before-slider-slider-prev',
     },
   });
 });
 

/*--------------------------------------------------------------
# Before & After
--------------------------------------------------------------*/
$(document).ready(function() {
  $(".before-after").twentytwenty();
});

/*--------------------------------------------------------------
# Counters
--------------------------------------------------------------*/
$(document).ready(function ($) {
  function isInViewport(element) {
      const rect = element.getBoundingClientRect();
      return (
          rect.top >= 0 &&
          rect.left >= 0 &&
          rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
          rect.right <= (window.innerWidth || document.documentElement.clientWidth)
      );
  }

  function startCounterAnimation() {
      $('.counter-number:not(.animated)').each(function () {
          if (isInViewport(this)) {
              const countTo = $(this).attr('data-count');
              $(this).prop('Counter', 0).animate({
                  Counter: countTo
              }, {
                  duration: 3000,
                  easing: 'swing',
                  step: function (now) {
                      $(this).text(Math.ceil(now).toLocaleString());
                  }
              });
              $(this).addClass('animated');
          }
      });
  }

  $(window).on('scroll', startCounterAnimation);
  startCounterAnimation();
});

  /*--------------------------------------------------------------
    # Blog Post Load More
    --------------------------------------------------------------*/
    $(document).ready(function(){
      $(".content-blogs").slice(0,6).show();
      $("#seeMoreBlogs").click(function(e){
        e.preventDefault();
        $(".content-blogs:hidden").slice(0,3).fadeIn("slow");
        
        if($(".content-blogs:hidden").length == 0){
           $("#seeMoreBlogs").fadeOut("slow"); 
           $("#blockMoreBlogs").fadeOut("slow");
          }
      });
    })

      // eslint-disable-next-line no-undef
      })(jQuery, window, document); 
  
      
   