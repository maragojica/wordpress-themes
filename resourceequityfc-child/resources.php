<?php
/**
 * Student Experience Project.
 *
 * This file adds the landing page template to the Genesis Sample Theme.
 *
 * Template Name: Resources
 *
 * @package Student Experience Project
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

// add a custom loop
add_action( 'genesis_loop', 'my_custom_loop' );

function my_custom_loop () {
	// add your queries or custom structure here
	?>
	<script src="https://kit.fontawesome.com/e4f868da6e.js"></script>
	<div class="filter-cat-icons vc_row">
		<div class="filter-cat-items vc_col-lg-4 vc_col-md-4 vc_col-sm-6 vc_col-xs-6">
			<a href="?cat=campuses-perspectives">
				<div class="filter-cat-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/devkit/images/campuses.png"></div>
				<div class="filter-cat-title">Campus</div>
			</a>
		</div>
		<div class="filter-cat-items vc_col-lg-4 vc_col-md-4 vc_col-sm-6 vc_col-xs-6">
			<a href="?cat=key-research-behind-the-sep">
				<div class="filter-cat-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/devkit/images/key-research.png"></div>
				<div class="filter-cat-title">Key Research<br>Behind the SEP</div>
			</a>
		</div>
		<div class="filter-cat-items vc_col-lg-4 vc_col-md-4 vc_col-sm-6 vc_col-xs-6">
			<a href="?cat=tool-resources">
				<div class="filter-cat-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/devkit/images/tools-resources.png"></div>
				<div class="filter-cat-title">Tools &<br>Resources</div>
			</a>
		</div>
		<div class="filter-cat-items vc_col-lg-4 vc_col-md-4 vc_col-sm-6 vc_col-xs-6">
			<a href="?cat=student-voice">
				<div class="filter-cat-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/devkit/images/student-voice.png"></div>
				<div class="filter-cat-title">Student<br>Voices</div>
			</a>
		</div>
		<div class="filter-cat-items vc_col-lg-4 vc_col-md-4 vc_col-sm-6 vc_col-xs-6">
			<a href="?cat=equity-in-action">
				<div class="filter-cat-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/devkit/images/equity-action.png"></div>
				<div class="filter-cat-title">Equity in<br>Action</div>
			</a>
		</div>
		<!--<div class="filter-cat-items vc_col-lg-4 vc_col-md-4 vc_col-sm-6 vc_col-xs-6">
			<a href="?cat=policy-learning">
				<div class="filter-cat-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/devkit/images/policy-learning.png"></div>
				<div class="filter-cat-title">Policy &<br>Learning Briefs</div>
			</a>
		</div>-->
		<div class="filter-cat-items vc_col-lg-4 vc_col-md-4 vc_col-sm-6 vc_col-xs-6">
			<a href="?cat=key-partnerships-and-initiatives">
				<div class="filter-cat-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/devkit/images/key-partnerships.png"></div>
				<div class="filter-cat-title">Key Partnerships<br>and Initiatives</div>
			</a>
		</div>
		<!--<div class="filter-cat-items vc_col-lg-4 vc_col-md-4 vc_col-sm-6 vc_col-xs-6">
			<a href="?cat=case-studies">
				<div class="filter-cat-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/devkit/images/case-studies.png"></div>
				<div class="filter-cat-title">Case<br>Studies</div>
			</a>
		</div>-->
	</div>

	<div class="line-divider"></div>

	<div class="filter-cat-explore">
		<form class="" action="/resources" method="get">
			<div class="vc_row">
				<div class="vc_col-md-12">
					<div class="wrap-explore d-flex justify-content-between aling-items-center">
						<div class="title">Explore:</div>
						<div class="filter-by">
							FILTER BY:
						</div>
						<div class="pr-2">
							<select name="cat1">
							 <option value="">Category 1</option>
							 <?php
							    $values = array(
							      'orderby' => 'name',
							      'order' => 'ASC',
							      'echo' => 1,
							      //'selected' => $kat = get_query_var( 'cat1' ),
							      'taxonomy' => 'resources'
							     );
							  $categories = get_categories($values);
							  foreach ($categories as $category) {
							  		$selected1 = ($category->slug == $_GET['cat1'])?"selected":"";
								    $option = '<option value="'.$category->slug.'" '.$selected1.'>';
								    $option .= $category->cat_name;
								    $option .= '</option>';
								    echo $option;
							  }
							 ?>
							</select>
						</div>
						<div class="pr-2">
							<select name="cat2">
							 <option value="">Category 2</option>
							 <?php
							    $values = array(
							      'orderby' => 'name',
							      'order' => 'ASC',
							      'echo' => 1,
							      //'selected' => $_GET['cat2'],
							      'taxonomy' => 'resources'
							     );
							  $categories = get_categories($values);
							  foreach ($categories as $category) {
							  		$selected2 = ($category->slug == $_GET['cat2'])?"selected":"";
								    $option = '<option value="'.$category->slug.'" '.$selected2.'>';
								    $option .= $category->cat_name;
								    $option .= '</option>';
								    echo $option;
							  }
							 ?>
							</select>
						</div>
						<div class="advanced ac">
							<span class="link">Advanced Search</span>
						</div>
					</div>
				</div>
			</div>
			<div class="vc_row">
				<div class="vc_col-md-12">
					<div class="wrap-explore-fields">
						<div class="vc_row">
							<div class="vc_col-md-6">
								<div class="form-group">
									<input type="text" placeholder="Key Word" class="w-100" name="key" value="<?php echo !empty($_GET['key'])?$_GET['key']:""; ?>">
								</div>
								<div class="form-group">
									<input type="text" name="authors" placeholder="Author's Name" class="w-100" value="<?php echo !empty($_GET['authors'])?$_GET['authors']:""; ?>">
								</div>
								<div class="date-filter form-group d-flex aling-items-center">
									<label class="mr-2">Date:</label>
									<select name="dd">
										<option value="">Day</option>
										<?php for($day = 1;$day <= 31; $day++): ?>
											<option value="<?php echo $day; ?>" <?php echo ($day == $_GET['dd'])?"selected":"" ?>><?php echo $day ?></option>
										<?php endfor; ?>
									</select>
									<select name="mm" class="ml-1 mr-1">
										<option value="">Month</option>
										<?php $arrayMonth = array(
												"01" => "January",
												"02" => "February",
												"03" => "March",
												"04" => "April",
												"05" => "May",
												"06" => "June",
												"07" => "July",
												"08" => "August",
												"09" => "September",
												"10" => "October",
												"11" => "November",
												"12" => "December",
											); ?>
										<?php foreach($arrayMonth as $m_key => $month): ?>
											<option value="<?php echo $m_key ?>" <?php echo ($m_key == $_GET['mm'])?"selected":"" ?>><?php echo $month ?></option>
										<?php endforeach; ?>
									</select>
									<select name="yy">
										<option value="">Year</option>
										<?php for($year = 1990;$year <= 2021; $year++): ?>
											<option value="<?php echo $year; ?>" <?php echo ($year == $_GET['yy'])?"selected":"" ?>><?php echo $year ?></option>
										<?php endfor; ?>
									</select>
								</div>
							</div>
							<div class="vc_col-md-6">
								<div class="form-group">
									<?php
									$terms = get_terms('tag_resources'); //Get all Tags
									?>
									<select name="tag1" class="w-100" id="tag_id_1">
										<option value="">Tag 1</option>
										<?php
										foreach ($terms as $term) {
											$t1 = ($term->slug == $_GET['tag1'])?"selected":"";
										    echo '<option value=' . $term->slug . ' '.$t1.'> ' . $term->name . '</option>';
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<?php
									$terms = get_terms('tag_resources'); //Get all Tags
									?>
									<select name="tag2" class="w-100" id="tag_id_2">
										<option value="">Tag 1</option>
										<?php
										foreach ($terms as $term) {
											$t2 = ($term->slug == $_GET['tag2'])?"selected":"";
										    echo '<option value=' . $term->slug . ' '.$t2.'> ' . $term->name . '</option>';
										}
										?>
									</select>
								</div>
								<div class="form-group select-type">
									<?php $arrayType = array("Video","Course","Audio","Download"); ?>
									<select name="type">
										<option value="">Type</option>
										<?php foreach($arrayType as $type): ?>
											<option value="<?php echo $type ?>" <?php echo ($type == $_GET['type'])?"selected":""; ?>><?php echo $type ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="vc_row">
							<div class="vc_col-md-12 wrap-submit d-flex aling-items-center">
								<a href="/resources" class="mr-1">Reset</a>
								<input type="submit" name="" value="SEARCH" class="submit">
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="wrap-resources-items">
		<div class="vc_row">
			<?php
			//$query = new WP_Query( array( 'meta_key' => '_is_ns_featured_post', 'meta_value' => 'yes' ) );
			$arg = array(
				'post_type' => 'resources',
				'posts_per_page'	=> -1,
				'meta_key'			=> 'featured',
				'orderby'			=> array(
										'meta_value' => 'DESC',
										'date' => 'DESC',
									   ),

				//'order'				=> 'DESC'z
			);
			if(isset($_GET['cat']))
				$arg['tax_query'] = array(
			            array(
			                'taxonomy' => 'resources',
			                'field'    => 'slug',
	            			'terms'    => $_GET['cat'],
	            			//'compare' => 'LIKE'
	            			'relation' => 'AND',
			            ),
			        );

								/**
								  * Tax Query
								 */
								$tax_query = array();

								if(isset($_GET['cat1']) and !empty($_GET['cat1']))
									$tax_query[] = array(
								                'taxonomy' => 'resources',
								                'field'    => 'slug',
						            			'terms'    => $_GET['cat1'],
						            			//'compare' => 'LIKE',
						            			'relation' => 'AND',
								            );
								if(isset($_GET['cat2']) and !empty($_GET['cat2']))
									$tax_query[] = array(
								                'taxonomy' => 'resources',
								                'field'    => 'slug',
						            			'terms'    => $_GET['cat2'],
						            			//'compare' => 'LIKE',
						            			'relation' => 'AND',
								            );
								if(isset($_GET['tag1']) and !empty($_GET['tag1']))
									$tax_query[] = array(
								                'taxonomy' => 'tag_resources',
								                'field'    => 'slug',
						            			'terms'    => $_GET['tag1'],
						            			//'compare' => 'LIKE',
						            			'relation' => 'AND',
								            );
								if(isset($_GET['tag2']) and !empty($_GET['tag2']))
									$tax_query[] = array(
								                'taxonomy' => 'tag_resources',
								                'field'    => 'slug',
						            			'terms'    => $_GET['tag2'],
						            			//'compare' => 'LIKE',
						            			'relation' => 'AND',
								            );

								if(!empty($tax_query))
									$arg['tax_query'] = $tax_query;


								if(isset($_GET['key']) and !empty($_GET['key']))
									$arg['s'] = $_GET['key'];

								/**
								 * Meta Query
								 */
								$meta_query = array();
								if(isset($_GET['authors']) and !empty($_GET['authors']))
									$meta_query[] = array(
								                'key' => 'author_name',
								                'value' => $_GET['authors'],
								                'compare' => 'LIKE',
								            );
								if(isset($_GET['type']) and !empty($_GET['type']))
									$meta_query[] = array(
								                'key' => 'type',
								                'value' => $_GET['type']
								            );

								if(!empty($meta_query))
									$arg['meta_query'] = $meta_query;

								/**
								 * Date Query
								 */
								$date_query = array();
								if(isset($_GET['dd']) and !empty($_GET['dd']))
									$date_query['day'] = $_GET['dd'];

								if(isset($_GET['mm']) and !empty($_GET['mm']))
									$date_query['month'] = $_GET['mm'];

								if(isset($_GET['yy']) and !empty($_GET['yy']))
									$date_query['year'] = $_GET['yy'];

								$arg['date_query'] = $date_query;

								/*$arg['date_query'] = array(
							        array(
							            'year' => date( 'Y' ),
							            'month' => date( 'M' ),
							            'day' => date( 'D' )
							        )
							    )*/


			$query = new WP_Query($arg);

			if($query->have_posts()):
				while($query->have_posts()): $query->the_post();
				?>
				<div class="vc_col-lg-4 vc_col-md-3 vc_col-sm-6 vc_col-xs-12">
					<?php
					if(get_field('featured') == '1')
						$card_featured = 'card-featured';
					else
						$card_featured = '';

					if(get_field('background_color_or_image') == "Background Color"){
						$bg = get_field('bg_color');
						$have_bg = '';
					}
					elseif(get_field('background_color_or_image') == "Background Image"){
						$bg = 'url('.get_field('bg_image').') no-repeat';
						$have_bg = 'have-bg';
					}

					?>
					<div class="card <?php echo $card_featured ?> card-resources <?php echo $have_bg ?>">

						<div class="card-header" style="background:<?php echo $bg; ?>">
							<?php if(get_field('featured') == '1'): ?>
							<div class="featured">
								<i class="fas fa-thumbtack"></i> Featured
							</div>
							<?php endif; ?>
							<?php if(get_field('show_headline_in_header') == 'Yes'): ?>
							<div class="headline"><?php the_title(); ?></div>
							<?php endif; ?>
							<div class="logo">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icon-due.png">
							</div>
						</div>
						<div class="d-flex justify-content-between flex-column h-100">
							<div class="card-body">
								<div class="date"><?php echo get_the_date('F jS, Y'); ?></div>
								<div class="title"><?php the_title(); ?></div>
								<div class="content"><?php the_excerpt(); ?></div>
							</div>
							<div class="card-footer d-flex justify-content-between">
								<a href="<?php the_permalink(); ?>">Read More</a>
								<div class="tags">
									<?php
										$posttags = get_the_tags();
										if ($posttags) {
										  foreach($posttags as $tag) {
										    echo "<span>".$tag->name . '</span> ';
										  }
										}
										?>
								</div>
							</div>
						</div>
					</div>
				</div><!-- col-md-4 -->
				<?php endwhile;
			else:
				echo "<div class='vc_col-md-12'>No exist results.</div>";
			endif;
			?>
		</div>
	</div>
	<?php
}

genesis();
