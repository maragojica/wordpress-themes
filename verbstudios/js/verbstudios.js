/**
 * Table of Contents:
 * 1. Sticky Menu(On Scrolling Up)
 * 2. Back To Top
 * 3. WOW 
 * 4. Custom Videos
 * 5. Gallery Fancybox
 * 6. Testimonials Slider
 * 7. Gallery Load More
 * 8. Archive Load More
 * 9. Projects Slider
 * 10. Materials Slider
 * 11. Custom Dropdowns
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
# Testimonials Slider
--------------------------------------------------------------*/

var rev = jQuery('.testimonials_slider');
rev.on('init', function(event, slick, currentSlide) {
  var
    cur = jQuery(slick.$slides[slick.currentSlide]),
    next = cur.next(),
    next2 = cur.next().next(),
    prev = cur.prev(),
    prev2 = cur.prev().prev();
  prev.addClass('slick-sprev');
  next.addClass('slick-snext');  
  prev2.addClass('slick-sprev2');
  next2.addClass('slick-snext2');  
  cur.removeClass('slick-snext').removeClass('slick-sprev').removeClass('slick-snext2').removeClass('slick-sprev2');
  slick.$prev = prev;
  slick.$next = next;
}).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
  console.log('beforeChange');
  var
    cur = jQuery(slick.$slides[nextSlide]);
  console.log(slick.$prev, slick.$next);
  slick.$prev.removeClass('slick-sprev');
  slick.$next.removeClass('slick-snext');
  slick.$prev.prev().removeClass('slick-sprev2');
  slick.$next.next().removeClass('slick-snext2');
  next = cur.next(),  
  prev = cur.prev();
  prev.addClass('slick-sprev');
  next.addClass('slick-snext');
  prev.prev().addClass('slick-sprev2');
  next.next().addClass('slick-snext2');
  slick.$prev = prev;
  slick.$next = next;
  cur.removeClass('slick-next').removeClass('slick-sprev').removeClass('slick-next2').removeClass('slick-sprev2');
});

rev.slick({
  speed: 1000,
  arrows: true,
  dots: false,
  focusOnSelect: true,
  prevArrow: '<button title="Prev Arrow" class="prev-arrow wow fadeInRight" data-wow-duration="0.3s" data-wow-delay="0.2s"><svg xmlns="http://www.w3.org/2000/svg" width="110" height="12" viewBox="0 0 110 12" fill="none"><path d="M109.03 6.53033C109.323 6.23744 109.323 5.76256 109.03 5.46967L104.257 0.696699C103.964 0.403806 103.49 0.403806 103.197 0.696699C102.904 0.989593 102.904 1.46447 103.197 1.75736L107.439 6L103.197 10.2426C102.904 10.5355 102.904 11.0104 103.197 11.3033C103.49 11.5962 103.964 11.5962 104.257 11.3033L109.03 6.53033ZM0.5 6.75H108.5V5.25H0.5V6.75Z" fill="black"/></svg></button>',
  nextArrow: '<button title="Next Arrow" class="next-arrow wow fadeInRight" data-wow-duration="0.3s" data-wow-delay="0.2s"><svg xmlns="http://www.w3.org/2000/svg" width="110" height="12" viewBox="0 0 110 12" fill="none"><path d="M109.03 6.53033C109.323 6.23744 109.323 5.76256 109.03 5.46967L104.257 0.696699C103.964 0.403806 103.49 0.403806 103.197 0.696699C102.904 0.989593 102.904 1.46447 103.197 1.75736L107.439 6L103.197 10.2426C102.904 10.5355 102.904 11.0104 103.197 11.3033C103.49 11.5962 103.964 11.5962 104.257 11.3033L109.03 6.53033ZM0.5 6.75H108.5V5.25H0.5V6.75Z" fill="black"/></svg></button>',
  infinite: true,
  centerMode: true,
  slidesPerRow: 1,
  slidesToShow: 1,
  slidesToScroll: 1,
  centerPadding: '0',
  swipe: true,
  customPaging: function(slider, i) {
    return '';
  }, 
});

/*--------------------------------------------------------------
# Gallery Load More
--------------------------------------------------------------*/
jQuery('.mansory-load-content').simpleLoadMore({
  item: '.mansory-load-item',
  count: 5,
  itemsToLoad: 5,
  btnHTML: '<div class="row load-more-box"><div class="col-xs-12 col-lg-12 text-center mt-lg-2"><a href="#" tab-index="0" aria-label="Load More" title="Load More" class="load-more__btn button black"><span class="text">Load More</span></a></div></div>'
});

jQuery('.mansory-load-content-project').simpleLoadMore({
  item: '.mansory-load-item',
  count: 7,
  itemsToLoad: 7,
  btnHTML: '<div class="row load-more-box"><div class="col-xs-12 col-lg-12 text-center mt-lg-2"><a href="#" tab-index="0" aria-label="Load More" title="Load More" class="load-more__btn button black"><span class="text">Load More</span></a></div></div>'
});
/*--------------------------------------------------------------
# Archive Load More
--------------------------------------------------------------*/
jQuery('.row-archive').simpleLoadMore({
  item: '.col-archive',
  count: 8,
  itemsToLoad: 4,
  btnHTML: '<div class="row center-xs w-100"><div class="col-xs-12 col-lg-12 text-center mt-lg-2"><a href="#" tab-index="0" aria-label="Load More" title="Load More" class="load-more__btn button black"><span class="text">Load More</span></a></div></div>'
});


/*--------------------------------------------------------------
# Projects Slider
--------------------------------------------------------------*/
jQuery(document).ready(function () {
  var owl = jQuery('.project-slider').owlCarousel({
    loop: true,    
    responsiveClass: true,
    nav: true, 
    dots: false,
    margin: 0, 
    items: 1,
	autoplay: false,
    autoplayTimeout: 4000,
    smartSpeed: 1000,  
    touchDrag: true,
    mouseDrag: true,
     
    navText: ['<svg xmlns="http://www.w3.org/2000/svg" width="82" height="93" viewBox="0 0 82 93" fill="none"><rect width="82" height="93" fill="#F1984F"/><path d="M50.0807 69L28 47L50.0807 25L54 28.905L35.8386 47L54 65.095L50.0807 69Z" fill="white"/></svg>', 
    '<svg xmlns="http://www.w3.org/2000/svg" width="82" height="93" viewBox="0 0 82 93" fill="none"><rect x="82" y="93" width="82" height="93" transform="rotate(-180 82 93)" fill="#F1984F"/><path d="M31.9193 24L54 46L31.9193 68L28 64.095L46.1614 46L28 27.905L31.9193 24Z" fill="white"/></svg>']
  
  });  
  jQuery(".owl-next").attr("title","Next Slider");
  jQuery(".owl-prev").attr("title","Previous Slider");
  });

/*--------------------------------------------------------------
# Materials Slider
--------------------------------------------------------------*/
jQuery(document).ready(function () {
  var owl = jQuery('.slider-material').owlCarousel({
    loop: true,    
    responsiveClass: true,
    nav: true, 
    dots: false,
    margin: 0, 
    items: 1,
	  autoplay: false,
    autoplayTimeout: 5000,
    smartSpeed: 3000,  
    touchDrag: true,
    mouseDrag: true,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',  
    navText: ['<svg xmlns="http://www.w3.org/2000/svg" width="82" height="93" viewBox="0 0 82 93" fill="none"><rect width="82" height="93" fill="#F1984F"/><path d="M50.0807 69L28 47L50.0807 25L54 28.905L35.8386 47L54 65.095L50.0807 69Z" fill="white"/></svg>', 
    '<svg xmlns="http://www.w3.org/2000/svg" width="82" height="93" viewBox="0 0 82 93" fill="none"><rect x="82" y="93" width="82" height="93" transform="rotate(-180 82 93)" fill="#F1984F"/><path d="M31.9193 24L54 46L31.9193 68L28 64.095L46.1614 46L28 27.905L31.9193 24Z" fill="white"/></svg>']
  
  });  
  jQuery(".owl-next").attr("title","Next Slider");
  jQuery(".owl-prev").attr("title","Previous Slider");
  });

/*--------------------------------------------------------------
# Custom Dropdowns
--------------------------------------------------------------*/
/* Price Dropdown */
jQuery(document).ready(function () {
  jQuery('.dropdown__button__price').on('click', function(){
    jQuery('.select-category-price').toggleClass('active');
    jQuery('.dropdown__button__price .chevron-down').toggleClass('open');
  });
  jQuery('.select-category-price .material-link').on('click', function(){
    var itemValue = jQuery(this).data('value');   
    jQuery('.dropdown__button__price span').text(jQuery(this).text()).parent().attr('data-value', itemValue);
    jQuery('.select-category-price').toggleClass('active');   
    jQuery('.dropdown__button__price .chevron-down').toggleClass('open'); 
  });
});

/* Wood Species Dropdown */
jQuery(document).ready(function () {
  jQuery('.dropdown__button__species').on('click', function(){
    jQuery('.select-category-species').toggleClass('active');
    jQuery('.dropdown__button__species .chevron-down').toggleClass('open');
  });
  jQuery('.select-category-species .material-link').on('click', function(){
    var itemValue = jQuery(this).data('value');   
    jQuery('.dropdown__button__species span').text(jQuery(this).text()).parent().attr('data-value', itemValue);
    jQuery('.select-category-species').toggleClass('active');   
    jQuery('.dropdown__button__species .chevron-down').toggleClass('open'); 
  });
});

/* Wood Length Dropdown */
jQuery(document).ready(function () {
  jQuery('.dropdown__button__length').on('click', function(){
    jQuery('.select-category-length').toggleClass('active');
    jQuery('.dropdown__button__length .chevron-down').toggleClass('open');
  });
  jQuery('.select-category-length .material-link').on('click', function(){
    var itemValue = jQuery(this).data('value');   
    jQuery('.dropdown__button__length span').text(jQuery(this).text()).parent().attr('data-value', itemValue);
    jQuery('.select-category-length').toggleClass('active');   
    jQuery('.dropdown__button__length .chevron-down').toggleClass('open'); 
  });
});

