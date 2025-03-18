
<?php 
if (have_rows('post_info')) :          
    while (have_rows('post_info')) : the_row();
    
    $section_id = get_sub_field('section_id');               
    $content = get_sub_field('description');  
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');  
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-info-blog <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" >
            <div class="container">
                <div class="row row-post justify-center"> 
                    <div class="col-xs-12 col-lg-8">                        
                        <?php if( $content ): ?>
                           <div class="dp-1 cl-forest-green wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $content; ?></div> 
                        <?php endif; ?>                                            
                    </div>                   
                </div>
            </div>            
        </section>
        <?php              
    endwhile;
endif; ?>
