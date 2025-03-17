<?php       
if (have_rows('info_text')) :          
    while (have_rows('info_text')) : the_row();

        // Fetch the sub-fields        
        $heading     = get_sub_field('heading');
        $subheading     = get_sub_field('subheading');
        $description = get_sub_field('description');
        $cta = get_sub_field('button_cta'); ?>
        <section class="section-info-text">
            <div class="container">
                <div class="row center-xs">                    
                    <div class="col-xs-12 col-lg-7">
                        <?php if ($subheading) : ?>
                            <span class="section-subtitle text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $subheading; ?></span>
                        <?php endif; ?>
                        <?php if ($heading) : ?>
                            <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo $heading; ?></h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <div class="description cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                            <div class="button-wrapper blue animate__animated" data-animation="fadeBottom" data-duration="2.5s">
                                <a tabindex="0" class="button black" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>            
        </section>
<?php              
            endwhile;
        endif; ?>

