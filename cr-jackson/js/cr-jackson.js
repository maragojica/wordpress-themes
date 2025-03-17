/**
 * Table of Contents:
 * 1. Sticky Menu(On Scrolling Up)
 * 2. Back To Top
 * 3. WOW
 * 6. Main Slider
 * 7. Award Slider
 * 8. Custom Videos
 * 9. Logos Slider
 * 10. Image Hot Spot
 * 11 Vertical Timeline
 * 12. Timeline Sticky Title
 * 13. Accessible Close Button
 */

/*--------------------------------------------------------------
# Sticky Menu(On Scrolling Up)
--------------------------------------------------------------*/

jQuery(document).ready(function () {

  var header = jQuery('.site-header'); 
var scrollPos = 0;
// adding scroll event
window.addEventListener('scroll', function(){
  // detects new state and compares it with the new one
  if ((document.body.getBoundingClientRect()).top > scrollPos){
    header.removeClass("header-scrolled");   //Scrolling Up    
      
    if (jQuery(window).scrollTop() > 0) {
      header.addClass('header-scrolled-top');
    } else {
      header.removeClass('header-scrolled-top');
    }  
  }else{ //Scrolling Down 
    header.addClass("header-scrolled");
	scrollPos = (document.body.getBoundingClientRect()).top;
}
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
# Main Slider
--------------------------------------------------------------*/
jQuery(document).ready(function () {
  var owl = jQuery('.main-slider').owlCarousel({
    loop: true,    
    responsiveClass: true,
    nav: true, 
    dots: false,
    margin: 0, 
    items: 1,
	autoplay: true,
    autoplayTimeout: 8000,
    smartSpeed: 1000,  
    touchDrag: true,
    mouseDrag: true,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',  
    navText: ['<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="59" height="16" viewBox="0 0 59 16"><image width="53" height="16" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADUAAAAQCAYAAAC2hzf1AAAAZUlEQVRIie3WOw6AIBRE0dEVsASW5P4bl3INfhJDQqMWb5DT0FDMTShQC5CApXnBDZCBlYN/WBVUzhxg1nMjKLoRZGAqIZLsQ+7mOFM+1OPz240wN38KSwFmvdfdh/ZyhvkFSdoAU4XghJZoIl0AAAAASUVORK5CYII="/></svg>', 
    '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="53" height="16" viewBox="0 0 53 16"><image width="53" height="16" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADUAAAAQCAYAAAC2hzf1AAAAWklEQVRIie3WsQ3AIAwFUYcJGIGRsn8Dm1xkySVlCvzxVZZo/ApLWMaAFxgpl98VIG/KwIAeIDnYKFimroI9Ph2w25+tpmMRSu6uCnR6BcqQ5IfWC1jfPprZB/jk4WTACFWiAAAAAElFTkSuQmCC"/></svg>'],
  
  });  
  jQuery(".owl-next").attr("title","Next Slider");
  jQuery(".owl-prev").attr("title","Previous Slider");
  });

/*--------------------------------------------------------------
# Award Slider
--------------------------------------------------------------*/
jQuery(document).ready(function () {
  var owl = jQuery('.awards-slider').owlCarousel({
    loop: true,    
    responsiveClass: true,
    nav: true, 
    dots: false,       
    autoplayTimeout: 8000,
    smartSpeed: 1000,  
    lazyLoad:true,
    touchDrag: true,
    mouseDrag: true,    
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    navText: ['<svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 37 37" fill="none"><mask id="mask0_363_2236" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="37" height="37"><rect x="36.2275" y="36.2275" width="36.2275" height="36.2275" transform="rotate(-180 36.2275 36.2275)" fill="#D9D9D9"/></mask><g mask="url(#mask0_363_2236)"><path d="M24.1136 3.01894L26.793 5.69827L14.3775 18.1137L26.793 30.5292L24.1136 33.2086L9.01883 18.1137L24.1136 3.01894Z" fill="white"/></g></svg>', 
    '<svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 37 37" fill="none"><mask id="mask0_363_2233" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="37" height="37"><rect width="36.2275" height="36.2275" fill="#D9D9D9"/></mask><g mask="url(#mask0_363_2233)"><path d="M12.1139 33.2086L9.43457 30.5293L21.8501 18.1138L9.43457 5.69831L12.1139 3.01898L27.2087 18.1138L12.1139 33.2086Z" fill="white"/></g></svg>'],
    responsive:{
      0:{
          items:1,  
          margin: 0       
      },
      768:{
          items:2,
          margin: 30
        
      },
      992:{
          items:3,
          margin: 30
         
      }
  }
  
  });  
  jQuery(".owl-next").attr("title","Next Slider");
  jQuery(".owl-prev").attr("title","Previous Slider");
  });

/*--------------------------------------------------------------
# Custom Videos
--------------------------------------------------------------*/

jQuery(document).ready(function () {
  const players = Array.from(document.querySelectorAll('.player')).map(p => new Plyr(p));
});

/*--------------------------------------------------------------
# Logos Slider 
--------------------------------------------------------------*/

jQuery(document).ready(function () {
  jQuery('.logo-glider').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  autoplay: false,
  autoplaySpeed: 700,
  speed: 1500,
  arrows: true,
  dots: false,
  pauseOnHover: true,
  prevArrow: '<svg class="slick-prev" xmlns="http://www.w3.org/2000/svg" width="12" height="20" viewBox="0 0 12 20" fill="none"><path d="M10.0001 19.3078L0.692383 10.0001L10.0001 0.692383L11.0636 1.75586L2.81931 10.0001L11.0636 18.2443L10.0001 19.3078Z" fill="#FFFFFF"/></svg>',
  nextArrow: '<svg class="slick-next" xmlns="http://www.w3.org/2000/svg" width="12" height="20" viewBox="0 0 12 20" fill="none"><path d="M1.99992 0.692216L11.3076 9.99992L1.99992 19.3076L0.936442 18.2441L9.18069 9.99992L0.936443 1.75569L1.99992 0.692216Z" fill="#FFFFFF"/></svg>',
  responsive: [{
    breakpoint: 1200,
    settings: {
      slidesToShow: 4
    }
  },
  {
    breakpoint: 992,
    settings: {
      slidesToShow: 3
    }
  },
  {
    breakpoint: 768,
    settings: {
      slidesToShow: 2
    }
  }, {
    breakpoint: 520,
    settings: {
      slidesToShow: 1
    }
  }]
  });
  
});

/*--------------------------------------------------------------
# Image Hot Spot
--------------------------------------------------------------*/
const selectHotspot = (e) => {
  const clickedHotspot = e.target.parentElement;
  const container = clickedHotspot.parentElement;  
  const hotspots = container.querySelectorAll(".lg-hotspot"); 
  hotspots.forEach(hotspot => {
    if (hotspot === clickedHotspot) {
      hotspot.classList.toggle("lg-hotspot--selected");
    } else {
      hotspot.classList.remove("lg-hotspot--selected");
    }
  });
}

(() => {
  const buttons = document.querySelectorAll(".lg-hotspot__button");
  buttons.forEach(button => {
    button.addEventListener("click", selectHotspot);
	  button.addEventListener("mouseover", selectHotspot);
  });
})();


/*--------------------------------------------------------------
# Vertical Timeline
--------------------------------------------------------------*/
var tm = document.getElementsByClassName("timeline");
if (tm.length > 0) {
document.addEventListener("DOMContentLoaded", function() {
  window.addEventListener('scroll', function() {
      const timelineContainer = document.querySelector('.timeline-container');	  
      const overlayLine = document.querySelector('.overlay-line');
      const totalHeight = document.body.scrollHeight - window.innerHeight;
      const progress = (window.pageYOffset / totalHeight ) * 120;
      overlayLine.style.height = `${progress}%`;

      document.querySelectorAll('.timeline-event').forEach(function(event) {
          var rect = event.getBoundingClientRect();
          if(rect.top >= 0 && rect.bottom <= window.innerHeight) {
              event.querySelector('.event-circle').style.backgroundColor = '#FB6100';
          } else {
              event.querySelector('.event-circle').style.backgroundColor = '#151515';
          }
      });
  });
});
	
}

/*--------------------------------------------------------------
# Timeline Sticky Title
--------------------------------------------------------------*/
jQuery(document).ready(function($) {
  var element = $('.timeline-header');
  var footer = $('#team-up');
  
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
# Accessible Close Button
--------------------------------------------------------------*/
jQuery(document).ready(function () {
  jQuery(".uk-close").attr("title","Close");
});