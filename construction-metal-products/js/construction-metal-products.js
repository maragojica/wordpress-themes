/**
 * Table of Contents:
 * 1. Sticky Menu(On Scrolling Up)
 * 2. Back To Top
 * 3. WOW 
 * 4. Testimonials Slider
 * 5. CMP Products Sticky Sidebar
 * 6. Color Charts Load More
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
# Testimonials Slider
--------------------------------------------------------------*/
jQuery(document).ready(function () {
  var owl = jQuery('.testimonials-slider').owlCarousel({
    loop: true,    
    responsiveClass: true,
    nav: true, 
    dots: false,
    margin: 0, 
    items: 1,
	  autoplay: false,
    autoplayTimeout: 8000,
    smartSpeed: 1000,  
    touchDrag: true,
    mouseDrag: true,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',  
    navText: ['<svg class="animate fadeInLeft" xmlns="http://www.w3.org/2000/svg" width="118" height="16" viewBox="0 0 118 16" fill="none"><path d="M0.292892 7.29289C-0.0976333 7.68341 -0.0976334 8.31658 0.292892 8.7071L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6568L2.41422 7.99999L8.07107 2.34314C8.46159 1.95262 8.46159 1.31945 8.07107 0.928927C7.68054 0.538403 7.04738 0.538403 6.65685 0.928927L0.292892 7.29289ZM118 7L1 6.99999L1 8.99999L118 9L118 7Z" fill="black"/></svg>', 
    '<svg class="animate fadeInRight" xmlns="http://www.w3.org/2000/svg" width="118" height="16" viewBox="0 0 118 16" fill="none"><path d="M117.707 8.7071C118.098 8.31658 118.098 7.68341 117.707 7.29289L111.343 0.928927C110.953 0.538403 110.319 0.538403 109.929 0.928927C109.538 1.31945 109.538 1.95262 109.929 2.34314L115.586 7.99999L109.929 13.6568C109.538 14.0474 109.538 14.6805 109.929 15.0711C110.319 15.4616 110.953 15.4616 111.343 15.0711L117.707 8.7071ZM4.37114e-08 9L117 8.99999L117 6.99999L-4.37114e-08 7L4.37114e-08 9Z" fill="black"/></svg>'],
    responsiveClass: true,
    responsive:{
        0:{
            items:1,
            margin:10
            
        },
        768:{
            items:1,
            margin: 20
            
        },   
        992:{
          items:2,
          margin: 20        
         
      },                
        1200:{
            items:3,
            margin: 20           
        },  

        1500:{
            items:3,
            margin: 30           
        }
    } 
  
  });  
  jQuery(".owl-next").attr("title","Next Slider");
  jQuery(".owl-prev").attr("title","Previous Slider");
  });

/*--------------------------------------------------------------
# CMP Products Sticky Sidebar
--------------------------------------------------------------*/
jQuery(document).ready(function($) {
  var element = $('.cmp-sidebar');
  var footer = $('.section-contact');
  
  // check if both elements exist
  if (element.length && footer.length) {
      var originalY = element.offset().top;
  
      // Space between element and top of screen (when scrolling)
      var topMargin = 150;
  
      // Footer offset
      var footerOffset = 50;
  
      // Should probably be set in CSS; but here just for emphasis
      element.css('position', 'relative');
  
      $(window).on('scroll', function(event) {
          var scrollTop = $(window).scrollTop();
  
          // Distance from the top of the footer to the bottom of the sidebar
          var stopPoint = footer.offset().top - element.height() - topMargin - footerOffset;
  
          // Calculate the top value
          var topValue = scrollTop < originalY ? 0 : scrollTop - originalY + topMargin;
  
          // Check if we've hit the footer
          if(scrollTop < stopPoint) {
              element.css('top', topValue + 'px');
          } else {
              element.css('top', (stopPoint - originalY + topMargin) + 'px');
          }
      });
  } else {
  }
});

/*--------------------------------------------------------------
# Color Charts Load More
--------------------------------------------------------------*/
jQuery('.row-color-charts').simpleLoadMore({
  item: '.col-color-charts',
  count: 36,
  itemsToLoad: 6,
  btnHTML: '<div class="col-xs-12 center-xs m-t3"><a href="#" tab-index="0" aria-label="Load More" title="Load More" class="load-more__btn button blue"><span class="text">Load More</span></a></div>'
});

/*--------------------------------------------------------------
# Projects Load More
--------------------------------------------------------------*/
jQuery('.row-gall-projects').simpleLoadMore({
  item: '.col-projects',
  count: 6,
  itemsToLoad: 3,
  btnHTML: '<div class="col-xs-12 center-xs m-t3"><a href="#" tab-index="0" aria-label="Load More" title="Load More" class="load-more__btn button blue"><span class="text">Load More</span></a></div>'
});

