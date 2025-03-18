<?php
if (have_rows('text_list')): 
    while (have_rows('text_list')) :
        the_row(); 
        $section_id = get_sub_field('section_id');       
        $headline = get_sub_field('heading');
        $subheadline = get_sub_field('subheading'); 
        $description = get_sub_field('description');  
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');      
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-logo-slider <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
    <div class="container">    
        <div class="row center-xs">
            <div class="col-xs-12 col-lg-8 text-center">
            <?php if ($subheadline) : ?>
                    <div class="subheadline text-uppercase m-b1 cl-slate wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                <?php endif; ?>
                <?php if ($headline) : ?>
                    <h2 class="cl-slate m-t0 m-b0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="dp-1 m-b30 cl-slate wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                <?php endif; ?>             
            </div>
        </div>         
        <?php if (have_rows('list')): ?>
        <div class="row m-t3"> 
        <?php  while (have_rows('list')): the_row();
                $description = get_sub_field('text');  ?>
                <div class="col-xs-12 col-md-6 col-lg-3">
                    <?php if ($description) : ?>
                    <div class="dp-1 dp-list cl-slate wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                    <?php endif; ?> 
                </div>
         <?php  endwhile; ?>
         </div>
        <?php endif; ?>           
    </div>   
</section>
<?php
 endwhile;
endif;
?>
