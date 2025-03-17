<?php  $section_id = get_sub_field('section_id');
       $heading = get_sub_field('headline');
        $subheading     = get_sub_field('subheadline');
        $description = get_sub_field('description'); ?>
        <section class="section-title-template-one" <?php if($section_id): ?> id="<?php echo $section_id; ?>" <?php endif; ?>>
            <div class="container">
                <div class="row align-items-center">                    
                    <div class="col-xs-12 col-lg-4">
                        <?php if ($subheading) : ?>
                            <span class="section-subtitle text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $subheading; ?></span>
                        <?php endif; ?>
                        <?php if ($heading) : ?>
                            <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo $heading; ?></h2>
                        <?php endif; ?>                                              
                    </div>
                    <div class="col-xs-12 col-lg-8">
                    <?php if ($description) : ?>
                            <div class="description m-start-0 cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>                     
                    </div>
                </div>
            </div>            
        </section>

