<?php       
if (have_rows('recent_blog')) :          
    while (have_rows('recent_blog')) : the_row();

        // Fetch the sub-fields      
        $section_id = get_sub_field('section_id');
        $section_bg_color = get_sub_field('section_bg_color'); 
        $image = get_sub_field('logo');            
        $description = get_sub_field('description');       
        $cta = get_sub_field('button_cta'); 
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
        $reverse_mobile = get_sub_field('reverse_mobile'); 
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-recent-blog  <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($section_bg_color): ?>style="background-color: <?php echo $section_bg_color; ?>"<?php endif; ?>  >
            <div class="container">
                <?php if(!empty($image) || $description): ?>
                    <div class="row">
                        <div class="col-xs-12 text-center">
                        <?php if ( !empty($image)) : 
                            $srcset = wp_get_attachment_image_srcset($image['ID']);
                            $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>    
							 <?php if( $cta ):
									$link_url = $cta['url'];
									$link_title = $cta['title'];
									$link_target = $cta['target'] ? $cta['target'] : '_self'; ?>   
							<a tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"> <?php endif; ?>
                            <img class="img-observatory" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="112" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" />      
						     <?php if( $cta ): ?>
							</a>
							<?php endif; ?>
                        <?php endif; ?>  
                        <?php if ($description) : ?>
                            <div class="main-description p-b2 dp-1 cl-orange"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?> 
                        </div>
                    </div>
                 <?php endif; ?>   
                <div class="row m-t1"> 
                    <?php $cat_audio_id = 17; $query = array(
                        'post_type' => array( 'post' ),  //Last 3 Posts
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'desc',
                        'posts_per_page' => 3,
	                    'cat' => -$cat_audio_id,
                    ); 
                    $allpost = new WP_Query($query);
                    if ( $allpost->have_posts() ) : $animation_delay = 0.4;
                       while($allpost->have_posts()) : $allpost->the_post(); $duration = $animation_delay . 's'; ?>
                       <div class="col-xs-12 col-lg-4 m-b2 mb-lg-0" >
                          <div class="box-post">
                            <div class="content-post">
								<?php if (has_post_thumbnail()) : ?>
								  <a href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>" class="image-link">
									<?php the_post_thumbnail('medium_large', array('class' => 'img-fluid')); ?>
								  </a>
								<?php endif; ?>
                               <h3 class="text-uppercase cl-green cl-orange-h mt-1"><a class="cl-green cl-orange-h" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>" tabindex="0" href="<?php echo esc_url(get_permalink());?>"><?php echo the_title();?></a></h3>                
                            <?php 
                            if ( has_excerpt() ) {
                                $excerpt = get_the_excerpt(); 
                                $excerpt_length = 16;
                                $excerpt = get_the_excerpt();
                                $trimmed_excerpt = wp_trim_words($excerpt, $excerpt_length); ?>
                                <div class="dp-1 cl-off-black"><?php echo wp_kses_post($trimmed_excerpt); ?></div>
                            <?php } ?>
                            </div>
                            <div class="footer-post">
                                <div class="entry-date"><?php the_time('F j, Y'); ?></div>
                                <a href="<?php the_permalink(); ?>" class="read-more" tabindex="0" aria-label="Read More" title="Read More">Read More</a>
                            </div>
                        </div>
                       </div>
                       <?php $animation_delay += 0.1; endwhile; ?>
                     <?php endif; wp_reset_postdata(); ?>                   
                </div>
                <?php if( $cta ):
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>    
                      <div class="row m-lg-t3 center-xs">
                        <div class="col-xl-12">
                        <a tabindex="0" class="cta-button cl-orange cl-green-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                         <?php echo esc_html( $link_title ); ?>
                            <svg class="arrow-passive" xmlns="http://www.w3.org/2000/svg" width="45" height="6" viewBox="0 0 45 6" fill="none">
                            <path d="M44.1651 3L42 0.834936L39.8349 3L42 5.16506L44.1651 3ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#BB6C29"/>
                            </svg> 
                            <svg class="arrow-active" xmlns="http://www.w3.org/2000/svg" width="43" height="6" viewBox="0 0 43 6" fill="none">
                                <path d="M42.2652 3.26517C42.4116 3.11872 42.4116 2.88128 42.2652 2.73483L39.8787 0.34835C39.7322 0.201903 39.4948 0.201903 39.3483 0.34835C39.2019 0.494796 39.2019 0.732233 39.3483 0.87868L41.4697 3L39.3483 5.12132C39.2019 5.26777 39.2019 5.5052 39.3483 5.65165C39.4948 5.7981 39.7322 5.7981 39.8787 5.65165L42.2652 3.26517ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#024325"/>
                            </svg>
                         </a> 
                        </div>
                      </div> 
                <?php endif; ?> 
            </div>            
        </section>
<?php              
    endwhile;
endif; ?>

