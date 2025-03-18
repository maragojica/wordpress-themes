/**
 * Table of Contents:
 * 1. Sticky Menu(On Scrolling Up)
 * 2. Back To Top
 * 3. Parallax
 * 4. Logo Slider Section
 * 5. Service Slider Section
 * 6. Gallery Fancybox
 * 7. Custom Videos
 * 8. Modal Apply Job
 * 9. Modal Featured Project
 * 10. Custom Cursor
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
# Parallax
--------------------------------------------------------------*/
jQuery(document).ready(function ($) {
  var images = document.querySelectorAll('.parallax-image');
  new simpleParallax(images, {
    delay: .6,
    transition: 'cubic-bezier(0,0,0,1)'
  });
});

/*--------------------------------------------------------------
# Logo Slider Section
--------------------------------------------------------------*/

jQuery(document).ready(function () {
  jQuery('.logo-glider').slick({
  slidesToShow: 6,
  slidesToScroll: 1,
  autoplay: false,
  autoplaySpeed: 700,
  speed: 1500,
  arrows: true,
  dots: false,
  pauseOnHover: true,
  prevArrow: '<svg class="slick-prev" xmlns="http://www.w3.org/2000/svg" width="12" height="20" viewBox="0 0 12 20" fill="none"><path d="M10.0001 19.3078L0.692383 10.0001L10.0001 0.692383L11.0636 1.75586L2.81931 10.0001L11.0636 18.2443L10.0001 19.3078Z" fill="#1C1B1F"/></svg>',
  nextArrow: '<svg class="slick-next" xmlns="http://www.w3.org/2000/svg" width="12" height="20" viewBox="0 0 12 20" fill="none"><path d="M1.99992 0.692216L11.3076 9.99992L1.99992 19.3076L0.936442 18.2441L9.18069 9.99992L0.936443 1.75569L1.99992 0.692216Z" fill="#1C1B1F"/></svg>',
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
# Service Slider Section
--------------------------------------------------------------*/

var rev = jQuery('.services_slider');
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
  //prev2.prev().prev();
  //next2.next().next();
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
  prevArrow: '<button title="Prev Arrow" class="prev-arrow animate__animated" data-animation="fadeRight" data-duration="1.75s"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none"><circle cx="12.825" cy="12.825" r="12.825" fill="#005B29"/><mask id="mask0_108_372" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="2" y="2" width="21" height="21"><rect x="22.5356" y="22.5356" width="19.714" height="19.714" transform="rotate(-180 22.5356 22.5356)" fill="#D9D9D9"/></mask><g mask="url(#mask0_108_372)"><path d="M12.6782 6.10733L13.8487 7.25731L9.24876 11.8572L19.2495 11.8572L19.2495 13.5001L9.24876 13.5001L13.8487 18.1L12.6782 19.25L6.10684 12.6787L12.6782 6.10733Z" fill="white"/></g></svg></button>',
  nextArrow: '<button title="Next Arrow" class="next-arrow animate__animated" data-animation="fadeLeft" data-duration="1.75s"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none"><circle cx="12.8254" cy="12.8249" r="12.825" transform="rotate(-180 12.8254 12.8249)" fill="#005B29"/><mask id="mask0_108_377" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="3" y="3" width="20" height="20"><rect x="3.11475" y="3.11426" width="19.714" height="19.714" fill="#D9D9D9"/></mask><g mask="url(#mask0_108_377)"><path d="M12.9722 19.5426L11.8017 18.3926L16.4016 13.7927L6.40088 13.7927L6.40088 12.1498L16.4016 12.1498L11.8017 7.54989L12.9722 6.3999L19.5435 12.9712L12.9722 19.5426Z" fill="white"/></g></svg></button>',
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
  /*infinite: false,*/
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
# Custom Videos
--------------------------------------------------------------*/

jQuery(document).ready(function () {
  const players = Array.from(document.querySelectorAll('.player')).map(p => new Plyr(p));
});


/*--------------------------------------------------------------
# Modal Apply Job
--------------------------------------------------------------*/
jQuery(document).ready(function($) {
  var $modal = $("#jobModal-1");
  var $btn = $("#openModalBtnJob-1");
  var $span = $("#closeModalBtnJob-1");


  $btn.click(function() {
      $modal.show();
  });


  $span.click(function() {
      $modal.hide();
  });


  $(window).click(function(event) {
      if ($(event.target).is($modal)) {
          $modal.hide();
      }
  });
});

jQuery(document).ready(function($) {
  var $modal = $("#jobModal-1");
  var $btn = $("#openModalBtnJob-1"); 
  var $span = $("#closeModalBtnJob-1");


  $btn.click(function() {
      $modal.fadeIn(300);
  });

  $span.click(function() {
      $modal.fadeOut(300);
  });

  $(window).click(function(event) {
      if ($(event.target).is($modal)) {
          $modal.fadeOut(300);
      }
  });
});

/*--------------------------------------------------------------
# Modal Featured Project
--------------------------------------------------------------*/
jQuery(document).ready(function($) {
  var $modal = $("#featuredProjectModal");
  var $btn = $("#openFeaturedProjectModal");
  var $span = $("#closeModalBtnFeatured");


  $btn.click(function() {
      $modal.show();
  });


  $span.click(function() {
      $modal.hide();
  });


  $(window).click(function(event) {
      if ($(event.target).is($modal)) {
          $modal.hide();
      }
  });
});

jQuery(document).ready(function($) {
  var $modal = $("#featuredProjectModal");
  var $btn = $("#openFeaturedProjectModal"); 
  var $span = $("#closeModalBtnFeatured");


  $btn.click(function() {
      $modal.fadeIn(300);
  });

  $span.click(function() {
      $modal.fadeOut(300);
  });

  $(window).click(function(event) {
      if ($(event.target).is($modal)) {
          $modal.fadeOut(300);
      }
  });
});

/*--------------------------------------------------------------
# Custom Cursor
--------------------------------------------------------------*/
jQuery(window).mousemove(function (e) {
	jQuery(".ring").css(
		"transform",
		`translateX(calc(${e.clientX}px - 1.25rem)) translateY(calc(${e.clientY}px - 1.25rem))`
	);
});