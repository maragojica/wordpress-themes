<?php 
if (have_rows('testimonials_block')) :          
    while (have_rows('testimonials_block')) : the_row();      
    $headline = get_sub_field('headline');  ?>

<section class="section-testimonials-block position-relative">
    <div class="container-fluid pe-0 ps-0 pt-md-5">       
        <div class="row pb-md-5 pt-md-5">
            <div class="col-xxl-4">
               <?php if($headline): ?>
                <h2 class="bigheadline cl-off-white pb-xl-2 pb-4 text-md-start text-center"><?php echo $headline;?></h2>
                <?php endif; ?>          
            </div>
            <div class="col-xxl-8">
                <?php if (have_rows('slider_testimonials')) :  ?>
                    <div class="slider-testimonials owl-carousel">
                    <?php while (have_rows('slider_testimonials')) : the_row();      
                            $text = get_sub_field('text'); 
                            $name_position = get_sub_field('name_position'); ?>
                            <div class="item animated fadeIn">                                        
                                <div class="box-testimonial w-100">
                                    <?php if($text): ?>
                                        <div class="text-testimonial"><?php echo $text;?></div>
                                    <?php endif; ?>  
                                    <?php if($name_position): ?>
                                        <div class="name-testimonial"><?php echo $name_position;?></div>
                                    <?php endif; ?>  
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
endif; ?> 

