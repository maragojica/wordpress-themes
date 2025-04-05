<?php
$hero = get_field('hero_color');
if ($hero) {
    
    $heading = $hero['heading'];     

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';

    
?>
<section class="hero-inner-color overflow-hidden z-[1] max-w-full relative pt-[3em] pb-[44px] lg:pt-[130px] lg:pb-[94px] bg-primary">
		  <div class="container mx-auto">
             <div class="w-full">						
                <?php if($heading): ?><h2 class="text-white mb-0 capitalize"><?php echo $heading;?></h2><?php endif; ?>
			</div>
		  </div>
</section>
<?php }
?>

