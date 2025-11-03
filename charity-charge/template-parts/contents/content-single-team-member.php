<?php
/**
 * Template part for displaying single-team-member
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Charity_Charge
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="content-info-section pt-5">
		<div class="container padding-medium pt-lg-0 pt-0-important">
          <div class="row justify-content-center">
            <div class="col-12 col-xl-9">  
                <div class="col-12 col-xl-9"> 
                    <div class="mb-lg-5 mb-4">
                    <a tabindex="0" href="/about-us/#meet-team" aria-label="All Posts" title="All Posts" class="back-post">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M10 3L5 8L10 13" stroke="black" stroke-width="1.5"/>
                            </svg>
                            All Team
                        </a> 
                   </div>  
                </div>
			<div class="row justify-content-center g-4 g-md-5">
                <div class="col-12 col-md-6 col-lg-4"> 
                     
                    <div class="team-box w-100 h-100"> 
                     <?php if (has_post_thumbnail()) :  
                                 $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                $image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>
                                <img src="<?php echo esc_url($featured_image); ?>" 
                                     alt="<?php echo esc_attr($image_alt); ?>" 
                                     class="img-fluid img-team">                           
                        <?php endif; ?>    
                       <div class="team-info">
                           <div class="team-name"><?php the_title(); ?></div>
                           <?php if(get_field("position")): ?><div class="team-position"><?php echo esc_html(get_field("position")); ?></div><?php endif; ?>
                       </div>
                    </div>                    
                </div>
                <div class="col-12 col-md-6 col-lg-8">  
                 <div class="content-text mt-3 color-gray-off" data-aos="fade-in">
                        <?php the_content(); ?>
                    </div>
               </div>
            </div>   
             </div>    
             </div>      
		</div>
	</section>
	
	<?php include get_template_directory() . '/template-parts/global/global-charity-show.php'; ?>
	<section class="resources-slider-section position-relative bg-white  padding-medium ">
     <div class="container">
			<?php include get_template_directory() . '/template-parts/global/global-resources-slider.php'; ?>
		</div>
	</section>
</article><!-- #post-<?php the_ID(); ?> -->
