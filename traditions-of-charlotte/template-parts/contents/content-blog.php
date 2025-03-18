<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Traditions_of_Charlotte
 */

?>

<div class="col-xs-12 col-md-6 col-lg-4 col-news m-t2">  
		<div class="new-contain h-100">
		<?php if (has_post_thumbnail()) : ?>
				<div class="box-news-single">
					<a href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>" class="image-link w-100 h-100">
					<?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
					</a>
				</div>  
				<?php endif; ?>
		<div class="news-box bg-cream"> 
			<div class="entry-date cl-forest-green"><?php the_time('F j, Y'); ?></div>			
			<div class="headline-news">                                           
				<h3 class="cl-forest-green"><?php echo the_title();?></h3>                                                        
			</div>			
			<a class="simple-link link-mauve" href="<?php the_permalink(); ?>" class="w-100 h-100" tabindex="0" aria-label="<?php echo $title;?>" title="<?php echo $title;?>">   
			Read More
			</a>   
		</div> 
		</div>                         
	</div>