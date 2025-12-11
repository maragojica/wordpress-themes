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
// 4. Search Bar Popup
// 5. Custom Videos
// 6. FAQ Accordion
// 7. Load More News

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
# Search Bar Popup
--------------------------------------------------------------*/

document.addEventListener('DOMContentLoaded', function() {
    const searchIcons = document.querySelectorAll('.search-icon');
    const popup = document.querySelector('.popup');
    const closeBtn = document.getElementById('close-search-btn');
    const contentTopHeader = document.querySelector('.content-top-header');

    // Function to open popup
    function openPopup() {
        popup.classList.add('active');
        if (contentTopHeader) {
            contentTopHeader.classList.remove('opacity-100');
            contentTopHeader.classList.add('opacity-0');
        }
    }

    // Function to close popup
    function closePopup() {
        popup.classList.remove('active');
        if (contentTopHeader) {
            contentTopHeader.classList.remove('opacity-0');
            contentTopHeader.classList.add('opacity-100');
        }
    }

    // Toggle popup on search icon click
    searchIcons.forEach(searchIcon => {
        searchIcon.addEventListener('click', function(event) {
            event.preventDefault();
            if (popup.classList.contains('active')) {
                closePopup();
            } else {
                openPopup();
            }
        });
        searchIcon.addEventListener('touchstart', function(event) {
            event.preventDefault();
            if (popup.classList.contains('active')) {
                closePopup();
            } else {
                openPopup();
            }
        });
    });

    // Close popup on close button click
    if (closeBtn) {
        closeBtn.addEventListener('click', function(event) {
            event.preventDefault();
            closePopup();
        });
    }

    // Close popup if click outside popup content
    document.addEventListener('mousedown', function(event) {
        if (
            popup.classList.contains('active') &&
            !popup.contains(event.target) &&
            !Array.from(searchIcons).some(icon => icon.contains(event.target))
        ) {
            closePopup();
        }
    });

    // Close popup on Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape" && popup.classList.contains('active')) {
            closePopup();
        }
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
# FAQ Accordion
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
# Load More News
--------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
	const postCards = document.querySelectorAll('.news-item');
	const loadMoreBtn = document.querySelector('.load-more-news');
	
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