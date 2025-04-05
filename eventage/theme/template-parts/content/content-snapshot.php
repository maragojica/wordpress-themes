<?php
/**
 * Template part for displaying single snapshots
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eventage
 */

?>
<?php $second_image = get_field('second_image'); 
$description = get_field('description');
$add_client_testimonial = get_field('add_client_testimonial');
$label_testimonial = get_field('label_testimonial');
$client_testimonial = get_field('client_testimonial'); 
$name_testimonial = get_field('name_testimonial');  ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   
	<div class="entry-content">
		<section class="hero-inner-color overflow-hidden z-[1] max-w-full relative pt-[3em] lg:pt-[156px] pb-[44px] bg-primary">
		  <div class="container mx-auto">
		    <div class="h-full flex flex-col lg:flex-row items-start justify-start lg:justify-end gap-y-[2em] lg:gap-y-0 lg:gap-x-[69px]">
			<div class="w-full lg:w-[46%]"></div>
		     	<div class="w-full lg:w-[54%]">						
						<h3 class="text-white mb-0 lg:max-w-[80%]"><?php the_title();?></h3>
				</div>
			</div>
		  </div>
		</section>
		<section class="bio-team-section h-fit max-w-full relative py-[40px]">
			<div class="container mx-auto">
				<div class="h-full flex flex-col lg:flex-row items-start gap-y-[2em] lg:gap-y-0 lg:gap-x-[69px]">
					<div class="w-full lg:w-[46%]">
					<div class="team-box lg:mt-[-230px] relative z-[2] rounded-[5px] h-fit lg:h-[350px] xl:h-[413px]"><?php echo get_the_post_thumbnail( get_the_id(), 'full', array( 'class'  => 'w-full h-full object-cover object-top transition-opacity duration-300 rounded-[5px]' ) ); ?></div>
					<?php  if(!empty($second_image)): 
                                echo wp_get_attachment_image(
                                    $second_image['ID'],
                                    'full',
                                    false,
                                    array(
                                        'class' => 'transition-all duration-300 mt-[32px] rounded-[5px] h-fit lg:h-[484px] xl:h-[554px] w-full object-cover object-center',
                                        'alt' => esc_attr($second_image['alt']),
                                    )
                                );
                            endif;  ?>
					</div>
					<div class="w-full lg:w-[54%]">						
						<?php if($description): ?>
							<div class="text-secondary style-disc"><?php echo $description; ?></div>
							<?php endif; ?>
							<?php if($add_client_testimonial):
							 if($client_testimonial): ?>
							<div class="text-secondary mt-[38px] px-[30px] lg:px-[46px] pt-[80px] lg:pt-[95px] lg:pb-[50px] pb-[30px] rounded-[5px] border-[3px] border-primary relative">
								<?php if($label_testimonial): ?>
									<div class="absolute top-[-2px] left-[-2px] rounded-[5px] py-[10px] px-[20px] label-testimonials text-center flex items-center justify-center bg-primary text-white"><?php echo $label_testimonial;?></div>
							    <?php endif; ?>		
								<div class="info-text style-disc"><?php echo $client_testimonial; ?></div>
								<?php if($name_testimonial): ?>
									<h6 class="text-primary text-right pt-[30px] lg:pt-[40px] mb-0 font-[800]"><?php echo $name_testimonial; ?></h6>
							    <?php endif; ?>		
							</div>
							<?php endif;  endif; ?>
					</div>
				</div>
			</div>
		</section>
		<?php		
		the_content();		
		?>
	</div><!-- .entry-content -->

</article><!-- #post-${ID} -->
