<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Quantum_Security_&_Innovations
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section class="section-content">
		<div class="container">
			<div class="row">                    
				<div class="col-xs-12">                       
					<h1 class="cl-black text-uppercase mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo the_title(); ?></h1>					
					<div class="description cl-black p-t2 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo the_content(); ?></div>					                
				</div>
			</div>
		</div>            
	</section>
</article><!-- #post-<?php the_ID(); ?> -->
