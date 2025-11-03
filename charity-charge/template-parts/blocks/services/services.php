<?php
$content_block = get_field('services_content');
if ($content_block) {
    
    $heading = $content_block['heading'];   
    $description = $content_block['description'];   
    $columns_layout = $content_block['columns_layout'];  
    $services_list = $content_block['services_list'];     
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

   $container_classes = 'row ';


?>

<section class="services-section position-relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
    <div class="container">
       <div class="<?php echo esc_attr($container_classes); ?>">
        <div class="col-12 text-center">
            <?php if ($heading) : ?>                 
                <h2 class="color-black" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h2>           
           <?php endif; ?>            
           <?php if($description): ?>
                <div class="color-dark-gray content-text mt-3" data-aos="fade-up" data-aos-delay="50">
                    <?php echo $description; ?>
                </div>
           <?php endif; ?>              
          </div>         
       </div>
       <?php $columns_class = '';
          switch ($columns_layout) {
            case 'two':
                $columns_class .= ' col-md-6 col-lg-6 two-columns';
                break;
            case 'three':
                $columns_class .= ' col-md-6 col-lg-4 three-columns';
                break;
            default:
                $columns_class .= ' col-md-6 col-lg-4 three-columns';
        } ?>
       <?php if($services_list): ?>
         <div class="row justify-content-start g-4 mt-2">
            <?php $i = 1; foreach ($services_list as $service) : 
                $image = $service['image'];
                 $title = $service['title'];
                 $subtitle = $service['subtitle'];
                 $text = $service['text'];
                 $buttons_service = $service['buttons_service']; ?>
                 <div class="<?php echo esc_attr($columns_class); ?> d-flex" data-aos="fade-up" data-aos-delay="<?php echo 50 + ($i * 50); ?>">
                    <div class="np-card w-100">
                    <div class="np-card-img bg-accent-light">
                        <?php if ($image) : ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid img-service w-100 h-100">
                        <?php endif; ?>                       
                    </div>
                    <div class="np-card-body">
                        <?php if ($subtitle): ?>
                        <div class="np-card-label color-neutral"><?php echo esc_html($subtitle); ?></div>
                        <?php endif; ?>
                         <?php if ($title): ?>
                        <div class="np-card-title color-black mt-2"><?php echo esc_html($title); ?></div>
                         <?php endif; ?>
                           <?php if ($text): ?>
                        <div class="np-card-desc mb-0 color-neutral"><?php echo $text; ?></div>
                         <?php endif; ?>
                    </div>
                    <div class="np-card-footer">
                       <?php if ($buttons_service) : ?>
                        <div class="d-flex flex-column flex-wrap gap-3" >
                            <?php foreach ($buttons_service as $button) : ?>
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
                    <?php $i++; endforeach; ?>
                </div>
            <?php endif; ?> 
                    </div>
                    </div>
                </div>
             <?php endforeach; ?>
         </div>   
       <?php endif; ?>  
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
