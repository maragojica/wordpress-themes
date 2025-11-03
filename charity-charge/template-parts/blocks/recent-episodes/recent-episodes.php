<?php
$content_block = get_field('recent_episodes_content');
if ($content_block) {
    
    $heading = $content_block['heading'];   
    $description = $content_block['description'];  
    $settings = $content_block['settings']; 
    $select_source = $content_block['select_source'];  
     $number_of_episodes = $content_block['number_of_episodes'];  
    $columns_layout = $content_block['columns_layout'];  
    $featured_episodes = $content_block['featured_episodes'];     
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

<section class="recent-episodes-section position-relative <?php echo esc_attr($bg_section_class); ?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
   <?php if (!$settings) { ?>  
    <div class="container">
       <div class="<?php echo esc_attr($container_classes); ?>">
        <div class="col-12 text-center mb-lg-5">
            <?php if ($heading) : ?>                 
                <h2 class="color-dark" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h2>           
           <?php endif; ?>            
           <?php if($description): ?>
                <div class="color-dark content-text mt-2" data-aos="fade-up" data-aos-delay="50">
                    <?php echo $description; ?>
                </div>
           <?php endif; ?>              
          </div>         
       </div>
       <?php // Determine resources to display          

            if ($select_source === 'most-recent') {
                 $featured_episodes = [];
                 $number = 3;
                 if ($number_of_episodes > 0) {
                    $number = $number_of_episodes;
                 }

                 // Get the latest post to use as featured resource
                $latest_post_args = [
                    'post_type'      => 'nonprofit-resources',
                    'posts_per_page' => $number,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'tax_query' => [
                        [
                            'taxonomy' => 'nonprofit-resource-category',
                            'field'    => 'slug',
                            'terms'    => 'podcast',
                        ],
                    ],
                ];
                
                $latest_post_query = new WP_Query($latest_post_args);
                if ($latest_post_query->have_posts()) {
                   while ($latest_post_query->have_posts()) {
                    $latest_post_query->the_post();
                    $featured_episodes[] = get_post();
                }
                    wp_reset_postdata();
                }

            } ?>
       <?php $columns_class = '';
          switch ($columns_layout) {
            case 'two':
                $columns_class .= ' col-md-6 col-lg-6 two-columns';
                break;
            case 'three':
                $columns_class .= ' col-md-6 col-lg-4 three-columns';
                break;
            default:
                $columns_class .= ' col-md-6 col-lg-4 three-columns';
        } ?>
       <?php if($featured_episodes): ?>
         <div class="row justify-content-start g-4 mt-2">
            <?php $i = 1; foreach ($featured_episodes as $episode) : 
                $featured_id = $episode->ID;
                $image = get_the_post_thumbnail_url($featured_id, 'full');
                $image_alt = get_post_meta(get_post_thumbnail_id($featured_id), '_wp_attachment_image_alt', true);
                $title = get_the_title($featured_id);
                $link = get_permalink($featured_id);
                $excerpt = get_the_excerpt($featured_id);
                if (!empty($excerpt)) {
                    $text = $excerpt;
                } else {
                    $desc = get_post_field('post_content', $featured_id);
                    $text = wp_trim_words(strip_tags($desc), 8, '...');
                } ?>

                 <div class="<?php echo esc_attr($columns_class); ?> d-flex" data-aos="fade-up" data-aos-delay="<?php echo 50 + ($i * 50); ?>">
                    <div class="np-card w-100">
                    <div class="np-card-img bg-accent-light">
                        <?php if ($image) : ?>
                            <a href="<?php echo esc_url($link); ?>" tabindex="0" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="w-100 h-100">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="img-fluid img-service w-100 h-100">
                            </a>
                        <?php endif; ?>  
                        </a>                     
                        </a>                     
                    </div>
                    <div class="np-card-body">                      
                         <?php if ($title): ?>
                        <div class="np-card-title color-gray-off color-orange-h mt-2"><a href="<?php echo esc_url($link); ?>" tabindex="0" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="w-100 h-100 color-gray-off color-orange-h"><?php echo esc_html($title); ?></a></div>
                         <?php endif; ?>
                           <?php if ($text): ?>
                        <div class="np-card-desc mb-0 color-gray"><?php echo $text; ?></div>
                         <?php endif; ?>
                    </div>
                    <div class="np-card-footer">
                        <div class="d-flex flex-column flex-wrap gap-3 mt-3">  
                            <div class="relative group">
                            <a href="<?php echo esc_url($link); ?>" tabindex="0" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="simple-link color-dark color-orange-h">
                                Read more
                            </a>
                        </div>  
                    </div>           
                    </div>
                   </div>
                </div>
             <?php endforeach; ?>
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
   <?php } else { 
            include get_template_directory() . '/template-parts/global/global-recent-episodes.php'; 
        } ?>        
</section> 
<?php }
?>
