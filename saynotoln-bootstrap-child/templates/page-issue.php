<?php

/**
 * Template Name: Issue Page
 * Description: Page template issue page.
 *
 */

get_header();

?>
    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'issue' );

    endwhile; // End of the loop.
    ?>
<?php
get_footer();
?>