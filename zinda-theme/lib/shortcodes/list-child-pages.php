<?php

add_shortcode('list-child-pages', function () {
	global $post;

    $children = wp_list_pages( array(
        'title_li' => '',
        'child_of' => $post->ID,
        'echo'     => 0
    ) );

    if ( $children ) { ?>
        <ul>
            <?php echo $children; ?>
        </ul>
    <?php }

});