<?php
$content_block = get_field('content_values');
if ($content_block) {
    
    $heading = $content_block['heading'];      
    $values_content = $content_block['values'];

 

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

<section class="values-section max-w-full relative bg-white <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto">  
        <?php if($values_content): ?>
        <div class="flex flex-wrap md:flex-row flex-col gap-y-[32px]">
            <div class="w-full md:w-1/2 lg:w-1/3 flex items-center md:justify-start justify-center">
                <?php if ($heading) : ?>
                    <h2 class="text-primary text-center md:text-left mb-[20px] lg:mb-[1em] animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $heading; ?>
                    </h2>              
                <?php endif; ?>  
            </div>
            <?php foreach ($values_content as $column) : 
                
                 $logo = $column['logo'];
                 $title = $column['title'];  ?>
                <div class="w-full md:w-1/2 lg:w-1/3 md:px-[15px]">
                    <div class="w-full h-full p-[20px] md:p-[25px] rounded-[10px] border-[1px] border-secondary">
                        <?php if(!empty($logo)): ?>
                        <img class="md:w-[89px] md:h-[89px] w-[70px] h-[70px]" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                        <?php endif; ?>
                        <?php if($title): ?>
                            <h4 class="lg:mt-[32px] mt-[15px] text-primary"><?php echo $title; ?></h4>
                        <?php endif; ?>
                    </div>   
                </div>
            <?php endforeach; ?>      
        </div>
        <?php endif; ?>  
    </div>
</section>

<?php }
?>

