<?php
$content_block = get_field('content_block_capabilities');
if ($content_block) {
    
    $heading = $content_block['heading'];  
    $capabilities = $content_block['capabilities'];  
    $bg_image_section = $content_block['bg_image_section']; 
    $buttons = $content_block['buttons'];    

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
    

    //Columns Number

    $select_columns = 'w-full px-3 mt-6 lg:mb-0 lg:w-1/3';       
   
?>

<section class="capabilities-section max-w-full relative overflow-hidden bg-primary bg-cover bg-center bg-no-repeat <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if(!empty($bg_image_section)): ?> style="background-image: url('<?php echo esc_url($bg_image_section['url']); ?>');" <?php endif; ?>>
  <div class="container mx-auto ">           
        <div class="w-full">  
            <?php if ($heading) : ?>
                <h2 class="text-secondary mb-6 text-center" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h2>
            <?php endif; ?> 
        </div>
       <?php 
    if($capabilities):  ?>
        <div class="lg:flex hidden flex-col sm:flex-row flex-wrap -mx-3 mt-[0.2em]">   
             <?php foreach ($capabilities as $item) : 
                    $title = $item['title'];
                    $text = $item['text']; 
                    $image = $item['image']; ?>          
                    <div class="<?php echo $select_columns; ?> group" data-aos="fade-up">
                        <div class="flex flex-col h-full"> 
                            <?php if(!empty($image)): ?>
                                <div class="relative overflow-hidden w-full h-[11em] md:h-[400px] lg:h-[305px]">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($title); ?>" class="w-full h-full object-cover object-center transition-transform duration-300">
                                </div>
                            <?php endif; ?>                            
                            <div class="flex flex-grow justify-start flex-wrap flex-col bg-white py-[25px] px-[20px] xl:py-[30px] xl:px-[30px]  transition-all ease-in-out duration-300">                                  
                                <?php if($title): ?>
                                    <h2 class="text-secondary mb-[15px]]"><?php echo $title; ?></h2>
                                <?php endif; ?>  
                                 <?php if($text): ?>
                                    <div class="text-accent text-medium info style-disc" data-aos="fade-up" >                 
                                        <?php echo $text; ?>                   
                                    </div>
                                <?php endif; ?> 
                              </div>    
                        </div>
                    </div>
                <?php endforeach; ?>           
        </div>
        <div class="lg:hidden block max-w-full">                        
            <div class="swiper-container swiper capabilities-slider overflow-hidden" id="capabilities-slider">
                <div class="swiper-wrapper">
                <?php foreach ($capabilities as $item) : 
                    $title = $item['title'];
                    $text = $item['text']; 
                    $image = $item['image']; ?>   
                      <div class="swiper-slide item w-full">
                      <div class="flex flex-col h-full"> 
                            <?php if(!empty($image)): ?>
                                <div class="relative overflow-hidden w-full h-[11em] md:h-[400px] lg:h-[305px]">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($title); ?>" class="w-full h-full object-cover object-center transition-transform duration-300">
                                </div>
                            <?php endif; ?>                            
                            <div class="flex flex-grow justify-start flex-wrap flex-col bg-white py-[25px] px-[20px] md:px-[30px] xl:py-[30px] xl:px-[30px]  transition-all ease-in-out duration-300">                                  
                                <?php if($title): ?>
                                    <h2 class="text-secondary mb-[15px]]"><?php echo $title; ?></h2>
                                <?php endif; ?>  
                                 <?php if($text): ?>
                                    <div class="text-accent text-medium info style-disc" data-aos="fade-up" >                 
                                        <?php echo $text; ?>                   
                                    </div>
                                <?php endif; ?> 
                              </div>    
                        </div>
                      </div>  
                      <?php endforeach; ?>   
                </div>  
                <!--<div class="swiper-button-next next-capabilities"></div>
                <div class="swiper-button-prev prev-capabilities"></div>-->
                <div class="swiper-pagination-capabilities swiper-pagination-general text-center mt-4"></div>   
            </div>                            
        </div>
        <?php endif; ?>   
        
         <?php if ($buttons) : ?>
                <div class="flex flex-wrap justify-center gap-3 lg:gap-8 mt-4 lg:mt-12" data-aos="fade-up">
                    <?php foreach ($buttons as $button) : ?>
                        <?php 
                        $button_link = $button['button'];
                        $button_type = $button['button_type'];
                        $button_style_btn = $button['button_style_btn'];
                        $button_style_link = $button['button_style_link'];
                        $button_style = '';
                        if ($button_type === 'btn') {
                            $button_style = 'btn ';
                            if ($button_style_btn) {
                                $button_style .= ' ' . $button_style_btn;
                            }
                        } elseif ($button_type === 'link') {
                            $button_style = 'simple-link ';
                            if ($button_style_link) {
                                $button_style .= ' ' . $button_style_link;
                            }
                        }
                        if ($button_link) :
                            $url = $button_link['url'];
                            $title = $button_link['title'];
                            $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                            <div class="relative group">
                                <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="<?php if($button_style): echo $button_style; endif;?>">
                                    <?php echo esc_html($title); ?>
                                </a>     
                            </div>            
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?> 
        
    </div>
</section>

<?php }
?>

