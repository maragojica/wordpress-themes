<?php
$content_block = get_field('support_info');
if ($content_block) {

    $image = $content_block['image'];
    $section_title = $content_block['section_title'];
    $billing_title = $content_block['billing_title'];
    $billing_buttons = $content_block['billing_buttons'];
    $support_cards = $content_block['support_cards'];

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

<section class="support-section overflow-hidden max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
  <div class="container mx-auto">    
     <div class="w-full lg:max-w-[90%]">
            <?php if ( !empty($image)) : 
                    $srcset = wp_get_attachment_image_srcset($image['ID']);
                    $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                <img class="max-w-full h-fit mx-auto transition-all duration-300 ease-in-out" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="357" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
            <?php endif; ?>   
            <?php if ($section_title) : ?>
                <h4 class="text-primary text-center lg:mt-[70px] mt-[2em] animate__animated" data-animation="fadeIn" data-duration="1.2s">
                    <?php echo $section_title; ?>
                </h4> 
            <?php endif; ?>
       </div>  
       <?php if ($support_cards) : ?>
         <div class="h-full flex flex-col lg:flex-row items-stretch gap-[32px] mt-[2em] lg:mt-[62px]">
            <?php foreach ($support_cards as $card) : 
                 $title = $card['title'];
                 $description_one = $card['description_one'];
                 $description_two = $card['description_two'];
                 $buttons = $card['buttons']; ?>
                <div class="cards-support w-full lg:w-1/2 flex flex-col py-[30px] lg:py-[60px] px-[30px] lg:px-[55px] border-4 border-primary justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">
                   <?php if ($title) : ?>
                    <h2 class="text-primary mb-0 animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $title; ?>
                    </h2> 
                    <?php endif; ?> 
                    <?php if($description_one): ?>
                    <div class="text-black lg:mt-[45px] mt-[30px] style-disc animate__animated" data-animation="fadeIn" data-duration="1.3s" >                 
                        <?php echo $description_one; ?>                   
                    </div>
               <?php endif; ?>  
               <?php if ($buttons) : ?>
                    <div class="flex flex-wrap gap-4 mt-[20px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
                        <?php foreach ($buttons as $button) : ?>
                            <?php 
                            $button_link = $button['button'];
                            $button_style = $button['button_style'];
                            $button_type = $button['button_type'];
                            if ($button_link) :
                                $url = $button_link['url'];
                                $title = $button_link['title'];
                                $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                <div class="relative group bottom-shape-btn-<?php echo $button_type;?>">
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min bottom-shape-btn btn <?php if($button_style): echo $button_style; endif;?>">
                                        <span class="bottom-shape-btn-<?php echo $button_type;?>"><?php echo esc_html($title); ?></span> 
                                    </a>  
                                </div>            
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>  
                <?php if($description_two): ?>
                    <div class="text-black mt-[45px] style-disc animate__animated" data-animation="fadeIn" data-duration="1.3s" >                 
                        <?php echo $description_two; ?>                   
                    </div>
               <?php endif; ?>  
                </div>
            <?php endforeach; ?>
         </div>
        <?php endif; ?>  
        <?php if( $billing_title && $billing_buttons): ?>
            <div class="flex lg:flex-row flex-col justify-between items-center px-[30px] py-[30px] lg:px-[50px] 2xl:px-[55px] lg:py-[30px] 2xl:py-[50px] gap-[1.2em] lg:gap-[3em] border-4 border-primary mt-[32px]">
              <?php if ($billing_title) : ?>
                <h2 class="text-primary lg:text-right text-center mb-0 animate__animated" data-animation="fadeIn" data-duration="1.2s">
                    <?php echo $billing_title; ?>
                </h2> 
                <?php endif; ?> 
                <?php if ($billing_buttons) : ?>
                    <div class="flex flex-wrap justify-center lg:justify-end gap-4 animate__animated" data-animation="fadeIn" data-duration="1.5s">
                        <?php foreach ($billing_buttons as $button) : ?>
                            <?php 
                            $button_link = $button['button'];
                            $button_style = $button['button_style'];
                            $button_type = $button['button_type'];
                            if ($button_link) :
                                $url = $button_link['url'];
                                $title = $button_link['title'];
                                $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                <div class="relative group bottom-shape-btn-<?php echo $button_type;?>">
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min bottom-shape-btn btn <?php if($button_style): echo $button_style; endif;?>">
                                        <span class="bottom-shape-btn-<?php echo $button_type;?>"><?php echo esc_html($title); ?></span> 
                                    </a>  
                                </div>            
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?> 
            </div>   
        <?php endif; ?>    
    </div>    
</section>

<?php }
?>

