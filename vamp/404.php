<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Vamp
 */

get_header("inner");
?>

	<main id="primary" class="site-main">
	<section class="error-404 not-found section-internal-hero bg-blue mb-0 p-0">
        <div class="container banner-container w-100">
            <div class="row flex center-xs middle-xs">               
                <div class="col-xs-12 col-lg-12 w-100 h-100 text-center">
                    <h1 class="mt-0 mb-0 cl-white animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1.75s"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'vamp' ); ?></h1>                 
               </div> 
            </div> 
        </div>
        </section> 
		<section class="error-404 not-found">			
		<div class="container p-b5">
			<div class="page-content text-center">
				<div class="dp-1 cl-dark"><p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'vamp' ); ?></p></div>
				<div class="button-list m-t2 center-xs">  										
					<a class="animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.5s" tabindex="0" href="<?php echo esc_url( home_url( '/' ) );?>" aria-label="Back Home" title="Back Home">
						<button class="button cta-btn bg-black cl-white bg-blue-h cl-white-h">Back To Home</button> 
					</a> 
				<div>	
			</div><!-- .page-content -->
		</div>	
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
