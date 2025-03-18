<?php       
if (have_rows('faqs')) :          
    while (have_rows('faqs')) : the_row();
        $heading = get_sub_field('heading'); ?>
        <section class="section-faqs">
            <div class="container">  
                <div class="row center-xs middle-xs">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 auto">
                        <?php if($heading): ?>
                            <div class="animate_animated fadeBottom" data-animation="fadeBottom" data-duration="2.20s">
                                <h2 class="cl-blue mt-0 mb-02 text-center" id="faq-section"><?php echo $heading; ?></h2>
                            </div>
                        <?php endif; ?>  
                    </div>
                </div>

                <div class="row center-xs middle-xs">
                    <?php 
                    $accordion = get_sub_field('accordion');
                    if (have_rows('accordion')): 
                        $count = count($accordion); ?>
                        <div class="accordion-content m-t2 animate__animated fadeBottom" data-animation="fadeBottom" data-duration="3s">
                            <?php while (have_rows('accordion')): the_row(); 
                                $title = get_sub_field('question'); 
                                $text = get_sub_field('answer'); ?>
                                <div class="box-accordion">
                                    <?php if ($title): ?>
                                        <button class="accordion cl-dark <?php if($count == 1): ?>active<?php endif; ?>" title="accordion"><?php echo $title; ?></button>
                                    <?php endif; ?>
                                    <div class="panel" <?php if ($count == 1): ?> style="max-height: max-content;"<?php endif; ?>>
                                        <?php if ($text): ?>
                                            <div class="faq-description cl-dark"><?php echo wp_kses_post($text); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div> 
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div> 
            </div>
        </section>
    <?php endwhile;
endif;
?>
