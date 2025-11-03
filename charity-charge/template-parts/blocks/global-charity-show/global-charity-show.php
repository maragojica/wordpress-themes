<?php
$global_block_charity_show = get_field('global_block_charity_show');
if ($global_block_charity_show) {
    include get_template_directory() . '/template-parts/global/global-charity-show.php';    
 }
?>
