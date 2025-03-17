<?php   
        // Fetch the sub-fields      
        $audio = get_field('audio_file'); 
        if( $audio ): ?> 
        <section  class="section-info-blog">
            <div class="container">
                <div class="row row-post justify-center"> 
                    <div class="col-xs-12 col-lg-8"> 
                        <div class="dp-1 p-lg-t2 cl-off-black wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <audio class="player w-100" controls>
                                <source src="<?php echo $audio;?>" type="audio/mp3" />								
                            </audio>
                        </div>                                             
                    </div>   
					<div class="col-xs-12 col-lg-8"> 
                        <div class="dp-1 p-lg-t2 cl-off-black wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo the_content(); ?></div>                                             
                    </div>
                </div>
            </div>            
        </section>
        <?php endif; ?>

