<?php
$content_block = get_field('cards_topics');
if ($content_block) {
  
    $subheading = $content_block['subheading']; 
    $heading = $content_block['heading'];   
    $description = $content_block['description'];   
    $buttons = $content_block['buttons'];     

    $bg_section = $content_block['bg_color_section']; 
    $text_color = $content_block['text_color']; 

    $settings = $content_block['settings'];  
    $add_list_items = $content_block['add_list_items'];    
    $list_items = $content_block['list_items'];  
    $columns_layout = $content_block['select_layout'];  
       
    $alignment = $content_block['vertical_alignment'];    
    $alignment_hori = $content_block['horizontal_alignment'];  
    $reverse_order_desktop = $content_block['reverse_order_desktop'];
    $reverse_order_mobile = $content_block['reverse_order_mobile'];

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
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' pt-lg-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' pb-lg-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;

    //Container Settings

   $container_classes = 'row '
. ($reverse_order_desktop ? ' flex-md-row-reverse' : '')
. ($reverse_order_mobile ? ' flex-column-reverse flex-md-row' : '');


// Horizontal alignment (cross axis)
switch ($alignment) {
    case 'middle':
        $container_classes .= ' align-items-center ';
        break;
    case 'bottom':
        $container_classes .= ' align-items-end ';
        break;
    case 'top':
        $container_classes .= ' align-items-start ';
        break;
    case 'items-stretch':
        $container_classes .= ' align-items-stretch ';
        break;
    default:
        $container_classes .= ' align-items-stretch ';
        break;
}

// Vertical alignment (main axis)
switch ($alignment_hori) {
    case 'middle':
        $container_classes .= ' justify-content-center text-center';
        break;
    case 'right':
        $container_classes .= ' justify-content-end ';
        break;
    case 'left':
        $container_classes .= ' justify-content-start ';
        break;
    default:
        $container_classes .= ' justify-content-around align-items-center';
        break;
}



$bg_section_class = '';
switch ($bg_section) {
    case 'white':
        $bg_section_class = 'bg-white';
        break;
    case 'blue':
        $bg_section_class = 'bg-blue-darker';
        break;
    default:
        $bg_section_class = '';
        break;
}

// Generate class for text color
$text_color_class = '';
$heading_color_class = '';
$subheading_color_class = '';
switch ($text_color) {
    case 'light':
        $text_color_class = 'color-white';
        $heading_color_class = 'color-white';
        $subheading_color_class = 'color-white';
        break;
    case 'dark':
        $text_color_class = 'color-black';
        $heading_color_class = 'color-black';
        $subheading_color_class = 'color-black';
        break;
    default:
        $text_color_class = '';
        break;
}

$columns_class = '';
switch ($columns_layout) {
case 'two':
    $columns_class .= ' col-md-6 col-lg-6';
    break;
case 'three':
    $columns_class .= ' col-md-6 col-lg-4';
    break;
case 'four':
$columns_class .= ' col-md-6 col-lg-4 col-xl-3';
break;
default:
    $columns_class .= ' col-md-6 col-lg-4 col-xl-3';
} 
?>

<section class="topics-section position-relative <?php echo esc_attr($bg_section_class); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?> <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
  <div class="container">        
        <?php if (!$settings) { ?>   
             <?php if ($subheading || $heading || $description) : ?>
           <div class="<?php echo esc_attr($container_classes); ?> g-4 g-lg-0 gap-medium">
               <div class="col-12 col-lg-7">
                    <?php if ($subheading) : ?>
                        <p class="<?php echo esc_attr($subheading_color_class); ?>" data-aos="fade-up">
                            <?php echo $subheading; ?>
                        </p>
                    <?php endif; ?>
                    <?php if ($heading) : ?>                 
                        <h2 class="<?php echo esc_attr($heading_color_class); ?> mb-0" data-aos="fade-up">
                            <?php echo $heading; ?>
                        </h2>           
                    <?php endif; ?>  
                     <?php if($description): ?>                    
                    <div class="<?php echo esc_attr($text_color_class); ?> main-description" data-aos="fade-up" >
                        <?php echo $description; ?>
                    </div>                    
                <?php endif; ?>   
               </div>       
           </div>
        <?php endif; ?>   
           <?php if ($add_list_items) : 
            if($list_items): ?>
            <div class="row row-cards-icons g-3 row-style-icons-two">               
                        <?php $i = 1; foreach ($list_items as $item): 
                            $item_icon = $item['item_icon']; 
                            $item_title = $item['item_title'];
                            $item_text = $item['item_text'];
                            $item_link = $item['item_link']; ?>                       
                        <div class="<?php echo esc_attr($columns_class); ?> d-flex flex-column" data-aos="fade-in">
                            <?php if ($item_link) :
                            $url = $item_link['url'];
                            $title = $item_link['title'];
                            $target = $item_link['target'] ? $item_link['target'] : '_self';  ?>                           
                            <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="h-100 w-100"><?php endif; ?>
                            <div class="icon-card-list w-100 h-100">
                                <div class="d-flex flex-row justify-content-between align-items-center gap-2 w-100">
                                    <div class="d-flex align-items-center gap-1">
                                    <?php if ($item_icon): ?>
                                    <img class="icon-card" src="<?php echo esc_url($item_icon['url']); ?>" alt="<?php echo esc_attr($item_icon['alt']); ?>">
                                <?php endif; ?>
                                <?php if($item_title): ?>
                                        <div class="card-icon-title color-black"><?php echo esc_html($item_title); ?></div>
                                    <?php endif; ?>
                                </div>
                                <?php if ($item_link) : ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M11.252 7.54537L6.41061 12.3868L5.61523 11.5914L10.4561 6.75H6.18955V5.625H12.377V11.8125H11.252V7.54537Z" fill="#FF6200"/>
                                </svg>
                                 <?php endif; ?>
                                </div>                                
                                <div class="card-icon-header"> 
                                    <?php if($item_text): ?>
                                        <div class="card-icon-description color-black">
                                            <?php echo $item_text; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>  
                            <?php if ($item_link) : ?>
                            </a>
                            <?php endif; ?>
                        </div>
                    <?php $i++; endforeach; ?>                    
            </div>
              <?php if ($buttons) : ?>
         <div class="row mt-4 mt-lg-5 justify-content-center">
          <div class="col-12">  
                <div class="d-flex flex-column flex-lg-row flex-wrap gap-3 justify-content-center" data-aos="fade-up" >
                    <?php foreach ($buttons as $button) : ?>
                        <?php 
                        $button_link = $button['button'];
                        $button_style = $button['button_style'];
                         $button_type = $button['button_type'];
                        if ($button_link) :
                            $url = $button_link['url'];
                            $title = $button_link['title'];
                            $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                            <div class="relative group">
                            <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="button <?php if($button_style): echo $button_style; endif;?> w-100 w-lg-auto <?php if($button_type): echo $button_type; endif;?>  ">
                                <?php echo esc_html( $title ); ?>
                            </a>
                        </div>            
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                </div>  
           </div>
        <?php endif; ?>  
        <?php endif; endif; } else { 
            include get_template_directory() . '/template-parts/global/global-topics.php'; 
        } ?> 
   </div>   
</section> 
<?php }
?>
