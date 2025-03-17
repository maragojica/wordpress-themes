<?php   
        // Fetch the sub-fields         
        $content = get_the_content();?> 
        <section  class="section-info-blog">
            <div class="container">
                <div class="row row-post justify-center"> 
                    <div class="col-xs-12 col-lg-8"> 
                    <?php if (has_post_thumbnail()) : ?>
						<div class="box-featured-single">		  
							<?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
                         </div>		 
						<?php endif; ?>
                        <div class="dp-1 p-lg-t2 cl-black wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo the_content(); ?></div>                                             
                    </div>                   
                </div>
            </div>            
        </section>

