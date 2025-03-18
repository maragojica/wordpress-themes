<?php
    $bg_color_banner = get_field('bg_color_banner'); 
    $designer_name = get_field('designer_name');  ?>
    <section class="page-post-banner p-t0 p-b0" <?php if($bg_color_banner): ?>style="background-color: <?php echo $bg_color_banner;?>"<?php endif; ?>>   
        <div class="container">
            <div class="row middle-xs justify-center">
                <div class="col-xs-12 col-lg-7 col-xl-6">
                   <div class="w-100 text-center wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.1s"> 
                        <h2 class="cl-white mt-0 mb-10px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo the_title(); ?></h2>                                                   
                        <div class="meta wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">   
                              <div class="subheadline cl-white"><?php the_time('F j, Y'); ?></div> 
                              <?php if ($designer_name) : ?>
                                <div class="post-line"></div>
                                <div class="subheadline cl-white"><?php echo $designer_name; ?></div>         
                            <?php endif; ?>                                                      
                        </div>                                                                                
                    </div>
                </div>
            </div>                                    
        </div>           
</section>         
