<?php
if (have_rows('services')) {
    while (have_rows('services')) {
        the_row(); 
        $heading = get_sub_field('heading'); 
        $services_list = get_sub_field('select_services');
?>
        <section class="section-services">
            <div class="container-fluid">
                <div class="flex col center-xs middle-xs">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?php if($heading): ?>
                            <h2 class="mt-0 mb-2 center-text cl-blue animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1.75s"><?php echo $heading; ?></h2>
                        <?php endif; ?> 
                        <?php if (have_rows('button_list')) {  ?> 
                        <div class="button-list mt-2">  
                       <?php while (have_rows('button_list')) { 
                           the_row(); $cta = get_sub_field('cta_button'); ?>
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                            ?>                                    
                                <a class="animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.5s" tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                    <button class="button cta-btn bg-white cl-blue bg-dark-h cl-white-h"><?php echo esc_html( $link_title ); ?></button> 
                                </a> 
                        <?php endif; ?>
                        <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                    <?php  if ($services_list ) {  $animation_delay = 1.75; ?>
                    <div class="service-cards-container flex row center-xs w-100">
                    <?php                   
                        foreach( $services_list as $post ):  
                            setup_postdata($post); 
                            $title = get_the_title(); 
                            $icon = get_field('icon'); 
                            $svg_code = get_field('svg_icon'); 
                            $heading = get_field('heading');                            
                            $duration = $animation_delay . 's';  ?>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate__animated fadeBottom" data-animation="fadeBottom" data-duration="<?php echo $duration;?>">                           
                                <a tabindex="0" href="<?php echo the_permalink(); ?>" aria-label="<?php echo esc_html( $title ); ?>" title="<?php echo esc_html( $title ); ?>" >
                              
                                <div class="service-card bg-grey">
                                <?php if($svg_code){ ?>
                                        <?php echo $svg_code; ?>
                                     <?php }else{ ?>   
                                    <?php if ($icon): ?>
                                        <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>                                      
                                    <?php endif; ?>
                                    <?php } ?>
                                    <?php if($heading): ?>
                                        <span class="little-heading center-text cl-dark"><?php echo $heading;?></span>
                                    <?php endif; ?> 
                                </div>
                                </a>                              
                            </div>
                    <?php 
                       $animation_delay += 0.75;  endforeach; wp_reset_postdata();  ?>   
						<?php if (have_rows('extra_subservice')):  ?> 
						   <?php while (have_rows('extra_subservice')) {
        					the_row(); 
						   $icon = get_sub_field('icon'); 
                            $svg_code = get_sub_field('svg_icon'); 
                            $heading = get_sub_field('heading'); 
						   $link = get_sub_field('link'); ?>
						     <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate__animated fadeBottom" data-animation="fadeBottom" data-duration="<?php echo $duration;?>">                           
                                 <?php if ($link): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                <a tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"> 
                                <?php endif; ?>
                              
                                <div class="service-card bg-grey">
                                <?php if($svg_code){ ?>
                                        <?php echo $svg_code; ?>
                                     <?php }else{ ?>   
                                    <?php if ($icon): ?>
                                        <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>                                      
                                    <?php endif; ?>
                                    <?php } ?>
                                    <?php if($heading): ?>
                                        <span class="little-heading center-text cl-dark"><?php echo $heading;?></span>
                                    <?php endif; ?> 
                                </div>
                                 <?php if ($link): ?>
                                </a>
                                <?php endif; ?>                            
                            </div>
						   <?php } ?>
						<?php endif; ?>
                    </div> 
                    <?php } ?>
                </div> 
            </div> 
        </section> 
<?php 
    } 
} 
?>
