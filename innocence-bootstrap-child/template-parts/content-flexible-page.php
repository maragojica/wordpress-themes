<?php
/**
 * The template for displaying content in the page-flexible.php template.
 *
 */

?>
<?php if (have_rows('modules_flexible')): ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php while(have_rows('modules_flexible')): the_row();
        //echo '<br>--'.get_row_layout().'--<br>';
        get_template_part('template-parts/template-flexible/content-block', get_row_layout());
    endwhile; ?>
</article>
<?php endif; ?>
<!-- #post-## -->