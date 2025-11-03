<?php
$content_block = get_field('content_block_video');
if ($content_block) {
    
    $bg_color = $content_block['bg_color'];
    $heading = $content_block['heading'];
    $add_top_corner_shape = $content_block['add_top_corner_shape'];
    $add_bottom_corner_shape = $content_block['add_bottom_corner_shape']; 
     $video_type = $content_block['video_type'];  
    $videomp4 = $content_block['video_mp4'];   
    $video_webm = $content_block['video_webm'];
    $youtube_id = $content_block['youtube_id'];
    $vimeo_id = $content_block['vimeo_id'];
    $poster = $content_block['poster'];  

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';

    //Spacing Settings
    $spacing = $content_block['spacing'];
    $spacing_top_desktop = $content_block['spacing_top_desktop'];
    $spacing_bottom_desktop = $content_block['spacing_bottom_desktop'];
    $spacing_top_mobile = $content_block['spacing_top_mobile'];
    $spacing_bottom_mobile = $content_block['spacing_bottom_mobile'];

    $spacing_class = '';
    switch ($spacing) {
         case 'xsmall':
            $spacing_class = 'padding-xsmall';
            break;
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

     if($bg_color === 'white'){
        $bg_class = 'bg-white';
    } elseif($bg_color === 'neutral'){
        $bg_class = 'bg-neutral';
    }    
           
?>

<section class="video-content-section max-w-full relative overflow-hidden <?php if($bg_color): echo $bg_class; endif; ?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>   
     <?php if($add_top_corner_shape){ $top_corner_shape = $content_block['top_corner_shape'];?>
        <div class="absolute left-0 z-1 shape-top-corner top-0 md:max-w-[30%] max-w-[50%]" data-aos="fade-in">
            <?php if(!empty($top_corner_shape)){ echo wp_get_attachment_image( $top_corner_shape['ID'], 'full' ); } ?>
        </div>
    <?php } ?>
     <?php if($add_bottom_corner_shape){ $bottom_corner_shape = $content_block['bottom_corner_shape'];?>
        <div class="absolute right-0 z-1 shape-bottom-corner bottom-0 md:max-w-[30%] max-w-[50%]" data-aos="fade-in">
            <?php if(!empty($bottom_corner_shape)){ echo wp_get_attachment_image( $bottom_corner_shape['ID'], 'full' ); } ?>
        </div>
    <?php } ?>
         
<div class="container mx-auto relative z-[2]">             
    <div class="flex items-center justify-center text-center">
       <div class="w-full lg:w-[60%]">
         <?php if($heading): ?>  
        <h2 class="text-foreground mb-[20px]]" data-aos="fade-in">                 
             <?php echo $heading; ?>
         </h2>    
         <?php endif; ?>   
           <div class="w-full lg:h-fit md:h-[25em] sm:h-[20em] h-[15em] relative">                    
            <?php if($video_type['value'] == "file"){  ?>   

                <video class="player" playsinline controls <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster); ?>" <?php endif; ?>>  
                    <?php if($videomp4): ?>
                        <source src="<?php echo $videomp4; ?>" type="video/mp4">
                    <?php endif; ?>  
                    <?php if($video_webm): ?>
                        <source src="<?php echo $video_webm; ?>" type="video/webm">
                    <?php endif; ?>                              
                    Your browser does not support the video tag.
                </video>  

                <?php }elseif($video_type['value'] == "youtube"){   ?>   
                    <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $youtube_id;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster); ?>" <?php endif; ?>></div>

                    <?php }elseif($video_type['value'] == "vimeo"){   ?>   
                        <div class="player" data-plyr-provider="vimeo" data-plyr-embed-id="<?php echo $vimeo_id;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster); ?>" <?php endif; ?>></div>
                <?php } ?>               
          </div> 
       </div>
    </div>          
</div> 
</section>

<?php }
?>
