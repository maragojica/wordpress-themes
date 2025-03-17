<?php 
if (have_rows('featured')) :          
    while (have_rows('featured')) : the_row();
    $section_id = get_sub_field('section_id');      
    $margin_top_desktop = get_sub_field('margin_top_desktop'); 
    $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');
    $margin_top_mobile = get_sub_field('margin_top_mobile'); 
    $margin_bottom_mobile = get_sub_field('margin_bottom_mobile');   ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-featured p-t0 p-b0 w-margin <?php if(!$margin_top_desktop): echo ' m-t0'; endif; if(!$margin_bottom_desktop): echo ' m-b0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>" >            
   <?php  if (have_rows('featured_list')): $animation_delay = 0.1; ?>
  <div class="galery-recent-projects">
        <?php $i = 1;  while (have_rows('featured_list')): the_row(); 
            $image = get_sub_field('image');
            $title = get_sub_field('title'); 
            $subtitle = get_sub_field('subtitle'); 
            $cta = get_sub_field('cta'); 
            $duration = $animation_delay . 's'; ?>
            <div class="item-gallery-project relative wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.2s" <?php if(!empty($image)){ ?>style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.15) 0%, rgba(0, 0, 0, 0.15) 100%), url('<?php echo esc_url($image['url']); ?>') center center no-repeat;" <?php } ?>>
                <?php if( $cta ):
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>      
                    <a class="w-100 h-100"tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">  
                     <?php if($subtitle): ?>
                        <div class="subtitle-project"><?php echo $subtitle;?></div>
                     <?php endif; ?>  
                     <?php if($title): ?>
                        <div class="title-project"><?php echo $title;?></div>
                     <?php endif; ?>
                     <div class="simple-link link-white"tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">                         
                        <?php echo esc_html( $link_title ); ?>
                     </div>
                 </a>   
                 <?php endif; ?>       
            </div>               
        <?php $i++; $animation_delay += 0.10; endwhile; ?>
  </div>
  <?php endif; ?>
</section>
<?php              
    endwhile;
endif; ?>   
