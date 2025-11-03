<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sphinx
 */

?>
<?php
$logo_white = get_field('branding', 'option')['desktop_white_logo'];
if ($logo_white) { ?>
<div class="header__logo-wrapper lg:inline hidden fixed top-[38px] left-[82px] z-[12] transition-all ease-in-out duration-300">
<a class="logo flex align-items-center white-logo transition-all ease-in-out duration-300" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
<?php	$logo_url = $logo_white['url'];
	$logo_mime_type = $logo_white['mime_type'];
	if ($logo_url) { ?>
		<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="logo-header-sec w-[100px] h-[45px] object-contain object-center transition-all ease-in-out duration-300 skip-lazy"/>						
		
<?php } ?>
	</a>
</div>
<?php } ?>	
<?php $cta_header = get_field('header_cta', 'option');
	if ($cta_header) :
		$url = $cta_header['url'];
		$title = $cta_header['title'];
		$target = $cta_header['target'] ? $cta_header['target'] : '_self'; ?>
		<div class="header__btn-wrapper lg:inline hidden fixed top-[32px] right-0 z-[10]">
		<a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="btn btn_large w-full btn_fill_action flex items-center justify-center  rounded-tr-none rounded-br-none"
			aria-label="<?php echo esc_attr($title); ?>"
			title="<?php echo esc_attr($title); ?>">
		<?php echo esc_html( $title ); ?>					
		</a>
	</div>
	<?php endif; ?> 
<header id="masthead" class="site-header z-[11] bg-transparent h-[70px] lg:h-screen lg:px-[8px] px-[12px] py-[8px] lg:py-0 w-full lg:w-[100px] fixed left-0 top-0 lg:pt-[33px] lg:pb-[33px] flex lg:flex-col items-center justify-between">
<div class="box-logo">	
<?php $use_svg_logo = get_field('branding', 'option')['use_svg_logo']; 
if($use_svg_logo){ 
	$desktop_svg_code_logo = get_field('branding', 'option')['use_svg_logo'];  		
	if ($desktop_svg_code_logo) { ?>
	<a class="logo flex align-items-center white-logo logo-header transition-all ease-in-out duration-300" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
	<?php echo $desktop_svg_code_logo;?>
	</a>
<?php } ?>		
<?php }else{ ?>	
	<?php
$logo = get_field('branding', 'option')['desktop_colored_logo'];
if ($logo) { ?>
<a class="logo flex align-items-center white-logo transition-all ease-in-out duration-300 lg:block hidden" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
<?php	$logo_url = $logo['url'];
	$logo_mime_type = $logo['mime_type'];
	if ($logo_url) { ?>
		<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="logo-header object-contain object-center transition-all ease-in-out duration-300 skip-lazy"/>						
		
<?php } ?>
	</a>
<?php } ?>	
	<?php
$logo_mobile = get_field('branding', 'option')['mobile_colored_logo'];
if ($logo_mobile) { ?>
<a class="logo flex align-items-center white-logo transition-all ease-in-out duration-300 lg:hidden block" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
<?php	$logo_url = $logo_mobile['url'];
	$logo_mime_type = $logo_mobile['mime_type'];
	if ($logo_url) { ?>
		<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="logo-header object-contain object-center transition-all ease-in-out duration-300 skip-lazy"/>						
		
<?php } ?>
	</a>
<?php } ?>	
<?php } ?>	
</div>	
<div class="box-menu">	
	<button id="mobile-menu-toggle" class="text-primary cursor-pointer group focus:outline-none lg:mt-0 mt-[8px]" aria-label="Open mobile menu" aria-controls="mobile-menu" aria-expanded="false">
		<div class="relative w-[56px] h-[56px] box-menu-icon flex flex-col items-center justify-center rounded-full transition-all ease-in-out duration-300">		
		<svg class="open-menu toggle-menu transition-all ease-in-out duration-300 absolute top-0 left-[15px] max-w-[56px] h-[56px]" xmlns="http://www.w3.org/2000/svg" width="26" height="19" viewBox="0 0 26 19" fill="none">
		<line x1="0.257656" y1="1.17859" x2="25.4948" y2="1.17859" stroke="#E39C33" stroke-width="2" class="group-hover:fill-white"/>
		<line x1="0.257656" y1="9.17859" x2="25.4948" y2="9.17859" stroke="#E39C33" stroke-width="2" class="group-hover:fill-white"/>
		<line x1="0.257656" y1="17.1786" x2="25.4948" y2="17.1786" stroke="#E39C33" stroke-width="2" class="group-hover:fill-white"/>
		</svg>		
		<svg class="close-menu transition-all ease-in-out duration-300 absolute top-0 left-[15px] max-w-[56px] h-[56px]" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
		<line class="group-hover:fill-white" x1="2.12132" y1="1.87868" x2="24.1213" y2="23.8787" stroke="#E39C33" stroke-width="2" stroke-linecap="round"/>
		<line class="group-hover:fill-white" x1="1.87868" y1="23.8787" x2="23.8787" y2="1.87868" stroke="#E39C33" stroke-width="2" stroke-linecap="round"/>
		</svg>
		</div>	
	</button>
</div>	
<div class="box-socials lg:block hidden">	
<?php
$socials_header = get_field('header_socials', 'option'); 
if ($socials_header) { 	?>
	<div class="flex gap-y-[20px] flex-col items-center">
	<?php foreach ($socials_header as $column): 
	$icon = $column['icon_svg']; 
	$link = $column['social_link']; ?>
		<?php 
		if( $link ):
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self'; ?>
			<a tabindex="0" class="social-header transition-all ease-in-out duration-300 translate-y-0 hover:translate-x-3 max-w-[22px] h-[22px]" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
			<?php if($icon): echo $icon;  endif; ?>     
			</a>
		<?php endif; ?>
		<?php endforeach; ?>  
	</div>
<?php 
}  ?>
</div>	
</header>
<!-- #masthead -->
 <!-- Mobile Off-Canvas Menu -->
 <div id="mobile-menu" class="fixed inset-0 bg-foreground text-white h-screen max-h-screen transform -translate-x-full transition-transform duration-900 z-[10] lg:left-0 lg:w-screen w-full" aria-hidden="true" aria-labelledby="mobile-menu-toggle" role="dialog">
	 <div class="mobile-menu-content h-full overflow-y-auto">
		<div class="internal-box relative flex flex-col w-full h-screen pt-[100px] lg:pt-[2em] pb-[2em] px-[2em] lg:pl-[130px] lg:pl-[160px] gap-[80px] justify-between">
			<div class="flex lg:flex-row flex-col w-full h-[85vh] lg:h-[90vh]">
				<div class="h-full w-full flex items-center">
					<nav id="mobileMenuItems" class="flex flex-col site-navigation site-mobile-navigation justify-center items-center w-full h-full" aria-label="<?php esc_attr_e( 'Mobile Menu', 'sphinx' ); ?>">           
					<?php if (get_field('header_desktop_menu', 'option')): ?>		
							<?php
							wp_nav_menu(
								array(
									'menu' => get_field('header_desktop_menu', 'option'),
									'theme_location' => 'menu-primary',
									'container'      => false,
									'menu_class'     => 'flex flex-col font-primary text-[35px] lg:text-[5em] lg:text-[7em] xl:text-[70px] font-bold leading-normal lg:leading-[0.9] lg:tracking-[-6.3px] uppercase text-white transition-all ease-in-out duration-300 gap-[10px] lg:gap-[15px] xl:gap-[25px] w-full transition-all ease-in-out duration-300',									
								)
							);
							?>	
						<?php endif; ?>					
					</nav>
				</div>			
			</div>	
			<div class="w-full h-[15vh] lg:h-[10vh] flex justify-end flex-col">
				<div class="bg-white opacity-[0.1] w-full h-[1px]"></div>
				<div class="flex lg:flex-row flex-col lg:gap-y-0 gap-y-[22px] justify-between mt-[22px]">
				   <?php $phone = get_field('header_cta', 'option'); 
				   if ($phone) :
                        $url = $phone['url'];
                        $title = $phone['title'];
                        $target = $phone['target'] ? $phone['target'] : '_self';  ?>                        
                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="btn btn_fill_action">
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
                                <a tabindex="0" class="social-header transition-all ease-in-out duration-300 translate-y-0 hover:-translate-y-3 max-w-[22px] h-[22px]" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
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
