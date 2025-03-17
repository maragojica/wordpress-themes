<?php
// Check if the current page has the "info_text_image" group
if (have_rows('info_text_image_container')) :

    // Loop through the rows of data
    while (have_rows('info_text_image_container')) : the_row();

        // Check for content_row sub-fields
        if (have_rows('content_row_info')) :
            $row_count = 0;
            while (have_rows('content_row_info')) : the_row();

                // Fetch the sub-fields
                $image       = get_sub_field('image');
                $image_position = get_sub_field('image_position'); 
                $image_size = get_sub_field('image_size'); 
                $heading     = get_sub_field('heading');
                $subheading     = get_sub_field('subheading');
                $description = get_sub_field('description');
                $cta = get_sub_field('button_cta'); ?>
                <section class="section-info-text-image p-b0 back-and-forth-row <?php echo ($image_position['value'] == "right") ? 'reverse' : 'normal'; ?>">
                    <div class="container">
                    <div class="row middle-xs <?php echo ($image_position['value'] == "right") ? 'reverse' : ''; ?>">
                        <div class="col-xs-12 col-lg-6 ps-0 pe-0 w-100">
                            <?php if ($image) : 
                                 $srcset = wp_get_attachment_image_srcset($image['ID']);
                                 $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>
                                <div class="info-text-image <?php if($image_size): echo $image_size['value']; endif; ?> w-100 animate__animated" data-animation="<?php echo ($image_position['value'] == "right") ? 'fadeRight' : 'fadeLeft';?>">                                             
                                      <img class="img-fluid w-100 h-100 fit-cover-center parallax-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="720" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>  
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-xs-12 col-lg-6 col-justify-center col-text">
                            <?php if ($subheading) : ?>
                                <span class="section-subtitle text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo esc_html($subheading); ?></span>
                            <?php endif; ?>
                            <?php if ($heading) : ?>
                                <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo esc_html($heading); ?></h2>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                                <div class="description cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo wp_kses_post($description); ?></div>
                            <?php endif; ?>
                            <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                            <div class="button-wrapper blue animate__animated" data-animation="fadeBottom" data-duration="2.5s">
                                <a tabindex="0" class="button black" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                            </div>
                        <?php endif; ?>
                        </div>
                        </div>
                    </div>                    
                </section>
            <?php
                $row_count++;
            endwhile;
        endif;

    endwhile;

endif;
?>
