<?php
$content_block = get_field('back_forth_info_numbers');
if ($content_block) {

    $main_heading = $content_block['main_heading']; 
    $subheading = $content_block['subheading']; 
    $heading = $content_block['heading'];   
    $description = $content_block['description'];   
    $buttons = $content_block['buttons'];       
    $image = $content_block['image'];     

    $bg_section = $content_block['bg_color_section']; 

    $add_list_items = $content_block['add_list_items'];    
    $list_items = $content_block['list_items'];  
       
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
    default:
        $bg_section_class = '';
        break;
}

?>

<section class="back-forth-list-numbers-section position-relative <?php echo esc_attr($bg_section_class); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?> <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
   <div class="top-section">
    <div class="container">
        <?php if ($main_heading) : ?>
           <div class="row">
               <div class="col-12 text-lg-center">
                   <h2 class="color-black" data-aos="fade-up">
                        <?php echo $main_heading; ?>
                    </h2>
               </div>
           </div>
        <?php endif; ?>
       <div class="<?php echo esc_attr($container_classes); ?> g-5 g-lg-0 gap-medium">
        <div class="col-12 col-lg-7">
            <?php if ($subheading) : ?>
                <p class="color-dark mb-2" data-aos="fade-up">
                    <?php echo $subheading; ?>
                </p>
            <?php endif; ?>
            <?php if ($heading) : ?>                 
                <h2 class="color-black" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h2>           
           <?php endif; ?>            
           <?php if($description): ?>
                <div class="color-foreground-medium content-text mt-3" data-aos="fade-up" data-aos-delay="50">
                    <?php echo $description; ?>
                </div>
           <?php endif; ?> 
             <?php if ($add_list_items) : 
            if($list_items): ?>
            <div class="list-items-into mt-4">               
                        <?php $i = 1; foreach ($list_items as $item): 
                            $item_number = $item['item_number']; 
                            $item_title = $item['item_title'];
                            $item_text = $item['item_text']; ?>                       
                        <div class="mb-3 mb-md-4" data-aos="fade-up" data-aos-delay="<?php echo 50 + ($i * 50); ?>">
                            <div class="list-item">
                                <?php if ($item_number): ?>
                                    <span class="item-number"><?php echo esc_html($item_number); ?></span>
                                <?php endif; ?>
                                <div class="items-header">                                        
                                    <?php if($item_title): ?>
                                        <div class="item-title color-black"><?php echo esc_html($item_title); ?></div>
                                    <?php endif; ?>
                                    <?php if($item_text): ?>
                                        <div class="item-description color-foreground-medium">
                                            <?php echo $item_text; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php $i++; endforeach; ?>                    
            </div>
        <?php endif; endif; ?>   
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
            <div class="col-12 col-lg-5" data-aos="fade-in">
                <div class="w-100 h-100">
                    <?php if(!empty($image)): ?>
                    <?php  echo wp_get_attachment_image(
                            $image['ID'],
                            'full',
                            false,
                            array(
                                'class' => 'img-fluid img-info',
                                'alt' => esc_attr($image['alt']),
                            )
                        ); endif; ?> 
                </div>            
            </div>       
       </div>
   </div> 
   </div>   
</section> 
<?php }
?>
