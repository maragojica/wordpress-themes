<?php
$content_block = get_field('accordeon');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];   
    $description = $content_block['description'];
    $buttons = $content_block['buttons'];
    $questions = $content_block['questions'];
    $bg_color = $content_block['bg_color'];   

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
    
     //Container Full

    $container_classes = 'h-full flex flex-col lg:flex-row ' . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
?>

<section class="accordeon-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="w-full mx-auto pl-[1em] lg:pl-0 pr-contain">     
        <div class="<?php echo esc_attr($container_classes); ?> gap-y-[1em] lg:gap-y-0 lg:gap-x-[63px]">
            <div class="w-full h-[10em] sm:h-[15em]  lg:h-[940px] lg:w-1/2 accordeon_images relative">   
            <?php  $i = 1;  foreach ($questions as $index => $question) :  
                    $image = $question['image']; 
                        
                        if ( !empty($image)) :  ?> 
                          <div class="image-container w-full h-full overflow-hidden transition-opacity duration-500 ease-in-out <?php echo $index === 0 ? 'opacity-100' : 'opacity-0'; ?>">
                            <img class="w-full h-full object-cover object-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>           
                        <?php endif; ?>
                <?php  $i++;   endforeach;  ?>
            </div>
            <?php if ($questions) : ?>
                <div class="w-full lg:w-1/2 pt-[16px] lg:py-[74px]">
                <?php if ($subheading) : ?>
                    <h3 class="text-foreground mb-[10px]">
                        <?php echo $subheading; ?>
                    </h3>
                <?php endif; ?>
                <?php if ($heading) : ?>               
                    <h2 class="text-secondary mb-[20px]">
                            <?php echo $heading; ?>                 
                    </h2>  
                <?php endif; ?>    
                <?php if ($description) : ?>
                    <div class="font-text-font style-disc text-foreground">
                        <?php echo $description; ?>
                    </div>
                <?php endif; ?>   
                    <div class="w-full overflow-hidden mb-4 mt-[16px] lg:mt-[30px] border-t-2 border-blueinfo">
                        <?php foreach ($questions as $index => $question) : $image = $question['image']; ?>
                            <div class="accordeon border-b-2 border-blueinfo" data-animation="fadeIn" data-duration="1.5s">
                                <button id="controlsAccordionItem<?php echo esc_attr($index); ?>" type="button" data-image-src="<?php echo $image['url']; ?>" data-image-alt="<?php echo $image['alt']; ?>" class="text-secondary accordion-header flex w-full no-underline items-center justify-between gap-4 text-left py-[14px] focus-visible:outline-none" aria-controls="accordionItem<?php echo esc_attr($index); ?>" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                                    <h3 class="my-0 text-secondary w-fit"><?php echo esc_html($question['title']); ?></h3>                           
                                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none" class="size-6 md:size-9 shrink-0 transition-transform duration-300 <?php echo $index === 0 ? 'rotate-180' : ''; ?>" aria-hidden="true">
                                    <path d="M19 2.96875C15.8293 2.96875 12.7298 3.90897 10.0935 5.6705C7.4572 7.43204 5.40243 9.93578 4.18906 12.8651C2.9757 15.7944 2.65822 19.0178 3.27679 22.1275C3.89536 25.2373 5.42219 28.0938 7.6642 30.3358C9.90621 32.5778 12.7627 34.1046 15.8725 34.7232C18.9822 35.3418 22.2056 35.0243 25.1349 33.8109C28.0642 32.5976 30.568 30.5428 32.3295 27.9065C34.091 25.2702 35.0313 22.1707 35.0313 19C35.0265 14.7497 33.336 10.6748 30.3306 7.6694C27.3252 4.66398 23.2503 2.97346 19 2.96875ZM19 31.4688C16.5339 31.4688 14.1232 30.7375 12.0727 29.3674C10.0223 27.9973 8.42411 26.0499 7.48038 23.7716C6.53665 21.4932 6.28973 18.9862 6.77084 16.5675C7.25195 14.1488 8.43948 11.927 10.1833 10.1833C11.9271 8.43948 14.1488 7.25194 16.5675 6.77083C18.9862 6.28972 21.4932 6.53665 23.7716 7.48038C26.05 8.42411 27.9973 10.0223 29.3674 12.0727C30.7375 14.1232 31.4688 16.5339 31.4688 19C31.4652 22.3058 30.1504 25.4753 27.8128 27.8128C25.4753 30.1504 22.3058 31.4652 19 31.4688ZM26.1977 15.3648C26.3638 15.5303 26.4956 15.7269 26.5855 15.9434C26.6754 16.1599 26.7216 16.392 26.7216 16.6265C26.7216 16.8609 26.6754 17.0931 26.5855 17.3096C26.4956 17.5261 26.3638 17.7227 26.1977 17.8882L20.2602 23.8257C20.0948 23.9918 19.8981 24.1235 19.6816 24.2134C19.4651 24.3033 19.233 24.3496 18.9985 24.3496C18.7641 24.3496 18.532 24.3033 18.3154 24.2134C18.0989 24.1235 17.9023 23.9918 17.7368 23.8257L11.7993 17.8882C11.4647 17.5536 11.2767 17.0997 11.2767 16.6265C11.2767 16.1532 11.4647 15.6994 11.7993 15.3648C12.1339 15.0301 12.5878 14.8421 13.061 14.8421C13.5343 14.8421 13.9881 15.0301 14.3227 15.3648L19 20.0391L23.6773 15.3603C23.843 15.195 24.0397 15.064 24.2561 14.9747C24.4725 14.8854 24.7043 14.8397 24.9384 14.8401C25.1725 14.8405 25.4042 14.8871 25.6203 14.9771C25.8364 15.0671 26.0326 15.1989 26.1977 15.3648Z" fill="#1F577C"/>
                                    </svg>
                                </button>
                                <div id="accordionItem<?php echo esc_attr($index); ?>" class="accordion-content overflow-hidden transition-max-height duration-300 ease-out <?php echo $index === 0 ? 'max-h-screen' : 'max-h-0'; ?>" role="region" aria-labelledby="controlsAccordionItem<?php echo esc_attr($index); ?>">
                                    <p class="font-text-font style-disc text-foreground pb-[17px] pr-[3em]">
                                        <?php echo wp_strip_all_tags($question['text']); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="w-full text-left animate__animated" data-animation="fadeIn" data-duration="1.5s">   
                    <?php if ($buttons) : ?>
                        <div class="flex flex-wrap gap-4 justify-start mt-6 lg:mt-[40px]">
                            <?php foreach ($buttons as $button) : ?>
                                <?php 
                                $button_link = $button['button'];
                                $button_style = $button['button_style'];
                                if ($button_link) :
                                    $url = $button_link['url'];
                                    $title = $button_link['title'];
                                    $target = $button_link['target'] ? $button_link['target'] : '_self';
                                ?>
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                                        <?php echo esc_html($title); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>            
            </div> 
                </div>
            <?php endif; ?>   
        </div>                     
    </div>
</section>

<?php }
?>

