/**
 * Table of Contents:
 * 1- Sticky Menu(On Scrolling Up)  * 
 * 2- Back To Top
 * 3- Vertical Slider Process
 * 4- WOW Animations
 * 5- Sticky Sidebar
 * 6- Team Sticky Sidebar
 * 7- Custom Select
 * 8- Custom Dropbwon
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


jQuery(".section-info-blog .single-sidebar a").on("click", function() {
  
     jQuery('.site-header').addClass("header-scrolled");
  jQuery('.site-header').removeClass("header-scrolled-top");                               
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
# Vertical Slider Process
--------------------------------------------------------------*/
jQuery(document).ready(function () {
  var owlmain = jQuery('.slides-steps').owlCarousel({
    loop: true,
    center: false,
    responsiveClass: true,
    items: 1,
    nav: true, 
    dots: false,
    margin: 0,    
    pullDrag: false,
    rewind: false, 
    autoplay: false,      
    smartSpeed: 1000, 
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    autoHeight:true,
    dotsData: true,
	  rtl:false,
    navText: ['<svg width="91" height="15" viewBox="0 0 91 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.792893 6.79289C0.402369 7.18342 0.402369 7.81658 0.792893 8.20711L7.15685 14.5711C7.54738 14.9616 8.18054 14.9616 8.57107 14.5711C8.96159 14.1805 8.96159 13.5474 8.57107 13.1569L2.91421 7.5L8.57107 1.84315C8.96159 1.45262 8.96159 0.819456 8.57107 0.428932C8.18054 0.0384079 7.54738 0.0384079 7.15685 0.428932L0.792893 6.79289ZM1.5 8.5H90.5V6.5H1.5V8.5Z" fill="white"/></svg>', 
    '<svg width="90" height="16" viewBox="0 0 90 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M89.7071 8.70711C90.0976 8.31658 90.0976 7.68342 89.7071 7.29289L83.3431 0.928932C82.9526 0.538407 82.3195 0.538407 81.9289 0.928932C81.5384 1.31946 81.5384 1.95262 81.9289 2.34315L87.5858 8L81.9289 13.6569C81.5384 14.0474 81.5384 14.6805 81.9289 15.0711C82.3195 15.4616 82.9526 15.4616 83.3431 15.0711L89.7071 8.70711ZM89 7L8.74228e-08 6.99999L-8.74228e-08 8.99999L89 9L89 7Z" fill="white"/></svg>'],
    responsive: {
      0: {
          items: 1,
          touchDrag: true,
          mouseDrag: true,
          animateOut: 'fadeOut',
          animateIn: 'fadeIn', 
          autoplay: false,    
		   rewind: false,
      },
      992: {
          items: 1,
          touchDrag: true,
          mouseDrag: true,
          animateOut: 'fadeOut',
          animateIn: 'fadeIn',   
          autoplay: false,   
		   rewind: false,
      },
      1200: {
          items: 1,
          touchDrag: true,
          mouseDrag: true,
          animateOut: 'fadeOut',
          animateIn: 'fadeIn',   
          dots: false,
          autoplay: false,
		   rewind: false,
      }
  }
  }); 

  jQuery('<div class="box-link-steps">Next Step</div>').insertBefore(".slides-steps .owl-next svg");

  }); 


/*--------------------------------------------------------------
# WOW
--------------------------------------------------------------*/
/*new WOW().init();*/

/*--------------------------------------------------------------
# Sticky Sidebar Blog
--------------------------------------------------------------*/

jQuery(document).ready(function ($) {
	var element = $(".single-sidebar");
	var footer = $(".section-post-navigation");

	console.log(element);
	// check if both elements exist
	if (element.length && footer.length) {
		var originalY = element.offset().top;

		// Space between element and top of screen (when scrolling)
		var topMargin = 40;

		// Footer offset
		var footerOffset = 50;

		// Should probably be set in CSS; but here just for emphasis
		element.css("position", "relative");

		$(window).on("scroll", function (event) {
			var scrollTop = $(window).scrollTop();

			// Distance from the top of the footer to the bottom of the sidebar
			var stopPoint =
				footer.offset().top - element.height() - topMargin - footerOffset;

			// Calculate the top value
			var topValue =
				scrollTop < originalY ? 0 : scrollTop - originalY + topMargin;

			// Check if we've hit the footer
			if (scrollTop < stopPoint) {
				element.css("top", topValue + "px");
			} else {
				element.css("top", stopPoint - originalY + topMargin + "px");
			}
		});
	} else {
	}
});


/*--------------------------------------------------------------
# Sticky Sidebar Team
--------------------------------------------------------------*/

jQuery(document).ready(function ($) {
	var element = $(".team-sidebar");
	var footer = $(".section-contact-info");

	console.log(element);
	// check if both elements exist
	if (element.length && footer.length) {
		var originalY = element.offset().top;

		// Space between element and top of screen (when scrolling)
		var topMargin = 70;

		// Footer offset
		var footerOffset = 50;

		// Should probably be set in CSS; but here just for emphasis
		element.css("position", "relative");

		$(window).on("scroll", function (event) {
			var scrollTop = $(window).scrollTop();

			// Distance from the top of the footer to the bottom of the sidebar
			var stopPoint =
				footer.offset().top - element.height() - topMargin - footerOffset;

			// Calculate the top value
			var topValue =
				scrollTop < originalY ? 0 : scrollTop - originalY + topMargin;

			// Check if we've hit the footer
			if (scrollTop < stopPoint) {
				element.css("top", topValue + "px");
			} else {
				element.css("top", stopPoint - originalY + topMargin + "px");
			}
		});
	} else {
	}
});


/*--------------------------------------------------------------
# Blog Audio Load More
--------------------------------------------------------------*/
jQuery('.row-audio').simpleLoadMore({
  item: '.col-audio',
  count: 3,
  itemsToLoad: 3,
  btnHTML: '<div class="col-xs-12 center-xs m-lg-t3"><a href="#" tab-index="0" aria-label="Load More" title="Load More" class="load-more__btn cta-button cl-orange cl-green-h">Load More<svg class="arrow-passive" xmlns="http://www.w3.org/2000/svg" width="45" height="6" viewBox="0 0 45 6" fill="none"><path d="M44.1651 3L42 0.834936L39.8349 3L42 5.16506L44.1651 3ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#BB6C29"/></svg><svg class="arrow-active" xmlns="http://www.w3.org/2000/svg" width="43" height="6" viewBox="0 0 43 6" fill="none"><path d="M42.2652 3.26517C42.4116 3.11872 42.4116 2.88128 42.2652 2.73483L39.8787 0.34835C39.7322 0.201903 39.4948 0.201903 39.3483 0.34835C39.2019 0.494796 39.2019 0.732233 39.3483 0.87868L41.4697 3L39.3483 5.12132C39.2019 5.26777 39.2019 5.5052 39.3483 5.65165C39.4948 5.7981 39.7322 5.7981 39.8787 5.65165L42.2652 3.26517ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#024325"/></svg></a></div>'
});


/*--------------------------------------------------------------
# Custom Select
--------------------------------------------------------------*/
jQuery(".custom-select").each(function() {
  var classes = jQuery(this).attr("class"),
      id      = jQuery(this).attr("id"),
      name    = jQuery(this).attr("name");
  var template =  '<div class="' + classes + '">';
      template += '<span class="custom-select-trigger">' + jQuery(this).attr("placeholder") + '</span>';
      template += '<div class="custom-options">';
      jQuery(this).find("option").each(function() {
        template += '<span class="custom-option ' + jQuery(this).attr("class") + '" data-value="' + jQuery(this).attr("value") + '">' + jQuery(this).html() + '</span>';
      });
  template += '</div></div>';
  
  jQuery(this).wrap('<div class="custom-select-wrapper"></div>');
  jQuery(this).hide();
  jQuery(this).after(template);
});
jQuery(".custom-option:first-of-type").hover(function() {
  jQuery(this).parents(".custom-options").addClass("option-hover");
}, function() {
  jQuery(this).parents(".custom-options").removeClass("option-hover");
});
jQuery(".custom-select-trigger").on("click", function() {
  jQuery('html').one('click',function() {
    jQuery(".custom-select").removeClass("opened");
  });
  jQuery(this).parents(".custom-select").toggleClass("opened");
  event.stopPropagation();
});
jQuery(".custom-option").on("click", function() {
  jQuery(this).parents(".custom-select-wrapper").find("select").val(jQuery(this).data("value"));
  jQuery(this).parents(".custom-options").find(".custom-option").removeClass("selection");
  jQuery(this).addClass("selection");
  jQuery(this).parents(".custom-select").removeClass("opened");
  jQuery(this).parents(".custom-select").find(".custom-select-trigger").text(jQuery(this).text());
 
});

/*--------------------------------------------------------------
# Custom Dropbwon
--------------------------------------------------------------*/
 
  jQuery('.tab-content').hide();
  jQuery('#tab-1').show();
  
  jQuery(".custom-option").on("click", function() {
  
     var dropdown = jQuery(this).data("value");  
    jQuery('.tab-content').hide();    
    jQuery('#' + "tab-" + dropdown).show();                                    
  });
