<?php

add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = "Domain News And Media: " . single_cat_title('', false);
    } elseif (is_tag()) {
        $title = "Tag: " . single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = sprintf(__('%1$s'), single_term_title('', false));
    }
    return $title;
});

//internal hero
add_action('genesis_after_header', 'custom_inner_page_after_header', 10);
function custom_inner_page_after_header()
{

    if (is_page_template('front-page.php') || is_page_template('Attorney-Profile.php') || is_page_template('podcast-page.php')) return "";

    if ((is_single() || is_page())) {
        remove_action('genesis_entry_header', 'genesis_do_post_format_image', 4);
        remove_action('genesis_entry_header', 'genesis_entry_header_markup_open', 5);
        remove_action('genesis_entry_header', 'genesis_do_post_title', 10);
        remove_action('genesis_entry_header', 'genesis_do_post_info', 12);
        remove_action('genesis_entry_header', 'genesis_entry_header_markup_close', 15);

        $page = '';

        if (is_paged()) {
            $paged = get_query_var('paged') ?: 0;

            if ($paged) {
                $page = ' - Page ' . $paged;
            }
        }

        ?>

        <div class="internal-hero-image" style="background-image: url(<?php

        if (get_field('hero')) {
            echo the_field('hero'); // Crate in custom fields - hero (field for pages)
        } else {
            if (wp_is_mobile()) {
                echo CHILD_URL . '/assets/app/img/background/homepage-hero-bg-mobile.jpg';
            } else {
                echo CHILD_URL . '/assets/app/img/background/homepage-hero-bg.jpg';
            }
        }

        ?>);">
            <div class="container">
                <?php

                ob_start();

                genesis_entry_header_markup_open();
                genesis_do_post_title();
                genesis_entry_header_markup_close();

                $heading = ob_get_contents();
                ob_clean();
                ?>
                <div class="inner-internal-hero">
                    <?php if (wp_is_mobile()) { ?>
                        <img data-powa-ignore="true" src="<?= CHILD_URL ?>/assets/app/img/images/new-zinda-attorney-hero-mobile-5.png"
                             alt="NATIONWIDE PERSONAL INJURY LAWYERS"
                             title="NATIONWIDE PERSONAL INJURY LAWYERS" width="930" height="300">
                    <?php } else { ?>
                        <img data-powa-ignore="true" src="<?= CHILD_URL ?>/assets/app/img/images/new-zinda-attorney-image-7.png"
                             alt="NATIONWIDE PERSONAL INJURY LAWYERS"
                             title="NATIONWIDE PERSONAL INJURY LAWYERS" width="930" height="300">
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php

    } else {

        remove_action('genesis_before_loop', 'genesis_do_cpt_archive_title_description', 10);
        remove_action('genesis_before_loop', 'genesis_do_date_archive_title', 10);
        remove_action('genesis_before_loop', 'genesis_do_blog_template_heading', 10);
        remove_action('genesis_before_loop', 'genesis_do_posts_page_heading', 10);
        remove_action('genesis_before_loop', 'genesis_do_search_title', 10);

        ?>

        <div class="internal-hero-image" style="background-image: url(<?php

        if (get_field('hero')) {
            echo the_field('hero');
        } else {
            if (wp_is_mobile()) {
                echo CHILD_URL . '/assets/app/img/background/homepage-hero-bg-mobile.jpg';
            } else {
                echo CHILD_URL . '/assets/app/img/background/homepage-hero-bg.jpg';
            }
        }

        ?>);">
            <div class="container">

                <?php $page = '';

                if (is_paged()) {
                    $paged = get_query_var('paged') ?: 0;

                    if ($paged) {
                        $page = ' - Page ' . $paged;
                    }
                }

                if (is_404()) {
                    $heading = "Page Not Found";
                } else {
                    $heading = "Blog";
                }

                if (is_archive()) {
                    $heading = get_the_archive_title();
                }

                if (is_search()) {
                    $heading = "You searched for: " . get_search_query();
                }

                if ($page && $heading) {
                    $heading = $heading . $page;
                }

                ?>
                <div class="inner-internal-hero">
                    <img src="<?= CHILD_URL ?>/assets/app/img/images/new-zinda-attorney-image-7.png"
                         alt="NATIONWIDE PERSONAL INJURY LAWYERS"
                         title="NATIONWIDE PERSONAL INJURY LAWYERS" width="930" height="300">
                </div>
            </div>
        </div>

        <?php

    }
}