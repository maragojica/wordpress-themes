<?php
$content_block = get_field('faqs');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];   
    $description = $content_block['description'];
    $buttons = $content_block['buttons'];
    $questions = $content_block['questions'];
    $bg_color = $content_block['bg_color'];   

     //Content Colors
     $heading_color = $content_block['heading_color'];
     $subheading_color = $content_block['subheading_color'];
     $description_color = $content_block['description_color'];
 

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

<section class="columns-icons-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="container xl:max-w[80%] 2xl:max-w-[65%] 4k:max-w-[40%] mx-auto">           
        <div class="w-full text-center animate__animated" data-animation="fadeIn" data-duration="1.5s">                
            <?php if ($subheading) : ?>
                <h3 class="<?php echo $subheading_color;?> mb-[10px]">
                    <?php echo $subheading; ?>
                </h3>
            <?php endif; ?>
            <?php if ($heading) : ?>               
                <h2 class="<?php echo $heading_color;?> mb-[20px]" <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
                        <?php echo $heading; ?>                 
                </h2>  
            <?php endif; ?>    
            <?php if ($description) : ?>
                <div class="font-text-font style-disc <?php echo $description_color;?>">
                    <?php echo $description; ?>
                </div>
            <?php endif; ?>                      
        </div>
        <?php if ($questions) : ?>
            <div class="w-full overflow-hidden rounded-xl mb-4 mt-[20px] ">
                <?php foreach ($questions as $index => $question) : ?>
                    <div class="mt-[24px] rounded-[20px] border-secondary-dark border-4 animate__animated" data-animation="fadeIn" data-duration="1.5s">
                        <button id="controlsAccordionItem<?php echo esc_attr($index); ?>" type="button" class="text-secondary-dark accordion-header rounded-xl flex w-full no-underline items-center justify-between gap-4 text-left p-[20px] md:p-[26px] lg:p-[36px] focus-visible:outline-none" aria-controls="accordionItem<?php echo esc_attr($index); ?>" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                            <h3 class="my-0 text-secondary-dark lg:bodymedium w-fit"><?php echo esc_html($question['title']); ?></h3>                           
                            <div class="indicator transition-transform duration-300 bg-contain bg-center bg-no-repeat"></div>
                        </button>
                        <div id="accordionItem<?php echo esc_attr($index); ?>" class="accordion-content overflow-hidden transition-max-height duration-300 ease-out <?php echo $index === 0 ? 'max-h-screen' : 'max-h-0'; ?>" role="region" aria-labelledby="controlsAccordionItem<?php echo esc_attr($index); ?>">
                            <p class="font-text-font style-disc text-accent px-[20px] md:px-[26px] lg:px-[36px] pb-[20px] md:pb-[26px] lg:pb-[36px]">
                                <?php echo wp_strip_all_tags($question['text']); ?>
                            </p>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        <?php endif; ?> 
        <div class="w-full text-center animate__animated" data-animation="fadeIn" data-duration="1.5s">   
            <?php if ($buttons) : ?>
                <div class="flex flex-wrap gap-4 justify-center mt-6 lg:mt-[40px]">
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
</section>

<?php }
?>

