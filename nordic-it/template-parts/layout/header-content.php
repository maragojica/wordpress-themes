<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nordic_IT
 */
?>

<header id="masthead" class="site-header bg-primary-dark lg:bg-transparent text-white max-w-full justify-center py-4 lg:py-[30px] 2xl:py-[64px] flex items-center animate__animated" data-animation="fadeIn" data-duration="1.5s">	
	<?php 
	if(((is_page() && !is_page_template()) && !is_front_page()) || is_archive() || is_single()): ?>
		<div class="w-full h-full overflow-hidden absolute">
		<?php $shape_image = get_field('shape_inner', 'option');
					if(!empty($shape_image)): 
						echo wp_get_attachment_image(
						$shape_image['ID'],
						'full',
						false,
						array(
							'class' => 'absolute right-0 top-0 h-[250px] 2xl:h-[376px] object-contain invisible lg:visible',
							'alt' => esc_attr($shape_image['alt']),
						)
					);
					endif; ?>
		</div>			
	<?php endif; ?>  
    <div class="container mx-auto z-[3]">			
		<div class="contain-header mx-auto">
			<!-- Desktop Header -->
		<div class="hidden lg:flex justify-center items-center gap-[15px] xl:gap-[30px]">
        <div class="left flex items-center grow justify-end">            
			<?php if (get_field('header_desktop_left_menu', 'option')): ?>
				<!-- Main Left Navigation -->
				<nav id="primary-left-navigation" class="site-navigation">	
						<?php
						wp_nav_menu(array(
							'menu' => get_field('header_desktop_left_menu', 'option'),
							'theme_location' => 'header-left-menu',
							'container'      => false,
							'menu_class'     => 'flex',							
							'walker' => new Tailwind_Walker_Nav_Menu(),
						));
						?>
					</nav>					
				<?php endif; ?>	
        </div>
        <div class="flex items-center">            
			<?php
			$logo = get_field('branding', 'option')['desktop_colored_logo'];
			if ($logo) { ?>
			<a class="flex align-items-center" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
			  <?php	$logo_url = $logo['url'];
				$logo_mime_type = $logo['mime_type'];
				if ($logo_url) { ?>
					<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="h-[45px] xl:h-[57px] object-contain object-center skip-lazy"/>						
					
			<?php } ?>
				</a>
			<?php } ?>
        </div>
        <div class="flex items-center grow justify-start">           
			<?php if (get_field('header_desktop_right_menu', 'option')): ?>
				<!-- Main Left Navigation -->
				<nav id="primary-right-navigation" class="site-navigation">	
						<?php
						wp_nav_menu(array(
							'menu' => get_field('header_desktop_right_menu', 'option'),
							'theme_location' => 'header-right-menu',
							'container'      => false,
							'menu_class'     => 'flex',					
							'walker' => new Tailwind_Walker_Nav_Menu(),
						));
						?>
					</nav>					
				<?php endif; ?>	
        </div>
		</div>
    </div>

    <!-- Mobile Header -->
    <div class="flex lg:hidden justify-between items-center">
        <div class="flex items-center">          
			<?php
				$logo = get_field('branding', 'option')['mobile_colored_logo'];
				if ($logo) { ?>
				<a tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
				   <?php $logo_url = $logo['url'];
					$logo_mime_type = $logo['mime_type'];
					if ($logo_url) { ?>
								<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="h-[45px] object-contain object-center skip-lazy"/>
					<?php }	?>
					</a>
			  <?php	} ?>
        </div>
        <div class="flex items-center">
            <button id="mobile-menu-toggle" class="text-accent focus:outline-none" aria-label="Open mobile menu" aria-controls="mobile-menu" aria-expanded="false">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path class="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Off-Canvas Menu -->
    <div id="mobile-menu" class="fixed inset-0 bg-primary-dark text-accent h-screen transform translate-x-full transition-transform duration-300 lg:hidden">
        <div class="flex justify-end p-4">
            <button id="mobile-menu-close" class="text-accent focus:outline-none" aria-label="Close mobile menu">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path class="close-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <nav class="flex flex-col space-y-4 px-5 site-navigation">
           
			<?php if (get_field('header_mobile_menu', 'option')): ?>		
					<?php
					wp_nav_menu(
						array(
							'menu' => get_field('header_mobile_menu', 'option'),
							'theme_location' => 'menu-mobile',
							'container'      => false,
							'menu_class'     => 'flex flex-col text-mainmenu font-semibold font-secondary-font uppercase text-primary-light hover:text-primary transition-all ease-in-out duration-300 space-y-4',
						)
					);
					?>	
				<?php endif; ?>	
        </nav>
    </div>
	</div>
</header><!-- #masthead -->
