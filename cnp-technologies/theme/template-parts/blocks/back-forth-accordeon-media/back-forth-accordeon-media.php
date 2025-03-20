<?php
$content_block = get_field('content_block_accordeon_media');
if ($content_block) {
    
    $heading = $content_block['heading'];     
    $image = $content_block['image'];   
    $bg_image = $content_block['bg_image'];        
    $questions = $content_block['questions']; 
    
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
    $heading_width = 'w-full'; 
    $content_width = 'w-full';      
    $btn_align = 'justify-start';
   
     //Columns Text Align Settings
     $columns_number = $content_block['columns_layout'];      
     switch ($columns_number) {
         case 'column_50':            
             $heading_width .= ' lg:w-1/2'; 
             $content_width .= ' lg:w-1/2';  
             break;
         case 'column_30':            
             $heading_width .= ' lg:w-[30%]'; 
             $content_width .= ' lg:w-[70%]'; 
             break;
         case 'column_40':
            $heading_width .= ' lg::w-[40%]'; 
            $content_width .= ' lg:w-[60%]'; 
             break;         
     }
?>

<section class="back-foth-accordeon-media-section max-w-full relative bg-cover bg-center bg-no-repeat <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if(!empty($bg_image)):?>style="background-image: url(<?php echo esc_url($bg_image['url']); ?>)"<?php endif; ?>>      
  
    <div class="container mx-auto">     
       <div class="<?php echo esc_attr($container_classes); ?> lg:gap-y-0 gap-y-[3em] lg:gap-x-[3em]">
           <div class="<?php echo esc_attr($heading_width); ?> relative flex flex-col justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">
               <div class="w-full h-full">
                <?php if ( !empty($image)) : 
                        $srcset = wp_get_attachment_image_srcset($image['ID']);
                        $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                    <img class="img-fluid w-full h-[15em] sm:h-[20em] md:h-[30em] lg:h-[45em]] transition-all duration-300 ease-in-out object-top object-cover" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="734" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                <?php endif; ?>                 
                </div>        
                <?php if ($heading) : ?>
                    <div class="bg-secondary top-shape-short px-[36px] py-[14px] sm:px-[40px] sm:py-[20px] max-w-fit transform rotate-270 absolute bottom-[132px] left-[-134px] sm:bottom-[154px] sm:left-[-168px] xl:bottom-[171px] xl:left-[-176px] 2xl:bottom-[206px] 2xl:left-[-222px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <h2 class="text-white mb-0 text-[30px] sm:text-[35px] xl:text-[40px] 2xl:text-[50px]"><?php echo $heading; ?></h2>
                     </div> 
                <?php endif; ?>    
            </div>            
            <div class="<?php echo esc_attr($content_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s" >  
                 <?php if ($questions) : ?>
                    <div class="w-full overflow-hidden mt-[28px] border-t-secondary border-t-[2px]">
                        <?php foreach ($questions as $index => $question) : ?>
                            <div class="border-b-secondary border-b-[2px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
                                <button id="controlsAccordionItem<?php echo esc_attr($index); ?>" type="button" class="text-white accordion-header cursor-pointer flex w-full no-underline items-center justify-between gap-4 text-left py-[15px] md:py-[20px] lg:py-[28px] focus-visible:outline-none" aria-controls="accordionItem<?php echo esc_attr($index); ?>" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                                    <h3 class="my-0 text-white sm w-fit"><?php echo esc_html($question['title']); ?></h3>                           
                                    <div class="indicator transition-transform duration-300 bg-contain bg-center bg-no-repeat"></div>
                                </button>
                                <div id="accordionItem<?php echo esc_attr($index); ?>" class="accordion-content overflow-hidden transition-max-height duration-300 ease-out <?php echo $index === 0 ? 'max-h-screen' : 'max-h-0'; ?>" role="region" aria-labelledby="controlsAccordionItem<?php echo esc_attr($index); ?>">
                                    <div class="list-style text-white pb-[28px]">
                                        <?php echo $question['text']; ?>
                                     </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                <?php endif; ?> 
            </div>           
        </div>  
    </div>    
</section>

<?php }
?>

