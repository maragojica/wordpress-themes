<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package connecting-elements
 */

get_header();
$image = get_field('404_bg_image', 'option');
$bg_color = get_field('404_bg_color', 'option');
$heading = get_field('404_headline', 'option');
$subheading = get_field('404_subheadline', 'option');
$description = get_field('404_text', 'option');
$buttons = get_field('buttons_404', 'option');
?>
		
<section class="hero-default-section max-w-full h-[13em] xl:h-[344px] relative rounded-[0px_0px_50px_50px] bg-cover bg-center bg-no-repeat" <?php if(!empty($image)){?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php }elseif($bg_color){ ?> style="background-color: <?php echo $bg_color;?>" <?php } ?>>    
	<div class="overlay flex flex-col h-full w-full justify-end items-start text-left absolute z-[2] top-0 left-0">
	<div class="w-full mx-auto">
	<?php if ($heading) : ?>
			<h1 class="text-secondary max-w-fit bg-white rounded-tr-[50px] pt-[35px] lg:pt-[40px] pl-[20px] pr-[1.5em] lg:pr-[80px] -mb-[1px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
			<?php echo $heading; ?>
			</h1>
	<?php endif; ?> 
	</div>
</div>
</section>
<section class="content-section max-w-full relative padding-small">
    <div class="container mx-auto">
        <div class="w-full bg-[rgba(182,184,186,0.10)] p-[22px] lg:p-[88px] lg:max-w-[90%] mx-auto rounded-tl-[50px] rounded-br-[50px] " >   
		    <?php if ($subheading) : ?>
                <h2 class="text-primary mb-3">
                    <?php echo $subheading; ?>
                </h2>
            <?php endif; ?>  
			<?php if ($description) : ?>
			<div class="font-text-font text-foreground mt-3 style-disc "  >                 
			<?php echo $description; ?>          
			</div>
			<?php endif; ?>  
			<?php if ($buttons) : ?>
                    <div class="w-full flex flex-wrap gap-4 justify-start mt-3 xl:mt-[50px]">
                        <?php foreach ($buttons as $button) : ?>
                            <?php 
                            $button_link = $button['button'];
                            $button_style = $button['button_style'];
                            if ($button_link) :
                                $url = $button_link['url'];
                                $title = $button_link['title'];
                                $target = $button_link['target'] ? $button_link['target'] : '_self';    ?>
                                <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                                    <?php echo esc_html($title); ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>   
        </div>
    </div>
<?php
get_footer();
