<?php
/**
 * Displays the content when the home template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<?php $image = get_field('image_main');
$addoverlay = get_field('add_overlay_main');
$title = get_field('title_main');
if( !empty($image) ): ?>
    <div class="section-banner-home section-banner">
        <div class="container h-100">
            <div class="position-relative h-100">
                <img class="banner-main-img w-100 h-100 fit-cover" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <div class="overlay <?php if( $addoverlay ): ?>overlay-bg-1 <?php endif; ?>">
                    <div class="container h-100">
                        <div class="row h-100 equal justify-content-center align-items-center">
                            <div class="col-10 col-md-9">
                                <?php if( $title ): ?>
                                    <h1 class="headline-banner-main cl-white text-center"><?php echo $title;?></h1>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if( have_rows('section_home_1') ): ?>
    <?php while( have_rows('section_home_1') ): the_row();
// Get sub field values.
        $title = get_sub_field('title_section_home1');
        $subtitle = get_sub_field('subtitle_section_home1');
        $cta = get_sub_field('cta_section_home1');
        ?>
        <div class="section-inner-content">
            <div class="container">
                <div class="row row-inner m-auto">
                    <div class="col-md-12">
                        <?php if( $title ): ?>
                            <h2 class="title-section text-uppercase cl-light-blue"><?php echo $title;?></h2>
                        <?php endif; ?>
                        <?php if( $subtitle ): ?>
                            <h3 class="subtitle-section cl-dark pb-4"><a class="text-green-h"><span data-content="<?php echo $subtitle;?>"><?php echo $subtitle;?></span></a></h3>
                        <?php endif; ?>
                        <?php  if($cta) {
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                            <div class="mb-4">
                                <a class="cta-link cl-dark-h cl-dark border-dark bg-yellow-h" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?>
                                    <img class="d-inline-block arrow-cta" src="<?php echo get_stylesheet_directory_uri(); ?>/assest/arrow-black.png">
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php if( have_rows('section_home_2') ): ?>
    <?php while( have_rows('section_home_2') ): the_row();
        // Get sub field values.
        $title = get_sub_field('title_section_home2');
        $text = get_sub_field('text_section_home2');
        $image = get_sub_field('image_section_home2');
        $subtitle = get_sub_field('subtitle_section_home2');
        ?>
        <div class="section-inner-content">
            <div class="container">
                <div class="row row-inner m-auto">
                    <div class="col-md-12">
                        <?php if( $title ): ?>
                            <h2 class="title-section text-uppercase cl-light-blue"><?php echo $title;?></h2>
                        <?php endif; ?>
                        <?php if( $text ): ?>
                            <div class="copy-text cl-dark pb-4"><?php echo $text;?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row equal row-gallery-media row-inner m-auto flex-md-row-reverse justify-content-center align-items-center pt-0 pt-md-3">
                    <?php if( $subtitle ): ?>
                        <div class="col-md-6">
                            <h3 class="subtitle-section cl-dark pb-0 mb-md-0 mb-5"><a class="text-green-h"><span data-content="<?php echo $subtitle;?>"><?php echo $subtitle;?></span></a></h3>
                        </div>
                    <?php endif; ?>
                    <?php if( !empty($image) ): ?>
                        <div class="col-md-6">
                            <img class="img-fluid fit-cover w-100 h-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                           <!-- <div class="ih-item square effect3 bottom_to_top m-auto">
                                <a href="<?php echo esc_url($image['url']); ?>" data-caption="<?php echo esc_attr($image['alt']); ?>">
                                    <div class="img"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"></div>
                                    <div class="info d-flex align-items-end">
                                        <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row w-100 h-auto pb-3 pt-2">
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>-->
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php if( have_rows('section_home_3') ): ?>
    <?php while( have_rows('section_home_3') ): the_row();
// Get sub field values.
        $title = get_sub_field('title_section_home3');
        $text = get_sub_field('text_section_home3');
        ?>
        <div class="section-inner-content">
            <div class="container">
                <div class="row row-inner m-auto">
                    <div class="col-md-12">
                        <?php if( $title ): ?>
                            <h2 class="title-section text-uppercase cl-light-blue"><?php echo $title;?></h2>
                        <?php endif; ?>
                        <?php if( $text ): ?>
                            <div class="copy-text cl-dark pb-4"><?php echo $text;?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php
$gallery = get_field('section_gallery_home');
if( $gallery ): ?>
    <div class="section-inner-content section-gallery">
        <div class="container-fluid pl-0 pr-0">
            <div class="row row-gallery-media mr-0 ml-0">
                <?php foreach( $gallery as $image  ): ?>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-gallery">
                        <img class="img-fluid fit-cover h-100 w-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        <!-- normal -->
                        <!--<div class="ih-item square effect3 bottom_to_top m-auto">
                            <a href="<?php echo esc_url($image['url']); ?>" data-caption="<?php echo esc_attr($image['alt']); ?>">
                                <div class="img"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"></div>
                                <div class="info d-flex align-items-end">
                                    <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row w-100 h-auto pb-3 pt-2">
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                            </a>
                        </div>-->
                        <!-- end normal -->
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if( have_rows('section_partners') ): ?>
    <div class="section-inner-content section-our-partners section-p60 bg-light-blue">
        <div class="container">
            <?php while( have_rows('section_partners') ): the_row();
// Get sub field values.
                $title = get_sub_field('title_section_partners');
                $subtitle = get_sub_field('subtitle_section_patners');
                $text = get_sub_field('text_section_partners');
                ?>
                <div class="row row-inner m-auto">
                    <div class="col-md-12">
                        <?php if( $title ): ?>
                            <h2 class="title-section text-uppercase cl-green"><?php echo $title;?></h2>
                        <?php endif; ?>
                        <?php if( $subtitle ): ?>
                            <h3 class="subtitle-section cl-white mb-4"><?php echo $subtitle;?></h3>
                        <?php endif; ?>
                        <?php if( $text ): ?>
                            <div class="copy-text cl-white pb-4"><?php echo $text;?></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php
            $query = array(
                'post_type' => 'partner',
                'post_status' => 'publish',
                'orderby' => 'menu_order',
                'order' => 'desc',
                'posts_per_page' => -1
            );
            $partners = new WP_Query($query);?>
            <?php if ( $partners->have_posts() ) : ?>
                <div class="row row-info m-auto row-logo-slider">

                    <div class="actions-carousel owl-carousel">
                        <?php while($partners->have_posts()) : $partners->the_post();
                            // Get sub field values.
                            $image = get_field('logo_blue_partnercpt');
                            $web = get_field('website_url_partnercpt');
                            ?>
                            <div class="item d-flex justify-content-center align-items-center animated fadeIn">
                                <a href="<?php  if( $web ){ echo $web; }else{ echo "#";}?>" <?php if( $web ){ ?>target="_blank" <?php } ?> class="h-100 d-flex justify-content-center align-items-center"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></a>
                            </div>
                        <?php endwhile; ?>
                    </div>


                </div>
            <?php endif; wp_reset_postdata();?>
            <?php while( have_rows('section_partners') ): the_row();
                // Get sub field values.
                $cta = get_sub_field('cta_section_partners');
                ?>
                <div class="row row-info m-auto">
                    <?php  if($cta) {
                        $link_url = $cta['url'];
                        $link_title = $cta['title'];
                        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                        <div class="mb-4 box-cta-partners w-100 text-center">
                            <a class="cta-link cl-dark-h cl-dark border-dark bg-white bg-yellow-h" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?>
                                <img class="d-inline-block arrow-cta" src="<?php echo get_stylesheet_directory_uri(); ?>/assest/arrow-black.png">
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>
<div class="section-inner-content section-contact-us section-p60 bg-yellow">
    <div class="container">
        <div class="row equal align-items-center bg-white bg-green-h row-contact">
            <div class="col-md-8">
                <h2 class="title-section text-uppercase cl-dark">Contact Us</h2>
                <div class="copy-text cl-dark pb-4 pb-md-0">
                    Are you a funder interested in collaborating? We welcome your feedback, insights, and questions.
                </div>
            </div>
            <div class="col-md">
                <a href="/contact" class="d-flex justify-content-md-center justify-content-end">
                    <img class="d-inline-block arrow-contact" src="<?php echo get_stylesheet_directory_uri(); ?>/assest/arrow-black.png">
                </a>
            </div>
        </div>
    </div>
</div>

