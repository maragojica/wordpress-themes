<?php
$content_block = get_field('content_insta');
if ($content_block) {
    
    $heading = $content_block['heading'];      
    $social_shortcode = $content_block['insta'];

 

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

<section class="insta-feed-section min-h-[347px] max-w-full mb-[27px] relative bg-white <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="w-full pr-contain not-rp mx-auto">           
        <div class="w-full flex md:flex-row flex-col-reverse md:items-start items-center md:gap-[36px] gap-[2em] animate__animated" data-animation="fadeIn" data-duration="1.5s">   
            <div class="social-content w-full md:text-right text-center wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.2s">
                    <?php if($social_shortcode): echo $social_shortcode; endif; ?>                                        
            </div>    
            <h5 class="mb-0 md:text-left text-center uppercase md:w-[24px] lg:w-[65px] md:rotate-90 whitespace-nowrap text-black animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <?php echo $heading; ?>
            </h5>                                   
        </div>        
    </div>
</section>

<?php }
?>

