<?php 
if (have_rows('info_expertise')) :          
    while (have_rows('info_expertise')) : the_row();      
    $headline = get_sub_field('headline');
   $headline_industries = get_sub_field('headline_industries');
    $subheadline = get_sub_field('subheadline');
    $description = get_sub_field('description');
    $cta = get_sub_field('cta_button');  
    $bg_color = get_sub_field('bg_color'); 
    $bg_image = get_sub_field('bg_image'); ?>

<section class="section-expertise position-relative pt-5 pb-5" <?php if($bg_color): ?> style="background-color: <?php echo $bg_color; ?>;" <?php endif; ?>>
    <div class="container-fluid">       
        <div class="row justify-content-center">
           <div class="col-xxl-8 pt-md-4 pb-md-3">
           <?php if($headline): ?>
            <h2 class="headline cl-d-blue text-center"><?php echo $headline;?></h2>
            <?php endif; ?>
            <?php if($description): ?>
            <div class="dp-1 text-center cl-d-blue"><?php echo $description;?></div>
            <?php endif; ?>
           </div>
        </div>
        <div class="row justify-content-center pt-lg-3 pb-4">
           <div class="col-lg-12">
           <?php if($subheadline): ?>
            <h2 class="cl-teal text-center"><?php echo $subheadline;?></h2>
            <?php endif; ?>         
           </div>
        </div>
        <?php if (have_rows('list_expertise')) :  ?>
            <div class="row row-expertise">
                <?php  while (have_rows('list_expertise')) : the_row();                
                $title = get_sub_field('title'); 
                $text = get_sub_field('text'); 
				$cta = get_sub_field('cta_button');  
                $boxcolor = get_sub_field('color');?>
                  <div class="col-lg-4 col-box-expertise mb-lg-0 mb-4">
                    <?php if($title): ?>                 
                        <button class="btn-box uk-button uk-button-default" type="button" <?php if($boxcolor): ?> style="background-color: <?php echo $boxcolor; ?>;" <?php endif; ?>><?php echo $title;?></button>
                    <?php endif; ?>
                    <?php if($text): ?>
                    <div class="uk-card uk-card-body uk-card-default" uk-drop="mode: click" <?php if($boxcolor): ?> style="border: 1px solid <?php echo $boxcolor; ?>;" <?php endif; ?> uk-drop="pos: bottom-center"><?php echo $text;?>
						 <?php if( $cta ):
						$link_url = $cta['url'];
						$link_title = $cta['title'];
						$link_target = $cta['target'] ? $cta['target'] : '_self'; ?>   
						
							<a tabindex="0" class="btn-cta center-btn drop-cta" <?php if($boxcolor): ?> style="background-color: <?php echo $boxcolor; ?>;" <?php endif; ?> data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>
					  </div>
                    <?php endif; ?>
					 
               </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>    
		
           <?php if($headline_industries): ?>
		<div class="row justify-content-center pt-lg-3 pb-4">
           <div class="col-lg-12">
            <h2 class="cl-teal text-center"><?php echo $headline_industries;?></h2>
		 </div>
          </div>
            <?php endif; ?>         
         
		    <?php if (have_rows('list_industries')) :  ?>
            <div class="row row-industries">
                <?php  while (have_rows('list_industries')) : the_row();                
                $title = get_sub_field('title'); 
                $text = get_sub_field('text'); 
				$cta = get_sub_field('cta_button');  
                $boxcolor = get_sub_field('color');?>
                  <div class="col-lg-3 col-box-expertise mb-lg-0 mb-4">
                    <?php if($title): ?>                 
                        <button class="btn-box uk-button uk-button-default" type="button" <?php if($boxcolor): ?> style="background-color: <?php echo $boxcolor; ?>;" <?php endif; ?>><?php echo $title;?></button>
                    <?php endif; ?>
                    <?php if($text): ?>
                    <div class="uk-card uk-card-body uk-card-default" uk-drop="mode: click" <?php if($boxcolor): ?> style="border: 1px solid <?php echo $boxcolor; ?>;" <?php endif; ?> uk-drop="pos: bottom-center"><?php echo $text;?>
						 <?php if( $cta ):
						$link_url = $cta['url'];
						$link_title = $cta['title'];
						$link_target = $cta['target'] ? $cta['target'] : '_self'; ?>   
						
							<a tabindex="0" class="btn-cta center-btn drop-cta" <?php if($boxcolor): ?> style="background-color: <?php echo $boxcolor; ?>;" <?php endif; ?> data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>
					  </div>
                    <?php endif; ?>
					 
               </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>   
        <?php if( $cta ):
        $link_url = $cta['url'];
        $link_title = $cta['title'];
        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>   
        <div class="row">
            <div class="col-lg-12 text-center">
            <a tabindex="0" class="btn-cta center-btn" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
            </div>
        </div>                         
            
        <?php endif; ?>
    </div>
</section>  
<?php if ( !empty($bg_image)) :    ?>     

   <img class="shape-image" src="<?php echo esc_url($bg_image['url']); ?>" alt="<?php echo esc_attr($bg_image['alt']); ?>"/>                      

<?php endif; ?>    
 
<?php              
    endwhile;
endif; ?> 

