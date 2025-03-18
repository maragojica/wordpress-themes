<?php
/**
 * Template part for displaying page content in page-about.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if( have_rows('banner_inside') ): ?>
        <?php while( have_rows('banner_inside') ): the_row();
            // Get sub field values.
            $title = get_sub_field('title_page_inside');
            $text = get_sub_field('text_page_inside');
            $image = get_sub_field('image_banner_inside');
            ?>
            <section class="banner-inside position-relative">
                <?php if( !empty($image) ): ?>
                    <img class="cover-img img-fluid m-auto w-100 h-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </section>
            <section class="section-about pt-md-5 pb-md-5 pb-3 pt-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <?php if( $title ): ?>
                                <h2 class="subheadline cl-blue-d text-center pb-2"><?php echo $title;?></h2>
                            <?php endif; ?>
                            <?php if( $text ): ?>
                                <div class="copy-text cl-blue-d text-center"><?php echo $text;?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php  $title = get_field('title_who_we_are');
    $text = get_field('text_group_fields_home_page'); ?>
    <section class="section-about pb-md-5 pb-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <?php if( $title ): ?>
                        <h2 class="subheadline cl-blue-d text-center pb-2"><?php echo $title;?></h2>
                    <?php endif; ?>
                    <?php if( $text ): ?>
                        <div class="copy-text cl-blue-d text-center"><?php echo $text;?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php $tax_post_args = array(
        'post_type' => 'team',
        'posts_per_page' => -1,
        'orderby'=> 'menu_order',
        'order' => 'ASC'
    );
    $tax_post_qry = new WP_Query($tax_post_args);
    if($tax_post_qry->have_posts()) :?>
        <section class="section-our-team bg-white d-flex align-items-center pb-md-5 pb-0">
            <div class="container">
                <div class="row equal justify-content-center">
                    <?php while($tax_post_qry->have_posts()) : $tax_post_qry->the_post();
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                        $thumb_id = get_post_thumbnail_id();
                        $alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
                        $postid = get_the_ID();
                        $position = get_field('position_team'); ?>
                        <div class="col-md-6 col-lg-4 mb-md-5 mb-4">
                            <a class="modal-team-staff text-decoration-none-h" href="#modal-team-<?php echo the_ID();?>" uk-toggle>
                                <div class="card card-person single-person w-100 h-100">
                                    <?php if( has_post_thumbnail() ): ?>
                                        <img class="card-img-top team-img m-auto d-block img-fluid" src="<?php echo esc_url($featured_img_url); ?>" alt="<?php echo esc_attr($alt); ?>" />
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h5 class="card-title cl-gray text-center"><?php the_title(); ?></h5>
                                        <?php if($position):?>
                                            <h5 class="card-subtitle cl-gray text-center"><?php echo $position; ?></h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                            <div class="content-modal-team" id="modal-team-<?php echo the_ID();?>" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                    <div class="card card-person card-team-modal">
                                        <div class="card-body pt-0">
                                            <div class="row row-body-team">
                                                <div class="col-md-4 mb-md-0 mb-4">
                                                    <?php if( has_post_thumbnail() ): ?>
                                                        <img class="card-img-top team-img team-img-person d-block" src="<?php echo esc_url($featured_img_url); ?>" alt="<?php echo esc_attr($alt); ?>" />
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md">
                                                    <div class="team-head">
                                                        <h5 class="card-title cl-black"><?php echo the_title(); ?></h5>
                                                        <?php if(get_field('position_team')):?>
                                                        <h5 class="card-subtitle cl-black"><?php echo the_field('position_team');?></h5>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php if ( !empty( get_the_content() ) ): ?>
                                                        <div class="card-text pt-4 cl-black"><?php echo the_content() ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; wp_reset_postdata(); ?>
    <?php $title = get_field('title_section_contact_pages');
    $cta = get_field('cta_section_contact_pages'); ?>
    <?php if( $title || $cta): ?>
        <section class="section-contact-page pt-5 pb-5">
            <div class="container">
                <div class="row row-contact-page m-auto equal align-items-center">
                    <?php if( $title ): ?>
                        <div class="col-md-6 text-md-right text-center">
                            <h2 class="title-contact-page cl-blue-d mb-md-0 mb-4 pb-0"><?php echo $title;?></h2>
                        </div>
                    <?php endif; ?>
                    <?php if($cta) {
                        $link_url = $cta['url'];
                        $link_title = $cta['title'];
                        $link_target = $cta['target'] ? $cta['target'] : '_self';?>
                        <div class="col-md">
                            <a class="cta-link d-flex align-items-center justify-content-center text-decoration-none-h bg-orange cl-white cl-white-h bg-blue-d-h text-uppercase" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                                <?php echo $link_title; ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
</article>
<!-- #post-## -->