<?php

class ScheduleDemoWidget extends WP_Widget
{
    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'schedule_demo',
            'description' => 'Schedule a Dame Widget',
        );
        parent::__construct( 'schedule_demo', 'Schedule Demo', $widget_ops );
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
        $content = get_field('content', $widget_id);
        $btn_text = get_field('button_text', $widget_id);
        $btn_link = get_field('button_link', $widget_id);

        // outputs the content of the widget
        $output = "";
        $output .= "<div class='card-box-widgets z-index-top w-100 bg-gray mb-5'>";
        $output .= "<h2 class='sub-title-section pb-3 mb-0 cl-white text-uppercase'>$title</h2>";
        $output .= "<div class='copy-text font-adrianna cl-white pb-0'>$content</div>";
        $output .= "<a href='$btn_link' class='btn btn-orange-light font-adrianna'>$btn_text</a>";
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