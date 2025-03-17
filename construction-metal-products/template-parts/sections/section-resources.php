<?php 
if (have_rows('resources')) :          
    while (have_rows('resources')) : the_row();
    $section_id = get_sub_field('section_id');   
    $headline = get_sub_field('heading');  
    $subheadline = get_sub_field('subheading'); 
    $description = get_sub_field('description');
    $testimonials_list = get_sub_field('resources_list');
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-resources <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
         <div class="container-fluid ps-0 pe-0">  
                <?php if($headline ||  $subheadline): ?>
              <div class="row justify-center m-b3"> 
                <div class="col-xs-12 col-lg-8 col-xl-6 text-center">   
                  <?php if ($subheadline) : ?>
                        <div class="subheadline cl-blue pb-17px text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.1s"><?php echo $subheadline; ?></div>
                    <?php endif; ?>      
                    <?php if ($headline) : ?>
                        <h2 class="cl-black mt-0 mb-0 text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.1s"><?php echo $headline; ?></h2>
                    <?php endif; ?>
                    <?php if ($description) : ?>
                        <div class="dp-1 cl-black wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.1s"><?php echo wp_kses_post($description); ?></div>
                    <?php endif; ?>                     
                </div>
                </div> 
                <?php endif; ?>              
                     
                <?php if (have_rows('resources_list')) { $counter = 0; $pattern = array('tall', 'small', 'small', 'small', 'small', 'tall'); $animation_delay = 0.1; ?>
                    <div class="grid-wrapper">
                        <?php while (have_rows('resources_list')) {
                            the_row();  
                            $heading = get_sub_field('title'); 
                            $subtitle = get_sub_field('subtitle'); 
                            $cta = get_sub_field('cta'); 
                            $image = get_sub_field('image'); 
                            $class = $pattern[$counter % count($pattern)];
	                         $counter++;
                            $duration = $animation_delay . 's'; ?>
                            <div class="<?php echo $class; ?> wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.1s">                               
                                 <div class="box-service">
                                   <?php if(!empty($image)): ?>
                                    <?php $srcset = wp_get_attachment_image_srcset($image['ID']);
                                    $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                    <img class="service-img w-100 h-100 fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="590" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                                    <?php endif; ?>
                                    <div class="overlay overlay-serv">                                
                                        <div class="header-services">  
                                        <?php if ($subtitle) : ?>
                                            <div class="subheadline cl-white pb-10px text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.1s"><?php echo $subtitle; ?></div>
                                        <?php endif; ?>                                        
                                        <?php if($heading): ?>
                                            <h3 class="cl-white text-uppercase m-t0 m-b0"><?php echo $heading;?></h3>   
                                        <?php endif; ?> 
                                        <?php if( $cta ):
                                        $link_url = $cta['url'];
                                        $link_title = $cta['title'];
                                        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>  
                                        <div class="m-t1 box-link-service">                          
                                        <div class="cta-btn">                               
                                            <a tabindex="0" class="button blue" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span class="text"><?php echo esc_html( $link_title ); ?></span></a>                             
                                        </div>
                                        </div>
                                            <?php endif; ?> 
                                        </div>
                                                         
                                </div>
                        </div>                                               
                            </div>
                        <?php $animation_delay += 0.10; } ?>                 
                    </div>   
                <?php } ?> 
            <div class="row justify-center mt-lg-2">                
                <div class="col-xs-12 col-lg-8 col-xl-6 text-center">                     
                    <?php if (have_rows('button_list')) {  ?> 
                        <div class="button-list-info justify-center mt-20px wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">  
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
</section>

<?php              
    endwhile;
endif; ?>  