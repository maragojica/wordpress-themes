<?php

global $post;

// ACF Settings
if( function_exists('acf_add_options_page') ) {

    $parent = acf_add_options_page(array(
        'page_title' 	=> 'Theme Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
    
    // Add sub page.
    
    acf_add_options_sub_page(array(
        'page_title'  => __('Practice Areas'),
        'menu_title'  => __('Practice Areas'),
        'parent_slug' => $parent['menu_slug'],
    ));
    
	acf_add_options_sub_page(array(
        'page_title' => __('General'),
        'menu_title' => __('General'),
        'parent_slug' => $parent['menu_slug']
    ));
	
    acf_add_options_sub_page(array(
        'page_title' => __('Footer'),
        'menu_title' => __('Footer'),
        'parent_slug' => $parent['menu_slug']
    ));
	
    acf_add_options_sub_page(array(
        'page_title' => __('404'),
        'menu_title' => __('404'),
        'parent_slug' => $parent['menu_slug']
    ));
	
    acf_add_options_sub_page(array(
        'page_title' => __('City Template'),
        'menu_title' => __('City Template'),
        'parent_slug' => $parent['menu_slug']
    ));
	
    acf_add_options_sub_page(array(
        'page_title' => __('Attorney List'),
        'menu_title' => __('Attorney List'),
        'parent_slug' => $parent['menu_slug']
    ));
	
    acf_add_options_sub_page(array(
        'page_title' => __('Review Count'),
        'menu_title' => __('Review Count'),
        'parent_slug' => $parent['menu_slug']
    ));
	
    acf_add_options_sub_page(array(
        'page_title' => __('Footer Office List'),
        'menu_title' => __('Footer Office List'),
        'parent_slug' => $parent['menu_slug']
    ));
	

	acf_add_local_field_group( array(
		'key' => 'group_6467c4631ef56',
		'title' => 'Practice Areas List',
		'fields' => array(
			array(
				'key' => 'field_6467c46348214',
				'label' => 'Client Practice Areas',
				'name' => 'client_practice_areas',
				'aria-label' => '',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'table',
				'pagination' => 0,
				'min' => 0,
				'max' => 0,
				'collapsed' => '',
				'button_label' => 'Add Practice Area',
				'rows_per_page' => 20,
				'sub_fields' => array(
					array(
						'key' => 'field_6467c47e48215',
						'label' => 'Practice Area Name',
						'name' => 'practice_area_name',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'parent_repeater' => 'field_6467c46348214',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-practice-areas',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );

	acf_add_local_field_group( array(
		'key' => 'group_6467c4631ef11',
		'title' => 'Spanish Practice Areas List',
		'fields' => array(
			array(
				'key' => 'field_6467c46348211',
				'label' => 'Spanish Client Practice Areas',
				'name' => 'es_client_practice_areas',
				'aria-label' => '',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'table',
				'pagination' => 0,
				'min' => 0,
				'max' => 0,
				'collapsed' => '',
				'button_label' => 'Add Spanish Practice Area',
				'rows_per_page' => 20,
				'sub_fields' => array(
					array(
						'key' => 'field_6467c47e48211',
						'label' => 'Spanish Practice Area Name',
						'name' => 'es_practice_area_name',
						'aria-label' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'maxlength' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'parent_repeater' => 'field_6467c46348211',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-practice-areas',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
	
	
	$practice_areas_list = [
		'-- None --' => '-- None --'
	];
	
	if(isset($_GET['post']) && isset($_GET['action'])){
		if($_GET['action'] == "edit") {
			$page_lang = get_post_meta($_GET['post'], 'hd-translate-post-language-code', true);
			if ($page_lang === 'es') {
				$practice_areas_list = [
					'-- Ninguno --' => '-- Ninguno --'
				];
				if(have_rows('es_client_practice_areas', 'option')) {
					while(have_rows('es_client_practice_areas', 'option')) {
						the_row();
						$pa = get_sub_field('es_practice_area_name');
						$practice_areas_list[$pa] = $pa;
					}
				}
			} else {
				if(have_rows('client_practice_areas', 'option')) {
					while(have_rows('client_practice_areas', 'option')) {
						the_row();
						$pa = get_sub_field('practice_area_name');
						$practice_areas_list[$pa] = $pa;
					}
				}
			}	
		}
	}

    acf_add_local_field_group(array(
        'key' => 'group_6467b69ca8a3f',
        'title' => 'Practice Areas',
        'fields' => array(
            array(
                'key' => 'field_6467b69dda1c1',
                'label' => 'Practice Area',
                'name' => 'practice_area',
                'aria-label' => '',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => $practice_areas_list,
                'default_value' => false,
                'return_format' => 'value',
                'multiple' => 0,
                'allow_null' => 1,
                'ui' => 1,
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_6467b808da1c2',
                'label' => 'Parent Practice Area',
                'name' => 'parent_practice_area',
                'aria-label' => '',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_6467b69dda1c1',
                            'operator' => '!=empty',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => $practice_areas_list,
                'default_value' => false,
                'return_format' => 'value',
                'multiple' => 0,
                'allow_null' => 1,
                'ui' => 1,
                'ajax' => 0,
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
}

