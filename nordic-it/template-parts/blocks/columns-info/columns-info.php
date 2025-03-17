<?php
$content_block = get_field('content_info');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];   
    $columns_content = $content_block['columns_content'];
    $bg_color = $content_block['bg_color'];       
    $add_bottom_divider = $content_block['add_bottom_divider']; 

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

     //Text Color Settings
     $text_color = $content_block['text_color_style'];

     if($text_color == "light"){
        $headline_color = "text-accent";
        $subheadline_color = "text-primary";
        $description_color = "text-primary";
        $cta_color = " text-accent hover:accent";
        $divider_color = "bg-primary";
        $arrow_color = "#F4F2ED";
        $border_color = "#8B9589";

     }else{
        $headline_color = "text-secondary-dark";
        $subheadline_color = "text-secondary";
        $description_color = "text-secondary";
        $cta_color = " text-secondary-dark hover:text-secondary-dark";
        $divider_color = "bg-secondary";
        $arrow_color = "#324249";
        $border_color = "#628290";
     }   

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
   
    //Buttons Styles
    $button_style = "flex items-center justify-center gap-[12px] text-subheading font-secondary-font uppercase".$cta_color;
?>

<section class="columns-info-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="container mx-auto">           
        <div class="w-full animate__animated" data-animation="fadeIn" data-duration="1.5s">                
            <?php if ($subheading) : ?>
                <h3 class="<?php echo $subheadline_color;?> mb-[10px] lg:text-left text-center">
                    <?php echo $subheading; ?>
                </h3>
            <?php endif; ?>
            <?php if ($heading) : ?>
               <div class="w-full relative">
                <h2 class="<?php echo $headline_color;?> mb-[20px] z-[2] relative lg:w-fit pr-4 sm:pr-8 lg:text-left text-center" <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
                        <?php echo $heading; ?>
                 </h2>
                 <div class="w-full h-[4px] <?php echo $divider_color; ?> absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 z-[1] invisible lg:visible"></div>
               </div>
            <?php endif; ?>    
            
        </div>
        <?php if($columns_content): $animation_delay = 1; ?>
        <div class="flex flex-col sm:flex-row flex-wrap justify-center -mx-3 mt-[3em] lg:mt-[64px]">   
            <?php foreach ($columns_content as $column) : 

                 $add_icon = $column['add_icon'];
                 $icon = $column['icon'];
                 $title = $column['title'];
                 $text = $column['text']; 
                 $cta = $column['cta']; 
                 $duration = $animation_delay . 's'; ?>
                <div class="<?php echo $select_columns; if($add_icon): ?> mt-[64px] <?php endif; ?> animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                    <div class="flex flex-col h-full relative justify-between items-center <?php echo $text_align; ?> p-[28px] rounded-[12px] border-4 border-solid" style="border-color: <?php echo $border_color;?>">
                    <?php
                      if($add_icon): ?>
                      <div class="px-5 absolute -top-[60px] left-1/2 transform -translate-x-1/2 -translate-y-0 transition-all duration-300" <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
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
                           </div>
                        <?php endif; ?>
                        <div class="flex-wrap">
                            <?php if($title): ?>
                                <div class="text-heading font-secondary-font uppercase mb-3 <?php if($add_icon): ?> mt-[20px] <?php endif;?> <?php echo $headline_color;?>"><?php echo $title; ?></div>
                            <?php endif; ?>   
                            <?php if ($text) : ?>
                                <div class="font-text-font bodysmall <?php echo $description_color;?>">
                                    <?php echo $text; ?>
                                </div>
                            <?php endif; ?>  
                        </div>
                       <?php if ($cta) :
                                $url = $cta['url'];
                                $title = $cta['title'];
                                $target = $cta['target'] ? $cta['target'] : '_self';  ?>
                                <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="mt-[32px] group <?php if($button_style): echo $button_style; endif;?>">
                                    <?php echo esc_html($title); ?>
                                    <div class="relative">
                                        <svg class="absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 transition-all duration-300 opacity-[1] origin-left scale-100 group-hover:opacity-0 group-hover:scale-0" xmlns="http://www.w3.org/2000/svg" width="27" height="16" viewBox="0 0 27 16" fill="none">
                                            <path d="M0 8H24" stroke="<?php echo $arrow_color;?>" stroke-width="3"/>
                                            <path d="M18 2L24 8L18 14" stroke="<?php echo $arrow_color;?>" stroke-width="3"/>
                                        </svg>
                                        <svg class="absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 transition-all duration-300 opacity-0 origin-left scale-0 group-hover:opacity-[1] group-hover:scale-100" xmlns="http://www.w3.org/2000/svg" width="39" height="16" viewBox="0 0 39 16" fill="none">
                                        <path d="M0 8H36" stroke="<?php echo $arrow_color;?>" stroke-width="3"/>
                                        <path d="M30 2L36 8L30 14" stroke="<?php echo $arrow_color;?>" stroke-width="3"/>
                                        </svg>
                                    </div>
                                </a>                                                  
                      <?php endif; ?> 
                    </div>
                </div>
            <?php $animation_delay += 0.75; endforeach; ?>      
        </div>
        <?php endif; ?>
        <?php if($add_bottom_divider): ?>
        <div class="w-full h-[4px] <?php echo $divider_color; ?> mt-[2em] lg:mt-[3rem] invisible lg:visible"></div> 
        <?php endif; ?>
    </div>
</section>

<?php }
?>

