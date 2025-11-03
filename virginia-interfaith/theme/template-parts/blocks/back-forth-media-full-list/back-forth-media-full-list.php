<?php
$content_block = get_field('content_block_media_full_list');
if ($content_block) {
    
    $bg_color = $content_block['bg_color'];
    $text_color = $content_block['text_color'];
    $add_top_wave = $content_block['add_top_wave'];
    $add_bottom_wave = $content_block['add_bottom_wave'];    
    $top_wave_color = $content_block['top_wave_color']; 
    $bottom_wave_color = $content_block['bottom_wave_color']; 
     $hide_top_wave_mobile = $content_block['hide_top_wave_mobile'];
    $hide_bottom_wave_mobile = $content_block['hide_bottom_wave_mobile'];
     $heading = $content_block['heading'];
    $heading_type = $content_block['heading_type'];
    $subheading = $content_block['subheading'];  
    $description = $content_block['description']; 
    $buttons = $content_block['buttons']; 
    $image = $content_block['image'];
    $list_items = $content_block['list_items'];   
    $reverse_desktop = in_array('yes', $content_block['reverse_order_desktop']);
    $reverse_mobile = in_array('yes', $content_block['reverse_order_mobile']);
    $alignment = $content_block['vertical_alignment']; 
    $columns_size = $content_block['columns_size']; 
    $columns_gap = $content_block['columns_gap']; 
    $row_gap = $content_block['row_gap'];
    $container_classes = ' flex flex-col lg:flex-row ' . ($reverse_desktop ? 'lg:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
   

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
    } elseif($bg_color === 'dark-blue'){
        $bg_class = 'bg-secondary';
    } elseif($bg_color === 'bone'){
        $bg_class = 'bg-accent';
    }    
    $text_color_class = '';
    switch ($text_color) {
        case 'dark':
            $text_color_class = 'text-foreground';
            break;
        case 'light':
            $text_color_class = 'text-white';
            break;
        default:
            $text_color_class = 'text-foreground';
            break;
    } 
   
    switch ($columns_size) {
        case 'equal':
            // 50/50 on medium and up, full width stacked on small
            $heading_width = 'w-full lg:w-1/2 flex flex-col'; 
            $content_width = 'w-full lg:w-1/2';  
            break;

        case 'wide':
            // 60/40 on medium and up, stacked on small
            $heading_width = 'w-full lg:w-7/12 flex flex-col';
            $content_width = 'w-full lg:w-5/12';
            break;

        case 'wide-reverse':
            // 40/60 on medium and up, stacked on small
            $heading_width = 'w-full lg:w-5/12 flex flex-col';
            $content_width = 'w-full lg:w-7/12 flex flex-col';
            break;

        case 'narrow':
            // 45/55 on medium and up, stacked on small
            $heading_width = 'w-full lg:w-[45%] flex flex-col';
            $content_width = 'w-full lg:w-[55%] flex flex-col';
            break;

        case 'narrow-reverse':
            // 55/45 on medium and up, stacked on small
            $heading_width = 'w-full lg:w-[55%] flex flex-col';
            $content_width = 'w-full lg:w-[45%] flex flex-col';
            break;

        default:
            // Fallback to equal
        $heading_width = 'w-full lg:w-1/2 flex flex-col'; 
            $content_width = 'w-full lg:w-1/2 flex flex-col';
            break;
    }
        
    $columns_gap_class = '';
    switch ($columns_gap) {
        case 'small':
            if ($reverse_desktop) {
                $columns_gap_class = ' lg:pl-[20px] xl:pl-[40px] lg:pr-0';
            } else {
                $columns_gap_class = ' lg:pr-[20px] xl:pr-[40px] lg:pl-0';
            }
            break;
        case 'medium':
            if ($reverse_desktop) {
                $columns_gap_class = ' lg:pl-[30px] xl:pl-[50px] lg:pr-0';
            } else {
                $columns_gap_class = ' lg:pr-[30px] xl:pr-[50px] lg:pl-0';
            }
            break;
        case 'large':
            if ($reverse_desktop) {
                $columns_gap_class = ' lg:pl-[40px] xl:pl-[70px] lg:pr-0';
            } else {
                $columns_gap_class = ' lg:pr-[40px] xl:pr-[70px] lg:pl-0';
            }
            break;
        default:   
            if ($reverse_desktop) {
                $columns_gap_class = ' lg:pl-[40px] xl:pl-[70px] lg:pr-0';
            } else {
                $columns_gap_class = ' lg:pr-[40px] xl:pr-[70px] lg:pl-0';
            }
            break; 
    }

    $row_gap_class = '';
    switch ($row_gap) {
        case 'small':
            $row_gap_class = ' lg:py-[12px] ';
            break;
        case 'medium':
            $row_gap_class = ' lg:py-[40px] ';
            break;
        case 'large':
            $row_gap_class = ' lg:py-[60px] ';
            break;
        default:   
            $row_gap_class = ' lg:py-[40px] ';
            break; 
                }

                 $top_wave = '';
    $bottom_wave = '';
    if($add_bottom_wave || $add_top_wave){
        switch ($top_wave_color) {
            case 'neutral':
                $top_wave = '/shapes/top-wave-neutral.svg';                
                break;
            case 'blue-swish-to-white': 
               $top_wave = '/shapes/top-wave-blue-swish.svg';              
                break;
             case 'blue-swish-to-bone': 
               $top_wave = '/shapes/top-wave-blue-swish-neutral.svg';
                break;           
            default:
                $top_wave = '/shapes/top-wave-neutral.svg';                            
                break;
        }

        switch ($bottom_wave_color) {
            case 'neutral':
                if($reverse_desktop){
                    $bottom_wave =  '/shapes/bottom-wave-neutral.svg';                   
                }else{
                     $bottom_wave =  '/shapes/bottom-wave-neutral-reverse.svg';
                } 
                break;
            case 'blue-swish-to-white': 
                $bottom_wave =  '/shapes/bottom-wave-blue-swish.svg';
                break;
             case 'blue-swish-to-bone':               
                $bottom_wave =  '/shapes/bottom-wave-blue-swish-neutral.svg';
                break;  
            case 'dark-blue':                
                 $bottom_wave =  '/shapes/bottom-wave-dark-blue.svg';
                break;
            default:
                if($reverse_desktop){
                    $bottom_wave =  '/shapes/bottom-wave-neutral.svg';                   
                }else{
                     $bottom_wave =  '/shapes/bottom-wave-neutral-reverse.svg';
                }             
                break;
        }
    }
?>

<section class="back-foth-media-full-items-section max-w-full relative overflow-hidden  <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>   
     <?php if($add_top_wave && $top_wave != ''){?>
        <div class="w-[100%] <?php if( $hide_top_wave_mobile): ?> lg:block hidden  <?php endif; ?> leading-[0] <?php echo $top_wave_color; ?>">
             <?php 
                $svg = file_get_contents(get_template_directory() . $top_wave);
                echo $svg;
                ?>
        </div>
    <?php } ?>     
       <div class="relative overflow-hidden mt-[-3px] mb-[-3px] <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?> <?php if($bg_color): echo $bg_class; endif; ?>">
        <div class="container mx-auto px-[2rem] sm:px-0 custom-p-info">
            <div class="w-full">
                 <?php if($subheading): ?>
                        <div class="eyebrow text-primary mb-[12px]"  >
                            <?php echo $subheading; ?>
                        </div>   
                    <?php endif; ?> 
                        <?php if ($heading) : ?>
                        <?php if($heading_type === 'headthree'): ?>
                            <h3 class="<?php echo esc_attr($text_color_class); ?> heading-shape mb-0" >
                                <?php echo $heading; ?>
                            </h3>
                        <?php elseif($heading_type === 'headtwo'): ?>
                            <h2 class="<?php echo esc_attr($text_color_class); ?> heading-shape mb-0" >
                                <?php echo $heading; ?>
                            </h2> 
                    <?php elseif($heading_type === 'headone'):?>
                         <h1 class="<?php echo esc_attr($text_color_class); ?> heading-shape mb-0" >
                                <?php echo $heading; ?>
                          </h1> 
                    <?php endif;  endif; ?>                     
                        <?php if($description): ?>
                        <div class="<?php echo esc_attr($text_color_class); ?> style-disc mt-[20px] xl:mt-[30px]" data-aos="fade-in" >                 
                            <?php echo $description; ?>                   
                        </div>
                    <?php endif; ?>  
            </div>
        </div>  
        <div class="w-full mx-auto mt-[50px] <?php if($reverse_desktop){ echo " pr-contain not-rp";}else{ echo " pl-contain not-lp";} ?> relative z-2">        
          <div class="<?php echo esc_attr($container_classes); ?> lg:gap-y-0 gap-y-[3em]">               
              <div class="<?php echo esc_attr($heading_width); ?> px-[2rem] custom-p-info <?php echo $row_gap_class; ?> <?php echo $columns_gap_class; ?>  justify-center">                      
                    <?php if($list_items): ?>
                        <div class="content-list-items flex flex-col lg:gap-y-[80px] gap-y-[30px]">
                            <?php foreach($list_items as $item): 
                                $icon = $item['icon'];
                                $title = $item['title'];
                                $text = $item['text']; ?>
                                <div class="flex md:items-center md:flex-row flex-col md:gap-y-0 gap-y-[20px] lg:gap-x-[64px] md:gap-x-[30px]">
                                    <?php if(!empty($icon)){ ?>
                                        <img src="<?php echo esc_url($icon['url']); ?>" 
                                            alt="<?php echo esc_attr($icon['alt']); ?>" class="w-[60px] h-[60px] lg:w-[100px] lg:h-[100px] object-contain mb-0" />
                                    <?php } ?>
                                    <div>
                                        <?php if($title): ?>
                                            <h3 class="<?php echo esc_attr($text_color_class); ?> mb-[10px]">
                                                <?php echo $title; ?>
                                            </h3>
                                        <?php endif; ?>
                                        <?php if($text): ?>
                                            <div class="<?php echo esc_attr($text_color_class); ?> mb-0">
                                                <?php echo $text; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>  
                    <?php if($buttons): ?>
                        <div class="button-container-wrap flex lg:flex-row flex-col gap-[20px] sm:w-fit w-full">
                            <?php foreach($buttons as $button): 
                                $button_link = $button['button_link'];
                                $button_style = $button['button_style'];
                                $is_external = $button['is_external'];
                                $is_download = $button['is_download'];
                                $is_email = $button['is_email'];
                                if ($button_link) :
                                    $url = $button_link['url'];
                                    $title = $button_link['title'];
                                    $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                    <div class="relative group sm:w-fit w-full">
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="btn sm:w-fit w-full <?php if($button_style): echo $button_style; endif;?>">
                                        <?php echo esc_html($title); ?>
                                        <?php if ($is_external){ ?>
                                            <span class="external-link-icon pl-[10px]" aria-hidden="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
                                                <path d="M0 12V1.9432H6.94225V3.33573H1.39085V10.6083H9.24745V6.3752H10.6391V12H0ZM4.85345 6.45547L10.4448 1.39173H7.49417V0H13L12.9446 0.088V5.528H11.554V2.2368L5.78699 7.48747L4.85345 6.45547Z" fill="#1F2133"/>
                                                </svg>
                                            </span>
                                        <?php }elseif($is_download){ ?>
                                            <span class="external-link-icon pl-[10px]" aria-hidden="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                                <mask id="mask0_4195_848" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="13" height="14">
                                                    <path d="M13 0.5H0V13.5H13V0.5Z" fill="white"/>
                                                </mask>
                                                <g mask="url(#mask0_4195_848)">
                                                    <path d="M1.63223 11.8653H11.4155V11.7648C11.4155 10.9834 11.4155 10.2022 11.4155 9.42102C11.4171 9.21589 11.4962 9.01896 11.6369 8.86972C11.7777 8.72049 11.9696 8.62997 12.1743 8.61634C12.379 8.60271 12.5813 8.66696 12.7406 8.79622C12.8999 8.92547 13.0044 9.11016 13.0332 9.31326C13.0396 9.35225 13.0434 9.39163 13.0445 9.43113C13.0445 10.5096 13.0445 11.5882 13.0445 12.6667C13.0486 12.8509 12.9899 13.0311 12.8779 13.1775C12.766 13.3239 12.6075 13.4278 12.4286 13.4721C12.3573 13.4901 12.284 13.499 12.2105 13.4987C8.41447 13.5 4.61847 13.5 0.822475 13.4987C0.714674 13.5005 0.607591 13.4808 0.507521 13.4407C0.407452 13.4006 0.316414 13.3408 0.23976 13.265C0.163106 13.1892 0.102383 13.0988 0.061161 12.9992C0.0199387 12.8996 -0.000951306 12.7927 -0.000280827 12.6849C-0.00259194 11.5871 -0.00259194 10.4888 -0.000280827 9.39011C0.00664698 9.18795 0.0886697 8.99562 0.229774 8.85068C0.370879 8.70574 0.560935 8.6186 0.762839 8.60625C0.964743 8.59391 1.164 8.65726 1.32171 8.78393C1.47942 8.9106 1.58426 9.09149 1.61576 9.29131C1.62473 9.35835 1.62936 9.4259 1.62963 9.49353C1.63059 10.2522 1.63059 11.0108 1.62963 11.7694V11.8639" fill="#1F2133"/>
                                                    <path d="M7.3589 7.43674C7.54956 7.24414 7.74023 7.05155 7.9309 6.85896C8.35267 6.43631 8.77243 6.01165 9.19796 5.59276C9.29913 5.48764 9.42673 5.41171 9.56737 5.37293C9.70801 5.33415 9.85649 5.33397 9.99723 5.37239C10.138 5.41081 10.2658 5.48642 10.3672 5.59128C10.4686 5.69614 10.5399 5.82638 10.5737 5.96831C10.611 6.10744 10.6094 6.25415 10.5691 6.39244C10.5288 6.53074 10.4513 6.65533 10.3451 6.75265C9.33923 7.75991 8.33264 8.7664 7.32538 9.77211C7.25345 9.84405 7.18094 9.91656 7.10988 9.98878C7.03377 10.0683 6.94231 10.1316 6.84105 10.1747C6.73979 10.2179 6.63082 10.2401 6.52075 10.2399C6.41067 10.2397 6.30177 10.2172 6.20064 10.1738C6.0995 10.1303 6.00824 10.0668 5.93236 9.98705C4.85384 8.90853 3.77533 7.82953 2.69681 6.75005C2.59163 6.65016 2.51513 6.52392 2.47526 6.38446C2.43538 6.245 2.43359 6.0974 2.47006 5.95701C2.50654 5.81662 2.57995 5.68857 2.68267 5.58615C2.78539 5.48374 2.91367 5.41071 3.05416 5.37465C3.19391 5.33412 3.3422 5.33339 3.48234 5.37254C3.62248 5.41168 3.74893 5.48915 3.84745 5.59623C4.43293 6.1794 5.01735 6.76363 5.60072 7.34892C5.6296 7.3778 5.6585 7.41131 5.68594 7.44251L5.70905 7.43443C5.70905 7.39417 5.70905 7.35402 5.70905 7.31396C5.70905 5.74587 5.70905 4.17769 5.70905 2.6094C5.70905 2.1649 5.70905 1.72049 5.70905 1.27618C5.70688 1.07624 5.77843 0.882501 5.91003 0.731958C6.04163 0.581415 6.22407 0.484612 6.4225 0.46003C6.62094 0.435449 6.82148 0.484811 6.98584 0.598693C7.1502 0.712575 7.26685 0.882998 7.31354 1.07743C7.33096 1.15174 7.3394 1.22788 7.33867 1.3042C7.34002 3.31121 7.34002 5.31812 7.33867 7.32494V7.42576L7.35832 7.43703" fill="#1F2133"/>
                                                </g>
                                            </svg>
                                            </span>
                                        <?php }elseif($is_email){  ?>   
                                              <span class="external-link-icon pl-[10px]" aria-hidden="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
                                                    <g clip-path="url(#clip0_4175_4069)">
                                                        <path d="M0.795691 4.63204L6.21503 0.923325C6.29815 0.868456 6.39748 0.838989 6.49932 0.838989C6.60116 0.838989 6.70049 0.868456 6.78361 0.923325L12.2045 4.63204C12.2422 4.65816 12.2773 4.68737 12.3094 4.7193L7.66627 7.95966L7.17318 7.59544C6.98204 7.45344 6.74488 7.37612 6.5005 7.37612C6.25612 7.37612 6.01896 7.45344 5.82783 7.59544L5.33761 7.95819L0.758442 4.66015C0.772074 4.65037 0.782571 4.64035 0.796203 4.63204M0.500488 11.1707V5.18399L4.85057 8.31752L0.577577 11.4792C0.527557 11.3826 0.501322 11.2769 0.500776 11.1697M11.8477 11.8378H1.15377C1.12744 11.8368 1.10117 11.8344 1.07512 11.8307L6.20479 8.0347C6.28918 7.97189 6.39397 7.93768 6.50194 7.93768C6.60992 7.93768 6.71471 7.97189 6.7991 8.0347L11.9269 11.8329C11.9009 11.8366 11.8746 11.839 11.8483 11.84M12.5013 11.1719C12.5005 11.2791 12.4742 11.3848 12.4242 11.4814L8.15463 8.32266L12.5 5.28764L12.5013 11.1719Z" fill="#323334"/>
                                                        <path d="M12.5 5.77881V11.2209C12.4993 11.32 12.4749 11.4178 12.4287 11.5071L8.48022 8.58625L12.5 5.77881Z" fill="#323334"/>
                                                        <path d="M11.9699 11.8319C11.9431 11.8354 11.9162 11.8376 11.8892 11.8385H1.11051C1.08358 11.8376 1.05672 11.8354 1.03003 11.8319L6.20034 8.32047C6.28766 8.2621 6.39239 8.23071 6.49983 8.23071C6.60727 8.23071 6.712 8.2621 6.79932 8.32047L11.9699 11.8319Z" fill="#323334"/>
                                                        <path d="M4.52368 8.58246L0.571041 11.507C0.524765 11.4177 0.500493 11.3199 0.5 11.2207V5.68384L4.52368 8.58246Z" fill="#323334"/>
                                                        <path d="M12.3243 4.4281L7.66655 7.42548L7.17186 7.08863C6.97543 6.95655 6.7394 6.88548 6.49723 6.88548C6.25505 6.88548 6.01903 6.95655 5.8226 7.08863L5.33107 7.42426L0.738525 4.37334C0.752157 4.3643 0.762654 4.35526 0.776286 4.34743L6.21137 0.916656C6.29641 0.865709 6.39538 0.838623 6.49646 0.838623C6.59754 0.838623 6.69647 0.865709 6.78152 0.916656L12.2182 4.34743C12.2556 4.37142 12.2907 4.39841 12.323 4.4281" fill="#323334"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_4175_4069">
                                                        <rect width="12" height="11" fill="white" transform="translate(0.5 0.838745)"/>
                                                        </clipPath>
                                                    </defs>
                                                    </svg>
                                            </span>
                                        <?php } ?>
                                    </a> 
                                </div>            
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>  
                       
                </div>            
                <div class="<?php echo esc_attr($content_width); ?>" data-aos="fade-left" >  
                   <div class="lg:block hidden w-full lg:h-full relative <?php if($reverse_desktop){ ?> elipse-left <?php }else{ ?> elipse-right <?php } ?> ">       
                        <div class="ellipse-container">
                            <div class="ellipse-mask-wrapper">
                                <?php if(!empty($image)){ ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" 
                                        alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php } ?>  
                            </div>                     
                        </div>
                    </div>  
                     <div class="lg:hidden block w-full lg:h-full md:h-[30em] sm:h-[25em] h-[20em] relative bg-cover bg-top bg-no-repeat" <?php if(!empty($image)){ ?> style="background-image: url('<?php echo esc_url($image['url']); ?>');" <?php } ?>>
                         
                    </div>   
            </div>   
      </div> 
      </div>
</div>
       <?php if($add_bottom_wave && $bottom_wave != ''){ ?>
        <div class="w-[100%] <?php if( $hide_bottom_wave_mobile): ?> lg:block hidden  <?php endif; ?> leading-[0] mb-[-3px] <?php echo $bottom_wave_color; ?>" >
             <?php 
                $svg = file_get_contents(get_template_directory() . $bottom_wave);
                echo $svg;
                ?>
        </div>
    <?php } ?>  
</section>

<?php }
?>
