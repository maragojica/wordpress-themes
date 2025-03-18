<?php

/**
 * Template Name: Praise Page
 * Description: Page template praise page.
 *
 */

get_header();

?>
    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'praise' );

    endwhile; // End of the loop.
    ?>
<?php
get_footer();
?>