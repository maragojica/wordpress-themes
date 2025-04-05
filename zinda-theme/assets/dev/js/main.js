"use strict";

(function ($) {

    // TODO Youtube Iframe
    $('.youtubeiFrame').on('click', function () {
        if ($(this).data('iframeurl')) {
            $(this).find('img').remove();
            $(this).append('<iframe src="' + $(this).data('iframeurl') + '" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width: 100%;height: 300px;"> </iframe>');
        }
    });

    // TODO FAQ Sorting Functionality
    $('#filters a').on('click', function (e) {
        e.preventDefault();
        let term = $(this).data('filter');
        $(this).addClass('faq-filter-active').siblings().removeClass('faq-filter-active');
        if (term === 'all') {
            $('#items li').css('display', 'inline-block');
        } else {
            $('#items li').hide();
            $('#items li[data-filter-item="' + term + '"]').css('display', 'inline-block');
            ;
        }
    });

    $(document).ready(function() {
        var headerCase = $('.mobile-header-case');
        function isMobile() {
            return $(window).width() <= 576;
        }
    
        $(window).scroll(function() {
            if (isMobile()) {
                if ($(this).scrollTop() > 0) {
                    headerCase.hide();
                } else {
                    headerCase.show();
                }
            }
        });
    });

    document.addEventListener('wpcf7mailsent', function (event) {
        if (window.location.href.includes("/es/")) {
            window.location.href = '/es/gracias/';
        } else {
            window.location.href = '/thank-you/';
        }
    }, false);

    // TODO Scroll To ID
    $(document).on('click', 'a[href^=\\#]', function (e) {
        let el = $($(this).attr('href'));
        if (el.length && el.offset()) { // one of those may be unnecessary
            e.preventDefault();
            $('html, body').animate({
                scrollTop: el.offset().top - $('header').height()
            }, 2000);
        }
    });

    // TODO Menu mobile
    $('button.burger').on('click', function () {
        $('body').toggleClass('overflowGlobal');
        $('.header-nav').toggleClass('active');
        $(this).toggleClass('burger-active');
    });

    // TODO Add functionality for the mobile menu open
    $('.header .genesis-nav-menu > ul > .menu-item-has-children').on('click', function () {
        if ($('.header').hasClass('header-mobile')) {
            $(this).toggleClass('open').children().last().slideToggle(150);
        } else {
            $(this).toggleClass('open');
        }
    });

    $('.header .genesis-nav-menu > ul > .menu-item-has-children .menu-item-has-children').on('click', function (event) {
        event.stopPropagation();
        if ($('.header').hasClass('header-mobile')) {
            $(this).toggleClass('open').children().last().slideToggle(150);
        } else {
            $(this).toggleClass('open');
        }
    });

    // TODO Header active class, CTA on mobile and btn up fixed elements
    let lastScrollTop = 0;

    function menuFixed() {
        // Header Active Class
        if ($(window).scrollTop() > 20) {
            $('.header').addClass('header-active');
        } else {
            $('.header').removeClass('header-active');
        }
        // CTA on mobile show/hide
        let st = $(this).scrollTop();
        let header = $('header.header');
        if (header.hasClass('header-mobile')) {
            if ($(window).scrollTop() > 350) {
                if (st >= lastScrollTop) {
                    header.addClass('header-scroll');
                } else {
                    header.removeClass('header-scroll')
                }
            } else {
                header.removeClass('header-scroll')
            }
            lastScrollTop = st;
        }
        // Btn Up Active Show/Hide
        if ($(this).scrollTop() > 500) {
            $('#scrollToTop').addClass('btn-up-active');
        } else {
            $('#scrollToTop').removeClass('btn-up-active');
        }
    }

    $(window).bind('scroll', menuFixed);

    // TODO scroll body to 0px on click
    $('#scrollToTop').on('click', function (event) {
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0
        }, 700);
        $(this).removeClass('btn-up-active');
    });

    // TODO Modal

    $('.open-hd-modal').click(function () {
        var hdModalTitle = $(this).data('hd-modal-title');
        var hdModalContentType = $(this).data('hd-modal-content-type');
        var hdModalContent = $(this).data('hd-modal-content');

        if (hdModalContentType === 'youtube') {
            var hdModalHTML = '<div class="hd-modal"><h2 class="hd-modal-title">' + hdModalTitle + '</h2><iframe class="hd-modal-iframe" src="https://www.youtube.com/embed/' + hdModalContent + '"></iframe><div class="hd-modal-close">X</div></div>';
        } else if (hdModalContentType === 'wistia') {
            var hdModalHTML = '<div class="hd-modal"><h2 class="hd-modal-title">' + hdModalTitle + '</h2><div class="hd-modal-wistia">' +
                '<script src="https://fast.wistia.com/embed/medias/' + hdModalContent + '.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%"><div class="wistia_embed wistia_async_' + hdModalContent + ' seo=false videoFoam=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%"><img src="https://fast.wistia.com/embed/medias/' + hdModalContent + '/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%" alt="Wistia Video Image" title="Wistia Video Image" aria-hidden="true" onload="this.parentNode.style.opacity=1"></div></div></div></div>' +
                '<div class="hd-modal-close">X</div></div>';
        } else {
            var hdModalHTML = '<div class="hd-modal"><h2 class="hd-modal-title">' + hdModalTitle + '</h2>' + hdModalContent + '<div class="hd-modal-close">X</div></div>';
        }

        $('#hd-modal-container').append(hdModalHTML);
        $('#hd-modal-container').fadeIn();
    });

    $(document).on('click', '.hd-modal-close', function () {
        $('#hd-modal-container').fadeOut(function () {
            $(this).empty();
        });
    });

    $('#hd-modal-container').click(function (e) {
        if (!$(e.target).closest('.hd-modal').length) {
            $('#hd-modal-container').fadeOut(function () {
                $(this).empty();
            });
        }
    });

    var findOfficeBorders = function () {
        var box = $(".section-offices .office-list");
        var boxOffset = box.offset();
        $(".section-offices .office").each(function () {
            var elem = $(this);
            elem.removeClass('has-bottom').removeClass('has-left');

            if (Math.abs(elem.offset().top + elem.height() - (boxOffset.top + box.height())) > elem.height())
                $(this).addClass('has-bottom');
            if (elem.offset().left - boxOffset.left > 10)
                $(this).addClass('has-left');
        });
    };
    findOfficeBorders();
    $(window).resize(findOfficeBorders);

    $('.more-js').on('click', function () {
        $('.section-case-result-page-inner').find('.hide').first().removeClass('hide');
    });

    var liCount = $('#menu-item-1672152 ul li').length;

    if (liCount > 10) {
        $('#menu-item-1672152').addClass('two-row-menu');
    }

    var list = $(".cstm-flex .show-more-less");
    var numToShow = 9;
    var button = $("#view-more-btn");
    var buttonless = $("#view-less-btn");
    var numInList = list.length;
    list.hide();
    if (numInList > numToShow) {
        button.show();
        buttonless.hide();
    }
    list.slice(0, numToShow).show();

    button.click(function () {
        var showing = list.filter(':visible').length;
        list.slice(showing - 1, showing + numToShow).fadeIn();
        var nowShowing = list.filter(':visible').length;
        if (nowShowing >= numInList) {
            button.hide();
            buttonless.show();
        }
    });
    buttonless.click(function () {
        list.hide();
        list.slice(0, numToShow).show();
        button.show();
        buttonless.hide();
    });

})(jQuery);