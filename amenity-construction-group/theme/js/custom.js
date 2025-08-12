// Table of Contents:
// 1. AOS
// 2. Fancybox
// 3. Testimonials slider
// 4. Brands Slider
// 5. Masory Slider
// 6. Counters
// 7. Timeline Slider
// 8. Items Text Slider
// 9. Our Vision Slider
// 10. Capabilities Slider

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
# Fancybox
--------------------------------------------------------------*/
document.addEventListener("DOMContentLoaded", function () {
    Fancybox.bind('[data-fancybox="gallery"]', {
      Toolbar: {
        display: [
          "slideshow",
          "fullscreen",
          "close"
        ]
      },
      Thumbs: {
        autoStart: false
      }
    });
  });

/*--------------------------------------------------------------
# Testimonials Slider
--------------------------------------------------------------*/

 var swipertestimonials = new Swiper(".testimonials-slider", {
      slidesPerView: 1,
      spaceBetween: 30,
      mousewheel: false,
      pagination: {
        el: ".swiper-pagination-testimonials",
        clickable: true,
      },
    });

/*--------------------------------------------------------------
# Brands Slider
--------------------------------------------------------------*/
var swiperbrand = new Swiper(".brands-slider", {
  loop: true,
  spaceBetween: 10,
  autoplay: {
    delay: 0, // Continuous autoplay
    disableOnInteraction: false,
  },
  speed: 3000,
  breakpoints: {
    0: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    575: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 30,
    },
    1400: {
      slidesPerView: 5,
      spaceBetween: 40,
    },
  },
});

/*--------------------------------------------------------------
# Mansory Slider
--------------------------------------------------------------*/
 var swipermansory = new Swiper(".mansory-slider", {
      slidesPerView: 1,
      spaceBetween: 0,
      mousewheel: false,
      pagination: {
        el: ".swiper-pagination-mansory",
        clickable: true,
      },
    });

   
  var swipermansoryfluid = new Swiper('.mansory-slider-fluid', {
    loop: true,
    spaceBetween: 12,
    centeredSlides: true,
    slidesPerView: 1.3,
    pagination: {
      el: ".swiper-pagination-mansory-fluid",
      clickable: true,
    },
    on: {
      slideChangeTransitionEnd: function () {
        setActiveSlide();
      }
    },
    breakpoints: {
      0: {
        slidesPerView: 1.3
      },
      1200: {
        slidesPerView: 1.3
      }
    }
  });

  function setActiveSlide() {
    document.querySelectorAll('.item').forEach(el => el.classList.remove('active'));
    const activeSlide = document.querySelector('.swiper-slide-active .item');
    if (activeSlide) {
      activeSlide.classList.add('active');
    }
  }

  // Set initial active slide
  setActiveSlide();

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
                   duration: 6000,
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
# Timeline Slider
--------------------------------------------------------------*/
/**Mobile**/
const swipertimelineMob = new Swiper(".timeline-slider-mobile", {
  direction: "horizontal",
  grabCursor: true,
  mousewheel: true,
  loop: false, 
  navigation: {
    nextEl: ".timeline-next",
    prevEl: ".timeline-prev",
  },
  breakpoints: {
    0: { 
      slidesPerView: 1.5, 
      spaceBetween: 30,
     
    },
    575: { 
      slidesPerView: 2.5, 
      spaceBetween: 40,
    },
    768: { 
      slidesPerView: 3.6, 
      spaceBetween: 40,
    },
    1560: { 
      slidesPerView: 4.8, 
      spaceBetween: 70,
    },
    1800: { 
      slidesPerView: 5.8, 
      spaceBetween: 103,
    }
  }
});

/**Desktop**/
/*const swipertimelineDesk = new Swiper(".timeline-slider-desktop", {
  direction: "horizontal",
  grabCursor: true,
  mousewheel: true,
  loop: false, 
  navigation: {
    nextEl: ".timeline-next",
    prevEl: ".timeline-prev",
  },
  breakpoints: {
    0: { 
      slidesPerView: 1.5, 
      spaceBetween: 30,
       navigation: false
    },
    575: { 
      slidesPerView: 2.5, 
      spaceBetween: 40,
      navigation: false 
    },
    768: { 
      slidesPerView: 3.6, 
      spaceBetween: 40,
      navigation: false
    },
    1560: { 
      slidesPerView: 4.8, 
      spaceBetween: 70,
      navigation: false
    },
    1800: { 
      slidesPerView: 5.8, 
      spaceBetween: 103,
      navigation: false
    }
  }
});*/
const swipertimelineDesk = new Swiper(".timeline-slider-desktop", {
  direction: "horizontal",
  grabCursor: true,
  mousewheel: true,
  loop: true, // Enable infinite loop
  
  // Smooth auto-scroll with pit stops
  autoplay: {
    delay: 2000, // 2 second pause at each slide (pit stop)
    disableOnInteraction: false, // Continue autoplay after user interaction
    pauseOnMouseEnter: true, // Pause when mouse enters the slider
  },
  
  navigation: {
    nextEl: ".timeline-next",
    prevEl: ".timeline-prev",
  },
  
  breakpoints: {
    0: { 
      slidesPerView: 1.5, 
      spaceBetween: 30,
      navigation: false
    },
    575: { 
      slidesPerView: 2.5, 
      spaceBetween: 40,
      navigation: false 
    },
    768: { 
      slidesPerView: 3.6, 
      spaceBetween: 40,
      navigation: false
    },
    1560: { 
      slidesPerView: 4.8, 
      spaceBetween: 70,
      navigation: false
    },
    1800: { 
      slidesPerView: 5.8, 
      spaceBetween: 103,
      navigation: false
    }
  },
  
  // Smooth continuous movement
  speed: 3000, // Slower transition for smooth continuous effect
  
  // Event handlers to maintain autoplay after interactions
  on: {
    init: function() {
      const swiperEl = this.el;
      
      // Ensure hover pause works properly
      swiperEl.addEventListener('mouseenter', () => {
        this.autoplay.stop();
      });
      
      swiperEl.addEventListener('mouseleave', () => {
        this.autoplay.start();
      });
    },
    
    // Restart autoplay after drag
    touchEnd: function() {
      setTimeout(() => {
        this.autoplay.start();
      }, 100);
    },
    
    // Restart autoplay after mouse wheel scroll
    mousewheel: function() {
      setTimeout(() => {
        this.autoplay.start();
      }, 100);
    },
    
    // Restart autoplay after any slide change
    slideChange: function() {
      if (!this.el.matches(':hover')) {
        this.autoplay.start();
      }
    }
  }
});
/*--------------------------------------------------------------
# Items Text Slider
--------------------------------------------------------------*/

var swipertextItems = new Swiper(".items-text-slider", {
  slidesPerView: 1,
  spaceBetween: 30,
  mousewheel: false,
  pagination: {
    el: ".swiper-pagination-items-text",
    clickable: true,
  },
});

/*--------------------------------------------------------------
# Our Vision Slider
--------------------------------------------------------------*/

var swiperourVision = new Swiper(".our-vision-slider", {
  slidesPerView: 1,
  spaceBetween: 30,
  mousewheel: false,
  pagination: {
    el: ".swiper-pagination-our-vision",
    clickable: true,
  },
});

/*--------------------------------------------------------------
# Capabilities Slider
--------------------------------------------------------------*/

var swipercapabilities = new Swiper(".capabilities-slider", {
  slidesPerView: 1,
  spaceBetween: 30,
  mousewheel: false,
  autoHeight: false,
  pagination: {
    el: ".swiper-pagination-capabilities",
    clickable: true,
  },
 /* navigation: {
    nextEl: ".next-capabilities",
    prevEl: ".prev-capabilities",
  }*/
});

// eslint-disable-next-line no-undef
})(jQuery, window, document);

      
   