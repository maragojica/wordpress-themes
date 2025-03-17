<?php if (have_rows('flexible_content_resources')): ?>   
    <?php while(have_rows('flexible_content_resources')): the_row();
        get_template_part('template-parts/template-flexible/content', get_row_layout());
    endwhile; ?>    
<?php endif; ?>