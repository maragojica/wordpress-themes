<?php
$content_block = get_field('content_block_contact');
if ($content_block) {
    
    $bg_color = $content_block['bg_color'];
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];
    $description = $content_block['description']; 
    $content = $content_block['content'];
     $form_title = $content_block['form_title'];
     $form_text = $content_block['form_text'];
     $form_info = $content_block['form_info'];

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
         case 'xsmall':
            $spacing_class = 'padding-xsmall';
            break;
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

    if($bg_color === 'white'){
        $bg_class = 'bg-white';
    } elseif($bg_color === 'accent-light'){
        $bg_class = 'bg-accent-light';
    }   
    
        $v_separator_l =  '/shapes/v-pattern-l.svg';
     $v_separator_r =  '/shapes/v-pattern-r.svg';
           
?>

<section class="contact-section max-w-full relative overflow-hidden <?php if($bg_color): echo $bg_class; endif; ?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>   

         
<div class="container mx-auto relative z-[2]">             
    <div class=" flex flex-col lg:flex-row items-start lg:gap-y-0 gap-y-[3em]">
       <div class="w-full lg:w-1/2 flex flex-col custom-p-info  lg:py-[12px]   lg:pr-[30px] xl:pr-[54px] lg:pl-0  justify-center">
         <?php if(!empty($image)): ?>
            <div class="contact-image w-full mx-auto h-[20em] md:h-[30em] lg:h-[200px] mb-[40px]" data-aos="fade-up">
                <?php echo wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'w-full h-full object-cover object-center rounded-[10px]')); ?>
            </div>
        <?php endif; ?>
            <?php if($subheading): ?>
                <div class="eyebrow text-foreground mt-[12px]"  >
                    <?php echo $subheading; ?>
                </div>   
            <?php endif; ?> 
         <?php if($heading): ?>  
        <h2 class="text-foreground" data-aos="fade-in">                 
             <?php echo $heading; ?>
         </h2>    
         <?php endif; ?>           
           <?php if($description): ?>
            <div class="text-foreground text-large style-disc mt-[20px]" data-aos="fade-in" >                 
                <?php echo $description; ?>                   
            </div>
        <?php endif; ?>  
        <?php if($content): ?>
            <div class="w-full flex flex-col gap-y-[10px] mt-[40px]">
                    <div class="w-full h-[2px] bg-primary"></div>
                    <div class="w-full h-[2px] bg-primary"></div>
                </div>
            <div class="text-foreground contact-info style-disc mt-[25px]" data-aos="fade-in" >                 
                <?php echo $content; ?>                   
            </div>
        <?php endif; ?> 
       </div>
       <div class="w-full lg:w-1/2 flex flex-col" data-aos="fade-in">
         <?php if($form_info): ?>
            <div class="contact-form bg-white rounded-[10px] w-full h-full flex justify-center flex-col px-[2em] py-[2em] lg:py-[35px] lg:px-[45px]">
                    <?php if ($form_title) : ?>
                    <h3 class="text-foreground mb-[20px]" data-aos="fade-up" >
                        <?php echo $form_title; ?>
                    </h3> 
                <?php endif; ?> 
                <?php if($form_text): ?>          
                    <div class="text-foreground style-disc" data-aos="fade-in" >                 
                        <?php echo $form_text; ?>                   
                    </div>
                <?php endif; ?> 
                <?php if($form_info): ?>
                <div class="mt-[20px]"><?php echo $form_info;  ?></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
       </div>
    </div>          
</div> 

</section>

<?php }
?>
