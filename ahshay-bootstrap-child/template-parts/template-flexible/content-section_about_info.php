<?php
    $id_section_about = get_sub_field('id_section_about');
    $title_section_about_info = get_sub_field('title_section_about_info');
    $description_section_about_info = get_sub_field('description_section_about_info');
    $list_bullets = get_sub_field('list_bullets');
    $image_1 = get_sub_field('image_1');
    $image_2 = get_sub_field('image_2');
    $bg_color_section = get_sub_field('bg_color_section');
    $bg_graphic = get_sub_field('bg_graphic');
?>
<section class="section-about-info bg-white pt-5 pb-lg-5" <?php if($id_section_about): ?>id="<?php echo $id_section_about;?>" <?php endif; ?>>
    <div class="container pt-lg-5 pb-lg-5">
        <div class="row pt-lg-5">
            <div class="col-lg-5">
                <?php if($title_section_about_info): ?>
                <h2 class="title-info cl-dark-brown text-uppercase pe-md-4 pe-lg-5 link-text mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title_section_about_info; ?></h3>
                <?php endif; ?>                      
            </div>
            <div class="col-lg-7 ps-md-4 ps-lg-5">
                <?php if ($list_bullets): ?>
                    <ul class="mt-3 mt-lg-0">
                    <?php foreach ( $list_bullets as $bullet_item ): ?>
                        <li class="mb-3 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><h3><?php echo $bullet_item['bullet']; ?></h3></li>
                    <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="col-lg-12 pt-lg-5 pb-lg-5 pb-3">
            <?php if($description_section_about_info): ?>
                <div class="dp-1 cl-dark-brown link-text wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $description_section_about_info; ?></div>
                <?php endif; ?>
            </div>
        </div>  
        <?php if ( have_rows('list_values') ): ?>
        <div class="row pt-lg-5">
            <?php $i = 1; while ( have_rows('list_values') ): the_row(); ?>
                <?php
                    $title = get_sub_field('title_list_values');
                    $text = get_sub_field('text_list_values');
                    $link = get_sub_field('cta_list_values');
                    $image = get_sub_field('image_list_values');
                    $textback = get_sub_field('text_back');
                    $linkback = get_sub_field('cta_back'); ?>
                <div class="col-lg-6 mb-4">
                <div class="inner-wrap wrap-values radius-6 position-relative">
                        <?php if ( !empty($image)) : ?>
                    <img class="fluid-img w-100 h-100 fit-cover-center radius-6" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"  />
                    <?php endif; ?>
                    <div class="overlay overlay-values radius-6 content-wrap d-flex flex-column h-100 justify-content-between p-5 text-center project-content-light">
                        <div class="box-title">
                            <?php if($title): ?><h4 class="text-uppercase wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title; ?></h4><?php endif; ?>
                            <?php if($text): ?>
                            <div class="dp-1 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php
                                echo $text; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>                              
                        <div class="w-100 d-flex justify-content-center align-items-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
                            <a tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" class="btn-card btn-card-<?php echo $i;?> cta-btn cta-btn-single w-100  d-flex justify-content-between align-items-center">
                        <?php echo esc_html( $link_title ); ?>
                        <svg width="29" height="30" viewBox="0 0 29 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_2378_794)">
                            <path d="M14.6001 3.75696L14.6001 24.709" stroke="white" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M24.2002 16.9929L15.2842 25.1049C14.9122 25.4409 14.3002 25.4409 13.9282 25.1049L5.01219 16.9929" stroke="white" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_2378_794">
                            <rect width="28.8" height="28.8" fill="white" transform="translate(29 0.408936) rotate(90)"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </a>
                    </div>
                    <?php endif; ?>
                    </div>
                    <div class="overlay overlay-values-back overlay-values-back-<?php echo $i; ?> radius-6 content-wrap d-flex flex-column h-100 justify-content-between p-5 text-center bg-deep-terracotta hide-back">
                        <div class="box-title">                                   
                            <?php if($textback): ?>
                            <div class="dp-1 cl-white"><?php
                                echo $textback; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php if( $linkback ):
                        $link_url = $linkback['url'];
                        $link_title = $linkback['title'];
                        $link_target = $linkback['target'] ? $linkback['target'] : '_self';
                        ?>                              
                        <div class="w-100 d-flex justify-content-center align-items-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
                            <a tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" class="btn-card-back btn-card-back-<?php echo $i;?> cta-btn cta-btn-single w-100  d-flex justify-content-between align-items-center">
                            <?php echo esc_html( $link_title ); ?>
                            <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.6 25.6521L14.6 4.70009" stroke="#38322F" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.00001 12.416L13.916 4.30402C14.288 3.96802 14.9 3.96802 15.272 4.30402L24.188 12.416" stroke="#38322F" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                </div>
            <?php $i++; endwhile; ?>
        </div>
        <?php endif; ?> 
    </div>
</section>

    