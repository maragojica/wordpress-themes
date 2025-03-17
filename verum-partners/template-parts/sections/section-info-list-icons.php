<?php 
if (have_rows('info_columns_icons')) :          
    while (have_rows('info_columns_icons')) : the_row();
    $section_id = get_sub_field('section_id');
    $heading = get_sub_field('section_headline');      
    $center_content = get_sub_field('center_content'); 
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');      
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');
    $columns = get_sub_field('columns_number');  
    $columnsnumber = "col-lg-12";
            switch ($columns['value']) {
                case "two":
                    $columnsnumber = "col-md-6";
                    break;
                case "three":
                    $columnsnumber = "col-md-6 col-lg-4";
                    break;
                case "four":
                    $columnsnumber = "col-md-6 col-lg-3";
                    break;                    
                case "five":
                    $columnsnumber = "col-md-6 col-lg";
                    break;
            }?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-info-list <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">            
    <div class="container"> 
    <?php if($heading ): ?>
        <div class="row p-lg-b3 p-b1">
            <div class="col-xs-12">
            <?php if ($heading) : ?>
                <h2 class="header-section text-uppercase cl-green mt-0 mb-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <span><?php echo $heading; ?></span>
                    <div class="header-line"></div>
                </h2>                
            <?php endif; ?>            
            </div>
        </div>
        <?php endif; ?> 
        <div class="info-list-row row <?php if($center_content): echo 'content-center'; endif; ?> ">
            <?php 
            if (have_rows('info_content')):  $animation_delay = 0.1;
            while (have_rows('info_content')): the_row();                
                $heading = get_sub_field('title'); 
                $description = get_sub_field('text');     
                $text_align = get_sub_field('text_align');     
                $title_color = get_sub_field('title_color');     
                $text_color = get_sub_field('text_color');    
                $icon = get_sub_field('icon');
                $duration = $animation_delay . 's'; ?>
                <div class="col-xs-12 <?php echo $columnsnumber;?> wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="<?php echo esc_attr($duration); ?>" >
                    <div class="info-list-col w-100 h-100 pe-xl-3 ps-xl-3 <?php echo $text_align["value"]; ?>">  
                        <div class="list-icon m-t2">
                        <?php if ( !empty($icon)) :   ?> 
                        <img class="icon-info" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" height="39" width="39"/>   
                        <?php endif; ?> 
                        <div class="list-header">   
                            <?php if($heading): ?>              
                            <h3 class="main-headline text-uppercase <?php echo $title_color["value"]; ?> ">                        
                            <?php echo $heading; ?>
                            </h3>
                            <?php endif; ?> 
                            <?php if ($description) : ?>
                            <div class="dp-1 <?php echo $text_color["value"]; ?> main-description"><?php echo wp_kses_post($description); ?></div>
                            <?php endif; ?> 
                            </div>
                       </div>   
                    </div>                       
                </div>
            <?php $animation_delay += 0.1; endwhile; 
            endif;?>
        </div>          
    </div> 
</section>
<?php              
    endwhile;
endif; ?>   
