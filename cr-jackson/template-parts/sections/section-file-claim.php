
<section class="section-file-claim">            
    <div class="container">
        <div class="row justify-center">
            <div class="col-xs-12 col-lg-9">
             <div class="box-info-content dp-1 cl-blue wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo the_content(); ?></div>   
            <?php $form_shortcode = get_field('form_shortcode'); 
                if($form_shortcode): ?>
                <div class="box-claim m-lg-t5 m-t2 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">            
                    <?php echo $form_shortcode; ?>                                                                
                </div>
            </div>
            <?php endif; ?>
        </div>                                    
    </div>
</section>         
