// Table of Contents:
// 1. Testimonials Slider
// 2. Blog Post Related Load More
// 3. Case Study Load More
// 4. Archive Load More 
// 5. Custom Dropdowns


(function($) { "use strict";

    /*--------------------------------------------------------------
    # Testimonials Slider
    --------------------------------------------------------------*/
    $(function() {
        var owl = $('.testimonials-slider')
        owl.owlCarousel({
            loop: true,    
            responsiveClass: true,
            nav: false, 
            dots: true,       
            autoplay: true,    
            autoplayTimeout: 8000,
            smartSpeed: 3000, 
            lazyLoad:true,
            touchDrag: true,
            mouseDrag: true,    
            autoHeight:true,   
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',  
            responsive:{
              0:{
                  items:1,  
                  margin: 0       
              },
              768:{
                  items:1,
                  margin: 0
                
              },
              992:{
                  items:1,
                  margin: 0
                 
              }
          }
          
          });  
      
    });

    /*--------------------------------------------------------------
    # Blog Post Related Load More
    --------------------------------------------------------------*/
    $(document).ready(function(){
        $(".content-post-related").slice(0,3).show();
        $("#seeMoreRelated").click(function(e){
          e.preventDefault();
          $(".content-post-related:hidden").slice(0,3).fadeIn("slow");
          
          if($(".content-post:hidden").length == 0){
             $("#seeMoreRelated").fadeOut("slow"); 
             $("#blockMoreRelated").fadeOut("slow");
            }
        });
      })   

   /*--------------------------------------------------------------
    # Case Study Load More
    --------------------------------------------------------------*/
    $(document).ready(function(){
      $(".content-case-study").slice(0,3).show();
      $("#seeMoreCaseStudy").click(function(e){
        e.preventDefault();
        $(".content-case-study:hidden").slice(0,3).fadeIn("slow");
        
        if($(".content-case-study:hidden").length == 0){
           $("#seeMoreCaseStudy").fadeOut("slow"); 
           $("#blockMoreCaseStudy").fadeOut("slow");
          }
      });
    })

    /*--------------------------------------------------------------
    # Archive Load More
    --------------------------------------------------------------*/
    $(document).ready(function(){
      $(".content-archive").slice(0,6).show();
      $("#seeMoreArchive").click(function(e){
        e.preventDefault();
        $(".content-archive:hidden").slice(0,6).fadeIn("slow");
        
        if($(".content-archive:hidden").length == 0){
           $("#seeMoreArchive").fadeOut("slow"); 
           $("#blockMoreArchive").fadeOut("slow");
          }
      });
    })

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

    


