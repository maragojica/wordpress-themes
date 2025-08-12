<?php
$hero = get_field('hero');
if ($hero) {
    
    $heading = $hero['heading'];    
    $subheading = $hero['subheading'];   
    $description = $hero['description'];  
    $add_bottom_shape = $hero['add_bottom_shape'];
   
    $banner_type = $hero['banner_type'];
    $image = $hero['bg_image'];   
    $image_mobile = $hero['bg_image_mobile'];    
    $buttons = $hero['buttons'];  
       
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

    $container_classes = 'flex flex-col h-full w-full ' . ($alignment === 'middle' ? 'justify-center' : ($alignment === 'bottom' ? 'justify-end' : ($alignment === 'top' ? 'justify-start' : 'justify-around'))) . ($alignment_hori === 'middle' ? ' items-center text-center' : ($alignment_hori === 'right' ? ' items-end text-right' : ($alignment_hori === 'left' ? ' items-start text-left' : ' items-stretch items-center')));
?>
<section class="hero-section max-w-full relative <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
<div class="max-w-full z-[3] h-[700px] md:h-screen lg:h-screen 2xl:h-[1040px] relative bg-cover bg-center bg-no-repeat <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?> data-aos="fade-in">
    <?php if($banner_type['value'] == "video"){ 
                $videomp4 = $hero['banner_video_mp4'];  
                $poster_video = $hero['video_poster']; ?> 
                <video class="absolute top-0 left-0 h-full w-full object-cover object-center z-[1]" autoplay loop muted preload playsinline style="pointer-events: none;" <?php if( $poster_video ): ?> poster="<?php echo esc_url($poster_video['url']); ?>" <?php endif; ?>>
                    <?php if($videomp4): ?>
                    <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                    <?php endif; ?>
                </video>                     
            <?php } ?>              
    <div class="overlay <?php echo esc_attr($container_classes); ?> absolute z-[2] top-0 left-0 bg-[linear-gradient(0deg,_rgba(0,25,76,0.7)_0%,_rgba(0,25,76,0.7)_100%)]" >
     <div class="container mx-auto h-full <?php echo esc_attr($container_classes); ?> relative">     
        <?php if($subheading): ?>
            <div class="text-sub text-white mb-[15px]" data-aos="fade-up" >
                <?php echo $subheading; ?>
             </div>   
          <?php endif; ?>  
         <?php if ($heading) : ?>                 
            <h1 class="text-white uppercase" data-aos="fade-up">
                <?php echo $heading; ?>
            </h1>           
           <?php endif; ?>            
           <?php if($description): ?>
                <div class="text-white info style-disc lg:max-w-[75%] 2xl:max-w-[80%] <?php if($alignment_hori == 'middle'): ?> mx-auto <?php endif; ?>" data-aos="fade-up">                 
                    <?php echo $description; ?>                   
                </div>
           <?php endif; ?> 
       
     <?php if ($buttons) : ?>
            <div class="flex flex-wrap <?php if($alignment_hori == 'middle'){ ?>justify-center <?php }else{ ?> justify-start <?php } ?> gap-4 mt-5 lg:mt-10" data-aos="fade-up">
                <?php foreach ($buttons as $button) : ?>
                    <?php 
                    $button_link = $button['button'];
                    $button_style = $button['button_style'];
                    if ($button_link) :
                        $url = $button_link['url'];
                        $title = $button_link['title'];
                        $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                        <div class="relative group">
                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="btn <?php if($button_style): echo $button_style; endif;?>">
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
   <?php if($add_bottom_shape): $shape_color = $hero['shape_color']; ?>
    <div class="absolute bottom-[-5px] w-full z-[3]" >   
     <svg viewBox="0 0 1930 84" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: auto;">
     <?php if($shape_color == "white"): ?>
       <path d="M895.784 13.9837H789.547H0V83.1615H1929.5V34.9595H1200.64H1082.85L1022.81 0L895.784 59.0159V13.9837Z" fill="white"/>
     <?php else: ?>
        <path d="M895.784 13.9837H789.547H0V83.1615H1929.5V34.9595H1200.64H1082.85L1022.81 0L895.784 59.0159V13.9837Z" fill="#F7F7F7"/>
   <?php endif; ?> 
    </svg>
    </div>
    <?php endif; ?>
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
