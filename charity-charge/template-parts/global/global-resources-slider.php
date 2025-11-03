<?php
$content_block = get_field('resources_slider_content', 'option');
if ($content_block) {
    
    $heading = $content_block['heading'];   
    $description = $content_block['description'];   
    $select_source = $content_block['select_source']; 
    $featured_resource = $content_block['featured_resource']; 
    $resources_list = $content_block['resources_list'];     
    $buttons = $content_block['buttons']; 


    //Container Settings

   $container_classes = 'row ';


?>
 <div class="container">
       <div class="<?php echo esc_attr($container_classes); ?> align-items-center justify-content-center gap-lg-0 gap-4">
            <div class="col-lg-6 col-12 text-center">
                 <?php if ($heading) : ?>                 
                    <h2 class="color-gray" data-aos="fade-up">
                        <?php echo $heading; ?>
                    </h2>           
                  <?php endif; ?> 
                   <?php if($description): ?>
                    <div class="content-text mt-3 color-gray-off" data-aos="fade-up"><?php echo $description; ?></div>
                <?php endif; ?>
            </div>                          
       </div>
       
       <?php 
       // Determine resources to display          

            if ($select_source === 'most-recent') {
                 $resources_list = [];

                 // Get the latest post to use as featured resource
                $latest_post_args = [
                    'post_type'      => 'nonprofit-resources',
                    'posts_per_page' => 1,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ];
                
                $latest_post_query = new WP_Query($latest_post_args);
                if ($latest_post_query->have_posts()) {
                    $latest_post_query->the_post();
                    $featured_resource = get_post(); // Set the latest post as featured
                    wp_reset_postdata();
                }

                // Query most recent resources
                $args = [
                    'post_type'      => 'nonprofit-resources',
                    'posts_per_page' => 6,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'offset'         => 1,

                ];
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $resources_list[] = get_post();
                    }
                    wp_reset_postdata();
                }
            } 
        ?>
     <!-- Content Row -->
            <div class="row row-slider-resources" data-aos="fade-in">
    <!-- Left Column -->
    <div class="col-lg-6">
        <?php
        if ($featured_resource) {
            $featured_id = $featured_resource->ID;
            $featured_image = get_the_post_thumbnail_url($featured_id, 'full');
            $featured_title = get_the_title($featured_id);
            $featured_link = get_permalink($featured_id);
            
            // Initialize category name variable
            $featured_category_name = '';
            
            // Use your custom taxonomy for nonprofit-resources
            if (get_post_type($featured_id) === 'nonprofit-resources') {
                $resource_categories = get_the_terms($featured_id, 'nonprofit-resource-category');
                if (!empty($resource_categories) && !is_wp_error($resource_categories)) {
                    $featured_category_name = esc_html($resource_categories[0]->name);
                }
            } else {
                $featured_category = get_the_category($featured_id);
                if (!empty($featured_category) && !is_wp_error($featured_category)) {
                    $featured_category_name = esc_html($featured_category[0]->name);
                }
            }
            
            $featured_description = get_the_excerpt($featured_id);
            $use_custom_author = get_field('use_custom_author', $featured_id);
            if( $use_custom_author ) {
                $author_name = get_field('author_name', $featured_id);
                $author_avatar = get_field('author_image', $featured_id);
            }else{
                $author_name = get_field('author_name_general', 'option');
                $author_avatar = get_field('author_image_general', 'option');
            }
            $publish_date = get_the_date('d M Y', $featured_id);
        ?>
            <div class="featured-card">
                <div class="featured-image">
                    <a href="<?php echo esc_url($featured_link); ?>" tabindex="0" aria-label="<?php echo esc_attr($featured_title); ?>" title="<?php echo esc_attr($featured_title); ?>" class="w-100 h-100">
                        <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($featured_title); ?>" class="img-fluid">
                    </a>
                </div>
                <div class="featured-content">
                    <?php if (!empty($featured_category_name)): ?>
                        <div class="category-tag"><?php echo $featured_category_name; ?></div>
                    <?php endif; ?>
                    <div class="featured-title">
                        <a href="<?php echo esc_url($featured_link); ?>"><?php echo esc_html($featured_title); ?></a>
                    </div>
                    <?php if ($featured_description): ?>
                        <div class="featured-description main-description color-gray-off"><?php echo esc_html($featured_description); ?></div>
                    <?php endif; ?>
                    <?php if ($author_name && $author_avatar): ?>
                        <div class="author-info">
                            <div class="author-avatar">
                                <img src="<?php echo esc_url($author_avatar['url']); ?>" alt="<?php echo esc_attr($author_name); ?>" class="img-fluid">
                            </div>
                            <div>
                                <div class="author-name"><?php echo esc_html($author_name); ?></div>
                                <div class="author-date"><?php echo esc_html($publish_date); ?></div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php
        }
        ?>                     
    </div>
    
    <!-- Right Column -->
    <div class="col-lg-6">
        <div class="sidebar">
            <?php if (!empty($resources_list)): ?>
                <?php $resources_chunks = array_chunk($resources_list, 2); ?>
                <!-- Slider Container -->
                <div class="slider-container">
                    <div class="slider-track" id="sliderTrack">
                        <?php foreach ($resources_chunks as $slide_resources) : ?>
                            <!-- New Slide -->
                            <div class="slider-item">
                                <?php foreach ($slide_resources as $featured_resource) : 
                                    // Extract your post data
                                    $featured_id = $featured_resource->ID;
                                    $featured_image = get_the_post_thumbnail_url($featured_id, 'full');
                                    $featured_title = get_the_title($featured_id);
                                    $featured_link = get_permalink($featured_id);

                                    // Initialize category name variable
                                    $featured_category_name = '';

                                    // Use correct taxonomy for nonprofit-resources
                                    if (get_post_type($featured_id) === 'nonprofit-resources') {
                                        $resource_categories = get_the_terms($featured_id, 'nonprofit-resource-category');
                                        if (!empty($resource_categories) && !is_wp_error($resource_categories)) {
                                            $featured_category_name = esc_html($resource_categories[0]->name);
                                        }
                                    } else {
                                        $featured_category = get_the_category($featured_id);
                                        if (!empty($featured_category) && !is_wp_error($featured_category)) {
                                            $featured_category_name = esc_html($featured_category[0]->name);
                                        }
                                    }

                                    $featured_description = get_the_excerpt($featured_id);
                                   $use_custom_author = get_field('use_custom_author', $featured_id);
                                    if( $use_custom_author ) {
                                        $author_name = get_field('author_name', $featured_id);
                                        $author_avatar = get_field('author_image', $featured_id);
                                    }else{
                                        $author_name = get_field('author_name_general', 'option');
                                        $author_avatar = get_field('author_image_general', 'option');
                                    }
                                    $publish_date = get_the_date('d M Y', $featured_id);
                                ?>
                                    <div class="sidebar-card">
                                        <div class="sidebar-card-body">
                                            <div class="sidebar-image">
                                                <a href="<?php echo esc_url($featured_link); ?>" class="w-100 h-100">
                                                    <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($featured_title); ?>" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="sidebar-content">
                                                <?php if (!empty($featured_category_name)): ?>
                                                    <div class="sidebar-category category-tag"><?php echo strtoupper($featured_category_name); ?></div>
                                                <?php endif; ?>
                                                <div class="sidebar-title">
                                                    <a href="<?php echo esc_url($featured_link); ?>"><?php echo esc_html($featured_title); ?></a>
                                                </div>
                                                <?php if ($author_name && $author_avatar): ?>
                                                    <div class="author-info">
                                                        <div class="author-avatar">
                                                            <img src="<?php echo esc_url($author_avatar['url']); ?>" alt="<?php echo esc_attr($author_name); ?>" class="img-fluid">
                                                        </div>
                                                        <div>
                                                            <div class="author-name"><?php echo esc_html($author_name); ?></div>
                                                            <div class="author-date"><?php echo esc_html($publish_date); ?></div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                                        
                <!-- Slider Navigation -->
                <div class="slider-nav">
                    <div class="nav-dots">
                        <?php foreach ($resources_chunks as $index => $chunk): ?>
                            <button class="nav-dot <?php echo $index === 0 ? 'active' : ''; ?>" data-slide="<?php echo $index; ?>"><?php echo $index + 1; ?></button>
                        <?php endforeach; ?>
                    </div>
                    <?php if (!empty($buttons)) : ?>                           
                        <div class="d-flex flex-column flex-lg-row flex-wrap gap-3 mt-3 mt-lg-0 justify-content-center justify-content-lg-end" data-aos="fade-up" data-aos-delay="50">
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
                                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" class="button <?php if($button_style): echo esc_attr($button_style); endif;?> w-100 w-lg-auto <?php if($button_type): echo esc_attr($button_type); endif;?>">
                                            <?php echo esc_html($title); ?>
                                        </a>
                                    </div>            
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>                           
                    <?php endif; ?>  
                </div>
            <?php endif; ?>                       
        </div>
    </div>
</div>         
   </div>
<?php }
?>
