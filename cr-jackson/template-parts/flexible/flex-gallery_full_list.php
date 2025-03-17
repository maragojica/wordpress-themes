<?php 
if (have_rows('section_gallery')) :          
    while (have_rows('section_gallery')) : the_row();
	$section_id = get_sub_field('section_id');
	$heading = get_sub_field('heading'); 
	$subheading = get_sub_field('subheading');        
	$description = get_sub_field('description'); 
	$gallery = get_sub_field('gallery');
	$padding_top_desktop = get_sub_field('padding_top_desktop'); 
	$padding_bottom_desktop = get_sub_field('padding_bottom_desktop');       
	$padding_top_mobile = get_sub_field('padding_top_mobile'); 
	$padding_bottom_mobile = get_sub_field('padding_bottom_mobile');
if($gallery): $animation_delay = 0.2; ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?> <?php endif;?>" class="section-gallery-full-list <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">            
	<div class="container">
		<div class="row center-xs">
			<div class="col-xs-12 col-lg-8 text-center">
				<?php if ($subheading) : ?>
						<div class="subheadline text-uppercase m-b1 cl-orange wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheading; ?></div>
						<?php endif; ?>
						<?php if ($heading) : ?>
						<h3 class="cl-blue text-uppercase mt-10px mb-10px wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s"><?php echo $heading; ?></h2>
					<?php endif; ?>
					<?php if ($description) : ?>
						<div class="dp-1 m-b30 cl-blue wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.4s"><?php echo wp_kses_post($description); ?></div>
					<?php endif; ?> 
			</div>    
		</div> 
		<div class="row m-lg-t3 m-t2 gall-full" uk-lightbox="animation: fade">
		<?php foreach( $gallery as $image ): 
			$srcset = wp_get_attachment_image_srcset($image['ID']);
			$sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); 
			$duration = $animation_delay . 's';?>
			<div class="col-xs-12 col-md-6 col-lg-4 mb-md-2 m-b1 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="<?php echo esc_attr($duration); ?>">		
			   <div class="gall-content">
				<a class="w-100 h-100" tab-index="0" href="<?php echo esc_url($image['url']); ?>" data-caption="<?php echo esc_attr($image['alt']); ?>" aria-label="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>">
					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="315" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>
				</a>
		      </div>
			</div>
			<?php $animation_delay += 0.1; endforeach; ?>	
		</div>
	</div>
</section>
<?php endif; ?>
<?php              
    endwhile;
endif; ?>   