<?php
$content_block = get_field('partners_slider');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];
    $description = $content_block['description']; 
    $buttons = $content_block['buttons'];   
    $slider = $content_block['slider_info']; 

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
    }

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;

    
    //Container Full

    $container_classes = 'h-full flex flex-col lg:flex-row ' . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
   
?>

<section class="partner-slider-section max-w-full relative overflow-hidden lg:h-fit custom-gradient-accent <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="w-full mx-auto pr-0 pl-contain">       
    <div class="<?php echo esc_attr($container_classes); ?> gap-y-[2em] lg:gap-y-0 lg:gap-x-[2em] xl:gap-x-[3em] 2xl:gap-x-[144px]">
       <div class="w-full lg:w-1/2 animate__animated lg:pr-0 pr-[2em]" data-animation="fadeIn" data-duration="1.5s">                
           <?php if ($subheading) : ?>
                <h3 class="text-foreground mb-[10px] uppercase">
                    <?php echo $subheading; ?>
                </h3>
            <?php endif; ?>
            <?php if ($heading) : ?>
                <h2 class="text-secondary mb-0">
                    <?php echo $heading; ?>
                </h2>
            <?php endif; ?> 
            <?php if($description): ?>
            <div class="font-text-font text-foreground mt-4 style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                <?php echo $description; ?>                   
            </div>
                <?php endif; ?> 
                <?php if ($buttons) : ?>
                <div class="w-full flex flex-wrap gap-4 justify-start mt-[30px]">
                    <?php foreach ($buttons as $button) : ?>
                        <?php 
                        $button_link = $button['button'];
                        $button_style = $button['button_style'];
                        if ($button_link) :
                            $url = $button_link['url'];
                            $title = $button_link['title'];
                            $target = $button_link['target'] ? $button_link['target'] : '_self';    ?>
                            <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                                <?php echo esc_html($title); ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>  
        </div>
        <div class="w-full lg:w-1/2  animate__animated" data-animation="fadeIn" data-duration="1.5s"> 
        <?php if ($slider):  ?>  
            <div class="slider-partners slider-fluid-full owl-carousel owl-theme relative overflow-hidden">
            <?php foreach ($slider as $column_slider): 
                   $image = $column_slider['image']; 
                   $text = $column_slider['text'];?>
                   <div class="partner-slide fluid-slide item h-full">
                   <div class="flex flex-col h-full">                           
                         <?php  echo wp_get_attachment_image(
                            $image['ID'],
                            'full',
                            false,
                            array(
                                'class' => 'transition-all duration-300 w-full h-[10em] sm:h-[15em] md:h-[30em] lg:h-[15em] xl:h-[300px] 2xl:h-[396px] 3xl:h-[450px] object-cover object-center',
                                'alt' => esc_attr($image['alt']),
                            )
                        ); ?>
                            <div class="flex flex-grow justify-start flex-wrap flex-col p-[20px] lg:px-[40px] lg:py-[30px] bg-primary">                                 
                                 <?php if($text): ?>
                                    <div class="font-text-font text-white style-disc">                 
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
    </div>
</section>

<?php }
?>

