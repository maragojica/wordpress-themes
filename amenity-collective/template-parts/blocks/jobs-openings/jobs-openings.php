<?php
$jobs = get_field('jobs');
if ($jobs) {
    
    $heading = $jobs['heading'];
    $subheading = $jobs['subheading'];     
    $description = $jobs['description'];       
    $bg_color = $jobs['bg_color'];     
    $add_border_bottom = $jobs['add_border_bottom'];   
    $alignment = $jobs['vertical_alignment'];   
    $jobs_list = $jobs['jobs_list'];
  

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';


    //Spacing Settings
    $spacing = $jobs['spacing'];
    $spacing_top_desktop = $jobs['spacing_top_desktop'];
    $spacing_bottom_desktop = $jobs['spacing_bottom_desktop'];
    $spacing_top_mobile = $jobs['spacing_top_mobile'];
    $spacing_bottom_mobile = $jobs['spacing_bottom_mobile'];

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

<section class="jobs-section max-w-full relative <?php if($add_border_bottom):?> border-b-[12px] border-b-primary <?php endif;?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
   
     <div class="container mx-auto">  
            <div class="w-full text-center mx-auto">
                <?php if ($heading) : ?>
                    <h2 class="text-secondary mb-[15px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $heading; ?>
                    </h2>
                <?php endif; ?>
                <?php if ($subheading) : ?>
                    <h3 class="text-foreground animate__animated" data-animation="fadeIn" data-duration="1.3s">
                        <?php echo $subheading; ?>
                    </h3>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="bodymedium mt-[10px] font-text-font text-foreground md:max-w[80%] lg:max-w-[46%] mx-auto animate__animated" data-animation="fadeIn" data-duration="1.4s">
                        <?php echo $description; ?>
                    </div>
                <?php endif; ?> 
            </div>  
          
            <?php if ($jobs_list):  ?>  
                <div class="flex flex-col lg:flex-row  justify-center lg:gap-[37px] mx-auto animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <?php foreach ($jobs_list as $column): 
                        $title = $column['title'];
                        $subtitle = $column['subtitle']; 
                        $text = $column['text']; 
                        $cta = $column['cta']; ?>   
                       <div class="w-full mt-4 lg:mb-0 lg:w-1/3">
                          <div class="flex flex-col h-full bg-white border-2 border-[#e9e9e9] lg:p-[34px] md:p-[25px] p-[20px]">
                          <div class="flex-grow">
                              <?php if($title):?>
                                 <h3 class="text-foreground mb-0"><?php echo $title;?></h3>
                               <?php endif; ?>  
                               <?php if($subtitle):?>
                                 <div class="text-secondary text-[18px] lg:text-[26px] font-semibold"><?php echo $subtitle;?></div>
                               <?php endif; ?>   
                               <?php if ($text) : ?>
                                <div class="bodymedium lg:mt-[14px] mt-[10px] font-text-font text-foreground">
                                    <?php echo $text; ?>
                                </div>
                            <?php endif; ?> 
                            </div>
                           <?php if ($cta) :
                                $url = $cta['url'];
                                $title = $cta['title'];
                                $target = $cta['target'] ? $cta['target'] : '_self';  ?>
                                <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="min-w-min group mt-4 items-center lg:mt-6 btn btn_style4 flex justify-center lg:gap-[18px] gap-[8px]">
                                  <svg class="lg:max-w-[28px] max-w-[20px]" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                    <g clip-path="url(#clip0_1331_6208)">
                                        <path d="M22.1667 0H5.83333C2.61217 0 0 2.61217 0 5.83333V22.1667C0 25.3878 2.61217 28 5.83333 28H22.1667C25.389 28 28 25.3878 28 22.1667V5.83333C28 2.61217 25.389 0 22.1667 0ZM9.33333 22.1667H5.83333V9.33333H9.33333V22.1667ZM7.58333 7.854C6.45633 7.854 5.54167 6.93233 5.54167 5.796C5.54167 4.65967 6.45633 3.738 7.58333 3.738C8.71033 3.738 9.625 4.65967 9.625 5.796C9.625 6.93233 8.7115 7.854 7.58333 7.854ZM23.3333 22.1667H19.8333V15.6287C19.8333 11.6993 15.1667 11.9968 15.1667 15.6287V22.1667H11.6667V9.33333H15.1667V11.3925C16.7953 8.3755 23.3333 8.15267 23.3333 14.2812V22.1667Z" fill="white" class="group-hover:fill-primary"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1331_6208">
                                        <rect width="28" height="28" fill="white" class="group-hover:fill-primary"/>
                                        </clipPath>
                                    </defs>
                                    </svg>
                                    <?php echo esc_html($title); ?>
                                </a>
                            <?php endif; ?>
                          </div>
                       </div>
                 <?php endforeach; ?> 
                 </div>          
            <?php endif; ?>         
         </div>
</section> 
<?php }?>

