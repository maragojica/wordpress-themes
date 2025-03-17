<?php 
if (have_rows('info_two_columns')) :          
    while (have_rows('info_two_columns')) : the_row();
    $section_id = get_sub_field('section_id');   
    $headline = get_sub_field('heading');  
    $subheadline = get_sub_field('subheading'); 
    $description = get_sub_field('description');
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-info-text <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
         <div class="container">        
            <div class="row justify-center"> 
            <?php if($headline ||  $subheading): ?>
                <div class="col-xs-12 col-lg-6">
                <?php if ($subheadline) : ?>
                        <div class="subheadline cl-blue pb-17px text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                    <?php endif; ?>      
                    <?php if ($headline) : ?>
                        <h2 class="cl-black mt-0 mb-0 text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    <?php endif; ?>  
                    <?php if (have_rows('button_list')) {  $i = 1; ?> 
                        <div class="button-list-info top-xs col mt-20px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s">  
                        <?php while (have_rows('button_list')) { 
                            the_row(); $cta = get_sub_field('button_cta');
                            $open_lightbox = get_sub_field('open_lightbox'); ?>
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                            ?>     
                                <div class="cta-btn">                               
                                <a tabindex="0" class="button blue" <?php if( $open_lightbox ){ ?> href="#modal-info-btn-<?php echo $i;?>" uk-toggle <?php }else{ ?> href="<?php echo esc_url( $link_url ); ?>"<?php } ?>target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span class="text"><?php echo esc_html( $link_title ); ?></span></a>                             
                                </div>
                                <?php endif; ?>
                                <?php if($open_lightbox): 
                                    $title_lightbox = get_sub_field('title_lightbox');
                                    $content_lightbox = get_sub_field('content_lightbox'); ?>

                                    <div id="modal-info-btn-<?php echo $i;?>" class="uk-flex-top uk-modal-container modal-info-links" uk-modal>
                                        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

                                            <button class="uk-modal-close-outside" type="button" uk-close></button>

                                            <?php if ( $title_lightbox) : ?>
                                                <div class="subheadline cl-blue text-center pb-17px text-uppercase" ><?php echo  $title_lightbox; ?></div>
                                            <?php endif; ?>  
                                            <?php if ($content_lightbox) : ?>
                                                <div class="dp-1 text-center cl-black" ><?php echo wp_kses_post($content_lightbox); ?></div>
                                            <?php endif; ?>  
                                            <?php if (have_rows('buttons_lightbox')) {  ?> 
                                        <div class="button-list-info center-xs mt-20px">  
                                        <?php while (have_rows('buttons_lightbox')) { 
                                            the_row(); $cta = get_sub_field('btn_pdf'); ?>
                                                <?php if( $cta ):
                                                    $link_url = $cta['url'];
                                                    $link_title = $cta['title'];
                                                    $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                                                    ?>     
                                                        <div class="cta-btn">                               
                                                        <a tabindex="0" class="button blue" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span class="text"><?php echo esc_html( $link_title ); ?></span></a>                             
                                                        </div>
                                                        <?php endif; ?>
                                                <?php } ?>
                                                </div>
                                                <?php } ?>  

                                        </div>
                                    </div>
                                <?php endif; ?>    
                        <?php $i++; } ?>
                        </div>
                        <?php } ?>  
                </div>
                <?php endif; ?>  
                <?php if($description): ?>
                <div class="col-xs-12 col-lg-6">                    
                    <?php if ($description) : ?>
                        <div class="dp-1 cl-black wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.4s"><?php echo wp_kses_post($description); ?></div>
                    <?php endif; ?>                    
                </div>
                <?php endif; ?>               
            </div>                                                    
       </div>             
</section>

<?php              
    endwhile;
endif; ?>  