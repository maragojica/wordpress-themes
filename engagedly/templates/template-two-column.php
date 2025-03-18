<?php
/**
 * Template Name: Default two columns template
 * The Case Studies page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 */

$header_template = get_field( "header_template" );

switch ($header_template) {
	case 'White Menu':
		$header_template = 'inner';
		break;
	default:
		$header_template = '';
		break;
}

get_header( $header_template );

$header = get_field('header');
$banner1_bg_desktop = $header['image_bg_desktop'];
$banner1_bg_mobile = $header['image_bg_mobile'];
$banner1_overlay = $header['overlay'];
$banner1_title = $header['title'];
$banner1_subtitle = $header['subtitle'];
$banner1_content = $header['content'];
$banner1_button_text = $header['button_text'];
$banner1_button_link = $header['button_link'];
$banner1_bar_color = $header['bar_color'];
$banner1_bottom_color = $header['bottom_color'];

$sidebar = get_field('sidebar');

switch ($banner1_overlay) {
	case 1:
		$overlay = 'overlay overlay-bg-light';
		break;
	case 2:
		$overlay = 'overlay overlay-bg-light-1';
		break;
	default:
		$overlay = '';
		break;
}
?>
<?php while (have_posts()) : the_post(); ?>
    <section class="banner-internal-page banner-internal-page-shape-2 bg-orange">
	    <?php if ($overlay): ?>
            <div class="<?php echo $overlay; ?> overlay-page-shape-2"></div>
	    <?php endif; ?>
        <div class="container d-flex align-items-center justify-content-center container-absolute">
            <div class="row">
                <div class="col-lg-7">
	                <?php if ( !empty($banner1_subtitle) ) : ?>
                        <h4 class="title-coniferous cl-white"><?php echo $banner1_subtitle; ?></h4>
	                <?php endif; ?>
	                <?php if ( !empty($banner1_title) ) : ?>
                        <h1 class="title-page pb-4 mb-0 cl-white text-uppercase"><?php echo $banner1_title; ?></h1>
	                <?php else: ?>
                        <h1 class="title-page pb-4 mb-0 cl-white text-uppercase"><?php the_title(); ?></h1>
	                <?php endif; ?>
	                <?php if ( !empty($banner1_content) ) : ?>
                    <div class="copy-text font-adrianna cl-white pb-4">
                        <p><?php echo $banner1_content; ?></p>
                    </div>
	                <?php endif; ?>
	                <?php if ( !empty($banner1_button_text) ) : ?>
                        <a href="<?php echo  $banner1_button_link; ?>" class="btn btn-orange text-uppercase font-adrianna"><?php echo wp_kses_post( $banner1_button_text ); ?></a>
	                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <style>
        <?php if ( !empty($banner1_bg_desktop) ) : ?>
        .banner-internal-page-shape-2::before{
            background: url(<?php echo $banner1_bg_desktop['url']; ?>) no-repeat top center;
        }
        <?php endif; ?>
        <?php if ( !empty($banner1_bg_mobile) ) : ?>
        @media (max-width: 575.98px) {
            .banner-internal-page-shape-2::before{
                background: url(<?php echo $banner1_bg_mobile['url']; ?>) no-repeat top center;
            }
        }
        <?php endif; ?>
    </style>

    <section class="single-content single relative d-flex align-items-center justify-content-center mt-5 pt-5 mb-5 pb-5 mb-mv-0 pb-mv-0">
        <img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse width-30 width-50-sm right-10 bottom-20 bottom-35-sm z-index-0">
        <div class="container">
            <div class="row flex-lg-row-reverse align-items-start justify-content-center">
                <div class="col-lg-6">
                    <!--sidebar area-->
                    <div class="box-become-partner-form z-index-top box-contact-mt mb-5">
	                    <?php echo $sidebar; ?>
                    </div>
                    <!--end sidebar area-->
                </div>
                <div class="col-lg-6">
                    <?php
                    // check if the flexible content field has rows of data
                    if (have_rows('page_content')) :
	                    // loop through the rows of data
	                    while (have_rows('page_content')) : the_row();
		                    get_template_part('template-parts/section', get_row_layout());
	                    endwhile;
                    else :
	                    get_template_part( 'template-parts/content' );

	                    if ( comments_open() || get_comments_number() ) :
		                    comments_template();
	                    endif;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php
endwhile;
?>

<?php
get_footer();