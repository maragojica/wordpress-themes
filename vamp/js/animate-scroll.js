/*--------------------------------------------------------------
# Scroll Animations
--------------------------------------------------------------*/
jQuery(document).ready(function ($) {
    function handleIntersection(entries, observer) {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const $target = $(entry.target);
                const animationClass = $target.attr('data-animation');
                $target.addClass(animationClass);
            }
        });
    }

    const observer = new IntersectionObserver(handleIntersection, {
        threshold: 0.6,
    });

    $('.animate__animated').each(function () {
        observer.observe(this);
    });
});
