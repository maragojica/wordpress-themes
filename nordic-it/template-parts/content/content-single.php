<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nordic_IT
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("inner-content"); ?>>
     <section class="info-blog-section padding-small">
		<div class="container mx-auto">
			<div class="flex w-full justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">
				<div class="w-full xl:w-8/12">
				<h3 class="text-primary mb-[10px]"><?php the_time('M j, Y'); ?></h3>
			<?php the_title( '<h2 class="text-secondary-dark">', '</h2>' ); ?>
			<?php 
				if ( has_excerpt() ) {
					$excerpt = get_the_excerpt(); ?>
					<div class="font-text-font style-disc text-primary pt-[30px]"><?php echo $excerpt; ?></div>
				<?php } ?>
				<?php if (has_post_thumbnail()) : ?>								  
					<?php the_post_thumbnail('full', array('class' => 'w-full h-[15em] md:h-[540px] lg:h-[540px] rounded-[12px] w-full object-cover object-center mt-[48px] mb-[80px]')); ?>				
				<?php endif; ?>
				<div classs="w-full font-text-font style-disc text-primary">
					<?php
					the_content();	
					?>
				</div><!-- .entry-content -->
				</div>			
			</div>
		</div>
	 </section>
	 <?php  $show_related_post = get_field('show_related_post'); 
	 if($show_related_post): 
		get_template_part('template-parts/sections/section-related-post');
	  endif; ?>
</article><!-- #post-${ID} -->
