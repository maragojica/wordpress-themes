<?php
/**
 * The template for displaying content in the page-contact.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="section-contact section-inside bg-navy pb-md-5">
            <div class="container pt-md-5 pb-md-5 pt-4 pb-0">
                <div class="row">
                    <div class="col-md-12">
                         <h2 class="big-h2-mv cl-light-green-1 mb-5"><?php the_title(); ?></h2>
                        <div class="dp-1 cl-white mb-4"><?php the_content(); ?></div>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/path.png" alt="Separator Beige" class="line-path">
                    </div>
                </div>
                <div class="row justify-content-center pt-5 pb-5">
                    <div class="col-lg-7">
                        <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
                    </div>
                </div>
            </div>
    </section>
</article>
<!-- #post-## -->