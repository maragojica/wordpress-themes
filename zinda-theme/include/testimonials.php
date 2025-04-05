<style>
  .priority-client-sec {
    position: relative;
    background: #154a65;
  }
  .priority-client-sec img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .priority-client-sec .container {
    position: relative;
    z-index: 2;
  }
  .client-testimonials {
    display: grid;
    grid-gap: 40px;
    grid-template-columns: repeat(3, 1fr);
    padding: 0 20px;
  }
  @media (max-width: 768px) { .client-testimonials { grid-template-columns: 1fr; }}
</style>
<section class="priority-client-sec">
    <img src="<?= CHILD_URL  ?>/assets/app/img/background/client-priority.jpg" alt="Testimonials" width="1920" height="669" loading="lazy">
<div class="container" style="margin:auto">
    <div class="heading-design-white">
        <h2>To Us, You Aren’t Just a Client, You Are a Priority</h2>
		<p>We have over 1000 5-star Google Reviews</p>
    </div>
	<?php
       $args = array(
        'post_type' => 'client_review',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'orderby' => 'title',
        'order' => 'ASC',
    );
	$loop = new WP_Query( $args );
	 ?>
    <div class="client-testimonials">
			<?php while ( $loop->have_posts() ) : $loop->the_post();  ?>
        <div class="TestimoniAl-mainBox-wrapper">
            <div class="testimonial-heading">
                <div class="Rating-main-section">
                    <?= do_shortcode('[icon name="stars"]'); ?>
                </div>
                <h4><?php the_title(); ?></h4>
                <?php echo get_the_content(); ?>
            </div>
         </div>
			<?php endwhile;
				wp_reset_postdata();
			?>
    </div>
</div>
</section>
