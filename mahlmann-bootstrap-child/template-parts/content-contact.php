<?php
/**
 * Template part for displaying page content in page-contact.php
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
                    <div class="row justify-content-center pb-md-5">
                        <div class="col-md-12">
                            <?php if( $title ): ?>
                                <h2 class="subheadline cl-blue-d text-center pb-2"><?php echo $title;?></h2>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?php if( $text ): ?>
                                <div class="copy-text cl-blue-d"><?php echo $text;?></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md col-contact pl-md-5 pt-md-0 pt-4">
                            <?php echo do_shortcode('[contact-form-7 id="170" title="Contact Form Page"]'); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

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