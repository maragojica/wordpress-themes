<?php $heading = get_sub_field('section_title'); 
$section_id = get_sub_field('section_id');  
$add_desk_top_padding = get_sub_field('add_desk_top_padding'); 
$add_desk_bottom_padding = get_sub_field('add_desk_bottom_padding'); 
$add_mob_top_padding = get_sub_field('add_mob_top_padding'); 
$add_mob_bottom_padding = get_sub_field('add_mob_bottom_padding'); ?>

<?php if ( have_rows( 'accordeon_info' ) ):  ?>
    <section class="section-flexible-accordeon <?php if(!$add_desk_top_padding): echo ' p-lg-t0'; endif; if(!$add_desk_bottom_padding): echo ' p-lg-b0'; endif; if(!$add_mob_top_padding): echo ' p-t0'; endif; if(!$add_mob_bottom_padding): echo ' p-b0'; endif;?>" <?php if($section_id): ?> id="<?php echo $section_id; ?>" <?php endif;?> >
        <div class="container">
        <?php if ($heading) : ?>
        <div class="row center-xs">                    
            <div class="col-xs-12 col-lg-7">  
                <h2 class="section-title text-uppercase cl-blue animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo esc_html($heading); ?></h2>                                 
            </div>
        </div>
        <?php endif; ?>      
            <div class="accordeon-content animate__animated" data-animation="fadeBottom" data-duration="1.75s">
            <?php while( have_rows('accordeon_info') ): the_row(); 
                $accordeon_title = get_sub_field('accordeon_title');
                $columns = get_sub_field('columns'); 
                $columnsnumber = "col-lg-12";
                switch ($columns['value']) {
                    case "two":
                        $columnsnumber = "col-md-6";
                        break;
                    case "three":
                        $columnsnumber = "col-md-6 col-lg-4";
                        break;
                    case "four":
                        $columnsnumber = "col-md-6 col-lg-3";
                        break;                    
                    case "six":
                        $columnsnumber = "col-md-6 col-lg-2";
                        break;
                }?>
                <?php if($accordeon_title): ?>
                    <button class="accordion" title="Accordeon"><?php echo $accordeon_title; ?></button>
                <?php endif; ?>
                <?php  if ( have_rows( 'contact_list' ) ): ?>
                    <div class="panel">
                      <div class="row">
                        <?php while( have_rows('contact_list') ): the_row();                                                       
                            $description = get_sub_field('info'); ?>
                               <div class="col-xs-12 <?php echo $columnsnumber;?> "> 
                               <?php if ($description) : ?>
                                    <div class="description cl-black"><?php echo wp_kses_post($description); ?></div>
                                <?php endif; ?>
                               </div>
                            <?php endwhile; ?>
                      </div> 
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
            </div>
        </div> 
    </section> 
<?php endif; ?>