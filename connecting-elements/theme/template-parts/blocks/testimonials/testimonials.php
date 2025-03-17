<?php
$content_block = get_field('content_block_tesimonials');
if ($content_block) {
    
    $heading = $content_block['heading'];    
    $image = $content_block['bg_image'];    
    $testimonials = $content_block['testimonials_list'];    

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

<section class="testimonials-section max-w-full h-fit md:h-[800px] 2xl:h-[950px] 3xl:h-[1050px]  animate__animated <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> data-animation="fadeIn" data-duration="1.2s">
    <div class="content w-full h-full rounded-[0px_50px_0px_50px] mx-auto relative flex flex-col justify-start items-start bg-cover bg-center pl-[22px] lg:pl-0 pr-[22px] lg:pr-0" <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?>>
        <?php if ($heading) : ?>
            <h2 class="text-secondary max-w-fit md:bg-white md:rounded-br-[50px] pt-0 md:pb-[20px] lg:pb-[25px] md:pl-[20px] md:pr-[1.5em] lg:pr-[60px] md:-mt-[1px] mb-3" >
                <?php echo $heading; ?>
            </h2>
        <?php endif; ?>    
        <div class="w-full md:hidden block animate__animated" data-animation="fadeIn" data-duration="1.5s" >  
                    
                <?php echo wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'rounded-[50px_0px_50px_0px] w-full h-fit lg:h-full object-cover object-center')); ?>        
                
        </div>      
             
        <?php if( $testimonials ): ?>    
        <div class="w-fit md:bg-white 2xl:pt-[80px] lg:pt-[3em] pt-[2em] md:pr-[20px] 2xl:pl-[80px] lg:pl-[3em] md:pl-[2em] pb-0 md:rounded-tl-[50px] h-fit max-w-full lg:max-w-[980px] 2xl:max-w-[1020px] 3xl:max-w-[1220px] md:absolute lg:-right-[1px] right-0 lg:-bottom-[72px] -bottom-[1px]" > 
            <div class="slider-testimonials slider-dots slider-fluid-full owl-carousel owl-theme relative overflow-hidden">        
                <?php  foreach ($testimonials as $post): 
                    setup_postdata($post); 
                    $title = get_the_title($post->ID); 
                    $content = get_field('content', $post->ID);   ?>
                    <div class="testimonial-slide fluid-slide item w-full">
                        <div class="relative w-full text-center">
                        <?php if($content): ?>
                            <div class="font-text-font text-foreground">                 
                                <?php echo $content; ?>                   
                            </div>
                        <?php endif; ?> 
                        <?php if($title): ?>
                            <div class="text-foreground uppercase font-text-font font-[800] 2xl:text-[26px] lg:text-[24px] text-[20px] tracking-[3.12px] lg:mt-6 mt-3"><?php echo $title;?></div>
                        <?php endif; ?>    
                    </div>
                    </div>
                <?php endforeach; ?> 
             </div>    
        </div>  
      <?php endif; ?>  
        
    </div>
</section>
<style>
    @media (max-width: 767.98px) { 
    .testimonials-section .content{
        background-image: none !important;
    }
}
</style>
<?php }
?>

