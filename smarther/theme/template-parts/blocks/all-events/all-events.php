<?php

$content_block = get_field('content_block_all_upcoming_events');
if ($content_block) {
    
    $bg_color = $content_block['bg_color'];
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];
    $description = $content_block['description'];
    $buttons = $content_block['buttons'];
    $add_top_corner_shape = $content_block['add_top_corner_shape'];
    $add_bottom_corner_shape = $content_block['add_bottom_corner_shape'];

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
        case 'xsmall':
            $spacing_class = 'padding-xsmall';
            break;
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
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;

    if($bg_color === 'white'){
        $bg_class = 'bg-white';
    } elseif($bg_color === 'neutral'){
        $bg_class = 'bg-neutral';
    }

    // Get today's date in ACF format (Ymd)
    $today = date('Ymd');

    // Query for upcoming events
    $all_events = new WP_Query([
        'post_type' => 'event',
        'posts_per_page' => -1,
        'meta_query' => [
            [
                'key' => 'start_date',
                'value' => $today,
                'compare' => '>=',
                'type' => 'DATE'
            ]
        ],
        'meta_key' => 'start_date',
        'orderby' => 'meta_value',
        'order' => 'ASC'
    ]);
    $count_allpost = $all_events->post_count;
?>

<section class="all-events-section max-w-full relative overflow-hidden <?php if($bg_color): echo $bg_class; endif; ?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
    
    <?php if($add_top_corner_shape){ $top_corner_shape = $content_block['top_corner_shape'];?>
        <div class="absolute left-0 z-1 shape-top-corner top-0 md:max-w-[30%] max-w-[50%]" data-aos="fade-in">
            <?php if(!empty($top_corner_shape)){ echo wp_get_attachment_image( $top_corner_shape['ID'], 'full' ); } ?>
        </div>
    <?php } ?>
    
    <?php if($add_bottom_corner_shape){ $bottom_corner_shape = $content_block['bottom_corner_shape'];?>
        <div class="absolute right-0 z-1 shape-bottom-corner bottom-0 md:max-w-[30%] max-w-[50%]" data-aos="fade-in">
            <?php if(!empty($bottom_corner_shape)){ echo wp_get_attachment_image( $bottom_corner_shape['ID'], 'full' ); } ?>
        </div>
    <?php } ?>

    <div class="container mx-auto relative z-[2]">
        
        <!-- Header Section -->
        <div class="text-center mb-12 md:max-w-[70%] xl:max-w-[65%] mx-auto" data-aos="fade-in">
             <?php if($subheading): ?>
                        <div class="eyebrow text-quaternary mb-[12px]"  >
                            <?php echo $subheading; ?>
                        </div>   
                    <?php endif; ?> 
                        <?php if ($heading) : ?>
                         <h2 class="text-foreground mb-0" >
                                <?php echo $heading; ?>
                            </h2> 
                    <?php endif; ?>                     
                    <?php if($description): ?>
                    <div class="text-large text-foreground style-disc mt-[15px]" data-aos="fade-in" >                 
                        <?php echo $description; ?>                   
                    </div>
                <?php endif; ?>
        </div>

        <!-- Events Grid -->
        <?php if ($all_events->have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-8 lg:gap-y-[80px]" data-aos="fade-up">
                <?php while ($all_events->have_posts()) : $all_events->the_post();
                    // Get ACF fields
                    $event_name = get_the_title();
                    if (has_post_thumbnail()) {
                        $featured_image = [
                            'url' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                            'alt' => get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)
                        ];
                    } else {
                        $featured_image = null;
                    }
                    if (has_excerpt()) {
                        $short_description = get_the_excerpt();
                    } else {
                        $short_description = '';
                    }
                   $all_day = get_field('all_day_event');
                    $start_date = get_field('start_date', get_the_ID());
                    $start_time = get_field('start_time', get_the_ID());
                    $end_date = get_field('end_date', get_the_ID());
                    $end_time = get_field('end_time', get_the_ID());
                ?>
                
                <div class="event-card <?php if( $count_allpost > 6): ?> event-item <?php endif; ?>">
                    <?php if ($featured_image && !empty($featured_image['url'])) : ?>
                        <div class="event-image">
                            <a class="block w-full h-full" href="<?php echo esc_url(get_permalink()); ?>" aria-label="<?php echo esc_html($event_name); ?>" title="<?php echo esc_html($event_name); ?>" tabindex="0">
                                <img src="<?php echo esc_url($featured_image['url']); ?>" 
                                     alt="<?php echo esc_attr($featured_image['alt']); ?>">
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <div class="event-content group">
                        <div class="event-date eyebrow text-quaternary">
                             <?php echo $start_date; ?>
                        </div>
                        
                        <div class="event-title text-[22px] mt-[10px] text-foreground">
                            <a  href="<?php echo esc_url(get_permalink()); ?>" aria-label="<?php echo esc_html($event_name); ?>" title="<?php echo esc_html($event_name); ?>" tabindex="0">
                                <?php echo esc_html($event_name); ?>
                            </a>
                        </div>
                        
                        <?php if ($short_description != '') : ?>
                            <div class="event-description text-foreground mt-[10px]">
                                <?php echo esc_html($short_description); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <div class="text-center py-12">
                <p class="text-foreground">No upcoming events at this time. Check back soon!</p>
            </div>
        <?php endif; ?>

        <!-- Load More Button -->
          <?php if( $count_allpost > 6): ?>
        <div class="flex flex-wrap gap-2 lg:gap-8 mt-[60px] justify-center" data-aos="fade-up">
            <div class="relative group">
                    <a href="" tabindex="0" target="_self" aria-label="Load More" title="Load More" class="load-more-events btn w-fit btn_outline_action">
                        Load More                           
                    </a> 
            </div>            
      </div>
      <?php endif; ?>
    </div>
</section>

<?php } ?>