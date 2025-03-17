<?php
$content_block = get_field('recent_blog');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];
    $description = $content_block['description'];       
    $bg_color = $content_block['bg_color'];   
    $buttons = $content_block['buttons'];    
    $add_border_bottom = $content_block['add_border_bottom'];      
    $shape_image = $content_block['shape'];  

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
    

    //Columns Number

    $select_columns = 'w-full px-3 mt-6 lg:mb-0 lg:w-1/3';       
   
?>

<section class="recent-blog-section max-w-full relative overflow-hidden <?php if($add_border_bottom):?> border-b-[12px] border-b-primary <?php endif;?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <?php if(!empty($shape_image)): 
         echo wp_get_attachment_image(
            $shape_image['ID'],
            'full',
            false,
            array(
                'class' => 'absolute right-0 -bottom-[3em] h-[471px] object-contain invisible lg:visible',
                'alt' => esc_attr($shape_image['alt']),
                'data-velocity' => "-20",
            )
        );
     endif; ?>
    <div class="container mx-auto ">           
        <div class="w-full animate__animated" data-animation="fadeIn" data-duration="1.5s">                
           <?php if ($subheading) : ?>
                <h3 class="text-foreground mb-[10px] uppercase">
                    <?php echo $subheading; ?>
                </h3>
            <?php endif; ?>
            <?php if ($heading) : ?>
                <h2 class="text-secondary mb-0">
                    <?php echo $heading; ?>
                </h2>
            <?php endif; ?> 
            <?php if($description): ?>
            <div class="font-text-font text-foreground  mt-4 style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                <?php echo $description; ?>                   
            </div>
            <?php endif; ?> 
            
        </div>
       <?php 
$query = array(
    'post_type' => array( 'post' ),     //Recent Post
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'desc',   
    'posts_per_page' => 3,                   
); 
$allpost = new WP_Query($query); 
$count_allpost = $allpost->post_count; 
if ( $allpost->have_posts() ) {   $animation_delay = 1; ?>
        <div class="lg:flex flex-col sm:flex-row flex-wrap justify-center -mx-3 mt-[0.2em] hidden">   
           <?php while($allpost->have_posts()) : $allpost->the_post(); 
                        $title = get_the_title(); 
                        $id = get_the_id(); 
                        $publication_name = get_field('publication_name', $id); 
                        $duration = $animation_delay . 's';  ?>  
                    <div class="<?php echo $select_columns; ?> group animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                        <div class="flex flex-col h-full">
                           
                           <?php if (has_post_thumbnail()) : ?>		
                              <a class="relative overflow-hidden" href="<?php the_permalink(); ?>" tabindex="0"  >						  
                                <?php the_post_thumbnail('full', array('class' => 'w-full h-[11em] md:h-[400px] lg:h-[305px] w-full object-cover object-center hover:scale-110 group-hover:scale-110 transition-transform duration-300')); ?>	
                              </a>			
                            <?php endif; ?>
                            <div class="flex flex-grow justify-start flex-wrap flex-col p-[30px] xl:p-[48px] bg-blueinfo-dark group-hover:bg-primary transition-all ease-in-out duration-300">
                                <?php if($publication_name): ?>
                                    <div class="text-tertiary-dark uppercase text-[14px] sm:text-[16px] font-primary-font font-medium tracking-[1.6px] mb-[5px] transition-all ease-in-out duration-300 group-hover:text-tertiary-light"><?php echo $publication_name;?></div>
                                 <?php endif; ?>   
                                <?php if($title): ?>
                                    <h4 class="text-primary mb-0"><a class="text-primary hover:text-white group-hover:text-white" href="<?php the_permalink(); ?>" tabindex="0"  ><?php echo $title; ?></a></h4>
                                <?php endif; ?>  
                            </div>                                       
                        
                        </div>
                    </div>
                <?php $animation_delay += 0.05; endwhile; ?>           
        </div>
        <?php  wp_reset_postdata(); } ?> 
        <?php if ( $allpost->have_posts() ) {   ?>     
            <div class="lg:hidden block">
            <div class="slider-blogs slider-fluid-full slider-dash owl-carousel owl-theme relative overflow-hidden mt-6">
            <?php while($allpost->have_posts()) : $allpost->the_post(); 
                        $title = get_the_title(); 
                        $id = get_the_id(); 
                        $publication_name = get_field('publication_name', $id);    ?>  
                    <div class="group blog-slide fluid-slide item h-full">
                        <div class="flex flex-col h-full">
                           
                           <?php if (has_post_thumbnail()) : ?>		
                              <a class="relative overflow-hidden" href="<?php the_permalink(); ?>" tabindex="0"  >						  
                                <?php the_post_thumbnail('full', array('class' => 'w-full h-[11em] md:h-[400px] lg:h-[305px] w-full object-cover object-center hover:scale-110 group-hover:scale-110 transition-transform duration-300')); ?>	
                              </a>			
                            <?php endif; ?>
                            <div class="flex flex-grow justify-start flex-wrap flex-col p-[30px] xl:p-[48px] bg-blueinfo-dark group-hover:bg-primary transition-all ease-in-out duration-300">
                                <?php if($publication_name): ?>
                                    <div class="text-tertiary-dark uppercase text-[14px] sm:text-[16px] font-primary-font font-medium tracking-[1.6px] mb-[5px] transition-all ease-in-out duration-300 group-hover:text-tertiary-light"><?php echo $publication_name;?></div>
                                 <?php endif; ?>   
                                <?php if($title): ?>
                                    <h4 class="text-primary mb-0"><a class="text-primary hover:text-white group-hover:text-white" href="<?php the_permalink(); ?>" tabindex="0"  ><?php echo $title; ?></a></h4>
                                <?php endif; ?>  
                            </div>                                       
                        
                        </div>
                    </div>
                <?php endwhile; ?>  
            </div>
            </div>
         <?php  wp_reset_postdata(); } ?>  
        <?php if ($buttons) : ?>
            <div class="w-full flex flex-wrap gap-4 justify-center mt-4 lg:mt-12">
                <?php foreach ($buttons as $button) : ?>
                    <?php 
                    $button_link = $button['button'];
                    $button_style = $button['button_style'];
                    if ($button_link) :
                        $url = $button_link['url'];
                        $title = $button_link['title'];
                        $target = $button_link['target'] ? $button_link['target'] : '_self';
                    ?>
                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                            <?php echo esc_html($title); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>  
        
    </div>
</section>

<?php }
?>

