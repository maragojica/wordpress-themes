<?php
/**
 * Template part for displaying a message when posts are not found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Eric_Scott
 */

?>
<section class="default-content-section max-w-full h-[20em] lg:h-[25em] xl:h-[600px] relative bg-cover bg-fixed bg-center bg-no-repeat">
			<div class="overlay flex flex-col h-full w-full justify-end items-start bg-secondary text-left absolute z-[2] top-0 left-0 padding-medium  lg:pt-0 pt-0-important">
				<div class="container mx-auto"> 
						<div class="relative">				
						<?php if ( is_search() ) : ?>

							<h1 class="text-primary">
								<?php
								printf(
									/* translators: 1: search result title. 2: search term. */
									'<h1 class="page-title">%1$s <span>%2$s</span></h1>',
									esc_html__( 'Search results for:', 'eric-scott-tailwind' ),
									get_search_query()
								);
								?>
							</h1>

							<?php else : ?>

							<h1 class="text-primary"><?php esc_html_e( 'Nothing Found', 'eric-scott-tailwind' ); ?></h1>

							<?php endif; ?>
						</div> 
					</div>
				</div>
					<div class="w-full absolute left-0 -bottom-[3px] z-3">
					<div class="line-border"></div>
					<div class="line-divider mt-[11px]"></div>        
				</div>
		</section>
<section>

<section class="content-post-section max-w-full relative padding-small">
<div class="container mx-auto"> 
	<div <?php eric_scott_tailwind_content_class( 'page-content' ); ?>>
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
			?>

			<p>
				<?php esc_html_e( 'Your site is set to show the most recent posts on your homepage, but you haven&rsquo;t published any posts.', 'eric-scott-tailwind' ); ?>
			</p>

			<p>
				<a href="<?php echo esc_url( admin_url( 'edit.php' ) ); ?>">
					<?php
					/* translators: 1: link to WP admin new post page. */
					esc_html_e( 'Add or publish posts', 'eric-scott-tailwind' );
					?>
				</a>
			</p>

			<?php
		elseif ( is_search() ) :
			?>

			<p>
				<?php esc_html_e( 'Your search generated no results. Please try a different search.', 'eric-scott-tailwind' ); ?>
			</p>

			<?php
			get_search_form();
		else :
			?>

			<p>
				<?php esc_html_e( 'No content matched your request.', 'eric-scott-tailwind' ); ?>
			</p>

			<?php
			get_search_form();
		endif;
		?>
	</div><!-- .page-content -->
	</div>
	</section>
</section>
