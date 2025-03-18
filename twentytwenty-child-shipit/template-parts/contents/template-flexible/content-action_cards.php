<section class="module module-action-cards bg-white <?php if(get_sub_field('remove_padding_bottom')): ?> pb-0 <?php endif; ?> wow fadeIn" data-wow-duration="0.2s" data-wow-delay="0.2s">
    <?php  $title = get_sub_field('title_section');
    $text = get_sub_field('text_section'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 pr-md-0 pl-md-0">
                <?php if( have_rows('cards') ): ?>
                    <?php  while( have_rows('cards') ) : the_row();
                        $titlecards = get_sub_field('title');
                        $cta = get_sub_field('link'); ?>
                        <div class="action-cards mb-5">
                            <?php if($titlecards): ?>
                                <div class="title-list cl-stormy-sea pb-4"><?php echo $titlecards;?></div>
                            <?php endif; ?>
                            <?php  if($cta) {
                                $link_url = $cta['url'];
                                $link_title = $cta['title'];
                                $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                                <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" class="cta-read cl-ultra-violet cl-black-h">
                                    <?php echo $link_title; ?>
                                    <svg class="icon-arrow-r d-inline" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="20px" viewBox="0 0 24 24" width="30px" fill="#3825FD"><rect fill="none" height="20" width="30"/><path d="M15,5l-1.41,1.41L18.17,11H2V13h16.17l-4.59,4.59L15,19l7-7L15,5z"/></svg>
                                </a>
                            <?php } ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                    <?php if( $title ): ?>
                        <h6 class="title-list cl-stormy-sea pb-4 pt-5"><?php echo $title;?></h6>
                    <?php endif; ?>
                    <?php if( $text ): ?>
                        <div class="copy-description cl-stormy-sea pb-2 pb-md-5">
                            <?php echo $text; ?>
                        </div>
                    <?php endif; ?>
            </div>
        </div>
</section>
