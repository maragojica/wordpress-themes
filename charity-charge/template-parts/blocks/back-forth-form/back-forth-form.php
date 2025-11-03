<?php
$content_block = get_field('back_forth_form');
if ($content_block) {
    
    $subheading = $content_block['subheading']; 
    $heading = $content_block['heading'];   
    $description = $content_block['description'];   
    $buttons = $content_block['buttons'];       
    $image = $content_block['image'];     
    $form = $content_block['form']; 

    $bg_section = $content_block['bg_color_section']; 
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


$bg_section_class = '';
switch ($bg_section) {
    case 'light':
        $bg_section_class = 'bg-accent';
        break;
    case 'white':
        $bg_section_class = 'bg-white';
        break;
    case 'blue':
        $bg_section_class = 'bg-blue-darker';
        break;
    default:
        $bg_section_class = 'bg-white';
        break;
}

// Generate class for text color
$text_color_class = '';
$title_color_class = '';
switch ($text_color) {
    case 'light':
        $text_color_class = 'color-white';
        $title_color_class = 'color-white';
        $subtitle_color_class = 'color-white';
        break;
    case 'dark':
        $text_color_class = 'color-gray-off';
        $title_color_class = 'color-black';
        $subtitle_color_class = 'color-dark';
        break;
    default:
        $text_color_class = '';
        break;
}
?>

<section class="back-forth-form-section position-relative <?php echo esc_attr($bg_section_class); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?> <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
   <div class="top-section">
    <div class="container">
       <div class="<?php echo esc_attr($container_classes); ?> g-5 g-lg-0 gap-large">
        <div class="col-12 col-md-6">
            <?php if ($subheading) : ?>
                <p class="<?php echo esc_attr($subtitle_color_class); ?> mb-2" data-aos="fade-up">
                    <?php echo $subheading; ?>
                </p>
            <?php endif; ?>
            <?php if ($heading) : ?>                 
                <h2 class="<?php echo esc_attr($title_color_class); ?>" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h2>           
           <?php endif; ?>            
           <?php if($description): ?>
                <div class="<?php echo esc_attr($text_color_class); ?> content-text mt-3" data-aos="fade-up" data-aos-delay="50">
                    <?php echo $description; ?>
                </div>
           <?php endif; ?> 
             <div class="box-media-form">
                    <?php if(!empty($image)): ?>
                    <?php  echo wp_get_attachment_image(
                            $image['ID'],
                            'full',
                            false,
                            array(
                                'class' => 'img-fluid img-media',
                                'alt' => esc_attr($image['alt']),
                            )
                        ); endif; ?> 
                </div> 
            <?php if ($buttons) : ?>
                <div class="d-flex flex-column flex-lg-row flex-wrap gap-3 <?php echo esc_attr($button_margin); ?> mt-4 <?php echo ($alignment_hori == 'middle') ? 'justify-content-center' : 'justify-content-start'; ?>" data-aos="fade-up" data-aos-delay="50">
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
          </div>         
            <div class="col-12 col-md-6" data-aos="fade-in">
                <div class="w-100 h-100">
                    <?php if($form): ?>
                         <div class="form-container w-100 h-100">
                        <?php echo do_shortcode($form); ?>
                        </div> 
                    <?php endif; ?>
                   
                </div>            
            </div>       
       </div>
   </div> 
   </div> 
  
</section> 
<?php }
?>
