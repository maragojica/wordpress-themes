<?php

/**
 * Template Name: Services Page
 * Description: Page template services page.
 *
 */

get_header();

?>
    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'services' );

    endwhile; // End of the loop.
    ?>
<?php
get_footer();
?>