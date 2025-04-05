<?php
$content_block = get_field('content_logos');
if ($content_block) {
    
    $heading = $content_block['heading'];      
    $logos_content = $content_block['logos'];

 

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
        case 'xlarge':
            $spacing_class = 'padding-xlarge';
            break;
    }

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;

    
?>

<section class="logos-section max-w-full relative bg-white <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto">           
        <div class="w-full animate__animated" data-animation="fadeIn" data-duration="1.5s">      
            <h3 class="mb-0 text-center uppercase text-black animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <?php echo $heading; ?>
            </h3>                                   
        </div>
        <?php if($logos_content): ?>
        <div class="glider logo-glider">
            <?php foreach ($logos_content as $column) : 
                
                 $logo = $column['logo'];
                 $link = $column['link'];  ?>
                  <div class="slide-in-right slide slide">
                <?php if(!empty($logo)): ?>
                    <?php  if($link) {
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                        <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-full h-full"><?php } ?>
                        <img class="logo-partner" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                    <?php if($link) { ?>
                        </a>
                    <?php } ?>
                <?php endif; ?>
                </div>
            <?php endforeach; ?>      
        </div>
        <?php endif; ?>  
    </div>
</section>

<?php }
?>

