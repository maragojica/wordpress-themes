// Table of Contents:
// 1. AOS
// 2. Fancybox


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
# Testimonials Slider
--------------------------------------------------------------*/
jQuery(function () {
  var $slider = jQuery('.testimonials-carousel');

 

  if ($slider.length > 0) {
    $slider.owlCarousel({
      items: 1,
      loop: true,
      nav: true,
      dots: true,
      autoplay: true,
      autoplayTimeout: 8000,
      smartSpeed: 800,
      touchDrag: true,
       mouseDrag: true,
      autoplayHoverPause: true,
      navText: [
      '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="25" viewBox="0 0 14 25" fill="none"><path d="M4.32775 12.5L13.2849 21.5734C13.6026 21.8969 13.7806 22.3323 13.7806 22.7857C13.7806 23.2391 13.6026 23.6744 13.2849 23.9979C13.1288 24.1569 12.9426 24.2832 12.7372 24.3694C12.5318 24.4556 12.3112 24.5 12.0884 24.5C11.8656 24.5 11.6451 24.4556 11.4396 24.3694C11.2342 24.2832 11.048 24.1569 10.8919 23.9979L0.73795 13.7122C0.420243 13.3887 0.242237 12.9534 0.242237 12.5C0.242237 12.0466 0.420243 11.6113 0.73795 11.2878L10.8914 1.00207C11.0475 0.843092 11.2337 0.71681 11.4391 0.630606C11.6445 0.544401 11.8651 0.5 12.0879 0.5C12.3107 0.5 12.5312 0.544401 12.7367 0.630606C12.9421 0.71681 13.1283 0.843092 13.2844 1.00207C13.6021 1.32558 13.7801 1.76089 13.7801 2.21432C13.7801 2.66775 13.6021 3.10305 13.2844 3.42656L4.32775 12.5Z" fill="#B8A7D9"/></svg>',
      '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="25" viewBox="0 0 14 25" fill="none"><path d="M9.67237 12.5L0.715196 21.5734C0.397489 21.8969 0.219482 22.3323 0.219482 22.7857C0.219482 23.2391 0.397489 23.6744 0.715196 23.9979C0.871278 24.1569 1.05748 24.2832 1.26292 24.3694C1.46836 24.4556 1.68892 24.5 1.91171 24.5C2.1345 24.5 2.35506 24.4556 2.5605 24.3694C2.76594 24.2832 2.95214 24.1569 3.10822 23.9979L13.2622 13.7122C13.5799 13.3887 13.7579 12.9534 13.7579 12.5C13.7579 12.0466 13.5799 11.6113 13.2622 11.2878L3.10875 1.00207C2.95267 0.843092 2.76647 0.71681 2.56103 0.630606C2.35559 0.544401 2.13503 0.5 1.91224 0.5C1.68945 0.5 1.46889 0.544401 1.26345 0.630606C1.05801 0.71681 0.871811 0.843092 0.715729 1.00207C0.398022 1.32558 0.220016 1.76089 0.220016 2.21432C0.220016 2.66775 0.398022 3.10305 0.715729 3.42656L9.67237 12.5Z" fill="#B8A7D9"/></svg>',
      ],
      responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 1,
        smartSpeed: 2000,
        autoplay: true,
      },
      992: {
        items: 1,
      }
      },
     
    });
    jQuery(".owl-next").attr("title", "Next Slider");
    jQuery(".owl-prev").attr("title", "Previous Slider");
  }
});


// eslint-disable-next-line no-undef
})(jQuery, window, document); 
  

      
   