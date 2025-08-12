<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Amenity_Construction_Group
 */

?>

<footer id="colophon" class="bg-secondary text-link py-[3em] lg:py-[30px]">
	<div class="container mx-auto lg:pb-0 pb-[65px]">
		<div class="flex flex-col lg:flex-row items-center justify-center lg:justify-between">			
			<?php if (get_field('footer_menu_1', 'option')): ?>
					<div class="order-1 lg:order-1 mb-4 lg:mb-0 lg:border-b lg:border-t border-link">
						<?php
						// Get menu object by theme location
						$locations = get_nav_menu_locations();
						$menu_id = isset($locations['menu-footer-1']) ? $locations['menu-footer-1'] : 0;
						$menu_items = $menu_id ? wp_get_nav_menu_items($menu_id) : array();
						$count = count($menu_items);
						?>
						<div class="flex flex-col overflow-hidden lg:flex-row flex-wrap justify-center lg:justify-end">
							<?php foreach ($menu_items as $index => $item) :
								$is_last = $index === $count - 1;
							?>
								<div class="flex items-center lg:justify-start justify-center">
									<a tabindex="0" aria-label="<?php echo esc_html($item->title); ?>" title="<?php echo esc_html($item->title); ?>" href="<?php echo esc_url($item->url); ?>"
										class="text-link py-1 lg:py-4 lg:px-5 text-center text-link hover:text-link relative"
										<?php echo $item->target ? 'target="' . esc_attr($item->target) . '"' : ''; ?>>
										<span class="simple-link footer-link"><?php echo esc_html($item->title); ?></span>
									</a>
									<?php if (!$is_last) : ?>
										<span class="hidden lg:block border-r border-link h-[200%] mx-6 py-4 rotate-50"></span>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="order-2 w-full h-[1px] bg-link lg:hidden block mb-4"></div>
			 <?php endif; ?>
			 <?php if (get_field('footer_menu_2', 'option')): ?>
					<div class="order-2 lg:order-2 mb-5 lg:mb-0">
						<?php
						// Get menu object by theme location
						$locations = get_nav_menu_locations();
						$menu_id = isset($locations['menu-footer-2']) ? $locations['menu-footer-2'] : 0;
						$menu_items = $menu_id ? wp_get_nav_menu_items($menu_id) : array();
						$count = count($menu_items);
						?>
						<div class="flex flex-col overflow-hidden lg:flex-row flex-wrap justify-center lg:justify-end">
							<?php foreach ($menu_items as $index => $item) :
							?>
								<div class="flex items-center text-center justify-center lg:justify-end">
									<a tabindex="0" aria-label="<?php echo esc_html($item->title); ?>" title="<?php echo esc_html($item->title); ?>" href="<?php echo esc_url($item->url); ?>"
										class="text-link lg:px-5 lg:py-0 py-1 text-center text-link hover:text-link relative"
										<?php echo $item->target ? 'target="' . esc_attr($item->target) . '"' : ''; ?>>
										<span class="simple-link footer-link footer-secondary"><?php echo esc_html($item->title); ?></span>
									</a>									
								</div>
							<?php endforeach; ?>
						</div>
					</div>
			 <?php endif; ?>
			 <div class="order-3 lg:order-3 mb-4 lg:mb-0 flex md:flex-row flex-col md:gap-x-10 md:gap-y-0 gap-y-5 items-center">
				<?php
				if (have_rows('social_links_footer', 'option')) { 	?>
					<div class="flex gap-1 flex-row items-center justify-start lg:ml-[24px]">
						<?php								
							while (have_rows('social_links_footer', 'option')) {
								the_row(); ?>
								<?php $icon = get_sub_field('svg_code');
								$link = get_sub_field('link');
								if( $link ):
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self'; ?>
									<a tabindex="0" class="social transition-transform" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
										<?php if($icon): echo $icon; endif; ?>
									</a>
								<?php endif; ?>
						<?php 
						} ?>
					</div>
				<?php 
				}  ?>
			<?php $phone = get_field('footer_contact_phone', 'option'); 
			  if ($phone) : 
			        $link_url = $phone['url'];
					$link_title = $phone['title'];
					$link_target = $phone['target'] ? $phone['target'] : '_self'; ?>
					<div>
						<a href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer" class="text-link hover:text-link simple-link footer-link relative transition-all duration-300 flex flex-row items-center justify-center gap-2">
							<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
							<path d="M22.3111 17.6579V20.6579C22.3122 20.9364 22.2552 21.2121 22.1436 21.4672C22.032 21.7224 21.8684 21.9515 21.6632 22.1398C21.4579 22.328 21.2157 22.4714 20.9518 22.5606C20.688 22.6498 20.4085 22.683 20.1311 22.6579C17.0539 22.3235 14.0981 21.272 11.5011 19.5879C9.08492 18.0526 7.03643 16.0041 5.50109 13.5879C3.81107 10.9791 2.75933 8.00888 2.43109 4.91789C2.4061 4.64136 2.43897 4.36265 2.52759 4.09951C2.61622 3.83638 2.75866 3.59458 2.94586 3.38951C3.13305 3.18444 3.3609 3.0206 3.61488 2.90841C3.86887 2.79622 4.14343 2.73815 4.42109 2.73789H7.42109C7.9064 2.73311 8.37688 2.90497 8.74485 3.22142C9.11282 3.53788 9.35317 3.97734 9.42109 4.45789C9.54771 5.41796 9.78254 6.36062 10.1211 7.26789C10.2556 7.62581 10.2848 8.0148 10.205 8.38877C10.1252 8.76274 9.93995 9.106 9.67109 9.37789L8.40109 10.6479C9.82465 13.1514 11.8975 15.2243 14.4011 16.6479L15.6711 15.3779C15.943 15.109 16.2862 14.9237 16.6602 14.844C17.0342 14.7642 17.4232 14.7933 17.7811 14.9279C18.6884 15.2664 19.631 15.5013 20.5911 15.6279C21.0769 15.6964 21.5205 15.9411 21.8376 16.3154C22.1548 16.6897 22.3233 17.1675 22.3111 17.6579Z" stroke="#404040" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
							<span><?php echo esc_html($link_title); ?></span>
						</a>
					</div>
				<?php endif; ?>
			</div>			
			  <div class="order-4 lg:order-4 text-center 2xl:text-left 2xl:block hidden">
				<p class="text-link font-primary-font text-[12px] font-normal uppercase tracking-[0.72px] flex flex-col lg:inline-block">&#169; <?php echo date_i18n( 'Y' ).' '.get_bloginfo( 'name' ).' '.get_field('footer_copyright', 'option'); ?></p>
			  </div>			
		</div>
		 <div class="text-center 2xl:hidden block mt-[2em]">
			<p class="text-link font-primary-font text-[12px] font-normal uppercase tracking-[0.72px] flex flex-col lg:inline-block">&#169; <?php echo date_i18n( 'Y' ).' '.get_bloginfo( 'name' ).' '.get_field('footer_copyright', 'option'); ?></p>
			</div>
	</div>
</footer><!-- #colophon -->
