/**
 * Table of Contents:
 * 1. Sticky Menu(On Scrolling Up)
 * 2. Back To Top
 * 3. Custom Videos 
 * 4. Gallery Fancybox
 * 5. Main Slider
 * 6. Logo Slider
 * 7. Preloader
 */

/*--------------------------------------------------------------
# WOW
--------------------------------------------------------------*/
new WOW().init();
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
# Custom Videos
--------------------------------------------------------------*/

jQuery(document).ready(function () {
  const players = Array.from(document.querySelectorAll('.player')).map(p => new Plyr(p));
});


/*--------------------------------------------------------------
# Gallery Fancybox
--------------------------------------------------------------*/
jQuery('[data-fancybox="gallery"]').fancybox({
  buttons: [     
    "zoom",
    "fullScreen",    
    "close"
  ],
  loop: true,
  protect: true
});

/*--------------------------------------------------------------
# Main Slider
--------------------------------------------------------------*/

jQuery(document).ready(function () {
  var owlmain = jQuery('.main-slider').owlCarousel({
    loop: true,
    center: false,
    responsiveClass: true,
    items: 1,
    nav: false, 
    dots: true,
    margin: 0,    
    pullDrag: false,
    rewind: true,
    autoplay: true,
    autoplayTimeout: 6000,
    autoplayHoverPause:true,
    smartSpeed: 1000, 
    autoHeight:false,
    animateOut: 'slideOutUp',
    animateIn: 'slideInUp',
    responsive: {
      0: {
          items: 1,
          touchDrag: true,
          mouseDrag: true,
          animateOut: 'fadeOut',
          animateIn: 'fadeIn',
          autoHeight:true
      },
      992: {
          items: 1,
          touchDrag: true,
          mouseDrag: true,
          animateOut: 'fadeOut',
          animateIn: 'fadeIn',
          autoHeight:true
         
      },
      1200: {
          items: 1,
          touchDrag: false,
          mouseDrag: false,
          animateOut: 'slideOutUp',
          animateIn: 'slideInUp',
          autoHeight:true
         
      }
  }
  });
  var totalItems = jQuery('.main-slide').length;
  if(totalItems < 10){
    totalItems = "0" + totalItems;    
  }
  jQuery( ".main-slider .owl-dots" ).wrap( "<div class='dots-box'></div>" );
  jQuery( ".dots-box" ).wrap( "<div class='list-slider'></div>" );  

  });

  /************* Next & Previous Slide With Keyboard ***************/

jQuery(document.documentElement).keydown(function (event) {    

  var owlmain = jQuery(".main-slider");

 // handle cursor keys
 if (event.keyCode == 37) {
    // go left
    owlmain.trigger('prev.owl.carousel', [400]);
   //owl.trigger('owl.prev');
 } else if (event.keyCode == 39) {
    // go right
    owlmain.trigger('next.owl.carousel', [400]);
    //owl.trigger('owl.next');
 }

});


/*--------------------------------------------------------------
# Logo Slider 
--------------------------------------------------------------*/

jQuery(document).ready(function () {
  jQuery('.logo-glider').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: false,
  autoplaySpeed: 700,
  speed: 1500,
  arrows: true,
  dots: false,
  pauseOnHover: true,
  prevArrow: '<svg class="slick-prev" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><mask id="mask0_101_209" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><rect x="24" y="24" width="24" height="24" transform="rotate(180 24 24)" fill="#D9D9D9"/></mask><g mask="url(#mask0_101_209)"><path d="M15.975 2L17.75 3.775L9.525 12L17.75 20.225L15.975 22L5.975 12L15.975 2Z" fill="#1C1B1F"/></g></svg>',
  nextArrow: '<svg class="slick-next"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><mask id="mask0_101_206" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24"><rect width="24" height="24" fill="#D9D9D9"/></mask><g mask="url(#mask0_101_206)"><path d="M8.025 22L6.25 20.225L14.475 12L6.25 3.775L8.025 2L18.025 12L8.025 22Z" fill="#1C1B1F"/></g></svg>',
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
# Preloader
--------------------------------------------------------------*/


/*jQuery(window).on('load', function () {
  
  var $preloader = jQuery('#page-preloader'),
      $spinner   = $preloader.find('.spinner');
  $spinner.fadeOut();
  $preloader.delay(350).fadeOut('slow');
 
});*/