<?php
if (have_rows('brands')): 
    while (have_rows('brands')) :
        the_row(); 
        $section_id = get_sub_field('section_id');
        $bg_graphic  = get_sub_field('section_bg_img');
        $bg_color = get_sub_field('section_bg_color');
        $headline = get_sub_field('heading');
        $subheadline = get_sub_field('subheading'); 
        $description = get_sub_field('description');  
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');      
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-logo-slider <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($bg_color && !empty($bg_graphic)){ ?>style="background: linear-gradient(<?php echo $bg_color;?>, <?php echo $bg_color;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php } else{ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>
    <div class="container">    
        <div class="row center-xs">
            <div class="col-xs-12 col-lg-6 text-center">
            <?php if ($subheadline) : ?>
                    <div class="subheadline text-uppercase m-b1 cl-slate wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                <?php endif; ?>
                <?php if ($headline) : ?>
                    <h2 class="cl-slate m-t0 m-b0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="dp-1 m-b30 cl-slate wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                <?php endif; ?>             
            </div>
        </div> 
        <div class="row">
            <div class="col-xs-12">
                <div class="glider logo-glider wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <?php
                    if (have_rows('brand_list')):
                        while (have_rows('brand_list')): the_row();
                            $photo = get_sub_field('logo');
                            $link = get_sub_field('link'); ?>
                        <div class="slide-in-right slide slide">
                            <?php if(!empty($photo)): ?>
                                <?php  if($link) {
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <a tabindex="0" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" title="<?php echo esc_html( $link_title ); ?>" class="w-100 h-100"><?php } ?>
                                    <img class="logo-partner" src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" />
                                <?php if($link) { ?>
                                    </a>
                                <?php } ?>
                            <?php endif; ?>
                        </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div> 
            </div>      
        </div>
</div>   
</section>
<?php
 endwhile;
endif;
?>
