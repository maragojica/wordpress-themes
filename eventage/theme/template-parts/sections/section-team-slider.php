<?php

$team_members = get_field('team_members', 'option');
$heading = get_field('headline', 'option');
$subheading = get_field('subheadline', 'option');

global $post;
$global_post_id = $post->ID;
    
?>

<section class="team-slider-section max-w-full relative padding-medium" >
    <div class="container mx-auto">  
        <div class="w-full">
        <?php if ($subheading) : ?>
                <h6 class="text-primary mb-[10px] w-100 animate__animated" data-animation="fadeIn" data-duration="1.1s"><?php echo esc_html($subheading); ?></h6>
            <?php endif; ?>
            <?php if($heading): ?>
            <h3 class="text-black uppercase mb-0 animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <?php echo $heading; ?>
            </h3>  
            <?php endif; ?>
        </div>  
    </div>
    <div class="w-full pl-contain mx-auto">
    <?php if($team_members): ?>
            <div class="slider mt-[32px] pb-[60px]">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                      <?php foreach( $team_members as $post ): 
                        setup_postdata($post); 
                        $title = get_the_title($post->ID); 
                        $position = get_field('position', $post->ID); 
                        $fun_image = get_field('fun_image', $post->ID);
                        if($global_post_id != $post->ID): ?>
                        <div class="swiper-slide">
                            <a class="w-full h-full block" href="<?php the_permalink($post->ID); ?>" tabindex="0" aria-label="<?php echo $title; ?>" title="<?php echo $title; ?>">
                                <div class="team-box-slide relative w-full h-[17em] sm:h-[20em] md:h-[310px] lg:h-[360px] group">
                                <!-- Title on top -->
                                <div class="absolute bottom-0 left-0 z-[1] w-full h-auto min-h-[123px] bg-opacity-50 py-[15px] px-[22px] flex flex-col justify-end bg-[linear-gradient(180deg,_rgba(0,0,0,0)_13.55%,_#000_93.7%)]">
                                <?php if($title): ?>
                                    <h4 class="text-primary mb-0"><?php echo $title; ?></h4>
                                <?php endif; ?>    
                                <?php if($position): ?>
                                    <h6 class="text-white mb-0"><?php echo $position; ?></h6>
                                <?php endif; ?>    
                                </div>
                                <?php 
                                if ( has_post_thumbnail( $post->ID ) ): 
                                    echo get_the_post_thumbnail( 
                                        $post->ID,
                                        'full', 
                                        array( 
                                            'class' => 'w-full h-full object-cover object-top transition-opacity duration-300 group-hover:opacity-0'
                                        ) 
                                    ); 
                                endif; 
                                ?>
                                <?php  if(!empty($fun_image)): 
                                    echo wp_get_attachment_image(
                                        $fun_image['ID'],
                                        'full',
                                        false,
                                        array(
                                            'class' => 'absolute inset-0 w-full h-full object-cover object-top opacity-0 transition-opacity duration-300 group-hover:opacity-100',
                                            'alt' => esc_attr($fun_image['alt']),
                                        )
                                    );
                                endif;  ?> 
                            </div>
                            </a>
                        </div>
                       <?php endif; endforeach; ?>  
                    </div>
                    <!-- pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- scrollbar -->
                    <div class="swiper-scrollbar"></div>
                    <!-- buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                  
                </div> 
                </div>
         <?php wp_reset_postdata(); endif; ?>     
    </div>
</section>


