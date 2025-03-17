<?php
$content_block = get_field('content_block_process');
if ($content_block) {
    
    $heading = $content_block['heading'];    
    $image = $content_block['main'];    
    $bg_color = $content_block['bg_color'];    
    $process_info = $content_block['process_info'];  
    
    
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
      $container_classes = 'h-full lg:flex flex-col lg:flex-row hidden ';
      $content_width = 'lg:w-1/3';     
   
?>

<section class="the-process-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="w-full pl-[22px] lg:pl-0 pr-[22px] lg:pr-0 mx-auto">
        <div class="w-full animate__animated" data-animation="fadeIn" data-duration="1.5s">   
            <?php if ($heading) : ?>
                <h2 class="text-secondary lg:mb-[52px] mb-3">
                    <?php echo $heading; ?>
                </h2>
            <?php endif; ?>                
        </div>
        <?php if($process_info): ?>
        <div class="lg:block hidden">
            <div class="w-full animate__animated" data-animation="fadeIn" data-duration="1.5s" >           
            <?php  if(!empty($image)): 
                        echo wp_get_attachment_image(
                            $image['ID'],
                            'full',
                            false,
                            array(
                                'class' => 'transition-all duration-300 h-fit w-full',
                                'alt' => esc_attr($image['alt']),
                            )
                        );
                    endif;  ?>                      
            </div>  
            <div class="<?php echo esc_attr($container_classes); ?>">
            <?php $animation_delay = 1; $count = 1;  foreach ($process_info as $column):                
                $title = $column['title'];                           
                $duration = $animation_delay . 's';  ?>
                 <div class="w-full lg:w-1/3 text-center mt-[48px]  animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                     <?php if($count): ?>
                        <h2 class="text-primary mb-0"><?php echo $count;?></h2>
                     <?php endif; ?>   
                     <?php if($title): ?>
                        <h3 class="text-secondary mb-0"><?php echo $title;?></h3>
                     <?php endif; ?> 
                 </div>
       <?php $animation_delay += 0.30; $count++; endforeach; ?> 
            </div>         
        </div>
        <div class="lg:hidden block">
        <div class="slider-process slider-fluid-full owl-carousel owl-theme relative overflow-hidden">
        <?php  $count = 1; foreach ($process_info as $column):                
                $title = $column['title'];
                $image = $column['image'];  ?>
                 <div class="process-slide fluid-slide h-full item flex-col text-center p-[3px]">
                 <?php  echo wp_get_attachment_image(
                            $image['ID'],
                            'full',
                            false,
                            array(
                                'class' => 'transition-all duration-300 w-full h-fit mb-[1em]',
                                'alt' => esc_attr($image['alt']),
                            )
                        ); ?>
                 <?php if($count): ?>
                        <h2 class="text-primary mb-0"><?php echo $count;?></h2>
                     <?php endif; ?>   
                     <?php if($title): ?>
                        <h3 class="text-secondary mb-0"><?php echo $title;?></h3>
                     <?php endif; ?> 
                 </div>
       <?php $count++; endforeach; ?> 
        </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php }
?>

