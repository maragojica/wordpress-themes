/**
 * Table of Contents:
 * 1. AOS Initialization
 * 2. Sticky Menu(On Scrolling Up) 
 * 3. Slider Logos Style 1
 * 4. Slider Logos Style 2
 * 5. Counters
 * 6. Resources Slider
 * 7. Active Item Accordion
 * 8. Pagination Resources By Category
 * 9. Top Banner
 * 10. Load More Posts
 * 11. Back To Top
 */

 /*--------------------------------------------------------------
  # AOS
  --------------------------------------------------------------*/
  
// Ensure AOS.js is loaded before initializing
if (typeof AOS !== 'undefined') {
  document.addEventListener('DOMContentLoaded', () => {
    AOS.init({     
      duration: 400, // Adjust animation duration
      easing: 'ease-out-cubic', // Adjust easing for smoother animations
      once: true, // Ensure animations happen only once
      offset: 20, 
      delay: 5,
    });
  });

  window.addEventListener('load', () => {
    AOS.refresh();
  });
} else {
  console.error('AOS library is not loaded. Please include AOS.js in your project.');
}
/*--------------------------------------------------------------
# Sticky Menu(On Scrolling Up)
--------------------------------------------------------------*/

jQuery(function () {

  var header = jQuery('.site-header'); 
  var lastScrollTop = 0;

  jQuery(window).on('scroll', function() {
    var st = jQuery(this).scrollTop();

    if (st > 80) {
      header.addClass("header-scrolled");
    } else {
      header.removeClass("header-scrolled");
    }

    lastScrollTop = st;
  });

});

/*--------------------------------------------------------------
# Slider Logos Style 1
--------------------------------------------------------------*/
jQuery(function ($) {
  $('.slider-logos-style-1').owlCarousel({
    slideTransition: 'linear',
    autoplaySpeed: 6000,
    autoWidth: true,
    center: false,
    loop: true,
    autoplay: true,
    autoplayTimeout: 6000,
    autoplayHoverPause: true,
    dots: false,
    smartSpeed: 6000,
    mouseDrag: true,
    touchDrag: true,
    nav: false,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        margin: 20,
        autoWidth: true,
        autoplay: true,
      },
      545: {
        items: 3,
        margin: 30,
        autoWidth: true,
        autoplay: true,
      },
      768: {
        items: 4,
        margin: 40,
        autoWidth: true,
        autoplay: true,
      },
      992: {
        items: 5,
        margin: 50,
        autoWidth: true,
        autoplay: true,
      },
      1200: {
        items: 6,
        margin: 60,
        autoplay: true,
      }
    }
  });
});

/*--------------------------------------------------------------
# Slider Logos Style 2
--------------------------------------------------------------*/
jQuery(function ($) {
  $('.slider-logos-style-2').owlCarousel({
    slideTransition: 'linear',
    autoplaySpeed: 6000,
    autoWidth: true,
    center: false,
    loop: true,
    autoplay: true,
    autoplayTimeout: 6000,
    autoplayHoverPause: true,
    dots: false,
    smartSpeed: 6000,
    mouseDrag: true,
    touchDrag: true,
    nav: false,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        margin: 20,
        autoWidth: true,
        autoplay: true,
      },
      545: {
        items: 2,
        margin: 30,
        autoWidth: true,
        autoplay: true,
      },
      768: {
        items: 3,
        margin: 40,
        autoWidth: true,
        autoplay: true,
      },
      992: {
        items: 3,
        margin: 40,
        autoWidth: true,
        autoplay: true,
      },
      1200: {
        items: 3,
        margin: 40,
        autoplay: true,
      }
    }
  });
});



/*--------------------------------------------------------------
# Counters
--------------------------------------------------------------*/
jQuery(document).ready(function ($) {
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


/*--------------------------------------------------------------
# Resources Slider
--------------------------------------------------------------*/
  const sliderTrack = document.getElementById('sliderTrack');
  const navDots = document.querySelectorAll('.nav-dot');
  let currentSlide = 0;

  function updateSlider(slideIndex) {
      // Update slider position
      const translateX = -slideIndex * 100;
      sliderTrack.style.transform = `translateX(${translateX}%)`;
      
      // Update active dot
      navDots.forEach((dot, index) => {
          dot.classList.toggle('active', index === slideIndex);
      });
      
      currentSlide = slideIndex;
  }

  // Add click events to navigation dots
  navDots.forEach((dot, index) => {
      dot.addEventListener('click', () => {
          updateSlider(index);
      });
  });

/*--------------------------------------------------------------
# Active Item Accordoen
--------------------------------------------------------------*/
  document.addEventListener('DOMContentLoaded', function() {
    // Remove active class from all accordion items
    function removeActiveClasses() {
        document.querySelectorAll('.accordion-item').forEach(item => {
            item.classList.remove('active-item');
        });
    }
    
    // Add active class to current accordion item
    document.querySelectorAll('.accordion-button').forEach(button => {
        button.addEventListener('click', function() {
            removeActiveClasses();
            this.closest('.accordion-item').classList.add('active-item');
        });
    });
});

function copyToClipboard(url) {
    navigator.clipboard.writeText(url).then(function() {
        // Optional: Show a toast notification
        alert('Link copied to clipboard!');
    }).catch(function() {
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = url;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        alert('Link copied to clipboard!');
    });
}

/*--------------------------------------------------------------
# Pagination Resources By Category
--------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function() {
    const paginationContainer = document.querySelector('.second-row-paginated-section');
    
    if (paginationContainer) {
        const pages = paginationContainer.querySelectorAll('.pagination-page');
        const pageButtons = paginationContainer.querySelectorAll('.page-btn');
        const prevButton = paginationContainer.querySelector('.prev-btn');
        const nextButton = paginationContainer.querySelector('.next-btn');
        const prevItem = paginationContainer.querySelector('.prev-item');
        const nextItem = paginationContainer.querySelector('.next-item');
        
        const totalPages = pages.length;
        let currentPage = 1;
        let isTransitioning = false;

        console.log('Resources pagination initialized with', totalPages, 'pages');

        function scrollToSection() {
            const rect = paginationContainer.getBoundingClientRect();
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const targetPosition = rect.top + scrollTop - 100; // 100px offset from top
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }

        function updatePaginationVisibility() {
            const ellipsisStart = paginationContainer.querySelector('.ellipsis-start');
            const ellipsisEnd = paginationContainer.querySelector('.ellipsis-end');
            const middlePages = paginationContainer.querySelectorAll('.middle-page');
            
            if (totalPages <= 5) return; // No ellipsis needed
            
            // Hide all middle pages first
            middlePages.forEach(page => {
                page.classList.add('d-none');
            });
            
            if (ellipsisStart) ellipsisStart.classList.add('d-none');
            if (ellipsisEnd) ellipsisEnd.classList.add('d-none');
            
            if (currentPage <= 3) {
                // Show first few pages: 1 2 3 ... 9 10
                for (let i = 0; i < Math.min(1, middlePages.length); i++) {
                    middlePages[i].classList.remove('d-none');
                }
                if (ellipsisEnd && totalPages > 5) {
                    ellipsisEnd.classList.remove('d-none');
                }
            } else if (currentPage >= totalPages - 2) {
                // Show last few pages: 1 2 ... 8 9 10
                if (ellipsisStart) ellipsisStart.classList.remove('d-none');
                for (let i = Math.max(0, middlePages.length - 1); i < middlePages.length; i++) {
                    middlePages[i].classList.remove('d-none');
                }
            } else {
                // Show pages around current: 1 2 ... 5 6 7 ... 9 10
                if (ellipsisStart) ellipsisStart.classList.remove('d-none');
                if (ellipsisEnd) ellipsisEnd.classList.remove('d-none');
                
                middlePages.forEach(page => {
                    const pageNum = parseInt(page.querySelector('.page-btn').dataset.page);
                    if (Math.abs(pageNum - currentPage) <= 1) {
                        page.classList.remove('d-none');
                    }
                });
            }
        }

        function goToPage(pageNum) {
            if (pageNum === currentPage || isTransitioning || pageNum < 1 || pageNum > totalPages) {
                return;
            }
            
            isTransitioning = true;
            console.log('Going to page:', pageNum);
            
            const currentPageElement = pages[currentPage - 1];
            const nextPageElement = pages[pageNum - 1];
            
            // Scroll to section
            scrollToSection();
            
            // Fade transition
            currentPageElement.style.opacity = '0';
            
            setTimeout(() => {
                // Hide current page and show next page
                currentPageElement.classList.remove('active');
                currentPageElement.classList.add('hidden');
                
                nextPageElement.classList.remove('hidden');
                nextPageElement.classList.add('active');
                nextPageElement.style.opacity = '0';
                
                setTimeout(() => {
                    nextPageElement.style.opacity = '1';
                    
                    setTimeout(() => {
                        isTransitioning = false;
                    }, 300);
                }, 20);
                
            }, 300);
            
            // Update current page
            currentPage = pageNum;
            
            // Update active states
            pageButtons.forEach(btn => {
                btn.parentElement.classList.toggle('active', parseInt(btn.dataset.page) === currentPage);
            });
            
            // Update prev/next button states only if they exist
            if (prevItem) {
                prevItem.classList.toggle('disabled', currentPage === 1);
            }
            if (nextItem) {
                nextItem.classList.toggle('disabled', currentPage === totalPages);
            }
            
            // Update pagination visibility
            updatePaginationVisibility();
        }

        // Page button click handlers
        pageButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                const pageNum = parseInt(button.dataset.page);
                goToPage(pageNum);
            });
        });

        // Previous button click handler (only if exists)
        if (prevButton) {
            prevButton.addEventListener('click', (e) => {
                e.preventDefault();
                if (currentPage > 1) {
                    goToPage(currentPage - 1);
                }
            });
        }

        // Next button click handler (only if exists)
        if (nextButton) {
            nextButton.addEventListener('click', (e) => {
                e.preventDefault();
                if (currentPage < totalPages) {
                    goToPage(currentPage + 1);
                }
            });
        }

        // Initialize pagination visibility
        updatePaginationVisibility();
    }
});

/*--------------------------------------------------------------
# Top Banner
--------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function() {
    const banner = document.getElementById('top-banner');
    const closeBtn = document.getElementById('close-banner');
    const body = document.body;
    
    
    
    if (!banner || !closeBtn) {
        
        return;
    }
    
    // Always show banner on page load (it will reappear each time page is refreshed)
    banner.style.display = 'block';
    body.classList.add('banner-visible');
   
    
    // Close banner functionality
    closeBtn.addEventListener('click', function(e) {
        e.preventDefault();
       
        
        banner.classList.add('banner-hidden');
        body.classList.remove('banner-visible');
        
        // Hide banner after animation (but don't remember it for next page load)
        setTimeout(function() {
            banner.style.display = 'none';
        }, 300);
    });
});

// Alternative method if DOMContentLoaded doesn't work
window.addEventListener('load', function() {
    const banner = document.getElementById('top-banner');
    const body = document.body;
    
    if (banner) {
        banner.style.display = 'block';
        body.classList.add('banner-visible');
    }
});

/*--------------------------------------------------------------
# More Posts Load
--------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
	const postCards = document.querySelectorAll('.post-item');
	const loadMoreBtn = document.querySelector('.load-more-post');
	let currentIndex = 0;
	const increment = 6;

	function showPosts() {
		let lastShownIndex = -1;
		for (let i = currentIndex; i < currentIndex + increment && i < postCards.length; i++) {
			postCards[i].style.display = '';
			lastShownIndex = i;
		}
		currentIndex += increment;
		if (currentIndex >= postCards.length) {
			if (loadMoreBtn) loadMoreBtn.style.visibility = 'hidden';
		}
		return lastShownIndex;
	}

	// Initially hide all, then show first 6
	postCards.forEach(card => card.style.display = 'none');
	showPosts();

	if (loadMoreBtn) {
		function handleLoadMore(e) {
			e.preventDefault();
			const lastShownIndex = showPosts();
			if (lastShownIndex !== -1) {
				const lastCard = postCards[lastShownIndex];
				lastCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
			}
		}
		loadMoreBtn.addEventListener('click', handleLoadMore);
		loadMoreBtn.addEventListener('touchstart', handleLoadMore);
	}
});

/*--------------------------------------------------------------
# Back To Top
--------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
    "use strict";

    var progressPath = document.querySelector('.progress-wrap path');
    if (!progressPath) return;

    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = 'none';
    progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = 'stroke-dashoffset 10ms linear';

    function updateProgress() {
        var scroll = window.scrollY || window.pageYOffset;
        var height = document.documentElement.scrollHeight - window.innerHeight;
        var progress = pathLength - (scroll * pathLength / height);
        progressPath.style.strokeDashoffset = progress;
    }

    updateProgress();
    window.addEventListener('scroll', updateProgress);

    var offset = 50;
    var duration = 550;

    window.addEventListener('scroll', function () {
        var progressWrap = document.querySelector('.progress-wrap');
        if (!progressWrap) return;
        if ((window.scrollY || window.pageYOffset) > offset) {
            progressWrap.classList.add('active-progress');
        } else {
            progressWrap.classList.remove('active-progress');
        }
    });

    var progressWrap = document.querySelector('.progress-wrap');
    if (progressWrap) {
        progressWrap.addEventListener('click', function (event) {
            event.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
            return false;
        });
    }
});

/*--------------------------------------------------------------
# Sticky Sidebar
--------------------------------------------------------------*/


document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.querySelector('.sidebar-content');
    const sidebarColumn = document.querySelector('.col-lg-4');
    const rowContent = document.querySelector('.row-content');
    
    if (!sidebar || !sidebarColumn || !rowContent) return;
    
    let sidebarWidth = 0;
    let sidebarLeft = 0;
    let rowStartPos = 0;
    let rowEndPos = 0;
    
    function calculateDimensions() {
        const sidebarRect = sidebar.getBoundingClientRect();
        
        // Get the actual sidebar width (respecting column padding)
        sidebarWidth = sidebar.offsetWidth;
        
        // Get left position from the sidebar itself (accounts for padding)
        sidebarLeft = sidebarRect.left;
        
        // Get row start and end position
        rowStartPos = rowContent.offsetTop;
        rowEndPos = rowStartPos + rowContent.offsetHeight;
    }
    
    function handleStickyClass() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const offset = 30;
        const sidebarHeight = sidebar.offsetHeight;
        
        // Calculate the bottom of the sidebar when sticky
        const sidebarBottom = scrollTop + offset + sidebarHeight;
        
        // Only be sticky between row start and row end
        if (scrollTop >= (rowStartPos - offset) && sidebarBottom <= rowEndPos) {
            if (!sidebar.classList.contains('is-sticky')) {
                calculateDimensions();
                sidebar.classList.add('is-sticky');
                sidebar.style.width = sidebarWidth + 'px';
                sidebar.style.left = sidebarLeft + 'px';
            }
        } else {
            sidebar.classList.remove('is-sticky');
            sidebar.style.width = '';
            sidebar.style.left = '';
        }
    }
    
    // Initial calculation
    setTimeout(function() {
        calculateDimensions();
        handleStickyClass();
    }, 100);
    
    // Listen to scroll
    let ticking = false;
    window.addEventListener('scroll', function() {
        if (!ticking) {
            window.requestAnimationFrame(function() {
                handleStickyClass();
                ticking = false;
            });
            ticking = true;
        }
    });
    
    // Listen to resize
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            calculateDimensions();
            handleStickyClass();
        }, 250);
    });
});