<?php
/*Template name: Thankyou Page */
get_header('new');



   // print_r($_GET);

    if (isset($_GET['urlreferer']) && ($_GET['urlreferer']!='')) {

        // Create cookie 1 year
        $cookie_name = "first_time";
        $cookie_value = "filledform";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 360), "/"); // 86400 = 1 day


        $url = $_GET['urlreferer'];
        
        wp_safe_redirect( $url );
    

    }
   
get_footer('new');
