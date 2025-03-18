<?php
/**
 * Displays the content when the frontline stories template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<section class="banner-inner-page">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php if( get_field('title_headlines_inner') ): ?>
                    <h3 class="headline-section cl-dark"><?php echo the_field('title_headlines_inner'); ?></h3>
                <?php endif; ?>
                <?php if( get_field('text_headlines_inner') ): ?>
                    <div class="copy-text cl-dark">
                        <?php echo the_field('text_headlines_inner'); ?>
                    </div>
                <?php endif; ?>
                <?php if( get_field('subtitle_headlines_inner') ): ?>
                    <h5 class="subheadline-section cl-dark mt-5 mb-5 pb-2 pb-md-5">
                        <?php echo the_field('subtitle_headlines_inner'); ?>
                    </h5>
                <?php endif; ?>
                <?php $cta = get_field('cta_link_headlines_inner');
                if($cta) {
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                    <div>
                        <a class="cta-link cl-dark-green cl-dark-greenh mt-2" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?>
                            <svg class="d-inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="34px">
                                <image  x="0px" y="0px" width="24px" height="34px"  xlink:href="data:img/png;base64,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" />
                            </svg>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<section class="info-inner-page">
    <div class="container">
        <?php if ( has_post_thumbnail() ) {
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
            $alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>
            <div class="row row-featured-image">
                <img class="m-auto" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
            </div>
        <?php } ?>
        <?php
        $args = array(
            'post_type' => 'story',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby'=>'menu_order',
            'order'=>'ASC'
        );
        $stories = new WP_Query($args); ?>
        <?php if ( $stories->have_posts() ) : ?>
            <div class="section-news row-frontline-stories pt-0 mb-md-5 pr-15 pl-15">
                <div class="row">
                    <?php $i = 1; while ($stories->have_posts()) : $stories->the_post();
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');?>
                        <div class="col-6 col-md-4 col-lg-3 mb-2 col-front-line">
                            <div class="ih-item item-post square effect6 from_top_and_bottom">
                                <a class="anchorlink" href="#anchorstories<?php echo $i;?>">
                                    <div class="img"><img src="<?php echo $featured_img_url;?>" alt="<?php the_title();?>"></div>
                                    <div class="info">
                                        <h3 class="title-item-post cl-white"><?php echo get_small_title(70,0);?>
                                            <svg class="d-inline-block ml-3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="34px">
                                                <image  x="0px" y="0px" width="24px" height="34px"  xlink:href="data:img/png;base64,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" />
                                            </svg>
                                        </h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php $i++; endwhile; wp_reset_postdata();?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( $stories->have_posts() ) : ?>
            <div class="row justify-content-center box-anchor pt-5 mt-2 mt-md-5">
                <?php $j = 1; while ($stories->have_posts()) : $stories->the_post();
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');?>
                    <div class="col-md-10 wow fadeIn" id="anchorstories<?php echo $j;?>" data-wow-delay="0.3s">
                        <img class="mb-0 mb-md-5 pb-5 w-100" src="<?php echo $featured_img_url;?>" alt="<?php the_title();?>">
                        <div class="row justify-content-center row-box-stories">
                            <div class="col-md-8">
                                <h4 class="title-topic cl-dark mb-2"><?php the_title();?></h4>
                                <?php if( get_field('place_story') ): ?>
                                    <p class="text-place"><?php the_field('place_story'); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if( get_field('testimonial_story') ): ?>
                                <div class="col-md-11">
                                    <div class="box-tetimonial-stories round-12 bg-sand cl-dark mt-5 mb-5">
                                        <div class="box-svg-open">
                                            <svg class="m-auto" xmlns="http://www.w3.org/2000/svg"  xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="32px">
                                                <image  x="0px" y="0px" width="26px" height="32px"  xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEcAAAA/CAMAAACFHyWBAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACQFBMVEUAAAAAkv8Ahv8Ah/8Ah/8AgP8Ahv8Ahf8Ai/8A//8Ah/8Ahv8Ah/8AiP8Ahv8Ah/8Ahv8Ahv8AgP8Ah/8Ah/8Amf8Aif8Ah/8Ahv8AgP8AjP8Ah/8AhP8Ahv8Ah/8Ahv8Ahv8Ahv8AgP8Ahv8Ah/8AgP8Ah/8AiP8Ah/8Ahf8Ah/8Ah/8Ah/8AiP8Ahv8Ahv8Ah/8Ahf8Ahv8Ahv8Ahv8Ahv8Ah/8Ahv8Ah/8Ai/8Ah/8Ahv8Ahv8Ah/8Aiv8Ah/8Ah/8Ag/8Ahv8Ahv8Ah/8Ah/8Ahv8Ah/8Ahf8Ah/8AiP8Ah/8Ah/8Ah/8Ah/8Ah/8Aqv8Ahv8Ah/8Aiv8Ahv8Ah/8AiP8Ah/8Ahv8AiP8Ah/8Ah/8Ahv8Ah/8Ahf8Ah/8AiP8Ah/8Ah/8Ahv8Ah/8Ah/8Ahv8Ag/8Ahv8Ah/8Ahv8Ah/8Aif8Ah/8Ahv8Ahv8Ah/8Ahv8Ahv8Ahv8Ahf8Ahv8Ah/8Ah/8Ah/8AgP8AgP8Ahf8Ahv8Ahv8Ahv8Ahv8Ahv8Ahv8Ah/8Ah/8Ah/8Ahf8Ah/8Ah/8Ahv8AiP8Ahv8Ah/8Ajv8Ahv8Ahv8Ahv8Ah/8Ah/8Ah/8Ahv8Ahf8Ah/8Ahv8Ahv8Ahv8Ah/8Ahv8Ah/8Ahf8Ah/8Aif8Ah/8Aif8Ahf8Ah/8Ahv8Ah/8AhP8AiP8Ah/8Ahv8Aif8AiP8Ahv8Ahv8AiP8Ahv8Ahv8AhP8Ah/8Ah/8Ahv8Ahf8Ah/8Ah/8AiP8Ahv8Ahv8AiP8Aif8Ahv8AgP8Ah/////9NIwa5AAAAvnRSTlMABzlgQApfQQsBZOzhOmPr4jsOvdoFDbvcBhTMNBPKN9NUDNFXArIrsC6G34RNUkpVF+qpFeistekWakxnWSX2lyP1r9i57fpWWw/ne+WT1AOR7hgm/Esk+1yov6XBMP4ttKax0jP5IV2hj58c+HB+o+bkg0PImWidBBBFwPOLfInJx4wxa3mIdl6cignE3qtxUYB0MvT9lssRzaQs2yndGliu9/AbHo49J0/gkj68uh/yd3pam5AvbodtONkIObYByAAAAAFiS0dEv9Pbs1UAAAAHdElNRQfkCR4NNB61KuwuAAADUElEQVRYw43X6V9MURgH8DspmYpSKUIpMy1Ii6GiVLZ2rpIWmslSNEW2UpjIUiQSlbJlLWSL7Jy/zczcO/c5Mz3PGc/b+X5+c+5ZnnuuJCGl85nj6yd5K53PXP95gt/1AYGMsaD54hT9gmC7CllIgtAw5qzwRaKYiEhFLV5CgKilTK1lgpjl0S4VQ/zPChdgsXRM3EpNGVBgjNcAS6DnJhFUEipWAVhND2cNqCAUJANga8mYFE6lYiAtHcA6Msa0HtQGVGQAyDSROdwUBmZhYCM33k1kTDancjCwORdAHhmTvwXUVlREAthGn67toHakYSAHQAG9lQu5pyrCQHEJgFIyJrQMVCIqdgLYJZM5u0GVV2BgTyWIvWRMVTWoGlTUAthHxkj7QdWhwGzRgIWe5HpQLAUVBwAcpIdzCNRhPQYaADQeIWPM3JofRUUTACs9nGauXaBNN6sRtmALGWM6BjnHUdEK4AQ9nFLuRMRhQD4JwkzGGE+BOo2KMwDa6OH4gspF247UDuIsnZMHqgMFncGw6OfIGDnT2x48D+ACPRzu4W06VHSBuEjnXAIVj4tuEMl0zmVQV1AQx/WCq2SMXwGoa96mh/n/z/SwHlT0cKKXzLnOKbxBcaePVd/QEzl9nGI3+xFxixfs9kBX652AwQTPpa1zU+kZ1rv3sg1D/LUuk2E13NzgllOCqsZa7fbXz4gasXIvQx2lLPfVMaUxstqKtZwoWo2OOUU+ExCtzRwRqAcRDmEWCNbkyqkXqYcO4SMSrFDNiREqx/XlkVA8lpWcJ0I13ilJT4WCPVNyKsSqSLDuSg14WXelntvJC6EoVx9sWKhe2tWo+K9eKTndYjXhdqXBSm1Jk2Jlv1sYxEL9MIoVq9eS1CIWVUqOl2V9YydhQhGh7sRIoXKcxEERGHedjLciNeUQcohAaNcY45RAvXOSbIF4r7WOAIHydQr9BxKEcS3xI6lcjf+TjQAj/DVmYppQliEXMYzg4rNbj06txNUXIDVoULvHS2MGDfrKk5rq2WBS9nxHzSDqW6cb+R7t8fs09kWd5HlebbM+5Yw/+B1i+xklYWX8xavhXkzpf1tHy+xTYPvTV0hfzKSYSUWFdxjGaCVn/ZW8l2zyUP8AbwY1SPgDSSEAAAAASUVORK5CYII=" />
                                            </svg>
                                        </div>
                                        <div class="box-text-testimonials"><?php the_field('testimonial_story'); ?></div>
                                        <div class="box-svg-close">
                                        <svg class="m-auto" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="32px">
                                            <image x="0px" y="0px" width="26px" height="32px"  xlink:href="data:img/png;base64,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" />
                                        </svg>
                                         </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-md-8">
                                <div class="cl-dark light-content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="line-separator w-100"></div>
                    </div>
                    <?php $j++; endwhile; ?>
            </div>
        <?php endif; ?>

    </div>
</section>