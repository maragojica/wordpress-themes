<?php
$content_block = get_field('content_block_timeline');
if ($content_block) {    
   
    $heading = $content_block['heading'];      
    $subheading = $content_block['subheading'];
    $description = $content_block['description'];    
    $timeline = $content_block['timeline']; 

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

<section class="timeline-section max-w-full relative overflow-hidden <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?><?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
   <div class="container mx-auto relative z-[10]">   
            <div class="flex items-start justify-between lg:flex-row flex-col lg:gap-x-[70px] lg:gap-y-0 gap-y-[23px]">
               <div class="w-full lg:w-[45%]">
                <?php if($subheading): ?>
                    <div class="text-quaternary eyebrow mb-[20px]" data-aos="fade-up"><?php echo $subheading;?></div>
                    <?php endif; ?>
                <?php if ($heading) : ?>                   
                    <h2 class="text-secondary text-left min-w-fit" data-aos="fade-up">
                        <?php echo $heading; ?>
                    </h2>                     
                <?php endif; ?>
                </div>
                <?php if($description): ?>
                    <div class="text-accent info style-disc text-left lg:text-right w-full lg:w-[55%] lg:mt-[20px]" data-aos="fade-up" >                 
                        <?php echo $description; ?>                   
                    </div>
                <?php endif; ?>                  
            </div>            
        </div>
         <?php if($timeline): ?>
            <div class="max-w-full w-full relative pl-contain mt-[3em] lg:mt-[90px] mx-auto">
            <div class="overflow-hidden max-w-full relative">
                <div class="timeline-line bg-quaternary"></div>
                <!-- Swiper -->
                    <div class="swiper timeline-slider timeline-slider-desktop lg:block hidden">
                    <div class="swiper-wrapper">
                        <?php foreach ($timeline as $item) : 
                        $year = $item['year'];
                            $text = $item['text']; ?>
                        <!-- Timeline slide -->
                        <div class="swiper-slide flex flex-col items-start min-w-[220px]">
                        <div class="timeline-dot mb-4 bg-quaternary"></div>
                        <?php if($year): ?><div class="year_timeline text-secondary"><?php echo $year; ?></div><?php endif;?>
                        <?php if($text): ?><div class="text-accent mt-1 md:max-w-[200px] lg:max-w-[330px] xl:max-w-[220px]"><?php echo $text; ?></div><?php endif; ?>
                        </div>
                        <?php endforeach; ?>             
                    </div>                    
                    </div>
                    <!-- Swiper Mobile-->
                    <div class="swiper timeline-slider timeline-slider-mobile lg:hidden block">
                    <div class="swiper-wrapper">
                        <?php foreach ($timeline as $item) : 
                        $year = $item['year'];
                            $text = $item['text']; ?>
                        <!-- Timeline slide -->
                        <div class="swiper-slide flex flex-col items-start min-w-[220px]">
                        <div class="timeline-dot mb-4 bg-quaternary"></div>
                        <?php if($year): ?><div class="year_timeline text-secondary"><?php echo $year; ?></div><?php endif;?>
                        <?php if($text): ?><div class="text-accent mt-1 md:max-w-[200px] lg:max-w-[330px] xl:max-w-[220px]"><?php echo $text; ?></div><?php endif; ?>
                        </div>
                        <?php endforeach; ?>    
                       <div class="swiper-slide hidden sm:block !pointer-events-none opacity-0 min-w-0 sm:min-w-[calc(100%-80px)] lg:min-w-[calc(100%-120px)]"></div>
           
                    </div>
                     <!-- Custom navigation arrows -->
                    <button class="timeline-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="109" height="12" viewBox="0 0 109 12" fill="none">
                        <path d="M108.53 6.53033C108.823 6.23744 108.823 5.76256 108.53 5.46967L103.757 0.696699C103.464 0.403806 102.99 0.403806 102.697 0.696699C102.404 0.989593 102.404 1.46447 102.697 1.75736L106.939 6L102.697 10.2426C102.404 10.5355 102.404 11.0104 102.697 11.3033C102.99 11.5962 103.464 11.5962 103.757 11.3033L108.53 6.53033ZM0 6.75H108V5.25H0V6.75Z" fill="#8A9751"/>
                        </svg>
                    </button>
                    
                    <button class="timeline-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="109" height="12" viewBox="0 0 109 12" fill="none">
                        <path d="M108.53 6.53033C108.823 6.23744 108.823 5.76256 108.53 5.46967L103.757 0.696699C103.464 0.403806 102.99 0.403806 102.697 0.696699C102.404 0.989593 102.404 1.46447 102.697 1.75736L106.939 6L102.697 10.2426C102.404 10.5355 102.404 11.0104 102.697 11.3033C102.99 11.5962 103.464 11.5962 103.757 11.3033L108.53 6.53033ZM0 6.75H108V5.25H0V6.75Z" fill="#8A9751"/>
                        </svg>
                    </button>
                    </div>
            </div>
            </div>
         <?php endif; ?> 
</section>
<?php }
?>
