<?php       
if (have_rows('info_careers')) :          
    while (have_rows('info_careers')) : the_row();

        // Fetch the sub-fields        
        $heading     = get_sub_field('heading');
        $subheading     = get_sub_field('subheading');
        $description = get_sub_field('description'); 
        $bg_section_color = get_sub_field('bg_section_color'); ?>
        <section class="section-info-buttons info-careers bg-lightgray" <?php if($bg_section_color): ?>style="background-color: <?php echo $bg_section_color;?>"<?php endif; ?>>
            <div class="container">
                <div class="row center-xs">                    
                    <div class="col-xs-12">
                        <?php if ($subheading) : ?>
                            <span class="section-subtitle text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $subheading; ?></span>
                        <?php endif; ?>
                        <?php if ($heading) : ?>
                            <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo $heading; ?></h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <div class="description cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>                                           
                    </div>
                </div>
                <?php if (have_rows('careers_contents')) :  ?>
                    <div class="row p-lg-t3">
                        <?php while (have_rows('careers_contents')) : the_row();
                        $heading = get_sub_field('title');
                        $subheading  = get_sub_field('subtitle');
                        $description = get_sub_field('text'); 
                        $cta = get_sub_field('button_cta');  ?>
                             <div class="col-xs-12 col-lg-6 m-lg-t0 m-t3">
                             <div class="box-info w-100 h-100 bg-lightgray animate__animated" data-animation="fadeBottom" data-duration="1s">
                                    <div class="header-info-careers">
                                    <?php if ($subheading) : ?>
                                        <span class="section-subtitle text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="2.75s"><?php echo esc_html($subheading); ?></span>
                                    <?php endif; ?>
                                    <?php if ($heading) : ?>
                                        <h2 class="subheading text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="3s"><?php echo esc_html($heading); ?></h2>
                                    <?php endif; ?>
                                    <?php if ($description) : ?>
                                        <div class="description cl-black animate__animated" data-animation="fadeBottom" data-duration="3.75s"><?php echo wp_kses_post($description); ?></div>
                                    <?php endif; ?>
                                    </div>
                                    <?php if( $cta ):
                                        $link_url = $cta['url'];
                                        $link_title = $cta['title'];
                                        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                                        <div class="button-wrapper blue animate__animated" data-animation="fadeBottom" data-duration="4.5s">
                                            <a tabindex="0" class="button black" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                                        </div>
                                    <?php endif; ?>                                  
                                    </div>
                             </div>
                        <?php endwhile; ?>
                    </div>
                <?php  endif; ?>    
            </div>            
        </section>
<?php              
            endwhile;
        endif; ?>

