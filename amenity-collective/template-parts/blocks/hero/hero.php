<?php
$hero = get_field('hero');
if ($hero) {
    
    $heading = $hero['heading'];
    $subheading = $hero['subheading'];
    $banner_type = $hero['banner_type'];
    $image = $hero['bg_image'];   
    $image_mobile = $hero['bg_image_mobile'];  
    $description = $hero['description'];    
    $buttons = $hero['buttons'];  
    $bg_color = $hero['bg_color'];   
    $add_border_bottom = $hero['add_border_bottom'];      
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

<section class="hero-section max-w-full h-[25em] lg:h-[80vh] relative <?php if($add_border_bottom):?> border-b-[12px] border-b-primary <?php endif;?> <?php if($banner_type['value'] == "image"): if(!empty($image)):?> bg-cover bg-center bg-no-repeat <?php endif; endif; ?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?>>
    <?php if($banner_type['value'] == "video"){ 
                $videomp4 = $hero['banner_video_mp4'];  
                $poster_video = $hero['video_poster']; ?> 
                <video class="absolute top-0 left-0 h-full w-full object-cover object-top z-[1]" aria-hidden="true" autoplay loop muted preload playsinline style="pointer-events: none;" <?php if( $poster_video ): ?> poster="<?php echo esc_url($poster_video['url']); ?>" <?php endif; ?>>
                    <?php if($videomp4): ?>
                    <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                    <?php endif; ?>
                </video>                     
            <?php } ?>
    <div class="overlay <?php echo esc_attr($container_classes); ?> absolute z-[2] top-0 left-0 pt-[140px] pb-[30px] lg:py-[35px] px-0" <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
     <div class="container mx-auto">  
            <?php if ($heading) : ?>
                <h1 class="text-white mb-[15px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
                    <?php echo $heading; ?>
                </h1>
            <?php endif; ?>
            <?php if ($subheading) : ?>
                <h2 class="text-white bodymedium animate__animated text-2xl lg:text-4xl normal-case" data-animation="fadeIn" data-duration="1.3s">
                    <?php echo $subheading; ?>
                </h2>
            <?php endif; ?>
            <?php if ($description) : ?>
                <div class="bodymedium mt-[10px] font-text-font text-white md:max-w[80%] lg:max-w-[46%] mx-auto animate__animated" data-animation="fadeIn" data-duration="1.4s">
                    <?php echo $description; ?>
                </div>
            <?php endif; ?>

            <?php if ($buttons) : ?>
                <div class="flex flex-wrap gap-4 justify-center mt-8 animate__animated" data-animation="fadeIn" data-duration="1.5s">
                    <?php foreach ($buttons as $button) : ?>
                        <?php 
                        $button_link = $button['button'];
                        $button_style = $button['button_style'];
                        if ($button_link) :
                            $url = $button_link['url'];
                            $title = $button_link['title'];
                            $target = $button_link['target'] ? $button_link['target'] : '_self';            ?>
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
<?php if($banner_type['value'] == "image"):
 if(!empty($image_mobile)): ?>
    <style>
        @media (max-width: 575.98px) {
            .hero-section{
                background-image: url(<?php echo esc_url($image_mobile['url']); ?>) !important;
            }
         }
    </style>
<?php endif; endif;?>    
<?php }
?>

