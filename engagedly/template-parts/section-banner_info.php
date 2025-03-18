<?php
$banner_info_title = get_sub_field('title');
$banner_info_content = get_sub_field('content');
$banner_info_background = get_sub_field('background');
$banner_info_html_code = get_sub_field('html_code');
?>

<section id="full-container-banner" class="banner-info banner-info-wform banner-info-wbubble relative d-flex align-items-center justify-content-center">
    <div class="overlay overlay-bg-light-1"></div>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7">
                <div class="bg-bubbles-partner">
                    <div class="text-shape">
                        <h2 class="title-bubble cl-gray font-adrianna pb-2 text-uppercase text-center"><?php echo $banner_info_title; ?></h2>
                        <div class="copy-text font-adrianna cl-black text-center">
                            <p><?php echo $banner_info_content; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="box-become-partner-form">
                    <?php echo $banner_info_html_code; ?>
                </div>
            </div>
        </div>

    </div>
</section>
<style>
    .banner-info{
        background: url(<?php echo $banner_info_background['url'] ?>) top center;
    }

</style>
