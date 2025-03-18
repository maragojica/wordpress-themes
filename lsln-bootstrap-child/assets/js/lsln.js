/**
 * Table of Contents:
 * Sticky Menu(On Scrolling Up)
 * Back To Top
 * WOW
 * Custom Videos

 */

/*--------------------------------------------------------------
# Sticky Menu(On Scrolling Up)
--------------------------------------------------------------*/

jQuery(document).ready(function () {
    var lastScrollTop = 0;
    var header = jQuery('.site-header');
    
    window.addEventListener("wheel", e => {
      const scrollDirection = e.deltaY < 0 ? 1 : -1;
      if(scrollDirection == -1){   //Scrolling Down
        header.addClass("header-scrolled");
      }else{
        header.removeClass("header-scrolled");   //Scrolling Up    
        
        if (jQuery(window).scrollTop() > 0) {
          header.addClass('header-scrolled-top');
        } else {
          header.removeClass('header-scrolled-top');
        }      
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
  # Custom Videos
  --------------------------------------------------------------*/
  
  jQuery(document).ready(function () {
    const players = Array.from(document.querySelectorAll('.player')).map(p => new Plyr(p));
  });
  
 