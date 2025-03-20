<?php
$hero = get_field('hero_resource');
if ($hero) {
    
    $heading = $hero['heading'];   
    $author = $hero['author'];   
    $resource_type = $hero['resource_type'];  
    $banner_type = $hero['banner_type'];
    $image = $hero['bg_image'];   
    $image_mobile = $hero['bg_image_mobile'];  
   
       
    $alignment = $hero['vertical_alignment'];    
    $alignment_hori = $hero['horizontal_alignment'];  

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

    $container_classes = 'flex flex-col h-full w-full ' . ($alignment === 'middle' ? 'justify-center' : ($alignment === 'bottom' ? 'justify-end' : ($alignment === 'top' ? 'justify-start' : 'justify-around'))) . ($alignment_hori === 'middle' ? ' items-center text-center' : ($alignment_hori === 'right' ? ' items-end text-right' : ($alignment_hori === 'left' ? ' items-start text-left' : ' items-stretch items-center')));
?>

<section class="hero-resource-section max-w-full bottom-shape relative z-[1] bg-cover bg-fixed bg-center bg-no-repeat animate__animated <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?> data-animation="fadeIn" data-duration="1.1s">
   <?php if( $resource_type ): ?>
    <div class="bg-secondary max-w-[30%] lg:max-w-[10em] xl:max-w-[17em] pl-[1.5rem] pr-[15px] py-[4px] text-white mb-[20px] lg:text-right text-left w-[calc(100%-1.5rem)]"><p class="mb-0"><?php echo $resource_type['label'];?></p></div>
    <?php endif; ?>
     <div class="container mx-auto <?php echo esc_attr($container_classes); ?>"> 
        <?php if ($heading) : ?>                 
            <h1 class="text-white mb-0 animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <?php echo $heading; ?>
            </h1>           
           <?php endif; ?>     
           <div class="mt-[30px]">
            <h4 class="text-white"><?php the_time('F j, Y'); ?>   <?php if($author): ?>|  <?php echo $author; endif;?></h4>
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

