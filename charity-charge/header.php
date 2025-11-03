<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Charity_Charge
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	
	
	<!-- Facebook Pixel Code -->
	<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','https://connect.facebook.net/en_US/fbevents.js');

		fbq('init', '417262225137534');
		fbq('track', "PageView");
	</script>
	<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=417262225137534&ev=PageView&noscript=1"/></noscript>
	<!-- End Facebook Pixel Code -->
	
<!-- Twitter universal website tag code -->
	<script>
		!function(e,n,u,a){e.twq||(a=e.twq=function(){a.exe?a.exe.apply(a,arguments):
		a.queue.push(arguments);},a.version='1',a.queue=[],t=n.createElement(u),
		t.async=!0,t.src='//static.ads-twitter.com/uwt.js',s=n.getElementsByTagName(u)[0],
		s.parentNode.insertBefore(t,s))}(window,document,'script');
		// Insert Twitter Pixel ID and Standard Event data below
		twq('init','nv35d');
		twq('track','PageView');
	</script>
<!-- End Twitter universal website tag code -->
	
<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PX3N95T');</script>
<!-- End Google Tag Manager -->

<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PX3N95T" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
		</svg>
	</div>
	<div id="top-banner" class="top-banner" role="topbanner">
    <div class="container">
        <div class="banner-wrapper">
            <div class="banner-content">
				<?php if(get_field('contact_email', 'option') || get_field('contact_phone', 'option')): ?>
                   <div class="d-flex align-items-center">
					<?php if(get_field('contact_email', 'option')): ?>
					 <!-- Email Contact -->
                    <div class="contact-item d-flex align-items-center me-4">
                        <!-- Email SVG Icon -->
                        <svg class="contact-icon me-2" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="mailto:<?php echo get_field('contact_email', 'option') ?: 'info@yoursite.com'; ?>" class="contact-link">
                            <?php echo get_field('contact_email', 'option') ?: 'info@yoursite.com'; ?>
                        </a>
                    </div>
                    <?php endif; ?>
					<?php if(get_field('contact_phone', 'option')): ?>
                    <!-- Phone Contact -->
                    <div class="contact-item d-flex align-items-center me-4">
                        <!-- Phone SVG Icon -->
                        <svg class="contact-icon me-2" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 16.92V19.92C22.0011 20.1985 21.9441 20.4742 21.8325 20.7293C21.7209 20.9845 21.5573 21.2136 21.3521 21.4019C21.1468 21.5901 20.9046 21.7335 20.6407 21.8227C20.3769 21.9119 20.0974 21.9451 19.82 21.92C16.7428 21.5856 13.787 20.5341 11.19 18.85C8.77382 17.3147 6.72533 15.2662 5.18999 12.85C3.49997 10.2412 2.44824 7.271 2.11999 4.18C2.095 3.90347 2.12787 3.62476 2.21649 3.36162C2.30511 3.09849 2.44756 2.85669 2.63476 2.65162C2.82196 2.44655 3.0498 2.28271 3.30379 2.17052C3.55777 2.05833 3.83233 2.00026 4.10999 2H7.10999C7.59531 1.99522 8.06579 2.16708 8.43376 2.48353C8.80173 2.79999 9.04207 3.23945 9.10999 3.72C9.23662 4.68007 9.47144 5.62273 9.80999 6.53C9.94454 6.88792 9.97366 7.27691 9.8939 7.65088C9.81415 8.02485 9.62886 8.36811 9.35999 8.64L8.08999 9.91C9.51355 12.4135 11.5865 14.4864 14.09 15.91L15.36 14.64C15.6319 14.3711 15.9751 14.1858 16.3491 14.1061C16.7231 14.0263 17.1121 14.0555 17.47 14.19C18.3773 14.5286 19.3199 14.7634 20.28 14.89C20.7658 14.9585 21.2094 15.2032 21.5265 15.5775C21.8437 15.9518 22.0122 16.4296 22 16.92Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="tel:<?php echo get_field('contact_phone', 'option') ?: '+1234567890'; ?>" class="contact-link">
                            <?php echo get_field('contact_phone', 'option') ?: '(123) 456-7890'; ?>
                        </a>
                    </div>
					<?php endif; ?>
				   </div>
                    <?php endif; ?>
                    <!-- Banner Message -->
                    <div class="banner-message">
                        <?php echo get_field('top_banner_message', 'option') ?: 'Discover our flagship product. The Nonprofit Credit Card.'; ?>
                    </div>
                </div>
            
            <!-- Close Button -->
            <button class="banner-close" id="close-banner" aria-label="Close banner" type="button">
                <span class="close-x">
					<svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M2.64844 0.625L5.0625 4.77344L7.47656 0.625H9.73438L6.29688 6.25781L9.82031 12H7.53906L5.0625 7.77344L2.58594 12H0.296875L3.82812 6.25781L0.382812 0.625H2.64844Z" fill="white"/>
					</svg>

				</span>
            </button>
        </div>
    </div>
</div>
	<header id="masthead" class="site-header main-navigation">
		<div class="main-header">
			<div class="container">
				<div class="row middle-xs">
					<div class="col-xs-12 col-main-nav desktop">
						<div class="site-branding">
							<?php
							$branding = get_field('branding', 'option');
							$use_svg_logo = $branding['use_svg_logo'] ?? false;
							if ($use_svg_logo) {
								$svg_code_logo = $branding['svg_logo'] ?? '';
								if ($svg_code_logo) { ?>
									<a class="logo-link" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
										<?php echo $svg_code_logo; ?>
									</a>
								<?php }
							} else {
								$logo = $branding['desktop_colored_logo'] ?? null;
								if ($logo) {
									$logo_url = $logo['url'] ?? '';
									$logo_mime_type = $logo['mime_type'] ?? '';
									if ($logo_url) {
										if ($logo_mime_type == 'image/svg+xml') {
											echo file_get_contents($logo_url);
										} else { ?>
											<a class="logo-link" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
												<img class="logo" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="250" height="59"/>
											</a>
										<?php }
									}
								}
							}
							?>
						</div><!-- .site-branding -->
						<div class="desktop-nav">
							<?php if (get_field('header_desktop_menu', 'option')): ?>
								<!-- Main Navigation -->
								<nav id="site-navigation" class="main-navigation">
									<?php
									wp_nav_menu(array(
										'menu' => get_field('header_desktop_menu', 'option'),
										'theme_location' => 'menu-primary',
										'container'      => false,
										'menu_id'        => 'primary-menu',
									));
									?>
								</nav>
							<?php endif; ?>
						</div>
						<!-- Header CTA -->
						<?php $header_cta = get_field('header_cta', 'option');
						if ($header_cta): ?>
							<div class="d-flex flex-row align-items-center gap-4 justify-content-end">
								<?php
								$link_url = $header_cta['url'] ?? '';
								$link_title = $header_cta['title'] ?? '';
								$link_target = $header_cta['target'] ?? '_self';
								if ($link_url && $link_title): ?>
									<div class="cta-btn">
										<a tabindex="0" class="button small primary" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" aria-label="<?php echo esc_html($link_title); ?>" title="<?php echo esc_html($link_title); ?>">
										 <?php echo esc_html($link_title); ?>
										</a>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="mobile">
					<div class="mobile-logo">
						<?php
						$mobile_logo = $branding['mobile_colored_logo'] ?? null;
						if ($use_svg_logo) {
								$svg_code_logo = $branding['svg_logo'] ?? '';
								if ($svg_code_logo) { ?>
									<a class="logo-link" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
										<?php echo $svg_code_logo; ?>
									</a>
								<?php }
							} else {
								$logo = $branding['mobile_colored_logo'] ?? null;
								if ($logo) {
									$logo_url = $logo['url'] ?? '';
									$logo_mime_type = $logo['mime_type'] ?? '';
									if ($logo_url) {
										if ($logo_mime_type == 'image/svg+xml') {
											echo file_get_contents($logo_url);
										} else { ?>
											<a class="logo-link" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
												<img class="logo" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="170" height="40"/>
											</a>
										<?php }
									}
								}
							}
						?>
					</div>
					<div class="box-header-mobile">
						<div id="responsive-menu">
							<div class="menu-overlay menu-close"></div>
							<div id="menu-button"><span></span><span></span><span></span><span></span></div>
							<div class="responsive-menu-interior pt-5">
								<?php if (get_field('header_mobile_menu', 'option')): ?>
									<?php
									wp_nav_menu(array(
										'menu' => get_field('header_mobile_menu', 'option'),
										'theme_location' => 'mobile',
										'menu_class'     => 'responsive-menu-items container mx-auto',
										'menu_id'        => 'responsive-menu-items',
										'container'      => false,
									));
									?>
								<?php endif; ?>
								<div class="container px-0">
								<!-- Header CTA Mobile-->
								<?php $header_cta = get_field('header_cta', 'option');
								if ($header_cta): ?>
									<div class="d-flex flex-row align-items-center gap-4 justify-content-center mt-4 pt-4 w-100">
										<?php
										$link_url = $header_cta['url'] ?? '';
										$link_title = $header_cta['title'] ?? '';
										$link_target = $header_cta['target'] ?? '_self';
										if ($link_url && $link_title): ?>
											<div class="cta-btn w-100">
												<a tabindex="0" class="button large primary w-100" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" aria-label="<?php echo esc_html($link_title); ?>" title="<?php echo esc_html($link_title); ?>">
												<?php echo esc_html($link_title); ?>
												</a>
											</div>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
