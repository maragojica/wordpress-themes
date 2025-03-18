<?php
/**
 * Displays the content when the home template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<?php if( have_rows('banner_home') ): ?>
    <?php while( have_rows('banner_home') ): the_row();

        // Get sub field values.
        $image = get_sub_field('image_banner_home');
        $title1 = get_sub_field('title_banner_home1');
        $title2 = get_sub_field('title_banner_home2');
        $title3 = get_sub_field('title_banner_home3');
        $videolink = get_sub_field('video_link_text');
        $videoid = get_sub_field('video_id_banner');
        ?>
        <section class="section-banner-homevideo section-banner d-flex align-items-center">
          <video type="video/mp4" loop muted>
              <source src="https://lastchancealliance.org/wp-content/themes/lastchancealliance-child/assest/videos/GP0STUN5Y_High_Res.mp4" autoplay>
              Your browser does not support the video tag.
            </video>
            <div class="overlay">
            <div class="container d-flex justify-content-center flex-column">
                <div class="row justify-content-center align-items-center row-banner-home w-100">
                    <div class="col-md-7 col-lg-8">
                        <?php if( $title1 ): ?>
                            <h1 class="headline-banner headline-home-banner"> <?php if( $title1 ): ?><span><?php echo $title1;?></span><?php endif; ?><?php if( $title2 ): ?><span><?php echo $title2;?></span><?php endif; ?><?php if( $title3 ): ?><span><?php echo $title3;?></span><?php endif; ?></h1>
                        <?php endif; ?>
                    </div>
                    <div class="col-md col-lg align-self-end">
                        
                        <link href='https://actionnetwork.org/css/style-embed-v3.css' rel='stylesheet' type='text/css' />
                        <link href='https://lastchancealliance.org/wp-content/themes/lastchancealliance-child/styleform.css' rel='stylesheet' type='text/css' />
                        <script src='https://actionnetwork.org/widgets/v3/petition/urge-gov-newsom-to-end-fossil-fuel-extration?format=js&source=widget&style=full&css=whitelabel'></script><div id='can-petition-area-urge-gov-newsom-to-end-fossil-fuel-extration' style='width: 100%'><!-- this div is the target for our HTML insertion --></div>

                    </div>

                </div>
                <?php if( $videoid ): ?>
                <div class="row w-100">
                    <div class="col-md-12">
                        <a class="video-link" href="#modal-media-youtube-link" uk-toggle><i class="fab fa-youtube"></i><span><?php echo $videolink;?></span></a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            </div>
        </section>
        <style>
            .section-banner-homevideo {
                background: url(<?php echo esc_url($image['url']); ?>) no-repeat center center/cover;
            }
        </style>
        <?php if( $videoid ): ?>
            <div id="modal-media-youtube-link" class="uk-flex-top" uk-modal>
                <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical">
                    <button class="uk-modal-close-outside" type="button" uk-close></button>
                    <iframe src="https://www.youtube-nocookie.com/embed/<?php echo $videoid;?>" width="1920" height="1080" frameborder="0" uk-video uk-responsive></iframe>
                </div>
            </div>
        <?php endif; ?>

    <?php endwhile; ?>
<?php endif; ?>
<?php if( have_rows('cta_bar_home') ): ?>
    <?php while( have_rows('cta_bar_home') ): the_row();

        // Get sub field values.
        $title = get_sub_field('text_cta_home');
        $cta = get_sub_field('link_cta_home');
        ?>
        <?php  if($cta) {
            $link_url = $cta['url'];
            $link_title = $cta['title'];
            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
            <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
        <div class="section-cta-bar d-flex align-items-center justify-content-center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 d-flex align-items-center justify-content-center">
                        <div class="marquee">
                    <?php if( $title ): ?>

                           <span class="span-marquee"><h3><?php echo $title;?>
                                   <span class="cta-link cl-white cl-white-h mt-2"><?php echo $link_title; ?>
                                      <!--<svg class="d-inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  width="24px" height="34px">
                                           <image  x="0px" y="0px" width="24px" height="34px"  xlink:href="data:img/png;base64,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" />
                                       </svg>-->
                                   </span>

                           </h3></span>
                           </div>
                    <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        <?php } ?>
    <?php endwhile; ?>
<?php endif; ?>

<style>


</style>
<?php if( have_rows('section_about_us_home') ): ?>
<?php while( have_rows('section_about_us_home') ): the_row();

// Get sub field values.
$title = get_sub_field('title_about_home');
$text = get_sub_field('text_about_home');
$cta = get_sub_field('cta_link_about_home');
?>
    <section class="section-who-we-are d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h3 class="headline-section cl-white"><?php echo $title;?></h3>
                <div class="copy-text cl-white mb-5 pb-2 pb-md-5">
                    <?php echo $text;?>
                </div>
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
</section>
    <?php endwhile; ?>
<?php endif; ?>


<section class="section-news bg-light-blue d-flex align-items-center">
    <div class="container">
        <?php if( have_rows('section_news_home') ): ?>
        <?php while( have_rows('section_news_home') ): the_row();

        // Get sub field values.
        $title = get_sub_field('title_news_home');
        $subtitle = get_sub_field('subtitle_news_home');
        ?>
        <div class="row">
            <div class="col-md-12">
                <p class="subtitle-section cl-orange"><?php echo $subtitle;?></p>
                <h3 class="headline-section cl-dark-2 pb-4"><?php echo $title;?></h3>
            </div>
        </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'orderby'=>'post_date',
            'order'=>'desc'
        );
        $wp_query = new WP_Query($args); ?>
        <div class="row pb-5">
            <?php while ($wp_query->have_posts()) : $wp_query->the_post();
                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                $id = get_the_ID();
                $post_categories = get_post_primary_category($id, 'category');
                $primary_category = $post_categories['primary_category'];
                $nameprimary = $primary_category->name;
                $externalink = get_field('external_link_inthenews');
                if ($externalink) {
                    $link_url = $externalink['url'];
                    $link_title = $externalink['title'];
                    $link_target = $externalink['target'] ? $externalink['target'] : '_self'; ?><?php } ?>
            <div class="col-md-4 mb-4">
                <div class="ih-item item-post square effect6 from_top_and_bottom">
                 <?php if ($nameprimary == "In the News") { ?>
                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                 <?php }else{ ?>
                      <a href="<?php the_permalink(); ?>">
                  <?php } ?>
                        <div class="img"><img src="<?php echo $featured_img_url;?>" alt="<?php the_title();?>"></div>
                        <div class="info">
                            <h3 class="title-item-post cl-white"><?php echo get_small_title(70,0);?>
                                <svg class="d-inline-block ml-3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="34px">
                                    <image  x="0px" y="0px" width="24px" height="34px"  xlink:href="data:img/png;base64,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" />
                                </svg>
                            </h3>
                        </div>
                    </a>
                </div>
            </div>
            <?php endwhile;  wp_reset_query(); ?>
        </div>
        <?php if( have_rows('section_news_home') ): ?>
        <?php while( have_rows('section_news_home') ): the_row();

        // Get sub field values.
        $cta = get_sub_field('cta_link_news_home');
        ?>
        <div class="row mt-2 pt-0 pt-md-5">
            <div class="col-md-12">
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
        </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
<?php if( have_rows('section_frontline_stories_home') ): ?>
<?php while( have_rows('section_frontline_stories_home') ): the_row();

        // Get sub field values.
        $title = get_sub_field('title_frontline_home');
        $subtitle = get_sub_field('subtitle_frontline_home');
        $cta = get_sub_field('cta_link_frontline_home');
        ?>
        <section class="section-frontline d-flex align-items-center">
            <div class="container pt-4 pb-4">
                <div class="row">
                    <div class="col-md-10">
                        <p class="subtitle-section cl-orange"><?php echo $subtitle;?></p>
                        <h3 class="headline-section cl-dark-2 pb-4"><?php echo $title;?></h3>
                    </div>
                </div>

                <?php $story = get_sub_field('storie_select_home');
                    if( $story ):
                        // override $post
                        $post = $story;
                        setup_postdata( $post );?>
                            <div class="row align-items-center flex-md-row-reverse">
                                <div class="col-md mb-5 mb-md-0">
                                    <?php if ( has_post_thumbnail() ) { $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                                        <div class="box-testimonial-home round-12 w-100" style="background: url('<?php echo $featured_img_url; ?>')">

                                        </div>
                                    <?php }?>
                                </div>
                                <div class="col-md-5">
                                   <?php if( get_field('testimonial_story') ): ?>
                                    <div class="box-testimonials">
                                        <div class="quotes mb-3 pb-3 pt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="84px" height="32px">
                                                <image  x="0px" y="0px" width="84px" height="32px"  xlink:href="data:img/png;base64,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" />
                                            </svg>
                                        </div>
                                        <div class="testimonial-single-story cl-dark pb-3 mb-3"><?php the_field('testimonial_story'); ?></div>
                                        <p class="name-single-story cl-dark-3 mb-0"><?php the_title();?></p>
                                       <?php if( get_field('place_story') ): ?>
                                        <p class="place-single-story cl-dark-3"><?php the_field('place_story'); ?></p>
                                       <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                </div>
                            </div>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-12 mt-md-0 mt-5">
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
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>

<section class="section-action-events d-flex align-items-center">
    <div class="container pt-4 pb-4">
        <?php if( have_rows('section_featured_action_hub_home') ): ?>
        <?php while( have_rows('section_featured_action_hub_home') ): the_row();

        // Get sub field values.
        $title = get_sub_field('title_section_hubhome');
        $subtitle = get_sub_field('subtitle_section_hubhome');
        $image = get_sub_field('image_hubhome');
        $titlehub = get_sub_field('title_hubsingle');
        $texthub = get_sub_field('text_hubsingle');
        $cta = get_sub_field('cta_link_actionhub_home');
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
        <div class="row row-events align-items-center" style="display: none;">
            <div class="col-md-4 col-lg-3 mb-5 mb-md-0">
                <?php if( get_field('title_events_home') ): ?>
                <h3 class="headline-section cl-white"><?php echo the_field('title_events_home'); ?></h3>
                <?php endif; ?>
                <?php $cta = get_field('cta_events_home');  if($cta) {
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
                    <?php echo do_shortcode('[custom-twitter-feeds num=3]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if( have_rows('section_caoilproblem') ): ?>
    <?php while( have_rows('section_caoilproblem') ): the_row();

        // Get sub field values.
        $title = get_sub_field('title_caoil_home');
        $subtitle = get_sub_field('subtitle_caoil_home');
        $cta = get_sub_field('ctalink_casoil_section');
        ?>
        <section class="section-caoil bg-light-blue1 d-flex align-items-center">
            <div class="container pt-4 pb-4">
                <div class="row">
                    <div class="col-md-12">
                        <p class="subtitle-section cl-white"><?php echo $subtitle;?></p>
                        <h3 class="headline-section cl-white pb-4"><?php echo $title;?></h3>
                    </div>
                </div>
                <?php if( have_rows('topics_home') ): ?>
                <div class="row equal">
                    <?php while( have_rows('topics_home') ) : the_row();
                        $titletopic = get_sub_field('topic_title_home');
                        $text = get_sub_field('topic_text_title');
                        $ctatopic = get_sub_field('cta_topic_home');?>
                        <div class="col-md-6 col-topic">
                            <div class="box-topic">
                                <h4 class="title-topic cl-light-blue"><?php echo $titletopic;?></h4>
                                <div class="copy-text-regular cl-dark-2"><?php echo $text; ?></div>
                                <?php if($ctatopic) {
                                    $link_url = $ctatopic['url'];
                                    $link_title = $ctatopic['title'];
                                    $link_target = $ctatopic['target'] ? $ctatopic['target'] : '_self'; ?>
                                    <a class="cta-link cl-dark-green cl-dark-greenh mt-2" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?>
                                        <svg class="d-inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="34px">
                                            <image  x="0px" y="0px" width="24px" height="34px"  xlink:href="data:img/png;base64,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" />
                                        </svg>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <div class="col-md-6 col-topic">
                        <div class="box-topic">
                            <?php if($cta) {
                                $link_url = $cta['url'];
                                $link_title = $cta['title'];
                                $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                                <a class="mt-2" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><h4 class="title-topic cl-light-blue"><?php echo $link_title; ?>
                                    <svg class="d-inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="34px">
                                        <image  x="0px" y="0px" width="24px" height="34px"  xlink:href="data:img/png;base64,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" />
                                    </svg>
                                    </h4>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>