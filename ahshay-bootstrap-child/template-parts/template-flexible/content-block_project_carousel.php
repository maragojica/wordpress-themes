

<?php $section_id = get_sub_field('section_id'); ?>
 <?php if( have_rows('project_carousel') ): ?>
            <section class="section-carousel pb-md-5 pt-md-5" <?php if($section_id): ?> id="<?php echo $section_id; ?>" <?php endif; ?>>
                <div class="container-fluid pe-0 ps-0 pt-md-5 pb-md-5">
                    <div class="posts-carousel owl-carousel">
                    <?php
                        while( have_rows('project_carousel') ): the_row();
                            $slide = get_sub_field('project_carousel_image');
                    ?>
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
            </section>
    <?php endif; ?>