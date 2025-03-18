<?php
/**
 * The template for displaying content in the page-press.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if( have_rows('list_clients') ){ ?>
        <section class="section-clients pt-5 pb-5 hide-lg">
            <div class="container pt-4">
                <div class="row align-items-center">
                    <?php while ( have_rows('list_clients') ) : the_row();
                        $img = get_sub_field('logo_client');
                        $cta = get_sub_field('link_client');?>
                        <div class="col-6 col-sm-4 col-lg ps-md-4 pe-md-4 pb-3">
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
    <section class="section-press pt-5 pb-5">
        <div class="container ps-lg-5 pe-lg-5">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <?php $linktitle = get_field('title_client');
                    if($linktitle) {   ?>
                         <div class="title-link pb-4 text-center"> <?php echo $linktitle;?></div>
                    <?php } ?>
                    <?php $text_client = get_field('text_client');
                    if($text_client): ?>
                    <div class="dp-1 cl-dark pt-4"><?php echo $text_client; ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-lg-6 pb-4 ps-lg-5">
                    <?php $image_press = get_field('image_press'); ?>
                    <div class="w-100 position-relative box-link-post">
                        <?php if (!empty($image_press)) { ?>
                            <img class="img-fluid d-block m-auto fit-cover-center w-100 h-100 rounded-0" width="650" height="640" src="<?php echo esc_url($image_press['url']); ?>" alt="<?php echo esc_attr($image_press['alt']); ?>">
                        <?php } ?>
                        <div class="overlay overlay-title d-flex justify-content-start align-items-start flex-column">
                            <?php $subtitle_press = get_field('subtitle_press');  ?>
                            <?php if($subtitle_press): ?>
                                <div class="meta">
                                    <span><?php echo $subtitle_press;?></span>
                                </div>
                            <?php endif;?>
                            <?php $title_press = get_field('title_press');
                            if($title_press): ?><div class="featured-title"><?php echo $title_press;?></div><?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if( have_rows('list_press') ): ?>
                <div class="col-lg-6 pb-4 ps-lg-5 ">
                    <?php while ( have_rows('list_press') ) : the_row();
                        $number_list_press = get_sub_field('number_list_press');
                        $cta_list_press = get_sub_field('cta_list_press');
                        $text_list_press = get_sub_field('text_list_press'); ?>
                        <div class="box-press d-flex justify-content-between align-items-center position-relative pt-2 pb-4">
                            <?php if($number_list_press): ?><span class="number-press"><?php echo $number_list_press;?></span><?php endif; ?>
                           <?php if($cta_list_press) {
                            $link_url = $cta_list_press['url'];
                            $link_title = $cta_list_press['title'];
                            $link_target = $cta_list_press['target'] ? $cta_list_press['target'] : '_self';?>
                            <a class="link-press" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?> </a>
                            <?php } ?>
                            <?php if($text_list_press): ?><div class="dp-1 cl-dark"><?php echo $text_list_press;?></div><?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</article>
<!-- #post-## -->