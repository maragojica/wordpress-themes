<?php
if (have_rows('map_info')) {
    while (have_rows('map_info')) {
    the_row(); 
    $section_id = get_sub_field('section_id');            
    $map_shortcode = get_sub_field('map_shortcode');
    $margin_top_desktop = get_sub_field('margin_top_desktop'); 
    $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');        
    $margin_top_mobile = get_sub_field('margin_top_mobile'); 
    $margin_bottom_mobile = get_sub_field('margin_bottom_mobile');  ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-info-map flex w-margin p-t0 p-b0 <?php if(!$margin_top_desktop): echo ' mt-0'; endif; if(!$margin_bottom_desktop): echo ' mb-0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?> wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.2s">            
      <?php if( $map_shortcode ): ?>
        <div class="map w-100 h-100">
            <?php echo  $map_shortcode; ?>
      </div>    
      <?php endif; ?>
    </section>         
<?php }
} ?>