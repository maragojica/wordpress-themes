<?php
$show_code  = get_field('show_code'); 
// Check if the current page has the "back_and_forth" group
if($show_code):
if (have_rows('info_code')) :

    // Loop through the rows of data
    while (have_rows('info_code')) : the_row();

                // Fetch the sub-fields
                $row_id  = get_sub_field('row_id'); 
                $code_widget = get_sub_field('code_widget'); 
                $padding_top_mobile = get_sub_field('padding_top_mobile'); 
                $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');?>
                <section <?php if($row_id): ?> id="<?php echo $row_id;?>" <?php endif;?> class="section-info-code <?php if($padding_top_mobile): echo ' back-and-forth-top-mv'; endif; if($padding_bottom_mobile): echo ' back-and-forth-bottom-mv'; endif; ?> ">
                    <div class="container">
                    <div class="row middle-xs justify-center">
                        <div class="col-xs-12 col-lg-8">                            
                           <?php if($code_widget): echo $code_widget; endif; ?>                          
                        </div>                        
                        </div>
                    </div>                    
                </section>
            <?php         

    endwhile;

endif;
endif;
?>
