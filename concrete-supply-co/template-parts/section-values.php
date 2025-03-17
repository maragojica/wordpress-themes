<?php if (have_rows('our_values')):  
     while (have_rows('our_values')) :
        the_row(); 
        $headline = get_sub_field('heading');
        $subheading = get_sub_field('subheading');  
        $description = get_sub_field('description');              
        $cta = get_sub_field('cta_button');
        $bg_graphic = get_sub_field('bg_section_image');
        $bg_color = get_sub_field('bg_section_color'); ?>
        <section class="section-values p-md-t2 p-md-b2" <?php if($bg_color && !empty($bg_graphic)){ ?>style="background: linear-gradient(<?php echo $bg_color;?>, <?php echo $bg_color;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php } else{ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>            
            <div class="container flex col middle-xs center-xs p-md-t2 p-md-b2"> 
                <div class="row center-xs">                    
                    <div class="col-xs-12 col-lg-7">
                        <?php if ($subheading) : ?>
                            <span class="section-subtitle text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo esc_html($subheading); ?></span>
                        <?php endif; ?>
                        <?php if ($headline) : ?>
                            <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo esc_html($headline); ?></h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <div class="description cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>                       
                    </div>
                </div>
                <div class="values-row row middle-xs center-xs p-t2">
                    <?php 
                    if (have_rows('list_icons')):  $animation_delay = 1;
                    while (have_rows('list_icons')): the_row(); 
                        $icon = get_sub_field('icon');
                        $heading = get_sub_field('heading'); 
                        $duration = $animation_delay . 's'; ?>
                        <div class="values-col col-xs-12 col-md-6 col-lg-4 col-xl-2 p-xl-b0 p-b2 animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                        <?php if ( !empty($icon)) : ?>                
                            <img class="icon-values" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" width="87" heigth="82" />                            
                        <?php endif; ?>  
                            <div class="label-1 text-uppercase cl-black">
                                <?php echo $heading; ?>
                            </div>
                        </div>
                    <?php $animation_delay += 0.75; endwhile; 
                    endif;?>
                </div>                                    
                <?php if( $cta ):
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                        <div class="row center-xs p-md-t2">                    
                            <div class="col-xs-12 col-lg-7">   
                            <div class="button-wrapper blue animate__animated" data-duration="2.5s">
                                <a tabindex="0" class="button black" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                            </div>
                        </div>
                    </div>
                <?php endif; ?>                  
            </div> 
        </section>
    <?php 
     endwhile;
endif;
?>
