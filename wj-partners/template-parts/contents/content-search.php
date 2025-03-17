<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WJ_Partners
 */

?>

<div class="col-xs-12 col-md-6 col-lg-4 col-news m-b2">  
		<div class="news-box h-100 text-center bg-navy"> 
				<div class="headline-news">                                           
					<h3 class="cl-white"><?php echo the_title();?> </h3>                                                        
				</div>
			<a class="simple-link link-white" href="<?php the_permalink(); ?>" class="w-100 h-100" tabindex="0" aria-label="<?php echo $title;?>" title="<?php echo $title;?>">   
			READ MORE
			</a>   
		</div>                       
	</div>
