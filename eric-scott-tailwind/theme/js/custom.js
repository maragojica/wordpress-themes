// Table of Contents:
// 1. Logo Slider
// 2. Testimonials Slider
// 3. Load More Mansory
// 4. Mansory Slider
// 5. Gallery Slider
// 6. Capabilities Slider
// 7. Fetured Portfolio Slider
// 8. Custom Dropdowns
// 9. Sticky Sidebar Blog

(function($) { "use strict";



   /*--------------------------------------------------------------
    # Logo Slider
    --------------------------------------------------------------*/
    $(function() {
      var owl = $('.slider-logos-list')
      owl.owlCarousel({
        
        autoplaySpeed: 6000,        
        center:false,
        loop: true,
        autoplay:true,            
        autoplayTimeout:3000,
        autoplayHoverPause:true,                 
        dots: false,
        mouseDrag: true,
        touchDrag: true,
        smartSpeed:3000,       
        nav: false,              
        responsive: {
            0: {
                items: 2,
                margin: 25,  
            },
            768: {
                items: 2,
                margin: 25, 
            },
            992: {
                items: 5,
                margin: 30, 
            },
            1200: {
                items: 5,
                margin: 40,
            }
        }
        
        });  
       
  });
   /*--------------------------------------------------------------
    # Testimonials Slider
    --------------------------------------------------------------*/
    $(function() {
        var owl = $('.testimonials-slider')
        owl.owlCarousel({
            items: 1,
            loop: true,    
            responsiveClass: true,
            nav: false, 
            dots: true,       
            autoplay: false,    
            autoplayTimeout: 3000,
            smartSpeed: 300, 
            lazyLoad:true,
            touchDrag: true,
            mouseDrag: true,    
            autoHeight:true,   
            animateIn: "fadeIn",
            animateOut: "fadeOut",     
            stagePadding: 0, // Ensures no extra slides are visible
             margin: 0,
            CSS3: true,
          });  
      
    });
  /*--------------------------------------------------------------
   # Load More Mansory
   --------------------------------------------------------------*/
    $(function() {
        // Check if .item divs exist before running the script
        if ($(".content-mansory").length > 0) {
          $(".content-mansory").slice(0, 9).show(); // Show first 3 divs
      
          $("#seeMoreMansory").click(function(e) {
            e.preventDefault();
            $(".content-mansory:hidden").slice(0, 9).fadeIn("slow"); // Show next 3 hidden divs
      
            if ($(".content-mansory:hidden").length == 0) {
              $("#seeMoreMansory").fadeOut("slow"); // Hide button if no more divs to show
            }
          });
        }
      });
      
   /*--------------------------------------------------------------
   # Mansory Slider
   --------------------------------------------------------------*/
   $(function() {
    var $carousel = $(".slider-mansory");
 
    $carousel.owlCarousel({
        loop: true,
        autoplay: true,    
        autoplayTimeout: 8000,
        smartSpeed: 3000, 
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
   # Gallery Slider
   --------------------------------------------------------------*/
   $(function() {
    var $carousel = $(".slider-gallery");
 
    $carousel.owlCarousel({
        loop: true,
        autoplay: true,    
        autoplayTimeout: 8000,
        smartSpeed: 3000, 
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
   # Capabilities Slider
   --------------------------------------------------------------*/
   $(function() {
    var $carousel = $(".capabilities-slider");
 
    $carousel.owlCarousel({
        loop: true,
        margin: 0,
        dots: false, 
        nav: true,
        items: 2.5,      
        center: false,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" class="general-arrows" width="79" height="79" viewBox="0 0 79 79" fill="none"><circle cx="39.5" cy="39.5" r="38.5" transform="rotate(-180 39.5 39.5)" stroke="#0C2340" stroke-dasharray="20 20"/><path d="M34.1574 52.7821L33 51.6247L44.2336 40.391L33 29.1574L34.1574 28L46.5485 40.391L34.1574 52.7821Z" fill="#0C2340"/></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" class="general-arrows" width="79" height="79" viewBox="0 0 79 79" fill="none"><circle cx="39.5" cy="39.5" r="38.5" transform="rotate(-180 39.5 39.5)" stroke="#0C2340" stroke-dasharray="20 20"/><path d="M34.1574 52.7821L33 51.6247L44.2336 40.391L33 29.1574L34.1574 28L46.5485 40.391L34.1574 52.7821Z" fill="#0C2340"/></svg>'
        ],
        responsive: {
            0: {
                items: 1.3,
               
            },
            768: {
             items: 2.5,
            
         },
            1440: {
                items: 3.4,
               
            },
            1920: {
                items: 3.5,
                
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
    $(".owl-nav").addClass("pr-contain w-full");
 });

      
   /*--------------------------------------------------------------
   # Fetured Portfolio Slider
   --------------------------------------------------------------*/
   $(function() {
    var $carousel = $(".slider-featured-portfolio");
 
    $carousel.owlCarousel({
        loop: true,
        autoplay: true,    
        autoplayTimeout: 8000,
        smartSpeed: 3000, 
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
  # Custom Dropdowns
  --------------------------------------------------------------*/
  /* Category Blog Dropdown */
  $(function() {
    $('.dropdown__button__blog').on('click', function(){
      $('.select-category-blog').toggleClass('active');
      $('.dropdown__button__blog .chevron-down').toggleClass('open');
    });
    $('.select-category-blog .blog-link').on('click', function(){
      var itemValue = $(this).data('value');   
      $('.dropdown__button__blog span').text($(this).text()).parent().attr('data-value', itemValue);
      $('.select-category-blog').toggleClass('active');   
      $('.dropdown__button__blog .chevron-down').toggleClass('open'); 
    });
  });

/*--------------------------------------------------------------
# Sticky Sidebar Blog
--------------------------------------------------------------*/
if (typeof window !== "undefined") {
    $(function() {
        let element = $(".single-sidebar");
        let footer = $(".related-post-section");

        if (element.length && footer.length) {
            let originalY = element.offset().top;
            let topMargin = 40;
            let footerOffset = 50;

            element.css("position", "relative");

            function updateSidebarPosition() {
                let scrollTop = $(window).scrollTop();
                let stopPoint = footer.offset().top - element.outerHeight(true) - topMargin - footerOffset;
                let topValue = Math.max(0, scrollTop - originalY + topMargin);

                if (scrollTop < stopPoint) {
                    element.css("top", topValue + "px");
                } else {
                    element.css("top", stopPoint - originalY + topMargin + "px");
                }
            }

            $(window).on("scroll", function() {
                if (typeof requestAnimationFrame !== "undefined") {
                    requestAnimationFrame(updateSidebarPosition);
                } else {
                    updateSidebarPosition(); // Fallback
                }
            });
        }
    });
}


    // eslint-disable-next-line no-undef
    })(jQuery); 

    
 