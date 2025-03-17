<?php 
if (have_rows('products_section')) :          
    while (have_rows('products_section')) : the_row();
    $section_id = get_sub_field('section_id');   
    $headline = get_sub_field('heading');  
    $subheadline = get_sub_field('subheading'); 
    $description = get_sub_field('description');
    $center_content = get_sub_field('center_content'); 
    $full_width = get_sub_field('full_width');
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); 
    $columns = get_sub_field('columns_number');
    $columnsnumber = "col-lg-12";
    switch ($columns['value']) {
        case "one":
            $columnsnumber = "col-lg-12";
            break;
        case "two":
            $columnsnumber = "col-lg-6";
            break;
        case "three":
            $columnsnumber = "col-lg-4";
            break;
        case "four":
            $columnsnumber = "col-lg-3";
            break; 
    } ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-products-list <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
         <div class="container">        
            <div class="row <?php if($center_content): ?> justify-center <?php endif;?>"> 
                <?php if($headline ||  $subheadline): ?>
                <div class="col-xs-12 <?php if($full_width){ ?> col-lg-12 <?php }else{?> col-lg-8 col-xl-8 <?php } if($center_content): ?> text-center <?php endif;?> m-b2">   
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
                <?php endif; ?>               
            </div>  
            <?php $filter_options = get_sub_field('products_filter'); 
            if ($filter_options) { $animation_delay = 0.1; ?>
                    <div class="row justify-center">
                        <?php foreach( $filter_options as $filter_option ){
                            $headline = $filter_option->name; 
                            $cta = get_field('page_link', $filter_option); 
                            $image = get_field('featured_image', $filter_option); 
                            $duration = $animation_delay . 's'; ?>
                            <div class="col-xs-12 col-md-6 <?php echo $columnsnumber;?> col-products m-b2 wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.1s">                               
                                <div class="box-card h-100">
                                <div class="card-media">                               
                                    <?php if (!empty($image)): ?>                           
                                        <?php $srcset = wp_get_attachment_image_srcset($image['ID']);
                                        $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>           
                                         <?php if( $cta ):
                                            $link_url = $cta['url'];
                                            $link_title = $cta['title'];
                                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>      
                                            <a class="w-100 h-100" tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"> <?php endif; ?>                             
                                               <img class="img-fluid w-100 h-100 fit-cover-center"  src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="300" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                                               <?php if( $cta ): ?>
                                               </a>
                                            <?php endif; ?>
                                     <?php endif; ?> 
                                </div>
                                <div class="card-footer bg-navy">
                                    <?php if( $headline ): ?>
                                        <h3 class="cl-white text-uppercase m-t0 m-b0 text-center">                                        
                                            <?php echo $headline;?>   
                                        </h3>
                                    <?php endif; ?>    
                                    <?php if( $cta ):
                                            $link_url = $cta['url'];
                                            $link_title = $cta['title'];
                                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>    
                                            <div class="box-link-simple">                        
                                                <a tabindex="0" class="simple-link link-white" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">                            
                                                <?php echo esc_html( $link_title ); ?>
                                               </a>
                                             </div>   
                                  <?php endif; ?>
                                </div> 
                                </div>                                                
                            </div>
                        <?php $animation_delay += 0.10; } ?>                 
                    </div>   
                <?php } ?>                                           
       </div>             
</section>

<?php              
    endwhile;
endif; ?>  