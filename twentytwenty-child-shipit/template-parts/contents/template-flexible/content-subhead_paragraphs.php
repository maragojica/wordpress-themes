<section class="module module-subhead-paragraphs position-relative pt-0 pb-0 wow fadeIn" data-wow-duration="0.2s" data-wow-delay="0.2s">
    <?php  $title = get_sub_field('title_subhead_paragraphs');
    $text = get_sub_field('text_subhead_paragraphs');
    $imagepos = get_sub_field('img_position_list');
    $image = get_sub_field('image_subhead_paragraphs');
    $boxbg = get_sub_field('box_background'); ?>
        <div class="container-fluid pr-0 pl-0 h-100">
            <div class="row h-100 flex-row <?php if($imagepos['value'] == 'rigth'): ?>flex-md-row-reverse <?php endif; ?> equal <?php echo $boxbg['value']; ?> mr-0 ml-0">
                <div class="col-lg-6 pr-0 pl-0">
                    <?php if( !empty($image) ): ?>
                        <div class="w-100 h-100">
                            <img class="list-img w-100 h-100 fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg pt-5 pb-5 <?php if($imagepos['value'] == 'rigth'){ ?>col-subhead-l pr-lg-5 <?php }else{ ?>col-subhead-r <?php } ?>">
                    <div class="d-flex align-items-center w-100 h-100 <?php if($imagepos['value'] == 'rigth'){ ?>pr-lg-5 <?php }else{ ?>pl-lg-5<?php } ?>">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <?php if( $title ): ?>
                                <h2 class="headline-section cl-stormy-sea pb-4"><?php echo $title;?></h2>
                            <?php endif; ?>
                            <?php if( $text ): ?>
                                <div class="copy-description cl-stormy-sea"><?php echo $text;?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
