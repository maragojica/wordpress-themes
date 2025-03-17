<?php
$content_block = get_field('content_products');
if ($content_block) {
    
    $slider = $content_block['info_categories']; 
    $add_bottom_divider = $content_block['add_bottom_divider'];
 
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

    
    //Container Full

    $container_classes = 'flex flex-wrap flex-col md:flex-row ';
   
?>

<section class="products-section max-w-full relative overflow-hidden lg:h-fit <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($add_bottom_divider): ?> style="padding-bottom: 12px !important;"<?php endif;?>>
    <div class="container mx-auto animate__animated" data-animation="fadeIn" data-duration="1.3s">  
    <?php if ($slider):  ?>       
    <div class="<?php echo esc_attr($container_classes); ?>">   
    <?php foreach ($slider as $column_slider): 
            $heading = $column_slider['heading'];           
            $image = $column_slider['image']; 
            $page_link = $column_slider['page_link'];?>    
            
            <!-- Card -->
            <div class="w-full md:w-1/2 lg:w-1/3 h-[300px] xl:h-[400px] md:px-[15px] mb-[30px]" >
              <div class="relative group w-full h-full overflow-hidden">
                <!-- Background Image -->                      
                <?php if ( !empty($image)) :  ?> 
                    <img class="h-full w-full object-cover group-hover:scale-110 grayscale-0 group-hover:grayscale transition-transform duration-300" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />  
                <?php  endif; ?> 
                <div class="absolute left-0 bottom-0 bg-transparent group-hover:bg-[rgba(12,35,64,0.80)] group-hover:backdrop-blur-[37px] w-full h-full flex justify-center items-center text-center transition-all duration-300 ease-in-out">
                    <?php if($heading): ?>
                        <?php  if ($page_link) :
                            $url = $page_link['url'];
                            $title = $page_link['title'];
                            $target = $page_link['target'] ? $page_link['target'] : '_self';    ?>
                            <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="w-full h-full flex justify-center items-center text-center"><?php endif; ?>
                            <h3 class="text-white"><?php echo $heading;?></h3>
                        <?php  if ($page_link) : ?></a><?php endif; ?>   
                    <?php endif; ?>               
                </div>  
                </div> 
            </div> 
    <?php endforeach; ?>   
    </div>
    <?php endif; ?>                   
    </div>
    <?php if($add_bottom_divider): ?>
     <div class="w-full ">
        <div class="line-divider"></div>   
        <div class="line-border mt-[11px]"></div>             
     </div>
   <?php endif; ?>
</section>

<?php }
?>

