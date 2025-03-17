<?php
$content_block = get_field('content_block_media');
if ($content_block) {   
    
    $bg_color = $content_block['bg_color']; 
    $heading = $content_block['heading']; 
    $info_media = $content_block['info_media']; 
   
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

    $container_classes = 'flex flex-wrap gap-[20px] lg:gap-0 xl:gap-[4rem] flex-col lg:flex-row items-start xl:justify-between';
   
?>

<section class="media-requests-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="container mx-auto">  
        <div class="bg-primary h-[8px] w-full mb-[30px] lg:mb-[55px]"></div>   
       <div class="w-full">                   
            <?php if ($heading) : ?>
                <h2 class="text-primary mb-[30px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
                    <?php echo $heading; ?>
                </h2>
            <?php endif; ?>  
        </div>      
        <div class="<?php echo esc_attr($container_classes); ?> ">
        <?php  foreach ($info_media as $index => $media) : 
                    $title = $media['title'];
                    $text = $media['text'];                    
                   $link = $media['link'];                   
                   $icon_link = $media['icon_link']; 
                   $flex = $media['flex']; ?>                  
                
                     <div class="w-full lg:w-1/3 xl:w-auto xl:flex-[<?php echo $flex;?>] animate__animated" data-animation="fadeIn" data-duration="1.5s">  
                        <?php if ($title ) : ?>
                            <h4 class="text-primary mb-[7px] lg:mb-[10px]">
                                <?php echo $title ; ?>
                            </h4>
                        <?php endif; ?>                        
                        <?php if($text): ?>
                        <div class="font-text-font text-foreground style-disc style-sm-line animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                            <?php echo $text; ?>                   
                        </div>
                        <?php endif; ?>  
                      <?php if ($link) :
                        $url = $link['url'];
                        $title = $link['title'];
                        $target = $link['target'] ? $link['target'] : '_self';  ?>
                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="flex items-center gap-[6px] text-[16px] lg:text-[18px] text-foreground font-primary-font font-normal">
                            <?php if($icon_link): echo $icon_link; endif ?>
                            <span class="underline hover:no-underline underline-offset-[3px]"><?php echo esc_html($title); ?></span>
                        </a>
                    <?php endif; ?>                           
            </div>   
            <?php  endforeach;  ?>  
        </div>               
    </div>
</section>

<?php }
?>

