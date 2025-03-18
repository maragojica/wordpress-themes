<?php
if (have_rows('method')) {
    while (have_rows('method')) {
        the_row(); 
        $section_id = get_sub_field('section_id'); 
        $heading = get_sub_field('heading'); 
        $image = get_sub_field('steps_image'); 
        $mobile_image = get_sub_field('steps_image_mobile'); 
?>
    <section class="section-method">
        <div class="container-fluid">
            <div class="row center-xs middle-xs">
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 auto">
                    <?php if($heading): ?>
                        <div class="animate_animated fadeBottom" data-animation="fadeBottom" data-duration="2.20s">
                            <h2 class="cl-blue mt-0 mb-1 text-center"><?php echo $heading; ?></h2>
                        </div>
                    <?php endif; ?>  
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 auto">
                        <div class="desktop-img">
                            <?php if ($image) : ?>
                                <?php echo wp_get_attachment_image($image['ID'], 'full'); ?> 
                            <?php endif; ?>
                        </div>

                        <div class="mobile-img">
                            <?php if ($mobile_image) : ?>
                                <?php echo wp_get_attachment_image($mobile_image['ID'], 'full'); ?> 
                            <?php endif; ?>

                        </div>
                        
                </div>
            </div>
        </div>
    </section>
<?php
    }
}
?>
