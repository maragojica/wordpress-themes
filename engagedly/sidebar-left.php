<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Engagedly
 */

?>
<?php if ( ! is_active_sidebar( 'sidebar-left' ) ) : ?>
    <aside id="secondary" class="widget-area" role="complementary">
        <?php dynamic_sidebar( 'sidebar-left' ); ?>
    </aside><!-- #secondary -->
<?php endif; ?>