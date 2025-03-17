<?php
/**
 * Template part for displaying a message when posts are not found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package connecting-elements
 */

?>


<section class="hero-default-section max-w-full h-[13em] xl:h-[344px] relative rounded-[0px_0px_50px_50px] bg-primary">
    
    <div class="overlay flex flex-col h-full w-full justify-end items-start text-left absolute z-[2] top-0 left-0">
     <div class="w-full mx-auto">   
	 <?php if ( is_search() ) : ?>

		<h1 class="text-secondary max-w-fit bg-white rounded-tr-[50px] pt-[35px] lg:pt-[40px] pl-[20px] pr-[1.5em] lg:pr-[80px] -mb-[1px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
			<?php
			printf(
				/* translators: 1: search result title. 2: search term. */
				'%1$s <span>%2$s</span>',
				esc_html__( 'Search results for:', 'connecting-elements' ),
				get_search_query()
			);
			?>
		</h1>

		<?php else : ?>

			<h1 class="text-secondary max-w-fit bg-white rounded-tr-[50px] pt-[35px] lg:pt-[40px] pl-[20px] pr-[1.5em] lg:pr-[80px] -mb-[1px] animate__animated" data-animation="fadeIn" data-duration="1.2s"><?php esc_html_e( 'Nothing Found', 'connecting-elements' ); ?></h1>

		<?php endif; ?>    
           
      </div>
   </div>
</section>
<section class="content-section max-w-full relative padding-small">
    <div class="container mx-auto">
        <div class="w-full bg-[rgba(182,184,186,0.10)] p-[22px] lg:p-[88px] lg:max-w-[90%] mx-auto rounded-tl-[50px] rounded-br-[50px] " >   
	<div <?php connecting_elements_content_class( 'page-content' ); ?>>
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :
			?>

			<p>
				<?php esc_html_e( 'Your site is set to show the most recent posts on your homepage, but you haven&rsquo;t published any posts.', 'connecting-elements' ); ?>
			</p>

			<p>
				<a href="<?php echo esc_url( admin_url( 'edit.php' ) ); ?>">
					<?php
					/* translators: 1: link to WP admin new post page. */
					esc_html_e( 'Add or publish posts', 'connecting-elements' );
					?>
				</a>
			</p>

			<?php
		elseif ( is_search() ) :
			?>

			<p>
				<?php esc_html_e( 'Your search generated no results. Please try a different search.', 'connecting-elements' ); ?>
			</p>

			<?php
			
		else :
			?>

			<p>
				<?php esc_html_e( 'No content matched your request.', 'connecting-elements' ); ?>
			</p>

			<?php
			
		endif;
		?>

	</div>
    </div>
</section>
