<?php
$content_block = get_field('content_block_testimonials');
if ($content_block) {

    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];    
    $testimonials = $content_block['testimonials'];   
    $bg_color = $content_block['bg_color'];
    $bg_image = $content_block['bg_image']; 

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
   
?>

<section class="testimonials-section max-w-full relative <?php echo esc_attr($className); ?> " <?php echo $anchor_attr; ?> <?php if($bg_color): ?>" style="background-color: <?php echo esc_attr($bg_color); ?>; <?php endif; ?>"> 
    <div class="content-testimonials relative w-full bg-cover bg-no-repeat bg-center" <?php if($bg_image): ?>style="background-image: url('<?php echo esc_url($bg_image['url']); ?>');" <?php endif; ?>>
        <div class="overlay w-full h-full <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
                <div class="container mx-auto">
                     <div class="text-center mx-auto mb-[5px]">
                        <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="72" height="46" viewBox="0 0 72 46" fill="none">
                            <path d="M15.1457 39.0756L14.5479 38.6514C14.1638 38.3798 14.0758 37.8491 14.3505 37.4681C14.4299 37.3596 14.5285 37.2751 14.6417 37.2147C16.0512 36.35 17.1482 35.2799 17.9328 34.0101C18.6264 32.8921 19.082 31.6079 19.3035 30.1578C16.5533 29.2441 14.4473 27.9216 12.9914 26.1855C11.3894 24.2843 10.5884 21.9204 10.5884 19.0912C10.5884 17.3828 10.8796 15.7935 11.46 14.3357C12.0414 12.8721 12.9111 11.5419 14.071 10.3528C15.225 9.16373 16.5223 8.26638 17.954 7.66751C19.3877 7.06672 20.9452 6.7644 22.6188 6.7644C24.2923 6.7644 25.8798 7.06672 27.297 7.66751C28.7123 8.2683 29.9767 9.16948 31.0814 10.3663C32.1891 11.5602 33.0172 12.923 33.5686 14.4547C34.1171 15.973 34.3908 17.6487 34.3908 19.4847C34.3908 21.7803 33.941 23.9896 33.0413 26.1116C32.1552 28.2115 30.8231 30.2173 29.049 32.1291C27.2806 34.0361 25.2839 35.5841 23.0686 36.7703C20.8581 37.9508 18.431 38.7694 15.7881 39.2215C15.552 39.2627 15.3247 39.2023 15.1467 39.0746L15.1457 39.0756ZM19.3906 34.8912C18.8885 35.7022 18.2858 36.4363 17.5806 37.1024C19.2455 36.6648 20.8059 36.0582 22.2589 35.2799C24.3078 34.1867 26.1526 32.7529 27.7923 30.9812C29.4291 29.2211 30.6529 27.3794 31.4664 25.4561C32.2752 23.5549 32.6786 21.5634 32.6786 19.4847C32.6786 17.8445 32.4377 16.3559 31.9569 15.0229C31.4829 13.7061 30.7719 12.5333 29.8238 11.5112C28.8884 10.4939 27.8223 9.73189 26.6266 9.22323C25.4309 8.71745 24.093 8.46121 22.6178 8.46121C21.1425 8.46121 19.8288 8.71649 18.6148 9.22323C17.4026 9.73189 16.295 10.4987 15.2995 11.5247C14.2983 12.5525 13.5476 13.6956 13.0513 14.9499C12.5493 16.2091 12.2997 17.5892 12.2997 19.0902C12.2997 21.5174 12.9662 23.5194 14.2993 25.1048C15.6536 26.7152 17.7161 27.9312 20.4828 28.7499C20.8639 28.8641 21.1271 29.2345 21.0864 29.6453C20.8891 31.6339 20.3241 33.3834 19.3916 34.8902L19.3906 34.8912Z" fill="#C79A4A"/>
                            <path d="M42.1677 39.0756L41.5699 38.6514C41.1858 38.3798 41.0978 37.8491 41.3725 37.468C41.4518 37.3596 41.5505 37.2751 41.6627 37.2147C43.0722 36.35 44.1721 35.2799 44.9557 34.0101C45.6464 32.8921 46.105 31.6079 46.3265 30.1578C43.5733 29.2441 41.4702 27.9216 40.0114 26.1855C38.4123 24.2842 37.6123 21.9195 37.6123 19.0902C37.6123 17.3819 37.9025 15.7926 38.481 14.3347C39.0624 12.8711 39.934 11.541 41.092 10.3519C42.249 9.16275 43.5462 8.2654 44.978 7.66653C46.4116 7.06574 47.9701 6.76343 49.6427 6.76343C51.3153 6.76343 52.9028 7.06574 54.318 7.66653C55.7362 8.26732 56.9977 9.16851 58.1024 10.3653C59.2101 11.5592 60.0411 12.922 60.5925 14.4537C61.141 15.972 61.4119 17.6477 61.4119 19.4837C61.4119 21.7793 60.962 23.9886 60.0653 26.1106C59.1772 28.2105 57.8442 30.2163 56.0729 32.1281C54.3016 34.0351 52.3078 35.5831 50.0896 36.7694C47.882 37.9498 45.4549 38.7685 42.8091 39.2205C42.5759 39.2618 42.3486 39.2013 42.1677 39.0737V39.0756ZM46.4126 34.8912C45.9134 35.7021 45.3107 36.4363 44.6026 37.1024C46.2694 36.6647 47.8279 36.0582 49.2838 35.2799C51.3298 34.1867 53.1746 32.7529 54.8172 30.9812C56.4511 29.2211 57.6768 27.3794 58.4913 25.4561C59.3001 23.5548 59.7035 21.5634 59.7035 19.4846C59.7035 17.8445 59.4626 16.3559 58.9818 15.0229C58.5049 13.7061 57.7948 12.5333 56.8487 11.5112C55.9104 10.4939 54.8443 9.73187 53.6515 9.22321C52.4529 8.71744 51.115 8.46119 49.6427 8.46119C48.1703 8.46119 46.8508 8.71648 45.6387 9.22321C44.4236 9.73187 43.3189 10.4987 42.3206 11.5246C41.3222 12.5525 40.5715 13.6956 40.0724 14.9499C39.5732 16.2091 39.3207 17.5892 39.3207 19.0902C39.3207 21.5173 39.9901 23.5193 41.3203 25.1048C42.6746 26.7152 44.7371 27.9312 47.5038 28.7499C47.8878 28.8641 48.1481 29.2345 48.1103 29.6453C47.9101 31.6338 47.3451 33.3834 46.4126 34.8902V34.8912Z" fill="#C79A4A"/>
                        </svg>
                       </div>
                        <?php if ($heading) : ?>
                        <h3 class="text-primary mb-[30px] text-center" data-aos="fade-in" >
                            <?php echo $heading; ?>
                        </h3> 
                        <?php endif; ?> 
                    <div class="mx-auto lg:max-w-[90%] 2xl:max-w-[80%] bg-white custom-shadow px-[1.5em] py-[2em] lg:px-[29px] lg:py-[53px] flex flex-col justify-center items-center text-center">
                        
                        <?php if($testimonials): ?>
                            <div class="testimonials-carousel owl-carousel owl-theme relative z-[3] w-full lg:px-[65px]">
                                <?php foreach ($testimonials as $testimonial_post): ?>
                                    <?php 
                                        $post_id = $testimonial_post->ID;
                                        $content = apply_filters('the_content', $testimonial_post->post_content);
                                        $name = get_the_title($post_id);
                                    ?>
                                    <div class="testimonial-item item text-left px-5">
                                        <?php if ($content): ?>
                                            <div class="testimonial-description text-large text-foreground style-disc">
                                                <?php echo $content; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($name): ?>
                                            <div class="text-small text-tertiary font-bold mt-4">
                                                — <?php echo esc_html($name); ?>.
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>                         
                        <?php endif; ?>
                          
                    </div>
                </div>
        </div>
    </div>       
</section>

<?php }
?>
