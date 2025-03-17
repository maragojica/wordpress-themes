<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Nordic_IT
 */

get_header();
$img = get_field('404_bg_image', 'option');
$bg_color = get_field('404_bg_color', 'option');
$heading = get_field('404_headline', 'option');
$subheading = get_field('404_subheadline', 'option');
$description = get_field('404_text', 'option');
$buttons = get_field('buttons_404', 'option');
$shape_image = get_field('shape_404', 'option');
?>

	<section id="primary">
		<main id="main">

        <section class="error-404 not-found 404-section max-w-full lg:h-fit relative custom-green-gradient-inner padding-large lg:pb-0 pb-0-important">
    <?php if(!empty($shape_image)): 
         echo wp_get_attachment_image(
            $shape_image['ID'],
            'full',
            false,
            array(
                'class' => 'absolute right-0 top-0 h-[250px] 2xl:h-[376px] object-contain invisible lg:visible',
                'alt' => esc_attr($shape_image['alt']),
            )
        );
     endif; ?>    
   <div class="container relative z-2 mx-auto h-full">
   <div class="relative h-full bg-cover bg-center bg-no-repeat sm:bg-fixed" style="background-image: url(<?php echo esc_url($img['url']); ?>)">
       <div class="overlay text-center flex flex-col items-center justify-center h-full w-full pt-[120px] py-[120px] lg:px-0 px-[1em]" style="background-color: <?php echo $bg_color; ?>">
       <?php if ($subheading) : ?>
            <h3 class="text-accent bodymedium animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <?php echo $subheading; ?>
            </h3>
        <?php endif; ?>
        <?php if ($heading) : ?>
            <h1 class="text-primary-dark mt[10px] animate__animated" data-animation="fadeIn" data-duration="1.3s">
                <?php echo $heading; ?>
            </h1>
        <?php endif; ?>

        <?php if ($description) : ?>
            <div class="bodymedium mt-[10px] font-text-font text-secondary-dark md:max-w[80%] lg:max-w-[75%] mx-auto animate__animated" data-animation="fadeIn" data-duration="1.4s">
                <?php echo $description; ?>
            </div>
        <?php endif; ?>

        <?php if ($buttons) : ?>
            <div class="flex flex-wrap gap-4 justify-center mt-8 animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <?php foreach ($buttons as $button) : ?>
                    <?php 
                    $button_link = $button['button'];
                    $button_style = $button['button_style'];
                    if ($button_link) :
                        $url = $button_link['url'];
                        $title = $button_link['title'];
                        $target = $button_link['target'] ? $button_link['target'] : '_self';
                    ?>
                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-full sm:min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                            <?php echo esc_html($title); ?>
                        </a>
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
