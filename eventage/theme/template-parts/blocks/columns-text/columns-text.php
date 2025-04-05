<?php
$content_block = get_field('content_block_text');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];    
    $description_one = $content_block['description_column_one'];
    $description_two = $content_block['description_column_two'];
    $buttons = $content_block['buttons'];   
    $columns_number = $content_block['columns_number'];     
    $full_title = $content_block['full_title'];    
    $heading_type = $content_block['heading_type'];  
    $add_video_lightbox = $content_block['add_video_lightbox'];     
    
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
       
 

    if ($columns_number == "two") {
        $container_classes = 'h-full flex flex-col lg:flex-row ' . ($reverse_desktop ? 'lg:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
        $row_classes = 'items-left';
        $heading_width = 'lg:w-1/2'; 
        $content_width = 'lg:w-1/2';      
        $btn_align = 'justify-start';
    } else {
        $container_classes = 'flex flex-col items-center text-center lg:max-w-[60%] xl:max-w-[50%] lg:mx-auto';
        $row_classes = 'items-center';
        $heading_width = 'w-full';    
        $content_width = 'w-full';      
        $btn_align = 'justify-center';
    }
   
?>

<section class="columns-text-section overflow-hidden max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    
    <div class="container mx-auto">     
    <?php if($full_title): if ($heading) : ?>
            <div class="w-full text-center">
            <?php if ($subheading) : ?>
                <h6 class="text-primary text-center mb-[10px] animate__animated" data-animation="fadeIn" data-duration="1.1s"><?php echo esc_html($subheading); ?></h6>
            <?php endif; ?>
            <?php if($heading_type == "tertiary"){ ?>
                <h3 class="text-black mb-[20px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
                    <?php echo $heading; ?>
                </h3> 
               <?php }else{ ?>               
                <h2 class="text-black mb-[20px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
                    <?php echo $heading; ?>
                </h2> 
                <?php } ?>
            </div>
         <?php endif; endif; ?> 
       <div class="<?php echo esc_attr($container_classes); ?> gap-y-[1em] lg:gap-y-0 lg:gap-x-[2em]">
          <div class="<?php echo esc_attr($heading_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <div class="flex flex-col justify-center <?php echo esc_attr($row_classes); ?>">
                <?php if ($subheading) : ?>
                    <h6 class="text-primary mb-[10px] animate__animated" data-animation="fadeIn" data-duration="1.1s"><?php echo esc_html($subheading); ?></h6>
                <?php endif; ?>               
                <?php if ($heading) : ?>
                    <?php if($heading_type == "tertiary"){ ?>                   
                       <h3 class="text-black uppercase animate__animated"  data-animation="fadeIn" data-duration="1.5s">
                        <?php echo $heading; ?>
                        </h3>
                    <?php }else{ ?>
                        <h2 class="text-black uppercase animate__animated"  data-animation="fadeIn" data-duration="1.5s">
                        <?php echo $heading; ?>
                    </h2>
                    <?php } ?>
                <?php endif; ?> 
                    <?php if($description_one): ?>
                    <div class="text-black <?php if ($heading) : ?> mt-[1em] <?php endif; ?> style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                        <?php echo $description_one; ?>                   
                    </div>
                    <?php endif; ?>  
                    <?php  if ($columns_number == "one") { ?> 
                        <?php if ($buttons) : ?>
                            <div class="flex flex-wrap <?php echo $btn_align;?> gap-4 mt-[40px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
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
                    <?php if($add_video_lightbox):  $video_lightbox_text = $content_block['video_lightbox_text']; $vimeo_id = $content_block['vimeo_id'];   ?>   
                        <div class="flex flex-wrap <?php echo $btn_align;?> gap-4 mt-[40px] animate__animated" data-animation="fadeIn" data-duration="1.5s">  
                        <div class="relative group">
                            <a href="https://vimeo.com/<?php echo $vimeo_id; ?>" tabindex="0" data-fancybox="video-gallery" aria-label="<?php echo esc_html($video_lightbox_text); ?>" title="<?php echo esc_html($video_lightbox_text); ?>" class="min-w-min btn btn_primary flex items-center gap-[10px]">
                            <span><?php echo esc_html($video_lightbox_text); ?></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <mask id="mask0_207_83" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                        <rect width="24" height="24" fill="#D9D9D9"/>
                                    </mask>
                                    <g mask="url(#mask0_207_83)">
                                        <path d="M10 15.577L15.577 12L10 8.423V15.577ZM12.0033 21C10.7587 21 9.58867 20.7638 8.493 20.2915C7.3975 19.8192 6.4445 19.1782 5.634 18.3685C4.8235 17.5588 4.18192 16.6067 3.70925 15.512C3.23642 14.4175 3 13.2479 3 12.0033C3 10.7587 3.23617 9.58867 3.7085 8.493C4.18083 7.3975 4.82183 6.4445 5.6315 5.634C6.44117 4.8235 7.39333 4.18192 8.488 3.70925C9.5825 3.23642 10.7521 3 11.9967 3C13.2413 3 14.4113 3.23617 15.507 3.7085C16.6025 4.18083 17.5555 4.82183 18.366 5.6315C19.1765 6.44117 19.8181 7.39333 20.2908 8.488C20.7636 9.5825 21 10.7521 21 11.9967C21 13.2413 20.7638 14.4113 20.2915 15.507C19.8192 16.6025 19.1782 17.5555 18.3685 18.366C17.5588 19.1765 16.6067 19.8181 15.512 20.2908C14.4175 20.7636 13.2479 21 12.0033 21Z" fill="#0096FA"/>
                                    </g>
                               </svg>
                            </a>    
                           </div> 
                        </div>
                     <?php endif; ?>  
                    <?php } ?>          
                    
                </div>
            </div> 
            <?php if($description_two): ?>
            <div class="<?php echo esc_attr($content_width); ?> animate__animated text-secondary style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                <?php echo $description_two; ?> 
                <?php  if ($columns_number == "two") { ?>   
                    <?php if ($buttons) : ?>
                            <div class="flex flex-wrap <?php echo $btn_align;?> gap-4 mt-[40px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
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
                    <?php if($add_video_lightbox):  $video_lightbox_text = $content_block['video_lightbox_text']; $vimeo_id = $content_block['vimeo_id'];   ?>   
                        <div class="flex flex-wrap <?php echo $btn_align;?> gap-4 mt-[40px] animate__animated" data-animation="fadeIn" data-duration="1.5s">  
                        <div class="relative group">
                            <a href="https://vimeo.com/<?php echo $vimeo_id; ?>" tabindex="0" data-fancybox="video-gallery" aria-label="<?php echo esc_html($video_lightbox_text); ?>" title="<?php echo esc_html($video_lightbox_text); ?>" class="min-w-min btn btn_primary flex items-center gap-[10px]">
                                <span><?php echo esc_html($video_lightbox_text); ?></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <mask id="mask0_207_83" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                        <rect width="24" height="24" fill="#D9D9D9"/>
                                    </mask>
                                    <g mask="url(#mask0_207_83)">
                                        <path class="group-hover:fill-white" d="M10 15.577L15.577 12L10 8.423V15.577ZM12.0033 21C10.7587 21 9.58867 20.7638 8.493 20.2915C7.3975 19.8192 6.4445 19.1782 5.634 18.3685C4.8235 17.5588 4.18192 16.6067 3.70925 15.512C3.23642 14.4175 3 13.2479 3 12.0033C3 10.7587 3.23617 9.58867 3.7085 8.493C4.18083 7.3975 4.82183 6.4445 5.6315 5.634C6.44117 4.8235 7.39333 4.18192 8.488 3.70925C9.5825 3.23642 10.7521 3 11.9967 3C13.2413 3 14.4113 3.23617 15.507 3.7085C16.6025 4.18083 17.5555 4.82183 18.366 5.6315C19.1765 6.44117 19.8181 7.39333 20.2908 8.488C20.7636 9.5825 21 10.7521 21 11.9967C21 13.2413 20.7638 14.4113 20.2915 15.507C19.8192 16.6025 19.1782 17.5555 18.3685 18.366C17.5588 19.1765 16.6067 19.8181 15.512 20.2908C14.4175 20.7636 13.2479 21 12.0033 21Z" fill="#0096FA"/>
                                    </g>
                                 </svg>
                            </a>    
                           </div> 
                        </div>
                     <?php endif; ?>   
                <?php } ?>                   
            </div>
            <?php endif; ?>
        </div>  
    </div>  
</section>

<?php }
?>

