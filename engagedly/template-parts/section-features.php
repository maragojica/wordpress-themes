<?php
$feature_title = get_sub_field('title');
$feature_feature_layout_1 = get_sub_field('feature_layout_1');
$feature_feature_layout_2 = get_sub_field('feature_layout_2');
?>

<section id="section-featured" class="position-relative">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 left-10 bottom-10 z-index-0">
    <div class="container">
        <div class="box-main bg-gray">
            <div class="row">
                <?php foreach ($feature_feature_layout_1 as $feature): ?>
                <div class="col-md-12">
                    <h6 class="title-featured cl-white font-adrianna"><?php echo $feature['title']; ?></h6>
                    <div class="copy-text font-adrianna cl-ligth-white pb-4">
                        <p><?php echo $feature['content']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="box-three-featured">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <h2 class="title-section cl-gray font-adrianna text-center pb-4"><?php echo $feature_title; ?></h2>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <?php foreach ($feature_feature_layout_2 as $feature): ?>
                <div class="col-md-4 pb-4">
                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3"><?php echo $feature['title']; ?></div>
                        <div class="copy-text font-adrianna cl-gray-ligth">
                            <p><?php echo $feature['subtitle']; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>