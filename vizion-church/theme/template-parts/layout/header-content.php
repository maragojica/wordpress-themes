<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vizion_Church
 */

?>

<header id="masthead" class="site-header bg-background fixed left-0 z-[100] w-full text-black max-w-full justify-center py-4 lg:py-6 flex items-center lg:px-6"  data-aos="fade-in">
	<div class="container">
	  <div class="hidden lg:flex items-center grow justify-center">            
		<?php if (get_field('header_desktop_primary_menu', 'option')): ?>
			<!-- Main Navigation -->
			<nav id="primary-navigation" class="site-navigation">	
					<?php
					wp_nav_menu(array(
						'menu' => get_field('header_desktop_primary_menu', 'option'),
						'theme_location' => 'menu-primary',
						'container'      => false,
						'menu_class'     => 'flex',							
						'walker' => new Tailwind_Walker_Nav_Menu(),
					));
					?>
				</nav>					
			<?php endif; ?>	
	  </div> 
	    <!-- Mobile Header -->
		<div class="flex lg:hidden justify-between items-center w-full">
        <div class="flex items-center">          
			<?php
				$logo = get_field('branding', 'option')['desktop_colored_logo'];
				if ($logo) { ?>
				<a tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
				   <?php $logo_url = $logo['url'];
					$logo_mime_type = $logo['mime_type'];
					if ($logo_url) { ?>
								<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="logo-header object-contain object-center skip-lazy" data-aos="fade-in" data-aos-offset="100" data-aos-delay="60"/>
					<?php }	?>
					</a>
			  <?php	} ?>
        </div>
		
        <div class="flex items-center gap-x-[10px]"  data-aos="fade-in" data-aos-offset="100" data-aos-delay="60">
            <button id="mobile-menu-toggle" class="text-foreground focus:outline-none cursor-pointer" aria-label="Open mobile menu" aria-controls="mobile-menu" aria-expanded="false">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path class="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Off-Canvas Menu -->
    <div id="mobile-menu" class="fixed inset-0 bg-background text-foreground h-screen transform translate-x-full transition-transform duration-300 lg:hidden w-fill">
        <div class="container mx-auto">
		<div class="flex justify-between items-center py-4">
		<div class="flex items-center">    
		<?php $logo = get_field('branding', 'option')['desktop_colored_logo'];
				if ($logo) { ?>
				<a tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
				   <?php $logo_url = $logo['url'];
					$logo_mime_type = $logo['mime_type'];
					if ($logo_url) { ?>
								<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="logo-header object-contain object-center skip-lazy"/>
					<?php }	?>
					</a>
			  <?php	} ?>
			  </div>
			  <div class="flex items-center">    
            <button id="mobile-menu-close" class="text-foreground focus:outline-none cursor-pointer" aria-label="Close mobile menu">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path class="close-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
			</div>
        </div>
		
        <nav class="flex flex-col pt-[2em] site-navigation site-mobile-navigation justify-between items-center">
           
			<?php if (get_field('header_mobile_menu', 'option')): ?>		
					<?php
					wp_nav_menu(
						array(
							'menu' => get_field('header_mobile_menu', 'option'),
							'theme_location' => 'menu-mobile',
							'container'      => false,
							'menu_class'     => 'flex flex-col text-[40px] tracking-[-4.2px] font-black font-headline uppercase text-foreground transition-all ease-in-out duration-300 space-y-4 w-full',
						)
					);
					?>	
				<?php endif; ?>	
				
        </nav>
    </div>
		</div>
	</div>
</header><!-- #masthead -->
