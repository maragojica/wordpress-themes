<?php
if (have_rows('internal_hero')) {
    while (have_rows('internal_hero')) {
        the_row(); ?>

        <section class="section-internal-hero bg-blue mb-0 p-0">
        <div class="container banner-container w-100">
            <div class="row flex center-xs middle-xs">
                <?php 
                $subheading = get_sub_field('subheading');
                $heading = get_sub_field('heading');
                $description = get_sub_field('description'); 
                ?> 
                <div class="col-xs-12 col-lg-12 w-100 h-100 text-center">
                    <?php if($subheading): ?>
                        <div class="subhead mb-10 cl-white animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1s"><?php echo $subheading; ?></div>
                    <?php endif; ?> 

                    <?php if($heading): ?>
                        <h1 class="mt-0 mb-0 cl-white animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1.75s"><?php echo $heading; ?></h1>
                    <?php endif; ?> 

                    <?php if($description): ?>
                        <div class="dp-2 mt-0 mb-02 cl-white animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2s">
                            <?php echo $description; ?>
                        </div>
                    <?php endif; ?> 

                    <?php if (have_rows('button_list')) {  ?> 
                        <div class="button-list m-t2 center-xs">  
                       <?php while (have_rows('button_list')) { 
                           the_row();
                            $cta = get_sub_field('cta_button'); 
                            $button_type = get_sub_field('button_type'); ?>
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                            ?>                                    
                                <a class="animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.5s" tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                    <button class="button cta-btn <?php echo ($button_type['value'] == "normal") ? ' bg-black cl-white bg-white-h cl-black-h' : ' bg-white cl-blue bg-dark-h cl-white-h';?>"><?php echo esc_html( $link_title ); ?></button> 
                                </a> 
                        <?php endif; ?>
                        <?php } ?>
                        </div>
                        <?php } ?>             
            </div> 
        </div>
        </section>           
<?php }
} ?>
