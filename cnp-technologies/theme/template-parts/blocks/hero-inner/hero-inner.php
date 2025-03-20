<?php
$hero = get_field('hero_inner');
if ($hero) {
    
    $heading = $hero['heading'];     
    $description = $hero['description'];    
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
    }    

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;

    //Container Settings

    $container_classes = 'flex flex-col h-full w-full ' . ($alignment === 'middle' ? 'justify-center' : ($alignment === 'bottom' ? 'justify-end' : ($alignment === 'top' ? 'justify-start' : 'justify-around'))) . ($alignment_hori === 'middle' ? ' items-center text-center' : ($alignment_hori === 'right' ? ' items-end text-right' : ($alignment_hori === 'left' ? ' items-start text-left' : ' items-stretch items-center')));
?>

<section class="hero-inner-section max-w-full bottom-shape custom-h h-[350px] md:h-[calc(300px+101px)] lg:h-[calc(300px+113px)] relative z-[1] bg-cover bg-fixed bg-center bg-no-repeat animate__animated <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?> data-animation="fadeIn" data-duration="1.1s">
    <?php if($banner_type['value'] == "video"){ 
                $videomp4 = $hero['banner_video_mp4'];  
                $poster_video = $hero['video_poster']; ?> 
                <video class="absolute top-0 left-0 h-full w-full object-cover object-top z-[1]" autoplay loop muted preload playsinline style="pointer-events: none;" <?php if( $poster_video ): ?> poster="<?php echo esc_url($poster_video['url']); ?>" <?php endif; ?>>
                    <?php if($videomp4): ?>
                    <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                    <?php endif; ?>
                </video>                     
            <?php } ?>              
    <div class="overlay <?php echo esc_attr($container_classes); ?> absolute z-[2] top-0 left-0 <?php if($banner_type['value'] != "color"){ ?> bg-[linear-gradient(270deg,rgba(0,55,108,0)_-0.57%,rgba(0,55,108,0.5)_94.01%),linear-gradient(0deg,rgba(0,55,108,0.55)_0%,rgba(0,55,108,0.55)_100%)] <?php }else{ ?> bg-[#00376C] <?php } ?>" >
     <div class="container mx-auto"> 
        <?php if ($heading) : ?>                 
            <h1 class="text-white animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <?php echo $heading; ?>
            </h1>           
           <?php endif; ?>            
           <?php if($description): ?>
                <div class="text-sub text-white mt-[10px] style-disc lg:max-w-[60%] xl:max-w-[60%] 2xl:max-w-[50%] <?php if($alignment_hori == 'middle'): ?> mx-auto <?php endif; ?> animate__animated" data-animation="fadeIn" data-duration="1.3s" >                 
                    <?php echo $description; ?>                   
                </div>
           <?php endif; ?> 
       
     <?php if ($buttons) : ?>
            <div class="flex flex-wrap <?php if($alignment_hori == 'middle'){ ?>justify-center <?php }else{ ?> justify-start <?php } ?> gap-4 mt-7 animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <?php foreach ($buttons as $button) : ?>
                    <?php 
                    $button_link = $button['button'];
                    $button_style = $button['button_style'];
                    $button_type = $button['button_type'];
                    if ($button_link) :
                        $url = $button_link['url'];
                        $title = $button_link['title'];
                        $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                        <div class="relative group bottom-shape-btn-<?php echo $button_type;?>">
                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min bottom-shape-btn btn <?php if($button_style): echo $button_style; endif;?>">
                            <span class="bottom-shape-btn-<?php echo $button_type;?>"><?php echo esc_html($title); ?></span> 
                        </a>     
                        
                       </div>            
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

