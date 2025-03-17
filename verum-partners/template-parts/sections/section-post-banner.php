<?php
if (have_rows('main_banner')) {
    while (have_rows('main_banner')) {
        the_row(); 
        $banner_type = get_sub_field('banner_type'); 
        $banner_image = get_sub_field('banner_image');       
        $bg_overlay = get_sub_field('bg_overlay');
        $headline = get_sub_field('headline'); 
        $author_name = get_sub_field('author_name');
		$author_bio_link = get_sub_field('author_bio_link');
        $author_image = get_sub_field('author_image'); ?>
        <section class="page-post-hero p-t0 p-b0 flex" <?php if($bg_overlay ){ ?>style="background-color: <?php echo $bg_overlay;?>"<?php } ?>>   
			<?php if($banner_type['value'] == "video"){ 
                $videomp4 = get_sub_field('banner_video'); ?> 
                <video id="background-video" autoplay loop muted playsinline style="pointer-events: none;">
                    <?php if($videomp4): ?>
                    <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                    <?php endif; ?>
                </video>                     
            <?php }elseif($banner_type['value'] == "image"){ ?>
                <?php if ( !empty($banner_image)) : 
                        $srcset = wp_get_attachment_image_srcset($banner_image['ID']);
                        $sizes = wp_get_attachment_image_sizes($banner_image['ID'], 'full'); ?>                
                    <img class="img-fluid w-100 h-100 fit-cover-center" src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo esc_attr($banner_image['alt']); ?>" height="450" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                <?php endif; ?>  
            <?php } ?> 
            <div class="overlay">               
                <div class="container h-100 flex flex-column center-xs center-xs text-center">
                    <div class="row center-xs">
                       <div class="col-xs-12 col-lg-8"> 
                           <?php if($headline): ?>
                                <h1 class="cl-white text-uppercase mt-0 mb-02 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $headline; ?></h1>
                           <?php endif; ?>  
                           <div class="meta wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                            <?php if($author_name && !empty($author_image)): ?>
                                <div class="author">
                                  <?php if ( !empty($author_image)) :   ?> 
                                   <img class="img-author" src="<?php echo esc_url($author_image['url']); ?>" alt="<?php echo esc_attr($author_image['alt']); ?>" height="31" width="31"/>   
                                  <?php endif; ?> 
                                  <?php if($author_name): ?>
                                      <div class="author-name cl-white">
										  <?php if( $author_bio_link ):
											$link_url = $author_bio_link['url'];											
											$link_target = $author_bio_link['target'] ? $author_bio_link['target'] : '_self'; ?>  
										  <a tabindex="0" class="cl-white cl-orange-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo $author_name;?>" title="<?php echo $author_name;?>"> <?php endif; ?>
										  <?php echo $author_name;?>
										 <?php if( $author_bio_link ): ?>
										  </a>
									     <?php endif; ?>		  
									</div>
                                   <?php endif; ?> 
                                </div>
                                <div class="post-line"></div>
                             <?php endif; ?>   
                             
                           <div class="entry-date cl-white"><?php the_time('F j, Y'); ?></div>
                           </div>                                                 
                       </div>  
                    </div>        
                </div>                    
             </div>            
        </section>         
<?php }
} ?>