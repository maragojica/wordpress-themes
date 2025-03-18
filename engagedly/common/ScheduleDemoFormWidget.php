<?php

class ScheduleDemoFormWidget extends WP_Widget
{
    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'schedule_demo_form',
            'description' => 'Schedule a Dame Form Widget',
        );
        parent::__construct( 'schedule_demo_form', 'Schedule Demo Form', $widget_ops );
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

        // outputs the content of the widget
        $output = "";
        $output .= "<div class='box-bg-forms z-index-top w-100 bg-gray mb-5'>";
        $output .= "<div class='col-md-12'>";
        $output .= "<h2 class='title-section cl-white font-adrianna pb-2'>$title</h2>";
        $output .= "</div>";
        $output .= $content;
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