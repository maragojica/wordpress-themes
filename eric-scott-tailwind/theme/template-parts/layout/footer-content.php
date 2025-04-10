<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Eric_Scott
 */

?>

<footer id="colophon" class="site-footer bg-secondary pt-[3em] pb-[3em] md:pt-[87px] md:pb-[60px]">
	<div class="container mx-auto">
	   <div class="flex items-center lg:gap-[2em] xl:gap-[50px] 2xl:gap-[103px] lg:items-start flex-col lg:flex-row justify-between animate__animated" data-animation="fadeIn" data-duration="1s">
	      <div class="footer-l lg:w-auto w-full xl:mb-0 mb-[2em]">
			<?php
				$logo = get_field('branding', 'option')['footer_logo'];
				if ($logo) { ?>
				<a tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
				<?php	$logo_url = $logo['url'];
					$logo_mime_type = $logo['mime_type'];
					if ($logo_url) { ?>
						<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="mx-auto lg:ml-0 h-auto w-auto max-w-[250px] lg:max-w-[75%] 2xl:max-w-[80%] object-contain object-center skip-lazy"/>	
				<?php } ?>
					</a>
				<?php } ?>	
				<?php
					if (have_rows('footer_logos', 'option')) { ?>
					<div class="hidden lg:flex items-center gap-[20px] lg:mt-[122px] xl:mt-[78px]">
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
                                <img class="w-fit max-w-[242px] object-contain object-center" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>"/>    
								<?php if( $link ): ?>
								</a>
								<?php endif; ?>                        
                            <?php endif; ?> 
							<?php } ?>
						</div>		
					<?php } ?>	  
	       </div>
		   <div class="footer-r flex md:items-start items-center flex-col md:flex-row gap-y-[2em] gap-y-0 lg:justify-between md:gap-[2em] xl:gap-[103px] lg:ml-auto lg-w-fit w-full h-full">
		        <?php if (get_field('footer_menu_1', 'option')): ?>
                        <div class="flex flex-col grow justify-center gap-[6px] lg:text-left text-center lg:max-w-max w-max items-center lg:items-start ">  
                            <?php $title_footer_1 =  get_field('title_footer_menu_1', 'option'); 
                            if($title_footer_1):?>
                            <div class="font-primary text-primary uppercase text-[20px] lg:text-[22px] font-normal"><?php echo $title_footer_1;?></div>
                            <?php endif; ?>
                    
                    <!-- Primary Footer Navigation -->
                    <nav id="footer-primary" class="footer-nav footer-navigation w-full">	
                            <?php
                            wp_nav_menu(array(
                                'menu' => get_field('footer_menu_1', 'option'),
                                'theme_location' => 'menu-footer-1',
                                'container'      => false,
                                'menu_class'     => 'flex flex-col justify-center gap:[24px] text-center lg:text-left',		
                                'walker' => new Tailwind_Walker_Nav_Menu(),				
                                
                            ));
                            ?>
                        </nav>	
                     </div>          
                <?php endif; ?>		
				<?php if (get_field('footer_menu_2', 'option')): ?>
                        <div class="flex flex-col grow justify-center gap-[6px] lg:text-left text-center lg:max-w-max w-max items-center lg:items-start">  
                            <?php $title_footer_2 =  get_field('title_footer_menu_2', 'option'); 
                            if($title_footer_2):?>
                            <div class="font-primary text-primary uppercase text-[20px] lg:text-[22px] font-normal"><?php echo $title_footer_2;?></div>
                            <?php endif; ?>
                    
							<!-- Secondary Footer Navigation -->
							<nav id="footer-secondadry" class="footer-nav footer-navigation w-full">	
									<?php
									wp_nav_menu(array(
										'menu' => get_field('footer_menu_2', 'option'),
										'theme_location' => 'menu-footer-2',
										'container'      => false,
										'menu_class'     => 'flex flex-col justify-center gap:[24px] text-center lg:text-left',		
										'walker' => new Tailwind_Walker_Nav_Menu(),				
										
									));
									?>
                        </nav>	
                     </div>          
                <?php endif; ?>	
				<?php if (get_field('footer_contact_title', 'option')): ?>
                        <div class="flex flex-col grow justify-center gap-[6px] lg:text-left text-center w-full lg:max-w-max w-max items-center lg:items-start">  
                            <?php $footer_contact_title =  get_field('footer_contact_title', 'option'); 
                            if($footer_contact_title):?>
                            <div class="font-primary text-primary uppercase text-[20px] lg:text-[22px] font-normal"><?php echo $footer_contact_title;?></div>
                            <?php endif; ?>
                    
							<?php if (have_rows('footer_contacts', 'option')) : ?>
								<?php while (have_rows('footer_contacts', 'option')) : the_row();  $contact_info = get_sub_field('contact_info'); ?>
								<div class="mt-[20px]">
								<?php if($contact_info): ?>
                                        <div class="contact-footer"><?php echo $contact_info;?></div>
                                    <?php endif; ?>  
								</div>
								<?php endwhile; ?>	
							<?php endif; ?> 

							<?php
							if (have_rows('social_links', 'option')) { 	?>
								<div class="flex gap-[16px] flex-row items-center justify-start mt-[20px]">
									<?php								
										while (have_rows('social_links', 'option')) {
											the_row(); ?>
											<?php $icon = get_sub_field('svg_code');
											$link = get_sub_field('link');
											if( $link ):
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self'; ?>
												<a tabindex="0" class="social transition-transform" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
													<?php if($icon): echo $icon; endif; ?>
												</a>
											<?php endif; ?>
									<?php 
									} ?>
								</div>
						   <?php 
							}  ?>
                     </div>          
                <?php endif; ?>	
				<?php
					if (have_rows('footer_logos', 'option')) { ?>
					<div class="lg:hidden flex items-center flex-col gap-[20px] mt-[1em]">
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
                                <img class="w-fit max-w-[242px] object-contain object-center" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>"/>    
								<?php if( $link ): ?>
								</a>
								<?php endif; ?>                        
                            <?php endif; ?> 
							<?php } ?>
						</div>		
					<?php } ?>
		   </div>
		</div>	
		<div class="w-full">        
           <div class="line-border mt-[63px] mb-[63px]"></div>        
        </div>	
		<?php if(get_field('footer_copyright', 'option')): ?>
            <p class="w-full text-white font-text text-[16px] font-semibold flex flex-col md:inline-block text-center tracking-[0.36px] copyright info-copyright">&#169; <?php echo date_i18n( 'Y' ).' '.get_bloginfo( 'name' ).' '.get_field('footer_copyright', 'option'); ?></p>
        <?php endif; ?> 
    </div>
</footer><!-- #colophon -->
