<?php
/**
 * The template for displaying content in the page-about.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php $headline = get_field('title_banner_network');
    $image = get_field('image_banner_1_network');
    $image2 = get_field('image_banner_2_network');
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
                <img class="img-banner-network-1 img-fluid h-100 hide-lg fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
            <?php if ( !empty($image2)) : ?>
                <img class="img-banner-network-2 img-fluid h-100 hide-lg fit-cover-center" src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" />
            <?php endif; ?>
        </section>
        <section class="section-info-menu pt-5 pb-lg-5 pb-4">
            <div class="container pt-md-5 pb-lg-5">
                <?php $descr = get_field('description_network');  ?>
                <div class="row justify-content-between">
                    <div class="col-lg-6 pe-lg-5">
                        <?php if($descr): ?>
                            <div class="dp-1 cl-white"><?php echo $descr;?></div>
                        <?php endif;?>
                    </div>
                    <?php if( have_rows('menu_network') ): ?>
                        <div class="col-lg-5 pt-lg-0 pt-4 ps-lg-5">
                            <div class="list-group list-menu-about">
                                <?php while ( have_rows('menu_network') ) : the_row(); $link = get_sub_field('link_menu_network');
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
    </section>
    <?php if( have_rows('section_detroit_summit') ): ?>
        <?php while( have_rows('section_detroit_summit') ): the_row();

            // Get sub field values.
            $id = get_sub_field('id_section_detroit_summit');
            $title = get_sub_field('title_section_detroit_summit');
            $subtitle = get_sub_field('subtitle_section_detroit_summit');
            $desc = get_sub_field('description_section_detroit_summit');
            $cta = get_sub_field('cta_detroit_summit');
            ?>
            <section class="bg-white pb-md-5 pb-4 pt-md-5 pt-4" <?php if($id):?>id="<?php echo $id;?>" <?php endif;?>>
                <div class="container pt-md-5 pb-md-5">
                    <div class="row justify-content-between pb-md-5">
                        <?php if($title || $subtitle || $desc): ?>
                            <div class="col-lg-4">
                                <?php if($title): ?>
                                    <h2 class="cl-dark-green mb-4"><?php echo $title; ?></h2>
                                <?php endif; ?>
                                <?php if($subtitle): ?>
                                    <h3 class="cl-dark mb-4"><?php echo $subtitle; ?></h3>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if($desc || $cta): ?>
                            <div class="col-lg-7">
                                <?php if($desc): ?>
                                    <div class="dp-1 cl-dark mb-tb-0"><?php echo $desc; ?></div>
                                <?php endif; ?>
                                <?php
                                if($cta) {
                                    $link_url = $cta['url'];
                                    $link_title = $cta['title'];
                                    $link_target = $cta['target'] ? $cta['target'] : '_self';?>

                                    <div class="box-cta-btn d-flex align-items-center pt-md-5 pt-3 pb-md-0 pb-5">
                                        <a class="cta-btn cta-btn-md d-flex align-items-center cl-dark-green cl-dark-green-h bg-white bg-white-h border-dark-green border-dark-green-h" aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                                            <span class="cta-title"><?php echo $link_title; ?></span>
                                        <span class="cta-arrows d-flex align-items-center">
                                            <svg class="arrow-short" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_412_77)">
                                                    <path d="M2.32498 10.5H16.875" stroke="#028A8B" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M11.5167 3.83331L17.15 10.025C17.3833 10.2833 17.3833 10.7083 17.15 10.9666L11.5167 17.1583" stroke="#028A8B" stroke-linecap="round" stroke-linejoin="round"/>
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
                                <?php } ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if( have_rows('list_videos_detroit_summit') ): ?>
                        <div class="row equal pt-md-5 pb-md-5 pb-4">
                        <?php while( have_rows('list_videos_detroit_summit') ): the_row();
                            $video_title = get_sub_field('video_title_detroit_summit');
                            $video_description = get_sub_field('video_descr_detroit_summit');
                            $video_source = get_sub_field('video_source_detroit_summit');
                            $poster = get_sub_field('video_poster_detroit_summit');
                            $youtube = get_sub_field('youtube_id_detroit_summit');
                            $vimeo = get_sub_field('vimeo_id_detroit_summit');
                            $local = get_sub_field('video_url_detroit_summit');
                            $videomp4 = get_sub_field('video_mp4_detroit_summit');
                            $videowebm = get_sub_field('webm_mp4_detroit_summit');
                            $videoogg = get_sub_field('ogg_mp4_detroit_summit'); ?>
                            <div class="col-md-6">
                                <div class="w-100 h-100">
                                    <div class="box-media-news w-100">
                                        <?php if( $video_source['value'] == "file" || $video_source['value'] == "local" ): ?>
                                            <video class="player" playsinline controls <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>>
                                                <?php if($video_source['value'] == "local" && $local){ ?>
                                                    <source src="<?php echo $local; ?>" type="video/mp4">
                                                <?php }else{ ?>
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
                                                <?php } ?>
                                                <?php if( $captions ): ?>
                                                    <!-- Captions are optional -->
                                                    <track kind="captions" label="English captions" src="<?php echo $captions['url']; ?>" srclang="en" default />
                                                <?php endif; ?>
                                            </video>
                                        <?php endif; ?>
                                        <?php if( $video_source['value'] == "youtube" ): ?>
                                            <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $youtube;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>></div>
                                        <?php endif; ?>
                                        <?php if( $video_source['value'] == "vimeo" ): ?>
                                            <div class="player" data-plyr-provider="vimeo" data-plyr-embed-id="<?php echo $vimeo;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>></div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($video_title || $video_description): ?>
                                        <div class="box-description w-100 py-md-4 py-3">
                                            <?php if($video_title): ?>
                                                <h6 class="cl-dark"><?php echo $video_title;?></h6>
                                            <?php endif; ?>
                                            <?php if($video_description): ?>
                                            <div class="metadata cl-grey">
                                                <?php echo $video_description;?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <?php
                    $title_logos_detroit_summit = get_sub_field('title_logos_detroit_summit');
                    $text_logos_detroit_summit = get_sub_field('text_logos_detroit_summit');
                    if( have_rows('list_logos_detroit_summit') ):  ?>
                        <div class="row pt-md-5 pb-md-5 pb-4">
                            <div class="col-md-12">
                                <?php if($title_logos_detroit_summit): ?>
                                    <h3 class="cl-dark mb-4"><?php echo $title_logos_detroit_summit; ?></h3>
                                <?php endif; ?>
                                <?php if($text_logos_detroit_summit): ?>
                                    <div class="dp-1 cl-dark"><?php echo $text_logos_detroit_summit; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row pb-md-5 equal align-items-center">
                        <?php while( have_rows('list_logos_detroit_summit') ): the_row();
                        $logo = get_sub_field('logo_list_detroit_summit');
                        $link = get_sub_field('link_list_detroit_summit'); ?>
                            <div class="col-4 col-md-3 col-lg-2-2 pb-md-0 pb-5">
                                <?php if(!empty($logo)): ?>
                                    <?php  if($link) {
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                        <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100"><?php } ?>
                                        <img class="logo-partner-network fluid-img m-auto d-block" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                                        <?php if($link) { ?>
                                        </a>
                                    <?php } ?>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php $gallery = get_sub_field('gallery_detroit_summit');
                $caption = get_sub_field('caption_gallery_detroit_summit'); ?>
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
    <?php if( have_rows('section_durham_summit') ): ?>
        <?php while( have_rows('section_durham_summit') ): the_row();

            // Get sub field values.
            $id = get_sub_field('id_section_durham_summit');
            $title = get_sub_field('title_section_durham_summit');
            $subtitle = get_sub_field('subtitle_section_durham_summit');
            $desc = get_sub_field('description_section_durham_summit');
            $cta = get_sub_field('cta_durham_summit');
            ?>
            <section class="bg-white pb-4 pt-md-5 pt-4" <?php if($id):?>id="<?php echo $id;?>" <?php endif;?>>
                <div class="container pt-md-5 pb-md-5">
                    <div class="row justify-content-between pb-md-5">
                        <?php if($title || $subtitle || $desc): ?>
                            <div class="col-lg-4">
                                <?php if($title): ?>
                                    <h2 class="cl-dark-green mb-4"><?php echo $title; ?></h2>
                                <?php endif; ?>
                                <?php if($subtitle): ?>
                                    <h3 class="cl-dark mb-4"><?php echo $subtitle; ?></h3>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if($desc || $cta): ?>
                            <div class="col-lg-7">
                                <?php if($desc): ?>
                                    <div class="dp-1 cl-dark mb-tb-0"><?php echo $desc; ?></div>
                                <?php endif; ?>
                                <?php
                                if($cta) {
                                    $link_url = $cta['url'];
                                    $link_title = $cta['title'];
                                    $link_target = $cta['target'] ? $cta['target'] : '_self';?>

                                    <div class="box-cta-btn d-flex align-items-center pt-md-5 pt-3 pb-md-0 pb-5">
                                        <a class="cta-btn cta-btn-md d-flex align-items-center cl-dark-green cl-dark-green-h bg-white bg-white-h border-dark-green border-dark-green-h" aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                                            <span class="cta-title"><?php echo $link_title; ?></span>
                                        <span class="cta-arrows d-flex align-items-center">
                                            <svg class="arrow-short" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_412_77)">
                                                    <path d="M2.32498 10.5H16.875" stroke="#028A8B" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M11.5167 3.83331L17.15 10.025C17.3833 10.2833 17.3833 10.7083 17.15 10.9666L11.5167 17.1583" stroke="#028A8B" stroke-linecap="round" stroke-linejoin="round"/>
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
                                <?php } ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if( have_rows('list_videos_durham_summit') ): ?>
                        <div class="row equal pt-md-5 pb-md-5 pb-4">
                            <?php while( have_rows('list_videos_durham_summit') ): the_row();
                                $video_title = get_sub_field('video_title_durham_summit');
                                $video_description = get_sub_field('video_descr_durham_summit');
                                $video_source = get_sub_field('video_source_durham_summit');
                                $poster = get_sub_field('video_poster_durham_summit');
                                $youtube = get_sub_field('youtube_id_durham_summit');
                                $vimeo = get_sub_field('vimeo_id_durham_summit');
                                $local = get_sub_field('video_url_durham_summit');
                                $videomp4 = get_sub_field('video_mp4_durham_summit');
                                $videowebm = get_sub_field('webm_mp4_durham_summit');
                                $videoogg = get_sub_field('ogg_mp4_durham_summit'); ?>
                                <div class="col-md-6">
                                    <div class="w-100 h-100">
                                        <div class="box-media-news w-100">
                                            <?php if( $video_source['value'] == "file" || $video_source['value'] == "local" ): ?>
                                                <video class="player" playsinline controls <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>>
                                                    <?php if($video_source['value'] == "local" && $local){ ?>
                                                        <source src="<?php echo $local; ?>" type="video/mp4">
                                                    <?php }else{ ?>
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
                                                    <?php } ?>
                                                    <?php if( $captions ): ?>
                                                        <!-- Captions are optional -->
                                                        <track kind="captions" label="English captions" src="<?php echo $captions['url']; ?>" srclang="en" default />
                                                    <?php endif; ?>
                                                </video>
                                            <?php endif; ?>
                                            <?php if( $video_source['value'] == "youtube" ): ?>
                                                <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $youtube;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>></div>
                                            <?php endif; ?>
                                            <?php if( $video_source['value'] == "vimeo" ): ?>
                                                <div class="player" data-plyr-provider="vimeo" data-plyr-embed-id="<?php echo $vimeo;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>></div>
                                            <?php endif; ?>
                                        </div>
                                        <?php if($video_title || $video_description): ?>
                                            <div class="box-description w-100 py-md-4 py-3">
                                                <?php if($video_title): ?>
                                                    <h6 class="cl-dark"><?php echo $video_title;?></h6>
                                                <?php endif; ?>
                                                <?php if($video_description): ?>
                                                    <div class="metadata cl-grey">
                                                        <?php echo $video_description;?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <?php
                    $title_logos_detroit_summit = get_sub_field('title_logos_durham_summit');
                    $text_logos_detroit_summit = get_sub_field('text_logos_durham_summit');
                    if( have_rows('list_logos_durham_summit') ):  ?>
                        <div class="row pt-md-5 pb-md-5 pb-4">
                            <div class="col-md-12">
                                <?php if($title_logos_detroit_summit): ?>
                                    <h3 class="cl-dark mb-4"><?php echo $title_logos_detroit_summit; ?></h3>
                                <?php endif; ?>
                                <?php if($text_logos_detroit_summit): ?>
                                    <div class="dp-1 cl-dark"><?php echo $text_logos_detroit_summit; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row pb-md-5 equal align-items-center">
                            <?php while( have_rows('list_logos_durham_summit') ): the_row();
                                $logo = get_sub_field('logo_list_durham_summit');
                                $link = get_sub_field('link_list_durham_summit'); ?>
                                <div class="col-4 col-md-3 col-lg-2-2 pb-md-0 pb-5">
                                    <?php if(!empty($logo)): ?>
                                        <?php  if($link) {
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                            <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100"><?php } ?>
                                        <img class="logo-partner-network fluid-img m-auto d-block" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                                        <?php if($link) { ?>
                                            </a>
                                        <?php } ?>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php $gallery = get_sub_field('gallery_durham_summit');
                $caption = get_sub_field('caption_gallery_durham_summit'); ?>
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