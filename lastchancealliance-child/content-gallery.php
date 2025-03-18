<?php
/**
 * Displays the content when the gallery template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<section class="banner-inner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <?php if( get_field('title_headlines_inner') ): ?>
                    <h3 class="headline-section cl-dark"><?php echo the_field('title_headlines_inner'); ?></h3>
                <?php endif; ?>
                <?php if( get_field('text_headlines_inner') ): ?>
                    <div class="copy-text cl-dark mb-5 pb-2 pb-md-5">
                        <?php echo the_field('text_headlines_inner'); ?>
                    </div>
                <?php endif; ?>
                <?php $cta = get_field('cta_link_headlines_inner');
                if($cta) {
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                    <div>
                        <a class="cta-link cl-dark-green cl-dark-greenh mt-2" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?>
                            <svg class="d-inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="34px">
                                <image  x="0px" y="0px" width="24px" height="34px"  xlink:href="data:img/png;base64,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" />
                            </svg>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<section class="info-inner-page">
    <div class="container">
        <?php if ( has_post_thumbnail() ) {
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
            $alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>
            <div class="row row-featured-image">
                <img class="m-auto" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
            </div>
        <?php } ?>
        <?php if( have_rows('photo_gallery_media') ): ?>
        <div class="row row-gallery-media mb-md-5">
            <?php while( have_rows('photo_gallery_media') ) : the_row();
                $image = get_sub_field('image_media');
                $event = get_sub_field('event_media');
                $location = get_sub_field('location_media');
                $date = get_sub_field('date_media');
                $credit = get_sub_field('credit_media');?>
                <div class="col-12 col-sm-6 col-lg-4 col-gallery">
                    <!-- normal -->
                    <div class="ih-item square effect3 bottom_to_top m-auto">
                        <a href="<?php echo $image['url']; ?>" download>
                            <div class="img"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></div>
                            <div class="info d-flex align-items-end">
                               <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row w-100 h-auto pb-3 pt-2">
                                   <p class="mb-0"><?php echo $event;?>  |  <?php echo $location;?>  |  <?php echo $date;?>  |  <?php echo $credit;?></p>
                                   <div style="width: 50px"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="23px" height="23px">
                                       <image  x="0px" y="0px" width="23px" height="23px"  xlink:href="data:img/png;base64,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" />
                                   </svg></div>
                               </div>
                            </div>
                        </a>
                    </div>
                    <!-- end normal -->
                </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>