<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vamp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section class="section-internal-hero bg-blue mb-0 p-0">
        <div class="container banner-container w-100">
            <div class="row flex center-xs middle-xs">               
                <div class="col-xs-12 col-lg-12 w-100 h-100 text-center">
                    <h1 class="mt-0 mb-0 cl-white animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1.75s"><?php echo the_title(); ?></h1>                 
               </div> 
            </div> 
        </div>
        </section>  
	<div class="container p-t4 p-b5">
		<div class="row">
	     	<div class="col-xs-12 col-lg-12">
				<?php vamp_post_thumbnail(); ?>
	    <div class="entry-content dp-1 cl-dark">
			<?php
			the_content();	?>
		</div><!-- .entry-content -->
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
