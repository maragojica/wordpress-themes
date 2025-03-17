<?php
$logos = get_field('logos');
if ($logos) {    
    $heading = $logos['heading']; 
    $alignment = $logos['vertical_alignment'];   
    $logos_list = $logos['logos_info'];
  

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';


    //Spacing Settings
    $spacing = $logos['spacing'];
    $spacing_top_desktop = $logos['spacing_top_desktop'];
    $spacing_bottom_desktop = $logos['spacing_bottom_desktop'];
    $spacing_top_mobile = $logos['spacing_top_mobile'];
    $spacing_bottom_mobile = $logos['spacing_bottom_mobile'];

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

<section class="logos-list-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>  
     <div class="container mx-auto">  
        <div class="w-full text-left">
        <?php if ($heading) : ?>
            <h2 class="text-primary mb-[1em] lg:mb-[60px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <?php echo $heading; ?>
            </h2>
        <?php endif; ?> 
        </div> 
        <?php if( $logos_list ): ?> 
    <div class="slider-logos-list slider-fluid-full owl-carousel owl-theme relative overflow-hidden">
    <?php foreach ($logos_list as $column): 
            $logo = $column['logo']; 
            $link = $column['link'];  ?>
             <div class="logo-list-slide fluid-slide item w-full h-full">
             <div class="flex flex-col w-full h-full justify-center items-center text-center">
                <?php if(!empty($logo)): ?>
                    <?php  if($link) {
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                        <a tabindex="0" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" title="<?php echo $link_title; ?>" ><?php } ?>
                        <?php  echo wp_get_attachment_image(
                            $logo['ID'],
                            'full',
                            false,
                            array(
                                'class' => 'transition-all duration-300 w-fit h-[80px] lg:h-[75px] object-contain transition-transform',
                                'alt' => esc_attr($logo['alt']),
                            )
                        ); ?>                                    
                    <?php if($link) { ?>
                        </a>
                    <?php } ?>
                <?php endif; ?>   
                         
                </div>
             </div>
      <?php endforeach; ?> 
     </div>   
  
<?php endif; ?>
     </div>         
</section> 

<?php }?>


