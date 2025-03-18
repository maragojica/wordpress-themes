<?php
/**
 * The template for displaying content in the page-home.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="section-featured-home pt-md-5 pb-md-5">
        <div class="container ps-lg-5 pe-lg-5">
            <div class="row">
                <?php $cat_id = 3; $arg = array(
                    'post_type' => array('post'),
                    'posts_per_page' => 1,
                    'category' => $cat_id,
                    'orderby' => 'post_date',
                    'order' => 'DESC'
                );
                $wp_allpost = new WP_Query($arg); ?>
                <?php if($wp_allpost->have_posts()) {
                    while ($wp_allpost->have_posts()): $wp_allpost->the_post(); ?>
                    <div class="col-md-8 px-md-5 pt-lg-5 pt-4 pb-4">
                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                        $thumb_id = get_post_thumbnail_id();
                        $alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
                        $id = get_the_ID();
                        $featured_text = get_field('featured_text');?>
                        <div class="w-100 position-relative box-link-post">
                            <?php if (has_post_thumbnail()) { ?>
                                <img class="img-fluid d-block m-auto fit-cover-center w-100 h-100 rounded-0" width="650" height="640" src="<?php echo esc_url($featured_img_url); ?>" alt="<?php echo esc_attr($alt); ?>">
                            <?php } ?>
                            <div class="overlay overlay-title d-flex justify-content-start align-items-start flex-column">
                                <?php $post_categories = get_post_primary_category($id, 'category');
                                $primary_category = $post_categories['primary_category'];
                                $nameprimary = $primary_category->name;
                                $slugprimary = $primary_category->slug; ?>
                                <?php if($nameprimary): ?>
                                    <div class="meta">
                                        <span>featured // </span><a href="/category/<?php echo $slugprimary;?>"><?php echo $nameprimary; ?></a>
                                    </div>
                                <?php endif;?>
                                <?php if($featured_text): ?><div class="featured-title"><?php echo $featured_text;?></div><?php endif; ?>
                            </div>
                        </div>
                       <?php if ( has_excerpt( $id ) ) { ?>
                           <div class="dp-1 cl-dark pt-4"><?php the_excerpt();?></div>
                       <?php } ?>
                        <a class="link-post d-flex justify-content-end" href="<?php the_permalink(); ?>" aria-label="<?php echo the_title(); ?>">READ IT <div class="se-icon ps-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 411.79 271.53"><path d="M299.95 9.95c-5.42-6.39-15.02-7.18-21.44-1.74-6.4 5.44-7.19 15.04-1.74 21.44l76.61 90.17H22.22c-8.41 0-15.22 6.81-15.22 15.22s6.81 15.22 15.22 15.22h331.15l-76.61 90.19c-5.45 6.4-4.67 16 1.74 21.44 2.87 2.44 6.36 3.63 9.84 3.63 4.32 0 8.6-1.83 11.61-5.36l106.3-125.11-106.3-125.1z"></path></svg></div></a>
                    </div>
                    <?php endwhile; ?>
                <?php wp_reset_postdata(); } ?>
                <div class="col-md-4 px-md-0 pt-lg-5 pt-4 pb-4 col-r-home">
                   <div class="box-about px-md-5 pt-4 pt-md-0">
                       <?php $title_about = get_field('title_about');
                       $text_about = get_field('text_about');
                       $cta_about = get_field('cta_about'); ?>
                       <?php if($title_about): ?>
                           <h2 class="headline"><?php echo $title_about; ?></h2>
                       <?php endif; ?>
                       <?php if ( $text_about ):  ?>
                           <div class="dp-1 cl-dark pt-lg-4 pt-2 pb-lg-5 pb-4"><?php echo $text_about;?></div>
                       <?php endif; ?>
                       <?php if($cta_about) {
                           $link_url = $cta_about['url'];
                           $link_title = $cta_about['title'];
                           $link_target = $cta_about['target'] ? $cta_about['target'] : '_self';?>
                           <a class="link-post d-flex justify-content-end" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?> <div class="se-icon ps-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 411.79 271.53"><path d="M299.95 9.95c-5.42-6.39-15.02-7.18-21.44-1.74-6.4 5.44-7.19 15.04-1.74 21.44l76.61 90.17H22.22c-8.41 0-15.22 6.81-15.22 15.22s6.81 15.22 15.22 15.22h331.15l-76.61 90.19c-5.45 6.4-4.67 16 1.74 21.44 2.87 2.44 6.36 3.63 9.84 3.63 4.32 0 8.6-1.83 11.61-5.36l106.3-125.11-106.3-125.1z"></path></svg></div></a>
                       <?php } ?>
                   </div>
                    <?php $title_social = get_field('title_social');
                    $cta_social = get_field('cta_social');
                    $widget_social = get_field('widget_social');
                    if($widget_social): ?>
                        <div class="widget-social px-md-5">
                            <?php echo $widget_social; ?>
                            <div class="d-flex align-items-center justify-content-between pt-md-5 pt-3">
                                <?php if($title_social): ?>
                                <div class="title-social"><?php echo $title_social;?></div>
                               <?php endif; ?>
                                <?php if($cta_social) {
                                    $link_url = $cta_social['url'];
                                    $link_title = $cta_social['title'];
                                    $link_target = $cta_social['target'] ? $cta_social['target'] : '_self';?>
                                    <a class="link-post d-flex justify-content-end" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?> <div class="se-icon ps-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 411.79 271.53"><path d="M299.95 9.95c-5.42-6.39-15.02-7.18-21.44-1.74-6.4 5.44-7.19 15.04-1.74 21.44l76.61 90.17H22.22c-8.41 0-15.22 6.81-15.22 15.22s6.81 15.22 15.22 15.22h331.15l-76.61 90.19c-5.45 6.4-4.67 16 1.74 21.44 2.87 2.44 6.36 3.63 9.84 3.63 4.32 0 8.6-1.83 11.61-5.36l106.3-125.11-106.3-125.1z"></path></svg></div></a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-action-menu pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pt-4">
                    <?php wp_nav_menu(
                        array(
                            'theme_location' => 'home-action-menu',
                            'container'      => '',
                            'menu_class'     => 'navbar-nav',
                            'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'         => new WP_Bootstrap_Navwalker(),
                        )
                    ); ?>
                </div>
            </div>
        </div>
    </section>
   <?php
   $linktitle = get_field('cta_clients');
   if( have_rows('list_clients') ){ ?>
    <section class="section-clients pt-5 pb-5">
        <div class="container pt-4">
            <?php if($linktitle) {
            $link_url = $linktitle['url'];
            $link_title = $linktitle['title'];
            $link_target = $linktitle['target'] ? $linktitle['target'] : '_self'; ?>
                <div class="row">
                    <div class="col-md-12 text-center pb-4">
                        <a class="title-link" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title;?></a>
                    </div>
                </div>
            <?php } ?>
            <div class="row align-items-center">
           <?php while ( have_rows('list_clients') ) : the_row();
               $img = get_sub_field('logo_client');
               $cta = get_sub_field('link_client');?>
               <div class="col-6 col-sm-4 col-lg-2 ps-4 pe-4 pb-3">
                   <?php if($cta) {
                   $link_url = $cta['url'];
                   $link_title = $cta['title'];
                   $link_target = $cta['target'] ? $cta['target'] : '_self';?>
                   <a class="d-flex align-items-center justify-content-center" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php } ?>
                       <?php if( !empty($img) ): ?>
                           <img class="logo-img img-fluid m-auto" width="164" height="49" src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
                       <?php endif; ?>
                       <?php if($cta) { ?>
                   </a>
               <?php } ?>
               </div>
           <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php } ?>
    <section class="section-newletter bg-orange p-3">
        <div class="w-100 h-100 box-inside">
            <div class="container pt-md-5 pb-md-5 pt-4 pb-4">
                <div class="row justify-content-center">
                    <div class="col-md-7 text-center">
                        <?php  $title_newsletter = get_field('title_newsletter');
                        $subtitle_newsletter = get_field('subtitle_newsletter');
                        $text_newsletter = get_field('text_newsletter');
                        if($title_newsletter): ?>
                            <div class="title-newletter"><?php echo $title_newsletter;?></div>
                        <?php endif; ?>
                        <?php if($subtitle_newsletter): ?>
                            <div class="subtitle-newletter pt-4"><?php echo $subtitle_newsletter;?></div>
                        <?php endif; ?>
                        <?php if($text_newsletter): ?>
                            <div class="dp-1 cl-white pt-4 pb-3"><?php echo $text_newsletter;?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php $code_newsletter = get_field('code_newsletter');
                        if($code_newsletter): ?>
                        <div class="box-mail-mailchimp">
                            <?php echo $code_newsletter; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<!-- #post-## -->