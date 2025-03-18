<?php
/**
 * The template for displaying content in the page-resources.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="banner-respources section-inside bg-accent-grey-1 d-flex align-items-center justify-content-center flex-column position-relative pb-5">
        <svg class="shape-top-banner-resources hide-lg" width="1440" height="195" viewBox="0 0 1440 195" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 5C88.9201 5 39.7346 5 62.2706 5C119.904 5 138.706 30.7085 138.706 88.1744C138.706 138.583 138.706 128.501 138.706 128.501C139.907 154.546 158.878 190 225.156 190C291.435 190 1129.53 190 1440 190" stroke="#3877EC" stroke-width="10"/>
        </svg>
        <svg class="shape-bottom-banner-resources hide-lg" width="315" height="363" viewBox="0 0 315 363" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M315 5H65C31.8629 5 5 31.8629 5 65V363" stroke="#FFD0C0" stroke-width="10"/>
        </svg>
        <div class="container position-relative z-index-3 pt-lg-5 pb-lg-5 mb-lg-5">
            <div class="row row-banner-resources justify-content-center pt-5 pb-5 mb-lg-5">
                <div class="col-lg-8 col-banner-resources">
                    <?php $headline_banner = get_field('title_banner_resources');
                    $subheadline_banner = get_field('subtitle_banner_resources');
                    $text_banner = get_field('text_banner_resources');?>
                    <?php if($headline_banner): ?>
                        <h2 class="bigh2-mv cl-green mb-md-5 mb-4"><?php echo $headline_banner; ?></h2>
                    <?php endif; ?>
                    <?php if($text_banner): ?>
                        <div class="dp-1 cl-black mb-4"><?php echo $text_banner; ?></div>
                    <?php endif; ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/path.png" alt="Separator Beige" class="line-path">
                    <?php if($subheadline_banner): ?>
                        <h6 class="cl-grey-3 mt-4"><?php echo $subheadline_banner;?></h6>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="filters" class="section-resources-filter bg-white pt-lg-5 pt-4 pb-5">
        <div class="container pt-3">
            <div class="row row-audience mb-lg-2 mb-4">
               <div class="col-md-12">
                   <div class="button-group filters-button-group filter-cat d-flex align-items-center flex-lg-row flex-column cl-grey-2">
                       <?php $filter_name_1 = get_field('filter_name_1');
                       if($filter_name_1): ?>
                       <span class="title-filter me-lg-2 mb-lg-0 mb-4"><?php echo $filter_name_1;?></span>
                       <?php endif; ?>
                       <?php $term_query = new WP_Term_Query( array( 'taxonomy' => 'resource_audience', 'orderby' => 'name', 'hide_empty' => false ) );
                       if ( ! empty( $term_query->terms ) ) { ?>
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start flex-wrap flex-lg-nowrap">
                       <!--<button class="button btn-filter link-filter <?php if(!isset($_GET['aud'])): ?>is-checked<?php endif;?>" data-filter="*">All</button>-->
                       <?php $cat_args = array(
                           'orderby'       => 'term_id',
                           'order'         => 'ASC',
                           'hide_empty'    => false,
                       );
                       foreach ( $term_query ->terms as $term ) { ?>
                           <button class="button btn-filter link-filter <?php if(isset($_GET['aud']) && $_GET['aud'] == $term->slug): ?>is-checked<?php endif;?>" data-filter=".<?php echo $term->slug;?>"><?php echo $term->name;?></button>
                       <?php } ?>
                       <?php
                       } else {
                           echo 'No terms found.';
                       } ?>
                        </div>
                   </div>
                </div>
           </div>

           <div class="row row-type">
               <div class="col-md-12">
                   <div class="button-group filters-button-group filter-cat d-flex align-items-center flex-lg-row flex-column cl-grey-2">
                       <?php $filter_name_2 = get_field('filter_name_2');
                       if($filter_name_2): ?>
                           <span class="title-filter me-lg-2 mb-lg-0 mb-4"><?php echo $filter_name_2;?></span>
                       <?php endif; ?>
                       <?php $term_query = new WP_Term_Query( array( 'taxonomy' => 'resource_type', 'orderby' => 'name', 'hide_empty' => false ) );
                       if ( ! empty( $term_query->terms ) ) { ?>
                       <div class="d-flex align-items-center justify-content-center justify-content-lg-start flex-wrap flex-lg-nowrap">
                           <!--<button class="button btn-filter link-filter <?php if(!isset($_GET['type'])): ?>is-checked<?php endif;?>" data-filter="*">All</button>-->
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
            <div class="row pt-lg-3 pt-3 mt-lg-5 mt-4">
                <div class="col-md-12">
                    <div class="line-top w-100"></div>
                </div>
            </div>
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
        <section class="section-resources bg-white pb-lg-5">
            <div class="container">
                <div id="noresources" class="hide">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="cl-grey-3 mb-0">Coming soon</h6>
                        </div>
                    </div>
                </div>

                <div class="grid row equal">
                    <?php $r = 1; while($allpost->have_posts()) : $allpost->the_post(); $id = get_the_ID(); $permalink = get_permalink($id); $audience = ""; $type = "";
                        $aud_terms = wp_get_object_terms( get_the_ID(),  "resource_audience" );
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
                        <div class="element-item <?php echo $audience; echo $type;?> col-lg-4 col-resources col-number-<?php echo $r;?>" <?php if(isset($_GET['type']) && !str_contains($type, $_GET['type'])):?>style="display: none" <?php endif; ?> <?php if(isset($_GET['aud']) && !str_contains($audience, $_GET['aud'])):?>style="display: none" <?php endif; ?>>
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
                                                    <a class="res-audience cl-green" href="<?php echo $site_url."/knowledge-hub/?aud=".$term->slug; ?>" aria-label="<?php echo esc_html( $term->name );?>">
                                                        <?php if($a > 1): ?>,&nbsp;<?php endif; ?><?php echo esc_html( $term->name );?>
                                                    </a>
                                                    <?php $a++; } ?>
                                            </div>
                                        <?php } }?>
                                    <a class="d-flex align-items-center cl-dark cl-dark-h link-title-resource" href="<?php the_permalink(); ?>">
                                        <h6 class="head-7"><?php the_title();?></h6>
                                    </a>
                                   <div class="card-info-resources mb-4">
                                       <div class="dp-1 dp-3 cl-grey-3 pt-3">
                                           <?php echo get_the_excerpt()."..."; ?>
                                       </div>
                                   </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <?php $type = wp_get_object_terms( $id, 'resource_type' ); ?>
                                        <?php if ( ! empty( $type ) ) {
                                            if ( ! is_wp_error( $type ) ) { ?>
                                                <div class="resource-type d-flex">
                                                    Type:&nbsp;
                                                    <?php $a = 1; foreach( $type as $term ) { ?>
                                                        <a class="res-type cl-grey-2" href="<?php echo $site_url."/knowledge-hub/?type=".$term->slug; ?>" aria-label="<?php echo esc_html( $term->name );?>">
                                                            <?php if($a > 1): ?>,&nbsp;<?php endif; ?><?php echo esc_html( $term->name );?>
                                                        </a>
                                                        <?php $a++; } ?>
                                                </div>
                                            <?php } }?>
                                        <?php  if( !isinternal($permalink) ): ?>
                                            <a class="link-external" href="<?php the_permalink(); ?>">
                                                <svg width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="11.75" cy="11.5" r="11.5" fill="#F2F6F7"/>
                                                    <path d="M10.2986 8.02441H7.87925C7.54521 8.02441 7.27441 8.29521 7.27441 8.62925V15.8873C7.27441 16.2214 7.54521 16.4922 7.87925 16.4922H15.1373C15.4714 16.4922 15.7422 16.2214 15.7422 15.8873V13.468" stroke="#89A5B4" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M15.8469 10.4436C15.8469 10.7198 16.0708 10.9436 16.3469 10.9436C16.6231 10.9436 16.8469 10.7198 16.8469 10.4436L15.8469 10.4436ZM16.3469 7.41943L16.8469 7.41943C16.8469 7.28683 16.7943 7.15965 16.7005 7.06588C16.6067 6.97211 16.4796 6.91943 16.3469 6.91943V7.41943ZM13.3228 6.91943C13.0466 6.91943 12.8228 7.14329 12.8228 7.41943C12.8228 7.69558 13.0466 7.91943 13.3228 7.91943V6.91943ZM16.8469 10.4436L16.8469 7.41943L15.8469 7.41943L15.8469 10.4436L16.8469 10.4436ZM16.3469 6.91943H13.3228V7.91943H16.3469V6.91943Z" fill="#89A5B4"/>
                                                    <path d="M11.7592 11.2998C11.564 11.495 11.564 11.8116 11.7592 12.0069C11.9545 12.2021 12.2711 12.2021 12.4663 12.0069L11.7592 11.2998ZM16.7002 7.77299C16.8955 7.57772 16.8955 7.26114 16.7002 7.06588C16.505 6.87062 16.1884 6.87062 15.9931 7.06588L16.7002 7.77299ZM12.4663 12.0069L16.7002 7.77299L15.9931 7.06588L11.7592 11.2998L12.4663 12.0069Z" fill="#89A5B4"/>
                                                </svg>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="show-lg pb-5 pt-5">
                            <div class="line-top w-100"></div>
                        </div>
                        <?php $r++; endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; wp_reset_postdata(); ?>

    <section class="section-info pb-md-5">
        <div class="container">
            <?php $title_box_bottom = get_field('title_box_bottom_resources'); $cta_box_bottom = get_field('cta_box_bottom_resources');
            if($title_box_bottom || $cta_box_bottom): ?>
                <div class="row equal mt-md-5 mb-5">
                    <div class="col-md-12">
                        <div class="w-100 h-100 pt-5 pb-5 bg-accent-grey-1 text-center d-flex flex-column align-items-center justify-content-center position-relative">
                            <svg class="shape-box-bottom hide-md" width="283" height="267" viewBox="0 0 283 267" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M79.5 0V156.5C79.5 189.637 106.363 216.5 139.5 216.5H227C254.89 216.5 277.5 239.11 277.5 267V267" stroke="#3877EC" stroke-width="10"/>
                                <path d="M180 267V231C180 197.863 153.137 171 120 171H2.83122e-06" stroke="#FFD0C0" stroke-width="10"/>
                            </svg>
                            <svg class="shape-box-bottom show-md" width="113" height="184" viewBox="0 0 113 184" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M32 0V110.699C32 131.962 49.237 149.199 70.5 149.199H74.1985C93.4188 149.199 109 164.78 109 184V184" stroke="#3877EC" stroke-width="8"/>
                                <path d="M71 184V148C71 114.863 44.1371 88 11 88H-3.8743e-07" stroke="#FFD0C0" stroke-width="8"/>
                            </svg>
                            <div class="info-box-botom z-index-2">
                                <?php if($title_box_bottom): ?>
                                    <h6 class="cl-blue pt-4"><?php echo $title_box_bottom; ?></h6>
                                <?php endif; ?>
                                <?php if($cta_box_bottom):
                                    $link_url = $cta_box_bottom['url'];
                                    $link_title = $cta_box_bottom['title'];
                                    $link_target = $cta_box_bottom['target'] ? $cta_box_bottom['target'] : '_self';?>
                                    <div class="box-cta-btn d-flex align-items-center justify-content-center mt-4 pb-4">
                                        <a class="cta-btn d-flex align-items-center cl-grey-3 cl-grey-3-h bg-white bg-accent-grey-1-h border-white border-grey-3-h" aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                                            <?php echo $link_title; ?>
                                            <span class="cta-arrows d-flex align-items-center ms-4">
                                                <svg class="arrow-short" width="33" height="13" viewBox="0 0 33 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1329_11274)">
                                                        <path d="M14 6.5H32" stroke="#617C8A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M27 1.5L32 6.5L27 11.5" stroke="#617C8A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1329_11274">
                                                            <rect width="33" height="12" fill="white" transform="translate(0 0.5)"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg class="arrow-long" width="33" height="13" viewBox="0 0 33 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1305_3418)">
                                                        <path d="M1 6.5L32 6.5" stroke="#617C8A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M27 1.5L32 6.5L27 11.5" stroke="#617C8A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1305_3418">
                                                            <rect width="33" height="12" fill="white" transform="translate(0 0.5)"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                        </span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</article>
<!-- #post-## -->