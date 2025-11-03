<?php
$content_block = get_field('info_content');
if ($content_block) {
    $heading = $content_block['heading'];
    $description = $content_block['description'];
    $buttons = $content_block['buttons'];

     $bg_section = $content_block['bg_color_section']; 
     $section_width = $content_block['section_width']; 
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

   $container_classes = 'row justify-content-center';

    //Spacing Class
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

    $section_class = '';
    switch ($section_width) {
        case 'contain':
            $section_class = 'col-lg-10';
            break;
        case 'full':
            $section_class = 'col-lg-12';
            break;
        default:
            $section_class = '';
            break;
    }
?>

<section class="content-section position-relative <?php echo esc_attr($bg_section_class); ?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
    <div class="container">
       <div class="<?php echo esc_attr($container_classes); ?>">
        <div class="col-12 <?php echo esc_attr($section_class); ?>">
            <?php if ($heading) : ?>                 
                <h1 class="color-black" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h1>           
           <?php endif; ?>            
           <?php if($description): ?>
                <div class="color-black content-text mt-2" data-aos="fade-in" data-aos-delay="50">
                    <?php echo $description; ?>
                </div>
           <?php endif; ?>    
           <?php if ($buttons) : ?>
        <div class="<?php echo esc_attr($container_classes); ?>">           
                <div class="d-flex flex-column flex-lg-row flex-wrap gap-3 mt-5 justify-content-center" data-aos="fade-up" data-aos-delay="50">
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
    <?php endif; ?>             
          </div>         
       </div>
   </div>      
</section> 
<?php }
?>
