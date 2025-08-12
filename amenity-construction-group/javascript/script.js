/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */
// Table of Contents:
// 1. Sticky Menu(On Scrolling Up)
// 2. Mobile Menu
// 3. Custom Videos
// 4. Modal Team Member
// 5. Brands Tabs
// 6. Brands Accordion
// 7. Map Pins Hover Effect

/*--------------------------------------------------------------
# Sticky Menu(On Scrolling Up)
--------------------------------------------------------------*/

document.addEventListener('DOMContentLoaded', function () {
	var header = document.querySelector('.site-header');
	var lastScrollTop = 0;
	var mobileMenuToggle = document.getElementById('mobile-menu-toggle');
	window.addEventListener('scroll', function () {
		var isMobileMenuOpen =
			mobileMenuToggle.getAttribute('aria-expanded') === 'true';
		if (!isMobileMenuOpen) {
			var st = window.scrollY || document.documentElement.scrollTop;

			if (st > lastScrollTop) {
				if (st > 0) {
					header.classList.add('header-scrolled');
					header.classList.remove('header-scrolled-top');
				}
			} else {
				if (st > 0) {
					header.classList.add('header-scrolled-top');
					header.classList.remove('header-scrolled');
				} else {
					header.classList.remove(
						'header-scrolled',
						'header-scrolled-top'
					);
				}
			}
			lastScrollTop = st <= 0 ? 0 : st;
		}
	});
});


/*--------------------------------------------------------------
# Mobile Menu
--------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
	const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
	const mobileMenuClose = document.getElementById('mobile-menu-close');
	const mobileMenu = document.getElementById('mobile-menu');
	const body = document.getElementsByTagName('body')[0];

	mobileMenuToggle.addEventListener('click', function () {
		const isExpanded =
			mobileMenuToggle.getAttribute('aria-expanded') === 'true';
		mobileMenuToggle.setAttribute('aria-expanded', !isExpanded);
		mobileMenu.classList.toggle('translate-x-full');
		mobileMenuClose.focus();
		body.classList.add('mobile-menu-open');
	});

	mobileMenuClose.addEventListener('click', function () {
		mobileMenu.classList.add('translate-x-full');
		mobileMenuToggle.setAttribute('aria-expanded', false);
		mobileMenuToggle.focus();
		body.classList.remove('mobile-menu-open');
	});

	document.addEventListener('click', function (event) {
		if (
			!mobileMenu.contains(event.target) &&
			!mobileMenuToggle.contains(event.target) &&
			!mobileMenu.classList.contains('translate-x-full')
		) {
			mobileMenu.classList.add('translate-x-full');
			mobileMenuToggle.setAttribute('aria-expanded', false);
			mobileMenuToggle.focus();
		}
	});

	document.addEventListener('keydown', function (event) {
		if (
			event.key === 'Escape' &&
			!mobileMenu.classList.contains('translate-x-full')
		) {
			mobileMenu.classList.add('translate-x-full');
			mobileMenuToggle.setAttribute('aria-expanded', false);
			mobileMenuToggle.focus();
		}
	});

	document
		.querySelectorAll('.menu-item-has-children .sub-menu')
		.forEach(function (subMenu) {
			subMenu.style.maxHeight = '0';
			subMenu.style.overflow = 'hidden';
			subMenu.style.transition = 'max-height 0.3s ease-out';
			subMenu.style.position = 'relative';
		});

	document
		.querySelectorAll('.menu-item-has-children > a')
		.forEach(function (link) {
			link.addEventListener('click', function (event) {
				if (window.innerWidth < 1024) {
					event.preventDefault();
					const subMenu = link.nextElementSibling;
					const parentItem = link.parentElement;

					if (
						subMenu.style.maxHeight === '0px' ||
						subMenu.style.maxHeight === ''
					) {
						subMenu.style.maxHeight = subMenu.scrollHeight + 'px';
						parentItem.classList.add('menu-open');
						link.setAttribute('aria-expanded', 'true');
					} else {
						subMenu.style.maxHeight = '0px';
						parentItem.classList.remove('menu-open');
						link.setAttribute('aria-expanded', 'false');
					}
				}
			});
		});
});

/*--------------------------------------------------------------
# Custom Videos
--------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.player').forEach((p) => {
        const player = new Plyr(p, {
            fullscreen: { enabled: true, fallback: true, iosNative: true }
        });

        // Enable fullscreen button manually if needed
        p.addEventListener('dblclick', () => {
            player.fullscreen.enter();
        });
    });
});

/*--------------------------------------------------------------
# Modal Team Member
--------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
	const triggers = document.querySelectorAll('.modal-trigger');
	const triggerBtns = document.querySelectorAll('.modal-trigger-btn');
	const modals = document.querySelectorAll('[id^="modal-team-"]');
	const closeButtons = document.querySelectorAll('.modal-close');
	const body = document.body;

	// Function to open modal
	function openModal(modalId) {
		const modal = document.getElementById(modalId);
		if (modal) {
			modal.classList.remove('hidden');
			setTimeout(() => {
				modal.classList.add('opacity-100');
				modal.classList.remove('opacity-0');
			}, 10); // Small timeout to trigger transition
			body.classList.add('no-scroll');
		}
	}

	// Handle card clicks (but not when clicking buttons inside)
	triggers.forEach((trigger) => {
		trigger.addEventListener('click', function (e) {
			// Check if the clicked element is a button inside the card
			if (e.target.closest('.modal-trigger-btn')) {
				return; // Let the button handle it
			}
			
			e.preventDefault();
			const modalId = trigger.getAttribute('data-modal-id');
			openModal(modalId);
		});
	});

	// Handle button clicks specifically
	triggerBtns.forEach((btn) => {
		btn.addEventListener('click', function (e) {
			e.preventDefault();
			e.stopPropagation(); // Prevent event bubbling to parent card
			
			const modalId = btn.getAttribute('data-modal-id');
			openModal(modalId);
		});
	});

	closeButtons.forEach((button) => {
		button.addEventListener('click', function () {
			button.closest('.fixed').classList.add('hidden');
			body.classList.remove('no-scroll'); // Enable body scroll
		});
	});

	// Close modal when clicking outside of content
	modals.forEach((modal) => {
		modal.addEventListener('click', function (e) {
			if (e.target === modal) {
				if (modal) {
					modal.classList.remove('opacity-100');
					modal.classList.add('opacity-0');

					setTimeout(() => {
						modal.classList.add('hidden');
					}, 300); // Match the duration of the transition
					body.classList.remove('no-scroll');
				}
			}
		});
	});
});


/*--------------------------------------------------------------
# Brands Tabs
--------------------------------------------------------------*/
const tabButtons = document.querySelectorAll('.tab-btn');
const tabContents = document.querySelectorAll('.tab-content');

function activateTab(tabId) {
  tabButtons.forEach(btn => {
    if (btn.dataset.tab === tabId) {
      btn.classList.add('tab-active');
      btn.classList.remove('tab-inactive');
    } else {
      btn.classList.remove('tab-active');
      btn.classList.add('tab-inactive');
    }
  });

  tabContents.forEach(content => {
    content.classList.toggle('hidden', content.id !== tabId);
  });
}

// Initial state
activateTab('tab1');

tabButtons.forEach(btn => {
  btn.addEventListener('click', () => activateTab(btn.dataset.tab));
});

/*--------------------------------------------------------------
# Brands Accordion
--------------------------------------------------------------*/
const accordionHeaders = document.querySelectorAll('.accordion-header');
const accordionContents = document.querySelectorAll('.accordion-content');
const accordionItems = document.querySelectorAll('.accordion-item');

function activateAccordion(accordionId) {
  accordionHeaders.forEach(header => {
    const targetId = header.dataset.accordion;
    if (targetId === accordionId) {
      header.classList.add('active');
    } else {
      header.classList.remove('active');
    }
  });

  accordionContents.forEach(content => {
    if (content.id === accordionId) {
      content.classList.add('active');
    } else {
      content.classList.remove('active');
    }
  });

  accordionItems.forEach(item => {
    const header = item.querySelector('.accordion-header');
    if (header && header.dataset.accordion === accordionId) {
      item.classList.add('active');
    } else {
      item.classList.remove('active');
    }
  });
}

// Initial state for mobile accordion
if (accordionHeaders.length > 0) {
  activateAccordion('accordion1');
}

accordionHeaders.forEach(header => {
  header.addEventListener('click', () => {
    const accordionId = header.dataset.accordion;
    activateAccordion(accordionId);
  });
});

/*--------------------------------------------------------------
# Map Pins Hover Effect
--------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function() {
    // Get all map items
    const mapItems = document.querySelectorAll('.map-item[data-label]');
    
    mapItems.forEach(function(item) {
        const label = item.getAttribute('data-label');
        
        // Add hover event listeners
        item.addEventListener('mouseenter', function() {
            // Find ALL hotspot pins with matching class
            const hotspotPins = document.querySelectorAll(`.hotspot-pin.${label}`);
            
            hotspotPins.forEach(function(pin) {
                // Add scale transform and transition to each pin
                pin.style.transform = 'scale(1.3)';
                pin.style.transition = 'transform 0.3s ease';
            });
        });
        
        item.addEventListener('mouseleave', function() {
            // Reset ALL hotspot pins with matching class
            const hotspotPins = document.querySelectorAll(`.hotspot-pin.${label}`);
            
            hotspotPins.forEach(function(pin) {
                pin.style.transform = 'scale(1)';
            });
        });
    });
});