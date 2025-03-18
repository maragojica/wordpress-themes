<?php
/**
 * Displays the content when the home template is used.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div id="fullpage">
		<?php if( have_rows('section_values_proposition') ): 
		    while( have_rows('section_values_proposition') ): the_row();

		    // Get sub field values.
		    $title_values_proposition = get_sub_field('title');
		    $background_values_proposition = get_sub_field('background');
		    $text = get_sub_field('text');
		    $text_headline = get_sub_field('text_headline_valies');
		    $read_more = get_sub_field('read_more');
		?>
		<div class="section section-full" id="sectionhome">
			<div class="intro d-flex w-100 h-100 justify-content-center flex-column">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-12">
								<h1 class="headline-lg cl-white"><?php echo $title_values_proposition; ?></h1>
						</div>
					</div>
				</div>
				<div class="info-section-home mt-2 mt-md-3">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h2 class="subheadline cl-white"><?php echo $text; ?></h2>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row align-items-center pt-3">
						<div class="col-md-12">
							<h3 class="textheadline cl-white mb-3"><?php echo $text_headline; ?></h3>
						</div>
					</div>
				</div>

				<div class="section-link">
					<div class="container">
						<div class="row align-items-center justify-content-center">
							<div class="col-md-12 text-center">
								<a class="link-story" href="<?php echo $read_more['url']; ?>"><?php echo $read_more['title']; ?></a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
				<style>
					.section-full#sectionhome{
						background: rgb(0, 0, 0);
						background: linear-gradient(180deg, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.3) 94%), url(<?php echo $background_values_proposition['url']; ?>) !important;
						background-size: cover !important;
					}

				</style>
		    <?php endwhile; ?>
		<?php endif; ?>
		<?php if( have_rows('section_introduction') ): 
		    while( have_rows('section_introduction') ): the_row();

		    // Get sub field values.
		    $title_introduction = get_sub_field('title');
		    $background_introduction = get_sub_field('background');
		    $text = get_sub_field('text');
		    $read_more = get_sub_field('read_more');
		?>
		<div class="section section-full" id="section1">
				<div class="intro d-flex w-100 h-100 justify-content-center flex-column">
					<div class="container">
						<div class="row h-100 align-items-center">
							<div class="col-md-9">
								<h1 class="headline cl-white mb-4"><?php echo $title_introduction; ?></h1>
								<h2 class="subheadline cl-white mb-3"><?php echo $text; ?></h2>
							</div>
						</div>
					</div>
					<div class="section-link">
						<div class="container">
							<div class="row align-items-center justify-content-center">
								<div class="col-md-12 text-center">
									<a class="link-story" href="<?php echo $read_more['url']; ?>"><?php echo $read_more['title']; ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
				<style>
					.section-full#section1 {
						background: url(<?php echo $background_introduction['url']; ?>) !important;
						background-size: cover !important;
					}
				</style>
		    <?php endwhile; ?>
		<?php endif; ?>
		<?php if( have_rows('section_findings') ): 
		    while( have_rows('section_findings') ): the_row();

		    // Get sub field values.
		    $title_findings = get_sub_field('title');
		    $background_findings = get_sub_field('background');
		    $text = get_sub_field('text');
		    $read_more = get_sub_field('read_more');
		?>
		<div class="section section-full" id="section2">
			<div class="intro d-flex w-100 h-100 justify-content-center flex-column">
				<div class="container">
					<div class="row h-100 align-items-center">
						<div class="col-md-9">
							<h1 class="headline cl-white mb-4"><?php echo $title_findings; ?></h1>
							<h2 class="subheadline cl-white mb-3"><?php echo $text; ?></h2>
							</div>
						</div>
				</div>
				<div class="section-link">
					<div class="container">
						<div class="row align-items-center justify-content-center">
							<div class="col-md-12 text-center">
								<a class="link-story" href="<?php echo $read_more['url']; ?>"><?php echo $read_more['title']; ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
				<style>
					.section-full#section2 {
						background: url(<?php echo $background_findings['url']; ?>) !important;
						background-size: cover !important;
					}
				</style>
		    <?php endwhile; ?>
		<?php endif; ?>
		<?php if( have_rows('section_journey') ): 
		    while( have_rows('section_journey') ): the_row();

		    // Get sub field values.
		    $title_journey = get_sub_field('title');
		    $background_journey = get_sub_field('background');
		    $text = get_sub_field('text');
		    $read_more = get_sub_field('read_more');
			$text_headline = get_sub_field('text_headline');
		?>
		<div class="section section-full" id="section3">
			<div class="intro d-flex w-100 h-100 justify-content-center flex-column">
				<div class="container">
					<div class="row h-100 align-items-center">
						<div class="col-md-12 col-xl-9">
							<h1 class="headline cl-white mb-4"><?php echo $title_journey; ?></h1>
							<h2 class="subheadline cl-white mb-3"><?php echo $text; ?></h2>
							<h3 class="textheadline cl-white mb-3"><?php echo $text_headline; ?></h3>
						</div>
					</div>
				</div>
				<div class="section-link">
					<div class="container">
						<div class="row align-items-center justify-content-center">
							<div class="col-md-12 text-center">
								<a class="link-story" href="<?php echo $read_more['url']; ?>"><?php echo $read_more['title']; ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
				<style>
					.section-full#section3 {
						background: url(<?php echo $background_journey['url']; ?>) !important;
						background-size: cover !important;
					}
				</style>
		    <?php endwhile; ?>
		<?php endif; ?>
		<?php if( have_rows('section_appendix') ): 
		    while( have_rows('section_appendix') ): the_row();

		    // Get sub field values.
		    $title_appendix = get_sub_field('title');
		    $background_appendix = get_sub_field('background');
		    $text = get_sub_field('text');
		    $read_more = get_sub_field('read_more');
		?>
		<div class="section section-full" id="section4">
			<div class="intro d-flex w-100 h-100 justify-content-center flex-column">
				<div class="container">
					<div class="row h-100 align-items-center">
						<div class="col-md-9">
							<h1 class="headline cl-white mb-4"><?php echo $title_appendix; ?></h1>
						</div>
					</div>
				</div>
				<div class="section-link">
					<div class="container">
						<div class="row align-items-center justify-content-center">
							<div class="col-md-12 text-center">
								<a class="link-story" href="<?php echo $read_more['url']; ?>"><?php echo $read_more['title']; ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
				<style>
					.section-full#section4 {
						background: url(<?php echo $background_appendix['url']; ?>) !important;
						background-size: cover !important;
					}
				</style>
		    <?php endwhile; ?>
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

<!-- Easings-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/easings.js" type="text/javascript"></script>
<!-- Scrolloverflow-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/scrolloverflow.js" type="text/javascript"></script>
<!-- FullPage-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/fullpage.js" type="text/javascript"></script>



<script type="text/javascript">
	var myFullpage = new fullpage('#fullpage', {
		licenseKey: '70A27D0D-5CE74102-99428128-72871588',
		navigation: true,
		navigationPosition: 'right',
		navigationTooltips: ['<?php echo $title_values_proposition; ?>', '<?php echo $title_introduction; ?>', '<?php echo $title_findings; ?>', '<?php echo $title_journey; ?>', '<?php echo $title_appendix; ?>']
	});
</script>