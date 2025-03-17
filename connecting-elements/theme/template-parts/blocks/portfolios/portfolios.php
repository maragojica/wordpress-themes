<?php
$content_block = get_field('portfolios_info');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $description = $content_block['description'];       
    $bg_color = $content_block['bg_color'];   

    // Filter Blogs    
    $number_of_posts = $content_block['number_of_posts'];
    $number_per_row = $content_block['number_per_row'];
    $load_more = $content_block['load_more'];
    $categories_as_filters = $content_block['categories_as_filters'];
    $search_filter = $content_block['search_filter'];
    $hide_filters = $content_block['hide_filters'];
    $post_type = $content_block['post_type'];
    $selected_categories = $content_block['category_portfolio'] ? (array) $content_block['category_portfolio'] : [];
    $cat = 'portfolio-category';

    $filter_col_class = ' w-full lg:w-1/2';
    $search_col_class = ' w-full';
    $row_class = 'h-full flex flex-col lg:flex-row items-center gap-y-[32px] lg:gap-y-0 lg:gap-x-[32px] row-filter mt-[2em] lg:mt-[70px]';

    if ($categories_as_filters && $search_filter) {
        $filter_col_class .= ' w-full lg:w-1/2';
        $search_col_class .= ' w-full lg:w-1/2';
        $row_class = 'h-full flex flex-col lg:flex-row items-center gap-y-[32px] lg:gap-y-0 lg:gap-x-[32px] row-filter justify-between items-center mt-[2em] lg:mt-[70px]';
    } elseif ($categories_as_filters || $search_filter) {
        $row_class = 'h-full flex flex-col lg:flex-row items-center gap-y-[32px] lg:gap-y-0 lg:gap-x-[32px] row-filter xl:justify-center justify-end mt-[2em] lg:mt-[70px]';
        $filter_col_class .= ' w-full';
        $search_col_class .= ' w-full';
    }

    $col_class = ' w-full';
    switch ($number_per_row) {
       
        case 2:
            $col_class .= ' sm:w-1/2';
            break;
        case 3:
            $col_class .= ' sm:w-1/2 lg:w-1/3';
            break;
        case 4:
            $col_class .= ' sm:w-1/2 lg:w-1/2 xl:w-1/4';
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

    $select_columns = 'sm:px-[10px] 2xl:px-[15px] mb-[20px] xl:mb-[88px]'.$col_class;   

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

     

    wp_enqueue_script('portfolios', get_template_directory_uri() . '/js/portfolios.js', array('jquery'), CONNECTING_ELEMENTS_VERSION, true);

    // Localize script with data for AJAX requests
   wp_localize_script('portfolios', 'portfolioInfo', array(
       'rest_url' => rest_url(),
       'nonce' => wp_create_nonce('wp_rest'),
       'posts_per_page' => $content_block['number_of_posts'] ?? 10,
       'col_class' => $col_class,      
       'current_page' => 1,
       'default_postype' => $post_type, 
   ));
?>

<section class="portfolios-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="w-full  pl-[22px] lg:pl-0 pr-[22px] lg:pr-0 mx-auto">           
        <div class="w-full text-center animate__animated" data-animation="fadeIn" data-duration="1.2s">                
                <?php if ($heading) : ?>
                    <h2 class="text-secondary mb-0">
                        <?php echo $heading; ?>
                    </h2>
                <?php endif; ?> 
                <?php if($description): ?>
                <div class="font-text-font text-foreground mt-3 lg:w-[75%] mx-auto xl:mt-6 style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                    <?php echo $description; ?>                   
                </div>
               <?php endif; ?>                
        </div>
        <div class="row-portfolio-filter relative z-[4] <?php echo $row_class;?> animate__animated" data-animation="fadeIn" data-duration="1.5s">
                
                <?php if ($search_filter) : ?>
                    <div class="col-search <?php echo $search_col_class;?>">						
                        <form id="search-posts" autocomplete="off" class="flex gap-[8px] items-center">                       
                        <input type="search" id="search-input" placeholder="Search" autocomplete="off" class="border-[3px] border-primary text-accent-dark text-[24px] font-primary-font font-semibold">
                        <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path d="M29.5111 32L18.3111 20.8C17.4222 21.5111 16.4 22.0741 15.2444 22.4889C14.0889 22.9037 12.8593 23.1111 11.5556 23.1111C8.32593 23.1111 5.59259 21.9926 3.35556 19.7556C1.11852 17.5185 0 14.7852 0 11.5556C0 8.32593 1.11852 5.59259 3.35556 3.35556C5.59259 1.11852 8.32593 0 11.5556 0C14.7852 0 17.5185 1.11852 19.7556 3.35556C21.9926 5.59259 23.1111 8.32593 23.1111 11.5556C23.1111 12.8593 22.9037 14.0889 22.4889 15.2444C22.0741 16.4 21.5111 17.4222 20.8 18.3111L32 29.5111L29.5111 32ZM11.5556 19.5556C13.7778 19.5556 15.6667 18.7778 17.2222 17.2222C18.7778 15.6667 19.5556 13.7778 19.5556 11.5556C19.5556 9.33333 18.7778 7.44444 17.2222 5.88889C15.6667 4.33333 13.7778 3.55556 11.5556 3.55556C9.33333 3.55556 7.44444 4.33333 5.88889 5.88889C4.33333 7.44444 3.55556 9.33333 3.55556 11.5556C3.55556 13.7778 4.33333 15.6667 5.88889 17.2222C7.44444 18.7778 9.33333 19.5556 11.5556 19.5556Z" fill="#00A2B2"/>
                        </svg>                      
                        </button>
                    </form>
                    </div>
                <?php endif; ?>
                <?php if ($categories_as_filters && is_array($selected_categories) && !empty($selected_categories)) : ?>
                        <div class="xl:flex hidden text-center select-category-blog filters-projects justify-center items-center gap-[48px] <?php if(!$search_filter): ?>mb-9<?php endif;?>">
                        <?php $i = 1; foreach ($selected_categories as $category_id) {
                                $tax_type =  'category';
                                $category = get_term($category_id, $tax_type);
                               
                                if (!is_wp_error($category)) { ?> 
                                      <a href="#" tabindex="0" aria-label="<?php echo esc_html($category->name); ?>" title="<?php echo esc_html($category->name); ?>" class="blog-link text-[24px] font-semibold font-primary-font text-accent-dark hover:text-primary <?php if($i == 1 || (isset($_GET['category']) && $_GET['category'] == $category->term_id)) echo ' active text-primary'; ?>"" data-category-id="<?php echo esc_attr($category->term_id); ?>" data-postype="<?php echo esc_attr($post_type); ?>" data-taxonomy="<?php echo $tax_type; ?>" value="<?php echo esc_attr($category->term_id); ?>"><?php echo esc_html($category->name); ?></a>                                                 
                           <?php } ?>

                           <?php $i++; } ?>
                        </div>
                        <div class="categories-filters select-dropdown pr-[68px] text-right <?php if($hide_filters): ?> hide <?php endif; ?> <?php echo $filter_col_class;?> xl:hidden block">
                            <button href="#" role="button" data-value="" class="select-dropdown__button dropdown__button__blog"><span>Portfolio Categories </span> <i class="chevron-down"></i>
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
            <div id="main-portfolio" class="portfolio portfolio-items flex flex-col sm:flex-row flex-wrap justify-center mt-6 animate__animated" data-animation="fadeBottom" data-duration="1s">   
                <?php  while ($query->have_posts()) : $query->the_post();
                            $title = get_the_title(); 
                            $id = get_the_id(); ?>  
                        <div class="<?php echo $select_columns; ?> portfolio-item content-portfolio">
                            <div class="w-full h-full group cursor-pointer modal-trigger" data-modal-id="modal-portfolio-<?php echo $id; ?>">
                            <div class="w-full h-[300px] 2xl:h-[372px] 4k:h-[600px] relative overflow-hidden rounded-[0px_50px_0px_50px]" >                            
                                <?php if (has_post_thumbnail()) : ?>								  
                                    <?php the_post_thumbnail('full', array('class' => 'w-full h-full transition-all duration-500 object-cover object-center z-[1] rounded-[0px_50px_0px_50px] hover:scale-110 group-hover:scale-110')); ?>				
                                <?php endif; ?> 
                                <?php if($title): ?>
                                    <div class="bg-white text-right rounded-tl-[50px] absolute bottom-0 right-0 z-[2] w-fit -mb-[1px] pl-[30px] 2xl:pl-[43px] pr-[16px] pt-[20px] 2xl:pt-[30px]">
                                        <?php if($title): ?>
                                            <div class="text-secondary text-[26px] xl:text-[29px] font-[800] font-primary-font leading-[1]"><?php echo $title;?></div>
                                        <?php endif; ?>  
                                    </div>
                                 <?php endif; ?>   
                            </div>
                          </div> 
                        </div>
                    <?php endwhile; ?>           
            </div>
            
        <?php  wp_reset_postdata(); endif; ?>        

        <?php if ($load_more && $query->found_posts > $number_of_posts) : ?>
            <div class="relative text-center mb-[3em] xl:mb-[88px] mt-[2em] xl:mt-0">               
                <a id="load-more" href="#" tabindex="0" target="_self" aria-label="Load More" title="Load More" class="seeMorePortfolio min-w-min btn btn_primary max-w-fit mx-auto">
                    Load More  
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php 
wp_enqueue_style('uikit-css', get_template_directory_uri() . '/css/uikit.css', array(), CONNECTING_ELEMENTS_VERSION); 
wp_enqueue_script('uikit-js', get_template_directory_uri() . '/js/uikit.min.js', array('jquery'), CONNECTING_ELEMENTS_VERSION, true);
wp_enqueue_script('uikit-icons-js', get_template_directory_uri() . '/js/uikit-icons.min.js', array('jquery'), CONNECTING_ELEMENTS_VERSION, true);

 $argsall = array(
    'post_type' => $post_type,
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby'=> 'post_date', 
     'order' => 'DESC'
);



$queryall = new WP_Query($argsall);
        if ($queryall->have_posts()) : ?>   
        <?php  while ($queryall->have_posts()) : $queryall->the_post();
            $title = get_the_title(); 
            $id = get_the_id(); 
            $featured_img_url = get_the_post_thumbnail_url($id,'full'); 
            $citystate = get_field('citystate', $id);
            $description = get_field('description', $id);
            $portfolio_slider = get_field('portfolio_slider', $id);   
            $buttons = get_field('buttons', $id);   ?>  
             <!-- Modal -->
            <div id="modal-portfolio-<?php echo $id; ?>" class="hidden fixed modal-portfolio inset-0 max-w-full bg-secondary bg-opacity-90 flex items-start justify-center overflow-y-auto lg:p-12 py-12 px-2 z-[99999] transition-opacity duration-300 ease-in-out opacity-0">
                <div class="bg-white w-full 2xl:max-w-[1368px] max-w-fit lg:p-[60px] pt-[72px] pb-[47px] px-[20px] relative overflow-y-auto max-h-[90vh] lg:max-h-max transform scale-95 transition-transform duration-300 custom-scroll">
                    <!-- Close Button -->
                    <button class="absolute top-4 right-4 modal-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
                    <path d="M31 3.45142L3 30.5482" stroke="#B6B8BA" stroke-width="6"/>
                    <path d="M30.5508 31L3.45401 3" stroke="#B6B8BA" stroke-width="6"/>
                    </svg>                    
                     </button>

                    <!-- Modal Content -->
                    <div class="flex flex-col items-start lg:gap-[40px] gap-[5px]">
                    <div class="w-full"><?php if($title): ?><h2 class="text-secondary mb-0"><?php echo $title; ?></h2><?php endif; ?></div>  
                            <div class="flex flex-col lg:flex-row-reverse items-start lg:gap-[60px] gap-[23px]">
                                <div class="w-full lg:w-[30%]">         
                                                
                                    <?php if($citystate):?><h3 class="text-primary mt-[10px] mb-3"><?php echo $citystate; ?></h3><?php endif; ?>
                                    <?php if($description): ?>
                                    <div class="font-text-font text-foreground style-disc mt-[10px] mb-3 lg:pt-4" >                 
                                        <?php echo $description; ?>                   
                                    </div>
                                    <?php endif; ?> 
                                
                                    <?php if ($buttons) : ?>
                                        <div class="w-full flex flex-wrap gap-4 justify-start mt-3 xl:mt-[50px]">
                                            <?php foreach ($buttons as $button) : ?>
                                                <?php 
                                                $button_link = $button['button'];
                                                $button_style = $button['button_style'];
                                                if ($button_link) :
                                                    $url = $button_link['url'];
                                                    $title = $button_link['title'];
                                                    $target = $button_link['target'] ? $button_link['target'] : '_self';    ?>
                                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                                                        <?php echo esc_html($title); ?>
                                                    </a>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>                                                 
                                </div> 
                                <div class="w-full lg:w-[70%]">
                        <?php if($portfolio_slider){ ?>
                                <div class="slide-portfolio slide-view">             
                                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
                                            <div class="uk-position-relative">
                                                <div class="uk-slider-container uk-light">
                                                    <div id="info-slide" class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m" uk-switcher="connect: #content-slide; animation: uk-animation-fade">
                                                    <?php foreach( $portfolio_slider as $image ): 
                                                        $srcset = wp_get_attachment_image_srcset($image['ID']);
                                                        $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>
                                                        <div>
                                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                                     
                                                        </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                                <div class="uk-hidden@s uk-light">
                                                    <a class="uk-position-center-left uk-position-small" href uk-slidenav-previous uk-slider-item="previous"></a>
                                                    <a class="uk-position-center-right uk-position-small" href uk-slidenav-next uk-slider-item="next"></a>
                                                </div>

                                                <div class="uk-visible@s">
                                                    <a class="uk-position-center-left-out uk-position-small" href uk-slidenav-previous uk-slider-item="previous"></a>
                                                    <a class="uk-position-center-right-out uk-position-small" href uk-slidenav-next uk-slider-item="next"></a>
                                                </div>
                                            </div>
                                        
                                        </div>
                                        <div id="content-slide" class="uk-switcher">
                                            <?php foreach( $portfolio_slider as $image ): 
                                                $srcset = wp_get_attachment_image_srcset($image['ID']);
                                                $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>
                                            <div> 
                                                <a class="uk-inline" href="#" >
                                                    <img src="<?php echo esc_url($image['url']); ?>" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" alt="<?php echo esc_attr($image['alt']); ?>"> 
                                                </a>
                                            </div>
                                            <?php endforeach; ?>               
                                        </div>
                                    </div>   
                      
                            <?php }else{ ?>
                                <?php echo get_the_post_thumbnail($id, 'full', ['class' => 'w-full h-fit h-[13em] md:h-[20em] lg:h-[25em] object-cover object-center']); ?>
                             <?php } ?>   
                        </div> 
                            </div>
                    </div>
                </div>
            </div>
         <?php endwhile; ?>  
        <?php  wp_reset_postdata(); endif; ?>   
<?php }
?>

