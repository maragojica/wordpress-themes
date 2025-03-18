/*--------------------------------------------------------------
# Counters Section
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
                    duration: 2000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now).toLocaleString() + '');
                    }
                });
                $(this).addClass('animated');
            }
        });
    }

    $(window).on('scroll', startCounterAnimation);
    startCounterAnimation();
});
