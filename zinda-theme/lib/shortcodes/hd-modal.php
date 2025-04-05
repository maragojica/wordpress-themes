<?php
/*--------------------------------
Example Shortcode Wrapper
[hd-modal
 video_id="#"
 title="#"
 type="#"
 class="#"
 cta="#"
]
---------------------------------*/

function hd_modal($atts = [], $content = null) {
    global $post;

    $video_id = "";
    $title = "";
    $type = "";
    $class = "";
    $cta = "";

    extract( shortcode_atts( array(
        'video_id' => '',
        'title' => '',
        'type' => '',
        'class' => '',
        'cta' => '',
    ), $atts ) );

    ob_start();
    //BEGIN OUTPUT
    ?>

    <button class="open-hd-modal <?= $class ?>" data-hd-modal-title="<?= $title ?>" data-hd-modal-content-type="<?= $type ?>" data-hd-modal-content="<?= $video_id ?>"><?= $cta ?></button>

    <?php
    //END OUTPUT
    $output = ob_get_contents();
    ob_end_clean();
    return  $output;
}
add_shortcode('hd-modal', 'hd_modal');