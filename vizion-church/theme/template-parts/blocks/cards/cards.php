<?php
$content_block = get_field('content_cards');
if ($content_block) {
      
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
    }

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif; 

    
?>
<section class="cards-section max-w-full lg:px-[70px] xl:px-[75px] 2xl:px-[102px] <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
<div class="max-w-full relative bg-white <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" >
    <div class="w-full mx-auto pt-[40px]">            
        <?php if($columns_content): $animation_delay = 50; ?>
        <div class="flex flex-wrap justify-center -mx-[15px] mt-[-15px] gap-y-[calc(1.5em+40px)] lg:gap-y-[40px]">              
            <?php foreach ($columns_content as $column) : 
                
                 $title = $column['title'];
                 $image = $column['image'];       
                 $text = $column['description'];    
                 $buttons = $column['buttons'];  ?>
                <div class="w-full flex lg:w-1/3 px-[15px]" data-aos="fade-up" data-aos-offset="100" data-aos-delay="<?php echo $animation_delay;?>">
                    <div class="flex flex-col w-full h-full relative justify-between rounded-[25px] bg-background pb-[27px] pl-[20px] pr-[20px] sm:pl-[25px] sm:pr-[25px] 2xl:pl-[40px] 2xl:pr-[33px] group hover:-translate-y-1 transition-transform duration-300" > 
                                
                    <?php if($image): ?>
                        <div class="flex flex-col items-bottom justify-end w-full rounded-[25px] bg-cover bg-center h-[14em] sm:h-[20em] md:h-[20em] xl:h-[280px] 2xl:h-[450px] px-[20px] sm:px-[25px] 2xl:px-[27px] pb-[15px] mt-[-40px]" style="background-image: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1)), url('<?php echo esc_url($image['url']); ?>');"
                        role="img" aria-label="<?php echo esc_attr($image['alt']); ?>">
                        <?php if($title): ?>
                            <h3 class="uppercase text-secondary">
                               <?php echo $title; ?>
                             </h3>
                            <?php endif; ?>
                            <?php if($text): ?>
                            <div class="style-disc text-secondary mt-1"><?php echo $text; ?></div>
                            <?php endif; ?> 
                        </div>
                    <?php endif; ?>                         
                        <div class="flex-grow w-full mt-[22px]">                          
                        <?php if ($buttons) : ?>
                            <div class="flex flex-wrap gap-[15px]" data-aos="fade-up" data-aos-offset="100" data-aos-delay="70">
                                <?php foreach ($buttons as $button) : ?>
                                    <?php 
                                    $button_link = $button['button'];
                                    $button_style = $button['button_style'];
                                    if ($button_link) :
                                        $url = $button_link['url'];
                                        $title = $button_link['title'];
                                        $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                        <div class="relative group group-cta min-w-[100%] md:min-w-[calc(50%-10px)]">
                                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-full btn <?php if($button_style): echo $button_style; endif;?>">
                                            <?php echo esc_html($title); ?>
                                        </a>     
                                      </div>            
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>  
                        </div>
                    </div>                                 
               </div>
            <?php $animation_delay += 10; endforeach; ?>      
        </div>
        <?php endif; ?>  
    </div>
 </div>
</section>
<?php }
?>

