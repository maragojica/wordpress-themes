<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Construction_Metal_Products
 */

?>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 m-b2 blog-item wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.2">                           
		<div class="box-card h-100">
		<div class="card-media">                               
		<?php if (has_post_thumbnail()) : ?>  
				<a class="w-100 h-100 cl-blue cl-black-h" tabindex="0" href="<?php the_permalink(); ?>" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>">                             
					<?php the_post_thumbnail('full', array('class' => 'img-fluid w-100 h-100 fit-cover-center')); ?>
				</a>                                          
				<?php endif; ?> 
		</div>
		<div class="card-footer bg-navy">
			<h3 class="cl-white text-uppercase m-t0 m-b0 text-center">                                        
				<?php echo the_title();?>  
			</h3>                                    
		</div> 
	</div> 
</div>

