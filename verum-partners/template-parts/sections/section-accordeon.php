<?php 
if (have_rows('accordeon')) :          
    while (have_rows('accordeon')) : the_row();
    $section_id = get_sub_field('section_id');
    $section_headline = get_sub_field('section_headline'); 
    $close_positions = get_sub_field('close_positions'); 
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');      
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-accordeon <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">            
    <div class="container">    
         <?php if($section_headline): ?>
                <div class="container">
                    <div class="row middle-xs center-xs">
                        <div class="col-xs-12 col-lg-7 col-xl-8">
                        <?php if ($section_headline) : ?>
                            <h2 class="text-uppercase cl-green mt-0 mb-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" ><?php echo $section_headline; ?></h2>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?> 
        <div class="row justify-center">
            <div class="col-xs-12 col-lg-8">  
		   <?php if( $close_positions ){ $no_positions_text = get_sub_field('no_positions_text');  
				if($no_positions_text): ?>
				<div class="dp-1 cl-off-black m-t2 text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
					<?php echo $no_positions_text; ?>
				</div>
				<?php endif; ?>
		   <?php }else{ ?>		
            <?php if ( have_rows( 'accordeon_list' ) ):  ?>
                <div class="accordeon-content m-lg-t3 m-t1 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.3s">
                <?php $i = 1; while( have_rows('accordeon_list') ): the_row(); 
                  $title = get_sub_field('title'); 
                  $text = get_sub_field('text');
                  $cta = get_sub_field('button_cta');  ?>
                  <?php if($title): ?>
                    <button class="accordion cl-white <?php if($i == 1): ?> active <?php endif; ?>" title="Accordeon"><?php echo $title; ?></button>
                  <?php endif; ?>
                  <div class="panel" <?php if($i == 1): ?>style="max-height: inherit;"<?php endif; ?>>
                  <?php if ($text) : ?>
                        <div class="dp-1 cl-off-black"><?php echo wp_kses_post($text); ?></div>
                    <?php endif; ?>   
                    <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>     
                            <div class="m-t1 m-b1 box-apply">                       
                               <a tabindex="0" class="cta-button cl-orange cl-green-h wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                            <?php echo esc_html( $link_title ); ?>
                             <svg class="arrow-passive" xmlns="http://www.w3.org/2000/svg" width="45" height="6" viewBox="0 0 45 6" fill="none">
                                <path d="M44.1651 3L42 0.834936L39.8349 3L42 5.16506L44.1651 3ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#BB6C29"/>
                            </svg> 
                            <svg class="arrow-active" xmlns="http://www.w3.org/2000/svg" width="43" height="6" viewBox="0 0 43 6" fill="none">
                                <path d="M42.2652 3.26517C42.4116 3.11872 42.4116 2.88128 42.2652 2.73483L39.8787 0.34835C39.7322 0.201903 39.4948 0.201903 39.3483 0.34835C39.2019 0.494796 39.2019 0.732233 39.3483 0.87868L41.4697 3L39.3483 5.12132C39.2019 5.26777 39.2019 5.5052 39.3483 5.65165C39.4948 5.7981 39.7322 5.7981 39.8787 5.65165L42.2652 3.26517ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#024325"/>
                            </svg>
                            </a> 
                        </div>
                        <?php endif; ?>
                  </div>
                 <?php $i++; endwhile; ?>
                </div>
            <?php endif; 
			 } ?> 
            </div>
        </div>           
    </div> 
</section>
<?php              
    endwhile;
endif; ?>   
