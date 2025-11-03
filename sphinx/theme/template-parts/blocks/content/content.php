<?php
$content_block = get_field('content_block_content');
if ($content_block) {
    
    $heading = $content_block['heading'];      
    $subheading = $content_block['subheading']; 
    $description = $content_block['description'];     
    $buttons = $content_block['buttons'];        

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

    //Container Settings
    $container_classes = 'flex flex-col w-full mx-auto lg:max-w-[70%] ';
?>

<section class="content-section max-w-full h-auto relative  <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
      <div class="container mx-auto"> 
        <div class="<?php echo esc_attr($container_classes); ?>">
            <div class="w-full text-left">
                <?php if($subheading): ?>
                    <div class="eyebrow text-white  mb-0" data-aos="fade-up">
                        <?php echo $subheading; ?>
                    </div>  
                <?php endif; ?> 
                    <?php if ($heading) : ?>
                    <h2 class="text-white mb-0" data-aos="fade-up" >
                        <?php echo $heading; ?>
                    </h2> 
                <?php endif; ?>                        
                    <?php if($description): ?>
                    <div class="text-large text-white style-disc mt-5 lg:mt-[30px]" data-aos="fade-up" data-aos-delay="100" >                 
                        <?php echo $description; ?>                   
                    </div>
                <?php endif; ?>                  
                 <?php if ($buttons) : ?>
                <div class="max-w-full mx-auto">
                <div class="flex flex-wrap justify-center gap-2 lg:gap-8 mt-[30px] justify-center" data-aos="fade-up" data-aos-delay="100">
                    <?php foreach ($buttons as $button) : ?>
                        <?php 
                        $button_link = $button['button'];
                        $button_style = $button['button_style'];
                        $is_external = $button['is_external'];
                        $is_download = $button['is_download'];
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
                                <?php } ?>   
                            </a> 
                        </div>            
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                </div>
            <?php endif; ?>               
            </div> 
         </div>  
    </div>
</section>  
<?php }
?>

