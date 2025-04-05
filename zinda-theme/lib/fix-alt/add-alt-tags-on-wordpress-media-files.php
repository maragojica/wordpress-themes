<?php
if( php_sapi_name() !== 'cli' ) {
	die("Meant to be run from command line");
}
function find_wordpress_base_path() {
    $dir = dirname(__FILE__);
    do {
        //it is possible to check for other files here
        if( file_exists($dir."/wp-config.php") ) {
            return $dir;
        }
    } while( $dir = realpath("$dir/..") );
    return null;
}
define( 'BASE_PATH', find_wordpress_base_path()."/" );
define('WP_USE_THEMES', false);
global $wp, $wp_query, $wp_the_query, $wp_rewrite, $wp_did_header;
require(BASE_PATH . 'wp-load.php');
$media_query = new WP_Query(
    array(
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'posts_per_page' => -1,
    )
);
foreach ($media_query->posts as $post) {
    $thumbnail_name = basename ( get_attached_file( $post->ID ) );
    if(empty(get_post_meta($post->ID , '_wp_attachment_image_alt'))){
        $thumbnail_name = str_replace('-' , ' ' , $thumbnail_name);
        $thumbnail_name = str_replace('_' , ' ' , $thumbnail_name);
        $thumbnail_name = explode('.' , $thumbnail_name)[0];//remove .jpg .png or whatever
        $thumbnail_name = ucfirst(strtolower($thumbnail_name));
        update_post_meta( $post->ID , '_wp_attachment_image_alt', $thumbnail_name);
    }
    
}
var_dump("DONE");
die();