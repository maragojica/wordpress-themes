<?php
$content_block = get_field('content_block_jobs');
if ($content_block) {
    
    $heading = $content_block['heading'];    
    $description = $content_block['description'];   
    $bg_image = $content_block['bg_image']; 
    $jobs = $content_block['jobs_colums'];       

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
       
 
    $container_classes = 'h-full flex flex-col ';
    $row_classes = 'items-center';
    $heading_width = 'w-full'; 
    $content_width = 'w-full lg:max-w-[85%] mx-auto';      
   
?>

<section class="jobs-section -mb-[180px] overflow-hidden max-w-full relative bg-cover bg-center bg-no-repeat <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if(!empty($bg_image)):?>style="background-image: url(<?php echo esc_url($bg_image['url']); ?>)"<?php endif; ?>>    
    <div class="container mx-auto pb-[180px]">  
         <div class="w-full lg:mb-[40px] text-center animate__animated" data-animation="fadeIn" data-duration="1.5s">      
            <?php if($heading): ?>
                <h2 class="text-white mb-0 animate__animated" data-animation="fadeIn" data-duration="1.2s">
                    <?php echo $heading; ?>
                </h2>   
                <?php endif; ?>   
                <?php if ($description) : ?>
                    <div class="text-white descrip mt-[0.5em] lg:max-w-[55%] xl:max-w-[60%] mx-auto style-disc animate__animated" data-animation="fadeIn" data-duration="1.1s" >                 
                            <?php echo $description; ?>                   
                    </div>
                <?php endif; ?>                      
             </div>
            <?php if($jobs): ?>
            <div class="<?php echo esc_attr($content_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.2s" > 
                <?php foreach ($jobs as $jobs_info) : ?>
                    <?php 
                    $job_link = $jobs_info['job_link'];   ?>               
                    <div class="w-full group">
                    <?php if($job_link): 
                          $url = $job_link['url'];
                          $title = $job_link['title'];
                          $target = $job_link['target'] ? $job_link['target'] : '_self';  ?>
                         <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="link-job border-b-2 border-secondary py-[30px] pr-[36px] w-full flex justify-between items-center text-white group-hover:text-secondary group-hover:no-underline">
                            <span class="pr-[20px]"><?php echo esc_html($title); ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="23" viewBox="0 0 22 23" fill="none">
                            <path d="M16.7406 12.875H0V10.125H16.7406L9.04063 2.425L11 0.5L22 11.5L11 22.5L9.04063 20.575L16.7406 12.875Z" fill="#FF7F32"/>
                            </svg>
                        </a> 
                        <?php endif; ?>  
                    </div>                         
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        
    </div>    
</section>

<?php }
?>

