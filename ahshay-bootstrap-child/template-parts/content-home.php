<?php
/**
 * The template for displaying content in the page-home.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if( have_rows('banner_home') ): ?>
        <?php while( have_rows('banner_home') ): the_row();

            // Get sub field values.
            $title = get_sub_field('title_banner_home');
            $text = get_sub_field('text_banner_home');
            $image_desktop = get_sub_field('image_desktop');
            $image_mobile = get_sub_field('image_mobile');
            $bg_color_section = get_sub_field('bg_color_section');
            $bg_graphic = get_sub_field('bg_graphic');
            $image_info = get_sub_field('image_info');
            $icon_banner = get_sub_field('icon_banner');
            ?>
        <section class="section-home section-banner pb-5" <?if($bg_color_section && !empty($bg_graphic)): ?>style="background: linear-gradient(<?php echo $bg_color_section;?>, <?php echo $bg_color_section;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php endif; ?>>
            <div class="container-fluid container-fluid-home container-fluid-center">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ( !empty($image_desktop)) : ?>
                            <img class="img-fluid hide-lg" src="<?php echo esc_url($image_desktop['url']); ?>" alt="<?php echo esc_attr($image_desktop['alt']); ?>" width="1920" height="500" />
                        <?php endif; ?>
                        <?php if ( !empty($image_mobile)) : ?>
                            <img class="img-fluid show-lg" src="<?php echo esc_url($image_mobile['url']); ?>" alt="<?php echo esc_attr($image_mobile['alt']); ?>" width="670" height="442" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-9">
                        <?php if($title): ?>
                            <h1 class="cl-white text-uppercase headline-home pt-lg-0 pt-5 mb-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" ><?php echo $title;?></h1>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row align-items-center pt-4">
                    <div class="col-lg-7 pe-lg-5">
                        <?php if($text): ?>
                        <div class="dp-1 cl-white link-text wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $text;?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-5 hide-lg ps-lg-5">
                        <?php if ( !empty($image_info)) : ?>
                            <div class="w-100 box-image-home radius-6">
                                <img class="img-fluid radius-6 h-100 w-100 fit-cover-center" src="<?php echo esc_url($image_info['url']); ?>" alt="<?php echo esc_attr($image_info['alt']); ?>" width="490" height="392" />
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php if( have_rows('home_tow_col') ): ?>
        <?php while( have_rows('home_tow_col') ): the_row();

            // Get sub field values.
            $title = get_sub_field('two_col_title');
            $text = get_sub_field('two_col_text'); 
        ?>
        <section class="section-twelve">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 pe-lg-5">
                        <?php if($title): ?>
                        <div class="title-section cl-dark-brown pe-md-4 link-text wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?= $title ?></div>
                         <?php endif; ?>
                    </div>
                    <div class="col-lg-8 ps-lg-5">
                        <?php if($text): ?>
                        <div class="dp-1 cl-dark-brown link-text wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                            <?= $text ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php
    $bg_graphic_section_values = get_field('bg_graphic_section_values');
    if( have_rows('section_values') ): ?>
        <section class="section-values pb-5" <?php if ( !empty($bg_graphic_section_values)) : ?>style="background: url('<?php echo $bg_graphic_section_values['url'];?>')" <?php endif; ?>>
            <div class="container pt-lg-5 pb-lg-5">
                <div class="row equal">
                <?php while( have_rows('section_values') ): the_row();

                    // Get sub field values.
                    $title = get_sub_field('title_section_values');
                    $text = get_sub_field('text_section_values');
                    $bgcolor = get_sub_field('bg_color_section_values');
                    $icon = get_sub_field('icon_section_values');
                    $radius = get_sub_field('radius_type');
                    $radius_xs = get_sub_field('radius_type_xs');
                    $radius_sm = get_sub_field('radius_type_sm');
                    $radius_md = get_sub_field('radius_type_md');
                    $radius_lg = get_sub_field('radius_type_lg');

                    $radius_classes = implode(' ', [
                        $radius_xs ? $radius_xs['value'] : '',
                        $radius_sm ? $radius_sm['value'] : '',
                        $radius_md ? $radius_md['value'] : '',
                        $radius_lg ? $radius_lg['value'] : ''
                    ]);

                    ?>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="w-100 h-100 box-values <?php echo $radius_classes; ?>" <?php if($bgcolor): ?>style="background-color: <?php echo $bgcolor;?>" <?php endif; ?>>
                           <div class="info-values">
                               <?php if($title): ?>
                                   <h4 class="text-center cl-dark-brown mb-4 text-uppercase wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?= $title; ?></h4>
                               <?php endif; ?>
                               <?php if($text): ?>
                                   <div class="dp-1 text-center cl-dark-brown mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?= $text; ?></div>
                               <?php endif; ?>
                           </div>
                            <?php if ( !empty($icon)) : ?>
                                  <img class="img-fluid icon-value" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" width="336" height="335"/>
                             <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if( have_rows('slider_about') ): ?>
        <?php while( have_rows('slider_about') ): the_row();

            // Get sub field values.
            $title = get_sub_field('title_slider_about');
            $link = get_sub_field('cta_slider_about');
            $bg_color_section = get_sub_field('bg_color_slider_about');
            $bg_graphic = get_sub_field('bg_section_slider_about');
            ?>
            <section class="section-home pb-5 pt-5" <?php if($bg_color_section && !empty($bg_graphic)): ?>style="background: linear-gradient(<?php echo $bg_color_section;?>, <?php echo $bg_color_section;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php endif; ?>>
                <div class="container">
                    <div class="row align-items-center justify-content-center pt-lg-5 pb-lg-5">
                        <div class="col-lg-9">
                            <?php if($title): ?>
                                <h3 class="cl-white mb-lg-5 mb-3 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title;?></h3>
                            <?php endif; ?>
                            <?php if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a tabindex="0" class="cta-1 cl-golden-yellow cl-golden-yellow-h wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?> <i class="fas fa-arrow-right"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if( have_rows('slider') ): ?>
                <div class="container-fluid pe-md-0 ps-md-0 pt-5 pb-5 hide-md">
                    <div class="posts-carousel owl-carousel">
                        <?php while( have_rows('slider') ): the_row();
                            $slide = get_sub_field('slide'); ?>
                        <div class="item animated fadeIn">
                            <?php if ( !empty($slide)) : ?>
                                <div class="w-100 h-100 box-image-slider radius-6">
                                    <img class="img-fluid radius-6 h-100 w-100 h-100 fit-cover-center" src="<?php echo esc_url($slide['url']); ?>" alt="<?php echo esc_attr($slide['alt']); ?>" width="866" height="469" />
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php endif; ?>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php if( have_rows('updates_home') ): ?>
        <?php while( have_rows('updates_home') ): the_row();

            // Get sub field values.
            $headline = get_sub_field('update_headline');
            $image = get_sub_field('update_image'); 
        ?>
        <section class="section-home section-updates">
            <div class="container">
                <?php if ( !empty($image)) : ?>
                <div class="row">
                    <div class="col-lg-12">
                    <?php if($headline): ?>
                        <h2 class="cl-dark-brown pb-5 mb-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $headline ?></h2>
                    <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row equal">
                    <div class="col-lg-5 pe-lg-5">
                        <?php if ( !empty($image)) : ?>
                            <div class="w-100 h-100 pb-lg-0 pb-5 box-img-updates">
                                <img class="w-100 h-100 fit-cover-center" src="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr($image['alt']) ?>" width="490" height="734">
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-7">
                        <div class="wrap-updates w-100 h-100">
                            <?php 
                            if( have_rows('updates_items') ):

                                // Loop through rows.
                                while( have_rows('updates_items') ) : the_row();

                                    // Load sub field value.
                                    $title = get_sub_field('title');
                                    $category = get_sub_field('category');
                                    $date = get_sub_field('date');
                                    ?>
                                    <div class="update-item wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                                        <div class="meta-date"><span class="term"><?php echo $category ?></span> <span class="date"><?php echo $date ?></span></div>
                                        <div class="update-headline">
                                            <h5><?php echo $title ?></h5>
                                        </div>
                                        <div class="link">
                                            <?php 
                                            $link = get_sub_field('link');
                                            if( $link ): 
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                                ?>
                                                <a tabindex="0" class="cta-1 cl-deep-terracotta cl-deep-terracotta-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?> <i class="fas fa-arrow-right"></i></a>
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
        <?php endwhile; ?>
    <?php endif; ?>
    <?php if( have_rows('partners_home') ): ?>
        <?php while( have_rows('partners_home') ): the_row();

            // Get sub field values.
            $headline = get_sub_field('headline');
        ?>
        <section class="section-home section-partners">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="cl-dark-brown pb-5 mb-0 text-lg-start text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    </div>
                </div>
                <div class="partner-carousel owl-carousel">
                    <?php 
                    if( have_rows('items') ):

                        // Loop through rows.
                        while( have_rows('items') ) : the_row();

                            // Load sub field value.
                            $photo = get_sub_field('image');
                            $link = get_sub_field('link');
                            ?>
                            <div class="item animated fadeIn">
                                <?php if(!empty($photo)): ?>
                                    <?php  if($link) {
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                        <a tabindex="0" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100"><?php } ?>
                                    <img class="logo-partner fluid-img m-auto d-block" src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" width="286" height="90" />
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
                <div class="row pt-5">
                    <div class="col-lg-12">
                        <div class="link">
                            <?php 
                            $link = get_sub_field('see_more_link');
                            if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a tabindex="0" class="cta-1 cl-deep-terracotta cl-deep-terracotta-h wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?> <i class="fas fa-arrow-right"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php if( have_rows('info_group') ): ?>
        <?php while( have_rows('info_group') ): the_row();

            // Get sub field values.
            $title = get_sub_field('title_info_group');
            $link = get_sub_field('cta_info_group');
            $bg_color_section = get_sub_field('bg_color_info_group');
            $bg_graphic = get_sub_field('bg_section_info_group');
            ?>
            <section class="section-home section-home-slider pb-5"  <?php if($bg_color_section && !empty($bg_graphic)): ?>style="background: linear-gradient(<?php echo $bg_color_section;?>, <?php echo $bg_color_section;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php endif; ?>>
                  <div class="container">
                    <div class="row align-items-center pb-lg-5">
                        <div class="col-md-12">
                            <?php if($title): ?>
                                <h3 class="cl-white mb-lg-5 mb-3 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title;?></h3>
                            <?php endif; ?>
                           <?php if( $link ):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a tabindex="0" class="cta-1 cl-golden-yellow cl-golden-yellow-h wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?> <i class="fas fa-arrow-right"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php $show_info_bottom= get_field('show_info_bottom');
    if($show_info_bottom): ?>
    <section class="bg-golden-yellow pb-5 pt-5">
        <div class="container">
            <div class="row align-items-center pt-lg-5 pb-lg-5">
                <?php $title= get_field('title_contact_info');
                if($title): ?>
                <div class="col-lg-6">
                    <h3 class="cl-dark-brown mb-lg-0 mb-3 text-lg-start text-center"><?= $title;?></h3>
                </div>
                <?php endif; ?>
                <?php
                $link = get_field('cta_contact_info');
                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <div class="col-lg-6 text-lg-start text-center">
                   <a tabindex="0" class="cta-1 big-cta cl-dark-brown cl-dark-brown-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?> <i class="fas fa-arrow-right"></i></a>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
    <?php endif; ?>
</article>
<!-- #post-## -->