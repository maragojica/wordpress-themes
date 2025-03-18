<?php
if (have_rows('request_quote')) {
    while (have_rows('request_quote')) {
        the_row(); 
        $heading = get_sub_field('heading'); 
        $description = get_sub_field('description'); 
        $contact_code = get_sub_field('contact_code'); ?>

        <section class="section-employment-app" id="request-quote">
            <div class="container">
                <div class="flex row center-xs middle-xs">
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 flex col text-column pe-lg-3">                       
                        <div class="text-column-inner">
                            <?php if($heading): ?>
                                <h2 class="mb-30 cl-blue animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2s"><?php echo $heading; ?></h2>
                            <?php endif; ?> 
                            <?php if($description): ?>
                                <div class="dp-1 mt-0 cl-dark animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.75s">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?> 
                            <?php if (have_rows('button_list')) {  ?> 
                                <div class="button-list m-t2">  
                            <?php while (have_rows('button_list')) { 
                                the_row(); $cta = get_sub_field('cta_button'); ?>
                                <?php if( $cta ):
                                    $link_url = $cta['url'];
                                    $link_title = $cta['title'];
                                    $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                                    ?>                                    
                                        <a class="animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.5s" tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                            <button class="button cta-btn bg-black cl-white bg-blue-h"><?php echo esc_html( $link_title ); ?></button> 
                                        </a> 
                                <?php endif; ?>
                                <?php } ?>
                                </div>
                                <?php } ?>
                        </div>                                           
                    </div> 
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 m-t2 mt-md-0">
                        <?php if ( $contact_code ): ?>                           
                              <div class="contact-code bg-blue animate__animated fadeRight"  data-animation="fadeRight" data-duration="3s"><?php echo $contact_code; ?></div>
                         <?php endif; ?>
                    </div>        
                </div>                    
          <div>
       </section>           
<?php }
} ?>