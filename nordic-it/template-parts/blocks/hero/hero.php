<?php
$hero = get_field('hero');
if ($hero) {
    
    $heading = $hero['heading'];
    $subheading = $hero['subheading'];
    $image = $hero['bg_image'];   
    $image_mobile = $hero['bg_image_mobile'];  
    $description = $hero['description'];    
    $buttons = $hero['buttons'];  
    $bg_color = $hero['bg_color'];
    $bg_position = $hero['bg_position'];
	$bg_fixed = $hero['bg_fixed'];
    $shape_image = $hero['shape_image'];   

     //Content Colors
     $heading_color = $hero['heading_color'];
     $subheading_color = $hero['subheading_color'];
     $description_color = $hero['description_color'];

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
?>

<section class="hero-section max-w-full h-[35em] sm:h-[30em]  lg:h-screen relative custom-green-gradient <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
    <?php if(!empty($shape_image)): 
         echo wp_get_attachment_image(
            $shape_image['ID'],
            'full',
            false,
            array(
                'class' => 'absolute right-0 top-0 h-[250px] 2xl:h-[400px] object-contain invisible lg:visible',
                'alt' => esc_attr($shape_image['alt']),
            )
        );
     endif; ?>    
   <div class="container relative z-2 mx-auto h-full">
   <div class="content-hero relative h-full animate__animated <?php if(!empty($image)):?> bg-cover <?php echo $bg_position;?> bg-no-repeat <?php if($bg_fixed):?> sm:bg-fixed <?php endif; endif; ?> " <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?> data-animation="fadeIn" data-duration="1.2s">
       <div class="overlay text-center flex flex-col items-center sm:justify-center justify-start lg:justify-start h-full w-full absolute top-0 left-0 pt-[140px] sm:py-[120px] lg:px-0 px-[1em]" <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
       <?php if ($subheading) : ?>
            <h3 class="<?php echo $subheading_color; ?> bodymedium hide-br-desk animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <?php echo $subheading; ?>
            </h3>
        <?php endif; ?>
        <?php if ($heading) : ?>
            <h1 class="<?php echo $heading_color;?> mt[10px] animate__animated" data-animation="fadeIn" data-duration="1.3s">
                <?php echo $heading; ?>
            </h1>
        <?php endif; ?>

        <?php if ($description) : ?>
            <div class="bodymedium mt-[10px] font-text-font <?php echo $description_color; ?> md:max-w[80%] lg:max-w-[46%] mx-auto animate__animated" data-animation="fadeIn" data-duration="1.4s">
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
                        $target = $button_link['target'] ? $button_link['target'] : '_self';
                    ?>
                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-full sm:min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                            <?php echo esc_html($title); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
       </div>
    </div>
   </div>
</section>
<?php if(!empty($image_mobile)): ?>
    <style>
        @media (max-width: 575.98px) {
            .content-hero{
                background-image: url(<?php echo esc_url($image_mobile['url']); ?>) !important;
            }
         }
    </style>
<?php endif; ?>    
<?php }
?>

