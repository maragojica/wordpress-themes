<?php 
if (have_rows('section_gallery')) :          
    while (have_rows('section_gallery')) : the_row();
	$section_id = get_sub_field('section_id');
	$gallery = get_sub_field('gallery');
	$margin_top_desktop = get_sub_field('margin_top_desktop'); 
    $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');
    $margin_top_mobile = get_sub_field('margin_top_mobile'); 
    $margin_bottom_mobile = get_sub_field('margin_bottom_mobile'); 
if($gallery): $animation_delay = 0.2; ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?> <?php endif;?>" class="section-gallery-three p-t0 p-b0 w-margin <?php if(!$margin_top_desktop): echo ' m-t0'; endif; if(!$margin_bottom_desktop): echo ' m-b0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>">            
	<div class="gall-three" uk-lightbox="animation: fade">
	<?php foreach( $gallery as $image ): 
		$srcset = wp_get_attachment_image_srcset($image['ID']);
		$sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); 
		$duration = $animation_delay . 's';?>
		<div class="gall-content wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="<?php echo esc_attr($duration); ?>">		
			<a class="w-100 h-100" tab-index="0" href="<?php echo esc_url($image['url']); ?>" data-caption="<?php echo esc_attr($image['alt']); ?>" aria-label="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>">
				<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="600" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>
			</a>
		</div>
		<?php $animation_delay += 0.1; endforeach; ?>	
    </div>
</section>
<?php endif; ?>
<?php              
    endwhile;
endif; ?>   