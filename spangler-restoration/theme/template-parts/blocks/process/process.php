<?php
$content_block = get_field('content_process');
if ($content_block) {
    $heading = $content_block['heading'];      
    $subheading = $content_block['subheading']; 
    $description = $content_block['description'];   
    $slider = $content_block['info_process']; 

    $reverse_desktop = in_array('yes', $content_block['reverse_order_desktop']);
    $reverse_mobile = in_array('yes', $content_block['reverse_order_mobile']);
    $alignment = $content_block['vertical_alignment'];
 
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

    $container_classes = 'h-full flex flex-col md:flex-row ' . ($reverse_desktop ? 'md:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
    $heading_width = 'w-full md:w-[40%]'; 
    $content_width = 'w-full md:w-[60%]';   
   
?>

<section id="process-section" class="process-section max-w-full relative overflow-visible lg:h-fit <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto">  
     <div class="<?php echo esc_attr($container_classes); ?> md:gap-y-0 gap-y-[3em] md:mx-[-1.5rem]">  
        <div  class="<?php echo esc_attr($heading_width); ?> md:px-[1.5rem] <?php if($reverse_desktop){ ?> md:pl-[50px] <?php }else{ ?> md:pr-[50px] <?php } ?> flex flex-col justify-center relative">
            <div id="sticky-sidebar-process" class="sticky-sidebar-process" style="position: relative;">
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
                <?php if($description): ?>
                    <div class="text-black style-disc" data-aos="fade-up" >                 
                        <?php echo $description; ?>                   
                    </div>
                 <?php endif; ?> 
            </div> 
        </div> 
        <div id="right-content-process" class="<?php echo esc_attr($content_width); ?>" data-aos="fade-up" >
        <?php if ($slider):  ?>       
        <div class="h-full flex flex-col sm:flex-row items-stretch flex-wrap">   
        <?php $count = 1; foreach ($slider as $column_slider): 
                $title = $column_slider['title'];           
                $text = $column_slider['text']; ?>    
                <!-- Step Card -->
                <div class="flex items-center lg:mb-[40px] mb-[30px] w-full relative">
                <div class="z-[3] mr-[-40px] lg:mr-[-50px] w-[80px] h-[80px] lg:w-[100px] lg:h-[100px] flex items-center justify-center bg-[#0066CA] text-white font-bold rounded-full shadow-md shrink-0 number">
                    <?php if($count < 10){ ?>
                        0<?php echo $count; 
                        }else{ echo $count; } ?>
                </div>
                <div class="bg-white border-2 border-white shadow-[0px_4px_11px_1px_rgba(0,0,0,0.18)] py-[20px] lg:py-[36px] pl-[60px] lg:pl-[93px] pr-[20px] lg:pr-[36px] rounded-md w-full">
                    <?php if($title): ?><h3 class="text-[#0066CA] font-bold uppercase mb-[15px]"><?php echo $title; ?></h3><?php endif; ?>
                    <?php if($text): ?>
                        <div class="text-black style-disc">                 
                            <?php echo $text; ?>                   
                        </div>
                    <?php endif; ?> 
                </div>
            </div>
        <?php $count++; endforeach; ?>   
        </div>
    <?php endif; ?>    
    </div>                 
    </div>   
</section>

<?php }
?>

