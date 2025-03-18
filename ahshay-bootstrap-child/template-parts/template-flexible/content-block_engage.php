<?php  $title_ways_to_engage = get_sub_field('title');
    $description_ways_to_engage = get_sub_field('subtitle');   
    $bg_color_section = get_sub_field('bg_color_section');
    $bg_graphic = get_sub_field('bg_graphic');
    $section_id = get_sub_field('section_id');
?>
<section class="ways_to_engage pt-5 pb-lg-5" <?php if($section_id): ?> id="<?php echo $section_id; ?>" <?php endif; ?><?php if($bg_color_section): ?>style="background-color: <?php echo $bg_color_section; ?>" <?php endif; ?>>
    <div class="container pt-lg-5 pb-lg-5">
        <div class="row pt-lg-5">
            <div class="col-lg-5">
                <?php if($title_ways_to_engage): ?>
                <h2 class="cl-dark-brown text-uppercase pe-md-4 pe-lg-5 link-text mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title_ways_to_engage; ?></h2>
                <?php endif; ?>
                <?php if($description_ways_to_engage): ?>
                <div class="dp-1 cl-dark-brown link-text mb-3 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $description_ways_to_engage; ?></div>
                <?php endif; ?>
            </div>
            <div class="col-lg-7 ps-md-4 ps-lg-5">               
                    <?php if (have_rows('items')): ?>  
                    <ul class="mt-3 mt-lg-0">
                    <?php while(have_rows('items')): the_row(); $link_title = get_sub_field('item_title');  $item_description = get_sub_field('item_description'); $link = get_sub_field('see_more'); ?>                         
                            <li class="mb-3 mb-md-5">
                                <div>
                                    <?php if($link_title): ?>
                                    <h3 class="cl-dark-brown pe-md-4 pe-lg-5 link-text mb-lg-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo esc_html( $link_title ); ?></h3>
                                    <?php endif; ?>
                                    <?php if($item_description): ?>
                                    <div class="dp-1 mt-3 mb-lg-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $item_description; ?></div>
                                    <?php endif; ?>
                                    <?php if( $link ):
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>
                                        <a tabindex="0" class="cta-1 cl-deep-terracotta cl-deep-terracotta-h text-uppercase wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                        <?php echo esc_html( $link_title ); ?>
                                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                         </a>
                                    <?php endif; ?>     
                                </div>
                            </li>                        
                    <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
