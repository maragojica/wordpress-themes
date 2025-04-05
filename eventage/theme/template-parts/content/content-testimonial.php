<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eventage
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-content">
		<section class="hero-inner-color overflow-hidden z-[1] max-w-full relative pt-[3em] pb-[44px] lg:pt-[130px] lg:pb-[94px] bg-primary">
				<div class="container mx-auto">
					<div class="w-full">						
						<h2 class="text-white mb-0 capitalize"><?php the_title();?></h2>
					</div>
				</div>
		</section>
		<section class="content-section overflow-hidden max-w-full relative padding-small" >    
			<div class="container mx-auto">  
				<div class="w-full">					
					<div class="text-black style-disc">                 
					<?php
						the_content();		
						?>             
					</div>				    
				</div>  
			</div>  
		</section>
	</div><!-- .entry-content -->

</article><!-- #post-${ID} -->
