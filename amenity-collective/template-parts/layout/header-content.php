<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Amenity_Collective
 */
$header_type = get_field('header');
?>
 <!-- Mobile Header Bottom  -->
 <div class="flex lg:hidden justify-center items-center fixed bottom-0 w-full max-w-full h-[60px] z-[100] transition-all duration-300 ease-in-out animate__animated" data-animation="fadeIn" data-duration="1.5s">
	   <div class="flex items-center w-full h-full text-center">
		 <div class="w-1/2 bg-white h-full flex justify-center items-center flex-col text-center">
		 <button id="mobile-menu-toggle" class="text-foreground focus:outline-none h-full gap-[5px] leading-[1] flex justify-center items-center flex-col text-center text-[16px] font-bold font-secondary-font uppercase transition-all ease-in-out duration-300" aria-label="Open mobile menu" aria-controls="mobile-menu" aria-expanded="false">
              
			  <svg class="w-[22px] h-4" xmlns="http://www.w3.org/2000/svg" width="26" height="20" viewBox="0 0 26 20" fill="none">
			  <path d="M2 10H24" stroke="#191919" stroke-width="3" stroke-linecap="square" stroke-linejoin="square"/>
			  <path d="M2 2H24" stroke="#191919" stroke-width="3" stroke-linecap="square" stroke-linejoin="square"/>
			  <path d="M2 18H24" stroke="#191919" stroke-width="3" stroke-linecap="square" stroke-linejoin="square"/>
			  </svg>
			  MENU
		  </button>
		 </div>
		 <div class="w-1/2 bg-foreground h-full flex justify-center items-center flex-col text-center">
		 <?php $cta_header_mv = get_field('cta_mobile_header', 'option');
			if ($cta_header_mv) :
				$url = $cta_header_mv['url'];
				$title = $cta_header_mv['title'];
				$target = $cta_header_mv['target'] ? $cta_header_mv['target'] : '_self'; ?>
				<a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="w-full h-full text-white flex justify-center items-center flex-col text-center text-[16px] font-bold font-secondary-font uppercase transition-all ease-in-out duration-300">
				<?php echo esc_html( $title ); ?>
				</a>
			<?php endif; ?> 
		 </div>
	   </div>
	</div>
<header id="masthead" class="site-header <?php if($header_type): echo "header-".$header_type; endif; ?> bg-foreground lg:bg-transparent text-white max-w-full justify-center py-[1.2rem] lg:py-[15px] 2xl:py-[29px] flex items-center transition-all duration-300 ease-in-out animate__animated" data-animation="fadeIn" data-duration="1.5s">	
	 
    <div class="container mx-auto z-[3]">			
		<div class="contain-header mx-auto">
			<!-- Desktop Header -->
		<div class="hidden lg:flex justify-center items-center gap-[15px] xl:gap-[10px]">
			<div class="flex items-center">    
				<?php $use_svg_logo = get_field('branding', 'option')['use_svg_logo']; 
				if($use_svg_logo){ 
					$desktop_svg_code_logo = get_field('branding', 'option')['desktop_svg_code_logo'];  		
					if ($desktop_svg_code_logo) { ?>
					<a class="logo flex align-items-center white-logo w-[250px] h-[20px] lg:w-[235px] xl:w-[300px] 2xl:w-[448px]" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
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
						<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="w-[250px] lg:w-[235px] xl:w-[300px] 2xl:w-[448px] object-contain object-center skip-lazy"/>						
						
				<?php } ?>
					</a>
				<?php } ?>	
				<?php } ?>	
			</div>
			<div class=" flex items-center grow justify-end">            
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
				<a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="min-w-full sm:min-w-min btn btn_style1">
				<?php echo esc_html( $title ); ?>
				</a>
			<?php endif; ?>   
		</div>
    </div>
   
    <!-- Mobile Header Top -->
    <div class="flex lg:hidden justify-center items-center">
        <div class="flex items-center">          
			<?php
			  if($use_svg_logo){ $logo = get_field('branding', 'option')['mobile_svg_code_logo']; 
			  if($logo){ ?>
			  <a class="logo white-logo h-[14px] md:h-[20px] xxs:max-w-[275px] max-w-[244px] xs:max-w-[275px] sm:max-w-[300px] md:max-w-[250px]" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
				<?php echo $logo; ?>
			  </a>	
			  <?php } ?>
				
			<?php }else{ 
				$logo = get_field('branding', 'option')['mobile_colored_logo'];
				if ($logo) { ?>
				<a class="h-[14px] md:h-[20px] max-w-[244px] xxs:max-w-[275px] xs:max-w-[275px] sm:max-w-[300px] md:max-w-[250px]" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
				   <?php $logo_url = $logo['url'];
					$logo_mime_type = $logo['mime_type'];
					if ($logo_url) { ?>
								<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="white-logo h-[14px] md:h-[20px] object-contain object-center skip-lazy"/>
					<?php }	?>
					</a>
			  <?php	} ?>
			  <?php } ?>	
        </div>
        <div class=" items-center hidden">
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
    <div id="mobile-menu" class="fixed inset-0 bg-foreground text-white h-screen transform translate-x-full transition-transform duration-1000 text-center lg:hidden">
        <div class="flex justify-end items-center p-4">		
            <button id="mobile-menu-close" class="text-white flex items-center gap-1 focus:outline-none" aria-label="Close mobile menu">        
				CLOSE      
				<svg class="w-[26px] h-[26px]" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
					<path class="close-icon" d="M20.3125 5.6875L5.6875 20.3125" stroke="white" stroke-width="3" stroke-linecap="square" stroke-linejoin="square"/>
					<path class="close-icon" d="M20.3125 20.3125L5.6875 5.6875" stroke="white" stroke-width="3" stroke-linecap="square" stroke-linejoin="square"/>
				</svg>
            </button>
        </div>

		<?php $logo = get_field('branding', 'option')['off_canvas_logo'];
				if ($logo) { ?>
				<div class="mt-5">
				<a  tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
				   <?php $logo_url = $logo['url'];
					$logo_mime_type = $logo['mime_type'];
					if ($logo_url) { ?>
								<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="off-canvas-logo h-[90px] mx-auto object-contain object-center skip-lazy"/>
					<?php }	?>
					</a>
					</div>
			  <?php	} ?>
		
        <nav class="flex flex-col pt-[28px] pb-[28px] px-[22px] site-navigation site-mobile-navigation justify-between items-center">
           
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
				
        </nav>
		<div class="w-[calc(100%-2rem)] h-[1px] bg-secondary-light mx-auto"></div>
		<nav class="flex flex-col pt-[33px] pb-[28px] px-[22px] site-navigation site-mobile-navigation justify-between items-center">
           
		   <?php if (get_field('header_mobile_menu_secondary', 'option')): ?>		
				   <?php
				   wp_nav_menu(
					   array(
						   'menu' => get_field('header_mobile_menu_secondary', 'option'),
						   'theme_location' => 'menu-mobile',
						   'container'      => false,
						   'menu_class'     => 'flex flex-col text-mainmenu font-semibold font-secondary-font uppercase text-white hover:text-white transition-all ease-in-out duration-300 space-y-4 w-full',
					   )
				   );
				   ?>	
			   <?php endif; ?>	
			   
	   </nav>
    </div>
	</div>
</header><!-- #masthead -->
