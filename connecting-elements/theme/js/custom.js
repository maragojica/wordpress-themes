// Table of Contents:
// 1. Logo Slider
// 2. Products Slider
// 3. Testimonials Slider
// 4. The Process Slider
// 5. Custom Dropdowns

(function($) { "use strict";



   /*--------------------------------------------------------------
    # Logo Slider
    --------------------------------------------------------------*/
    $(function() {
      var owl = $('.slider-logos-list')
      owl.owlCarousel({
        slideTransition: 'linear',
        autoplaySpeed: 6000,
        autoWidth:true,
        center:true,
        loop: true,
        autoplay:true,            
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        rtl: false,          
        dots: false,
        smartSpeed:6000,
        mouseDrag: true,
        touchDrag: true,
        nav: false,              
        responsive: {
            0: {
                items: 1,
                margin: 25,
                autoWidth:true,
                autoplay:true,
            },
            768: {
                items: 2,
                margin: 30,
                autoWidth:true,
                autoplay:true,
            },
            992: {
                items: 10,
                margin: 35,
                autoWidth:true,
                 autoplay:true,
            },
            1200: {
                items: 10,
                margin: 40,
                autoplay:true,
            }
        }
        
        });  
       
  });

   /*--------------------------------------------------------------
    # Products Slider
    --------------------------------------------------------------*/
    $(document).ready(function($) {
        var $carousel = $(".slider-products");
     
        $carousel.owlCarousel({
            loop: true,
            margin: 10,
            dots: true, 
            nav: true,
            items: 1,      
            center: false,
            navText: [
                '<svg xmlns="http://www.w3.org/2000/svg" width="21" height="36" viewBox="0 0 21 36" fill="none"><path d="M19 2L3 18L19 34" stroke="#00A2B2" stroke-width="4"/></svg>',
                '<svg xmlns="http://www.w3.org/2000/svg" width="21" height="36" viewBox="0 0 21 36" fill="none"><path d="M2 34L18 18L2 2" stroke="#00A2B2" stroke-width="4"/></svg>'
            ],
            responsive: {
                0: {
                    items: 1,
                   
                },               
                1024: {
                    items: 1,
                },
            },
            onInitialized: moveDotsToNav, // Call custom function after initialization
            onChanged: updateDots,       // Ensure dots update on carousel change
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

           // Function to move dots into the nav container
        function moveDotsToNav(event) {
            const $owl = $(event.target); // The carousel instance
            const $owlNav = $owl.find(".owl-nav");
            const $owlDots = $owl.find(".owl-dots");

            // Check if the dots are already inside the nav to avoid duplication
            if (!$owlNav.find(".owl-dots").length) {
            $owlNav.append($owlDots);
            $owlNav.css({
                display: "flex",
                width: "fit-content",
                position: "relative",
                alignItems: "center",
                justifyContent: "space-between",
            });

            $owlDots.css({
                display: "flex",
                justifyContent: "center",
                flexGrow: 1,
                margin: "0 10px",
            });
            }
        }

        // Function to update the dots' active state when the carousel changes
        function updateDots(event) {
            const $owl = $(event.target); // The carousel instance
            const $owlDots = $owl.find(".owl-dots");

            // Recalculate the active dot state
            $owlDots.find("button").removeClass("active");
            const activeIndex = event.item.index - event.relatedTarget._clones.length / 2;
            const dotIndex = (activeIndex + event.item.count) % event.item.count;
            $owlDots.find(`button:eq(${dotIndex})`).addClass("active");
        }
     });

    /*--------------------------------------------------------------
    # Testimonials Slider
    --------------------------------------------------------------*/
    $(document).ready(function($) {
        var $carousel = $(".slider-testimonials");
     
        $carousel.owlCarousel({
            loop: true,
            margin: 10,
            dots: true, 
            nav: true,
            autoHeight: true,
            items: 1,      
            center: false,
            navText: [
                '<svg xmlns="http://www.w3.org/2000/svg" width="21" height="36" viewBox="0 0 21 36" fill="none"><path d="M19 2L3 18L19 34" stroke="#00A2B2" stroke-width="4"/></svg>',
                '<svg xmlns="http://www.w3.org/2000/svg" width="21" height="36" viewBox="0 0 21 36" fill="none"><path d="M2 34L18 18L2 2" stroke="#00A2B2" stroke-width="4"/></svg>'
            ],
            responsive: {
                0: {
                    items: 1,
                   
                },               
                1024: {
                    items: 1,
                },
            },
            onInitialized: moveDotsToNav, // Call custom function after initialization
            onChanged: updateDots,       // Ensure dots update on carousel change
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

           // Function to move dots into the nav container
        function moveDotsToNav(event) {
            const $owl = $(event.target); // The carousel instance
            const $owlNav = $owl.find(".owl-nav");
            const $owlDots = $owl.find(".owl-dots");

            // Check if the dots are already inside the nav to avoid duplication
            if (!$owlNav.find(".owl-dots").length) {
            $owlNav.append($owlDots);
            $owlNav.css({
                display: "flex",
                width: "fit-content",
                position: "relative",
                alignItems: "center",
                justifyContent: "space-between",
            });

            $owlDots.css({
                display: "flex",
                justifyContent: "center",
                flexGrow: 1,
                margin: "0 10px",
            });
            }
        }

        // Function to update the dots' active state when the carousel changes
        function updateDots(event) {
            const $owl = $(event.target); // The carousel instance
            const $owlDots = $owl.find(".owl-dots");

            // Recalculate the active dot state
            $owlDots.find("button").removeClass("active");
            const activeIndex = event.item.index - event.relatedTarget._clones.length / 2;
            const dotIndex = (activeIndex + event.item.count) % event.item.count;
            $owlDots.find(`button:eq(${dotIndex})`).addClass("active");
        }
     });

   /*--------------------------------------------------------------
   # The Process Slider
   --------------------------------------------------------------*/

   $(document).ready(function($) {
    var $carousel = $(".slider-process");
 
    $carousel.owlCarousel({
        loop: true,
        margin: 12,
        dots: false, 
        nav: false,   
        autoplay: true,    
        autoplayTimeout: 3000,
        smartSpeed: 3000, 
        autoplayHoverPause:true,         
        center: false, 
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
  # Custom Dropdowns
  --------------------------------------------------------------*/
  /* Category Blog Dropdown */
  $(document).ready(function () {
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


    // eslint-disable-next-line no-undef
    })(jQuery); 

    
 