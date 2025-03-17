<?php
$hero = get_field('cta_banner');
if ($hero) {
    
    $heading = $hero['heading'];
    $subheading = $hero['subheading'];
    $image = $hero['bg_image'];   
    $image_mobile = $hero['bg_image_mobile'];  
    $description = $hero['description'];    
    $buttons = $hero['buttons'];  
    $bg_color = $hero['bg_color'];    
    $add_border_bottom = $hero['add_border_bottom'];   
    $add_svg_icon = $hero['add_svg_icon'];       
    $alignment = $hero['vertical_alignment'];    

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';


    //Spacing Settings
    $spacing = $hero['spacing'];
    $spacing_top_desktop = $hero['spacing_top_desktop'];
    $spacing_bottom_desktop = $hero['spacing_bottom_desktop'];
    $spacing_top_mobile = $hero['spacing_top_mobile'];
    $spacing_bottom_mobile = $hero['spacing_bottom_mobile'];

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

    $container_classes = 'text-center flex flex-col items-center h-full w-full ' . ($alignment === 'middle' ? 'justify-center' : ($alignment === 'bottom' ? 'justify-end' : ($alignment === 'top' ? 'justify-start' : 'justify-around')));
?>

<section class="hero-section max-w-full h-[27em] sm:h-[30em] lg:h-[605px] relative <?php if($add_border_bottom):?> border-b-[12px] border-b-primary <?php endif;?> <?php if(!empty($image)):?> bg-cover bg-center bg-no-repeat sm:bg-fixed <?php endif; ?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?>>
   <div class="overlay <?php echo esc_attr($container_classes); ?> absolute z-2 top-0 left-0 px-0" <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
     <div class="container mx-auto">  
            <?php if($add_svg_icon): $svg_code_icon = $hero['svg_code_icon']; 
            if($svg_code_icon): ?>
                 <div class="text-center flex justify-center mb-[11px] sm:mb-[18px] mx-auto sm:max-w-fit max-w-[30px] animate__animated" data-animation="fadeIn" data-duration="1.1s"><?php echo $svg_code_icon; ?></div>
             <?php endif; endif; ?>   
             <?php if ($subheading) : ?>
                <h3 class="text-white bodymedium mb-[10px] animate__animated" data-animation="fadeIn" data-duration="1.3s">
                    <?php echo $subheading; ?>
                </h3>
            <?php endif; ?>
            <?php if ($heading) : ?>
                <h2 class="text-white mb-0 animate__animated" data-animation="fadeIn" data-duration="1.2s">
                    <?php echo $heading; ?>
                </h2>
            <?php endif; ?>          
            <?php if ($description) : ?>
                <div class="bodymedium mt-[36px] font-text-font text-white md:max-w[80%] lg:max-w-[75%] mx-auto animate__animated" data-animation="fadeIn" data-duration="1.4s">
                    <?php echo $description; ?>
                </div>
            <?php endif; ?>

            <?php if ($buttons) : ?>
                <div class="flex flex-wrap gap-4 justify-center mt-8 lg:mt-12 animate__animated" data-animation="fadeIn" data-duration="1.5s">
                    <?php foreach ($buttons as $button) : ?>
                        <?php 
                        $button_link = $button['button'];
                        $button_style = $button['button_style'];
                        if ($button_link) :
                            $url = $button_link['url'];
                            $title = $button_link['title'];
                            $target = $button_link['target'] ? $button_link['target'] : '_self';   ?>
                            <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                                <?php echo esc_html($title); ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>       
    
         </div>
   </div>
</section>
<?php if(!empty($image_mobile)): ?>
    <style>
        @media (max-width: 575.98px) {
            .hero-section{
                background-image: url(<?php echo esc_url($image_mobile['url']); ?>) !important;
            }
         }
    </style>
<?php endif; ?>    
<?php }
?>

