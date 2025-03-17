<?php
if (have_rows('partners')): 
    while (have_rows('partners')) :
        the_row(); 
        $subheading = get_sub_field('subheading');  ?>
<section class="logo-slider-section p-lg-b0 p-t0">
<div class="container position-relative flex col middle-xs center-xs"> 
    <div class="row center-xs p-b2">                    
        <div class="col-xs-12 col-lg-7">
            <?php if ($subheading) : ?>
                <span class="section-subtitle text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo esc_html($subheading); ?></span>
            <?php endif; ?>                              
        </div>
    </div>
    <div class="row">
        <div class="glider logo-glider">
            <?php
            if (have_rows('partners_list')):
                while (have_rows('partners_list')): the_row();
                    $photo = get_sub_field('logo');
					$link = get_sub_field('link'); ?>
                <div class="slide-in-right slide slide">
                <?php if(!empty($photo)): ?>
                    <?php  if($link) {
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                        <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100"><?php } ?>
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
</section>
<?php
 endwhile;
endif;
?>
