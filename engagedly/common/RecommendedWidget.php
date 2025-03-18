<?php

class RecommendedWidget extends WP_Widget
{
    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'recommended',
            'description' => 'Recommended Posts',
        );
        parent::__construct( 'recommended', 'Recommended Posts', $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        $widget_id = 'widget_'.$args['widget_id'];
        $title = get_field('title', $widget_id);
        $total = get_field('post_per_page', $widget_id);

        global $post;

        $args = array(
            'posts_per_page'    =>  $total,
            'category_name'     =>  get_the_category($post->ID)[0]->slug,
            'post_type'         =>  $post->post_type,
            'orderby'           =>  'ID',
            'order'             =>  'DESC',
        );

        $posts = new WP_Query( $args );

        // outputs the content of the widget
        $output = "";
        $output .= "<div class='card-box-widgets z-index-top w-100 bg-gray mb-5'>";
        $output .= "<h2 class='sub-title-section pb-3 mb-0 cl-white text-uppercase'>$title</h2>";

        if ($posts->have_posts())
        {
            $output .= "<div class='copy-text font-adrianna cl-white pb-0 list-widget'><ul>";

            while ($posts->have_posts())
            {
                $posts->the_post();
                $post_title = get_the_title();
                $post_link = get_the_permalink();

                $output .= "<li><a href='$post_link'><i class='fa fa-angle-right float-left mr-2' aria-hidden='true'></i>$post_title</a></li>";
            }

            $output .= "</ul></div>";
        }
        wp_reset_postdata();

        $output .= "</div>";

        echo $output;
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }
}