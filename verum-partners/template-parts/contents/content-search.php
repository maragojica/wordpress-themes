<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verum_Partners
 */

?>

<div class="col-xs-12 col-lg-4 m-b2 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2" >
        <div class="box-post">
        <div class="content-post">
            <h3 class="text-uppercase cl-green cl-orange-h mt-0"><a class="cl-green cl-orange-h" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>" tabindex="0" href="<?php echo esc_url(get_permalink());?>"><?php echo the_title();?></a></h3>                
        <?php 
        if ( has_excerpt() ) {
        $excerpt = get_the_excerpt(); ?>
            <div class="dp-1 cl-off-black"><?php echo wp_kses_post($excerpt); ?></div>
        <?php } ?>
        </div>
        <div class="footer-post">
            <div class="entry-date"><?php the_time('F j, Y'); ?></div>
            <a href="<?php the_permalink(); ?>" class="read-more" tabindex="0" aria-label="Read More" title="Read More">Read More</a>
        </div>
    </div>
    </div>
