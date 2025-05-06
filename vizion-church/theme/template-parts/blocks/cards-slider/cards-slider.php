<?php
$content_block = get_field('content_block_cards');
if ($content_block) {
    
    $slider = $content_block['info_list_slider']; 
 
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

    $container_classes = 'h-full lg:flex flex-col lg:flex-row ';
   
?>
<section class="cards-slider-section max-w-full pl-[1.5rem] lg:pl-[70px] xl:pl-[75px] 2xl:pl-[102px] <?php echo esc_attr($className); ?>"  <?php echo $anchor_attr; ?> data-aos="fade-in" data-aos-offset="100" data-aos-delay="50">
<div class="max-w-full relative overflow-hidden <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
    <div class="w-full">    
    <?php if ($slider):  ?>       
      <div class="cards-slider slider-fluid-full owl-carousel owl-theme relative overflow-hidden"> 
    <?php foreach ($slider as $column_slider): 
            $heading = $column_slider['heading'];   
            $image = $column_slider['image'];          
            $link = $column_slider['link'];?>    
            <div class="partner-slide fluid-slide item h-full">
            <!-- Card -->
            <div class="relative group h-[20em] sm:h-[30em] xl:h-[40em] 2xl:h-[818px] w-full overflow-hidden rounded-[25px]">
                <!-- Background Image -->                      
                <?php if ( !empty($image)) :  ?> 
                    <img class="h-full w-full object-cover group-hover:scale-110 grayscale-0 group-hover:grayscale transition-transform duration-300" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />  
                <?php  endif; ?> 
                <div class="lg:flex hidden absolute left-0 bottom-0 py-[30px] xl:py-[45px] px-[30px] xl:px-[42px] w-full h-full justify-center items-center text-center">
                    <?php if($heading): ?>
                    <div class="subtitle text-background"><?php echo $heading;?></div>
                    <?php endif; ?>
                </div>

                <!-- Title and Description (Expandable Box) -->
                <div class="transform lg:translate-y-[100%] group-hover:translate-y-0 py-[30px] xl:py-[45px] px-[30px] xl:px-[42px] absolute z-[2] bottom-0 left-0 right-0 lg:bg-transparent bg-[rgba(0,0,0,0.15)] group-hover:bg-[rgba(0,0,0,0.15)] group-hover:backdrop-blur-[37px] text-foreground text-center flex flex-col justify-center overflow-hidden transition-all duration-300 h-full lg:h-[162px] xl:h-[195px] group-hover:h-full">
               
                    <!-- Description (Hidden by Default) -->
                    <div class="lg:opacity-0 transform lg:translate-y-full group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 ease-in-out w-full h-full flex justify-center items-center text-center">
                    <?php if ($link) : 
                         $url = $link['url'];
                         $title = $link['title'];
                         $target = $link['target'] ? $link['target'] : '_self'; ?>
                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="w-full h-full flex justify-center items-center text-center">
                     <?php endif; ?>       
                        <?php if($heading): ?>
                        <h3 class="text-background"><?php echo $heading;?></h3>
                        <?php endif; ?>
                        <?php if($link): ?>
                        </a>
                        <?php endif; ?>                      
                    </div>
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

