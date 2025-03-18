<?php
/**
 * Displays the content when the action hub template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<?php if( have_rows('banner_actionhub') ): ?>
    <?php while( have_rows('banner_actionhub') ): the_row();

        // Get sub field values.
        $image = get_sub_field('image_banner_actionhub');
        $title1 = get_sub_field('title_banner_actionhub1');
        $title2 = get_sub_field('title_banner_actionhub2');
        $title3 = get_sub_field('title_banner_actionhub3');
        ?>
        <section class="section-banner-home section-banner d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <?php if( $title1 ): ?>
                            <h1 class="headline-banner"> <?php if( $title1 ): ?><span><?php echo $title1;?></span><?php endif; ?><?php if( $title2 ): ?><span><?php echo $title2;?></span><?php endif; ?><?php if( $title3 ): ?><span><?php echo $title3;?></span><?php endif; ?></h1>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <style>
            .section-banner-home{
                background: rgb(15,6,13);
                background: linear-gradient(180deg, rgba(15, 6, 13, 0.84) 0%, rgba(15,6,13, 0.3) 94%), url(<?php echo esc_url($image['url']); ?>);
            }
        </style>
    <?php endwhile; ?>
<?php endif; ?>
<?php if( have_rows('cta_bar_actionhub') ): ?>
    <?php while( have_rows('cta_bar_actionhub') ): the_row();

        // Get sub field values.
        $title = get_sub_field('title_cta_actionhub');
        $text = get_sub_field('text_cta_actionhub');
        $cta = get_sub_field('link_cta_actionhub');
        ?>
        <div class="section-cta-bar d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex align-items-center justify-content-center">
                        <div class="row align-items-center">
                            <div class="col-sm-4 col-md-3 col-lg-2 pt-4 pb-4 pb-sm-0 pt-sm-0 text-sm-left text-center">
                                <?php if( $title ): ?>
                                    <span class="title-cta-actionhub"><?php echo $title;?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm col-md col-lg pb-4 pb-sm-0 text-sm-left text-center">
                                <?php if( $text ): ?>
                                    <span class="text-cta-actionhub"><?php echo $text;?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4 hide-lg">
                                <?php  if($cta) {
                                    $link_url = $cta['url'];
                                    $link_title = $cta['title'];
                                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                                    <a class="cta-link cl-white cl-white-h mt-2" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?>
                                        <svg class="d-inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  width="24px" height="34px">
                                            <image  x="0px" y="0px" width="24px" height="34px"  xlink:href="data:img/png;base64,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" />
                                        </svg>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
<?php if( have_rows('section_featured_info_hub') ): ?>
    <?php while( have_rows('section_featured_info_hub') ): the_row();
    // Get sub field values.
    $title = get_sub_field('title_infobox');
    $text = get_sub_field('text_infobox');?>
     <section class="section-featured-info bg-dark">
         <div class="container">
             <div class="row">
                 <div class="col-md-12">
                    <div class="featured-info bg-dark-2">
                        <?php if( $title ): ?>
                            <h3 class="headline-section cl-white pb-0 pb-md-4"><?php echo $title;?></h3>
                        <?php endif; ?>
                        <?php if( $text ): ?>
                            <div class="copy-text cl-white"><?php echo $text;?></div>
                        <?php endif; ?>
                    </div>
                 </div>
             </div>
         </div>
     </section>
    <?php endwhile; ?>
<?php endif; ?>
<section class="section-action-events d-flex align-items-center">
    <div class="container pt-4 pb-4">
        <?php if( have_rows('section_featured_action_hub') ): ?>
        <?php while( have_rows('section_featured_action_hub') ): the_row();

        // Get sub field values.
        $title = get_sub_field('title_section_featuredactionhub');
        $subtitle = get_sub_field('subtitle_section_featuredactionhub');
        $image = get_sub_field('image_featuredhub');
        $titlehub = get_sub_field('title_featuredhubsingle');
        $texthub = get_sub_field('text_featuredhubsingle');
        $cta = get_sub_field('cta_link_featuredactionhub');
        ?>
        <div class="row">
            <div class="col-md-7">
                <p class="subtitle-section cl-orange"><?php echo $subtitle;?></p>
                <h3 class="headline-section cl-white pb-4"><?php echo $title;?></h3>
                <img class="img-hub round-12" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'];?>">
                <h4 class="title-hub cl-white mt-4 mb-4"><?php echo $titlehub;?></h4>
                <div class="copy-text-regular cl-white mb-5">
                    <?php echo $texthub;?>
                </div>
                <?php  if($cta) {
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                    <a class="cta-link cl-dark-green cl-dark-greenh mt-2" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?>
                        <svg class="d-inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="34px">
                            <image  x="0px" y="0px" width="24px" height="34px"  xlink:href="data:img/png;base64,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" />
                        </svg>
                    </a>
                <?php } ?>
            </div>
            <div class="col-md col-twitter-feed">
                <div class="box-twitter-feed bg-white round-12">
                    <!--<p class="title-feed-tw cl-dark">Twitter feed</p>-->
                    <div class="feed-tw">
                        <?php echo do_shortcode('[custom-twitter-feeds num=4]'); ?>
                    </div>
                </div>
            </div>
        </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php if( have_rows('action_hub_repeater') ): ?>

        <div class="actions-carousel owl-carousel">
            <?php while( have_rows('action_hub_repeater') ): the_row();
                // Get sub field values.
                $title = get_sub_field('title_actionpost');
                $image = get_sub_field('image_actionpost');
                $text = get_sub_field('text_actionpost');
                $cta = get_sub_field('cta_link_actionpost');
                ?>
                <div class="item animated fadeIn">
                    <div class="uk-card uk-card-default round-12">
                        <div class="uk-card-media-top">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                        </div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title"><?php echo $title;?></h3>
                            <div class="card-text"><?php echo $text;?></div>
                            <?php  if($cta) {
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
            <?php endwhile; ?>
        </div>

        <?php endif; ?>
        <div class="row row-events align-items-center" style="display: none;">
            <div class="col-md-4 col-lg-3 mb-5 mb-md-0">
                <?php if( get_field('title_events_actionhub') ): ?>
                <h3 class="headline-section cl-white"><?php echo the_field('title_events_actionhub'); ?></h3>
                <?php endif; ?>
                <?php $cta = get_field('cta_events_actionhub');  if($cta) {
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                    <a class="cta-link cl-dark-green cl-dark-greenh mt-2" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?>
                        <svg class="d-inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="34px">
                            <image  x="0px" y="0px" width="24px" height="34px"  xlink:href="data:img/png;base64,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" />
                        </svg>
                    </a>
                <?php } ?>
            </div>
            <?php
            $query = array(
                'post_type' => 'events',
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'desc',
                'posts_per_page' => 4
            );
            $events = new WP_Query($query);?>
            <?php if ( $events->have_posts() ) : ?>
            <div class="col-md-8 col-lg-9">
                <div class="events-carousel owl-carousel">
                    <?php while($events->have_posts()) : $events->the_post();?>
                    <div class="item animated fadeIn">
                       <div class="event-item round-12 d-flex justify-content-between flex-column">
                           <div class="event-posted-on"><span class="sp-month cl-yellow"><?php the_time('M') ?></span><span class="sp-day cl-yellow"><?php the_time('j') ?></span></div>
                           <p class="entry-title cl-white pt-3"><?php the_title();?></p>
                           <div class="copy-text-regular cl-white"><?php the_excerpt(); ?></div>
                           <?php if( get_field('location_event') ): ?>
                               <p class="text-position cl-light-gray"><?php the_field('location_event'); ?></p>
                           <?php endif; ?>
                           <?php $cta = get_field('cta_link_event');  if($cta) {
                               $link_url = $cta['url'];
                               $link_title = $cta['title'];
                               $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                               <a class="cta-btn" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?>
                               </a>
                           <?php } ?>
                       </div>
                     </div>
                    <?php endwhile; wp_reset_postdata();?>
                 </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<section class="section-tw-mobile bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--<p class="title-feed-tw cl-dark">Twitter feed</p>-->
                <div class="feed-tw">
                    <?php echo do_shortcode('[custom-twitter-feeds num=4]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>