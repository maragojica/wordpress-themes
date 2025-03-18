<?php

/**
 * Template Name: FAQS Page
 * Description: Page template FAQS Page.
 *
 */

get_header();

?>
    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'faqs' );

    endwhile; // End of the loop.
    ?>
<?php
get_footer();
?>