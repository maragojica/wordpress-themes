<?php
/**
 * Displays the content when the ca oil crisis template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<section class="banner-inner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <?php if( get_field('title_headlines_inner') ): ?>
                    <h3 class="headline-section cl-dark"><?php echo the_field('title_headlines_inner'); ?></h3>
                <?php endif; ?>
                <?php if( get_field('text_headlines_inner') ): ?>
                    <div class="copy-text cl-dark mb-5 pb-2 pb-md-5">
                        <?php echo the_field('text_headlines_inner'); ?>
                    </div>
                <?php endif; ?>
                <?php $cta = get_field('cta_link_headlines_inner');
                if($cta) {
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                    <div>
                        <a class="cta-link cl-dark-green cl-dark-greenh mt-2" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?>
                            <svg class="d-inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="34px">
                                <image  x="0px" y="0px" width="24px" height="34px"  xlink:href="data:img/png;base64,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" />
                            </svg>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<section class="info-inner-page">
    <div class="container">
        <?php if ( has_post_thumbnail() ) {
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
            $alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>
            <div class="row row-featured-image">
                <img class="m-auto" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
            </div>
        <?php } ?>
        <?php if( have_rows('topics_repeater') ): ?>
            <div class="row justify-content-center pt-2 pt-md-5 mt-5 pb-5">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="title-list-lg d-md-none ham-menu-topics-mv">Select Topic</button>
                            <div uk-dropdown="mode: click" class="d-md-none menu-topics-mv">
                                <div class="list-group list-topics-oil-crisis bg-light-blue-2">
                                    <?php $k=1; while( have_rows('topics_repeater') ) : the_row();
                                        $title = get_sub_field('title_topic_rep');?>
                                        <a data-toggle="collapse" data-target="#collapseFAQ<?php echo $k;?>" aria-expanded="<?php if($k==1){?>true<?php }else{ ?>false<?php }?>" aria-controls="collapseFAQ<?php echo $k;?>" class="list-group-item list-group-item-action">
                                            <?php echo $title;?>
                                        </a>
                                        <?php $k++; endwhile; ?>
                                </div>
                            </div>

                            <div class="list-group list-topics-oil-crisis bg-light-blue-2 d-none d-md-block">
                                <h5 class="title-list-lg">Select Topic</h5>
                                <?php $k=1; while( have_rows('topics_repeater') ) : the_row();
                                $title = get_sub_field('title_topic_rep');?>
                                <a data-toggle="collapse" data-target="#collapseFAQ<?php echo $k;?>" aria-expanded="<?php if($k==1){?>true<?php }else{ ?>false<?php }?>" aria-controls="collapseFAQ<?php echo $k;?>" class="list-group-item list-group-item-action">
                                    <?php echo $title;?>
                                </a>
                                <?php $k++; endwhile; ?>
                            </div>

                        </div>
                        <div class="col-md">
                            <!-- Accordion -->
                            <div id="accordionFAQ" class="accordion accordeonInfo">
                                <?php $i=1; while( have_rows('topics_repeater') ) : the_row();
                                    $title = get_sub_field('title_topic_rep');
                                    $summary = get_sub_field('summary_topic_rep');
                                    $text = get_sub_field('text_topic_rep'); ?>
                                    <!-- Accordion item 1 -->
                                    <div class="card border-0" id="ca-oilcrisis<?php echo $i;?>">
                                        <div id="headingFAQ<?php echo $i;?>" class="card-header bg-white pr-0 pl-0 border-0">
                                            <h2 class="mb-3">
                                                <button type="button" data-toggle="collapse" data-target="#collapseFAQ<?php echo $i;?>" aria-expanded="<?php if($i==1){?>true<?php }else{ ?>false<?php }?>" aria-controls="collapseFAQ<?php echo $i;?>" class="btn btn-link collapsible-link"><?php echo $title;?></button>
                                            </h2>
                                            <div class="heading-text-topics light-content cl-dark-2"><?php echo $summary;?></div>
                                        </div>
                                        <div id="collapseFAQ<?php echo $i;?>" aria-labelledby="headingFAQ<?php echo $i;?>" data-parent="#accordionFAQ" class="collapse <?php if($i==1){?>show<?php } ?>">
                                            <div class="card-body text-accordeon m-0 pr-0 pl-0 pt-0">
                                                <?php echo $text;?>
                                            </div>
                                            <div class="mb-5">
                                            <a data-toggle="collapse" data-target="#collapseFAQ<?php echo $i;?>" aria-expanded="<?php if($i==1){?>true<?php }else{ ?>false<?php }?>" class="collapse-accordeon" aria-controls="collapseFAQ<?php echo $i;?>">Collapse</a>
                                            </div>
                                        </div>
                                    </div><!-- End -->
                                    <?php $i++; endwhile; ?>
                            </div><!-- End -->
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

