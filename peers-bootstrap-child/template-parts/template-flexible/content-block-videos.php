<?php  $idsection = get_sub_field('id_section');
 $add_padding_top = get_sub_field('add_padding_top');
 $add_padding_bottom = get_sub_field('add_padding_bottom'); 
 $add_margin_top = get_sub_field('add_margin_top');
 $add_margin_bottom = get_sub_field('add_margin_bottom'); ?>
<section class="module-videos bg-white <?php if($add_padding_bottom): ?> pb-md-5 pb-4<?php endif;?> <?php if($add_padding_top): ?> pt-md-5 pt-4<?php endif; ?> <?php if($add_margin_top): ?> mt-4 <?php endif;?> <?php if($add_margin_bottom): ?> mb-4 <?php endif;?>" <?php if($idsection):?>id="<?php echo $idsection;?>" <?php endif;?>>
    <div class="container">
    <?php if( have_rows('list_videos') ): ?>
            <div class="row equal">
            <?php while( have_rows('list_videos') ): the_row();
                $video_title = get_sub_field('video_title');
                $video_description = get_sub_field('video_descr');
                $video_source = get_sub_field('video_source');
                $poster = get_sub_field('video_poster');
                $youtube = get_sub_field('youtube_id');
                $vimeo = get_sub_field('vimeo_id');
                $local = get_sub_field('video_url');
                $videomp4 = get_sub_field('video_mp4');
                $videowebm = get_sub_field('webm_mp4');
                $videoogg = get_sub_field('ogg_mp4'); ?>
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
    </div>
</section>