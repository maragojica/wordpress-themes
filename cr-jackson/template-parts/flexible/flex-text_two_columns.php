<?php 
if (have_rows('info_text_two_columns')) :          
    while (have_rows('info_text_two_columns')) : the_row();
    $section_id = get_sub_field('section_id');
    $bg_graphic  = get_sub_field('section_bg_image');
    $bg_color = get_sub_field('section_bg_color');
    $headline = get_sub_field('heading');
    $subheadline = get_sub_field('subheading'); 
    $description = get_sub_field('description');     
    $text_color = get_sub_field('text_color');  
    $cta = get_sub_field('button_cta');   
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');      
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');   ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-info-text flex-info-text <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($bg_color && !empty($bg_graphic)){ ?>style="background: linear-gradient(<?php echo $bg_color;?>, <?php echo $bg_color;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php } else{ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>            
    <div class="container">    
        <div class="row">
        <div class="col-xs-12 col-lg-6">
            <?php if ($subheadline) : ?>
                    <div class="subheadline text-uppercase m-b1 cl-orange wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                    <?php endif; ?>
                    <?php if ($headline) : ?>
                    <h3 class="<?php echo $text_color;?> text-uppercase mt-10px mb-10px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s"><?php echo $headline; ?></h2>
                <?php endif; ?>
          </div>
            <div class="col-xs-12 col-lg-6">            
                <?php if ($description) : ?>
                    <div class="dp-1 m-b30 <?php echo $text_color;?> wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                <?php endif; ?> 
                <?php if( $cta ):
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                            
                        <a tabindex="0" class="btn cta-btn wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                    <?php endif; ?>
            </div>
        </div>           
    </div> 
</section>
<?php              
    endwhile;
endif; ?>   
