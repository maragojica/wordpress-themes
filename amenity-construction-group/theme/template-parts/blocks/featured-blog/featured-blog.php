<?php
$content_block = get_field('content_block_featured_blog');
if ($content_block) {
    
    $heading = $content_block['heading'];  
    $featured_blog = $content_block['featured_blog'];  
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
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;
    

    //Columns Number

    $select_columns = 'w-full px-3 mt-6 lg:mb-0 lg:w-1/3';       
   
?>

<section class="featured-blog-section max-w-full relative overflow-hidden bg-foreground <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
  <div class="container mx-auto ">           
        <div class="w-full">  
            <?php if ($heading) : ?>
                <h2 class="text-primary sm:mb-6 text-center" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h2>
            <?php endif; ?> 
        </div>
       <?php 
    if($featured_blog):  ?>
        <div class="flex flex-col sm:flex-row flex-wrap justify-center -mx-3 mt-[0.2em]">   
           <?php foreach ($featured_blog as $post):                         
                       setup_postdata($post); 
                        $title = get_the_title($post->ID); 
                        $publication_name = get_field('publication_name', $post->ID);  ?>  
                    <div class="<?php echo $select_columns; ?> group" data-aos="fade-up">
                        <div class="flex flex-col h-full p-[15px] border-[3px] border-tertiary"> 
                              <?php 
                                if ( has_post_thumbnail( $post->ID ) ): ?>
                               <a class="relative overflow-hidden" href="<?php the_permalink($post->ID); ?>" tabindex="0"  aria-label="<?php echo $title; ?>" title="<?php echo $title; ?>">
                                  <?php  echo get_the_post_thumbnail( 
                                        $post->ID,
                                        'full', 
                                        array( 
                                            'class' => 'w-full h-[11em] md:h-[400px] lg:h-[250px] xl:h-[305px] w-full object-cover object-center hover:scale-110 group-hover:scale-110 transition-transform duration-300'
                                        ) 
                                    ); ?>                                   
                                    </a>
                                <?php
                                endif; 
                                ?>
                            <div class="flex flex-grow justify-start flex-wrap flex-col py-[35px] px-[15px]" data-aos="fade-in">
                                <?php if($publication_name): ?>
                                    <div class="text-quaternary eyebrow mb-[5px]" data-aos="fade-in"><?php echo $publication_name;?></div>
                                 <?php endif; ?>   
                                <?php if($title): ?>
                                    <h4 class="text-primary mb-0"><a class="text-primary hover:text-tertiary group-hover:text-tertiary" href="<?php the_permalink($post->ID); ?>" tabindex="0"  aria-label="<?php echo $title; ?>" title="<?php echo $title; ?>"  ><?php echo $title; ?></a></h4>
                                <?php endif; ?>  
                            </div>                                       
                        
                        </div>
                    </div>
                <?php endforeach; ?>           
        </div>
        <?php endif; ?>   
        
         <?php if ($buttons) : ?>
                <div class="flex flex-wrap justify-center gap-3 lg:gap-8 mt-4 lg:mt-12" data-aos="fade-up">
                    <?php foreach ($buttons as $button) : ?>
                        <?php 
                        $button_link = $button['button'];
                        $button_type = $button['button_type'];
                        $button_style_btn = $button['button_style_btn'];
                        $button_style_link = $button['button_style_link'];
                        $button_style = '';
                        if ($button_type === 'btn') {
                            $button_style = 'btn ';
                            if ($button_style_btn) {
                                $button_style .= ' ' . $button_style_btn;
                            }
                        } elseif ($button_type === 'link') {
                            $button_style = 'simple-link ';
                            if ($button_style_link) {
                                $button_style .= ' ' . $button_style_link;
                            }
                        }
                        if ($button_link) :
                            $url = $button_link['url'];
                            $title = $button_link['title'];
                            $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                            <div class="relative group">
                                <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="<?php if($button_style): echo $button_style; endif;?>">
                                    <?php echo esc_html($title); ?>
                                </a>     
                            </div>            
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?> 
        
    </div>
</section>

<?php }
?>

