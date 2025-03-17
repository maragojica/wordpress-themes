<?php $library = get_field('library_shortcode'); ?>
<section class="section-laz-library p-t0">
    <div class="container">
        <div class="row center-xs">                    
            <div class="col-xs-12 col-md-10">                      
                <?php if ($library) : ?>
                    <div class="box-library cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo ($library); ?></div>
                <?php endif; ?>                       
            </div>
        </div>
    </div>            
</section>


