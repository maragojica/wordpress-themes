<?php       
if (have_rows('our_services')) :          
    while (have_rows('our_services')) : the_row();
        // Fetch the sub-fields        
        $section_id = get_sub_field('section_id');
        $heading     = get_sub_field('heading');
        $subheading     = get_sub_field('subheading');
        $description = get_sub_field('description');
        $cta = get_sub_field('button_cta'); ?>
        <section class="section-services" <?php if($section_id): ?>id="<?php echo $section_id;?>"<?php endif; ?>>
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
                    </div>
                </div>
                <?php if (have_rows('services_list')) : $animation_delay = 1; ?>
                    <div class="row p-t1"> 
                        <?php while (have_rows('services_list')) : the_row();

                        // Fetch the sub-fields        
                        $title     = get_sub_field('title');                        
                        $description = get_sub_field('info'); 
                        $duration = $animation_delay . 's'; ?>
                         <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3 p-b2 p-xl-b0">
                            <div class="box-services h-100 animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                            <?php if ($title) : ?>
                                <span class="section-subtitle text-uppercase cl-black mt-0 mb-0"><?php echo esc_html($title); ?></span>
                            <?php endif; ?>                       
                            <?php if ($description) : ?>
                                <div class="description cl-black"><?php echo wp_kses_post($description); ?></div>
                            <?php endif; ?> 
                            </div>
                         </div>
                        <?php $animation_delay += 0.75; endwhile; ?>
                    </div>
                <?php endif; ?> 
                <?php if( $cta ):
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                        <div class="row center-xs p-md-t2">                    
                            <div class="col-xs-12 col-lg-7">   
                            <div class="button-wrapper blue animate__animated" data-animation="fadeBottom" data-duration="2.5s">
                                <a tabindex="0" class="button black" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                            </div>
                        </div>
                    </div>
                <?php endif; ?> 
            </div>            
        </section>
<?php              
            endwhile;
        endif; ?>

