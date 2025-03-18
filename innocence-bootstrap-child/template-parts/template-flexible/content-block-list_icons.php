<section class="module module-block-list-icons pt-5 pb-5" <?php if (get_sub_field('section_id_list_icons')): ?>id="<?php the_sub_field('section_id_list_icons'); ?>" <?php endif; ?>>
    <div class="container pt-lg-5 pb-md-5">
        <?php $title = get_sub_field('title_section_list_icons');
        if ($title): ?>
            <div class="row wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.1s">
                <div class="col-md-12 pb-5">
                    <div class="title-section position-relative"><?php echo $title; ?></div>
                </div>
            </div>
        <?php endif; ?>
        <?php if (have_rows('info_list_icons')): ?>
            <div class="row pt-4 hide-lg">
                <?php while (have_rows('info_list_icons')) : the_row();
                    $title = get_sub_field('title_info_list_icons');
                    $text = get_sub_field('text_info_list_icons');
                    $image = get_sub_field('image_info_list_icons'); ?>
                    <div class="col-lg-6 col-xl-3 pb-xl-0 pb-4">
                        <?php if (!empty($image)) : ?>
                            <img class="img-fluid d-block m-auto  wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.2s" src="<?php echo esc_url($image['url']); ?>"  alt="<?php echo esc_attr($image['alt']); ?>"/>
                        <?php endif; ?>
                        <?php if ($title): ?>
                            <div class="label-2 label-1-mv cl-copper text-uppercase mb-4 mt-4 pt-2  wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $title; ?></div>
                        <?php endif; ?>
                        <?php if ($text): ?>
                            <div class="dp-1 dp-2 bigmv-dp-2 cl-black  wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><?php echo $text; ?></div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div> <?php if (have_rows('info_list_icons')): ?>
        <div class="container-fluid show-lg ps-0 pe-0">
            <div  class="slider-icons owl-carousel">
                <?php while (have_rows('info_list_icons')) : the_row();
                    $title = get_sub_field('title_info_list_icons');
                    $text = get_sub_field('text_info_list_icons');
                    $image = get_sub_field('image_info_list_icons'); ?>
                    <div class="item animated fadeIn item-icon">
                        <div class="box-slider-icons h-100 w-100">
                            <?php if (!empty($image)) : ?>
                                <img class="img-fluid d-block m-auto" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"/>
                            <?php endif; ?>
                            <?php if ($title): ?>
                                <div  class="label-2 label-1-mv cl-copper text-uppercase mb-4 mt-4 pt-2"><?php echo $title; ?></div>
                            <?php endif; ?>
                            <?php if ($text): ?>
                                <div  class="dp-1 dp-2 bigmv-dp-2 cl-black"><?php echo $text; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</section>