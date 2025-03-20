<?php
$content_block = get_field('cta_banner');
if ($content_block) {
    
    $heading = $content_block['heading'];      
    $description = $content_block['description']; 
    $bg_overlay = $content_block['bg_overlay'];    
    $image = $content_block['bg_image'];   
    $image_mobile = $content_block['bg_image_mobile'];    
    $buttons = $content_block['buttons'];  

    $add_top_shape = $content_block['add_top_shape'];    

    $add_social_links = $content_block['add_social_links'];   
       
    $alignment = $content_block['vertical_alignment'];    
    $alignment_hori = $content_block['horizontal_alignment'];  

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';


    //Spacing Settings
    $spacing = $content_block['spacing'];
    $spacing_top_desktop = $content_block['spacing_top_desktop'];
    $spacing_bottom_desktop = $content_block['spacing_bottom_desktop'];
    $spacing_top_mobile = $content_block['spacing_top_mobile'];
    $spacing_bottom_mobile = $content_block['spacing_bottom_mobile'];

    $spacing_class = '';
    switch ($spacing) {
        case 'small':
            $spacing_class = 'padding-small';
            break;
        case 'medium':
            $spacing_class = 'padding-medium';
            break;
        case 'large':
            $spacing_class = 'padding-large';
            break;
    }    

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;

    //Container Settings

    $container_classes = 'flex flex-col h-full w-full ' . ($alignment === 'middle' ? 'justify-center' : ($alignment === 'bottom' ? 'justify-end' : ($alignment === 'top' ? 'justify-start' : 'justify-around'))) . ($alignment_hori === 'middle' ? 'items-center text-center' : ($alignment_hori === 'right' ? ' items-end text-left' : ($alignment_hori === 'left' ? ' items-start text-left' : ' items-stretch items-center')));
?>

<section class="cta-banner-section z-[3] max-w-full h-auto relative bg-cover bg-center bg-fixed bg-no-repeat <?php if($add_top_shape): ?> top-shape-l<?php endif;?>  <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?> <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?>>
               
    <div class="overlay h-full w-full justify-center <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php if( $bg_overlay): ?> style="background-color: <?php echo $bg_overlay; ?>" <?php endif; ?>>
         <div class="container mx-auto"> 
             <div class="<?php echo esc_attr($container_classes); ?>">
             <div class="w-full md:w-3/5 xl:w-[61%] mx-auto text-center">
                  <?php if ($heading) : ?>
                        <h2 class="text-white mb-0 animate__animated" data-animation="fadeIn" data-duration="1.2s">
                            <?php echo $heading; ?>
                        </h2> 
                    <?php endif; ?>                     
                    <?php if($description): ?>
                    <div class="text-white mt-[0.5em] style-disc animate__animated" data-animation="fadeIn" data-duration="1.1s" >                 
                        <?php echo $description; ?>                   
                    </div>
                    <?php endif; ?>        
                    <?php if ($buttons) : ?>
                    <div class="flex flex-wrap justify-center gap-4 mt-[35px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
                        <?php foreach ($buttons as $button) : ?>
                            <?php 
                            $button_link = $button['button'];
                            $button_style = $button['button_style'];
                            $button_type = $button['button_type'];
                            if ($button_link) :
                                $url = $button_link['url'];
                                $title = $button_link['title'];
                                $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                <div class="relative group bottom-shape-btn-<?php echo $button_type;?>">
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min bottom-shape-btn btn <?php if($button_style): echo $button_style; endif;?>">
                                        <span class="bottom-shape-btn-<?php echo $button_type;?>"><?php echo esc_html($title); ?></span> 
                                    </a>  
                                </div>            
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>   
                <?php
                   if($add_social_links):
                     $social_links = $content_block['social_links'];?>
								<div class="flex gap-[16px] flex-row items-center justify-center mt-[20px]">
									 <?php foreach ($social_links as $social) : ?>
											<?php $icon = $social['svg_code']; 
											$link = $social['link']; 
											if( $link ):
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self'; ?>
												<a tabindex="0" class="social transition-transform" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
													<?php if($icon): echo $icon; endif; ?>
												</a>
											<?php endif; ?>
                                 <?php endforeach; ?>
								</div>
						   <?php 
					 endif; ?>
            </div> 
             </div>            
         </div>
   </div>   
</section>
<?php
 if(!empty($image_mobile)): ?>
    <style>
        @media (max-width: 575.98px) {
            .cta-banner-section{
                background-image: url(<?php echo esc_url($image_mobile['url']); ?>) !important;
            }
         }
    </style>
<?php endif; ?>    
<?php }
?>

