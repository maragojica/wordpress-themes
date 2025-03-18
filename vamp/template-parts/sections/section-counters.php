<?php if (have_rows('counters')):  ?>
    <section class="counters-section bg-black" >            
        <div class="container">                
            <!-- Counters Repeater -->               
                <div class="counters-row row top-xs center-xs p-md-t2 p-md-b2">
                    <?php $animation_delay = 1;
                     while (have_rows('counters')): the_row(); 
                        $number = get_sub_field('number');
                        $heading = get_sub_field('heading'); 
                        $duration = $animation_delay . 's'; ?>
                        <div class="counter-col col-xs-12 col-md-6 col-lg-3 p-lg-b0 p-b2">
                            <h2 class="counter-number text-center text-uppercase cl-blue mt-0 mb-03" data-count="<?php echo esc_attr($number); ?>">0</h2>
                            <div class="counter-heading text-uppercase text-center cl-white animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                                <?php echo esc_html($heading); ?>
                            </div>
                        </div>
                    <?php $animation_delay += 1; endwhile; ?>
                </div>
        </div> 
        </section>
    <?php 
endif;
?>
