<?php if (have_rows('info_thankyou')):  
     while (have_rows('info_thankyou')) :
        the_row(); 
        $headline = get_sub_field('heading');       
        $description = get_sub_field('description');         
        $bg_graphic = get_sub_field('bg_section_image');
        $bg_color = get_sub_field('bg_section_color'); 
        $img = get_sub_field('thank_you_image'); 
        $cta = get_sub_field('button_cta'); ?>
        <section class="section-thank-you" <?php if($bg_color && !empty($bg_graphic)){ ?>style="background: linear-gradient(<?php echo $bg_color;?>, <?php echo $bg_color;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php } else{ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>            
            <div class="container"> 
                <div class="row middle-xs center-xs">                    
                    <div class="box-thank-you position-relative flex bottom-xs center-xs">
                        <?php if ( !empty($img)) : ?>                
                            <img class="img-fluid img-thankyou" src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" width="1036" heigth="443" />                            
                        <?php endif; ?>
                        <?php if ($headline) : ?>
                            <h1 class="page-title mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo esc_html($headline); ?></h2>
                        <?php endif; ?>
					</div>	
                    <div class="col-xs-12 col-md-9 col-lg-6 p-t1">
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
     endwhile;
endif;
?>
