/**
 * Table of Contents:
 * 1. Sticky Menu(On Scrolling Up)
 * 2. Back To Top
 * 3. WOW
 * 4. Main Slider
 * 5. Back & Forth Slider
 * 6. Posts Load More
 * 7. Flip Cards On Click
 * 8. Gallery Resource Show Description On Click
 * 9. Preloader
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
# Main Slider
--------------------------------------------------------------*/
jQuery(document).ready(function () {
  var owl = jQuery('.main-slider').owlCarousel({
    loop: true,    
    responsiveClass: true,
    nav: false, 
    dots: false,
    margin: 0, 
    items: 1,
	  autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: false,
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
# Back & Forth Slider Without Loop
--------------------------------------------------------------*/ 

jQuery(document).ready(function () {
  var owl = jQuery('.back-forth-slider').owlCarousel({
    loop: false,    
    responsiveClass: true,
    nav: true, 
    dots: false,
    margin: 0, 
    items: 1,
    autoHeight:true,
	  autoplay: true,
    autoplayTimeout: 8000,
    autoplayHoverPause: true,
    smartSpeed: 1000,  
    touchDrag: true,
    mouseDrag: true,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',  
    navText: ['<svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13" fill="none"><path d="M6 12.2732L0 6.27319L6 0.273193L7.4 1.67319L2.8 6.27319L7.4 10.8732L6 12.2732Z" fill="#101937"/></svg>', 
    '<svg xmlns="http://www.w3.org/2000/svg" width="9" height="13" viewBox="0 0 9 13" fill="none"><path d="M2.1543 0.273193L8.1543 6.27319L2.1543 12.2732L0.754297 10.8732L5.3543 6.27319L0.754298 1.67319L2.1543 0.273193Z" fill="#101937"/></svg>'],
  
  });  
  jQuery(".owl-next").attr("title","Next Slider");
  jQuery(".owl-prev").attr("title","Previous Slider");
  jQuery('<div id="counter"></div>').insertBefore(".back-forth-slider .owl-next");

   // Number Count
 var totalItems = jQuery('.slide-back-forth').length;
 var currentIndex = jQuery('.back-forth-slider .active').index() + 1;
 jQuery('#counter').html(''+currentIndex+'/'+totalItems+'');

  owl.on('initialized.owl.carousel changed.owl.carousel', function(e) {
    if (!e.namespace)  {
      return;
    }
    var carousel = e.relatedTarget;
    jQuery('#counter').text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);
  }); 
 

  });

  /*--------------------------------------------------------------
# Back & Forth Slider Text With Loop
--------------------------------------------------------------*/ 

jQuery(document).ready(function () {
  var owl = jQuery('.back-forth-slider-text').owlCarousel({
    loop: true,    
    responsiveClass: true,
    nav: true, 
    dots: false,
    margin: 0, 
    items: 1,
    autoHeight:true,
	  autoplay: false,
    autoplayTimeout: 8000,
    autoplayHoverPause: true,
    smartSpeed: 1000,  
    touchDrag: true,
    mouseDrag: true,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',  
    navText: ['<svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13" fill="none"><path d="M6 12.2732L0 6.27319L6 0.273193L7.4 1.67319L2.8 6.27319L7.4 10.8732L6 12.2732Z" fill="#101937"/></svg>', 
    '<svg xmlns="http://www.w3.org/2000/svg" width="9" height="13" viewBox="0 0 9 13" fill="none"><path d="M2.1543 0.273193L8.1543 6.27319L2.1543 12.2732L0.754297 10.8732L5.3543 6.27319L0.754298 1.67319L2.1543 0.273193Z" fill="#101937"/></svg>'],
    responsive: {
      0: {
          items: 1,
          autoHeight:true,
      },
      992: {
          items: 1,
          autoHeight:true,
         
      },
      1200: {
          items: 1,
          autoHeight:true,
        
         
      }
  }
  
  });  
  jQuery(".owl-next").attr("title","Next Slider");
  jQuery(".owl-prev").attr("title","Previous Slider");
  jQuery('<div id="counter-no-loop"></div>').insertBefore(".back-forth-slider-text .owl-next");

   // Number Count

 var currentIndex = jQuery('.back-forth-slider-text .active').index() + 1;
 jQuery('#counter-no-loop').html(''+1+'/'+currentIndex+'');

 

  owl.on('initialized.owl.carousel changed.owl.carousel', function(e) {
    if (!e.namespace)  {
      return;
    }
    var carousel = e.relatedTarget;
    jQuery('#counter-no-loop').text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);
  }); 
 

  });
 
/*--------------------------------------------------------------
# Posts Load More
--------------------------------------------------------------*/
jQuery('.row-news').simpleLoadMore({
  item: '.col-news',
  count: 6,
  itemsToLoad: 3,
  btnHTML: '<div class="col-xs-12 center-xs"><a href="#" tab-index="0" aria-label="Load More" title="Load More" class="load-more__btn button blue"><span class="text">Load More</span></a></div>'
});

/*--------------------------------------------------------------
# Flip Cards On Click
--------------------------------------------------------------*/

var cards = document.querySelectorAll('.box-card-info .flip');

[...cards].forEach((card)=>{
  card.addEventListener( 'click', function() {
    card.classList.toggle('flip-hover');
  }); 
});

/*--------------------------------------------------------------
# Gallery Resource Show Description On Click
--------------------------------------------------------------*/
var galls = document.querySelectorAll('.item-gallery-resources');

[...galls].forEach((gall)=>{
  gall.addEventListener( 'click', function() {
    gall.classList.toggle('show-hover');
  }); 
});


/*--------------------------------------------------------------
# Preloader
--------------------------------------------------------------*/
jQuery(window).on('load', function () {
  if (jQuery(window).width() > 1023) {
  var $preloader = jQuery('#page-preloader'),
      $spinner   = $preloader.find('.spinner');
  $spinner.fadeOut();
  $preloader.delay(350).fadeOut('slow');
  }
});