<?php
$content_block = get_field('content_industries');
if ($content_block) {
    $heading = $content_block['heading'];      
    $subheading = $content_block['subheading']; 
    $description = $content_block['description'];   
    $info_industries = $content_block['info_categories']; 

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
    $heading_width = 'w-full md:w-[35%]'; 
    $content_width = 'w-full md:w-[65%]';   
   
?>

<section class="industries-section max-w-full relative overflow-hidden lg:h-fit <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto">  
     <div class="<?php echo esc_attr($container_classes); ?> md:gap-y-0 gap-y-[3em] md:mx-[-1.5rem]">  
        <div class="<?php echo esc_attr($heading_width); ?> md:px-[1.5rem] <?php if($reverse_desktop){ ?> md:pl-[50px] <?php }else{ ?> md:pr-[50px] <?php } ?> flex flex-col justify-center">
        <?php if ($subheading) : ?>
            <div class="text-sub text-secondary mb-[15px]" data-aos="fade-up">
                <?php echo $subheading; ?>
            </div> 
            <?php endif; ?>
            <?php if($heading): ?>
                <h2 class="text-primary uppercase" data-aos="fade-up" >
                    <?php echo $heading; ?>
                </h2> 
            <?php endif; ?>    
            <?php if($description): ?>
                    <div class="text-black style-disc" data-aos="fade-up">                 
                        <?php echo $description; ?>                   
                    </div>
                 <?php endif; ?> 
        </div> 
        <div class="<?php echo esc_attr($content_width); ?>" data-aos="fade-up" >
        <?php if ($info_industries):  ?>       
    <div class="h-full flex flex-col sm:flex-row items-stretch flex-wrap">   
    <?php foreach ($info_industries as $column_slider): 
            $heading = $column_slider['heading'];           
            $image = $column_slider['image']; 
            $page_link = $column_slider['page_link'];?>    
            
            <!-- Card -->
            <div class="w-full sm:w-1/2 md:w-1/2 sm:px-[15px] mb-[30px] h-[150px] lg:h-[145px]" >
              <div class="relative group w-full h-full overflow-hidden hover:-translate-y-1 transition-transform duration-300">
                <!-- Background Image -->                      
                <?php if ( !empty($image)) :  ?> 
                    <img class="h-full w-full object-cover group-hover:scale-110 grayscale-0 group-hover:grayscale transition-transform duration-300" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />  
                <?php  endif; ?> 
                <div class="p-[20px] absolute left-0 bottom-0 bg-[rgba(0,102,202,0.8)] h-full group-hover:h-full group-hover:bg-[#012D86] group-hover:backdrop-blur-[37px] w-full flex justify-center items-center text-center transition-all duration-300 ease-in-out">
                    <?php if($heading): ?>
                        <?php  if ($page_link) :
                            $url = $page_link['url'];
                            $title = $page_link['title'];
                            $target = $page_link['target'] ? $page_link['target'] : '_self';    ?>
                            <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="w-full h-full flex justify-center items-center text-center"><?php endif; ?>
                            <h3 class="text-white uppercase mb-0"><?php echo $heading;?></h3>
                        <?php  if ($page_link) : ?></a><?php endif; ?>   
                    <?php endif; ?>               
                </div>  
                </div> 
            </div> 
    <?php endforeach; ?>   
    </div>
    <?php endif; ?>    </div>                 
    </div>   
</section>

<?php }
?>

