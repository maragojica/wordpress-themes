<?php
$content_block = get_field('content_info_text');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];    
    $description = $content_block['description'];    
    $buttons = $content_block['buttons'];     

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
      
    $container_classes = 'flex flex-col items-center justify-center';        
    $content_width = 'w-full';      
    $btn_align = 'justify-start';
    
   
?>

<section class="content-info-section overflow-hidden max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
   
    <div class="container mx-auto">     
       <div class="<?php echo esc_attr($container_classes); ?>">
          <div class="<?php echo esc_attr($content_width); ?> ">
                <div class="flex flex-col justify-center">
                <?php if( $subheading): ?>
                    <div class="subheadline uppercase text-tertiary mb-[23px]" data-aos="fade-up" >
                        <?php echo $subheading; ?>
                    </div> 
                <?php endif; ?>
                <?php if ($heading) : ?>
                    <h2 class="text-secondary" data-aos="fade-up" >
                        <?php echo $heading; ?>
                    </h2>                             
                <?php endif; ?>
                    <?php if($description): ?>
                        <div class="text-accent info style-disc" data-aos="fade-up">                 
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
            </div>           
        </div>  
    </div>
</section>

<?php }
?>

