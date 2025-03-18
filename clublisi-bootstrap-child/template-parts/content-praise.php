<?php
/**
 * The template for displaying content in the page-praise.php template.
 *
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php $title_praise = get_field('title_praise'); ?>
    <div class="section-top-praise pt-5">
        <div class="container pt-md-4">
            <div class="row">
                <div class="col-12">
                    <?php if($title_praise) { ?>
                        <div class="link-post text-center"><?php echo $title_praise;?></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php if( have_rows('list_praise') ): ?>
        <section class="section-praise pb-5">
            <?php while ( have_rows('list_praise') ) : the_row();
                $title = get_sub_field('title_list_praise');
                $text = get_sub_field('text_list_praise');
                $image = get_sub_field('image_list_praise');
                $image_position = get_sub_field('image_position');
                $name_1 = get_sub_field('name_1');
                $name_2 = get_sub_field('name_2');
                $container_type = get_sub_field('container_type'); ?>
               <div class="box-praise pt-5 pb-5">
                   <div class="container ps-md-5 pe-md-5">
                       <div class="row align-items-center<?php if( $image_position['value'] == 'right' ): ?> flex-row-reverse<?php endif; ?>">
                           <div class="col-md-6 px-md-5 pb-md-0 pb-5">
                               <?php if ( !empty($image)) : ?>
                                   <img class="img-fluid fit-cover-center-top w-100 h-100" width="1594" height="560" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                   <div class="linkedin box-contact-team d-flex justify-content-between align-items-center w-100">
                                       <span class="title-contact-team"><?php echo $name_1;?></span>
                                       <span class="link-contact-team" ><?php echo $name_2;?> </span>
                                   </div>
                               <?php endif; ?>
                           </div>
                           <div class="col-md-6">
                               <?php if($title): ?>
                                   <h2 class="cl-dark mb-5 text-center"><?php echo $title;?></h2>
                               <?php endif; ?>
                               <?php if($text): ?>
                                   <div class="dp-1 cl-dark w-75 m-auto"><?php echo $text;?></div>
                               <?php endif; ?>
                           </div>
                       </div>
                   </div>
               </div>
            <?php endwhile; ?>

            <?php  $cta_1_praise = get_field('cta_1_praise'); $cta_2_praise = get_field('cta_2_praise'); ?>
            <div class="section-bottom-praise pt-5 pb-5">
                <div class="container pt-md-5">
                    <div class="row row-bottom-praise">
                        <div class="col-6">
                            <?php if($cta_1_praise) {
                                $link_url = $cta_1_praise['url'];
                                $link_title = $cta_1_praise['title'];
                                $link_target = $cta_1_praise['target'] ? $cta_1_praise['target'] : '_self';?>
                                <a class="link-post d-flex justify-content-center flex-column align-items-center text-center" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?>
                                    <div class="line-cta"></div>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="col-6">
                            <?php if($cta_2_praise) {
                                $link_url = $cta_2_praise['url'];
                                $link_title = $cta_2_praise['title'];
                                $link_target = $cta_2_praise['target'] ? $cta_2_praise['target'] : '_self';?>
                                <a class="link-post d-flex justify-content-center flex-column align-items-center text-center" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?>
                                    <div class="line-cta"></div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</article>
<!-- #post-## -->