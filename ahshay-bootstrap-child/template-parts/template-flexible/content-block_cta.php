<div class="row module module-block-cta justify-content-center pb-5">
    <?php $cta = get_sub_field('cta'); ?>
    <div class="col-lg-8 pb-3">
        <?php if($cta):
            $link_url = $cta['url'];
            $link_title = $cta['title'];
            $link_target = $cta['target'] ? $cta['target'] : '_self';?>
            <div class="box-cta-btn d-flex align-items-center">
                <a class="cta-btn d-flex align-items-center cta-btn-single" aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                    <?php echo $link_title; ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>