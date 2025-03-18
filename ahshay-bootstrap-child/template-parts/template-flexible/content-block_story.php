
<?php  $sfs_image_1 = get_sub_field('sfs_image_1');
    $sfs_image_2 = get_sub_field('sfs_image_2');
    $sfs_text_1 = get_sub_field('sfs_text_1');
    $sfs_text_2 = get_sub_field('sfs_text_2');
    $bg_color_section = get_sub_field('bg_color_section');
    $section_id = get_sub_field('section_id');
?>
<section class="section-portfolio section-short-form-story" <?php if($section_id ): ?> id="<?php echo $section_id ; ?>" <?php endif; ?> <?php if($bg_color_section): ?>style="background-color: <?= $bg_color_section; ?>;" <?php endif; ?>>
    <div class="container ms-0">
        <div class="row">
            <div class="col-lg-4 ps-0 pe-0 sfs-imgs">
                <?php if ( !empty($sfs_image_1)): ?>
                    <div class="w-100 h-100">
                        <img src="<?php echo esc_url($sfs_image_1['url']) ?>" class="w-100" alt="<?php echo esc_attr($sfs_image_1['alt']) ?>">
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-4 sfs-texts p-5 text-center d-flex flex-column justify-content-center">
                <h3 class="m-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $sfs_text_1; ?></h3>
                <div class="text-uppercase label-1 my-3 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $sfs_text_2; ?></div>
            </div>
            <div class="col-lg-4 ps-0 pe-0 sfs-imgs">
                <?php if ( !empty($sfs_image_2)): ?>
                    <div class="w-100 h-100 text-end">
                        <img src="<?php echo esc_url($sfs_image_2['url']) ?>" class="w-100" alt="<?php echo esc_attr($sfs_image_2['alt']) ?>">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
     