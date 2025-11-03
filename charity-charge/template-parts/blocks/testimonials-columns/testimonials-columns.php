<?php
$content_block = get_field('testimonials_columns_content');
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

<section class="testimonials-columns-section position-relative bg-accent <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
    <div class="container">
       <div class="<?php echo esc_attr($container_classes); ?>">
        <div class="col-12 text-center">
             <?php if ($subheading) : ?>                 
                <p class="color-off-black" data-aos="fade-up">
                    <?php echo $subheading; ?>
                </p>           
           <?php endif; ?>
            <?php if ($heading) : ?>                 
                <h2 class="color-off-black" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h2>           
           <?php endif; ?>            
           <?php if($description): ?>
                <div class="color-gray-dark content-text mt-2" data-aos="fade-up" data-aos-delay="50">
                    <?php echo $description; ?>
                </div>
           <?php endif; ?>              
          </div>         
       </div>
 
<?php if($testimonials_list): ?>
    <div class="row mt-4 g-4" data-aos="fade-in">
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
           <div class="col-12 col-md-6">         
            <div class="testimonial-card h-100">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                        <path d="M9.16682 34.6422C7.10632 32.455 6 30 6 26.0208C6 19.0218 10.913 12.7474 18.0612 9.64648L19.8466 12.4017C13.1761 16.0109 11.8724 20.6922 11.3513 23.6442C12.4253 23.0888 13.8312 22.8934 15.2094 23.0212C18.8182 23.3556 21.6624 26.3182 21.6624 30C21.6624 33.866 18.5283 37 14.6623 37C12.5162 37 10.4639 36.0192 9.16682 34.6422ZM29.1668 34.6422C27.1064 32.455 26 30 26 26.0208C26 19.0218 30.913 12.7474 38.0612 9.64648L39.8466 12.4017C33.176 16.0109 31.8724 20.6922 31.3512 23.6442C32.4252 23.0888 33.8312 22.8934 35.2094 23.0212C38.8182 23.3556 41.6624 26.3182 41.6624 30C41.6624 33.866 38.5284 37 34.6624 37C32.5162 37 30.464 36.0192 29.1668 34.6422Z" fill="#FF5805"/>
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
