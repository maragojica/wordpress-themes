<?php
/**
 * The template for displaying content in the page-about.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php $headline = get_field('title_banner_about');
    $image = get_field('image_banner_1_about');
    $image2 = get_field('image_banner_2_about');
   ?>
    <section class="section-general bg-blue-dark">
        <section class="section-inside-banner section-contact d-flex align-items-center position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($headline): ?>
                            <h1 class="headline cl-white text-center"><?php echo $headline;?></h1>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php if ( !empty($image)) : ?>
                <img class="img-banner-about-1 img-fluid h-100 hide-lg fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
            <?php if ( !empty($image2)) : ?>
                <img class="img-banner-about-2 img-fluid h-100 hide-lg fit-cover-center" src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" />
            <?php endif; ?>
        </section>
        <section class="section-info-menu pt-5 pb-lg-5 pb-4">
            <div class="container pt-md-5 pb-lg-5">
                <?php $descr = get_field('description_home');  ?>
                <div class="row justify-content-between">
                    <div class="col-lg-6 pe-lg-5">
                        <?php if($descr): ?>
                            <div class="dp-1 cl-white"><?php echo $descr;?></div>
                        <?php endif;?>
                    </div>
                    <?php if( have_rows('menu_about') ): ?>
                        <div class="col-lg-5 pt-lg-0 pt-4 ps-lg-5">
                            <div class="list-group list-menu-about">
                                <?php while ( have_rows('menu_about') ) : the_row(); $link = get_sub_field('link_menu_about');
                                    if($link):
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';?>
                                        <a aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" class="anchor-link list-group-item list-group-item-action item-menu-about d-flex align-items-center justify-content-between">
                                            <?php echo $link_title; ?>
                                            <span class="cta-arrows d-flex align-items-center">
                                        <svg class="arrow-short" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_571_159)">
                                                <path d="M2.79004 12H20.25" stroke="#98E7E9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M13.8201 4L20.5801 11.43C20.8601 11.74 20.8601 12.25 20.5801 12.56L13.8201 19.99" stroke="#98E7E9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_571_159">
                                                    <rect width="24" height="24" fill="white"/>
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
        <?php if( have_rows('section_who_we_are') ): ?>
            <?php while( have_rows('section_who_we_are') ): the_row();

                // Get sub field values.
                $id = get_sub_field('id_section_who');
                $title = get_sub_field('title_section_who');
                $desc = get_sub_field('description_section_who');
                $img1 = get_sub_field('image_1_section_who');
                $img1mv = get_sub_field('image_1_section_who_mv');
                $img2 = get_sub_field('image_2_section_who');
                ?>
                <section class="pb-md-2 pb-4" <?php if($id):?>id="<?php echo $id;?>" <?php endif;?>>
                    <div class="container-fluid ps-lg-0 pe-lg-0">
                        <div class="row ms-lg-0 me-lg-0 equal">
                            <?php if ( !empty($img1)) : ?>
                                <div class="col-md-6 col-lg-3 ps-md-0 pe-md-1 col-img-who-ware-1 mb-md-0 mb-2">
                                    <div class="w-100 h-100">
                                        <img class="img-who-weare img-fluid w-100 h-100 fit-cover-center hide-sm" src="<?php echo esc_url($img1['url']); ?>" alt="<?php echo esc_attr($img1['alt']); ?>" />
                                        <?php if ( !empty($img1mv)) : ?>
                                            <img class="img-who-weare img-fluid w-100 h-100 fit-cover-center show-sm" src="<?php echo esc_url($img1mv['url']); ?>" alt="<?php echo esc_attr($img1mv['alt']); ?>" />
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($title || $desc): ?>
                                <div class="col-md-6 col-lg ps-md-1 pe-md-0 pe-lg-1 col-img-who-ware-2">
                                    <div class="w-100 h-100 bg-lighter box-info-who">
                                        <?php if($title): ?>
                                            <h2 class="cl-dark-green mb-xl-5 mb-4"><?php echo $title; ?></h2>
                                        <?php endif; ?>
                                        <?php if($desc): ?>
                                            <div class="dp-1 cl-dark"><?php echo $desc; ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if ( !empty($img2)) : ?>
                                <div class="col-lg-4 ps-lg-0 pe-lg-0 hide-lg col-img-who-ware-3">
                                    <div class="w-100 h-100">
                                        <img class="img-who-weare img-fluid w-100 h-100 fit-cover-center" src="<?php echo esc_url($img2['url']); ?>" alt="<?php echo esc_attr($img2['alt']); ?>" />
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    <?php if( have_rows('section_stake') ): ?>
        <?php while( have_rows('section_stake') ): the_row();

            // Get sub field values.
            $id = get_sub_field('id_section_stake');
            $title = get_sub_field('title_section');
            $subtitle = get_sub_field('subtitle_section');
            $desc = get_sub_field('description_section');
            ?>
            <section class="bg-lighter pb-md-5 pb-4 pt-md-5 pt-4" <?php if($id):?>id="<?php echo $id;?>" <?php endif;?>>
                <div class="container pt-md-5 pb-md-5">
                    <div class="row justify-content-center">
                        <?php if($title || $subtitle || $desc): ?>
                            <div class="col-lg-9">
                                <?php if($title): ?>
                                    <h2 class="cl-dark-green mb-4"><?php echo $title; ?></h2>
                                <?php endif; ?>
                                <?php if($subtitle): ?>
                                    <h3 class="cl-dark mb-4"><?php echo $subtitle; ?></h3>
                                <?php endif; ?>
                                <?php if($desc): ?>
                                    <div class="dp-1 cl-dark mb-tb-0"><?php echo $desc; ?></div>
                                <?php endif; ?>
                                <?php if( have_rows('list_stake') ): ?>
                                    <div class="row equal pt-4">
                                        <?php while ( have_rows('list_stake') ) : the_row();
                                            $number = get_sub_field('number_stake');
                                            $stake = get_sub_field('text_stake');?>
                                            <div class="col-md-4 mb-md-0 mb-2">
                                                <div class="w-100 h-100 bg-beige box-stake text-center">
                                                    <?php if($number): ?>
                                                        <div class="number cl-red"><?php echo $number; ?></div>
                                                    <?php endif; ?>
                                                    <?php if($stake): ?>
                                                        <h5 class="stake cl-red"><?php echo $stake; ?></h5>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php if( have_rows('section_believe') ): ?>
        <?php while( have_rows('section_believe') ): the_row();

            // Get sub field values.
            $id = get_sub_field('id_section_believe');
            $title = get_sub_field('title_section_believe');
            $subtitle = get_sub_field('subtitle_section_believe');
            $desc = get_sub_field('description_section_believe');
            ?>
            <section class="bg-lighter pb-md-5 pb-4" <?php if($id):?>id="<?php echo $id;?>" <?php endif;?>>
                <div class="container">
                    <div class="row justify-content-center">
                        <?php if($title || $subtitle || $desc): ?>
                            <div class="col-lg-9">
                                <?php if($title): ?>
                                    <h2 class="cl-dark-green mb-4"><?php echo $title; ?></h2>
                                <?php endif; ?>
                                <?php if($subtitle): ?>
                                    <h3 class="cl-dark mb-4"><?php echo $subtitle; ?></h3>
                                <?php endif; ?>
                                <?php if($desc): ?>
                                    <div class="dp-1 cl-dark mb-tb-0"><?php echo $desc; ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php if( have_rows('section_what_do') ): ?>
        <?php while( have_rows('section_what_do') ): the_row();

            // Get sub field values.
            $id = get_sub_field('id_section_what_do');
            $title = get_sub_field('title_section_what_do');
            $subtitle = get_sub_field('subtitle_section_what_do');
            $desc = get_sub_field('description_section_what_do');
            $gallery = get_sub_field('gallery_what_do');
            $caption = get_sub_field('caption_gallery_what_do');
            ?>
            <section class="bg-lighter pb-md-5 pb-4" <?php if($id):?>id="<?php echo $id;?>" <?php endif;?>>
                <div class="container pb-md-5">
                    <div class="row justify-content-center">
                        <?php if($title || $subtitle || $desc): ?>
                            <div class="col-lg-9">
                                <?php if($title): ?>
                                    <h2 class="cl-dark-green mb-4"><?php echo $title; ?></h2>
                                <?php endif; ?>
                                <?php if($subtitle): ?>
                                    <h3 class="cl-dark mb-4"><?php echo $subtitle; ?></h3>
                                <?php endif; ?>
                                <?php if($desc): ?>
                                    <div class="dp-1 cl-dark"><?php echo $desc; ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($gallery): ?>
                    <div class="container-fluid ps-0 pe-0">
                        <div class="row ms-md-0 me-md-0 equal">
                            <?php $i = 1; foreach( $gallery as $image ): ?>
                                <div class="col-6 col-md-4 col-ligthbox-whatdo pb-2 <?php if($i % 2 == 0){ ?>ps-2 pe-2<?php }else{ ?>ps-0 pe-0<?php } ?>">
                                    <div class="w-100 h-100">
                                            <img class="img-fluid h-100 w-100 fit-cover-center" src="<?php echo esc_url($image['url']); ?>" width="1800" height="1200" alt="<?php echo esc_attr($image['alt']); ?>">
                                    </div>
                                </div>
                            <?php $i++; endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($caption): ?>
                    <div class="container pt-3">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if($caption): ?>
                                    <div class="metadata cl-grey">
                                        <?php echo $caption;?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php if( have_rows('section_who_work') ): ?>
        <?php while( have_rows('section_who_work') ): the_row();

            // Get sub field values.
            $id = get_sub_field('id_section_who_work');
            $title = get_sub_field('title_section_who_work');
            $desc = get_sub_field('description_section_who_work');
            ?>
            <section class="bg-lighter pb-md-5 pb-4 pt-md-5 pt-4" <?php if($id):?>id="<?php echo $id;?>" <?php endif;?>>
                <div class="container">
                    <div class="row justify-content-center">
                        <?php if($title || $desc): ?>
                            <div class="col-md-7 text-center">
                                <?php if($title): ?>
                                    <h2 class="cl-dark-green mb-4"><?php echo $title; ?></h2>
                                <?php endif; ?>
                                <?php if($desc): ?>
                                    <div class="dp-1 cl-dark mb-tb-0"><?php echo $desc; ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php
                        $titleinfo = get_sub_field('title_our_network');
                        $textinfo = get_sub_field('text_our_network');
                        if( have_rows('list_our_network') ):  ?>
                           <div class="d-flex flex-md-row flex-column align-items-start align-items-md-center info-logo-work pt-5 pb-4">
                               <div class="d-flex align-items-center"><?php if($titleinfo): ?>
                                   <h6 class="cl-red mb-0 pe-3"><?php echo $titleinfo;?></h6>
                               <?php endif; ?>
                               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <g clip-path="url(#clip0_237_1401)">
                                       <path d="M2.79004 12H20.25" stroke="#EE6C4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path d="M13.8201 4L20.5801 11.43C20.8601 11.74 20.8601 12.25 20.5801 12.56L13.8201 19.99" stroke="#EE6C4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                   </g>
                                   <defs>
                                       <clipPath id="clip0_237_1401">
                                           <rect width="24" height="24" fill="white"/>
                                       </clipPath>
                                   </defs>
                               </svg>
                               </div>
                               <?php if($textinfo): ?>
                                   <div class="dp-1 dp-2 cl-grey ps-md-3 pt-md-0 pt-4"><?php echo $textinfo;?></div>
                               <?php endif; ?>
                           </div>
                           <div class="ournetwork-carousel logos-carousel owl-carousel mb-md-5">
                                <?php while( have_rows('list_our_network') ): the_row();
                                    $logo = get_sub_field('logolist_our_network');
                                    $link = get_sub_field('link_list_our_network'); ?>
                                    <div class="item animated fadeIn">
                                        <?php if(!empty($logo)): ?>
                                            <?php  if($link) {
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                                <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100"><?php } ?>
                                            <img class="logo-partner fluid-img m-auto d-block" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                                            <?php if($link) { ?>
                                                </a>
                                            <?php } ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                             </div>
                           <div class="divide-logos mt-md-5 mt-4 mb-md-5 mt-4"></div>
                        <?php endif; ?>
                        <?php
                        $titleinfo = get_sub_field('title_our_funders');
                        $textinfo = get_sub_field('text_our_funders');
                        if( have_rows('list_our_funders') ):  ?>
                            <div class="d-flex flex-md-row flex-column align-items-start align-items-md-center info-logo-work pt-5 pb-4">
                                <div class="d-flex align-items-center"><?php if($titleinfo): ?>
                                    <h6 class="cl-red mb-0 pe-3"><?php echo $titleinfo;?></h6>
                                <?php endif; ?>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_237_1401)">
                                        <path d="M2.79004 12H20.25" stroke="#EE6C4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.8201 4L20.5801 11.43C20.8601 11.74 20.8601 12.25 20.5801 12.56L13.8201 19.99" stroke="#EE6C4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_237_1401">
                                            <rect width="24" height="24" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg></div>
                                <?php if($textinfo): ?>
                                    <div class="dp-1 dp-2 cl-grey ps-md-3 pt-md-0 pt-4"><?php echo $textinfo;?></div>
                                <?php endif; ?>
                            </div>
                            <div class="ourfunders-carousel logos-carousel owl-carousel mb-md-5">
                                <?php while( have_rows('list_our_funders') ): the_row();
                                    $logo = get_sub_field('logo_our_funders');
                                    $link = get_sub_field('link_our_funders'); ?>
                                    <div class="item animated fadeIn">
                                        <?php if(!empty($logo)): ?>
                                            <?php  if($link) {
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                                <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100"><?php } ?>
                                            <img class="logo-partner fluid-img m-auto d-block" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                                            <?php if($link) { ?>
                                                </a>
                                            <?php } ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                            <div class="divide-logos mt-md-5 mt-4 mb-md-5 mt-4"></div>
                        <?php endif; ?>
                        <?php
                        $titleinfo = get_sub_field('title_our_partners');
                        $textinfo = get_sub_field('text_our_partners');
                        if( have_rows('list_our_partners') ):  ?>
                            <div class="d-flex flex-md-row flex-column align-items-start align-items-md-center info-logo-work pt-5 pb-4">
                                <div class="d-flex align-items-center"><?php if($titleinfo): ?>
                                    <h6 class="cl-red mb-0 pe-3"><?php echo $titleinfo;?></h6>
                                <?php endif; ?>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_237_1401)">
                                        <path d="M2.79004 12H20.25" stroke="#EE6C4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.8201 4L20.5801 11.43C20.8601 11.74 20.8601 12.25 20.5801 12.56L13.8201 19.99" stroke="#EE6C4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_237_1401">
                                            <rect width="24" height="24" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg></div>
                                <?php if($textinfo): ?>
                                    <div class="dp-1 dp-2 cl-grey ps-md-3 pt-md-0 pt-4"><?php echo $textinfo;?></div>
                                <?php endif; ?>
                            </div>
                            <div class="ourpartners-carousel logos-carousel owl-carousel mb-md-5">
                                <?php while( have_rows('list_our_partners') ): the_row();
                                    $logo = get_sub_field('logo_our_partners');
                                    $link = get_sub_field('link_our_partners'); ?>
                                    <div class="item animated fadeIn">
                                        <?php if(!empty($logo)): ?>
                                            <?php  if($link) {
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                                <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100"><?php } ?>
                                            <img class="logo-partner fluid-img m-auto d-block" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                                            <?php if($link) { ?>
                                                </a>
                                            <?php } ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php if( have_rows('section_more_about') ):
     while( have_rows('section_more_about') ): the_row();

            // Get sub field values.
            $id = get_sub_field('id_section_more_about');
            $title = get_sub_field('title_section_more_about');
            $desc = get_sub_field('description_section_more_about');
            ?>
    <section class="bg-beige pb-md-5 pb-4 pt-md-5 pt-4" <?php if($id):?>id="<?php echo $id;?>" <?php endif;?>>
        <div class="container pt-md-5 pb-md-5">
            <div class="row">
                <div class="col-md-12">
                    <?php if($title): ?>
                        <h4 class="cl-dark-green mb-4"><?php echo $title;?></h4>
                    <?php endif; ?>
                    <?php if($desc): ?>
                        <div class="dp-1 cl-dark mb-tb-0"><?php echo $desc; ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if( have_rows('list_resources') ):  ?>
                <div class="row pt-md-5 pt-4 equal">
                    <?php while( have_rows('list_resources') ): the_row();
                        $title = get_sub_field('title_list_resources');
                        $image = get_sub_field('image_list_resources');
                        $link = get_sub_field('link_list_resources');?>
                        <div class="col-md-4 mb-md-0 mb-2">
                            <div class="card card-resources w-100 h-100 d-flex flex-column">
                                <div  class="link-img-resource">
                                    <?php  if($link) {
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100"><?php } ?>
                                        <?php if ( !empty($image)) : ?>
                                            <img class="img-resources img-fluid m-auto h-100 w-100 d-block fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                        <?php endif; ?>
                                        <?php if($link) { ?>
                                    </a>
                                <?php } ?>
                                </div>
                                <div class="card-body w-100 d-flex flex-column">
                                    <?php  if($link) { ?>
                                    <a class="d-flex align-items-center cl-dark cl-black-h link-title-resource" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php } ?>
                                        <?php if($title): ?><h6><?php echo $title; ?></h6><?php endif; ?>
                                        <?php if($link) { ?>
                                    </a>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
     <?php endwhile; ?>
    <?php endif; ?>
    <?php if( get_field('title_bottom') || get_field('text_bottom')): ?>
    <section class="section-box-info bg-orange pt-md-5 pb-md-5">
            <div class="container">
                <div class="box-container-info bg-white">
                    <div class="row equal align-items-center">
                        <?php $title = get_field('title_bottom');
                        $text = get_field('text_bottom');
                        $cta = get_field('cta_bottom');
                        ?>
                        <div class="col-md-7 pb-md-0 pb-2">
                            <div class="w-100 h-100">
                                <?php if($title): ?>
                                    <h2 class="cl-red pb-3"><?php echo $title;?></h2>
                                <?php endif; ?>
                                <?php if($text): ?>
                                    <div class="dp-1 dp-2 cl-dark"><?php echo $text;?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                        if($cta) {
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self';?>

                            <div class="col-md">
                                <div class="box-cta-btn cta-btn-md d-flex align-items-center justify-content-md-end justify-content-start">
                                    <a class="cta-btn d-flex align-items-center cl-red cl-red-h bg-white bg-white-h border-red border-red-h" aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                                        <span class="cta-title"><?php echo $link_title; ?></span>
                                        <span class="cta-arrows d-flex align-items-center">
                                            <svg class="arrow-short" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_412_77)">
                                                    <path d="M2.32498 10.5H16.875" stroke="#EE6C4D" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M11.5167 3.83331L17.15 10.025C17.3833 10.2833 17.3833 10.7083 17.15 10.9666L11.5167 17.1583" stroke="#EE6C4D" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_412_77">
                                                        <rect width="20" height="20" fill="white" transform="translate(0 0.5)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                      </span>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</article>
<!-- #post-## -->