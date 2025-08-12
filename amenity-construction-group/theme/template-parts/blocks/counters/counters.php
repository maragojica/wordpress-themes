<?php
$counters = get_field('counters');
if ($counters) {

    $heading = $counters['heading'];   
    $image = $counters['bg_image'];
    $main_logo = $counters['main_logo'];
    $info_logos = $counters['info_logos'];
    $count = is_array($info_logos) ? count($info_logos) : 0;   
    $counters_list = $counters['counters_list'];


    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';


    //Spacing Settings
    $spacing = $counters['spacing'];
    $spacing_top_desktop = $counters['spacing_top_desktop'];
    $spacing_bottom_desktop = $counters['spacing_bottom_desktop'];
    $spacing_top_mobile = $counters['spacing_top_mobile'];
    $spacing_bottom_mobile = $counters['spacing_bottom_mobile'];

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
    if (!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0';
    endif;
    if (!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0';
    endif;
    if (!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important';
    endif;
    if (!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important';
    endif;

    //Container Settings

    $container_classes = 'text-center flex flex-col items-center h-full w-full ';
   
?>

    <section class="counter-section max-w-full relative overflow-hidden bg-cover bg-center bg-no-repeat <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if (!empty($image) ): ?>style="background-image: url(<?php echo esc_url($image['url']); ?>)" <?php endif; ?>>
       <div class="container mx-auto">
              <?php if($heading) : ?>
                <div class="w-full text-center lg:pb-[45px] pb-[3em]">
                    <h2 class="<?php echo esc_attr($heading_color_class); ?> mb-0" data-aos="fade-up">
                        <?php echo esc_html($heading); ?>
                    </h2> 
                </div>
            <?php endif; ?>                
                <?php if ($counters_list): ?>
                    <div class="grid grid-cols-1 lg:grid-cols-[repeat(4,_1fr)] gap-0 relative overflow-hidden">
                        <?php foreach ($counters_list as $index => $column):
                            $number = $column['number'];
                            $heading = $column['title'];
                            $before = $column['before'];
                            $after = $column['after'];
                            $is_last = $index === count($counters_list) - 1;
                        ?>
                            <div class="relative grid gap-8 lg:gap-0">
                                <!-- Desktop separator -->
                                <?php if (!$is_last): ?>
                                    <div class="hidden lg:block absolute right-0 top-[50%] -translate-y-1/2 w-[2px] h-[176px] bg-tertiary"></div>
                                <?php endif; ?>

                                <div class="px-2 2xl:px-4" data-aos="fade-up">
                                    <div class="grid grid-rows-[auto_auto] justify-items-center content-center h-full text-center">
                                        <?php if ($number): ?>
                                            <div class="grid grid-cols-[auto_auto_auto] items-center">
                                                <?php if ($before): ?>
                                                    <div class="counters text-uppercase text-secondary m-0 big-sm"><?php echo $before; ?></div>
                                                <?php endif; ?>
                                                <div class="counters counter-number text-uppercase text-secondary m-0 big-sm text-right"
                                                    data-count="<?php echo esc_attr($number); ?>">0</div>
                                                <?php if ($after): ?>
                                                    <div class="counters text-uppercase text-secondary m-0 big-sm"><?php echo $after; ?></div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($heading) : ?>
                                            <h4 class="uppercase text-white mt-[20px] subhead">
                                                <?php echo $heading; ?>
                                            </h4>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Mobile separator -->
                                <?php if (!$is_last): ?>
                                    <div class="h-[2px] w-[176px] mx-auto bg-tertiary lg:hidden mb-8"></div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                 <?php if($info_logos): ?>
                    <?php if(!empty($main_logo)): ?>
                        <div class="flex items-center mt-[3em] lg:mt-[100px] w-full mb-[-20px] md:mb-[-24px] lg:mb-[-35px] md:justify-between justify-center">
                            <div class="horizontal-line bg-tertiary h-[3px] w-[calc(93%-282px)] sm:w-[calc(78%-300px)] md:w-[calc(65%-300px)] lg:w-[calc(65%-405px)] md:block hidden"></div>
                            <div class="md:w-[300px] lg:w-[405px]">
                            <?php echo wp_get_attachment_image(
                                $main_logo['ID'],
                                'full',
                                false,
                                array(
                                    'class' => 'w-auto h-[43px] md:h-[50px] lg:h-[71px] object-contain mx-auto',
                                    'alt' => esc_attr($main_logo['alt']),
                                )
                            ); ?>
                            </div>
                            <div class="horizontal-line bg-tertiary h-[3px] w-[calc(93%-282px)] sm:w-[calc(78%-300px)] md:w-[calc(65%-300px)] lg:w-[calc(65%-405px)] md:block hidden"></div>
                        </div>
                    <?php endif; ?>
                    <div class="md:border-x-[3px] md:border-b-[3px] border-tertiary pb-[30px] pt-[30px] md:p-[40px] lg:p-[80px]">
                <?php if($count <= 5): ?>
                    <!-- Desktop grid for 5 or fewer logos -->
                    <div class="hidden lg:flex flex-wrap gap-[40px] items-center justify-center" data-aos="fade-in">
                        <?php foreach ($info_logos as $column_logo): 
                            $logo = $column_logo['logo']; 
                            $link = $column_logo['link']; ?>
                            <?php if(!empty($logo)): ?>
                                <?php  if($link) {
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <div class="flex items-center justify-center w-[calc(20%-40px)]">
                                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target);?>" aria-label="<?php echo esc_attr($link_title); ?>" ><?php } ?>
                                    <?php  echo wp_get_attachment_image(
                                        $logo['ID'],
                                        'full',
                                        false,
                                        array(
                                            'class' => 'transition-all duration-300 w-auto h-[116px] object-contain hover:-translate-y-[10px] transition-transform',
                                            'alt' => esc_attr($logo['alt']),
                                        )
                                    ); ?>                                    
                                <?php if($link) { ?>
                                    </a>
                                <?php } ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach;?>    
                    </div>
                    <!-- Mobile slider for 5 or fewer logos -->
                    <div class="lg:hidden block relative pt-[30px]">
                        <div class="swiper brands-slider overflow-hidden" id="brands-slider" data-count="<?php echo esc_attr($count); ?>">
                            <div class="swiper-wrapper"> 
                                <?php foreach ($info_logos as $column_logo): 
                                    $logo = $column_logo['logo']; 
                                    $link = $column_logo['link']; ?>
                                    <div class="swiper-slide">
                                        <?php if(!empty($logo)): ?>
                                            <div class="flex items-center justify-center">
                                                <?php  if($link) {
                                                    $link_url = $link['url'];
                                                    $link_title = $link['title'];
                                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>                                                
                                                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target);?>" aria-label="<?php echo esc_attr($link_title); ?>" ><?php } ?>
                                                    <?php  echo wp_get_attachment_image(
                                                        $logo['ID'],
                                                        'full',
                                                        false,
                                                        array(
                                                            'class' => 'transition-all duration-300 w-auto h-[70px] md:h-[90px] object-contain transition-transform',
                                                            'alt' => esc_attr($logo['alt']),
                                                        )
                                                    ); ?>                                    
                                                <?php if($link) { ?>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?> 
                            </div>
                            <!--<div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>-->
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Slider for more than 5 logos (desktop and mobile) -->
                    <div class="block relative">
                        <div class="swiper brands-slider" id="brands-slider">
                            <div class="swiper-wrapper"> 
                                <?php foreach ($info_logos as $column_logo): 
                                    $logo = $column_logo['logo']; 
                                    $link = $column_logo['link']; ?>
                                    <div class="swiper-slide">
                                        <?php if(!empty($logo)): ?>
                                             <div class="flex items-center justify-center">
                                            <?php  if($link) {
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self'; ?>                                               
                                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target);?>" aria-label="<?php echo esc_attr($link_title); ?>" ><?php } ?>
                                                <?php  echo wp_get_attachment_image(
                                                    $logo['ID'],
                                                    'full',
                                                    false,
                                                    array(
                                                        'class' => 'transition-all duration-300 w-auto h-[70px] md:h-[90px] object-contain transition-transform',
                                                        'alt' => esc_attr($logo['alt']),
                                                    )
                                                ); ?>                                    
                                            <?php if($link) { ?>
                                                </a>
                                            <?php } ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?> 
                            </div>
                           <!-- <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>-->
                        </div>
                    </div>
                <?php endif; ?>
               </div>
            <?php endif; ?> 
        </div>
    </section>
<?php }
?>