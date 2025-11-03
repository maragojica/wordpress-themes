<?php
$content_block = get_field('testimonials_content');
if ($content_block) {
    
    $heading = $content_block['heading'];   
    $subheading = $content_block['subheading']; 
    $description = $content_block['description'];   
    $testimonials_list = $content_block['testimonials_list'];     
    $buttons = $content_block['buttons']; 

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

?>

<section class="testimonials-section position-relative bg-blue-darker <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
    <div class="container">
       <div class="<?php echo esc_attr($container_classes); ?>">
        <div class="col-12 text-center">
             <?php if ($subheading) : ?>                 
                <p class="color-white" data-aos="fade-up">
                    <?php echo $subheading; ?>
                </p>           
           <?php endif; ?>
            <?php if ($heading) : ?>                 
                <h2 class="color-white" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h2>           
           <?php endif; ?>            
           <?php if($description): ?>
                <div class="color-white content-text mt-2" data-aos="fade-up" data-aos-delay="50">
                    <?php echo $description; ?>
                </div>
           <?php endif; ?>              
          </div>         
       </div>
 
<?php if($testimonials_list): ?>
    <div class="masonry-grid mt-4" data-aos="fade-in">
        <?php foreach ($testimonials_list as $testimonial_post) : 
            setup_postdata($testimonial_post);
            $title = get_the_title($testimonial_post->ID);
            $position = get_field('position', $testimonial_post->ID);
            $content = get_field('content', $testimonial_post->ID);
            $logo = get_field('logo', $testimonial_post->ID);
            $link = get_field('link', $testimonial_post->ID);

            // Get avatar image
            $image_id = get_post_thumbnail_id($testimonial_post->ID);
            $image_alt = $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : '';
        ?>           
            <div class="testimonial-card">
                <div class="d-flex align-items-center mb-2">  
                    <?php
                    if ($image_id) {
                        echo wp_get_attachment_image(
                            $image_id,
                            'full',
                            false,
                            array(
                                'class' => 'testimonial-avatar me-3',
                                'alt' => esc_attr($image_alt),
                            )
                        );
                    }
                    ?>   
                    <div>
                     <?php if ($title) : ?>
                        <div class="testimonial-name"><?php echo esc_html($title); ?></div>
                    <?php endif; ?>
                    <?php if ($position) : ?>
                        <div class="testimonial-role"><?php echo esc_html($position); ?></div>
                    <?php endif; ?>
                    </div>                  
                    <span class="ms-auto testimonial-quote">                    
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path d="M6.11121 23.0945C4.73755 21.6363 4 19.9997 4 17.3469C4 12.6809 7.27535 8.49797 12.0408 6.43066L13.231 8.26748C8.78405 10.6736 7.91491 13.7945 7.56752 15.7625C8.28351 15.3922 9.22077 15.2619 10.1396 15.3471C12.5454 15.5701 14.4416 17.5451 14.4416 19.9997C14.4416 22.577 12.3522 24.6663 9.77488 24.6663C8.34413 24.6663 6.97595 24.0125 6.11121 23.0945ZM19.4445 23.0945C18.0709 21.6363 17.3333 19.9997 17.3333 17.3469C17.3333 12.6809 20.6087 8.49797 25.3741 6.43066L26.5644 8.26748C22.1173 10.6736 21.2483 13.7945 20.9008 15.7625C21.6168 15.3922 22.5541 15.2619 23.4729 15.3471C25.8788 15.5701 27.7749 17.5451 27.7749 19.9997C27.7749 22.577 25.6856 24.6663 23.1083 24.6663C21.6775 24.6663 20.3093 24.0125 19.4445 23.0945Z" fill="#05B1E3"/>
                        </svg>
                    </span>
                </div>                
                <?php if($content): ?>
                    <div class="testimonial-text">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
                <?php if ($logo || $link) : ?>    
                <div class="d-flex align-items-center pt-3">
                <?php endif; ?>
                <?php if ($logo): ?>
                    <span class="testimonial-logo me-1">
                        <?php echo wp_get_attachment_image(
                            $logo['ID'],
                            'full',
                            false,
                            array(
                                'class' => 'testimonial-logo-img me-2',
                                'alt' => esc_attr($logo['alt']),
                                'height' => 24
                            )
                        ); ?>
                    </span>
                <?php endif; ?>

                <?php if ($link) : ?>
                    <span class="testimonial-company">
                        <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>" aria-label="<?php echo esc_html($link['title']); ?>">
                            <?php echo esc_html($link['title']); ?>
                        </a>
                    </span>
                <?php endif; ?>
                <?php if ($link || $logo) : ?>
                </div>
                <?php endif; ?>
            </div>
        <?php endforeach; wp_reset_postdata(); ?>
    </div>   
<?php endif; ?>
       <?php if ($buttons) : ?>
        <div class="<?php echo esc_attr($container_classes); ?>">
            <div class="col-12 text-center">
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
        </div>
    <?php endif; ?>    
   </div>      
</section> 
<?php }
?>
