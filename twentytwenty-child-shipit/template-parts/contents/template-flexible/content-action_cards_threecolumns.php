<section <?php if(get_sub_field('id_cards_threecolumns')): ?>id="<?php echo the_sub_field('id_cards_threecolumns');?>" <?php endif;?> class="module module-action-cards-threecolumns bg-white wow fadeIn" data-wow-duration="0.2s" data-wow-delay="0.2s">
    <div class="container">
        <div class="row justify-content-center equal">
            <?php if( have_rows('cards_threecolumns') ): ?>
                <?php  while( have_rows('cards_threecolumns') ) : the_row();
                    $maintitlecards = get_sub_field('maintitle_threecolumns');
                    $titlecards = get_sub_field('title_threecolumns');
                    $textcards = get_sub_field('text_threecolumns'); ?>
                    <div class="col-md-4 mb-4">
                    <div class="action-cards w-100 h-100">
                        <?php if($maintitlecards): ?>
                            <div class="headline-cards cl-stormy-sea pb-3 pt-4"><?php echo $maintitlecards;?></div>
                        <?php endif; ?>
                        <?php if($titlecards): ?>
                            <div class="title-list cl-stormy-sea pb-4"><?php echo $titlecards;?></div>
                        <?php endif; ?>
                        <?php if( $textcards ): ?>
                            <div class="copy-list cl-stormy-sea pb-2 pb-md-5">
                                <?php echo $textcards; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
</section>
