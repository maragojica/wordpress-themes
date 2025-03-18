<?php
/**
 * Template part for displaying page content in page-home.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if( have_rows('banner_home') ): ?>
        <?php while( have_rows('banner_home') ): the_row();
            // Get sub field values.
            $title = get_sub_field('title_banner_home');
            $logo = get_sub_field('logo_banner_home');
            $image = get_sub_field('image_banner_home');
            ?>
            <section class="banner-home position-relative">
                <?php if( !empty($image) ): ?>
                    <img class="cover-img img-fluid m-auto w-100 h-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                <div class="overlay overlay-bg-home d-flex align-items-center">
                    <div class="container">
                        <div class="row equal justify-content-center">
                            <div class="col-md-12">
                                <div class="box-info pr-md-0 pl-md-0">
                                    <?php if( !empty($logo) ): ?>
                                        <img class="logo-banne-img m-auto d-block pb-4" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                                    <?php endif; ?>
                                    <?php if( $title ): ?>
                                        <h1 class="headline cl-white text-center pb-0"><?php echo $title;?></h1>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php $title = get_field('title_about_home');
    $text = get_field('text_about_home');
    $title_cities = get_field('title_cities');
    $subtitle_cities = get_field('subtitle_cities');?>
    <section class="section-about pt-md-5 pb-5 pt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <?php if( $title ): ?>
                        <h2 class="subheadline cl-blue-d text-center pb-2"><?php echo $title;?></h2>
                    <?php endif; ?>
                    <?php if( $text ): ?>
                        <div class="copy-text cl-blue-d text-center"><?php echo $text;?></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if( have_rows('list_about_home') ): ?>
                <div class="row row-box-rounded equal justify-content-center m-auto pt-md-5 pt-4">
                <?php while ( have_rows('list_about_home') ) : the_row();
                    $name = get_sub_field('name_about_home');
                    $text = get_sub_field('text_about_home');
                    $color = get_sub_field('color_about_home');?>
                    <div class="col-4 col-lg pr-1 pl-1 col-rounded mb-lg-0 mb-4">
                        <div class="box-rounded position-relative d-flex align-items-center justify-content-center cl-white" style="background-color: <?php echo $color; ?>">
                            <?php if( $name ): echo $name; endif;?>
                        </div>
                        <div class="box-rounded-hover position-absolute d-flex flex-column align-items-center justify-content-center cl-white" style="background-color: <?php echo $color; ?>">
                            <?php if( $name ): echo $name; endif;?>
                            <?php if( $text ): ?>
                                <div class="text"><?php echo $text;?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <div class="row justify-content-center pt-5">
                <div class="col-md-12">
                    <?php if( $title_cities ): ?>
                        <h2 class="subheadline cl-blue-d text-center pb-0"><?php echo $title_cities;?></h2>
                    <?php endif; ?>
                    <?php if( $subtitle_cities ): ?>
                        <h3 class="textheadline cl-blue-d text-center"><?php echo $subtitle_cities;?></h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php if( have_rows('list_cities') ): ?>
        <section class="section-list-cities pt-lg-5 pb-lg-5 pt-4 pb-4">
            <div class="container-fluid pr-0 pl-0">
                <?php $i = 0; while ( have_rows('list_cities') ) : the_row();
                    $title = get_sub_field('title_list_cities');
                    $img = get_sub_field('image_list_cities');
                    $text = get_sub_field('text_list_cities');
                    $titlecolor = get_sub_field('title_color_list_cities');?>
                    <div class="row row-list-cities equal mr-0 ml-0 align-items-center justify-content-center <?php if($i % 2 != 0):?>flex-lg-row-reverse row-left<?php endif; ?>">
                        <div class="col-lg-6 pb-lg-0 pb-4 pr-0 pl-0">
                            <div class="box-info w-100 h-100 d-flex flex-column justify-content-center">
                                <?php if( $title ): ?>
                                    <h2 class="subheadline pb-2" style="color: <?php echo $titlecolor; ?>"><?php echo $title;?></h2>
                                <?php endif; ?>
                                <?php if( $text ): ?>
                                    <div class="copy-text cl-dark"><?php echo $text;?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6  pb-lg-0 pb-4 pr-0 pl-0">
                            <?php if( !empty($img) ): ?>
                                <div class="w-100 h-100">
                                    <img class="cover-img w-100 h-100 img-text img-fluid d-block" src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php $i++; endwhile; ?>
            </div>
        </section>
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