<?php  $headline = get_sub_field('updates_project_headline');
    $image = get_sub_field('updates_project_image'); 
    $section_id = get_sub_field('section_id'); 
?>
<section class="section-home section-updates" <?php if($section_id): ?> id="<?php echo $section_id; ?>" <?php endif; ?>>
    <div class="container">
        <?php if ( !empty($image)) : ?>
        <div class="row">
            <div class="col-lg-12">
            <?php if($headline): ?>
                <h2 class="cl-dark-brown pb-5 mb-0 text-uppercase wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $headline ?></h2>
            <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="row equal">
            <div class="col-lg-5 pe-lg-5">
                <?php if ( !empty($image)) : ?>
                    <div class="w-100 h-100 pb-lg-0 pb-5">
                        <img src="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr($image['alt']) ?>">
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-7">
                <div class="wrap-updates w-100 h-100">
                    <?php 
                    if( have_rows('updates_project_items') ):

                        // Loop through rows.
                        while( have_rows('updates_project_items') ) : the_row();

                            // Load sub field value.
                            $title = get_sub_field('updates_project_item_title');
                            $category = get_sub_field('updates_project_item_category');
                            $date = get_sub_field('updates_project_item_date');
                            ?>
                            <div class="update-item wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.3s">
                                <div class="meta-date"><span class="term"><?php echo $category ?></span> <span class="date"><?php echo $date ?></span></div>
                                <div class="update-headline">
                                    <h5><?php echo $title ?></h5>
                                </div>
                                <div class="link">
                                    <?php 
                                    $link = get_sub_field('updates_project_item_link');
                                    if( $link ): 
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>
                                        <a class="cta-1 cl-deep-terracotta cl-deep-terracotta-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?> <i class="fas fa-arrow-right"></i></a>
                                    <?php endif; ?>
                                </div>
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
            </div>
        </div>
    </div>
</section>
 