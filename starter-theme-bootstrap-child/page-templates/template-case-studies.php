<?php

/**

 * Template Name: Case Studies
 
 */

?>



<?php get_header("inner"); ?>
<div class="content-line position-relative">


<?php

    while ( have_posts() ) : the_post();



        get_template_part( 'template-parts/contents/content', 'case-studies' );



    endwhile; // End of the loop.

    ?>

</div>

<?php get_footer(); ?>

