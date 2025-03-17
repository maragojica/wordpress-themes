<?php 
  $show_logos_carrousel = get_sub_field('show_logos_carrousel');
if( $show_logos_carrousel ): 
if (have_rows('logos')) :          
    while (have_rows('logos')) : the_row();
    $section_id = get_sub_field('section_id');
    $bg_graphic  = get_sub_field('section_bg_image');
    $bg_color = get_sub_field('section_bg_color');
    $headline = get_sub_field('heading');
    $subheadline = get_sub_field('subheading'); 
    $description = get_sub_field('description');     
    $text_color = get_sub_field('text_color');  
    $shape = get_sub_field('shape');   
    $shape_position  = get_sub_field('shape_position');
    $margin_top_desktop = get_sub_field('margin_top_desktop'); 
    $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');
    $margin_top_mobile = get_sub_field('margin_top_mobile'); 
    $margin_bottom_mobile = get_sub_field('margin_bottom_mobile');   ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-logo-carrousel p-t0 p-b0 w-margin <?php if(!$margin_top_desktop): echo ' m-t0'; endif; if(!$margin_bottom_desktop): echo ' m-b0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>" <?php if($bg_color && !empty($bg_graphic)){ ?>style="background: linear-gradient(<?php echo $bg_color;?>, <?php echo $bg_color;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php } else{ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>            
    <div class="container">    
        <div class="row center-xs">
          <div class="col-xs-12 col-lg-8 text-center">
            <?php if ($subheadline) : ?>
                    <div class="subheadline text-uppercase m-b1 cl-orange wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                    <?php endif; ?>
                    <?php if ($headline) : ?>
                    <h3 class="<?php echo $text_color;?> text-uppercase mt-10px mb-10px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s"><?php echo $headline; ?></h2>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="dp-1 m-b30 <?php echo $text_color;?> wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                <?php endif; ?> 
          </div>           
        </div>     
        <div class="row m-t3 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.4s">
        <div class="col-xs-12">
        <div class="glider logo-glider">
            <?php
            if (have_rows('logos_list')):
                while (have_rows('logos_list')): the_row();
                    $photo = get_sub_field('logo');
					$link = get_sub_field('link'); ?>
                <div class="slide-in-right slide slide">
                <?php if(!empty($photo)): ?>
                    <?php  if($link) {
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                        <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100"><?php } ?>
                        <img class="logo-partner" src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" />
                    <?php if($link) { ?>
                        </a>
                    <?php } ?>
                <?php endif; ?>
                </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>       
    </div>
        </div>  
        <?php if ( !empty($shape)) :  ?>                
                <img class="shape-services fluid-img <?php if($shape_position): echo $shape_position['value']; endif;?>" src="<?php echo esc_url($shape['url']); ?>" alt="<?php echo esc_attr($shape['alt']); ?>" width="208" height="22" />                            
            <?php endif; ?>        
    </div> 
</section>
<?php              
    endwhile;
endif; 
endif; ?>   
