<?php   
        // Fetch the sub-fields         
        $content = get_the_content();?> 
        <section  class="section-info-page">
            <div class="container p-lg-t2 p-t5">
                <div class="row row-post justify-center"> 
                    <div class="col-xs-12 col-lg-8"> 
                    <?php if (has_post_thumbnail()) : ?>
						<div class="box-featured-single wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">		  
							<?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
                         </div>		 
						<?php endif; ?>
                        <h2 class="cl-navy mt-20px wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo the_title();?></h2> 
                        <div class="dp-1 cl-navy wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><?php echo the_content(); ?></div> 
                                                                 
                    </div>                   
                </div>
            </div>            
        </section>

