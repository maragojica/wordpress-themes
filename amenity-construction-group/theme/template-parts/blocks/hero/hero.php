<?php
$hero = get_field('hero');
if ($hero) {
    
    $heading = $hero['heading'];    
    $subheading = $hero['subheading'];   
    $description = $hero['description'];  
   
    $banner_type = $hero['banner_type'];
    $image = $hero['bg_image'];      
    $overlay_opacity = $hero['overlay_opacity'];  
   
    $buttons = $hero['buttons'];  

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
<section class="hero-section max-w-full relative z-[1] <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
<div class="top-image max-w-full h-[20em] md:h-[30em] 2xl:h-[705px] relative bg-cover bg-center bg-no-repeat <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" data-aos="fade-in">
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
  <div class="content-hero bg-white max-w-full relative z-[10]">
    <div class="w-full mx-auto h-full relative lg:px-0 px-[1.5rem] lg:py-0 py-[3em]">       
        <div class="w-full mx-auto <?php echo esc_attr($container_classes); ?> gap-y-0">
            <div class="<?php echo esc_attr($heading_width); ?> lg:mt-[-68px] lg:text-right lg:py-[52px] bg-white lg:pr-[80px] lg:pl-[1.5rem]">
                 <?php if ($heading) : ?>                 
                    <h1 class="text-secondary mb-0" data-aos="fade-up">
                        <?php echo $heading; ?>
                    </h1>           
                <?php endif; ?>     
                <?php if($subheading): ?>
                    <div class="subheadline uppercase text-tertiary mt-[23px]" data-aos="fade-up" >
                        <?php echo $subheading; ?>
                    </div>   
                <?php endif; ?> 
            </div>
            <div class="<?php echo esc_attr($content_width); ?> lg:text-left lg:py-[65px] bg-white lg:mt-0 mt-[23px] lg:pr-[1.5rem]">
                <div class="lg:max-w-[600px] max-full">
                <?php if($description): ?>
                <div class="text-medium text-accent info style-disc" data-aos="fade-up">                 
                    <?php echo $description; ?>                   
                </div>
           <?php endif; ?> 
            <?php if ($buttons) : ?>
            <div class="flex flex-wrap gap-3 lg:gap-8 mt-5" data-aos="fade-up">
                <?php foreach ($buttons as $button) : ?>
                    <?php 
                    $button_link = $button['button'];
                    $button_type = $button['button_type'];
                    $button_style_btn = $button['button_style_btn'];
                    $button_style_link = $button['button_style_link'];
                    $button_style = '';
                    if ($button_type === 'btn') {
                        $button_style = 'btn ';
                        if ($button_style_btn) {
                            $button_style .= ' ' . $button_style_btn;
                        }
                    } elseif ($button_type === 'link') {
                        $button_style = 'simple-link ';
                        if ($button_style_link) {
                            $button_style .= ' ' . $button_style_link;
                        }
                    }
                    if ($button_link) :
                        $url = $button_link['url'];
                        $title = $button_link['title'];
                        $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                        <div class="relative group">
                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="<?php if($button_style): echo $button_style; endif;?>">
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
      </div>
  </div>    
</section>
  
<?php }
?>
