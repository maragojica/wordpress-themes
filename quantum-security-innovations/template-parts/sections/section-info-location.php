<?php       
if (have_rows('info_location')) :          
    while (have_rows('info_location')) : the_row();

        // Fetch the sub-fields  
        $heading = get_sub_field('heading');
        $subheading = get_sub_field('subheading');
        $description = get_sub_field('description');
        $cta = get_sub_field('button_cta'); 
        $reverse_mobile = get_sub_field('reverse_mobile'); 
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); 
        $map_position = get_sub_field('map_position'); ?>
        <section class="section-info-text <?php if($reverse_mobile): echo ' back-and-forth-reverse-mv'; endif; if($padding_top_mobile): echo ' back-and-forth-top-mv'; endif; if($padding_bottom_mobile): echo ' back-and-forth-bottom-mv'; endif; ?>">
            <div class="container">
                <div class="row middle-xs <?php echo ($map_position['value'] == "right") ? 'reverse' : ''; if($reverse_mobile): echo ' column-reverse-mv'; endif; ?>">     
                  <div class="col-xs-12 col-lg-6 mb-lg-0 mt-lg-0 <?php echo ($map_position['value'] == "right") ? 'm-b3' : 'm-t3'; ?>">
                    <div class="media-content w-100 animate__animated" data-animation="<?php echo ($map_position['value'] == "right") ? 'fadeRight' : 'fadeLeft';?>" >
                    <div class="map"><?php echo do_shortcode('[single_map]');?></div>
                    </div> 
                  </div>               
                    <div class="col-xs-12 col-lg-6 <?php echo ($map_position['value'] == "right") ? 'pe-lg-3' : 'ps-lg-3'; ?>">
                        <?php if ($subheading) : ?>
                            <span class="subheading cl-green text-uppercase mt-0 m-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $subheadline; ?></span>
                        <?php endif; ?>
                        <?php if ($heading) : ?>
                            <h2 class="section-title text-uppercase cl-black mt-0 mb-10px animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo $heading; ?></h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <div class="dp-1 dp-2 cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>  
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                            <div class="button-wrapper green animate__animated p-t05" data-animation="fadeBottom" data-duration="2.75s">
                                <a tabindex="0" class="button cl-green cl-white-h bg-green-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>            
        </section>
<?php              
            endwhile;
        endif; ?>

