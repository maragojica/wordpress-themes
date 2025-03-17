<?php
/**
 * Template part for displaying projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verb_Studios
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section class="page-general-hero flex p-t0 p-b0 bg-black"> 
			 <div class="overlay flex align-items-center" style="background-color: rgba(0, 0, 0, 0.30);"> 
				 <div class="container">
					 <div class="row middle-xs justify-center">
						 <div class="col-xs-12 col-lg-9 col-xl-7">
						 <div class="w-100 text-center wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.1s"> 											
								<?php the_title( '<h1 class="cl-white mt-0 mb-10px text-uppercase">', '</h1>' ); ?>								
							</div>                                                              
							 </div>
						 </div>
					 </div>                                    
				 </div>
			 </div>
	 </section>  
</article><!-- #post-<?php the_ID(); ?> -->
