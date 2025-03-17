<?php 
if (have_rows('contact_box')) :          
    while (have_rows('contact_box')) : the_row();
    $section_id = get_sub_field('section_id');
    $shape  = get_sub_field('shape');    
    $headline = get_sub_field('heading');
    $subheadline = get_sub_field('subheading'); 
    $description = get_sub_field('description');      
    $gravity_form_shortcode = get_sub_field('gravity_form_shortcode');   
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');      
    $reverse_mobile = get_sub_field('reverse_mobile'); 
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-contact-form <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">            
    <div class="container">    
        <div class="row middle-xs <?php if($reverse_mobile){ echo ' row-reverse-mv';  } ?>">
        <div class="col-xs-12 col-lg-7 mt-lg-0 m-t2">
             <?php if ( $gravity_form_shortcode ): ?>                           
                    <div class="contact-code bg-black wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $gravity_form_shortcode; ?></div>
                <?php endif; ?>
          </div>
            <div class="col-xs-12 col-lg-5 ps-lg-4">  
               <?php if ($subheadline) : ?>
                    <div class="subheadline text-uppercase m-b1 cl-orange wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                    <?php endif; ?>
                    <?php if ($headline) : ?>
                    <h3 class="cl-blue text-uppercase mt-10px mb-10px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s"><?php echo $headline; ?></h2>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="dp-1 m-b30 cl-blue wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                <?php endif; ?> 
            </div>
        </div>           
    </div> 
</section>
<?php              
    endwhile;
endif; ?>   
