<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Spangler_Restoration
 */

get_header();
$heading = get_field('404_headline', 'option');
$description = get_field('404_text', 'option');
$buttons = get_field('buttons_404', 'option');
?>

	<section id="primary">
		<main id="main">
		<section class="default-content-section max-w-full h-[23em] lg:h-[30em] xl:h-[700px] relative">
	<div class="overlay flex flex-col h-full w-full justify-end items-start bg-[#00194C] text-left absolute z-[2] top-0 left-0 padding-small">
		<div class="container mx-auto"> 
				<div class="relative">
                <?php if ($heading) : ?>                 
                    <h1 class="text-white uppercase" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50">
                        <?php echo $heading; ?>
                    </h1>           
                <?php endif; ?>            
                <?php if($description): ?>
                        <div class="text-white text-sub-medium style-disc lg:max-w-[75%] 2xl:max-w-[80%] <?php if($alignment_hori == 'middle'): ?> mx-auto <?php endif; ?>" data-aos="fade-up" data-aos-offset="200" data-aos-delay="60">                 
                            <?php echo $description; ?>                   
                        </div>
                <?php endif; ?> 
            
            <?php if ($buttons) : ?>
                    <div class="flex flex-wrap <?php if($alignment_hori == 'middle'){ ?>justify-center <?php }else{ ?> justify-start <?php } ?> gap-4 mt-5 lg:mt-10" data-aos="fade-up" data-aos-offset="200" data-aos-delay="70">
                        <?php foreach ($buttons as $button) : ?>
                            <?php 
                            $button_link = $button['button'];
                            $button_style = $button['button_style'];
                            if ($button_link) :
                                $url = $button_link['url'];
                                $title = $button_link['title'];
                                $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                <div class="relative group">
                                <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="btn <?php if($button_style): echo $button_style; endif;?>">
                                    <?php echo esc_html($title); ?>
                                </a>     
                                
                            </div>            
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>   
		        </div> 
			</div>
		</div>
</section>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
