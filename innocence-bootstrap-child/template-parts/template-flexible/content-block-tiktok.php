<section class="module module-block-tiktok l-line pt-5" <?php if (get_sub_field('section_id_tiktok')): ?>id="<?php the_sub_field('section_id_tiktok'); ?>" <?php endif; ?>>
    <?php if (have_rows('tiktok_list')): ?>
        <div class="container-fluid show-xxl pe-0">
            <div class="slider-tiktok owl-carousel">
                <?php while (have_rows('tiktok_list')) : the_row();
                    $tiktok_video = get_sub_field('tiktok_video'); ?>
                    <div class="item animated fadeIn item-icon">
                        <?php if ($tiktok_video): ?>
                            <div class="tiktok-video w-100"><?php echo $tiktok_video; ?></div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="container pt-md-5">
        <div class="row align-items-start justify-content-between">
            <div class="col-lg-7 col-xl-9 pb-lg-0 pb-md-5 pb-4 hide-xxl">
                <?php if (have_rows('tiktok_list')): ?>
                    <div class="row row-tiktok">
                        <?php while (have_rows('tiktok_list')) : the_row();
                            $tiktok_video = get_sub_field('tiktok_video'); ?>
                            <div class="col-lg-4 pe-1 ps-1">
                                <?php if ($tiktok_video): ?>
                                    <div  class="tiktok-video w-100"><?php echo $tiktok_video; ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-5 col-xl-3 ps-xl-5 pe-xl-4 pt-0 col-box-more">
                <div class="box-more position-relative">
                    <?php $subtitle = get_sub_field('title_tiktok');
                    $text = get_sub_field('text_tiktok');
                    if ($subtitle): ?>
                        <div class="label-1 cl-copper text-uppercase mb-2 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $subtitle; ?></div>
                    <?php endif; ?>
                    <?php if ($text): ?>
                        <div  class="dp-1 dp-2 bigmv-dp-2 cl-black wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $text; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>