<?php
/**
 * The template for displaying content in the page-digital-concierge.php template.
 *
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php $image_digital = get_field('image_digital');
$title_digital = get_field('title_digital');
$subtitle_digital = get_field('subtitle_digital');
$text_digital = get_field('text_digital');

if ( !empty($image_digital)) : ?>
   <section class="section-banner">
       <div class="section-digital position-relative m-md-5 m-3">
           <?php if ( !empty($image_digital)) : ?>
               <img class="img-fluid fit-cover-center-top w-100 h-100" width="1618" height="559 src="<?php echo esc_url($image_digital['url']); ?>" alt="<?php echo esc_attr($image_digital['alt']); ?>" />
           <?php endif; ?>
           <div class="overlay overlay-digital d-flex align-items-center justify-content-center">
               <div class="container">
                   <div class="row justify-content-center">
                       <div class="col-md-6">
                           <?php if($title_digital): ?>
                               <div class="headline text-center cl-white pb-1"><i><?php echo $title_digital;?></i></div>
                           <?php endif; ?>
                           <?php if($subtitle_digital): ?>
                               <div class="title-banner text-center cl-white pb-4"><?php echo $subtitle_digital;?></div>
                           <?php endif; ?>
                           <?php if($text_digital): ?>
                               <div class="dp-1 text-center cl-white"><?php echo $text_digital;?></div>
                           <?php endif; ?>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
<?php endif; ?>
<?php if( have_rows('list_digital') ): ?>
    <section class="section-list-digital pt-5 pb-5">
        <div class="container">
            <div class="row equal">
                <?php while ( have_rows('list_digital') ) : the_row();
                    $title = get_sub_field('title_list_digital');
                    $text = get_sub_field('text_list_digital'); ?>
                    <div class="col-lg-3 pb-4 col-digital">
                      <div class="w-100 h-100 box-digital ps-md-3 pe-md-3 pt-lg-0 pt-4">
                          <?php if($title): ?>
                              <div class="title-digital pb-3 cl-dark"><?php echo $title;?></div>
                          <?php endif; ?>
                          <?php if($text): ?>
                              <div class="text-digital cl-dark"><?php echo $text;?></div>
                          <?php endif; ?>
                      </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php $title_services = get_field('title_services');
if( have_rows('list_services') ): ?>
    <section class="section-services pt-5 pb-5">
        <div class="container position-relative pt-md-5">
            <?php if($title_services): ?>
                <div class="title-services d-flex align-items-center"><?php echo $title_services;?></div>
            <?php endif; ?>
            <div class="row justify-content-center">
            <?php while ( have_rows('list_services') ) : the_row();
                $text = get_sub_field('text_services'); ?>
                <div class="col-md-12 pt-5 pb-5 pb-md-2 col-services pe-md-0">
                    <?php if($text): ?>
                        <div class="dp-1 cl-dark"><?php echo $text;?></div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php
$title_work = get_field('title_work');
$subtitle_work = get_field('subtitle_work');
if( have_rows('list_work') ): ?>
    <section class="section-work pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pb-5">
                    <?php if($title_work): ?>
                        <div class="link-post text-center"><?php echo $title_work;?></div>
                    <?php endif; ?>
                    <?php if($subtitle_work): ?>
                        <h2 class="cl-dark text-center"><?php echo $subtitle_work;?></h2>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row equal">
            <?php while ( have_rows('list_work') ) : the_row();
                $title = get_sub_field('title_list_work');
                $subtitle = get_sub_field('subtitle_list_work');
                $image = get_sub_field('image_list_work');
                $link = get_sub_field('link_list_work'); ?>
                <div class="col-md-4 pb-md-0 pb-4 ps-md-4 pe-md-4">
                    <div class="w-100 h-100">
                        <div class="box-img-work position-relative">
                            <?php if($subtitle): ?>
                                <div class="subtitle-work"><?php echo $subtitle;?></div>
                            <?php endif; ?>
                            <?php if ( !empty($image)) : ?>
                              <?php  if($link) {
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';?>
                                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>">
                                        <img class="img-fluid fit-cover-center-top w-100 h-100" width="319" height="419" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    </a>
                                <?php } ?>
                            <?php endif; ?>
                        </div>
                        <?php if($title): ?>
                        <?php  if($link) {
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';?>
                            <div class="title-work pt-3 cl-dark"><a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $title;?> </a> </div>
                            <?php } ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
</article>
<!-- #post-## -->