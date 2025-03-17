<?php
$content_block = get_field('team');
if ($content_block) {    
     
    $bg_color = $content_block['bg_color'];  
    $team_section = $content_block['team_section'];  

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
       
 
  //Container Settings

  $container_classes = 'w-full flex-wrap justify-center h-full flex flex-col sm:flex-row ';
   
?>
<section class="team-section max-w-full relative rounded-[50px_0px_50px_0px] lg:mr-0 lg:ml-0 mr-[22px] ml-[22px] mb-[3em] lg:mb-[93px] <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>  
     <div class="w-full pl-[22px] pr-[22px] lg:pl-[48px] lg:pr-[48px] xl:pl-[68px] xl:pr-[68px] 2xl:pl-[148px] 2xl:pr-[148px] mx-auto">  
     <?php if( $team_section ): ?>         
           
        <?php foreach ($team_section as $column): 
                $heading = $column['headline']; 
                $description = $column['description'];   
                $team_members = $column['team_members']; ?>
                <?php if ($heading || $description) : ?>
                    <div class="w-full text-center animate__animated" data-animation="fadeIn" data-duration="1s">
                    <?php if ($heading) : ?>
                        <h2 class="text-primary mb-0">
                            <?php echo $heading; ?>
                        </h2>
                    <?php endif; ?> 
                    <?php if($description): ?>
                        <div class="font-text-font text-white mt-3 xl:mt-6 style-disc" >                 
                            <?php echo $description; ?>                   
                        </div>
                    <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if($team_members): ?>
                 <div class="<?php echo esc_attr($container_classes); ?> " >                                         
                    <?php foreach ($team_members as $column): 
                            $name = $column['name']; 
                            $position = $column['position'];   
                            $headshot = $column['headshot']; ?>
                            <div class="w-full sm:w-1/2 lg:w-1/3 xl:w-1/4 sm:px-[10px] 2xl:px-[15px] mt-[20px] xl:mt-[88px]">
                            <?php  if(!empty($headshot)): 
                                echo wp_get_attachment_image(
                                    $headshot['ID'],
                                    'full',
                                    false,
                                    array(
                                        'class' => 'transition-all duration-300 h-[15em] xs:h-[20em] sm:h-[16em] md:h-[350px] lg:h-[275px] xl:h-[250px] 2xlarge:h-[338px] 3xl:h-[500px] 4k:h-[660px] rounded-[50px_0px_50px_0px] w-full object-cover object-center object-top',
                                        'alt' => esc_attr($headshot['alt']),
                                    )
                                );
                            endif;  ?>
                            <?php if($name || $position): ?>
                                <div class="mt-[32px] text-center">
                                    <?php if($name): ?>
                                        <h3 class="text-primary"><?php echo $name; ?></h3>
                                    <?php endif; ?>   
                                    <?php if($position): ?>
                                        <div class="text-white uppercase font-primary-font text-[20px] 2xl:text-[22px] font-normal"><?php echo $position;?></div>
                                    <?php endif; ?> 
                                </div>
                             <?php endif; ?>   
                            </div>  
                    <?php  endforeach; ?>  
                 <?php endif; ?>
        <?php  endforeach; ?> 
        </div>     
    <?php endif; ?>
     </div>       
</section> 
<?php }
?>

