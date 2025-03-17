<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Eric_Scott
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section class="default-content-section max-w-full h-[20em] lg:h-[25em] xl:h-[600px] relative bg-cover bg-fixed bg-center bg-no-repeat">
	<div class="overlay flex flex-col h-full w-full justify-end items-start bg-secondary text-left absolute z-[2] top-0 left-0 padding-medium  lg:pt-0 pt-0-important">
		<div class="container mx-auto"> 
				<div class="relative">
				   <div class="text-primary subtext mb-[5px]"><?php the_time('F j, Y'); ?></div>
					<h2 class="text-primary sm animate__animated fadeIn" data-animation="fadeIn" data-duration="1.2s" style="animation-duration: 1.2s;">
					<?php the_title();?> 
					</h2>
		        </div> 
			</div>
		</div>
			<div class="w-full absolute left-0 -bottom-[3px] z-3">
			<div class="line-border"></div>
			<div class="line-divider mt-[11px]"></div>        
		</div>
</section>
<section class="info-blog-section padding-small">
		<div class="container mx-auto">
			<div class="flex lg:flex-row flex-col w-full justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">
			    <div class="w-full lg:w-5/12">
				    <div class="single-sidebar">  
                        <?php echo do_shortcode('[ez-toc]'); ?>                      
                                               
                        </div> 
				</div>
				<div class="w-full lg:w-7/12 content-info">
				<?php 
				if ( has_excerpt() ) {
					$excerpt = get_the_excerpt(); ?>
					<div class="style-disc text-secondary pb-[26px]"><?php echo $excerpt; ?></div>
				<?php } ?>
				<?php if (has_post_thumbnail()) : ?>								  
					<?php the_post_thumbnail('full', array('class' => 'w-full h-[15em] lg:h-[450px] w-full object-cover object-center mb-[45px]')); ?>				
				<?php endif; ?>
				<div classs="w-full content-info-post content-post style-disc text-secondary">
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
