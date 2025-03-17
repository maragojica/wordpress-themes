<?php
$content_block = get_field('content_icons');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];   
    $description = $content_block['description'];
    $buttons = $content_block['buttons'];
    $columns_content = $content_block['columns_content'];
    $bg_color = $content_block['bg_color'];   

     //Content Colors
     $heading_color = $content_block['heading_color'];
     $subheading_color = $content_block['subheading_color'];
     $description_color = $content_block['description_color'];
 

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
    

    //Columns Text Align Settings
    $columns_text_align = $content_block['columns_number'];   

    $select_columns = 'w-full px-3 mb-4';
    switch ($columns_text_align) {
        case 'two':
            $select_columns .= ' sm:w-1/2 md:w-1/2 lg:w-1/2';
            break;
        case 'three':
            $select_columns .= ' sm:w-1/2 md:w-1/2 lg:w-1/3';
            break;
        case 'four':
            $select_columns .= ' sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/4';
            break;
    }
     
    //Columns Number Settings
    $columns_number = $content_block['columns_text_align'];   

    $text_align = 'text-center';
    switch ($text_align) {
        case 'right':
            $text_align = 'text-right';
            break;
        case 'left':
            $text_align = 'text-left';
            break;
    }
   
   
?>

<section class="columns-icons-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="container xl:max-w[80%] 2xl:max-w-[75%] 4k:max-w-[40%] mx-auto">           
        <div class="w-full <?php echo $text_align; ?> animate__animated" data-animation="fadeIn" data-duration="1.5s">                
            <?php if ($subheading) : ?>
                <h3 class="<?php echo $subheading_color;?> mb-[10px]">
                    <?php echo $subheading; ?>
                </h3>
            <?php endif; ?>
            <?php if ($heading) : ?>               
                <h2 class="<?php echo $heading_color;?> mb-[20px]" <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
                        <?php echo $heading; ?>                 
                </h2>  
            <?php endif; ?>    
            <?php if ($description) : ?>
                <div class="font-text-font style-disc lg:max-w-[70%] mx-auto <?php echo $description_color;?>">
                    <?php echo $description; ?>
                </div>
            <?php endif; ?>                      
        </div>
        <?php if($columns_content): $animation_delay = 1; ?>
        <div class="flex flex-col sm:flex-row flex-wrap justify-center lg:max-w-[80%] mx-auto mt-[3em] lg:mt-[60px]">   
            <?php foreach ($columns_content as $column) : 
                
                 $icon = $column['icon'];
                 $title = $column['title'];                
                 $duration = $animation_delay . 's'; ?>
                <div class="<?php echo $select_columns; ?> animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                    <div class="flex flex-col h-full relative justify-between items-center <?php echo $text_align; ?>">                  
                     
                      <?php  if(!empty($icon)): 
                                echo wp_get_attachment_image(
                                    $icon['ID'],
                                    'full',
                                    false,
                                    array(
                                        'class' => 'transition-all duration-300 h-[88px] object-contain',
                                        'alt' => esc_attr($icon['alt']),
                                    )
                                );
                           endif;  ?>
                                            
                        <div class="flex-wrap">
                            <?php if($title): ?>
                                <div class="text-heading font-secondary-font uppercase mb-3 mt-[20px] <?php echo $subheading_color;?>"><?php echo $title; ?></div>
                            <?php endif; ?>                              
                        </div>                      
                    </div>
                </div>
            <?php $animation_delay += 0.75; endforeach; ?>      
        </div>
        <?php endif; ?>  
        <div class="w-full <?php echo $text_align; ?> animate__animated" data-animation="fadeIn" data-duration="1.5s">   
            <?php if ($buttons) : ?>
                <div class="flex flex-wrap gap-4 justify-center mt-6 lg:mt-[40px]">
                    <?php foreach ($buttons as $button) : ?>
                        <?php 
                        $button_link = $button['button'];
                        $button_style = $button['button_style'];
                        if ($button_link) :
                            $url = $button_link['url'];
                            $title = $button_link['title'];
                            $target = $button_link['target'] ? $button_link['target'] : '_self';
                        ?>
                            <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-full sm:min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                                <?php echo esc_html($title); ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>            
        </div>    
    </div>
</section>

<?php }
?>

