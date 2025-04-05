<?php
$content_block = get_field('content_gallery');
if ($content_block) {
    
    $gallery = $content_block['gallery']; 

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';

    //Spacing Settings
    $spacing = $content_block['spacing'];
    $spacing_top_desktop = $content_block['spacing_top_desktop'];
    $spacing_bottom_desktop = $content_block['spacing_bottom_desktop'];
    $spacing_top_mobile = $content_block['spacing_top_mobile'];
    $spacing_bottom_mobile = $content_block['spacing_bottom_mobile'];

    $spacing_class = '';
    switch ($spacing) {
        case 'small':
            $spacing_class = 'padding-small';
            break;
        case 'medium':
            $spacing_class = 'padding-medium';
            break;
        case 'large':
            $spacing_class = 'padding-large';
            break;
        case 'xlarge':
            $spacing_class = 'padding-xlarge';
            break;    
    }

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;
?>

<section class="gallery-columns-section max-w-full relative animate__animated <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> data-animation="fadeIn" data-duration="1.1s">
    <div class="gall-three" uk-lightbox="animation: fade">
	<?php $animation_delay = 0.2;  foreach( $gallery as $image ): 
		$srcset = wp_get_attachment_image_srcset($image['ID']);
		$sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); 
		$duration = $animation_delay . 's';?>
		<div class="gall-content overflow-hidden rounded-[5px] group wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="<?php echo esc_attr($duration); ?>">		
			<a class="w-full h-full block rounded-[5px]" data-fancybox="gallery" tab-index="0" href="<?php echo esc_url($image['url']); ?>" aria-label="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>">
				<img class="rounded-[5px]" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="500" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>
			</a>
		</div>
		<?php $animation_delay += 0.1; endforeach; ?>	
    </div> 
</section>

<?php }
?>

