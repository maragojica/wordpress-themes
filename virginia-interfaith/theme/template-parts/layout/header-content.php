<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Virginia_Interfaith
 */

?>

<header id="masthead" class="site-header fixed left-0 z-[100] w-full max-w-full">
	<?php if (get_field('header_cta', 'option')): ?>
	<div class="top-header bg-secondary w-full justify-end text-right flex items-center">
		<?php $header_cta = get_field('header_cta', 'option'); 		
		if ($header_cta) :
					$url = $header_cta['url'];
					$title = $header_cta['title'];
					$target = $header_cta['target'] ? $header_cta['target'] : '_self'; ?>
					<a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" tabindex="0" class="btn btn_fill_dark"
						aria-label="<?php echo esc_attr($title); ?>"
						title="<?php echo esc_attr($title); ?>">
					<?php echo esc_html( $title ); ?>
					</a>
				<?php endif; ?> 
	</div>
	<?php endif; ?>
	<div class="main-header justify-between lg:justify-center py-[15px] xl:py-[21px] flex items-end w-full lg:flex-row flex-col">
		<!-- Desktop Header -->
		<div class="hidden lg:flex justify-between items-center gap-[20px] xl:gap-[30px] lg:pl-[21px] lg:pr-[35px] w-full">
			<?php
			$branding = get_field('branding', 'option');
			$use_svg_logo = $branding['use_svg_logo'];
			if ($use_svg_logo) {
				$desktop_svg_code_logo = $branding['svg_logo'];
				if ($desktop_svg_code_logo) { ?>
					<a class="logo flex align-items-center logo-header transition-all ease-in-out duration-300"
						tabindex="0"
						href="<?php echo esc_url(home_url('/')); ?>"
						rel="home"
						aria-label="<?php echo get_bloginfo('name'); ?> Logo"
						title="<?php echo get_bloginfo('name'); ?> Logo">
						<?php echo $desktop_svg_code_logo; ?>
					</a>
				<?php }
			} else {
				$logo = $branding['desktop_colored_logo'];
				if ($logo) {
					$logo_url = $logo['url'];
					?>
					<a class="logo flex align-items-center transition-all ease-in-out duration-300"
						tabindex="0"
						href="<?php echo esc_url(home_url('/')); ?>"
						rel="home"
						aria-label="<?php echo get_bloginfo('name'); ?> Logo"
						title="<?php echo get_bloginfo('name'); ?> Logo">
						<?php if ($logo_url) { ?>
							<img src="<?php echo esc_url($logo_url); ?>"
									alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo"
									class="logo-header object-contain object-center transition-all ease-in-out duration-300 skip-lazy"/>
						<?php } ?>
					</a>
				<?php }
			}
			?>
			<div class="right flex items-center justify-center">
			<?php if (get_field('header_desktop_menu', 'option')): ?>
					<!-- Main Left Navigation -->
					<nav id="primary-left-navigation" class="site-navigation">
						<?php
						wp_nav_menu(array(
							'menu' => get_field('header_desktop_menu', 'option'),
							'theme_location' => 'menu-primary',
							'container' => false,
							'menu_class' => 'flex',
							'walker' => new Tailwind_Walker_Nav_Menu(),
						));
						?>
					</nav>
				<?php endif; ?>
				<button id="header-search-btn" class="search-icon focus:outline-none flex items-center justify-center cursor-pointer transition-all duration-400 ease-in-out" aria-label="Search" type="button">
					<span class="hidden">Search</span>	
					<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
					<path d="M7.17676 0.828682C10.3165 0.828833 12.8524 3.34599 12.8525 6.44001C12.8525 9.53417 10.3166 12.0522 7.17676 12.0523C4.03674 12.0523 1.5 9.53426 1.5 6.44001C1.50016 3.34589 4.03684 0.828682 7.17676 0.828682Z" stroke="#323334"/>
					<path d="M7.17645 11.6789C10.1003 11.6789 12.4706 9.33348 12.4706 6.44031C12.4706 3.54715 10.1003 1.20177 7.17645 1.20177C4.25258 1.20177 1.88232 3.54715 1.88232 6.44031C1.88232 9.33348 4.25258 11.6789 7.17645 11.6789Z" stroke="#323334" stroke-width="2" stroke-miterlimit="10"/>
					<path d="M11.0696 10.2925L16.0002 15.1713" stroke="#323334" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"/>
					</svg>
				</button>
				</div>				
		</div>		
		
		<!-- Mobile Header -->
		<div class="w-full flex lg:hidden justify-between items-center px-[22px]">
			<div class="flex items-center">
				<?php
				$use_svg_logo = $branding['use_svg_logo'];
					if ($use_svg_logo) {
						$desktop_svg_code_logo = $branding['svg_logo'];
						if ($desktop_svg_code_logo) { ?>
							<a class="logo flex align-items-center logo-header transition-all ease-in-out duration-300"
							   tabindex="0"
							   href="<?php echo esc_url(home_url('/')); ?>"
							   rel="home"
							   aria-label="<?php echo get_bloginfo('name'); ?> Logo"
							   title="<?php echo get_bloginfo('name'); ?> Logo">
								<?php echo $desktop_svg_code_logo; ?>
							</a>
						<?php }
					} else {
				$logo = get_field('branding', 'option')['desktop_colored_logo'];
				if ($logo) {
					$logo_url = $logo['url'];
					?>
					<a tabindex="0"
					   href="<?php echo esc_url(home_url('/')); ?>"
					   rel="home"
					   aria-label="<?php echo get_bloginfo('name'); ?> Logo"
					   title="<?php echo get_bloginfo('name'); ?> Logo">
						<?php if ($logo_url) { ?>
							<img src="<?php echo esc_url($logo_url); ?>"
								 alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo"
								 class="logo-header object-contain object-center skip-lazy"/>
						<?php } ?>
					</a>
				<?php } }?>
			</div>
			<div class="flex items-center gap-x-[10px]">
				<button id="mobile-menu-toggle"
						class="text-foreground focus:outline-none"
						aria-label="Open mobile menu"
						aria-controls="mobile-menu"
						aria-expanded="false">					
						<svg class="h-7 w-10"  xmlns="http://www.w3.org/2000/svg" width="42" height="28" viewBox="0 0 42 28" fill="none">
						<g clip-path="url(#clip0_2354_2375)">
							<path d="M42 4.42133H0V0H42V4.42133Z" fill="#24418F"/>
							<path d="M42 27.9999H0V23.5786H42V27.9999Z" fill="#24418F"/>
							<path d="M42 16.2111H0V11.7898H42V16.2111Z" fill="#24418F"/>
						</g>
						<defs>
							<clipPath id="clip0_2354_2375">
							<rect width="42" height="28" fill="white"/>
							</clipPath>
						</defs>
						</svg>
				</button>
			</div>
		</div>
		<!-- Mobile Off-Canvas Menu -->
		<div id="mobile-menu"
			 class="fixed inset-0 bg-white text-foreground h-screen transform translate-x-full transition-transform duration-300 lg:hidden w-fill">
			<div class="flex justify-between items-center p-4">
				<div class="flex items-center">
					<?php
					$logo = get_field('branding', 'option')['desktop_colored_logo'];
					if ($logo) {
						$logo_url = $logo['url'];
						?>
						<a tabindex="0"
						   href="<?php echo esc_url(home_url('/')); ?>"
						   rel="home"
						   aria-label="<?php echo get_bloginfo('name'); ?> Logo"
						   title="<?php echo get_bloginfo('name'); ?> Logo">
							<?php if ($logo_url) { ?>
								<img src="<?php echo esc_url($logo_url); ?>"
									 alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo"
									 class="logo-header object-contain object-center skip-lazy"/>
							<?php } ?>
						</a>
					<?php } ?>
				</div>
				<div class="flex items-center">
					<button id="mobile-menu-close"
							class="text-foreground focus:outline-none"
							aria-label="Close mobile menu">
						<svg class="h-7 w-10" xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none">
						<path d="M32.8248 3.12635L3.12635 32.8248L0 29.6985L29.6985 2.02656e-06L32.8248 3.12635Z" fill="#24418F"/>
						<path d="M0.175165 3.12635L29.8736 32.8248L33 29.6985L3.30152 2.02656e-06L0.175165 3.12635Z" fill="#24418F"/>
						</svg>
					</button>
				</div>
			</div>
			<nav class="flex flex-col pt-[33px] pb-[28px] px-[49px] site-navigation site-mobile-navigation justify-between items-center">
				<?php if (get_field('header_mobile_menu', 'option')): ?>
					<?php
					wp_nav_menu(array(
						'menu' => get_field('header_mobile_menu', 'option'),
						'theme_location' => 'menu-mobile',
						'container' => false,
						'menu_class' => 'flex flex-col text-[22px] font-bold text-foreground uppercase tracking-[0.75px] leading-normal transition-all ease-in-out duration-300 space-y-4 w-full',
					));
					?>
				<?php endif; ?>
			</nav>
			<div class="px-[49px]">
				<form role="search" method="get" id="search-form" class="search-form-mv w-full" action="<?php echo esc_url(home_url('/')); ?>">					
					<button type="submit" class="search-submit">
						<span class="sr-only">Search</span>
						<svg xmlns="http://www.w3.org/2000/svg" width="23" height="22" viewBox="0 0 23 22" fill="none">
						<path d="M9.10767 0.75C13.4883 0.750241 17.0393 4.30195 17.0393 8.68262C17.0391 13.0631 13.4881 16.614 9.10767 16.6143C4.727 16.6143 1.17529 13.0632 1.17505 8.68262C1.17505 4.3018 4.72685 0.75 9.10767 0.75Z" stroke="#1F2133" stroke-width="1.5"></path>
						<path d="M9.10714 16.1242C13.2172 16.1242 16.549 12.7924 16.549 8.68234C16.549 4.57231 13.2172 1.24048 9.10714 1.24048C4.99712 1.24048 1.66528 4.57231 1.66528 8.68234C1.66528 12.7924 4.99712 16.1242 9.10714 16.1242Z" stroke="#1F2133" stroke-width="1.5" stroke-miterlimit="10"></path>
						<path d="M14.3164 13.8916L22 20.7663" stroke="#1F2133" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"></path>
						</svg>
					</button>
					<label for="search-field-mv" class="sr-only">Search</label>
					<input type="search" id="search-field-mv" class="search-field-mv" autofocus placeholder="Search" value="<?php echo get_search_query(); ?>" name="s">					
				</form>
			</div>
			<?php $cta_header = get_field('header_cta', 'option');
				if ($cta_header) :
					$url = $cta_header['url'];
					$title = $cta_header['title'];
					$target = $cta_header['target'] ? $cta_header['target'] : '_self'; ?>
					<div class="mt-[30px] px-[49px]">
					<a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="btn w-full btn_fill_light flex items-center justify-center"
						aria-label="<?php echo esc_attr($title); ?>"
						title="<?php echo esc_attr($title); ?>">
					<?php echo esc_html( $title ); ?>					
					</a>
				</div>
				<?php endif; ?>  
		</div>
	</div>	
</header><!-- #masthead -->
 <!-- Popup Search -->
	 <div class="popup" id="searchPopup">
        <div class="popup-content container">		             
			<div class="search-container w-full">			 
				<form role="search" method="get" id="search-form" class="search-form w-full" action="<?php echo esc_url(home_url('/')); ?>">
					<label for="search-field" class="sr-only">Search for:</label>
					<input type="search" class="search-field" id="search-field" autofocus placeholder="Search" value="<?php echo get_search_query(); ?>" name="s">
					<button type="submit" class="search-submit">
						<span class="sr-only">Search</span>
						<svg xmlns="http://www.w3.org/2000/svg" width="33" height="35" viewBox="0 0 33 35" fill="none">
						<rect x="-0.000610352" width="33" height="35" fill="#f0cc12"/>
						<path d="M9.99939 17.2124H22.8565M22.8565 17.2124L16.8565 12M22.8565 17.2124L16.8565 22.2857" stroke="#1F2133" stroke-width="2" stroke-linecap="round"/>
						</svg>
					</button>
				</form>
            </div>			
        </div>
    </div>
