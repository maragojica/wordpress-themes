// Table of Contents:
// 1. AOS
// 2. Counters


(function($, window, document) { "use strict";

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
                  duration: 3000,
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
# Tabs Resources
--------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function() {
    // Desktop Tab Buttons
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    // Mobile Dropdown
    const dropdownTrigger = document.querySelector('.tabs-dropdown-trigger');
    const dropdownMenu = document.querySelector('.tabs-dropdown-menu');
    const tabOptions = document.querySelectorAll('.tab-option');
    const selectedTabTitle = document.querySelector('.selected-tab-title');
    const dropdownArrow = document.querySelector('.dropdown-arrow');
    
    // Desktop Tabs
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            
            // Remove active class from all buttons
            tabButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.classList.add('text-foreground');
            });
            
            // Add active class to clicked button
            this.classList.add('active');
            this.classList.remove('text-foreground');
            
            // Hide all tab contents
            tabContents.forEach(content => {
                content.classList.add('hidden');
            });
            
            // Show target tab content
            document.getElementById(targetTab).classList.remove('hidden');
        });
    });
    
    // Mobile Dropdown Toggle
    if (dropdownTrigger) {
        dropdownTrigger.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
            dropdownArrow.classList.toggle('rotate-180');
        });
        
        // Tab Option Selection
        tabOptions.forEach(option => {
            option.addEventListener('click', function() {
                const targetTab = this.getAttribute('data-tab');
                const tabTitle = this.textContent;
                
                // Update selected title
                selectedTabTitle.textContent = tabTitle;
                
                // Hide dropdown
                dropdownMenu.classList.add('hidden');
                dropdownArrow.classList.remove('rotate-180');
                
                // Hide all tab contents
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });
                
                // Show target tab content
                document.getElementById(targetTab).classList.remove('hidden');
            });
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!dropdownTrigger.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
                dropdownArrow.classList.remove('rotate-180');
            }
        });
    }
    
    // Set first tab as default on mobile
    if (tabOptions.length > 0 && selectedTabTitle) {
        selectedTabTitle.textContent = tabOptions[0].textContent;
    }
});

// eslint-disable-next-line no-undef
})(jQuery, window, document); 
  

      
   