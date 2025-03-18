<?php $bg_data = get_sub_field('bg_data'); $linkdata = get_sub_field('cta_data_link'); 
if( have_rows('list_data') ): ?>
        <section  class="section-areas pt-5 pb-md-5" <?php if(!empty($bg_data)): ?>style="background: url('<?php echo esc_url($bg_data['url']); ?>') center center no-repeat;" <?php endif; ?>>
            <div class="container pt-md-5 pt-4">
            <div class="row pt-lg-5">
                <div class="col-lg-8">
                    <?php  $title = get_field('title_data'); $subtitle = get_field('text_data'); ?>
                    <?php if($title): ?>
                        <h2 class="cl-white text-uppercase link-text mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title; ?></h2>
                    <?php endif; ?>    
                    <?php if($subtitle): ?>
                        <div class="cl-white mb-lg-5 mb-3 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $subtitle;?></div>
                    <?php endif; ?>
                    <?php 
                    if( $linkdata ):
                        $link_url = $linkdata['url'];
                        $link_title = $linkdata['title'];
                        $link_target = $linkdata['target'] ? $linkdata['target'] : '_self';
                        ?>
                        <a tabindex="0" class="cta-1 cl-golden-yellow cl-golden-yellow-h wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?> <i class="fas fa-arrow-right"></i></a>
                    <?php endif; ?>
                </div>
                <div class="row pt-lg-5">
                   <div class="col-lg-12 pt-lg-5 pt-4">
                      <div class="row equal">
                      <?php while( have_rows('list_data') ): the_row();

                            // Get sub field values.
                            $title = get_sub_field('title_list_data');
                            $text = get_sub_field('text_list_data');                    
                            ?>
                            <div class="col-lg-6 pb-lg-5 pb-4">
                            <?php if($title): ?>
                                <h4 class="cl-white text-uppercase sm-h2 mb-2 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title; ?></h4>
                            <?php endif; ?> 
                            <?php if($text): ?>
                                <div class="cl-white mb-lg-5 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $text;?></div>
                            <?php endif; ?>
                            </div>
                            <?php endwhile; ?>
                      </div>
                   </div>
                </div>
            </div>
            </section>           
        <?php endif; ?>    