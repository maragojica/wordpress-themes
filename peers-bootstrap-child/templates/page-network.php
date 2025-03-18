<?php

/**
 * Template Name: Our Network Page
 * Description: Page template network page.
 *
 */

get_header();

?>
    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'network' );

    endwhile; // End of the loop.
    ?>
<?php
get_footer();
?>