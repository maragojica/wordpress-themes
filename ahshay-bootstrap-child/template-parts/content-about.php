<?php
/**
 * The template for displaying content in the page-about.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if( have_rows('banner_about') ): ?>
        <?php while( have_rows('banner_about') ): the_row();

            // Get sub field values.
            $title = get_sub_field('title_banner_about');
            $titlemv = get_sub_field('titlemv_banner_about');
            $text = get_sub_field('text_banner_about');
            $image_desktop = get_sub_field('image_desktop');
            $image_mobile = get_sub_field('image_mobile');
            $bg_color_section = get_sub_field('bg_color_section');
            $bg_graphic = get_sub_field('bg_graphic');
            $image_info = get_sub_field('image_info');
            $title_menu = get_sub_field('title_menu');
            ?>
            <section class="section-home section-banner pb-5" <?if($bg_color_section && !empty($bg_graphic)): ?>style="background: linear-gradient(<?php echo $bg_color_section;?>, <?php echo $bg_color_section;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php endif; ?>>
                <div class="container-fluid container-fluid-home container-fluid-center position-relative">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if ( !empty($image_desktop)) : ?>
                                <img class="img-fluid hide-lg" src="<?php echo esc_url($image_desktop['url']); ?>" alt="<?php echo esc_attr($image_desktop['alt']); ?>" />
                            <?php endif; ?>
                            <?php if ( !empty($image_mobile)) : ?>
                                <img class="img-fluid show-lg" src="<?php echo esc_url($image_mobile['url']); ?>" alt="<?php echo esc_attr($image_mobile['alt']); ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="overlay hide-lg d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <?php if($title): ?>
                                        <h1 class="cl-white text-uppercase headline-home pt-lg-0 pt-5 mb-0 hide-lg wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title;?></h1>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container pt-lg-5 pb-lg-5">
                    <div class="row align-items-center pt-lg-4">
                        <div class="col-lg-5 hide-lg pe-lg-5">
                            <?php if ( !empty($image_info)) : ?>
                                <img class="img-fluid pe-lg-5" src="<?php echo esc_url($image_info['url']); ?>" alt="<?php echo esc_attr($image_info['alt']); ?>" />
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-7 ps-lg-5">
                            <?php if($text): ?>
                                <?php if($titlemv): ?>
                                    <h1 class="cl-white text-uppercase headline-home pt-lg-0 pt-5 mb-4 show-lg wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $titlemv;?></h1>
                                <?php endif; ?>
                                <div class="dp-1 cl-white link-text wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $text;?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                    if( have_rows('menu_list') ): ?>
                        <div class="row pt-5 pb-5">
                            <div class="col-md-12 pt-lg-5">
                                <div class="d-flex flex-column flex-lg-row justify-content-center justify-content-lg-start text-center text-lg-start">
                                    <?php if($title_menu): ?>
                                        <div class="d-flex align-items-center justify-content-center label-2 cl-white mb-lg-0 mb-2 me-lg-3 me-0 text-lg-start text-center"><?=$title_menu; ?></div>
                                    <?php endif; ?>
                                    <?php while( have_rows('menu_list') ): the_row(); $link = get_sub_field('link_menu'); ?>
                                        <?php if( $link ):
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                            ?>
                                            <div class="box-cta-btn me-lg-2 ms-lg-2 mb-lg-0 mb-2">
                                                <a tabindex="0" class="cta-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php $text = get_sub_field('description_about'); 
                    $image_info = get_sub_field('image_about');?>
                      <div class="row align-items-center pt-5">
                    <div class="col-lg-8 pe-lg-5">
                        <?php if($text): ?>
                        <div class="dp-1 cl-white link-text wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $text;?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-4 hide-lg ps-lg-5">
                        <?php if ( !empty($image_info)) : ?>
                            <div class="w-100 text-lg-end text-center">
                                <img class="img-fluid icon-about" width="182" height="182" src="<?php echo esc_url($image_info['url']); ?>" alt="<?php echo esc_attr($image_info['alt']); ?>" />
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                </div>
                <?php $add_video = get_sub_field('add_video');
                $title_video = get_sub_field('title_video');
                $text_video = get_sub_field('text_video');
                $poster = get_sub_field('video_poster');
                $video_source = get_sub_field('video_source');
                $captions = get_sub_field('video_captions');
                $local = get_sub_field('video_local');
                $videomp4 = get_sub_field('video_mp4');
                $videoogg = get_sub_field('video_ogg');
                $videowebm = get_sub_field('video_webm');
                $youtube = get_sub_field('youtube_id');
                $iframeyoutube = get_sub_field('iframe_youtube');
                $vimeo = get_sub_field('vimeo_id');
                if($add_video): ?>
                    <div class="container">
                        <div class="row pt-5 pb-md-5 pb-4">
                            <div class="col-md-12">
                                <?php if($title_video): ?>
                                     <h3 class="cl-dark-brown mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title_video;?></h3>
                                <?php endif; ?>
                                <?php if($text_video): ?>
                                    <div class="dp-1 cl-dark-brown wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $text_video;?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid container-fluid-center pb-lg-5">
                        <div class="row">
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
                               <!-- <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $youtube;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>></div>-->                              
                                    <?php if($iframeyoutube): ?>
                                    <div class="frame-youtube">
                                        <?= $iframeyoutube; ?>    
                                    </div>   
                                    <?php endif; ?> 
                            <?php endif; ?>
                            <?php if( $video_source['value'] == "vimeo" ): ?>
                                <div class="player" data-plyr-provider="vimeo" data-plyr-embed-id="<?php echo $vimeo;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>></div>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php if (have_rows('modules_flexible')): ?>               
        <?php while(have_rows('modules_flexible')): the_row();
            get_template_part('template-parts/template-flexible/content', get_row_layout());
        endwhile; ?>              
     <?php endif; ?>      


    <?php $show_info_bottom= get_field('show_info_bottom');
    if($show_info_bottom): ?>
        <section class="bg-golden-yellow pb-5 pt-5">
            <div class="container">
                <div class="row align-items-center pt-lg-5 pb-lg-5">
                    <?php $title = get_field('title_contact_info');
                    if($title): ?>
                        <div class="col-lg-6">
                            <h3 class="cl-dark-brown mb-lg-0 mb-3 text-lg-start text-center"><?= $title;?></h3>
                        </div>
                    <?php endif; ?>
                    <?php
                    $link = get_field('cta_contact_info');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                        <div class="col-lg-6 text-lg-start text-center">
                            <a tabindex="0" class="cta-1 big-cta cl-dark-brown cl-dark-brown-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?> <i class="fas fa-arrow-right"></i></a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </section>
    <?php endif; ?>
</article>
<!-- #post-## -->