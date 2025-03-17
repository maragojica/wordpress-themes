// Table of Contents:
// 1. Parallax Img
// 2. Parallax
// 3. Counters
// 4. Logo Slider
// 5. Partners Slider
// 6. Testimonials Slider
// 7. Timeline Slider
// 8. Blog Slider
// 9. Cards Slider
// 10. Criteria Slider
// 11. Mansory Slider
// 12. Focus Area Slider
// 13. Logos List Slider



(function($) { "use strict";

/*--------------------------------------------------------------
# Parallax Img
--------------------------------------------------------------*/
var $images = $('.parallax-img');
var window_h = $(window).height();

$(window).scroll(function() {
    var windowScrollTop = $(window).scrollTop();
  
    if (windowScrollTop == 0) {
       TweenLite.to($images, 1.2, {
          yPercent: 0,
          ease: Power1.easeOut,
          overwrite: 0
       });
    }
    else{   
       $images.each(function() {
          var elementOffsetTop = $(this).offset().top,
             element_h = $(this).height(),          
             velocity = $(this).data('velocity');

             if (windowScrollTop + window_h > elementOffsetTop && windowScrollTop  < elementOffsetTop + element_h) {
                //if in view:
                
               TweenLite.to($(this), 1.2, {
                 yPercent: (windowScrollTop + window_h - elementOffsetTop) / window_h * velocity,
                 ease: Power1.easeOut,
                 overwrite: 0
               });
             }
       });
    }
});
/*--------------------------------------------------------------
# Parallax
--------------------------------------------------------------*/
$(document).ready(function ($) {
    var images = document.querySelectorAll('.parallax-image');
    new simpleParallax(images, {
      delay: .6,
      transition: 'cubic-bezier(0,0,0,1)'
    });
  });
/*--------------------------------------------------------------
# Counters
--------------------------------------------------------------*/
$(document).ready(function ($) {
   function isInViewport(element) {
       const rect = element.getBoundingClientRect();
       return (
           rect.top >= 0 &&
           rect.left >= 0 &&
           rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
           rect.right <= (window.innerWidth || document.documentElement.clientWidth)
       );
   }

   function startCounterAnimation() {
       $('.counter-number:not(.animated)').each(function () {
           if (isInViewport(this)) {
               const countTo = $(this).attr('data-count');
               $(this).prop('Counter', 0).animate({
                   Counter: countTo
               }, {
                   duration: 6000,
                   easing: 'swing',
                   step: function (now) {
                       $(this).text(Math.ceil(now).toLocaleString());
                   }
               });
               $(this).addClass('animated');
           }
       });
   }

   $(window).on('scroll', startCounterAnimation);
   startCounterAnimation();
});

/* Counter Hidding Separatos Lines and Titles until Numbers Loaded*/ 
/*$(document).ready(function ($) {
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }
 
    function startCounterAnimation() {
        const counters = $('.counter-number:not(.animated)');
        let completedAnimations = 0;
 
        counters.each(function () {
            if (isInViewport(this)) {
                const countTo = $(this).attr('data-count');
                $(this).prop('Counter', 0).animate({
                    Counter: countTo
                }, {
                    duration: 10000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now).toLocaleString());
                    },
                    complete: function () {
                        completedAnimations++;
                        if (completedAnimations === counters.length) {
                            // Show separator lines after all counters finish
                            $('.separator-lines').addClass('show-lines');
                        }
                    }
                });
                $(this).addClass('animated');
            }
        });
    }
 
    $(window).on('scroll', startCounterAnimation);
    startCounterAnimation();
 });*/
 
   /*--------------------------------------------------------------
    # Logo Slider
    --------------------------------------------------------------*/
    $(function() {
      var owl = $('.slider-logos')
      owl.owlCarousel({
          loop: true,    
          responsiveClass: true,
          nav: false, 
          dots: false,       
          autoplay: true,    
          autoplayTimeout: 3000,
          smartSpeed: 3000,           
          lazyLoad:true,
          touchDrag: true,
          mouseDrag: true,    
          autoHeight:true,            
          navText: ['<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none"><path d="M26 13C26 10.4288 25.2376 7.91543 23.8091 5.77759C22.3806 3.63975 20.3503 1.97351 17.9749 0.989571C15.5994 0.00563226 12.9856 -0.251811 10.4638 0.249796C7.94208 0.751404 5.6257 1.98953 3.80762 3.80762C1.98953 5.6257 0.751405 7.94208 0.249797 10.4638C-0.251811 12.9856 0.00563172 15.5994 0.98957 17.9749C1.97351 20.3503 3.63975 22.3806 5.77759 23.8091C7.91543 25.2376 10.4288 26 13 26C16.4466 25.9962 19.751 24.6253 22.1882 22.1882C24.6253 19.751 25.9962 16.4466 26 13ZM2.88889 13C2.88889 11.0002 3.4819 9.04533 4.59292 7.38257C5.70395 5.71981 7.28309 4.42384 9.13065 3.65856C10.9782 2.89327 13.0112 2.69304 14.9726 3.08318C16.9339 3.47332 18.7356 4.4363 20.1496 5.85037C21.5637 7.26443 22.5267 9.06606 22.9168 11.0274C23.307 12.9888 23.1067 15.0218 22.3414 16.8694C21.5762 18.7169 20.2802 20.2961 18.6174 21.4071C16.9547 22.5181 14.9998 23.1111 13 23.1111C10.3192 23.1082 7.74912 22.042 5.85354 20.1465C3.95796 18.2509 2.89176 15.6808 2.88889 13ZM15.9479 18.8368C15.8137 18.9714 15.6542 19.0783 15.4786 19.1512C15.3031 19.2241 15.1148 19.2616 14.9247 19.2616C14.7346 19.2616 14.5464 19.2241 14.3708 19.1512C14.1952 19.0783 14.0358 18.9714 13.9016 18.8368L9.08676 14.0219C8.9521 13.8878 8.84526 13.7283 8.77235 13.5527C8.69945 13.3771 8.66192 13.1889 8.66192 12.9988C8.66192 12.8087 8.69945 12.6204 8.77235 12.4449C8.84526 12.2693 8.9521 12.1098 9.08676 11.9757L13.9016 7.16084C14.1729 6.88948 14.541 6.73704 14.9247 6.73704C15.3085 6.73704 15.6765 6.88948 15.9479 7.16084C16.2192 7.43219 16.3717 7.80023 16.3717 8.18398C16.3717 8.56774 16.2192 8.93578 15.9479 9.20713L12.1574 13L15.9515 16.7929C16.0855 16.9273 16.1918 17.0868 16.2642 17.2622C16.3366 17.4377 16.3736 17.6257 16.3733 17.8156C16.373 18.0054 16.3352 18.1933 16.2622 18.3685C16.1892 18.5437 16.0824 18.7028 15.9479 18.8368Z" fill="white"/></svg>', 
            '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none"><path d="M1.55023e-07 13C1.24363e-07 15.5712 0.762437 18.0846 2.19089 20.2224C3.61935 22.3602 5.64967 24.0265 8.02511 25.0104C10.4006 25.9944 13.0144 26.2518 15.5362 25.7502C18.0579 25.2486 20.3743 24.0105 22.1924 22.1924C24.0105 20.3743 25.2486 18.0579 25.7502 15.5362C26.2518 13.0144 25.9944 10.4006 25.0104 8.02511C24.0265 5.64968 22.3602 3.61935 20.2224 2.1909C18.0846 0.762436 15.5712 1.85684e-07 13 1.55023e-07C9.55336 0.00382435 6.24898 1.37469 3.81183 3.81183C1.37469 6.24898 0.00382343 9.55336 1.55023e-07 13ZM23.1111 13C23.1111 14.9998 22.5181 16.9547 21.4071 18.6174C20.2961 20.2802 18.7169 21.5762 16.8694 22.3414C15.0218 23.1067 12.9888 23.307 11.0274 22.9168C9.06605 22.5267 7.26443 21.5637 5.85036 20.1496C4.4363 18.7356 3.47331 16.9339 3.08317 14.9726C2.69303 13.0112 2.89326 10.9782 3.65855 9.13064C4.42384 7.28308 5.7198 5.70394 7.38257 4.59292C9.04533 3.4819 11.0002 2.88889 13 2.88889C15.6808 2.89176 18.2509 3.95795 20.1465 5.85353C22.042 7.74911 23.1082 10.3192 23.1111 13ZM10.0521 7.16324C10.1863 7.02858 10.3458 6.92173 10.5214 6.84883C10.6969 6.77593 10.8852 6.7384 11.0753 6.7384C11.2654 6.7384 11.4536 6.77593 11.6292 6.84883C11.8048 6.92173 11.9642 7.02858 12.0984 7.16324L16.9132 11.9781C17.0479 12.1122 17.1547 12.2717 17.2276 12.4473C17.3006 12.6229 17.3381 12.8111 17.3381 13.0012C17.3381 13.1913 17.3006 13.3796 17.2276 13.5551C17.1547 13.7307 17.0479 13.8902 16.9132 14.0243L12.0984 18.8392C11.8271 19.1105 11.459 19.263 11.0753 19.263C10.6915 19.263 10.3235 19.1105 10.0521 18.8392C9.78077 18.5678 9.62833 18.1998 9.62833 17.816C9.62833 17.4323 9.78077 17.0642 10.0521 16.7929L13.8426 13L10.0485 9.20713C9.91445 9.07274 9.80819 8.91325 9.73581 8.73777C9.66343 8.56228 9.62635 8.37426 9.62669 8.18444C9.62702 7.99461 9.66477 7.80672 9.73777 7.63149C9.81077 7.45627 9.91759 7.29715 10.0521 7.16324Z" fill="white"/></svg>'],
          responsive:{
            0:{
                items:2,  
                margin: 0       
            },
            575:{
                items:3,
                margin: 10
              
            },
            768:{
                items:3,
                margin: 10
               
            }
        }
        
        });  
        $(".owl-next").attr("title","Next Slider");
        $(".owl-prev").attr("title","Previous Slider");
  });

   /*--------------------------------------------------------------
   # Partners Slider
   --------------------------------------------------------------*/
  $(document).ready(function($) {
   var $carousel = $(".slider-partners");

   $carousel.owlCarousel({
       loop: true,
       margin: 10,
       dots: false, 
       nav: true,
       items: 2.5,      
       center: false,
       navText: [
           '<svg xmlns="http://www.w3.org/2000/svg" class="general-arrows" width="50" height="49" viewBox="0 0 50 49" fill="none"><ellipse cx="25.1579" cy="24.4795" rx="22.8421" ry="22.4795" stroke="#FFF4E9" stroke-width="3"/><path d="M28.421 15.0527L18.9941 24.4796L28.421 33.9065" stroke="#FFF4E9" stroke-width="3"/></svg>',
           '<svg xmlns="http://www.w3.org/2000/svg" class="general-arrows" width="50" height="49" viewBox="0 0 50 49" fill="none"><ellipse cx="24.8421" cy="24.4795" rx="22.8421" ry="22.4795" transform="rotate(-180 24.8421 24.4795)" stroke="#FFF4E9" stroke-width="3"/><path d="M21.579 33.9065L31.0059 24.4796L21.579 15.0527" stroke="#FFF4E9" stroke-width="3"/></svg>'
       ],
       responsive: {
           0: {
               items: 1.2,
               margin: 23,
           },
           991: {
            items: 1.2,
            margin: 23,
        },
           1024: {
               items: 1.1,
           },
       },
       onTranslated: function () {
           setActiveSlide();
       },
   });

   function setActiveSlide() {
       $(".item").removeClass("active");
       $(".owl-item.active").eq(0).find(".item").addClass("active");
   }

   setActiveSlide();
   $(".owl-next").attr("title","Next Slider");
   $(".owl-prev").attr("title","Previous Slider");
});


   /*--------------------------------------------------------------
   # Testimonials Slider
   --------------------------------------------------------------*/
   $(document).ready(function($) {
    var $carousel = $(".slider-testimonials");
 
    $carousel.owlCarousel({
        loop: true,
        margin: 10,
        dots: false, 
        nav: true,
        items: 2.5,      
        center: false,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" class="general-arrows" width="50" height="49" viewBox="0 0 50 49" fill="none"><ellipse cx="25.1575" cy="24.4795" rx="22.8421" ry="22.4795" stroke="#1F577C" stroke-width="3"/><path d="M28.421 15.0526L18.9941 24.4795L28.421 33.9064" stroke="#1F577C" stroke-width="3"/></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" class="general-arrows" width="50" height="49" viewBox="0 0 50 49" fill="none"><ellipse cx="24.8425" cy="24.4795" rx="22.8421" ry="22.4795" transform="rotate(-180 24.8425 24.4795)" stroke="#1F577C" stroke-width="3"/><path d="M21.579 33.9064L31.0059 24.4795L21.579 15.0526" stroke="#1F577C" stroke-width="3"/></svg>'
        ],
        responsive: {
            0: {
                items: 1.2,
                margin: 23,
            },
            991: {
             items: 1.2,
             margin: 23,
         },
            1024: {
                items: 1.2,
            },
        },
        onTranslated: function () {
            setActiveSlide();
        },
    });
 
    function setActiveSlide() {
        $(".item").removeClass("active");
        $(".owl-item.active").eq(0).find(".item").addClass("active");
    }
 
    setActiveSlide();
    $(".owl-next").attr("title","Next Slider");
    $(".owl-prev").attr("title","Previous Slider");
 });

   /*--------------------------------------------------------------
   # Timeline Slider
   --------------------------------------------------------------*/
   $(document).ready(function($) {
    var $carousel = $(".slider-timeline");
 
    $carousel.owlCarousel({
        loop: true,
        margin: 10,
        dots: false, 
        nav: true,
        items: 2.5,      
        center: false,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" class="general-arrows" width="50" height="49" viewBox="0 0 50 49" fill="none"><ellipse cx="25.1575" cy="24.4795" rx="22.8421" ry="22.4795" stroke="#1F577C" stroke-width="3"/><path d="M28.421 15.0526L18.9941 24.4795L28.421 33.9064" stroke="#1F577C" stroke-width="3"/></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" class="general-arrows" width="50" height="49" viewBox="0 0 50 49" fill="none"><ellipse cx="24.8425" cy="24.4795" rx="22.8421" ry="22.4795" transform="rotate(-180 24.8425 24.4795)" stroke="#1F577C" stroke-width="3"/><path d="M21.579 33.9064L31.0059 24.4795L21.579 15.0526" stroke="#1F577C" stroke-width="3"/></svg>'
        ],
        responsive: {
            0: {
                items: 1.2,
                margin: 23,
            },
            991: {
             items: 1.2,
             margin: 23,
         },
            1024: {
                items: 1.2,
            },
        },
        onTranslated: function () {
            setActiveSlide();
        },
    });
 
    function setActiveSlide() {
        $(".item").removeClass("active");
        $(".owl-item.active").eq(0).find(".item").addClass("active");
    }
 
    setActiveSlide();
    $(".owl-next").attr("title","Next Slider");
    $(".owl-prev").attr("title","Previous Slider");
 });

 
  /*--------------------------------------------------------------
   # Blog Slider
   --------------------------------------------------------------*/
   $(document).ready(function($) {
    var $carousel = $(".slider-blogs");
 
    $carousel.owlCarousel({
        loop: true,
        margin: 10,
        dots: true, 
        nav: false,
        items: 1,      
        center: false,
        navText: [
            '<svg class="general-arrows" xmlns="http://www.w3.org/2000/svg" width="34" height="33" viewBox="0 0 34 33" fill="none"><ellipse cx="17.1726" cy="16.0454" rx="15.288" ry="15.0454" stroke="#1F577C" stroke-width="2.00787"/><path d="M19.3568 9.73602L13.0475 16.0454L19.3568 22.3547" stroke="#1F577C" stroke-width="2.00787"/></svg>',
            '<svg class="general-arrows" xmlns="http://www.w3.org/2000/svg" width="34" height="33" viewBox="0 0 34 33" fill="none"><ellipse cx="16.8274" cy="16.0453" rx="15.288" ry="15.0454" transform="rotate(-180 16.8274 16.0453)" stroke="#1F577C" stroke-width="2.00787"/><path d="M14.6432 22.3547L20.9525 16.0454L14.6432 9.73605" stroke="#1F577C" stroke-width="2.00787"/></svg>'
        ],
        responsive: {
            0: {
                items: 1,
                margin: 23,
            },
            991: {
             items: 1,
             margin: 23,
         },
            1024: {
                items: 1,
            },
        },
        onTranslated: function () {
            setActiveSlide();
        },
    });
 
    function setActiveSlide() {
        $(".item").removeClass("active");
        $(".owl-item.active").eq(0).find(".item").addClass("active");
    }
 
    setActiveSlide();
    $(".owl-next").attr("title","Next Slider");
    $(".owl-prev").attr("title","Previous Slider");
 });
 
 
  /*--------------------------------------------------------------
   # Cards Slider
   --------------------------------------------------------------*/
   $(document).ready(function($) {
    var $carousel = $(".slider-cards");
 
    $carousel.owlCarousel({
        loop: true,
        margin: 10,
        dots: true, 
        nav: false,
        items: 1,      
        center: false,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" class="general-arrows" width="50" height="49" viewBox="0 0 50 49" fill="none"><ellipse cx="25.1575" cy="24.4795" rx="22.8421" ry="22.4795" stroke="#1F577C" stroke-width="3"/><path d="M28.421 15.0526L18.9941 24.4795L28.421 33.9064" stroke="#1F577C" stroke-width="3"/></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" class="general-arrows" width="50" height="49" viewBox="0 0 50 49" fill="none"><ellipse cx="24.8425" cy="24.4795" rx="22.8421" ry="22.4795" transform="rotate(-180 24.8425 24.4795)" stroke="#1F577C" stroke-width="3"/><path d="M21.579 33.9064L31.0059 24.4795L21.579 15.0526" stroke="#1F577C" stroke-width="3"/></svg>'
        ],
        responsive: {
            0: {
                items: 1,
                margin: 23,
            },
            991: {
             items: 1,
             margin: 23,
         },
            1024: {
                items: 1,
            },
        },
        onTranslated: function () {
            setActiveSlide();
        },
    });
 
    function setActiveSlide() {
        $(".item").removeClass("active");
        $(".owl-item.active").eq(0).find(".item").addClass("active");
    }
 
    setActiveSlide();
    $(".owl-next").attr("title","Next Slider");
    $(".owl-prev").attr("title","Previous Slider");
 });
  
   /*--------------------------------------------------------------
   # Criteria Slider
   --------------------------------------------------------------*/
   $(document).ready(function($) {
    var $carousel = $(".slider-criteria");
 
    $carousel.owlCarousel({
        loop: true,
        margin: 30,
        dots: false, 
        nav: true,
        items: 2.9,      
        center: false,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" class="general-arrows" width="50" height="49" viewBox="0 0 50 49" fill="none"><ellipse cx="25.1575" cy="24.4795" rx="22.8421" ry="22.4795" stroke="#1F577C" stroke-width="3"/><path d="M28.421 15.0526L18.9941 24.4795L28.421 33.9064" stroke="#1F577C" stroke-width="3"/></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" class="general-arrows" width="50" height="49" viewBox="0 0 50 49" fill="none"><ellipse cx="24.8425" cy="24.4795" rx="22.8421" ry="22.4795" transform="rotate(-180 24.8425 24.4795)" stroke="#1F577C" stroke-width="3"/><path d="M21.579 33.9064L31.0059 24.4795L21.579 15.0526" stroke="#1F577C" stroke-width="3"/></svg>'
        ],
        responsive: {
            0: {
                items: 1.2,
                margin: 23,
            },
            1024: {
             items: 2.5,
             margin: 20,
         },
            1300: {
                items: 2.7,
            },
        },
        onTranslated: function () {
            setActiveSlide();
        },
    });
 
    function setActiveSlide() {
        $(".item").removeClass("active");
        $(".owl-item.active").eq(0).find(".item").addClass("active");
    }
 
    setActiveSlide();
    $(".owl-next").attr("title","Next Slider");
    $(".owl-prev").attr("title","Previous Slider");
 });

   
   /*--------------------------------------------------------------
   # Mansory Slider
   --------------------------------------------------------------*/
   $(document).ready(function($) {
    var $carousel = $(".slider-mansory");
 
    $carousel.owlCarousel({
        loop: true,
        margin: 12,
        dots: false, 
        nav: false,            
        center: true,        
        responsive: {
            0: {
                items: 1.3,                
            },
            1024: {
             items: 1.3,
            
         }
        },
        onTranslated: function () {
            setActiveSlide();
        },
    });
 
    function setActiveSlide() {
        $(".item").removeClass("active");
        $(".owl-item.active").eq(0).find(".item").addClass("active");
    }
 
    setActiveSlide();
    $(".owl-next").attr("title","Next Slider");
    $(".owl-prev").attr("title","Previous Slider");
 });

   /*--------------------------------------------------------------
   # Focus Area Slider
   --------------------------------------------------------------*/

   $(document).ready(function($) {
    var $carousel = $(".slider-focus-areas");
 
    $carousel.owlCarousel({
        loop: true,
        margin: 12,
        dots: false, 
        nav: false,   
        autoplay: true,    
        autoplayTimeout: 5000,
        smartSpeed: 3000, 
        autoplayHoverPause:true,         
        center: false,   
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" class="general-arrows" width="50" height="49" viewBox="0 0 50 49" fill="none"><ellipse cx="25.1575" cy="24.4795" rx="22.8421" ry="22.4795" stroke="#1F577C" stroke-width="3"/><path d="M28.421 15.0526L18.9941 24.4795L28.421 33.9064" stroke="#1F577C" stroke-width="3"/></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" class="general-arrows" width="50" height="49" viewBox="0 0 50 49" fill="none"><ellipse cx="24.8425" cy="24.4795" rx="22.8421" ry="22.4795" transform="rotate(-180 24.8425 24.4795)" stroke="#1F577C" stroke-width="3"/><path d="M21.579 33.9064L31.0059 24.4795L21.579 15.0526" stroke="#1F577C" stroke-width="3"/></svg>'
        ],     
        responsive: {
            0: {
                items: 1,                
            },
            1024: {
             items: 1,
            
         }
        },
        onTranslated: function () {
            setActiveSlide();
        },
    });
 
    function setActiveSlide() {
        $(".item").removeClass("active");
        $(".owl-item.active").eq(0).find(".item").addClass("active");
    }
 
    setActiveSlide();
    $(".owl-next").attr("title","Next Slider");
    $(".owl-prev").attr("title","Previous Slider");
 });


   /*--------------------------------------------------------------
   # Logos List Slider
   --------------------------------------------------------------*/
   $(document).ready(function($) {
    var $carousel = $(".slider-logos-list");
 
    $carousel.owlCarousel({
        loop: true,
        margin: 10,
        dots: false, 
        nav: false,
        items: 2.5,      
        center: false,
        autoplay: true,    
        autoplayTimeout: 5000,
        smartSpeed: 3000, 
        autoplayHoverPause:true,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" class="general-arrows" width="50" height="49" viewBox="0 0 50 49" fill="none"><ellipse cx="25.1575" cy="24.4795" rx="22.8421" ry="22.4795" stroke="#1F577C" stroke-width="3"/><path d="M28.421 15.0526L18.9941 24.4795L28.421 33.9064" stroke="#1F577C" stroke-width="3"/></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" class="general-arrows" width="50" height="49" viewBox="0 0 50 49" fill="none"><ellipse cx="24.8425" cy="24.4795" rx="22.8421" ry="22.4795" transform="rotate(-180 24.8425 24.4795)" stroke="#1F577C" stroke-width="3"/><path d="M21.579 33.9064L31.0059 24.4795L21.579 15.0526" stroke="#1F577C" stroke-width="3"/></svg>'
        ],
        responsive: {
            0: {
                items: 1.2,
                margin: 23,
            },
            991: {
             items: 1.2,
             margin: 23,
         },
            1024: {
                items: 1.5,
            },
        },
        onTranslated: function () {
            setActiveSlide();
        },
    });
 
    function setActiveSlide() {
        $(".item").removeClass("active");
        $(".owl-item.active").eq(0).find(".item").addClass("active");
    }
 
    setActiveSlide();
    $(".owl-next").attr("title","Next Slider");
    $(".owl-prev").attr("title","Previous Slider");
 });

    // eslint-disable-next-line no-undef
    })(jQuery); 

    
 