<?php
$content_block = get_field('cta_banner');
if ($content_block) {
    
    $heading = $content_block['heading'];      
    $subheading = $content_block['subheading']; 
    $description = $content_block['description']; 
    $bg_overlay = $content_block['bg_overlay'];    
    $color = $content_block['color']; 
    $image = $content_block['bg_image'];   
    $image_mobile = $content_block['bg_image_mobile'];    
    $buttons = $content_block['buttons'];       
       
    $alignment = $content_block['vertical_alignment'];    
    $alignment_hori = $content_block['horizontal_alignment'];  

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

    //Container Settings

    $container_classes = 'flex flex-col h-full w-full ' . ($alignment === 'middle' ? 'justify-center' : ($alignment === 'bottom' ? 'justify-end' : ($alignment === 'top' ? 'justify-start' : 'justify-around'))) . ($alignment_hori === 'middle' ? 'items-center text-center' : ($alignment_hori === 'right' ? ' items-end text-left' : ($alignment_hori === 'left' ? ' items-start text-left' : ' items-stretch items-center')));
    $btn_align = 'justify-center';

    $subheading_color = ' text-white';
    $heading_color = ' text-white';
    $description_color = ' text-white';
    if($color == 'dark'){
        $subheading_color = ' text-secondary';
        $heading_color = ' text-primary';
        $description_color = ' text-black';
    }
?>

<section class="cta-banner-section z-[3] max-w-full h-auto relative bg-cover bg-[center_20%] bg-no-repeat <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?> <?php if(!empty($image)): ?>style="background-image: url(<?php echo esc_url($image['url']); ?>)" <?php endif; ?>>
               
    <div class="overlay h-full w-full justify-center <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php if( $bg_overlay): ?> style="background-color: <?php echo $bg_overlay; ?>" <?php endif; ?>>
         <div class="container mx-auto"> 
             <div class="<?php echo esc_attr($container_classes); ?>">
             <div class="w-full mx-auto text-center">
                    <?php if ($subheading) : ?>
                    <div class="text-sub-large <?php echo $subheading_color; ?> mb-[15px]" data-aos="fade-up">
                        <?php echo $subheading; ?>
                    </div> 
                    <?php endif; ?>
                    <?php if($heading): ?>
                        <h2 class="<?php echo $heading_color; ?> uppercase" data-aos="fade-up">
                                <?php echo $heading; ?>
                            </h2> 
                    <?php endif; ?>   
                    <?php if($description): ?>
                    <div class="<?php echo $description_color; ?> style-disc style-triangle lg:max-w-[60%] mx-auto mt-[15px]" data-aos="fade-up">                 
                        <?php echo $description; ?>                   
                    </div>
                 <?php endif; ?>  
                    <?php if ($buttons) : ?>
                        <div class="flex flex-wrap gap-4 <?php echo $btn_align;?> mt-5 lg:mt-8" data-aos="fade-up">
                            <?php foreach ($buttons as $button) : ?>
                                <?php 
                                $button_link = $button['button'];
                                $button_style = $button['button_style'];
                                if ($button_link) :
                                    $url = $button_link['url'];
                                    $title = $button_link['title'];
                                    $target = $button_link['target'] ? $button_link['target'] : '_self';
                                ?>
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="btn <?php if($button_style): echo $button_style; endif;?>">
                                        <?php echo esc_html($title); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                 <?php endif; ?>                
            </div> 
             </div>            
         </div>
   </div>   
</section>
<?php
 if(!empty($image_mobile)): ?>
    <style>
        @media (max-width: 575.98px) {
            .cta-banner-section{
                background-image: url(<?php echo esc_url($image_mobile['url']); ?>) !important;
            }
         }
    </style>
<?php endif; ?>    
<?php }
?>

