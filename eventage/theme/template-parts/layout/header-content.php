<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eventage
 */

?>

<header id="masthead" class="z-[10] bg-black h-[94px] md:h-screen px-[1em] md:px-0 w-full md:w-[90px] xl:w-[100px] 2xl:w-[110px] fixed left-0 top-0 md:pt-[30px] md:pb-[40px] flex md:flex-col items-center justify-between">
<div class="box-logo">	
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
<div class="box-menu">	
	<button id="mobile-menu-toggle" class="text-primary cursor-pointer group focus:outline-none md:mt-0 mt-[8px]" aria-label="Open mobile menu" aria-controls="mobile-menu" aria-expanded="false">
		<svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45" fill="none">
		<rect width="10.3846" height="10.3846" rx="2" fill="white" class="group-hover:fill-primary"/>
		<rect y="17.3076" width="10.3846" height="10.3846" rx="2" fill="white" class="group-hover:fill-primary"/>
		<rect y="34.6154" width="10.3846" height="10.3846" rx="2" fill="white" class="group-hover:fill-primary"/>
		<rect x="17.3077" width="10.3846" height="10.3846" rx="2" fill="white" class="group-hover:fill-primary"/>
		<rect x="17.3077" y="17.3076" width="10.3846" height="10.3846" rx="2" fill="white" class="group-hover:fill-primary"/>
		<rect x="17.3077" y="34.6154" width="10.3846" height="10.3846" rx="2" fill="white" class="group-hover:fill-primary"/>
		<rect x="34.6154" width="10.3846" height="10.3846" rx="2" fill="white" class="group-hover:fill-primary"/>
		<rect x="34.6154" y="17.3076" width="10.3846" height="10.3846" rx="2" fill="white" class="group-hover:fill-primary"/>
		<rect x="34.6154" y="34.6154" width="10.3846" height="10.3846" rx="2" fill="white" class="group-hover:fill-primary"/>
		</svg>
		<span class="text-white font-menu uppercase text-[11px] tracking-[3.85px] group-hover:text-primary">Menu</span>
	</button>
</div>	
<div class="box-config">	
<svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
  <path d="M9.80597 27L9.26866 22.68C8.97761 22.5675 8.70336 22.4325 8.4459 22.275C8.18843 22.1175 7.93657 21.9487 7.6903 21.7688L3.69403 23.4563L0 17.0438L3.45896 14.4113C3.43657 14.2538 3.42537 14.1019 3.42537 13.9556V13.0444C3.42537 12.8981 3.43657 12.7463 3.45896 12.5887L0 9.95625L3.69403 3.54375L7.6903 5.23125C7.93657 5.05125 8.19403 4.8825 8.46269 4.725C8.73134 4.5675 9 4.4325 9.26866 4.32L9.80597 0H17.194L17.7313 4.32C18.0224 4.4325 18.2966 4.5675 18.5541 4.725C18.8116 4.8825 19.0634 5.05125 19.3097 5.23125L23.306 3.54375L27 9.95625L23.541 12.5887C23.5634 12.7463 23.5746 12.8981 23.5746 13.0444V13.9556C23.5746 14.1019 23.5522 14.2538 23.5075 14.4113L26.9664 17.0438L23.2724 23.4563L19.3097 21.7688C19.0634 21.9487 18.806 22.1175 18.5373 22.275C18.2687 22.4325 18 22.5675 17.7313 22.68L17.194 27H9.80597ZM13.5672 18.225C14.8657 18.225 15.9739 17.7638 16.8918 16.8413C17.8097 15.9188 18.2687 14.805 18.2687 13.5C18.2687 12.195 17.8097 11.0813 16.8918 10.1588C15.9739 9.23625 14.8657 8.775 13.5672 8.775C12.2463 8.775 11.1325 9.23625 10.2257 10.1588C9.31903 11.0813 8.86567 12.195 8.86567 13.5C8.86567 14.805 9.31903 15.9188 10.2257 16.8413C11.1325 17.7638 12.2463 18.225 13.5672 18.225Z" fill="#F5F5F5"/>
</svg>
</div>	
</header>
<!-- #masthead -->
 <!-- Mobile Off-Canvas Menu -->
 <div id="mobile-menu" class="fixed inset-0 bg-black text-secondary h-screen max-h-screen transform -translate-x-full transition-transform duration-300 z-[11] pt-[30px] pb-[60px]">
     <div class="flex md:flex-row flex-col w-full md:h-full h-[94px]">
		  <div class="flex items-center md:flex-col justify-between px-[1em] md:px-0 w-full md:w-[90px] xl:w-[100px] 2xl:w-[110px]">    
			<div class="box-logo">	
				<?php $logo = get_field('branding', 'option')['mobile_white_logo'];
					if ($logo) { ?>
					<a tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
					<?php $logo_url = $logo['url'];
						$logo_mime_type = $logo['mime_type'];
						if ($logo_url) { ?>
								<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="white-logo logo-header object-contain object-center skip-lazy"/>
						<?php }	?>
						</a>
				<?php	} ?>
			</div>	
			<div class="box-menu">	
				<button id="mobile-menu-close" class="text-primary cursor-pointer group focus:outline-none" aria-label="Open mobile menu" aria-controls="mobile-menu" aria-expanded="false">
				   <svg xmlns="http://www.w3.org/2000/svg" width="43" height="43" viewBox="0 0 43 43" fill="none">
					<path class="group-hover:fill-primary" d="M5.75 41.75C4.50736 42.9926 2.49264 42.9926 1.25 41.75C0.00736022 40.5074 0.00735879 38.4926 1.25 37.25L17 21.5L1.25 5.75C0.00735784 4.50736 0.00735879 2.49264 1.25 1.25C2.49264 0.00735879 4.50736 0.00735962 5.75 1.25L21.5 17L37.25 1.25C38.4926 0.00735676 40.5074 0.00735998 41.75 1.25C42.9926 2.49264 42.9926 4.50736 41.75 5.75L26 21.5L41.75 37.25C42.9926 38.4926 42.9926 40.5074 41.75 41.75C40.5074 42.9926 38.4926 42.9926 37.25 41.75L21.5 26L5.75 41.75Z" fill="white"/>
					</svg>
					<span class="text-white font-menu uppercase text-[11px] tracking-[3.85px] group-hover:text-primary">Menu</span>
				</button>
			</div>		
			<div class="box-config">	
				<svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
				<path d="M9.80597 27L9.26866 22.68C8.97761 22.5675 8.70336 22.4325 8.4459 22.275C8.18843 22.1175 7.93657 21.9487 7.6903 21.7688L3.69403 23.4563L0 17.0438L3.45896 14.4113C3.43657 14.2538 3.42537 14.1019 3.42537 13.9556V13.0444C3.42537 12.8981 3.43657 12.7463 3.45896 12.5887L0 9.95625L3.69403 3.54375L7.6903 5.23125C7.93657 5.05125 8.19403 4.8825 8.46269 4.725C8.73134 4.5675 9 4.4325 9.26866 4.32L9.80597 0H17.194L17.7313 4.32C18.0224 4.4325 18.2966 4.5675 18.5541 4.725C18.8116 4.8825 19.0634 5.05125 19.3097 5.23125L23.306 3.54375L27 9.95625L23.541 12.5887C23.5634 12.7463 23.5746 12.8981 23.5746 13.0444V13.9556C23.5746 14.1019 23.5522 14.2538 23.5075 14.4113L26.9664 17.0438L23.2724 23.4563L19.3097 21.7688C19.0634 21.9487 18.806 22.1175 18.5373 22.275C18.2687 22.4325 18 22.5675 17.7313 22.68L17.194 27H9.80597ZM13.5672 18.225C14.8657 18.225 15.9739 17.7638 16.8918 16.8413C17.8097 15.9188 18.2687 14.805 18.2687 13.5C18.2687 12.195 17.8097 11.0813 16.8918 10.1588C15.9739 9.23625 14.8657 8.775 13.5672 8.775C12.2463 8.775 11.1325 9.23625 10.2257 10.1588C9.31903 11.0813 8.86567 12.195 8.86567 13.5C8.86567 14.805 9.31903 15.9188 10.2257 16.8413C11.1325 17.7638 12.2463 18.225 13.5672 18.225Z" fill="#F5F5F5"/>
				</svg>
			</div>	
		</div>	
		<div class="flex flex-col w-full lg:gap-[90px] xl:gap-y-[120px] 2xl:gap-y-[132px] px-[1em] sm:px-[2em] lg:px-[100px] xl:px-[130px] 2xl:px-[190px] gap-[100px] justify-between">
			<div class="flex lg:flex-row flex-col w-full">
				<div class="h-full w-full lg:w-[45%] flex items-start pt-[3em] lg:pt-[100px] xl:pt-[130px] 2xl:pt-[170px]">
					<nav class="flex flex-col site-navigation site-mobile-navigation justify-between items-center">           
					<?php if (get_field('header_mobile_menu', 'option')): ?>		
							<?php
							wp_nav_menu(
								array(
									'menu' => get_field('header_mobile_menu', 'option'),
									'theme_location' => 'menu-primary',
									'container'      => false,
									'menu_class'     => 'flex flex-col font-primary text-[40px] sm:text-[65px] xl:text-[80px] 2xl:text-[95px] tracking-[1.9px] leading-[1.15] uppercase text-white transition-all ease-in-out duration-300 gap-[40px] xl:gap-[50px] 2xl:gap-y-[60px] w-full',
								)
							);
							?>	
						<?php endif; ?>					
					</nav>
				</div>
				<div class="h-full w-full lg:w-[55%] hidden lg:flex items-start">
				<?php $logo = get_field('media_image', 'option');
				if(!empty($logo)): 
					echo wp_get_attachment_image(
							$logo['ID'],
							'full',
							false,
							array(
								'class' => 'w-full h-fit object-cover h-full',
								'alt' => esc_attr($logo['alt'])             
							)
						);
					endif; ?>
				</div>
			</div>	
			<div class="w-full">
				<div class="bg-tertiary w-full h-[2px]"></div>
				<div class="flex md:flex-row flex-col md:gap-y-0 gap-y-[22px] justify-between mt-[22px]">
				   <?php $phone = get_field('phone', 'option'); 
				   if ($phone) :
                        $url = $phone['url'];
                        $title = $phone['title'];
                        $target = $phone['target'] ? $phone['target'] : '_self';  ?>                        
                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="text-[#808285] text-[18px] font-text hover:text-white no-underline">
                            <?php echo esc_html($title); ?>
                        </a>    
                    <?php endif; ?>
					<?php
					$socials_header = get_field('header_socials', 'option'); 
                if ($socials_header) { 	?>
                        <div class="flex gap-[20px] flex-row items-center">
                        <?php foreach ($socials_header as $column): 
                        $icon = $column['icon_svg']; 
                        $link = $column['social_link']; ?>
                            <?php 
                            if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                <a tabindex="0" class="social-header transition-all ease-in-out duration-300 translate-y-0 hover:-translate-y-3" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
                                <?php if($icon): echo $icon;  endif; ?>     
                                </a>
                            <?php endif; ?>
                         <?php endforeach; ?>  
                        </div>
                <?php 
                }  ?>
				</div>
			</div>
		</div>			 
     </div>
 </div>