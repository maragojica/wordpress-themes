<?php
/**
 * Template part for displaying a message when posts are not found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Trustice_Law_Group
 */

?>
<section class="bg-accent-light padding-medium h-screen">

	<header class="page-header">
		<?php if ( is_search() ) : ?>

			<h1 class="page-title">
				<?php
				printf(
					/* translators: 1: search result title. 2: search term. */
					'<h1 class="page-title">%1$s <span>%2$s</span></h1>',
					esc_html__( 'Search results for:', 'smarther' ),
					get_search_query()
				);
				?>
			</h1>

		<?php else : ?>

			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'smarther' ); ?></h1>

		<?php endif; ?>
	</header><!-- .page-header -->

	<div <?php trustice_law_group_content_class( 'page-content' ); ?>>
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
			?>

			<p>
				<?php esc_html_e( 'Your site is set to show the most recent posts on your homepage, but you haven&rsquo;t published any posts.', 'smarther' ); ?>
			</p>

			<p>
				<a href="<?php echo esc_url( admin_url( 'edit.php' ) ); ?>">
					<?php
					/* translators: 1: link to WP admin new post page. */
					esc_html_e( 'Add or publish posts', 'smarther' );
					?>
				</a>
			</p>

			<?php
		elseif ( is_search() ) :
			?>

			<p>
				<?php esc_html_e( 'Your search generated no results. Please try a different search.', 'smarther' ); ?>
			</p>
              <form role="search" method="get" id="search-form" class="search-form w-full mt-[1em]" action="<?php echo esc_url(home_url('/')); ?>">
				<label for="search-field" class="sr-only">Search for:</label>
				<input type="search" class="search-field" id="search-field" autofocus placeholder="Search" value="<?php echo get_search_query(); ?>" name="s">
				<button type="submit" class="search-submit">
					<span class="sr-only">Search</span>
					<svg xmlns="http://www.w3.org/2000/svg" width="33" height="35" viewBox="0 0 33 35" fill="none">
						<rect x="-0.000610352" width="33" height="35" fill="#5B1A37"></rect>
						<path d="M9.99939 17.2124H22.8565M22.8565 17.2124L16.8565 12M22.8565 17.2124L16.8565 22.2857" stroke="#C79A4A" stroke-width="2" stroke-linecap="round"></path>
						</svg>
				</button>
			</form>
			<?php
		
		else :
			?>

			<p>
				<?php esc_html_e( 'No content matched your request.', 'smarther' ); ?>
			</p>

			<form role="search" method="get" id="search-form" class="search-form w-full mt-[1em]" action="<?php echo esc_url(home_url('/')); ?>">
				<label for="search-field" class="sr-only">Search for:</label>
				<input type="search" class="search-field" id="search-field" autofocus placeholder="Search" value="<?php echo get_search_query(); ?>" name="s">
				<button type="submit" class="search-submit">
					<span class="sr-only">Search</span>
					<svg xmlns="http://www.w3.org/2000/svg" width="33" height="35" viewBox="0 0 33 35" fill="none">
						<rect x="-0.000610352" width="33" height="35" fill="#f0cc12"/>
						<path d="M9.99939 17.2124H22.8565M22.8565 17.2124L16.8565 12M22.8565 17.2124L16.8565 22.2857" stroke="#1F2133" stroke-width="2" stroke-linecap="round"/>
						</svg>
				</button>
			</form>

		<?php endif; 
		?>
	</div><!-- .page-content -->

</section>


