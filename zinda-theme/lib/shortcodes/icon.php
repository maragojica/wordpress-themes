<?php
/*--------------------------------
Example Shortcode Wrapper
[icon
 name="#"
 class="#"
 full="true"]
---------------------------------*/

function hc_icon_shortcode($atts = [], $content = null) {

    $name = "";
    $class = "";
    $full = false;

    extract( shortcode_atts( array(
        'name' => '',
        'class' => '',
        'full' => false,
    ), $atts ) );

    $full ? $path_sprite = 'sprite-full.svg#' : $path_sprite = 'sprite.svg#';

    ob_start();
    //BEGIN OUTPUT
    ?>

    <svg class="icon <?=$class;?>"><use xlink:href="<?=CHILD_URL?>/assets/app/svg/symbol/<?=$path_sprite . $name;?>"></use></svg>

    <?php
    //END OUTPUT
    $output = ob_get_contents();
    ob_end_clean();
    return  $output;
}

add_shortcode('icon', 'hc_icon_shortcode');