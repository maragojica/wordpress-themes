<?php
$content_block = get_field('criteria');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];
    $description = $content_block['description'];    
    $slider = $content_block['slider_info']; 
    $bg_color = $content_block['bg_color']; 
   
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

    $container_classes = 'h-full flex flex-col lg:flex-row ';
   
?>

<section class="criteria-slider-section max-w-full relative overflow-hidden lg:h-fit <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="container mx-auto">
        <div class="h-full flex flex-col lg:flex-row items-start gap-y-[1em] lg:gap-y-0 lg:gap-x-[6em] 2xl:gap-x-0">
            <div class="lg:w-2/5 animate__animated" data-animation="fadeIn" data-duration="1.5s">
            <?php if ($heading) : ?>
                <h2 class="text-secondary mb-0">
                    <?php echo $heading; ?>
                </h2>
            <?php endif; ?> 
            </div>
            <?php if($description): ?>
            <div class="lg:w-3/5 animate__animated font-text-font text-foreground style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" ><?php echo $description; ?></div>     
            <?php endif; ?> 
        </div>
    </div>
    <div class="w-full mx-auto pr-0 pl-contain pt-[23px] lg:pt-[72px]"> 
        <div class="w-full animate__animated" data-animation="fadeIn" data-duration="1.5s"> 
        <?php if ($slider):  ?>            
            <div class="slider-criteria slider-fluid-full owl-carousel owl-theme relative overflow-hidden">
            <?php foreach ($slider as $column_slider): 
                  $title = $column_slider['title']; 
                   $image = $column_slider['image'];  ?>
                   <div class="criteria-slide fluid-slide h-full item">
                   <div class="flex flex-col h-full bg-blueinfo-medium rounded-tl-[73px]">      
                      <div class="h-[288px] md:h-[450px] lg:h-[370px] xl:h-[400px] 2xl:h-[430px] 3xl:h-[530px] rounded-[73px_0px_800px_0px] overflow-hidden">                     
                         <?php  echo wp_get_attachment_image(
                            $image['ID'],
                            'full',
                            false,
                            array(
                                'class' => 'transition-all duration-300 w-full h-full parallax-image object-cover object-center',
                                'alt' => esc_attr($image['alt']),
                            )
                        ); ?>
                        </div>
                            <div class="flex flex-grow justify-center flex-wrap flex-col py-[35px] lg:py-[40px] px-[19px] lg:px-[36px] 2xl:py-[62px]  bg-transparent">                                 
                                <?php if($title): ?>
                                    <h3 class="text-primary text-[20px] lg:text-[28px] 2xl:text-[32px] font-[800] lg:tracking-[1.28px] tracking-[0.8px] uppercase"><?php echo $title;?></h3>
                                 <?php endif; ?>                                   
                            </div>   
                        </div>
                   </div>
               <?php endforeach; ?>   
            </div>
        <?php endif; ?>
         </div>
                  
    </div>
    <?php if($subheading): ?>
    <div class="container mx-auto pt-[16px] lg:pt-[25px]">
        <div class="flex flex-col">
            <div class="lg:w-2/5 animate__animated" data-animation="fadeIn" data-duration="1.5s">
            <?php if($subheading): ?>
            <div class="font-text-font text-[11px] lg:text-[16px] text-foreground style-disc uppercase font-bold pl-[10px]"><?php echo $subheading; ?></div>     
            <?php endif; ?> 
            </div>            
        </div>
    </div>
    <?php endif; ?> 
</section>

<?php }
?>

