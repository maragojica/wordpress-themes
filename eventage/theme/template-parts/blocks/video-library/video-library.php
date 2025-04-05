<?php
$content_block = get_field('content_video_library');
if ($content_block) {    
    $video_library = $content_block['video_library'];       
   
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
       
 
    $container_classes = 'flex flex-col flex-wrap md:flex-row md:mx-[-15px]';
    $content_width = 'w-full md:w-[50%] md:px-[15px]';      
   
?>

<section class="video-library-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>   
    <div class="container mx-auto"> 
        <?php if( $video_library): ?>    
       <div class="<?php echo esc_attr($container_classes); ?> gap-y-[32px]">      
       <?php foreach ($video_library as $video) :                 
            $video_type = $video['video_type'];  
            $videomp4 = $video['video_mp4'];   
            $video_webm = $video['video_webm'];
            $youtube_id = $video['youtube_id'];
            $vimeo_id = $video['vimeo_id'];
            $poster = $video['poster'];  ?> 

            <div class="<?php echo esc_attr($content_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.2s" >  
                <div class="rounded-[5px] w-full">                             
                        <?php if($video_type['value'] == "file"){  ?>   
                        <video class="player rounded-[5px]" playsinline controls <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster); ?>" <?php endif; ?>>  
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
            <?php endforeach; ?>              
        </div>  
        <?php endif; ?>
    </div>
</section>

<?php }
?>

