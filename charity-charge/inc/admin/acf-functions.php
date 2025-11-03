<?php
/**
 * Functions which enhance the theme by hooking into Advanced Custom Fields.
 *
 * @package Pure_Clean_Exterior
 */

/**
 * Populate acf gravity_form (select) field with gravity forms.
 */
function acf_populate_gf_forms_ids($field) {
	if (class_exists('GFFormsModel')) {
		$choices = [];

		foreach (\GFFormsModel::get_forms() as $form) {
			$choices[$form->id] = $form->title;
		}

		$field['choices'] = $choices;
	}

	return $field;
}
add_filter('acf/load_field/name=gravity_forms', 'acf_populate_gf_forms_ids');

/**
 * Populate acf select_menu (select) field with menus
 */
function populate_acf_select_with_menus($field) {
    $menus = get_terms('nav_menu', array('hide_empty' => false));
    $field['choices'] = array();
    
    foreach ($menus as $menu) {
        $field['choices'][$menu->term_id] = $menu->name;
    }

    return $field;
}

// Apply to field key of the select field
add_filter('acf/load_field/name=select_menu', 'populate_acf_select_with_menus');

/**
 * Register Block Category
 */
function custom_theme_block_category($categories, $block_editor_context)
{
    if (!empty($block_editor_context->post)) {
        return array_merge(
            $categories,
            array(
                array(
                    'slug'  => 'custom-block-category',
                    'title' => 'Lazarus Blocks',
                ),
            )
        );
    }

    return $categories;
}
add_filter('block_categories_all', 'custom_theme_block_category', 10, 2);

/**
 * Register's all blocks found in the blocks directory that have a valid block.json file.
 */
function register_acf_blocks_from_directory() {
    $blocks_dir = get_template_directory() . '/template-parts/blocks/';
    
    if ( ! is_dir( $blocks_dir ) ) {
        return;
    }

    $block_folders = scandir( $blocks_dir );

    foreach ( $block_folders as $folder ) {
        if ( $folder === '.' || $folder === '..' ) {
            continue;
        }
        $block_json_file = $blocks_dir . $folder . '/block.json';
        if ( file_exists( $block_json_file ) ) {
            register_block_type( $block_json_file );
        }
    }
}
add_action( 'init', 'register_acf_blocks_from_directory' );