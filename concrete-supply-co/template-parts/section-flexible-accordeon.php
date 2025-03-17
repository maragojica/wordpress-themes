<?php if (have_rows('flexible_accordeon_info')): ?>   
    <?php while(have_rows('flexible_accordeon_info')): the_row();
        get_template_part('template-parts/template-flexible/content', get_row_layout());
    endwhile; ?>    
<?php endif; ?>