<?php

$id = get_sub_field('section_id_text_two_columns');

$title = get_sub_field('title_text_two_columns');

$text = get_sub_field('text_text_two_columns');

$addborder = get_sub_field('add_border_text_two_columns');

$bcolor = get_sub_field('border_color_text_two_columns');

$bt = get_sub_field('border_top_width');

$bb = get_sub_field('border_bottom_width');

$br = get_sub_field('border_right_width');

$bl = get_sub_field('border_left_width');?>

<section class="module module-block-text-two-columns pt-5 pb-5 no-boder-mv" <?php if($id):?>id="<?php echo $id; ?>" <?php endif; ?> <?php if($addborder): ?>style="border-width: <?php echo $bt;?>px <?php echo $br;?>px <?php echo $bb;?>px <?php echo $bl;?>px;  border-style: solid; border-color: <?php echo $bcolor ?>" <?php endif; ?>>

    <div class="container pt-md-5 pb-md-5">

        <div class="row align-items-end justify-content-between">

            <div class="col-lg-8">

                <?php if($title):?>

                <h2 class="title cl-black mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title; ?></h2>

                <?php endif; ?>

                <?php if($text):?>

                    <div class="dp-1 dp-2 bigmv-dp-2 cl-black wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $text; ?></div>

                <?php endif; ?>

            </div>

            <?php if( have_rows('links_text_two_columns') ): ?>

                <div class="col-lg-3 ps-xl-5 hide-lg col-box-more wow fadeInUp">

                    <?php while ( have_rows('links_text_two_columns') ) : the_row();

                        $title = get_sub_field('name_links_text_two_columns');

                        $cta = get_sub_field('link_links_text_two_columns');?>

                        <div class="box-more position-relative">

                            <?php if($title): ?>

                                <div class="label-2 cl-blue text-uppercase mb-2"><?php echo $title; ?></div>

                            <?php endif; ?>

                            <?php if($cta):

                            $link_url = $cta['url'];

                            $link_title = $cta['title'];

                            $link_target = $cta['target'] ? $cta['target'] : '_self';?>

                            <a class="cta-more" aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">

                                <?php echo $link_title; ?>

                            </a>

                            <?php endif; ?>

                        </div>

                    <?php endwhile; ?>

                </div>

            <?php endif; ?>

        </div>

</section>

