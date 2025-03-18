<?php
if (have_rows('employment_app')) {
    while (have_rows('employment_app')) {
        the_row(); 
        $form_shortcode = get_sub_field('shortcode'); 
        ?>
      
      <section class="section-employment-app">
            <div class="container">
                <div class="flex row center-xs middle-xs">
                    <div class="col-xs-12 col-md-8 col-lg-8">
                    <?php if($form_shortcode): ?>
                        <div class="app-box animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1.75s">
                            <?php echo $form_shortcode; ?>
                        </div>
                    <?php endif; ?>                      
                    </div>                          
                </div>                    
          <div>
       </section>            
<?php }
} ?>