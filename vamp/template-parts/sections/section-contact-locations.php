<?php
if (have_rows('contact_locations')) {
    while (have_rows('contact_locations')) {
        the_row(); 
        $heading = get_sub_field('heading'); 
        $description = get_sub_field('description'); ?>
        <section class="section-contact-locations">
            <div class="container">
                <div class="flex col center-xs middle-xs text-center">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?php if($heading): ?>
                            <h2 class="mt-0 mb-20 center-text cl-blue animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1.75s"><?php echo $heading; ?></h2>
                        <?php endif; ?> 
                        <?php if($description): ?>
                            <div class="dp-1 m-b3 cl-dark animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2s">
                                <?php echo $description; ?>
                            </div>
                        <?php endif; ?>                       
                    </div>

                    <div class="contact-cards-container flex row center-xs">
                    <?php
                    if (have_rows('contact')) { $animation_delay = 1.75;
                        while (have_rows('contact')) {
                            the_row();                            
                            $heading = get_sub_field('heading'); 
                            $info = get_sub_field('contact_info'); 
                            $duration = $animation_delay . 's';  ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 animate__animated fadeBottom" data-animation="fadeBottom" data-duration="<?php echo $duration;?>">
                              <div class="contact-info-card bg-grey text-center"> 
                                    <?php if($heading): ?>
                                        <span class="little-heading center-text cl-blue"><?php echo $heading;?></span>
                                    <?php endif; ?> 
                                    <?php if( $info ): ?>
                                       <div class="dp-1 cl-black"><?php echo $info; ?></div>     
                                    <?php endif; ?>
                                </div>
                            </div>
                    <?php 
                       $animation_delay += 0.75;  } 
                    } 
                    ?>   
                    </div> 
                </div> 
            </div> 
        </section> 
<?php 
    } 
} 
?>
