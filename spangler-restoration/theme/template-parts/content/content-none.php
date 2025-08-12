<?php
/**
 * Template part for displaying a message when posts are not found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spangler_Restoration
 */

?>

<section>
<section class="default-content-section max-w-full h-[20em] lg:h-[25em] xl:h-[600px] relative bg-cover bg-fixed bg-center bg-no-repeat">
	<div class="overlay flex flex-col h-full w-full justify-end items-start bg-[#00194C] text-left absolute z-[2] top-0 left-0 padding-small  lg:pt-0 pt-0-important">
		<div class="container mx-auto"> 
				<div class="relative">	
				<?php if ( is_search() ) : ?>	
				<h1 class="text-white uppercase" data-aos="fade-up" data-aos-offset="200" data-aos-delay="40">			
				<?php
					printf(
						/* translators: 1: search result title. 2: search term. */
						'<h1 class="page-title">%1$s <span>%2$s</span></h1>',
						esc_html__( 'Search results for:', 'spangler-restoration' ),
						get_search_query()
					);
					?>
					</h1>
					<?php else : ?>
						<h1 class="text-white uppercase" data-aos="fade-up" data-aos-offset="200" data-aos-delay="40">		
						<?php esc_html_e( 'Nothing Found', 'spangler-restoration' ); ?>
						</h1>
					<?php endif; ?>
					<div class="text-white style-disc info" data-aos="fade-up" data-aos-offset="200" data-aos-delay="40>
					<?php
					if ( is_home() && current_user_can( 'publish_posts' ) ) :
						?>

						<p>
							<?php esc_html_e( 'Your site is set to show the most recent posts on your homepage, but you haven&rsquo;t published any posts.', 'spangler-restoration' ); ?>
						</p>

						<p>
							<a href="<?php echo esc_url( admin_url( 'edit.php' ) ); ?>">
								<?php
								/* translators: 1: link to WP admin new post page. */
								esc_html_e( 'Add or publish posts', 'spangler-restoration' );
								?>
							</a>
						</p>

						<?php
					elseif ( is_search() ) :
						?>

						<p>
							<?php esc_html_e( 'Your search generated no results. Please try a different search.', 'spangler-restoration' ); ?>
						</p>

						<?php						
					else :
						?>

						<p>
							<?php esc_html_e( 'No content matched your request.', 'spangler-restoration' ); ?>
						</p>

						<?php					
					endif;
					?>
					</div>
				</div> 
			</div>
		</div>
</section>
</section>
