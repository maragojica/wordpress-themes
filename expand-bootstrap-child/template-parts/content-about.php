<?php
/**
 * The template for displaying content in the page-about.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php $headline_banner = get_field('banner_title_about');
    $headline_banner_mv = get_field('banner_title_about_mv');?>
    <section class="banner-general d-flex align-items-center position-relative">
        <svg class="shape-banner-general hide-md" width="1112" height="411" viewBox="0 0 1112 411" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 5H33.6137C88.8422 5 133.614 49.7715 133.614 105V201.5C133.614 256.728 178.385 301.5 233.614 301.5H1007C1062.23 301.5 1107 346.272 1107 401.5V411" stroke="#24CFA3" stroke-width="10"/>
        </svg>
        <svg class="shape-banner-general show-md" width="390" height="169" viewBox="0 0 390 169" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M390 166H85.4129C52.2758 166 25.4129 139.137 25.4129 106V30.4129C25.4129 15.2732 13.1397 3 -2 3V3" stroke="#24CFA3" stroke-width="6"/>
        </svg>
        <div class="container z-index-2">
            <div class="row justify-content-center text-center">
                <div class="col-md-12">
                    <?php if($headline_banner || $headline_banner_mv): ?>
                    <h1 class="cl-white">
                        <span class="hide-md"><?php echo $headline_banner;?></span>
                        <span class="show-md position-relative"><?php echo $headline_banner_mv;?>
                            <svg class="star-mv-about" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.5 0L9.98495 2.47531L12.4501 0.973624L12.6147 3.85549L15.4954 3.67145L14.3018 6.29968L16.938 7.47544L14.6598 9.24793L16.4476 11.5141L13.6066 12.0248L14.1365 14.8623L11.3836 13.9943L10.5342 16.753L8.5 14.705L6.46582 16.753L5.61639 13.9943L2.86346 14.8623L3.39339 12.0248L0.552362 11.5141L2.34024 9.24793L0.0619745 7.47544L2.69822 6.29968L1.50464 3.67145L4.38532 3.85549L4.54985 0.973624L7.01505 2.47531L8.5 0Z" fill="#21F8C0"/>
                            </svg>
                        </span>
                    </h1>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-info-menu bg-accent-grey-1 pt-5 pb-5 position-relative">
        <svg class="shape-info-menu hide-lg" width="1440" height="197" viewBox="0 0 1440 197" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 192H1136.31C1169.44 192 1196.31 165.137 1196.31 132V65C1196.31 31.8629 1223.17 5 1256.31 5H1441" stroke="#FFD0C0" stroke-width="10"/>
        </svg>
        <div class="container pt-md-5 pb-md-5 position-relative z-index-2">
            <?php $title_menu = get_field('title_menu');
            $text_menu = get_field('text_menu');  ?>
            <div class="row pt-lg-5 pb-lg-5">
                <div class="col-lg-8 pe-lg-5">
                    <?php if($title_menu): ?>
                        <h3 class="cl-black pb-4 mb-0 mb-md-3 d-flex align-items-start">
                            <!--<svg class="show-md me-2" width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 0L19.9699 4.95061L24.9003 1.94725L25.2294 7.71098L30.9907 7.3429L28.6035 12.5994L33.8761 14.9509L29.3195 18.4959L32.8953 23.0283L27.2132 24.0497L28.2731 29.7247L22.7672 27.9885L21.0684 33.506L17 29.41L12.9316 33.506L11.2328 27.9885L5.72691 29.7247L6.78677 24.0497L1.10472 23.0283L4.68048 18.4959L0.123949 14.9509L5.39645 12.5994L3.00927 7.3429L8.77065 7.71098L9.09971 1.94725L14.0301 4.95061L17 0Z" fill="#24CFA3"/>
                            </svg>-->
                            <?php echo $title_menu;?>
                        </h3>
                    <?php endif;?>
                    <?php if($text_menu): ?>
                        <h5 class="pb-md-4 pb-3"><?php echo $text_menu;?></h5>
                    <?php endif;?>
                </div>
                <?php if( have_rows('menu_items_about') ): ?>
                    <div class="col-lg pt-lg-4 pt-4">
                        <div class="list-group list-menu-about">
                            <?php while ( have_rows('menu_items_about') ) : the_row(); $link = get_sub_field('item');
                                if($link):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';?>
                                    <a aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" class="anchor-link list-group-item list-group-item-action item-menu-about d-flex align-items-center">
                                        <?php echo $link_title; ?>
                                        <span class="cta-arrows d-flex align-items-center">
                                        <svg class="arrow-short" width="33" height="13" viewBox="0 0 33 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1329_11274)">
                                                <path d="M14 6.5H32" stroke="#3877EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M27 1.5L32 6.5L27 11.5" stroke="#3877EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1329_11274">
                                                    <rect width="33" height="12" fill="white" transform="translate(0 0.5)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <svg class="arrow-long" width="33" height="13" viewBox="0 0 33 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1305_3418)">
                                                <path d="M1 6.5L32 6.5" stroke="#0F54D3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M27 1.5L32 6.5L27 11.5" stroke="#0F54D3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1305_3418">
                                                    <rect width="33" height="12" fill="white" transform="translate(0 0.5)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                                    </a>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section id="the-challenge" class="section-challenge bg-accent-grey-1 pt-5 pb-5 position-relative">
        <div class="container">
            <div class="row pt-md-5 pb-md-5">
                <?php $challenge_title = get_field('challenge_title');
                $challenge_text = get_field('challenge_text');?>
                <?php if($challenge_title): ?>
                    <div class="col-md-3">
                        <h6 class="cl-green"><?php echo $challenge_title;?></h6>
                    </div>
                <?php endif; ?>
                <?php if($challenge_text): ?>
                   <div class="col-md">
                       <div class="dp-1 cl-black strong-loretta font-light pb-md-0 pb-3">
                           <?php echo $challenge_text; ?>
                       </div>
                   </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="line-top w-100"></div>
                </div>
            </div>
        </div>
    </section>
    <?php if( have_rows('challenge_list') ): ?>
        <section class="section-challenge-list bg-accent-grey-1 pb-5 position-relative">
            <div class="container pb-md-5">
                <div class="row equal">
                    <?php $r = 1; while ( have_rows('challenge_list') ) : the_row();
                        $title_item = get_sub_field('title_item_challenge_list');
                        $subtitle_item = get_sub_field('subtitle_item_challenge_list');
                        $link_item = get_sub_field('link_item_challenge_list'); ?>
                        <div class="col-lg-4 pb-lg-0 col-number-about-<?php echo $r;?>">
                            <div class="w-100 h-100">
                                <?php if($title_item):?>
                                    <h2 class="cl-black pb-lg-0 pb-2"><?php echo $title_item;?></h2>
                                <?php endif; ?>
                                <?php if($subtitle_item):?>
                                    <h5 class="cl-blue mb-lg-4 mb-2"><?php echo $subtitle_item;?></h5>
                                <?php endif; ?>
                               <?php if($link_item):
                                $link_url = $link_item['url'];
                                $link_title = $link_item['title'];
                                $link_target = $link_item['target'] ? $link_item['target'] : '_self';?>
                                <a aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" class="link-source">
                                    <?php echo $link_title; ?>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if($r < 3): ?>
                        <div class="show-lg pb-5 pt-5">
                            <div class="line-top w-100"></div>
                        </div>
                       <?php endif; ?>
                    <?php $r++; endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <section id="the-opportunity" class="section-opportunity position-relative bg-accent-grey-1 pb-5 pt-5">
        <svg class="shape-top-opportunity hide-lg" width="1440" height="645" viewBox="0 0 1440 645" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 640V640C32.5848 640 59 613.585 59 581V228.16C59 195.023 85.8629 168.16 119 168.16H176C209.137 168.16 236 141.297 236 108.16V65C236 31.8629 262.863 5 296 5H1441.5" stroke="#CCD9E0" stroke-width="10"/>
        </svg>
        <svg class="shape-bottom-opportunity hide-lg" width="1436" height="267" viewBox="0 0 1436 267" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 262H963.863C996.565 262 1023.08 235.49 1023.08 202.788V202.788C1023.08 170.085 1049.59 143.575 1082.29 143.575H1161.8C1194.94 143.575 1221.8 116.712 1221.8 83.5752V65C1221.8 31.8629 1248.66 5 1281.8 5H1436" stroke="#FFD0C0" stroke-width="10"/>
        </svg>

        <div class="container position-relative pt-md-5 pb-lg-5 z-index-2">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <?php $title_opportunity = get_field('title_opportunity');
                    $subtitle_opportunity = get_field('subtitle_opportunity');
                    $text_opportunity = get_field('text_opportunity');
                     ?>
                    <?php if($title_opportunity): ?>
                    <h3 class="cl-green mb-5"><?php echo $title_opportunity; ?></h3>
                    <?php endif; ?>
                    <?php if($text_opportunity): ?>
                    <div class="dp-1 cl-black mb-4 font-light"><?php echo $text_opportunity; ?></div>
                    <?php endif; ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/path.png" alt="Separator Beige" class="line-path">
                    <?php if($subtitle_opportunity): ?>
                    <h6 class="cl-grey-3 mt-4"><?php echo $subtitle_opportunity;?></h6>
                    <?php endif; ?>
                </div>
            </div>
            <?php $cta_opportunity = get_field('cta_opportunity');
            if($cta_opportunity):
                $link_url = $cta_opportunity['url'];
                $link_title = $cta_opportunity['title'];
                $link_target = $cta_opportunity['target'] ? $cta_opportunity['target'] : '_self';?>
                <div class="row pt-md-5 pb-md-5 mt-md-5 mt-4">
                    <div class="col-md-12">
                        <div class="w-100 h-100 box-cta-info bg-white d-flex flex-column align-items-center justify-content-center">
                            <a class="w-100 h-100 pt-5 pb-5 d-flex align-items-center justify-content-center text-center" aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                                <svg class="me-3" width="35" height="34" viewBox="0 0 35 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.1875 0L20.1574 4.95061L25.0878 1.94725L25.4169 7.71098L31.1782 7.3429L28.791 12.5994L34.0636 14.9509L29.507 18.4959L33.0828 23.0283L27.4007 24.0497L28.4606 29.7247L22.9547 27.9885L21.2559 33.506L17.1875 29.41L13.1191 33.506L11.4203 27.9885L5.91441 29.7247L6.97427 24.0497L1.29222 23.0283L4.86798 18.4959L0.311449 14.9509L5.58395 12.5994L3.19677 7.3429L8.95815 7.71098L9.28721 1.94725L14.2176 4.95061L17.1875 0Z" fill="#24CFA3"/>
                                </svg>
                                <?php echo $link_title; ?>
                                <span class="cta-arrows d-flex align-items-center">
                                    <svg class="arrow-short" width="54" height="20" viewBox="0 0 54 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.75 9.75H52" stroke="#24CFA3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M43.875 1.625L52 9.75L43.875 17.875" stroke="#24CFA3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                    <svg class="arrow-long" width="54" height="20" viewBox="0 0 54 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.625 9.75L52 9.75" stroke="#24CFA3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M43.875 1.625L52 9.75L43.875 17.875" stroke="#24CFA3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <section id="about-the-organizations" class="section-info-logos pt-md-5">
        <div class="container pt-lg-5">
            <div class="row justify-content-center pt-5">
                <div class="col-lg-8">
                    <?php $info_logos = get_field('info_logos_about'); ?>
                    <?php if($info_logos): ?>
                        <div class="dp-1 strong-loretta-big cl-black mb-4"><?php echo $info_logos; ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row pt-md-5">
                <div class="col-md-12 pt-5 pb-5">
                    <div class="line-top w-100"></div>
                </div>
            </div>
            <?php if( have_rows('logos_about') ): ?>
                <?php while ( have_rows('logos_about') ) : the_row();
                    $logo_item_about = get_sub_field('logo_item_about');
                    $text_logo_about = get_sub_field('text_logo_about');
                    $follow_logo_about = get_sub_field('follow_logo_about');
                    $logolink = get_sub_field('web_logo');
                    $logotwitter = get_sub_field('twitter_logo');
                    $logolinkedin = get_sub_field('linkedin_logo');
                    $logoface = get_sub_field('facebook_logo');?>
                    <div class="row row-item-about pt-md-5">
                        <?php if ( !empty($logo_item_about)) : ?>
                            <div class="col-md-4 pb-md-0 pb-5">
                                <img class="img-fluid d-block m-auto" src="<?php echo esc_url($logo_item_about['url']); ?>" alt="<?php echo esc_attr($logo_item_about['alt']); ?>" />
                            </div>
                        <?php endif; ?>
                        <?php if($text_logo_about): ?>
                            <div class="col-md">
                                <div class="dp-1 dp-2 cl-dark font-light"><?php echo $text_logo_about; ?></div>
                                <div class="d-flex align-items-center share-logo-about pt-md-3">
                                    <?php if( $follow_logo_about ): ?>
                                        <div class="content-share pe-2"><?php echo $follow_logo_about;?></div>
                                    <?php endif; ?>
                                    <?php  if($logolink) {
                                        $link_url = $logolink['url'];
                                        $link_title = $logolink['title'];
                                        $link_target = $logolink['target'] ? $logolink['target'] : '_self';?>
                                        <a class="social-link" aria-label="<?php echo $link_title;?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                                            <svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="15" cy="15.5" r="15" fill="#F2F6F7"/>
                                                <path d="M9.03659 21.3902C7.92134 20.0552 7.21013 18.3726 7.09499 16.5303H10.4505C10.4855 17.7813 10.6429 18.9617 10.9026 20.0293C10.2346 20.401 9.60827 20.8559 9.03659 21.3902ZM15.5002 6.51672H15.5002H15.5002H15.5002H15.5002H15.5002H15.5002H15.5002H15.5001H15.5001H15.5001H15.5001H15.5001H15.5001H15.5001H15.5001H15.5001H15.5001H15.5001H15.5001H15.5001H15.5H15.5H15.5H15.5H15.5H15.5H15.5H15.5H15.5H15.5H15.5H15.5H15.5H15.4999H15.4999H15.4999H15.4999H15.4999H15.4999H15.4999H15.4999H15.4999H15.4999H15.4999H15.4999H15.4999H15.4998H15.4998H15.4998H15.4998H15.4998H15.4998H15.4998H15.4998H15.4998C10.2709 6.51694 6.01721 10.7709 6.01721 15.9997C6.01721 21.2288 10.2709 25.4825 15.5 25.4827H15.5002C20.7293 25.4827 24.9832 21.2288 24.9832 15.9997C24.9832 10.7707 20.7293 6.51672 15.5002 6.51672ZM13.4282 8.85496C13.8995 8.23323 14.424 7.82 14.9698 7.65657V12.0766C13.9931 12.0168 13.0519 11.791 12.1754 11.4144C12.5025 10.3851 12.9323 9.50905 13.4282 8.85496ZM11.8931 12.4491C12.8615 12.8467 13.8978 13.08 14.9698 13.1383V15.4694H11.5114C11.545 14.4018 11.679 13.3815 11.8931 12.4491ZM14.9698 16.5301V18.8612C13.8978 18.9194 12.8615 19.1527 11.8933 19.5503C11.6792 18.6179 11.5452 17.5976 11.5117 16.5301H14.9698ZM12.1754 20.585C13.0519 20.2083 13.9931 19.9827 14.9698 19.9229V24.3429C14.424 24.1794 13.8995 23.7662 13.4282 23.1445C12.9323 22.4904 12.5025 21.6144 12.1754 20.585ZM16.0306 24.3429V19.9229C17.0073 19.9827 17.9485 20.2084 18.8252 20.585C18.4981 21.6144 18.0683 22.4904 17.5724 23.1445C17.1011 23.7662 16.5765 24.1794 16.0306 24.3429ZM19.1073 19.5503C18.1389 19.1527 17.1026 18.9192 16.0306 18.8612V16.5301H19.489C19.4554 17.5976 19.3214 18.6179 19.1073 19.5503ZM16.0306 15.4694V13.1383C17.1026 13.08 18.1389 12.8467 19.1073 12.4491C19.3214 13.3815 19.4554 14.4018 19.489 15.4694H16.0306ZM18.8252 11.4144C17.9486 11.791 17.0074 12.0166 16.0306 12.0766V7.65657C16.5764 7.82 17.1009 8.23323 17.5723 8.85496C18.0681 9.50906 18.498 10.3851 18.8252 11.4144ZM18.3076 8.06054C19.4051 8.4499 20.3983 9.06068 21.2341 9.83927C20.7896 10.2539 20.308 10.6144 19.797 10.9188C19.4183 9.776 18.9112 8.80098 18.3076 8.06054ZM12.6925 8.06075C12.0891 8.80115 11.5821 9.77603 11.2032 10.9188C10.6922 10.6144 10.2106 10.2541 9.7661 9.83949C10.6019 9.06089 11.5951 8.4501 12.6925 8.06075ZM7.0952 15.4691C7.21035 13.6268 7.92154 11.9443 9.03659 10.6093C9.60823 11.1437 10.2344 11.5986 10.9025 11.9702C10.6427 13.0376 10.4854 14.2181 10.4505 15.4691H7.0952ZM9.76612 22.16C10.2108 21.7453 10.6923 21.385 11.2032 21.0807C11.5819 22.2234 12.089 23.1984 12.6924 23.9387C11.595 23.5493 10.6019 22.9385 9.76612 22.16ZM18.3077 23.9389C18.9111 23.1985 19.4183 22.2234 19.797 21.0807C20.308 21.385 20.7896 21.7454 21.2343 22.1602C20.3985 22.9388 19.4052 23.5495 18.3077 23.9389ZM21.9636 21.3898C21.3921 20.8557 20.7659 20.4008 20.0979 20.0291C20.3577 18.9616 20.515 17.7811 20.5499 16.5299H23.9052C23.7901 18.3724 23.0789 20.055 21.9636 21.3898ZM23.9052 15.4694H20.5499C20.515 14.2183 20.3575 13.0378 20.0977 11.9704C20.7658 11.5986 21.3921 11.1438 21.9636 10.6095C23.0789 11.9445 23.7901 13.627 23.9052 15.4694Z" fill="#7C96A5" stroke="#7C96A5" stroke-width="0.24"/>
                                            </svg>
                                        </a>
                                    <?php } ?>
                                    <?php if($logotwitter):
                                        $link_url = $logotwitter['url'];
                                        $link_title = $logotwitter['title'];
                                        $link_target = $logotwitter['target'] ? $logotwitter['target'] : '_self';?>
                                        <a class="social-link" href="<?php echo $link_url; ?>" target="_blank" aria-label="Twitter">
                                            <svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="15" cy="15.5" r="15" fill="#F2F6F7"/>
                                                <path d="M12.3372 22.9058C18.755 22.9058 22.2605 17.5883 22.2605 12.9825C22.2605 12.831 22.2605 12.6794 22.2473 12.5345C22.9391 12.0403 23.5256 11.4275 23.9934 10.729C23.3543 11.0124 22.6822 11.1969 21.9903 11.2759C22.7217 10.841 23.262 10.1558 23.5256 9.34531C22.8403 9.75383 22.0891 10.0372 21.3116 10.1887C19.9938 8.78523 17.7798 8.71934 16.3764 10.0372C15.4736 10.8872 15.0849 12.1589 15.3682 13.3713C12.5612 13.2329 9.94535 11.9085 8.17946 9.72748C7.25039 11.3221 7.72481 13.3647 9.25349 14.386C8.7 14.3728 8.1531 14.2213 7.67209 13.9511C7.67209 13.9643 7.67209 13.9775 7.67209 13.9972C7.67209 15.6577 8.84496 17.0876 10.4725 17.417C9.95853 17.5554 9.41822 17.5752 8.89767 17.4763C9.35233 18.8996 10.6636 19.8682 12.1593 19.9011C10.9271 20.8697 9.39845 21.3969 7.83023 21.3969C7.55349 21.3969 7.27674 21.3771 7 21.3441C8.58798 22.3655 10.4461 22.9058 12.3372 22.9058Z" fill="#7C96A5"/>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                    <?php if($logolinkedin):
                                        $link_url = $logolinkedin['url'];
                                        $link_title = $logolinkedin['title'];
                                        $link_target = $logolinkedin['target'] ? $logolinkedin['target'] : '_self';?>
                                        <a class="social-link" href="<?php echo $link_url; ?>" target="_blank" aria-label="Linkedin">
                                            <svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="15" cy="15.5" r="15" fill="#F2F6F7"/>
                                                <g clip-path="url(#clip0_1293_6764)">
                                                    <g clip-path="url(#clip1_1293_6764)">
                                                        <path d="M11.1337 22.2819H8.23125V13.0811H11.1337V22.2819ZM9.68094 11.826C8.75281 11.826 8 11.0693 8 10.1556C8 9.7168 8.1771 9.29593 8.49234 8.98562C8.80757 8.67531 9.23513 8.50098 9.68094 8.50098C10.1267 8.50098 10.5543 8.67531 10.8695 8.98562C11.1848 9.29593 11.3619 9.7168 11.3619 10.1556C11.3619 11.0693 10.6088 11.826 9.68094 11.826ZM21.9969 22.2819H19.1006V17.803C19.1006 16.7356 19.0787 15.3667 17.5916 15.3667C16.0825 15.3667 15.8513 16.5264 15.8513 17.7261V22.2819H12.9519V13.0811H15.7356V14.3362H15.7762C16.1637 13.6133 17.1103 12.8504 18.5225 12.8504C21.46 12.8504 22 14.7545 22 17.2278V22.2819H21.9969Z" fill="#7C96A5"/>
                                                    </g>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1293_6764">
                                                        <rect width="14" height="14" fill="white" transform="translate(8 8.5)"/>
                                                    </clipPath>
                                                    <clipPath id="clip1_1293_6764">
                                                        <rect width="14" height="15.75" fill="white" transform="translate(8 8.5)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                    <?php if($logoface):
                                        $link_url = $logoface['url'];
                                        $link_title = $logoface['title'];
                                        $link_target = $logoface['target'] ? $logoface['target'] : '_self';?>
                                        <a class="social-link" href="<?php echo $link_url; ?>" target="_blank" aria-label="Facebook">
                                            <svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="15" cy="15.5" r="15" fill="#F2F6F7"/>
                                                <g clip-path="url(#clip0_1293_6758)">
                                                    <path d="M18.4953 16.7428L18.8975 13.7204H15.8412V11.791C15.8412 10.9131 16.0945 10.3212 17.3713 10.3212H19V7.62038C18.2099 7.53876 17.4158 7.49858 16.6213 7.50004C14.2748 7.50004 12.6602 8.90273 12.6602 11.4911V13.7125H10V16.7349H12.6602V24.4862L15.8412 24.5V16.7428H18.4953Z" fill="#7C96A5"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1293_6758">
                                                        <rect width="9" height="17" fill="white" transform="translate(10 7.5)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row pt-5 pb-5">
                        <div class="col-md-12 pt-md-5">
                            <div class="line-top w-100"></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>
    <section class="section-info pb-md-5">
        <div class="container">
            <?php $title_box_bottom = get_field('title_box_bottom_about'); $cta_box_bottom = get_field('cta_box_bottom_about');
            if($title_box_bottom || $cta_box_bottom): ?>
                <div class="row equal mt-md-5 mb-5">
                    <div class="col-md-12">
                        <div class="w-100 h-100 pt-5 pb-5 bg-accent-grey-1 text-center d-flex flex-column align-items-center justify-content-center position-relative">
                            <svg class="shape-box-bottom hide-md" width="283" height="267" viewBox="0 0 283 267" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M79.5 0V156.5C79.5 189.637 106.363 216.5 139.5 216.5H227C254.89 216.5 277.5 239.11 277.5 267V267" stroke="#3877EC" stroke-width="10"/>
                                <path d="M180 267V231C180 197.863 153.137 171 120 171H2.83122e-06" stroke="#FFD0C0" stroke-width="10"/>
                            </svg>
                            <svg class="shape-box-bottom show-md" width="113" height="184" viewBox="0 0 113 184" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M32 0V110.699C32 131.962 49.237 149.199 70.5 149.199H74.1985C93.4188 149.199 109 164.78 109 184V184" stroke="#3877EC" stroke-width="8"/>
                                <path d="M71 184V148C71 114.863 44.1371 88 11 88H-3.8743e-07" stroke="#FFD0C0" stroke-width="8"/>
                            </svg>
                            <div class="info-box-botom z-index-2">
                                <?php if($title_box_bottom): ?>
                                    <h6 class="cl-blue pt-4"><?php echo $title_box_bottom; ?></h6>
                                <?php endif; ?>
                                <?php if($cta_box_bottom):
                                    $link_url = $cta_box_bottom['url'];
                                    $link_title = $cta_box_bottom['title'];
                                    $link_target = $cta_box_bottom['target'] ? $cta_box_bottom['target'] : '_self';?>
                                    <div class="box-cta-btn d-flex align-items-center justify-content-center mt-4 pb-4">
                                        <a class="cta-btn d-flex align-items-center cl-grey-3 cl-grey-3-h bg-white bg-accent-grey-1-h border-white border-grey-3-h" aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                                            <?php echo $link_title; ?>
                                            <span class="cta-arrows d-flex align-items-center ms-4">
                                                <svg class="arrow-short" width="33" height="13" viewBox="0 0 33 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1329_11274)">
                                                        <path d="M14 6.5H32" stroke="#617C8A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M27 1.5L32 6.5L27 11.5" stroke="#617C8A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1329_11274">
                                                            <rect width="33" height="12" fill="white" transform="translate(0 0.5)"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg class="arrow-long" width="33" height="13" viewBox="0 0 33 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1305_3418)">
                                                        <path d="M1 6.5L32 6.5" stroke="#617C8A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M27 1.5L32 6.5L27 11.5" stroke="#617C8A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1305_3418">
                                                            <rect width="33" height="12" fill="white" transform="translate(0 0.5)"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                        </span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</article>
<!-- #post-## -->