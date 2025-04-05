<?php
/**
 * Template part for displaying single team members
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eventage
 */

?>
<?php $position = get_field('position'); 
$team_image = get_field('team_image'); 
$bio = get_field('bio');
$fun_facts = get_field('fun_facts'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   
	<div class="entry-content">
		<section class="bio-team-title overflow-hidden z-[1] max-w-full relative pt-[3em] lg:pt-[130px] pb-[44px] bg-primary">
		  <div class="container mx-auto">
		    <div class="h-full flex flex-col lg:flex-row items-start justify-start lg:justify-end gap-y-[2em] lg:gap-y-0 lg:gap-x-[69px]">
			<div class="w-full lg:w-[46%]"></div>
		     	<div class="w-full lg:w-[54%]">						
						<h3 class="text-white mb-0 capitalize"><?php the_title();?></h3>
						<?php if($position): ?>
							<h6 class="text-white mb-0 mt-[10px]"><?php echo $position; ?></h6>
						<?php endif; ?>	
				</div>
			</div>
		  </div>
		</section>
		<section class="bio-team-section h-fit max-w-full relative py-[40px]">
			<div class="container mx-auto">
				<div class="h-full flex flex-col lg:flex-row items-start gap-y-[2em] lg:gap-y-0 lg:gap-x-[69px]">
					<div class="w-full lg:w-[46%]">
					<div class="team-box lg:mt-[-212px] relative z-[2] rounded-[5px] h-fit sm:h-[500px] lg:h-[578px] xl:h-[616px]"><?php echo get_the_post_thumbnail( get_the_id(), 'full', array( 'class'  => 'w-full h-full object-cover object-top transition-opacity duration-300 rounded-[5px]' ) ); ?></div>
					<?php  if(!empty($team_image)): 
                                echo wp_get_attachment_image(
                                    $team_image['ID'],
                                    'full',
                                    false,
                                    array(
                                        'class' => 'transition-all duration-300 mt-[32px] rounded-[5px] h-fit lg:h-[406px] w-full object-cover object-center',
                                        'alt' => esc_attr($team_image['alt']),
                                    )
                                );
                            endif;  ?>
					</div>
					<div class="w-full lg:w-[54%]">						
						<?php if($bio): ?>
							<div class="text-secondary style-disc"><?php echo $bio; ?></div>
							<?php endif; ?>
							<?php if($fun_facts): ?>
							<div class="text-secondary mt-[38px] style-disc px-[39px] py-[33px] rounded-[5px] border-[3px] border-primary"><?php echo $fun_facts; ?></div>
							<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		<?php
		get_template_part('template-parts/sections/section-team-slider');
		the_content();		
		?>
	</div><!-- .entry-content -->

</article><!-- #post-${ID} -->
