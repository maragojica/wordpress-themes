<?php
$content_block = get_field('content_block_testimonials');
if ($content_block) {

    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];    
    $testimonials = $content_block['testimonials'];   
    $bg_color = $content_block['bg_color'];
    $bg_image = $content_block['bg_image']; 

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';

    //Spacing Settings
    $spacing = $content_block['spacing'];
    $spacing_top_desktop = $content_block['spacing_top_desktop'];
    $spacing_bottom_desktop = $content_block['spacing_bottom_desktop'];
    $spacing_top_mobile = $content_block['spacing_top_mobile'];
    $spacing_bottom_mobile = $content_block['spacing_bottom_mobile'];

    $spacing_class = '';
    switch ($spacing) {
       case 'xsmall':
            $spacing_class = 'padding-xsmall';
            break;
        case 'small':
            $spacing_class = 'padding-small';
            break;
        case 'medium':
            $spacing_class = 'padding-medium';
            break;
        case 'large':
            $spacing_class = 'padding-large';
            break;
    }

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;      
   
?>

<section class="testimonials-section max-w-full relative <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?> <?php echo esc_attr($className); ?> " <?php echo $anchor_attr; ?>> 
    <div class="content-testimonials relative w-full bg-cover bg-no-repeat bg-center" <?php if($bg_image): ?>style="background-image: url('<?php echo esc_url($bg_image['url']); ?>');" <?php endif; ?>>
        <div class="overlay w-full h-full py-[3em] lg:py-[80px] <?php if($bg_color): ?>" style="background-color: <?php echo esc_attr($bg_color); ?>; <?php endif; ?>">
                <div class="container mx-auto">
                    <div class="bg-white rounded-[10px] px-[1.5em] py-[2em] lg:p-[46px] flex flex-col justify-center items-center text-center">
                        <?php if($subheading): ?>
                            <div class="eyebrow text-quaternary mb-[20px]"  >
                                <?php echo $subheading; ?>
                            </div>   
                        <?php endif; ?> 
                        <?php if ($heading) : ?>
                        <h2 class="text-foreground mb-0" data-aos="fade-in" >
                            <?php echo $heading; ?>
                        </h2> 
                        <?php endif; ?> 
                        <?php if($testimonials): ?>
                            <div class="testimonials-carousel owl-carousel owl-theme relative z-[3] w-full mt-5 lg:mt-8 lg:px-[65px]">
                                <?php foreach ($testimonials as $testimonial_post): ?>
                                    <?php 
                                        $post_id = $testimonial_post->ID;
                                        $content = apply_filters('the_content', $testimonial_post->post_content);
                                        $name = get_the_title($post_id);
                                    ?>
                                    <div class="testimonial-item item text-center px-5">
                                        <?php if ($content): ?>
                                            <div class="testimonial-description text-large text-foreground style-disc">
                                                <?php echo $content; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($name): ?>
                                            <div class="eyebrow text-quaternary mt-4">
                                                - <?php echo esc_html($name); ?>.
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>                         
                        <?php endif; ?>
                          
                    </div>
                </div>
        </div>
    </div>       
</section>

<?php }
?>
