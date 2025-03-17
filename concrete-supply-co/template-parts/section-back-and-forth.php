<?php
// Check if the current page has the "back_and_forth" group
if (have_rows('back_and_forth')) :

    // Loop through the rows of data
    while (have_rows('back_and_forth')) : the_row();

        // Check for content_row sub-fields
        if (have_rows('content_row')) :
            $row_count = 0;
            while (have_rows('content_row')) : the_row();

                // Fetch the sub-fields
                $row_id       = get_sub_field('row_id');               
                $image_position = get_sub_field('image_position'); 
                $media_size = get_sub_field('media_size'); 
                $media_type = get_sub_field('media_type');
                $image       = get_sub_field('image');
                $videomp4       = get_sub_field('video');
                $heading     = get_sub_field('heading');
                $subheading     = get_sub_field('subheading');
                $description = get_sub_field('description');
                $cta = get_sub_field('button_cta'); 
                $reverse_mobile = get_sub_field('reverse_mobile'); 
                $padding_top_mobile = get_sub_field('padding_top_mobile'); 
                $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');?>
                <section <?php if($row_id): ?> id="<?php echo $row_id;?>" <?php endif;?> class="back-and-forth-row <?php echo ($image_position['value'] == "right") ? 'reverse' : 'normal'; if($reverse_mobile): echo ' back-and-forth-reverse-mv'; endif; if($padding_top_mobile): echo ' back-and-forth-top-mv'; endif; if($padding_bottom_mobile): echo ' back-and-forth-bottom-mv'; endif; ?> ">
                    <div class="container-fluid content-back-forth">
                    <div class="row middle-xs row-back-forth <?php echo ($image_position['value'] == "right") ? 'reverse' : ''; if($reverse_mobile): echo ' column-reverse-mv'; endif; ?>">
                        <div class="col-xs-12 col-lg-6 ps-0 pe-0 w-100">                            
                            <div class="back-and-forth-media <?php if($media_size): echo $media_size['value']; endif; ?> animate__animated" data-animation="<?php echo ($image_position['value'] == "right") ? 'fadeRight' : 'fadeLeft';?>" >
                                <?php if($media_type['value'] == "image"){ ?>
                                    <?php if ( !empty($image)) : 
                                         $srcset = wp_get_attachment_image_srcset($image['ID']);
                                         $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                        <img class="img-fluid parallax-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="648" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                                    <?php endif; ?>   
                                <?php }elseif($media_type['value'] == "video"){ 
                                        ?> 
                                    <video id="background-video" autoplay loop muted playsinline style="pointer-events: none;">
                                        <?php if($videomp4): ?>
                                        <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                                        <?php endif; ?>
                                    </video>                     
                                <?php } ?> 
                            </div>                            
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
