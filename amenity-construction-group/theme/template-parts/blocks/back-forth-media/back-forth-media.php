<?php
$content_block = get_field('content_block_media');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];    
    $hide_subheading_desktop = $content_block['hide_subheading_desktop'];  
    $description = $content_block['description'];        
    $buttons = $content_block['buttons'];
    $hide_media_mobile = $content_block['hide_media_mobile'];   
    $media_type = $content_block['media_type'];   
    $image = $content_block['image'];   
    $video_type = $content_block['video_type'];  
    $videomp4 = $content_block['video_mp4'];   
    $video_webm = $content_block['video_webm'];
    $youtube_id = $content_block['youtube_id'];
    $vimeo_id = $content_block['vimeo_id'];
    $poster = $content_block['poster']; 
    $add_bottom_shape = $content_block['add_bottom_shape'];
    $shape_type = $content_block['shape_type'];
    
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
    }

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;    
       
 
    $container_classes = 'flex flex-col lg:flex-row lg:flex-nowrap ' . ($reverse_desktop ? 'lg:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
    $heading_width = 'w-full lg:w-1/2 xl:w-1/2 2xl:w-[45%]'; 
    $content_width = 'w-full lg:w-1/2 xl:w-1/2 2xl:w-[55%]';      
    $btn_align = 'justify-start';
   
?>

<section class="back-foth-media-section max-w-full relative overflow-hidden <?php echo esc_attr($className); ?> " <?php echo $anchor_attr; ?>>   
    <div class="container mx-auto px-0 lg:px-[1.5rem] relative z-10">     
       <div class="<?php echo esc_attr($container_classes); ?> lg:gap-y-0 gap-y-[3em] <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
          <div class="<?php echo esc_attr($heading_width); ?> lg:min-h-[520px] px-[1.5rem] <?php if($reverse_desktop){ ?> lg:pl-[80px] <?php }else{ ?> lg:pr-[80px] <?php } ?> flex flex-col justify-center">
                 <?php if( $subheading): ?>
                    <div class="text-quaternary eyebrow uppercase mb-[23px] <?php if($hide_subheading_desktop): ?> lg:hidden block <?php endif;?>" data-aos="fade-up" >
                        <?php echo $subheading; ?>
                    </div> 
                <?php endif; ?>
                <?php if ($heading) : ?>
                    <h2 class="text-secondary" data-aos="fade-up" >
                        <?php echo $heading; ?>
                    </h2>                             
                <?php endif; ?> 
                <?php if($description): ?>
                    <div class="text-medium text-accent info style-disc" data-aos="fade-up">                 
                        <?php echo $description; ?>                   
                    </div>
                 <?php endif; ?> 
                   
                  <?php if ($buttons) : ?>
                    <div class="flex flex-wrap gap-3 lg:gap-8 mt-5 <?php echo $btn_align; ?>" data-aos="fade-up">
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
            <div class="<?php echo esc_attr($content_width); ?>" <?php if($reverse_desktop){ ?> data-aos="fade-left" <?php }else{ ?> data-aos="fade-right" <?php } ?>  >  
                  <div class="box-media w-full lg:h-full md:h-[30em] h-[20em] bg-cover bg-center bg-no-repeat <?php if($hide_media_mobile): ?> lg:block hidden <?php endif; ?>" <?php if($media_type['value'] == "image"){ if($image): ?>style="background-image: url('<?php echo esc_url($image['url']); ?>');" <?php endif; } ?>>
                    <?php if($media_type['value'] == "video"){   ?>   
                             
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
                        <?php } ?>  
                  </div>    
            </div>           
        </div>  
    </div>
    <?php if($add_bottom_shape): ?>       
            <div class="w-[60%] h-fit object-contain bottom-shape-wave absolute bottom-0 right-0 z-[-1] lg:block hidden">  
                <?php if($shape_type === 'waveone'): ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/bottom_wave_one.svg'); ?>" alt="Bottom Shape Wave" class="w-full h-fit object-contain"  data-aos="fade-in">
                <?php elseif($shape_type === 'wavetwo'): ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/bottom_wave_two.svg'); ?>" alt="Bottom Shape Wave" class="w-full h-fit object-contain"  data-aos="fade-in">
                <?php endif; ?>
            </div>
        <?php endif; ?> 
</section>

<?php }
?>

