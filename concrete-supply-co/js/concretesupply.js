/**
 * Table of Contents:
 * 1. Sticky Menu(On Scrolling Up)
 * 2. Quotes Slider
 * 3. History Slider
 * 4. Media Slider
 * 5. Logo Slider Section
 * 6. Parallax
 * 7. Select Portfolio
 * 8. Infinite Portfolio Load More
 * 9. Custom Dropdowns
 * 10. Custom Videos
 * 11. Back To Top
 * 12. Scroll Animations
 * 13. Concrete Calculator
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
# Quotes Slider
--------------------------------------------------------------*/

jQuery(document).ready(function () {
    if(jQuery('.testimonials-slider').length) {
        new Glider(document.querySelector('.testimonials-slider'), {
            slidesToShow: 1,
            slidesToScroll: 1,
            draggable: false,
            rewind: true,
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            }
        });
    }
  });

/*--------------------------------------------------------------
# History Slider
--------------------------------------------------------------*/

jQuery(document).ready(function () {
  if(jQuery('.history-slider').length) {
      new Glider(document.querySelector('.history-slider'), {
          slidesToShow: 1,
          slidesToScroll: 1,
          draggable: false,
          rewind: true,
          arrows: {
              prev: '.glider-prev-history',
              next: '.glider-next-history'
          }
      });
  }
});

/*--------------------------------------------------------------
# Media Slider
--------------------------------------------------------------*/

jQuery(document).ready(function () {
  if(jQuery('.media-slider').length) {
      new Glider(document.querySelector('.media-slider'), {
          slidesToShow: 1,
          slidesToScroll: 1,
          draggable: false,
          rewind: true,
          arrows: {
              prev: '.glider-prev-media',
              next: '.glider-next-media'
          }
      });
  }
});

/*--------------------------------------------------------------
# Logo Slider Section
--------------------------------------------------------------*/

jQuery(document).ready(function () {
  jQuery('.logo-glider').slick({
  slidesToShow: 5,
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
# Parallax
--------------------------------------------------------------*/
jQuery(document).ready(function ($) {
  var images = document.querySelectorAll('.parallax-image');
  new simpleParallax(images, {
    delay: .6,
    transition: 'cubic-bezier(0,0,0,1)'
  });
});

var video = document.getElementsByTagName('video');
new simpleParallax(video);

/*--------------------------------------------------------------
# Select Portfolio
--------------------------------------------------------------*/

function showLoading() {
  jQuery('.projects-row').addClass('loading').append('<div class="spinner"></div>');
}

function hideLoading() {
  jQuery('.projects-row').removeClass('loading').find('.spinner').remove();
}
jQuery(document).ready(function($) {
  $('.filter-category .project-link').on('click', function(e) {
      e.preventDefault();
      showLoading();

      currentFilters = [{
          taxonomy: $(this).data('taxonomy'),
          term_id: $(this).data('term-id')
      }];

      // Remove the active class from all filter categories
      $('.filter-category').removeClass('active');

      // Add the active class to the parent filter category of the clicked link
      $(this).closest('.filter-category').addClass('active');

      var termId = $(this).data('term-id');
      var filters = [];      

      // If termId is not "all", then set the filters array check the all ID in this case is 3
      if (termId !== 3) {
          filters.push({
              taxonomy: $(this).data('taxonomy'),
              term_id: termId
          });
      }

      $.ajax({
          url: ajax_params.ajax_url,
          type: 'POST',
          data: {
              'action': 'filter_projects',
              'nonce': ajax_params.nonce,
              'filters': filters
          },
          success: function(data) {
              hideLoading();
              $('.projects-row').html(data);

              // Count the number of posts returned
              var postCount = $('.projects-row').find('.project').length;
              console.log('Post count:', postCount);

              // Hide the "Load More" button if the count is less than the number of posts per page
              if (postCount < 12) {
                  $('#load-more').hide();
              } else {
                  $('#load-more').show();
              }
          },
          error: function() {
              hideLoading();  
          }
      });
  });
});


/*--------------------------------------------------------------
# Infinite Portfolio Load More
--------------------------------------------------------------*/
jQuery(document).ready(function($) {
  var currentFilters = [];
  var currentPage = 1; 
  var isLoading = false; 
  var allPostsLoaded = false; 

  $('.project-link, #closeFilterBtn').on('click', function() {
      currentPage = 1;
  });

  $('#load-more').on('click', function() {
    const $portfolioFilters = $('.portfolio-filters');
    if ($portfolioFilters.length === 0) {     
      $('#load-more').hide();   
      return;  
    }
    if (!isLoading && !allPostsLoaded) {
      isLoading = true; 
      loadMoreProjects();
    }
  });

  function loadMoreProjects() {
      currentPage++;
      var featured =  $('#load-more').data('featured');        

      var data = {
          action: 'load_more_projects',
          nonce: ajax_params.nonce,
          paged: currentPage,
          filters: currentFilters,
          idfeatured: featured
      };

      $.ajax({
          url: ajax_params.ajax_url,
          type: 'POST',
          data: data,
          success: function(response) {
              if(response.trim() === "") { 
                  allPostsLoaded = true; 
                  $('#load-more').hide();
                  return; 
              }
              $('.projects-row').append(response);
              isLoading = false;

              // Count the number of posts returned
              var postCount = $(response).filter('.project').length;
              console.log('Post count:', postCount);

              // Hide the "Load More" button if the count is less than 12
              if (postCount < 12) {
                  $('#load-more').hide();
              }
          },
          error: function() {
              isLoading = false;
          }
      });
  }

  $('.project-link').on('click', function() {
      currentFilters = [{
          term_id: $(this).data('term-id'),
          taxonomy: $(this).data('taxonomy')
      }];
      $('#load-more').show();
  });
});


/*--------------------------------------------------------------
# Custom Dropdowns
--------------------------------------------------------------*/
jQuery(document).ready(function () {
  jQuery('.select-dropdown__button').on('click', function(){
    jQuery('.select-category').toggleClass('active');
    jQuery('.chevron-down').toggleClass('open');
  });
  jQuery('.project-link').on('click', function(){
    var itemValue = jQuery(this).data('value');   
    jQuery('.select-dropdown__button span').text(jQuery(this).text()).parent().attr('data-value', itemValue);
    jQuery('.select-category').toggleClass('active');   
    jQuery('.chevron-down').toggleClass('open'); 
  });
});

/*--------------------------------------------------------------
# Custom Videos
--------------------------------------------------------------*/

jQuery(document).ready(function () {
  const players = Array.from(document.querySelectorAll('.player')).map(p => new Plyr(p));
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
# Scroll Animations
--------------------------------------------------------------*/
jQuery(document).ready(function ($) {
  function handleIntersection(entries, observer) {
      entries.forEach((entry) => {
          if (entry.isIntersecting) {
              const $target = $(entry.target);
              const animationClass = $target.attr('data-animation');
              const animationDuration = $target.attr('data-duration');
              
              if (animationDuration) {
                  $target.css('animation-duration', animationDuration);
              }
              
              $target.addClass(animationClass);
          }
      });
  }

  const observer = new IntersectionObserver(handleIntersection, {
      threshold: 0.2,
  });

  $('.animate__animated').each(function () {
      observer.observe(this);
  });
});

/*--------------------------------------------------------------
# Concrete Calculator
--------------------------------------------------------------*/

jQuery(document).ready(function($) {
  const base = new URL('/', location.href).href;
  var shapes = [
      {
          name: "Concrete Slab",
          image_url: base + 'wp-content/themes/concrete-supply-co/img/img-concrete-slab.png',
          dimensions: {
              length: { name: "Length (feet)" },
              width: { name: "Width (feet)" },
              thickness: { name: "Thickness (inches)" }
          },
          multiplication_factor: (1/3)*(1/3)*(1/36)
      },
      {
          name: "Concrete Footing",
          image_url: base + 'wp-content/themes/concrete-supply-co/img/img-concrete-footing.png',
          dimensions: {
              length: { name: "Length (feet)" },
              width: { name: "Width (inches)" },
              thickness: { name: "Depth (inches)" }
          },
          multiplication_factor: (1/3)*(1/36)*(1/36)
      },
      {
          name: "Concrete Wall",
          image_url: base + 'wp-content/themes/concrete-supply-co/img/img-concrete-wall.png',
          dimensions: {
              length: { name: "Wall Length (feet)" },
              width: { name: "Wall Height (feet)" },
              thickness: { name: "Wall Thickness (inches)" }
          },
          multiplication_factor: (1/3)*(1/3)*(1/36)
      }
  ];
function updateShapeList() {
      var shapeListHtml = '';
      $.each(shapes, function(index, shape) {
          shapeListHtml += '<div class="shape-list-item"><a href="#" tabindex="0" aria-label="' + shape.name + '" title="' + shape.name + '" data-shape-index="' + index + '">' + shape.name + '</a></div>';
      });
      $('.shape-list').html(shapeListHtml);
      $('.shape-info').hide();
  }
  function chooseShape(index) {
      var shape = shapes[index];
      $('.selected-shape-image').html('<img src="' + shape.image_url + '" alt="' + shape.name + '">');
      var formHtml = '';
      $.each(shape.dimensions, function(key, dimension) {
          formHtml += '<div class="form-group"><label for="' + key + '">' + dimension.name + '</label><br /><input aria-describedby="' + key + '" type="number" class="dimension-input" id="' + key + '" data-dimension-type="' + key + '" placeholder="' + dimension.name + '"></div>';
      });
      $('.concrete-calculator-form').html(formHtml).show();
      $('.cubic-footage-result').hide();
      // Set the selected shape in the data attribute for later use
      $('.shape-list-item a').removeClass('active');
      $('.shape-list-item a[data-shape-index="' + index + '"]').addClass('active').data('shape', shape);
      $('.shape-title').html('<h6>' + shape.name + '</h6>');
      $('.calculator-main').hide();
      $('.shape-info').show();
  }
function calculateVolume() {
var selectedShape = $('.shape-list-item a.active').data('shape');
var length = parseFloat($('input[data-dimension-type="length"]').val());
var width = parseFloat($('input[data-dimension-type="width"]').val());
var thickness = parseFloat($('input[data-dimension-type="thickness"]').val());

if (!isNaN(length) && !isNaN(width) && !isNaN(thickness)) {
  // Check if the selected shape is 'Concrete Footing'
  if (selectedShape.name === "Concrete Footing") {
      // Convert width and thickness from inches to feet
      width /= 12;
      thickness /= 12;
  } else {
      // For other shapes, we assume width is in feet and only convert thickness
      thickness /= 12;
  }
  // Calculate the volume in cubic yards
  var volume = (length * width * thickness) / 27;
  $('.cubic-footage-result .total-cubic').text(volume.toFixed(2));
  $('.cubic-footage-result .total-unit').text('Cubic Yard');
  $('.cubic-footage-result').show();
}
}
  updateShapeList();
  // Shape click handler
  $('.shape-list').on('click', 'a', function(e) {
      e.preventDefault();
      var index = $(this).data('shape-index');
      chooseShape(index);
  });
  var btnback = jQuery('.back-shape');  
  btnback.on('click', function(e) {
     $('.calculator-main').show();
    $('.shape-info').hide();
  });
  // Calculation trigger
  $('.calculator-container').on('input', '.dimension-input', calculateVolume);
});

jQuery(document).ready(function($) {
  $('a, input, select, button, textarea').not('[tabindex]').attr('tabindex',0);
});

