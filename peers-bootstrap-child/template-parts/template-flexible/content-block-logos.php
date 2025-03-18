<?php  $idsection = get_sub_field('id_section');
 $add_padding_top = get_sub_field('add_padding_top');
 $add_padding_bottom = get_sub_field('add_padding_bottom'); 
 $add_margin_top = get_sub_field('add_margin_top');
 $add_margin_bottom = get_sub_field('add_margin_bottom'); ?>
<section class="module-logos bg-white <?php if($add_padding_bottom): ?> pb-md-5 pb-4<?php endif;?> <?php if($add_padding_top): ?> pt-md-5 pt-4<?php endif; ?> <?php if($add_margin_top): ?> mt-4 <?php endif;?> <?php if($add_margin_bottom): ?> mb-4 <?php endif;?>" <?php if($idsection):?>id="<?php echo $idsection;?>" <?php endif;?>>
    <div class="container">
   <?php $title_logos_detroit_summit = get_sub_field('title_logos');
                    $text_logos_detroit_summit = get_sub_field('text_logos');
                    if( have_rows('list_logos') ):  ?>
                        <div class="row pt-md-5 pb-md-5 pb-4">
                            <div class="col-md-12">
                                <?php if($title_logos_detroit_summit): ?>
                                    <h3 class="cl-dark mb-4"><?php echo $title_logos_detroit_summit; ?></h3>
                                <?php endif; ?>
                                <?php if($text_logos_detroit_summit): ?>
                                    <div class="dp-1 cl-dark"><?php echo $text_logos_detroit_summit; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row pb-md-5 equal align-items-center">
                        <?php while( have_rows('list_logos') ): the_row();
                        $logo = get_sub_field('logo_list');
                        $link = get_sub_field('link_list'); ?>
                            <div class="col-4 col-md-3 col-lg-2-2 pb-md-0 pb-5">
                                <?php if(!empty($logo)): ?>
                                    <?php  if($link) {
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                        <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100"><?php } ?>
                                        <img class="logo-partner-network m-auto d-block" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                                        <?php if($link) { ?>
                                        </a>
                                    <?php } ?>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
    </div>
</section>