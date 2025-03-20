<?php
$content_block = get_field('content_snapshots');
if ($content_block) {
    
    $heading = $content_block['heading'];      
    $columns_content = $content_block['columns_content'];

 

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

<section class="snapshots-section max-w-full relative bg-primary <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto">           
        <div class="w-full animate__animated" data-animation="fadeIn" data-duration="1.5s">      
            <h3 class="mb-0 text-center uppercase text-white animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <?php echo $heading; ?>
            </h3>                                   
        </div>
        <?php if($columns_content): $animation_delay = 1; ?>
        <div class="flex flex-wrap justify-center -mx-[15px]">   
            <?php foreach ($columns_content as $column) : 
                
                 $image = $column['image'];
                 $title = $column['title'];     
                 $description = $column['description'];           
                 $duration = $animation_delay . 's'; ?>
                <div class="w-full lg:w-1/2 px-[15px] mt-[1.5em] lg:mt-[44px] h-[400px] xl:h-[450px] 2xl:h-[500px] animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                    <div class="flex flex-col h-full justify-end rounded-[5px] overflow-hidden relative bg-cover bg-no-repeat bg-center" <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?>>                   
                    <div class="flex flex-col">
                    <?php if($title): ?>
                        <h4 class="text-black bg-white px-[20px] pt-[14px] w-fit -mb-[30px] z-1"><?php echo $title; ?></h4>
                    <?php endif; ?>                   
                    <?php if($description): ?>
                        <div class="flex-grow info-text text-black bg-white w-full px-[20px] pt-[37px] pb-[19px] px-[20px]"><?php echo $description; ?></div>
                    <?php endif; ?>   
                   </div>  
                    </div>                                 
               </div>
            <?php $animation_delay += 0.75; endforeach; ?>      
        </div>
        <?php endif; ?>  
    </div>
</section>

<?php }
?>

