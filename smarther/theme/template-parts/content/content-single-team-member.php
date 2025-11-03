<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package smarther
 */
$top_space = get_field('add_top_spacing');
?>
<div class="single-content <?php if($top_space): ?>pt-[132px] lg:pt-[135px] xl:pt-[169px]<?php endif; ?>">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="content-section max-w-full relative  bg-neutral padding-medium">
		<div class="content-box relative z-2 w-full">
			<div class="container mx-auto">  
				<div class="w-full mx-auto lg:max-w-[75%]">   
					<div class="flex flex-col lg:flex-row lg:flex-row-reverse flex-col items-stretch lg:gap-y-0 gap-y-[3em]">    
						<div class="w-full lg:w-7/12 flex flex-col lg:py-[12px] lg:pl-[60px] lg:pr-0 justify-start">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="lg:hidden block mb-[2em] team-member-image overflow-hidden w-full 2xl:h-[300px] lg:h-[220px] md:h-[25em] sm:h-[20em] h-[15em] relative rounded-[10px]">
									<?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover object-top' ) ); ?>
								</div>
							<?php endif; ?>
							<?php $name = get_field('name');
							$position = get_field('title__position');
							$bio = get_field('bio'); ?>
							<?php if($name): ?>
								<h2 class="text-foreground mb-0 heading-shape"><?php echo $name; ?></h2>
						     <?php endif; ?>	
							 <?php if($position): ?>
								<div class="eyebrow text-foreground mt-[25px]">
									<?php echo $position; ?>
								</div>
							<?php endif; ?>
							<?php if($bio): ?>
								<div class="bio-info text-medium text-foreground style-disc lg:mt-[40px] mt-[1em]"><?php echo $bio; ?></div>
							<?php endif; ?>	
						</div>
						<div class="w-full lg:w-5/12">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="lg:block hidden team-member-image overflow-hidden w-full 2xl:h-[300px] lg:h-[220px] md:h-[25em] sm:h-[20em] h-[15em] relative rounded-[10px]">
									<?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover object-top' ) ); ?>
								</div>
							<?php endif; ?>
							<?php $sidebar_content = get_field('sidebar_content'); 
							if($sidebar_content): ?>
								<div class="sidebar-content text-medium text-foreground style-disc lg:mt-[40px]">
									<?php foreach($sidebar_content as $content): 
										$title = $content['title'];
										$text = $content['text']; ?>
										<div class="mb-[1em] lg:mb-[40px]">
											<?php if($title): ?>
												<div class="eyebrow text-quaternary mb-[12px]"><?php echo $title; ?></div>
											<?php endif; ?>
											<?php if($text): ?>
												<div class="text-medium text-foreground style-disc"><?php echo $text; ?></div>
											<?php endif; ?>
										</div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>		           
				</div>
			</div>	
		</div>
	</section>
	<?php the_content(); ?>
</article><!-- #post-${ID} -->
</div>