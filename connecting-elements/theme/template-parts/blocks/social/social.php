<?php
$content_block = get_field('content_block_social');
if ($content_block) {
    
    $heading = $content_block['heading'];   
    $description = $content_block['description'];    
    $socials = $content_block['socials'];      

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
 
   
?>
<section class="social-section max-w-full relative pl-[22px] lg:pl-0 pr-[22px] lg:pr-0 <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>  >   
<div class="max-w-full  bg-primary rounded-[50px_0px_50px_0px] <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" >    
    <div class="container mx-auto pt-[3em] pb-[3em] lg:pt-[74px] lg:pb-[74px]"> 
          <div class="w-full text-center animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <div class="flex flex-col justify-center">  
                    <?php if ($heading) : ?>
                        <h2 class="text-secondary mb-0">
                            <?php echo $heading; ?>
                        </h2>
                    <?php endif; ?> 
                    <?php if($description): ?>
                    <div class="font-text-font text-white xl:max-w-[70%] mx-auto  mt-3 xl:mt-5 style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                        <?php echo $description; ?>                   
                    </div>
                    <?php endif; ?>                                  
                </div>
                <?php
                if ($socials) { 	?>
                        <div class="flex gap-[30px] md:gap-[60px] flex-row items-center justify-center pt-[30px] md:pt-[60px]">
                        <?php foreach ($socials as $column): 
                        $icon = $column['icon']; 
                        $link = $column['social_link']; ?>
                            <?php 
                            if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                <a tabindex="0" class="social transition-all ease-in-out duration-300 translate-y-0 hover:-translate-y-3" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
                                <?php echo wp_get_attachment_image($icon['ID'], 'full', false, array('class' => 'icon md:max-w-fit max-w-[40px]')); ?>        
                                </a>
                            <?php endif; ?>
                         <?php endforeach; ?>  
                        </div>
                <?php 
                }  ?>
            </div>                           
          </div>
    </div>
</div>
</section>
<?php }
?>

