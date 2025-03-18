<?php
/**
 * Displays the content when the single post template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<div class="section-header-single-post">
<div class="container-fluid pr-lg-0 pl-lg-0">
    <div class="row equal flex-lg-row-reverse justify-content-center mr-lg-0 ml-lg-0">
        <?php if ( has_post_thumbnail() ) {
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
        $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
        <div class="col-lg mb-lg-0 mb-4 pr-0 pl-0">
            <div class="w-100 h-100">
                <img class="card-img-top img-fluid w-100 h-100 fit-cover-center" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
            </div>
        </div>
        <?php } ?>
        <div class="col-md-10 col-lg-6 pr-lg-5">
            <?php
            $id = get_the_ID();
            $post_categories = get_post_primary_category($id, 'category');
            $primary_category = $post_categories['primary_category'];
            $nameprimary = $primary_category->name;
            $category_link = get_category_link( $primary_category->term_id );
            $mainpage = get_field('list_page_cate', $primary_category->taxonomy . '_' . $primary_category->term_id); ?>
            <div class="card-post card-post-single d-flex flex-column h-100 w-100">
                <?php if(!empty($mainpage)): ?>
                <div class="pb-5 pt-5">
                    <a href="<?php echo esc_url( get_page_link( $mainpage->ID ) ); ?>" class="cta-back cl-black cl-ultra-violet-h">
                        <svg class="icon-arrow-l d-inline" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="20px" viewBox="0 0 24 24" width="30px" fill="#000000"><rect fill="none" height="20" width="30"/><path d="M9,19l1.41-1.41L5.83,13H22V11H5.83l4.59-4.59L9,5l-7,7L9,19z"/></svg>
                        BACK TO ALL <?php echo $mainpage->post_title; ?>
                    </a>
                </div>
            <?php endif; ?>
                <div class="box-title-single">
                    <div class="card-meta cl-ultra-violet">
                        <a class="cl-ultra-violet cl-black-h" href="<?php echo $category_link;?>"><?php echo $nameprimary;?></a>
                    </div>
                    <h2 class="headline-section cl-stormy-sea pb-5"><?php the_title(); ?></h2>
                    <?php $excerpt = ''; ?>
                    <div class="copy-description cl-stormy-sea">
                        <span class="date-post d-block text-uppercase pb-2"><?php the_time('F') ?> <?php the_time('j') ?>, <?php the_time('Y') ?></span>
                        <?php if (has_excerpt()) { echo wp_strip_all_tags( get_the_excerpt(), true ); } ?>
                    </div>
                </div>
                <div class="social d-flex justify-content-start align-items-center mt-5">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="pr-4">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="12.000000px" height="23.000000px" viewBox="0 0 12.000000 23.000000"  preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,23.000000) scale(0.007895,-0.007797)"  fill="#37515F" stroke="none">
                                <path d="M923 2935 c-171 -31 -324 -148 -401 -306 -67 -136 -72 -168 -72 -465 0 -213 -3 -264 -14 -273 -10 -9 -74 -12 -216 -10 -155 1 -204 -2 -210 -12 -9 -13 -12 -503 -4 -531 5 -16 24 -18 219 -18 185 0 214 -2 219 -16 3 -9 6 -303 6 -654 l0 -638 98 -7 c105 -8 406 -1 434 10 17 7 18 50 20 654 l3 646 210 3 c115 1 213 6 217 10 4 4 21 116 38 248 16 133 33 256 36 273 l7 31 -241 0 c-132 0 -247 3 -256 6 -14 5 -16 33 -16 205 0 208 6 246 48 292 42 46 68 52 272 57 l195 5 0 250 0 250 -260 2 c-179 1 -283 -3 -332 -12z"/>
                            </g>
                        </svg>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank" class="pr-4">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="25.000000px" height="20.000000px" viewBox="0 0 25.000000 20.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,20.000000) scale(0.006667,-0.006780)" fill="#37515F" stroke="none">
                                <path d="M2460 2936 c-144 -31 -263 -93 -365 -188 -172 -161 -253 -356 -243 -589 l4 -109 -40 6 c-127 17 -232 37 -316 60 -418 113 -809 363 -1087 697 -36 42 -69 74 -75 71 -18 -11 -77 -150 -95 -221 -22 -91 -22 -266 1 -358 29 -120 95 -242 182 -334 63 -67 72 -81 54 -81 -38 0 -141 30 -208 61 -36 16 -66 29 -68 29 -9 0 -3 -115 10 -184 30 -155 94 -274 211 -391 87 -86 160 -135 258 -170 59 -22 61 -23 33 -30 -16 -4 -85 -5 -153 -2 l-125 5 6 -27 c4 -14 27 -68 53 -120 37 -77 61 -110 127 -176 116 -117 237 -183 395 -215 l85 -17 -57 -36 c-165 -106 -370 -184 -572 -219 -102 -17 -147 -20 -298 -15 -97 3 -175 1 -172 -3 9 -14 162 -104 265 -155 137 -69 273 -117 455 -163 212 -53 330 -66 535 -59 273 10 450 40 670 113 537 179 978 579 1230 1119 122 260 185 516 206 833 l6 103 77 58 c113 87 315 301 298 317 -3 3 -47 -8 -99 -25 -98 -31 -261 -65 -280 -59 -6 2 5 14 25 27 64 39 181 174 225 259 60 114 57 120 -30 76 -86 -43 -285 -110 -356 -120 -51 -6 -52 -6 -104 41 -101 90 -201 146 -323 179 -84 23 -264 29 -345 12z"/> 									</g>
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank" class="pr-4">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="22.000000px" height="22.000000px" viewBox="0 0 22.000000 22.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,22.000000) scale(0.007383,-0.007458)" fill="#37515F" stroke="none">
                                <path d="M273 2936 c-23 -7 -62 -25 -86 -39 -167 -98 -218 -339 -106 -506 155 -233 502 -206 626 49 24 48 27 68 28 150 0 82 -4 103 -26 151 -37 79 -90 133 -166 171 -54 26 -79 32 -146 35 -51 2 -98 -2 -124 -11z"/>
                                <path d="M2060 2005 c-104 -29 -216 -91 -289 -163 -37 -37 -77 -80 -89 -97 l-21 -30 -1 128 0 127 -300 0 -300 0 0 -985 0 -985 309 0 309 0 5 562 c3 463 7 575 20 629 29 125 83 201 177 250 39 21 59 24 155 24 135 0 187 -20 240 -94 77 -106 84 -177 85 -833 l0 -538 311 0 310 0 -4 667 c-4 725 -7 764 -63 932 -70 210 -207 339 -419 397 -87 23 -361 29 -435 9z"/>
                                <path d="M70 985 l0 -985 310 0 310 0 0 985 0 985 -310 0 -310 0 0 -985z"/>
                            </g>
                        </svg>
                    </a>
                    <a href="mailto:type%20email%20address%20here?subject=I%20wanted%20to%20share%20this%20post%20with%20you%20from%20<?php bloginfo('name'); ?>&body=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Email to a friend/colleague" target="_blank" class="pr-4">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="27.000000px" height="21.000000px" viewBox="0 0 27.000000 21.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,21.000000) scale(0.007317,-0.007119)" fill="#37515F" stroke="none">
                                <path d="M263 2936 c-106 -34 -195 -115 -235 -215 l-23 -56 0 -1195 0 -1195 27 -57 c35 -76 99 -143 173 -181 l60 -32 1580 0 1580 0 63 34 c75 41 135 103 170 179 l27 57 0 1200 0 1200 -32 66 c-39 79 -102 140 -181 177 l-57 27 -1555 2 c-1266 1 -1563 -1 -1597 -11z m850 -828 c397 -248 727 -451 732 -451 6 0 335 203 732 451 398 249 725 452 728 452 3 0 5 -78 5 -173 l0 -173 -727 -455 c-400 -250 -732 -454 -738 -454 -6 0 -338 204 -738 454 l-727 455 0 173 c0 95 2 173 5 173 3 0 330 -203 728 -452z"/>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<section class="section-decription-single bg-white wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-md-10 col-lg-8">
                 <img class="squiggle-blue m-auto-25" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/border-squiggle-blue.png" border="0">
                 <div class="copy-description cl-black pt-5 pb-5">
                 <?php the_content(); ?>
                 </div>
                 <img class="squiggle-blue m-auto-25" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/border-squiggle-blue.png" border="0">
             </div>
             <div class="col-md-12 pt-5">
                 <?php $post_tags = get_the_tags();
                 if ( ! empty( $post_tags ) ) { $i = 0; ?>
                     <div class="d-block mt-4">
                         <?php foreach ( $post_tags as $tag ) {
                             if($i < 3){?>
                                 <div class="link-border-wrap d-inline-block mb-2">
                                     <a class="link-tags" href="<?php echo esc_attr( get_tag_link( $tag->term_id ) );?>"><?php echo $tag->name;?></a>
                                 </div>
                             <?php }$i++; } ?>
                     </div>
                 <?php }?>
             </div>
         </div>
     </div>
</section>
<?php $query = array(
    'post_type' => 'post',     //All Post Order By Date
    'post_status' => 'publish',
    'orderby' => 'post_date',
    'order' => 'desc',
    'posts_per_page' => 3
);
$query2 = array(
    'post_type' => 'post',     //All Post Order By Date
    'post_status' => 'publish',
    'orderby' => 'post_date',
    'order' => 'desc',
    'posts_per_page' => 2
);
$allpost = new WP_Query($query);
$twopost = new WP_Query($query2);?>

<?php if ( $allpost->have_posts() ) : ?>
    <section class="section-updates bg-light-blue pb-5 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                        <h2 class="headline-section cl-stormy-sea pb-0">Recent Updates</h2>
                        <img class="squiggle-blue" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/border-squiggle-blue.png" border="0">
                </div>
            </div>
            <div class="row row-post hide-md pt-5 pb-5">
                <div class="col-md-12">
                    <div class="post-carousel owl-carousel">
                        <?php while($allpost->have_posts()) : $allpost->the_post();?>
                            <div class="item animated fadeIn">
                                <div class="card card-post d-flex flex-column h-100">
                                    <?php if ( has_post_thumbnail() ) {
                                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                                        $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
                                        <a class="link-post" href="<?php the_permalink(); ?>">
                                            <div class="card-head position-relative">
                                                <img class="card-img-top img-fluid w-100 h-100 fit-cover-center" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
                                                <div class="overlay overlay-post"></div>
                                            </div>
                                        </a>
                                    <?php } ?>
                                    <div class="card-body d-flex flex-column">
                                        <?php $id = get_the_ID();
                                        $post_categories = get_post_primary_category($id, 'category');
                                        $primary_category = $post_categories['primary_category'];
                                        $nameprimary = $primary_category->name;
                                        $category_link = get_category_link( $primary_category->term_id );?>
                                        <div class="card-meta cl-ultra-violet">
                                            <a class="cl-ultra-violet cl-black-h" href="<?php echo $category_link;?>"><?php echo $nameprimary;?></a><span class="divide">|</span><span class="date-post"><?php the_time('M') ?> <?php the_time('j') ?>, <?php the_time('Y') ?></span>
                                        </div>
                                        <h5 class="card-title mb-5 pb-2 cl-stormy-sea cl-black-h"><a class="cl-stormy-sea cl-black-h" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <a href="<?php the_permalink(); ?>" class="cta-read cl-ultra-violet cl-black-h">
                                            READ MORE
                                            <svg class="icon-arrow-r d-inline" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="20px" viewBox="0 0 24 24" width="30px" fill="#3825FD"><rect fill="none" height="20" width="30"/><path d="M15,5l-1.41,1.41L18.17,11H2V13h16.17l-4.59,4.59L15,19l7-7L15,5z"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <div class="row row-post hide-tb pb-0">
                <?php while($twopost->have_posts()) : $twopost->the_post();?>
                    <div class="col-12 mb-5">
                        <div class="card card-post d-flex flex-column h-100">
                            <?php if ( has_post_thumbnail() ) {
                                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                                $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                                $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
                                <a class="link-post" href="<?php the_permalink(); ?>">
                                    <div class="card-head position-relative">
                                        <img class="card-img-top img-fluid w-100 h-100 fit-cover-center" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
                                        <div class="overlay overlay-post"></div>
                                    </div>
                                </a>
                            <?php } ?>
                            <div class="card-body d-flex flex-column">
                                <?php $id = get_the_ID();
                                $post_categories = get_post_primary_category($id, 'category');
                                $primary_category = $post_categories['primary_category'];
                                $nameprimary = $primary_category->name;
                                $category_link = get_category_link( $primary_category->term_id );?>
                                <div class="card-meta cl-ultra-violet">
                                    <a class="cl-ultra-violet cl-black-h" href="<?php echo $category_link;?>"><?php echo $nameprimary;?></a><span class="divide">|</span><span class="date-post"><?php the_time('M') ?> <?php the_time('j') ?>, <?php the_time('Y') ?></span>
                                </div>
                                <h5 class="card-title mb-4 cl-stormy-sea cl-black-h"><a class="cl-stormy-sea cl-black-h" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <a href="<?php the_permalink(); ?>" class="cta-read cl-ultra-violet cl-black-h">
                                    READ MORE
                                    <svg class="icon-arrow-r d-inline" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="20px" viewBox="0 0 24 24" width="30px" fill="#3825FD"><rect fill="none" height="20" width="30"/><path d="M15,5l-1.41,1.41L18.17,11H2V13h16.17l-4.59,4.59L15,19l7-7L15,5z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
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
    </section>
<?php endif; wp_reset_postdata();?>