<div class="row module module-block-partners justify-content-center pb-md-4 pb-3">
    <?php $title = get_sub_field('title'); ?>
    <?php if( have_rows('list_partners') ): ?>
    <div class="col-lg-8">
        <div class="row partners-images equal pt-5">
        <?php while( have_rows('list_partners') ): the_row();

            // Get sub field values.
            $logo = get_sub_field('logo_partners');
            $cta = get_sub_field('link_partners');
            ?>
            <div class="col-md-6 col-lg-4 pb-4">
            <?php  if($cta) {
                $link_url = $cta['url'];
                $link_title = $cta['title'];
                $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                <div class="w-100 h-100 box-info d-flex flex-column">
                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100 d-flex flex-column box-link bg-white-h">
                        <img src="<?php echo esc_url($logo['url']) ?>" alt="<?php echo esc_attr($logo['alt']) ?>">
                    </a>
                </div>
            <?php } ?>
            </div>
        <?php endwhile; ?>
        </div>
    </div>
    <?php endif; ?>
</div>