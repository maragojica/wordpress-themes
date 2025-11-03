<?php
$content_block = get_field('tool_guides_content');
if ($content_block) {
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];
    $description = $content_block['description'];
    $settings = $content_block['settings'];
    $tool_guides = $content_block['tool_guides'];
    $buttons = $content_block['buttons']; 
    $bg_section = $content_block['bg_color_section']; 
    

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

   $container_classes = 'row ';


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

<section class="tool-guides-section list-respources-general position-relative <?php echo esc_attr($bg_section_class); ?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
    <?php if (!$settings) { ?>  
    <div class="container">
       <div class="<?php echo esc_attr($container_classes); ?> align-items-center justify-content-center gap-lg-0 gap-4 pb-5">
            <div class="col-md-8 col-lg-6 col-12 text-lg-start">
                <?php if ($subheading) : ?> 
                    <p class="color-gray-dark mb-1 text-lg-center text-start" data-aos="fade-up"><?php echo esc_html($subheading); ?></p>
                <?php endif; ?>
                <?php if ($heading) : ?>                 
                    <h2 class="color-black bold-title text-lg-center text-start" data-aos="fade-up">
                        <?php echo $heading; ?>
                    </h2>           
                  <?php endif; ?> 
                    <?php if($description): ?>
                    <div class="content-text color-gray-off text-lg-center text-start mt-3" data-aos="fade-up"><?php echo $description; ?></div>
                <?php endif; ?>
                <?php if ($buttons) : ?>
                <div class="<?php echo esc_attr($container_classes); ?>">
                    <div class="col-12 text-center">
                        <div class="d-flex flex-column flex-lg-row flex-wrap gap-3 mt-3 mt-lg-5 justify-content-start justify-content-lg-center" data-aos="fade-up" data-aos-delay="50">
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
       </div>
        <!-- Content Row -->       
        <?php if($tool_guides): ?>
            <div class="row row-tool-guides mt-3 mt-lg-5" data-aos="fade-in">
                <?php foreach ($tool_guides as $tool_guide) : 
                    $tool_guide_id = $tool_guide->ID;
                    $tool_guide_image = get_the_post_thumbnail_url($tool_guide_id, 'full');
                    $tool_guide_title = get_the_title($tool_guide_id);
                    $tool_guide_link = get_permalink($tool_guide_id);

                    // Use your custom taxonomy for nonprofit-resources
                    if (get_post_type($tool_guide_id) === 'nonprofit-resources') {
                        $resource_categories = get_the_terms($tool_guide_id, 'nonprofit-resource-category');
                        $featured_category_name = (!empty($resource_categories) && !is_wp_error($resource_categories)) ? esc_html($resource_categories[0]->name) : '';
                    } else {
                        $featured_category = get_the_category($tool_guide_id);
                        $featured_category_name = (!empty($featured_category) && !is_wp_error($featured_category)) ? esc_html($featured_category[0]->name) : '';
                    }

                    $featured_description = get_the_excerpt($tool_guide_id);
                    $author_name = get_field('author_name', $tool_guide_id);
                    $author_avatar = get_field('author_image', $tool_guide_id);
                    $publish_date = get_the_date('d M Y', $tool_guide_id);

                    // Calculate real read time
                    $content = get_post_field('post_content', $tool_guide_id);
                    $word_count = str_word_count(strip_tags($content));
                    $read_time = max(1, ceil($word_count / 200)); // 200 words per minute, minimum 1
                    $read_time_text = $read_time . ' min read';
                ?>
                <div class="col-lg-4 mb-lg-0 mb-4">
                    <div class="featured-card d-flex flex-column h-100">
                        <div class="featured-image">
                            <a href="<?php echo esc_url($featured_link); ?>" tabindex="0" aria-label="<?php echo esc_html($tool_guide_title); ?>" title="<?php echo esc_html($tool_guide_title); ?>" class="w-100 h-100">
                                <img src="<?php echo esc_url($tool_guide_image); ?>" alt="<?php echo esc_attr($tool_guide_title); ?>" class="img-fluid">
                            </a>
                        </div>
                        <div class="featured-content d-flex flex-column flex-grow-1">
                            <?php if ($featured_category_name): ?>
                                <div class="category-tag"><?php echo $featured_category_name; ?></div>
                            <?php endif; ?>
                            <div class="featured-title">
                                <a href="<?php echo esc_url($featured_link); ?>"><?php echo esc_html($tool_guide_title); ?></a>
                            </div>
                            <?php if ($featured_description): ?>
                                <div class="featured-description main-description color-gray-off mt-2"><?php echo esc_html($featured_description); ?></div>
                            <?php endif; ?>
                            <div class="mt-auto author-info d-flex align-items-center gap-2">
                                <div class="author-avatar">
                                    <?php if (!empty($author_avatar['url'])): ?>
                                        <img src="<?php echo esc_url($author_avatar['url']); ?>" alt="<?php echo esc_attr($author_name); ?>" class="img-fluid">
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <div class="author-name"><?php echo esc_html($author_name); ?></div>
                                    <div class="author-date d-flex align-items-center gap-2">
                                        <span><?php echo esc_html($publish_date); ?></span>
                                        <span>&bull; <?php echo esc_html($read_time_text); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>  
   <?php } else { 
            include get_template_directory() . '/template-parts/global/global-tool-guides.php'; 
        } ?>    
</section> 
<?php }
?>
