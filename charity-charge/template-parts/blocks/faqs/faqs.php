<?php
$content_block = get_field('faqs_content');
if ($content_block) {
    
    $subheading = $content_block['subheading']; 
    $heading = $content_block['heading'];   
    $description = $content_block['description'];   
    $disclosures = $content_block['disclosures'];  
    $buttons = $content_block['buttons'];       
    $faqs = $content_block['faqs_list'];     
         

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

<section class="faqs-section position-relative <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?> <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
   <div class="top-section">
    <div class="container">
       <div class="<?php echo esc_attr($container_classes); ?> g-5 g-lg-0 gap-large">
        <div class="col-12 col-md-6">
            <?php if ($subheading) : ?>
                <p class="color-blue-dark mb-2" data-aos="fade-up">
                    <?php echo $subheading; ?>
            </p>
            <?php endif; ?>
            <?php if ($heading) : ?>                 
                <h2 class="color-blue-dark" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h2>           
           <?php endif; ?>            
           <?php if($description): ?>
                <div class="color-blue-dark content-text mt-3" data-aos="fade-up" data-aos-delay="50">
                    <?php echo $description; ?>
                </div>
           <?php endif; ?>           
          </div>   
       </div>
   </div> 
   </div> 
   <?php
    if($faqs): ?>
       <div class="faq-content mt-3 lg:mt-5" data-aos="fade-in">
           <div class="container">
                <div class="<?php echo esc_attr($container_classes); ?>">
                    <div class="col-12">
                         <div class="accordion" id="accordionFaqs">
                            <?php foreach ($faqs as $index => $faq) : ?>
                            <div class="accordion-item">
                                <div class="accordion-header color-blue-dark">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="false" aria-controls="collapse<?php echo $index; ?>">
                                    <?php echo esc_html($faq['title']); ?>
                                </button>
                               </div>
                                <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFaqs" style="">
                                <div class="accordion-body color-blue-dark">
                                    <?php echo $faq['text']; ?>
                                </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>     
                        
                <?php if ($buttons) : ?>
                <div class="<?php echo esc_attr($container_classes); ?>">
                    <div class="col-12 text-center">
                        <div class="d-flex flex-column flex-lg-row flex-wrap gap-3 mt-4 justify-content-start" data-aos="fade-up" data-aos-delay="50">
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
                <?php if($disclosures): ?>
                <div class="disclosures mt-4 lg:mt-5 pt-3" data-aos="fade-in">
                    <div class="small-description color-secondary">
                        <?php echo $disclosures; ?>
                    </div>
                </div>
                <?php endif; ?> 
            </div>
           </div>
       </div>
   <?php endif; ?>    
</section> 
<?php }
?>
