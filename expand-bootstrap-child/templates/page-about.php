<?php

/**
 * Template Name: About Page
 * Description: Page template about page.
 *
 */

get_header();

?>
    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'about' );

    endwhile; // End of the loop.
    ?>
<?php
get_footer();
?>