<?php if ( have_rows( 'faqs' ) ):  
    while( have_rows('faqs') ): the_row();  
    $heading = get_sub_field('headline'); 
    $section_id = get_sub_field('section_id');
    $bg_color = get_sub_field('bg_color'); 
    $add_padding_top = get_sub_field('add_padding_top'); 
    $add_padding_bottom = get_sub_field('add_padding_bottom');?>
    <section class="section-flexible-accordeon <?php if( !$add_padding_top ): ?> p-t0<?php endif; ?> <?php if( !$add_padding_bottom ): ?> p-b0<?php endif; ?>" <?php if($section_id): ?> id="<?php echo $section_id; ?>" <?php endif;?> <?php if($bg_color ): ?>style="background-color: <?php echo $bg_color;?>" <?php endif; ?> >
        <div class="container">
            <?php if ($heading) : ?>
            <div class="row center-xs">                    
                <div class="col-xs-12 col-lg-7">  
                    <h2 class="section-title text-uppercase cl-black mt-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo esc_html($heading); ?></h2>                                 
                </div>
            </div>
            <?php endif; ?>      
            <?php if ( have_rows( 'faqs_list' ) ):  ?>
                <div class="row center-xs">                    
                   <div class="col-xs-12"> 
                    <div class="accordeon-content animate__animated" data-animation="fadeBottom" data-duration="1.75s">
                    <?php while( have_rows('faqs_list') ): the_row(); 
                        $accordeon_title = get_sub_field('question');
                        $accordeon_text = get_sub_field('answer');  ?>
                        <?php if($accordeon_title): ?>
                            <button class="accordion" title="Accordeon"><?php echo $accordeon_title; ?></button>
                        <?php endif; ?>               
                        <div class="panel">
                        <?php if ($accordeon_text) : ?>
                                <div class="dp-1 dp-2 cl-black cl-black"><?php echo wp_kses_post($accordeon_text); ?></div>
                            <?php endif; ?>
                        </div>              
                    <?php endwhile; ?>
                    </div>
                </div>
               </div>
            <?php endif; ?>   
        </div> 
    </section> 
<?php endwhile;  endif; ?>