<?php

if( !function_exists('find_page_by_permalink')) { 
    function find_page_by_permalink($permalink){
        $args = array(
            'meta_query'        => array(
                array(
                    'key'       => 'custom_permalink',
                    'value'     => $permalink
                )
            ),
            'post_type'         => 'page',
            'posts_per_page'    => '1',
            'post_status' => array( 'publish'),
        );

        $posts = get_posts( $args );

        if(!$posts){
            return [];
        }

        return [
            'id' => $posts[0]->ID,
            'title' => $posts[0]->post_title,
            'permalink' => get_permalink($posts[0]->ID)
        ];

    }
}