<?php 
if (have_rows('info_profiles')) :          
    while (have_rows('info_profiles')) : the_row();
    $section_id = get_sub_field('section_id');   ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-info-profiles">            
    <?php  if (have_rows('info_profiles_contain')): ?>
  <div class="info-profiles-contain">
        <?php $i = 1;  while (have_rows('info_profiles_contain')): the_row();           
            $title = get_sub_field('title'); 
            $text = get_sub_field('text'); 
            $cta = get_sub_field('button_cta');  
            $bg_box = get_sub_field('bg_profile'); 
	       if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self';   
	        endif; ?> 
            <div class="item-info-profile relative" <?php if(!empty($bg_box)): ?>style="background-image: url(<?php echo esc_url($bg_box['url']); ?>)"<?php endif; ?>>  
				<a tabindex="0" class="w-100 h-100"  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
               <div class="head-item-profile">
               <?php if ($title) : ?>
                    <h2 class="text-uppercase cl-green mt-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if ($text) : ?>
                    <div class="main-description dp-1 cl-white"><?php echo wp_kses_post($text); ?></div>
                <?php endif; ?>   
                <?php if( $cta ): ?>    
                         <div class="m-t1">
                            <div tabindex="0" class="cta-button cl-green cl-white-h wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.8s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                            <?php echo esc_html( $link_title ); ?>                               
                               <svg class="arrow-passive" xmlns="http://www.w3.org/2000/svg" width="45" height="6" viewBox="0 0 45 6" fill="none">
                                <path d="M44.1651 3L42 0.834936L39.8349 3L42 5.16506L44.1651 3ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#024325"/>
                                </svg> 
                                <svg class="arrow-active" xmlns="http://www.w3.org/2000/svg" width="43" height="6" viewBox="0 0 43 6" fill="none">
                                    <path d="M42.2652 3.26517C42.4116 3.11872 42.4116 2.88128 42.2652 2.73483L39.8787 0.34835C39.7322 0.201903 39.4948 0.201903 39.3483 0.34835C39.2019 0.494796 39.2019 0.732233 39.3483 0.87868L41.4697 3L39.3483 5.12132C39.2019 5.26777 39.2019 5.5052 39.3483 5.65165C39.4948 5.7981 39.7322 5.7981 39.8787 5.65165L42.2652 3.26517ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="white"/>
                                </svg>                               
                            </div> 
                            </div>                 
                    <?php endif; ?> 
               </div>  
				<?php if( $cta ): ?>  
				</a>	
				<?php endif; ?> 
            </div>             
        <?php $i++; endwhile; ?>
  </div>
  <?php endif; ?>
</section>
<?php              
    endwhile;
endif; ?>   
