<?php

$id = get_sub_field('section_id_financial');

$title = get_sub_field('title_financial');

$text = get_sub_field('text_financial');

$addborder = get_sub_field('add_border_financial');

$bcolor = get_sub_field('border_color_financial');

$bt = get_sub_field('border_top_width');

$bb = get_sub_field('border_bottom_width');

$br = get_sub_field('border_right_width');

$bl = get_sub_field('border_left_width');?>

<section class="module module-block-financial pt-5 pb-5 no-boder-mv" <?php if($id):?>id="<?php echo $id; ?>" <?php endif; ?> <?php if($addborder): ?>style="border-width: <?php echo $bt;?>px <?php echo $br;?>px <?php echo $bb;?>px <?php echo $bl;?>px;  border-style: solid; border-color: <?php echo $bcolor ?>" <?php endif; ?>>

    <div class="container pt-md-5 pb-md-5">

        <div class="row align-items-end justify-content-between pb-md-5">

            <div class="col-md-12">

                <?php if($title):?>

                <h2 class="title cl-black mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title; ?></h2>

                <?php endif; ?>

                <?php if($text):?>

                    <div class="dp-1 dp-3 cl-grey wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $text; ?></div>

                <?php endif; ?>

            </div>

        </div>

        <?php if( have_rows('graphics_financial') ): ?>

                <?php while ( have_rows('graphics_financial') ) : the_row();

                    $title = get_sub_field('title_graphic');

                    $table = get_sub_field('table_graphic');

                    $image = get_sub_field('image_graphic');

                    $graph_code = get_sub_field('graphic_code');
                ?>

                <div class="row pt-md-5 pt-4">

                    <div class="col-md-8 pe-md-5">

                        <?php if($title): ?>

                            <h3 class="cl-black mb-md-5 mb-3 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><?php echo $title; ?></h3>

                        <?php endif; ?>

                        <?php if($table): ?>

                            <div class="table-box-graphics pe-md-5">

                                <?php echo $table; ?>

                            </div>

                        <?php endif; ?>

                    </div>

                    <div class="col-md">
                      <?php  if ( !empty($image)) : ?>
                        <img class="img-fluid d-block m-auto img-graphic wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.6s" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                      <?php endif; ?>
                        <?php if($graph_code): ?>
                            <canvas id="<?php echo $graph_code;?>" style="width:100%;max-width:367px; margin: 0 auto; display: block;"></canvas>
                        <?php endif; ?>
                    </div>
                </div>

                <?php endwhile; ?>

        <?php endif; ?>

</section>