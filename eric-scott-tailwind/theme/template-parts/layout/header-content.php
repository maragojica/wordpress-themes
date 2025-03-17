<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Eric_Scott
 */

?>

<header id="masthead" class="site-header fixed left-0 z-[100] w-full text-white max-w-full justify-center py-4 lg:py-[15px] xl:py-[30px] flex items-center  animate__animated" data-animation="fadeIn" data-duration="1.5s">		 
    <div class="container mx-auto z-[3]">			
		<div class="contain-header mx-auto">
			<!-- Desktop Header -->
		<div class="hidden lg:flex justify-center items-center gap-[15px]">
        <div class="left flex items-center grow justify-start">            
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
		<?php $use_svg_logo = get_field('branding', 'option')['use_svg_logo']; 
				if($use_svg_logo){ 
					$desktop_svg_code_logo = get_field('branding', 'option')['desktop_svg_code_logo'];  		
					if ($desktop_svg_code_logo) { ?>
					<a class="logo flex align-items-center white-logo logo-header transition-all ease-in-out duration-300" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
					<?php echo $desktop_svg_code_logo;?>
					</a>
				<?php } ?>		
				<?php }else{ ?>	
					<?php
				$logo = get_field('branding', 'option')['desktop_white_logo'];
				if ($logo) { ?>
				<a class="logo flex align-items-center white-logo transition-all ease-in-out duration-300" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
				<?php	$logo_url = $logo['url'];
					$logo_mime_type = $logo['mime_type'];
					if ($logo_url) { ?>
						<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="logo-header object-contain object-center transition-all ease-in-out duration-300 skip-lazy"/>						
						
				<?php } ?>
					</a>
				<?php } ?>	
				<?php } ?>	
        </div>
        <div class="flex items-center grow justify-end">           
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
		<?php $cta_header = get_field('cta_header', 'option');
			if ($cta_header) :
				$url = $cta_header['url'];
				$title = $cta_header['title'];
				$target = $cta_header['target'] ? $cta_header['target'] : '_self'; ?>
				<a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="btn btn_primary">
				<?php echo esc_html( $title ); ?>
				</a>
			<?php endif; ?>  
	   </div>
    </div>

    <!-- Mobile Header -->
    <div class="flex lg:hidden justify-between items-center">
        <div class="flex items-center">          
			<?php
				$logo = get_field('branding', 'option')['mobile_white_logo'];
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
            <button id="mobile-menu-toggle" class="text-white focus:outline-none" aria-label="Open mobile menu" aria-controls="mobile-menu" aria-expanded="false">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path class="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Off-Canvas Menu -->
    <div id="mobile-menu" class="fixed inset-0 bg-secondary text-white h-screen transform translate-x-full transition-transform duration-300 lg:hidden">
        <div class="flex justify-between items-center p-4">
		<div class="flex items-center">    
		<?php $logo = get_field('branding', 'option')['mobile_white_logo'];
				if ($logo) { ?>
				<a class="h-[80px]" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
				   <?php $logo_url = $logo['url'];
					$logo_mime_type = $logo['mime_type'];
					if ($logo_url) { ?>
								<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="white-logo logo-header object-contain object-center skip-lazy"/>
					<?php }	?>
					</a>
			  <?php	} ?>
			  </div>
			  <div class="flex items-center">    
            <button id="mobile-menu-close" class="text-white focus:outline-none" aria-label="Close mobile menu">
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path class="close-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
			</div>
        </div>
		
        <nav class="flex flex-col pt-[4em] pb-[28px] px-[22px] site-navigation site-mobile-navigation justify-between items-center">
           
			<?php if (get_field('header_mobile_menu', 'option')): ?>		
					<?php
					wp_nav_menu(
						array(
							'menu' => get_field('header_mobile_menu', 'option'),
							'theme_location' => 'menu-mobile',
							'container'      => false,
							'menu_class'     => 'flex flex-col text-[20px] font-normal font-text uppercase text-white hover:text-primary transition-all ease-in-out duration-300 space-y-4 w-full',
						)
					);
					?>	
				<?php endif; ?>	
				<?php $cta_header = get_field('cta_header', 'option');
			if ($cta_header) :
				$url = $cta_header['url'];
				$title = $cta_header['title'];
				$target = $cta_header['target'] ? $cta_header['target'] : '_self';
			?>
				<a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="mt-[3em] min-w-fit btn btn_white">
				<?php echo esc_html( $title ); ?>
				</a>
			<?php endif; ?> 
        </nav>
    </div>
	</div>
</header><!-- #masthead -->
