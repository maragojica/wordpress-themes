<?php
/**
 * Displays the content when the about template is used.
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
    <div class="container h-100 container-title-inner position-relative hide-md">
        <div class="d-flex h-100 equal justify-content-center align-items-end align-items-md-start">
            <?php if( $title ): ?>
                <div class="box-head bg-yellow p-3 pr-4 pl-4"><h1 class="headline-banner cl-dark text-center mb-0"><?php echo $title;?></h1></div>
            <?php endif; ?>
        </div>
    </div>
    <div class="section-banner-home secion-banner-inner section-banner">
        <div class="container h-100">
            <div class="position-relative h-100">
                <img class="banner-main-img w-100 h-100 fit-cover" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <div class="overlay <?php if( $addoverlay ): ?>overlay-bg-1 <?php endif; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="container h-100 container-title-inner position-relative show-md">
        <div class="d-flex h-100 equal justify-content-center align-items-end align-items-md-start">
            <?php if( $title ): ?>
                <div class="box-head bg-yellow p-3"><h1 class="headline-banner cl-dark text-center mb-0"><?php echo $title;?></h1></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php if( have_rows('section_summary') ): ?>
<?php while( have_rows('section_summary') ): the_row();
// Get sub field values.
$title = get_sub_field('title_section_summary');
$subtitle = get_sub_field('subtitle_section_summary');
$cta = get_sub_field('cta_section_summary');
?>
        <div class="section-inner-content section-summary section-p60">
            <div class="container">
                <div class="row row-info m-auto">
                    <div class="col-md-7">
                        <?php if( $title ): ?>
                            <h2 class="title-section text-uppercase cl-light-blue"><?php echo $title;?></h2>
                         <?php endif; ?>
                        <?php if( $subtitle ): ?>
                            <h3 class="subtitle-section cl-dark pb-md-4 pb-2 pr-md-4"><a class="text-green-h"><span data-content="<?php echo $subtitle;?>"><?php echo $subtitle;?></span></a></h3>
                        <?php endif; ?>
                        <div class="pt-0 pb-0 pt-md-4 pb-md-4"></div>
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
                    <?php if( have_rows('links_summary') ): ?>
                        <div class="col-md">
                            <div class="list-group list-summary hide-md">
                        <?php $count = 1; while( have_rows('links_summary') ): the_row();
                            // Get sub field values.
                            $linksummary = get_sub_field('link_section_summary');
                            $link_url = $linksummary['url'];
                            $link_title = $linksummary['title'];
                            $link_target = $linksummary['target'] ? $cta['target'] : '_self';
                            ?>
                                <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                                    <span class="d-flex align-items-center"><span class="span-counter"><?php if( $count<=9 ){ echo "0";} echo $count;?></span><?php echo $link_title;?></span>
                                    <img class="d-inline-block arrow-summary" src="<?php echo get_stylesheet_directory_uri(); ?>/assest/arrow-grey.png">
                                </a>
                        <?php $count++; endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
<?php if( have_rows('links_summary') ): ?>
        <button type="button" class="title-list-lg show-md ham-menu-topics-mv">Jump To</button>
        <div uk-dropdown="mode: click" class="show-md menu-topics-mv">
            <div class="list-group list-summary">
                <?php $count = 1; while( have_rows('links_summary') ): the_row();
                    // Get sub field values.
                    $linksummary = get_sub_field('link_section_summary');
                    $link_url = $linksummary['url'];
                    $link_title = $linksummary['title'];
                    $link_target = $linksummary['target'] ? $cta['target'] : '_self';
                    ?>
                    <div class="w-100 h-100 box-list-group">
                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                        <span class="d-flex align-items-center"><span class="span-counter"><?php if( $count<=9 ){ echo "0";} echo $count;?></span><?php echo $link_title;?></span>
                        <img class="d-inline-block arrow-summary" src="<?php echo get_stylesheet_directory_uri(); ?>/assest/arrow-grey-two.png">
                    </a>
                    </div>
                    <?php $count++; endwhile; ?>
            </div>
        </div>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php if( have_rows('section_who_about') ): ?>
<?php while( have_rows('section_who_about') ): the_row();
// Get sub field values.
$title = get_sub_field('title_sectio_who_about');
$text = get_sub_field('text_section_who_about');
$image1 = get_sub_field('image_1_section_who');
$image2 = get_sub_field('image_2_section_who');
?>
        <div class="section-whowe-are" id="who-we-are">
            <div class="container-fluid pr-0 pl-0">
                <div class="row equal mr-0 ml-0">
                <?php if( !empty($image1) ): ?>
                    <div class="col-md-6 pr-0 pl-0">
                     <img class="img-fluid fit-cover h-100 w-100" src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" />
                    </div>
                <?php endif; ?>
                    <div class="col-md-4 pr-0 pl-0 bg-yellow">
                        <div class="box-info-who w-100 h-100 d-flex justify-content-center align-items-start flex-column">
                            <?php if( $title ): ?>
                                <h2 class="title-section text-uppercase cl-dark pb-4 m-0"><?php echo $title;?></h2>
                            <?php endif; ?>
                            <?php if( $text ): ?>
                                <div class="copy-text cl-dark pt-2"><?php echo $text;?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if( !empty($image2) ): ?>
                    <div class="col-md-2 pr-0 pl-0 hide-md">
                        <img class="img-fluid fit-cover h-100 w-100" src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" />
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php if( have_rows('section_our_commitments') ): ?>
<?php while( have_rows('section_our_commitments') ): the_row();
// Get sub field values.
$title = get_sub_field('title_our_commitments');
$subtitle = get_sub_field('subtitle_our_commitments');
$text = get_sub_field('text_our_commitments');
?>
        <div class="section-inner-content section-p60" id="our-commitments">
            <div class="container">
                <div class="row row-inner m-auto">
                    <div class="col-md-12">
                        <?php if( $title ): ?>
                            <h2 class="title-section text-uppercase cl-light-blue"><?php echo $title;?></h2>
                        <?php endif; ?>
                        <?php if( $subtitle ): ?>
                            <h3 class="subtitle-section-2 cl-dark-2 mb-4"><?php echo $subtitle;?></h3>
                        <?php endif; ?>
                        <?php if( $text ): ?>
                            <div class="copy-text-bold span-yellow cl-dark"><?php echo $text;?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if( have_rows('list_our_commitments') ): ?>
                      <?php while( have_rows('list_our_commitments') ): the_row();
                       // Get sub field values.
                       $icon = get_sub_field('icon_list_commitments');
                       $title = get_sub_field('title_list_commitments');
                       $subtitle = get_sub_field('subtitle_list_commitments');
                       ?>
                        <div class="row row-inner row-list-commitments m-auto equal justify-content-center align-items-md-center">
                          <?php if( !empty($icon) ): ?>
                              <div class="col-3 col-sm-2">
                                  <img class="img-fluid m-auto w-100" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                              </div>
                          <?php endif; ?>
                          <div class="col-9 col-sm-10">
                              <?php if( $title ): ?>
                                  <h2 class="title-section cl-light-gray-2 mb-4 mb-md-2"><?php echo $title;?></h2>
                              <?php endif; ?>
                              <?php if( $subtitle ): ?>
                                  <div class="copy-text cl-dark pt-2"><?php echo $subtitle;?></div>
                              <?php endif; ?>
                          </div>
                        </div>
                      <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php if( have_rows('section_partners_about') ): ?>

        <div class="section-inner-content section-our-partners section-p60 bg-light-blue" id="our-partners">
            <div class="container">
                <?php while( have_rows('section_partners_about') ): the_row();
// Get sub field values.
                    $title = get_sub_field('title_section_partners_ab');
                    ?>
                    <div class="row row-inner m-auto">
                        <div class="col-md-12">
                            <?php if( $title ): ?>
                                <h2 class="title-section text-uppercase cl-green text-center pb-md-4"><?php echo $title;?></h2>
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
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'partners_cat',
                            'field' => 'slug',
                            'terms' => 'funders'
                        )
                    )
                );
                $partners = new WP_Query($query);?>
                <?php if ( $partners->have_posts() ) : ?>
                    <div class="row row-info m-auto">

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
                <?php while( have_rows('section_partners_about') ): the_row();

                $cta = get_sub_field('cta_section_partners_ab');
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

<?php if( have_rows('section_opportunity') ): ?>
    <?php while( have_rows('section_opportunity') ): the_row();
        // Get sub field values.
        $title = get_sub_field('title_section_opportunity');
        $image = get_sub_field('image_section_opportunity');
        ?>
        <div class="section-inner-content section-p60" id="the-opportunity">
            <div class="container">
                <div class="row row-info m-auto">
                    <div class="col-md-12">
                        <?php if( $title ): ?>
                            <h2 class="title-section pb-2 text-uppercase cl-light-blue text-center"><?php echo $title;?></h2>
                        <?php endif; ?>
                        <?php if( !empty($image) ): ?>
                                <img class="img-fluid mb-5 pb-2" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                </div>
                <?php if( have_rows('list_opportunity') ): ?>
                <div class="row equal row-inner m-auto">
                    <?php while( have_rows('list_opportunity') ): the_row();
                    // Get sub field values.
                        $subtitle = get_sub_field('title_opportunity');
                        $text = get_sub_field('text_opportunity');
                    ?>
                        <div class="col-md-12 mb-4">
                        <?php if( $subtitle ): ?>
                            <h3 class="subtitle-section cl-light-gray-2"><?php echo $subtitle;?></h3>
                        <?php endif; ?>
                            <?php if( $text ): ?>
                                <div class="copy-text cl-dark"><?php echo $text;?></div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php if( have_rows('section_our_goal') ): ?>
    <?php while( have_rows('section_our_goal') ): the_row();
// Get sub field values.
        $title = get_sub_field('title_our_goal');
        $subtitle = get_sub_field('subtitle_our_goal');
        $text = get_sub_field('text_our_goal');
        ?>

        <div class="section-inner-content bg-light-gray-3 section-p60" id="our-goal">
            <div class="container">
                <div class="row row-inner m-auto pb-4">
                    <div class="col-md-12 mb-4 pb-2">
                        <?php if( $title ): ?>
                            <h2 class="title-section text-uppercase cl-gray"><?php echo $title;?></h2>
                        <?php endif; ?>
                        <?php if( $subtitle ): ?>
                            <h3 class="subtitle-section-2 cl-gray mb-4"><?php echo $subtitle;?></h3>
                        <?php endif; ?>
                        <?php if( $text ): ?>
                            <div class="copy-text-bold span-gray cl-gray"><?php echo $text;?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if( have_rows('list_our_goal') ): ?>
                    <div class="row row-inner m-auto equal pt-4">
                        <?php while( have_rows('list_our_goal') ): the_row();
                            // Get sub field values.
                            $title = get_sub_field('title_list_our_goal');
                            $text = get_sub_field('text_list_our_goal');
                            ?>
                            <div class="col-md-6 mb-4 pb-4 col-goal">
                                <?php if( $title ): ?>
                                    <h2 class="title-section title-section-goal cl-gray mb-4"><?php echo $title;?></h2>
                                <?php endif; ?>
                                <?php if( $text ): ?>
                                    <div class="copy-text sm-text cl-gray pt-2"><?php echo $text;?></div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php
$gallery = get_field('section_gallery_about');
if( $gallery ): ?>
    <div class="section-inner-content section-gallery section-gallery-about">
        <div class="container-fluid pl-0 pr-0">
            <div class="row row-gallery-media mr-0 ml-0">
                <?php foreach( $gallery as $image  ): ?>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-gallery item-gallery-about">
                        <img class="img-fluid fit-cover-center h-100 w-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
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

<?php if( have_rows('section_grantmaking_strategy') ): ?>
    <?php while( have_rows('section_grantmaking_strategy') ): the_row();
// Get sub field values.
        $title = get_sub_field('title_grantmaking_strategy');
        $subtitle = get_sub_field('subtitle_grantmaking_strategy');
        ?>
        <div class="section-inner-content section-p60" id="grantmaking-strategy">
            <div class="container">
                <div class="row row-inner m-auto">
                    <div class="col-md-12">
                        <?php if( $title ): ?>
                            <h2 class="title-section text-uppercase cl-light-blue"><?php echo $title;?></h2>
                        <?php endif; ?>
                        <?php if( $subtitle ): ?>
                            <h3 class="subtitle-section-2 cl-dark-2 mb-4"><?php echo $subtitle;?></h3>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if( have_rows('list_grantmaking_strategy') ): ?>
                    <?php while( have_rows('list_grantmaking_strategy') ): the_row();
                        // Get sub field values.
                        $icon = get_sub_field('icon_grantmaking_strategy');
                        $title = get_sub_field('title_grantmaking_strategy');
                        $subtitle = get_sub_field('text_grantmaking_strategy');
                        ?>
                        <div class="row row-inner row-list-commitments m-auto equal justify-content-center align-items-center">
                            <div class="col-12">
                                <?php if( !empty($icon) ): ?>
                                        <img class="img-fluid m-auto" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                                <?php endif; ?>
                                <?php if( $title ): ?>
                                    <h2 class="title-section cl-light-gray-2 mb-2"><?php echo $title;?></h2>
                                <?php endif; ?>
                                <?php if( $subtitle ): ?>
                                    <div class="copy-text cl-dark pt-2"><?php echo $subtitle;?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
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
