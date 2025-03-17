<?php       
if (have_rows('the_team')) :          
    while (have_rows('the_team')) : the_row();

        // Fetch the sub-fields      
        $section_id = get_sub_field('section_id');      
        $bg_graphic  = get_sub_field('section_bg_image');
         $bg_color = get_sub_field('section_bg_color');            
        $headline = get_sub_field('heading');     
        $subheadline = get_sub_field('subheading'); 
        $main_team = get_sub_field('main_team');
        $margin_top_desktop = get_sub_field('margin_top_desktop'); 
        $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');       
        $margin_top_mobile = get_sub_field('margin_top_mobile'); 
        $margin_bottom_mobile = get_sub_field('margin_bottom_mobile'); ?>
     
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-team w-margin p-t0 p-b0 <?php if(!$margin_top_desktop): echo ' m-t0'; endif; if(!$margin_bottom_desktop): echo ' m-b0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>">
            <div class="container">
                <div class="row center-xs">
                    <div class="col-xs-12 col-lg-8 text-center">                      
                        <?php if ($subheadline) : ?>
                            <div class="subheadline text-uppercase m-b1 cl-slate wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                            <?php endif; ?>
                            <?php if ($headline) : ?>
                                <h2 class="cl-slate m-t0 m-b1 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                            <?php endif; ?>                           
                    </div>
                </div>
            </div>
            <div class="content-team" <?php if($bg_color){ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>
            <?php if(!empty($bg_graphic)): 
                $srcset = wp_get_attachment_image_srcset($bg_graphic['ID']);
                $sizes = wp_get_attachment_image_sizes($bg_graphic['ID'], 'full'); ?>                
                    <img class="shape-bg img-fluid w-100 h-100 fit-cover-center" src="<?php echo esc_url($bg_graphic['url']); ?>" alt="<?php echo esc_attr($bg_graphic['alt']); ?>" height="525" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                <?php endif; ?>    
            <div class="overlay overlay-team">
                <div class="container">
                <?php if( $main_team ): $animation_delay = 1; ?>
                    <div class="row center-xs">
                      <?php $i = 1; foreach( $main_team as $post ): 
                      setup_postdata($post); 
                            $title = get_the_title(); 
                            $position = get_field("position");
                            $description = get_field("content"); 
                            $duration = $animation_delay . 's'; ?>
                            <div class="col-xs-12 col-md-6 col-lg-4 mb-lg-0 m-b2 col-team wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.2s">
                              <div class="box-team-member w-100">                              
                                <div class="img w-100">
                                    <a class="w-100 h-100" tabindex="0" aria-label="<?php echo $title;?>" title="<?php echo $title;?>" href="#modal-team-<?php echo $i;?>" uk-toggle>
                                    <?php echo get_the_post_thumbnail( get_the_id(), 'full', array( 'class'  => 'team-img w-100 fit-cover-center' ) ); ?>
                                    </a>
                                </div>
                                <div class="info text-center m-t2">
                                    <h3 class="cl-white text-uppercase m-b0"><?php echo $title;?></h3>
                                    <?php if($position): ?><p class="dp-2 cl-white"><?php echo $position;?></p><?php endif; ?>
                                </div>                                
                            </div>
                            </div>
                            <div id="modal-team-<?php echo $i;?>" class="uk-flex-top" uk-modal>
                            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

                                <button class="uk-modal-close-default" type="button" uk-close></button>

                                <h3 class="cl-burnt-rose text-uppercase"><?php echo $title;?></h3>

                                <?php if($description): ?><div class="dp-1 cl-off-black"><?php echo $description; ?></div><?php endif; ?>

                            </div>
                        </div>
                                <?php $animation_delay += 0.25; $i++; endforeach; ?>
                        </div>        
                       
                    <?php wp_reset_postdata(); endif; ?> 
                </div>               
            </div>  
            </div>          
        </section>
        <?php              
            endwhile;
        endif; ?>

