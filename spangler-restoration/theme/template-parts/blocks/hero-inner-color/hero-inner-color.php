<?php
$hero = get_field('hero_inner_color');
if ($hero) {
    
    $heading = $hero['heading'];   
    $description = $hero['description'];     
    $buttons = $hero['buttons'];  
       
    $alignment = $hero['vertical_alignment'];    
    $alignment_hori = $hero['horizontal_alignment'];  

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';


    //Spacing Settings
    $spacing = $hero['spacing'];
    $spacing_top_desktop = $hero['spacing_top_desktop'];
    $spacing_bottom_desktop = $hero['spacing_bottom_desktop'];
    $spacing_top_mobile = $hero['spacing_top_mobile'];
    $spacing_bottom_mobile = $hero['spacing_bottom_mobile'];

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

    //Container Settings

    $container_classes = 'flex flex-col h-full w-full ' . ($alignment === 'middle' ? 'justify-center' : ($alignment === 'bottom' ? 'justify-end' : ($alignment === 'top' ? 'justify-start' : 'justify-around'))) . ($alignment_hori === 'middle' ? ' items-center text-center' : ($alignment_hori === 'right' ? ' items-end text-right' : ($alignment_hori === 'left' ? ' items-start text-left' : ' items-stretch items-center')));
?>
<section class="default-content-section max-w-full h-[20em] lg:h-[25em] xl:h-[600px] relative">
	<div class="overlay flex flex-col h-full w-full justify-end items-start bg-[#00194C] text-left absolute z-[2] top-0 left-0 <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
		<div class="container mx-auto"> 
				<div class="relative">
                <?php if ($heading) : ?>                 
                    <h1 class="text-white uppercase" data-aos="fade-up" data-aos-offset="200">
                        <?php echo $heading; ?>
                    </h1>           
                <?php endif; ?>            
                <?php if($description): ?>
                        <div class="text-white text-sub-medium style-disc lg:max-w-[75%] 2xl:max-w-[80%] <?php if($alignment_hori == 'middle'): ?> mx-auto <?php endif; ?>" data-aos="fade-up" data-aos-offset="200">                 
                            <?php echo $description; ?>                   
                        </div>
                <?php endif; ?> 
            
            <?php if ($buttons) : ?>
                    <div class="flex flex-wrap <?php if($alignment_hori == 'middle'){ ?>justify-center <?php }else{ ?> justify-start <?php } ?> gap-4 mt-5 lg:mt-10" data-aos="fade-up" data-aos-offset="200">
                        <?php foreach ($buttons as $button) : ?>
                            <?php 
                            $button_link = $button['button'];
                            $button_style = $button['button_style'];
                            if ($button_link) :
                                $url = $button_link['url'];
                                $title = $button_link['title'];
                                $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                <div class="relative group">
                                <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="btn <?php if($button_style): echo $button_style; endif;?>">
                                    <?php echo esc_html($title); ?>
                                </a>     
                                
                            </div>            
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>   
		        </div> 
			</div>
		</div>
</section>
<?php } ?>
