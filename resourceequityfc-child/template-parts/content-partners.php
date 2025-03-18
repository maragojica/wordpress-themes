<?php
/**
 * Displays the content when the partners template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<?php $image = get_field('image_main');
$addoverlay = get_field('add_overlay_main');
$title = get_field('title_main');
if( !empty($image) ): ?>
    <div class="container h-100 container-title-inner position-relative hide-md">
        <div class="d-flex h-100 equal justify-content-center align-items-end align-items-md-start">
            <?php if( $title ): ?>
                <div class="box-head bg-yellow p-3 pr-4 pl-4"><h1 class="headline-banner cl-dark text-center mb-0"><?php echo $title;?></h1></div>
            <?php endif; ?>
        </div>
    </div>
    <div class="section-banner-home secion-banner-inner section-banner">
        <div class="container h-100">
            <div class="position-relative h-100">
                <img class="banner-main-img w-100 h-100 fit-cover" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <div class="overlay <?php if( $addoverlay ): ?>overlay-bg-1 <?php endif; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="container h-100 container-title-inner position-relative show-md">
        <div class="d-flex h-100 equal justify-content-center align-items-end align-items-md-start">
            <?php if( $title ): ?>
                <div class="box-head bg-yellow p-3"><h1 class="headline-banner cl-dark text-center mb-0"><?php echo $title;?></h1></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php $text = get_field('text_partners_page'); ?>
<?php if( $text ): ?>
    <section class="section-inner-content section-p60">
        <div class="container">
            <div class="row row-inner m-auto justify-content-center">
                <div class="col-md-12">
                    <div class="text-lyon cl-dark text-center">
                        <?php echo $text ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
$cat_args = array(
    'orderby'       => 'term_id',
    'order'         => 'ASC',
    'hide_empty'    => true,
);

$terms = get_terms('partners_cat', $cat_args);
$count = count($terms);
if($count > 0){ ?>
    <div class="section-partners">
        <div class="container">
            <?php foreach($terms as $taxonomy) {
            $term_slug = $taxonomy->slug;
            $term_name= $taxonomy->name;
            $term_id = $taxonomy->term_taxonomy_id; ?>
                <div class="row equal row-partners m-auto">
                    <?php if( $term_name ): ?>
                        <div class="col-md-12">
                            <h2 class="title-section text-uppercase cl-light-blue text-center m-auto"><?php echo $term_name;?></h2>
                        </div>
                    <?php endif; ?>
                    <?php $tax_post_args = array(
                    'post_type' => 'partner',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'partners_cat',
                            'field' => 'slug',
                            'terms' => $term_slug
                        )
                    )
                );
                $tax_post_qry = new WP_Query($tax_post_args);
                if($tax_post_qry->have_posts()) :?>
                    <?php while($tax_post_qry->have_posts()) : $tax_post_qry->the_post();
                        $title = get_field('title_box_partnercpt');

                        $boxlogo = get_field('logo_color_partnercpt');
                        $addlogomv = get_field('add_mobile_box_logo');
                        $boxlogomv = get_field('box_partner_logo_mobile');

                        $bgcolor = get_field('bg_color_partnercpt');
                        $bgcolormv = get_field('bg_color_partnercpt_mobile');

                        $textcolors = get_field( 'text_color' );
                        $textcolorsmv = get_field( 'text_color_mobile' );

                        $twitt = get_field('twitter_partnercpt');
                        $linkedin = get_field('linkedinr_partnercpt');
                        $web = get_field('website_url_partnercpt');
                       ?>
                        <div class="col-6 col-md-3 col-partners <?php if($textcolors): echo "col-".$textcolors['value']; endif;?> <?php if($textcolorsmv): echo "mvcol-".$textcolorsmv['value']; endif;?>" id="post-<?php the_ID(); ?>">
                           <div class="info-partner-col w-100 h-100 d-flex flex-column justify-content-between align-items-center">
                               <div class="box-logo-partner d-flex align-items-center">
                                   <img class="img-logo-partner <?php if($addlogomv): echo 'hide-md'; endif; ?>" src="<?php echo esc_url($boxlogo['url']); ?>" alt="<?php echo esc_attr($boxlogo['alt']); ?>" />
                                   <?php if($addlogomv): ?>
                                        <img class="img-logo-partner show-md" src="<?php echo esc_url($boxlogomv['url']); ?>" alt="<?php echo esc_attr($boxlogomv['alt']); ?>" />
                                    <?php endif; ?>
                               </div>
                               <p class="title-partner-box text-center"><?php echo $title;?></p>
                            <span class="social-links-partners">
                              <?php  if($twitt) {
                                  $link_url = $twitt['url'];
                                  $link_target = $twitt['target'] ? $twitt['target'] : '_self'; ?>
                                  <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><i class="fab fa-twitter"></i></a>
                              <?php } ?>
                                <?php  if($linkedin) {
                                    $link_url = $linkedin['url'];
                                    $link_target = $linkedin['target'] ? $linkedin['target'] : '_self'; ?>
                                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><i class="fab fa-linkedin-in"></i></a>
                                <?php } ?>
                                <?php  if($web) { ?>
                                    <a href="<?php echo $web; ?>" target="_blank"><i class="fas fa-mouse-pointer"></i></a>
                                <?php } ?>
                            </span>
                           </div>
                        </div>
                        <?php if( $bgcolor ):  ?>
                            <style type="text/css">
                                #post-<?php the_ID(); ?>.col-partners {
                                    background-color: <?php the_field('bg_color_partnercpt'); ?> !important;
                                }
                                @media(max-width: 767.98px) {
                                    #post-<?php the_ID(); ?>.col-partners {
                                        background-color: <?php the_field('bg_color_partnercpt_mobile'); ?> !important;
                                    }
                                }
                            </style>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
            <?php  } ?>
        </div>
    </div>
<?php  } ?>

<div class="section-inner-content section-contact-us section-p60 bg-yellow">
    <div class="container">
        <div class="row equal align-items-center bg-white bg-green-h row-contact">
            <div class="col-md-8">
                <h2 class="title-section text-uppercase cl-dark">Contact Us</h2>
                <div class="copy-text cl-dark pb-4 pb-md-0">
                   Are you a funder interested in collaborating? We welcome your feedback, insights, and questions.
                </div>
            </div>
            <div class="col-md">
                <a href="/contact" class="d-flex justify-content-md-center justify-content-end">
                    <img class="d-inline-block arrow-contact" src="<?php echo get_stylesheet_directory_uri(); ?>/assest/arrow-black.png">
                </a>
            </div>
        </div>
    </div>
</div>
