<?php
/**
 * The template for displaying content in the page-about.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( has_post_thumbnail() ) {
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
        $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
        <?php $title_banner_home = get_field('title_banner_about'); ?>
        <section class="banner-inside banner-about d-flex align-items-center" style="background-image: url(<?php echo $featured_img_url;?>);">
            <div class="container h-100 d-flex align-items-center position-relative">
                <div class="row flex-md-grow-1">
                    <div class="col-md-7 pt-md-0 pt-5">
                        <?php if($title_banner_home): ?>
                            <h1 class="cl-white pb-md-0 pb-5 pt-md-0 pt-5"><?php echo $title_banner_home;?></h1>
                        <?php endif;?>
                    </div>
                </div>
                <?php if( have_rows('links_pages_about') ): ?>
                        <div class="row equal row-links-about hide-md">
                            <?php while( have_rows('links_pages_about') ) : the_row();
                                $title = get_sub_field('text_pages_about');
                                $cta = get_sub_field('cta_pages_about');
                                ?>
                                <div class="col-md-4 pb-md-0 pb-5 col-link-about">
                                <?php  if($cta) {
                                    $link_url = $cta['url'];
                                    $link_title = $cta['title'];
                                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                                    <div class="w-100 h-100 box-info-about d-flex flex-column">
                                        <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100 d-flex flex-column box-link">
                                            <?php if($title): ?>
                                                <div class="title-link link-about cl-sky-blue pb-3 text-uppercase">
                                                    <?php echo $link_title; ?>
                                                    <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_529_404)">
                                                            <path d="M1.97626 8.69409H14.3438" stroke="#9FD8EA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M9.78918 3.02734L14.5775 8.29026C14.7758 8.50984 14.7758 8.87109 14.5775 9.09068L9.78918 14.3536" stroke="#9FD8EA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_529_404">
                                                                <rect width="17" height="17" fill="white" transform="translate(0 0.194092)"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <?php if($title): ?>
                                                <div class="dp-2 cl-white"><?php echo $title;?></div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    </div>
                                <?php } ?>
                            <?php endwhile; ?>
                        </div>
                <?php endif; ?>
            </div>
        </section>
        <?php if( have_rows('links_pages_about') ): ?>
            <section class="section-link-about pt-4 pb-4 bg-dark-blue show-md">
                <div class="container">
                    <div class="row equal row-links-about">
                        <?php while( have_rows('links_pages_about') ) : the_row();
                            $title = get_sub_field('text_pages_about');
                            $cta = get_sub_field('cta_pages_about');
                            ?>
                            <div class="col-md-4 pb-md-0 pb-4 col-link-about">
                            <?php  if($cta) {
                                $link_url = $cta['url'];
                                $link_title = $cta['title'];
                                $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                                <div class="w-100 h-100 box-info-about d-flex flex-column">
                                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100 d-flex flex-column box-link">
                                        <?php if($title): ?>
                                            <div class="title-link link-about cl-sky-blue pb-3 text-uppercase">
                                                <?php echo $link_title; ?>
                                                <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_529_404)">
                                                        <path d="M1.97626 8.69409H14.3438" stroke="#9FD8EA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M9.78918 3.02734L14.5775 8.29026C14.7758 8.50984 14.7758 8.87109 14.5775 9.09068L9.78918 14.3536" stroke="#9FD8EA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_529_404">
                                                            <rect width="17" height="17" fill="white" transform="translate(0 0.194092)"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <?php if($title): ?>
                                                <div class="dp-2 cl-white"><?php echo $title;?></div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </a>
                                </div>
                                </div>
                            <?php } ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php } ?>
    <?php if( have_rows('section_ourcampaign') ): ?>
        <?php while( have_rows('section_ourcampaign') ): the_row();

        // Get sub field values.
        $id = get_sub_field('id_ourcampaign');
        $bg = get_sub_field('bg_section_ourcampaign');
        $section_title = get_sub_field('section_title_ourcampaign');
        $section_descr = get_sub_field('descr_ourcampaign');
        $text_1 = get_sub_field('text_1_ourcampaign');
        $text_2 = get_sub_field('text_2_ourcampaign');
        $title_our_guiding = get_sub_field('title_our_guiding');
        ?>
        <section class="our-campaing pt-5 pb-5" <?php if($id): ?> id="<?php echo $id;?>" <?php endif; ?><?php if(!empty($bg)): ?>style="background-image: url(<?php echo esc_url($bg['url']); ?>); <?php endif;?>">
            <div class="container pt-md-4 pb-md-4">
                <div class="row">
                    <div class="col-md-12 pb-5">
                        <?php if($section_title): ?>
                            <h3 class="cl-white text-center pb-5 mb-md-4 mb-0"><?php echo $section_title;?></h3>
                        <?php endif; ?>
                        <?php if($section_descr): ?>
                            <div class="dp-1 cl-white mb-5 pb-md-5"><?php echo $section_descr;?></div>
                        <?php endif; ?>
                        <div class="divide d-block m-auto"></div>
                    </div>
                </div>
                <div class="row pt-md-5 pb-md-5">
                    <?php if($text_1): ?>
                        <div class="col-md-6 pb-md-0 pb-4 pe-md-5">
                            <div class="dp-2 cl-white"><?php echo $text_1;?></div>
                        </div>
                    <?php endif; ?>
                    <?php if($text_2): ?>
                        <div class="col-md-6 ps-md-5">
                            <div class="dp-2 cl-white"><?php echo $text_2;?></div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if( have_rows('list_our_guiding') ): ?>
                    <div class="box-content-guiding bg-white p-sm-5 p-3 pt-sm-5 pt-4 mt-md-5 mt-4 pb-md-5 pb-0">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if($title_our_guiding): ?>
                                    <h5 class="cl-black text-center"><?php echo $title_our_guiding; ?></h5>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row pt-sm-5 pt-4">
                            <?php while( have_rows('list_our_guiding') ): the_row();
                                $icon = get_sub_field('icon_list_our_guiding');
                                $number = get_sub_field('number_list_our_guiding');
                                $titlelist = get_sub_field('title_list_our_guiding');
                                $textlist = get_sub_field('text_list_our_guiding');?>
                                <div class="col-lg-4 col-guides pb-lg-0 pb-4">
                                   <?php if(!empty($icon)): ?>
                                       <img class="icon-guides m-auto d-block" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                                   <?php endif; ?>
                                    <div class="body-guides mt-md-5 mt-4">
                                        <?php if($number): ?>
                                            <div class="label-1 cl-opposition-red text-uppercase mb-3 text-center"><?php echo $number; ?></div>
                                        <?php endif; ?>
                                        <?php if($titlelist): ?>
                                            <h6 class="head-7 cl-black mb-3 text-lg-left text-center"><?php echo $titlelist;?></h6>
                                        <?php endif; ?>
                                        <?php if($textlist): ?>
                                            <div class="dp-3 cl-black text-lg-left text-center"><?php echo $textlist;?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if( have_rows('team_list') ):
        $bg_team = get_field('bg_team');
        $id = get_field('section_id_team');
        $team_title = get_field('team_title');    ?>
        <section class="section-team pt-5 pb-5" <?php if($id): ?> id="<?php echo $id;?>" <?php endif; ?><?php if(!empty($bg_team)): ?>style="background-image: url(<?php echo esc_url($bg_team['url']); ?>);<?php endif;?>">
            <div class="container pt-md-4 pb-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($team_title): ?>
                            <h3 class="cl-black text-center pb-5 mb-md-4 mb-0"><?php echo $team_title;?></h3>
                        <?php endif; ?>
                    </div>
                    <?php while( have_rows('team_list') ): the_row();
                        $photo = get_sub_field('photo_team_list');
                        $name = get_sub_field('name_team_list');
                        $text1= get_sub_field('text_1_team_list');
                        $text2= get_sub_field('text_2_team_list');
                        $linkedin = get_sub_field('link_team_list');
                        $website = get_sub_field('website_team_list');?>
                        <div class="col-sm-6 col-md-4 col-lg-3 pb-4">
                            <?php if(!empty($photo)): ?>
                                <img class="photo-team fluid-img fit-cover-center m-auto d-block" src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" />

                            <?php endif; ?>
                            <div class="body-guides mt-4">
                                <?php if($name): ?>
                                    <h5 class="cl-black"><?php echo $name; ?></h5>
                                <?php endif; ?>
                                <?php if($text1): ?>
                                    <div class="dp-3 cl-black mb-0"><?php echo $text1;?></div>
                                <?php endif; ?>
                                <?php if($text2): ?>
                                    <div class="dp-3 cl-black"><?php echo $text2;?></div>
                                <?php endif; ?>
                            </div>
                            <div class="d-flex align-items-center justify-content-sm-start justify-content-center pt-3">
                                <?php if($linkedin) {
                                    $link_url = $linkedin['url'];
                                    $link_title = $linkedin['title'];
                                    $link_target = $linkedin['target'] ? $linkedin['target'] : '_self'; ?>
                                    <a class="link-social  <?php if($website) { ?>me-3<?php } ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><i class="fa-brands fa-linkedin-in"></i><?php echo $link_title; ?></a>
                                <?php } ?>
                                <?php if($website) {
                                    $link_url = $website['url'];
                                    $link_title = $website['title'];
                                    $link_target = $website['target'] ? $website['target'] : '_self'; ?>
                                    <a class="link-social" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><i class="fa-solid fa-link"></i><?php echo $link_title; ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if( have_rows('partners_list') ):
        $id = get_field('section_id_partners');
        $team_title = get_field('partners_title');
        $partners_text = get_field('partners_text');?>
        <section class="section-partners pt-5 pb-5 bg-white" <?php if($id): ?> id="<?php echo $id;?>" <?php endif; ?>">
            <div class="container pt-md-4 pb-md-4">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <?php if($team_title): ?>
                            <h3 class="cl-black text-center pb-sm-5 pb-4 mb-md-4 mb-0"><?php echo $team_title;?></h3>
                        <?php endif; ?>
                        <?php if($partners_text): ?>
                            <div class="dp-1 cl-black text-center pb-md-5"><?php echo $partners_text;?></div>
                        <?php endif; ?>
                    </div>
                </div>
                 <div class="partner-carousel owl-carousel">
                    <?php while( have_rows('partners_list') ): the_row();
                        $photo = get_sub_field('logo_partners_list');
                        $link = get_sub_field('link_partners_list'); ?>
                        <div class="item animated fadeIn">
                            <?php if(!empty($photo)): ?>
                            <?php  if($link) {
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                            <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100"><?php } ?>
                                <img class="logo-partner fluid-img m-auto d-block" src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" />
                            <?php if($link) { ?>
                            </a>
                            <?php } ?>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                    </div>
            </div>
        </section>
    <?php endif; ?>
    <?php $bg_box_info = get_field('bg_box_info_about'); ?>
    <?php if( have_rows('box_info_about') ): ?>
        <section class="section-box-info pt-5 pb-5" <?php if(!empty($bg_box_info)): ?>style="background-image: url(<?php echo esc_url($bg_box_info['url']); ?>); <?php endif;?>">
            <div class="container">
                <div class="row equal">
                    <?php while( have_rows('box_info_about') ) : the_row();
                        $title = get_sub_field('title_box_info_about');
                        $cta = get_sub_field('link_box_info_about');
                        ?>
                        <div class="col-md pb-md-0 pb-2">
                        <?php  if($cta) {
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                            <div class="w-100 h-100 box-info box-info-about d-flex flex-column">
                                <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100 d-flex flex-column box-link bg-white-h">
                                    <?php if($title): ?>
                                        <h5 class="cl-black pb-3"><?php echo $title;?></h5>
                                        <div class="title-link cl-opposition-red">
                                            <?php echo $link_title; ?>
                                            <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_529_404)">
                                                    <path d="M1.97626 8.69409H14.3438" stroke="#E85F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M9.78918 3.02734L14.5775 8.29026C14.7758 8.50984 14.7758 8.87109 14.5775 9.09068L9.78918 14.3536" stroke="#E85F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_529_404">
                                                        <rect width="17" height="17" fill="white" transform="translate(0 0.194092)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                </a>
                            </div>
                            </div>
                        <?php } ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
</article>
<!-- #post-## -->