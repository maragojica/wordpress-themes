<section class="module module-members pt-md-5 pb-5" <?php if(get_sub_field('section_id_members')):?>id="<?php the_sub_field('section_id_members'); ?>" <?php endif; ?>>
    <div class="container pb-md-5">
        <?php $title = get_sub_field('title_section_members');
        if($title):?>
            <div class="row">
                <div class="col-md-12 pb-md-5 pb-4">
                    <div class="title-section position-relative"><?php echo $title; ?></div>
                </div>
            </div>
        <?php endif; ?>
     </div>
    <?php if( have_rows('columns_members') ): ?>
        <div class="container">
            <div class="row">
                <?php while ( have_rows('columns_members') ) : the_row();
                    $show_title = get_sub_field('show_title_member');
                    $hide_title_mv = get_sub_field('hide_title_mv');
                    $title = get_sub_field('title_column_member');
                    $text = get_sub_field('text_column_member');  ?>
                    <div class="col-md-6 col-lg-3">
                        <?php if($show_title): ?>
                            <div class="title-member cl-black <?php if($hide_title_mv): ?>hide-md<?php endif; ?>"><?php if($title): echo $title; endif;?></div>
                        <?php endif; ?>
                        <?php if($text): ?>
                            <div class="members-text cl-grey">
                                <?php echo $text; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</section>
