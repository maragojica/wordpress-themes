<?php

// Head Scripts and Styles (Google Analytics etc)
add_action('wp_head', 'custom_head_scripts_and_styles');

function custom_head_scripts_and_styles(){ ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.3/plyr.css" />  
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.defer=true;j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-N9KZRN');</script>

    <script type='text/javascript' src='https://js.hs-scripts.com/21715417.js?integration=WordPress&#038;ver=10.1.16' async defer id='hs-script-loader'></script>

    <script>
        function imageinit() {
            var imgDefer = document.getElementsByTagName('img');
            for (var i=0; i<imgDefer.length; i++) {
                if(imgDefer[i].getAttribute('data-srcset')) {
                    imgDefer[i].setAttribute('srcset',imgDefer[i].getAttribute('data-srcset'));
                } } }
        window.onload = imageinit;
    </script>

    <script type="text/javascript">
        window.cclhook = {
            onChatOpen: function () {
                jQuery(function($) {
                    // Conversion Script
                    $.getScript( "//www.googleadservices.com/pagead/conversion_async.js", function() {
                        setTimeout(function() {
                            window.google_trackConversion({
                                google_conversion_id: 987391129,
                                google_conversion_language: "en",
                                google_conversion_format: "2",
                                google_conversion_color: "ffffff",
                                google_conversion_label: "obhaCOe4jwUQmcnp1gM",
                                google_conversion_value: 0,
                                google_remarketing_only: false
                            });

                            if(window.console !== "undefined" && window.console.log !== "undefined") {
                                window.console.log("Asynchronously Google Conversion Tracked");
                            };
                        }, 250);
                    });
                });
            }
        };
    </script>

    <?php
}

add_action('genesis_before', 'add_gtag_noscript');

// For GTM noscript
function add_gtag_noscript() {
    ?>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N9KZRN"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <?php
}


add_action('wp_head', 'qa_crawler_meta_tags');
function qa_crawler_meta_tags(){
    global $post;
    global $hc_settings;
    $location = "";
    $parent_location = "";
    $terms = get_the_terms( $post->ID, $hc_settings['location_taxonomy'] ); // get page location term (city)
    if($terms && is_array($terms)){
        $location = current($terms)->name;
    }
    else{
        $terms = get_the_terms( $post->ID, $hc_settings['state_taxonomy'] ); // get page location term (state)
        if($terms && is_array($terms)){
            $location = current($terms)->name;
        }
    }
    $pa = get_post_meta($post->ID, $hc_settings['location_widget_title'], true);
    $parent_pa = "";
    if($post->post_parent) {
        $parent_terms = get_the_terms($post->post_parent, $hc_settings['location_taxonomy']);
        if ($parent_terms && is_array($parent_terms)) {
            $parent_location = current($parent_terms)->name;
        }
        else{
            $parent_terms = get_the_terms($post->post_parent, $hc_settings['state_taxonomy']);
            if ($parent_terms && is_array($parent_terms)) {
                $parent_location = current($parent_terms)->name;
            }
        }
        $parent_pa = get_post_meta($post->post_parent, $hc_settings['location_widget_title'], true);
    }

    if($location){
     ?>
        <meta name="qa-crawler:location" content="<?php echo $location;?>">
     <?php
    }
    if($pa){
        ?>
        <meta name="qa-crawler:practice-area" content="<?php echo $pa; ?>">
        <?php
    }
    if($parent_location){
        ?>
        <meta name="qa-crawler:parent-location" content="<?php echo $parent_location; ?>">
        <?php
    }
    if($parent_pa){
        ?>
        <meta name="qa-crawler:parent-practice-area" content="<?php echo $parent_pa; ?>">
        <?php
    }
}