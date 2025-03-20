<?php
$content_block = get_field('content_block_perks');
if ($content_block) {
    
    $heading = $content_block['heading'];    
    $perks = $content_block['perks_colums'];       

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
       
 
    $container_classes = 'h-full flex flex-col ';
    $row_classes = 'items-center';
    $heading_width = 'w-full'; 
    $content_width = 'w-full  mx-auto';      
   
?>

<section class="perks-section overflow-hidden max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    
    <div class="container mx-auto">     
       <div class="<?php echo esc_attr($container_classes); ?> gap-y-[2em]">
          <div class="<?php echo esc_attr($heading_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <div class="flex flex-col justify-center <?php echo esc_attr($row_classes); ?>">
                <?php if ($heading) : ?>
                <div class="relative w-full">                    
                    <h2 class="text-primary relative bg-white z-[2] pr-[30px] md:pr-[50px] w-fit animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $heading; ?>
                    </h2>
                    <div class="h-[1px] z-[1] w-full bg-[#DAD6D6] absolute left-0 top-[50%]"></div>
                </div>               
                <?php endif; ?> 
                </div>
            </div> 
            <?php if($perks): ?>
            <div class="<?php echo esc_attr($content_width); ?> flex flex-wrap lg:flex-row flex-col animate__animated" data-animation="fadeIn" data-duration="1.2s" > 
                <?php foreach ($perks as $perks_info) : ?>
                    <?php 
                    $perks_list = $perks_info['perks_list'];   ?>               
                    <div class="w-full lg:w-1/3 lg:pr-[20px]">
                    <?php foreach ($perks_list as $perk) : 
                     $text = $perk['text'];
                        if($text): ?>
                        <div class="flex gap-[32px] pb-[20px]">
                            <div class="bullet"></div>
                                <div class="text-sub text-tertiary font-medium"><?php echo esc_html($text); ?></div>
                            </div>
                        <?php endif; ?>  
                    <?php endforeach; ?>
                    </div>                         
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>  
    </div>    
</section>

<?php }
?>

