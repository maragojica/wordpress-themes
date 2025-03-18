<section class="module module-resources-list bg-white wow fadeIn" data-wow-duration="0.2s" data-wow-delay="0.2s">
    <?php  $title = get_sub_field('title_section');
    $text = get_sub_field('text'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 pr-0 pl-0">
                <?php if( $title ): ?>
                    <h2 class="headline-section cl-stormy-sea text-center pb-0"><?php echo $title;?></h2>
                    <img class="squiggle-blue m-auto-25" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/border-squiggle-blue.png" border="0">
                <?php endif; ?>
                    <?php if( $text ): ?>
                        <div class="copy-description cl-stormy-sea">
                            <?php echo $text; ?>
                        </div>
                    <?php endif; ?>
            </div>
        </div>
</section>
