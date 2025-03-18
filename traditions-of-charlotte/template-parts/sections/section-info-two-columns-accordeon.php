<?php 
if (have_rows('info_text_two_columns_accordeon')) :          
    while (have_rows('info_text_two_columns_accordeon')) : the_row();
    $section_id = get_sub_field('section_id');
    $bg_graphic  = get_sub_field('section_bg_image');
    $bg_color = get_sub_field('section_bg_color');
    $text_color = get_sub_field('text_color');
    $headline = get_sub_field('heading');  
    $description = get_sub_field('description');      
    $button_list = get_sub_field('button_list');   
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');      
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');   ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-info-text <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($bg_color && !empty($bg_graphic)){ ?>style="background: linear-gradient(<?php echo $bg_color;?>, <?php echo $bg_color;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php } else{ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>            
    <div class="container">    
        <div class="row">
        <div class="col-xs-12 col-lg-6 pe-lg-5">           
                    <?php if ($headline) : ?>
                    <h2 class="<?php echo $text_color['value'];?> m-t0 m-b0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="dp-1 m-b30 <?php echo $text_color['value'];?> wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
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
            <div class="col-xs-12 col-lg-6">
            <?php $i = 1; if ( have_rows( 'accordeon_list' ) ):  ?>
                <div class="accordeon-content m-t2 m-lg-t0 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s">
                <?php while( have_rows('accordeon_list') ): the_row(); 
                  $title = get_sub_field('title'); 
                  $text = get_sub_field('text'); ?>
                  <div class="box-accordeon">
                  <?php if($title): ?>
                    <button class="accordion cl-forest-green <?php if($i == 1): ?> active <?php endif;?>" title="Accordeon"><?php echo $title; ?></button>
                  <?php endif; ?>
                  <div class="panel" <?php if($i == 1): ?> style="max-height: max-content;" <?php endif;?>>
                  <?php if ($text) : ?>
                        <div class="dp-1 cl-forest-green"><?php echo wp_kses_post($text); ?></div>
                    <?php endif; ?>   
                  </div>
                  </div> 
                 <?php $i++; endwhile; ?>
                </div>
            <?php endif; ?>    
            
              
            </div>
        </div>           
    </div> 
</section>
<?php              
    endwhile;
endif; ?>   
