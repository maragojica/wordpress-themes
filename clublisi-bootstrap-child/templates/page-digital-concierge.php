<?php

/**
 * Template Name: Digital Concierge Page
 * Description: Page template Digital Concierge Page.
 *
 */

get_header();

?>
    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'digital-concierge' );

    endwhile; // End of the loop.
    ?>
<?php
get_footer();
?>