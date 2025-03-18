<section class="module module-block-main-slider bg-dark-2 position-relative" <?php if (get_sub_field('section_id_slider')): ?>id="<?php the_sub_field('section_id_slider'); ?>" <?php endif; ?>>
    <?php if (have_rows('slides_main')): ?>
        <div class="slides h-100 hide-lg">
            <?php while (have_rows('slides_main')) : the_row();
                $slide_image = get_sub_field('slide_image'); ?>
                <?php if (!empty($slide_image)) : ?>
                    <div class="slide h-100">
                        <img class="img-fluid fit-cover-center w-100 h-100" src="<?php echo esc_url($slide_image['url']); ?>"  alt="<?php echo esc_attr($slide_image['alt']); ?>"/>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <div class="show-lg h-100">
            <div  class="slider-main-slider owl-carousel position-relative h-100">
                <?php while (have_rows('slides_main')) : the_row();
                    $slide_image = get_sub_field('slide_image'); ?>
                    <div class="item animated fadeIn item-slide-main h-100">
                        <div class="box-slider-main h-100 w-100">
                            <?php if (!empty($slide_image)) : ?>
                                <img class="img-fluid fit-cover-center w-100 h-100" src="<?php echo esc_url($slide_image['url']); ?>"  alt="<?php echo esc_attr($slide_image['alt']); ?>"/>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="overlay-main-slider d-flex align-items-end">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <?php $title = get_sub_field('title_main_slider'); ?>
                <div class="col-lg-9">
                    <?php if ($title): ?>
                        <h1 class="cl-white headline mb-0 d-flex align-items-center align-items-center flex-column text-center">
                            <?php if ($title): echo $title; endif; ?>
                        </h1>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>