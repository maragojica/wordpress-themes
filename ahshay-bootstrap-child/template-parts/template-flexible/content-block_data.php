<?php
    $project_data_description = get_sub_field('project_data_description');
    $project_data_items = get_sub_field('project_data_items');
    $bg_color_section = get_sub_field('bg_color_section');
    $bg_graphic = get_sub_field('bg_image');
    $section_id = get_sub_field('section_id');
?>
<section class="section-data pt-5 pb-lg-0 pb-4" <?php if($section_id): ?> id="<?php echo $section_id; ?>" <?php endif; ?><?if($bg_color_section && !empty($bg_graphic)): ?>style="background: linear-gradient(<?php echo $bg_color_section;?>, <?php echo $bg_color_section;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php endif; ?>>
    <div class="container pt-lg-5 pb-lg-5">
        <div class="row pt-lg-5">
            <div class="col-12">
                <h3 class="cl-white pe-md-4 link-text mb-3 wrap-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $project_data_description; ?></h3>
            </div>
        </div>
        <div class="row pb-lg-5">
            <div class="col-lg-3"></div>
            <div class="col-lg-9" id="sd_Content">
                <div class="container-fluid">
                    <div class="row">
                        <?php foreach ( $project_data_items as $item_data ): ?>
                        <div class="col-lg-6 mt-2">
                            <h4 class="subtitle-h4 cl-white txt-upper wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $item_data['data_intro'] ?></h4>
                            <div class="dp-1 cl-white wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><?php echo $item_data['data_text']; ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    