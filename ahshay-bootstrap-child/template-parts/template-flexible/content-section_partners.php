<?php $id_partners_section = get_field('id_partners_section'); ?>
    <section class="section-about section-partners pt-lg-0 pt-5 pb-lg-5 pb-4 mb-lg-5" <?php if($id_partners_section): ?>id="<?php echo $id_partners_section; ?>" <?php endif; ?>>
        <div class="container pb-lg-5">
            <?php $headline = get_field('headline_partners_section');
            if($headline): ?>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="cl-dark-brown pb-5 mb-0 text-uppercase wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?=$headline; ?></h2>
                </div>
            </div>
            <?php endif; ?>
            <?php if( have_rows('partners_about') ): ?>
                <?php while( have_rows('partners_about') ): the_row();

                    // Get sub field values.
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="cl-slate mb-3 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title; ?></h5>
                        </div>
                        <div class="dp-1 mb-lg-3 cl-slate-lt wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                            <?php echo $text; ?>
                        </div>
                    </div>
                    <div class="row partners-images pt-5">
                <?php
                if( have_rows('logos') ):

                    // Loop through rows.
                    while( have_rows('logos') ) : the_row();

                        // Load sub field value.
                        $photo = get_sub_field('logo');
                        $link = get_sub_field('link');
                        ?>
                        <div class="col-lg-3 mb-5">
                            <?php if(!empty($photo)): ?>
                                <?php  if($link) {
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <a tabindex="0" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100"><?php } ?>
                                <img class="logo-partner fluid-img m-auto d-block pe-lg-3 ps-lg-3" src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" />
                                <?php if($link) { ?>
                                    </a>
                                <?php } ?>
                            <?php endif; ?>
                        </div>
                        <?php
                        // Do something...

                    // End loop.
                    endwhile;

                // No value.
                else :
                    echo "NOT EXIST ITEMS";
                endif;
                ?>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>