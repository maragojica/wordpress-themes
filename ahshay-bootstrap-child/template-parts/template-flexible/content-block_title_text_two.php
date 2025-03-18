<?php  $title = get_sub_field('title');
        $text = get_sub_field('content');
        $section_id = get_sub_field( 'section_id' ); ?>
<section class="section-twelve module-block-title-text-twocolumns" <?php if($section_id): ?>id="<?php echo $section_id; ?>" <?php endif; ?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 pe-lg-5">
                <?php if($title): ?>
                    <h3 class="cl-dark-brown pe-md-4 link-text mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?= $title ?></h3>
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
