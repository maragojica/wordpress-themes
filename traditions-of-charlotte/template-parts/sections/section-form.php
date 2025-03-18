<?php 
if (have_rows('section_form')) :          
    while (have_rows('section_form')) : the_row();
    
    $section_id = get_sub_field('section_id');
    $bg_color_section = get_sub_field('bg_color');     
    $headline = get_sub_field('heading');            
    $description = get_sub_field('description');
    $form_shortcode = get_sub_field('form_shortcode');    
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');   
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
 <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-form <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($bg_color_section): ?>style="background-color: <?php echo $bg_color_section;?>"<?php endif; ?>>
    <div class="container">
        <div class="row middle-xs justify-center">      
            <div class="col-xs-12 col-lg-6">
            <?php if ($headline) : ?>
                            <h2 class="cl-white text-center m-t0 m-b30 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <div class="dp-1 text-center m-b30 cl-white wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                            <?php endif; ?> 
                        <?php if (have_rows('button_list')) {   ?>
                                <div class="button-list center-xs start-lg">
                                    <?php while (have_rows('button_list')) {
                                    the_row(); ?>
                                    <?php $cta = get_sub_field('button_cta'); $button_color = get_sub_field('button_color');
                                        if( $cta ):
                                            $link_url = $cta['url'];
                                            $link_title = $cta['title'];
                                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                                    
                                        <a tabindex="0" class="btn <?php echo $button_color;?> hover-slide-right wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>                             
                                        <?php endif; ?>
                                    <?php } ?>
                                </div>
                            <?php } ?>   
                            <?php if(get_sub_field('add_form')): ?>
                                <?php if($form_shortcode): ?>
                                    <div class="gravity-form gravity-join wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $form_shortcode;?></div>
                                <?php endif; ?> 
                            <?php endif; ?> 
            </div>  
        </div>
    </div>            
</section>
<?php              
    endwhile;
endif; ?>