<?php
$content_block = get_field('content_block_jobs');
if ($content_block) {
    
    $heading = $content_block['heading'];   
    $description = $content_block['description'];  
    $add_bottom_divider = $content_block['add_bottom_divider'];
    $jobs_info = $content_block['jobs_info'];    

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
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;    
       
 
    $container_classes = 'h-full flex flex-col lg:flex-row ';
    $row_classes = 'items-center';
    $heading_width = 'w-full'; 

   
?>

<section class="jobs-section overflow-hidden max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    
    <div class="container mx-auto">     
       <div class="<?php echo esc_attr($container_classes); ?> justify-center gap-y-[1em] lg:gap-y-0 lg:gap-x-[2em]">
          <div class="<?php echo esc_attr($heading_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <div class="flex flex-col justify-center text-center <?php echo esc_attr($row_classes); ?>">
                <?php if ($heading) : ?>
                    <h2 class="text-primary w-fit animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $heading; ?>
                    </h2> 
                <?php endif; ?> 
                    <?php if($description): ?>
                    <div class="text-secondary <?php if ($heading) : ?> mt-[1.5em] <?php endif; ?> lg:max-w-[758px] mx-auto style-disc style-under animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                        <?php echo $description; ?>                   
                    </div>
                    <?php endif; ?>                     
                    <?php if($jobs_info): ?>
                    <div class="w-full lg:max-w-[800px] 2xl:max-w-[991px]"> 
                        <?php foreach ($jobs_info as $job_info) : ?>
                            <?php 
                            $title = $job_info['title']; 
                            $button_link = $job_info['link']; 
                            if($title): ?>
                                <div class="mt-[30px] full-border flex flex-col lg:flex-row justify-between items-center px-[20px] py-[30px] lg:gap-y-0 gap-y-[20px]">                          
                                    <h3><?php echo esc_html($title); ?></h3>
                                <?php if ($button_link) :
                                            $url = $button_link['url'];
                                            $title = $button_link['title'];
                                            $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                            <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min btn sm btn_primary_navy">
                                                <?php echo esc_html($title); ?>
                                            </a>
                                        <?php endif; ?>
                                </div>
                            <?php endif; ?>    
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div> 
        </div>  
    </div>
    <?php if($add_bottom_divider): ?>
     <div class="w-full absolute left-0 bottom-0 z-3">
        <div class="line-border"></div>
        <div class="line-divider mt-[11px]"></div>        
     </div>
   <?php endif; ?>
</section>

<?php }
?>

