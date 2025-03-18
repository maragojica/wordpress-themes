<?php
/**
 * The template for displaying content in the single-knowledge-hub.php template.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="section-main-single section-inside bg-white">
        <div class="container pt-md-5 pt-4 pb-0">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <?php $audience = wp_get_object_terms( $id, 'resource_type' ); ?>
                    <?php if ( ! empty( $audience ) ) {
                        if ( ! is_wp_error( $audience ) ) { ?>
                            <div class="content-cat d-flex align-items-center cl-dark-ocean">
                                Type
                                <?php $a = 1; foreach( $audience as $term ) { ?>
                                    <a class="link-content-cat cl-dark-ocean cl-black-h" href="<?php echo $site_url."/news-resources/?type=".$term->slug; ?>" aria-label="<?php echo esc_html( $term->name );?>">
                                        &nbsp;&#47;&#47;&nbsp;<?php echo esc_html( $term->name );?>
                                    </a>
                                    <?php $a++; } ?>
                            </div>
                        <?php } }?>
                    <h2 class="cl-dark-ocean mb-md-5 mb-4"><?php the_title(); ?></h2>
                    <div class="excerpt cl-dark-ocean mb-5"><?php the_excerpt(); ?></div>
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <div class="content-share d-flex align-items-center">
                            <span class="me-2">Share:</span><?php echo do_shortcode('[addtoany]'); ?>
                        </div>
                        <span class="date-post">
                            Updated <?php the_time('m') ?>/<?php the_time('j') ?>/<?php the_time('Y') ?>
                        </span>
                    </div>
                </div>
                <div class="col-md-12 mt-md-5 pt-5">
                    <?php if ( has_post_thumbnail() ) {
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                        $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                        $metadata = wp_get_attachment_metadata( get_the_ID() );
                        $caption = get_the_post_thumbnail_caption(get_the_ID());?>
                        <div class="box-featured">
                            <img class="img-fluid w-100 h-100 fit-cover-center" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
                        </div>
                        <?php if($caption): ?>
                            <div class="metadata mt-3"><?php echo $caption;?></div>
                         <?php endif; ?>
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
            <?php $title_box_bottom = get_field('title_box_bottom');
            if($title_box_bottom ): ?>
                <div class="row equal justify-content-center mb-5">
                    <div class="col-lg-7">
                        <?php if($title_box_bottom): ?>
                            <div class="cta-info cl-dark-ocean pt-4"><?php echo $title_box_bottom; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row justify-content-center pb-4 mb-md-5">
                <div class="col-lg-7">
                    <div class="back"><a href="/news-resources" aria-label="Back to Resources"><!--<svg class="me-2" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.25 7.75C12.6642 7.75 13 7.41422 13 7C13 6.58579 12.6642 6.25 12.25 6.25V7.75ZM1.75 6.25C1.33579 6.25 1 6.58579 1 7C1 7.41421 1.33579 7.75 1.75 7.75L1.75 6.25ZM12.25 6.25L1.75 6.25L1.75 7.75L12.25 7.75V6.25Z" fill="#89A5B4"/>
                                <path d="M4.13634 10.4467C4.42923 10.7396 4.9041 10.7396 5.197 10.4467C5.48989 10.1538 5.48989 9.67891 5.197 9.38601L4.13634 10.4467ZM1.75 6.99967L1.21967 6.46934C0.926777 6.76224 0.926777 7.23711 1.21967 7.53L1.75 6.99967ZM5.197 4.61334C5.48989 4.32044 5.48989 3.84557 5.197 3.55268C4.9041 3.25978 4.42923 3.25978 4.13634 3.55268L5.197 4.61334ZM5.197 9.38601L2.28033 6.46934L1.21967 7.53L4.13634 10.4467L5.197 9.38601ZM2.28033 7.53L5.197 4.61334L4.13634 3.55268L1.21967 6.46934L2.28033 7.53Z" fill="#89A5B4"/>
                            </svg>-->

                            Back to resources</a></div>
                </div>
            </div>
        </div>
    </section>
</article><!-- /#post-<?php the_ID(); ?> -->