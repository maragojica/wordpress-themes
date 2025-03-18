<section class="module module-text-content <?php if(!get_sub_field('add_padding_textcontent')): ?>pt-0<?php endif;?> bg-white wow fadeIn" data-wow-duration="0.2s" data-wow-delay="0.2s">
    <?php  $title = get_sub_field('title_text_content');
    $text = get_sub_field('text_text_content'); ?>
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
            </div>
        </div>
</section>
