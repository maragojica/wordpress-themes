<?php
if (have_rows('contact')) {
    while (have_rows('contact')) {
        the_row(); 
        $show_contact = get_sub_field('show_contact');        
        if($show_contact): 
        $banner_type = get_sub_field('media_type');        
        $banner_image = get_sub_field('image');
        $headline = get_sub_field('headline'); 
        $description = get_sub_field('description');
        $cta = get_sub_field('cta_button'); 
        $margin_top_desktop = get_sub_field('margin_top_desktop'); 
        $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');        
        $margin_top_mobile = get_sub_field('margin_top_mobile'); 
        $margin_bottom_mobile = get_sub_field('margin_bottom_mobile'); ?>
        <section class="section-contact-info flex w-margin p-t0 p-b0 <?php if(!$margin_top_desktop): echo ' mt-0'; endif; if(!$margin_bottom_desktop): echo ' mb-0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>" <?php if($banner_type['value'] == "image" && !empty($banner_image)): ?>style="background: url(<?php echo esc_url($banner_image['url']); ?>)"<?php endif; ?>>            
            <?php if($banner_type['value'] == "video"){ 
                $videomp4 = get_sub_field('video'); ?> 
                <video id="background-video" autoplay loop muted playsinline style="pointer-events: none;">
                    <?php if($videomp4): ?>
                    <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                    <?php endif; ?>
                </video>                     
            <?php } ?>
            <div class="overlay">               
                <div class="container h-100 flex flex-column center-xs middle-xs text-center">
                    <div class="row center-xs">
                       <div class="col-xs-12 col-lg-7">                          
                           <?php if($headline): ?>
                                <h2 class="section-headline cl-white text-uppercase mt-0 mb-0 pb-17px wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                           <?php endif; ?>  
                           <?php if($description): ?>
                               <div class="subheadline cl-white wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $description; ?></div>
                            <?php endif; ?> 
                           <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>    
                            <div class="m-t2">                        
                              <a tabindex="0" class="cta-button cl-white cl-orange-h wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.64s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                            <?php echo esc_html( $link_title ); ?>
                             <svg class="arrow-passive" xmlns="http://www.w3.org/2000/svg" width="45" height="6" viewBox="0 0 45 6" fill="none">
                                <path d="M44.1651 3L42 0.834936L39.8349 3L42 5.16506L44.1651 3ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="white"/>
                            </svg> 
                            <svg class="arrow-active" xmlns="http://www.w3.org/2000/svg" width="43" height="6" viewBox="0 0 43 6" fill="none">
                                <path d="M42.2652 3.26517C42.4116 3.11872 42.4116 2.88128 42.2652 2.73483L39.8787 0.34835C39.7322 0.201903 39.4948 0.201903 39.3483 0.34835C39.2019 0.494796 39.2019 0.732233 39.3483 0.87868L41.4697 3L39.3483 5.12132C39.2019 5.26777 39.2019 5.5052 39.3483 5.65165C39.4948 5.7981 39.7322 5.7981 39.8787 5.65165L42.2652 3.26517ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#BB6C29"/>
                            </svg>
                            </a> 
                           </div>
                        <?php endif; ?>                        
                       </div>  
                    </div>        
                </div>                    
             </div>
        </section>        
        <?php endif; ?>    
<?php }
} ?>