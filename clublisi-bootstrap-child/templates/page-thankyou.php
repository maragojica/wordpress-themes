<?php

/**
 * Template Name: Thank You Page
 * Description: Page template thank you page.
 *
 */

get_header();

?>
    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'thankyou' );

    endwhile; // End of the loop.
    ?>
<?php
get_footer();
?>