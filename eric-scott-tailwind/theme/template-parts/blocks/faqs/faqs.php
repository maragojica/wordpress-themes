<?php
$content_block = get_field('content_block_faq');
if ($content_block) {    
   
    $add_bottom_divider = $content_block['add_bottom_divider'];
    $questions = $content_block['questions'];  

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

<section class="jobs-section overflow-hidden max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >    
    <div class="container mx-auto">   
        <div class="w-full mx-auto lg:max-w-[800px] 2xl:max-w-[991px] animate__animated" data-animation="fadeIn" data-duration="1.1s">
                <?php if ($questions) : ?>
                <div class="w-full overflow-hidden">
                    <?php foreach ($questions as $index => $question) : ?>
                        <div class="full-border mt-[18px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
                            <button id="controlsAccordionItem<?php echo esc_attr($index); ?>" type="button" class="text-secondary cursor-pointer accordion-header flex w-full items-center justify-between gap-4 text-left p-[20px] lg:p-[40px] focus-visible:outline-none" aria-controls="accordionItem<?php echo esc_attr($index); ?>" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                                <h3 class="my-0 text-secondary w-fit"><?php echo esc_html($question['title']); ?></h3>                           
                                <div class="indicator transition-transform duration-300 bg-contain bg-center bg-no-repeat"></div>
                            </button>
                            <div id="accordionItem<?php echo esc_attr($index); ?>" class="accordion-content overflow-hidden transition-max-height duration-300 ease-out <?php echo $index === 0 ? 'max-h-screen' : 'max-h-0'; ?>" role="region" aria-labelledby="controlsAccordionItem<?php echo esc_attr($index); ?>">
                                <div class="style-disc style-under text-foreground pb-[15px] md:pb-[20px] lg:pb-[40px] px-[15px] md:px-[20px] lg:px-[40px]">
                                    <?php echo $question['text']; ?>
                                 </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            <?php endif; ?> 
        </div>  
    </div>
    <?php if($add_bottom_divider): ?>
     <div class="w-full absolute left-0 bottom-0 z-3">
        <div class="line-border"></div>
        <div class="line-divider mt-[11px]"></div>        
     </div>
   <?php endif; ?>
</section>

<?php }
?>

