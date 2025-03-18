<section class="section-partners">
    <div class="container">
        <?php if (get_sub_field('show_two_columns')) : ?>

            <div class="row row-cols-2 pb-4">
                <?php while (have_rows('column_one')) : the_row(); ?>
                    <?php
                    $select_partners = get_sub_field('select_partners');
                    $partners_count = count($select_partners);
                    $rest = 3 - $partners_count;
                    ?>
                    <div class="col-12 col-sm-12 col-md-7-1">
                        <h2 class="title-section cl-gray font-adrianna pb-5 text-uppercase"><?php echo get_sub_field('title'); ?></h2>
                        <div class="row row-cols-3 row-partners d-flex align-items-center justify-content-center">
                            <?php foreach ($select_partners as $partner): ?>
                                <?php
                                $post = get_post($partner);
                                ?>
                                <div class="col-12 col-sm-6 col-md pb-4">
                                    <div class="box-img-partner">
                                        <img class="m-auto d-block img-fluid" alt="<?php echo $partner->post_title ?>" src="<?php echo get_the_post_thumbnail_url( $partner->ID ); ?>">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php if ($rest > 0): ?>
                                <?php for ($i = 0; $i < $rest; $i++): ?>
                                    <div class="col-12 col-sm-6 col-md pb-4"></div>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php endwhile; ?>

                <?php while (have_rows('column_two')) : the_row(); ?>
                    <?php
                    $select_partners = get_sub_field('select_partners');
                    $partners_count = count($select_partners);
                    $rest = 2 - $partners_count;
                    ?>
                    <div class="col-12 col-sm-12 col-md">
                        <h2 class="title-section cl-gray font-adrianna pb-5 text-uppercase"><?php echo get_sub_field('title'); ?></h2>

                        <div class="row row-cols-3 row-partners d-flex align-items-center justify-content-center">
                            <?php foreach ($select_partners as $partner): ?>
                                <?php
                                $post = get_post($partner);
                                ?>
                                <div class="col-12 col-sm-6 col-md pb-4">
                                    <div class="box-img-partner">
                                        <img class="m-auto d-block img-fluid" alt="<?php echo $partner->post_title ?>" src="<?php echo get_the_post_thumbnail_url( $partner->ID ); ?>">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php if ($rest > 0): ?>
                                <?php for ($i = 0; $i < $rest; $i++): ?>
                                    <div class="col-12 col-sm-6 col-md pb-4"></div>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php endwhile; ?>
            </div>

        <?php else: ?>

            <?php while (have_rows('column_one')) : the_row(); ?>
                <?php
                $select_partners = get_sub_field('select_partners');
                $partners_count = count($select_partners);
                $rest = 5 - $partners_count;
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title-section cl-gray font-adrianna pb-5 text-uppercase"><?php echo get_sub_field('title'); ?></h2>
                    </div>
                </div>
                <div class="row row-cols-5 row-partners align-items-center pb-4">
                    <?php foreach ($select_partners as $partner): ?>
                        <?php
                        $post = get_post($partner);
                        ?>
                        <div class="col-12 col-sm-6 col-md pb-4">
                            <div class="box-img-partner">
                                <img class="m-auto d-block img-fluid" alt="<?php echo $partner->post_title ?>" src="<?php echo get_the_post_thumbnail_url( $partner->ID ); ?>">
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php if ($rest > 0): ?>
                        <?php for ($i = 0; $i < $rest; $i++): ?>
                            <div class="col-12 col-sm-6 col-md pb-4"></div>
                        <?php endfor; ?>
                    <?php endif; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php endwhile; ?>

        <?php endif; ?>

    </div>
</section>