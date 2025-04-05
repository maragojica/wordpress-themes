<?php
error_reporting(E_ERROR | E_PARSE);
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
$pagesAndPosts = new WP_Query(
    array(
        'post_type' => ['post','page'],
        'posts_per_page' => -1,
    )
);
foreach ($pagesAndPosts->posts as $data) {
	$postID = $data->ID;
	$post = get_post($postID);
	$doc = new DOMDocument('1.0', 'utf-8');
	// it loads the content without adding enclosing html/body tags and also the doctype declaration
	if(!empty($post->post_content)){
		$doc->LoadHTML(mb_convert_encoding($post->post_content, 'HTML-ENTITIES', 'UTF-8'));
		if(count($doc->getElementsByTagName('img'))):
			foreach($doc->getElementsByTagName('img') as $node) {
				if(!$node->getAttribute('alt') || empty($node->getAttribute('alt'))){
					$node->setAttribute('alt' , get_the_title($postID));
				}
			}
		
		endif;
		$content = $doc->saveHTML();
        if($content){
            kses_remove_filters(); // https://stackoverflow.com/a/47750009
            $updo = wp_update_post([
		    	'ID' => $postID,
	    		'post_content' => $content
    		]);
            kses_init_filters();
        }
	}
}
	
die(var_dump($updo));