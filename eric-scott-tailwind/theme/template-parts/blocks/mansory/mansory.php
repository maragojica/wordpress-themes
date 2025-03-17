<?php
$content_block = get_field('content_mansory');
if ($content_block) {
    
    $mansory = $content_block['mansory_gallery']; 
    $add_load_more = $content_block['add_load_more']; 
 
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

    $container_classes = 'lg:grid grid-cols-4 gap-[16px] hidden ';
   
?>

<section class="mansory-section max-w-full animate__animated <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>"  <?php echo $anchor_attr; ?> data-animation="fadeIn" data-duration="1.5s">  
    <div class="container container-full-mv mx-auto">
    <?php if ($mansory):  
             $pattern = array('col-span-1', 'col-span-2', 'col-span-1', 'col-span-2', 'col-span-1', 'col-span-1', 'col-span-1', 'col-span-1', 'col-span-2');
             $counter = 0; ?>       
        <div class="<?php echo esc_attr($container_classes); ?>">   
        <?php foreach ($mansory as $image): $class = $pattern[$counter % count($pattern)]; $counter++; ?>                
                <div class="relative group overflow-hidden h-[335px] 2xl:h-[385px] 3xl:h-[500px] <?php echo $class; ?> <?php if($add_load_more): ?> content-mansory <?php endif; ?>">
                <a class="w-full h-full" tab-index="0" href="<?php echo esc_url($image['url']); ?>" data-fancybox="gallery" <?php if($image['caption']): ?>data-caption="<?php echo esc_attr($image['caption']); ?> <?php endif;?>" aria-label="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>">
                <img class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-300" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />               
                </a>
                </div>                      
        <?php endforeach; ?>           
       </div>
       <?php if($add_load_more): ?> 
            <div class="lg:flex hidden flex-wrap justify-center gap-4 mt-8 animate__animated" data-animation="fadeIn" data-duration="1.5s">                       
                <a href="#" id="seeMoreMansory" tabindex="0" aria-label="Load more" title="Load more" class="min-w-min btn sm btn_primary_navy">
                    Load more
                </a>                          
           </div>
        <?php endif; ?>  
       <div class="lg:hidden block">
       <div class="slider-mansory slider-fluid-full owl-carousel owl-theme relative overflow-hidden">
       <?php foreach ($mansory as $image): ?>
        <div class="relative group mansory-slide fluid-slide item h-[236px] sm:h-[400px] md:h-[500px]">
            <a class="w-full h-full" tab-index="0" href="<?php echo esc_url($image['url']); ?>" data-fancybox="gallery" <?php if($image['caption']): ?>data-caption="<?php echo esc_attr($image['caption']); ?><?php endif;?>" aria-label="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>">
               <img class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-300" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />               
            </a>
       </div>    
       <?php endforeach; ?>   
       </div>
       </div>
      
    <?php endif; ?>               
    </div>
</section>

<?php }
?>

