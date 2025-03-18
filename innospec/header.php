<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="5td-NWU3vO1PT05ieIeu-M2i4Rue643aDC0DgVIQS4Q" />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

    
    <link href="<?php bloginfo('template_url'); ?>/assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/assets/fontawesome/css/solid.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css?v=5">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

    <?php wp_head(); ?>

    <!-- lightbox -->
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/assets/css/simple-lightbox.css" />
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/custom.js?v=2"></script>
    <script type="text/JavaScript">
        jQuery(window).on("load",()=>{
            var w;
            w = jQuery(window).width();
            if(w <= 1200){
                jQuery('#wrap-social-media-inner').appendTo('#wrap-socialmedia-movil');
            }
        });
    </script>
    <!-- end lightbox -->

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MT69JKR');</script>
    <!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-69875002-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-69875002-1');
    </script>
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MT69JKR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <?php
    /*
     * Retrieve this value with:
     */
    $top_offer_options = get_option( 'top_offer_option_name' ); // Array of All Options
    $publish_0 = $top_offer_options['publish_0']; // Publish
    $title_1 = $top_offer_options['title_1']; // Title
    $content_2 = $top_offer_options['content_2']; // Content

    ?>
    <?php if($publish_0 == "yes"): ?>
    <section id="offer" class="alert alert-warning alert-dismissible fade show" role="alert">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="offer-title"><?php echo $title_1; ?></div>
                    <div class="offer-content"><?php echo htmlspecialchars_decode($content_2); ?></div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 ac-resp">
                    <div id="logo">
                        <a href="<?php echo get_site_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/Innospec.svg" alt="logo" width="188"></a>
                        <a href="javascript:void(0)" id="bar-menu"><i class="fas fa-bars"></i></a>
                    </div>
                </div>
                <div class="col-lg-9 text-right">
                    <div id="wrap-header-top" style="height: 40px;">

                        <ul class="wrap-stock-prices">
                            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('stock-prices') ) : ?> <?php endif; ?>
                        </ul>

                        <div class="wrap-main-menu">
                            <img id="img-triangle" src="<?php bloginfo('template_url') ?>/img/inn-menu-left-bg.jpg" alt="image used as background">
                            
                            <nav id="menu-top" class="menu-top-menu-container">
                                <?php $menu = array(
                                    'theme_location' => 'main-menu',
                                    'container' => false,
                                    'menu_class'=>  'menu list-horizontal',
                                    'fallback_cb' => 'wp_page_menu',
                                );
                                wp_nav_menu( $menu ); ?>
                                <form id="search" action="<?php echo get_site_url() ?>/" style="display:none;">
                                    <input type="text" name="s">
                                    <img id="btn-times" class="cursor" src="<?php bloginfo('template_url') ?>/img/icon-times-search.jpg" alt="search">
                                </form>
                                <div class="wrap-input">
                                    <img class="cursor" id="btn-lupa" src="<?php bloginfo('template_url'); ?>/img/box-input-search.jpg" alt="search">
                                    <script type="text/javascript">
                                        jQuery(document).ready(function(){
                                            jQuery('#btn-lupa').click(function(){
                                                jQuery('#wrap-header-top #search').toggle();
                                                jQuery('#wrap-header-top #search input').focus();
                                            });
                                            jQuery('#btn-times').click(function(){
                                                jQuery('#wrap-header-top #search').toggle();
                                            });
                                        });
                                    </script>
                                </div>
                            </nav>

                        </div>
                    </div>
                    <div id="wrap-header-middle">
                        <?php $menu = array(
                            'theme_location' => 'products-menu',
                            'container' => false,
                            'menu_class'=>  'menu list-horizontal',
                            'fallback_cb' => 'wp_page_menu',
                        );
                        wp_nav_menu( $menu ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="wrap-header-bottom">
            <div class="container">
                <?php
                    wp_nav_menu( array(
                      'menu'     => 'Main Menu',
                      'sub_menu' => true
                    ));
                ?>
            </div>
        </div>
    </section>
