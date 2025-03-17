<?php $locator = get_field('locator_shortcode'); ?>
<section class="section-laz-locator p-t0 p-lg-b0">
    <div class="container">
        <div class="row center-xs">                    
            <div class="col-xs-12">                      
                <?php if ($locator) : ?>
                    <div class="box-locator cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo ($locator); ?></div>
                <?php endif; ?>                       
            </div>
        </div>
    </div>            
</section>


