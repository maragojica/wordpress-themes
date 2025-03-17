<?php
if($featured_post):  
    $featured_ID = $featured_post->ID; 
    $featured_title = get_the_title($featured_ID);
    $featured_permalink = get_permalink($featured_ID);
    $featured_excerpt = $featured_post->post_excerpt;    
    if (empty($featured_excerpt)) {
        $featured_excerpt = wp_trim_words(get_the_content(null, false, $featured_ID), 18, '...'); 
    } else {
        $word_limit = 18; 
        $word_count = str_word_count(strip_tags($featured_excerpt));
        if ($word_count > $word_limit) {
            $featured_excerpt = wp_trim_words($featured_excerpt, $word_limit, '...');
        }
    }
?>
    <div class="w-full mx-auto border-b-[12px] border-b-primary bg-blueinfo-dark pl-0 pr-contain">
        <div class="h-full flex items-stretch flex-col lg:flex-row gap-y-0 lg:gap-y-0 lg:gap-x-[2rem] xl:gap-x-[76px] pl-[1rem] pr-0 lg:px-0">
            <?php if (has_post_thumbnail($featured_ID)): 
                $featured_image_url = get_the_post_thumbnail_url($featured_ID, 'full'); ?>
                <div class="w-full lg:w-[50%] xl:w-[60%] 2xl:w-[70%] animate__animated" data-animation="fadeIn" data-duration="1.5s">
                    <img class="w-full lg:h-full h-fit object-cover object-center" 
                         src="<?php echo esc_url($featured_image_url); ?>" 
                         alt="<?php echo esc_attr($featured_title); ?>">
                </div>
            <?php endif; ?>
            
            <div class="w-full lg:w-[50%] xl:w-[40%] 2xl:w-[30%] flex-1 flex flex-col justify-center px-0 py-[20px] lg:py-[50px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <div class="text-secondary uppercase font-text-font text-[12px] sm:text-[24px] font-bold sm:mb-[20px] mb-[5px]">
                    FEATURED NEWS
                </div>
                <?php if($featured_title): ?>
                    <h3 class="text-primary mb-0">
                        <a class="text-primary hover:text-foreground" href="<?php echo esc_url($featured_permalink); ?>" aria-label="<?php echo esc_html($featured_title); ?>" title="<?php echo esc_html($featured_title); ?>">
                            <?php echo esc_html($featured_title); ?>
                        </a>
                    </h3>
                <?php endif; ?>
                
                <div class="text-tertiary-dark uppercase text-[14px] sm:text-[16px] font-primary-font font-medium tracking-[1.6px] sm:mt-[20px] mt-[5px]">
                    <?php echo get_the_time('M j, Y', $featured_ID); ?>
                </div>
                
                <?php if($featured_excerpt): ?>
                    <div class="font-text-font text-tertiary-dark font-semibold sm:mt-[20px] mt-[5px] style-disc">
                        <p class="text-tertiary-dark"><?php echo wp_kses_post($featured_excerpt); ?></p>
                    </div>
                <?php endif; ?>
                
                <div class="w-full flex flex-wrap gap-4 justify-start sm:mt-[20px] mt-[10px]">
                    <a href="<?php echo esc_url($featured_permalink); ?>" target="_blank" class="min-w-min btn btn_style4" arial-label="Read More" title="Read More">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>