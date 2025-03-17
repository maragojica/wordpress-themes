<?php 
if (have_rows('info_text_two_columns_colored')) :          
    while (have_rows('info_text_two_columns_colored')) : the_row();
    $section_id = get_sub_field('section_id');
    $bg_graphic  = get_sub_field('section_bg_image');
    $bg_color = get_sub_field('section_bg_color');
    $headline = get_sub_field('heading');
    $subheadline = get_sub_field('subheading'); 
    $description = get_sub_field('description');      
    $button_list = get_sub_field('button_list');   
    $margin_top_desktop = get_sub_field('margin_top_desktop'); 
    $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');
    $margin_top_mobile = get_sub_field('margin_top_mobile'); 
    $margin_bottom_mobile = get_sub_field('margin_bottom_mobile');   ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-info-text w-margin p-t0 p-b0 <?php if(!$margin_top_desktop): echo ' m-t0'; endif; if(!$margin_bottom_desktop): echo ' m-b0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>">            
    <div class="container"> 
        <div class="box-colored" <?php if($bg_color){ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>
        <?php if(!empty($bg_graphic)): 
                $srcset = wp_get_attachment_image_srcset($bg_graphic['ID']);
                $sizes = wp_get_attachment_image_sizes($bg_graphic['ID'], 'full'); ?>                
                <img class="shape-bg img-fluid w-100 h-100 fit-cover-center" src="<?php echo esc_url($bg_graphic['url']); ?>" alt="<?php echo esc_attr($bg_graphic['alt']); ?>" height="435" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
            <?php endif; ?> 
        <div class="row shape-container">
            <div class="col-xs-12 col-lg-6">
                <?php if ($subheadline) : ?>
                        <div class="subheadline text-uppercase m-b1 cl-white wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                        <?php endif; ?>
                        <?php if ($headline) : ?>
                        <h2 class="cl-white mt-10px m-b0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    <?php endif; ?>
            </div>
                <div class="col-xs-12 col-lg-6">
                
                    <?php if ($description) : ?>
                        <div class="dp-1 m-b30 cl-white wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                <?php endif; ?> 
                <?php if (have_rows('button_list')) {   ?>
                            <div class="button-list start-xs">
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
                </div>
            </div> 
        </div>  
    </div> 
</section>
<?php              
    endwhile;
endif; ?>   
