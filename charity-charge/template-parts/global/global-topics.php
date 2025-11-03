<?php 
$content_block_global = get_field('cards_topics', 'option');
if ($content_block_global) {  
     $subheading = $content_block_global['subheading']; 
    $heading = $content_block_global['heading'];   
    $description = $content_block_global['description'];   
    $buttons = $content_block_global['buttons'];    
    $add_list_items = $content_block_global['add_list_items'];    
    $list_items = $content_block_global['list_items'];  
    $columns_layout = $content_block_global['select_layout'];  
    
    $columns_class = '';
    switch ($columns_layout) {
    case 'two':
        $columns_class .= ' col-md-6 col-lg-6';
        break;
    case 'three':
        $columns_class .= ' col-md-6 col-lg-4';
        break;
    case 'four':
    $columns_class .= ' col-md-6 col-lg-4 col-xl-3';
    break;
    default:
        $columns_class .= ' col-md-6 col-lg-4 col-xl-3';
    } 
?>
  <?php if ($subheading || $heading || $description) : ?>
           <div class="<?php echo esc_attr($container_classes); ?> g-4 g-lg-0 gap-medium">
               <div class="col-12 col-lg-7">
                    <?php if ($subheading) : ?>
                        <p class="color-black" data-aos="fade-up">
                            <?php echo $subheading; ?>
                        </p>
                    <?php endif; ?>
                    <?php if ($heading) : ?>                 
                        <h2 class="color-black mb-0" data-aos="fade-up">
                            <?php echo $heading; ?>
                        </h2>           
                    <?php endif; ?>  
                     <?php if($description): ?>                    
                    <div class="color-black main-description" data-aos="fade-up" data-aos-delay="50">
                        <?php echo $description; ?>
                    </div>                    
                <?php endif; ?>   
               </div>       
           </div>
        <?php endif; ?>
<?php if ($add_list_items) : 
            if($list_items): ?>
            <div class="row row-cards-icons g-3 row-style-icons-two">               
                        <?php $i = 1; foreach ($list_items as $item): 
                            $item_icon = $item['item_icon']; 
                            $item_title = $item['item_title'];
                            $item_text = $item['item_text'];
                            $item_link = $item['item_link']; ?>                       
                        <div class="<?php echo esc_attr($columns_class); ?> d-flex flex-column" data-aos="fade-in">
                            <?php if ($item_link) :
                            $url = $item_link['url'];
                            $title = $item_link['title'];
                            $target = $item_link['target'] ? $item_link['target'] : '_self';  ?>                           
                            <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="h-100 w-100"><?php endif; ?>
                            <div class="icon-card-list w-100 h-100">
                                <div class="d-flex flex-row justify-content-between align-items-center gap-2 w-100">
                                    <div class="d-flex align-items-center gap-1">
                                    <?php if ($item_icon): ?>
                                    <img class="icon-card" src="<?php echo esc_url($item_icon['url']); ?>" alt="<?php echo esc_attr($item_icon['alt']); ?>">
                                <?php endif; ?>
                                <?php if($item_title): ?>
                                        <div class="card-icon-title color-black"><?php echo esc_html($item_title); ?></div>
                                    <?php endif; ?>
                                </div>
                                <?php if ($item_link) : ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M11.252 7.54537L6.41061 12.3868L5.61523 11.5914L10.4561 6.75H6.18955V5.625H12.377V11.8125H11.252V7.54537Z" fill="#FF6200"/>
                                </svg>
                                 <?php endif; ?>
                                </div>                                
                                <div class="card-icon-header"> 
                                    <?php if($item_text): ?>
                                        <div class="card-icon-description color-black">
                                            <?php echo $item_text; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>  
                            <?php if ($item_link) : ?>
                            </a>
                            <?php endif; ?>
                        </div>
                    <?php $i++; endforeach; ?>                    
            </div>
             <?php if ($buttons) : ?>
         <div class="row mt-4 mt-lg-5 justify-content-center">
          <div class="col-12">  
                <div class="d-flex flex-column flex-lg-row flex-wrap gap-3 justify-content-center" data-aos="fade-up" data-aos-delay="50">
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
        <?php endif; endif;  ?>     
<?php }
?>
