<?php 
if (have_rows('info_buttons')) :          
    while (have_rows('info_buttons')) : the_row();
    $bg_graphic  = get_sub_field('section_bg_image');
    $bg_color = get_sub_field('section_bg_color'); 
    $headline = get_sub_field('heading');  
    $description = get_sub_field('description');   ?>
<section class="section-info-button" <?php if($bg_color && !empty($bg_graphic)){ ?>style="background: linear-gradient(<?php echo $bg_color;?>, <?php echo $bg_color;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php } else{ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>            
    <div class="container">    
        <div class="row middle-xs">        
            <div class="col-xs-12 col-lg-12">  
            <?php if ($headline) : ?>
                    <h3 class="cl-white text-center text-uppercase mt-0 m-b1 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s"><?php echo $headline; ?></h2>
                <?php endif; ?>
            <?php if (have_rows('button_list')) {  ?> 
                <div class="button-list-info">  
                <?php while (have_rows('button_list')) { 
                    the_row(); $cta = get_sub_field('button_link'); ?>
                <?php if( $cta ):
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                    ?>                                    
                        <a class="animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.5s" tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                            <button class="button cta-btn bg-white cl-blue bg-dark-h cl-white-h"><?php echo esc_html( $link_title ); ?></button> 
                        </a> 
                <?php endif; ?>
                <?php } ?>
                </div>
                <?php } ?>
                <?php if ($description) : ?>
                    <div class="dp-1 m-t2 text-center cl-white wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                <?php endif; ?> 
            </div>
        </div>           
    </div> 
</section>
<?php              
    endwhile;
endif; ?>   
