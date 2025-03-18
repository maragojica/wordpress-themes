<?php

$id = get_sub_field('section_id_clients');

$title = get_sub_field('section_title_clients');

$bg_color = get_sub_field('bg_color_clients');?>

<section class="module module-block-clients d-flex align-items-center justify-content-center" <?php if($id):?>id="<?php echo $id; ?>" <?php endif; ?> <?php if($bg_color): ?>style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>

    <div class="container-fluid ps-0 pe-0">

        <div class="row row-clients flex-lg-row-reverse equal me-0 ms-0">

            <div class="col-lg pe-0 ps-0 ps-lg-5 hide-lg">

                <?php if( have_rows('clients_list') ): ?>

                    <div class="w-100 h-100 uk-switcher switcher-images" id="box-image-clients">

                        <?php while ( have_rows('clients_list') ) : the_row();

                            $photo = get_sub_field('photo_client');?>

                            <?php if ( !empty($photo)) : ?>

                                <div class="w-100 h-100 swith-img">

                                    <img class="img-fluid d-block m-auto w-100 h-100 fit-cover-top img-clients" src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" />

                                </div>

                            <?php endif; ?>

                        <?php endwhile; ?>

                    </div>

                <?php endif; ?>

            </div>

            <div class="col-lg-4 pt-md-5 pb-md-5 pt-3 pb-3">

                <div class="w-100 h-100 pt-lg-5 pb-lg-5" id="accordeon-clients">

                    <?php if($title):?>

                        <div class="box-title-accordeon hide-lg wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">

                            <div class="title-section position-relative"><?php echo $title; ?></div>

                        </div>

                    <?php endif; ?>

                    <?php if( have_rows('clients_list') ): ?>

                    <ul uk-accordion  uk-switcher="connect: .switcher-images" id="uk-accordion-home">

                        <?php $i = 1; while ( have_rows('clients_list') ) : the_row();

                            $name = get_sub_field('name_client');

                            $subtext = get_sub_field('subtext_client');

                            $info = get_sub_field('info_client');

                            $icon = get_sub_field('icon_litigation');

                            $caption = get_sub_field('caption_client');?>

                        <li <?php if($i == 1): ?>class="uk-open" <?php endif; ?>>

                            <a class="uk-accordion-title anchor-link" id="title-client-<?php echo $i;?>" href="#"><h4 class="mb-md-1 mb-0"><?php echo $name; ?></h4></a>

                            <div class="uk-accordion-content mt-0">

                                <?php if($subtext): ?><div class="label-2 cl-black text-uppercase"><?php echo $subtext;?></div><?php endif; ?>

                                <?php $photo = get_sub_field('photo_client');?>

                                <?php if ( !empty($photo)) : ?>

                                    <div class="w-100 h-100 swith-img show-lg pt-3">

                                        <img class="img-fluid d-block m-auto w-100 h-100 fit-cover-top img-clients" src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" />

                                    </div>

                                <?php endif; ?>

                                <?php if($info): ?><div class="dp-1 dp-3 cl-black mt-md-4 mt-3"><?php echo $info; ?></div><?php endif; ?>

                                <?php if(get_sub_field('add_active_litigation')): ?>

                                    <?php if (!empty($icon)) : ?>

                                        <img class="img-fluid d-block icon-litigation" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />

                                    <?php endif; ?>

                                <?php endif; ?>

                                <?php if($caption): ?><div class="metadata cl-grey mb-3"><?php echo $caption;?></div><?php endif; ?>

                            </div>



                        </li>

                        <?php $i++; endwhile; ?>

                    </ul>

                    <?php endif; ?>

                </div>

            </div>

        </div>

</section>
