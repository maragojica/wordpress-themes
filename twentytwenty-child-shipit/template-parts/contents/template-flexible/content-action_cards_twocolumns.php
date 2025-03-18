<section <?php if(get_sub_field('id_cards_twocolumns')): ?>id="<?php echo the_sub_field('id_cards_twocolumns');?>" <?php endif;?> class="module module-action-cards-twocolumns bg-white wow fadeIn" data-wow-duration="0.2s" data-wow-delay="0.2s">
    <div class="container">
        <div class="row justify-content-center equal">
            <?php if( have_rows('cards_twocolumns') ): ?>
                <?php  while( have_rows('cards_twocolumns') ) : the_row();
                    $titlecards = get_sub_field('title_twocolumns');
                    $textcards = get_sub_field('text_twocolumns'); ?>
                    <div class="col-md-6 mb-4">
                    <div class="action-cards w-100 h-100">
                        <?php if($titlecards): ?>
                            <div class="title-list cl-stormy-sea pb-4"><?php echo $titlecards;?></div>
                        <?php endif; ?>
                        <?php if( $textcards ): ?>
                            <div class="copy-list cl-stormy-sea">
                                <?php echo $textcards; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
</section>
