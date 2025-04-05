<?php

/*
 * Template name: Landing
 */




remove_action('genesis_loop', 'genesis_do_loop', 10);
remove_action('genesis_before_loop', 'custom_do_breadcrumbs', 5);
add_action('genesis_after_header', 'custom_front_page_after_header', 10);
add_action('genesis_loop', 'custom_content', 10);
add_filter('genesis_pre_get_option_site_layout', '__genesis_return_full_width_content');

function custom_front_page_after_header() { 

    $id = get_the_id();
    $headline = get_field('hero_headLine', $id);
    $subheadline = get_field('hero_subheadline', $id);
    $cta_text = get_field('hero_cta_button_text', $id);
    $cta_link = get_field('hero_cta_button_link', $id);
?>

    <div class="homepage-hero-wrap">
        <div class="container">
            <div class="homepage-hero">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="left-content">
                            <div class="hero-description">
                                <h1><?php echo $headline  ?></h1>
                                <p class="subhead"><?php echo $subheadline ?></p>
                                <p><a href="<?php echo $cta_link ?>" class="newbuttom"><?php echo $cta_text ?></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img class="z-logo" src="<?= CHILD_URL ?>/assets/app/img/logo/z-logo.png"
             alt="Zinda Law Logo"
             title="Zinda Law Logo" width="68" height="60">
        </div>
    </div>

    <?php
}

function custom_content()
{
    the_content();
    $phone_no = $_GET['phone'];;

// 👇 format phone number
    $format_phone =
        substr($phone_no, -10, -7) . "-" .
        substr($phone_no, -7, -4) . "-" .
        substr($phone_no, -4);
    ?>

    <?php
}


genesis();