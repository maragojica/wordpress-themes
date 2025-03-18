<section class="module module-photo-caption <?php if(get_sub_field('add_padding_top')){ ?> pt-5 <?php }else{ ?> pb-0 <?php } ?> pt-0 wow fadeIn" data-wow-duration="0.2s" data-wow-delay="0.2s">
    <div class="container">
        <?php
        $photo = get_sub_field('photo');
        $captions = get_sub_field('caption');        ?>
        <div class="row">
            <div class="col-md-12">
                <?php if( !empty($photo) ): ?>
                    <div class="box-photo-caption">
                        <img class="img-fluid m-auto fit-cover-center h-100 w-100" src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" />
                    </div>
                <?php endif; ?>
                <?php if($captions): ?><div class="captions-media cl-stormy-sea text-center"><?php echo $captions;?></div><?php endif; ?>
            </div>
        </div>
    </div>
</section>