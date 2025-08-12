<?php
$content = get_field('info_icons');
if ($content) {    
    $heading = $content['heading'];   
    $subheading = $content['subheading'];   
    $description = $content['description'];    
    $info_list = $content['info_list'];
  

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';


    //Spacing Settings
    $spacing = $content['spacing'];
    $spacing_top_desktop = $content['spacing_top_desktop'];
    $spacing_bottom_desktop = $content['spacing_bottom_desktop'];
    $spacing_top_mobile = $content['spacing_top_mobile'];
    $spacing_bottom_mobile = $content['spacing_bottom_mobile'];

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

    //Container Settings

    $container_classes = 'w-full flex-wrap h-full flex flex-col md:flex-row md:mx-[-30px] ';
    
?>

<section class="info-icons-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >  
     <div class="container mx-auto">  
     <?php if( $info_list ): $animation_delay = 1.75; ?> 
        <div class="<?php echo esc_attr($container_classes); ?> gap-y-[30px]">
            <div class="w-full lg:w-1/2 xl:w-1/3 lg:px-[15px]" >
                <?php if ($subheading) : ?>
                <div class="text-sub text-secondary mb-[15px]" data-aos="fade-up" >
                    <?php echo $subheading; ?>
                </div> 
                <?php endif; ?>
                <?php if($heading): ?>
                    <h2 class="text-primary uppercase" data-aos="fade-up">
                        <?php echo $heading; ?>
                    </h2> 
                <?php endif; ?> 
                <?php if($description): ?>
                    <div class="text-black style-disc" data-aos="fade-up">                 
                        <?php echo $description; ?>                   
                    </div>
                 <?php endif; ?> 
            </div>
        <?php foreach ($info_list as $column): 
                $icon = $column['icon']; 
                $title = $column['title']; ?>
                <div class="w-full md:w-1/2 lg:w-1/2 xl:w-1/3 lg:px-[15px]" data-aos="fade-up" >
                    <div class="flex flex-col w-full h-full items-start text-left p-[20px] lg:p-[30px] border-2 border-white bg-white shadow-[0px_4px_11px_1px_rgba(0,0,0,0.18)] hover:-translate-y-1 transition-transform duration-300">
                        <?php  if(!empty($icon)): 
                        echo wp_get_attachment_image(
                            $icon['ID'],
                            'full',
                            false,
                            array(
                                'class' => 'transition-all duration-300 h-[70px] 2xl:h-[101px] object-contain',
                                'alt' => esc_attr($icon['alt']),
                            )
                        );
                    endif;  ?>
                      <div>
                          <?php if($title): ?>
                             <h4 class="text-[#0066CA] uppercase mt-[30px] lg:mt-[60px] mb-0"><?php echo $title;?></h4>
                           <?php endif; ?> 
                      </div>      
                    </div>
                </div>
        <?php endforeach; ?> 
        </div>     
    <?php endif; ?>
     </div>       
</section> 
<?php }?>


