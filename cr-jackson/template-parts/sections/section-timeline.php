<?php 
if (have_rows('timeline')) :          
    while (have_rows('timeline')) : the_row();
    $section_id = get_sub_field('section_id');    
    $headline = get_sub_field('heading');
    $subheadline = get_sub_field('subheading');     
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');      
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');   ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-timeline <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">            
    <div class="container">    
        <div class="row justify-center">      
            <div class="col-xs-12 col-lg-10">  
            <div class="timeline-container">
                <div class="timeline-header">
                <?php if ($subheadline) : ?>
                    <div class="subheadline text-uppercase m-b1 cl-orange wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                    <?php endif; ?>
                    <?php if ($headline) : ?>
                    <h3 class="cl-blue text-uppercase mt-10px mb-10px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s"><?php echo $headline; ?></h2>
                <?php endif; ?>
                </div>
                <?php if (have_rows('timeline_list')) :  ?>
                    <div class="timeline">
                        <div class="timeline-line"></div>
                        <div class="overlay-line"></div>
                       <?php while (have_rows('timeline_list')) : the_row(); 
                        $year = get_sub_field('year'); 
                        $description = get_sub_field('description'); ?>
                        <div class="timeline-event" >
                            <div class="event-circle"></div>
                            <?php if($year): ?>
                            <div class="event-year wow flipInX" data-wow-duration="1s" data-wow-delay="0.3s"><?php echo $year;?></div>
                            <?php endif; ?>
                            <?php if($description): ?>
                            <div class="event-description dp-1 cl-blue wow flipInX" data-wow-duration="1s" data-wow-delay="0.4s"><?php echo $description;?></div>
                            <?php endif; ?>
                        </div>
                        <?php endwhile; ?>                        
                    </div>
                </div>
           <?php endif; ?> 
            </div>
        </div>           
    </div> 
</section>
<?php              
    endwhile;
endif; ?>   
