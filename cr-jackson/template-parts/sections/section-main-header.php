<?php
if (have_rows('main_header')) {
    while (have_rows('main_header')) {
    the_row(); 
    $section_id = get_sub_field('section_id'); 
    $banner_image = get_sub_field('section_bg_img');       
    $bg_overlay = get_sub_field('section_bg_color');
    $section_headline = get_sub_field('section_headline');
    $button_cta = get_sub_field('button_cta');
    $margin_top_desktop = get_sub_field('margin_top_desktop'); 
    $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');        
    $margin_top_mobile = get_sub_field('margin_top_mobile'); 
    $margin_bottom_mobile = get_sub_field('margin_bottom_mobile');  ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="page-main-header flex w-margin <?php if(!$margin_top_desktop): echo ' mt-0'; endif; if(!$margin_bottom_desktop): echo ' mb-0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>" <?php if(!empty($banner_image)): ?>style="background-image: linear-gradient(to bottom, <?php echo $bg_overlay; ?>, <?php echo $bg_overlay; ?>), url('<?php echo esc_url($banner_image); ?>');"<?php endif; ?>>            
        <div class="container">
            <div class="row middle-xs">
                <div class="col-xs-12">
                <div class="box-header w-100 h-100">            
                        <?php if ($section_headline) : ?>
                            <h2 class="cl-blue mt-0 mb-0 text-uppercase wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $section_headline; ?></h2>
                        <?php endif; ?>                                                                      
                    </div>
                </div>
            </div>                                    
        </div>
    </section>         
<?php }
} ?>