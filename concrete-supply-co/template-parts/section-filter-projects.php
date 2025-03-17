<?php
/**
* Filter Portfolio output in pattern
*/
?>
<?php  if (have_rows('featured_projects')):  
     while (have_rows('featured_projects')) :
        the_row(); 
        $activate_project_link = get_sub_field('activate_project_link');
        $headline = get_sub_field('heading');
        $subheading = get_sub_field('subheading');  
        $subheadingmv = get_sub_field('subheading_mobile');  
        $description = get_sub_field('description');  
        $list_work = get_sub_field('list_work');                
        $cta = get_sub_field('cta_button');  
        $bg_graphic = get_sub_field('bg_section_image');
        $bg_color = get_sub_field('bg_section_color'); ?>
<section class="portfolio-featured flex flex-col align-center" <?php if($bg_color && !empty($bg_graphic)){ ?>style="background: linear-gradient(<?php echo $bg_color;?>, <?php echo $bg_color;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php } else{ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>
    <div class="container">
    <div class="row center-xs p-b2">                    
        <div class="col-xs-12 col-lg-7">
            <?php if ($subheading) : ?>
                <span class="section-subtitle text-uppercase cl-black hide-sm mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $subheading; ?></span>
            <?php endif; ?>
            <?php if ($subheadingmv) : ?>
                <span class="section-subtitle text-uppercase cl-black show-sm mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $subheadingmv; ?></span>
            <?php endif; ?>
            <?php if ($headline) : ?>
                <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo $headline; ?></h2>
            <?php endif; ?>
            <?php if ($description) : ?>
                <div class="description cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo wp_kses_post($description); ?></div>
            <?php endif; ?>                     
        </div>
    </div>    
    <?php if( $list_work): ?>
    <div class="portfolio-row flex flex-row">  
         <?php foreach( $list_work as $project ):    
            $idfeatured[] = $project->ID;           
            $title = get_the_title( $project->ID ); 
            $content = $project->post_content; 
            $permalink = get_permalink( $project->ID );  
            $post_thumbnail_id = get_post_meta( $project->ID, '_thumbnail_id', true );
            $srcset = wp_get_attachment_image_srcset($post_thumbnail_id);
            $sizes = wp_get_attachment_image_sizes($post_thumbnail_id, 'full');?>
            <div class="project column portfolio-block-33">
                <a tab-index="0" aria-label="<?php echo $title; ?>" title="<?php echo $title; ?>" class="project-item" <?php if($activate_project_link){ ?> href="<?php echo $permalink; ?>" <?php }else{ ?> href="<?php echo get_the_post_thumbnail_url($project->ID, 'full'); ?>" data-fancybox="gallery" data-caption="<?php echo esc_html($content); ?>"<?php } ?>>
                    <img src="<?php echo get_the_post_thumbnail_url($project->ID, 'full'); ?>" alt="<?php echo $title; ?>" height="400" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>">
                    <div class="overlay"><?php echo $title; ?></div>
                </a>
            </div>                                
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <?php if( $cta ):
        $link_url = $cta['url'];
        $link_title = $cta['title'];
        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
            <div class="row center-xs p-t2">                    
                <div class="col-xs-12 col-lg-7">   
                <div class="button-wrapper blue animate__animated" data-animation="fadeBottom" data-duration="2.5s">
                    <a tabindex="0" class="button black" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                </div>
            </div>
        </div>
    <?php endif; ?>  
    </div>
</section>

<?php 
     endwhile;
endif;
?>
<?php 
$heading = get_field('filter_heading');
   $filter_options = get_field('filter_options'); ?>
<?php if($filter_options): ?>
    <section class="portfolio-filters flex flex-col align-center">
    <div class="container">
        <div class="tab-container">
            <div class="row bottom-xs">
                <div class="col-xs-12 col-lg-7 col-title-filter">   
                    <?php if($heading): ?>
                        <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $heading; ?></h2>
                    <?php endif; ?>   
                </div> 
                <div class="col-xs-12 col-lg-5 col-filter">   
                <div class="select-dropdown">
                        <button href="#" role="button" data-value="" class="select-dropdown__button"><span>ALL </span> <i class="chevron-down"></i>
                        </button>
                    <div class="select-category">                     
                        <?php $i = 1; foreach( $filter_options as $filter_option ): ?>
                            <div class="filter-category <?php if($i == 1) echo ' active'; ?>">
                            <a href="#" tabindex="0" aria-label="<?php echo esc_html( $filter_option->name ); ?>" title="<?php echo esc_html( $filter_option->name ); ?>" class="project-link select-dropdown__list-item" data-term-id="<?php echo $filter_option->term_id; ?>" data-taxonomy="<?php echo $filter_option->taxonomy; ?>" value="<?php echo $filter_option->term_id; ?>"><?php echo esc_html( $filter_option->name ); ?></a>                                                 
                            </div>	
                            <?php $i++; endforeach; ?>  
                    </div> 
                </div>
                </div>                  
            </div> 
            <div class="filter-content p-t2" id="projects">  
                <?php 
                $query = array(
                    'post_type' => array( 'portfolio' ),     //Portfolio CPT
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'desc',
                    'posts_per_page' => 12,
                    'post__not_in' => array_values($idfeatured)
                );
                $allpost = new WP_Query($query);
                $total = $allpost->found_posts; 
                if ( $allpost->have_posts() ) { 
                    $pattern = array('40', '30', '30', '30', '30', '40', '40', '30', '30', '30', '30', '40');
                    $counter = 0; ?>
                    <div class="projects-row portfolio-row flex flex-row">
                        <?php while($allpost->have_posts()) : $allpost->the_post(); 
                        $class = 'portfolio-block-' . $pattern[$counter % count($pattern)];
                        $post_thumbnail_id = get_post_meta( get_the_id(), '_thumbnail_id', true );
                        $srcset = wp_get_attachment_image_srcset($post_thumbnail_id);
                        $sizes = wp_get_attachment_image_sizes($post_thumbnail_id, 'full');
                        $counter++; ?>                
                        <div class="project column <?php echo $class; ?>">
                            <div class="project-item">
                                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" height="350" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>">
                                <div class="overlay"><?php the_title(); ?></div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                <?php  wp_reset_postdata(); 
                } else {
                    echo '<p>No portfolio items found.</p>';
                }?>  
            </div>           
            <div class="row p-t2 center-xs">
                <div class="col-md-12">
                <div class="btn__wrapper button-wrapper blue animate__animated" data-animation="fadeBottom" data-duration="2.5s">
                    <a href="#!" class="button black" id="load-more" tabindex="0" aria-label="Load More" title="Load More" data-featured="<?php echo implode(" ",$idfeatured); ?>">Load more</a>
                </div>    
                </div>
            </div> 
    </div>
    </div>    
    </section>
 <?php 
endif; ?>   

