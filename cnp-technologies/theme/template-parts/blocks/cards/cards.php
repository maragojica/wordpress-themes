<?php
$content_block = get_field('content_cards');
if ($content_block) {
    
    $heading = $content_block['heading'];    
    $description = $content_block['description'];
    $buttons = $content_block['buttons'];
    $icons_list = $content_block['cards_list'];
    $bg_color = $content_block['bg_color']; 

    $add_top_shape = $content_block['add_top_shape'];       

    $add_cta = $content_block['add_cta'];  
    $cta_title = $content_block['cta_title'];
    $buttons_cta = $content_block['buttons_cta'];       
    $cta_texture = $content_block['cta_texture'];   
 

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

<section class="columns-icons-section max-w-full relative <?php if($add_top_shape): ?> bottom-shape <?php endif;?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="container mx-auto">           
        <div class="w-full <?php echo $text_align; ?> animate__animated" data-animation="fadeIn" data-duration="1.5s">      
            <h2 class="text-primary mb-0 animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <?php echo $heading; ?>
            </h2>   
            <?php if ($description) : ?>
                <div class="text-black descrip mt-[0.5em] lg:max-w-[75%] xl:max-w-[68%] mx-auto style-disc animate__animated" data-animation="fadeIn" data-duration="1.1s" >                 
                        <?php echo $description; ?>                   
                 </div>
            <?php endif; ?>                      
        </div>
        <?php if($icons_list):    
        foreach ($icons_list as $column_icons) :          
             $columns_content = $column_icons['columns_content'];   
              //Columns Text Align Settings
                $columns_text_align = $column_icons['columns_number'];   

                $select_columns = 'w-full px-[15px]';
                switch ($columns_text_align) {
                    case 'two':
                        $select_columns .= ' sm:w-1/2 md:w-1/2 lg:w-1/2';
                        break;
                    case 'three':
                        $select_columns .= ' sm:w-1/2 md:w-1/3 lg:w-1/3';
                        break;
                    case 'four':
                        $select_columns .= ' sm:w-1/2 md:w-1/4 lg:w-1/4';
                        break;
                    case 'five':
                        $select_columns .= ' sm:w-1/2 md:w-1/3 lg:w-1/5';
                        break;
                }     ?>
                <?php if($columns_content): $animation_delay = 1; ?>
                <div class="flex flex-col sm:flex-row flex-wrap justify-center items-start mx-auto">   
                    <?php foreach ($columns_content as $column) : 
                        
                        $bg_image = $column['bg_image'];
                        $title = $column['title'];    
                        $link = $column['link'];             
                        $duration = $animation_delay . 's'; 
                        ?>
                        <div class="<?php echo $select_columns; ?> mt-[20px] animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                            <div class="flex flex-col h-full relative justify-between items-stretch <?php echo $text_align; ?> bg-cover bg-center bg-no-repeat group hover:bg-primary transition-all duration-300 ease-in-out translate-y-0 hover:-translate-y-3" <?php if(!empty($bg_image)):?>style="background-image: url(<?php echo esc_url($bg_image['url']); ?>)"<?php endif; ?>>                                                    
                                <div class="flex-wrap flex justify-center items-center w-full h-full min-h-[150px] 2xl:min-h-[205px]">
                                <?php if($link):
                                    $url = $link['url'];
                                    $target = $link['target'] ? $link['target'] : '_self';  ?> 
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="w-full h-full transition-all duration-300 ease-in-out">
                                    <?php if($title): ?>
                                        <h3 class="text-white text-center mb-0 w-full h-full py-[25px] px-[25px] lg:py-[40px] lg:px-[50px]">                                                
                                                <?php echo $title; ?>                                                    
                                        </h3>
                                    <?php endif; ?>    
                                    </a>                                            
                                    <?php endif; ?>                            
                                </div>                      
                            </div>
                        </div>
                    <?php $animation_delay += 0.75; endforeach; ?>      
                </div>
                <?php endif; ?>  
        <?php endforeach; endif; ?>    
        <div class="w-full <?php echo $text_align; ?> animate__animated" data-animation="fadeIn" data-duration="1.5s">   
        <?php if ($buttons) : ?>
                    <div class="flex flex-wrap justify-center gap-4 mt-[35px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
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
        <?php if($add_cta): ?>
            <div class="relative lg:mt-[100px] mt-[2em]">
                <?php if(!empty($cta_texture)): 
                echo wp_get_attachment_image(
                    $cta_texture['ID'],
                            'full',
                            false,
                            array(
                                'class' => 'absolute left-0 top:0 w-full h-full object-cover object-center',
                                'alt' => esc_attr($cta_texture['alt'])
                            )
                        );
                endif; ?>
            <div class="flex lg:flex-row flex-col justify-between items-center px-[1.5em] py-[1.5em] lg:px-[50px] 2xl:px-[60px] lg:py-[30px] 2xl:py-[44px] gap-[1.2em] lg:gap-[3em]">
                <?php if($cta_title): ?>
                    <h3 class="text-white mb-0 lg:text-right text-center animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $cta_title; ?>
                    </h3> 
                <?php endif; ?>  
                <?php if ($buttons_cta) : ?>
                    <div class="flex flex-wrap justify-center lg:justify-end gap-4 animate__animated" data-animation="fadeIn" data-duration="1.5s">
                        <?php foreach ($buttons_cta as $button) : ?>
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
            <div>
         <?php endif; ?>   
    </div>
</section>

<?php }
?>

