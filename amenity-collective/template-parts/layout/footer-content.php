<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Amenity_Collective
 */

?>

<footer id="colophon" class="site-footer relative bg-foreground max-w-full pt-[39px] pb-10 lg:pt-[65px] lg:pb-[65px]">	
	<div class="container mx-auto">
	      <div class="w-full h-[2px] bg-foreground-dark"></div> 
		  <div class="footer-wrap pt-[37px] pb-[37px] lg:pt-[68px] lg:pb-[28px]">	
		   <div class="flex items-start md:items-center lg:items-start relative flex-col lg:flex-row gap-[2em] lg:gap-[40px] 3xl:gap-[150px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
			<?php
					$logo = get_field('branding', 'option')['footer_logo'];
					if ($logo) { ?>
					<a class="hidden md:flex lg:justify-start justify-center w-full md:w-fit lg:mr-[3em] lg:mt-[3.5em]" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo">
					<?php	$logo_url = $logo['url'];
						$logo_mime_type = $logo['mime_type'];
						if ($logo_url) { ?>
							<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="mx-auto lg:ml-auto h-auto md:h-[8em] lg:h-[130px] xl:h-[142px] w-full md:w-fit object-contain object-center skip-lazy"/>						
							
					<?php } ?>
						</a>
				<?php } ?>
			    <div class="flex flex-col gap-[43px] w-full">
				   <div class="flex flex-col lg:flex-row gap-[2em] lg:gap-[5em] 3xl:gap-[200px]">
					<?php if (get_field('footer_menu_1', 'option')): ?>
					<div class="flex flex-col grow justify-center gap-4 lg:gap-[24px] text-left w-full lg:w-fit items-start md:items-center lg:items-start">  
						<?php $title_footer_1 =  get_field('title_footer_menu_1', 'option'); 
						if($title_footer_1):?>
						<div class="font-primary-font text-secondary-light uppercase text-[18px] font-bold tracking-[0.72px]"><?php echo $title_footer_1;?></div>
						<?php endif; ?>
						<div class="flex flex-col-reverse lg:flex-row lg:items-stretch md:items-start items-start justify-start gap-[40px] lg:gap-0 w-full"> 
						<div class="w-full lg:w-[2px] h-[2px] lg:h-full bg-foreground-dark lg:min-h-[200px]"></div>	 
						<!-- Primary Footer Navigation -->
						<nav id="footer-primary" class="footer-nav footer-navigation w-full animate__animated" data-animation="fadeIn" data-duration="1.5s">	
								<?php
								wp_nav_menu(array(
									'menu' => get_field('footer_menu_1', 'option'),
									'theme_location' => 'menu-footer-1',
									'container'      => false,
									'menu_class'     => 'flex flex-col lg:gap-0 gap-1 justify-center gap:[32px] text-left md:text-center lg:text-left',		
									'walker' => new Tailwind_Walker_Nav_Menu(),				
									
								));
								?>
							</nav>	
						</div>	
					</div>				
				   <?php endif; ?>   	
					<?php if (get_field('footer_menu_2', 'option')): ?>
					<div class="flex flex-col grow justify-center gap-4 lg:gap-[24px] text-left w-full lg:w-fit items-start md:items-center lg:items-start">  
						<?php $title_footer_2 =  get_field('title_footer_menu_2', 'option'); 
						if($title_footer_2):?>
						<div class="font-primary-font text-secondary-light uppercase text-[18px] font-bold tracking-[0.72px]"><?php echo $title_footer_2;?></div>
						<?php endif; ?>
						<div class="flex flex-col-reverse lg:flex-row lg:items-stretch md:items-center items-start justify-start gap-[40px] lg:gap-0 w-full"> 
						<div class="w-full lg:w-[2px] h-[2px] lg:h-full bg-foreground-dark lg:min-h-[200px]"></div>	 
						<!-- Secondary Footer Navigation -->
						<div class="flex flex-col justify-between">
						<nav id="footer-primary" class="footer-nav footer-navigation w-full animate__animated" data-animation="fadeIn" data-duration="1.5s">	
								<?php
								wp_nav_menu(array(
									'menu' => get_field('footer_menu_2', 'option'),
									'theme_location' => 'menu-footer-2',
									'container'      => false,
									'menu_class'     => 'flex flex-col lg:gap-0 gap-1 justify-center gap:[32px] text-left md:text-center lg:text-left',		
									'walker' => new Tailwind_Walker_Nav_Menu(),				
									
								));
								?>
							</nav>	
							<div class="flex flex-row justify-between">
							<?php
							if (have_rows('social_links', 'option')) { 	?>
									<div class="flex gap-1 flex-row items-center justify-start lg:ml-[24px] lg:mt-0 mt-[15px]">
										<?php								
											while (have_rows('social_links', 'option')) {
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
							<?php
								if (have_rows('footer_logos', 'option')) { ?>
								<div class="flex items-center flex-col gap-[20px] mt-[1em]">
								<?php	while (have_rows('footer_logos', 'option')) {
										the_row(); 
										$logo = get_sub_field('logo'); 
										$link = get_sub_field('link'); ?>
										<?php if ( !empty($logo)) : ?>   
											<?php if( $link ):
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self'; ?>  
											<a tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">  <?php endif; ?>            
											<img class="w-fit max-w-[90px] object-contain object-center" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>"/>    
											<?php if( $link ): ?>
											</a>
											<?php endif; ?>                        
										<?php endif; ?> 
										<?php } ?>
									</div>		
								<?php } ?>
							</div>
							</div>	
						</div>	
					</div>				
			       <?php endif; ?>
				  </div>	
				  <?php if (have_rows('footer__accessibility', 'option')) : ?>
						<div class="footer-contact hidden xl:flex justify-center items-center xl:justify-start lg:flex-row flex-col gap-[15px] lg:gap-[1em] xl:gap-[38px] 3xl:gap-[92px] uppercase text-center lg:text-left mb-0 animate__animated" data-animation="fadeIn" data-duration="1.5s">
							<?php while (have_rows('footer__accessibility', 'option')) : the_row(); 			     					
									$link = get_sub_field('page_link');
										if( $link ):
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self'; ?>
											<a tabindex="0" class="hover:text-white text-secondary font-primary-font text-[14px] font-bold uppercase tracking-[0.56px]" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>"  rel="noopener noreferrer">
												<?php echo $link_title; ?>
											</a>
										<?php endif; ?>							
							<?php endwhile; ?>	
							
							<p class="text-secondary font-primary-font text-[14px] font-bold uppercase tracking-[0.56px] flex flex-col lg:inline-block">&#169; <?php echo date_i18n( 'Y' ).' '.get_bloginfo( 'name' ).' '.get_field('footer_copyright', 'option'); ?></p>
						
						</div>	
						<?php endif; ?>				
				</div>
		    </div>  		
	      </div> 
	   <?php if (have_rows('footer__accessibility', 'option')) : ?>
		<div class="footer-contact flex justify-center items-center lg:flex-row flex-col gap-[15px] lg:gap-[1em] xl:gap-[38px] 3xl:gap-[92px] uppercase text-center mb-[26px] xl:hidden animate__animated" data-animation="fadeIn" data-duration="1.5s">
		     <?php while (have_rows('footer__accessibility', 'option')) : the_row(); 			     					
					$link = get_sub_field('page_link');
						if( $link ):
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self'; ?>
							<a tabindex="0" class="hover:text-white text-secondary font-primary-font text-[14px] font-bold uppercase tracking-[0.56px]" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>"  target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
								<?php echo $link_title; ?>
							</a>
						<?php endif; ?>							
			<?php endwhile; ?>	
			
			<p class="text-secondary font-primary-font text-[14px] font-bold uppercase tracking-[0.56px] flex flex-col lg:inline-block">&#169; <?php echo date_i18n( 'Y' ).' '.get_bloginfo( 'name' ).' '.get_field('footer_copyright', 'option'); ?></p>
		
		</div>	
		<?php endif; ?>	
	   <div class="w-full h-[2px] bg-foreground-dark"></div> 
	</div>
</footer><!-- #colophon -->
