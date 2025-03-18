<?php
/**
 * The template for displaying content in the page-home.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php $headline_banner = get_field('banner_title');
    $headline_banner_mv = get_field('banner_title_mv');?>
    <section class="banner-home d-flex align-items-center position-relative">
        <svg class="shape-banner-home hide-md" width="1440" height="315" viewBox="0 0 1440 315" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1440 310H273.352C240.215 310 213.352 283.137 213.352 250V65C213.352 31.8629 186.489 5 153.352 5H2.06828e-05" stroke="#24CFA3" stroke-width="10"/>
        </svg>
        <svg class="shape-banner-home show-md" width="390" height="169" viewBox="0 0 390 169" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M390 166H85.4129C52.2758 166 25.4129 139.137 25.4129 106V30.4129C25.4129 15.2732 13.1397 3 -2 3V3" stroke="#24CFA3" stroke-width="6"/>
        </svg>
        <div class="container z-index-3">
            <div class="row justify-content-center text-center">
                <div class="col-md-12">
                    <?php if($headline_banner || $headline_banner_mv): ?>
                    <h1 class="cl-white"><span class="hide-md"><?php echo $headline_banner;?></span><span class="show-md"><?php echo $headline_banner_mv;?></span></h1>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-about-home bg-accent-grey-1 d-flex align-items-center flex-lg-row flex-column position-relative">
        <?php $headline_about = get_field('title_about_home');
        $subheadline_about = get_field('subtitle_about_home');
        $text_about = get_field('text_about_home');
        $cta_about = get_field('cta_about_home');
        $image_about = get_field('image_about_home');?>
        <svg class="shape-about-home hide-lg" width="914" height="1089" viewBox="0 0 914 1089" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M914 5H738.294C705.156 5 678.294 31.8629 678.294 65V829.631C678.294 862.768 651.431 889.631 618.294 889.631H65.6309C32.4938 889.631 5.63086 916.494 5.63086 949.631V1089" stroke="#FFD0C0" stroke-width="10"/>
        </svg>
        <div class="container z-index-3">
                <div class="row row-info mt-lg-5 mb-lg-5">
                    <div class="col-lg-8 pe-lg-5">
                        <div class="pe-lg-5">
                            <?php if($headline_about): ?>
                                <h3 class="cl-black pb-4 mb-0 mb-md-3"><?php echo $headline_about;?></h3>
                            <?php endif;?>
                            <?php if($subheadline_about): ?>
                                <h5 class="pb-md-4 pb-3"><?php echo $subheadline_about;?></h5>
                            <?php endif;?>
                            <?php if($text_about): ?>
                                <div class="dp-1 cl-grey-3 font-light"><?php echo $text_about;?></div>
                            <?php endif;?>
                            <?php  if($cta_about) {
                                $link_url = $cta_about['url'];
                                $link_title = $cta_about['title'];
                                $link_target = $cta_about['target'] ? $cta_about['target'] : '_self';?>
                                <div class="box-cta-btn d-flex align-items-center mt-md-5 mt-4 pt-md-0 pt-2">
                                    <a class="cta-btn d-flex align-items-center cl-blue bg-white bg-accent-grey-1-h border-white border-blue-h" aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                                        <?php echo $link_title; ?>
                                        <span class="cta-arrows d-flex align-items-center">
                                        <svg class="arrow-short" width="33" height="13" viewBox="0 0 33 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1329_11274)">
                                                <path d="M14 6.5H32" stroke="#3877EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M27 1.5L32 6.5L27 11.5" stroke="#3877EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1329_11274">
                                                    <rect width="33" height="12" fill="white" transform="translate(0 0.5)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <svg class="arrow-long" width="33" height="13" viewBox="0 0 33 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1305_3418)">
                                                <path d="M1 6.5L32 6.5" stroke="#3877EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M27 1.5L32 6.5L27 11.5" stroke="#3877EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <div class="overlay d-flex align-items-start hide-md pt-lg-0 pt-5">
             <div class="container-fluid">
            <div class="row justify-content-end">
                <?php if ( !empty($image_about) ) : ?>
                    <div class="col-lg-4">
                        <img class="img-fluid d-block m-auto" src="<?php echo esc_url($image_about['url']); ?>" alt="<?php echo esc_attr($image_about['alt']); ?>" />
                    </div>
                <?php endif; ?>
            </div>
        </div>
        </div>
    </section>
    <section class="section-video-info bg-blue pt-5 pb-5 position-relative z-index-3">
        <div class="container pt-md-5 pb-md-5">
            <?php
            $videotitle = get_field('video_title');
            $videosubtitle = get_field('video_subtitle');
            $poster = get_field('video_poster');
            $video_source = get_field('video_source');
            $captions = get_field('video_captions');
            $local = get_field('video_local');
            $videomp4 = get_field('video_mp4');
            $videoogg = get_field('video_ogg');
            $videowebm = get_field('video_webm');
            $youtube = get_field('youtube_id');
            $vimeo = get_field('vimeo_id');  ?>
            <div class="row pb-5 justify-content-center align-items-center row-title-video">
                <?php if($videotitle): ?>
                <div class="col-md-6"><h6 class="cl-white pe-md-5 me-md-5"><?php echo $videotitle;?></h6></div>
                <?php endif; ?>
                <?php if($videosubtitle): ?>
                    <div class="col-md-6"><div class="dp-1 cl-white font-light"><?php echo $videosubtitle;?></div></div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php if( $video_source['value'] == "file" || $video_source['value'] == "local" ): ?>
                        <video class="player" playsinline controls <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>>
                            <?php if($video_source['value'] == "local" && $local){ ?>
                                <source src="<?php echo $local; ?>" type="video/mp4">
                            <?php }else{ ?>
                                <?php if( $videomp4 ): ?>
                                    <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                                <?php endif; ?>
                                <?php if( $videoogg ): ?>
                                    <source src="<?php echo $videoogg['url']; ?>" type="video/ogg">
                                <?php endif; ?>
                                <?php if( $videowebm ): ?>
                                    <source src="<?php echo $videowebm['url']; ?>" type="video/webm">
                                <?php endif; ?>
                                Your browser does not support the video tag.
                            <?php } ?>
                            <?php if( $captions ): ?>
                            <!-- Captions are optional -->
                            <track kind="captions" label="English captions" src="<?php echo $captions['url']; ?>" srclang="en" default />
                            <?php endif; ?>
                        </video>
                    <?php endif; ?>
                    <?php if( $video_source['value'] == "youtube" ): ?>
                        <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $youtube;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>></div>
                    <?php endif; ?>
                    <?php if( $video_source['value'] == "vimeo" ): ?>
                        <div class="player" data-plyr-provider="vimeo" data-plyr-embed-id="<?php echo $vimeo;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    $cta_resources = get_field('cta_resources');
        $query = array(
        'post_type' => array( 'resource' ),     //Last 3 Resources
        'post_status' => 'publish',
        'orderby' => 'post_date',
        'order' => 'desc',
        'posts_per_page' => 3
    );
    $allpost = new WP_Query($query);
    if ( $allpost->have_posts() ) : ?>
        <section class="section-resources bg-white pt-5 pb-5 position-relative">
            <svg class="shape-resources hide-md" width="911" height="235" viewBox="0 0 911 235" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M906 235V216.092C906 182.955 879.137 156.092 846 156.092H566.72C533.583 156.092 506.72 129.229 506.72 96.0916V65C506.72 31.8629 479.857 5 446.72 5H0" stroke="#3877EC" stroke-width="10"/>
            </svg>
            <div class="container pt-md-5 pb-md-5 position-relative z-index-2">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <?php  $title_resources = get_field('title_resources');
                        if($title_resources): ?>
                            <h2 class="cl-green text-center pb-4 mb-2"><?php echo $title_resources; ?></h2>
                        <?php endif; ?>
                        <?php $text_about = get_field('text_resources');
                        if($text_about): ?>
                            <div class="dp-1 cl-dark text-center"><?php echo $text_about;?></div>
                        <?php endif;?>
                    </div>
                </div>
                <div class="row pt-lg-5 mt-5">
                    <div class="col-md-12 pb-5 pb-lg-4 mb-lg-2">
                        <div class="line-top w-100"></div>
                    </div>
                </div>
                <div class="row equal">
                    <?php $r = 1; while($allpost->have_posts()) : $allpost->the_post(); $id = get_the_ID(); $permalink = get_permalink($id);?>
                        <div class="col-lg-4 col-resources col-number-<?php echo $r;?>">
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
                <?php
                if($cta_resources) {
                    $link_url = $cta_resources['url'];
                    $link_title = $cta_resources['title'];
                    $link_target = $cta_resources['target'] ? $cta_resources['target'] : '_self';?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-cta-btn d-flex align-items-center justify-content-center mt-md-5 mt-0 pt-md-5 pt-0 pb-md-5">
                                <a class="cta-btn d-flex align-items-center cl-blue bg-accent-grey-1 bg-white-h border-white border-blue-h" aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                                    <?php echo $link_title; ?>
                                    <span class="cta-arrows d-flex align-items-center">
                                        <svg class="arrow-short" width="33" height="13" viewBox="0 0 33 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1329_11274)">
                                                <path d="M14 6.5H32" stroke="#3877EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M27 1.5L32 6.5L27 11.5" stroke="#3877EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1329_11274">
                                                    <rect width="33" height="12" fill="white" transform="translate(0 0.5)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <svg class="arrow-long" width="33" height="13" viewBox="0 0 33 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1305_3418)">
                                                <path d="M1 6.5L32 6.5" stroke="#3877EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M27 1.5L32 6.5L27 11.5" stroke="#3877EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
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
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php endif; wp_reset_postdata(); ?>
    <?php $query = array(
        'post_type' => 'post',     //Last 5 Post
        'post_status' => 'publish',
        'orderby' => 'post_date',
        'order' => 'desc',
        'posts_per_page' => 5
    );
    $postslist = new WP_Query($query); ?>
    <?php if ( $postslist->have_posts() ) : ?>
    <section class="section-news bg-navy pt-5 pb-5">
        <div class="container pt-md-5 pb-md-5">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <?php  $title_news = get_field('title_news');
                    if($title_news): ?>
                        <h2 class="big-h2-mv cl-green text-center pb-4 mb-2"><?php echo $title_news; ?></h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="container-fluid pe-lg-0">
            <div class="posts-carousel owl-carousel">
                <?php while($postslist->have_posts()) : $postslist->the_post();
                $id = get_the_ID(); $permalink = get_permalink($id);
                $publiname = get_field('publication_name'); ?>
                <div class="item animated fadeIn">
                    <div class="card card-post w-100 h-100">
                        <?php if ( has_post_thumbnail() ) {
                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                            $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
                            <a href="<?php the_permalink(); ?>" aria-label="<?php the_title();?>">
                                <div class="card-img position-relative">
                                  <img class="card-img-top w-100 h-100 fluid-img fit-cover-center" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
                                </div>
                            </a>
                        <?php } ?>
                        <div class="card-body">
                            <?php  if( !isinternal($permalink) ){ ?>
                                <?php if($publiname): ?>
                                <p class="label-1 pb-2"><?php echo $publiname;?></p>
                                <?php endif; ?>
                            <?php }else{ ?>
                                <?php if(!empty(get_the_category())){ ?>
                                    <div class="d-flex">
                                        <p class="label-1 pb-2">
                                            <?php $i=1;
                                            foreach((get_the_category()) as $category) {
                                                $catename = $category->cat_name;

                                                if($i>1){
                                                    echo  ', '. $catename;
                                                }else{echo  $catename;  }
                                                $i++;
                                            }
                                            ?></p>
                                    </div>
                                <?php }?>
                            <?php } ?>
                            <h6 class="card-title title-post cl-white pb-4 mb-0"><a href="<?php the_permalink(); ?>" class="cl-white cl-accent-grey-2-h"><?php the_title();?></a></h6>
                            <div class="d-flex align-items-center">
                                <span class="date-post"><?php the_time('F') ?> <?php the_time('j') ?>, <?php the_time('Y') ?></span>
                                <?php  if( !isinternal($permalink) ): ?>
                                    <a class="link-external" href="<?php the_permalink(); ?>" aria-label="<?php the_title();?>">
                                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="11.5" cy="11.5" r="11.5" fill="#617C8A"/>
                                            <path class="path-p" d="M10.0486 8.02441H7.62925C7.29521 8.02441 7.02441 8.29521 7.02441 8.62925V15.8873C7.02441 16.2214 7.29521 16.4922 7.62925 16.4922H14.8873C15.2214 16.4922 15.4922 16.2214 15.4922 15.8873V13.468" stroke="#CCD9E0" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path class="path-s" d="M15.5969 10.4431C15.5969 10.7193 15.8208 10.9431 16.0969 10.9431C16.3731 10.9431 16.5969 10.7193 16.5969 10.4431L15.5969 10.4431ZM16.0969 7.41895L16.5969 7.41895C16.5969 7.28634 16.5443 7.15916 16.4505 7.06539C16.3567 6.97162 16.2296 6.91895 16.0969 6.91895V7.41895ZM13.0728 6.91895C12.7966 6.91895 12.5728 7.1428 12.5728 7.41895C12.5728 7.69509 12.7966 7.91895 13.0728 7.91895V6.91895ZM16.5969 10.4431L16.5969 7.41895L15.5969 7.41895L15.5969 10.4431L16.5969 10.4431ZM16.0969 6.91895H13.0728V7.91895H16.0969V6.91895Z" fill="#CCD9E0"/>
                                            <path class="path-s" d="M11.5092 11.2993C11.314 11.4945 11.314 11.8111 11.5092 12.0064C11.7045 12.2016 12.0211 12.2016 12.2163 12.0064L11.5092 11.2993ZM16.4502 7.7725C16.6455 7.57724 16.6455 7.26065 16.4502 7.06539C16.255 6.87013 15.9384 6.87013 15.7431 7.06539L16.4502 7.7725ZM12.2163 12.0064L16.4502 7.7725L15.7431 7.06539L11.5092 11.2993L12.2163 12.0064Z" fill="#CCD9E0"/>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php endif; wp_reset_postdata();?>
</article>
<!-- #post-## -->