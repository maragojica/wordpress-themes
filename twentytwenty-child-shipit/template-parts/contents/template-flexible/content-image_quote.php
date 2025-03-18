<section class="module module-image-quote <?php if(!get_sub_field('add_padding_imgquote')): ?>pt-0<?php endif;?> wow fadeIn" data-wow-duration="0.2s" data-wow-delay="0.2s">
    <div class="container">
        <?php
        $photo = get_sub_field('photo');
        $quote = get_sub_field('quote');
        $info = get_sub_field('info');  ?>
        <div class="row align-items-center justify-content-center">
            <?php if( !empty($photo) ): ?>
            <div class="col-lg-6 pb-lg-0 pb-4 pr-lg-5">
                 <img class="img-fluid m-auto" src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" />
            </div>
            <?php endif; ?>
            <div class="<?php if(!empty($photo) ){ ?>col-lg pl-lg-5<?php }else{?>col-md-10 col-lg-8 pr-md-0 pl-md-0<?php } ?>">
                <?php if($quote): ?>
                    <div class="copy-quote cl-stormy-sea">
                    <?php echo $quote;?>
                    </div>
                <?php endif; ?>
                <?php if($info): ?>
                    <div class="copy-description cl-stormy-sea mt-5">
                            <p class="mb-0"> — <?php echo $info;?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>