<?php       
if (have_rows('back_forth')) :          
    while (have_rows('back_forth')) : the_row();
        $sectiontitle = get_sub_field('title_section');
        $add_padding_top_section = get_sub_field('add_padding_top_section'); 
        $add_padding_bottom_section = get_sub_field('add_padding_bottom_section');
        // Fetch the sub-fields      
        ?>
        <section class="section-back-forth <?php if( !$add_padding_top_section ): ?> p-t0<?php endif; ?> <?php if( !$add_padding_bottom_section ): ?> p-b0<?php endif; ?>">
            <div class="container">
             <?php if ($sectiontitle) : ?>
                <div class="row center-xs p-lg-b3">                    
                    <div class="col-xs-12">                       
                        <h2 class="section-title text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo esc_html($sectiontitle); ?></h2>                                                  
                    </div>
                </div>
                <?php endif; ?>   
                <?php if (have_rows('content_row')) : 
                    while (have_rows('content_row')) : the_row(); 
                    $media_type = get_sub_field('media_type');
                    $image_position = get_sub_field('media_position'); 
                    $image = get_sub_field('image');
                    $videomp4 = get_sub_field('video');  
                    $poster = get_sub_field('video_poster'); 
                    $heading = get_sub_field('heading');
                    $subheading = get_sub_field('subheading');
                    $description = get_sub_field('description');
                    $cta = get_sub_field('button_cta'); 
                    $reverse_mobile = get_sub_field('reverse_mobile'); 
                    $add_padding_top = get_sub_field('add_padding_top'); 
                    $add_padding_bottom = get_sub_field('add_padding_bottom'); ?>

                    <div class="row row-back-forth middle-xs <?php if( !$add_padding_top ): ?> p-t0<?php endif; ?> <?php if( !$add_padding_bottom ): ?> p-b0<?php endif; ?><?php echo ($image_position['value'] == "right") ? ' reverse' : ''; if($reverse_mobile): echo ' column-reverse-mv'; endif; ?>">     
                    <div class="col-xs-12 col-lg-6 mb-lg-0 mt-lg-0">
                        <div class="media-content animate__animated" data-animation="<?php echo ($image_position['value'] == "right") ? 'fadeRight' : 'fadeLeft';?>" >
                            <?php if($media_type['value'] == "image"){ ?>
                                <?php if ( !empty($image)) : 
                                        $srcset = wp_get_attachment_image_srcset($image['ID']);
                                        $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                    <img class="img-fluid w-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="479" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                                <?php endif; ?>   
                            <?php }elseif($media_type['value'] == "video"){ ?>  
                                <video class="player" playsinline controls <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>>                        
                                    <?php if( $videomp4 ): ?>
                                        <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                                    <?php endif; ?>                                   
                                    Your browser does not support the video tag.
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
                <?php  endwhile; endif;  ?>
            </div>            
        </section>
<?php endwhile;
endif; ?>

