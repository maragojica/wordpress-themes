<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eventage
 */

?>

<footer id="colophon" class="site-footer bg-black pt-[3em] pb-[3em] md:pt-[75px] md:pb-[43px]">
    <div class="container mx-auto">
    <div class="flex items-center lg:items-start flex-col lg:flex-row gap-[2em] lg:gap-[5em] 2xl:gap-[12em] justify-between animate__animated" data-animation="fadeIn" data-duration="1.2s">
      <div class="footer-l lg:w-auto w-full">
        <?php
            $logo = get_field('branding', 'option')['footer_logo'];
            if ($logo) { ?>
            <a tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
            <?php	$logo_url = $logo['url'];
                $logo_mime_type = $logo['mime_type'];
                if ($logo_url) { ?>
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="mx-auto lg:ml-0 h-auto max-w-[250px] xl:max-w-[292px] w-fit object-contain object-center skip-lazy"/>						
                    
            <?php } ?>
                </a>
            <?php } ?>          
      </div>
      <div class="flex flex-col md:flex-row gap-y-[3em] lg:gap-x-[4em] xl:gap-x-[112px] footer-r">
          <div class="flex md:items-start items-center flex-col gap-y-[20px] md:w-1/3 lg:min-w-fit">
              <?php $title_footer = get_field('title_footer_menu', 'option');
                if($title_footer): ?>
                    <div class="text-white font-secondary text-[16px] lg:text-[18px] font-[800] tracking-[0.9px] md:text-left text-center uppercase"><?php echo $title_footer; ?></div>
                <?php endif; ?>
                <!-- Primary Footer Navigation -->
                <nav id="footer-primary" class="footer-nav footer-navigation w-full">	
                        <?php
                        wp_nav_menu(array(
                            'menu' => get_field('footer_menu', 'option'),
                            'theme_location' => 'footer',
                            'container'      => false,
                            'menu_class'     => 'flex flex-col text-white justify-center info-text gap-[10px] text-center md:text-left',		                            
                        ));
                        ?>
                </nav>	
              </div>   
              <div class="flex md:items-start items-center flex-col gap-y-[20px] md:w-1/3 lg:min-w-fit">      
              <?php $title_contact = get_field('footer_contact_title', 'option');
                if($title_contact): ?>
                    <div class="text-white font-secondary text-[16px] lg:text-[18px] font-[800] tracking-[0.9px] xl:text-left text-center uppercase"><?php echo $title_contact; ?></div>
                <?php endif; ?>    
                <?php if (have_rows('footer_contacts', 'option')) : ?>
                    <div class="flex lg:items-start items-center flex-col gap-y-[15px]">
                    <?php while (have_rows('footer_contacts', 'option')) : the_row();  $contact_info = get_sub_field('contact_info'); ?>                   
                       <?php  if($contact_info):?>
                        <div class="info-text text-white text-center md:text-left"><?php echo $contact_info;?></div>
                        <?php endif; ?>     
                    <?php endwhile; ?>	
                    </div> 
                <?php endif; ?> 
              <?php  $social_links_footer = get_field('social_links_footer', 'option'); 
                if ($social_links_footer) { 	?>
                        <div class="flex gap-[20px] flex-row items-center">
                        <?php foreach ($social_links_footer as $column): 
                        $icon = $column['svg_code']; 
                        $link = $column['link']; ?>
                            <?php 
                            if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                <a tabindex="0" class="social-footer transition-all ease-in-out duration-300 translate-y-0 hover:-translate-y-3" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
                                <?php if($icon): echo $icon;  endif; ?>     
                                </a>
                            <?php endif; ?>
                         <?php endforeach; ?>  
                        </div>
                <?php 
                }  ?>
             </div> 
             <div class="flex md:items-start items-center flex-col gap-y-[20px] md:w-1/3 lg:w-auto">      
              <?php $title_contact = get_field('newsletter_title', 'option');
                if($title_contact): ?>
                    <div class="text-white font-secondary text-[16px] lg:text-[18px] font-[800] tracking-[0.9px] xl:text-left text-center uppercase"><?php echo $title_contact; ?></div>
                <?php endif; ?>  
                <?php $newsletter_text = get_field('newsletter_text', 'option'); 
                 if($newsletter_text):?>
                    <div class="info-text text-white text-center md:text-left"><?php echo $newsletter_text;?></div>
                <?php endif; ?> 
                <div class="newsletter-form">
                <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
                </div>                  
             </div> 
        </div>       
      </div>   
      <div class="w-full">        
           <div class="line-border mt-[3em] lg:mt-[100px] mb-[36px] bg-white w-full h-[0.5px]"></div>        
        </div>	
		<?php if(get_field('footer_copyright', 'option')): ?>
            <p class="w-full text-center text-white info-text flex flex-col md:inline-block copyright info-copyright">&#169; <?php echo date_i18n( 'Y' ).' '.get_bloginfo( 'name' ).' '.get_field('footer_copyright', 'option'); ?></p>
        <?php endif; ?> 
    </div>    
    </div>
   
</footer><!-- #colophon -->

