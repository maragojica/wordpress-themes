<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package smarther
 */

?>

<header id="masthead" class="site-header fixed left-0 z-[100] w-full max-w-full">
	<?php if (get_field('quick_escape', 'option')): ?>
	<div class="top-header bg-quaternary w-full px-[20px] xl:px-[26px] py-[10px] text-left flex items-center">
		<?php $quick_escape = get_field('quick_escape', 'option'); 
		if(!$quick_escape){
			$exit_url = 'https://www.google.com';
		}
		if ($quick_escape && is_array($quick_escape)) :
					$exit_url = isset($quick_escape['url']) ? $quick_escape['url'] : '';
					$title = isset($quick_escape['title']) ? $quick_escape['title'] : ''; ?>
					<a id="emergency-exit-btn" href="#"   data-exit-url="<?php echo esc_url($exit_url); ?>"   onclick="emergencyExit(); return false;" tabindex="0" class="title-text text-white flex items-center justify-center gap-x-[8px]"
						aria-label="<?php echo esc_attr($title); ?>"
						title="<?php echo esc_attr($title); ?>">
					<?php echo esc_html( $title ); ?>		
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none" class="mb-[3px]">
					<g clip-path="url(#clip0_4195_379)">
						<path d="M0.534134 12.5V2.4432H7.47639V3.83573H1.92498V11.1083H9.78159V6.8752H11.1732V12.5H0.534134ZM5.38758 6.95547L10.979 1.89173H8.0283V0.5H13.5341L13.4787 0.588V6.028H12.0881V2.7368L6.32112 7.98747L5.38758 6.95547Z" fill="white"/>
					</g>
					<defs>
						<clipPath id="clip0_4195_379">
						<rect width="13" height="12" fill="white" transform="translate(0.534134 0.5)"/>
						</clipPath>
					</defs>
					</svg>			
					</a>
				<?php endif; ?> 
	</div>
	<?php endif; ?>
	<div class="main-header justify-between lg:justify-center py-[22px] xl:py-[25px] flex items-end w-full lg:flex-row flex-col">
		<!-- Desktop Header -->
		<div class="hidden lg:flex justify-between items-end gap-[20px] xl:gap-[30px] lg:pl-[20px] xl:pl-[26px] w-full">
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
			<div class="center flex items-end justify-center pb-[15px]">
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
					<svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
					<path d="M6 1.75C8.34721 1.75 10.25 3.65279 10.25 6C10.25 8.34721 8.34721 10.25 6 10.25C3.65279 10.25 1.75 8.34721 1.75 6C1.75 3.65279 3.65279 1.75 6 1.75Z" stroke="#002B48" stroke-width="1.5"/>
					<path d="M5.99995 10.2858C8.36688 10.2858 10.2857 8.367 10.2857 6.00007C10.2857 3.63313 8.36688 1.71436 5.99995 1.71436C3.63301 1.71436 1.71423 3.63313 1.71423 6.00007C1.71423 8.367 3.63301 10.2858 5.99995 10.2858Z" stroke="#002B48" stroke-width="1.5" stroke-miterlimit="10"/>
					<path d="M9 9L13.4249 12.9591" stroke="#002B48" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
					</svg>
				</button>
				</div>
				<div class="left flex items-center justify-end gap-x-5">				
				<?php $cta_header = get_field('header_cta', 'option');
				if ($cta_header) :
					$url = $cta_header['url'];
					$title = $cta_header['title'];
					$target = $cta_header['target'] ? $cta_header['target'] : '_self'; ?>
					<a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="btn btn_fill_action rounded-tr-none rounded-br-none flex items-center justify-center gap-x-[12px]"
						aria-label="<?php echo esc_attr($title); ?>"
						title="<?php echo esc_attr($title); ?>">
					<?php echo esc_html( $title ); ?>					
					</a>
				<?php endif; ?>  
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
							<path d="M42 4.42133H0V0H42V4.42133Z" fill="#1F2133"/>
							<path d="M42 27.9999H0V23.5786H42V27.9999Z" fill="#1F2133"/>
							<path d="M42 16.2111H0V11.7898H42V16.2111Z" fill="#1F2133"/>
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
			 class="fixed inset-0 bg-primary text-foreground h-screen transform translate-x-full transition-transform duration-300 lg:hidden w-fill">
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
						<path d="M32.8248 3.12635L3.12635 32.8248L0 29.6985L29.6985 2.02656e-06L32.8248 3.12635Z" fill="#1F2133"/>
						<path d="M0.175165 3.12635L29.8736 32.8248L33 29.6985L3.30152 2.02656e-06L0.175165 3.12635Z" fill="#1F2133"/>
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
						'menu_class' => 'flex flex-col text-[22px] font-semibold text-secondary text-foreground uppercase tracking-[0.8px] leading-normal transition-all ease-in-out duration-300 space-y-4 w-full',
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
					<a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="btn btn_large w-full btn_fill_action flex items-center justify-center"
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
						<rect x="-0.000610352" width="33" height="35" fill="#EB5C92"/>
						<path d="M9.99939 17.2124H22.8565M22.8565 17.2124L16.8565 12M22.8565 17.2124L16.8565 22.2857" stroke="#1F2133" stroke-width="2" stroke-linecap="round"/>
						</svg>
					</button>
				</form>
            </div>			
        </div>
    </div>
