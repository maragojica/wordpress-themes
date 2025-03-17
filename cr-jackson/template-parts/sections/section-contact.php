<?php
if (have_rows('contact')) {
    while (have_rows('contact')) {
        
        the_row(); 
        $show_contact = get_sub_field('show_contact');        
        if($show_contact): 
        $banner_type = get_sub_field('media_type');       
        $bg_overlay = get_sub_field('section_overlay');  
        $shape = get_sub_field('shape');  
        $banner_image = get_sub_field('image');
        $headline = get_sub_field('headline'); 
        $subheadline = get_sub_field('subheadline');
        $description = get_sub_field('description');
        $cta = get_sub_field('cta_button'); 
        $margin_top_desktop = get_sub_field('margin_top_desktop'); 
        $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');        
        $margin_top_mobile = get_sub_field('margin_top_mobile'); 
        $margin_bottom_mobile = get_sub_field('margin_bottom_mobile'); ?>
        <section class="section-contact-info flex w-margin p-t0 p-b0 <?php if(!$margin_top_desktop): echo ' mt-0'; endif; if(!$margin_bottom_desktop): echo ' mb-0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>" <?php if($banner_type['value'] == "image" && !empty($banner_image)): ?>style="background-image: linear-gradient(to bottom, <?php echo $bg_overlay; ?>, <?php echo $bg_overlay; ?>), url('<?php echo esc_url($banner_image); ?>');"<?php endif; ?>>            
            <?php if($banner_type['value'] == "video"){ 
                $videomp4 = get_sub_field('video'); ?> 
                <video id="background-video" autoplay loop muted playsinline style="pointer-events: none;">
                    <?php if($videomp4): ?>
                    <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                    <?php endif; ?>
                </video>                     
            <?php } ?>
            <div class="overlay">               
                <div class="container relative h-100 flex flex-column center-xs middle-xs text-center">
                    <div class="row center-xs">
                       <div class="col-xs-12 col-lg-7">    
                        <?php if ($subheadline) : ?>
                            <div class="subheadline cl-orange text-uppercase m-b1 cl-orange wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                        <?php endif; ?>                      
                           <?php if($headline): ?>
                                <h3 class="section-headline cl-white text-uppercase mt-0 mb-0 pb-17px wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $headline; ?></h3>
                           <?php endif; ?>  
                           <?php if($description): ?>
                               <div class="dp-1 cl-white m-b1 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $description; ?></div>
                            <?php endif; ?>       
                            <?php if ( !empty($shape)) :  ?>                
                                <img class="shape-contact fluid-img" src="<?php echo esc_url($shape['url']); ?>" alt="<?php echo esc_attr($shape['alt']); ?>" width="208" height="22" />                            
                            <?php endif; ?>                                             
                       </div>  
                    </div>    
                    <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                            
                               <a tabindex="0" class="btn btn-contact cta-btn wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                            <?php echo esc_html( $link_title ); ?>                          
                            </a> 
                        <?php endif; ?>       
                </div>                    
             </div>
        </section>        
        <?php endif; ?>    
<?php }
} ?>