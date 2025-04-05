<section id="awards-and-recognition" class="a-and-r">
  <h2 class="bottom-line centered">Premios & reconocimientos</h2>
	<?php
       $args = array(
        'post_type' => 'award_sp',
        'post_status' => 'publish',
        'posts_per_page' => 4,
        'orderby' => 'title',
        'order' => 'DESC',
    );
	$loop = new WP_Query( $args ); ?>
  <div class="awards">
  <?php while ( $loop->have_posts() ) : $loop->the_post();  ?>  
    <div class="award">
      <div class="award-icon">
          <?php
          $post = get_post(); // Retrieve the current post object
          $award_image = get_post_meta($post->ID, 'award_image', true);
          echo wp_get_attachment_image($award_image);
          ?>
      </div>
      <p><?php echo strtoupper(get_the_content()); ?></p>
  </div>
  <?php endwhile;
				wp_reset_postdata();
			?>
</div>
</section>