<?php if (have_rows('info_contact')):  
     while (have_rows('info_contact')) :
        the_row(); 
        $headline = get_sub_field('heading');
        $subheading = get_sub_field('subheading');  
        $description = get_sub_field('description');  
        $gravity_form = get_sub_field('gravity_form'); 
        $bg_graphic = get_sub_field('bg_section_image');
        $bg_color = get_sub_field('bg_section_color'); ?>
        <section class="section-info-contact" <?php if($bg_color && !empty($bg_graphic)){ ?>style="background: linear-gradient(<?php echo $bg_color;?>, <?php echo $bg_color;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php } else{ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>            
            <div class="container"> 
                <div class="row middle-xs">                    
                    <div class="col-xs-12 col-lg-6 p-lg-e5">
                        <?php if ($subheading) : ?>
                            <span class="section-subtitle text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo esc_html($subheading); ?></span>
                        <?php endif; ?>
                        <?php if ($headline) : ?>
                            <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo esc_html($headline); ?></h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <div class="description cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>    
                        <?php if (have_rows('list_icons')):  $animation_delay = 2; ?>   
                            <div class="row">
                            <?php  while (have_rows('list_icons')): the_row(); 
                            $icon = get_sub_field('icon');                           
                            $text = get_sub_field('text');
                            $duration = $animation_delay . 's'; ?>
                             <div class="col-xs-12 col-md-6">                                
                                  <div class="box-info-contact position-relative animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                                  <?php if ( !empty($icon)) : ?>                
                                    <img class="icon-info" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" width="19" heigth="19" />                            
                                <?php endif; ?>
                                  <?php if ($text) : ?>
                                    <div class="description cl-black"><?php echo wp_kses_post($text); ?></div>
                                    <?php endif; ?>
                                  </div>
                               </div>                           
                            <?php $animation_delay += 1; endwhile; ?>      
                            </div>                         
                        <?php endif; ?>               
                    </div>
                    <?php if($gravity_form ): ?>
                    <div class="col-xs-12 col-lg-6">
                        <div class="box-contact animate__animated" data-animation="fadeRight" data-duration="2.5s"><?php echo $gravity_form; ?></div>
                    </div>
                    <?php endif; ?>
                </div>                         
            </div> 
        </section>
    <?php 
     endwhile;
endif;
?>
