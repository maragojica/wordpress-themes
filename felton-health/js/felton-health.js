/**
 * Table of Contents:
 * 1. Sticky Menu(On Scrolling Up)
 * 2. Back To Top
 * 3. WOW 
 * 4. Custom Videos 
 * 5. Testimonials Slider
 * 6. Slider Stories Center
 */

/*--------------------------------------------------------------
# Sticky Menu(On Scrolling Up)
--------------------------------------------------------------*/

jQuery(document).ready(function () {

  var header = jQuery('.site-header'); 
var scrollPos = 0;
var lastScrollTop = 0;
jQuery(window).on('scroll', function() {
  var st = jQuery(this).scrollTop();

  if (st < lastScrollTop) {
    // Scrolling up
    header.removeClass("header-scrolled"); 
  } else {
    // Scrolling down or not scrolling
    header.addClass("header-scrolled");
    if (jQuery(window).scrollTop() > 0) {
      header.addClass('header-scrolled-top');
    } else {
      header.removeClass('header-scrolled-top');
    } 
  }

  // Check if the user has scrolled back to the top
  if (st === 0) {
    header.removeClass("header-scrolled"); 
    header.removeClass('header-scrolled-top');
  }

  lastScrollTop = st;
});	
	
});

/*--------------------------------------------------------------
# Back To Top
--------------------------------------------------------------*/
(function($) { "use strict";

$(document).ready(function(){"use strict";
  
  var progressPath = document.querySelector('.progress-wrap path');
  var pathLength = progressPath.getTotalLength();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
  progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
  progressPath.style.strokeDashoffset = pathLength;
  progressPath.getBoundingClientRect();
  progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';		
  var updateProgress = function () {
    var scroll = $(window).scrollTop();
    var height = $(document).height() - $(window).height();
    var progress = pathLength - (scroll * pathLength / height);
    progressPath.style.strokeDashoffset = progress;
  }
  updateProgress();
  $(window).scroll(updateProgress);	
  var offset = 50;
  var duration = 550;
  jQuery(window).on('scroll', function() {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.progress-wrap').addClass('active-progress');
    } else {
      jQuery('.progress-wrap').removeClass('active-progress');
    }
  });				
  jQuery('.progress-wrap').on('click', function(event) {
    event.preventDefault();
    jQuery('html, body').animate({scrollTop: 0}, duration);
    return false;
  })  
  
});

})(jQuery); 


/*--------------------------------------------------------------
# WOW
--------------------------------------------------------------*/
new WOW().init();

/*--------------------------------------------------------------
# Custom Videos
--------------------------------------------------------------*/

jQuery(document).ready(function () {
  const players = Array.from(document.querySelectorAll('.player')).map(p => new Plyr(p));
});

/*--------------------------------------------------------------
# Testimonials Slider
--------------------------------------------------------------*/

jQuery(document).ready(function () {
  if(jQuery('.testimonials-slider').length) {
      new Glider(document.querySelector('.testimonials-slider'), {
          slidesToShow: 1,
          slidesToScroll: 1,
          draggable: false,
          rewind: true,
          arrows: {
              prev: '.glider-prev',
              next: '.glider-next'
          }
      });
  }
});

/*--------------------------------------------------------------
# Slider Stories Center
--------------------------------------------------------------*/
jQuery(document).ready(function () {
  
  var navContainer = jQuery('<div class="custom-nav-container"></div>');
  jQuery('.stories-slider').after(navContainer);

  var owl = jQuery('.stories-slider').owlCarousel({
      loop: true,
      center: true,
      responsiveClass: true,     
      nav: true,
      dots: false,
      margin: 0,
      autoplay: false,  // Enable autoplay
      autoplayTimeout: 6000,
      autoplayHoverPause: true,  // Pause on interaction
      smartSpeed: 1000,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      navContainer: '.custom-nav-container',  // Custom nav container
      navText: [
          '<svg xmlns="http://www.w3.org/2000/svg" width="116" height="16" viewBox="0 0 116 16" fill="none"><path d="M0.292893 7.29288C-0.0976333 7.68341 -0.0976334 8.31657 0.292892 8.7071L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6568L2.41422 7.99999L8.07107 2.34314C8.46159 1.95261 8.46159 1.31945 8.07107 0.928923C7.68054 0.538398 7.04738 0.538398 6.65685 0.928923L0.292893 7.29288ZM116 7L1 6.99999L1 8.99999L116 9L116 7Z" fill="white"/></svg>',
          '<svg xmlns="http://www.w3.org/2000/svg" width="116" height="16" viewBox="0 0 116 16" fill="none"><path d="M115.707 8.70711C116.098 8.31658 116.098 7.68342 115.707 7.29289L109.343 0.928932C108.953 0.538408 108.319 0.538408 107.929 0.928932C107.538 1.31946 107.538 1.95262 107.929 2.34315L113.586 8L107.929 13.6569C107.538 14.0474 107.538 14.6805 107.929 15.0711C108.319 15.4616 108.953 15.4616 109.343 15.0711L115.707 8.70711ZM0 9L115 9V7L0 7L0 9Z" fill="white"/></svg>'
      ],
      responsive: {
          0: {
              items: 1,
              autoHeight: true,
              autoplay: true
          },
          768: {
              items: 3,
          },
          1200: {
              items: 3
             
          }
      }
  });
});



/************* Next & Previous Slide With Keyboard ***************/
jQuery(document.documentElement).keydown(function (event) {    
  var owl = jQuery(".stories-slider");

  // Handle cursor keys
  if (event.keyCode == 37) {
      // Go left
      owl.trigger('prev.owl.carousel', [400]);
  } else if (event.keyCode == 39) {
      // Go right
      owl.trigger('next.owl.carousel', [400]);
  }
});
