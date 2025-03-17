<?php
$content_block = get_field('content_block_content');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading']; 
    $description = $content_block['description'];   
    $buttons = $content_block['buttons'];
    $add_bottom_divider = $content_block['add_bottom_divider'];      
    

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
<section class="content-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
    <div class="container mx-auto">
        <div class="w-full lg:max-w-[80%] mx-auto" >   
             <?php if ($heading) : ?>
                <div class="relative mb-8">
                    <?php if( $subheading): ?>
                        <div class="text-secondary subheading font-secondary capitalize rotate--10.166 absolute -left-[1.2rem] md:-left-[34px] lg:-left-[51px] -top-[12px] xl:top-0 z-[1] animate__animated" data-animation="fadeIn" data-duration="1.3s"><?php echo $subheading; ?></div>
                    <?php endif; ?>
                    <h2 class="text-primary sm" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $heading; ?>
                    </h2>
                </div>               
            <?php endif; ?> 
            <?php if($description): ?>
                <div class="text-secondary style-disc">                 
                    <?php echo $description; ?>                   
                </div>
             <?php endif; ?> 
             <?php if ($buttons) : ?>
                <div class="flex flex-wrap gap-4 justify-start mt-6">
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

