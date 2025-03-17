<?php 
if (have_rows('product_info')) :          
    while (have_rows('product_info')) : the_row();
    $section_id = get_sub_field('section_id');   
    $headline = get_sub_field('heading');  
    $subheadline = get_sub_field('subheading'); 
    $description = get_sub_field('description'); 
    $title_specifications = get_sub_field('title_specifications');  
    $product_specifications = get_sub_field('product_specifications');  
    $gallery = get_sub_field('slider');  
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-products-list-cat <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
         <div class="container">        
            <div class="row mb-lg-3"> 
               <div class="col-xs-12 col-lg-6">
                  <?php if($gallery): ?>
                    <div class="slide-products wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.2s">             
                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
                            <div class="uk-position-relative">
                                <div class="uk-slider-container uk-light">
                                    <div id="info-slide" class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m" uk-switcher="connect: #content-slide; animation: uk-animation-fade">
                                    <?php foreach( $gallery as $image ): 
                                        $srcset = wp_get_attachment_image_srcset($image['ID']);
                                        $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>
                                        <div>
                                           <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="90" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                                     
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="uk-hidden@s uk-light">
                                    <a class="uk-position-center-left uk-position-small" href uk-slidenav-previous uk-slider-item="previous"></a>
                                    <a class="uk-position-center-right uk-position-small" href uk-slidenav-next uk-slider-item="next"></a>
                                </div>

                                <div class="uk-visible@s">
                                    <a class="uk-position-center-left-out uk-position-small" href uk-slidenav-previous uk-slider-item="previous"></a>
                                    <a class="uk-position-center-right-out uk-position-small" href uk-slidenav-next uk-slider-item="next"></a>
                                </div>
                            </div>
                           
                        </div>
                        <div id="content-slide" class="uk-switcher" uk-lightbox="animation: fade">
                            <?php foreach( $gallery as $image ): 
                                $srcset = wp_get_attachment_image_srcset($image['ID']);
                                $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>
                            <div> 
                                <a class="uk-inline" href="<?php echo esc_url($image['url']); ?>" data-caption="<?php echo esc_attr($image['alt']); ?>">
                                    <img src="<?php echo esc_url($image['url']); ?>" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" height="392" alt="<?php echo esc_attr($image['alt']); ?>"> 
                                </a>
                            </div>
                            <?php endforeach; ?>                           
                        </div>
                    </div>   
                  <?php endif; ?>               
               </div>
                <?php if($headline ||  $subheadline || $description || $product_specifications): ?>
                <div class="col-xs-12 col-lg-6 ps-xl-2 m-b2 pt-xl-0 p-t2">   
                  <?php if ($subheadline) : ?>
                        <div class="subheadline cl-blue pb-17px text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                    <?php endif; ?>      
                    <?php if ($headline) : ?>
                        <h2 class="cl-black mt-0 mb-0 text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    <?php endif; ?>
                    <?php if ($description) : ?>
                        <div class="dp-1 cl-black wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                    <?php endif; ?> 
                    <?php if ($product_specifications) : ?>
                        <?php if ($title_specifications) : ?>
                            <div class="subheadline cl-blue pb-17px mt-20px text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $title_specifications; ?></div>
                        <?php endif; ?>
                        <div class="dp-1 cl-black wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo wp_kses_post($product_specifications); ?></div>
                    <?php endif; ?> 
                </div>
                <?php endif; ?>               
            </div>  
            <?php 
                if (have_rows('product_info_accordeon')) :  ?>     
                <div class="row-info-product row center-xs p-t1 p-lg-t5">                    
                            <div class="col-xs-12"> 
                            <div class="accordeon-content wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                            <?php while( have_rows('product_info_accordeon') ): the_row(); 
                                $accordeon_title = get_sub_field('title');
                                $accordeon_text = get_sub_field('text');  ?>
                                <?php if($accordeon_title): ?>
                                    <button class="accordion" title="Accordeon"><?php echo $accordeon_title; ?></button>
                                <?php endif; ?>               
                                <div class="panel">
                                <?php if ($accordeon_text) : ?>
                                        <div class="dp-1 cl-blue"><?php echo wp_kses_post($accordeon_text); ?></div>
                                    <?php endif; ?>
                                </div>              
                            <?php endwhile; ?>
                            </div>
                        </div>
                </div>
                <?php 
                endif; ?>    
                  <?php if (have_rows('button_list')) {  ?> 
                        <div class="row p-t3 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">  
                        <?php while (have_rows('button_list')) { 
                            the_row(); $button_name = get_sub_field('button_name'); $cta = get_sub_field('button_link'); ?>
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                            ?>    
                             <div class="col-xs-12 col-lg-6 mb-lg-0 m-b2">  
                                <div class="box-list-btn text-center bg-navy">
                                <?php if($button_name): ?>
                                    <h3 class="cl-white text-uppercase"><?php echo $button_name;?></h3>
                                 <?php endif; ?>   
                                <div class="box-link-simple">                               
                                <a tabindex="0" class="simple-link link-white" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span class="text"><?php echo esc_html( $link_title ); ?></span></a>                             
                                </div>
                                </div>
                             </div>
                                <?php endif; ?>
                        <?php } ?>
                        </div>
                        <?php } ?>                                                  
       </div>             
</section>

<?php              
    endwhile;
endif; ?>  
