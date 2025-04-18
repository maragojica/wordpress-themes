<?php if (have_rows('our_market')):  
     while (have_rows('our_market')) :
        the_row(); 
        $headline = get_sub_field('heading');
        $subheading = get_sub_field('subheading'); 
        $bg_graphic = get_sub_field('bg_section_image');
        $bg_color = get_sub_field('bg_section_color'); ?>
        <section class="section-market p-md-t2 p-md-b2 p-b0" <?php if($bg_color && !empty($bg_graphic)){ ?>style="background: linear-gradient(<?php echo $bg_color;?>, <?php echo $bg_color;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php } else{ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>            
            <div class="container flex col middle-xs p-md-t2 p-md-b2">  
                <?php  if (have_rows('list_icons')):  $animation_delay = 2; ?>               
                <div class="values-row row middle-xs p-lg-t2">
                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-5 p-b2 col-title-market">
                        <?php if ($subheading) : ?>
                            <span class="section-subtitle text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo esc_html($subheading); ?></span>
                        <?php endif; ?>
                        <?php if ($headline) : ?>
                            <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo esc_html($headline); ?></h2>
                        <?php endif; ?>                                          
                    </div>
                    <?php                    
                    while (have_rows('list_icons')): the_row(); 
                        $icon = get_sub_field('icon');
                        $heading = get_sub_field('heading'); 
                        $duration = $animation_delay . 's'; ?>
                        <div class="values-col center-xs col-xs-12 col-md-6 col-lg-6 col-xl p-b2 animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                        <?php if ( !empty($icon)) : ?>                
                            <img class="icon-values" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" width="87" heigth="82" />                            
                        <?php endif; ?>  
                            <div class="label-1 text-uppercase cl-black">
                                <?php echo $heading; ?>
                            </div>
                        </div>
                    <?php $animation_delay += 1; endwhile;  ?>
                </div>   
                <?php endif; ?>  
                <?php  if (have_rows('list_icons_2')):  $animation_delay = 1; ?>               
                <div class="values-row row middle-xs p-t2">                   
                    <?php                    
                    while (have_rows('list_icons_2')): the_row(); 
                        $icon = get_sub_field('icon');
                        $heading = get_sub_field('heading'); 
                        $duration = $animation_delay . 's'; ?>
                        <div class="values-col center-xs col-xs-12 col-md-6 col-lg-6 col-xl p-b2 animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                        <?php if ( !empty($icon)) : ?>                
                            <img class="icon-values" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" width="87" heigth="82" />                            
                        <?php endif; ?>  
                            <div class="label-1 text-uppercase cl-black">
                                <?php echo $heading; ?>
                            </div>
                        </div>
                    <?php $animation_delay += 0.45; endwhile;  ?>
                </div>   
                <?php endif; ?>     
            </div> 
        </section>
    <?php 
     endwhile;
endif;
?>
