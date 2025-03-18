<?php
$id = get_sub_field('section_id_thankyou');
$title = get_sub_field('title_thankyou');
$subtitle = get_sub_field('subtitle_thankyou');
$text = get_sub_field('text_thankyou');
$bg_color = get_sub_field('bg_color_thankyou');?>
<section class="module module-block-thankyou pt-5 pb-5 d-flex align-items-center justify-content-center" <?php if($id):?>id="<?php echo $id; ?>" <?php endif; ?> <?php if($bg_color): ?>style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="container pt-md-5 pb-md-5">
        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <?php if($title):?>
                <h2 class="title cl-white mb-4"><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if($subtitle):?>
                    <div class="dp-1 cl-white"><?php echo $subtitle; ?></div>
                <?php endif; ?>
                <?php $cta = get_sub_field('cta_thankyou'); ?>
                <?php if($cta):
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self';?>
                    <div class="box-general-cta">
                        <a class="link-cta link-cta-inverse" aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                            <?php echo $link_title; ?>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if($text):?>
                    <div class="metadata cl-accent-blue"><?php echo $text; ?></div>
                <?php endif; ?>
            </div>
        </div>
</section>
