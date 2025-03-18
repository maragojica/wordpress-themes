<section class="module module-banner-page section-updates pt-0 pb-0 position-relative wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.2s">
    <?php  $title = get_sub_field('title_banner');
    $text = get_sub_field('text_banner');
    $bannertype = get_sub_field('bg_type');
    $image = get_sub_field('bg_image');
    $videomp4 = get_sub_field('video_mp4');
    $videoogg = get_sub_field('video_ogg');
    $videowebm = get_sub_field('video_webm');?>
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
    <div class="section-inner-video d-flex justify-content-center align-items-center w-100 h-100 position-relative z-index-1">
    <div class="container pt-md-5 pb-md-5 position-relative">
        <div class="row justify-content-center pt-md-5">
            <div class="col-md-8">
                <?php if( $title ): ?>
                    <h2 class="headline-section cl-white text-center pb-5"><?php echo $title;?></h2>
                    <img class="sparkle-divider img-fluid m-auto" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sparkle-divider.png" border="0">
                <?php endif; ?>
                <?php if( $text ): ?>
                    <div class="copy-text text-center cl-white pt-5"><?php echo $text;?></div>
                <?php endif; ?>

            </div>
        </div>
        <div class="row justify-content-center align-items-center pt-md-5 pb-5">
            <div class="col-md-7 col-lg-6 text-center ">
                <?php if( have_rows('banner_menu_page') ): ?>
                    <?php  while( have_rows('banner_menu_page') ) : the_row();
                        $cta = get_sub_field('link_banner'); ?>
                        <?php  if($cta) {
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                            <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" class="cta-read cl-zero-blue cl-white-h mr-3 ml-3 mb-2 d-inline-block">
                                <?php echo $link_title; ?>
                                <svg class="icon-arrow-r d-inline" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="20px" viewBox="0 0 24 24" width="30px" fill="#00FFFF"><rect fill="none" height="20" width="30"/><path d="M15,5l-1.41,1.41L18.17,11H2V13h16.17l-4.59,4.59L15,19l7-7L15,5z"/></svg>
                            </a>
                        <?php } ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="row justify-content-center align-items-center pt-md-5">
            <div class="col-md-7 pt-md-5">
                <div class="social social-report d-flex justify-content-center align-items-center">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="pr-4">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="12.000000px" height="23.000000px" viewBox="0 0 12.000000 23.000000"  preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,23.000000) scale(0.007895,-0.007797)"  fill="#ffffff" stroke="none">
                                <path d="M923 2935 c-171 -31 -324 -148 -401 -306 -67 -136 -72 -168 -72 -465 0 -213 -3 -264 -14 -273 -10 -9 -74 -12 -216 -10 -155 1 -204 -2 -210 -12 -9 -13 -12 -503 -4 -531 5 -16 24 -18 219 -18 185 0 214 -2 219 -16 3 -9 6 -303 6 -654 l0 -638 98 -7 c105 -8 406 -1 434 10 17 7 18 50 20 654 l3 646 210 3 c115 1 213 6 217 10 4 4 21 116 38 248 16 133 33 256 36 273 l7 31 -241 0 c-132 0 -247 3 -256 6 -14 5 -16 33 -16 205 0 208 6 246 48 292 42 46 68 52 272 57 l195 5 0 250 0 250 -260 2 c-179 1 -283 -3 -332 -12z"/>
                            </g>
                        </svg>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank" class="pr-4">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="25.000000px" height="20.000000px" viewBox="0 0 25.000000 20.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,20.000000) scale(0.006667,-0.006780)" fill="#ffffff" stroke="none">
                                <path d="M2460 2936 c-144 -31 -263 -93 -365 -188 -172 -161 -253 -356 -243 -589 l4 -109 -40 6 c-127 17 -232 37 -316 60 -418 113 -809 363 -1087 697 -36 42 -69 74 -75 71 -18 -11 -77 -150 -95 -221 -22 -91 -22 -266 1 -358 29 -120 95 -242 182 -334 63 -67 72 -81 54 -81 -38 0 -141 30 -208 61 -36 16 -66 29 -68 29 -9 0 -3 -115 10 -184 30 -155 94 -274 211 -391 87 -86 160 -135 258 -170 59 -22 61 -23 33 -30 -16 -4 -85 -5 -153 -2 l-125 5 6 -27 c4 -14 27 -68 53 -120 37 -77 61 -110 127 -176 116 -117 237 -183 395 -215 l85 -17 -57 -36 c-165 -106 -370 -184 -572 -219 -102 -17 -147 -20 -298 -15 -97 3 -175 1 -172 -3 9 -14 162 -104 265 -155 137 -69 273 -117 455 -163 212 -53 330 -66 535 -59 273 10 450 40 670 113 537 179 978 579 1230 1119 122 260 185 516 206 833 l6 103 77 58 c113 87 315 301 298 317 -3 3 -47 -8 -99 -25 -98 -31 -261 -65 -280 -59 -6 2 5 14 25 27 64 39 181 174 225 259 60 114 57 120 -30 76 -86 -43 -285 -110 -356 -120 -51 -6 -52 -6 -104 41 -101 90 -201 146 -323 179 -84 23 -264 29 -345 12z"/> 									</g>
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank" class="pr-4">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="22.000000px" height="22.000000px" viewBox="0 0 22.000000 22.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,22.000000) scale(0.007383,-0.007458)" fill="#ffffff" stroke="none">
                                <path d="M273 2936 c-23 -7 -62 -25 -86 -39 -167 -98 -218 -339 -106 -506 155 -233 502 -206 626 49 24 48 27 68 28 150 0 82 -4 103 -26 151 -37 79 -90 133 -166 171 -54 26 -79 32 -146 35 -51 2 -98 -2 -124 -11z"/>
                                <path d="M2060 2005 c-104 -29 -216 -91 -289 -163 -37 -37 -77 -80 -89 -97 l-21 -30 -1 128 0 127 -300 0 -300 0 0 -985 0 -985 309 0 309 0 5 562 c3 463 7 575 20 629 29 125 83 201 177 250 39 21 59 24 155 24 135 0 187 -20 240 -94 77 -106 84 -177 85 -833 l0 -538 311 0 310 0 -4 667 c-4 725 -7 764 -63 932 -70 210 -207 339 -419 397 -87 23 -361 29 -435 9z"/>
                                <path d="M70 985 l0 -985 310 0 310 0 0 985 0 985 -310 0 -310 0 0 -985z"/>
                            </g>
                        </svg>
                    </a>
                    <a href="mailto:type%20email%20address%20here?subject=I%20wanted%20to%20share%20this%20post%20with%20you%20from%20<?php bloginfo('name'); ?>&body=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Email to a friend/colleague" target="_blank" class="pr-4">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="27.000000px" height="21.000000px" viewBox="0 0 27.000000 21.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,21.000000) scale(0.007317,-0.007119)" fill="#ffffff" stroke="none">
                                <path d="M263 2936 c-106 -34 -195 -115 -235 -215 l-23 -56 0 -1195 0 -1195 27 -57 c35 -76 99 -143 173 -181 l60 -32 1580 0 1580 0 63 34 c75 41 135 103 170 179 l27 57 0 1200 0 1200 -32 66 c-39 79 -102 140 -181 177 l-57 27 -1555 2 c-1266 1 -1563 -1 -1597 -11z m850 -828 c397 -248 727 -451 732 -451 6 0 335 203 732 451 398 249 725 452 728 452 3 0 5 -78 5 -173 l0 -173 -727 -455 c-400 -250 -732 -454 -738 -454 -6 0 -338 204 -738 454 l-727 455 0 173 c0 95 2 173 5 173 3 0 330 -203 728 -452z"/>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    <?php if( $bannertype['value'] == "image" ): ?>
    <?php if( !empty($image) ): ?>
    .section-updates{
        background-image: linear-gradient(180deg, rgba(56, 37, 253, 0.75) 0%, rgba(56, 37, 253, 0.75) 100%), url(<?php echo $image['url']; ?>) !important;
    }
    <?php endif; ?>
    <?php endif; ?>
    <?php if( $bannertype['value'] == "video" ): ?>
    .section-updates .section-inner-video{
        background-image: linear-gradient(180deg, rgba(56, 37, 253, 0.75) 0%, rgba(56, 37, 253, 0.75) 100%) !important;
    }
    <?php endif; ?>
</style>