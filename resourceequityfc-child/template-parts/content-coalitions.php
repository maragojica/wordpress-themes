<?php
/**
 * Displays the content when the coalitions template is used.
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

<?php if( have_rows('list_coalitions') ): ?>
<?php
// Get sub field values.
$title = get_field('title_section_coalitions');
$subtitle = get_field('subtitle_section_coalitions');

?>
<div class="section-inner-content section-p60" id="our-coalitions">
        <div class="container">
            <?php if( $title || $subtitle): ?>
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
            <?php endif; ?>
            <?php if( have_rows('list_coalitions') ): ?>
            <div class="row row-coalitions equal mt-5">
                  <?php $i = 1; while( have_rows('list_coalitions') ): the_row();
                   // Get sub field values.
                   $state = get_sub_field('state_list_coalitions');
                   $icon = get_sub_field('image_list_coalitions');
                   $headline = get_sub_field('headline_list_coalitions');
                    $subheadline = get_sub_field('subheadline_list_coalitions');
                    $text = get_sub_field('text_list_coalitions');
                   ?>
                    <div class="col-md-6 col-lg-3 mb-4">
                            <div class="card w-100 h-100">
                                <?php if( !empty($icon) ): ?>
                                    <div class="box-image-card">
                                        <img class="card-img-top img-fluid m-auto w-100 h-100" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                                    </div>
                                <?php endif; ?>
                                <div class="card-body d-flex flex-column p-3">
                                    <?php if( $state ): ?>
                                    <h6 class="text-uppercase cl-red mr-0 ml-0 mt-4 mb-4"><?php echo $state;?></h6>
                                    <?php endif; ?>
                                    <?php if( $headline ): ?>
                                    <h5 class="card-title cl-dark mt-0 mb-3"><?php echo $headline;?></h5>
                                    <?php endif; ?>
                                    <?php if( $subheadline ): ?>
                                    <div class="card-text text-preview cl-dark mb-3"><?php echo $subheadline;?></div>
                                    <?php endif; ?>
                                    <a href="#modal-coalitions-<?php echo $i;?>" uk-toggle class="link-more cl-blue-lt cl-black-h">Read more <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                            <div class="content-modal-coalitions" id="modal-coalitions-<?php echo $i;?>" uk-modal>
                                <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                                    <button class="uk-modal-close-default" type="button" uk-close></button>
                                    <div class="card card-person border-0">
                                        <?php if( !empty($icon) ): ?>
                                            <div class="box-image-card">
                                                <img class="img-fluid m-auto" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" width="320"/>
                                            </div>
                                        <?php endif; ?>
                                        <?php if( $text ): ?>
                                            <div class="card-text cl-dark"><?php echo $text;?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                  <?php $i++; endwhile; ?>
            </div>
            <?php endif; ?>
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
