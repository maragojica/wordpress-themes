<?php
/**
 * The template for displaying content in the single.php template.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="section-main-single pb-5 section-banner">
        <div class="container pt-lg-5 pt-4 pb-5">
            <div class="row justify-content-center pt-lg-5">
                <div class="col-lg-5 pe-lg-5 pb-lg-0 pb-4">
                    <?php if ( has_post_thumbnail() ) {
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                        $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
                        <img class="img-fluid w-100" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>" width="449" height="492">
                    <?php } ?>
                </div>
                <div class="col-lg-7 ps-lg-5">
                    <h2 class="big-h2-mv cl-slate text-uppercase wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php the_title(); ?></h2>
                    <?php
                        $pronouns = get_field('pronouns');
                        if ( $pronouns ) {
                            ?>
                            <h4 class="cl-slate wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo strip_tags($pronouns); ?></h4>
                            <?php
                        }
                    ?>
                    <?php
                        $position = get_field('position');
                        if ( $position ) {
                            ?>
                            <div class="team-position mb-lg-5 mb-4 dp-1 cl-slate-lt wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><?php echo strip_tags($position); ?></div>
                            <?php
                        }
                    ?>
                    
                    <div class="dp-1 cl-black wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s"><?php the_content();?></div>
                    <div class="ff-manrope fw-300 fs-15">
                        <a href="/about-us" aria-label="Back" class="cl-dark-brown cl-dark-brown-h link-back" tabindex="0">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article><!-- /#post-<?php the_ID(); ?> -->