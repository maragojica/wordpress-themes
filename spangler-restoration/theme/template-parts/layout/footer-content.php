<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spangler_Restoration
 */

?>

<footer id="colophon" class="site-footer bg-[#0066CA] lg:pt-[94px] lg:pb-[45px] pt-[3em] pb-[3em]">
	<div class="container mx-auto">
    <div class="flex items-center lg:items-start flex-col lg:flex-row gap-[2em] lg:gap-[30px] xl:gap-[90px] justify-between">
      <div class="footer-l lg:w-[30%] w-full">
        <?php
            $logo = get_field('branding', 'option')['footer_logo'];
            if ($logo) { ?>
            <a tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
            <?php	$logo_url = $logo['url'];
                $logo_mime_type = $logo['mime_type'];
                if ($logo_url) { ?>
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="mx-auto lg:ml-0 h-auto max-w-[250px] lg:max-w-[300px] xl:max-w-[361px] w-fit object-contain object-center skip-lazy"/>						
                    
            <?php } ?>
                </a>
            <?php } ?>
      </div>
      <div class="flex flex-col gap-y-[1em] lg:gap-y-[30px] xl:gap-[60px] footer-r lg:w-[70%] w-full">
        <div class="flex lg:items-start items-center flex-col lg:flex-row gap-[2em] lg:gap-[30px] 2xl:gap-[4em]">
            <?php if (get_field('footer_menu_1', 'option')): ?>
                        <div class="flex flex-col grow justify-center gap-[4px] lg:text-left text-center w-full lg:w-fit items-center lg:items-start">  
                            <?php $title_footer_1 =  get_field('title_footer_menu_1', 'option'); 
                            if($title_footer_1):?>
                            <div class="mb-[20px] font-primary-font text-white uppercase text-[17px] font-bold lg:min-w-[160px]"><?php echo $title_footer_1;?></div>
                            <?php endif; ?>
                    
                    <!-- Primary Footer Navigation -->
                    <nav id="footer-primary" class="footer-nav footer-navigation w-full">	
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
                <?php if (get_field('footer_menu_2', 'option')): ?>
                        <div class="flex flex-col grow justify-center gap-[4px] lg:text-left text-center w-full lg:w-fit items-center lg:items-start">  
                            <?php $title_footer_2 =  get_field('title_footer_menu_2', 'option'); 
                            if($title_footer_2):?>
                            <div class="mb-[20px] font-primary-font text-white uppercase text-[17px] font-bold"><?php echo $title_footer_2;?></div>
                            <?php endif; ?>
                    
                    <!-- Secondary Footer Navigation -->
                    <nav id="footer-secondary" class="footer-nav footer-navigation w-full">	
                            <?php
                            wp_nav_menu(array(
                                'menu' => get_field('footer_menu_2', 'option'),
                                'theme_location' => 'menu-footer-2',
                                'container'      => false,
                                'menu_class'     => 'flex flex-col justify-center gap-[15px] lg:items-start items-center text-center lg:text-left',		
                                'walker' => new Tailwind_Walker_Nav_Menu(),				
                                
                            ));
                            ?>
                        </nav>	
                        </div>             
                <?php endif; ?>  
				<?php if (get_field('footer_menu_3', 'option')): ?>
                        <div class="flex flex-col grow justify-center gap-[4px] lg:text-left text-center w-full lg:w-fit items-center lg:items-start">  
                            <?php $title_footer_3 =  get_field('title_footer_menu_3', 'option'); 
                            if($title_footer_3):?>
                            <div class="mb-[20px] font-primary-font text-white uppercase text-[17px] font-bold"><?php echo $title_footer_3;?></div>
                            <?php endif; ?>
                    
                    <!-- Tertiary Footer Navigation -->
                    <nav id="footer-tertiary" class="footer-nav footer-navigation w-full">	
                            <?php
                            wp_nav_menu(array(
                                'menu' => get_field('footer_menu_3', 'option'),
                                'theme_location' => 'menu-footer-3',
                                'container'      => false,
                                'menu_class'     => 'flex flex-col justify-center gap-[15px] lg:items-start items-center text-center lg:text-left',		
                                'walker' => new Tailwind_Walker_Nav_Menu(),				
                                
                            ));
                            ?>
                        </nav>	
                        </div>             
                <?php endif; ?>  
				<div class="flex flex-col grow justify-center gap-[4px] lg:text-left text-center w-full lg:w-fit items-center lg:items-start">  
				<?php $title_footer_contact =  get_field('title_footer_contact', 'option'); 
                            if($title_footer_contact):?>
                            <div class="mb-[20px] font-primary-font text-white uppercase text-[17px] font-bold"><?php echo $title_footer_contact;?></div>
                            <?php endif; ?>
					   <?php $footer_contact_text =  get_field('footer_contact_text', 'option'); 
						if($footer_contact_text):?>
						<div class="mb-[10px] font-primary-font text-white uppercase text-[16px] font-normal flex flex-col text-info-footer"><?php echo $footer_contact_text;?></div>
						<?php endif; ?>
                        <?php if (have_rows('social_links_footer', 'option')) : ?>
               			 <div class="flex gap-[10px] flex-row items-center xl:justify-start justify-center ">
              			  <?php while (have_rows('social_links_footer', 'option')) : the_row();  
							$icon = get_sub_field('svg_code');
							$link = get_sub_field('link'); ?>
								<?php 
								if( $link ):
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self'; ?>
									<a tabindex="0" class="social transition-all ease-in-out duration-300 translate-y-0 hover:-translate-y-1" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
									<?php if($icon): echo $icon; endif; ?>      
									</a>
								<?php endif; ?>
							<?php endwhile; ?>	
             			</div>          
            		<?php endif; ?> 	
                </div>  
        </div>
      </div>
    </div>
	<?php if(get_field('footer_copyright', 'option')): ?>
		<div class="w-full lg:pt-[86px] pt-[3em] text-center"><p class="text-white uppercase font-primary-font text-[14px] font-normal tracking-[0.42px] flex flex-col lg:inline-block copyright info-copyright">&#169; <?php echo date_i18n( 'Y' ).' '.get_bloginfo( 'name' ).' '.get_field('footer_copyright', 'option'); ?></p></div>
	<?php endif; ?> 
</div>
</footer><!-- #colophon -->