// Table of Contents:
// 1. AOS


(function($, window, document) { "use strict";

  /*--------------------------------------------------------------
  # AOS
  --------------------------------------------------------------*/
  // Ensure AOS.js is loaded before initializing
  document.addEventListener('DOMContentLoaded', () => {
    AOS.init();
  });
  
  window.addEventListener('load', () => {
    AOS.refresh();
  });
  
    /*--------------------------------------------------------------
   # Cards Slider
   --------------------------------------------------------------*/
   $(document).ready(function($) {
    var $carousel = $(".cards-slider");
 
    $carousel.owlCarousel({
        loop: true,
        margin: 32,
        dots: false, 
        nav: true,
        items: 3,      
        center: false,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" width="76" height="30" viewBox="0 0 76 30" fill="none"><path d="M0.585785 13.5858C-0.195259 14.3668 -0.195259 15.6332 0.585785 16.4142L13.3137 29.1421C14.0948 29.9232 15.3611 29.9232 16.1421 29.1421C16.9232 28.3611 16.9232 27.0948 16.1421 26.3137L4.82843 15L16.1421 3.6863C16.9232 2.90525 16.9232 1.63892 16.1421 0.85787C15.3611 0.0768209 14.0948 0.076821 13.3137 0.85787L0.585785 13.5858ZM76 15L76 13L2 13L2 15L2 17L76 17L76 15Z" fill="#D5D1C8"/></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" width="76" height="30" viewBox="0 0 76 30" fill="none"><path d="M75.4142 16.4142C76.1953 15.6332 76.1953 14.3668 75.4142 13.5858L62.6863 0.857864C61.9052 0.0768156 60.6389 0.0768156 59.8579 0.857864C59.0768 1.63891 59.0768 2.90524 59.8579 3.68629L71.1716 15L59.8579 26.3137C59.0768 27.0948 59.0768 28.3611 59.8579 29.1421C60.6389 29.9232 61.9052 29.9232 62.6863 29.1421L75.4142 16.4142ZM0 15V17H74V15V13H0V15Z" fill="black"/></svg>'
        ],
        responsive: {
            0: {
                items: 1.2,
                margin: 23,
            },
            991: {
             items: 2.2,
             margin: 23,
         },
            1220: {
                items: 3.2,
            },
        },
        onTranslated: function () {
            setActiveSlide();
        },
    });
 
    function setActiveSlide() {
        $(".item").removeClass("active");
        $(".owl-item.active").eq(0).find(".item").addClass("active");
    }
 
    setActiveSlide();
    $(".owl-next").attr("title","Next Slider");
    $(".owl-prev").attr("title","Previous Slider");
 });
 
  
  
  
      // eslint-disable-next-line no-undef
      })(jQuery, window, document); 
  
      
   