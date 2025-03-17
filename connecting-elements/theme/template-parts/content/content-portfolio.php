<?php
/**
 * Template part for displaying single portfolios
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package connecting-elements
 */
wp_enqueue_style('uikit-css', get_template_directory_uri() . '/css/uikit.css', array(), CONNECTING_ELEMENTS_VERSION); 
wp_enqueue_script('uikit-js', get_template_directory_uri() . '/js/uikit.min.js', array('jquery'), CONNECTING_ELEMENTS_VERSION, true);
wp_enqueue_script('uikit-icons-js', get_template_directory_uri() . '/js/uikit-icons.min.js', array('jquery'), CONNECTING_ELEMENTS_VERSION, true);
$title = get_the_title(); 
$id = get_the_id(); 
$featured_img_url = get_the_post_thumbnail_url($id,'full'); 
$citystate = get_field('citystate', $id);
$description = get_field('description', $id);
$portfolio_slider = get_field('portfolio_slider', $id);   
$buttons = get_field('buttons', $id);  
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section class="hero-default-section max-w-full h-[13em] xl:h-[344px] relative rounded-[0px_0px_50px_50px] bg-primary">
    
    <div class="overlay flex flex-col h-full w-full justify-end items-start text-left absolute z-[2] top-0 left-0">
     <div class="w-full mx-auto">       
        <?php if ($title) : ?>
            <h1 class="text-secondary max-w-fit bg-white rounded-tr-[50px] pt-[35px] lg:pt-[40px] pl-[20px] pr-[1.5em] lg:pr-[80px] -mb-[1px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <?php echo $title; ?>
            </h1>
        <?php endif; ?>       
         </div>
   </div>
</section>

<section class="flex flex-col lg:flex-row items-start lg:gap-[60px] gap-[23px] padding-small">
<div class="container mx-auto">
                        
    <?php if($citystate):?><h3 class="text-primary mt-[10px] mb-3"><?php echo $citystate; ?></h3><?php endif; ?>
    <?php if($description): ?>
    <div class="font-text-font text-foreground style-disc mt-[10px] mb-3" >                 
        <?php echo $description; ?>                   
    </div>
    <?php endif; ?> 
    <?php if($portfolio_slider){ ?>
        <div class="slide-portfolio slide-view">             
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
                    <div class="uk-position-relative">
                        <div class="uk-slider-container uk-light">
                            <div id="info-slide" class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m" uk-switcher="connect: #content-slide; animation: uk-animation-fade">
                            <?php foreach( $portfolio_slider as $image ): 
                                $srcset = wp_get_attachment_image_srcset($image['ID']);
                                $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>
                                <div>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="90" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                                     
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="uk-hidden@s uk-light">
                            <a class="uk-position-center-left uk-position-small" href uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-position-center-right uk-position-small" href uk-slidenav-next uk-slider-item="next"></a>
                        </div>

                        <div class="uk-visible@s">
                            <a class="uk-position-center-left-out uk-position-small" href uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-position-center-right-out uk-position-small" href uk-slidenav-next uk-slider-item="next"></a>
                        </div>
                    </div>
                
                </div>
                <div id="content-slide" class="uk-switcher" uk-lightbox="animation: fade">
                    <?php foreach( $portfolio_slider as $image ): 
                        $srcset = wp_get_attachment_image_srcset($image['ID']);
                        $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>
                    <div> 
                        <a class="uk-inline" href="<?php echo esc_url($image['url']); ?>" >
                            <img src="<?php echo esc_url($image['url']); ?>" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" height="392" alt="<?php echo esc_attr($image['alt']); ?>"> 
                        </a>
                    </div>
                    <?php endforeach; ?>                           
                </div>
            </div>   

    <?php }else{ ?>
        <?php echo get_the_post_thumbnail($id, 'full', ['class' => 'w-full h-fit object-cover object-center']); ?>
        <?php } ?>    
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
</section>   
</article><!-- #post-${ID} -->
