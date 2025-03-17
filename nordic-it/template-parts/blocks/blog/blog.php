<?php
$content_block = get_field('blog_info');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];       
    $bg_color = $content_block['bg_color'];   

    // Filter Blogs    
    $number_of_posts = $content_block['number_of_posts'];
    $number_per_row = $content_block['number_per_row'];
    $load_more = $content_block['load_more'];
    $categories_as_filters = $content_block['categories_as_filters'];
    $search_filter = $content_block['search_filter'];
    $hide_filters = $content_block['hide_filters'];
    $post_type = $content_block['post_type'];
    $selected_categories = $content_block['category_blog'] ? (array) $content_block['category_blog'] : [];
    $cat = 'category';

    $filter_col_class = ' w-full lg:w-1/2';
    $search_col_class = ' w-full';
    $row_class = 'h-full flex flex-col lg:flex-row items-center gap-y-[32px] lg:gap-y-0 lg:gap-x-[32px] row-filter';

    if ($categories_as_filters && $search_filter) {
        $filter_col_class .= ' w-full lg:w-1/2';
        $search_col_class .= ' w-full lg:w-1/2';
        $row_class = 'h-full flex flex-col lg:flex-row items-center gap-y-[32px] lg:gap-y-0 lg:gap-x-[32px] row-filter';
    } elseif ($categories_as_filters || $search_filter) {
        $row_class = 'h-full flex flex-col lg:flex-row items-center gap-y-[32px] lg:gap-y-0 lg:gap-x-[32px] row-filter';
        $filter_col_class .= ' w-full';
        $search_col_class .= ' w-full';
    }

    $col_class = ' w-full';
    switch ($number_per_row) {
       
        case 2:
            $col_class .= ' lg:w-1/2';
            break;
        case 3:
            $col_class .= ' lg:w-1/3';
            break;
        case 4:
            $col_class .= ' sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/4';
            break;
    }    
   

    // Adjust the query args based on the categories_as_filters setting  
 
    $args = array(
        'post_type' => $post_type,
        'post_status' => 'publish',
        'posts_per_page' => $number_of_posts,
        'orderby'=> 'post_date', 
         'order' => 'DESC'
    );

    if (!$categories_as_filters && !empty($selected_categories)) {
        $args['tax_query'] = [
            [
                'taxonomy' => $cat,
                'field' => 'term_id',
                'terms' => implode(', ', $selected_categories)                 
            ],
        ];
    }
   
    $query = new WP_Query($args);

   //Columns Number

    $select_columns = 'px-3 mb-4'.$col_class;   

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
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;

     //Text Color Settings
     $text_color = $content_block['text_color_style'];

     if($text_color == "light"){
        $headline_color = "text-accent";
        $subheadline_color = "text-primary";
        $description_color = "text-primary";
        $cta_color = " text-accent hover:accent";
        $divider_color = "bg-primary";
        $arrow_color = "#F4F2ED";
        $border_color = "#8B9589";

     }else{
        $headline_color = "text-secondary-dark";
        $subheadline_color = "text-secondary";
        $description_color = "text-secondary";
        $cta_color = " text-secondary-dark hover:text-secondary-dark";
        $divider_color = "bg-secondary";
        $arrow_color = "#324249";
        $border_color = "#628290";
     }      
   
    //Buttons Styles
    $button_style = "flex items-center justify-start gap-[12px] text-subheading font-secondary-font uppercase".$cta_color;

    wp_enqueue_script('blog', get_template_directory_uri() . '/js/blog.js', array('jquery'), NORDIC_IT_VERSION, true);

    // Localize script with data for AJAX requests
   wp_localize_script('blog', 'blogInfo', array(
       'rest_url' => rest_url(),
       'nonce' => wp_create_nonce('wp_rest'),
       'posts_per_page' => $content_block['number_of_posts'] ?? 10,
       'col_class' => $col_class,
       'border_color' => $border_color,
       'headline_color' => $headline_color,
       'description_color' => $description_color,
       'button_style' =>  $button_style,
       'arrow_color' =>  $arrow_color,
       'current_page' => 1,
       'default_postype' => $post_type, 
   ));
?>

<section class="columns-info-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="container mx-auto">           
        <div class="w-full animate__animated" data-animation="fadeIn" data-duration="1.5s">                
            <?php if ($subheading) : ?>
                <h3 class="<?php echo $subheadline_color;?> mb-[10px]">
                    <?php echo $subheading; ?>
                </h3>
            <?php endif; ?>
            <?php if ($heading) : ?>
               <div class="w-full relative">
                <h2 class="<?php echo $headline_color;?> mb-[20px] z-[2] relative w-fit pr-4 sm:pr-8" <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
                        <?php echo $heading; ?>
                 </h2>
                 <div class="w-full h-[4px] <?php echo $divider_color; ?> absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 z-[1] invisible lg:visible"></div>
               </div>
            <?php endif; ?>    
        </div>
        <div class="row-blog-filter relative z-[4] <?php echo $row_class;?> animate__animated" data-animation="fadeIn" data-duration="1.5s">
                
                <?php if ($search_filter) : ?>
                    <div class="col-search <?php echo $search_col_class;?>">						
                        <form id="search-posts" autocomplete="off">                       
                        <input type="search" id="search-input" placeholder="Search" autocomplete="off">
                        <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path d="M29.5111 32L18.3111 20.8C17.4222 21.5111 16.4 22.0741 15.2444 22.4889C14.0889 22.9037 12.8593 23.1111 11.5556 23.1111C8.32593 23.1111 5.59259 21.9926 3.35556 19.7556C1.11852 17.5185 0 14.7852 0 11.5556C0 8.32593 1.11852 5.59259 3.35556 3.35556C5.59259 1.11852 8.32593 0 11.5556 0C14.7852 0 17.5185 1.11852 19.7556 3.35556C21.9926 5.59259 23.1111 8.32593 23.1111 11.5556C23.1111 12.8593 22.9037 14.0889 22.4889 15.2444C22.0741 16.4 21.5111 17.4222 20.8 18.3111L32 29.5111L29.5111 32ZM11.5556 19.5556C13.7778 19.5556 15.6667 18.7778 17.2222 17.2222C18.7778 15.6667 19.5556 13.7778 19.5556 11.5556C19.5556 9.33333 18.7778 7.44444 17.2222 5.88889C15.6667 4.33333 13.7778 3.55556 11.5556 3.55556C9.33333 3.55556 7.44444 4.33333 5.88889 5.88889C4.33333 7.44444 3.55556 9.33333 3.55556 11.5556C3.55556 13.7778 4.33333 15.6667 5.88889 17.2222C7.44444 18.7778 9.33333 19.5556 11.5556 19.5556Z" fill="#8B9589"/>
                        </svg>                      
                        </button>
                    </form>
                    </div>
                <?php endif; ?>
                <?php if ($categories_as_filters && is_array($selected_categories) && !empty($selected_categories)) : ?>
                        <div class="categories-filters select-dropdown <?php if($hide_filters): ?> hide <?php endif; ?> <?php echo $filter_col_class;?>">
                            <button href="#" role="button" data-value="" class="select-dropdown__button dropdown__button__blog"><span>All </span> <i class="chevron-down"></i>
                                </button>
                            <div class="select-category select-category-blog"> 
                            <?php $i = 1; foreach ($selected_categories as $category_id) {
                                $tax_type =  'category';
                                $category = get_term($category_id, $tax_type);
                               
                                if (!is_wp_error($category)) { ?>                                  
                              
                                  <div class="filter-category <?php if($i == 1 || (isset($_GET['category']) && $_GET['category'] == $category->term_id)) echo ' active'; ?>">
                                      <a href="#" tabindex="0" aria-label="<?php echo esc_html($category->name); ?>" title="<?php echo esc_html($category->name); ?>" class="blog-link select-dropdown__list-item" data-category-id="<?php echo esc_attr($category->term_id); ?>" data-postype="<?php echo esc_attr($post_type); ?>" data-taxonomy="<?php echo $tax_type; ?>" value="<?php echo esc_attr($category->term_id); ?>"><?php echo esc_html($category->name); ?></a>                                                 
                                    </div>
                              
                              <?php } ?>


                           <?php $i++; } ?>
                           </div>   
                        </div>                   
                <?php endif; ?>    
      </div>                 
       <?php 
if ($query->have_posts()) : ?>
        <div class="relative z-[2]">
        <div id="main-blog" class="blog blog-items flex flex-col sm:flex-row flex-wrap justify-center -mx-3 mt-[32px] animate__animated" data-animation="fadeBottom" data-duration="1s">   
           <?php  while ($query->have_posts()) : $query->the_post();
                        $title = get_the_title(); 
                        $id = get_the_id();    ?>  
                    <div class="<?php echo $select_columns; ?> blog-item content-post">
                        <div class="flex flex-col h-full justify-between p-[28px] rounded-[12px] border-4 border-solid" style="border-color: <?php echo $border_color;?>">
                           <div class="flex-wrap">
                             <h3 class="text-primary mb-[10px]"><?php the_time('M j, Y'); ?></h3>
                                <?php if($title): ?>
                                    <div class="text-heading font-secondary-font uppercase mb-3 <?php echo $headline_color;?>"><?php echo $title; ?></div>
                                <?php endif; ?>   
                                <?php  if ( has_excerpt() ) {
                                        $excerpt = get_the_excerpt(); 
                                        $excerpt_length = 15;
                                        $excerpt = get_the_excerpt();
                                        $trimmed_excerpt = wp_trim_words($excerpt, $excerpt_length); ?>
                                    <div class="font-text-font bodysmall <?php echo $description_color;?>">
                                        <?php echo wp_kses_post($trimmed_excerpt); ?>
                                    </div>
                                <?php } ?>  
                            </div>
                        
                            <a href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="mt-[32px] group <?php if($button_style): echo $button_style; endif;?>">
                                Read More
                                <div class="relative">
                                    <svg class="absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 transition-all duration-300 opacity-[1] origin-left scale-100 group-hover:opacity-0 group-hover:scale-0" xmlns="http://www.w3.org/2000/svg" width="27" height="16" viewBox="0 0 27 16" fill="none">
                                        <path d="M0 8H24" stroke="<?php echo $arrow_color;?>" stroke-width="3"/>
                                        <path d="M18 2L24 8L18 14" stroke="<?php echo $arrow_color;?>" stroke-width="3"/>
                                    </svg>
                                    <svg class="absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 transition-all duration-300 opacity-0 origin-left scale-0 group-hover:opacity-[1] group-hover:scale-100" xmlns="http://www.w3.org/2000/svg" width="39" height="16" viewBox="0 0 39 16" fill="none">
                                    <path d="M0 8H36" stroke="<?php echo $arrow_color;?>" stroke-width="3"/>
                                    <path d="M30 2L36 8L30 14" stroke="<?php echo $arrow_color;?>" stroke-width="3"/>
                                    </svg>
                                </div>
                            </a>                                                  
                        
                        </div>
                    </div>
                <?php endwhile; ?>           
        </div>
        </div>
        <?php  wp_reset_postdata(); endif; ?> 
       

        <?php if ($load_more && $query->found_posts > $number_of_posts) : ?>
            <div class="relative text-center mt-8">               
                <a id="load-more" href="#" tabindex="0" target="_self" aria-label="Load More" title="Load More" id="seeMoreBlog" class="min-w-full sm:min-w-min btn bg-primary-light text-secondary-dark hover:bg-accent hover:text-primary-dark relative z-[2]">
                    Load More  
                </a>
                <div id="load-more-line" class="w-full h-[4px] bg-primary absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 z-[1] visible"></div> 
            </div>
        <?php endif; ?>

    </div>
</section>

<?php }
?>

