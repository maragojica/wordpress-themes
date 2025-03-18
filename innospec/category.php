<?php 
get_header();
?>
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="breadcrumb">
                <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="header-search mb-3">
                    CATEGORIES
                </div>
                <section class="sidebar-categories">
                <?php //echo get_category_parents( $cat, true, ' &raquo; ' ); ?>
                
                    <ul>
                    <?php 
                    

                    $category = get_queried_object();
                    $category_id = $category->term_id;
                    //get parent id category of category child
                    $category_id_parent = smart_category_top_parent_id($category_id);

                    $args = array(
                        'parent'  => $category_id_parent,
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'hide_empty' => false,
                    );
                    $categories = get_categories( $args );
                    foreach($categories as $category)
                        echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->name.'</a></li>';
                    
                    ?>
                    </ul>
                </section>
            </div>
            <div class="col-lg-9">

                <!--<nav class="pagination">
                    <ul>
                        <li class="link-prev"><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                        <li class="active"><span>1</span></li>
                        <li class=""><a href="#">2</a></li>
                        <li class=""><a href="#">3</a></li>
                        <li class=""><a href="#">4</a></li>
                        <li class=""><a href="#">5</a></li>
                        <li class=""><a href="#">6</a></li>
                        <li class="link-last"><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                    </ul>
                </nav>-->

                <div class="wrap-content wrap-articles">
                    <?php
                    
                    //echo $category_id;
                    // https://wordpress.stackexchange.com/questions/209693/wordpress-page-2-404-pagination-problem-what-to-do
                    //view https://wordpress.stackexchange.com/questions/209693/wordpress-page-2-404-pagination-problem-what-to-do
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'cat' => $category_id,
                        'post_type' => 'products',
                        'posts_per_page' => 5,
                        'paged' => $paged
                    );
                    $wp_query = new WP_Query($args);

                    while ( $wp_query->have_posts() ) : $wp_query->the_post();
                    ?>
                    <article>
                        <div class="row">
                            <div class="col-lg-9">
                                <h2><a href="fuel-additives-product-detail.html"><?php echo get_field('pro_code'); ?></a></h2>
                                <h4><?php the_title(); ?></h4>
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="col-lg-3 text-right">
                                <a href="<?php the_permalink(); ?>" class="link-learnmore">Learn more</a>
                            </div>
                        </div>
                    </article>
                    <?php endwhile; wp_reset_postdata(); ?>

                    <?php
                    //echo wpbeginner_numeric_posts_nav();
                    ?>
                </div>
                <!--<nav class="pagination">
                    <ul>
                        <li class="link-prev"><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                        <li class="active"><span>1</span></li>
                        <li class=""><a href="#">2</a></li>
                        <li class=""><a href="#">3</a></li>
                        <li class=""><a href="#">4</a></li>
                        <li class=""><a href="#">5</a></li>
                        <li class=""><a href="#">6</a></li>
                        <li class="link-last"><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                    </ul>
                </nav>-->
            </div>
        </div>
    </section>
<?php 

get_footer();

?>