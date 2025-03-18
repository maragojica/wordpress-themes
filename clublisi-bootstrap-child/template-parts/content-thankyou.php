<?php
/**
 * The template for displaying content in the page-thankyou.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="section-press pt-5 pb-5">
        <div class="container ps-lg-5 pe-lg-5">
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
                        <?php $linktitle = get_field('title_page');
                        if($linktitle) {   ?>
                            <h2 class="cl-dark text-center"> <?php echo $linktitle;?></h2>
                        <?php } ?>
                        <?php $text_client = get_field('text_page');
                        if($text_client): ?>
                            <div class="dp-1 cl-dark pt-4 pb-5"><?php echo $text_client; ?></div>
                        <?php endif; ?>
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
        <?php  $cta_1_thankyou = get_field('cta_1_thankyou'); $cta_2_thankyou = get_field('cta_2_thankyou'); ?>
        <div class="section-bottom-praise pt-5 pb-5">
            <div class="container pt-md-5">
                <div class="row row-bottom-praise">
                    <div class="col-6">
                        <?php if($cta_1_thankyou) {
                            $link_url = $cta_1_thankyou['url'];
                            $link_title = $cta_1_thankyou['title'];
                            $link_target = $cta_1_thankyou['target'] ? $cta_1_thankyou['target'] : '_self';?>
                            <a class="link-post d-flex justify-content-center flex-column align-items-center text-center" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?>
                                <div class="line-cta"></div>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="col-6">
                        <?php if($cta_2_thankyou) {
                            $link_url = $cta_2_thankyou['url'];
                            $link_title = $cta_2_thankyou['title'];
                            $link_target = $cta_2_thankyou['target'] ? $cta_2_thankyou['target'] : '_self';?>
                            <a class="link-post d-flex justify-content-center flex-column align-items-center text-center" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?>
                                <div class="line-cta"></div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<!-- #post-## -->