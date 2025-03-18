<?php
if (have_rows('booking')) {
    while (have_rows('booking')) {
        the_row(); 
        $shortcode = get_sub_field('shortcode'); 
        ?>

        <section class="section-booking">
            <div class="container">
                <div class="flex row center-xs middle-xs mobile-reverse-xl">
                    <div class="col-xs-12 col-md-7 col-lg-7">
                    <?php if($shortcode): ?>
                        <div class="booking-box animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1.75s">
                            <?php echo $shortcode; ?>
                        </div>
                    <?php endif; ?>                      
                    </div>                          
                </div>                    
          <div>
       </section>           
<?php }
} ?>