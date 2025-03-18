<?php
if (have_rows('info_text')) {
    while (have_rows('info_text')) {
        the_row(); 
        $image = get_sub_field('image'); 
        $reverse_mobile = get_sub_field('reverse_mobile'); 
        ?>

        <section class="section-info-text">
            <div class="container">
                <div class="flex row center-xs middle-xs <?php if($reverse_mobile): ?> mobile-reverse-xl<?php endif; ?>">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 flex col text-column pe-lg-5">
                        <?php
                        if (have_rows('content')) {
                            while (have_rows('content')) {
                                the_row(); 
                                $heading = get_sub_field('heading'); 
                                $description = get_sub_field('description'); 
                                ?>
                                <div class="text-column-inner">
                                    <?php if($heading): ?>
                                        <h2 class="mb-30 cl-blue animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2s"><?php echo $heading; ?></h2>
                                    <?php endif; ?> 
                                    <?php if($description): ?>
                                        <div class="dp-1 mt-0 cl-dark animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.75s">
                                            <?php echo $description; ?>
                                        </div>
                                    <?php endif; ?> 
                                   <?php if (have_rows('button_list')) {  ?> 
                                        <div class="button-list m-t2">  
                                    <?php while (have_rows('button_list')) { 
                                        the_row(); $cta = get_sub_field('cta_button'); ?>
                                        <?php if( $cta ):
                                            $link_url = $cta['url'];
                                            $link_title = $cta['title'];
                                            $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                                            ?>                                    
                                                <a class="animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.5s" tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                                    <button class="button cta-btn bg-black cl-white bg-blue-h"><?php echo esc_html( $link_title ); ?></button> 
                                                </a> 
                                        <?php endif; ?>
                                        <?php } ?>
                                        </div>
                                        <?php } ?>
                                </div>
                        <?php }
                        } ?>                       
                    </div> 
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 <?php if(!$reverse_mobile): ?> m-t2 mt-md-0 <?php endif; ?>">
                        <?php if ($image): ?>                           
                               <?php $srcset = wp_get_attachment_image_srcset($image['ID']);
                                $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                <img class="img-fluid w-100 animate__animated fadeRight" data-animation="fadeRight" data-duration="3s" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="652" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                         <?php endif; ?>
                    </div>        
                </div>                    
          <div>
       </section>           
<?php }
} ?>