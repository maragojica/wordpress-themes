<?php
$content_block = get_field('cta_banner');
if ($content_block) {
    
    $heading = $content_block['heading'];  
    $subheading = $content_block['subheading']; 
    $description = $content_block['description']; 
    $bg_overlay = $content_block['bg_overlay'];    
    $image = $content_block['bg_image'];   
    $image_mobile = $content_block['bg_image_mobile']; 
    $add_bottom_divider = $content_block['add_bottom_divider'];
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
    }    

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;

    //Container Settings

    $container_classes = 'flex flex-col h-full w-full ' . ($alignment === 'middle' ? 'justify-center' : ($alignment === 'bottom' ? 'justify-end' : ($alignment === 'top' ? 'justify-start' : 'justify-around'))) . ($alignment_hori === 'middle' ? 'items-center text-center' : ($alignment_hori === 'right' ? ' items-end text-left' : ($alignment_hori === 'left' ? ' items-start text-left' : ' items-stretch items-center')));
?>

<section class="cta-banner-section z-[3] max-w-full h-auto relative bg-cover bg-left lg:bg-center bg-no-repeat <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?> <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?>>
               
    <div class="overlay h-full w-full justify-center py-[3em] lg:py-[50px] <?php if( $bg_overlay): ?>bg-gradient-to-b from-[<?php echo $bg_overlay;?>] to-[<?php echo $bg_overlay;?>] <?php endif;?>" >
         <div class="container mx-auto"> 
             <div class="<?php echo esc_attr($container_classes); ?>">
             <div class="w-full md:w-3/5 xl:w-[61%]">
            <?php if ($heading) : ?>
                <div class="relative">
                    <?php if( $subheading): ?>
                        <div class="text-secondary subheading font-secondary capitalize rotate--10.166 absolute -left-[1.2rem] md:-left-[34px] lg:-left-[51px] -top-[12px] xl:top-0 z-[1] animate__animated" data-animation="fadeIn" data-duration="1.3s"><?php echo $subheading; ?></div>
                    <?php endif; ?>
                    <h2 class="text-white animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $heading; ?>
                    </h2>
                </div>               
                <?php endif; ?>
            <?php if($description): ?>
                    <div class="text-white mt-[1.5em] lg:pr-[4em] style-disc animate__animated" data-animation="fadeIn" data-duration="1.3s" >                 
                        <?php echo $description; ?>                   
                    </div>
            <?php endif; ?> 
        
            <?php if ($buttons) : ?>
                    <div class="flex flex-wrap justify-start gap-4 mt-6 animate__animated" data-animation="fadeIn" data-duration="1.5s">
                        <?php foreach ($buttons as $button) : ?>
                            <?php 
                            $button_link = $button['button'];
                            $button_style = $button['button_style'];
                            if ($button_link) :
                                $url = $button_link['url'];
                                $title = $button_link['title'];
                                $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
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
   <?php if($add_bottom_divider): ?>
     <div class="w-full absolute left-0 -bottom-[3px] z-3">
        <div class="line-border"></div>
        <div class="line-divider mt-[11px]"></div>        
     </div>
   <?php endif; ?>
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

