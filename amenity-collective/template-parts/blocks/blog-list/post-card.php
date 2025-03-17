<?php
$post_id = get_the_ID();
$title = get_the_title();
$permalink = get_permalink();
?>
<div class="w-full px-3 mt-[20px] lg:mt-[36px] sm:w-1/2 lg:w-1/3 group post-card" data-post-id="<?php echo esc_attr($post_id); ?>">
    <div class="flex flex-col h-full">
        <?php if (has_post_thumbnail()): ?>
            <a class="relative overflow-hidden" href="<?php echo esc_url($permalink); ?>" >
                <?php the_post_thumbnail('full', array(
                    'class' => 'w-full h-[11em] md:h-[400px] lg:h-[305px] w-full object-cover object-center hover:scale-110 group-hover:scale-110 transition-transform duration-300'
                )); ?>
            </a>
        <?php endif; ?>
        
        <div class="flex flex-grow justify-start flex-wrap flex-col p-[30px] xl:p-[48px] bg-blueinfo-dark group-hover:bg-primary transition-all ease-in-out duration-300">
            <div class="text-tertiary-dark uppercase text-[14px] sm:text-[16px] font-primary-font font-medium tracking-[1.6px] mb-[5px] transition-all ease-in-out duration-300 group-hover:text-tertiary-light">
                <?php echo get_the_time('M j, Y'); ?>
            </div>
            
            <?php if($title): ?>
                <h4 class="text-primary mb-0">
                    <a class="text-primary hover:text-white group-hover:text-white" target="_blank" href="<?php echo esc_url($permalink); ?>" >
                        <?php echo esc_html($title); ?>
                    </a>
                </h4>
            <?php endif; ?>
        </div>
    </div>
</div>