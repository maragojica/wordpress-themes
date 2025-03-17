<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package connecting-elements
 */

?>

<footer id="colophon" class="site-footer bg-secondary rounded-tl-[50px] rounded-tr-[50px] p-[2em] lg:p-[80px] xl:p-[90px] 4k:p-[116px] lg:mt-[88px] mt-[3em]">
    <div class="flex items-center xl:items-start flex-col xl:flex-row gap-[2em] lg:gap-[50px] 2xl:gap-[8em] justify-between animate__animated" data-animation="fadeIn" data-duration="1.2s">
      <div class="footer-l xl:w-auto w-full">
        <?php
            $logo = get_field('branding', 'option')['footer_logo'];
            if ($logo) { ?>
            <a tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
            <?php	$logo_url = $logo['url'];
                $logo_mime_type = $logo['mime_type'];
                if ($logo_url) { ?>
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="mx-auto xl:ml-0 h-auto xs:max-w-[80%] lg:max-w-[255px] 2xl:max-w-[412px] w-fit object-contain object-center skip-lazy"/>						
                    
            <?php } ?>
                </a>
            <?php } ?>
          
            <?php $title_footer = get_field('footer_title', 'option');
            if($title_footer): ?>
                <div class="text-white mt-[32px] font-text-font text-[18px] 2xl:text-[22px] font-[800] xl:text-left text-center"><?php echo $title_footer; ?></div>
            <?php endif; ?>
            <?php if (have_rows('socials', 'option')) : ?>
                <div class="flex gap-[30px] flex-row items-center xl:justify-start justify-center pt-[30px] md:pt-[2em]">
                <?php while (have_rows('socials', 'option')) : the_row();  
                        $icon = get_sub_field('icon');
                        $link = get_sub_field('social_link'); ?>
                            <?php 
                            if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                <a tabindex="0" class="social transition-all ease-in-out duration-300 translate-y-0 hover:-translate-y-3" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
                                <?php echo wp_get_attachment_image($icon['ID'], 'full', false, array('class' => 'icon max-w-[40px] 2xl:max-w-fit')); ?>        
                                </a>
                            <?php endif; ?>
                         <?php endwhile; ?>	
             </div>          
            <?php endif; ?>   
            <?php $footer_cta = get_field('footer_cta', 'option');
			if ($footer_cta) :
				$url = $footer_cta['url'];
				$title = $footer_cta['title'];
				$target = $footer_cta['target'] ? $footer_cta['target'] : '_self'; ?>
				<div class="xl:mt-[60px] mt-[2em] flex xl:justify-start justify-center"><a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="max-w-fit min-w-min btn btn_teal btn_footer text-[14px] 2xl:text-[16px]">
				<?php echo esc_html( $title ); ?>
				</a></div>
			<?php endif; ?>  
      </div>
      <div class="flex flex-col gap-y-[1em] lg:gap-y-[48px] footer-r">
        <div class="flex lg:items-start items-center flex-col lg:flex-row gap-[2em] lg:gap-[40px] 2xl:gap-[4em]">
            <?php if (get_field('footer_menu_1', 'option')): ?>
                        <div class="flex flex-col grow justify-center gap-[4px] lg:text-left text-center w-full lg:w-fit items-center lg:items-start">  
                            <?php $title_footer_1 =  get_field('title_footer_menu_1', 'option'); 
                            if($title_footer_1):?>
                            <div class="font-primary-font text-primary uppercase text-[18px] 2x:text-[20px] font-bold tracking-[1.8px]"><?php echo $title_footer_1;?></div>
                            <?php endif; ?>
                    
                    <!-- Primary Footer Navigation -->
                    <nav id="footer-primary" class="footer-nav footer-navigation w-full">	
                            <?php
                            wp_nav_menu(array(
                                'menu' => get_field('footer_menu_1', 'option'),
                                'theme_location' => 'menu-footer-1',
                                'container'      => false,
                                'menu_class'     => 'flex flex-col justify-center gap:[28px] text-center lg:text-left',		
                                'walker' => new Tailwind_Walker_Nav_Menu(),				
                                
                            ));
                            ?>
                        </nav>	
                     </div>          
                <?php endif; ?>  
                <?php if (get_field('footer_menu_2', 'option')): ?>
                        <div class="flex flex-col grow justify-center gap-[4px] lg:text-left text-center w-full lg:w-fit items-center lg:items-start">  
                            <?php $title_footer_1 =  get_field('title_footer_menu_2', 'option'); 
                            if($title_footer_1):?>
                            <div class="font-primary-font text-primary uppercase text-[18px] 2x:text-[20px] font-bold tracking-[1.8px]"><?php echo $title_footer_1;?></div>
                            <?php endif; ?>
                    
                    <!-- Primary Footer Navigation -->
                    <nav id="footer-primary" class="footer-nav footer-navigation w-full">	
                            <?php
                            wp_nav_menu(array(
                                'menu' => get_field('footer_menu_2', 'option'),
                                'theme_location' => 'menu-footer-2',
                                'container'      => false,
                                'menu_class'     => 'flex flex-col justify-center gap:[28px] text-center lg:text-left',		
                                'walker' => new Tailwind_Walker_Nav_Menu(),				
                                
                            ));
                            ?>
                        </nav>	
                        </div>             
                <?php endif; ?>  
                <?php if (have_rows('footer_locations', 'option')) : ?>
                    <?php while (have_rows('footer_locations', 'option')) : the_row();  $location_name = get_sub_field('location_name'); ?>
                    <div class="flex flex-col grow justify-center gap-[4px] lg:text-left text-center w-full lg:w-fit items-center lg:items-start">  
                       <?php  if($location_name):?>
                        <div class="font-primary-font text-primary uppercase text-[18px] 2x:text-[20px] font-bold tracking-[1.8px] mb-[15px]"><?php echo $location_name;?></div>
                        <?php endif; ?>
                        <?php if (have_rows('location_info')) : ?>
                            <?php while (have_rows('location_info')) : the_row();  $title = get_sub_field('tilte'); $text = get_sub_field('text'); ?>
                                <div class="mb-[15px]">
                                    <?php if($title): ?>
                                        <div class="text-primary font-primary-font text-[18px] font-bold"><?php echo $title;?></div>
                                    <?php endif; ?>   
                                    <?php if($text): ?>
                                        <div class="text-white font-primary-font text-[18px] font-bold content-footer"><?php echo $text;?></div>
                                    <?php endif; ?>  
                                </div>
                            <?php endwhile; ?>	
                         <?php endif; ?>	
                    </div>   
                    <?php endwhile; ?>	
                <?php endif; ?> 
        </div>
        <?php if(get_field('footer_copyright', 'option')): ?>
            <p class="text-primary font-primary-font text-[14px] font-medium tracking-[0.42px] flex flex-col lg:inline-block xl:pl-[113px] 2xl:pl-[153px] xl:text-left text-center copyright info-copyright">&#169; <?php echo date_i18n( 'Y' ).' '.get_bloginfo( 'name' ).' '.get_field('footer_copyright', 'option'); ?></p>
        <?php endif; ?>   
      </div>
       
    </div>
</footer><!-- #colophon -->
