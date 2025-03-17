<?php 
    $social_shortcode = get_field('instagram_shortcode', 'option');  ?>
    <section id="section-instagram-feed" class="section-social">
         <div class="container-fluid ps-0 pe-0"> 
            <?php if( $social_shortcode): ?>
                <div class="social-shortcode text-center"><?php echo $social_shortcode;?></div>
            <?php endif; ?>                                                            
       </div>             
</section>
