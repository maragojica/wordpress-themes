<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verb_Studios
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php echo  get_template_part('template-parts/sections/section-internal-banner'); ?>
   <section class="section-content-default large">
	<div class="container">
		<div class="row row-post justify-center"> 
			<div class="col-xs-12 col-lg-8"> 
				<div class="dp-1 cl-fblack wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo the_content(); ?></div> 			                                        
			</div>                   
		</div>
	</div>            
</section>
  <?php echo get_template_part('template-parts/sections/section-cta-contact'); ?>	
</article><!-- #post-<?php the_ID(); ?> -->
