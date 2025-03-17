<?php
if (have_rows('bg_text_banner')) {
    while (have_rows('bg_text_banner')) {
    the_row(); 
    $section_id = get_sub_field('section_id'); 
    $bg_color_section = get_sub_field('bg_color');
    $bg_text = get_sub_field('bg_text');
    $headline = get_sub_field('heading'); 
    $subheadline = get_sub_field('subheading');        
    $description = get_sub_field('description');
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');       
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-banner-bg-text <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($bg_color_section): ?>style="background-color: <?php echo $bg_color_section;?>"<?php endif; ?>>
        <?php if ( !empty($bg_text)) : 
                $srcset = wp_get_attachment_image_srcset($bg_text['ID']);
                $sizes = wp_get_attachment_image_sizes($bg_text['ID'], 'full'); ?>                
            <img class="img-bg-text img-fluid wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.3s" src="<?php echo esc_url($bg_text['url']); ?>" alt="<?php echo esc_attr($bg_text['alt']); ?>" height="183" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
        <?php endif; ?>   
        <div class="container">
                <div class="row justify-center middle-xs">
                    <div class="col-xs-12 col-lg-12">
                    <div class="box-banner text-center w-100 wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.1s"> 
                        <?php if ($headline) : ?>
                            <h2 class="cl-white heading-sub mt-0 mb-0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                        <?php endif; ?>                                                                                                  
                    </div>
                    </div>    
                </div>                                    
            </div>             
    </section>         
<?php }
} ?>