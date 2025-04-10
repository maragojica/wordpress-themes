<?php
function find_lawyer_shortcode($atts = null) {

    global $hc_settings;
    $isSpanishPage = is_custom_locations('/es/');

    if ($isSpanishPage) {
        $posts = get_posts([
            'posts_per_page' => -1,
            'post_type' => 'page',
            'meta_key' => $hc_settings['location_widget_title'],
            'meta_value' => $hc_settings['main_practice_area_es'],
            'orderby' => 'rand'
        ]);
    }
    else {
        $posts = get_posts([
            'posts_per_page' => -1,
            'post_type' => 'page',
            'meta_key' => $hc_settings['location_widget_title'],
            'meta_value' => $hc_settings['main_practice_area'],
            'orderby' => 'rand'
        ]);
    }

    if(!empty($hc_settings['priority_locations'])) {
        foreach(array_reverse($hc_settings['priority_locations']) as $loc) {
            foreach($posts as $pk => $p) {
                $city_terms = get_the_terms($p->ID, $hc_settings['location_taxonomy']);
                if($city_terms){
                    $city = current($city_terms);

                    if($city->name === $loc) {
                        unset($posts[$pk]);
                        array_unshift($posts, $p);
                    }
                }
            }
        }
    }

    $posts = array_slice($posts, 0, 10);

    ob_start();

    if($posts): ?>
        <h4 class="widget-title"><?= (($isSpanishPage) ? 'Encuentra ahora mismo un abogado apasionado por su trabajo!' : 'Find Yourself a Passionate Lawyer Now!') ?></h4>
        <ul>
            <?php foreach($posts as $p) {

                $city_terms = get_the_terms($p->ID, $hc_settings['location_taxonomy']);
                if($city_terms) {
                    $city = current($city_terms)->name;
                } else {
                    continue;
                }

                ?>
                <li><a href="<?= get_permalink($p->ID) ?>">
                    <?= $city . (($isSpanishPage) ? " {$hc_settings['main_practice_area_es']} Abogado cerca a mi" : " {$hc_settings['main_practice_area']} Lawyer Near Me") ?>
                </a></li>
                <?php
            } ?>
        </ul>
    <?php
    endif;

    $content = ob_get_contents();
    ob_clean();
    return $content;

}


add_shortcode('find-lawyer', 'find_lawyer_shortcode');