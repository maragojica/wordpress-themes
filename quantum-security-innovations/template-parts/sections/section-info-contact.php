<?php if (have_rows('info_contact')):  
     while (have_rows('info_contact')) :
        the_row(); 
        $headline = get_sub_field('heading');
        $subheading = get_sub_field('subheading');  
        $description = get_sub_field('description');  
        $gravity_form = get_sub_field('gravity_form'); 
        $cta = get_sub_field('cta_button');?>
        <section class="section-info-contact">            
            <div class="container"> 
                <div class="row middle-xs">                    
                    <div class="col-xs-12 col-lg-5 p-lg-e5 p-b4 pb-lg-0 col-info-contact pe-xl-4">
                    <?php if ($subheading) : ?>
                            <span class="subheading cl-green text-uppercase mt-0 m-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $subheading; ?></span>
                        <?php endif; ?>
                        <?php if ($headline) : ?>
                            <h2 class="section-title text-uppercase cl-blue mt-0 mb-10px animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $headline; ?></h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <div class="dp-1 dp-2 cl-black animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>                          
                        <?php if (have_rows('list_icons')):  $animation_delay = 2; ?>   
                            <div class="row p-t05">
                            <?php  while (have_rows('list_icons')): the_row(); 
                            $icon = get_sub_field('icon');                           
                            $text = get_sub_field('info');
                            $duration = $animation_delay . 's'; ?>
                             <div class="col-xs-12">                                
                                  <div class="box-info-icons relative animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                                  <?php if ( !empty($icon)) : ?>                
                                    <img class="icon-info" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" width="24" heigth="24" />                            
                                <?php endif; ?>
                                  <?php if ($text) : ?>
                                    <div class="dp-1 dp-2 cl-black"><?php echo wp_kses_post($text); ?></div>
                                    <?php endif; ?>
                                  </div>
                               </div>                           
                            <?php $animation_delay += 1; endwhile; ?>      
                            </div>                         
                        <?php endif; ?>  
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                            <div class="button-wrapper green animate__animated p-t1" data-animation="fadeBottom" data-duration="1s">
                                <a tabindex="0" class="button cl-green cl-white-h bg-green-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                            </div>
                        <?php endif; ?>                
                    </div>
                    <?php if($gravity_form ): ?>
                    <div class="col-xs-12 col-lg-7">
                        <div class="box-contact animate__animated" data-animation="fadeRight" data-duration="1s"><?php echo $gravity_form; ?></div>
                    </div>
                    <?php endif; ?>
                </div>                         
            </div> 
        </section>
    <?php 
     endwhile;
endif;
?>
