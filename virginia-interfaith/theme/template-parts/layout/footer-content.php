<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Virginia_Interfaith
 */

?>

<footer id="colophon" class="bg-white pt-[37px] relative">
     <!-- Main Footer Content -->
	<div class="container mx-auto">
		<div class="grid grid-cols-1 lg:grid-cols-4 gap-10 items-center">
			<div class="text-center lg:text-left">               
				<!-- Logo Footer -->
				<div class="flex justify-center lg:justify-start items-center mb-[33px]">
						<?php
						$logo = get_field('branding', 'option')['footer_logo'];
						if ($logo) { ?>
						<a tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
						<?php	$logo_url = $logo['url'];
							$logo_mime_type = $logo['mime_type'];
							if ($logo_url) { ?>
								<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="logo-footer mx-auto h-auto max-w-[190px] xl:max-w-[200px] w-fit object-contain object-center skip-lazy"/>						
								
						<?php } ?>
							</a>
						<?php } ?>  
				</div> 
				<!-- Contact Info Footer -->
				 <?php $contact_list = get_field('footer_contact', 'option');
				 if($contact_list): ?>
				 <div class="flex flex-col gap-y-[12px] lg:gap-y-[50px]">
                            <?php								
                               foreach ($contact_list as $column_contact):  
                                  $icon = $column_contact['icon'];  
                                  $contact = $column_contact['text_contact']; ?>
                                    <div class="flex gap-[16px] flex-row items-start  lg:justify-start justify-center">
                                    <?php if( $icon): ?>
                                        <div>
                                            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" class="w-[20px] h-auto object-contain object-center skip-lazy" />
                                        </div>
                                    <?php endif; ?>
                                    <?php if($contact): ?>
                                        <div class="contact text-foreground mb-0 text-small font-important style-link">                 
                                            <?php echo $contact; ?>                   
                                    </div>
                                    <?php endif; ?>
                                    </div>
                         <?php endforeach; ?>   
                        </div>
				 <?php endif; ?>				 
            </div>
			<!-- Navigation Columns -->
			 <!-- Footer Primary - Navigation -->
            <div class="text-center lg:text-left">
				<?php $title_menu_1 = get_field('footer_title_menu_1', 'option');
				if($title_menu_1): ?>
                <div class="eyedrop text-foreground lg:mb-[20px] mb-[15px] uppercase"><?php echo esc_html($title_menu_1); ?></div>
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
                                'menu_class'     => 'flex flex-col justify-center lg:items-start items-center gap-[20px] text-center lg:text-left',		
                                'walker' => new Tailwind_Walker_Nav_Menu(),				
                                
                            ));
                            ?>
                        </nav>	
                     </div>          
                <?php endif; ?>                
            </div>
			<!-- Footer Secondary - Navigation -->
			 <div class="text-center lg:text-left">
				<?php $title_menu_2 = get_field('footer_title_menu_2', 'option');
				if($title_menu_2): ?>
                <div class="eyedrop text-foreground lg:mb-[20px] mb-[15px] uppercase"><?php echo esc_html($title_menu_2); ?></div>
				<?php endif; ?>
				<?php if (get_field('footer_menu_2', 'option')): ?>
                 <div class="flex flex-col grow justify-center gap-[4px] lg:text-left text-center w-full lg:w-fit items-center lg:items-start">  
                         
                    <!-- Primary Footer Navigation -->
                    <nav id="footer-primary" class="footer-nav footer-navigation w-full space-y-3 flex flex-col items-center lg:items-start">	
                            <?php
                            wp_nav_menu(array(
                                'menu' => get_field('footer_menu_2', 'option'),
                                'theme_location' => 'menu-footer-2',
                                'container'      => false,
                                'menu_class'     => 'flex flex-col justify-center lg:items-start items-center gap-[20px] text-center lg:text-left',		
                                'walker' => new Tailwind_Walker_Nav_Menu(),				
                                
                            ));
                            ?>
                        </nav>	
                     </div>          
                <?php endif; ?>                
            </div>
				<!-- Footer Tertiary - Navigation -->
			 <div class="text-center lg:text-left">
				<?php $title_menu_3 = get_field('footer_title_menu_3', 'option');
				if($title_menu_3): ?>
                <div class="eyedrop text-foreground lg:mb-[20px] mb-[15px] uppercase"><?php echo esc_html($title_menu_3); ?></div>
				<?php endif; ?>
				<?php if (get_field('footer_menu_3', 'option')): ?>
                 <div class="flex flex-col grow justify-center gap-[4px] lg:text-left text-center w-full lg:w-fit items-center lg:items-start">  
                         
                    <!-- Primary Footer Navigation -->
                    <nav id="footer-primary" class="footer-nav footer-navigation w-full space-y-3 flex flex-col items-center lg:items-start">	
                            <?php
                            wp_nav_menu(array(
                                'menu' => get_field('footer_menu_3', 'option'),
                                'theme_location' => 'menu-footer-3',
                                'container'      => false,
                                'menu_class'     => 'flex flex-col justify-center lg:items-start items-center gap-[20px] text-center lg:text-left',		
                                'walker' => new Tailwind_Walker_Nav_Menu(),				
                                
                            ));
                            ?>
                        </nav>	
                     </div>          
                <?php endif; ?>                
            </div>
		</div>
		<div class="bg-tertiary w-full h-[4px] mt-[40px]"></div>
	</div>
	 <!-- Bottom Bar - Social & Copyright -->
    <div class="bg-white py-6">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row-reverse justify-between items-center">
                
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
									<a tabindex="0" class="text-foreground transition-colors social transition-all ease-in-out duration-300" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
									<?php if($icon): echo $icon; endif; ?>      
									</a>
								<?php endif; ?>
								<?php endwhile; ?>	
							</div>          
						<?php endif; ?>                

                <!-- Copyright -->
                <div class="text-foreground text-small font-important link-underline lg:text-left text-center">
					&#169; <?php echo date_i18n( 'Y' ) . ' ' . get_bloginfo('name'); ?> | <?php echo get_field('footer_copy', 'option'); ?>
                </div>

            </div>
        </div>
    </div>
</footer><!-- #colophon -->
