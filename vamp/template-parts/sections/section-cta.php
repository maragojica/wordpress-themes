<?php
if (have_rows('cta')) {
    while (have_rows('cta')) {
        the_row(); ?>

        <section class="section-cta" id="section-cta">
        <div class="container">
            <div class="row flex center-xs middle-xs">
                <?php 
                $heading = get_sub_field('heading');
                $cta = get_sub_field('button');
                ?> 
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="cta-container bg-black flex row middle-xs animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1s">
                       <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 cta-text">
                            <?php if($heading): ?>
                                <span class="little-heading cl-white animate__animated fadeLeft" data-animation="fadeLeft" data-duration="1.75s"><?php echo $heading;?></span>
                            <?php endif; ?> 
                        </div> 

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 cta-button flex end-xs">
                            <?php if( $cta ):
                                $link_url = $cta['url'];
                                $link_title = $cta['title'];
                                $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                                ?>                                    
                                    <a class="animate__animated fadeRight" data-animation="fadeRight" data-duration="2s" tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                        <button class="button cta-btn bg-white cl-blue bg-blue-h cl-white-h"><?php echo esc_html( $link_title ); ?></button> 
                                    </a> 
                            <?php endif; ?>
                        </div>     
                    </div>   
             </div>                 
            </div> 
        </div>
        </section>           
<?php }
} ?>
