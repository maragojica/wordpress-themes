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
// 4. Lightbox
// 5. Accordeon
// 6. Custom Videos
// 7. Animated Process Line

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
   # Lightbox
   --------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
	Fancybox.bind('[data-fancybox]', {
		caption: (fancybox, slide) => {
			return slide.triggerEl.dataset.caption || 'No caption available';
		},
		Carousel: {
			infinite: true, // Enable infinite looping
		},
		Thumbs: true, // Disable thumbnails
		dragToClose: false, // Prevent accidental closing while scrolling
		Panzoom: {
			mouseWheel: 'slide', // Enables scrolling through images
		},
	});
});

/*--------------------------------------------------------------
# Accordeon
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
# Custom Videos
--------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
	document.querySelectorAll('.player').forEach((p) => new Plyr(p));
});

/*--------------------------------------------------------------
# Animated Process Line
--------------------------------------------------------------*/
document.addEventListener('DOMContentLoaded', function () {
	setTimeout(initProcessLine, 500);

	function initProcessLine() {
		const processSection = document.querySelector(
			'.back-foth-media-full-process'
		);
		if (!processSection) return;

		const lineContainer = document.createElement('div');
		lineContainer.className = 'process-line-container';
		processSection.appendChild(lineContainer);

		const svg = document.createElementNS(
			'http://www.w3.org/2000/svg',
			'svg'
		);
		svg.setAttribute('class', 'process-line-svg');
		lineContainer.appendChild(svg);

		const path = document.createElementNS(
			'http://www.w3.org/2000/svg',
			'path'
		);
		path.setAttribute('class', 'process-path');
		path.setAttribute('stroke', '#D5A94E');
		path.setAttribute('stroke-width', '1');
		path.setAttribute('fill', 'none');
		svg.appendChild(path);
		calculatePath(svg, path, processSection);
		window.addEventListener('scroll', function () {
			animatePath(path, processSection);
		});
		window.addEventListener(
			'resize',
			debounce(function () {
				calculatePath(svg, path, processSection);
				animatePath(path, processSection);
			}, 250)
		);
		animatePath(path, processSection);
	}

	function calculatePath(svg, path, section) {
		if (!svg || !path || !section) return;

		const sectionRect = section.getBoundingClientRect();
		const sectionHeight = section.scrollHeight;
		const sectionWidth = section.offsetWidth;

		svg.setAttribute('viewBox', `0 0 ${sectionWidth} ${sectionHeight}`);
		svg.setAttribute('width', '100%');
		svg.setAttribute('height', '100%');
		svg.style.position = 'absolute';
		svg.style.top = '0';
		svg.style.left = '0';
		svg.style.pointerEvents = 'none';
		svg.style.zIndex = '1';
		svg.style.overflow = 'visible';

		const contentSections = section.querySelectorAll('.process-content');
		const pathPoints = [];
		let firstIconFound = false;
		let startX = 0;

		contentSections.forEach((contentSection, index) => {
			const isReversed =
				contentSection.querySelector('.md\\:flex-row-reverse') !== null;
			const icons = contentSection.querySelectorAll(
				'.process-icon, .border-primary'
			);
			const contentLists =
				contentSection.querySelectorAll('.content-list');

			icons.forEach((icon, iconIndex) => {
				const contentList = icon.closest('.content-list');
				if (!contentList) return;

				const iconRect = icon.getBoundingClientRect();
				const contentListRect = contentList.getBoundingClientRect();
				const iconX =
					iconRect.left - sectionRect.left + iconRect.width / 2;
				const iconY =
					iconRect.top - sectionRect.top + iconRect.height / 2;
				const contentBottomY = contentListRect.bottom - sectionRect.top;
				if (!firstIconFound) {
					startX = iconX;
					const startOffset = 30;
					pathPoints.push(`M ${startX} ${startOffset}`);
					pathPoints.push(`L ${iconX} ${iconY}`);
					firstIconFound = true;
				}

				const extraDistance = 100; //(bottom offset in pixels)
				pathPoints.push(`L ${iconX} ${contentBottomY + extraDistance}`);

				if (
					index < contentSections.length - 1 ||
					iconIndex < icons.length - 1
				) {
					const nextSection =
						index < contentSections.length - 1
							? contentSections[index + 1]
							: contentSections[index];
					const isNextReversed =
						nextSection.querySelector('.md\\:flex-row-reverse') !==
						null;

					let nextIcon;
					if (iconIndex < icons.length - 1) {
						nextIcon = icons[iconIndex + 1];
					} else {
						const nextIcons = nextSection.querySelectorAll(
							'.process-icon, .border-primary'
						);
						nextIcon = nextIcons[0];
					}

					if (nextIcon) {
						const nextIconRect = nextIcon.getBoundingClientRect();
						const nextX =
							nextIconRect.left -
							sectionRect.left +
							nextIconRect.width / 2;
						pathPoints.push(
							`L ${nextX} ${contentBottomY + extraDistance}`
						);
						pathPoints.push(
							`L ${nextX} ${nextIconRect.top - sectionRect.top + nextIconRect.height / 2}`
						);
					}
				}
			});
		});

		if (pathPoints.length === 0) return;
		const lastPoint = pathPoints[pathPoints.length - 1];
		const lastX = parseFloat(lastPoint.split(' ')[1]);
		pathPoints.push(`L ${lastX} ${sectionHeight}`);

		path.setAttribute('d', pathPoints.join(' '));

		const pathLength = path.getTotalLength();
		path.setAttribute('stroke-dasharray', pathLength);
		path.setAttribute('stroke-dashoffset', pathLength);
		svg.setAttribute('data-path-length', pathLength);

		return pathLength;
	}

	function animatePath(path, section) {
		if (!path || !section) return;

		const svg = path.closest('svg');
		const pathLength = parseFloat(
			svg.getAttribute('data-path-length') || path.getTotalLength()
		);
		const sectionRect = section.getBoundingClientRect();
		const windowHeight = window.innerHeight;

		if (sectionRect.bottom <= 0 || sectionRect.top >= windowHeight) {
			path.style.strokeDashoffset = pathLength;
			return;
		}

		let progress;

		if (sectionRect.height <= windowHeight) {
			const visibleHeight =
				Math.min(windowHeight, sectionRect.bottom) -
				Math.max(0, sectionRect.top);
			progress = visibleHeight / sectionRect.height;
		} else {
			const scrollableDistance = sectionRect.height - windowHeight;
			const distanceScrolled = Math.max(
				0,
				Math.min(scrollableDistance, -sectionRect.top)
			);
			progress = distanceScrolled / scrollableDistance;
		}
		progress = Math.min(1, progress * 1.2);
		path.style.strokeDashoffset = pathLength - pathLength * progress;
		highlightActiveSections(section, progress);
	}

	function highlightActiveSections(section, scrollProgress) {
		const contentLists = section.querySelectorAll('.content-list');
		const sectionHeight = section.scrollHeight;

		contentLists.forEach((contentList, index) => {
			const rect = contentList.getBoundingClientRect();
			const sectionRect = section.getBoundingClientRect();
			const listTop = rect.top - sectionRect.top;
			const listHeight = rect.height;
			const listMidpoint = (listTop + listHeight / 2) / sectionHeight;
			if (Math.abs(scrollProgress - listMidpoint) < 0.2) {
				contentList.classList.add('active');
			} else {
				contentList.classList.remove('active');
			}
		});
	}
	function debounce(func, wait) {
		let timeout;
		return function () {
			const context = this;
			const args = arguments;
			clearTimeout(timeout);
			timeout = setTimeout(() => {
				func.apply(context, args);
			}, wait);
		};
	}
});
