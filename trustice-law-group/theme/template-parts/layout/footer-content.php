<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Trustice_Law_Group
 */

$add_call_action = get_field('add_footer_call_to_action');
?>

<footer id="colophon" class="bg-foreground relative">
	<?php if ($add_call_action): ?>
		<!-- Call to Action Section -->
		<?php include get_template_directory() . '/template-parts/global/global-footer-call-action.php'; ?>
		<div class="w-full px-[30px] mx-auto"><div class="bg-white h-[1px] w-full"></div></div>
		 <?php endif; ?>
     <!-- Main Footer Content -->
	<div class="w-full mx-auto px-[30px] pt-[40px]">
		<div class="grid grid-cols-1 lg:grid-cols-4 gap-10 items-start">
			<div class="text-center lg:text-left">               
				<!-- Logo Footer -->
				<div class="flex justify-center lg:justify-start items-center mb-[27px]">
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
				 <div class="flex flex-col gap-y-[18px] lg:gap-y-[30px]">
                            <?php								
                               foreach ($contact_list as $column_contact):  
                                  $icon = $column_contact['icon'];  
                                  $contact = $column_contact['text_contact'];
								  $title_contact = $column_contact['title_contact']; ?>
                                    <div class="flex gap-[16px] flex-row items-start  lg:justify-start justify-center">
                                    <?php if( $icon): ?>
                                        <div class="pt-[5px]">
                                            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" class="w-[16px] h-auto object-contain object-center skip-lazy" />
                                        </div>
                                    <?php endif; ?>
                                    <?php if($contact): ?>
                                        <div class="contact text-white mb-0 text-small style-link">  
										<?php if($title_contact): ?>
											<div class="eyebrow text-secondary mb-[4px]"><?php echo esc_html($title_contact); ?></div>
										<?php endif; ?>               
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
                <div class="title-menu-footer text-white lg:mb-[36px] mb-[20px]"><?php echo esc_html($title_menu_1); ?></div>
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
                                'menu_class'     => 'flex flex-col justify-center lg:items-start items-center gap-[26px] text-center lg:text-left',
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
                <div class="title-menu-footer text-white lg:mb-[36px] mb-[20px]"><?php echo esc_html($title_menu_2); ?></div>
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
                                'menu_class'     => 'flex flex-col justify-center lg:items-start items-center gap-[26px] text-center lg:text-left',		
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
                <div class="title-menu-footer text-white lg:mb-[36px] mb-[20px]"><?php echo esc_html($title_menu_3); ?></div>
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
                                'menu_class'     => 'flex flex-col justify-center lg:items-start items-center gap-[26px] text-center lg:text-left',		
                         		 'walker' => new Tailwind_Walker_Nav_Menu(),		
                                
                            ));
                            ?>
                        </nav>	
                     </div>          
                <?php endif; ?>                
            </div>
		</div>
		<div class="bg-white w-full h-[1px] mt-[40px]"></div>
	</div>
	 <!-- Bottom Bar - Social & Copyright -->
    <div class="bg-foreground py-6 lg:py-10">
        <div class="w-full mx-auto px-[30px]">
            <div class="flex flex-col md:flex-row-reverse justify-between items-center">
                
              <!-- Social Icons -->
				<?php if (have_rows('social_networks', 'option')) : ?>
					<div class="flex space-x-6 mb-4 md:mb-0 flex-row items-center xl:justify-start justify-center ">
						<?php while (have_rows('social_networks', 'option')) : the_row();  
							$icon = get_sub_field('svg_code_social');
							$icon_image = get_sub_field('icon_image');
							$link = get_sub_field('url'); ?>
							
							<?php if( $link ):
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self'; ?>
								
								<a tabindex="0" class="text-white social transition-all ease-in-out duration-300 translate-y-0 hover:translate-y-[-4px]" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
									<?php if($icon): 
										echo $icon; 
									elseif($icon_image): 
										// Handle if ACF returns array or ID
										if(is_array($icon_image)) {
											$image_url = $icon_image['url'];
											$image_alt = $icon_image['alt'];
										} else {
											$image_url = wp_get_attachment_url($icon_image);
											$image_alt = get_post_meta($icon_image, '_wp_attachment_image_alt', true);
										}
										echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '">'; 
									endif; ?>    
								</a>
							<?php endif; ?>
						<?php endwhile; ?>	
					</div>          
				<?php endif; ?>             

                <!-- Copyright -->
                <div class="text-white text-[12px] font-medium link-underline lg:text-left text-center tracking-[0.6px]">
					&#169; <?php echo date_i18n( 'Y' ) . ' ' . get_bloginfo('name'); ?> | <?php echo get_field('footer_copy', 'option'); ?>
                </div>

            </div>
        </div>
    </div>
</footer><!-- #colophon -->