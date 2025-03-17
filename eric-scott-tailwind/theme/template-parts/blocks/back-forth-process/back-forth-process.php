<?php
$content_block = get_field('content_block_process_full');
if ($content_block) {
    $back_forth_sections = $content_block['back_forth_sections'];
    $add_bottom_divider = $content_block['add_bottom_divider'];

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';
    $icon_counter = 0;


?>

<section class="back-foth-media-full-process process-timeline max-w-full relative <?php echo esc_attr($className); ?> " <?php echo $anchor_attr; ?>>
        <?php if ($back_forth_sections) { ?>
            <?php foreach ($back_forth_sections as $section_index => $section) :

                $section_content = $section['section_content'];
                $image = $section['image'];

                $reverse_desktop = in_array('yes', $section['reverse_order_desktop']);
                $reverse_mobile = in_array('yes', $section['reverse_order_mobile']);
                $alignment = $section['vertical_alignment'];

                //Spacing Settings
                $spacing = $section['spacing'];
                $spacing_top_desktop = $section['spacing_top_desktop'];
                $spacing_bottom_desktop = $section['spacing_bottom_desktop'];
                $spacing_top_mobile = $section['spacing_top_mobile'];
                $spacing_bottom_mobile = $section['spacing_bottom_mobile'];

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


                $container_classes = 'h-full flex flex-col md:flex-row ' . ($reverse_desktop ? 'md:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
                $heading_width = 'w-full md:w-2/5';
                $content_width = 'w-full md:w-3/5';
                $btn_align = 'justify-start'; ?>

                <div class="process-content max-w-full">
                    <div class="w-full mx-auto <?php if ($reverse_desktop) {
                                                    echo " pr-contain not-rp";
                                                } else {
                                                    echo " pl-contain not-lp";
                                                } ?>">
                        <div class="<?php echo esc_attr($container_classes); ?> gap-y-0 <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
                            <div class="<?php echo esc_attr($heading_width); ?> headlines-mv <?php if ($reverse_desktop) { ?> md:pl-[80px] lg:pl-[120px] xl:pl-[150px] 2xl:pl-[160px] headlines-r-mv <?php } else { ?> headlines-l-mv md:pr-[80px] lg:pr-[120px] xl:pr-[150px] 2xl:pr-[160px] <?php } ?> flex flex-col justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">
                                <div class="w-full h-full flex flex-col justify-center ">
                                    <?php foreach ($section_content as $content_list) :
                                        $heading = $content_list['heading'];
                                        $icon = $content_list['icon'];
                                        $description = $content_list['description'];
                                        $buttons = $content_list['buttons'];
                                        $icon_counter++;
                                        ?>
                                        <div class="content-list process-item-<?php echo $icon_counter; ?>">
                                            <div class="relative">
                                            <?php if (!empty($icon)): ?>
                                                        <div class="process-icon flex items-center justify-center xl:w-[77px] xl:h-[77px] lg:w-[60px] lg:h-[60px] w-[50px] h-[50px] absolute -left-[65px] lg:-left-[90px] xl:-left-[115px] xl:top-[77px] lg:top-[60px] top-[50px] border-1 bg-background border-primary rounded-full" data-index="<?php echo $icon_counter; ?>" data-reverse="<?php echo $reverse_desktop ? 'true' : 'false'; ?>">
                                                        <?php echo wp_get_attachment_image(
                                                                $icon['ID'],
                                                                'full',
                                                                false,
                                                                array(
                                                                    'class' => 'transition-all duration-300 xl:w-[50px] xl:h-[50px] lg:w-[40px] lg:h-[40px] w-[30px] h-[30px] object-contain',
                                                                    'alt' => esc_attr($icon['alt']),
                                                                )
                                                            ); ?>
                                                        </div>
                                                    <?php endif; ?>
                                              <div class="">
                                              <?php if ($heading) : ?>
                                                <h2 class="sm text-primary  mb-0 animate__animated" data-animation="fadeIn" data-duration="1.2s">
                                                    <?php echo $heading; ?>                                                    
                                                </h2>
                                            <?php endif; ?>
                                            <?php if ($description): ?>
                                                <div class="text-secondary mt-[1em] style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s">
                                                    <?php echo $description; ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($buttons) : ?>
                                                <div class="flex flex-wrap gap-4 <?php echo $btn_align; ?> mt-6">
                                                    <?php foreach ($buttons as $button) : ?>
                                                        <?php
                                                        $button_link = $button['button'];
                                                        $button_style = $button['button_style'];
                                                        if ($button_link) :
                                                            $url = $button_link['url'];
                                                            $title = $button_link['title'];
                                                            $target = $button_link['target'] ? $button_link['target'] : '_self';
                                                        ?>
                                                            <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min sm btn <?php if ($button_style): echo $button_style;
                                                                                                                                                                                                                                                                        endif; ?>">
                                                                <?php echo esc_html($title); ?>
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                              </div>
                                            </div>
                                            
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="<?php echo esc_attr($content_width); ?> z-[3] animate__animated" data-animation="fadeIn" data-duration="0.2s">
                                <?php if (!empty($image)) :
                                    $srcset = wp_get_attachment_image_srcset($image['ID']);
                                    $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>
                                    <img class="img-fluid w-full h-full object-center object-cover" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="648" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" />
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php } ?>

        <?php if ($add_bottom_divider): ?>
            <div class="w-full absolute left-0 bottom-0 z-3">
                <div class="line-divider"></div>
                <div class="line-border mt-[11px]"></div>
            </div>
        <?php endif; ?>
    </section>

<?php }
?>