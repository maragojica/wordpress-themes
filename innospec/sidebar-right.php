<?php if(get_field("show_download_button")): ?>
    <div class='wrap-resources wrap-download-button-sidebar sidebar-title'>
        <h3>DOWNLOADS</h3>
        <ul>
        <?php while( have_rows('download_buttons') ) : the_row(); ?>
            <li><a href="<?php echo get_sub_field('file'); ?>" download><?php echo get_sub_field('title_name') ?></a></li>
        <?php endwhile; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if(get_field("show_download_brochure")): ?>
    <div class='wrap-download-brochure-sidebar sidebar-title'>
        <h3>DONWLOAD BROCHURE</h3>
        <a href="<?php echo get_field('download_brochure_file'); ?>" download><img src="<?php echo get_field('download_brochure_image'); ?>"></a>
    </div>
<?php endif; ?>

<?php if(get_field("show_simgle_image")): ?>
	<div class='wrap-image-sidebar'>
		<img src="<?php echo get_field("single_image"); ?>">
		<?php if(get_field('text_under_single_image')): ?>
		<div class="wrap-text-sidebar">
			<?php echo get_field('text_under_single_image'); ?>
		</div>
		<?php endif; ?>
	</div>
<?php endif; ?>
<div class="wrap-video wrap-resources">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-right') ) : ?> <?php endif; ?>
</div>