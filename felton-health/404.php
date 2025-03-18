<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Felton_Health
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
						 <div class="button-list-info center-xs m-t1 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 0.6s; animation-delay: 0.2s; animation-name: fadeInUp;">  
                                                                             
									<div class="cta-btn navy-sb">                               
									<a tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Back Home" title="Back Home" class="relative inline-flex items-center justify-start py-3 pl-4 pr-12 overflow-hidden text-navy-600 transition-all duration-150 ease-in-out hover:pl-10 hover:pr-6 navy-sb group">
									<span class="absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-600 group-hover:h-full"></span>
									<span class="box-svg absolute right-0 pr-4 duration-200 ease-out group-hover:translate-x-12">                                       
									<svg xmlns="http://www.w3.org/2000/svg" width="26" height="8" viewBox="0 0 26 8" fill="none">
										<path d="M25.3536 4.35355C25.5488 4.15829 25.5488 3.84171 25.3536 3.64645L22.1716 0.464466C21.9763 0.269204 21.6597 0.269204 21.4645 0.464466C21.2692 0.659728 21.2692 0.976311 21.4645 1.17157L24.2929 4L21.4645 6.82843C21.2692 7.02369 21.2692 7.34027 21.4645 7.53553C21.6597 7.7308 21.9763 7.7308 22.1716 7.53553L25.3536 4.35355ZM0 4.5H25V3.5H0V4.5Z" fill="#516456"></path>
									</svg>
									</span>
									<span class="box-svg absolute left-0 pl-2.5 -translate-x-12 group-hover:translate-x-0 ease-out duration-200">
									<svg xmlns="http://www.w3.org/2000/svg" width="26" height="8" viewBox="0 0 26 8" fill="none">
										<path d="M25.3536 4.35355C25.5488 4.15829 25.5488 3.84171 25.3536 3.64645L22.1716 0.464466C21.9763 0.269204 21.6597 0.269204 21.4645 0.464466C21.2692 0.659728 21.2692 0.976311 21.4645 1.17157L24.2929 4L21.4645 6.82843C21.2692 7.02369 21.2692 7.34027 21.4645 7.53553C21.6597 7.7308 21.9763 7.7308 22.1716 7.53553L25.3536 4.35355ZM0 4.5H25V3.5H0V4.5Z" fill="#fff"></path>
									</svg>
									</span>
									<span class="link-button relative w-full text-left transition-colors duration-200 ease-in-out">Back Home</span>
								</a>                            
									</div>
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
