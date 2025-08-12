<?php
$hero = get_field('hero_title');
if ($hero) {
    
    $heading = $hero['heading'];       

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
<section class="hero-title-section max-w-full relative overflow-hidden z-[1] h-[9em] sm:h-[25em] lg:h-[20em] relative border-b-[12px] border-b-secondary <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
<div class="overlay text-center flex flex-col items-center h-full w-full justify-center absolute z-[2] top-0 left-0 px-0 bg-primary">
     <div class="container mx-auto">
          <?php if ($heading) : ?>   
			<h1 class="text-white mb-0 capitalize" data-aos="fade-up">
            <?php echo $heading; ?>
			</h1>
            <?php endif; ?>
         </div>
   </div>
</section>
  
<?php }
?>
