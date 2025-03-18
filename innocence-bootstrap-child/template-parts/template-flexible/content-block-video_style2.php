<section class="module module-block-video_style2 r-line pt-5 pb-5" <?php if (get_sub_field('section_id_video2')): ?>id="<?php the_sub_field('section_id_video2'); ?>" <?php endif; ?>>
    <div class="container pt-md-5 pb-md-5">
        <div class="row align-items-end justify-content-between flex-lg-row-reverse">
            <div class="col-lg-7 col-xl-8 pb-lg-0 pb-md-5 pb-4">
                <?php $poster = get_sub_field('video_poster');
                $video_source = get_sub_field('video_source');
                $captions = get_sub_field('video_captions');
                $local = get_sub_field('video_local');
                $videomp4 = get_sub_field('video_mp4');
                $videoogg = get_sub_field('video_ogg');
                $videowebm = get_sub_field('video_webm');
                $youtube = get_sub_field('youtube_id');
                $vimeo = get_sub_field('vimeo_id'); ?>
                <?php if ($video_source['value'] == "file" || $video_source['value'] == "local"): ?>
                    <video class="player" playsinline  controls <?php if (!empty($poster)): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>>
                        <?php if ($video_source['value'] == "local" && $local) { ?>
                            <source src="<?php echo $local; ?>"  type="video/mp4">
                        <?php } else { ?><?php if ($videomp4): ?>
                            <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                        <?php endif; ?><?php if ($videoogg): ?>
                            <source src="<?php echo $videoogg['url']; ?>"  type="video/ogg">
                        <?php endif; ?><?php if ($videowebm): ?>
                            <source src="<?php echo $videowebm['url']; ?>" type="video/webm">
                        <?php endif; ?>
                            Your browser does not support the video tag.
                        <?php } ?>
                        <?php if ($captions): ?>
                            <!-- Captions are optional -->
                            <track kind="captions" label="English captions" src="<?php echo $captions['url']; ?>" srclang="en" default/>
                        <?php endif; ?>
                    </video>
                <?php endif; ?>
                <?php if ($video_source['value'] == "youtube"): ?>
                   <!-- <iframe  src="https://www.youtube-nocookie.com/embed/<?php echo $youtube; ?>?autoplay=1&mute=1&showinfo=0&rel=0&loop=1&modestbranding=1&playsinline=1" width="1920" height="1080" allowfullscreen uk-responsive  uk-video="automute: true"></iframe>-->
                    <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $youtube;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>></div>
                <?php endif; ?>
                <?php if ($video_source['value'] == "vimeo"): ?>
                    <div class="player" data-plyr-provider="vimeo"  data-plyr-embed-id="<?php echo $vimeo; ?>" <?php if (!empty($poster)): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-5 col-xl-3 pe-xl-5 col-box-more">
                <div class="box-more position-relative">
                    <?php $subtitle = get_sub_field('video_title');
                    $text = get_sub_field('video_text');
                    if ($subtitle): ?>
                        <div class="label-1 cl-copper text-uppercase mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                            <svg class="d-inline me-2 icon-play" width="28" height="29" viewBox="0 0 28 29" fill="none"  xmlns="http://www.w3.org/2000/svg">
                                <ellipse rx="14" ry="14" transform="matrix(-4.37114e-08 1 1 4.37114e-08 14 14.8253)"  fill="#DE9C7F"/>
                                <path  d="M11.8702 9.5612C11.2045 9.13756 10.3333 9.61577 10.3333 10.4049V19.5949C10.3333 20.3839 11.2045 20.8622 11.8702 20.4385L19.0909 15.8435C19.7084 15.4506 19.7084 14.5491 19.0909 14.1562L11.8702 9.5612Z"  fill="white"/>
                            </svg>
                            <?php echo $subtitle; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($text): ?>
                        <div  class="dp-1 dp-2 bigmv-dp-2 cl-black mb-3 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $text; ?></div>
                    <?php endif; ?>
                    <?php if (have_rows('logo_list')): ?>
                        <div class="info-logos d-flex justify-content-center align-items-end wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
                            <?php while (have_rows('logo_list')) : the_row();
                                $img = get_sub_field('logo_logo_list');
                                $cta = get_sub_field('link_logo_list') ?>
                                <div class="box-logo d-flex align-items-center justify-content-center">
                                    <?php if ($cta) {
                                    $link_url = $cta['url'];
                                    $link_title = $cta['title'];
                                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"><?php } ?>
                                        <?php if (!empty($img)): ?>
                                         <img class="logo-img img-fluid m-auto" src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>"/>
                                        <?php endif; ?>
                                        <?php if ($cta) { ?>
                                    </a>
                                <?php } ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</section>