<?php
$content_block = get_field('content_process');
if ($content_block) {
    
    $add_bg_shape = $content_block['add_bg_shape']; 
    $bg_shape = $content_block['bg_shape']; 
    $graphic = $content_block['graphic']; 

    $columns_content_one = $content_block['columns_content_one'];
    $columns_content_two = $content_block['columns_content_two'];

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

<section class="process-section overflow-hidden max-w-full relative <?php echo esc_attr($className); ?> <?php if($add_bg_shape): ?> lg:mb-[-180px] <?php endif;?>" <?php echo $anchor_attr; ?>>   
    <?php if($add_bg_shape): ?>
        <?php if(!empty($bg_shape)): 
         echo wp_get_attachment_image(
            $bg_shape['ID'],
            'full',
            false,
            array(
                'class' => 'absolute left-0 bottom:0 z-[1] w-full h-full lg:h-fit object-cover lg:object-contain',
                'alt' => esc_attr($bg_shape['alt']),  
                'data-velocity' => '-20'              
            )
        );
     endif; ?>
    <?php endif; ?>
    <div class="container mx-auto z-[2] relative <?php if($add_bg_shape): ?> lg:mb-[180px] <?php endif;?>">     
       <div class="flex md:justify-center items-stretch md:flex-row flex-col gap-[1em] md:gap-[3em] xl:gap-[6em] <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
       <?php if($columns_content_one): $animation_delay = 1; ?>
        <div class="flex flex-col md:text-right text-left justify-between md:gap-y-0 gap-y-[1em]">   
            <?php foreach ($columns_content_one as $column) :                
                
                 $title = $column['title'];                
                 $duration = $animation_delay . 's'; ?>
                <div class="animate__animated" data-animation="fadeLeft" data-duration="<?php echo esc_attr($duration); ?>">
                    <div class="flex flex-row md:flex-col h-full relative md:justify-between md:items-center">           
                    <?php if(!empty($graphic)): 
                        echo wp_get_attachment_image(
                            $graphic['ID'],
                            'full',
                            false,
                            array(
                                'class' => 'w-[24px] min-w-[24px] h-[27px] md:hidden block object-contain animate__animated',
                                'alt' => esc_attr($graphic['alt']),  
                                'data-animation' => 'fadeIn',
                                'data-duration' => '1s'                
                                    )
                                );
                            endif; ?>        
                          <?php if($title): ?>
                                <h4 class="text-primary font-normal md:pl-0 pl-[20px]"><?php echo $title; ?></h4>
                            <?php endif; ?>                     
                    </div>
                </div>
            <?php $animation_delay += 0.75; endforeach; ?>      
        </div>
        <?php endif; ?> 
       
        <?php if(!empty($graphic)): 
         echo wp_get_attachment_image(
            $graphic['ID'],
            'full',
            false,
            array(
                'class' => 'lg:max-w-[300px] xl:max-w-[380px] h-fit md:block hidden object-contain mx-auto animate__animated',
                'alt' => esc_attr($graphic['alt']),  
                'data-animation' => 'fadeBottom',
                'data-duration' => '1s'                
            )
        );
     endif; ?>        
     
     <?php if($columns_content_two): $animation_delay = 1; ?>
     <div class="flex flex-col md:text-right text-left justify-between md:gap-y-0 gap-y-[1em]">  
            <?php foreach ($columns_content_two as $column) :                
                
                 $title = $column['title'];                
                 $duration = $animation_delay . 's'; ?>
                <div class="animate__animated" data-animation="fadeRight" data-duration="<?php echo esc_attr($duration); ?>">
                <div class="flex flex-row md:flex-col h-full relative md:justify-between md:items-center">           
                    <?php if(!empty($graphic)): 
                        echo wp_get_attachment_image(
                            $graphic['ID'],
                            'full',
                            false,
                            array(
                                'class' => 'w-[24px] min-w-[24px] h-[27px] md:hidden block object-contain animate__animated',
                                'alt' => esc_attr($graphic['alt']),  
                                'data-animation' => 'fadeIn',
                                'data-duration' => '1s'                
                                    )
                                );
                            endif; ?>        
                          <?php if($title): ?>
                                <h4 class="text-primary font-normal md:pl-0 pl-[20px]"><?php echo $title; ?></h4>
                            <?php endif; ?>                     
                    </div>
                </div>
            <?php $animation_delay += 0.75; endforeach; ?>      
        </div>
        <?php endif; ?> 
       </div>  
    </div>    
</section>

<?php }
?>

