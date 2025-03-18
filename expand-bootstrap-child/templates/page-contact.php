<?php

/**
 * Template Name: Contact Page
 * Description: Page template contact page.
 *
 */

get_header();

?>
    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'contact' );

    endwhile; // End of the loop.
    ?>
<?php
get_footer();
?>