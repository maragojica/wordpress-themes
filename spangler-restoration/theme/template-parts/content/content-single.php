<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spangler_Restoration
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<section class="default-content-section max-w-full h-[20em] lg:h-[25em] xl:h-[600px] relative bg-cover bg-fixed bg-center bg-no-repeat">
	<div class="overlay flex flex-col h-full w-full justify-end items-start bg-[#00194C] text-left absolute z-[2] top-0 left-0 padding-small  lg:pt-0 pt-0-important">
		<div class="container mx-auto"> 
				<div class="relative">
				   <!--<div class="text-white text-sub mb-[5px] uppercase" data-aos="fade-up" data-aos-offset="200" data-aos-delay="30"><?php the_time('F j, Y'); ?></div>-->
					<h2 class="text-white uppercase" data-aos="fade-up" data-aos-offset="200" data-aos-delay="40">
					<?php the_title();?> 
					</h2>
		        </div> 
			</div>
		</div>
</section>
<section class="info-blog-section padding-medium">
		<div class="container mx-auto">
			<div class="flex lg:flex-row lg:gap-[2em] flex-col w-full justify-center" data-aos="fade-up" data-aos-offset="200" data-aos-delay="30">
			    <div class="w-full lg:w-[30%]">
				    <div class="single-sidebar">  
                        <?php echo do_shortcode('[ez-toc]'); ?>    
                   </div> 
				</div>
				<div class="w-full lg:w-[60%] content-info">
				<div classs="w-full content-info-post content-post style-disc text-[#3E416C]" data-aos="fade-up" data-aos-offset="200" data-aos-delay="30">
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
