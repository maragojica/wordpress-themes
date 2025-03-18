<?php
/**
 * Displays the content when the findings template is used.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

if( have_rows('section_banner_findings') ): 
	while( have_rows('section_banner_findings') ): the_row();
	    // Get sub field values.
	    $title = get_sub_field('title_banner_findings');
	    $background = get_sub_field('image_banner_findings');
?>
<div class="section section-bg-img section-bg-img-sm d-flex align-items-center" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="headline cl-white"><?php echo $title; ?></h1>
            </div>
        </div>
    </div>
</div>
<style>
    .section-bg-img{
        background: url(<?php echo $background['url']; ?>);
        background-position: center !important;
        background-size: cover !important;
    }
</style>
		    <?php endwhile; ?>
		<?php endif; ?>
<article class="content-info" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="section section-grafic"></div>
<?php
if( have_rows('section_one') ): 
	while( have_rows('section_one') ): the_row();
	    // Get sub field values.
	    $content = get_sub_field('content');
	    if ($content):
?>
    <div class="section bg-white">
        <div class="container container-box">
            <div class="row">
                <div class="col-md-12">
                    <div class="copy-text cl-black ul-purple-ligth">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('blockquote_one') ): 
	while( have_rows('blockquote_one') ): the_row();
	    // Get sub field values.
	    $text = get_sub_field('text');
	    if ($text):
?>
    <div class="section bg-purple-ligth">
        <div class="container">
            <div class="row align-items-center justify-content-center row-blockquote cl-white text-center pt-4 pb-4">
                <div class="col-md-12">
                    <blockquote><?php echo $text; ?></blockquote>
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('section_two') ): 
	while( have_rows('section_two') ): the_row();
	    // Get sub field values.
	    $content = get_sub_field('content');
	    if ($content):
?>
    <div class="section bg-white">
        <div class="container container-box">
            <div class="row">
                <div class="col-md-12">
                    <div class="copy-text cl-black ul-purple-ligth">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('section_three') ): 
	while( have_rows('section_three') ): the_row();
	    // Get sub field values.
	    $title = get_sub_field('title');
	    $image = get_sub_field('image_casting');
	    if ($title):
?>
    <div class="section bg-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title-info pb-4 text-center"><?php echo $title; ?></h4>
                    <img class="img-fluid m-auto d-block" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('section_four') ): 
	while( have_rows('section_four') ): the_row();
	    // Get sub field values.
	    $content = get_sub_field('content');
	    if ($content):
?>
    <div class="section bg-white">
        <div class="container container-box">
            <?php echo $content; ?>
        </div>
    </div>
	<?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('section_five') ): 
	while( have_rows('section_five') ): the_row();
	    // Get sub field values.
	    $content = get_sub_field('content');
	    if ($content):
?>
    <div class="section bg-white">
        <div class="container container-box pt-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="copy-text cl-black ul-purple-ligth">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('section_six') ): 
	while( have_rows('section_six') ): the_row();
	    // Get sub field values.
	    $title = get_sub_field('title');
	    $image = get_sub_field('image_performance');
	    if ($title):
?>
    <div class="section bg-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title-info pb-4 text-center"><?php echo $title; ?></h4>
                    <img class="img-fluid m-auto d-block" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('section_seven') ): 
	while( have_rows('section_seven') ): the_row();
	    // Get sub field values.
	    $content = get_sub_field('content');
	    if ($content):
?>
    <div class="section bg-white">
        <div class="container container-box">
            <?php echo $content; ?>
        </div>
    </div>
	<?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('blockquote_two') ): 
	while( have_rows('blockquote_two') ): the_row();
	    // Get sub field values.
	    $text = get_sub_field('text');
	    if ($text):
?>
    <div class="section bg-purple-ligth">
        <div class="container">
            <div class="row align-items-center justify-content-center row-blockquote cl-white text-center pt-4 pb-4">
                <div class="col-md-12">
                    <blockquote><?php echo $text; ?></blockquote>
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('section_eight') ): 
	while( have_rows('section_eight') ): the_row();
	    // Get sub field values.
	    $content = get_sub_field('content');
	    if ($content):
?>
    <div class="section bg-white">
        <div class="container container-box">
            <div class="row">
                <div class="col-md-12">
                    <div class="copy-text cl-black ul-purple-ligth">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('section_nine') ): 
	while( have_rows('section_nine') ): the_row();
	    // Get sub field values.
	    $title = get_sub_field('title');
	    $image = get_sub_field('image');
	    if ($title):
?>
    <div class="section bg-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="title-info pb-4 text-center"><?php echo $title; ?></h4>
                    <img class="img-fluid m-auto d-block" src="<?php echo $image['url']; ?>">
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('section_ten') ): 
	while( have_rows('section_ten') ): the_row();
	    // Get sub field values.
	    $content = get_sub_field('content');
	    if ($content):
?>
    <div class="section bg-white">
        <div class="container container-box">
            <div class="row">
                <div class="col-md-12">
                    <div class="copy-text cl-black ul-purple-ligth">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('blockquote_three') ): 
	while( have_rows('blockquote_three') ): the_row();
	    // Get sub field values.
	    $text = get_sub_field('text');
	    if ($text):
?>
    <div class="section bg-purple-ligth">
        <div class="container">
            <div class="row align-items-center justify-content-center row-blockquote cl-white text-center pt-4 pb-4">
                <div class="col-md-12">
                    <blockquote><?php echo $text; ?></blockquote>
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('section_eleven') ): 
	while( have_rows('section_eleven') ): the_row();
	    // Get sub field values.
	    echo get_sub_field('content');
	endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('blockquote_four') ): 
	while( have_rows('blockquote_four') ): the_row();
	    // Get sub field values.
	    $text = get_sub_field('text');
	    if ($text):
?>
    <div class="section bg-purple-ligth">
        <div class="container">
            <div class="row align-items-center justify-content-center row-blockquote cl-white text-center pt-4 pb-4">
                <div class="col-md-12">
                    <blockquote><?php echo $text; ?></blockquote>
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('section_twelve') ): 
	while( have_rows('section_twelve') ): the_row();
	    // Get sub field values.
	    echo get_sub_field('content');
	endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('blockquote_five') ): 
	while( have_rows('blockquote_five') ): the_row();
	    // Get sub field values.
	    $text = get_sub_field('text');
	    if ($text):
?>
    <div class="section bg-purple-ligth">
        <div class="container">
            <div class="row align-items-center justify-content-center row-blockquote cl-white text-center pt-4 pb-4">
                <div class="col-md-12">
                    <blockquote><?php echo $text; ?></blockquote>
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('section_thirteen') ): 
	while( have_rows('section_thirteen') ): the_row();
	    // Get sub field values.
	    echo get_sub_field('content');
	endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('blockquote_six') ): 
	while( have_rows('blockquote_six') ): the_row();
	    // Get sub field values.
	    $text = get_sub_field('text');
	    if ($text):
?>
    <div class="section bg-purple-ligth">
        <div class="container">
            <div class="row align-items-center justify-content-center row-blockquote cl-white text-center pt-4 pb-4">
                <div class="col-md-12">
                    <blockquote><?php echo $text; ?></blockquote>
                </div>
            </div>
        </div>
    </div>
	<?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php
if( have_rows('section_fourteen') ): 
	while( have_rows('section_fourteen') ): the_row();
	    // Get sub field values.
	    echo get_sub_field('content');
	endwhile; ?>
<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
<div class="bg-white p-5 w-100 text-center w-100">
    <div class="section-pagination d-flex align-items-center justify-content-between">
        <div class="back-page">
            <a href="<?php echo esc_url( home_url( '/introduction' ) ); ?>"><i class="fas fa-angle-left cl-purple-ligth"></i> <span class="cl-purple-ligth">BACK</span></a>
        </div>
        <div class="home-page">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home cl-purple-ligth"></i></a>
        </div>
        <div class="next-page">
            <a href="<?php echo esc_url( home_url( '/journey' ) ); ?>"><span class="cl-purple-ligth">NEXT</span> <i class="fas fa-angle-right cl-purple-ligth"></i></a>
        </div>
    </div>
</div>


