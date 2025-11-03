<?php
$content_block = get_field('credit_card_content');
if ($content_block) {
    
    $heading = $content_block['heading'];   
    $description = $content_block['description'];   
    $main_card_image = $content_block['main_card_image'];   
    $column_one_card_list = $content_block['column_one_card_list'];     
    $column_two_card_list = $content_block['column_two_card_list'];   
    $buttons = $content_block['buttons']; 

     $bg_section = $content_block['bg_color_section']; 

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
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' pt-lg-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' pb-lg-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;

    //Container Settings

   $container_classes = 'row justify-content-center';

    //Spacing Class
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

    $bg_section_class = '';
    switch ($bg_section) {
        case 'light':
            $bg_section_class = 'bg-accent';
            break;
        case 'white':
            $bg_section_class = 'bg-white';
            break;
        default:
            $bg_section_class = '';
            break;
    }

    
?>

<section class="credit-card-section position-relative <?php echo esc_attr($bg_section_class); ?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
    <div class="container">
         <div class="<?php echo esc_attr($container_classes); ?>">
             <div class="col-12 text-center mb-5">
             <?php if ($heading) : ?>                 
                <h2 class="color-black" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h2>           
           <?php endif; ?> 
            <?php if($description): ?>
                <div class="color-darker content-text mt-2" data-aos="fade-up" data-aos-delay="50">
                    <?php echo $description; ?>
                </div>
           <?php endif; ?>
        </div>
       </div>
       <div class="<?php echo esc_attr($container_classes); ?>">
        <?php if($column_one_card_list): ?>
         <div class="col-12 col-lg-4 col-xl-3 order-2 order-lg-1">
             <?php $i = 1; foreach ($column_one_card_list as $column) : 
                $card_style = $column['card_style'];
                $icon = $column['icon'];
                $title = $column['title'];
                $text = $column['text'];
                $link = $column['link']; ?>
                <div class="card-box mb-1" data-aos="fade-up" data-aos-delay="<?php echo 10 + ($i * 50); ?>">
                    <?php if($card_style === 'style_1'){ ?>
                        <div class="feature-item">
                            <?php if($link): ?>
                                <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>" aria-label="<?php echo esc_html($link['title']); ?>">
                            <?php endif; ?>
                            <div class="feature-header">
                            <?php if ($icon): ?>
                                <img class="feature-icon" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
                            <?php endif; ?>
                            <?php if($title): ?>
                                <h3 class="feature-title color-black mb-0"><?php echo esc_html($title); ?></h3>
                                <?php endif; ?>
                            </div>
                            <?php if($text): ?>
                            <div class="feature-description">
                                <?php echo $text; ?>
                            </div>
                            <?php endif; ?>
                            <?php if($link): ?>
                                </a>
                            <?php endif; ?>
                       </div>
                    <?php }elseif($card_style === 'style_2'){ ?>                     
                       <div class="right-feature">
                         <?php if($link): ?>
                               <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>" aria-label="<?php echo esc_html($link['title']); ?>">
                           <?php endif; ?>
                        <div class="feature-header">
                            <?php if($title): ?>
                            <h3 class="feature-title color-black mb-0"><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>
                        </div>
                        <div class="dashed-line-alt"></div>
                        <?php if($text): ?>
                           <div class="feature-description color-neutral">
                               <?php echo $text; ?>
                           </div>
                           <?php endif; ?>
                            <?php if($link): ?>
                               </a>
                           <?php endif; ?>
                    </div>
                    <?php } ?>
                </div>
                  <?php endforeach; ?>
         </div>
          <?php endif; ?>
        <div class="col-12 col-lg-4 col-xl-6 text-center order-1 order-lg-2">
            <?php if(!empty($main_card_image)): ?>
               <div class="main-card-container">
               <img src="<?php echo esc_url($main_card_image['url']); ?>" alt="<?php echo esc_attr($main_card_image['alt']); ?>" class="card-main-image" data-aos="fade-up" data-aos-delay="60">
                </div> 
            <?php endif; ?>
        </div>
       <?php if($column_two_card_list): ?>
         <div class="col-12 col-lg-4 col-xl-3 order-3 order-lg-3">
             <?php $i = 1; foreach ($column_two_card_list as $column) :
                $card_style = $column['card_style'];
                $icon = $column['icon'];
                $title = $column['title'];
                $text = $column['text'];
                $link = $column['link']; ?>
                <div class="card-box mb-1" data-aos="fade-up" data-aos-delay="<?php echo 10 + ($i * 50); ?>">
                    <?php if($card_style === 'style_1'){ ?>
                        <div class="feature-item">
                            <?php if($link): ?>
                                <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>" aria-label="<?php echo esc_html($link['title']); ?>">
                            <?php endif; ?>
                            <div class="feature-header">
                            <?php if ($icon): ?>
                                <img class="feature-icon" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
                            <?php endif; ?>
                            <?php if($title): ?>
                                <h3 class="feature-title color-black mb-0"><?php echo esc_html($title); ?></h3>
                                <?php endif; ?>
                            </div>
                            <?php if($text): ?>
                            <div class="feature-description">
                                <?php echo $text; ?>
                            </div>
                            <?php endif; ?>
                            <?php if($link): ?>
                                </a>
                            <?php endif; ?>
                       </div>
                    <?php }elseif($card_style === 'style_2'){ ?>                     
                       <div class="right-feature">
                         <?php if($link): ?>
                               <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>" aria-label="<?php echo esc_html($link['title']); ?>">
                           <?php endif; ?>
                        <div class="feature-header">
                            <?php if($title): ?>
                            <h3 class="feature-title color-black mb-0"><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>
                        </div>
                        <div class="dashed-line-alt"></div>
                        <?php if($text): ?>
                           <div class="feature-description color-neutral">
                               <?php echo $text; ?>
                           </div>
                           <?php endif; ?>
                            <?php if($link): ?>
                               </a>
                           <?php endif; ?>
                    </div>
                    <?php } ?>
                </div>
                  <?php endforeach; ?>
         </div>
          <?php endif; ?>
               
       </div>
        
       <?php if ($buttons) : ?>
        <div class="<?php echo esc_attr($container_classes); ?>">
            <div class="col-12 text-center">
                <div class="d-flex flex-column flex-lg-row flex-wrap gap-3 mt-5 justify-content-center" data-aos="fade-up" data-aos-delay="50">
                <?php foreach ($buttons as $button) : ?>
                    <?php 
                    $button_link = $button['button'];
                    $button_style = $button['button_style'];
                        $button_type = $button['button_type'];
                    if ($button_link) :
                        $url = $button_link['url'];
                        $title = $button_link['title'];
                        $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                        <div class="relative group">
                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="button <?php if($button_style): echo $button_style; endif;?> w-100 w-lg-auto <?php if($button_type): echo $button_type; endif;?>  ">
                            <?php echo esc_html( $title ); ?>
                        </a>
                    </div>            
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
           </div>
        </div>
    <?php endif; ?>    
   </div>      
</section> 
<?php }
?>
