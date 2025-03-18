<?php

class PrimaryMenuWalker extends Walker_Nav_Menu {

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth. It is possible to set the
	 * max depth to include all depths, see walk() method.
	 *
	 * This method should not be called directly, use the walk() method instead.
	 *
	 * @since 2.5.0
	 *
	 * @param object $element           Data object.
	 * @param array  $children_elements List of elements to continue traversing (passed by reference).
	 * @param int    $max_depth         Max depth to traverse.
	 * @param int    $depth             Depth of current element.
	 * @param array  $args              An array of arguments.
	 * @param string $output            Used to append additional content (passed by reference).
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( ! $element ) {
			return;
		}

		$id_field = $this->db_fields['id'];
		$id       = $element->$id_field;

		//display this element
		$this->has_children = ! empty( $children_elements[ $id ] );
		if ( isset( $args[0] ) && is_array( $args[0] ) ) {
			$args[0]['has_children'] = $this->has_children; // Back-compat.
		}

		$this->start_el( $output, $element, $depth, ...array_values( $args ) );

		// descend only when the depth is right and there are childrens for this element
		if ( ( $max_depth == 0 || $max_depth > $depth + 1 ) && isset( $children_elements[ $id ] ) ) {

			foreach ( $children_elements[ $id ] as $child ) {

				if ( ! isset( $newlevel ) ) {
					$newlevel = true;
					//start the child delimiter
					$this->start_lvl( $output, $depth, ...array_values( $args ) );
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		} elseif ($args[0]->theme_location == 'primary') {
			$create_submenu = get_field('create_submenu', $element->ID);

			if ($create_submenu) {
				$type_submenu = get_field('type', $element->ID);
				if ($type_submenu == 'cpt_submenu') {
					$select_cpt  = get_field( 'select_cpt', $element->ID );
					$count_posts = get_field( 'count_posts', $element->ID );
					$cpt_object  = get_post_type_object( $select_cpt );
					$cpt_args    = array(
						'post_type'      => $select_cpt,
						'post_status'    => 'publish',
						'posts_per_page' => $count_posts,
					);
					$cpt_posts   = new WP_Query( $cpt_args );
					if ( $cpt_posts->have_posts() ) {
						$output .= '<div uk-drop="delay-show: 500" class="submenu-menu-item mt-0">
                                   <div class="container container-close">
                                       		<a href="" class="uk-drop-close mt-4" uk-close><img class="close-icon-menu" src="' . get_stylesheet_directory_uri() . '/assets/img/x-mobile-orange.png"></a>
                                            <div class="row align-items-center justify-content-center mr-0 ml-0">
                                                 <div class="col-md-6 pr-0 pl-0">
                                                      <div id="TabsItems' . $element->ID . 'Content" class="uk-switcher" >';
						while ( $cpt_posts->have_posts() ) : $cpt_posts->the_post();
							$output .= '<div class="box-text">
                                                                     <h2 class="title-section cl-white font-adrianna pb-2">' . get_the_title() . '</h2>
                                                                     <div class="copy-text font-adrianna cl-ligth-white">' . get_the_content() . '
                                                                     </div>
                                                                     <a href="' . get_the_permalink() . '" class="btn btn-border-white text-uppercase">LEARN MORE</a>
                                                                </div>';
						endwhile;
						$output .= '</div>
                                                 </div>
                                                 <div class="col-md-6 pr-0 pl-0">
                                                      <div class="box-text">
                                                            <h6 class="title-submenu-desk no-pointer pb-2">' . $cpt_object->labels->name . '</h6>
                                                            <ul class="sub-menu" uk-switcher="connect: #TabsItems' . $element->ID . 'Content; animation: uk-animation-fade">';
						while ( $cpt_posts->have_posts() ) : $cpt_posts->the_post();
							$output .= '<li class="menu-item menu-item-type-post_type menu-item-object-page">
                                                                            <a href="#">' . get_the_title() . '</a>
                                                                        </li>';
						endwhile;
						$output .= '</ul>
                                                      </div>
                                                 </div>
                                            </div>
                                   </div>
                               </div>';
					}
					wp_reset_postdata();
				} elseif ($type_submenu == 'custom_submenu') {
					$custom_title  = get_field( 'custom_title', $element->ID );
					$custom_submenu  = get_field( 'custom_submenu', $element->ID );
					$output .= '<div uk-drop="delay-show: 500" class="submenu-menu-item mt-0">
                                   <div class="container container-close">
                                       		<a href="" class="uk-drop-close mt-4" uk-close><img class="close-icon-menu" src="' . get_stylesheet_directory_uri() . '/assets/img/x-mobile-orange.png"></a>
                                            <div class="row align-items-center justify-content-center mr-0 ml-0">
                                                 <div class="col-md-6 pr-0 pl-0">
                                                      <div id="TabsItems' . $element->ID . 'Content" class="uk-switcher" >';
					foreach ($custom_submenu as $item) :
						$output .= '<div class="box-text">
                                                                     <h2 class="title-section cl-white font-adrianna pb-2">' . $item['title'] . '</h2>
                                                                     <div class="copy-text font-adrianna cl-ligth-white">' . $item['content'] . '
                                                                     </div>';
					if ($item['url'] != '') :
						$output .= '<a href="' . $item['url'] . '" class="btn btn-border-white text-uppercase">LEARN MORE</a>';
					endif;
						$output .= '</div>';
					endforeach;
					$output .= '</div>
                                                 </div>
                                                 <div class="col-md-6 pr-0 pl-0">
                                                      <div class="box-text">';
					if ($custom_title != '') :
						$output .= '<h6 class="title-submenu-desk no-pointer pb-2">' . $custom_title . '</h6>';
					endif;
						$output .= '<ul class="sub-menu" uk-switcher="connect: #TabsItems' . $element->ID . 'Content; animation: uk-animation-fade">';
					foreach ($custom_submenu as $item) :
						$output .= '<li class="menu-item menu-item-type-post_type menu-item-object-page">
                                                                            <a href="#">' . $item['title'] . '</a>
                                                                        </li>';
					endforeach;
					$output .= '</ul>
                                                      </div>
                                                 </div>
                                            </div>
                                   </div>
                               </div>';
				}
			}
		}

		if ( isset( $newlevel ) && $newlevel ) {
			//end the child delimiter
			$this->end_lvl( $output, $depth, ...array_values( $args ) );
		}

		//end this element
		$this->end_el( $output, $element, $depth, ...array_values( $args ) );
	}

}