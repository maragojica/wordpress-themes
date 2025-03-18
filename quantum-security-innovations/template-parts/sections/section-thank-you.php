<?php
if (have_rows('thanks_banner')) {
    while (have_rows('thanks_banner')) {
        the_row();         
        $bg_graphic  = get_sub_field('bg_shape');
        $bg_color = get_sub_field('bg_color');?>
        <section class="page-thank-you flex p-0 m-0 animate__animated" data-animation="fadeIn" data-duration="1s" <?php if($bg_color){ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>
        <?php if(!empty(!empty($bg_graphic))): 
             $srcset = wp_get_attachment_image_srcset($bg_graphic['ID']);
             $sizes = wp_get_attachment_image_sizes($bg_graphic['ID'], 'full');  ?>
           <img class="hero-shape animate__animated" data-animation="fadeIn" data-duration="4.75s" src="<?php echo esc_url($bg_graphic['url']); ?>" alt="<?php echo esc_attr($bg_graphic['alt']); ?>" height="500" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" />        
        <?php endif; ?>           
            <div class="container">
                <div class="row h-100 middle-xs center-xs">
                    <div class="col-xs-12 col-md-8 col-lg-6">
                      <div class="flex col w-100 h-100 text-center">
                      <?php $headline = get_sub_field('headline');
                        $subheadline = get_sub_field('subheadline');    
                        $description = get_sub_field('description');              
                        $cta = get_sub_field('cta_button'); ?>
                         <?php if($subheadline): ?>
                            <span class="subheading cl-white text-uppercase mt-0 m-0 animate__animated" data-animation="fadeBottom" data-duration="2.75s"><?php echo $subheadline; ?></span>
                        <?php endif; ?> 
                        <?php if($headline): ?>
                            <h1 class="cl-white text-uppercase mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="3s"><?php echo $headline; ?></h1>
                        <?php endif; ?>      
                        <?php if ($description) : ?>
                            <div class="dp-1 p-t1 cl-white animate__animated" data-animation="fadeBottom" data-duration="3.75s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>                  
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                            <div class="button-wrapper m-t1 white animate__animated" data-animation="fadeBottom" data-duration="4s">
                                <a tabindex="0" class="button cl-white cl-black-h bg-white-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                            </div>
                        <?php endif; ?>
                      </div>
                    </div>                    
                </div>
            </div>         
        </section>           
<?php }
} ?>
