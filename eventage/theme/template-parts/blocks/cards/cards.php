<?php
$content_block = get_field('content_cards');
if ($content_block) {
    
    $heading = $content_block['heading'];  
    $description = $content_block['description'];      
    $columns_content = $content_block['columns_content'];

 
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

    
?>

<section class="cards-section max-w-full relative bg-white <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto"> 
        <?php if($heading || $description): ?>             
        <div class="w-full animate__animated" data-animation="fadeIn" data-duration="1.5s">      
            <?php if($heading): ?>
            <h3 class="mb-0 text-center uppercase text-black animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <?php echo $heading; ?>
            </h3>    
           <?php endif; ?>
           <?php if($description): ?>
               <?php if($description): ?>
                    <div class="text-black mt-1 style-disc text-center mx-auto lg:max-w-[700px] animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                        <?php echo $description; ?>                   
                    </div>
                <?php endif; ?>
            <?php endif; ?>     
        </div>   
        <?php endif; ?>     
        <?php if($columns_content): $animation_delay = 1; ?>
        <div class="flex flex-wrap justify-center -mx-[15px]">              
            <?php foreach ($columns_content as $column) : 
                
                 $icon = $column['icon'];
                 $title = $column['title'];
                 $subtitle = $column['subtitle'];       
                 $text = $column['description'];    
                 $link = $column['link'];  
                 $duration = $animation_delay . 's'; ?>
                <div class="w-full flex lg:w-1/3 px-[15px] mt-[1.5em] lg:mt-[44px] animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                    <div class="flex flex-col w-full h-full justify-between rounded-[5px] bg-white border-3 border-primary p-[35px]" > 
                     <?php if ( !empty($icon)) : 
                        $srcset = wp_get_attachment_image_srcset($icon['ID']);
                        $sizes = wp_get_attachment_image_sizes($icon['ID'], 'full'); ?>                
                        <img class="img-fluid h-[65px] h-[65px] mr-auto object-center object-contain" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" height="65" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                      <?php endif; ?>   
                        <div class="flex-grow w-full bg-white relative z-1 pt-[2em] lg:pt-[118px]">
                           <?php if($subtitle): ?>
                            <h6 class="text-primary"><?php echo $subtitle; ?></h6>
                            <?php endif; ?>
                            <?php if($title): ?>
                            <h5 class="text-black uppercase font-[800]">
                            <?php if($link){ 
                                $url = $link['url'];                                
                                $target = $link['target'] ? $link['target'] : '_self';  ?>  
                                 <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="text-black hover:text-primary hover:no-underline">
                                <?php echo $title; ?>
                                </a> 
                              <?php }else{ echo $title; } ?>
                             </h5>
                            <?php endif; ?>
                            <?php if($text): ?>
                            <div class="style-disc text-black"><?php echo $text; ?></div>
                            <?php endif; ?> 
                        </div>
                    </div>                                 
               </div>
            <?php $animation_delay += 0.25; endforeach; ?>      
        </div>
        <?php endif; ?>  
    </div>
</section>

<?php }
?>

