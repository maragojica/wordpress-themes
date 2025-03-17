<?php
$counters = get_field('counters');
if ($counters) {

    $heading = $counters['heading'];
    $subheading = $counters['subheading'];
    $image = $counters['bg_image'];
    $image_mobile = $counters['bg_image_mobile'];
    $video = $counters['bg_video'];
    $description = $counters['description'];
    $buttons = $counters['buttons'];
    $bg_color = $counters['bg_color'];
    $bg_position = $counters['bg_position'];
    $bg_fixed = $counters['bg_fixed'];
    $add_border_bottom = $counters['add_border_bottom'];
    $alignment = $counters['vertical_alignment'];
    $counters_list = $counters['counters_list'];
    $logos_rows = $counters['logos_rows'];


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

    $container_classes = 'text-center flex flex-col items-center h-full w-full ' . ($alignment === 'middle' ? 'justify-center' : ($alignment === 'bottom' ? 'justify-end' : ($alignment === 'top' ? 'justify-start' : 'justify-around')));

    //Background Settings
    $bg_type = $counters['bg_type'];
    $bg_sett = "max-w-full h-[1200px] sm:h-[1240px] md:h-[1200px] lg:h-[1053px] relative bg-cover bg-no-repeat overflow-hidden ";
    if ($bg_type == "image") {
        if (!empty($image)):
            $bg_sett .= $bg_position;
            if ($bg_fixed):
                $bg_sett .= " sm:bg-fixed";
            endif;
        endif;
    }
?>

    <section class="counter-section <?php echo esc_attr($bg_sett); ?> <?php if ($add_border_bottom): ?> border-b-[12px] border-b-primary <?php endif; ?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if (!empty($image) && $bg_type == "image"): ?>style="background-image: url(<?php echo esc_url($image['url']); ?>)" <?php endif; ?>>
        <?php if ($bg_type == "video"): ?>
            <video id="background-video" aria-hidden="true" autoplay loop muted playsinline style="pointer-events: none;" class="absolute top-0 lef-0 w-full h-full z-[1] object-cover filter blur-xl">
                <?php if ($video): ?>
                    <source src="<?php echo $video['url']; ?>" type="video/mp4">
                <?php endif; ?>
            </video>
        <?php endif; ?>
        <div class="overlay <?php echo esc_attr($container_classes); ?> absolute z-[2] top-0 left-0 py-3em lg:py-0 lg:px-0 px-[0]" <?php if ($bg_color): ?> style="background-color: <?php echo $bg_color; ?>" <?php endif; ?>>
            <div class="container mx-auto">
                <?php if ($heading) : ?>
                    <h2 class="text-white mb-[15px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $heading; ?>
                    </h2>
                <?php endif; ?>
                <?php if ($subheading) : ?>
                    <h3 class="text-white animate__animated" data-animation="fadeIn" data-duration="1.3s">
                        <?php echo $subheading; ?>
                    </h3>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="bodymedium mt-[10px] font-text-font text-white md:max-w[80%] lg:max-w-[46%] mx-auto animate__animated" data-animation="fadeIn" data-duration="1.4s">
                        <?php echo $description; ?>
                    </div>
                <?php endif; ?>

                <?php if ($buttons) : ?>
                    <div class="flex flex-wrap gap-4 justify-center mt-8 animate__animated" data-animation="fadeIn" data-duration="1.5s">
                        <?php foreach ($buttons as $button) : ?>
                            <?php
                            $button_link = $button['button'];
                            $button_style = $button['button_style'];
                            if ($button_link) :
                                $url = $button_link['url'];
                                $title = $button_link['title'];
                                $target = $button_link['target'] ? $button_link['target'] : '_self';   ?>
                                <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="min-w-min btn <?php if ($button_style): echo $button_style;
                                                                                                                                                                                                                                        endif; ?>">
                                    <?php echo esc_html($title); ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <div class="hidden lg:block  w-full h-[2px] mt-[32px] mb-[32px] bg-tertiary opacity-70"></div>
                <?php if ($counters_list): ?>
                    <div class="grid grid-cols-1 lg:grid-cols-[repeat(5,_1fr)] gap-0 relative overflow-hidden">
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

                                <div class="animate__animated px-2 2xl:px-4" data-animation="fadeBottom" data-duration="1.2s">
                                    <div class="grid grid-rows-[auto_auto] justify-items-center content-center h-full text-center">
                                        <?php if ($number): ?>
                                            <div class="grid grid-cols-[auto_auto_auto] items-center">
                                                <?php if ($before): ?>
                                                    <h2 class="text-uppercase text-tertiary-light m-0 big-sm"><?php echo $before; ?></h2>
                                                <?php endif; ?>
                                                <h2 class="counter-number text-uppercase text-tertiary-light m-0 big-sm text-right"
                                                    data-count="<?php echo esc_attr($number); ?>">0</h2>
                                                <?php if ($after): ?>
                                                    <h2 class="text-uppercase text-tertiary-light m-0 big-sm"><?php echo $after; ?></h2>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($heading) : ?>
                                            <div class="font-text-font uppercase text-[16px] text-secondary-light font-semibold tracking-[0.64px] mt-[20px]">
                                                <?php echo $heading; ?>
                                            </div>
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
                <div class="hidden lg:block w-full h-[2px] mt-[32px] mb-[22px] bg-tertiary opacity-70"></div>
                <?php if ($logos_rows):  ?>
                    <div class="rounded-[30px] border-2 border-[#EEF4F9] p-[40px] lg:flex hidden flex-col gap-[10px] mt-[30px] mx-auto">
                        <?php foreach ($logos_rows as $column):
                            $logo_list = $column['logo_list'];
                            if ($logo_list): ?>
                                <div class="hhidden lg:flex flex-row flex-nowrap justify-between gap-[48px] mx-auto animate__animated" data-animation="fadeIn" data-duration="1.5s">
                                    <?php foreach ($logo_list as $column_logo):
                                        $logo = $column_logo['logo'];
                                        $link = $column_logo['link']; ?>
                                        <?php if (!empty($logo)): ?>
                                            <?php if ($link) {
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                                <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" aria-label="<?php echo $link_title; ?>"><?php } ?>
                                                <?php echo wp_get_attachment_image(
                                                    $logo['ID'],
                                                    'full',
                                                    false,
                                                    array(
                                                        'class' => 'transition-all duration-300 w-full h-[144px] object-contain hover:-translate-y-[10px] transition-transform',
                                                        'alt' => esc_attr($logo['alt']),
                                                    )
                                                ); ?>
                                                <?php if ($link) { ?>
                                                </a>
                                            <?php } ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                        <?php endif;
                        endforeach; ?>
                    </div>
                    <div class="slider-logos owl-carousel owl-theme relative mt-16">
                        <?php foreach ($logos_rows as $column):
                            $logo_list = $column['logo_list'];
                            if ($logo_list): ?>

                                <?php foreach ($logo_list as $column_logo):
                                    $logo = $column_logo['logo'];
                                    $link = $column_logo['link']; ?>
                                    <div class="item flex justify-center">
                                        <?php if (!empty($logo)): ?>
                                            <?php if ($link) {
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                                <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" aria-label="<?php echo $link_title; ?>"><?php } ?>
                                                <?php echo wp_get_attachment_image(
                                                    $logo['ID'],
                                                    'full',
                                                    false,
                                                    array(
                                                        'class' => 'transition-all duration-300 w-full h-[70px] md:h-[90px] object-contain transition-transform',
                                                        'alt' => esc_attr($logo['alt']),
                                                    )
                                                ); ?>
                                                <?php if ($link) { ?>
                                                </a>
                                            <?php } ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>

                        <?php endif;
                        endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </section>
    <?php if (!empty($image_mobile)): ?>
        <style>
            @media (max-width: 575.98px) {
                .hero-section {
                    background-image: url(<?php echo esc_url($image_mobile['url']); ?>) !important;
                }
            }
        </style>
    <?php endif; ?>
<?php }
?>