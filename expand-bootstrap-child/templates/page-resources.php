<?php

/**
 * Template Name: Resources Page
 * Description: Page template resources page.
 *
 */

get_header();

?>
    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'resources' );

    endwhile; // End of the loop.
    ?>
<?php
get_footer();
?>