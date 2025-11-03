<?php
$content_block = get_field('content_block_subscribe');
if ($content_block) {

    $heading = $content_block['heading'];
    $form_shortcode = $content_block['form_shortcode'];       
    $bg_color = $content_block['bg_color']; 
    $image = $content_block['image'];   

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

    if($bg_color === 'white'){
        $bg_class = 'bg-white';
    } elseif($bg_color === 'neutral'){
        $bg_class = 'bg-neutral';
    } 
   
?>

<section class="subscribe-section max-w-full relative <?php if($bg_color): echo $bg_class; endif; ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?> <?php echo esc_attr($className); ?> " <?php echo $anchor_attr; ?>> 
    <div class="box-media-hero  w-full h-fit relative flex items-center bg-cover bg-no-repeat bg-center" <?php if($image): ?>style="background-image: url('<?php echo esc_url($image['url']); ?>');" <?php endif; ?>>

        <div class="box-overlay h-full w-full z-[2] py-[3em] lg:py-[70px] bg-[rgba(94,110,172,0.7)]">
            <div class="container mx-auto">
                 <div class="w-full lg:max-w-[80%] mx-auto text-center lg:text-left">
                    <?php if ($heading) : ?>
                            <h2 class="text-white mb-0" data-aos="fade-in" >
                                <?php echo $heading; ?>
                            </h2> 
                    <?php endif; ?>
                    <?php if($form_shortcode): ?>
                    <div class="mt-[10px] contact-form subscribe"  data-aos="fade-in"><?php echo do_shortcode($form_shortcode);  ?></div>
                    <?php endif; ?>
                   </div>   
            </div>
        </div>
    </div>    
</section>

<?php }
?>
