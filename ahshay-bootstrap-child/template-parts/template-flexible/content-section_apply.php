<?php $id_apply_section = get_sub_field('id_apply_section');
    $bgcolor = get_sub_field('bg_color_section_apply');
    $title_section_apply = get_sub_field('title_section_apply');
    $text_section_apply = get_sub_field('text_section_apply'); ?>
    <section class="section-apply pt-5 pb-5" <?php if($id_apply_section): ?>id="<?= $id_apply_section;?>" <?php endif; ?> <?php if($bgcolor): ?> style="background-color: <?php echo $bgcolor;?>;" <?php endif; ?>>
        <div class="container pt-lg-5 pb-lg-5 pb-4 mt-lg-5">
            <div class="row">
                <div class="col-md-12">
                    <?php if($title_section_apply): ?>
                        <h2 class="cl-dark-brown text-uppercase link-text mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title_section_apply; ?></h2>
                    <?php endif; ?>
                    <?php if($text_section_apply): ?>
                    <h3 class="cl-dark-brown pb-lg-5 pb-3 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $text_section_apply; ?></h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="container pb-lg-5 mb-lg-5">
        <?php if( have_rows('list_positions') ): ?>

            <?php while( have_rows('list_positions') ) : the_row();

                // Load sub field value.
                $title = get_sub_field('position_title');
                $info = get_sub_field('position_info');
                $link = get_sub_field('position_cta');
                ?>
                <div class="row align-items-center row-apply-list pt-lg-5 pb-lg-5 pt-3 pb-3 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <div class="col-lg-6">
                        <div class="d-flex flex-lg-row flex-column">
                            <?php if($title): ?>
                            <h5 class="mb-lg-0 mb-2 me-lg-4 cl-slate"><?php $title;?></h5>
                            <?php endif; ?>
                            <?php if($info): ?>
                                <div class="dp-1 cl-slate-lt dp-b0"><?php echo $info; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <?php if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a tabindex="0" class="cta-1 cl-deep-terracotta cl-deep-terracotta-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?> <i class="fas fa-arrow-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>

        <?php endif; ?>
        </div>
    </section>