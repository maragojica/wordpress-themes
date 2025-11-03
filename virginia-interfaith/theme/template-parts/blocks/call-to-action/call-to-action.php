<?php
$content_block = get_field('content_block_call_action');
if ($content_block) {    
    $add_top_shape = $content_block['add_top_shape'];
    $add_bottom_shape = $content_block['add_bottom_shape'];  
    $subheading = $content_block['subheading']; 
    $icon = $content_block['icon'];
    $heading = $content_block['heading'];     
    $description = $content_block['description']; 
    $buttons = $content_block['buttons']; 
    $container_classes = ' flex flex-col items-center justify-center ';   

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

    $top_shape =  '/shapes/yellow-top-bracket.svg';
    $bottom_shape =  '/shapes/yellow-bottom-bracket.svg';
?>

<section class="call-to-action-section max-w-full relative overflow-hidden <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>   
    <div class="container mx-auto relative z-2">        
          <div class="<?php echo esc_attr($container_classes); ?> relative">      
            <?php if($add_top_shape){ ?>
                <div class="w-fit top-bracket mx-auto mb-[-20px]" data-aos="fade-down">
                    <?php 
                        $svg = file_get_contents(get_template_directory() . $top_shape);
                        echo $svg;
                        ?>
                </div>
            <?php } ?>          
              <div class="w-full lg:px-[2rem] text-center relative">
                 <?php if ($icon) :
                          $icon_url = $icon['url'];
                            $icon_alt = $icon['alt']; ?>    
                            <div class="w-[60px] h-[60px] lg:w-[88px] lg:h-[88px] flex items-center justify-center mx-auto">                         
                                <img class="object-contain w-[60px] h-[60px] lg:w-[88px] lg:h-[88px] mb-[20px]" src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($icon_alt); ?>" title="<?php echo esc_attr($icon_alt); ?>">
                            </div>
                        <?php endif; ?>                   
                    <?php if($subheading): ?>
                        <div class="eyebrow text-primary mb-[12px]"  >
                            <?php echo $subheading; ?>
                        </div>   
                    <?php endif; ?> 
                        <?php if ($heading) : ?>
                        <h2 class="text-foreground heading-shape mb-0" >
                            <?php echo $heading; ?>
                        </h2> 
                    <?php endif; ?>  
                     <?php if($description): ?>
                        <div class="text-foreground style-disc mt-[5px] lg:max-w-[80%] mx-auto" data-aos="fade-up" data-aos-delay="100" >                 
                            <?php echo $description; ?>                   
                        </div>
                    <?php endif; ?>  
                    <?php if ($buttons) : ?>
                        <div class="flex flex-wrap gap-2 lg:gap-[16px] mt-[30px] xl:mt-[40px] justify-center" data-aos="fade-up">
                            <?php foreach ($buttons as $button) : ?>
                                <?php 
                                $button_link = $button['button'];
                                $button_style = $button['button_style'];
                                $is_external = $button['is_external'];
                                $is_download = $button['is_download'];
                                $is_email = $button['is_email'];
                                if ($button_link) :
                                    $url = $button_link['url'];
                                    $title = $button_link['title'];
                                    $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                    <div class="relative group">
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="btn w-fit <?php if($button_style): echo $button_style; endif;?>">
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
             <?php if($add_bottom_shape){ ?>
            <div class="w-fit bottom-bracket mx-auto mt-[-20px]" data-aos="fade-up">
                <?php 
                    $svg = file_get_contents(get_template_directory() . $bottom_shape);
                    echo $svg;
                    ?>
            </div>
        <?php } ?> 
      </div> 
</section>

<?php }
?>
