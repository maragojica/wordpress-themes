<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Amenity_Construction_Group
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<?php
		$title = get_the_title();
		$position = get_field('position');
		$company = get_field('company');
		$years_of_service = 1;
		$startDate = get_field('start_date');
		if ($startDate) {
			$startDateTime = new DateTime($startDate);
			$currentDateTime = new DateTime();
			$interval = $startDateTime->diff($currentDateTime);
			$years_of_service = $interval->y;
		}
		$bio = get_field('bio');
	?>

<section class="content-info-section overflow-hidden max-w-full relative padding-small bg-foreground" >
   <div class="container mx-auto">     
	  <div class="bg-white w-full 2xl:max-w-[1368px] max-w-fit lg:p-[60px] pt-[52px] pb-[47px] px-[20px] relative  shadow-custom overflow-y-auto max-h-[90vh] lg:max-h-max transform scale-95 transition-transform duration-300 custom-scroll">
			<div class="flex flex-col lg:flex-row items-start lg:gap-[70px] gap-[23px]">
				<div class="w-full lg:w-2/5 relative">
				<?php echo get_the_post_thumbnail($post->ID, 'full', ['class' => 'w-full h-fit 2xl:h-[608px] object-cover object-top']); ?>
				<?php if($startDate): ?>
					<div class="box-year absolute bottom-0 right-0 lg:bottom-[-33px] lg:right-[37px] bg-primary bg-cover bg-no-repeat bg-center px-[30px] py-[15px] text-center flex flex-col items-center justify-center">
						<span class="year text-secondary"><?php echo $years_of_service; ?></span><span class="text-white eyebrow">Year<?php echo $years_of_service > 1 ? 's' : ''; ?> of<br>Service</span>
					</div>
				<?php endif; ?>
				</div>                        
				<div class="flex-1">
						<?php if($title): ?>
							<h3 class="text-primary mb-0"><?php echo $title; ?></h3>
						<?php endif; ?>
						<?php if($position): ?>
							<div class="position mb-1 text-primary"><?php echo $position; ?></div>
						<?php endif; ?>
						<?php if($company): ?>
							<div class="eyebrow uppercase text-quaternary"><?php echo $company; ?></div>
						<?php endif; ?>
					<?php if($bio): ?><div class="mt-5 lg:mt-[35px] text-accent"><?php echo $bio; ?></div><?php endif; ?>  
				</div>
			</div>
         </div> 
   </div>
</section>
</article><!-- #post-${ID} -->
