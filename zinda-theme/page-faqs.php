<?php
/*
 * Template Name: FAQs Listing
 * */

add_action('genesis_entry_content', 'custom_faqs_content', 20);

function custom_faqs_content() {
    global $post;
    global $in_single_content;
    global $hc_settings;
    $in_single_content = false;

    $primary_faqs_array = [];

    $primary_faqs = get_field('primary_faqs');
    if($primary_faqs){
        foreach ($primary_faqs as $primary_faq) {
            $url = str_replace(site_url().'/' , '' , $primary_faq['slug']);
            $primary_faqs_array[] = find_page_by_permalink($url);
        }
    }
    ?>

    <div class="faq-wrap">
        <?php $terms = get_terms($hc_settings['faqs_category_taxonomy']);
        $spanish_term_ids = get_field('faqs_spanish_category', 'option');
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
            $filtered_terms = array_filter($terms, function($term) use ($spanish_term_ids){
                if(is_custom_locations('/es/')){
                    return in_array($term->term_id, $spanish_term_ids);
                }else{
                    return !in_array($term->term_id, $spanish_term_ids);
                }
            });
            usort($filtered_terms, function($a, $b) {
                return strcmp($a->name, $b->name);
            }); ?>
            <div id="filters" class="faq-filter-terms">
                <?php echo '<a href="#" class="faq-filter-active" data-filter="all">All</a>';
                foreach ($filtered_terms as $term) {
                    echo '<a href="#" data-filter="' . $term->slug . '">' . $term->name . '</a>';
                } ?>
            </div>
            <?php
        } ?>

        <ul id="items" class="faq-page-items mt-5 mb-5">
            <?php
            $args = array(
                'posts_per_page' => -1,
                'post_type' => 'page',
                'order' => 'DESC',
                'tax_query' => [
                    array(
                        'taxonomy' => $hc_settings['faqs_category_taxonomy'],
                        'field' => 'term_id',
                        'terms' => array_map(function($t){
                            return $t->term_id;
                        }, $filtered_terms),
                        'operator' => 'IN'
                    ),
                ]
            );



            if($primary_faqs_array){
                $exclude_post_ids = array();
                foreach ($primary_faqs_array as $faq) {
                    $exclude_post_ids[] = $faq['id'];
                    $the_terms = get_the_terms($faq['id'], $hc_settings['faqs_category_taxonomy']);
                    if($the_terms) {
                        $the_terms = current($the_terms);
                        $term = $the_terms->slug; ?>
                        <li class="faq-page-item" data-filter-item="<?=$term?>">
                            <a href="<?=$faq['permalink']?>" title="<?=$faq['title']?>" class="faq-page-link">
                                <h2 class="faq-page-title"><?=$faq['title']?></h2>
                                <div class="faq-page-thumb">
                                    <?php if ( get_the_post_thumbnail($faq['id']) ) {
                                        echo get_the_post_thumbnail($faq['id'], 'medium', ['alt' => $faq['title'], 'title' => $faq['title']]);
                                    } else { ?>
                                        <img src="<?=CHILD_URL?>/assets/app/img/default-thumb.jpg" alt="<?=$faq['title']?>" title="<?=$faq['title']?>" width="300" height="250">
                                        <?php
                                    } ?>
                                </div>
                            </a>
                        </li>
                        <?php
                    }
                }
                $args['post__not_in'] = $exclude_post_ids;
            }

            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
                $the_terms = get_the_terms($post->ID, $hc_settings['faqs_category_taxonomy']);
                if($the_terms) {
                    $the_terms = current($the_terms);
                    $term = $the_terms->slug; ?>
                    <li class="faq-page-item" data-filter-item="<?=$term?>">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="faq-page-link">
                            <h2 class="faq-page-title"><?php the_title(); ?></h2>
                            <div class="faq-page-thumb">
                                <?php if ( get_the_post_thumbnail($post->ID) ) {
                                    the_post_thumbnail('medium', ['alt' => get_the_title(), 'title' => get_the_title()]);
                                } else { ?>
                                    <img src="<?=CHILD_URL?>/assets/app/img/default-thumb.jpg" alt="<?=the_title();?>" title="<?=the_title();?>" width="300" height="250">
                                    <?php
                                } ?>
                            </div>
                        </a>
                    </li>
                    <?php
                }
            endwhile; else : ?>
                <!-- IF NOTHING FOUND CONTENT HERE -->
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </ul>
    </div>

    <?php

    unset($in_single_content);

}

genesis();