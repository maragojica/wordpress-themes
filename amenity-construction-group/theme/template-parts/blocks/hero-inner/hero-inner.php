<?php
$hero = get_field('hero_internal');
if ($hero) {
    
    $heading = $hero['heading'];  
    $hide_heading_mobile = $hero['hide_heading_mobile'];    
   
    $banner_type = $hero['banner_type'];
    $image = $hero['bg_image'];      
    $overlay_opacity = $hero['overlay_opacity'];  

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

    $container_classes = 'flex flex-col lg:flex-row h-full w-full ';
     $heading_width = 'w-full lg:w-1/2 flex flex-col'; 
    $content_width = 'w-full lg:w-1/2 flex flex-col'; 
    
    // Overlay Opacity
    $overlay_opacity_class = '';
    if ($overlay_opacity) {
         $value_overlay = $overlay_opacity / 100;
        $overlay_opacity_class = 'rgba(0,0,0,' . esc_attr($value_overlay) . ')';
    } else {
        $overlay_opacity_class = 'rgba(0,0,0,0.4)';
    }
?>
<section class="hero-inner-section max-w-full relative overflow-hidden z-[1] <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
<div class="top-image max-w-full h-[20em] md:h-[30em] 2xl:h-[700px] relative bg-cover bg-center bg-no-repeat <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" data-aos="fade-in">
     <?php if($banner_type['value'] == "image"){ ?>
        <?php if (!empty($image)) : ?>
            <?php echo wp_get_attachment_image(
                $image['ID'],
                'full',
                false,
                array(
                    'class' => 'w-full h-full object-bottom object-cover'
                )
            ); endif; ?>
    <?php }elseif($banner_type['value'] == "video"){ 
                $videomp4 = $hero['banner_video_mp4'];  
                $poster_video = $hero['video_poster']; ?> 
                <video class="absolute top-0 left-0 h-full w-full object-cover object-center z-[1]" autoplay loop muted preload playsinline style="pointer-events: none;" <?php if( $poster_video ): ?> poster="<?php echo esc_url($poster_video['url']); ?>" <?php endif; ?>>
                    <?php if($videomp4): ?>
                    <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                    <?php endif; ?>
                </video>                     
            <?php } ?>              
    <div class="overlay <?php echo esc_attr($container_classes); ?> absolute top-0 left-0" style="background-color: <?php echo esc_attr($overlay_opacity_class); ?>;"></div>  
   </div>
  <div class="content-hero max-w-full w-full absolute left-0 bottom-[-1px] z-[3]">
       <div class="container mx-auto">
          <div class="bg-white text-center max-w-fit px-[15px] py-[15px] md:px-[25px] md:py-[25px] lg:py-[35px] lg:px-[60px] <?php if($hide_heading_mobile): ?> lg:block hidden <?php endif; ?>">       
          <?php if ($heading) : ?>                 
                <h1 class="text-secondary mb-0" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h1>           
            <?php endif; ?>
        </div> 
       </div>
  </div>    
</section>
  
<?php }
?>
