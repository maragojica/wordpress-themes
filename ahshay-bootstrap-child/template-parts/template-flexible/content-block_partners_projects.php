
<?php $headline = get_sub_field('headline');
       $description = get_sub_field('description');
        $section_id = get_sub_field('section_id');  ?>
    <section class="section-home section-partners module-partners-projects pt-0" <?php if($section_id): ?>id="<?php echo $section_id; ?>" <?php endif; ?>>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if( $headline ): ?>
                    <h2 class="cl-dark-brown text-uppercase pb-3 mb-0 text-lg-start text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    <?php endif;?> 
                </div>
                <?php if($description): ?>
                <div class="col-lg-12">
                    <div class="cl-dark-brown pb-3 mb-0 text-lg-start text-center dp-1 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $description; ?></div>
                </div>
                <?php endif; ?>
            </div>
            <div class="row partners-images">
                <?php 
                if( have_rows('items') ):

                    // Loop through rows.
                    while( have_rows('items') ) : the_row();

                        // Load sub field value.
                        $photo = get_sub_field('image');
                        $link = get_sub_field('link');
                        ?>
                        <div class="col-lg-3 pb-5">
                            <?php if(!empty($photo)): ?>
                                <?php  if($link) {
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100"><?php } ?>
                                <img class="logo-partner fluid-img m-auto d-block" src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" />
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="link">
                        <?php 
                        $link = get_sub_field('see_more_link');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="cta-1 cl-deep-terracotta cl-deep-terracotta-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?> <i class="fas fa-arrow-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
     