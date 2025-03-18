<?php

/**
 * Template Name: Project Page
 * Description: Page template project page.
 *
 */

get_header();

?>
    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'project' );

    endwhile; // End of the loop.
    ?>
<?php
get_footer();
?>