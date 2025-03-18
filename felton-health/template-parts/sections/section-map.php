<?php
if (have_rows('info_map')) {
    while (have_rows('info_map')) {
    the_row(); 
    $section_id = get_sub_field('section_id');            
    $map_shortcode = get_sub_field('map_shortcode');
    $padding_size = get_sub_field('padding_size'); 
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');   
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-info-map <?php if($padding_size): echo $padding_size['value']; endif; ?> <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?> wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.2s">            
      <?php if( $map_shortcode ): ?>
        <div class="map w-100 h-100">
            <?php echo  $map_shortcode; ?>
      </div>    
      <?php endif; ?>
    </section>         
<?php }
} ?>