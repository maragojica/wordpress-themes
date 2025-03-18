<?php
/**
 * The template for displaying content in the page-home.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( has_post_thumbnail() ) {
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
        $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
        <?php $title_banner_home = get_field('title_banner_home');
        $text_1_banner_home = get_field('text_1_banner_home');
        $text_2_banner_home = get_field('text_2_banner_home');?>
        <section class="banner-home d-flex align-items-center" style="background-image: url(<?php echo $featured_img_url;?>);">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-6">
                        <?php if($title_banner_home): ?>
                            <h1 class="cl-white mb-md-4 mb-0 ps-sm-0 ps-5 pe-md-0 pe-5"><?php echo $title_banner_home;?></h1>
                        <?php endif;?>
                        <?php if($text_1_banner_home): ?>
                            <div class="dp-1 cl-white hide-sm"><?php echo $text_1_banner_home;?></div>
                        <?php endif; ?>
                        <?php if($text_2_banner_home): ?>
                            <div class="dp-2 cl-white hide-sm"><?php echo $text_2_banner_home;?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <?php if( have_rows('issues_list') ): ?>
        <section class="section-issues bg-dark-blue pt-5">
            <div class="container">
                <div class="row show-sm">
                    <div class="col-md-12 pb-5">
                        <?php if($text_1_banner_home): ?>
                            <div class="dp-1 cl-white text-center"><?php echo $text_1_banner_home;?></div>
                        <?php endif; ?>
                        <?php if($text_2_banner_home): ?>
                            <div class="dp-2 cl-white text-center"><?php echo $text_2_banner_home;?></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php while( have_rows('issues_list') ) : the_row();
                $title = get_sub_field('title_issues_list');
                $text = get_sub_field('text_issues_list');
                $imagepos = get_sub_field('image_position');
                $image = get_sub_field('image_issues_list');
                $caption = get_sub_field('caption_image');
                $captionmv = get_sub_field('caption_image_mv');
                ?>
                <div class="row equal pt-md-5 pb-md-5 h-100 flex-row <?php if($imagepos['value'] == 'rigth'): ?>flex-lg-row-reverse <?php endif; ?> equal <?php echo $boxbg['value']; ?> align-items-center">
                    <div class="col-lg-6 h-100 <?php if($imagepos['value'] == 'rigth'){ ?>ps-lg-5<?php }else{?>pe-lg-5<?php } ?>">
                        <?php if( !empty($image) ): ?>
                            <div class="w-100 h-100 position-relative">
                                <img class="list-img w-100 h-100 fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="600" height="400" />

                                <?php if($caption): ?>
                                    <div class="caption-image hide-sm"><?php echo $caption;?></div>
                                <?php endif; ?>
                                <?php if($captionmv): ?>
                                    <div class="caption-image show-sm"><?php echo $captionmv;?></div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6 h-100 pt-lg-0 pb-lg-0 pt-5 pb-4 <?php if($imagepos['value'] == 'rigth'){ ?>pe-lg-5<?php }else{?>ps-lg-5<?php } ?>">
                        <?php if( $title ): ?>
                            <h2 class="cl-vibrant-orange pb-4"><?php echo $title;?></h2>
                        <?php endif; ?>
                        <?php if( $text ): ?>
                            <div class="dp-1 cl-white"><?php echo $text;?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row pt-md-5 pb-5 row-line">
                    <div class="col-md-12">
                        <div class="line-top"></div>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
        </section>
    <?php endif; ?>
    <section class="section-faq bg-dark-blue pb-5">
        <div class="container">
            <div class="row">
                <?php $image_faq_home = get_field('image_faq_home'); ?>
                <?php if( !empty($image_faq_home) ): ?>
                    <div class="col-md-12">
                        <div class="box-img-faq">
                            <img class="fluid-img w-100 h-100 fit-cover-center" src="<?php echo esc_url($image_faq_home['url']); ?>" alt="<?php echo esc_attr($image_faq_home['alt']); ?>" width="600" height="400"/>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row pt-5 pb-md-5">
                <div class="col-lg-4 pe-lg-5">
                    <?php $title_faq = get_field('title_faq');
                    $text_faq = get_field('text_faq');
                    if( $title_faq ): ?>
                        <h2 class="cl-vibrant-orange pb-4"><?php echo $title_faq;?></h2>
                    <?php endif; ?>
                    <?php if($text_faq): ?>
                        <div class="dp-2 cl-white"><?php echo $text_faq;?></div>
                    <?php endif; ?>
                </div>
                <div class="col-lg ps-lg-5">
                    <?php if( have_rows('faq_list') ): ?>
                    <div class="accordion accordeon-faqs" id="accordionFaqs">
                        <?php $i = 1; while( have_rows('faq_list') ) : the_row();
                            $question = get_sub_field('question');
                            $answer = get_sub_field('answer');?>
                        <div class="accordion-item">
                            <h6 class="accordion-header cl-white" id="heading-<?php echo $i;?>">
                                <button class="accordion-button <?php if($i>1): ?>collapsed<?php endif;?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i;?>" aria-expanded="<?php if($i==1){ echo true; }else{ echo false;} ?>" aria-controls="collapse<?php echo $i;?>">
                                    <?php echo $question; ?>
                                </button>
                            </h6>
                            <div id="collapse<?php echo $i;?>" class="accordion-collapse collapse <?php if($i==1): ?>show<?php endif;?>" aria-labelledby="heading<?php echo $i;?>" data-bs-parent="#accordionFaqs">
                                <div class="accordion-body dp-3 cl-white">
                                    <?php echo $answer;?>
                                </div>
                            </div>
                        </div>
                        <?php $i++; endwhile; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php $bg_box_info = get_field('bg_box_info'); ?>
    <?php if( have_rows('box_info') ): ?>
        <section class="section-box-info pt-5 pb-5" <?php if(!empty($bg_box_info)): ?>style="background-image: url(<?php echo esc_url($bg_box_info['url']); ?>); <?php endif;?>">
            <div class="container">
                <div class="row equal">
                <?php while( have_rows('box_info') ) : the_row();
                    $title = get_sub_field('title_box_info');
                    $cta = get_sub_field('link_box_info');
                    ?>
                    <div class="col-md pb-md-0 pb-2">
                    <?php  if($cta) {
                        $link_url = $cta['url'];
                        $link_title = $cta['title'];
                        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                        <div class="w-100 h-100 box-info d-flex flex-column">
                            <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100 d-flex flex-column box-link bg-white-h">
                                <?php if($title): ?>
                                    <h5 class="cl-black pb-3"><?php echo $title;?></h5>
                                    <div class="title-link cl-opposition-red">
                                        <?php echo $link_title; ?>
                                        <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_529_404)">
                                                <path d="M1.97626 8.69409H14.3438" stroke="#E85F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M9.78918 3.02734L14.5775 8.29026C14.7758 8.50984 14.7758 8.87109 14.5775 9.09068L9.78918 14.3536" stroke="#E85F3F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_529_404">
                                                    <rect width="17" height="17" fill="white" transform="translate(0 0.194092)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
</article>
<!-- #post-## -->