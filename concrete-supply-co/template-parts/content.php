<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Concrete_Supply_Co
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section class="page-internal-hero banner-portfolio flex">           
	<div class="overlay bg-lightgray p-y6" >                
		<div class="container h-100 flex flex-column top-xs end-xs text-left">
			<div class="row">
				<div class="col-xs-12">
					<div class="line"></div>                          
					<h1 class="cl-blue text-uppercase mt-0 mb-02 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php the_title(); ?></h1>	
				</div>  
			</div>        
		</div>                    
	<div>
</section>  
<section class="section-content">
	<div class="container">
		<div class="row">  				
			  <div class="description cl-black p-t2"><?php the_content(); ?></div>				
			</div>
		</div>
	</div>            
</section> 	
</article><!-- #post-<?php the_ID(); ?> -->
