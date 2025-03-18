<?php
/**
 * Displays the content when the home template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
  <?php  $titlebarhome = get_field('text_bar_home');
    $ctabarhome = get_field('cta_bar_home');
  if(get_field('show_text_bar_home')): ?>
    <div class="bar-home bg-angry-red d-flex justify-content-center align-items-center wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php if( $titlebarhome ): ?>
                        <p class="pb-0 mb-0 text-center cl-white"><?php echo $titlebarhome;?>
                             <?php  if($ctabarhome) {
                        $link_url = $ctabarhome['url'];
                        $link_title = $ctabarhome['title'];
                        $link_target = $ctabarhome['target'] ? $cta['target'] : '_self'; ?>
                            <a class="cl-white pl-4" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?>
                                <svg class="icon-arrow-r d-inline" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="30px" viewBox="0 0 24 24" width="40px" fill="#ffffff"><rect fill="none" height="20" width="30"/><path d="M15,5l-1.41,1.41L18.17,11H2V13h16.17l-4.59,4.59L15,19l7-7L15,5z"/></svg>
                            </a>
                        <?php } ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php if( have_rows('banner_home') ): ?>
<?php while( have_rows('banner_home') ): the_row();
    // Get sub field values.
    $title = get_sub_field('title_banner_home');
    $titlemv = get_sub_field('title_mv_banner_home');
    $bannertype = get_sub_field('bg_type_home');
    $image = get_sub_field('image_banner_home');
    $videomp4 = get_sub_field('video_mp4_home');
    $videoogg = get_sub_field('video_ogg_home');
    $videowebm = get_sub_field(' video_webm_home');
    ?>
<section class="bg-light-blue p-0 position-relative wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
    <div class="hero-home position-relative">
        <?php if( $bannertype['value'] == "video" ): ?>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
           <?php if( $videomp4 ): ?>
            <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
           <?php endif; ?>
            <?php if( $videoogg ): ?>
            <source src="<?php echo $videoogg['url']; ?>" type="video/ogg">
            <?php endif; ?>
            <?php if( $videowebm ): ?>
            <source src="<?php echo $videowebm['url']; ?>" type="video/webm">
            <?php endif; ?>
            Your browser does not support the video tag.
        </video>
        <?php endif; ?>
        <div class="overlay d-flex justify-content-center align-items-center">
            <div class="container">
                <?php if( $title ): ?>
                <h1 class="headline cl-white"><span class="text-left hide-sm"><?php echo $title;?></span><?php if( $titlemv ): ?><span class="text-center show-sm"><?php echo $titlemv;?></span><?php endif; ?></h1>
                <?php endif; ?>               
            </div>
        </div>
    </div>
   <!-- <svg class="star-left-lg-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="106px" height="106px">
        <image  x="0px" y="0px" width="106px" height="106px"  xlink:href="data:img/png;base64,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" />
    </svg>
    <svg class="star-right-lg-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="106px" height="106px">
        <image  x="0px" y="0px" width="106px" height="106px"  xlink:href="data:img/png;base64,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" />
    </svg>-->
</section>
<?php if( $bannertype['value'] == "image" ): ?>
<style>
    .hero-home{
        background-image: url("<?php echo $image['url'];?>");
    }
</style>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

<?php
$image = get_field('image_who_we_are');
$title = get_field('title_who_we_are');
$text = get_field('text_who_we_are');
$cta = get_field('cta_who_we_are');
$ship_who_we_are = get_field('ship_who_we_are'); ?>
<section class="section-who-we-are bg-ultra-violet wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
    <div class="container-fluid pr-0 pl-0">
        <div class="row row-two-column equal mr-0 ml-0">
            <div class="col-lg h-100 pr-0 pl-0">
                <?php if( $title ): ?>
                    <h2 class="headline-section cl-white pb-0 text-center hide-deks"><?php echo $title;?></h2>
                    <img class="squiggle-blue m-auto-25 hide-deks" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/border-squiggle-blue.png" border="0" width="744" height="400">
                <?php endif; ?>
                <div class="h-100 w-100 mt-lg-0 mb-lg-0 mt-5 mb-5">
                    <?php if( !empty($image) ): ?>
                        <img class="img-fluid w-100 h-100 fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg h-100">
                <div class="box-image-two-column w-100 h-100 d-flex flex-column justify-content-between">
                    <div class="header-two-column">
                        <?php if( $title ): ?>
                            <h2 class="headline-section cl-white pb-0 show-deks"><?php echo $title;?></h2>
                            <img class="squiggle-blue show-deks" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/border-squiggle-blue.png" border="0">
                        <?php endif; ?>
                        <?php if( $text ): ?>
                            <div class="copy-text-lg cl-white"><?php echo $text;?></div>
                        <?php endif; ?>
                    </div>
                    <?php  if($cta) {
                        $link_url = $cta['url'];
                        $link_title = $cta['title'];
                        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                        <div class="cta-link bg-transparent border-planet-green bg-planet-green-h cl-white cl-black-h d-flex position-relative m-auto m-lg-0 pr-4 pl-4">
                            <img class="top-cta" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sparkle-green.png" width="30px" height="30px">
                            <a class="w-100 h-100 cl-white cl-black-h" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?></a>
                            <img class="bottom-cta" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sparkle-green.png" width="30px" height="30px">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container position-relative">
        <?php if( !empty($ship_who_we_are) ): ?>
            <img class="ship-section ship-whoweare" src="<?php echo esc_url($ship_who_we_are['url']); ?>" alt="<?php echo esc_attr($ship_who_we_are['alt']); ?>" />
        <?php endif; ?>
    </div>
</section>
<?php $title = get_field('title_targets');
$text = get_field('text_targets');
$bannertype = get_field('bg_type_section_targets');
$image = get_field('bg_section_targets');
$videomp4 = get_field('video_mp4_targets');
$videoogg = get_field('video_ogg_targets');
$videowebm = get_field('video_webm_targets');
$imagetarget = get_field('image_section_targets');
$imagefulltarget = get_field('image_full_section_targets');
$cta = get_field('cta_targets');
?>
<div class="waves-top wave-ultraviolet position-relative wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s"></div>
<section class="our-targets position-relative pt-0 pb-0 d-flex justify-content-center align-items-center wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
    <?php if( $bannertype['value'] == "videotg" ): ?>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <?php if( $videomp4 ): ?>
                <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
            <?php endif; ?>
            <?php if( $videoogg ): ?>
                <source src="<?php echo $videoogg['url']; ?>" type="video/ogg">
            <?php endif; ?>
            <?php if( $videowebm ): ?>
                <source src="<?php echo $videowebm['url']; ?>" type="video/webm">
            <?php endif; ?>
            Your browser does not support the video tag.
        </video>
    <?php endif; ?>
    <div class="section-inner-video d-flex justify-content-center align-items-center w-100 h-100">
        <div class="container">
            <div class="row justify-content-center pt-md-5">
                <div class="col-md-10 col-lg-9">
                    <?php if( $title ): ?>
                        <h2 class="headline-section cl-stormy-sea text-md-center pb-0"><?php echo $title;?></h2>
                        <img class="squiggle-blue m-auto-md-25" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/border-squiggle-blue.png" border="0">
                    <?php endif; ?>
                    <?php if( $text ): ?>
                        <div class="copy-text text-md-center cl-stormy-sea"><?php echo $text;?></div>
                    <?php endif; ?>

                </div>
            </div>
            <?php if( have_rows('targets_list') ): ?>
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="row equal row-targets pb-5 pt-4">
                        <?php  while( have_rows('targets_list') ) : the_row();
                            $logo = get_sub_field('logo_target');
                            $logolink = get_sub_field('logo_link');
                            $ship = get_sub_field('ship_target');
                            $text = get_sub_field('tooltip_text');
                            $color = get_sub_field('tooltip_color');
                            $position = get_sub_field('ship_position');
                            ?>
                            <div class="col-6">
                                <div class="w-100 h-100 d-flex align-items-center <?php if($position['value'] == "rigth"): echo "justify-content-end"; endif;?>">
                                    <div class="box-logo position-relative">
                                        <?php if( !empty($logo) ): ?>
                                        <?php  if($logolink) {
                                        $link_url = $logolink['url'];
                                        $link_title = $logolink['title'];
                                        $link_target = $logolink['target'] ? $logolink['target'] : '_self'; ?>
                                        <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                                            <img class="img-logo img-fluid m-auto" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                                        </a>
                                        <?php } ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php if( !empty($ship) ): ?>
                                        <div class="box-ship pos-<?php echo esc_attr($position['value']); ?>">
                                            <div class="tooltip-ship">
                                                <img class="img-ship w-100" src="<?php echo esc_url($ship['url']); ?>" alt="<?php echo esc_attr($ship['alt']); ?>" />
                                                <?php if( $text ): ?>
                                                <span class="tooltiptext <?php echo esc_attr($color['value']); ?>"><?php echo $text;?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if( !empty($imagefulltarget) ): ?>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="container-info-target position-relative">
                        <img class="img-full-target img-fluid m-auto" src="<?php echo esc_url($imagefulltarget['url']); ?>" alt="<?php echo esc_attr($imagefulltarget['alt']); ?>" />
                        <?php if( have_rows('targets_containers') ): ?>
                            <div class="box-containers">
                                <div class="row mr-0 ml-0">
                                    <?php  while( have_rows('targets_containers') ) : the_row();
                                        $target = get_sub_field('container_target');
                                        $target_link = get_sub_field('target_link');
                                        $text = get_sub_field('target_text');
                                        $bgcolor = get_sub_field('target_bg_color');
                                        ?>
                                        <div class="col-sm-6 col-12 pr-0 pl-0">
                                            <?php  if($target_link) {
                                                $link_url = $target_link['url'];
                                                $link_title = $target_link['title'];
                                                $link_target = $target_link['target'] ? $target_link['target'] : '_self'; ?>
                                                <a class="link-target" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title;?>">
                                                    <div class="target-containers position-relative w-100 h-100">
                                                        <?php if( !empty($target) ): ?>
                                                            <img class="img-target img-fluid m-auto w-100 h-100 fit-cover-center" src="<?php echo esc_url($target['url']); ?>" alt="<?php echo esc_attr($target['alt']); ?>" />
                                                        <?php endif; ?>
                                                        <?php if($text): ?>
                                                            <div class="overlay overlay-target d-flex justify-content-center align-items-center text-center" <?php if($bgcolor):?> style="background-color: <?php echo $bgcolor;?>" <?php endif;?>><?php echo $text;?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9 pt-5 pb-md-5">
                    <?php  if($cta) {
                        $link_url = $cta['url'];
                        $link_title = $cta['title'];
                        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                        <div class="cta-link bg-ultra-violet bg-transparent-h cl-white cl-stormy-sea-h border-ultra-violet-h d-flex position-relative m-auto">
                            <svg class="top-cta" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px">
                                <image  x="0px" y="0px" width="30px" height="30px"  xlink:href="data:img/png;base64,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" />
                            </svg>
                            <a class="w-100 h-100 cl-white cl-stormy-sea-h" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?></a>
                            <svg class="bottom-cta" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px">
                                <image  x="0px" y="0px" width="30px" height="30px"  xlink:href="data:img/png;base64,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" />
                            </svg>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    <?php if( $bannertype['value'] == "imagetg" ): ?>
    <?php if( !empty($image) ): ?>
    .our-targets{
        background: rgba(255, 255, 255, 0.53);
       /* background-image: linear-gradient(180deg, rgba(56, 37, 231, 0.85) 0%, rgba(56, 37, 231, 0.85) 100%), url(<?php echo $image['url']; ?>) !important;*/
        background-image: url(<?php echo $image['url']; ?>) !important;
    }
    <?php endif; ?>
    <?php endif; ?>
    <?php if( $bannertype['value'] == "videotg" ): ?>
    .our-targets .section-inner-video{
        background-image: linear-gradient(180deg, rgba(56, 37, 231, 0.85) 0%, rgba(56, 37, 231, 0.85) 100%) !important;
    }
    <?php endif; ?>
    <?php if( !empty($imagetarget) ): ?>
    .row-targets{
        background-image: url("<?php echo $imagetarget['url']; ?>");
    }
    <?php endif; ?>
</style>

<?php $title = get_field('title_updates_home');
$text = get_field('subtitle_updates_home');
$cta = get_field('cta_updates_home');
$bannertype = get_field('bg_type_section_updates');
$image = get_field('bg_section_updates');
$videomp4 = get_field('video_mp4_updates');
$videoogg = get_field('video_ogg_updates');
$videowebm = get_field('video_webm_updates');
$ship_updates = get_field('ship_updates');?>

<section class="section-updates pt-0 pb-0 position-relative wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
    <?php if( $bannertype['value'] == "videoup" ): ?>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <?php if( $videomp4 ): ?>
                <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
            <?php endif; ?>
            <?php if( $videoogg ): ?>
                <source src="<?php echo $videoogg['url']; ?>" type="video/ogg">
            <?php endif; ?>
            <?php if( $videowebm ): ?>
                <source src="<?php echo $videowebm['url']; ?>" type="video/webm">
            <?php endif; ?>
            Your browser does not support the video tag.
        </video>
    <?php endif; ?>
    <div class="section-inner-video d-flex justify-content-center align-items-center w-100 h-100 position-relative z-index-1">
        <div class="container pb-5 position-relative">
            <?php if( !empty($ship_updates) ): ?>
                <img class="ship-section ship-updates" src="<?php echo esc_url($ship_updates['url']); ?>" alt="<?php echo esc_attr($ship_updates['alt']); ?>" />
            <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <?php if( $title ): ?>
                        <h2 class="headline-section cl-white text-md-center pb-0"><?php echo $title;?></h2>
                        <img class="squiggle-blue m-auto-md-25" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/border-squiggle-blue.png" border="0" >
                    <?php endif; ?>
                    <?php if( $text ): ?>
                        <div class="copy-description text-md-center cl-white"><?php echo $text;?></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if( have_rows('list_updates_home') ): ?>
                <div class="row">
                   <div class="col-md-12">
                       <div class="updates-home-carousel owl-carousel">
                           <?php  while( have_rows('list_updates_home') ) : the_row();
                               $image = get_sub_field('image_list_updates_home');
                               $captions = get_sub_field('captions_list_updates_home'); ?>
                               <div class="item animated fadeIn">
                                   <div class="pt-5 pb-5">
                                       <?php if( !empty($image) ): ?>
                                           <img class="img-full-updates img-fluid m-auto" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                       <?php endif; ?>
                                   </div>
                                   <?php if($captions): ?>
                                       <div class="pt-5 pb-5">
                                           <div class="copy-updates cl-white position-relative text-center"><?php echo $captions;?></div>
                                       </div>
                                   <?php endif; ?>
                               </div>

                           <?php endwhile; ?>
                       </div>
                   </div>
                </div>
            <?php endif; ?>

            <div class="row justify-content-center pb-5">
                <div class="col-md-10 col-lg-9">
                    <?php  if($cta) {
                        $link_url = $cta['url'];
                        $link_title = $cta['title'];
                        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                        <div class="cta-link bg-transparent border-planet-green bg-planet-green-h cl-white cl-black-h d-flex position-relative m-auto pr-4 pl-4">
                            <img class="top-cta" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sparkle-green.png" width="30px" height="30px">
                            <a class="w-100 h-100 cl-white cl-black-h" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?></a>
                            <img class="bottom-cta" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sparkle-green.png" width="30px" height="30px">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
    <style>
        <?php if( $bannertype['value'] == "imageup" ): ?>
        <?php if( !empty($image) ): ?>
        .section-updates{
           background-image: linear-gradient(180deg, rgba(56, 37, 231, 0.75) 0%, rgba(56, 37, 231, 0.75) 100%), url(<?php echo $image['url']; ?>) !important;
        }
        <?php endif; ?>
        <?php endif; ?>
        <?php if( $bannertype['value'] == "videoup" ): ?>
        .section-updates .section-inner-video{
            background-image: linear-gradient(180deg, rgba(56, 37, 231, 0.75) 0%, rgba(56, 37, 231, 0.75) 100%) !important;
        }
        <?php endif; ?>
    </style>
<?php $title = get_field('title_get_informed_home');
$text = get_field('subtitle_get_informed_home');
$icon = get_field('icon_get_informed_home');
$image = get_field('bg_section_get_informed');
$ship_getinformed = get_field('icon_get_informed_home');?>
<div class="waves-top wave-inverse position-relative"></div>
<section class="section-get-informed bg-light-blue d-flex justify-content-center align-items-center wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
    <div class="container position-relative pt-0">
        <?php if( !empty($ship_getinformed) ): ?>
            <img class="ship-section ship-getinformed" src="<?php echo esc_url($ship_getinformed['url']); ?>" alt="<?php echo esc_attr($ship_getinformed['alt']); ?>" />
        <?php endif; ?>
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9 pb-5">
                <?php if( $title ): ?>
                    <h2 class="headline-section cl-stormy-sea text-center pb-0"><?php echo $title;?></h2>
                    <img class="squiggle-blue m-auto-25" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/border-squiggle-blue.png" border="0">
                <?php endif; ?>
                <?php if( $text ): ?>
                    <div class="copy-text text-center cl-stormy-sea"><?php echo $text;?></div>
                <?php endif; ?>

            </div>
        </div>
        <?php if( have_rows('reports_informed') ): ?>
        <div class="row equal justify-content-center pt-5">
            <?php  while( have_rows('reports_informed') ) : the_row();
            $title = get_sub_field('title_report');
            $imagereport = get_sub_field('image_report');
            $cta = get_sub_field('cta_report');
            ?>
               <div class="col-md-4 mb-md-0 mb-5">
                   <?php if($title): ?>
                       <div class="title-report cl-stormy-sea text-center pb-5"><?php echo $title;?></div>
                   <?php endif; ?>
                   <?php if( !empty($imagereport) ): ?>
                       <img class="img-fluid m-auto pb-5 img-report" src="<?php echo esc_url($imagereport['url']); ?>" alt="<?php echo esc_attr($imagereport['alt']); ?>" />
                   <?php endif; ?>
                   <?php  if($cta) {
                       $link_url = $cta['url'];
                       $link_title = $cta['title'];
                       $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                       <div class="cta-link bg-ultra-violet bg-transparent-h cl-white cl-stormy-sea-h border-ultra-violet-h d-flex position-relative m-auto">
                           <svg class="top-cta" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px">
                               <image  x="0px" y="0px" width="30px" height="30px"  xlink:href="data:img/png;base64,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" />
                           </svg>
                           <a class="w-100 h-100 cl-white cl-stormy-sea-h" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?></a>
                           <svg class="bottom-cta" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px">
                               <image  x="0px" y="0px" width="30px" height="30px"  xlink:href="data:img/png;base64,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" />
                           </svg>
                       </div>
                   <?php } ?>
               </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
    <style>
        <?php if( !empty($image) ): ?>
        .section-get-informed{
           /* background: rgb(56, 37, 231);*/
            /*background-image: linear-gradient(180deg, rgba(56, 37, 231, 0.85) 0%, rgba(56, 37, 231, 0.85) 100%), url(<?php echo $image['url']; ?>) !important;*/
            background-image: url(<?php echo $image['url']; ?>) !important;
        }
        <?php endif; ?>
    </style>
    <?php $title = get_field('title_crew_home');
    $text = get_field('subtitle_crew_home');
    $feedsocial = get_field('social_shortcode');?>
 <section class="bg-white d-flex justify-content-center align-items-center wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <?php if( $title ): ?>
                     <h2 class="headline-section cl-stormy-sea text-center pb-0"><?php echo $title;?></h2>
                     <img class="squiggle-blue m-auto-25" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/border-squiggle-blue.png" border="0">
                 <?php endif; ?>
                 <?php if( $text ): ?>
                     <div class="copy-description text-center cl-stormy-sea"><?php echo $text;?></div>
                 <?php endif; ?>
                 <div class="social d-flex justify-content-center align-items-center mb-5 mt-5">
                     <?php $twit_url= get_option('shipit_twitter_url');
                     if($twit_url){?>
                         <a href="<?php echo $twit_url;?>" target="_blank" class="pr-3 pl-3">
                             <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="25.000000pt" height="20.000000pt" viewBox="0 0 25.000000 20.000000" preserveAspectRatio="xMidYMid meet">
                                 <g transform="translate(0.000000,20.000000) scale(0.006667,-0.006780)" fill="#37515F" stroke="none">
                                     <path d="M2460 2936 c-144 -31 -263 -93 -365 -188 -172 -161 -253 -356 -243 -589 l4 -109 -40 6 c-127 17 -232 37 -316 60 -418 113 -809 363 -1087 697 -36 42 -69 74 -75 71 -18 -11 -77 -150 -95 -221 -22 -91 -22 -266 1 -358 29 -120 95 -242 182 -334 63 -67 72 -81 54 -81 -38 0 -141 30 -208 61 -36 16 -66 29 -68 29 -9 0 -3 -115 10 -184 30 -155 94 -274 211 -391 87 -86 160 -135 258 -170 59 -22 61 -23 33 -30 -16 -4 -85 -5 -153 -2 l-125 5 6 -27 c4 -14 27 -68 53 -120 37 -77 61 -110 127 -176 116 -117 237 -183 395 -215 l85 -17 -57 -36 c-165 -106 -370 -184 -572 -219 -102 -17 -147 -20 -298 -15 -97 3 -175 1 -172 -3 9 -14 162 -104 265 -155 137 -69 273 -117 455 -163 212 -53 330 -66 535 -59 273 10 450 40 670 113 537 179 978 579 1230 1119 122 260 185 516 206 833 l6 103 77 58 c113 87 315 301 298 317 -3 3 -47 -8 -99 -25 -98 -31 -261 -65 -280 -59 -6 2 5 14 25 27 64 39 181 174 225 259 60 114 57 120 -30 76 -86 -43 -285 -110 -356 -120 -51 -6 -52 -6 -104 41 -101 90 -201 146 -323 179 -84 23 -264 29 -345 12z"/> 									</g>
                             </svg>
                         </a>
                     <?php } ?>
                     <?php $insta_url= get_option('shipit_instagram_url');
                     if($insta_url){?>
                         <a href="<?php echo $insta_url;?>" target="_blank" class="pr-3 pl-3">
                             <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="20.000000pt" height="20.000000pt" viewBox="0 0 20.000000 20.000000" preserveAspectRatio="xMidYMid meet">
                                 <g transform="translate(0.000000,20.000000) scale(0.006780,-0.006780)" fill="#37515F" stroke="none">
                                     <path d="M363 2935 c-160 -44 -289 -165 -342 -323 -21 -60 -21 -78 -21 -1137 0 -1062 0 -1076 21 -1138 27 -83 69 -145 138 -209 61 -57 141 -101 212 -117 28 -7 427 -11 1105 -11 1031 0 1064 1 1126 20 72 22 167 80 215 131 17 19 47 60 67 92 68 114 66 81 66 1231 0 715 -3 1051 -11 1088 -36 175 -182 328 -354 373 -85 22 -2141 22 -2222 0z m1985 -506 c113 -55 132 -204 36 -288 -94 -83 -234 -46 -280 74 -31 82 6 173 88 214 54 27 100 27 156 0z m-690 -250 c124 -31 224 -91 328 -194 76 -76 97 -105 136 -185 63 -129 82 -222 75 -364 -9 -194 -70 -329 -212 -472 -77 -78 -104 -98 -185 -138 -126 -61 -201 -79 -325 -79 -122 0 -213 21 -320 73 -191 93 -336 270 -392 480 -25 97 -23 263 5 363 111 393 495 615 890 516z"/>
                                     <path d="M1339 1952 c-303 -79 -449 -426 -302 -717 32 -62 132 -162 199 -197 238 -128 547 -36 671 198 207 389 -141 827 -568 716z"/>
                                 </g>
                             </svg>
                         </a>
                     <?php } ?>
                 </div>
             </div>
         </div>
         <?php if( $feedsocial ): ?>
         <div class="row row-feed-social mt-md-5">
             <div class="col-md-12">
                <?php echo $feedsocial;?>
             </div>
         </div>
         <?php endif; ?>
     </div>
 </section>
    <?php $title = get_field('title_form');
$text = get_field('subtitle_form');
    if($title || $text): ?>
    <section class="bg-dark-d d-flex justify-content-center align-items-center wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-md-0 mb-5">
                   <div class="box-form-home">
                       <?php if( $title ): ?>
                           <h2 class="headline-section cl-zero-blue mb-md-5 mb-3 text-center text-md-left"><?php echo $title;?></h2>
                       <?php endif; ?>
                       <?php if( $text ): ?>
                           <div class="copy-text cl-white text-center text-md-left"><?php echo $text;?></div>
                       <?php endif; ?>
                   </div>
                </div>
                <div class="col-md"><?php gravity_form(5, false); ?></div>
            </div>
        </div>
    </section>
    <?php endif; ?>
</article><!-- .post -->