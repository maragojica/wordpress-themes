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
// 1. Full Screen Menu
// 2. Scroll Animations
// 3. Custom Videos


/*--------------------------------------------------------------
   # Full Screen Menu
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
		mobileMenu.classList.toggle('-translate-x-full');
		mobileMenuClose.focus();
		body.classList.add('mobile-menu-open');
	});

	mobileMenuClose.addEventListener('click', function () {
		mobileMenu.classList.add('-translate-x-full');
		mobileMenuToggle.setAttribute('aria-expanded', false);
		mobileMenuToggle.focus();
		body.classList.remove('mobile-menu-open');
	});

	document.addEventListener('click', function (event) {
		if (
			!mobileMenu.contains(event.target) &&
			!mobileMenuToggle.contains(event.target) &&
			!mobileMenu.classList.contains('-translate-x-full')
		) {
			mobileMenu.classList.add('-translate-x-full');
			mobileMenuToggle.setAttribute('aria-expanded', false);
			mobileMenuToggle.focus();
		}
	});

	document.addEventListener('keydown', function (event) {
		if (
			event.key === 'Escape' &&
			!mobileMenu.classList.contains('translate-x-full')
		) {
			mobileMenu.classList.add('-translate-x-full');
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
# Vertical Tabs
--------------------------------------------------------------*/
document.addEventListener("DOMContentLoaded", function () {
    const tabHeadings = document.querySelectorAll(".tab-heading");
    const tabContents = document.querySelectorAll(".tab-content");

    function showTab(tabId) {
        tabContents.forEach((content) => {
            content.style.display = content.id === tabId ? "block" : "none";
            content.classList.toggle("active", content.id === tabId);
        });
    }

    tabHeadings.forEach((heading) => {
        heading.addEventListener("click", function () {
            const tabId = this.getAttribute("data-tab");

            tabHeadings.forEach((h) => h.classList.remove("active"));
            this.classList.add("active");

            showTab(tabId);
        });
    });

    // Ensure the first tab is active on page load
    if (tabHeadings.length > 0 && tabContents.length > 0) {
        tabHeadings[0].classList.add("active");
        showTab(tabHeadings[0].getAttribute("data-tab"));
    }
});


