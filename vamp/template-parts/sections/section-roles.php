<?php
if (have_rows('open_roles')) {
    while (have_rows('open_roles')) {
        the_row(); 
        $section_id = get_sub_field('section_id'); 
        $heading = get_sub_field('heading'); 
        $description = get_sub_field('description');  ?>
        <section class="section-roles" <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?>>
            <div class="container">
                <div class="row center-xs middle-xs">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        <?php if($heading): ?>
                            <h2 class="mt-0 mb-40 cl-blue animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1.75s"><?php echo $heading; ?></h2>
                        <?php endif; ?>                        
                    </div>  
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                       
                        <?php
                        if (have_rows('roles')) { $animation_delay = 1.75;
                            while (have_rows('roles')) {
                                the_row();                                
                                $heading = get_sub_field('role_name'); 
                                $link = get_sub_field('apply_btn'); 
                                $duration = $animation_delay . 's';  ?>
                                <div class="roles-box animate__animated fadeBottom" data-animation="fadeBottom" data-duration="<?php echo $duration;?>">
                                   <?php if($heading): ?>
                                      <div class="role-name"><?php echo $heading; ?></div>
                                    <?php endif; ?>
                                    <?php if ($link): 
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                        <a tabindex="0" class="cta-apply" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"> 
                                        <?php echo esc_html( $link_title ); ?>
                                        </a>
                                     <?php endif; ?>                                                                    
                                </div>
                        <?php 
                        $animation_delay += 0.75;  } 
                        } 
                        ?>   
                    </div>  
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center m-t1 mt-lg-3">                       
                        <?php if($description): ?>
                            <div class="dp-1 mt-0 cl-dark animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.75s">
                                <?php echo $description; ?>
                            </div>
                        <?php endif; ?> 
                        <?php if (have_rows('button_list')) {  ?> 
                                <div class="button-list m-t2 center-xs">  
                            <?php while (have_rows('button_list')) { 
                                the_row(); $cta = get_sub_field('cta_button'); ?>
                                <?php if( $cta ):
                                    $link_url = $cta['url'];
                                    $link_title = $cta['title'];
                                    $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                                    ?>                                    
                                        <a class="animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.5s" tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                            <button class="button cta-btn bg-black cl-white bg-blue-h"><?php echo esc_html( $link_title ); ?></button> 
                                        </a> 
                                <?php endif; ?>
                                <?php } ?>
                                </div>
                       <?php } ?>
                    </div>                
                  </div>
                </div> 
            </div> 
        </section> 
<?php 
    } 
} 
?>
