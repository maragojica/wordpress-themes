<?php 
        // Fetch the sub-fields      
        $section_id = get_field('audio_blog_id');      
        $heading = get_field('audio_blog_title'); 
        $padding_top_desktop = get_field('padding_top_desktop_audio'); 
        $padding_bottom_desktop = get_field('padding_bottom_desktop_audio');       
        $padding_top_mobile = get_field('padding_top_mobile_audio'); 
        $padding_bottom_mobile = get_field('padding_bottom_mobile_audio'); ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-info <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
            <div class="container">
                <div class="row middle-xs"> 
                    <div class="col-xs-12">                      
                        <?php if ($heading) : ?>
                            <h2 class="text-uppercase cl-orange text-center mt-0 mb-10px mb-lg-1 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $heading; ?></h2>
                        <?php endif; ?>                                            
                    </div>
                </div>
                <div class="row m-t1 row-audio wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3"> 
                    <?php $cat_id = 17;
                    $query = array(
                        'post_type' => array( 'post' ),  //Last 3 Posts From Audio Category
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'desc',
                        'posts_per_page' => -1,
                        'cat' => $cat_id,
                    ); 
                    $allpost = new WP_Query($query);
                    if ( $allpost->have_posts() ) : $i = 1;
                       while($allpost->have_posts()) : $allpost->the_post();  $audio = get_field('audio_file');  ?>
                       <div class="col-audio col-xs-12 col-lg-4 m-b2" >
                          <div class="box-post">                          
                            <div class="content-post">
								<?php if (has_post_thumbnail()) : ?>
								  <a href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>" class="image-link">
									<?php the_post_thumbnail('medium_large', array('class' => 'img-fluid')); ?>
								  </a>
								<?php endif; ?>
                               <h3 class="text-uppercase cl-green cl-orange-h mt-1"><a href="<?php the_permalink(); ?>" class="cl-green cl-orange-h" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>" tabindex="0" ><?php echo the_title();?></a></h3>                
                            <?php 
                            if ( has_excerpt() ) {
                            $excerpt = get_the_excerpt(); ?>
                                <div class="dp-1 cl-off-black"><?php echo wp_kses_post($excerpt); ?></div>
                            <?php } ?>
                            </div>
                            <div class="footer-post">
                                <div class="entry-date"><?php the_time('F j, Y'); ?></div>
                                <a href="<?php the_permalink(); ?>" class="read-more" tabindex="0" aria-label="Listen Now" title="Listen Now">Listen Now</a>
															
                            </div>
                        </div>
                       </div>
                       <?php $i++; endwhile; ?>
                     <?php endif; wp_reset_postdata(); ?>                   
                </div>
            </div>            
        </section>

