<?php
$content_block = get_field('charity_show', 'option');
if ($content_block) {
    
    $heading = $content_block['heading'];    
    $heading_top_padding = $content_block['heading_top_padding']; 
    $description = $content_block['description'];   
    $buttons = $content_block['buttons'];  
    
    $media_type = $content_block['media_type'];   
    $image = $content_block['image']; 
    $form = $content_block['form'];   
    
    $columns_size = $content_block['columns_size']; 
    $columns_gap = $content_block['columns_gap']; 
    $bg_section = $content_block['bg_section']; 
    $text_color = $content_block['text_color']; 

    $info_list = $content_block['info_list']; 

    $add_listen_on = $content_block['add_listen_on']; 
    $listen_on_title = $content_block['listen_on_title']; 
    $listen_on_button = $content_block['listen_on_button']; 

    $add_hero_bottom = $content_block['add_hero_bottom']; 
    $hero_bottom_style = $content_block['hero_bottom_style']; 
    $counters = $content_block['counters']; 
    $logo_slider_title = $content_block['logo_slider_title']; 
    $logos_slider = $content_block['logos_slider'];
    
       
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

$column_one_size = '';
$column_two_size = '';
$button_margin = '';

switch ($columns_size) {
    case 'equal':
        // 50/50 on medium and up, full width stacked on small
        $column_one_size = 'col-12 col-md-6';
        $column_two_size = 'col-12 col-md-6';
        $button_margin = ' mt-lg-4-5';
        break;

    case 'wide':
        // 60/40 on medium and up, stacked on small
        $column_one_size = 'col-12 col-md-7';
        $column_two_size = 'col-12 col-md-5';
        $button_margin = ' mt-lg-4-5';
        break;

    case 'wide-reverse':
    // 40/60 on medium and up, stacked on small
    $column_one_size = 'col-12 col-md-5';
    $column_two_size = 'col-12 col-md-7';
    $button_margin = ' mt-lg-4-5';
    break;

    case 'full':
        // Full width on all screens
        $column_one_size = 'col-12 col-md-9';
        $column_two_size = ''; // No second column
        $button_margin = ' mt-lg-5';
        break;

    case 'center':
        // Full width on all screens
        $column_one_size = 'col-12 col-md-7';
        $column_two_size = ''; // No second column
        $button_margin = ' mt-lg-5';
        break;

    default:
        // Fallback to equal
        $column_one_size = 'col-12 col-md-6';
        $column_two_size = 'col-12 col-md-6';
         $button_margin = ' mt-lg-4-5';
        break;
}

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
    case 'half-light':
        $bg_section_class = 'bg-sharp-gradient';
        break;
    case 'blue':
        $bg_section_class = 'bg-blue-darker';
        break;
    default:
        $bg_section_class = '';
        break;
}
?>

<section class="back-forth-hero-section position-relative <?php echo esc_attr($bg_section_class); ?> <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
   <div class="top-section  <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
    <div class="container">
       <div class="<?php echo esc_attr($container_classes); ?> <?php echo esc_attr($columns_gap_class); ?>">
        <div class="<?php echo esc_attr($column_one_size); ?>">
            <?php if ($heading) : ?>                 
                <h2 class="<?php echo esc_attr($text_color_class); ?> <?php if($heading_top_padding): ?>pt-lg-6 <?php endif; ?>" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h2>           
           <?php endif; ?>            
           <?php if($description): ?>
                <div class="<?php echo esc_attr($text_color_class); ?> content-text mt-3" data-aos="fade-up" data-aos-delay="50">
                    <?php echo $description; ?>
                </div>
           <?php endif; ?>   
           <?php if($add_listen_on): ?>
            <?php if($listen_on_title): ?>
                <div class="listen-on-title color-white <?php echo esc_attr($text_color_class); ?> mt-3" data-aos="fade-up" data-aos-delay="50">
                    <?php echo $listen_on_title; ?>
                </div>
            <?php endif; ?>
            <?php if($listen_on_button): ?>
                 <div class="d-flex flex-column flex-md-row flex-wrap gap-3 gap-lg-4 mt-3 <?php echo ($alignment_hori == 'middle') ? 'justify-content-center' : 'justify-content-start'; ?>" data-aos="fade-up" data-aos-delay="50">
                <?php 
                foreach ($listen_on_button as $listen_on_button) :
                $listen_on_link = $listen_on_button['button_link'];
                $button_image = $listen_on_button['button_image'];
                if ($listen_on_link) :
                    $url = $listen_on_link['url'];
                    $title = $listen_on_link['title'];
                    $target = $listen_on_link['target'] ? $listen_on_link['target'] : '_self';  ?>
                    <div class="relative">
                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="w-100 w-lg-auto">
                            <?php if(!empty($button_image)): ?>
                                <img class="img-fluid img-listen-on" src="<?php echo esc_url($button_image['url']); ?>" alt="<?php echo esc_attr($button_image['alt']); ?>" />
                            <?php endif; ?>
                        </a>
                    </div>
                <?php endif; ?>
                <?php endforeach; ?>
                </div>
            <?php endif;?>   
            <?php endif; ?>  
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
          <?php if($media_type !== 'none'): ?>
              <div class="<?php echo esc_attr($column_two_size); ?>" data-aos="fade-in">
                  <?php if($media_type === 'image'): ?>
                      <?php if(!empty($image)): ?>
                        <?php  echo wp_get_attachment_image(
                                $image['ID'],
                                'full',
                                false,
                                array(
                                    'class' => 'img-fluid',
                                    'alt' => esc_attr($image['alt']),
                                )
                            ); endif; ?> 
                  <?php elseif($media_type === 'form'): ?>
                    <?php if($form): ?>
                      <div class="box-form w-100 h-100"><?php echo $form; ?></div>
                    <?php endif; ?>
                  <?php endif; ?>
                 <?php if ($info_list) { ?>
                <div class="block mt-2 mt-lg-4-5" data-aos="fade-up">
                    <div class="d-flex flex-column flex-lg-row gap-2 align-items-lg-center justify-content-between">
                        <?php foreach ($info_list as $info):  
                            $icon = $info['icon'];
                            $text = $info['text']; ?>
                            <div class="d-flex align-items-center gap-2 mt-2">
                                <?php if (!empty($icon)): ?>
                                    <img class="icon-list" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                                <?php endif; ?>
                                <?php if ($text): ?>
                                    <span class="<?php echo esc_attr($text_color_info_class); ?> text-list">
                                        <?php echo $text; ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php } ?>
              </div>
          <?php endif; ?>
       </div>
   </div> 
   </div> 
   <?php if ($add_hero_bottom) : ?>
       <div class="bottom-section <?php echo esc_attr($hero_bottom_style); ?> pb-4" data-aos="fade-up">
           <div class="container">
            <?php if ( $hero_bottom_style === 'style_1'){ ?>
                <div class="row w-100 d-flex flex-column flex-lg-row justify-content-between align-items-center pb-lg-0 pb-2">
                    <div class="col-12">
                        <div class="top-line-style-1 max-w-lg-50 w-100 mb-lg-3 mb-4"></div>
                        <div class="d-flex flex-column flex-lg-row row-logos align-items-center justify-content-center pt-1">
                             <?php if ($logo_slider_title): ?>
                            <div class="color-foreground text-list min-w-fit text-lg-left text-center"><?php echo $logo_slider_title; ?></div>
                        <?php endif; ?>
                        <?php if ($logos_slider): ?>
                            <div class="slider-logos slider-logos-style-1 owl-carousel overflow-hidden">
                                <?php foreach ($logos_slider as $logo): 
                                    $logo_image = $logo['logo'];
                                    $link = $logo['logo_link']; ?>
                                    <div class="item">
                                        <?php if($link):
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';?>
                                            <a tabindex="0" aria-label="<?php echo esc_attr($link_title); ?>" title="<?php echo esc_attr($link_title); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="w-100 h-100"> 
                                        <?php endif; ?>
                                        <?php if( !empty($logo_image) ): ?>                               
                                            <img class="fluid-img img-logo-hero" src="<?php echo esc_url($logo_image['url']); ?>" alt="<?php echo esc_attr($logo_image['alt']); ?>" />                                  
                                        <?php endif; ?>
                                        <?php if($link): ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?> 
                        </div>                       
                    </div>                   
             <?php }elseif($hero_bottom_style == 'style_2'){ ?>
                 <div class="row w-100 d-flex flex-column flex-lg-row  <?php if ($counters){ ?> justify-content-between <?php }else{ ?> justify-content-end <?php } ?> align-items-center pb-lg-0 pb-2">
                     <div class="col-12 col-lg-6">
                        <?php if ($counters): ?>
                        <div class="counters-row d-flex column-gap-sm-4 row-gap-sm-0 row-gap-sm-2 justify-content-lg-start justify-content-center align-items-center flex-column flex-sm-row">
                            <?php foreach ($counters as $counter):                                
                                $number = $counter['number'];
                                $text = $counter['text'];
                                $before = $counter['before'];
                                $after = $counter['after']; ?>
                                <div class="d-flex flex-column flex-sm-row justify-content-lg-start justify-content-between align-items-center mb-lg-0 mb-3 column-gap-sm-2">                                   
                                    <div class="d-flex items-center">
                                        <?php if ($before): ?>
                                            <div class="counters color-foreground"><?php echo $before; ?></div>
                                        <?php endif; ?>
                                        <div class="counters counter-number color-foreground"
                                            data-count="<?php echo esc_attr($number); ?>">0</div>
                                        <?php if ($after): ?>
                                            <div class="counters color-foreground"><?php echo $after; ?></div>
                                        <?php endif; ?>
                                     </div>    
                                      <?php if ($text): ?>
                                        <span class="counter-label color-foreground"><?php echo esc_html($text); ?></span>
                                    <?php endif; ?>                                
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                     </div>
                    <div class="col-12 col-lg-6">
                        <div class="top-line-style-1 <?php if($hero_bottom_style == 'style_1') echo 'max-w-lg-50'; ?> w-100 mb-lg-3 mb-4"></div>
                        <div class="d-flex flex-column flex-lg-row row-logos align-items-center justify-content-center pt-1">
                             <?php if ($logo_slider_title): ?>
                            <div class="color-foreground text-list min-w-fit text-lg-left text-center"><?php echo $logo_slider_title; ?></div>
                        <?php endif; ?>
                        <?php if ($logos_slider): ?>
                            <div class="slider-logos slider-logos-style-2 owl-carousel overflow-hidden">
                                <?php foreach ($logos_slider as $logo): 
                                    $logo_image = $logo['logo'];
                                    $link = $logo['logo_link']; ?>
                                    <div class="item">
                                        <?php if($link):
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';?>
                                            <a tabindex="0" aria-label="<?php echo esc_attr($link_title); ?>" title="<?php echo esc_attr($link_title); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="w-100 h-100"> 
                                        <?php endif; ?>
                                        <?php if( !empty($logo_image) ): ?>                               
                                            <img class="fluid-img img-logo-hero h-auto" src="<?php echo esc_url($logo_image['url']); ?>" alt="<?php echo esc_attr($logo_image['alt']); ?>" />                                  
                                        <?php endif; ?>
                                        <?php if($link): ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?> 
                        </div>                       
                    </div>                    
             <?php } ?>      
           </div>
       </div>
   <?php endif; ?>    
</section> 
<?php }
?>
