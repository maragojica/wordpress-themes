<?php
$content_block = get_field('content_locations');
if ($content_block) {
    $heading = $content_block['heading'];      
    $subheading = $content_block['subheading']; 
    $description = $content_block['description'];   
    $list_locations = $content_block['list_locations']; 

 
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

    
    //Container Full

    $container_classes = 'h-full flex flex-col ';
    $heading_width = 'w-full'; 
    $content_width = 'w-full';   
?>

<section class="locations-section max-w-full relative overflow-hidden lg:h-fit <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto">  
     <div class="<?php echo esc_attr($container_classes); ?> md:gap-y-[50px] gap-y-[3em]">  
        <div class="<?php echo esc_attr($heading_width); ?>">
        <?php if ($subheading) : ?>
            <div class="text-sub text-[#0066CA] mb-[15px]" data-aos="fade-up" >
                <?php echo $subheading; ?>
            </div> 
            <?php endif; ?>
            <?php if($heading): ?>
                <h2 class="text-primary uppercase mb-0" data-aos="fade-up" >
                    <?php echo $heading; ?>
                </h2> 
            <?php endif; ?>    
            <?php if($description): ?>
                    <div class="text-black style-disc mt-[15px]" data-aos="fade-up"  >                 
                        <?php echo $description; ?>                   
                    </div>
                 <?php endif; ?> 
        </div> 
        <div class="<?php echo esc_attr($content_width); ?>" data-aos="fade-up" >
        <?php if ($list_locations):  ?>       
        <div class="h-full flex flex-col sm:flex-row items-stretch flex-wrap md:mx-[-15px]">   
        <?php foreach ($list_locations as $column_slider): 
                $title = $column_slider['heading'];           
                $text = $column_slider['text']; ?>    
                <!-- Step Card -->
               <div class="w-full md:w-1/2 lg:w-1/4 md:px-[15px] mb-[30px]" data-aos="fade-up" >
                <div class="flex items-center h-full w-full relative hover:-translate-y-1 transition-transform duration-300" >
                <div class="bg-white border-2 h-full border-white shadow-[0px_4px_11px_1px_rgba(0,0,0,0.18)] p-[20px] lg:p-[22px] xl:p-[40px] rounded-none w-full">
                    <?php if($title): ?><h4 class="text-[#0066CA] font-bold uppercase mb-[15px]"><?php echo $title; ?></h4><?php endif; ?>
                    <?php if($text): ?>
                        <div class="text-[#00194C] style-disc">                 
                            <?php echo $text; ?>                   
                        </div>
                    <?php endif; ?> 
                </div>
             </div>
            </div>
        <?php endforeach; ?>   
        </div>
    <?php endif; ?>   
        </div>                 
    </div>   
</section>

<?php }
?>

