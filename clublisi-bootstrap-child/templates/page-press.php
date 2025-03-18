<?php

/**
 * Template Name: Press Page
 * Description: Page template press page.
 *
 */

get_header();

?>
    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'press' );

    endwhile; // End of the loop.
    ?>
<?php
get_footer();
?>