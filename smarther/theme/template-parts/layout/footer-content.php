<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package smarther
 */

?>

<footer id="colophon" class="site-footer bg-quaternary lg:pt-[60px] pt-[3em] relative">
<!-- Main Footer Content -->
    <div class="container mx-auto lg:pb-[50px] pb-[3em]">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
            
            <!-- Center Column - Logo & CTA (First on mobile) -->
            <div class="text-center lg:order-2">               
				<!-- Logo Footer -->
				<div class="flex justify-center items-center mb-[20px]">
						<?php
						$logo = get_field('branding', 'option')['footer_logo'];
						if ($logo) { ?>
						<a tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
						<?php	$logo_url = $logo['url'];
							$logo_mime_type = $logo['mime_type'];
							if ($logo_url) { ?>
								<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="logo-footer mx-auto h-auto max-w-[190px] xl:max-w-[213px] w-fit object-contain object-center skip-lazy"/>						
								
						<?php } ?>
							</a>
						<?php } ?>  
				</div>   
				<?php $footer_text = get_field('footer_text', 'option');
				if($footer_text): ?>                
                <div class="text-white text-small font-bold md:max-w-[80%] mx-auto">
                    <?php echo $footer_text; ?>
                </div>
				<?php endif; ?>
				<?php $footer_cta = get_field('footer_cta', 'option');
                if($footer_cta): 
				$url = $footer_cta['url'];
					$title = $footer_cta['title'];
					$target = $footer_cta['target'] ? $footer_cta['target'] : '_self'; ?>
					<div class="mt-[20px]">
					<a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="btn btn_fill_action flex items-center justify-center gap-x-[12px] w-fit mx-auto"
						aria-label="<?php echo esc_attr($title); ?>"
						title="<?php echo esc_attr($title); ?>">
					<?php echo esc_html( $title ); ?>					
					</a>
				</div> 
				<?php endif; ?>
            </div>
            
            <!-- Left Column - Navigation -->
            <div class="text-center lg:text-left lg:order-1">
				<?php $title_menu_1 = get_field('footer_title_menu_1', 'option');
				if($title_menu_1): ?>
                <div class="text-white font-semibold lg:mb-[20px] mb-[15px] uppercase tracking-[0.8px]"><?php echo esc_html($title_menu_1); ?></div>
				<?php endif; ?>
				<?php if (get_field('footer_menu_1', 'option')): ?>
                 <div class="flex flex-col grow justify-center gap-[4px] lg:text-left text-center w-full lg:w-fit items-center lg:items-start">  
                         
                    <!-- Primary Footer Navigation -->
                    <nav id="footer-primary" class="footer-nav footer-navigation w-full space-y-3 flex flex-col items-center lg:items-start">	
                            <?php
                            wp_nav_menu(array(
                                'menu' => get_field('footer_menu_1', 'option'),
                                'theme_location' => 'menu-footer-1',
                                'container'      => false,
                                'menu_class'     => 'flex flex-col justify-center lg:items-start items-center gap-[15px] text-center lg:text-left',		
                                'walker' => new Tailwind_Walker_Nav_Menu(),				
                                
                            ));
                            ?>
                        </nav>	
                     </div>          
                <?php endif; ?>                
            </div>

            <!-- Right Column - Contact Info -->
            <div class="text-center lg:text-right lg:order-3 flex flex-col justify-between h-full">
                <div>
					<?php $title_menu_2 = get_field('footer_title_menu_2', 'option');
				if($title_menu_2): ?>
                <div class="text-white font-semibold lg:mb-[20px] mb-[15px] uppercase tracking-[0.8px]"><?php echo esc_html($title_menu_2); ?></div>
				<?php endif; ?>
				<?php $footer_contact = get_field('footer_contact', 'option');
				if($footer_contact): ?>
                <div class="text-white style-link">
                    <?php echo $footer_contact; ?>
                </div>
				<?php endif; ?>
				</div>
				<?php if (get_field('footer_menu_2', 'option')): ?>
                 <div class="mt-8 flex flex-col justify-center lg:justify-content-end gap-[4px] lg:text-right text-center w-full items-center lg:items-end">  
                         
                    <!-- Primary Footer Navigation -->
                    <nav id="footer-secondary" class="footer-nav footer-navigation w-full space-y-3 flex flex-col items-center lg:items-end">	
                            <?php
                            wp_nav_menu(array(
                                'menu' => get_field('footer_menu_2', 'option'),
                                'theme_location' => 'menu-footer-2',
                                'container'      => false,
                                'menu_class'     => 'flex flex-col justify-center lg:justify-content-end lg:items-end items-center gap-[20px] text-center lg:text-right lg:pr-0 xl:pr-0',		
                                'walker' => new Tailwind_Walker_Nav_Menu(),				
                                
                            ));
                            ?>
                        </nav>	
                     </div>          
                <?php endif; ?>                
            </div>

        </div>
    </div>

    <!-- Bottom Bar - Social & Copyright -->
    <div class="bg-foreground py-6">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                
                <!-- Social Icons -->
				  <?php if (have_rows('social_networks', 'option')) : ?>
               			 <div class="flex space-x-6 mb-4 md:mb-0 flex-row items-center xl:justify-start justify-center ">
              			  <?php while (have_rows('social_networks', 'option')) : the_row();  
							$icon = get_sub_field('svg_code_social');
							$link = get_sub_field('url'); ?>
								<?php 
								if( $link ):
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self'; ?>
									<a tabindex="0" class="text-white transition-colors social transition-all ease-in-out duration-300" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
									<?php if($icon): echo $icon; endif; ?>      
									</a>
								<?php endif; ?>
								<?php endwhile; ?>	
							</div>          
						<?php endif; ?>                

                <!-- Copyright -->
                <div class="text-white text-small font-bold link-underline">
					&#169; <?php echo date_i18n( 'Y' ) . ' ' . get_bloginfo('name'); ?> | <?php echo get_field('footer_copy', 'option'); ?>
                </div>

            </div>
        </div>
    </div>
</footer><!-- #colophon -->
