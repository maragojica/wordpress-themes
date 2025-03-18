<?php
if (have_rows('services')): 
    while (have_rows('services')) :
        the_row(); 
        $heading = get_sub_field('heading'); 
        $add_padding_top = get_sub_field('add_padding_top'); 
        $add_padding_bottom = get_sub_field('add_padding_bottom'); ?>
        <section class="section-services <?php if( !$add_padding_top ): ?> p-t0<?php endif; ?> <?php if( !$add_padding_bottom ): ?> p-b0<?php endif; ?>">
         <div class="container">
            <div class="row middle-xs justify-center">                       
               <div class="col-xs-12 col-lg-8">
                    <?php if ($heading) : ?>
                        <h2 class="section-title text-center text-uppercase cl-black mt-0 mb-3 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $heading; ?></h2>
                    <?php endif; ?>   
                    <?php  if (have_rows('services_list')): ?>
                    <div class="services_slider">
                        <?php  while (have_rows('services_list')): the_row(); 
                         $icon = get_sub_field('icon');
                         $heading = get_sub_field('headline'); 
                         $description = get_sub_field('text'); ?>
                        <div class="service_slide">
                            <div class="box-services-slide">
                            <div class="row h-100 middle-xs">
                                <div class="col-xs-12 col-md-6">
                                <?php if ( !empty($icon)) : ?>                
                                    <img class="icon-values animate__animated" data-animation="fadeBottom" data-duration="1.75s" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" width="80" heigth="80" />                            
                                <?php endif; ?>  
                                <?php if($heading): ?>
                                    <h3 class="text-uppercase text-center cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo $heading;?></h3>
                                <?php endif; ?>  
                                </div>
                                <div class="col-xs-12 col-md-6">
                                <?php if ($description) : ?>
                                    <div class="dp-1 dp-2 cl-black animate__animated" data-animation="fadeBottom" data-duration="2.75s"><?php echo wp_kses_post($description); ?></div>
                                <?php endif; ?> 
                                </div>
                            </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>                                              
        </div>    
    </section>
<?php
 endwhile;
endif;
?>