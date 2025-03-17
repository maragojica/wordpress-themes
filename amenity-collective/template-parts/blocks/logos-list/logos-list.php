<?php
$logos = get_field('logos_list');
if ($logos) {    
         
    $bg_color = $logos['bg_color'];     
    $right_shape = $logos['right_shape'];  
    $left_shape = $logos['left_shape'];
    $alignment = $logos['vertical_alignment'];   
    $logos_list = $logos['logos_info'];
  

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';


    //Spacing Settings
    $spacing = $logos['spacing'];
    $spacing_top_desktop = $logos['spacing_top_desktop'];
    $spacing_bottom_desktop = $logos['spacing_bottom_desktop'];
    $spacing_top_mobile = $logos['spacing_top_mobile'];
    $spacing_bottom_mobile = $logos['spacing_bottom_mobile'];

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

<section class="logos-list-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <?php if(!empty($right_shape)): 
         echo wp_get_attachment_image(
            $right_shape['ID'],
            'full',
            false,
            array(
                'class' => 'shape absolute right-0 bottom-0 lg:-bottom-[0] h-[169px] md:h-[350px] lg:h-[300px] 2xl:h-[471px] object-contain lg:block hidden',
                'alt' => esc_attr($right_shape['alt']),                
            )
        );
     endif; ?>
    <?php if(!empty($left_shape)): 
         echo wp_get_attachment_image(
            $left_shape['ID'],
            'full',
            false,
            array(
                'class' => 'shape absolute left-0 bottom-0 lg:-bottom-[0] h-[169px] md:h-[350px] lg:h-[300px] 2xl:h-[471px] object-contain lg:block hidden',
                'alt' => esc_attr($left_shape['alt']),                
            )
        );
     endif; ?>
     <div class="container mx-auto pr-0 lg:pr-[1rem] xl:pr-[2rem] 2xl:pr-[1.5rem]">             
     <?php if( $logos_list ): ?>
    <div class="md:flex hidden relative flex-row justify-center flex-wrap mx-auto animate__animated" data-animation="fadeIn" data-duration="1.5s">
        <?php foreach ($logos_list as $column): 
            $logo = $column['logo']; 
            $link = $column['link'];
            $title = $column['title'];
            $subtitle = $column['subtitle']; 
            $text = $column['text'];?>
            <div class="w-1/2 lg:w-1/3 xl:w-1/4 mb-[35px] px-[8px] lg:px-[15px]">
                <div class="flex flex-col h-[380px] justify-center items-center bg-primary group lg:rounded-tl-[72px] rounded-tl-[56px]  text-center relative overflow-hidden">
                <div class="transform translate-y-[50px] group-hover:translate-y-0 group-hover:opacity-100 pt-0 group-hover:pt-[30px] pb-0 group-hover:pb-[20px] 2xl:px-[16px] px-[15px] transition-all duration-300 ease-in-out">  
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
                                'class' => 'transition-all duration-300 w-full h-[80px] object-contain transition-transform',
                                'alt' => esc_attr($logo['alt']),
                            )
                        ); ?>                                    
                    <?php if($link) { ?>
                        </a>
                    <?php } ?>
                <?php endif; ?> 
                
                <?php if($title): ?>
                    <span class="text-secondary-light mt-[15px] mb-0 text-2xl  lg:text-[1.3rem] xl:text-[26px] leading-4 font-bold"><?php echo $title;?></span>
                <?php endif; ?>  
                <?php if($subtitle): ?>
                    <div class="uppercase lg:text-[16px] text-[12px] font-medium tracking-[1.6px] text-blueinfo-medium"><?php echo $subtitle;?></div>
                <?php endif; ?>  
                <?php if($text): ?>
                    <div class="font-text-font text-cards text-white mt-0 group-hover:mt-3 style-disc opacity-0 transform translate-y-full group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 ease-in-out" >                 
                        <?php echo $text; ?>                   
                    </div>
                    <?php endif; ?> 
                </div> 
                        
                </div>
            </div>  
        <?php endforeach; ?>  
    </div>
    <div class="md:hidden block">
    <div class="slider-logos-list slider-fluid-full owl-carousel owl-theme relative overflow-hidden">
    <?php foreach ($logos_list as $column): 
            $logo = $column['logo']; 
            $link = $column['link'];
            $title = $column['title'];
            $subtitle = $column['subtitle']; 
            $text = $column['text'];?>
             <div class="logo-list-slide fluid-slide item w-full h-full">
             <div class="flex flex-col w-full h-full bg-primary group lg:rounded-tl-[72px] rounded-tl-[56px] lg:p-[48px] py-[37px] sm:px-[30px] px-[15px] text-center">
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
                                'class' => 'transition-all duration-300 w-full h-[150px] object-contain transition-transform',
                                'alt' => esc_attr($logo['alt']),
                            )
                        ); ?>                                    
                    <?php if($link) { ?>
                        </a>
                    <?php } ?>
                <?php endif; ?>   
                <?php if($title): ?>
                    <h4 class="text-secondary-light mt-[10px] mb-0"><?php echo $title;?></h4>
                <?php endif; ?>  
                <?php if($subtitle): ?>
                    <div class="uppercase lg:text-[16px] text-[12px] font-medium tracking-[1.6px] text-blueinfo-medium"><?php echo $subtitle;?></div>
                <?php endif; ?>   
                <?php if($text): ?>
                    <div class="font-text-font text-white mt-3 style-disc" >                 
                        <?php echo $text; ?>                   
                    </div>
                    <?php endif; ?>         
                </div>
             </div>
      <?php endforeach; ?> 
     </div>   
    </div>
<?php endif; ?>
              
      </div>  
</section> 

<?php }?>


