<?php 
if (have_rows('info_companies')) :          
    while (have_rows('info_companies')) : the_row();
    $section_id = get_sub_field('section_id');   
    $bg_color_section = get_sub_field('bg_section_color');
    $headline = get_sub_field('heading'); 
    $subheadline = get_sub_field('subheading');        
    $description = get_sub_field('description');  
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');  
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');
    $company_categories = get_sub_field('company_categories'); ?>
     <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-filter-company <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($bg_color_section): ?>style="background-color: <?php echo $bg_color_section;?>"<?php endif; ?>>
         <div class="container"> 
         <div class="row justify-center">                
                <div class="col-xs-12 col-xl-9 text-center wow fadeInUp" data-wow-duration="0.8" data-wow-delay="0.2s">                    
                    <?php if ($subheadline) : ?>
                            <div class="subheadline cl-slate-blue pb-10px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                        <?php endif; ?>      
                        <?php if ($headline) : ?>
                            <h2 class="cl-navy mt-0 mb-20px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s"><?php echo $headline; ?></h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <div class="dp-1 cl-navy wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.4s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?> 
                </div>                              
            </div> 
            <?php if($company_categories): ?>
                <ul class="uk-subnav uk-subnav-pill" uk-switcher="animation: uk-animation-fade">
                    <?php foreach( $company_categories as $filter_option ): ?>
                       <li><a href="#"><?php echo esc_html( $filter_option->name ); ?></a></li>
                    <?php endforeach; ?>                    
                </ul>
            <?php endif; ?>
            <?php if($company_categories): ?>                
            <div class="uk-switcher uk-margin">
              <?php $j=1; foreach( $company_categories as $filter_option ): $term_id = $filter_option->term_id; ?>
                <div>
                <?php $query = array(
                    'post_type' => array( 'company' ),     //Company
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'asc',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'company-category',
                            'terms' => $term_id,
                            'field' => 'term_id',
                        )
                    ),                    
                ); 
                $allpost = new WP_Query($query); 
                if ( $allpost->have_posts() ) { $i = 1; ?>
                <div class="row row-company justify-center">
                <?php while($allpost->have_posts()) : $allpost->the_post(); 

                $title = get_the_title(); 
                $id = get_the_id();    
                $content = get_the_content();     
                $logo_company = get_field('logo_company');     
                
               ?>
                   <div class="col-xs-12 col-md-6 col-lg-4 col-xl-3 col-company m-t2">  
                        <div class="company-box-gallery h-100">   
                            <div class="media-company">
                               <a href="#modal-company-<?php echo $j;?>-<?php echo $i;?>" uk-toggle class="w-100 h-100" tabindex="0" aria-label="<?php echo $title;?>" title="<?php echo $title;?>">   
                                
                                <?php if ( !empty($logo_company)) : 
                                    $srcset = wp_get_attachment_image_srcset($logo_company['ID']);
                                    $sizes = wp_get_attachment_image_sizes($logo_company['ID'], 'full'); ?>                
                                <img class="img-logo-company" src="<?php echo esc_url($logo_company['url']); ?>" alt="<?php echo esc_attr($logo_company['alt']); ?>" height="87" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                            <?php endif; ?> 
                            </a> 
                            </div>                              
                            <?php if($title): ?>
                                <div class="headline-company text-center bg-navy"> 
                                    <a class="simple-link link-white" href="#modal-company-<?php echo $j;?>-<?php echo $i;?>" uk-toggle class="w-100 h-100" tabindex="0" aria-label="<?php echo $title;?>" title="<?php echo $title;?>">   
                                    LEARN MORE
                                    </a>                      
                                </div>
                            <?php endif; ?>
                        </div>                       
                   </div>
                     <div id="modal-company-<?php echo $j;?>-<?php echo $i;?>" class="uk-flex-top uk-modal-container modal-company" uk-modal>
                   <?php  $post_thumbnail_id = get_post_meta( $id, '_thumbnail_id', true );
                $srcset = wp_get_attachment_image_srcset($post_thumbnail_id);
                $sizes = wp_get_attachment_image_sizes($post_thumbnail_id, 'full'); ?>
                     <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

                            <button class="uk-modal-close-default" type="button" uk-close></button>
                            <div class="row middle-xs">
                                <div class="col-xs-12 col-lg-6 col-xl-7 m-b2 mb-lg-0">
                                    <div class="box-img-company">                                   
                                        <img class="w-100 h-100 fit-cover-center img-company-lg" src="<?php echo get_the_post_thumbnail_url($id, 'full'); ?>" alt="<?php echo $title; ?>" height="817" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"> 
                                    </div>                             
                                </div>                            
                                <div class="col-xs-12 col-lg-6 col-xl-5 ps-xl-3">
                                   <div class="info m-b1">
                                    <h2 class="cl-blue mb-1"><?php echo $title;?></h2> 
                                    <?php  if($content): ?>
                                        <div class="dp-1 cl-blue"><?php echo $content;?></div>
                                      <?php endif; ?>
                                   </div>
                               
                                </div>
                             </div>
                         </div>
                       </div>
                <?php $i++; endwhile; ?>
                </div>
                <?php  wp_reset_postdata(); 
                } else {
                    echo '<p>No Companies found.</p>';
                }?> 
                </div>
                <?php $j++; endforeach; ?>                    
            </div>   
           <?php endif; ?>                                   
       </div>             
</section>

<?php              
    endwhile;
endif; ?>  