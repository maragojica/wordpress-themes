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
// 3. Scroll Animations
// 4. Accordion
// 5. Modal Products
// 6. Modal Projects
// 7. Slider Products & Projects


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
# Scroll Animations
--------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
	function handleIntersection(entries) {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				const target = entry.target;
				const animationClass = target.getAttribute('data-animation');
				const animationDuration = target.getAttribute('data-duration');

				if (animationDuration) {
					target.style.animationDuration = animationDuration;
				}

				target.classList.add(animationClass);
			}
		});
	}

	const observer = new IntersectionObserver(handleIntersection, {
		threshold: 0.2,
	});

	document.querySelectorAll('.animate__animated').forEach(function (element) {
		observer.observe(element);
	});
});


/*--------------------------------------------------------------
# Accordion
--------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
	const accordions = document.querySelectorAll('.accordion-header');

	accordions.forEach((header, index) => {
		const content = header.nextElementSibling;

		const calculateChildMargins = (element) => {
			let totalMargin = 0;
			element.querySelectorAll('p').forEach((child) => {
				const marginTop = parseFloat(
					window.getComputedStyle(child).marginTop
				);
				const marginBottom = parseFloat(
					window.getComputedStyle(child).marginBottom
				);
				totalMargin += marginTop + marginBottom;
			});
			return totalMargin;
		};

		const totalMargin = calculateChildMargins(content);

		if (index === 0) {
			content.style.maxHeight = 'none';
			content.style.maxHeight = content.scrollHeight + totalMargin + 'px';
		}

		header.addEventListener('click', function () {
			const isOpen =
				content.style.maxHeight !== '0px' &&
				content.style.maxHeight !== '';

			if (isOpen) {
				content.style.maxHeight = '0px';
				
				this.setAttribute('aria-expanded', 'false');
			} else {
				closeAllAccordions();
				content.style.maxHeight =
					content.scrollHeight + totalMargin + 'px';
				
				this.setAttribute('aria-expanded', 'true');
			}
		});
	});

	function closeAllAccordions() {
		accordions.forEach((header) => {
			const content = header.nextElementSibling;
			content.style.maxHeight = '0px';
			
			header.setAttribute('aria-expanded', 'false');
		});
	}
});


/*--------------------------------------------------------------
# Modal Products
--------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
    const body = document.body;

    // Handle modal open
    document.addEventListener('click', function (e) {
        const trigger = e.target.closest('.modal-trigger');
        if (trigger) {
            e.preventDefault();
            const modalId = trigger.getAttribute('data-modal-id');
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
    });

    // Handle modal close
    document.addEventListener('click', function (e) {
        const closeButton = e.target.closest('.modal-close');
        if (closeButton) {
            const modal = closeButton.closest('.fixed');
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

    // Close modal when clicking outside of content
    document.addEventListener('click', function (e) {
        const modal = e.target.closest('[id^="modal-product-"]');
        if (modal && e.target === modal) {
            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300); // Match the duration of the transition
            body.classList.remove('no-scroll');
        }
    });
});
/*--------------------------------------------------------------
# Modal Portfolios
--------------------------------------------------------------*/

document.addEventListener('DOMContentLoaded', function () {
    const body = document.body;

    // Handle modal open
    document.addEventListener('click', function (e) {
        const trigger = e.target.closest('.modal-trigger');
        if (trigger) {
            e.preventDefault();
            const modalId = trigger.getAttribute('data-modal-id');
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
    });

    // Handle modal close
    document.addEventListener('click', function (e) {
        const closeButton = e.target.closest('.modal-close');
        if (closeButton) {
            const modal = closeButton.closest('.fixed');
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

    // Close modal when clicking outside of content
    document.addEventListener('click', function (e) {
        const modal = e.target.closest('[id^="modal-portfolio-"]');
        if (modal && e.target === modal) {
            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300); // Match the duration of the transition
            body.classList.remove('no-scroll');
        }
    });
});
  
  
  
  
  
  
  
  
  
  
