<?php 
if (have_rows('boxes_section')) :          
    while (have_rows('boxes_section')) : the_row();
    $section_id = get_sub_field('section_id');   
    $bg_image = get_sub_field('bg_image');
    $bg_overlay = get_sub_field('bg_color');   
    $headline = get_sub_field('heading'); 
    $subheadline = get_sub_field('subheading');        
    $description = get_sub_field('description');
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');       
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');   ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-services show-lg <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
   <div class="container">
         <div class="row justify-center middle-xs">
               <div class="col-xs-12 col-xl-9">
                  <div class="box-banner p-b1 text-center w-100 wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.1s">          
                     <?php if ($subheadline) : ?>
                        <div class="subheadline cl-slate-blue pb-10px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                     <?php endif; ?>      
                     <?php if ($headline) : ?>
                        <h2 class="cl-navy mt-0 mb-20px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s"><?php echo $headline; ?></h2>
                     <?php endif; ?>
                     <?php if ($description) : ?>
                        <div class="dp-1 cl-wnavy mb-25px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.4s"><?php echo wp_kses_post($description); ?></div>
                     <?php endif; ?>   
                     <?php if (have_rows('button_list')) {  ?> 
                        <div class="button-list-info justify-center wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.5s">  
                        <?php while (have_rows('button_list')) { 
                              the_row(); $cta = get_sub_field('button_cta'); ?>
                        <?php if( $cta ):
                              $link_url = $cta['url'];
                              $link_title = $cta['title'];
                              $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                              ?>     
                              <div class="cta-btn">                               
                              <a tabindex="0" class="button blue" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span class="text"><?php echo esc_html( $link_title ); ?></span></a>                             
                              </div>
                              <?php endif; ?>
                        <?php } ?>
                        </div>
                        <?php } ?>                                                      
                     </div>
               </div>    
         </div>                                    
      </div>  
   <?php  if (have_rows('boxes_list')): $animation_delay = 0.5; ?>
   <div class="contain-services-list flex align-items-center">
      <?php if ( !empty($bg_image)) : 
            $srcset = wp_get_attachment_image_srcset($bg_image['ID']);
            $sizes = wp_get_attachment_image_sizes($bg_image['ID'], 'full'); ?>                
         <img class="img-main-boxes m-b3" src="<?php echo esc_url($bg_image['url']); ?>" alt="<?php echo esc_attr($bg_image['alt']); ?>" height="350" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
      <?php endif; ?> 
  </div>
  <?php endif; ?>
  <div class="container">
  <div class="row">
        <?php $i = 1;  while (have_rows('boxes_list')): the_row(); 
            $image = get_sub_field('icon_black');
            $title = get_sub_field('title'); 
            $text = get_sub_field('text');           
            $duration = $animation_delay . 's'; ?>
            <div class="col-xs-12 m-b2 wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.2s">
            <div class="box-blur-serv">
            <?php if ( !empty($image)) : 
                  $srcset = wp_get_attachment_image_srcset($image['ID']);
                  $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
               <img class="img-icon-resources mb-20px" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="84" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
            <?php endif; ?>   
            <?php if($title): ?>
                  <h2 class="cl-navy m-t0 mb-0"><?php echo $title;?></h2>
               <?php endif; ?> 
               <?php if($text): ?>
                  <div class="dp-1 mt-20px cl-navy"><?php echo $text;?></div>
               <?php endif; ?> 
            </div> 
            </div>               
        <?php $i++; $animation_delay += 0.25; endwhile; ?>
  </div>
  </div>
</section>
<?php              
    endwhile;
endif; ?>   
