<?php
/**
 * Displays the content when the contact us template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<?php $image = get_field('image_banner_inside');
$title = get_field('title_banner_inside');
$subtitle = get_field('subtitle_banner_inside'); ?>
<div class="banner-inside d-flex align-items-end wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
    <div class="container bg-white">
        <div class="row equal row-banner-inside justify-content-center align-items-center h-100">
            <div class="col-md-12">
                <?php if( $title ): ?>
                    <h2 class="headline-section cl-stormy-sea text-center pb-0"><?php echo $title;?></h2>
                    <img class="squiggle-blue m-auto-25" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/border-squiggle-blue.png" border="0">
                <?php endif; ?>
                <?php if( $subtitle ): ?>
                    <div class="copy-description text-center cl-stormy-sea"><?php echo $subtitle;?></div>
                <?php endif; ?>
                <?php if( have_rows('banner_menu_inside') ): ?>
                <div class="menu-sub-inside d-md-flex flex-wrap justify-content-center align-items-end hide-md">
                    <?php  while( have_rows('banner_menu_inside') ) : the_row();
                        $page = get_sub_field('select_page');
                        $isactive = get_sub_field('is_active');
                        $page_id = get_queried_object_id();
                        $link_id = $page->ID;
                        if( $page ):
                        ?>
                        <a class="cl-stormy-sea cl-stormy-sea-h position-relative <?php if($page_id == $link_id): echo "active"; endif;?>" href="<?php echo get_permalink($link_id); ?>"><?php echo esc_html( $page->post_title ); ?></a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
    <style>
        <?php if( !empty($image) ): ?>
        .banner-inside{
            background: rgb(56, 37, 253);
            background-image: linear-gradient(180deg, rgba(56, 37, 253, 0.65) 0%, rgba(56, 37, 253, 0.65) 100%), url(<?php echo $image['url']; ?>) !important;
            background-size: cover !important;
        }
        <?php endif; ?>
    </style>
<div class="bg-white hide-tb section-menu-mv wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if( have_rows('banner_menu_inside') ): ?>
                    <div class="menu-sub-inside d-flex flex-wrap justify-content-center align-items-end">
                        <?php  while( have_rows('banner_menu_inside') ) : the_row();
                            $page = get_sub_field('select_page');
                            $isactive = get_sub_field('is_active');
                            $page_id = get_queried_object_id();
                            $link_id = $page->ID;
                            if( $page ):
                                ?>
                                <a class="cl-stormy-sea cl-stormy-sea-h position-relative <?php if($page_id == $link_id): echo "active"; endif;?>" href="<?php echo get_permalink($link_id); ?>"><?php echo esc_html( $page->post_title ); ?></a>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<section class="description-inside bg-light-blue pt-md-5 pb-md-4 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
    <div class="container pt-md-5 pb-md-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="copy-description copy-pb-0 cl-stormy-sea text-center">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-form bg-white wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="contact-form">
                    <?php gravity_form(2, false); ?>
                </div>
            </div>
        </div>
    </div>
</section>
</article><!-- .post -->