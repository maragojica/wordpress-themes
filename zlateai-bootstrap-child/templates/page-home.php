<?php

/**
 * Template Name: Home Page
 * Description: Page template home page.
 *
 */

get_header();

?>
    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'home' );

    endwhile; // End of the loop.
    ?>
<?php
get_footer();
?>