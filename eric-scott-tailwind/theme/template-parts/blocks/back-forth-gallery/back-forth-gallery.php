<?php
$content_block = get_field('content_block_gallery');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];    
    $description = $content_block['description'];  
    $gallery_img = $content_block['gallery_img'];    
    $buttons = $content_block['buttons'];
    $add_bottom_divider = $content_block['add_bottom_divider'];
    
    $reverse_desktop = in_array('yes', $content_block['reverse_order_desktop']);
    $reverse_mobile = in_array('yes', $content_block['reverse_order_mobile']);
    $alignment = $content_block['vertical_alignment'];

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
       
 
    $container_classes = 'h-full flex flex-col lg:flex-row ' . ($reverse_desktop ? 'lg:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
    $heading_width = 'w-full lg:w-1/2'; 
    $content_width = 'w-full lg:w-1/2';      
    $btn_align = 'justify-start';
   
?>

<section class="back-foth-gallery-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>   
    <div class="container container-full-mv mx-auto">     
       <div class="<?php echo esc_attr($container_classes); ?> gap-y-[2em] lg:gap-y-0 lg:gap-x-[6em]">
          <div class="<?php echo esc_attr($heading_width); ?> px-[1.5rem] lg:px-0 animate__animated" data-animation="fadeIn" data-duration="1.5s">
            <?php if ($heading) : ?>
                <div class="relative">
                    <?php if( $subheading): ?>
                        <div class="text-secondary subheading font-secondary capitalize rotate--10.166 absolute -left-[1.2rem] md:-left-[34px] lg:-left-[51px] -top-[12px] xl:top-0 z-[1] animate__animated" data-animation="fadeIn" data-duration="1.3s"><?php echo $subheading; ?></div>
                    <?php endif; ?>
                    <h2 class="text-primary animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $heading; ?>
                    </h2>
                </div>               
                <?php endif; ?> 
                <?php if($description): ?>
                    <div class="text-secondary mt-[1.5em] style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                        <?php echo $description; ?>                   
                    </div>
                 <?php endif; ?> 
                   
                 <?php if ($buttons) : ?>
                        <div class="flex flex-wrap gap-4 <?php echo $btn_align;?> mt-6">
                            <?php foreach ($buttons as $button) : ?>
                                <?php 
                                $button_link = $button['button'];
                                $button_style = $button['button_style'];
                                if ($button_link) :
                                    $url = $button_link['url'];
                                    $title = $button_link['title'];
                                    $target = $button_link['target'] ? $button_link['target'] : '_self';
                                ?>
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min sm btn <?php if($button_style): echo $button_style; endif;?>">
                                        <?php echo esc_html($title); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                 <?php endif; ?>  
            </div>            
            <div class="<?php echo esc_attr($content_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s" >  
            <?php
                    if ($gallery_img) { 	?>
                       <div class="hidden lg:block">
                       <div class="grid-wrapper">
                            <?php								
                               foreach ($gallery_img as $column_img):  
                                  $galimage = $column_img['image'];  
                                  $galpattern = $column_img['pattern']; ?>
                                 <div class="<?php echo $galpattern['value']; ?>">		
                                <a class="w-100 h-100" tab-index="0" href="<?php echo esc_url($galimage['url']); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr($galimage['alt']); ?>" aria-label="<?php echo esc_attr($galimage['alt']); ?>" title="<?php echo esc_attr($galimage['alt']); ?>">
                                  <?php echo wp_get_attachment_image($galimage['ID'], 'full', false, array('class' => 'w-full h-full object-cover object-center transition-transform duration-1000 ease-in-out scale-100 hover:scale-125')); ?>  
                                </a>
                            </div>  
                         <?php endforeach; ?>   
                        </div>
                       </div>
                       <div class="lg:hidden block">
                        <div class="slider-gallery owl-carousel owl-theme relative overflow-hidden">
                        <?php foreach ($gallery_img as $column_img): 
                             $galimage = $column_img['image'];  ?>
                            <div class="relative group gallery-slide fluid-slide item h-[236px] sm:h-[400px] md:h-[500px]">
                                <a class="w-full h-full" tab-index="0" href="<?php echo esc_url($galimage['url']); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr($galimage['caption']); ?>" aria-label="<?php echo esc_attr($galimage['alt']); ?>" title="<?php echo esc_attr($galimage['alt']); ?>">
                                <img class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-300" src="<?php echo esc_url($galimage['url']); ?>" alt="<?php echo esc_attr($galimage['alt']); ?>" />               
                                </a>
                        </div>    
                        <?php endforeach; ?>   
                        </div>
                        </div>
                    <?php 
                    }  ?>         
            </div>           
        </div>  
    </div>
    <?php if($add_bottom_divider): ?>
     <div class="w-full absolute left-0 bottom-0 z-3">
        <div class="line-divider"></div>   
        <div class="line-border mt-[11px]"></div>             
     </div>
   <?php endif; ?>
</section>

<?php }
?>

