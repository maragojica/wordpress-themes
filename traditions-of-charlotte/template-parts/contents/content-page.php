<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Traditions_of_Charlotte
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section class="page-post-banner p-t0 p-b0 bg-sage">   
	<div class="container w-100">
		<div class="row middle-xs justify-center">
			<div class="col-xs-12 col-lg-7 col-xl-6">
			<div class="w-100 text-lg-center wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.1s"> 
					<h1 class="cl-white mt-0 mb-10px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php the_title( );?></h1>  
				</div>
			</div>
		</div>                                    
		</div>           
</section> 
<section class="section-content-default p-b0" >
	<div class="container">
		<div class="row row-post justify-center"> 
			<div class="col-xs-12 col-lg-8"> 
				<div class="dp-1 cl-forest-green wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo the_content(); ?></div> 			                                        
			</div>                   
		</div>
	</div>            
</section>	
<?php get_template_part('template-parts/sections/section-contact-sm'); ?>
</article><!-- #post-<?php the_ID(); ?> -->

