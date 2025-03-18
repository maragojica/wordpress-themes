<?php

/**
 * Template Name: Flexible Page
 * Description: Page template flexible page.
 *
 */

get_header();

?>
    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'flexible-page' );

    endwhile; // End of the loop.
    ?>
<?php
get_footer();
?>