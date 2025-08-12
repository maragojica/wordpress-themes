<?php
$store_locator = get_field('store_locator');
if ($store_locator) {
    $subheading = $store_locator['subheading'];
    $heading = $store_locator['heading'];

    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';

    //Spacing Settings
    $spacing = $store_locator['spacing'];
    $spacing_top_desktop = $store_locator['spacing_top_desktop'];
    $spacing_bottom_desktop = $store_locator['spacing_bottom_desktop'];
    $spacing_top_mobile = $store_locator['spacing_top_mobile'];
    $spacing_bottom_mobile = $store_locator['spacing_bottom_mobile'];

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
        case 'xlarge':
            $spacing_class = 'padding-xlarge';
            break;
    }

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;    
?>

<section class="store-locator relative max-w-full <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?> <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto">
       <div class="w-full mx-auto text-center">
        <?php if ($subheading) : ?>
        <div class="text-sub text-secondary mb-[15px]" data-aos="fade-up" >
            <?php echo $subheading; ?>
        </div> 
        <?php endif; ?>
        <?php if($heading): ?>
            <h2 class="text-primary uppercase" data-aos="fade-up" >
                    <?php echo $heading; ?>
             </h2> 
        <?php endif; ?> 
        </div>    
        <div class="store-locator mt-[28px]" data-aos="fade-up">
            <?php echo do_shortcode('[laz-store-locator]'); ?>
        </div>
    </div>
</section>

<?php }
?>
