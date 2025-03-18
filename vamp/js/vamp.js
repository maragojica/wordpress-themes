/**
 * Table of Contents:
 * 1. Sticky Menu(On Scrolling Up)
 * 2. Back To Top
 * 3. History Slider
 * 4. Custom Videos
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

jQuery(document).ready(function () {  
  var btn = jQuery('.scrollToTopBtn');

  jQuery(window).scroll(function() {
    if (jQuery(window).scrollTop() > 300) {
      btn.addClass('showBtn');
    } else {
      btn.removeClass('showBtn');
    }
  });
  
  btn.on('click', function(e) {
    e.preventDefault();
    jQuery('html, body').animate({scrollTop:0}, '100');
  });
});

/*--------------------------------------------------------------
# History Slider
--------------------------------------------------------------*/
jQuery(document).ready(function () {
  var owlmain = jQuery('.history-slider').owlCarousel({
    loop: true,
    center: false,
    responsiveClass: false,
    items: 1,
    nav: false, 
    dots: true,
    margin: 10,    
    pullDrag: false,
    rewind: false,
    autoplay: false,   
    smartSpeed: 1000,    
    autoHeight:true,
    touchDrag: true,
    mouseDrag: true,      
  }); 
var dots =  jQuery('.owl-dot');
   dots.each(function() {
	 dots.attr("title","Slider Dot");
 });
  });
/*--------------------------------------------------------------
# Custom Videos
--------------------------------------------------------------*/

jQuery(document).ready(function () {
  const players = Array.from(document.querySelectorAll('.player')).map(p => new Plyr(p));
});


/*--------------------------------------------------------------
# Logo Slider Section
--------------------------------------------------------------*/
jQuery(document).ready(function () {
  var navContainer = jQuery('<div class="logo-nav-container"></div>');
  jQuery(".logo-slider").after(navContainer);

  var owl = jQuery(".logo-slider").owlCarousel({
    loop: true,
    responsiveClass: true,
    nav: true,
    dots: false,
    margin: 0,
    items: 4,
    autoplay: false,
    touchDrag: true,
    mouseDrag: true,
    animateOut: "fadeOut",
    animateIn: "fadeIn",
    navText: [
      '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="20" viewBox="0 0 12 20" fill="none"><path d="M10 20L0 10L10 0L11.775 1.775L3.55 10L11.775 18.225L10 20Z" fill="#1C1B1F"/></svg>',
      '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="20" viewBox="0 0 12 20" fill="none"><path d="M1.7749 -8.74228e-07L11.7749 10L1.7749 20L-9.80733e-05 18.225L8.2249 10L-9.66352e-05 1.775L1.7749 -8.74228e-07Z" fill="#1C1B1F"/></svg>',
    ],
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 3,
      },
      1200: {
        items: 4,
      },
    },
  });
});
/*--------------------------------------------------------------
# Sticky TOC
--------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
    const tocContainer = document.querySelector('#ez-toc-container');
    const footer = document.querySelector('.recent-posts ');
    const offset = 50; 

    if (tocContainer) {
        const initialTop = tocContainer.offsetTop;
        const maxWidth = tocContainer.offsetWidth;

        window.addEventListener('scroll', function () {
            const footerTop = footer ? footer.offsetTop : document.body.scrollHeight;
            if (window.scrollY >= initialTop - offset) {
                tocContainer.style.position = 'fixed';
                tocContainer.style.top = `${offset}px`;
                tocContainer.style.width = `${maxWidth}px`; 
                tocContainer.style.maxWidth = `${maxWidth}px`; 

                const tocBottom = tocContainer.getBoundingClientRect().bottom;
                const footerTopInViewport = footerTop - window.scrollY;

                if (tocBottom > footerTopInViewport) {
                    tocContainer.style.position = 'absolute';
                    tocContainer.style.top = `${footerTop - tocContainer.offsetHeight}px`;
                }
            } else {
                tocContainer.style.position = 'static';
                tocContainer.style.width = 'auto';
                tocContainer.style.maxWidth = 'none';
            }
        });
    }
});
