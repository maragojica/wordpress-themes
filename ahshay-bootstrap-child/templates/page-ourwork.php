<?php

/**
 * Template Name: Our Work Page
 * Description: Page template our work page.
 *
 */

get_header();

?>
    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'ourwork' );

    endwhile; // End of the loop.
    ?>
<?php
get_footer();
?>