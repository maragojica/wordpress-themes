<?php
// Check if the current page has the "back_and_forth" group
if (have_rows('elements')) :

    // Loop through the rows of data
    while (have_rows('elements')) : the_row();      

                // Fetch the sub-fields
                $bg_graphic  = get_sub_field('bg_section');
                $bg_color = get_sub_field('bg_section_color');
                $heading = get_sub_field('heading');
                $subheading  = get_sub_field('subheading');
                $description = get_sub_field('description');
                $guide_image = get_sub_field('guide_image'); ?>
                <section class="section-elements" <?php if($bg_color && !empty($bg_graphic)){ ?>style="background: linear-gradient(<?php echo $bg_color;?>, <?php echo $bg_color;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php } else{ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>
                    <div class="container-fluid content-elements p-lg-t6 p-lg-b6 position-relative">
                        <div class="row middle-xs row-elements">                       
                            <div class="col-xs-12 col-xl-6 col-justify-center col-text">
                                <?php if ($subheading) : ?>
                                    <span class="section-subtitle text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo esc_html($subheading); ?></span>
                                <?php endif; ?>
                                <?php if ($heading) : ?>
                                    <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo esc_html($heading); ?></h2>
                                <?php endif; ?>
                                <?php if ($description) : ?>
                                    <div class="description cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo wp_kses_post($description); ?></div>
                                <?php endif; ?>
                               <?php // Check for content_row sub-fields
                                if (have_rows('list')) :   ?>
                                <div class="elements-box p-t2">
                                 <?php $animation_delay = 2.5; while (have_rows('list')) : the_row(); 
                                    $icon_list  = get_sub_field('icon_list');
                                    $heading = get_sub_field('title_list');                                  
                                    $description = get_sub_field('text_list'); ?>
                                    <div class="element-list flex top-xs animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                                    <?php if ( !empty($icon_list)) : ?>                
                                        <img class="icon-element" src="<?php echo esc_url($icon_list['url']); ?>" alt="<?php echo esc_attr($icon_list['alt']); ?>" width="80" height="84"/>                            
                                    <?php endif; ?> 
                                       <div class="element-body">
                                        <?php if ($heading) : ?>
                                                <span class="title-element text-uppercase cl-black"><?php echo esc_html($heading); ?></span>
                                            <?php endif; ?>
                                            <?php if ($description) : ?>
                                                <div class="description cl-black"><?php echo wp_kses_post($description); ?></div>
                                            <?php endif; ?>
                                       </div>
                                    </div>
                                <?php  $animation_delay += 1; endwhile; ?>
                                  </div>
                                <?php endif; ?>                                
                            </div>
							<?php if ( !empty($guide_image)) : ?>  
                            <div class="col-xs-12 col-lg-6 ps-0 pe-0">  
                                <div class="animate-element-image animate__animated" data-animation="fadeRight">  
                                    <img class="animated-building" src="<?php echo esc_url($guide_image['url']); ?>" alt="<?php echo esc_attr($guide_image['alt']); ?>" width="894" height="943"/> 
                                </div> 
                            </div>
							 <?php endif; ?> 
                        </div>
                    </div>                    
                </section>
            <?php
    endwhile;
endif;
?>