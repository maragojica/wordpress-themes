<section class="module module-block-video pt-5 pb-5 position-relative" <?php if (get_sub_field('section_id_video')): ?>id="<?php the_sub_field('section_id_video'); ?>" <?php endif; ?>>
    <div class="container pt-md-5 pb-md-5">
        <?php $title = get_sub_field('video_title');
        if ($title): ?>
            <div class="row wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                <div class="col-md-12">
                    <div class="title-section position-relative"><?php echo $title; ?></div>
                </div>
            </div>
        <?php endif; ?>
        <?php $share = get_sub_field('show_share_video');
        $poster = get_sub_field('video_poster');
        $video_source = get_sub_field('video_source');
        $captions = get_sub_field('video_captions');
        $local = get_sub_field('video_local');
        $videomp4 = get_sub_field('video_mp4');
        $videoogg = get_sub_field('video_ogg');
        $videowebm = get_sub_field('video_webm');
        $youtube = get_sub_field('youtube_id');
        $vimeo = get_sub_field('vimeo_id');
        $urlvideoshareface = "";
        $urltwitter = "";
        $urllinkedin = ""; ?>
        <div class="row pt-5">
            <div class="col-md-12">
                <?php if ($video_source['value'] == "file" || $video_source['value'] == "local"): ?>
                    <video class="player" playsinline controls <?php if (!empty($poster)): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>>
                        <?php if ($video_source['value'] == "local" && $local) {
                            $urlvideoshareface = "https://www.facebook.com/sharer/sharer.php?u=" . $local;
                            $urltwitter = "https://twitter.com/intent/tweet?url=" . $local;
                            $urllinkedin = "https://www.linkedin.com/shareArticle?mini=true&url=" . $local; ?>
                            <source src="<?php echo $local; ?>" type="video/mp4">
                        <?php } else { ?><?php if ($videomp4): $urlvideoshareface = "https://www.facebook.com/sharer/sharer.php?u=" . $videomp4["url"];
                            $urltwitter = "https://twitter.com/intent/tweet?url=" . $videomp4["url"];
                            $urllinkedin = "https://www.linkedin.com/shareArticle?mini=true&url=" . $videomp4["url"]; ?>
                            <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                               <?php endif; ?><?php if ($videoogg): ?>
                            <source src="<?php echo $videoogg['url']; ?>" type="video/ogg">
                               <?php endif; ?><?php if ($videowebm): ?>
                            <source src="<?php echo $videowebm['url']; ?>"  type="video/webm">
                            <?php endif; ?>
                            Your browser does not support the video tag.
                        <?php } ?>
                        <?php if ($captions): ?>
                            <!-- Captions are optional -->
                            <track kind="captions" label="English captions" src="<?php echo $captions['url']; ?>" srclang="en" default/>
                        <?php endif; ?>
                    </video>
                <?php endif; ?>
                <?php if ($video_source['value'] == "youtube"): $urlvideoshareface = "https://www.facebook.com/sharer/sharer.php?u=https://youtu.be/" . $youtube;
                    $urltwitter = "https://twitter.com/intent/tweet?url=https://youtu.be/" . $youtube;
                    $urllinkedin = "https://www.linkedin.com/shareArticle?mini=true&url=https://youtu.be/" . $youtube; ?>
                   <!-- <iframe  src="https://www.youtube-nocookie.com/embed/<?php echo $youtube; ?>?autoplay=1&mute=1&showinfo=0&rel=0&loop=1&modestbranding=1&playsinline=1" width="1920" height="1080" allowfullscreen uk-responsive uk-video="automute: true"></iframe>-->
                    <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $youtube;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>></div>
                <?php endif; ?>
                <?php if ($video_source['value'] == "vimeo"): $urlvideoshareface = "https://www.facebook.com/sharer/sharer.php?u=https://vimeo.com/" . $vimeo;
                    $urltwitter = "https://twitter.com/intent/tweet?url=https://vimeo.come/" . $vimeo;
                    $urllinkedin = "https://www.linkedin.com/shareArticle?mini=true&url=https://vimeo.com/" . $vimeo; ?>
                    <div class="player" data-plyr-provider="vimeo" data-plyr-embed-id="<?php echo $vimeo; ?>" <?php if (!empty($poster)): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>></div>                <?php endif; ?>
            </div>
        </div>
        <?php $text = get_sub_field('video_text');
        if ($text): ?>
            <div class="row pt-5 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
                <div class="col-md-12">
                    <div class="dp-1 dp-2 bigmv-dp-2 cl-black"><?php echo $text; ?></div>
                </div>
            </div>
        <?php endif; ?>
    </div> <?php if ($share): ?><?php if ($urlvideoshareface != "" || $urltwitter != "" || $urllinkedin != ""): ?>
        <div class="share-video-box">
            <p class="text-share-single d-block text-center">SHARE</p>

            <div class="social d-flex flex-column">
                <?php if ($urlvideoshareface != ""): ?>
                    <a href="<?php echo $urlvideoshareface; ?>" target="_blank" aria-label="Share Facebook">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="18" cy="18" r="17.75" fill="white" stroke="#EEEFFF" stroke-width="0.5"/>
                        <path d="M20.6635 18.5243L20.9316 16.3909H18.8941V15.0289C18.8941 14.4092 19.063 13.9914 19.9142 13.9914H21V12.085C20.4732 12.0274 19.9439 11.999 19.4142 12C17.8499 12 16.7735 12.9902 16.7735 14.8172V16.3853H15V18.5188H16.7735V23.9903L18.8941 24V18.5243H20.6635Z" fill="#5660FE"/>
                    </svg>
                </a>
                <?php endif; ?>
                <?php if ($urltwitter != ""): ?>
                    <!--<a href="<?php echo $urltwitter; ?>" target="_blank" aria-label="Share Twitter">-->
                        <a href="https://twitter.com/intent/tweet?url=&text=In%20its%2030th%20year%2C%20the%20Innocence%20Project%20helped%20to%20free%20or%20exonerate%20nine%20clients%20and%20stop%20the%20executions%20of%20Pervis%20Payne%20and%20Melissa%20Lucio.%20Read%20more%20about%20its%20work%20and%20consider%20supporting%3A%20https%3A%2F%2Freport2022.innocenceproject.org%2F" target="_blank" aria-label="Share Twitter">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="18" cy="18" r="17.75" fill="white" stroke="#EEEFFF" stroke-width="0.5"/>
                        <path d="M15.7674 22.8748C20.2977 22.8748 22.7721 19.1213 22.7721 15.8701C22.7721 15.7631 22.7721 15.6562 22.7628 15.5538C23.2512 15.205 23.6651 14.7725 23.9953 14.2794C23.5442 14.4794 23.0698 14.6097 22.5814 14.6655C23.0977 14.3585 23.4791 13.8748 23.6651 13.3027C23.1814 13.5911 22.6512 13.7911 22.1023 13.898C21.1721 12.9073 19.6093 12.8608 18.6186 13.7911C17.9814 14.3911 17.707 15.2887 17.907 16.1445C15.9256 16.0469 14.0791 15.112 12.8326 13.5725C12.1767 14.698 12.5116 16.1399 13.5907 16.8608C13.2 16.8515 12.814 16.7445 12.4744 16.5538C12.4744 16.5632 12.4744 16.5725 12.4744 16.5864C12.4744 17.7585 13.3023 18.7678 14.4512 19.0004C14.0884 19.098 13.707 19.112 13.3395 19.0422C13.6605 20.0469 14.586 20.7306 15.6419 20.7538C14.7721 21.4376 13.693 21.8097 12.586 21.8097C12.3907 21.8097 12.1953 21.7957 12 21.7725C13.1209 22.4934 14.4326 22.8748 15.7674 22.8748Z"  fill="#5660FE"/>
                    </svg>
                </a>
                <?php endif; ?>
                <?php if ($urllinkedin != ""): ?>
                    <a href="https://twitter.com/intent/tweet?url=&text=In%20its%2030th%20year%2C%20the%20Innocence%20Project%20helped%20to%20free%20or%20exonerate%20nine%20clients%20and%20stop%20the%20executions%20of%20Pervis%20Payne%20and%20Melissa%20Lucio.%20Read%20more%20about%20its%20work%20and%20consider%20supporting%3A%20https%3A%2F%2Freport2022.in" target="_blank" aria-label="Share Linkedin">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="18" cy="18" r="17.75" fill="white" stroke="#EEEFFF" stroke-width="0.5"/>
                        <path d="M14.6861 22.8132H12.1982V14.9268H14.6861V22.8132ZM13.4408 13.851C12.6453 13.851 12 13.2024 12 12.4193C12 12.0431 12.1518 11.6824 12.422 11.4164C12.6922 11.1504 13.0587 11.001 13.4408 11.001C13.8229 11.001 14.1894 11.1504 14.4596 11.4164C14.7298 11.6824 14.8816 12.0431 14.8816 12.4193C14.8816 13.2024 14.2361 13.851 13.4408 13.851ZM23.9973 22.8132H21.5148V18.9742C21.5148 18.0592 21.4961 16.8859 20.2213 16.8859C18.9279 16.8859 18.7296 17.8799 18.7296 18.9082V22.8132H16.2445V14.9268H18.6305V16.0026H18.6654C18.9975 15.3829 19.8088 14.729 21.0193 14.729C23.5371 14.729 24 16.3612 24 18.4811V22.8132H23.9973Z" fill="#5660FE"/>
                    </svg>
                </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php endif; ?>
</section>