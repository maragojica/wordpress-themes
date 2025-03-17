<?php
/**
 * Template part for displaying cmp products cpt
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Construction_Metal_Products
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 
	 $show_internal_banner = get_field('show_internal_banner'); 
	 if($show_internal_banner):
    get_template_part('template-parts/sections/section-internal-banner');  
    endif; ?>
	 <section class="section-content-cmp p-b0">
        <div class="container">
            <div class="row row-sidebar">
                <div class="col-xs-12 col-xl-8 ps-0 pe-0 pe-xl-4">
                <?php get_template_part('template-parts/sections/section-products-single'); ?>
                </div>
				<?php $title_sidebar = get_field('title_sidebar'); 
                        $sidebar_categories = get_field('sidebar_categories');  
				if($sidebar_categories): ?>
                <div class="col-xs-12 col-xl-4 ps-xl-2 mt-lg-0">
                    <div class="cmp-sidebar wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">                      
                        <div class="header-sidebar">
                            <?php if($title_sidebar): ?>
                                <div class="title-sidebar"><?php echo $title_sidebar;?></div>
                             <?php endif; ?>   
                            <div class="line-sidebar"></div>
                        </div>
                        <div class="content-sidebar accordeon-content">
                        <?php foreach( $sidebar_categories as $filter_option ){  $headline = $filter_option->name; $cta = get_field('page_link', $filter_option); ?>
                            <button class="accordion" title="<?php echo $headline;?>"><?php echo $headline; ?></button>
                            <div class="panel bg-blue">
                                
                                <?php $query = array(
                                    'post_type' => array( 'cmp-product' ),  
                                    'post_status' => 'publish',
                                    'orderby' => 'title',
                                    'order' => 'asc',
                                    'posts_per_page' => -1,
                                    'tax_query' => array(             
                                        array(
                                           'taxonomy' => 'products-category',
                                           'field' => 'slug',
                                           'terms' => $headline, 
                                       ),
                                    )
                                ); 
                                $allpost = new WP_Query($query);
                                if ( $allpost->have_posts() ) : 
                                   while($allpost->have_posts()) : $allpost->the_post(); $hide_product_frlist = get_field('link_to_contact'); ?>
                                  <?php if(!$hide_product_frlist): ?>
                                  <div class="dp-1">
                                    <a href="<?php the_permalink(); ?>" class="cl-white" tabindex="0" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>"><?php echo the_title();?></a>
                                    </div> 
                                    <?php endif; ?>
                                    <?php endwhile; 
                                 endif; wp_reset_postdata(); ?>    
                                 <?php if( $cta ):
                                            $link_url = $cta['url'];
                                            $link_title = $cta['title'];
                                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>  
                                             <div class="dp-1">
                                              <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"  class="cl-white" tabindex="0" aria-label="View All Products" title="View All Products">View All Products</a>
                                            </div>  
                                  <?php endif; ?>                                   
                            </div>
                         <?php } ?>   
                        </div>
                    </div>
                </div>
				<?php endif; ?>
            </div>
        </div>	
    </section>        
   <?php get_template_part('template-parts/sections/section-contact');  
    $show_social = get_field('show_social'); 
    if($show_social):
    get_template_part('template-parts/sections/section-social'); 
    endif;
    ?>  
</article><!-- #post-<?php the_ID(); ?> -->
