<?php 
if (have_rows('trade_accounts')) :          
    while (have_rows('trade_accounts')) : the_row();
    $section_id = get_sub_field('section_id');
    $headline = get_sub_field('heading');
    $subheadline = get_sub_field('subheading'); 
    $description = get_sub_field('description'); 
    $gravity_shortcode = get_sub_field('gravity_shortcode');  
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');      
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');   ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-trade <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">            
    <div class="container">    
        <div class="row">
        <div class="col-xs-12 col-lg-6 pe-lg-5">
            <?php if ($subheadline) : ?>
                    <div class="subheadline text-uppercase m-b1 cl-slate wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                    <?php endif; ?>
                    <?php if ($headline) : ?>
                    <h2 class="cl-slate mt-10px m-b0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="dp-1 m-b30 cl-slate wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
            <?php endif; ?>             
          </div>
            <div class="col-xs-12 col-lg-6">
            <?php if($gravity_shortcode): ?>
                    <div class="gravity-form gravity-trade wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $gravity_shortcode;?></div>
                <?php endif; ?>
            </div>
        </div>           
    </div> 
</section>
<?php              
    endwhile;
endif; ?>   
