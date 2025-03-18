<?php
/**
 * Displays the content when the join us template is used.
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
<section class="description-inside bg-white wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <?php $title = get_field('title_section_demands');
                $text = get_field('text1_section_demands');
                $text2 = get_field('text2_section_demands_copy');?>
                <?php if( $text ): ?>
                    <div class="copy-description cl-stormy-sea"><?php echo $text;?></div>
                <?php endif; ?>
                <?php if( $title ): ?>
                    <h2 class="headline-section cl-ultra-violet text-center pb-0 pt-md-5"><?php echo $title;?></h2>
                    <img class="squiggle-blue m-auto-25" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/border-squiggle-blue.png" border="0">
                <?php endif; ?>
                <?php if( have_rows('list_section_demands') ): $count = count(get_field('list_section_demands')); ?>
                    <div class="box-demands pt-md-5 pt-3 pb-5">
                        <?php $i = 1; while( have_rows('list_section_demands') ) : the_row();
                            $title = get_sub_field('title_list_demands');
                            $logo = get_sub_field('logo_list_demands');
                            $text = get_sub_field('text_list_demands');
                            ?>
                        <div class="row equal align-items-start justify-content-between">
                            <div class="col-md-4 mb-5 mb-md-0">
                                <?php if( !empty($logo) ): ?>
                                   <img class="logo-demands img-fluid m-auto ml-md-0" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="col-md">
                                <?php if( $title ): ?>
                                    <h6 class="title-demands cl-stormy-sea pb-2 text-md-left text-center"><?php echo $title;?></h6>
                                <?php endif; ?>
                                <?php if( $text ): ?>
                                    <div class="text-demands cl-stormy-sea text-md-left text-center"><?php echo $text;?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if($i < $count): ?>
                        <hr>
                        <?php endif; ?>
                    <?php $i++; endwhile; ?>
                    </div>
                <?php endif; ?>
                <?php if( $text2 ): ?>
                    <div class="copy-description cl-stormy-sea pt-md-5"><?php echo $text2;?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="section-form bg-light-blue wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="contact-form">
                    <?php echo do_shortcode('[gravityform id="1" title="true"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
</article><!-- .post -->