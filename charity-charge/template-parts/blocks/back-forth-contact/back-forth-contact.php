<?php
$content_block = get_field('back_forth_contact');
if ($content_block) {
    
    $heading = $content_block['heading'];   
    $subheading = $content_block['subheading'];
    $heading_type = $content_block['heading_type'];  
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
  

    $add_socials = $content_block['add_socials']; 
    $socials_title = $content_block['socials_title']; 
    $socials_list = $content_block['socials_list']; 

    $add_info = $content_block['add_info']; 
    $info_list = $content_block['info_list']; 
    
       
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

<section class="back-forth-contact-section position-relative <?php echo esc_attr($bg_section_class); ?> <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
   <div class="top-section  <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
    <div class="container">
       <div class="<?php echo esc_attr($container_classes); ?> <?php echo esc_attr($columns_gap_class); ?>">
        <div class="<?php echo esc_attr($column_one_size); ?>">
             <?php if ($subheading) : ?>
                <p class="<?php echo esc_attr($text_color_class); ?> mb-2" data-aos="fade-up">
                    <?php echo $subheading; ?>
                </p>
            <?php endif; ?>
			<?php if( $heading_type == "headline" ){ ?>
			 <?php if ($heading) : ?>                 
                <h1 class="<?php echo esc_attr($text_color_class); ?>  <?php if($heading_top_padding): ?>pt-lg-6 <?php endif; ?>" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h1>           
           <?php endif; ?> 
			
			<?php }else { ?>
            <?php if ($heading) : ?>                 
                <h2 class="<?php echo esc_attr($text_color_class); ?>  <?php if($heading_top_padding): ?>pt-lg-6 <?php endif; ?>" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h2>           
           <?php endif; ?>    
			 <?php } ?>
           <?php if($description): ?>
                <div class="<?php echo esc_attr($text_color_class); ?> content-text mt-3" data-aos="fade-up" data-aos-delay="50">
                    <?php echo $description; ?>
                </div>
           <?php endif; ?> 
              <?php if($add_socials && $socials_list): ?>
                 <div class="socials mt-4 d-flex align-items-center gap-3" data-aos="fade-up" data-aos-delay="100">
                      <?php if($socials_title): ?>
                            <p class="<?php echo esc_attr($text_color_class); ?> mb-0"><?php echo esc_html($socials_title); ?></p>
                      <?php endif; ?>
                      <span class="text-muted">|</span>
                      <div class="d-flex flex-row flex-wrap gap-3">
                          <?php foreach($socials_list as $social): 
                              $social_icon = $social['icon'];
                              $social_link = $social['link_social'];
                               $svg_icon_code = $social['svg_icon_code'];
                              if($social_link): 
                                  $url = $social_link['url'];
                                  $title = $social_link['title'];
                                  $target = $social_link['target'] ? $social_link['target'] : '_self';  ?>
                                  <a class="social" href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>">
                                      <?php if($svg_icon_code): ?>
                                            <?php echo $svg_icon_code; ?>
                                      <?php elseif(!empty($social_icon)): ?>                                          
                                          <img src="<?php echo esc_url($social_icon['url']); ?>" alt="<?php echo esc_attr($social_icon['alt'] ? $social_icon['alt'] : $title);  ?>" class="img-fluid" />
                                      <?php else: ?>
                                        <?php echo esc_html($title); ?>
                                        <?php endif; ?>
                                  </a>
                              <?php endif; ?>
                          <?php endforeach; ?>
                      </div>
                    </div>  
                <?php endif; ?>
                <?php if($add_info && $info_list): ?>
                    <div class="support-grid">
                        <?php foreach($info_list as $info): 
                            $title_list = $info['title']; 
                            $text_info = $info['text_info']; 
                            $icon_info = $info['icon_info']; ?>

                            <div class="support-item d-flex flex-column flex-wrap gap-2" data-aos="fade-up" data-aos-delay="100">
                                <div class="d-flex flex-row flex-wrap gap-2 align-items-center">
                                    <?php if($title_list): ?>                                       
                                    <h2 class="support-title mb-0 <?php echo esc_attr($text_color_class); ?>"><?php echo esc_html($title_list); ?></h2>
                                    <?php endif; ?>
                                     <?php if(!empty($icon_info)): ?>
                                    <div class="support-icon">
                                        <?php  echo wp_get_attachment_image(
                                                $icon_info['ID'],
                                                'full',
                                                false,
                                                array(
                                                    'class' => 'img-fluid',
                                                    'alt' => esc_attr($icon_info['alt']),
                                                )
                                            ); ?>
                                    </div>
                                <?php endif; ?>                                   
                                </div>
                                <div>
                                       <?php if($text_info): ?>
                                                <div class="<?php echo esc_attr($text_color_class); ?> support-label content-text" >
                                                    <?php echo $text_info; ?>
                                                </div>
                                        <?php endif; ?> 
                                    </div>
                            </div>
                          <?php endforeach ?>
                    </div>
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
              </div>
          <?php endif; ?>
       </div>
   </div> 
   </div>    
</section> 
<?php }
?>
