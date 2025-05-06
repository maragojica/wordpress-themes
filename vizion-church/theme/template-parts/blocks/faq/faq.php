<?php
$content_block = get_field('content_faqs');
if ($content_block) {
    
    $heading = $content_block['heading'];  
    $description = $content_block['description'];
    $questions_col1 = $content_block['questions_col1'];
    $questions_col2 = $content_block['questions_col2'];

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
<section class="faqs-section lg:px-[70px] xl:px-[75px] 2xl:px-[102px] max-w-full <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
<div class="bg-background rounded-[25px]  max-w-full relative <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
   <div class="w-full text-center mb-[42px]">  
            <?php if ($heading) : ?>               
            <div class="title-section text-foreground mb-[24px]" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50">
                <?php echo $heading; ?>                 
            </div>  
            <?php endif; ?>    
            <?php if ($description) : ?>
                <div class="text-foreground style-disc" data-aos="fade-up" data-aos-offset="200" data-aos-delay="60">
                    <?php echo $description; ?>
                </div>
            <?php endif; ?>                      
        </div>
       <div class="container mx-auto">   
           <div class="h-full flex flex-col lg:flex-row lg:gap-[18px]" data-aos="fade-up" data-aos-offset="200" data-aos-delay="670">
                 <?php if ($questions_col1) : ?>
                    <div class="w-full lg:w-1/2">
                        <div class="w-full overflow-hidden">
                            <?php foreach ($questions_col1 as $index => $question) : ?>
                                <div class="mt-[18px] rounded-[8px] bg-[#FEFFFF] px-[23px]">
                                    <button id="controlsAccordionItem<?php echo esc_attr($index); ?>" type="button" class="text-foreground accordion-header cursor-pointer flex w-full no-underline items-start justify-between gap-4 text-left pt-[28px] pb-[22px] transition-all duration-300 ease-in-out focus-visible:outline-none" aria-controls="accordionItem<?php echo esc_attr($index); ?>" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                                        <h4 class="my-0 text-foreground lg:bodymedium w-fit"><?php echo esc_html($question['title']); ?></h4>                           
                                        <div class="indicator bg-contain bg-center bg-no-repeat transition-transform duration-300 ease-in-out"></div>
                                    </button>
                                    <div id="accordionItem<?php echo esc_attr($index); ?>" class="accordion-content overflow-hidden transition-max-height duration-300 ease-out <?php echo $index === 0 ? 'max-h-screen' : 'max-h-0'; ?>" role="region" aria-labelledby="controlsAccordionItem<?php echo esc_attr($index); ?>">
                                        <div class="font-text-font style-disc text-foreground pb-[14px] pt-[2px]">
                                            <?php echo $question['text']; ?>
                                         </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?> 
                <?php if ($questions_col2) : ?>
                    <div class="w-full lg:w-1/2">
                        <div class="w-full overflow-hidden">
                            <?php foreach ($questions_col2 as $index => $question) : ?>
                                <div class="mt-[18px] rounded-[8px] bg-[#FEFFFF] px-[23px]">
                                    <button id="controlsAccordionItem<?php echo esc_attr($index); ?>" type="button" class="text-foreground accordion-header cursor-pointer flex w-full no-underline items-start justify-between gap-4 text-left pt-[28px] pb-[22px] transition-all duration-300 ease-in-out focus-visible:outline-none" aria-controls="accordionItem<?php echo esc_attr($index); ?>" aria-expanded="false">
                                        <h4 class="my-0 text-foreground lg:bodymedium w-fit"><?php echo esc_html($question['title']); ?></h4>                           
                                        <div class="indicator bg-contain bg-center bg-no-repeat transition-transform duration-300 ease-in-out"></div>
                                    </button>
                                    <div id="accordionItem<?php echo esc_attr($index); ?>" class="accordion-content overflow-hidden transition-max-height duration-300 ease-out max-h-0" role="region" aria-labelledby="controlsAccordionItem<?php echo esc_attr($index); ?>">
                                        <div class="font-text-font style-disc text-foreground pb-[14px] pt-[2px]">
                                            <?php echo $question['text']; ?>
                                         </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?> 
           </div>
    </div>
</div>
</section>
<?php }
?>

