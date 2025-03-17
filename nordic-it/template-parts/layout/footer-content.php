<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nordic_IT
 */

?>

<footer id="colophon" class="site-footer relative bg-primary-dark max-w-full py-10 lg:py-[64px]">	
     <div class="container">
	 <div class="flex items-center justify-center px-5 xl:px-16 relative flex-col animate__animated" data-animation="fadeIn" data-duration="1.5s">     		     
			<?php
			$logo = get_field('branding', 'option')['footer_logo'];
			if ($logo) { ?>
			<a class="flex align-items-center z-[2] bg-primary-dark pr-5 pl-5" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
			  <?php	$logo_url = $logo['url'];
				$logo_mime_type = $logo['mime_type'];
				if ($logo_url) { ?>
					<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="h-[70px] xl:h-[129px] object-contain object-center skip-lazy"/>						
					
			<?php } ?>
				</a>
			<?php } ?>
			<div class="w-full h-[3px] bg-primary-light opacity-25 absolute bottom-[40px] z-[1] invisible lg:visible"></div>  
        </div>
	  <?php if (get_field('footer_menu_1', 'option')): ?>
		<div class="hidden lg:flex items-center grow justify-center mt-[39px]">  
		<!-- Secondary Footer Navigation -->
		<nav id="footer-secondary" class="site-navigation footer-nav animate__animated" data-animation="fadeIn" data-duration="1.5s">	
				<?php
				wp_nav_menu(array(
					'menu' => get_field('footer_menu_1', 'option'),
					'theme_location' => 'menu-footer-1',
					'container'      => false,
					'menu_class'     => 'flex lg:flex-row flex-col lg:gap-0 gap-4 justify-center text-center',		
					'walker' => new Tailwind_Walker_Nav_Menu(),				
					
				));
				?>
			</nav>	
			</div>				
		<?php endif; ?>
		<?php if (get_field('footer_menu_2', 'option')): ?>
		<div class="hidden lg:flex items-center grow justify-center lg:my-7 mt-[20px]">  
		<!-- Primary Footer Navigation -->
		<nav id="footer-secondary" class="site-navigation footer-nav animate__animated" data-animation="fadeIn" data-duration="1.5s">	
				<?php
				wp_nav_menu(array(
					'menu' => get_field('footer_menu_2', 'option'),
					'theme_location' => 'menu-footer-2',
					'container'      => false,
					'menu_class'     => 'flex lg:flex-row flex-col lg:gap-0 gap-4 justify-center text-center',		
					'walker' => new Tailwind_Walker_Nav_Menu(),				
					
				));
				?>
			</nav>	
			</div>				
		<?php endif; ?>

		<?php if (get_field('footer_mobile', 'option')): ?>
		<div class="flex lg:hidden items-center grow justify-center lg:my-7 mt-[20px]">  
		<!-- Mobile Footer Navigation -->
		<nav id="footer-secondary" class="site-navigation footer-nav animate__animated" data-animation="fadeIn" data-duration="1.5s">					
				<?php
					wp_nav_menu(
						array(
							'menu' => get_field('menu-footer-mobile', 'option'),
							'theme_location' => 'menu-footer-mobile',
							'container'      => false,
							'menu_class'     => 'flex lg:flex-row flex-col gap-0 xl:text-mainmenu text-[0.67rem] font-semibold font-secondary-font uppercase text-primary-light hover:text-primary justify-center text-center transition-all ease-in-out duration-300 space-y-4',
						)
					);
					?>	
			</nav>	
			</div>				
		<?php endif; ?>

		<?php if (have_rows('footer_contact', 'option')) : ?>
		<div class="footer-contact flex justify-center lg:flex-row flex-col gap-[15px] lg:gap-[32px] uppercase text-center lg:mt-0 mt-[39px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
		     <?php $i = 1; while (have_rows('footer_contact', 'option')) : the_row(); 
			        $info = get_sub_field('info'); ?>
					<?php if($i>1):?><span class="w-[3px] h-[21px] bg-primary-light opacity-25"></span><?php endif; ?>		
					<?php if($info): echo $info; endif; ?>	
								
			<?php $i++; endwhile; ?>	
		</div>	
		<?php endif; ?>			

		<div class="w-full h-[3px] bg-primary-light opacity-25 mt-[64px] mb-[64px]"></div>  
		<?php if (get_field('footer_copyright', 'option')) { ?>
			<div class="text-primary-light flex justify-center lg:flex-row flex-col gap-1 font-text-font font-medium tracking-[1.2px] uppercase text-center copyright animate__animated" data-animation="fadeIn" data-duration="1.5s"><p>&#169; <?php echo date_i18n( 'Y' ).' '.get_bloginfo( 'name' ).' '.get_field('footer_copyright', 'option'); ?></p></div>	
		<?php } ?>	
	 </div>
</footer><!-- #colophon -->
