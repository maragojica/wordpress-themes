<?php
$content_block = get_field('content_snapshots');
if ($content_block) {
    
    $heading = $content_block['heading'];  
    $full_width = $content_block['full_width'];      
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

<section class="snapshots-section max-w-full relative bg-primary <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto">
        <?php if($full_width): ?>           
        <div class="w-full animate__animated" data-animation="fadeIn" data-duration="1.5s">      
            <h3 class="mb-0 text-center uppercase text-white animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <?php echo $heading; ?>
            </h3>                                   
        </div>
        <?php endif; ?>
        <?php if($columns_content): $animation_delay = 1; ?>
        <div class="flex flex-wrap -mx-[15px]">   
           <?php if(!$full_width): ?>
                <div class="w-full lg:w-1/2 px-[15px] lg:mt-[44px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <h2 class="mb-0 lg:mt-[100px] text-left uppercase text-white">
                <?php echo $heading; ?>
                </h2>
                </div>
            <?php endif; ?>
            <?php foreach ($columns_content as $column) : 
                
                 $image = $column['image'];
                 $title = $column['title'];     
                 $description = $column['description'];      
                 $link = $column['link'];      
                 $duration = $animation_delay . 's'; ?>
                <div class="snapst w-full flex lg:w-1/2 px-[15px] mt-[1.5em] lg:mt-[44px] animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                    <div class="flex flex-col w-full h-full justify-between rounded-[5px] overflow-hidden relative" > 
                     <div class="w-full h-[300px] lg:h-[400] xl:h-[430px] bg-cover bg-no-repeat bg-top" <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?>></div>  
                        <div class="flex-grow w-full bg-white relative z-1">
                            <?php if($title): ?>
                            <h4 class="text-black bg-white px-[20px] pt-[14px] mb-0 w-fit max-w-[90%] [border-radius:0px_5px_0px_0px] mt-[-37px]"><?php echo $title; ?></h4>
                            <?php endif; ?>
                            <div class="info-text w-full text-black px-[20px] pt-[15px] pb-[30px] px-[20px]  bg-white"><?php echo $description; ?>
                            <?php if($link): 
                                $url = $link['url'];
                                $title = $link['title'];
                                $target = $link['target'] ? $link['target'] : '_self';  ?>   
                                <div class="pt-[20px]">                    
                                <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="simple-link">
                                    <?php echo esc_html($title); ?>
                                </a>  
                                </div>
                            <?php endif; ?>
                            </div>
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

