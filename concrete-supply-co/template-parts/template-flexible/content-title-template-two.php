<?php  $section_id = get_sub_field('section_id');
       $heading = get_sub_field('headline');
        $subheading     = get_sub_field('subheadline');
        $description = get_sub_field('description'); ?>
        <section class="section-title-template-two p-lg-b0 p-lg-t0" <?php if($section_id): ?> id="<?php echo $section_id; ?>" <?php endif; ?>>
            <div class="container">
                <div class="row">                    
                    <div class="col-xs-12 col-lg-5-1">
                        <?php if ($subheading) : ?>
                            <span class="section-subtitle text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $subheading; ?></span>
                        <?php endif; ?>
                        <?php if ($heading) : ?>
                            <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo $heading; ?></h2>
                        <?php endif; ?>                                              
                    </div>
                    <div class="col-xs-12 col-lg-7-1">
                    <?php if ($description) : ?>
                            <div class="description m-start-0 cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>
                    <?php if (have_rows('buttons')) : ?>
                        <div class="flex flex-row-lg flex-column gap-1 align-items-center p-t1">
                            <?php  while (have_rows('buttons')) : the_row();

                            // Fetch the sub-fields        
                            $cta = get_sub_field('button_cta'); ?>
                            <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                            <div class="button-wrapper blue animate__animated" data-animation="fadeBottom" data-duration="2.5s">
                                <a tabindex="0" class="button black" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                            </div>
                            <?php endif; 
                            endwhile; ?>
                        </div>
                    <?php endif; ?> 
                    </div>
                </div>
            </div>            
        </section>

