<?php
if (have_rows('journey_slider')) {
    while (have_rows('journey_slider')) {
        the_row(); 
        $heading = get_sub_field('heading'); 
        ?>

        <section class="section-journey-slider">
            <div class="container position-relative">
                <div class="flex row center-xs middle-xs">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                       
                        <?php if ($heading) : ?>
                            <h2 class="title-journey-slider cl-blue center-text mt-0 mb-40 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo esc_html($heading); ?></h2>
                        <?php endif; ?>                                          
                    </div>
                </div>
                <?php 
                if (have_rows('slider_content')):  ?>
                    <div class="history-slider owl-carousel owl-theme">
                            <?php while (have_rows('slider_content')): the_row(); 
                            $image = get_sub_field('image');
                            $subheading = get_sub_field('title');
                            $description = get_sub_field('text'); ?>
                            <div class="history-slide position-relative slide">                                 
                                <div class="row middle-xs h-100 ms-0 me-0">
                                    <div class="slider-text col-xs-12 col-sm-12 col-md-6 col-lg-6 h-100 ps-0 pe-0">
                                        <div class="box-history">
                                        <?php if ($subheading) : ?>
                                            <h3 class="slider-heading cl-black mt-0 mb-30"><?php echo esc_html($subheading); ?></h3>
                                        <?php endif; ?>                            
                                        <?php if ($description) : ?>
                                            <div class="dp-1 mt-08 mb-0 cl-black"><?php echo ($description); ?></div>
                                        <?php endif; ?>     
                                        </div>
                                    </div>
                                    <div class="slider-media col-xs-12 col-sm-12 col-md-6 col-lg-6 h-100 ps-0 pe-0">
                                        <div class="box-media-history h-100 w-100">
                                        <?php if ( !empty($image)) : 
                                             $srcset = wp_get_attachment_image_srcset($image['ID']);
                                             $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                            <img class="fit-cover-center w-100 h-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="675" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                                        <?php endif; ?>
                                        </div>
                                    </div>                                  
                                </div>                                 
                        </div>                
                      <?php endwhile; ?>               
                    </div>                  
               <?php endif;?> 
            <div>
        </section>           
<?php }
} ?>