<?php  $idsection = get_sub_field('id_section'); 
 $add_padding_top = get_sub_field('add_padding_top');
 $add_padding_bottom = get_sub_field('add_padding_bottom'); 
 $add_margin_top = get_sub_field('add_margin_top');
 $add_margin_bottom = get_sub_field('add_margin_bottom'); ?>
<section class="module-videos bg-white <?php if($add_padding_bottom): ?> pb-md-5 pb-4<?php endif;?> <?php if($add_padding_top): ?> pt-md-5 pt-4<?php endif; ?> <?php if($add_margin_top): ?> mt-4 <?php endif;?> <?php if($add_margin_bottom): ?> mb-4 <?php endif;?>" <?php if($idsection):?>id="<?php echo $idsection;?>" <?php endif;?>>   
<?php $gallery = get_sub_field('gallery');
            $caption = get_sub_field('caption'); ?>
            <?php if($gallery): ?>
                <div class="container-fluid ps-0 pe-0">
                    <div class="row ms-md-0 me-md-0 equal">
                        <?php $i = 1; foreach( $gallery as $image ): ?>
                            <div class="col-6 col-md-4 col-ligthbox-whatdo pb-2 <?php if($i % 2 == 0){ ?>ps-2 pe-2<?php }else{ ?>ps-0 pe-0<?php } ?>">
                                <div class="w-100 h-100">
                                        <img class="img-fluid h-100 w-100 fit-cover-center" src="<?php echo esc_url($image['url']); ?>" width="1800" height="1200" alt="<?php echo esc_attr($image['alt']); ?>">
                                    </div>
                            </div>
                            <?php $i++; endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($caption): ?>
                <div class="container pt-3">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if($caption): ?>
                                <div class="metadata cl-grey">
                                    <?php echo $caption;?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>   
</section>