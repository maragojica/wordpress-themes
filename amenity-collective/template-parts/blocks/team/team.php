<?php
$team = get_field('team');
if ($team) {    
         
    $bg_color = $team['bg_color'];     
    $top_shape = $team['top_shape'];  
    $bottom_shape = $team['bottom_shape'];
    $alignment = $team['vertical_alignment'];   
    $team_section = $team['team_section'];  
  

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';


    //Spacing Settings
    $spacing = $team['spacing'];
    $spacing_top_desktop = $team['spacing_top_desktop'];
    $spacing_bottom_desktop = $team['spacing_bottom_desktop'];
    $spacing_top_mobile = $team['spacing_top_mobile'];
    $spacing_bottom_mobile = $team['spacing_bottom_mobile'];

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

<section class="team-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <?php if(!empty($top_shape)): 
         echo wp_get_attachment_image(
            $top_shape['ID'],
            'full',
            false,
            array(
                'class' => 'absolute right-0  top-0 lg:-top-[0] z-[1] h-[169px] md:h-[350px] lg:h-[471px] object-contain lg:block hidden',
                'alt' => esc_attr($top_shape['alt']),                
            )
        );
     endif; ?>
    <?php if(!empty($bottom_shape)): 
         echo wp_get_attachment_image(
            $bottom_shape['ID'],
            'full',
            false,
            array(
                'class' => 'absolute left-0 bottom-0 z-[1] lg:-bottom-[0] h-[169px] md:h-[350px] lg:h-[471px] object-contain',
                'alt' => esc_attr($bottom_shape['alt']),                
            )
        );
     endif; ?>
     <div class="container mx-auto">       
        <?php $j = 1; if($team_section): 
             foreach ($team_section as $index => $team_info) : 
                $heading = $team_info['headline'];               
                $description = $team_info['description'];
                $all_team = $team_info['team_members_info']; ?>   
                 <div class="relative z-[2] <?php if($j > 1): ?> mt-4 <?php endif; ?>">            
                    <?php if ($heading) : ?>
                        <h2 class="text-secondary mb-6 text-center">
                            <?php echo $heading; ?>
                        </h2>
                        <?php endif; ?> 
                        <?php if($description): ?>
                        <div class="text-center font-text-font text-foreground  mb-8 style-disc mx-auto md:max-w[80%] lg:max-w-[56%] animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                            <?php echo $description; ?>                   
                        </div>
                        <?php endif; ?>
                    <?php if( $all_team ): ?>
                    <div class="flex relative flex-row justify-center flex-wrap mx-auto" >
                        <?php foreach( $all_team as $post ): 
                        setup_postdata($post); 
                            $title = get_the_title($post->ID); 
                            $position = get_field('position', $post->ID);  
                            $company = get_field('company', $post->ID);         
                            $linkedin = get_field('linkedin', $post->ID); 
                            $bio = get_field('bio', $post->ID); ?>
                            <div class="w-1/2 lg:w-1/4 lg:mb-[60px] mb-[32px] px-[8px] lg:px-[15px]">
                                <div class="flex flex-col h-full bg-[#EEF4F9] group rounded-tl-[27px] lg:rounded-tl-[72px] hover:rounded-none cursor-pointer modal-trigger" data-modal-id="modal-team-<?php echo $post->ID; ?>">
                                    <div class="rounded-tl-[72px] h-fit xs:h-[197px] sm:h-[260px] md:h-[320px] lg:h-[260px] xl:h-[320px] relative">
                                        <?php 
                                        if ( has_post_thumbnail( $post->ID ) ): 
                                            echo get_the_post_thumbnail( 
                                                $post->ID,
                                                'full', 
                                                array( 
                                                    'class' => 'team-img w-full h-full object-cover object-top lg:rounded-tl-[72px] lg:rounded-br-[300px] rounded-tl-[27px] rounded-br-[87px] transition-all duration-300 ease-in-out lg:group-hover:rounded-none'
                                                ) 
                                            ); 
                                        endif; 
                                        ?>
                                        <div class="overlay-team w-full h-full opacity-0 absolute z-2 top-0 left-0 border-8 border-foreground bg-transparent transition-all duration-300 ease-in-out lg:group-hover:opacity-100">
                                            <div class="w-full h-full relative">
                                                <div class="absolute bottom-[40px] left-0">
                                                    <button class="rounded-tr-[70px] rounded-br-[70px] px-[25px] py-[18px] text-[18px] font-primary-font uppercase tracking-[1.08px] font-semibold text-white bg-foreground border-2 border-foreground hover:bg-white hover:text-foreground hover:border-white hover:border-l-0 transition-all ease-in-out duration-300 modal-trigger" data-modal-id="modal-team-<?php echo $post->ID; ?>">
                                                        VIEW BIO
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:p-[22px] p-[10px] flex flex-col">
                                        <div class="flex-grow">
                                        <?php if($title): ?>
                                            <h3 class="text-foreground lg:text-[22px] sm:text-[18px] xs:text-[16px] text-[14px] font-semibold font-primary-font"><?php echo $title; ?></h3>
                                        <?php endif; ?>
                                        <?php if($position): ?>
                                            <div class="text-foreground lg:text-[18px] md:text-[16px] sm:text-[14px] text-[10px] font-medium font-primary-font"><?php echo $position; ?></div>
                                        <?php endif; ?>
                                        <?php if($company): ?>
                                            <div class="text-foreground lg:text-[18px] md:text-[16px] sm:text-[14px] text-[10px] font-normal font-primary-font italic"><?php echo $company; ?></div>
                                        <?php endif; ?>
                                        </div>
                                        <button class="lg:hidden block rounded-[70px] px-[16px] py-[3px] text-[12px] font-primary-font uppercase tracking-[0.72px] font-semibold mt-2 text-white max-w-fit bg-foreground modal-trigger" data-modal-id="modal-team-<?php echo $post->ID; ?>">
                                            VIEW BIO
                                        </button>
                                    </div>
                                </div>
                            </div>    
                        
                        <?php endforeach; ?>  
                    </div>
                    
                <?php wp_reset_postdata(); endif; ?>
           </div>
       <?php $j++; endforeach; endif;   ?>       
      </div>  
</section> 
<?php   if($team_section):
    foreach ($team_section as $index => $team_info) :   $all_team = $team_info['team_members_info']; ?>
<?php if( $all_team ): ?>
    <?php foreach( $all_team as $post ): 
        setup_postdata($post); 
            $name = get_the_title($post->ID); 
            $position = get_field('position', $post->ID);  
            $company = get_field('company', $post->ID); 
            $years_of_service = 1; 
            $startDate = get_field('start_date', $post->ID);
            if ($startDate) {
                $startDateTime = new DateTime($startDate);
                $currentDateTime = new DateTime();
                $interval = $startDateTime->diff($currentDateTime);            
                // Get the difference in years
                $years_of_service = $interval->y;
            }
            $linkedin = get_field('linkedin', $post->ID); 
            $bio = get_field('bio', $post->ID); ?>
            <!-- Modal -->
            <div id="modal-team-<?php echo $post->ID; ?>" class="hidden fixed inset-0 max-w-full bg-black bg-opacity-40 flex 2xl:items-center items-start justify-center overflow-y-auto lg:p-12 py-12 px-2 z-[99999] transition-opacity duration-300 ease-in-out opacity-0">
                <div class="bg-offwhite w-full 2xl:max-w-[1368px] max-w-fit lg:p-[60px] pt-[52px] pb-[47px] px-[20px] relative lg:border-8 border-5 border-foreground shadow-custom overflow-y-auto max-h-[90vh] lg:max-h-max transform scale-95 transition-transform duration-300 custom-scroll">
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
                        <div class="w-full lg:w-2/5">
                        <?php echo get_the_post_thumbnail($post->ID, 'full', ['class' => 'w-full h-[328px] sm:h-fit 2xl:h-[528px] object-cover object-top']); ?>
                          <!--<div class="flex items-center gap-5 mt-4">                          
                            <?php if ($linkedin) :
                                $url = $linkedin['url'];
                                $title = $linkedin['title'];
                                $target = $linkedin['target'] ? $linkedin['target'] : '_self'; ?>
                                <a class="group" href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="33" viewBox="0 0 34 33" fill="none">
                                <path d="M7.71812 32.9992V10.7334H0.429609V32.9992H7.71888H7.71812ZM4.07539 7.69389C6.61651 7.69389 8.19853 5.98414 8.19853 3.84743C8.15097 1.66204 6.61651 0 4.12371 0C1.6292 0 0 1.66204 0 3.84724C0 5.98395 1.58145 7.6937 4.02763 7.6937H4.07482L4.07539 7.69389ZM11.7524 32.9992H19.0404V20.5663C19.0404 19.9017 19.0879 19.2354 19.2805 18.7607C19.8071 17.4306 21.0063 16.0537 23.0202 16.0537C25.6569 16.0537 26.7122 18.0954 26.7122 21.0889V32.9992H34V20.2327C34 13.3939 30.4048 10.2114 25.6097 10.2114C21.6783 10.2114 19.9517 12.4426 18.9924 13.9622H19.0409V10.7342H11.7528C11.8479 12.823 11.7522 33 11.7522 33L11.7524 32.9992Z" fill="#A88E6B" class="group-hover:fill-foreground transition-all ease-in-out duration-300"/>
                                </svg>
                                </a>
                            <?php endif; ?>
                            
                          </div>-->                           
                        </div>                        
                        <div class="flex-1">
                            <?php if($name): ?><h2 class="lg:text-[44px] text-[32px] font-primary-font tracking-[0.88px] font-bold text-secondary"><?php echo $name; ?></h2><?php endif; ?>
                            <?php if($position):?><div class="font-primary-font text-[24px] font-bold text-foreground"><?php echo $position; ?></div><?php endif; ?>
                            <?php if($company):?><div class="font-primary-font text-[20px] font-medium text-foreground italic"><?php echo $company; ?></div><?php endif; ?>
                            <?php if($bio): ?><div class="mt-4 font-primary-font lg:bodymd text-[16px] text-foreground"><?php echo $bio; ?></div><?php endif; ?>    
                            <h3 class="text-foreground font-normal lg:text-[22px] text-[18px] mb-0 mt-[7px]">Years of Service: <span class="font-semibold"><?php echo $years_of_service; ?></span></h3>                        
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>  
<?php wp_reset_postdata(); endif; ?>

<?php endforeach; endif; ?>
<?php } ?>


