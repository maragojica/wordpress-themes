<?php 
if (have_rows('products_section')) :          
    while (have_rows('products_section')) : the_row();
    $section_id = get_sub_field('section_id');   
    $headline = get_sub_field('heading');  
    $subheadline = get_sub_field('subheading'); 
    $description = get_sub_field('description');
    $center_content = get_sub_field('center_content'); 
    $full_width = get_sub_field('full_width');
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); 
    $columns = get_sub_field('columns_number');
    $columnsnumber = "col-lg-12";
    switch ($columns['value']) {
        case "one":
            $columnsnumber = "col-lg-12";
            break;
        case "two":
            $columnsnumber = "col-lg-6";
            break;
        case "three":
            $columnsnumber = "col-lg-4";
            break;
        case "four":
            $columnsnumber = "col-lg-3";
            break; 
    } ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-products-list-cat <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
         <div class="container">        
            <div class="row <?php if($center_content): ?> justify-center <?php endif;?>"> 
                <?php if($headline ||  $subheadline): ?>
                <div class="col-xs-12 <?php if($full_width){ ?> col-lg-12 <?php }else{?> col-lg-8 col-xl-8 <?php } if($center_content): ?> text-center <?php endif;?> m-b2">   
                  <?php if ($subheadline) : ?>
                        <div class="subheadline cl-blue pb-17px text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                    <?php endif; ?>      
                    <?php if ($headline) : ?>
                        <h2 class="cl-black mt-0 mb-0 text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    <?php endif; ?>
                    <?php if ($description) : ?>
                        <div class="dp-1 cl-black wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                    <?php endif; ?> 
                </div>
                <?php endif; ?>               
            </div>  
            <?php $filter_options = get_sub_field('products_filter'); 
            if ($filter_options) { $animation_delay = 0.1; ?>
                    <div class="row ">
                        <?php foreach( $filter_options as $filter_option ){
                            $headline = $filter_option->name;                            
                            $duration = $animation_delay . 's'; 
                            $query = array(
                                'post_type' => array( 'cmp-product' ),  
                                'post_status' => 'publish',
                                'orderby' => 'title',
                                'order' => 'asc',
                                'posts_per_page' => -1,
                                'tax_query' => array(             
                                    array(
                                       'taxonomy' => 'products-category',
                                       'field' => 'slug',
                                       'terms' => $headline, 
                                   ),
                                )
                            ); 
                            $allpost = new WP_Query($query);
                            if ( $allpost->have_posts() ) {
                                while($allpost->have_posts()) : $allpost->the_post(); $link_to_contact = get_field('link_to_contact');  ?>
                            <div class="col-xs-12 col-md-6 <?php echo $columnsnumber;?> col-products m-b2 wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.2s">                               
                                <div class="box-card h-100">
                                <div class="card-media bg-gray">                               
                                   <?php if (has_post_thumbnail()) : ?> 
                                        <a class="w-100 h-100" tabindex="0" href="<?php the_permalink(); ?>" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>"> 
                                            <?php echo get_the_post_thumbnail( get_the_id(), 'full', array( 'class'  => 'img-fluid w-100 h-100 fit-contain-center' ) ); ?>
                                        </a>                                           
                                     <?php endif; ?> 
                                </div>
                                <div class="card-footer bg-navy">                                    
                                        <h3 class="cl-white text-uppercase m-t0 m-b0 text-center">                                        
                                        <?php echo the_title();?>
                                        </h3> 
                                        <div class="box-link-simple">                        
                                            <a tabindex="0" class="simple-link link-white" href="<?php the_permalink(); ?>" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>">                            
                                            <?php if($link_to_contact){ echo "CONTACT US"; }else{ echo "VIEW PRODUCT"; } ?>
                                            </a>
                                      </div>                                   
                                </div> 
                                </div>                                                
                            </div>
                            <?php endwhile; 
                                wp_reset_postdata(); }else{ ?>
                               <div class="col-xs-12 col-md-12 col-products m-b2 wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.2s">
                               <h3 class="cl-black m-t0 m-b0">                                        
                                   Sorry, we don't have any products in this category yet
                                 </h3> 
                               </div>
                                <?php } ?> 
                        <?php $animation_delay += 0.10; } ?>                 
                    </div>   
                <?php } ?>                                           
       </div>             
</section>

<?php              
    endwhile;
endif; ?>  