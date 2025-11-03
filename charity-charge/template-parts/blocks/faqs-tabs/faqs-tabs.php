<?php
$content_block = get_field('faqs_tabs_content');
if ($content_block) {
    
    $subheading = $content_block['subheading']; 
    $heading = $content_block['heading'];   
    $description = $content_block['description'];   
    $buttons = $content_block['buttons'];      
    $faqs_tabs = $content_block['faqs_tabs'];  
       
         

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

<section class="faqs-tabs-section position-relative <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?> <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
   <div class="top-section">
    <div class="container">
       <div class="<?php echo esc_attr($container_classes); ?> g-5 g-lg-0 gap-large">
        <div class="col-12 col-md-6">
            <?php if ($subheading) : ?>
                <div class="eyebrow text-uppercase color-blue-dark mb-2" data-aos="fade-up">
                    <?php echo $subheading; ?>
                </div>
            <?php endif; ?>
            <?php if ($heading) : ?>                 
                <h3 class="color-blue-dark" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h3>           
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
    if($faqs_tabs): ?>
       <div class="faq-content mt-3 lg:mt-5" data-aos="fade-in">
           <div class="container">
             <div class="row vertical-tabs justify-content-center">
                  <div class="col-12 col-xl-10">
                     <div class="<?php echo esc_attr($container_classes); ?>">
                    <!-- Tab Navigation -->
                    <div class="col-md-4 col-12">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <?php foreach($faqs_tabs as $index => $tab): 
                                $tab_title = $tab['tab_title'];?>
                            <button class="nav-link<?php echo $index === 0 ? ' active' : ''; ?>" id="v-pills-tab-<?php echo $index; ?>" data-bs-toggle="pill" data-bs-target="#v-pills-faqs-<?php echo $index; ?>" type="button" role="tab" aria-controls="v-pills-dashboard-<?php echo $index; ?>" aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                                <?php echo esc_html($tab_title); ?> 
                                <span class="nav-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M8 19L15 12L8 5" stroke="#100551" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </button>
                            <?php endforeach; ?>                           
                        </div>
                    </div>
                    <div class="col-md-8 col-12">
                         <div class="tab-content" id="v-pills-tabContent">
                             <?php foreach($faqs_tabs as $index => $tab): 
                                $faqs_list = $tab['faqs_list'];?>
                                <div class="tab-pane fade show <?php echo $index === 0 ? 'active' : ''; ?>" id="v-pills-faqs-<?php echo $index; ?>" role="tabpanel" aria-labelledby="v-pills-tab-<?php echo $index; ?>">
                                   <?php if($faqs_list): ?>
                                    <div class="accordion" id="accordionFaqs-<?php echo $index; ?>">
                                    <?php foreach ($faqs_list as $indexfaq => $faq) : ?>
                                    <div class="accordion-item <?php echo $indexfaq === 0 ? 'active-item' : ''; ?>">
                                        <div class="accordion-header color-blue-dark">
                                        <button class="accordion-button <?php echo $indexfaq === 0 ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $indexfaq; ?>" aria-expanded="<?php echo $indexfaq === 0 ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $indexfaq; ?>">
                                            <?php echo esc_html($faq['title']); ?>
                                        </button>
                                    </div>
                                        <div id="collapse<?php echo $indexfaq; ?>" class="accordion-collapse collapse <?php echo $indexfaq === 0 ? 'show' : ''; ?>" data-bs-parent="#accordionFaqs-<?php echo $index; ?>" style="">
                                        <div class="accordion-body color-neutral-secondary">
                                            <?php echo $faq['text']; ?>
                                        </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                    <?php endif; ?>
                                 </div>    
                                <?php endforeach; ?>  
                         </div>
                         
                    </div>
                </div> 
                  </div>
             </div>            
                <?php if ($buttons) : ?>
                <div class="<?php echo esc_attr($container_classes); ?>">
                    <div class="col-12 text-center">
                        <div class="d-flex flex-column flex-lg-row flex-wrap gap-3 mt-5 justify-content-start" data-aos="fade-up" data-aos-delay="50">
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
           </div>
       </div>
   <?php endif; ?>    
</section> 
<?php }
?>
