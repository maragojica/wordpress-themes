<?php

if (have_rows('featured')) :
    // Loop through the rows of data
    while (have_rows('featured')) : the_row();      

                // Fetch the sub-fields                 
                $cta = get_sub_field('button_cta');  
                $add_padding_top = get_sub_field('add_padding_top'); 
                $add_padding_bottom = get_sub_field('add_padding_bottom'); 
                $project = get_sub_field('project');
                if ( $project ) : ?>
                <section class="section-featured-project<?php if( !$add_padding_top ): ?> p-t0<?php endif; ?> <?php if( !$add_padding_bottom ): ?> p-b0<?php endif; ?>">
                    <div class="container">
                    <?php $i = 1; foreach( $project as $featured_project ): 
                        $name = get_the_title( $featured_project->ID );
                        $show_info = get_field('show_info', $featured_project->ID);
                        $purpose = get_field( 'purpose', $featured_project->ID ); 
                        $materials = get_field( 'materials', $featured_project->ID );
                        $excerpt = get_field( 'excerpt', $featured_project->ID );
                        $full_description = get_field('full_description', $featured_project->ID);
                        $media_type = get_field('media_type', $featured_project->ID);
                        $image  = get_field('image', $featured_project->ID);      
                        $image_popup  = get_field('image_popup', $featured_project->ID);                   
                        $videomp4 = get_field('video', $featured_project->ID);
                        if($i == 1):?>
                        <div class="row middle-xs">                       
                            <div class="col-xs-12">
                                 <div class="box-featured relative animate__animated" data-animation="fadeLeft" data-duration="1s">
                                    <?php if($media_type['value'] == "image"){ ?>
                                        <?php if ( !empty($image)) : 
                                            $srcset = wp_get_attachment_image_srcset($image['ID']);
                                            $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                            <img class="fit-cover-center w-100 h-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="648" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" />                            
                                        <?php endif; ?>   
                                    <?php }elseif($media_type['value'] == "video"){ 
                                        ?> 
                                        <video class="featured-video" autoplay loop muted>
                                            <?php if($videomp4): ?>
                                            <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                                            <?php endif; ?>
                                        </video>                     
                                    <?php } ?>                                                               
                                </div>    
                                <?php if($show_info): ?>
                                <div class="overlay-featured flex middle-xs">
                                    <div class="box-info bg-black animate__animated" data-animation="fadeRight" data-duration="1.75s">                            
                                        <?php if ($name) : ?>
                                            <h2 class="section-title text-uppercase cl-white mt-0 mb-02 animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo esc_html($name); ?></h2>
                                        <?php endif; ?>
                                        <?php if ($excerpt) : ?>
                                            <div class="dp-1 dp-2 cl-white animate__animated" data-animation="fadeBottom" data-duration="2.75s"><?php echo wp_kses_post($excerpt); ?></div>
                                        <?php endif; ?>
                                            <?php if( $cta ):
                                            $link_url = $cta['url'];
                                            $link_title = $cta['title'];
                                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                                
                                            <a tabindex="0" class="cta-link cl-white flex middle-xs m-t2" data-animation="fadeBottom" data-duration="3s" id="openFeaturedProjectModal" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                            <?php echo esc_html( $link_title ); ?>
                                            <svg class="arrow-passive" width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.7071 8.70711C21.0976 8.31658 21.0976 7.68342 20.7071 7.29289L14.3431 0.928932C13.9526 0.538408 13.3195 0.538408 12.9289 0.928932C12.5384 1.31946 12.5384 1.95262 12.9289 2.34315L18.5858 8L12.9289 13.6569C12.5384 14.0474 12.5384 14.6805 12.9289 15.0711C13.3195 15.4616 13.9526 15.4616 14.3431 15.0711L20.7071 8.70711ZM0 9H20V7H0V9Z" fill="white"/>
                                            </svg>
                                            <svg class="arrow-active" xmlns="http://www.w3.org/2000/svg" width="39" height="16" viewBox="0 0 39 16" fill="none">
                                                <path d="M38.7071 8.70711C39.0976 8.31658 39.0976 7.68342 38.7071 7.29289L32.3431 0.928932C31.9526 0.538408 31.3195 0.538408 30.9289 0.928932C30.5384 1.31946 30.5384 1.95262 30.9289 2.34315L36.5858 8L30.9289 13.6569C30.5384 14.0474 30.5384 14.6805 30.9289 15.0711C31.3195 15.4616 31.9526 15.4616 32.3431 15.0711L38.7071 8.70711ZM0 9H38V7H0V9Z" fill="white"/>
                                            </svg>
                                            </a>                            
                                        <?php endif; ?>                                  
                                   </div>                                
                                 </div>   
                                 <?php endif; ?>                                           
                            </div>                       
                        </div>  
                        <?php if( $full_description): ?>
                            <div id="featuredProjectModal" class="modal modal-featured">
                            <div class="modal-content modal-content-featured">
                                <div class="modal-body">
                                    <span id="closeModalBtnFeatured" class="close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                        <path d="M3.90708 24.2881L0.589233 20.9703L9.12085 12.4387L0.589233 3.96629L3.90708 0.648438L12.4387 9.18005L20.9111 0.648438L24.2289 3.96629L15.6973 12.4387L24.2289 20.9703L20.9111 24.2881L12.4387 15.7565L3.90708 24.2881Z" fill="#005B29"/>
                                        </svg>
                                    </span>
                                    <div class="row row-featured me-0 ms-0">
                                        <div class="col-xs-12 col-xl-5 pe-xl-3">
                                            <div class="w-100 h-100">                                           
                                             <?php if($name): ?>
                                                <h3 class="text-uppercase cl-black"><?php echo $name;?></h3>
                                             <?php endif; ?> 
                                             <?php if ($materials) : ?>
                                                <div class="dp-1 dp-2 cl-black"><?php echo wp_kses_post($materials); ?></div>
                                            <?php endif; ?>   
                                            <?php if ($purpose) : ?>
                                                <div class="dp-1 dp-2 cl-black"><?php echo wp_kses_post($purpose); ?></div>
                                            <?php endif; ?>   
                                            <?php if ($full_description) : ?>
                                                <div class="dp-1 dp-2 cl-black"><?php echo wp_kses_post($full_description); ?></div>
                                            <?php endif; ?>
                                            </div> 
                                        </div>
                                        <div class="col-xs-12 col-xl-7 h-100 pe-0 ps-0">
                                          <div class="box-featured relative">
                                            <?php if($media_type['value'] == "image"){ ?>
                                                <?php if ( !empty($image_popup)) {
                                                    $srcset = wp_get_attachment_image_srcset($image_popup['ID']);
                                                    $sizes = wp_get_attachment_image_sizes($image_popup['ID'], 'full'); ?>                
                                                    <img class="fit-cover-center w-100 h-100" src="<?php echo esc_url($image_popup['url']); ?>" alt="<?php echo esc_attr($image_popup['alt']); ?>" height="792" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" />                            
                                                <?php }elseif ( !empty($image)){ 
                                                    $srcset = wp_get_attachment_image_srcset($image['ID']);
                                                    $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                                    <img class="fit-cover-center w-100 h-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="792" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" />                            
                                                <?php } ?>      
                                            <?php }elseif($media_type['value'] == "video"){ 
                                                ?> 
                                                <video class="featured-video" autoplay loop muted>
                                                    <?php if($videomp4): ?>
                                                    <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                                                    <?php endif; ?>
                                                </video>                     
                                            <?php } ?>                                                               
                                            </div>    
                                        </div>
                                    </div>
                                </div>			
                            </div>
                        </div> 
                        <?php endif; endif; ?>    
                     <?php $i++; endforeach; ?>                   
                    </div>      
                </section>                
                <?php endif; ?>
            <?php
    endwhile;
endif;
?>