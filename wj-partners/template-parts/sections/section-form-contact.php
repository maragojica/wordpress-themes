<?php 
if (have_rows('info_contact')) :          
    while (have_rows('info_contact')) : the_row();
    $section_id = get_sub_field('section_id');     
    $headline = get_sub_field('heading');
    $subheadline = get_sub_field('subheading'); 
    $description = get_sub_field('description');      
    $gravity_form_shortcode = get_sub_field('gravity_form');   
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');      
    $reverse_mobile = get_sub_field('reverse_mobile'); 
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-contact-form <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">            
    <div class="container">    
        <div class="row middle-xs <?php if($reverse_mobile){ echo ' row-reverse-mv';  } ?>">
        <div class="col-xs-12 col-lg-5 pe-lg-4">  
               <?php if ($subheadline) : ?>
                    <div class="subheadline cl-slate-blue pb-10px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                <?php endif; ?>      
                <?php if ($headline) : ?>
                    <h2 class="cl-navy mt-0 mb-20px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s"><?php echo $headline; ?></h2>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="dp-1 cl-navy mb-25px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.4s"><?php echo wp_kses_post($description); ?></div>
                <?php endif; ?>   
                <?php if (have_rows('list_icons')): $animation_delay = 0.5;
                    while (have_rows('list_icons')): the_row(); 
                    $icon = get_sub_field('icon');                           
                    $text = get_sub_field('text'); $duration = $animation_delay . 's'; ?>                           
                        <div class="box-info-contact position-relative wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.2s">
                            <?php if ( !empty($icon)) : ?>                
                                <img class="icon-info" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" width="15" heigth="12" />                            
                            <?php endif; ?>
                            <?php if ($text) : ?>
                                <div class="dp-1 cl-black"><?php echo wp_kses_post($text); ?></div>
                                <?php endif; ?>
                        </div>
                    <?php endwhile; endif; ?>  
                <?php if (have_rows('button_list')) {  ?> 
                    <div class="button-list-info m-t2 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.5s">  
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
           <div class="col-xs-12 col-lg-7 mt-lg-0 m-t2">
             <?php if ( $gravity_form_shortcode ): ?>                           
                    <div class="box-contact-form bg-navy wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $gravity_form_shortcode; ?></div>
                <?php endif; ?>
          </div>           
        </div>           
    </div> 
</section>
<?php              
    endwhile;
endif; ?>   
