<?php
$counters = get_field('brands');
if ($counters) {
    
    $heading = $counters['heading'];
    $subheading = $counters['subheading'];     
    $description = $counters['description'];       
    $bg_color = $counters['bg_color'];     
    $add_border_bottom = $counters['add_border_bottom'];   
    $alignment = $counters['vertical_alignment'];   
    $logos_rows = $counters['logos_rows'];
  

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';


    //Spacing Settings
    $spacing = $counters['spacing'];
    $spacing_top_desktop = $counters['spacing_top_desktop'];
    $spacing_bottom_desktop = $counters['spacing_bottom_desktop'];
    $spacing_top_mobile = $counters['spacing_top_mobile'];
    $spacing_bottom_mobile = $counters['spacing_bottom_mobile'];

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

    //Container Settings

    $container_classes = 'text-center flex flex-col items-center h-full w-full ' . ($alignment === 'middle' ? 'justify-center' : ($alignment === 'bottom' ? 'justify-end' : ($alignment === 'top' ? 'justify-start' : 'justify-around')));
    
?>

<section class="brands-section max-w-full relative <?php if($add_border_bottom):?> border-b-[12px] border-b-secondary <?php endif;?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
   
     <div class="container mx-auto">  
            <div class="w-full text-center md:max-w[80%] lg:max-w-[75%] mx-auto">
                <?php if ($heading) : ?>
                    <h2 class="text-secondary mb-[15px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $heading; ?>
                    </h2>
                <?php endif; ?>
                <?php if ($subheading) : ?>
                    <h3 class="text-white animate__animated" data-animation="fadeIn" data-duration="1.3s">
                        <?php echo $subheading; ?>
                    </h3>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="bodymedium mt-[10px] font-text-font text-white md:max-w[80%] lg:max-w-[46%] mx-auto animate__animated" data-animation="fadeIn" data-duration="1.4s">
                        <?php echo $description; ?>
                    </div>
                <?php endif; ?> 
            </div>  
          
            <?php if ($logos_rows):  ?>    
                <div class="rounded-[30px] border-2 border-[#EEF4F9] p-[40px] lg:flex hidden flex-col gap-[10px] mt-[30px] mx-auto">
                <?php foreach ($logos_rows as $column): 
                        $logo_list = $column['logo_list']; 
                        if($logo_list): ?>
                        <div class="hidden lg:flex flex-row flex-nowrap justify-between gap-[48px] mx-auto animate__animated" data-animation="fadeIn" data-duration="1.5s">
                            <?php foreach ($logo_list as $column_logo): 
                                $logo = $column_logo['logo']; 
                                $link = $column_logo['link']; ?>
                                <?php if(!empty($logo)): ?>
                                <?php  if($link) {
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" ><?php } ?>
                                    <?php  echo wp_get_attachment_image(
                                        $logo['ID'],
                                        'full',
                                        false,
                                        array(
                                            'class' => 'transition-all duration-300 w-full h-[144px] object-contain hover:-translate-y-[10px] transition-transform',
                                            'alt' => esc_attr($logo['alt']),
                                        )
                                    ); ?>                                    
                                <?php if($link) { ?>
                                    </a>
                                <?php } ?>
                            <?php endif; ?>
                            <?php endforeach;?>    
                        </div>  
                 <?php endif; endforeach; ?> 
                </div>
                 <div class="slider-logos owl-carousel owl-theme relative mt-[2em]">
                 <?php foreach ($logos_rows as $column): 
                        $logo_list = $column['logo_list']; 
                        if($logo_list): ?>
                      
                        <?php foreach ($logo_list as $column_logo): 
                                $logo = $column_logo['logo']; 
                                $link = $column_logo['link']; ?>
                                  <div class="item flex justify-center">
                                <?php if(!empty($logo)): ?>
                                <?php  if($link) {
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" ><?php } ?>
                                    <?php  echo wp_get_attachment_image(
                                        $logo['ID'],
                                        'full',
                                        false,
                                        array(
                                            'class' => 'transition-all duration-300 w-full h-[70px] md:h-[90px] object-contain transition-transform',
                                            'alt' => esc_attr($logo['alt']),
                                        )
                                    ); ?>                                    
                                <?php if($link) { ?>
                                    </a>
                                <?php } ?>
                            <?php endif; ?>
                            </div>
                            <?php endforeach; ?>    
                       
                  <?php endif; endforeach; ?> 
                 </div>
            <?php endif; ?>         
         </div>
         
   
</section> 
<?php }?>

