
<?php
            $id_section_slider = get_sub_field('id_section_slider');
            $title = get_sub_field('title_slider_about');
            $subtitle = get_sub_field('subtitle_slider_about');
            $link = get_sub_field('cta_slider_about');
            $bg_color_section = get_sub_field('bg_color_slider_about');
            $bg_graphic = get_sub_field('bg_section_slider_about');
            ?>
            <section class="section-home module-slider-about pb-5 pt-5" <?php if($id_section_slider): ?>id="<?php echo $id_section_slider; ?>" <?php endif; ?><?php if($bg_color_section && !empty($bg_graphic)): ?>style="background: linear-gradient(<?php echo $bg_color_section;?>, <?php echo $bg_color_section;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php endif; ?>>
                <div class="container">
                    <div class="row align-items-center justify-content-center pt-lg-5 pb-lg-5">
                        <div class="col-lg-12">
                        <?php if($title): ?>
                        <h2 class="cl-white text-uppercase link-text mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title; ?></h2>
                        <?php endif; ?>    
                            <?php if($subtitle): ?>
                                <h3 class="cl-white mb-lg-5 mb-3 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $subtitle;?></h3>
                            <?php endif; ?>
                            <?php if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a tabindex="0" class="cta-1 cl-golden-yellow cl-golden-yellow-h wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?> <i class="fas fa-arrow-right"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if( have_rows('slider') ): ?>
                    <div class="container-fluid pe-md-0 ps-md-0 pt-5 pb-5">
                        <div class="posts-carousel owl-carousel">
                            <?php while( have_rows('slider') ): the_row();
                                $slide = get_sub_field('slide'); ?>
                                <div class="item animated fadeIn">
                                    <?php if ( !empty($slide)) : ?>
                                        <div class="w-100 h-100 box-image-slider radius-6">
                                            <img class="img-fluid radius-6 h-100 w-100 h-100 fit-cover-center" src="<?php echo esc_url($slide['url']); ?>" alt="<?php echo esc_attr($slide['alt']); ?>" />
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
