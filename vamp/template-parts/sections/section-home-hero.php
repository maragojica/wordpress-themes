<?php
if (have_rows('hero')) {
    while (have_rows('hero')) {
        the_row(); 
        $image = get_sub_field('bg_image'); 
        ?>

        <section class="section-main-hero flex">
            <div class="container h-100">
                <?php 
                $subheading = get_sub_field('subheading'); 
                $heading = get_sub_field('heading');
                $description = get_sub_field('description');                
                $cta = get_sub_field('button_cta'); 
                ?>
                    <div class="row flex text-center-mv middle-xs row-lg-h100">
                       <div class="col-xs-12 col-sm-6 pe-lg-5">
                            <?php if($subheading): ?>
                                <div class="subhead mb-10 cl-blue animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1s"><?php echo $subheading; ?></div>
                            <?php endif; ?> 

                            <?php if($heading): ?>
                                <h1 class="mt-0 mb-0 cl-black animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1.75s"><?php echo $heading; ?></h1>
                            <?php endif; ?> 

                            <?php if($description): ?>
                                <div class="dp-2 mt-0 mb-02 cl-black  animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2s">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>                        
                            <?php if (have_rows('button_list')) {  ?> 
                            <div class="button-list m-t2 start-xs">  
                        <?php while (have_rows('button_list')) { 
                            the_row(); 
                            $cta = get_sub_field('cta_button'); 
                            $button_type = get_sub_field('button_type'); ?>
                            <?php if( $cta ):
                                $link_url = $cta['url'];
                                $link_title = $cta['title'];
                                $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                                ?>                                    
                                  <a tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                    <button class="button cta-btn mt-08<?php echo ($button_type['value'] == "normal") ? ' bg-black cl-white bg-blue-h' : ' bg-blue cl-white bg-dark-h';?> animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.75s"><?php echo esc_html( $link_title ); ?></button> 
                                   </a>  
                            <?php endif; ?>
                            <?php } ?>
                            </div>
                        <?php } ?> 
                        </div>    
                        
                        <div class="col-xs-12 col-sm-6">
                            <?php if ($image): ?>
                                <div class="hero-image w-100 h-100 animate__animated fadeRight" data-animation="fadeRight" data-duration="3s">
                                   <?php $srcset = wp_get_attachment_image_srcset($image['ID']);
                                    $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                    <img class="img-fluid" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="837" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                                </div>
                            <?php endif; ?>
                    </div>       

                    </div>        
                              
            <div>
        </section>           
<?php }
} ?>