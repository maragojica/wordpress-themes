<?php
$content_block = get_field('content_block_media_content');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];    
    $description = $content_block['description'];        
    $buttons = $content_block['buttons'];
    $media_type = $content_block['media_type'];   
    $image = $content_block['image'];   
    $video_type = $content_block['video_type'];  
    $videomp4 = $content_block['video_mp4'];   
    $video_webm = $content_block['video_webm'];
    $youtube_id = $content_block['youtube_id'];
    $vimeo_id = $content_block['vimeo_id'];
    $poster = $content_block['poster'];
    
    $reverse_desktop = in_array('yes', $content_block['reverse_order_desktop']);
    $reverse_mobile = in_array('yes', $content_block['reverse_order_mobile']);
    $alignment = $content_block['vertical_alignment'];

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
       
 
    $container_classes = 'h-full flex flex-col md:flex-row ' . ($reverse_desktop ? 'md:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
    $heading_width = 'w-full md:w-[45%]'; 
    $content_width = 'w-full md:w-[55%]';      
    $btn_align = 'justify-start';
   
?>

<section class="back-foth-media-content-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>   
    <div class="container mx-auto">     
       <div class="<?php echo esc_attr($container_classes); ?> md:gap-y-0 gap-y-[3em] ">
          <div class="<?php echo esc_attr($heading_width); ?> md:py-[102px] px-[1.5rem] <?php if($reverse_desktop){ ?> md:pl-[80px] <?php }else{ ?> md:pr-[80px] <?php } ?> flex flex-col justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <?php if ($heading) : ?>
                    <h3 class="text-black uppercase mb-[20px] animate__animated"  data-animation="fadeIn" data-duration="1.5s">
                        <?php echo $heading; ?>
                    </h3>
                <?php endif; ?> 
                <?php if($description): ?>
                    <div class="text-black animate__animated" data-animation="fadeIn" data-duration="1.3s" >                 
                        <?php echo $description; ?>                   
                    </div>
               <?php endif; ?> 
                <?php if ($buttons) : ?>
                    <div class="flex flex-wrap justify-start gap-4 mt-[30px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
                    <?php foreach ($buttons as $button) : ?>
                        <?php 
                        $button_link = $button['button'];
                        $button_style = $button['button_style'];
                        if ($button_link) :
                            $url = $button_link['url'];
                            $title = $button_link['title'];
                            $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                            <div class="relative group">
                            <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                                <?php echo esc_html($title); ?>
                            </a>     
                            
                        </div>            
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
              <?php endif; ?>  
            </div>            
            <div class="<?php echo esc_attr($content_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s" >  
                <div class="rounded-[5px] h-full w-full">
                <?php if($media_type['value'] == "image"){ ?>
                            <?php if ( !empty($image)) : 
                                    $srcset = wp_get_attachment_image_srcset($image['ID']);
                                    $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                <img class="img-fluid rounded-[5px] w-full h-full object-center object-cover parallax-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="550" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                            <?php endif; ?>   
                        <?php }elseif($media_type['value'] == "video"){   ?>   
                             
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
                        <?php } ?>    
                </div>
            </div>           
        </div>  
    </div>
    
</section>

<?php }
?>
