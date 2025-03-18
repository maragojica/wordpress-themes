<?php
if (have_rows('reviews')) {
    while (have_rows('reviews')) {
        the_row(); 
        $heading = get_sub_field('heading'); 
        $shortcode = get_sub_field('google_reviews_shortcode'); 
        $cta = get_sub_field('button_cta'); 
        ?>

        <section class="section-reviews">
            <div class="container">
                <div class="row col center-xs middle-xs">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-7 bg-white auto animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1s">
                        <?php if ($heading) : ?>
                            <h2 class="cl-blue center-text mt-0 mb-1 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo esc_html($heading); ?></h2>
                        <?php endif; ?>

                        <?php if ($shortcode): ?>
                            <div class="reviews-slider flex center-xs middle-xs auto animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1.75s">
                                <?php echo $shortcode ?>
                            </div>
                        <?php endif; ?>

                        <?php if( $cta ):
                                $link_url = $cta['url'];
                                $link_title = $cta['title'];
                                $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                                ?>  
                                <div class="button-row flex row center-xs middle-xs">                                  
                                    <a tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                        <button class="button cta-btn mt-08 bg-black cl-white bg-blue-h animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2s"><?php echo esc_html( $link_title ); ?></button> 
                                    </a> 
                                </div>
                        <?php endif; ?>
                    </div>        
                </div>                    
            <div>
        </section>           
<?php }
} ?>