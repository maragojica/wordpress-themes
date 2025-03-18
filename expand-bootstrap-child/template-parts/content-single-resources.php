<?php
/**
 * The template for displaying content in the single.php template.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="section-main-single section-inside bg-white pb-5">
        <div class="container pt-md-5 pb-md-5 pt-4 pb-0">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <?php $audience = wp_get_object_terms( $id, 'resource_audience' ); ?>
                    <?php if ( ! empty( $audience ) ) {
                        if ( ! is_wp_error( $audience ) ) { ?>
                            <div class="content-cat d-flex align-items-center cl-green">
                                Audience
                                <?php $a = 1; foreach( $audience as $term ) { ?>
                                    <a class="link-content-cat cl-green" href="<?php echo $site_url."/knowledge-hub/?aud=".$term->slug; ?>" aria-label="<?php echo esc_html( $term->name );?>">
                                        &nbsp;&#47;&#47;&nbsp;<?php echo esc_html( $term->name );?>
                                    </a>
                                    <?php $a++; } ?>
                            </div>
                        <?php } }?>
                    <h2 class="big-h2-mv cl-black mb-md-5 mb-4"><?php the_title(); ?></h2>
                    <h5 class="cl-dark mb-5"><?php the_excerpt(); ?></h5>
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <div class="content-share d-flex align-items-center">
                            <span class="me-2">Share:</span><?php echo do_shortcode('[addtoany]'); ?>
                        </div>
                        <span class="date-post">
                            Updated <?php the_time('j') ?>/<?php the_time('n') ?>/<?php the_time('Y') ?>
                        </span>
                    </div>
                </div>
                <div class="col-md-12 mt-md-5 pt-5">
                    <?php if ( has_post_thumbnail() ) {
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                        $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
                        <img class="img-fluid w-100" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
                    <?php } ?>
                </div>
            </div>
            <?php if (have_rows('modules_flexible')): ?>
                <div class="modules-flexible pt-5 mt-md-5">
                    <?php while(have_rows('modules_flexible')): the_row();
                        get_template_part('template-parts/template-flexible/content', get_row_layout());
                    endwhile; ?>
                </div>
           <?php endif; ?>
            <div class="row justify-content-center pb-4 mb-md-5">
                <div class="col-lg-7">
                    <div class="back"><a href="/knowledge-hub" aria-label="Back to Knowledge Hub"><svg class="me-2" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.25 7.75C12.6642 7.75 13 7.41422 13 7C13 6.58579 12.6642 6.25 12.25 6.25V7.75ZM1.75 6.25C1.33579 6.25 1 6.58579 1 7C1 7.41421 1.33579 7.75 1.75 7.75L1.75 6.25ZM12.25 6.25L1.75 6.25L1.75 7.75L12.25 7.75V6.25Z" fill="#89A5B4"/>
                                <path d="M4.13634 10.4467C4.42923 10.7396 4.9041 10.7396 5.197 10.4467C5.48989 10.1538 5.48989 9.67891 5.197 9.38601L4.13634 10.4467ZM1.75 6.99967L1.21967 6.46934C0.926777 6.76224 0.926777 7.23711 1.21967 7.53L1.75 6.99967ZM5.197 4.61334C5.48989 4.32044 5.48989 3.84557 5.197 3.55268C4.9041 3.25978 4.42923 3.25978 4.13634 3.55268L5.197 4.61334ZM5.197 9.38601L2.28033 6.46934L1.21967 7.53L4.13634 10.4467L5.197 9.38601ZM2.28033 7.53L5.197 4.61334L4.13634 3.55268L1.21967 6.46934L2.28033 7.53Z" fill="#89A5B4"/>
                            </svg>

                            Back to Knowledge Hub</a></div>
                </div>
            </div>
            <?php $title_box_bottom = get_field('title_box_bottom'); $cta_box_bottom = get_field('cta_box_bottom');
            if($title_box_bottom || $cta_box_bottom): ?>
                <div class="row equal mt-5">
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
                                            <span class="cta-arrows d-flex align-items-center">
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
</article><!-- /#post-<?php the_ID(); ?> -->