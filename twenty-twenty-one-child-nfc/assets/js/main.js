jQuery(function($) {

    // Add custom script here. Please backup the file before editing/modifying. Thanks
    
    // Run the script once the document is ready
    $(document).ready(function() {





        $(window).resize(function() {



        });



    });


    $(window).scroll(function() {
        if ($(this).scrollTop() > 52) {
            $('#masthead').addClass('header-scrolled');
        } else {
            $('#masthead').removeClass('header-scrolled');
        }
    });


});
