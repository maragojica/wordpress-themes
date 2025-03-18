<section class="module module-block-gallery r-line" <?php if(get_sub_field('section_id_gallery')):?>id="<?php the_sub_field('section_id_gallery'); ?>" <?php endif; ?>>

    <div class="container-fluid pe-0 ps-0">

        <div class="row align-items-center justify-content-between flex-lg-row-reverse me-0 ms-0">

            <div class="col-lg-7 col-xl-8 pb-lg-0 pb-md-5 pb-4 col-gallery pe-0 ps-0">

                <?php

                $gallery = get_sub_field('images_gallery');

                if ( $gallery ) : ?>



                    <div class="card-columns card-columns-gallery" uk-lightbox="animation: fade">

                        <?php foreach( $gallery as $image ): ?>

                            <div class="card border-0 no-border-radius">

                               <!-- <a class="uk-inline" href="<?php echo esc_url($image['url']); ?>" data-caption="<?php echo esc_attr($image['alt']); ?>">-->

                                <img class="img-fluid d-block m-auto w-100 h-100 fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />

                               <!-- </a>-->

                            </div>

                        <?php endforeach; ?>

                    </div>

                <?php endif; ?>

            </div>



            <div class="col-lg-5 col-xl-3 pe-xl-5 col-box-more">

                    <div class="box-more position-relative">

                        <?php

                        $subtitle = get_sub_field('title_gallery');

                        $text = get_sub_field('text_gallery');

                        $caption = get_sub_field('caption_gallery');

                        if($subtitle):?>

                            <div class="label-1 cl-copper text-uppercase mb-2  wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $subtitle; ?></div>

                        <?php endif; ?>

                        <?php if($text):?>

                            <div class="dp-1 dp-2 bigmv-dp-2 cl-black mb-3  wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $text; ?></div>

                        <?php endif; ?>

                        <?php if($caption): ?>

                            <div class="metadata-timeline cl-grey  wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><?php echo $caption;?></div>

                        <?php endif; ?>

                    </div>

            </div>

        </div>

</section>

