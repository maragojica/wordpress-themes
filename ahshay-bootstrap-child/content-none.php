<?php
/**
 * The template for displaying "not found" content in the Blog Archives.
 */

$search_enabled = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
?>

<header class="entry-header">
	<h2><?php esc_html_e( 'Nothing Found', 'starter-theme-bootstrap' ); ?></h2>
</header><!-- /.entry-header -->
<div class="dp-1">
	<p><?php esc_html_e( 'Apologies, but no results were found for the requested archive.', 'starter-theme-bootstrap' ); ?></p>
	<?php
		if ( '1' === $search_enabled ) :
			get_search_form();
		endif;
	?>
</div><!-- /.entry-content -->

