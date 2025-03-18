<?php

/**
 * Template Name: Pledge Page
 * Description: Page template pledge page.
 *
 */

get_header();

?>
    <?php
    <?php if (have_rows('content_flexible')): ?>   
        <?php while(have_rows('content_flexible')): the_row();
            get_template_part('template-parts/content-flexible/content', get_row_layout());
        endwhile; ?>    
    <?php endif; ?>   
    ?>
<?php
get_footer();
?>