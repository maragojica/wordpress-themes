<?php
/**
 * The template for displaying content in the single.php template.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="section-main-single section-banner bg-white">
        
        <div class="container pt-5 pb-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h3 class="cl-slate mb-0"><?php the_title(); ?></h3>
                    <?php $show_date_time = get_field('show_date_&_time'); $show_location = get_field('show_location');  $show_cta = get_field('show_cta'); ?>
                    <?php if($show_date_time || $show_location || $show_cta): ?>
                        <div class="row align-items-start pt-5 pb-md-5">
                            <?php if($show_date_time):
                                $datetitle = get_field('date_&_time_title');
                                $dateicon = get_field('date_&_time_icon');
                                $date = get_field('date');
                                $time = get_field('time');?>
                                <div class="col-md-4 pb-md-0 pb-4">
                                    <div class="d-flex align-items-start">
                                        <?php if ( !empty($dateicon)) : ?>
                                            <img class="icon-date" src="<?php echo esc_url($dateicon['url']); ?>" alt="<?php echo esc_attr($dateicon['alt']); ?>" />
                                        <?php endif; ?>
                                        <div class="box-info-post ms-3">
                                            <?php if($datetitle): ?>
                                                <div class="dp-1 dp-2 cl-slate pb-2"><?php echo $datetitle; ?></div>
                                            <?php endif; ?>
                                            <?php if($date || $time): ?>
                                                <?php if($date): ?>
                                                    <div class="cl-slate date-post"><?php echo $date; ?></div>
                                                <?php endif; ?>
                                                <?php if($time): ?>
                                                    <div class="cl-slate date-post"><?php echo $time; ?></div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($show_location):
                                $location_title = get_field('location_title');
                                $location_icon = get_field('location_icon');
                                $location_text = get_field('location_text'); ?>
                                <div class="col-md-4 pb-md-0 pb-3">
                                    <div class="d-flex align-items-start">
                                        <?php if ( !empty($location_icon)) : ?>
                                            <img class="icon-date" src="<?php echo esc_url($location_icon['url']); ?>" alt="<?php echo esc_attr($location_icon['alt']); ?>" width="40" height="40"/>
                                        <?php endif; ?>
                                        <div class="box-info-post ms-3">
                                            <?php if($location_title): ?>
                                                <div class="dp-1 dp-2 cl-slate pb-2"><?php echo $location_title; ?></div>
                                            <?php endif; ?>
                                            <?php if($location_text): ?>
                                                <div class="cl-slate date-post"><?php echo $location_text; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($show_cta):
                                $cta_text = get_field('cta_text');
                                $permalink = get_permalink(get_the_ID()); ?>
                                <div class="col-md-4 d-flex justify-content-md-end">
                                    <a tabindex="0" class="cta-btn text-center cta-btn-post" aria-label="<?php echo $cta_text; ?>" href="<?php the_permalink(); ?>" <?php if( !isinternal($permalink) ): ?> target="_blank" <?php endif; ?>>
                                        <?php echo $cta_text; ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12 pt-5">
                    <?php if ( has_post_thumbnail() ) {
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                        $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                        $caption = get_post(get_post_thumbnail_id( get_the_ID() ))->post_excerpt; ?>
                        <div class="box-featured">
                            <img class="img-fluid w-100 h-100 fit-cover-center" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>" width="1156" height="500">
                        </div>
                        <?php if(!empty($caption)): ?>
                            <div class="dp-1 cl-slate-lt pt-2"><?php echo $caption;?></div>
                        <?php endif; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="d-flex flex-lg-row flex-column-reverse justify-content-between align-items-lg-center pb-lg-5 pb-4 pt-lg-0 pt-4">
                        <div class="dp-1 cl-slate-lt">
                            Last updated <?php the_time('j') ?>/<?php the_time('n') ?>/<?php the_time('Y') ?>
                        </div>
                        <!-- BLOCK SHARE HERE -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <?php if (have_rows('modules_flexible')): ?>
                <div class="modules-flexible">
                    <?php while(have_rows('modules_flexible')): the_row();
                        get_template_part('template-parts/template-flexible/content', get_row_layout());
                    endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <?php $show_info_bottom= get_field('show_info_bottom');
    if($show_info_bottom): ?>
    <section class="bg-golden-yellow pb-5 pt-5">
        <div class="container">
            <div class="row align-items-center pt-lg-5 pb-lg-5">
                <?php $title= get_field('title_contact_info');
                if($title): ?>
                <div class="col-lg-6">
                    <h3 class="cl-dark-brown mb-lg-0 mb-3 text-lg-start text-center"><?= $title;?></h3>
                </div>
                <?php endif; ?>
                <?php
                $link = get_field('cta_contact_info');
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <div class="col-lg-6 text-lg-start text-center">
                   <a tabindex="0" class="cta-1 big-cta cl-dark-brown cl-dark-brown-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?> <i class="fas fa-arrow-right"></i></a>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
    <?php endif; ?>
</article><!-- /#post-<?php the_ID(); ?> -->