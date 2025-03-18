<?php

$id = get_sub_field('section_id_faq');

$title = get_sub_field('title_faq');

$text = get_sub_field('text_faq');

$subtitle = get_sub_field('subtitle_faq');

$image = get_sub_field('image_faq');

$quote = get_sub_field('quote_faq');

$name_faq = get_sub_field('name_faq');

$position_faq = get_sub_field('position_faq');

$addborder = get_sub_field('add_border_faq');

$bcolor = get_sub_field('border_color_faq');

$bt = get_sub_field('border_top_width');

$bb = get_sub_field('border_bottom_width');

$br = get_sub_field('border_right_width');

$bl = get_sub_field('border_left_width');?>

<section class="module module-block-faq pt-5 no-boder-mv" <?php if($id):?>id="<?php echo $id; ?>" <?php endif; ?> <?php if($addborder): ?>style="border-width: <?php echo $bt;?>px <?php echo $br;?>px <?php echo $bb;?>px <?php echo $bl;?>px;  border-style: solid; border-color: <?php echo $bcolor ?>" <?php endif; ?>>

    <div class="container pt-md-5 pb-md-5">

        <div class="row pb-5">

            <div class="col-lg-8">

                <?php if($title):?>

                    <h2 class="title cl-black mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title; ?></h2>

                <?php endif; ?>

                <?php if($text):?>

                    <div class="dp-1 cl-black wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $text; ?></div>

                <?php endif; ?>

            </div>

            <div class="col-lg-12 pt-lg-5 pt-4">

                <div class="divide"></div>

            </div>

        </div>

        <?php if($subtitle):?>

            <div class="row wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">

                <div class="col-md-12 pb-lg-5 pb-3">

                    <div class="title-section position-relative"><?php echo $subtitle; ?></div>

                </div>

            </div>

        <?php endif; ?>

        <div class="row">

            <div class="col-lg-4">

                <?php if ( !empty($image)) : ?>

                    <img class="img-fluid d-block m-auto" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />

                <?php endif; ?>

                <?php if($quote): ?>

                    <div class="quote-box hide-md wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">

                        <?php echo $quote; ?>

                    </div>

                <?php endif; ?>

                <?php if($name_faq): ?>

                    <div class="name-faq cl-black pb-1 hide-md wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $name_faq; ?></div>

                <?php endif; ?>

                <?php if($position_faq): ?>

                    <div class="position-faq cl-grey hide-md wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><?php echo $position_faq; ?></div>

                <?php endif; ?>

            </div>

            <?php if( have_rows('list_faq') ): ?>

                <div class="col-lg col-r-faq pt-md-0 pt-3">

                    <div>

                        <?php while ( have_rows('list_faq') ) : the_row();

                            $question = get_sub_field('question');

                            $answer = get_sub_field('answer');?>

                            <div class="box-faq">

                                <?php if($question): ?>

                                    <div class="dp-1 dp-3 cl-grey mb-md-4 mb-3"><?php echo $question; ?></div>

                                <?php endif; ?>

                                <?php if($answer): ?>

                                    <div class="dp-1 dp-2 p-qa cl-black mb-md-2"><?php echo $answer; ?></div>

                                <?php endif; ?>

                            </div>

                        <?php endwhile; ?>

                    </div>

                    <?php $caption = get_sub_field('photo_caption_faq');

                    if($caption): ?>

                        <div class="dp-1 dp-3 cl-grey mb-md-4 mb-3"><?php echo $caption; ?></div>

                    <?php endif; ?>

                </div>

            <?php endif; ?>

        </div>

        <div class="row">

            <div class="col-lg-12 pt-md-5 pt-4 mt-md-5">

                <div class="divide"></div>

            </div>

        </div>

</section>

