<?php

// Adds widget: Practice Areas
class AdditionalLocations_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'additional_locations_widget',
            esc_html__('Additional Locations', 'textdomain')
        );
    }

    private $widget_fields = array();

    public function widget($args, $instance)
    {

        global $hc_settings;
        global $post;

        $location_widget_title = get_field($hc_settings['location_widget_title'], $post->ID);

        if(empty($location_widget_title) || strtolower($location_widget_title) == "-- none --"){
            return;
        }

        $postTerms =  wp_get_object_terms($post->ID, $hc_settings['state_taxonomy']);
        $state = '';
        if ( ! empty( $postTerms ) && ! is_wp_error( $postTerms ) ){
            foreach ( $postTerms as $term ) {
                $state .= '' . $term->slug;
            }
        }
        //Widget Toggle
        if ($location_widget_title && !is_search() && !is_404()):
            if($state){

                $args = array(
                    'posts_per_page' => -1,
                    'post_type' => 'page',
                    'tax_query' => array(
                        array(
                            'taxonomy' => $hc_settings['state_taxonomy'],
                            'field' => 'slug',
                            'terms' => $state
                        ),
                    ),
                    'meta_query' => array(
                        array(
                            'key' => $hc_settings['location_widget_title'],
                            'value' => get_field($hc_settings['location_widget_title'], $post->ID),
                            'compare' => '=',
                        ),
                    ),
                    'orderby' => 'rand',
                    'order' => 'asc',
                    'post__not_in' => array($post->ID)
                );
            }else{
                $args = array(
                    'posts_per_page' => -1,
                    'post_type' => 'page',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => $hc_settings['state_taxonomy'],
                            'operator' => 'EXISTS',
                        ),
                        array(
                            'taxonomy' => $hc_settings['location_taxonomy'],
                            'operator' => 'NOT EXISTS',
                        ),
                    ),
                    'meta_query' => array(
                        array(
                            'key' => $hc_settings['location_widget_title'],
                            'value' => get_field($hc_settings['location_widget_title'], $post->ID),
                            'compare' => '=',
                        ),
                    ),
                    'orderby' => 'rand',
                    'order' => 'asc',
                    'post__not_in' => array($post->ID)
                );
            }

            $posts = get_posts($args);

            if (!empty($hc_settings['priority_locations'])) {
                foreach (array_reverse($hc_settings['priority_locations']) as $loc) {
                    foreach ($posts as $pk => $p) {
                        $city_terms = get_the_terms($p->ID, $hc_settings['location_taxonomy']);
                        if ($city_terms) {
                            $city = current($city_terms);

                            if ($city->name === $loc) {
                                unset($posts[$pk]);
                                array_unshift($posts, $p);
                            }
                        }
                    }
                }
            }

            $posts = array_slice($posts, 0, 10);

            if ($posts) { ?>
                <div class="widget location-widget-outer">
                    <h3 class="widget-title widgettitle">
                        <?php if (is_custom_locations('/es/')) { ?>
                            Ubicaciones adicionales
                        <?php } else { ?>
                            Additional Locations
                        <?php } ?>
                    </h3>
                    <ul class="location-widget-links">

                    <?php foreach ($posts as $p) {
                            $city_terms = get_the_terms($p->ID, $hc_settings['location_taxonomy']);
                            $state_terms = get_the_terms($p->ID, $hc_settings['state_taxonomy']);
							if ($city_terms && is_array($city_terms) && count($city_terms) > 0) {
								$city = current($city_terms);
								$location_name = esc_html($city->name);
							} else if ($state_terms && is_array($state_terms) && count($state_terms) > 0){
								$state = current($state_terms);
								$location_name = esc_html($state->name);
							} else {
                                continue;
                            } 
                            if(get_field($hc_settings['location_widget_title'], $p->ID)) {
                                $practice_area = get_field($hc_settings['location_widget_title'], $p->ID);
                            } ?>

                            <?php 
                            /*
                                $churl = esc_url(get_permalink($p->ID));    
                                if (check_url_status($churl) === 'ok') {
                                    ?>
                                    <li class="single-location-link"> 
                                        <a class="menu-item-<?= esc_attr($p->ID) ?>" title="<?= esc_attr(get_the_title($p->ID)) ?>" href="<?= esc_url(get_permalink($p->ID)); ?>"><?= $location_name . ($practice_area ? ' ' . $practice_area : ' Personal Injury') . ' Lawyer' ?></a>
                                    </li>

                                    <?php
                                }
                                */
                            ?>

							<li class="single-location-link"> 
                                <a class="menu-item-<?= esc_attr($p->ID) ?>" title="<?= esc_attr(get_the_title($p->ID)) ?>" href="<?= esc_url(get_permalink($p->ID)); ?>"><?= $location_name . ($practice_area ? ' ' . $practice_area : ' Personal Injury') . ' Lawyer' ?></a>
							</li>

                        <?php } ?>

                    </ul>
                </div>
            <?php }

        endif;

//        echo $args['after_widget'];
    }

    public function field_generator($instance)
    {
        $output = '';
        foreach ($this->widget_fields as $widget_field) {
            $default = '';
            if (isset($widget_field['default'])) {
                $default = $widget_field['default'];
            }
            $widget_value = !empty($instance[$widget_field['id']]) ? $instance[$widget_field['id']] : esc_html__($default, 'textdomain');
            switch ($widget_field['type']) {
                default:
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr($this->get_field_id($widget_field['id'])) . '">' . esc_attr($widget_field['label'], 'textdomain') . ':</label> ';
                    $output .= '<input class="widefat" id="' . esc_attr($this->get_field_id($widget_field['id'])) . '" name="' . esc_attr($this->get_field_name($widget_field['id'])) . '" type="' . $widget_field['type'] . '" value="' . esc_attr($widget_value) . '">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form($instance)
    {
        $this->field_generator($instance);
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        foreach ($this->widget_fields as $widget_field) {
            switch ($widget_field['type']) {
                default:
                    $instance[$widget_field['id']] = (!empty($new_instance[$widget_field['id']])) ? strip_tags($new_instance[$widget_field['id']]) : '';
            }
        }
        return $instance;
    }
}

function register_additional_locations_widget()
{
    register_widget('AdditionalLocations_widget');
}

add_action('widgets_init', 'register_additional_locations_widget');
