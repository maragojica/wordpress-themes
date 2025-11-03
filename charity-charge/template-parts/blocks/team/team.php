<?php
$content_block = get_field('team_content');
if ($content_block) {
    
     $subheading = $content_block['subheading']; 
    $heading = $content_block['heading'];   
    $description = $content_block['description'];   
    $team_members_list = $content_block['team_members_list'];     
    $buttons = $content_block['buttons']; 

     $bg_section = $content_block['bg_color_section']; 
     $header_section_width = $content_block['header_section_width']; 
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

   $container_classes = 'row justify-content-center';

    //Spacing Class
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

    $bg_section_class = '';
    switch ($bg_section) {
        case 'light':
            $bg_section_class = 'bg-accent';
            break;
        case 'white':
            $bg_section_class = 'bg-white';
            break;
        default:
            $bg_section_class = '';
            break;
    }

    $header_section_class = '';
    switch ($header_section_width) {
        case 'half':
            $header_section_class = 'col-lg-6';
            break;
        case 'full':
            $header_section_class = 'col-lg-12';
            break;        
        default:
            $header_section_class = '';
            break;
    }
?>

<section class="team-members-section position-relative <?php echo esc_attr($bg_section_class); ?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
    <div class="container">
       <div class="<?php echo esc_attr($container_classes); ?>">
        <div class="col-12 <?php echo esc_attr($header_section_class); ?> text-center">
            <?php if ($subheading) : ?>
                    <p class="color-off-black data-aos="fade-up">
                        <?php echo $subheading; ?>
                    </p>
                <?php endif; ?>
            <?php if ($heading) : ?>                 
                <h2 class="color-off-black" data-aos="fade-up">
                    <?php echo $heading; ?>
            </h2>           
           <?php endif; ?>            
           <?php if($description): ?>
                <div class="color-darker content-text mt-3" data-aos="fade-up" data-aos-delay="50">
                    <?php echo $description; ?>
                </div>
           <?php endif; ?>              
          </div>         
       </div>
       <?php if($team_members_list): ?>
       
                 <div class="row justify-content-center g-4 mt-2">
            <?php $i = 1; foreach ($team_members_list as $team_member) : 
                $image = $team_member['image'];
                 $position = $team_member['position']; 
                  $name = $team_member['name'];
                  $cta = $team_member['cta_team_member']; ?>
                 <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 d-flex col-team" data-aos="fade-up" data-aos-delay="<?php echo 10 + ($i * 50); ?>">
                    <div class="team-box w-100 h-100">   
                        <?php if($cta):
                            $url = $cta['url'];
                            $title = $cta['title'];
                            $target = $cta['target'] ? $cta['target'] : '_self';  ?>
                            <a class="w-100 h-100" href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>">
                        <?php endif; ?>                   
                        <?php if(!empty($image)): ?>
                            <?php echo wp_get_attachment_image(
                                $image['ID'],
                                'full',
                                false,
                                array(
                                    'class' => 'img-fluid img-team',
                                    'alt' => esc_attr($image['alt']),
                                )
                            ); ?>
                        <?php endif; ?>    
                       <div class="team-info">
                           <?php if(!empty($name)): ?><div class="team-name"><?php echo esc_html($name); ?></div><?php endif; ?>
                           <?php if(!empty($position)): ?><div class="team-position"><?php echo esc_html($position); ?></div><?php endif; ?>
                       </div>
                          <?php if($cta): ?></a><?php endif; ?>
                      </div>
                </div>
             <?php $i++; endforeach; ?>
         </div>             
       <?php endif; ?>  
       <?php if ($buttons) : ?>
        <div class="<?php echo esc_attr($container_classes); ?>">
            <div class="col-12 text-center">
                <div class="d-flex flex-column flex-lg-row flex-wrap gap-3 mt-5 justify-content-center" data-aos="fade-up" data-aos-delay="50">
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
</section> 
<?php }
?>
