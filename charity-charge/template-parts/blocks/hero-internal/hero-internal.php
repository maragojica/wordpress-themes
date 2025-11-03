<?php
$content_block = get_field('hero_internal');
if ($content_block) {
    
    $heading = $content_block['heading'];   
    $heading_type = $content_block['heading_type'];  
    $heading_top_padding = $content_block['heading_top_padding']; 
    $description = $content_block['description'];   
    $buttons = $content_block['buttons'];  
    
   
    $image = $content_block['image'];      
    $image_caption = $content_block['image_caption']; 
   
    $bg_section = $content_block['bg_section']; 
    $text_color = $content_block['text_color'];     
       
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

// Vertical alignment (main axis)
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
    case 'bottom':
        $container_classes .= ' justify-content-end ';
        break;
    case 'top':
        $container_classes .= ' justify-content-start ';
        break;
    default:
        $container_classes .= ' justify-content-around align-items-center';
        break;
}

$column_one_size = 'col-12 col-lg-8 col-xl-6';
$column_two_size = ''; 
$button_margin = ' mt-lg-5';

$columns_gap_class = '';
switch ($columns_gap) {
    case 'small':
        $columns_gap_class = ' g-5';
        break;
    case 'medium':
        $columns_gap_class = ' g-5 g-lg-0 gap-medium';
        break;
    case 'large':
        $columns_gap_class = ' g-5 g-lg-0 gap-large';
        break;
}


// Generate class for text color
$text_color_class = '';
switch ($text_color) {
    case 'light':
        $text_color_class = 'color-white';
        break;
    case 'dark':
        $text_color_class = 'color-gray';
        break;
    default:
        $text_color_class = '';
        break;
}

// Generate class for text color info
$text_color_info_class = '';
switch ($text_color) {
    case 'light':
        $text_color_info_class = 'color-white';
        break;
    case 'dark':
        $text_color_info_class = 'color-foreground';
        break;
    default:
        $text_color_info_class = '';
        break;
}

$bg_section_class = '';
switch ($bg_section) {
    case 'light':
        $bg_section_class = 'bg-accent';
        break;
    case 'sharp-blue':
        $bg_section_class = 'bg-sharp-blue';
        break;
    case 'blue':
        $bg_section_class = 'bg-blue-darker';
        break;
    default:
        $bg_section_class = 'bg-sharp-blue';
        break;
}
?>

<section class="internal-hero-section position-relative <?php echo esc_attr($bg_section_class); ?> <?php if(!empty($image) && $image_caption): ?> bg-style-medium <?php endif; ?> <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
   <div class="top-section  <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
    <div class="container">
       <div class="<?php echo esc_attr($container_classes); ?> <?php echo esc_attr($columns_gap_class); ?>">
        <div class="<?php echo esc_attr($column_one_size); ?>">           
            <?php if ($heading) : ?>                 
                <h1 class="<?php echo esc_attr($text_color_class); ?> <?php if( $heading_type === "subheadline"): ?>subheadline <?php endif; ?> <?php if($heading_top_padding): ?>pt-lg-6 <?php endif; ?>" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h1>           
           <?php endif; ?>            
           <?php if($description): ?>
                <div class="<?php echo esc_attr($text_color_class); ?> content-text mt-4" data-aos="fade-up" data-aos-delay="50">
                    <?php echo $description; ?>
                </div>
           <?php endif; ?>   
           <?php if ($buttons) : ?>
                <div class="d-flex flex-column flex-lg-row flex-wrap gap-3 <?php echo esc_attr($button_margin); ?> mt-4 mb-4 <?php echo ($alignment_hori == 'middle') ? 'justify-content-center' : 'justify-content-start'; ?>" data-aos="fade-up" data-aos-delay="50">
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
            <?php endif; ?>  
             <?php if(!empty($image)): ?>
                <?php  echo wp_get_attachment_image(
                        $image['ID'],
                        'full',
                        false,
                        array(
                            'class' => 'img-fluid hero-image mt-4',
                            'alt' => esc_attr($image['alt']),
                            'data-aos' => 'fade-in',
                        )
                    ); endif; ?>   
                    <?php if($image_caption): ?>
                        <div class="image-caption medium-description text-black text-center mt-4">
                            <?php echo $image_caption; ?>
                        </div>
                    <?php endif; ?>
          </div>         
       </div>
   </div> 
   </div>   
</section> 
<?php }
?>
