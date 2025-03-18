<?php 
$titlesection = get_field('title_team'); 
$cta = get_field('cta_team'); 
$list_team_desktop = get_field('list_team_ai_desktop');
$list_team_desktop_right = get_field('list_team_ai_desktop_right');
$list_team_ai = get_field('list_team_ai');?>
    <?php if( $list_team_ai ): ?>
    <section class="section-team">
       <div class="container-fluid pt-lg-5 pb-5">
            <div class="row">
                <div class="col-md-12 pt-5 pb-5">
                    <?php if($titlesection): ?>
                        <h2 class="cl-l-blue text-center"><?php echo $titlesection;?></h2>
                     <?php endif; ?>   
                </div>
            </div>
            <?php if($list_team_desktop): ?>
            <div class="wrap-row-team hide-md">
                <div class="row-team mb-4 hide-md">
                    <?php $i = 1; 
                    foreach( $list_team_desktop as $post  ):
                        setup_postdata($post);
        				$bg_color_desktop = get_field('bg_color_desktop'); 
                        $bg_color_desktop_ai = get_field('bg_color_desktop_ai'); 
        				$position = get_field('position_team');  
                        $lat_position = get_field('lat_position_team');
                        $alt_description = get_field('alt_description');
                        if( $bg_color_desktop_ai ): $bg_color_desktop = $bg_color_desktop_ai; endif;
                        if( $lat_position ): $position =  $lat_position; endif; 
                        $linkedin_team = get_field('linkedin_team'); ?>         
                        <div class="col-team col-ai">       
                            <div class="item-team <?php echo $bg_color_desktop;?> toggle-content-parent">  
            					 <?php if ( has_post_thumbnail() ) {
                             $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                             $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                             $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>              
                               <img class="img-team" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>" width="166" height="166">                           
                            <?php } ?>
                                <div class="title-team"><?php echo the_title();?></div>
            					<?php if( $position ): ?>
                                    <div class="position-team"><?php echo $position; ?></div>
                                <?php endif; ?>
                                <div class="toggle-content-child" style="display:none;" >
                                    <div class="desc-team"><?php if($alt_description){ echo $alt_description; }else{ echo the_content(); }?></div>      
                					<?php if( $linkedin_team ):
                                        $link_url = $linkedin_team['url'];
                                        $link_title = $linkedin_team['title'];
                                        $link_target = $linkedin_team['target'] ? $linkedin_team['target'] : '_self'; ?>    
                                       
                                        <div class="m-t1 text-center">                       
                                                <a tabindex="0" class="linkedin-social" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 37 37" fill="none">
                                                    <g clip-path="url(#clip0_675_29)">
                                                        <path class="bg-social" fill-rule="evenodd" clip-rule="evenodd" d="M4.07983 36.9514H32.0798C34.289 36.9514 36.0798 35.1606 36.0798 32.9514V4.95142C36.0798 2.74228 34.289 0.951416 32.0798 0.951416H4.07983C1.87069 0.951416 0.079834 2.74228 0.079834 4.95142V32.9514C0.079834 35.1606 1.87069 36.9514 4.07983 36.9514Z" fill="#2A675F"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M31.0798 31.9514H25.7376V22.8525C25.7376 20.3578 24.7897 18.9637 22.8152 18.9637C20.6671 18.9637 19.5449 20.4145 19.5449 22.8525V31.9514H14.3965V14.6181H19.5449V16.9529C19.5449 16.9529 21.0929 14.0885 24.7711 14.0885C28.4477 14.0885 31.0798 16.3337 31.0798 20.977V31.9514ZM8.25451 12.3484C6.50086 12.3484 5.07983 10.9162 5.07983 9.14992C5.07983 7.38359 6.50086 5.95142 8.25451 5.95142C10.0082 5.95142 11.4283 7.38359 11.4283 9.14992C11.4283 10.9162 10.0082 12.3484 8.25451 12.3484ZM5.59611 31.9514H10.9645V14.6181H5.59611V31.9514Z" fill="white"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_675_29">
                                                        <rect width="36" height="36" fill="white" transform="translate(0.079834 0.951416)"/>
                                                        </clipPath>
                                                    </defs>
                                                    </svg>
                                            </a>                            
                                        </div>
                                    <?php endif; ?> 
                                </div>
                               
                            </div>
                        </div>
                        <?php $i++; 
                    endforeach;  ?>
                </div>
                <div class="row-team row-team-right mb-4 hide-md">
                    <?php $i = 1; 
                    foreach( $list_team_desktop_right as $post  ):
                        setup_postdata($post);
                        $bg_color_desktop = get_field('bg_color_desktop'); 
                        $bg_color_desktop_ai = get_field('bg_color_desktop_ai'); 
                        $position = get_field('position_team');  
                        $lat_position = get_field('lat_position_team');
                        if( $bg_color_desktop_ai ): $bg_color_desktop = $bg_color_desktop_ai; endif;
                        if( $lat_position ): $position =  $lat_position; endif; 
                        $linkedin_team = get_field('linkedin_team'); ?>         
                        <div class="col-team col-ai">       
                            <div class="item-team <?php echo $bg_color_desktop;?> toggle-content-parent">  
                                <?php if ( has_post_thumbnail() ) {
                                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                                    $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>              
                                        <img class="img-team" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>" width="166" height="166">                           
                                <?php } ?>
                                <div class="title-team"><?php echo the_title();?></div>
                                <?php if( $position ): ?>
                                    <div class="position-team"><?php echo $position; ?></div>
                                <?php endif; ?>
                                <div class="toggle-content-child" style="display:none;" >
                                    <div class="desc-team"><?php echo the_content();?></div>      
                                    <?php if( $linkedin_team ):

                                    $link_url = $linkedin_team['url'];
                                    $link_title = $linkedin_team['title'];
                                    $link_target = $linkedin_team['target'] ? $linkedin_team['target'] : '_self'; ?>    
                                   
                                    <div class="m-t1 text-center">                       
                                            <a tabindex="0" class="linkedin-social" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 37 37" fill="none">
                                                <g clip-path="url(#clip0_675_29)">
                                                    <path class="bg-social" fill-rule="evenodd" clip-rule="evenodd" d="M4.07983 36.9514H32.0798C34.289 36.9514 36.0798 35.1606 36.0798 32.9514V4.95142C36.0798 2.74228 34.289 0.951416 32.0798 0.951416H4.07983C1.87069 0.951416 0.079834 2.74228 0.079834 4.95142V32.9514C0.079834 35.1606 1.87069 36.9514 4.07983 36.9514Z" fill="#2A675F"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M31.0798 31.9514H25.7376V22.8525C25.7376 20.3578 24.7897 18.9637 22.8152 18.9637C20.6671 18.9637 19.5449 20.4145 19.5449 22.8525V31.9514H14.3965V14.6181H19.5449V16.9529C19.5449 16.9529 21.0929 14.0885 24.7711 14.0885C28.4477 14.0885 31.0798 16.3337 31.0798 20.977V31.9514ZM8.25451 12.3484C6.50086 12.3484 5.07983 10.9162 5.07983 9.14992C5.07983 7.38359 6.50086 5.95142 8.25451 5.95142C10.0082 5.95142 11.4283 7.38359 11.4283 9.14992C11.4283 10.9162 10.0082 12.3484 8.25451 12.3484ZM5.59611 31.9514H10.9645V14.6181H5.59611V31.9514Z" fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_675_29">
                                                    <rect width="36" height="36" fill="white" transform="translate(0.079834 0.951416)"/>
                                                    </clipPath>
                                                </defs>
                                                </svg>
                                        </a>                            
                                    </div>
                                    <?php endif; ?> 
                                </div>
                               
                            </div>
                        </div>
                        <?php $i++; 
                    endforeach;  ?>
                </div>
            </div><!-- wrap-row-team -->
            <?php endif;  wp_reset_postdata(); ?>
            <div class="row-team mb-4 show-md">
            <?php $i = 1; foreach( $list_team_ai as $post  ):
             setup_postdata($post);
				$bg_color_desktop = get_field('bg_color_desktop'); 
                $bg_color_desktop_ai = get_field('bg_color_desktop_ai'); 
				$position = get_field('position_team');  
                $lat_position = get_field('lat_position_team');
                if( $bg_color_desktop_ai ): $bg_color_desktop = $bg_color_desktop_ai; endif;
                if( $lat_position ): $position =  $lat_position; endif; 
                $linkedin_team = get_field('linkedin_team'); ?>         
                <div class="col-team col-ai">       
                <div class="item-team <?php echo $bg_color_desktop;?> toggle-content-parent">  
					 <?php if ( has_post_thumbnail() ) {
                 $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                 $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                 $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>              
                   <img class="img-team" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>" width="166" height="166">                           
             <?php } ?>
                    <div class="title-team"><?php echo the_title();?></div>
					 <?php if( $position ): ?>
                        <div class="position-team"><?php echo $position; ?></div>
                     <?php endif; ?>
                     <div class="toggle-content-child" style="display:none;" >
                     <div class="desc-team"><?php echo the_content();?></div>      
					<?php if( $linkedin_team ):

                    $link_url = $linkedin_team['url'];

                    $link_title = $linkedin_team['title'];

                    $link_target = $linkedin_team['target'] ? $linkedin_team['target'] : '_self'; ?>    
                   
                        <div class="m-t1 text-center">                       
                            <a tabindex="0" class="linkedin-social" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 37 37" fill="none">
                                <g clip-path="url(#clip0_675_29)">
                                    <path class="bg-social" fill-rule="evenodd" clip-rule="evenodd" d="M4.07983 36.9514H32.0798C34.289 36.9514 36.0798 35.1606 36.0798 32.9514V4.95142C36.0798 2.74228 34.289 0.951416 32.0798 0.951416H4.07983C1.87069 0.951416 0.079834 2.74228 0.079834 4.95142V32.9514C0.079834 35.1606 1.87069 36.9514 4.07983 36.9514Z" fill="#2A675F"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M31.0798 31.9514H25.7376V22.8525C25.7376 20.3578 24.7897 18.9637 22.8152 18.9637C20.6671 18.9637 19.5449 20.4145 19.5449 22.8525V31.9514H14.3965V14.6181H19.5449V16.9529C19.5449 16.9529 21.0929 14.0885 24.7711 14.0885C28.4477 14.0885 31.0798 16.3337 31.0798 20.977V31.9514ZM8.25451 12.3484C6.50086 12.3484 5.07983 10.9162 5.07983 9.14992C5.07983 7.38359 6.50086 5.95142 8.25451 5.95142C10.0082 5.95142 11.4283 7.38359 11.4283 9.14992C11.4283 10.9162 10.0082 12.3484 8.25451 12.3484ZM5.59611 31.9514H10.9645V14.6181H5.59611V31.9514Z" fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_675_29">
                                    <rect width="36" height="36" fill="white" transform="translate(0.079834 0.951416)"/>
                                    </clipPath>
                                </defs>
                                </svg>
                        </a>                            
                    </div>
                   
                    <?php endif; ?> 
                    </div>
                   
                </div>
                </div>
            <?php $i++; endforeach;  ?>
            </div>
        <?php if( $cta ):

        $link_url = $cta['url'];

        $link_title = $cta['title'];

        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>    
         <div class="row mb-md-5 pt-md-2">
                <div class="col-md-12">                       
                     <a tabindex="0" class="btn-cta center-btn" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
            </div>
         </div>
        <?php endif; ?>
       </div>
    </section>
<?php endif;  wp_reset_postdata(); ?>    

