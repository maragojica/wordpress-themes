<?php
$content_block = get_field('content_slider');
if ($content_block) {
    
    $heading = $content_block['heading'];     
    $subheading = $content_block['subheading']; 
    $slider_content = $content_block['slider'];

 

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

<section class="slider-section relative h-[461px] max-w-full <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <?php if($slider_content): ?>
        <div class="slider-banner-cta owl-carousel owl-theme h-full">
            <?php foreach ($slider_content as $column) :
                 $image = $column['image']; ?>
                  <div class="slide m-0 h-[461px] bg-cover bg-center bg-no-repeat flex items-center justify-center w-full" <?php if($image): ?> style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?>>
                </div>
            <?php endforeach; ?>      
        </div>
        <?php endif; ?>  
        <div class="overlay absolute w-full h-full top-0 right-0 flex justify-end items-end z-[1]">
        <div class="container mx-auto"> 
            <div class="flex items-end">
            <div class="bg-primary rounded-t-[10px] py-[30px] px-[30px] lg:py-[45px] lg:px-[47px] ml-auto lg:max-w-[655px]">
                <?php if( $subheading): ?>
                    <h6 class="text-white mb-[20px]"><?php echo $subheading; ?></h6>
                <?php endif; ?> 
                <?php if($heading): ?>
                    <h4 class="text-white"><?php echo $heading; ?></h4>
                <?php endif; ?>       
            </div>
            </div>
        </div>
        </div>
 </section>
<?php }
?>

