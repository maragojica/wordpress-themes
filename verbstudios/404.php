<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Verb_Studios
 */

 get_header();
 ?>
 
 <?php	
 $img = get_field('404_bg_image', 'option');
 $heading = get_field('404_headline', 'option');
 $subheading = get_field('404_subheadline', 'option');
 $description = get_field('404_text', 'option');
 ?>
 
 <main id="primary" class="site-main">
	 <div id="primary" class="content-area">	
		 <section class="error-404 not-found page-general-hero flex p-t0 p-b0" style="background: url(<?php echo esc_url($img['url']); ?>)"> 
			 <div class="overlay flex align-items-center" style="background-color: rgba(0, 0, 0, 0.30);"> 
				 <div class="container">
					 <div class="row middle-xs justify-center">
						 <div class="col-xs-12 col-lg-9 col-xl-7">
						 <div class="w-100 text-center wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.1s"> 
								 <?php if ($heading) : ?>
									 <h1 class="cl-white mt-0 mb-10px text-uppercase wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">
									 <?php echo $heading; ?>
									 </h1>									
								 <?php endif; ?>                               
								 <?php if ($subheading) : ?>
									 <h2 class="cl-white pt-17px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s"><?php echo $subheading; ?></h2>
								 <?php endif; ?>                               
							</div>                                                              
							 </div>
						 </div>
					 </div>                                    
				 </div>
			 </div>
	 </section> 		
	 <section  class="section-info-default small">
			 <div class="container">
				 <div class="row row-post justify-center"> 
					 <div class="col-xs-12 col-lg-8">                    
						 <div class="dp-1 p-lg-t2 cl-black wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $description; ?></div>   
					 </div>                   
				 </div>
				 <div class="row middle-xs justify-center text-center m-t1">
						 <div class="col-xs-12 col-lg-9 col-xl-7">                        
							 <div class="cta-btn">                               
							 <a tabindex="0" class="button black" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Back Home" title="Back Home"><span class="text">Back Home</span></a>                             
							 </div>                                                                   
							 </div>
						 </div>
					 </div>   
			 </div>            
		 </section>
		 </div><!-- .content-area -->
	 </main><!-- .site-main -->
 
 <?php
 get_footer();
