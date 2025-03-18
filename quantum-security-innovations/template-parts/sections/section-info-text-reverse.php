<?php       
if (have_rows('info_text_reverse')) :          
    while (have_rows('info_text_reverse')) : the_row();

        // Fetch the sub-fields      
        $media_type = get_sub_field('media_type');
        $image_position = get_sub_field('media_position'); 
        $image = get_sub_field('image');
        $videomp4 = get_sub_field('video');  
        $heading = get_sub_field('heading');
        $subheading = get_sub_field('subheading');
        $description = get_sub_field('description');
        $cta = get_sub_field('button_cta'); 
        $reverse_mobile = get_sub_field('reverse_mobile'); 
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); ?>
        <section class="section-info-text <?php if($reverse_mobile): echo ' back-and-forth-reverse-mv'; endif; if($padding_top_mobile): echo ' back-and-forth-top-mv'; endif; if($padding_bottom_mobile): echo ' back-and-forth-bottom-mv'; endif; ?>">
            <div class="container">
                <div class="row middle-xs <?php echo ($image_position['value'] == "right") ? 'reverse' : ''; if($reverse_mobile): echo ' column-reverse-mv'; endif; ?>">     
                  <div class="col-xs-12 col-lg-6 mb-lg-0 mt-lg-0 <?php echo ($image_position['value'] == "right") ? 'm-b3' : 'm-t3'; ?>">
                    <div class="media-content animate__animated" data-animation="<?php echo ($image_position['value'] == "right") ? 'fadeRight' : 'fadeLeft';?>" >
                        <?php if($media_type['value'] == "image"){ ?>
                            <?php if ( !empty($image)) : 
                                    $srcset = wp_get_attachment_image_srcset($image['ID']);
                                    $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                <img class="img-fluid" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="479" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                            <?php endif; ?>   
                        <?php }elseif($media_type['value'] == "video"){ 
                                ?> 
                            <video autoplay loop muted>
                                <?php if($videomp4): ?>
                                <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                                <?php endif; ?>
                            </video>                     
                        <?php } ?> 
                    </div> 
                  </div>               
                    <div class="col-xs-12 col-lg-6 <?php echo ($image_position['value'] == "right") ? 'pe-lg-3' : 'ps-lg-3'; ?>">
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

