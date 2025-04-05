<?php

remove_action('genesis_entry_header', 'genesis_post_info', 12);
add_action('genesis_after_loop', 'form_custom', 10);

function form_custom() {
    $file_name = get_field('pdf_file_name');
    $file_size = get_field('pdf_file_size');
    $form = get_field('huspot_code');
    if($file_name || $file_size || $form) { ?>
        <div class="form-section">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <div class="form-section-head">
                        <span><?=$file_name;?></span>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-section-head">
                        <span><?=$file_size;?></span>
                    </div>
                </div>
            </div>
            <div class="sidebar-form">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-section-logo">
                            <img src="<?= CHILD_URL ?>/assets/app/img/logo/footer-logo.png" alt="Zinda Law Group" title="Zinda Law Group" width="274" height="57">
                            <img src="<?= CHILD_URL ?>/assets/app/img/zindalaw-guide-magazine.webp" alt="Zinda Law Guide Magazine" title="Zinda Law Guide Magazine" width="367" height="236">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="sidebar-form-main">
                            <h3>Thank you for your interest in our <i><strong>FREE</strong> personal injury guide</i></h3>
                            <p>Please provide your email address below so that we can deliver a copy of the guide directly to your inbox.</p>
                            <?=$form;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

genesis();