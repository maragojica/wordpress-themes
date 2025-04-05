<?php

// Add Shortcode
function show_adwards_function() {
	$output = '';
	global $post;
	$isSpanishPage = is_custom_locations('/es/');

    if ($isSpanishPage) {
		$output .= '<section id="awards-and-recognition" class="a-and-r">
						<h2>Nuestros Premios</h2>
							<div class="copy ac">
							</div>';
    }
    else {
		$output .= '<section id="awards-and-recognition" class="a-and-r">
						<h2>Our Awards</h2>
							<div class="copy ac">
							</div>';
	}

	$args = array(
		'post_type' => ($isSpanishPage ? 'award_sp':'award_en'),
		'post_status' => 'publish',
		'posts_per_page' => 4,
		'orderby' => 'title',
		'order' => 'rand',
	);
	
	$loop = new WP_Query( $args );
	$output .= '<div class="awards">';

	while ( $loop->have_posts() ) : $loop->the_post(); 
		
		$output .= '<div class="award">
						<div class="award-icon">';
		$output .= wp_get_attachment_image(get_post_meta($post->ID, 'award_image', true));
		$output .= '</div>
						<p> '.strtoupper(get_the_content($post->ID)).'</p>
					</div>';
	endwhile;
	wp_reset_postdata();

	$output .= '</div>
				</section>
				<style> 
					.awards {justify-content: space-between;}
					.award {display: block; background: rgba(255,255,255,1); border-style: none; border-radius: 0px; z-index: 56;  padding: 0px 10px;}
					.awards .award p {font-size: 11px !important; font-weight: 500 !important;}
					section#awards-and-recognition .award p {margin-top: 0px !important;}
				</style>';

	return $output;
}
add_shortcode( 'show_awards', 'show_adwards_function' );