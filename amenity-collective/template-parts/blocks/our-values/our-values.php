<?php
$values = get_field('our_values');
if ($values) {
    
    $heading = $values['heading'];
    $main_heading = $values['main_heading']; 
    $subheading = $values['subheading'];      
    $bg_type = $values['bg_type'];  
    $bg_color = $values['bg_color'];    
    $imagebg = $values['bg_image_desktop'];   
    $image_mobile = $values['bg_image_mobile'];  
    $video = $values['bg_video']; 
    $alignment = $values['vertical_alignment'];
    $our_values = $values['values_list'];
   

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';


    //Spacing Settings
    $spacing = $values['spacing'];
    $spacing_top_desktop = $values['spacing_top_desktop'];
    $spacing_bottom_desktop = $values['spacing_bottom_desktop'];
    $spacing_top_mobile = $values['spacing_top_mobile'];
    $spacing_bottom_mobile = $values['spacing_bottom_mobile'];

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

     //Background Settings 
     $bg_sett = "max-w-full relative overflow-hidden bg-no-repeat h-[1340px] sm:h-[1270px] md:h-[1225px] lg:h-[800px] ";
   
?>

<section class="our-values-section <?php echo esc_attr($bg_sett); ?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if(!empty($imagebg) && $bg_type == "image"):?>style="background-image: url(<?php echo esc_url($imagebg['url']); ?>)"<?php endif; ?>>   
    <?php if($bg_type == "video"): ?>
    <video id="background-video" autoplay loop muted playsinline style="pointer-events: none;" class="absolute top-0 lef-0 w-full h-full z-[1] object-cover filter blur-xl">
        <?php if($video): ?>
        <source src="<?php echo $video['url']; ?>" type="video/mp4">
        <?php endif; ?>
    </video>  
    <?php endif; ?>
    <div class="overlay <?php echo esc_attr($container_classes); ?> absolute z-[2] top-0 left-0 py-3em lg:py-0 lg:px-0 px-[0]" <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="container mx-auto text-center">            
            
            <?php if ($main_heading) : ?>
                <h2 class="text-secondary-light mb-[15px]  animate__animated" data-animation="fadeIn" data-duration="1.2s">
                    <?php echo $main_heading; ?>
                </h2>
            <?php endif; ?>  
            <?php if ($subheading) : ?>
                <h3 class="text-white custom-span leading-[1.7] mb-[32px] animate__animated" data-animation="fadeIn" data-duration="1.3s">
                    <?php echo $subheading; ?>
                </h3>
            <?php endif; ?>    
            <?php if ($heading) : ?>
                <h2 class="text-secondary-light mb-[15px]  animate__animated" data-animation="fadeIn" data-duration="1.2s">
                    <?php echo $heading; ?>
                </h2>
            <?php endif; ?>    
             
                           
            <div class="block  w-full h-[2px] mt-[32px] mb-[32px] bg-tertiary-dark"></div>   
            <?php if ($our_values):  $i = 1; ?>  
               <div class="flex flex-col lg:flex-row flex-nowrap justify-between gap-[32px]">
                  <!-- Counters Repeater -->
                 <?php foreach ($our_values as $column):                         
                        $heading = $column['title'];
                        $icon = $column['icon'];   ?>
                         <?php if( $i > 1 ): ?>
                            <div class="h-[2px] lg:h-full w-full mx-auto lg:w-[2px] bg-tertiary-dark lg:min-h-[176px]"></div>
                        <?php endif; ?>
                        <div class="animate__animated" data-animation="fadeBottom" data-duration="1.2s">
                            <div class="flex flex-col h-full relative group justify-center items-center text-center transition-all duration-300 hover:-translate-y-[10px] <?php if($i == 1): ?> xl:pl-[3em] xl:pr-[3em] <?php endif; ?> cursor-pointer modal-trigger" data-modal-id="modal-value-<?php echo $i; ?>">     
                                <?php if(!empty($icon)): ?>
                                    <?php echo wp_get_attachment_image($icon['ID'], 'full', false, array('class' => 'w-[60px] h-[60px] object-contain object-bottom mb-4')); ?>        
                                <?php endif; ?>                             
                                <?php if ($heading) : ?>
                                    <div class="font-text-font uppercase 2xl:text-[36px] text-[28px] text-tertiary-light font-bold tracking-[0.72px]">
                                        <?php echo $heading; ?>
                                    </div>
                                <?php endif; ?>  
                            </div>
                        </div>
                  <?php $i++; endforeach; ?>
               </div>
            <?php endif; ?>    
            <div class="hidden lg:block w-full h-[2px] mt-[32px] mb-[22px] bg-tertiary-dark"></div>                   
         </div>         
       </div> 
</section>   
<?php if(!empty($image_mobile)): ?>
    <style>
        @media (max-width: 575.98px) {
            .our-values-section{
                background-image: url(<?php echo esc_url($image_mobile['url']); ?>) !important;
            }
         }
    </style>
<?php endif; ?>    
<?php if ($our_values):  $i = 1; ?>  
<?php foreach ($our_values as $column): 
    $heading = $column['title']; 
    $description = $column['description']; 
    $modal_bg_color = $column['modal_bg_color'];
    $text_color = $column['text_color']; ?>
     <!-- Modal -->
     <div id="modal-value-<?php echo $i; ?>" class="hidden fixed inset-0 max-w-full bg-black bg-opacity-40 flex items-center justify-center overflow-y-auto lg:p-12 py-12 px-2 z-[99999] transition-opacity duration-300 ease-in-out opacity-0">
                <div class="w-full lg:max-w-[600px] max-w-fit lg:p-[60px] pt-[52px] pb-[47px] px-[20px] relative lg:border-8 border-5 border-foreground shadow-custom overflow-y-auto max-h-[90vh] lg:max-h-max transform scale-95 transition-transform duration-300 custom-scroll" <?php if($modal_bg_color): ?>style="background-color: <?php echo $modal_bg_color;?>"<?php endif; ?>>
                    <!-- Close Button -->
                    <button class="absolute top-4 right-4 modal-close" aria-label="Close modal">
                        <svg class="lg:block hidden" xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 46 46" fill="none">
                        <path d="M37.4627 34.412C37.8678 34.817 38.0954 35.3664 38.0954 35.9393C38.0954 36.5122 37.8678 37.0616 37.4627 37.4667C37.0576 37.8717 36.5082 38.0993 35.9354 38.0993C35.3625 38.0993 34.8131 37.8717 34.408 37.4667L22.9997 26.0547L11.5877 37.4631C11.1826 37.8681 10.6332 38.0957 10.0604 38.0957C9.48752 38.0957 8.93811 37.8681 8.53304 37.4631C8.12796 37.058 7.90039 36.5086 7.90039 35.9357C7.90039 35.3628 8.12796 34.8134 8.53304 34.4084L19.945 23L8.53663 11.5881C8.13155 11.183 7.90398 10.6336 7.90398 10.0607C7.90398 9.48785 8.13155 8.93845 8.53663 8.53337C8.94171 8.12829 9.49111 7.90072 10.064 7.90072C10.6368 7.90072 11.1862 8.12829 11.5913 8.53337L22.9997 19.9453L34.4116 8.53157C34.8167 8.1265 35.3661 7.89893 35.939 7.89893C36.5118 7.89893 37.0612 8.1265 37.4663 8.53157C37.8714 8.93665 38.099 9.48605 38.099 10.0589C38.099 10.6318 37.8714 11.1812 37.4663 11.5863L26.0544 23L37.4627 34.412Z" fill="#A88E6B"/>
                        </svg>
                        <svg class="lg:hidden block" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M15.6629 14.0465C15.8775 14.2611 15.9981 14.5521 15.9981 14.8556C15.9981 15.1591 15.8775 15.4502 15.6629 15.6648C15.4483 15.8794 15.1572 16 14.8537 16C14.5502 16 14.2591 15.8794 14.0444 15.6648L8 9.61883L1.95365 15.6629C1.73903 15.8775 1.44794 15.9981 1.14442 15.9981C0.840901 15.9981 0.549813 15.8775 0.335193 15.6629C0.120573 15.4483 4.52279e-09 15.1572 0 14.8537C-4.52279e-09 14.5502 0.120573 14.2592 0.335193 14.0446L6.38155 8.00048L0.337097 1.95448C0.122476 1.73987 0.0019041 1.4488 0.00190411 1.1453C0.00190411 0.841803 0.122476 0.550732 0.337097 0.336125C0.551717 0.121517 0.842805 0.000951818 1.14632 0.000951815C1.44984 0.000951812 1.74093 0.121517 1.95555 0.336125L8 6.38212L14.0464 0.335173C14.261 0.120565 14.5521 -5.05633e-09 14.8556 0C15.1591 5.05633e-09 15.4502 0.120565 15.6648 0.335173C15.8794 0.54978 16 0.84085 16 1.14435C16 1.44785 15.8794 1.73892 15.6648 1.95353L9.61845 8.00048L15.6629 14.0465Z" fill="#A88E6B"/>
                        </svg>
                     </button>

                    <!-- Modal Content -->
                    <div class="flex flex-col lg:flex-row items-start lg:gap-[60px] gap-[23px]">
                        <div class="w-full">
                              <?php if ($heading) : ?>
                                    <div class="font-text-font text-center uppercase 2xl:text-[36px] text-[28px] <?php if($text_color == "white"){ ?> text-white <?php }else{ ?> text-foreground <?php } ?> font-bold tracking-[0.72px]">
                                        <?php echo $heading; ?>
                                    </div>
                                <?php endif; ?> 
                             <?php if($description): ?><div class="mt-4 content-value text-center font-primary-font <?php if($text_color == "white"){ ?> text-white <?php }else{ ?> text-foreground <?php } ?>"><?php echo $description; ?></div><?php endif; ?>                        
                        </div>   
                    </div>
                </div>
            </div>
<?php $i++; endforeach; ?>
<?php endif; ?> 

<?php } ?>



