<?php 
if (have_rows('info_contact')) :          
    while (have_rows('info_contact')) : the_row();
    
$section_id = get_sub_field('section_id'); 
$contact_position = get_sub_field('contact_position');
$contact_code = get_sub_field('contact_code');
$headline = get_sub_field('heading');
$subheadline = get_sub_field('subheading'); 
$description = get_sub_field('description');
$cta = get_sub_field('button_cta'); 
$button_color = get_sub_field('button_color');
$padding_top_desktop = get_sub_field('padding_top_desktop'); 
$padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
$reverse_mobile = get_sub_field('reverse_mobile'); 
$padding_top_mobile = get_sub_field('padding_top_mobile'); 
$padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-booking <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
    <div class="container">
       <div class="row middle-xs <?php if($contact_position['value'] == "right"){ echo ' reverse'; }else{ echo ' normal'; } if($reverse_mobile): echo ' column-reverse-mv'; endif; ?>">        
            <div class="col-xs-12 col-lg-8 mb-lg-0 mt-lg-0 <?php echo ($reverse_mobile) ? 'm-t2' : 'm-b2'; ?>">
            <?php if ( $contact_code) : ?>                
                   <div class="code-content"> 
                        <?php echo $contact_code; ?>
                  </div>
                <?php endif; ?>
             </div>            
            <div class="col-xs-12 col-lg-4 <?php echo ($contact_position['value'] == "right") ? 'pe-lg-3' : 'ps-lg-3'; ?>">                      
                <div class="m-b1">
                <?php if ($subheadline) : ?>
                    <div class="subheadline text-uppercase m-b1 cl-slate wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                <?php endif; ?>
                <?php if ($headline) : ?>
                    <h2 class="cl-slate m-t0 m-b0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="dp-1 m-b30 cl-slate wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                <?php endif; ?> 					
                </div>
               <?php if (have_rows('icons_contact')) :  
                while (have_rows('icons_contact')) : the_row(); $icon = get_sub_field('icon'); $text = get_sub_field('text'); ?>
                    <div class="contact-info">
                        <?php if ( !empty($icon)) :   ?> 
                        <img class="icon-contact" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" height="19" width="19"/>   
                        <?php endif; ?>  
                        <?php if ($text) : ?>
                            <div class="dp-1 cl-slate wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($text); ?></div>
                        <?php endif; ?>                       
                    </div>  
                <?php  endwhile;
                endif; ?>
				<?php  if( $cta ):
				$link_url = $cta['url'];
				$link_title = $cta['title'];
				$link_target = $cta['target'] ? $cta['target'] : '_self'; ?>     
				<div class="m-t1">
					<a tabindex="0" class="btn btn-sage hover-slide-right wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a> 
				</div>
				                            
				<?php endif; ?>
             </div>            
        </div>            
    </div>
</section>
<?php              
    endwhile;
endif; ?>