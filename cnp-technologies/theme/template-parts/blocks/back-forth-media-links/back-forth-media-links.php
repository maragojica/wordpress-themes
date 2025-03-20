<?php
$content_block = get_field('content_block_media_links');
if ($content_block) {
    
    $heading = $content_block['heading'];        
    $image = $content_block['image'];   
    $bg_image = $content_block['bg_image'];   
    $info_links = $content_block['info_links'];   
    

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
       
 
    $container_classes = 'h-full flex flex-col-reverse lg:flex-row items-stretch ';
    $heading_width = 'w-full lg:w-1/2'; 
    $content_width = 'w-full lg:w-1/2';       
?>

<section class="back-foth-media-links-section max-w-full relative bg-cover bg-center bg-no-repeat <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if(!empty($bg_image)):?>style="background-image: url(<?php echo esc_url($bg_image['url']); ?>)"<?php endif; ?>>      
    <div class="container mx-auto">     
       <div class="<?php echo esc_attr($container_classes); ?>">
           <div class="<?php echo esc_attr($content_width); ?> relative animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                <div class="w-full h-full">
                <?php if ( !empty($image)) : 
                        $srcset = wp_get_attachment_image_srcset($image['ID']);
                        $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                    <img class="img-fluid w-full h-[15em] sm:h-[20em] md:h-[30em] parallax-image lg:h-full md:parallax-image transition-all duration-300 ease-in-out object-center object-cover" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="734" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                <?php endif; ?>                 
                </div>        
                <?php if ($heading) : ?>
                    <div class="bg-secondary top-shape-short px-[36px] py-[14px] sm:px-[40px] sm:py-[20px] max-w-fit transform rotate-270 absolute bottom-[117px] left-[-115px] sm:bottom-[132px] sm:left-[-135px] xl:bottom-[147px] xl:left-[-144px] 2xl:bottom-[172px] 2xl:left-[-177px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <h2 class="text-white mb-0 text-[30px] sm:text-[35px] xl:text-[40px] 2xl:text-[50px]"><?php echo $heading; ?></h2>
                     </div> 
                <?php endif; ?>        
            </div> 
           <div class="<?php echo esc_attr($heading_width); ?> flex flex-col justify-center pb-[2em] lg:py-[70px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
              <?php if($info_links): $animation_delay = 1; ?>
                <ul id="tabs" class="tabs h-full flex flex-col justify-between lg:pl-[8em] lg:pr-[6em] gap-[2em] lg:gap-[40px]">
                <?php foreach ($info_links as $column) :                 
                $link = $column['link'];                              
                $duration = $animation_delay . 's'; 
                if($link):
                    $url = $link['url'];
                    $title = $link['title'];
                    $target = $link['target'] ? $link['target'] : '_self'; ?>
                  <li>
                    <a class="group relative flex flex-row items-center justify-start text-white hover:text-secondary font-primary font-medium text-[30px] 2xl:text-[40px] tracking-[-0.4px] leading-[1.2] capitalize" href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>">
                       <?php echo $title; ?>
                       <svg class="invisible group-hover:visible absolute left-[-362px] z-10 scale-x-0 origin-bottom-left transition-transform duration-250 ease-out group-hover:scale-x-100 group-hover:origin-bottom-right" xmlns="http://www.w3.org/2000/svg" width="330" height="6" viewBox="0 0 330 6" fill="none">
                        <path d="M3 3H327.5" stroke="#FF7F32" stroke-width="5" stroke-linecap="round"/>
                        </svg>
                    </a> 
                  </li>
                <?php endif; ?>  
                <?php $animation_delay += 0.75; endforeach; ?>    
              </ul> 
                <?php endif; ?>
            </div>  
        </div>  
    </div>    
</section>

<?php }
?>

