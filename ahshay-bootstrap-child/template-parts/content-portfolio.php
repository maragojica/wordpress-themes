<?php
/**
 * The template for displaying content in the single.php template.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
        $project_navigate_to = get_field('project_navigate_to');
        $featured_image_caption = get_field('featured_image_caption');
        $bg_header_image = get_field('bg_header_image');
    ?>
    <section class="section-main-single section-banner section-portfolio-header pb-md-5 pb-4" <?php if(!empty($bg_header_image)): ?>style="background: url('<?php echo esc_url($bg_header_image['url']); ?>') center center no-repeat;" <?php endif; ?>>
        <div class="container pt-md-5 pt-4 pb-md-5">
            <div class="row pt-lg-5">
                <div class="col-lg-12">
                    <h1 class="cl-white text-uppercase mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php the_title(); ?></h1>
                </div>
                <div class="col-lg-8">
                    <h3 class="cl-white wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo the_content(); ?></h3>
                </div>

                <?php if( have_rows('project_navigate_to') ): the_row(); ?>
                    <?php
                    $navigate_to_headline = get_sub_field('navigate_to_headline');
                    $navigate_to_links = get_sub_field('navigate_to_links');
                    ?>
                    <div class="col-md-12 pt-lg-3 pb-lg-3 mt-lg-4 mb-lg-4">
                        <div class="d-flex flex-column flex-lg-row justify-content-start text-center">
                            <?php if( $navigate_to_headline ): ?>
                                <div class="d-flex align-items-center justify-content-center label-2 cl-white mb-lg-0 mb-2 me-lg-3 me-0 text-lg-start text-center text-uppercase"><?=$navigate_to_headline; ?></div>
                            <?php endif; ?>
                            <?php foreach ( $navigate_to_links as $link ): ?>
                                <?php 
                                    $link_url = $link['navigate_to_link_anchor'];
                                    $link_title = $link['navigate_to_link_text'];
                                    ?>
                                    <div class="box-cta-btn me-lg-2 ms-lg-2 mb-lg-0 mb-2">
                                        <a tabindex="0" class="cta-btn" href="#<?php echo $link_url; ?>"><?php echo esc_html( $link_title ); ?></a>
                                    </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="col-12 pt-3">
                    <?php if ( has_post_thumbnail() ) {
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                        $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
                        <div class="box-featured">
                            <img class="img-fluid w-100 h-100 fit-cover-center radius-6" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>" width="1156" height="500">
                        </div>
                        <?php if ( $featured_image_caption['show_featured_image_caption'] ): ?>
                            <div class="dp-1 cl-white pt-2 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><p><?php echo $featured_image_caption['featured_image_caption_text']; ?></p></div>
                        <?php endif; ?>
                    <?php } ?>
                </div>

            </div>
        </div>
    </section>
    <?php if (have_rows('modules_flexible')): ?>               
        <?php while(have_rows('modules_flexible')): the_row();
            get_template_part('template-parts/template-flexible/content', get_row_layout());
        endwhile; ?>              
     <?php endif; ?> 
     
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