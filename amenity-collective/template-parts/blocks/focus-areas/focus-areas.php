<?php
$content_block = get_field('content_focus');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];    
    $description = $content_block['description'];  
    $buttons = $content_block['buttons'];
    $bg_color = $content_block['bg_color']; 
    $slider = $content_block['slider_focus_areas'];
   

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
?>

<section class="focus-area-section max-w-full relative h-auto lg:h-[calc(100vh-103px)]  <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
    <div class="background w-full h-full lg:block hidden"  id="background">
    <?php  $i = 1;  foreach ($slider as $index => $slide) :  
        $image = $slide['bg_image']; 
           
            if ( !empty($image)) :  ?>                               
                <img class="bg-image w-full h-full object-cover object-center transition-all duration-300 ease-in-out <?php echo $index === 0 ? 'opacity-100' : 'opacity-0'; ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />    
            <?php  endif; ?>
    <?php  $i++;   endforeach;  ?>
    </div>
      <div class="overlay absolute z-[2] top-0 left-0 pt-[81px] w-full h-full lg:block hidden" <?php if($bg_color):?> style="background: linear-gradient(0deg, <?php echo $bg_color;?> 0%, <?php echo $bg_color;?> 100%);" <?php endif; ?>>
        <div class="container mx-auto text-center"> 
            <?php if ($subheading) : ?>
                <h3 class="text-white mb-[10px] uppercase">
                    <?php echo $subheading; ?>
                </h3>
            <?php endif; ?>
            <?php if ($heading) : ?>
                <h2 class="text-white mb-0">
                    <?php echo $heading; ?>
                </h2>
            <?php endif; ?> 
            <?php if($description): ?>
            <div class="font-text-font text-white  mt-4 style-disc mx-auto md:max-w[80%] lg:max-w-[56%] animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                <?php echo $description; ?>                   
            </div>
                <?php endif; ?>
            <?php if ($buttons) : ?>
                <div class="flex flex-wrap gap-4 <?php echo $btn_align;?> mt-4 lg:mt-12">
                    <?php foreach ($buttons as $button) : ?>
                        <?php 
                        $button_link = $button['button'];
                        $button_style = $button['button_style'];
                        if ($button_link) :
                            $url = $button_link['url'];
                            $title = $button_link['title'];
                            $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                            <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                                <?php echo esc_html($title); ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?> 
         </div>
         </div>
         <div class="buttons-focus w-full min-h-[287px] pb-[59px] lg:flex justify-center items-end gap-[30px] xl:gap-[56px] absolute z-[3] bottom-0 left-0 hidden">
         <?php $j = 1; foreach ($slider as $index => $slide) :  
            $image = $slide['bg_image'];
            $title = $slide['tilte']; ?>
            <button class="btn-focus min-w-min btn btn_style_focus <?php if($j==1):?> active <?php endif;?>" aria-control="<?php echo esc_html($title);?>" data-image-src="<?php echo $image['url']; ?>" data-image-alt="<?php echo $image['alt']; ?>"><?php echo $title;?></button>
        <?php $j++; endforeach;  ?>      
        </div> 
        <div class="container mx-auto text-center lg:hidden block"> 
            <?php if ($subheading) : ?>
                <h3 class="text-foreground mb-[10px] uppercase">
                    <?php echo $subheading; ?>
                </h3>
            <?php endif; ?>
            <?php if ($heading) : ?>
                <h2 class="text-secondary mb-0">
                    <?php echo $heading; ?>
                </h2>
            <?php endif; ?> 
            <?php if($description): ?>
            <div class="font-text-font text-foreground  mt-4 style-disc mx-auto md:max-w[80%] lg:max-w-[56%] animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                <?php echo $description; ?>                   
            </div>
                <?php endif; ?>
            <?php if ($buttons) : ?>
                <div class="flex flex-wrap gap-4 <?php echo $btn_align;?> mt-4 lg:mt-12">
                    <?php foreach ($buttons as $button) : ?>
                        <?php 
                        $button_link = $button['button'];
                        $button_style = $button['button_style'];
                        if ($button_link) :
                            $url = $button_link['url'];
                            $title = $button_link['title'];
                            $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                            <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                                <?php echo esc_html($title); ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?> 
            <div class="slider-focus-areas slider-fluid-full owl-carousel owl-theme relative overflow-hidden mt-[14px]">
            <?php foreach ($slider as $index => $slide) :  
            $image = $slide['bg_image'];
            $title = $slide['tilte']; ?>
             <div class="focus-slide fluid-slide h-full item flex-col text-left items-start justify-start">
            <div class="w-full h-[369px] md:h-[550px] overflow-hidden">        
             <?php  echo wp_get_attachment_image(
                            $image['ID'],
                            'full',
                            false,
                            array(
                                'class' => 'transition-all duration-300 w-full h-full parallax-image object-cover object-center',
                                'alt' => esc_attr($image['alt']),
                            )
                        ); ?>
             </div>  
             <?php if($title): ?>
                <div class="font-text-font text-foreground text-[18px] font-bold mt-[12px] w-full hide-br-mv"><?php echo $title; ?></div>
               <?php endif; ?>  
             </div>        
            <?php endforeach;  ?>      
            </div>
         </div>
</section>

<?php }
?>

