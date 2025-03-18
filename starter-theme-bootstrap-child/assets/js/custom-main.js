jQuery(function($) {   

    $(window).scroll(function() {
        if ($(this).scrollTop() > 70) {
            $('.header-custom').addClass('header-scrolled');           
        } else {
            $('.header-custom').removeClass('header-scrolled');
           
        }	
       
    }); 
    $(window).on('load', function(){


        $('.navicon').on('click', function (e) {
            e.preventDefault();
            $('#main-header').toggleClass('masthead--active');
            $('#main-body').toggleClass('body--active');
            $('.navicon-box').toggleClass('navicon-box--active');
    
            $(this).toggleClass('navicon--active');
    
            $('.toggle').toggleClass('toggle--active');
        });
        $('.navicon-open').on('click', function (e) {
            e.preventDefault();
            $('#main-header').toggleClass('masthead--active');
            $('#main-body').toggleClass('body--active');
    
            $('.navicon-box').toggleClass('navicon-box--active');
    
            $('.navicon').toggleClass('navicon--active');
    
            $('.toggle').toggleClass('toggle--active');
        });
    
    });
    $(document).ready(function() {          
        /*$('.toggle-content-parent').on('click', function(){
            $('.toggle-content-child').slideUp('slow');
            $(this).find('.toggle-content-child').slideDown('slow');
        });*/

        $('.toggle-content-parent').on('click', function() {
            if ($(this).find('.toggle-content-child').hasClass('open')) {
                // Si el card ya está abierto, lo cerramos
                $(this).find('.toggle-content-child').removeClass('open');
                $(this).find('.toggle-content-child').slideUp('slow');
            } else {
                // Si el card está cerrado, cerramos todos los demás y abrimos este
                $('.toggle-content-child').removeClass('open');
                $('.toggle-content-child').slideUp('slow');

                $(this).find('.toggle-content-child').addClass('open');
                $(this).find('.toggle-content-child').slideDown('slow');
            }
        });

        $('.slider-logos-1').owlCarousel({          


            slideTransition: 'linear',
            autoplaySpeed: 6000,
            autoWidth:true,
            center:true,
            loop: true,
            autoplay:true,            
            autoplayTimeout:6000,
            autoplayHoverPause:true,
            rtl: false,          
            dots: false,
            smartSpeed:6000,
            mouseDrag: true,
            touchDrag: true,
            nav: false,           
            responsiveClass: true,
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
                    items: 5,
                    margin: 35,
                    autoWidth:true,
					          autoplay:true,
                },
                1200: {
                    items: 6,
                    margin: 35,
					  autoplay:true,
                }
            }
        });

        $('.slider-logos-1-reverse').owlCarousel({          
            slideTransition: 'linear',
            autoplaySpeed: 6000,
            autoWidth:true,
            center:true,
            loop: true,
            autoplay:true,            
            autoplayTimeout:6000,
            autoplayHoverPause:true,
            rtl: true,          
            dots: false,
            smartSpeed:6000,
            mouseDrag: true,
            touchDrag: true,
            nav: false,           
            responsiveClass: true,
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
                    items: 5,
                    margin: 35,
                    autoWidth:true,
                              autoplay:true,
                },
                1200: {
                    items: 6,
                    margin: 35,
                      autoplay:true,
                }
            }
        });

        $('.slider-logos-2').owlCarousel({          


            slideTransition: 'linear',
            autoplaySpeed: 6000,
            autoWidth:true,
            center:true,
            loop: true,
            autoplay:true,            
            autoplayTimeout:6000,
            autoplayHoverPause:true,
            rtl: true,          
            dots: false,
            smartSpeed:6000,
            mouseDrag: true,
            touchDrag: true,
            nav: false,           
            responsiveClass: true,
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
                    items: 5,
                    margin: 35,
                    autoWidth:true,
					          autoplay:true,
                },
                1200: {
                    items: 6,
                    margin: 35,
					  autoplay:true,
                }
            }
        });

        $('.slider-logos-3').owlCarousel({          


            slideTransition: 'linear',
            autoplaySpeed: 6000,
            autoWidth:true,
            center:true,
            loop: true,
            autoplay:true,            
            autoplayTimeout:6000,
            autoplayHoverPause:true,
            rtl: false,        
            dots: false,
            smartSpeed:6000,
            mouseDrag: true,
            touchDrag: true,
            nav: false,           
            responsiveClass: true,
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
                    items: 5,
                    margin: 35,
                    autoWidth:true,
					          autoplay:true,
                },
                1200: {
                    items: 6,
                    margin: 35,
					  autoplay:true,
                }
            }
        });
        $('.slider-testimonials').owlCarousel({
            loop: true,
            autoplay: false,
            autoplayTimeout:5000,
            autoplayHoverPause:true,           
            dots: false,
            smartSpeed:1000,
            nav: true,   
            navText: ['<svg xmlns="http://www.w3.org/2000/svg" width="23" height="16" viewBox="0 0 23 16" fill="none">  <path d="M21.5131 8.71094C22.0653 8.71094 22.5131 8.26322 22.5131 7.71094C22.5131 7.15865 22.0653 6.71094 21.5131 6.71094L21.5131 8.71094ZM0.805954 7.00383C0.41543 7.39436 0.41543 8.02752 0.805954 8.41805L7.16992 14.782C7.56044 15.1725 8.19361 15.1725 8.58413 14.782C8.97465 14.3915 8.97465 13.7583 8.58413 13.3678L2.92727 7.71094L8.58413 2.05408C8.97465 1.66356 8.97465 1.0304 8.58413 0.639871C8.1936 0.249347 7.56044 0.249347 7.16992 0.639871L0.805954 7.00383ZM21.5131 6.71094L1.51306 6.71094L1.51306 8.71094L21.5131 8.71094L21.5131 6.71094Z" fill="white"/></svg>', 
            '<svg xmlns="http://www.w3.org/2000/svg" width="23" height="16" viewBox="0 0 23 16" fill="none">  <path d="M1.46216 6.71094C0.909874 6.71094 0.462158 7.15865 0.462158 7.71094C0.462158 8.26322 0.909873 8.71094 1.46216 8.71094L1.46216 6.71094ZM22.1693 8.41805C22.5598 8.02752 22.5598 7.39436 22.1693 7.00383L15.8053 0.639871C15.4148 0.249347 14.7816 0.249347 14.3911 0.639871C14.0006 1.0304 14.0006 1.66356 14.3911 2.05408L20.0479 7.71094L14.3911 13.3678C14.0006 13.7583 14.0006 14.3915 14.3911 14.782C14.7816 15.1725 15.4148 15.1725 15.8053 14.782L22.1693 8.41805ZM1.46216 8.71094L21.4622 8.71094L21.4622 6.71094L1.46216 6.71094L1.46216 8.71094Z" fill="white"/></svg>'],
              center:false,        
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,                   
                    margin: 25,   
                    center:true,    
                    autoHeight:true           

                },
                768: {
                    items: 3,                   
                    margin: 20,
                    center:true,     
                    autoHeight:false                
                },
                992: {
                    items: 2,                   
                    margin: 25, 
                    center:false,    
                    autoHeight:false              
                }
            }
        });  

        $('.ai-wrap .box-title').click(function(){
            let $parent = $(this).parent();
            $parent.toggleClass('open');
            if($parent.hasClass('open'))
                $parent.find('.box-content').slideDown();
            else
                $parent.find('.box-content').slideUp();
        });

        $('.ai-startups').click(function(){
            $('.ai-enterprice').removeClass('open');
            $('.ai-enterprice .box-content').slideUp();
        });

        $('.ai-enterprice').click(function(){
            $('.ai-startups').removeClass('open');
            $('.ai-startups .box-content').slideUp();
        });



        $('.ai-wrap .item-title').click(function(){

            $(this).closest('.ai-wrap').find('.item').removeClass('open');
            $(this).closest('.ai-wrap').find('.item-content').slideUp();

            let $parent = $(this).parent();
            $parent.toggleClass('open');

            if($parent.hasClass('open')){
                $parent.find('.item-content').slideDown();
            }else{
                $parent.find('.item-content').slideUp();
            }
        });

        /*
        $(window).on('scroll', function() {
            
            function handleScroll() {
                var scrollTop = $(window).scrollTop();
                $('#scrollPos').text(scrollTop);

                var teamOffsetTop = $('.wrap-startups').offset().top;
                var teamHeight = $('.wrap-startups').outerHeight();
                var windowHeight = $(window).height();

                // Verificar si la sección 'team' está completamente visible
                if (scrollTop + windowHeight >= teamOffsetTop && scrollTop <= teamOffsetTop + teamHeight) {
                    // Si está completamente visible, no hacemos nada
                    return;
                } else {
                    let w=$(window).width();
                    if(w>991){
                        $('.ai-wrap .box-content').slideUp();
                        $('.ai-wrap').removeClass('open');

                        $('.item-team .toggle-content-child').removeClass('open').slideUp();

                    }
                }
            }

            $(window).on('scroll', handleScroll);

            // Llamamos a handleScroll una vez al inicio para comprobar la posición inicial
            handleScroll();
        });*/
       
    });  
	

});


/**
 * Show headline in hero when make scroll
 */ 
document.addEventListener('DOMContentLoaded', function() {
  var body = document.body;

  window.addEventListener('scroll', function() {
    // Verificar si el scroll vertical es mayor a 0
    if (window.scrollY > 0) {
      // Si es mayor a 0, agregar la clase 'scrolled'
      body.classList.add('scrolled');
    } else {
      // Si el scroll es 0, eliminar la clase 'scrolled'
      body.classList.remove('scrolled');
    }
  });
});

/**
 * stop en 0:2 the video when make scroll
 */
document.addEventListener('DOMContentLoaded', function() {
  var video = document.getElementById('featured-video');
  var isPlaying = false;

  // play video when scrool is top
  function playVideo() {
    if (!isPlaying) {
      video.currentTime = 0;
      video.play();
      isPlaying = true;
    }
  }

  // stop video y jump to 30 second when make scroll down
  function stopVideo() {
    video.pause();
    video.currentTime = 2;
    isPlaying = false;
  }

  window.addEventListener('scroll', function() {
    // check if the scroll is in top page
    if (window.scrollY === 0) {
      playVideo();
    } else {
      stopVideo();
    }
  });
});

