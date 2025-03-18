<div class="row module module-block-videot justify-content-center pb-md-5 pb-4">
    <?php $pinfo = get_sub_field('video_info');
    $poster = get_sub_field('video_poster');
    $video_source = get_sub_field('video_source');
    $captions = get_sub_field('video_captions');
    $local = get_sub_field('video_local');
    $videomp4 = get_sub_field('video_mp4');
    $videoogg = get_sub_field('video_ogg');
    $videowebm = get_sub_field('video_webm');
    $youtube = get_sub_field('youtube_id');
    $vimeo = get_sub_field('vimeo_id'); ?>
    <div class="col-md-12">
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
    <?php if($pinfo): ?>
        <div class="col-lg-7">
            <p class="video-info"><?php echo $pinfo; ?></p>
        </div>
    <?php endif; ?>
</div>