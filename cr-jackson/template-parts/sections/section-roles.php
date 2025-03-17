<?php
if (have_rows('open_roles')) {
    while (have_rows('open_roles')) {
        the_row(); 
        $section_id = get_sub_field('section_id'); 
        $headline = get_sub_field('heading');  
         $subheading = get_sub_field('subheading');  
         $title_app = get_sub_field('title_app');
		 $title_buttons = get_sub_field('title_buttons');
         $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');        
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');?>
        <section class="section-roles <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?>>
            <div class="container">
                <div class="row center-xs middle-xs">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <?php if ($subheading) : ?>
                            <div class="subheadline cl-orange text-uppercase m-b1 cl-orange wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheading; ?></div>
                        <?php endif; ?>                    
                        <?php if ($headline) : ?>
                            <h3 class="cl-blue text-uppercase mt-0 mb-0 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s"><?php echo $headline; ?></h2>
                        <?php endif; ?>                       
                    </div>  
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-t2">                       
                        <?php
                        if (have_rows('roles')) { $animation_delay = 0.5;
                            while (have_rows('roles')) {
                                the_row();                                
                                $heading = get_sub_field('role_name'); 
                                $link = get_sub_field('apply_btn'); 
                                $duration = $animation_delay . 's';  ?>
                                <div class="roles-box wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="<?php echo $duration;?>">
                                   <?php if($heading): ?>
                                      <div class="role-name"><?php echo $heading; ?></div>
                                    <?php endif; ?>
                                    <?php if ($link): 
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                        <a tabindex="0" class="cta-apply" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"> 
                                        <?php echo esc_html( $link_title ); ?>
                                        </a>
                                     <?php endif; ?>                                                                    
                                </div>
                        <?php 
                        $animation_delay += 0.25;  } 
                        } 
                        ?>   
                    </div>  
					 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center m-t1 mt-lg-3 m-b1">                       
                        <?php if($title_app): ?>
                            <h4 class="text-uppercase mt-0 cl-blue wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $title_app; ?></h4>
                        <?php endif; ?> 
                        <?php if (have_rows('button_list_app')) {  ?> 
                                <div class="button-list m-t2 center-xs">  
                            <?php while (have_rows('button_list_app')) { 
                                the_row(); $cta = get_sub_field('button_cta'); ?>
                                <?php if( $cta ):
                                    $link_url = $cta['url'];
                                    $link_title = $cta['title'];
                                    $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                                    ?>                                    
                                         <a tabindex="0" class="btn cta-btn wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                        <?php echo esc_html( $link_title ); ?>                          
                                        </a> 
                                <?php endif; ?>
                                <?php } ?>
                                </div>
                       <?php } ?>
                    </div> 
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center m-t1 mt-lg-3">                       
                        <?php if($title_buttons): ?>
                            <h4 class="text-uppercase mt-0 cl-blue wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $title_buttons; ?></h4>
                        <?php endif; ?> 
                        <?php if (have_rows('button_list')) {  ?> 
                                <div class="button-list m-t2 center-xs">  
                            <?php while (have_rows('button_list')) { 
                                the_row(); $cta = get_sub_field('button_cta'); ?>
                                <?php if( $cta ):
                                    $link_url = $cta['url'];
                                    $link_title = $cta['title'];
                                    $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                                    ?>                                    
                                         <a tabindex="0" class="btn cta-btn wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                        <?php echo esc_html( $link_title ); ?>                          
                                        </a> 
                                <?php endif; ?>
                                <?php } ?>
                                </div>
                       <?php } ?>
                    </div>                
                  </div>
                </div> 
            </div> 
        </section> 
<?php 
    } 
} 
?>
