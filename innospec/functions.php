<?php
/**
 * register menu
 */
function register_my_menus() {
    register_nav_menus(
        array(
        'top-menu' => __( 'Top Menu' ),
        'main-menu' => __( 'Main Menu' ),
        'products-menu' => __( 'Products Menu' ),
        'footer-menu' => __( 'Footer Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );

/**
 * register widgets
 */
function wpb_load_widget() {

	register_sidebar( array(
        'name' => __( 'Sidebar Right' ),
        'id' => 'sidebar-right',
        'before_widget' => '<div class="sidebar-right widget">',
        'after_widget' => "</div>",
        'before_title' => "<h3>",
        'after_title' => "</h3>"
    ) );

    register_sidebar( array(
        'name' => __( 'Footer logo' ),
        'id' => 'footer-logo',
        'before_widget' => '<div id="footer-logo" class="widget col-xl-2 col-lg-12 al ac-resp">',
        'after_widget' => "</div>"
    ) );
    register_sidebar( array(
        'name' => __( 'Footer Copy Right' ),
        'id' => 'footer-copy-right',
        'before_widget' => '<div id="copy-right" class="widget">',
        'after_widget' => "</div>"
    ) );

    register_sidebar( array(
        'name' => __( 'Top - Social media' ),
        'id' => 'top-social-media',
        'before_widget' => '<div class="wrap-top-social-media">',
        'after_widget' => "</div>"
    ) );

    register_sidebar( array(
        'name' => __( 'Stock Prices' ),
        'id' => 'stock-prices',
    ) );

    register_sidebar( array(
        'name' => __( 'Home - News image' ),
        'id' => 'home-news-image',
        'before_widget' => '<div>',
        'after_widget' => "</div>",
    ) );

    register_sidebar( array(
        'name' => __( 'Home - Press release image' ),
        'id' => 'home-press-release-image',
        'before_widget' => '<div>',
        'after_widget' => "</div>",
    ) );

    register_sidebar( array(
        'name' => __( 'Top Offers' ),
        'id' => 'top-offers',
        'before_widget' => '<div>',
        'after_widget' => "</div>",
    ) );

}
add_action( 'widgets_init', 'wpb_load_widget' );

add_theme_support( 'post-thumbnails' );

/**
 * limit char in excerpt
 */

function get_excerpt($num = 50){
    $excerpt = get_the_content();
    $excerpt = preg_replace(" ([.*?])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $num);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    //$excerpt = $excerpt.'... <a href="'.get_the_permalink().'">more</a>';
    return $excerpt."...";
}


/**
* Returns ID of top-level parent category, or current category if you are viewing a top-level
*
* @param    string      $catid      Category ID to be checked
* @return   string      $catParent  ID of top-level parent category
*/
function smart_category_top_parent_id ($catid) {
    while ($catid) {
        $cat = get_category($catid); // get the object for the catid
        $catid = $cat->category_parent; // assign parent ID (if exists) to $catid
          // the while loop will continue whilst there is a $catid
          // when there is no longer a parent $catid will be NULL so we can assign our $catParent
        $catParent = $cat->cat_ID;
    }
    return $catParent;
}

function wpbeginner_numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation"><ul>' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );

    echo '</ul></div>' . "\n";

}

function pagination($query){ ?>
    <ul class="pagination">
      <?php
          $pages = paginate_links( array(
              'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
              'total'        => $query->max_num_pages,
              'current'      => max( 1, get_query_var( 'paged' ) ),
              'format'       => '?paged=%#%',
              'show_all'     => false,
              'type'         => 'array',
              'end_size'     => 2,
              'mid_size'     => 1,
              'prev_next'    => true,
              'prev_text'    => '<span class ="fa fa-caret-left" aria-hidden="true"></span><span class="prev-text">Prev</span>',
              'next_text'    => '<span class="next-text">Next</span> <span class ="fa fa-caret-right" aria-hidden="true"></span>',
              'add_args'     => false,
              'add_fragment' => '',
          ) );

        if (is_array($pages)):
          foreach ($pages as $p): ?>
            <li class="pagination-item js-ajax-link-wrap">
              <?php echo $p;?>
            </li>
          <?php endforeach;
        endif;?>
    </ul>
  <?php
  }

function custom_posts_per_page( $query ) {
    //fixing pagination of custom post type
    if ( $query->is_archive('products') ) {
        set_query_var('posts_per_page', 10);
    }
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );



function wpb_list_child_pages($id) {

    global $post;

    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $id . '&echo=0' );


    if ( $childpages ) {

        $string = '<ul>' . $childpages . '</ul>';
    }

    return $string;

}

function get_table_tradding_tc(){
	$arg = array(
		'post_type' => 'trading-tc',
		'order' => 'DESC',
		'orderby' => 'menu_order',
		'showposts' => 1000
	);

	$query = new WP_Query($arg);
	if($query->have_posts()):?>
		<script src="<?php bloginfo("template_url"); ?>/js/jquery.rowspanizer.min.js"></script>
		<script>
		  jQuery(document).ready(function(){
		  	jQuery("#table-trading").rowspanizer({
		  		vertical_align: 'middle',
		  		columns: [0,1]
		  	});
		  });
		</script>
		<table id="table-trading" class="table-trading" style="width: 100%;" cellspacing="0" cellpadding="0">
			<thead>
			  <tr class="thead">
			    <th class="border-left border-none-top"></th>
			    <th class="font-weight-bold">Term and Conditions</th>
			    <th class="font-weight-bold">Ref. #</th>
			    <th class="font-weight-bold">Language</th>
			    <th class="font-weight-bold">Effective in all orders<br> placed on and after</th>
			  </tr>
			</thead>
			<tbody>
            <?php $i = 0; $j == 0; ?>
			<?php while($query->have_posts()): $query->the_post();?>
				<?php
				if(get_field('type')=='INNOSPEC ACTIVE CHEMICALS LLC' and !isset($j))
				{
					$border_top="border-top";
					$j = true;
				}else
					$border_top="";

                if($j == 0) $type = get_field("type");

                if($type !== get_field('type')){
                    $i++;
                    $type = get_field("type");
                }

                if($i % 2 == 0)
                    $row = 'odd';
                else
                    $row = 'even';

                $space = '';
                for($k=1;$k<=$i;$k++) $space = $space.'&nbsp;';
                
				?>
				<tr class="<?php echo $border_top; echo $row; ?>">
					<td class="font-weight-bold al"><?php the_field('type');?></td>
					<td><?php echo get_field('term_conditions').$space; ?></td>
					<td class="<?php echo $td_class_bg; ?>">
						<?php if(get_field('file')): ?><a href="<?php the_field('file');?>" download><?php endif;?>
							<img src="<?php bloginfo('template_url') ?>/img/icon-download.png" /> <?php the_field('ref_number');?>
						<?php if(get_field('file')){?></a><?php } ?>
					</td>
					<td class="<?php echo $td_class_bg; ?>"><?php the_field('language');?></td>
					<td class="<?php echo $td_class_bg; ?>"><?php the_field('date');?></td>
				</tr>
                <?php $j++; ?>
			 <?php endwhile;?>
			</tbody>
		</table>
		<?php
		wp_reset_postdata();
	endif;
}
add_shortcode('table_tradding_tc', 'get_table_tradding_tc');


/**
  * CALL AJAX
 */
add_action('wp_ajax_single_board', 'single_board_callback');
add_action('wp_ajax_nopriv_single_board', 'single_board_callback');

function single_board_callback()
{
    global $post;
    $args = array(
        'p' => $_POST['postid'],
        'post_type' => $_POST['posttype'],
    );

    $myposts = get_posts( $args );

    foreach( $myposts as $post ) :
        setup_postdata($post); ?>
        <div class="col-md-3">
            <img src="<?php echo get_field('photo'); ?>" alt="image" style="max-width: 250px;">
        </div>
        <div class="col-md-9">
            <h3><?php the_title(); ?></h3>
            <h5><?php the_field('title'); ?></h5>
            <div class="content"><?php the_content(); ?></div>
        </div>
    <?php
    endforeach;
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){

        });
    </script>
    <?php
    die(); // Siempre hay que terminar con die
}

function my_custom_mime_types( $mimes ) {

// New allowed mime types.
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    $mimes['doc'] = 'application/msword';
    $mimes['xls'] = 'application/vnd.ms-excel';
    $mimes['pdf'] = 'application/pdf';

    // Optional. Remove a mime type.
    unset( $mimes['exe'] );

    return $mimes;
}
add_filter( 'upload_mimes', 'my_custom_mime_types' );



if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

}














class TopOffer {
    private $top_offer_options;

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'top_offer_add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'top_offer_page_init' ) );
    }

    public function top_offer_add_plugin_page() {
        add_options_page(
            'Top offer', // page_title
            'Top offer', // menu_title
            'manage_options', // capability
            'top-offer', // menu_slug
            array( $this, 'top_offer_create_admin_page' ) // function
        );
    }

    public function top_offer_create_admin_page() {
        $this->top_offer_options = get_option( 'top_offer_option_name' ); ?>

        <div class="wrap">
            <h2>Top offer</h2>
            <p></p>
            <?php settings_errors(); ?>

            <form method="post" action="options.php">
                <?php
                    settings_fields( 'top_offer_option_group' );
                    do_settings_sections( 'top-offer-admin' );
                    submit_button();
                ?>
            </form>
        </div>
    <?php }

    public function top_offer_page_init() {
        register_setting(
            'top_offer_option_group', // option_group
            'top_offer_option_name', // option_name
            array( $this, 'top_offer_sanitize' ) // sanitize_callback
        );

        add_settings_section(
            'top_offer_setting_section', // id
            'Settings', // title
            array( $this, 'top_offer_section_info' ), // callback
            'top-offer-admin' // page
        );

        add_settings_field(
            'publish_0', // id
            'Publish', // title
            array( $this, 'publish_0_callback' ), // callback
            'top-offer-admin', // page
            'top_offer_setting_section' // section
        );

        add_settings_field(
            'title_1', // id
            'Title', // title
            array( $this, 'title_1_callback' ), // callback
            'top-offer-admin', // page
            'top_offer_setting_section' // section
        );

        add_settings_field(
            'content_2', // id
            'Content', // title
            array( $this, 'content_2_callback' ), // callback
            'top-offer-admin', // page
            'top_offer_setting_section' // section
        );
    }

    public function top_offer_sanitize($input) {
        $sanitary_values = array();
        if ( isset( $input['publish_0'] ) ) {
            $sanitary_values['publish_0'] = $input['publish_0'];
        }

        if ( isset( $input['title_1'] ) ) {
            $sanitary_values['title_1'] = sanitize_text_field( $input['title_1'] );
        }

        if ( isset( $input['content_2'] ) ) {
            $sanitary_values['content_2'] = esc_textarea( $input['content_2'] );
        }

        return $sanitary_values;
    }

    public function top_offer_section_info() {

    }

    public function publish_0_callback() {
        ?> <fieldset><?php $checked = ( isset( $this->top_offer_options['publish_0'] ) && $this->top_offer_options['publish_0'] === 'yes' ) ? 'checked' : '' ; ?>
        <label for="publish_0-0"><input type="radio" name="top_offer_option_name[publish_0]" id="publish_0-0" value="yes" <?php echo $checked; ?>> Yes</label><br>
        <?php $checked = ( isset( $this->top_offer_options['publish_0'] ) && $this->top_offer_options['publish_0'] === 'no' ) ? 'checked' : '' ; ?>
        <label for="publish_0-1"><input type="radio" name="top_offer_option_name[publish_0]" id="publish_0-1" value="no" <?php echo $checked; ?>> No</label></fieldset> <?php
    }

    public function title_1_callback() {
        printf(
            '<input class="regular-text" type="text" name="top_offer_option_name[title_1]" id="title_1" value="%s">',
            isset( $this->top_offer_options['title_1'] ) ? esc_attr( $this->top_offer_options['title_1']) : ''
        );
    }

    public function content_2_callback() {
        printf(
            '<textarea class="large-text" rows="5" name="top_offer_option_name[content_2]" id="content_2">%s</textarea>',
            isset( $this->top_offer_options['content_2'] ) ? esc_attr( $this->top_offer_options['content_2']) : ''
        );
    }

}
if ( is_admin() )
    $top_offer = new TopOffer();

/*
 * Retrieve this value with:
 * $top_offer_options = get_option( 'top_offer_option_name' ); // Array of All Options
 * $publish_0 = $top_offer_options['publish_0']; // Publish
 * $title_1 = $top_offer_options['title_1']; // Title
 * $content_2 = $top_offer_options['content_2']; // Content
 */


function turn_off_feed() {

    $mainurl = get_bloginfo('url');
    echo '<h1>Our Feed is currently off</h1>';    
    die();
//$mainurl = get_bloginfo('url');
//wp_die( __('Our Feed is currently off,please visit our <a href="'. get_bloginfo(‘insert_url_here’) .'">Homepage</a>!') );
}

add_action('do_feed', 'turn_off_feed', 1);
add_action('do_feed_rdf', 'turn_off_feed', 1);
add_action('do_feed_rss', 'turn_off_feed', 1);
add_action('do_feed_rss2', 'turn_off_feed', 1);
add_action('do_feed_atom', 'turn_off_feed', 1);
add_action('do_feed_rss2_comments', 'turn_off_feed', 1);
add_action('do_feed_atom_comments', 'turn_off_feed', 1);


// Add Shortcode
function custom_shoresources() {
		$resources = '';

		//print_r($_COOKIE);

        if (isset ( $_COOKIE['first_time'])) {

            $resources = '<style>.wrap-video >div:nth-child(1) {display: none;}</style><h3>RESOURCES</h3><ul class="list">
						 	<li>Case Histories
								<div class="casehistories">
									<ul class="sublist">
									<li><a href="https://innospec.com/wp-content/uploads/2021/08/Octamar-BT25-Case-History-Tank-Cleaning.pdf" target="_blank">Octamar BT25 Case History – Tank Cleaning</a></li>
									<li><a href="https://innospec.com/wp-content/uploads/2021/08/Trident-290-Case-History-Blending-Economics.pdf" target="_blank">Trident 290 Case History – Blending Economics</a></li>
									<li><a href="https://innospec.com/wp-content/uploads/2021/08/Trident-290-Case-History-TSP-Creep.pdf" target="_blank">Trident 290 Case History – TSP Creep</a></li>
									</ul>
								</div>
							</li>
						 	<li>Technical Papers
								<div class="casehistories">
									<ul class="sublist">
									<li><a href="https://innospec.com/wp-content/uploads/2021/08/Economic-benefits-of-additives-.pdf" target="_blank">Economic Benefits of Additives</a></li>
									<li><a href="https://innospec.com/wp-content/uploads/2021/08/Editorial_DeepDive.pdf" target="_blank">Editorial DeepDive</a></li>
									</ul>
								</div>
							</li>
						 	<li>Webinars
								<div class="casehistories">
									<ul class="sublist">
									<li><a href="https://youtu.be/or5rxfMTVV0" target="_blank">Trident™ Bunker Fuel Additives: Marine Fuel Instability</a></li>
									<li><a href="https://youtu.be/I8a3Trr6PFI" target="_blank">Understanding VLFSO & ULSFO Chemical Properties & How They Impact Operations</a></li>
									<li><a href="https://youtu.be/KZheggVJ2hw" target="_blank">Bunker Fuel Degradation and Stability Management – Total Sediment Creep</a></li>
									<li><a href="https://youtu.be/e1IJ8AmekzA" target="_blank">Trident™ Bunker Fuels: Flow Improvers</a></li>
									<li><a href="https://youtu.be/q0Q614BhSZs" target="_blank">The Bottom Line on Bunker Fuels</a></li>
									</ul>
								</div>
						 	</li>
						</ul>
						';
            
        } else {

            $resources = '<style>.wrap-video >div:nth-child(1) {display: none;}</style><h3>RESOURCES</h3><ul class="list">
						 	<li><a data-toggle="modal" data-target="#reguser" href="#">Case Histories</a></li>
						 	<li><a data-toggle="modal" data-target="#reguser" href="#">Technical Papers</a></li>
						 	<li><a data-toggle="modal" data-target="#reguser" href="#">Webinars</a></li>
						</ul>
						';

        } 
        $id_page = get_the_ID();

        if (($id_page == '6325') or ($id_page == '6384') or ($id_page == '6390') or ($id_page == '6393') or ($id_page == '6395') or ($id_page == '1854')) {

            return $resources;
        }

}
add_shortcode( 'shoresources', 'custom_shoresources' );







// add hook
add_filter( 'wp_nav_menu_objects', 'my_wp_nav_menu_objects_sub_menu', 10, 2 );

// filter_hook function to react on sub_menu flag
function my_wp_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {
  if ( isset( $args->sub_menu ) ) {
    $root_id = 0;
    
    // find the current menu item
    foreach ( $sorted_menu_items as $menu_item ) {
      if ( $menu_item->current ) {
        // set the root id based on whether the current menu item has a parent or not
        $root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
        break;
      }
    }
    
    // find the top level parent
    if ( ! isset( $args->direct_parent ) ) {
      $prev_root_id = $root_id;
      while ( $prev_root_id != 0 ) {
        foreach ( $sorted_menu_items as $menu_item ) {
          if ( $menu_item->ID == $prev_root_id ) {
            $prev_root_id = $menu_item->menu_item_parent;
            // don't set the root_id to 0 if we've reached the top of the menu
            if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
            break;
          } 
        }
      }
    }

    $menu_item_parents = array();
    foreach ( $sorted_menu_items as $key => $item ) {
      // init menu_item_parents
      if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;

      if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
        // part of sub-tree: keep!
        $menu_item_parents[] = $item->ID;
      } else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {
        // not part of sub-tree: away with it!
        unset( $sorted_menu_items[$key] );
      }
    }
    
    return $sorted_menu_items;
  } else {
    return $sorted_menu_items;
  }
}

function breadcrumbs_sc(){
    ?>
    <div class="row">
        <div class="col-lg-12">
            <nav class="breadcrumb">
            <?php if(function_exists('bcn_display'))
                {
                    bcn_display();
                }?>
            </nav>
        </div>
    </div>
    <?php
}
add_shortcode('breadcrumbs_sc', 'breadcrumbs_sc');


function f_nasdaq(){
    ?>
    <div class="box-nyse">
        
        <style type="text/css">
            .box-nyse .nyse{display:flex!important;align-items: center!important;}
            .box-nyse .smw-field, 
            /*.box-nyse .smw-up,*/
            .box-nyse .smw-down{display: none!important;}
            .box-nyse .nyse .smw-field-symbol,
            .box-nyse .cost .smw-field-price,
            .box-nyse .decimals .smw-field-change-abs,
            .box-nyse .decimals .smw-field-change-pct{display: block!important;}

            .box-nyse .smw-root .smw-ticker-markets .smw-ticker-container, 
            .box-nyse .smw-root .smw-ticker-news .smw-ticker-container, 
            .box-nyse .smw-root .smw-ticker-quotes .smw-ticker-container {
              display: inline-block!important;
            }
            .box-nyse .cost .smw-field,
            .box-nyse .decimals .smw-field{
                margin-left:auto!important;
                margin-right:auto!important;
            }
            .box-nyse .cost span{
                color: #ffffff!important;
                font-size: 50px!important;
                font-family: 'Questrial', sans-serif!important;
                line-height: 1!important;
                margin-bottom: 30px!important;
                margin-right: 0px!important;
            }
            .box-nyse .nyse{
                font-weight: bold;
                margin-bottom: 8px!important;
            }
            .box-nyse .nyse span{
                color: #0077c0!important;
                font-size: 30px!important;
                line-height: 1!important;
            }
            .box-nyse .decimals{
                margin-bottom: 10px;
            }
            .box-nyse .decimals *{
                color: #b2bb1c!important;
                font-size: 30px!important;
                line-height: 1!important;
            }
            .box-nyse i{display:none!important}
            .box-nyse .decimals i{
                display: block!important;
                font-family: "Font Awesome 5 Free"!important;
                font-size:20px!important;
            }
            /*.box-nyse .decimals .smw-field.smw-field-price{
                display: inline-block!important;
            }*/
            .box-nyse .decimals .smw-field-change-abs{
                margin-left:0!important;
            }
            .box-nyse .decimals .smw-field-change-pct .smw-field-value:before{
                content:'(';
            }
            .box-nyse .decimals .smw-field-change-pct .smw-field-value:after{
                content:')';
            }
        </style>
        <div class="nyse">
            <span>NASDAQ:</span> <?php echo do_shortcode('[stock_market_widget type="ticker-quotes" template="basic" color="#5679FF" assets="IOSP" display_currency_symbol="true" api="yf" style="font-size:0.8rem;"]'); ?>
        </div>
        <div class="cost">
            <?php echo do_shortcode('[stock_market_widget type="ticker-quotes" template="basic" color="#5679FF" assets="IOSP" display_currency_symbol="true" api="yf" style="font-size:0.8rem;"]'); ?>
        </div>
        <div class="decimals">
            <?php echo do_shortcode('[stock_market_widget type="ticker-quotes" template="basic" color="#5679FF" assets="IOSP" display_currency_symbol="true" api="yf" style="font-size:0.8rem;"]'); ?>
        </div>
        <div class="text">Pricing delayed by 20 minutes</div>
    </div>
    <?php
}
add_shortcode('nasdaq', 'f_nasdaq');