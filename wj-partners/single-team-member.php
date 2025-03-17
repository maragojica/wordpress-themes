<?php
/**
 * The template for displaying all team posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WJ_Partners
 */

get_header("inner");
?>

	<main id="primary" class="site-main main-bg">
	<?php if ( post_password_required(  get_post()->ID ) ){  ?>
    
	<?php echo get_the_password_form(); ?>
				
<?php }else{ ?>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/contents/content', "team-member" );			

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php }
get_footer();
