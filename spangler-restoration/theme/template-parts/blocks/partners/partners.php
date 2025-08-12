<?php
$content_block = get_field('content_partners');
if ($content_block) {
    $heading = $content_block['heading'];      
    $subheading = $content_block['subheading']; 
    $description = $content_block['description'];   
    $logos_rows = $content_block['info_partners']; 

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
        case 'xlarge':
            $spacing_class = 'padding-xlarge';
            break;
    }

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;

    
    //Container Full

    $container_classes = 'h-full flex flex-col md:flex-row ' . ($reverse_desktop ? 'md:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
    $heading_width = 'w-full md:w-[30%]'; 
    $content_width = 'w-full md:w-[70%]';   
   
?>

<section class="partners-section max-w-full relative overflow-hidden lg:h-fit <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto">  
     <div class="<?php echo esc_attr($container_classes); ?> md:gap-y-0 gap-y-[3em] md:mx-[-1.5rem]">  
        <div class="<?php echo esc_attr($heading_width); ?> md:px-[1.5rem] <?php if($reverse_desktop){ ?> md:pl-[50px] <?php }else{ ?> md:pr-[50px] <?php } ?> flex flex-col justify-center">
        <?php if ($subheading) : ?>
            <div class="text-sub text-secondary mb-[15px]" data-aos="fade-up" >
                <?php echo $subheading; ?>
            </div> 
            <?php endif; ?>
            <?php if($heading): ?>
                <h2 class="text-primary uppercase" data-aos="fade-up" >
                    <?php echo $heading; ?>
                </h2> 
            <?php endif; ?>    
            <?php if($description): ?>
                    <div class="text-black style-disc" data-aos="fade-up" >                 
                        <?php echo $description; ?>                   
                    </div>
                 <?php endif; ?> 
        </div> 
        <div class="<?php echo esc_attr($content_width); ?>" data-aos="fade-up" >
        <?php if ($logos_rows):  ?>
                    <div class="lg:flex hidden flex-col gap-[10px] mx-auto border-l-2 border-[#DAD6D6]">
                        <?php $i = 1; foreach ($logos_rows as $column):
                            $logo_list = $column['partners'];
                            if ($logo_list): ?>
                                <div class="hidden lg:flex flex-row flex-nowrap justify-between items-center gap-[25px] mx-auto p-[30px] <?php if($i != 1): ?> border-t-2 border-[#DAD6D6] <?php endif;?>" >
                                    <?php foreach ($logo_list as $column_logo):
                                        $logo = $column_logo['logo'];
                                        $link = $column_logo['partner_link']; ?>
                                        <?php if (!empty($logo)): ?>
                                            <div class="w-1/6">
                                            <?php if ($link) {
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                                <a class="w-full max-w-full" href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" aria-label="<?php echo $link_title; ?>"><?php } ?>
                                                <?php echo wp_get_attachment_image(
                                                    $logo['ID'],
                                                    'full',
                                                    false,
                                                    array(
                                                        'class' => 'transition-all duration-300 h-[80px] max-w-full object-contain hover:-translate-y-[10px] transition-transform',
                                                        'alt' => esc_attr($logo['alt']),
                                                    )
                                                ); ?>
                                                <?php if ($link) { ?>
                                                </a>
                                            <?php } ?>
                                                </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                        <?php endif;
                       $i++; endforeach; ?>
                    </div>
                    <div class="lg:hidden block">
                    <div class="swiper-container partners-slider" id="partners-slider">
                        <div class="swiper-wrapper">
                        <?php foreach ($logos_rows as $column):
                            $logo_list = $column['partners'];
                            if ($logo_list): ?>

                                <?php foreach ($logo_list as $column_logo):
                                    $logo = $column_logo['logo'];
                                    $link = $column_logo['partner_link']; ?>
                                    <div class="swiper-slide w-full">
                                        <?php if (!empty($logo)): ?>
                                            <?php if ($link) {
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                                <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" aria-label="<?php echo $link_title; ?>"><?php } ?>
                                                <?php echo wp_get_attachment_image(
                                                    $logo['ID'],
                                                    'full',
                                                    false,
                                                    array(
                                                        'class' => 'transition-all duration-300 w-full h-[70px] md:h-[90px] object-contain transition-transform',
                                                        'alt' => esc_attr($logo['alt']),
                                                    )
                                                ); ?>
                                                <?php if ($link) { ?>
                                                </a>
                                            <?php } ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>

                        <?php endif;
                        endforeach; ?>
                        </div>                      
                    </div>
                    </div>
                    
                <?php endif; ?>   
        </div>                 
    </div>   
</section>

<?php }
?>

