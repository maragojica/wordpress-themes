<?php
$ps_float = get_sub_field('float');
$ps_image = get_sub_field('image');
$ps_product = get_sub_field('product');
$ps_visible = get_sub_field('is_no_visible_product');

?>
<section class="section-product section-grid product-grid-two-columns-<?php echo $ps_float; ?> position-relative <?php if($ps_visible){?>hide<?php } ?>">
    <?php if ($ps_float == "left") : ?>
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-30 left-10 top-15">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-20 right-10 bottom-10">
    <?php endif; ?>
    <div class="container-fluid pr-0 pl-0">
        <div class="<?php echo $ps_float == 'right' ? 'row align-items-center mr-0 ml-0' : 'row flex-lg-row-reverse align-items-center mr-0 ml-0'; ?>">
            <div class="col-lg-6">
                <div class="wrap-text-bullet">
                    <h4 class="title-coniferous">Product solutions</h4>
                    <h2 class="title text-uppercase"><?php echo $ps_product->post_title; ?></h2>
	                <?php
	                if (have_rows('page_content', $ps_product->ID)) :
                    ?>
                    <ul class="list-special" uk-switcher="connect: #TabsProducts<?php echo $ps_product->ID; ?>Content; animation: uk-animation-fade">
                        <?php
		                // loop through the rows of data
		                while (have_rows('page_content', $ps_product->ID)) : the_row();
	                        if (get_row_layout() == "solutions") :
                                $solution = get_sub_field('solution');
                                if ( ! empty( $solution ) ):
                                    foreach ($solution as $item):
                                    ?>
                                        <li><a href="#"><?php echo $item['title']; ?></a></li>
                                    <?php endforeach;
                                 endif;
	                        endif;
		                endwhile;
		                ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6 <?php echo $ps_float == 'left' ? 'pl-0' : 'pr-0'; ?>">
                <div class="wrap-box position-relative">
                    <div class="wrap-image img-resp">
                        <img src="<?php echo $ps_image['url']; ?>" alt="">
                    </div>
	                <?php
	                if (have_rows('page_content', $ps_product->ID)) :
	                ?>
                    <div class="wrap-text wrap-text-overlay wrap-text-floating">
                        <div id="TabsProducts<?php echo $ps_product->ID; ?>Content" class="uk-switcher" >
	                        <?php
	                        // loop through the rows of data
	                        while (have_rows('page_content', $ps_product->ID)) : the_row();
                                if (get_row_layout() == "solutions") :
                                    $solution = get_sub_field('solution');
                                    if ( ! empty( $solution ) ):
                                        foreach ($solution as $item):
                                        ?>
                                        <div class="tabsproducts">
                                            <?php echo $item['content']; ?>
                                        </div>
                                        <?php endforeach;
                                    endif;
                                endif;
	                        endwhile;
	                        ?>
                        </div>
                    </div>
	                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
