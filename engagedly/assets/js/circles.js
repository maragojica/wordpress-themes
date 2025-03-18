$(document).ready(function () {

    //Remove the first circle from the blogs page
    /*var circles = $('#section-blog-three-columns .bg-elipse');

    if (circles.length > 1)
        $(circles[0]).hide();*/

    /*
    * Add circles from the Documentations Page
    */
    var documentationsSection = $('.documentations');

    $(documentationsSection[0]).prepend('<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-35 left-20 top10-percent z-index-0">');
    $(documentationsSection[documentationsSection.length - 1]).prepend('<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse width-30 right-15 bottom-15 z-index-0">');

    /*
    * Add Figures on Offers Sections of Uses Cases Single
    */
    var offersUsesSection = $('.use-cases');
    var offersUsesSectionRight = $('.use-cases.product-grid-two-columns-right');
    var offersUsesSectionLeft = $('.use-cases.product-grid-two-columns-left');

    //Add Circle to the first section
    $(offersUsesSection[0]).prepend('<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse width-30 width-70-tb right-10 right-35-tb top-10 top-10-tb z-index-0">');
    //Add Circle to the last section
    $(offersUsesSectionRight[offersUsesSectionRight.length - 1]).prepend(
        '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse bg-elipse-tb-none width-30 left-5 top-10 z-index-0">' +
        '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse bg-elipse-smd-none width-50 right-20 bottom-5 z-index-0">'
    );

    //Add Figures to the Lefts Sections
    for (let i = 0; i < offersUsesSectionLeft.length - 1; i++){
        $(offersUsesSectionLeft[i]).prepend(
            '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/shapes/arrow-circle-left-1.png" class="bg-elipse bg-elipse-tb-none width-45 width-55-smd-1 width-65-smd-2 left-10 left-15-smd-1 top2 z-index-0">' +
            '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/shapes/arrow-right-1.png" class="bg-elipse bg-elipse-tb-none width-30 right-5 top-2 z-index-0">' +
            '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse bg-elipse-smd-none width-50 left-10 bottom-5 z-index-0">'
        );
    }

    //Add Figures to the Right Sections
    for (let i = 1; i < offersUsesSectionRight.length - 1; i++){
        $(offersUsesSectionRight[i]).prepend(
            '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/shapes/arrow-circle-right-1.png" class="bg-elipse bg-elipse-tb-none width-55 width-65-smd-2 right-15 right-30-smd-2 top15 z-index-0">' +
            '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse bg-elipse-smd-none width-70 right-35 bottom-10 z-index-0">'
        );
    }

    /*
    * Add Figures on Offers Sections of Industries Single
    */
    var offersIndustriesSection = $('.type-industries');
    var offersIndustriesSectionRight = $('.type-industries.product-grid-two-columns-right');
    var offersIndustriesSectionLeft = $('.type-industries.product-grid-two-columns-left');

    //Add Figures to the first section
   /* if (offersIndustriesSection.hasClass('section-grid-bg-video')) {
        $(offersIndustriesSection[0]).prepend(
            '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/shapes/arrow-center-2-gray.png" class="bg-elipse bg-elipse-tb-none width-45 width-55-smd-1 left15 top-5 top-15-smd-1 z-index-0">' +
            '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse width-30 width-70-tb right-10 right-35-tb top-10 top-10-tb z-index-0">'
        );
    } else {
        $(offersIndustriesSection[0]).prepend(
            '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/shapes/arrow-center-2.png" class="bg-elipse bg-elipse-tb-none width-45 width-55-smd-1 left15 top-5 top-15-smd-1 z-index-0">' +
            '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse width-30 width-70-tb right-10 right-35-tb top-10 top-10-tb z-index-0">'
        );
    }*/

    //Add Circle to the first section Left
   /* $(offersIndustriesSectionLeft[0]).prepend('<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse width-35 width-60-tb left-10 right-15-tb top2 top-unset-tb bottom2-tb z-index-0">');*/

    //Add Figures to the Right section
   /* for (let i = 1; i < offersIndustriesSectionRight.length; i++){
        if (offersIndustriesSection.hasClass('section-grid-bg-video')) {
            $(offersIndustriesSectionRight[i]).prepend(
                '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/shapes/arrow-center-3-gray.png" class="bg-elipse bg-elipse-tb-none width-40 left30 top0 z-index-0">' +
                '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse width-35 width-70-tb right-15 right-35-tb top2 top-unset-tb bottom0-tb z-index-0">'
            );
        } else {
            $(offersIndustriesSectionRight[i]).prepend(
                '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/shapes/arrow-center-3.png" class="bg-elipse bg-elipse-tb-none width-40 left30 top0 z-index-0">' +
                '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse width-35 width-70-tb right-15 right-35-tb top2 top-unset-tb bottom0-tb z-index-0">'
            );
        }
    }*/

    //Add Figures to the Left section
    /*for (let i = 1; i < offersIndustriesSectionLeft.length; i++){
        $(offersIndustriesSectionLeft[i]).prepend('<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/shapes/arrow-left-3.png" class="bg-elipse bg-elipse-tb-none width-40 left-3 bottom-5 z-index-0">');
    }*/

    /*
    * Add Circles to Blogs Sections on Industries Single Page
    */
    var blogsSectionsIndustry = $('.blog-page-sections.type-industries');

    $(blogsSectionsIndustry[0]).prepend(
        '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 right-15 top-10 z-index-0">' +
        '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-40 left-20 bottom-5 z-index-0">'
    );

    /*
    * Add Circles to Blogs Page
    */
    var blogsSectionPage = $('.blog-page-sections.blog');
    var blogsSectionRelease = $('.blog-page-sections.press-releases');
    var blogsSectionHome = $('.blog-page-sections.home');

    $(blogsSectionPage[blogsSectionPage.length - 1]).prepend('<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 right-10 bottom-10 z-index-0">');
    $(blogsSectionRelease[blogsSectionRelease.length - 1]).prepend('<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 right-10 bottom-10 z-index-0">');
    $(blogsSectionHome[blogsSectionHome.length - 1]).prepend(
        '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse width-30 right-20 top-10">' +
        '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse width-40 left-5 bottom-10">'
    );

    /*
    * Add Figures to What We Offer Page
    */
    var sectionsWhatOffers = $('.features');

    $(sectionsWhatOffers[0]).prepend(
        '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse bg-elipse-tb-none width-30 width-15-xxl-2 right-15 right-2-xxl-2 top-8 z-index-up-bottom-shape-banner">' +
        '<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/shapes/arrow-left-1.png" class="bg-elipse bg-elipse-tb-none width-55 width-15-xl width-20-xxl-2 width-70-smd-1 left-10 left-15-smd-1 left-5-xxl-2 top-10 top-15-smd-1 z-index-up-bottom-shape-banner">'
    );
    $(sectionsWhatOffers[1]).prepend('<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse bg-elipse-tb-none width-30 width-15-xl left-15 bottom-25 z-index-0">');
    $(sectionsWhatOffers[2]).prepend('<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/shapes/arrow-right-2.png" class="bg-elipse bg-elipse-tb-none width-50 width-25-xxl-2 width-60-smd-1 width-70-smd-2 right-10 right-2-xxl-2 right-15-smd-1 right-25-smd-2 bottom-10 bottom-15-smd-2 z-index-0">');
    $(sectionsWhatOffers[3]).prepend('<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/shapes/arrow-left-2.png" class="bg-elipse bg-elipse-tb-none width-50 width-30-xxl-2 left-20 bottom-15 z-index-0">');
    $(sectionsWhatOffers[5]).prepend('<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/shapes/arrow-center-1.png" class="bg-elipse bg-elipse-tb-none width-30 width-15-xxl-2 left40 left25-xxl-2 top-10 top-2-xl z-index-0">');
    $(sectionsWhatOffers[7]).prepend('<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/shapes/arrow-right-2.png" class="bg-elipse bg-elipse-tb-none width-50 width-15-xxl-2 width-60-smd-1 width-70-smd-2 right-10 right-2-xxl-2 right-15-smd-1 right-25-smd-2 bottom-10 bottom-15-smd-2 z-index-0">');
    $(sectionsWhatOffers[8]).prepend('<img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse bg-elipse-tb-none width-30 width-15-xxl-2 left-15 left-5-xxl-2 top5 z-index-0">');
});