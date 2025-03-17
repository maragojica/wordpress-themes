<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package connecting-elements
 */
$header_type = get_field('header');
?>

<header id="masthead" class="site-header fixed left-0 z-[100] w-full text-white max-w-full justify-center py-4 lg:py-[15px] 2xl:py-[30px] flex items-center lg:px-[88px] <?php if($header_type){ echo "header-".$header_type; }else{ echo "header-white";} ?> bg-[rgba(255,255,255,0.9)] " >	
	 
    <div class="container-header w-full mx-auto z-[3 px-[22px] lg:px-[32px]">			
		<div class="contain-header mx-auto">
			<!-- Desktop Header -->
		<div class="hidden lg:flex justify-center items-center gap-[15px] xl:gap-[10px]">
			<div class="flex items-center">    
				<?php $use_svg_logo = get_field('branding', 'option')['use_svg_logo']; 
				if($use_svg_logo){ 
					$desktop_svg_code_logo = get_field('branding', 'option')['desktop_svg_code_logo'];  		
					if ($desktop_svg_code_logo) { ?>
					<a class="logo flex align-items-center white-logo h-[50px] xl:h-[60px]" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
					<?php echo $desktop_svg_code_logo;?>
					</a>
				<?php } ?>		
				<?php }else{ ?>	
					<?php
				$logo = get_field('branding', 'option')['desktop_white_logo'];
				if ($logo) { ?>
				<a class="logo flex align-items-center white-logo" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
				<?php	$logo_url = $logo['url'];
					$logo_mime_type = $logo['mime_type'];
					if ($logo_url) { ?>
						<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="h-[50px] xl:h-[60px] object-contain object-center skip-lazy"/>						
						
				<?php } ?>
					</a>
				<?php } ?>	
				<?php } ?>	
			</div>
			<div class=" flex items-center grow justify-center">            
				<?php if (get_field('header_desktop_menu', 'option')): ?>
					<!-- Main Navigation -->
					<nav id="primary-navigation" class="site-navigation">	
							<?php
							wp_nav_menu(array(
								'menu' => get_field('header_desktop_menu', 'option'),
								'theme_location' => 'menu-primary',
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
				<a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-full sm:min-w-min btn nav btn_white">
				<?php echo esc_html( $title ); ?>
				</a>
			<?php endif; ?>   
		</div>
    </div>

    <!-- Mobile Header -->
    <div class="flex lg:hidden justify-between items-center">
        <div class="flex items-center">          
			<?php
			  if($use_svg_logo){ $logo = get_field('branding', 'option')['mobile_svg_code_logo']; 
			  if($logo){ ?>
			  <a class="logo white-logo h-[40px]" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
				<?php echo $logo; ?>
			  </a>	
			  <?php } ?>
				
			<?php }else{ 
				$logo = get_field('branding', 'option')['mobile_colored_logo'];
				if ($logo) { ?>
				<a class="h-[40px]" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
				   <?php $logo_url = $logo['url'];
					$logo_mime_type = $logo['mime_type'];
					if ($logo_url) { ?>
								<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="white-logo h-[40px] object-contain object-center skip-lazy"/>
					<?php }	?>
					</a>
			  <?php	} ?>
			  <?php } ?>	
        </div>
        <div class="flex items-center">
            <button id="mobile-menu-toggle" class="text-white focus:outline-none" aria-label="Open mobile menu" aria-controls="mobile-menu" aria-expanded="false">
              
				<svg class="w-[22px] h-4" xmlns="http://www.w3.org/2000/svg" width="26" height="20" viewBox="0 0 26 20" fill="none">
				<path d="M2 10H24" stroke="#ffffff" stroke-width="3" stroke-linecap="square" stroke-linejoin="square"/>
				<path d="M2 2H24" stroke="#ffffff" stroke-width="3" stroke-linecap="square" stroke-linejoin="square"/>
				<path d="M2 18H24" stroke="#ffffff" stroke-width="3" stroke-linecap="square" stroke-linejoin="square"/>
				</svg>
            </button>
        </div>
    </div>

    <!-- Mobile Off-Canvas Menu -->
    <div id="mobile-menu" class="fixed inset-0 bg-secondary text-white h-screen transform translate-x-full transition-transform duration-300 lg:hidden">
        <div class="flex justify-between items-center p-4">
		<?php $logo = get_field('branding', 'option')['mobile_white_logo'];
				if ($logo) { ?>
				<a class="h-[40px]" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
				   <?php $logo_url = $logo['url'];
					$logo_mime_type = $logo['mime_type'];
					if ($logo_url) { ?>
								<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="white-logo h-[40px] object-contain object-center skip-lazy"/>
					<?php }	?>
					</a>
			  <?php	} ?>
            <button id="mobile-menu-close" class="text-white focus:outline-none" aria-label="Close mobile menu">               
				<svg class="w-[26px] h-[26px]" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
					<path class="close-icon" d="M20.3125 5.6875L5.6875 20.3125" stroke="white" stroke-width="3" stroke-linecap="square" stroke-linejoin="square"/>
					<path class="close-icon" d="M20.3125 20.3125L5.6875 5.6875" stroke="white" stroke-width="3" stroke-linecap="square" stroke-linejoin="square"/>
				</svg>
            </button>
        </div>
		<div class="w-[calc(100%-2rem)] h-[1px] bg-primary mx-auto"></div>
        <nav class="flex flex-col pt-[52px] pb-[28px] px-[22px] site-navigation site-mobile-navigation justify-between items-center">
           
			<?php if (get_field('header_mobile_menu', 'option')): ?>		
					<?php
					wp_nav_menu(
						array(
							'menu' => get_field('header_mobile_menu', 'option'),
							'theme_location' => 'menu-mobile',
							'container'      => false,
							'menu_class'     => 'flex flex-col text-mainmenu font-semibold font-secondary-font uppercase text-white hover:text-white transition-all ease-in-out duration-300 space-y-4 w-full',
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
				<a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="mt-[3em] min-w-fit btn btn_primary">
				<?php echo esc_html( $title ); ?>
				</a>
			<?php endif; ?>  
        </nav>
		
    </div>
	</div>
</header><!-- #masthead -->