<?php
$content_block = get_field('content_block_info');
if ($content_block) {   
    
    $bg_color = $content_block['bg_color']; 
    $slider = $content_block['info_list']; 
   
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

<section class="columns-info-section max-w-full relative overflow-hidden lg:h-fit <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="container mx-auto">           
        <div class="<?php echo esc_attr($container_classes); ?> gap-[2em] lg:gap-[154px]">
        <?php  foreach ($slider as $index => $slide) :  
                    $image = $slide['image'];
                    $heading = $slide['heading'];
                    $subheading = $slide['subheading'];
                    $description = $slide['description']; 
                    $image_shape = $slide['image_shape']; 
                   $buttons = $slide['buttons'];  
                   $shape = "rounded-[73px_0px_800px_0px]";
                   if( $image_shape == "top"): $shape = "rounded-[0px_800px_0px_73px]"; endif; ?>
                <div class="w-full lg:w-1/2 animate__animated" data-animation="fadeIn" data-duration="1.5s">       
                   <?php if ( !empty($image)) :  ?> 
                          <div class="h-[331px] xs:h-[18em] sm:h-[32em] md:h-[22em] lg:h-[500px] xl:h-[567px] overflow-hidden <?php echo $shape;?> mb-[21px] md:mb-[40px] lg:mb-[60px]">               
                            <img class="w-full h-full parallax-image object-cover object-center transition-all duration-300 ease-in-out" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />             
                        </div>                
                    <?php  endif; ?>         
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
            <?php  endforeach;  ?>  
        </div>               
    </div>
</section>

<?php }
?>

