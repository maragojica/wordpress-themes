<?php
/**
 * The template for displaying content in the page-home.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <section class="section-main bg-white d-flex align-items-start">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-12 col-xl-10 text-center pt-3">
                  <?php $title_banner_home = get_field('title'); $title_banner_home_mv = get_field('title_mv');
                  if($title_banner_home && $title_banner_home_mv): ?>
                      <h1 class="cl-blue pt-md-5 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s"><span class="hide-lg"><?php echo $title_banner_home;?></span><span class="show-lg"><?php echo $title_banner_home_mv;?></span></h1>
                  <?php endif; ?>
              </div>
          </div>
      </div>
  </section>
  <section class="section-waitlist pt-sm-5 pb-sm-5">
      <div class="container pt-5 pb-5">
          <div class="row justify-content-center">
              <div class="col-md-12 text-center">
                  <?php $image = get_field('image');
                  if(!empty($image)): ?>
                      <img class="img-fluid image-waitlist wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" src="<?php echo esc_url($image['url']); ?>">
                  <?php endif; ?>
                  <?php $cta = get_field('cta');  if($cta) {
                      $link_url = $cta['url'];
                      $link_title = $cta['title'];
                      $link_target = $cta['target'] ? $cta['target'] : '_self';?>
                      <div class="mt-5 wow fadeInUp">
                          <a class="cta-btn text-center" uk-toggle="target: #modal-form" data-wow-duration="0.8s" data-wow-delay="0.3s" aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                              <?php echo $link_title; ?>
                          </a>
                      </div>
                      <div id="modal-form" class="popup-form-modal uk-flex-top" uk-modal>
                          <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                              <button class="uk-modal-close-default" type="button" uk-close></button>
                              <?php echo do_shortcode('[contact-form-7 id="69" title="Contact Form Popup"]');?>
                          </div>
                      </div>
                  <?php } ?>
              </div>
          </div>
          <div class="row justify-content-center pt-sm-5 pb-sm-5">
              <div class="col-md-10 text-center">
              <?php $headline_list = get_field('headline_list');
              if($headline_list): ?>
                  <h2 class="cl-gray mb-sm-4 mt-5 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><?php echo $headline_list;?></h2>
              <?php endif; ?>
                  <?php if( have_rows('list') ): ?>
                      <div class="waitlist-carousel owl-carousel mt-5 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s">
                          <?php while( have_rows('list') ): the_row();

                              // Get sub field values.
                              $title = get_sub_field('title_list');
                              $text = get_sub_field('text_list');
                              $icon = get_sub_field('icon_list');
                              ?>
                              <div class="item animated fadeIn">
                                  <div class="box-waitlist w-100 h-100 text-center">
                                      <?php if($title): ?>
                                          <h3 class="cl-blue mb-3 title-waitlist"><?php echo $title;?></h3>
                                      <?php endif; ?>
                                      <?php if(!empty($icon)): ?>
                                          <img class="fluid-img icon-waitlist" src="<?php echo esc_url($icon['url']); ?>">
                                      <?php endif; ?>
                                      <?php if($text): ?>
                                          <div class="dp-1 cl-blue mt-3"><?php echo $text;?></div>
                                      <?php endif;?>
                                  </div>
                              </div>
                          <?php endwhile; ?>
                      </div>
                  <?php endif; ?>
              </div>
          </div>
      </div>
  </section>
</article>
<!-- #post-## -->