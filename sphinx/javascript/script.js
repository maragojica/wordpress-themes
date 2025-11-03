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
//1. Full Screen Menu
//2. SVG Animations
//3. Load More News


/*--------------------------------------------------------------
   # Full Screen Menu
   --------------------------------------------------------------*/
 document.addEventListener('DOMContentLoaded', function () {
	const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
	const navItems = document.getElementById('mobileMenuItems');
	const mobileMenu = document.getElementById('mobile-menu');
	const body = document.getElementsByTagName('body')[0];

	// Set initial state for nav items (hidden initially)
	const menuItems = navItems.querySelectorAll('li');
	menuItems.forEach((item) => {
		item.classList.add('opacity-0', '-translate-x-5');
	});

	mobileMenuToggle.addEventListener('click', function () {
		const isExpanded = mobileMenuToggle.getAttribute('aria-expanded') === 'true';
		mobileMenuToggle.setAttribute('aria-expanded', !isExpanded);
		mobileMenu.classList.toggle('-translate-x-full');
		body.classList.toggle('mobile-menu-open');

		// When the menu is opened, animate the nav items
		if (!isExpanded) {
			// Delay the nav items animation to sync with the off-canvas transition
			setTimeout(() => {
				// Menu items animation
				navItems.classList.remove('opacity-0', '-translate-x-5');
				navItems.classList.add('opacity-100', 'translate-x-0');

				// Animate each menu item with a delay
				menuItems.forEach((item, index) => {
					item.classList.add('opacity-0', '-translate-x-5', 'transition-all', 'duration-500', 'ease-in-out');
					setTimeout(() => {
						item.classList.remove('opacity-0', '-translate-x-5');
						item.classList.add('opacity-100', 'translate-x-0');
					}, index * 150); // Staggered delay between items
				});
			}, 500); // Delay matches the off-canvas transition duration
		} else {
			// Reset menu items to their initial hidden state when the menu is closed
			menuItems.forEach((item) => {
				item.classList.remove('opacity-100', 'translate-x-0');
				item.classList.add('opacity-0', '-translate-x-5');
			});
		}
	});

	// Reset items if the menu is closed from outside clicks
	document.addEventListener('click', function (event) {
		if (
			!mobileMenu.contains(event.target) &&
			!mobileMenuToggle.contains(event.target) &&
			!mobileMenu.classList.contains('-translate-x-full')
		) {
			mobileMenu.classList.add('-translate-x-full');
			mobileMenuToggle.setAttribute('aria-expanded', false);
			mobileMenuToggle.focus();
			body.classList.remove('mobile-menu-open');

			// Reset menu items when the menu is closed
			menuItems.forEach((item) => {
				item.classList.remove('opacity-100', 'translate-x-0');
				item.classList.add('opacity-0', '-translate-x-5');
			});
		}
	});

	// Reset items on Escape key press
	document.addEventListener('keydown', function (event) {
		if (
			event.key === 'Escape' &&
			!mobileMenu.classList.contains('translate-x-full')
		) {
			mobileMenu.classList.add('-translate-x-full');
			mobileMenuToggle.setAttribute('aria-expanded', false);
			mobileMenuToggle.focus();
			body.classList.remove('mobile-menu-open');

			// Reset items on Escape
			menuItems.forEach((item) => {
				item.classList.remove('opacity-100', 'translate-x-0');
				item.classList.add('opacity-0', '-translate-x-5');
			});
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
# Sticky Menu For Mobile
--------------------------------------------------------------*/

document.addEventListener('DOMContentLoaded', function () {
	var header = document.querySelector('.site-header');
	var logotext = document.querySelector('.header__logo-wrapper');
	window.addEventListener('scroll', function () {
		if (!header) return;
		if (window.scrollY > 0) {
			header.classList.add('header-scrolled');
			logotext.classList.add('logo-scrolled');
		} else {
			header.classList.remove('header-scrolled');
			logotext.classList.remove('logo-scrolled');
		}
	});
});
/*--------------------------------------------------------------
# SVG Animations
--------------------------------------------------------------*/
  const svgContainer = document.getElementById('svgContainer');
        const parallaxGroups = document.querySelectorAll('.parallax-group');
        
        let lastScrollY = window.pageYOffset;
        let ticking = false;
        let floatOffset = 0;
        let floatAnimationId = null;

        if (svgContainer && parallaxGroups.length > 0) {

            // Optimized parallax effect on scroll using requestAnimationFrame
            function updateParallax() {
                const scrolled = window.pageYOffset;
                
                // Move entire SVG container with parallax
                const containerOffset = scrolled * 0.2;
                svgContainer.style.transform = `translate(-50%, calc(-50% + ${containerOffset}px))`;
                
                // Move individual groups with different speeds for depth
                parallaxGroups.forEach(group => {
                    const speed = parseFloat(group.dataset.speed);
                    if (!isNaN(speed)) {
                        const yOffset = scrolled * speed;
                        group.style.transform = `translateY(${yOffset}px)`;
                    }
                });

                ticking = false;
            }

            // Parallax scroll event with requestAnimationFrame for smooth performance
            window.addEventListener('scroll', () => {
                lastScrollY = window.pageYOffset;

                if (!ticking) {
                    window.requestAnimationFrame(updateParallax);
                    ticking = true;
                }
            }, { passive: true });

            // Initial parallax position
            updateParallax();

            // Add subtle floating animation using requestAnimationFrame
            function floatAnimation() {
                if (!svgContainer) {
                    cancelAnimationFrame(floatAnimationId);
                    return;
                }
                
                floatOffset += 0.01;
                const floatY = Math.sin(floatOffset) * 5;
                svgContainer.style.filter = `drop-shadow(0 ${floatY}px 20px rgba(217, 217, 217, 0.3))`;
                
                floatAnimationId = requestAnimationFrame(floatAnimation);
            }
            
            // Start floating animation
            floatAnimationId = requestAnimationFrame(floatAnimation);

            // Optional: Log success
            console.log('SVG parallax animation initialized successfully');
            
            // Clean up on page unload
            window.addEventListener('beforeunload', () => {
                if (floatAnimationId) {
                    cancelAnimationFrame(floatAnimationId);
                }
            });

        } else {
            console.warn('SVG container or parallax groups not found. Animation not initialized.');
        }

/*--------------------------------------------------------------
# Load More News
--------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
	const postCards = document.querySelectorAll('.news-item');
	const loadMoreBtn = document.querySelector('.load-more-news'); 
	const lineMoreBtn = document.querySelector('.h-line');
	let currentIndex = 0;
	const increment = 3;

	function showPosts() {
		let lastShownIndex = -1;
		for (let i = currentIndex; i < currentIndex + increment && i < postCards.length; i++) {
			postCards[i].style.display = '';
			lastShownIndex = i;
		}
		currentIndex += increment;
		if (currentIndex >= postCards.length) {
			if (loadMoreBtn) loadMoreBtn.style.visibility = 'hidden';
			if (lineMoreBtn) lineMoreBtn.style.visibility = 'hidden';
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
