<?php
/**
 * The template for displaying content in the page-contact.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php $headline = get_field('title_page_contact');
    $image = get_field('image_1_contact');
    $image2 = get_field('image_2_contact');
    $image_contact_mv = get_field('image_contact_mv');
    $descr = get_field('description_home');
    $cta = get_field('cta_banner');?>
    <section class="section-inside-banner section-contact bg-lighter d-flex align-items-center position-relative">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if($headline): ?>
                        <h1 class="headline cl-dark-green text-center"><?php echo $headline;?></h1>
                    <?php endif;?>
                    <?php if ( !empty($image_contact_mv)) : ?>
                        <img class="img-contact-mv img-fluid w-100 show-md fit-cover-center" src="<?php echo esc_url($image_contact_mv['url']); ?>" alt="<?php echo esc_attr($image_contact_mv['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if ( !empty($image)) : ?>
            <img class="img-banner-contact-1 img-fluid h-100 hide-lg fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
        <?php if ( !empty($image2)) : ?>
            <img class="img-banner-contact-2 img-fluid h-100 hide-lg fit-cover-center" src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" />
        <?php endif; ?>
    </section>
    <section class="bg-lighter">
        <div class="container pt-md-5 pb-5">
            <div class="row">
                <div class="col-md-5 col-lg-4 pe-lg-5 pb-md-0 pb-4">
                    <div class="dp-1 cl-black pt-md-5 pt-3 box-info-contact"><?php echo the_content();?></div>
                </div>
                <?php $contact_form_info = get_field('contact_form_info');
                if($contact_form_info): ?>
                    <div class="col-md col-lg ps-lg-5">
                        <div class="w-100 h-100 box-contact dp-2"><?php echo $contact_form_info;?></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php if( get_field('title_bottom') || get_field('text_bottom')): ?>
        <section class="section-box-info bg-orange pt-md-5 pb-md-5">
            <div class="container">
                <div class="box-container-info bg-white">
                    <div class="row equal align-items-center">
                        <?php $title = get_field('title_bottom');
                        $text = get_field('text_bottom');
                        $cta = get_field('cta_bottom');
                        ?>
                        <div class="col-md-7 pb-md-0 pb-2">
                            <div class="w-100 h-100">
                                <?php if($title): ?>
                                    <h2 class="cl-red pb-3"><?php echo $title;?></h2>
                                <?php endif; ?>
                                <?php if($text): ?>
                                    <div class="dp-1 dp-2 cl-dark"><?php echo $text;?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                        if($cta) {
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self';?>

                            <div class="col-md">
                                <div class="box-cta-btn d-flex align-items-center justify-content-md-end justify-content-start">
                                    <a class="cta-btn d-flex align-items-center cl-red cl-red-h bg-white bg-white-h border-red border-red-h" aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                                        <span class="cta-title"><?php echo $link_title; ?></span>
                                        <span class="cta-arrows d-flex align-items-center">
                                            <svg class="arrow-short" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_412_77)">
                                                    <path d="M2.32498 10.5H16.875" stroke="#EE6C4D" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M11.5167 3.83331L17.15 10.025C17.3833 10.2833 17.3833 10.7083 17.15 10.9666L11.5167 17.1583" stroke="#EE6C4D" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_412_77">
                                                        <rect width="20" height="20" fill="white" transform="translate(0 0.5)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                      </span>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</article>
<!-- #post-## -->