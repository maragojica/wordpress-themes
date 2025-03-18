<?php
/**
 * The template for displaying content in the page-resources.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( has_post_thumbnail() ) {
    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
    $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
    <section class="banner-respources section-inside bg-accent-grey-1 d-flex align-items-center justify-content-center flex-column position-relative pb-5" style="background-image: url(<?php echo $featured_img_url;?>);">
        <div class="container position-relative z-index-3 pt-lg-5 pb-lg-5 mb-lg-5">
            <div class="row row-banner-resources justify-content-center pt-5 pb-5 mb-lg-5">
                <div class="col-lg-12">
                    <?php $headline_banner = get_field('title_banner_resources'); ?>
                    <?php if($headline_banner): ?>
                        <h1 class="cl-dark-ocean mb-0 text-md-start text-center"><?php echo $headline_banner; ?></h1>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <section class="section-resources-filter bg-white pt-5">
        <div class="container pt-3">
           <div class="row row-type">
               <div class="col-md-12">
                   <div class="button-group filters-button-group filter-cat d-flex align-items-center flex-lg-row flex-column cl-grey-2" id="filters" data-filter-group="filters">
                       <?php $filter_name_2 = get_field('filter_name_1');
                       if($filter_name_2): ?>
                           <span class="title-filter me-lg-2 mb-lg-0 mb-4"><?php echo $filter_name_2;?></span>
                       <?php endif; ?>
                       <?php $term_query = new WP_Term_Query( array( 'taxonomy' => 'resource_type', 'orderby' => 'name', 'hide_empty' => false ) );
                       if ( ! empty( $term_query->terms ) ) { ?>
                       <div class="d-flex align-items-center justify-content-center justify-content-lg-start flex-wrap flex-lg-nowrap">
                           <button class="button btn-filter link-filter <?php if(!isset($_GET['type'])): ?>is-checked<?php endif;?>" data-filter="*">All</button>
                           <?php $cat_args = array(
                               'orderby'       => 'term_id',
                               'order'         => 'ASC',
                               'hide_empty'    => false,
                           );
                           foreach ( $term_query ->terms as $term ) { ?>
                               <button class="button btn-filter link-filter  <?php if(isset($_GET['type']) && $_GET['type'] == $term->slug): ?>is-checked<?php endif;?>" data-filter=".<?php echo $term->slug;?>"><?php echo $term->name;?></button>
                           <?php } ?>
                           <?php
                       } else {
                           echo 'No terms found.';
                       } ?>
                       </div>
                   </div>

               </div>
            </div>
            <div class="row row-audience mt-lg-2 mt-4">
                <div class="col-md-12">
                    <div class="button-group filters-button-group filter-cat d-flex align-items-center flex-lg-row flex-column cl-grey-2" id="regions" data-filter-group="regions">
                        <?php $region_name= get_field('region_name');
                        if($region_name): ?>
                            <span class="title-filter me-lg-2 mb-lg-0 mb-4"><?php echo $region_name;?></span>
                        <?php endif; ?>
                        <?php $term_query = new WP_Term_Query( array( 'taxonomy' => 'resource_region', 'orderby' => 'name', 'hide_empty' => false ) );
                        if ( ! empty( $term_query->terms ) ) { ?>
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start flex-wrap flex-lg-nowrap">
                            <button class="button btn-filter link-filter <?php if(!isset($_GET['reg'])): ?>is-checked<?php endif;?>" data-filter="*">All</button>
                            <?php $cat_args = array(
                                'orderby'       => 'term_id',
                                'order'         => 'ASC',
                                'hide_empty'    => false,
                            );
                            foreach ( $term_query ->terms as $term ) { ?>
                                <button class="button btn-filter link-filter <?php if(isset($_GET['reg']) && $_GET['reg'] == $term->slug): ?>is-checked<?php endif;?>" data-filter=".<?php echo $term->slug;?>"><?php echo $term->name;?></button>
                            <?php } ?>
                            <?php
                            } else {
                                echo 'No terms found.';
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-search pt-4">
                <div class="col-md-5">
                    <div class="d-flex align-items-center flex-lg-row flex-column cl-grey-2">
                        <div class="input-group">
                            <span class="input-group-text" id="button-search">
                                <!--<i class="fa-solid fa-magnifying-glass"></i>-->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1122_1453)">
                                    <path d="M11.74 20.48C16.567 20.48 20.48 16.567 20.48 11.74C20.48 6.91303 16.567 3 11.74 3C6.91303 3 3 6.91303 3 11.74C3 16.567 6.91303 20.48 11.74 20.48Z" stroke="#57576F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                                    <path d="M18.03 18.03L21 21" stroke="#57576F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_1122_1453">
                                        <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
</span>
                            <input class="form-control" type="text" id="quicksearch" placeholder="Search News + Resources" aria-label="Search News + Resources" aria-describedby="Search News + Resources">
                        </div>
                    </div>
                </div>
            </div>

           <!-- <div class="row pt-lg-3 pt-3 mt-lg-5 mt-4">
                <div class="col-md-12">
                    <div class="line-top w-100"></div>
                </div>
            </div>-->
        </div>
    </section>
    <?php  $query = array(
        'post_type' => array( 'resource' ),     //All Resources
        'post_status' => 'publish',
        'orderby' => 'post_date',
        'order' => 'desc',
        'posts_per_page' => -1
    );
    $allpost = new WP_Query($query);
    if ( $allpost->have_posts() ) : ?>
        <section class="section-resources section-knowledge-hub bg-white pt-5 pb-lg-5">
            <div class="container">
                <div id="noresources" class="hide">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="cl-grey-3 mb-0">Coming soon</h6>
                        </div>
                    </div>
                </div>

                <div class="grid row equal row-knowledge-hub">
                    <?php $r = 1; while($allpost->have_posts()) : $allpost->the_post(); $id = get_the_ID(); $permalink = get_permalink($id); $audience = ""; $type = "";
                        $aud_terms = wp_get_object_terms( get_the_ID(),  "resource_region" );
                        if ( ! empty( $aud_terms ) ) {
                            if ( ! is_wp_error( $aud_terms ) ) { ?>
                                <?php foreach( $aud_terms as $term ) {
                                    $audience .= esc_html( $term->slug )." ";
                                }?>

                            <?php }
                        }
                        $type_terms = wp_get_object_terms( get_the_ID(),  "resource_type" );
                        if ( ! empty( $type_terms ) ) {
                            if ( ! is_wp_error( $type_terms ) ) { ?>
                                <?php foreach( $type_terms as $term ) {
                                    $type .= esc_html( $term->slug )." ";
                                }?>

                            <?php }
                        }?>
                        <div class="element-item <?php echo $audience; echo $type;?> col-lg-4 col-resources col-number-<?php //echo $r;?>" <?php if(isset($_GET['type']) && !str_contains($type, $_GET['type'])):?>style="display: none" <?php endif; ?><?php if(isset($_GET['reg']) && !str_contains($audience, $_GET['reg'])):?>style="display: none" <?php endif; ?>>
                            <div class="card card-resources w-100 h-100 d-flex flex-column">
                                <?php if ( has_post_thumbnail() ) {
                                    $featured_img_url = get_the_post_thumbnail_url($id,'full');
                                    $thumbnail_id = get_post_thumbnail_id( $id );
                                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
                                    <div  class="link-img-resource">
                                        <a href="<?php the_permalink(); ?>" class="w-100 h-100">
                                            <img class="img-resources img-fluid m-auto h-100 w-100 d-block fit-cover-center" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="card-body w-100 d-flex flex-column">
                                    <?php $audience = wp_get_object_terms( $id, 'resource_audience' ); ?>
                                    <?php if ( ! empty( $audience ) ) {
                                        if ( ! is_wp_error( $audience ) ) { ?>
                                           <div class="resource-audience d-flex">
                                                <?php $a = 1; foreach( $audience as $term ) { ?>
                                                    <a class="res-audience cl-green" href="<?php echo $site_url."/news-resources/?reg=".$term->slug; ?>" aria-label="<?php echo esc_html( $term->name );?>">
                                                        <?php if($a > 1): ?>,&nbsp;<?php endif; ?><?php echo esc_html( $term->name );?>
                                                    </a>
                                                    <?php $a++; } ?>
                                            </div>
                                        <?php } }?>
                                    <?php $publication_name = get_field('publication_name');  ?>
                                    <div class="d-flex align-items-center justify-content-between box-date">
                                        <?php if($publication_name): ?><span class="publication-name pe-3 pt-1"><?php echo $publication_name;?></span><?php endif; ?>
                                        <span class="date-post">
                                            <?php the_time('F') ?> <?php the_time('j') ?>, <?php the_time('Y') ?>
                                        </span>
                                    </div>
                                    <a class="d-flex align-items-center cl-dark cl-dark-h link-title-resource" href="<?php the_permalink(); ?>">
                                        <h6 class="head-7"><?php the_title();?></h6>
                                    </a>
                                   <div class="card-info-resources mb-md-4 mb-3">
                                       <div class="dp-1 dp-3 cl-grey-3 pt-md-3 pt-2">
                                           <?php echo get_the_excerpt().".."; ?>
                                       </div>
                                   </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <?php $type = wp_get_object_terms( $id, 'resource_type' ); ?>
                                        <?php if ( ! empty( $type ) ) {
                                            if ( ! is_wp_error( $type ) ) { ?>
                                                <div class="resource-type d-flex">
                                                    Resource type:&nbsp;
                                                    <?php $a = 1; foreach( $type as $term ) { ?>
                                                        <a class="res-type cl-grey-2" href="<?php echo $site_url."/news-resources/?type=".$term->slug; ?>" aria-label="<?php echo esc_html( $term->name );?>">
                                                            <?php if($a > 1): ?>,&nbsp;<?php endif; ?><?php echo esc_html( $term->name );?>
                                                        </a>
                                                        <?php $a++; } ?>
                                                </div>
                                            <?php } }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $r++; endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; wp_reset_postdata(); ?>

    <section class="section-info pt-5 pb-md-5">
        <div class="container">
            <?php $title_box_bottom = get_field('title_box_bottom_resources');
            if($title_box_bottom ): ?>
                <div class="row equal justify-content-center mb-5">
                    <div class="col-lg-12">
                        <?php if($title_box_bottom): ?>
                            <div class="cta-info cl-dark-ocean pt-4"><?php echo $title_box_bottom; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</article>
<!-- #post-## -->