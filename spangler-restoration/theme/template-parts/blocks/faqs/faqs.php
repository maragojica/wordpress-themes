<?php
$content_block = get_field('content_block_faqs');
if ($content_block) {
    
    $heading = $content_block['heading'];      
    $subheading = $content_block['subheading']; 
    $description = $content_block['description'];
    $questions = $content_block['faqs']; 
  

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
        case 'xlarge':
            $spacing_class = 'padding-xlarge';
            break;
    }

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif; 
   
?>

<section class="faqs-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
    <div class="container mx-auto">             
         <div class="w-full mx-auto">
           <div class="w-full mx-auto text-center">
                    <?php if ($subheading) : ?>
                    <div class="text-sub text-secondary mb-[15px]" data-aos="fade-up">
                        <?php echo $subheading; ?>
                    </div> 
                    <?php endif; ?>
                    <?php if($heading): ?>
                       <h2 class="text-primary uppercase mb-[15px]" data-aos="fade-up" >
                            <?php echo $heading; ?>
                        </h2> 
                    <?php endif; ?>    
                    <?php if($description): ?>
                    <div class="text-black style-disc style-triangle mx-auto lg:max-w-[40%]" data-aos="fade-up" >                 
                        <?php echo $description; ?>                   
                    </div>
                 <?php endif; ?>                                  
            </div> 
         <?php if ($questions) : ?>
                    <div class="w-full overflow-hidden mt-[28px]">
                        <?php foreach ($questions as $index => $question) : ?>
                            <div class="border-b-primary border-b-[2px]" data-aos="fade-up">
                                <button id="controlsAccordionItem<?php echo esc_attr($index); ?>" type="button" class="text-secondary accordion-header flex w-full no-underline items-center justify-between gap-4 text-left py-[15px] md:py-[20px] lg:py-[28px] focus-visible:outline-none cursor-pointer" aria-controls="accordionItem<?php echo esc_attr($index); ?>" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                                    <h4 class="my-0 text-primary w-fit"><?php echo esc_html($question['title']); ?></h4>                           
                                    <div class="indicator transition-transform duration-300 bg-contain bg-center bg-no-repeat"></div>
                                </button>
                                <div id="accordionItem<?php echo esc_attr($index); ?>" class="accordion-content overflow-hidden transition-max-height duration-300 ease-out <?php echo $index === 0 ? 'max-h-screen' : 'max-h-0'; ?>" role="region" aria-labelledby="controlsAccordionItem<?php echo esc_attr($index); ?>">
                                    <div class="style-disc text-primary pb-[28px] text-[16px] lg:text-[18px]">
                                        <?php echo $question['text']; ?>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                <?php endif; ?> 
        </div>
    </div>  
</section>

<?php }
?>

