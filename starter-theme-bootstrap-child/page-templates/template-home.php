<?php

/**

 * Template Name: New Home Page 2024

 *

 * Displays the Home page with Parallax effects.

 *

 */

?>



<?php get_header(); ?>
   
        
<?php

    while ( have_posts() ) : the_post();  ?>


  
        <?php get_template_part( 'template-parts/contents/content', 'home' ); ?>
      


    <?php endwhile; // End of the loop.

    ?>





<?php get_footer(); ?>

