<?php       
if (have_rows('sign_up')) :          
    while (have_rows('sign_up')) : the_row();

        // Fetch the sub-fields               
        $heading = get_sub_field('headline');      
        $description = get_sub_field('description'); 
        $form_shortcode = get_sub_field('form_shortcode');  ?>
        <section class="section-info-text p-t0">
            <div class="container">
                <div class="row middle-xs center-xs"> 
                    <div class="col-xs-12 col-md-7">                       
                        <?php if ($heading) : ?>
                            <h2 class="section-title text-uppercase cl-black mt-0 mb-10px animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $heading; ?></h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <div class="dp-1 dp-2 cl-black animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?> 
                    </div>                    
                </div>
                <?php if($form_shortcode ): ?>    
                <div class="row middle-xs center-xs"> 
                    <div class="col-xs-12 col-md-8">                 
                        <div class="box-sign-up m-t1 animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo $form_shortcode; ?></div>    
                    </div>                    
                </div>               
               <?php endif; ?>      
            </div>            
        </section>
<?php              
            endwhile;
        endif; ?>

