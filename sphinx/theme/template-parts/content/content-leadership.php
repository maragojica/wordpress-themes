<?php
/**
 * Template part for displaying single leadership
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sphinx
 */

?>
<?php 
$bg_image_overlay = get_field('leadership_bg_image', 'option');
$position = get_field('position'); 
$bio = get_the_content(); 
$add_banner_cta = get_field('add_banner_cta'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="entry-content-single max-w-full relative bg-foreground overflow-hidden relative z-[1]">
		<div class="w-full h-full padding-large  lg:pt-0 pt-0-important">
			<?php if(!empty($bg_image_overlay)): ?>
				<div class="top-background bg-cover bg-no-repeat bg-top w-full pt-[4em] lg:pt-[100px] lg:pb-[100px] pb-[4em] relative z-[1]" style="background-image: url('<?php echo esc_url($bg_image_overlay['url']); ?>');" >
					<div class="container mx-auto">
						<h2 class="text-white mb-0 lg:hidden block">
						<?php the_title(); ?>
					</h2> 
					<?php if($position): ?>
						<div class="eyebrow text-white mt-[10px] lg:hidden block" data-aos="fade-in" >
							<?php echo $position; ?>
						</div>   
					<?php endif; ?> 
					</div>
				</div>
		     <?php endif; ?>	
			 <div class="bottom-gradient bg-gradient-custom-reverse w-full lg:mt-[-100px] mt-[-4em] relative z-[2]">
				<div class="container mx-auto" data-aos="fade-in"> 
					<div class="max-w-full lg:max-w-[90%] 2xl:max-w-[80%] mx-auto">
						<div class="flex flex-col lg:flex-row items-start justify-center gap-y-[2em] lg:gap-y-0 lg:gap-x-[60px]">
							<div class="w-full lg:w-1/2 xl:w-1/4">								
								<?php 
                                if ( has_post_thumbnail( $post->ID ) ): ?>
                                <div class="w-full h-fit lg:h-[330px] 2xl:h-[412px] team-box rounded-[3px] lg:mt-0 mt-[30px] relative overflow-hidden">
                                  <?php  echo get_the_post_thumbnail( 
                                        $post->ID,
                                        'full', 
                                        array( 
                                            'class' => 'w-full h-full object-cover object-top transition-opacity duration-300'
                                        ) 
                                    ); ?>                                   
                                    </div>
                                <?php
                                endif; 
                                ?>
							</div>
							<div class="w-full lg:w-1/2 xl:w-3/4">
								 <h2 class="text-white mb-0 lg:block hidden">
									<?php the_title(); ?>
								</h2> 
								<?php if($position): ?>
									<div class="eyebrow text-white mt-[10px] lg:block hidden" data-aos="fade-in" >
										<?php echo $position; ?>
									</div>   
								<?php endif; ?>  
								<div class="w-full h-[1px] bg-primary mt-[30px] lg:block hidden"></div>
								 <?php if($bio): ?>
									<div class="text-large text-white style-disc lg:mt-[30px]" data-aos="fade-in" data-aos-delay="100" >                 
										<?php echo $bio; ?>                   
									</div>
								<?php endif; ?> 
							</div>	
						</div>
					</div>
				 </div>
			 </div>	
		</div>
	</section>
	<?php if($add_banner_cta): ?>
		<?php get_template_part( 'template-parts/global/global', 'leadership-cta-banner' ); ?>
	<?php endif; ?>
</article><!-- #post-${ID} -->
