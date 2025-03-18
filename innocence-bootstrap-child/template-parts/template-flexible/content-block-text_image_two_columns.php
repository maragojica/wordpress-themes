<section class="module module-block-text-image-two-columns r-line pt-5 pb-lg-5" <?php if(get_sub_field('section_id_text_image_two_columns')):?>id="<?php the_sub_field('section_id_text_image_two_columns'); ?>" <?php endif; ?>>

    <div class="container pt-md-5 pb-md-5">

        <div class="row align-items-start justify-content-between flex-lg-row-reverse">

            <div class="col-lg-7 col-xl-8 pb-lg-0 pb-md-5 pb-4 wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.5s">

                <?php

                $image = get_sub_field('image_text_image_two_columns');

                if ( !empty($image)) : ?>

                        <img class="img-fluid d-block m-auto" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />

                <?php endif; ?>

            </div>



            <div class="col-lg-5 col-xl-3 pe-xl-5 col-box-more">

                    <div class="box-more position-relative">

                        <?php

                        $title = get_sub_field('title_text_image_two_columns');

                        $subtitle = get_sub_field('subtitle_text_image_two_columns');

                        $text = get_sub_field('text_text_image_two_columns');

                        $caption = get_sub_field('captio_text_image_two_columns');

                        if($subtitle):?>

                            <div class="label-2 label-1-mv cl-copper text-uppercase mb-2 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $subtitle; ?></div>

                        <?php endif; ?>

                       <?php if($title):?>

                        <h5 class="cl-black mb-3 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $title; ?></h5>

                        <?php endif; ?>

                        <?php if($text):?>

                            <div class="dp-1 dp-3 cl-black mb-3 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><?php echo $text; ?></div>

                        <?php endif; ?>

                        <?php if($caption): ?>

                            <div class="metadata-timeline cl-grey wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s"><?php echo $caption;?></div>

                        <?php endif; ?>

                    </div>

            </div>

        </div>

</section>

