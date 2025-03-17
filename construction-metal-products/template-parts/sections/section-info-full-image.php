<?php 
if (have_rows('info_full_image')) :          
    while (have_rows('info_full_image')) : the_row();
    $section_id = get_sub_field('section_id');   
    $headline = get_sub_field('heading');  
    $subheadline = get_sub_field('subheading'); 
    $description = get_sub_field('description');
    $image  = get_sub_field('image');
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-info-text <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
         <div class="container">        
            <div class="row justify-center"> 
            <?php if($headline ||  $subheading): ?>
                <div class="col-xs-12 col-lg-12">
                <?php if ( !empty($image)) : 
                    $srcset = wp_get_attachment_image_srcset($image['ID']);
                    $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                    <img class="w-100 m-b2 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.1s" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="395" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" />                            
                <?php endif; ?> 
                <?php if ($subheadline) : ?>
                        <div class="subheadline cl-blue pb-17px text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.1s"><?php echo $subheadline; ?></div>
                    <?php endif; ?>      
                    <?php if ($headline) : ?>
                        <h2 class="cl-black mt-0 mb-0 text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    <?php endif; ?>  
                </div>
                <?php endif; ?>  
                <?php if($description): ?>
                <div class="col-xs-12 col-lg-12">                    
                    <?php if ($description) : ?>
                        <div class="dp-1 cl-black wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                    <?php endif; ?> 
                    <?php if (have_rows('button_list')) {  ?> 
                        <div class="button-list-info justify-center mt-20px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s">  
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
                <?php endif; ?>               
            </div>                                                    
       </div>             
</section>

<?php              
    endwhile;
endif; ?>  