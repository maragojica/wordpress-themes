<section <?php if(get_sub_field('id_text_two_columns')): ?>id="<?php echo the_sub_field('id_text_two_columns');?>" <?php endif;?> class="module module-text-two-columns pt-5 pb-0 bg-white wow fadeIn" data-wow-duration="0.2s" data-wow-delay="0.2s">
    <?php  $title = get_sub_field('title_two_columns');
    $subtitle = get_sub_field('subtitle_two_columns');
    $text1 = get_sub_field('text_column_1');
    $text2 = get_sub_field('text_column_2');
    $topdivide = get_sub_field('add_top_divide');?>
    <div class="container pt-0 pt-md-5 pb-0">
        <?php if($topdivide): ?>
            <div class="row pb-5">
                <div class="col-md-12 pb-5 mb-5">
                    <div class="top-divide w-100"></div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row justify-content-center">
            <div class="col-md-12 pt-md-5 pb-md-5">
               <?php if($subtitle): ?>
                   <div class="text-facts text-uppercase cl-ultra-violet pb-3"><?php echo $subtitle;?></div>
               <?php endif; ?>
                <?php if( $title ): ?>
                    <h2 class="headline-section cl-stormy-sea pb-md-5"><?php echo $title;?></h2>
                <?php endif; ?>
            </div>
        </div>
        <div class="row pt-5">
            <?php if( $text1 ): ?>
                <div class="col-md">
                    <div class="copy-description cl-stormy-sea pb-2">
                        <?php echo $text1; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if( $text2 ): ?>
                <div class="col-md">
                    <div class="copy-description cl-stormy-sea pb-2">
                        <?php echo $text2; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
</section>
