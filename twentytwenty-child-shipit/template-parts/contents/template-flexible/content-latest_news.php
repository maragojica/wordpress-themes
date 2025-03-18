<section class="module module-latest-news bg-white <?php if(!get_sub_field('add_padding_news')): ?>pt-0<?php endif;?> wow fadeIn" data-wow-duration="0.2s" data-wow-delay="0.2s">
    <?php  $title = get_sub_field('title_latest_news');
    $text = get_sub_field('text_latest_news'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 pr-md-0 pl-md-0">
                    <?php if( $title ): ?>
                        <h6 class="title-list cl-stormy-sea pb-4"><?php echo $title;?></h6>
                    <?php endif; ?>
                    <?php if( $text ): ?>
                        <div class="copy-description cl-stormy-sea pb-2 pb-md-5">
                            <?php echo $text; ?>
                        </div>
                    <?php endif; ?>
              <?php  $featured_posts = get_sub_field('select_news');
              if( $featured_posts ):
              foreach( $featured_posts as $featured_post ): ?>
                  <div class="d-flex mb-lg-5 mb-4 pb-lg-2 position-relative box-diamond">
                      <?php
                      $title = "";
                      $permalink = get_permalink( $featured_post->ID );
                      $thetitle = get_the_title( $featured_post->ID );
                      $getlength = strlen($thetitle);
                      $thelength = 117;
                      $title = substr($thetitle, 0, $thelength);
                      if ($getlength > $thelength) $title.="...";
                      ?>
                      <div class="diamond"></div>
                      <h5 class="card-title mr-0 ml-0 cl-stormy-sea cl-black-h"><a class="cl-black cl-black-h text-stormy-h" href="<?php echo esc_url( $permalink ); ?>" aria-label="<?php echo $title; ?>"><span data-content="<?php echo $title; ?>"><?php echo $title; ?></span></a></h5>
                  </div>
              <?php  endforeach; endif; ?>
            </div>
            </div>
        </div>
</section>
