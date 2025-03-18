<?php
//Template name: Page Trident
get_header();
?>
    <section class="container defaulttemplate">
        <div class="row">
            <div class="col-lg-12">
            <nav class="breadcrumb">
                <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 content-sidebar">
                <?php get_sidebar(); ?>
            </div>
            <div class="col-lg-9 content-main">
                <div class="row">
                    <?php
                    while(have_posts()): the_post();

                        if(get_field("enabled_sidebar")){
                            $col1 = "col-lg-8";
                            $col2 = "col-lg-4";
                        }else{
                            $col1 = "col-lg-12";
                        }
                    ?>

                        <div class="col-lg-12">

                            <div class="wrap-product wrap-content">

                                <?php if(get_the_post_thumbnail_url(get_the_ID(),'full')): ?>
	                                <div class="box-banner img-resp box-banner-margin-left">
	                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="<?php the_title(); ?>">
	                                </div>
                                <?php endif; ?>

                                <?php $parents = get_post_ancestors( $post->ID ); ?>
                                <?php if(count($parents) > 0): ?>
                                <!--
                                    <h1 class="product-title">
                                        <?php if(get_field('link_headline')): ?>
                                            <a href="<?php echo get_field('link_headline') ?>">
                                        <?php endif; ?>
                                            <?php the_title(); ?></h1>
                                        <?php if(get_field('link_headline')): ?>
                                            </a>
                                        <?php endif; ?>
                                    </h1>-->
                                <?php endif; ?>

                                <div class="trident-content-text pb-0">
                                    <?php the_content(); ?>
                                </div>
                                <div class="trident-content-box p-5 mb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php if(get_field('title_box1')): ?>
                                                <h4 class="cl-bluel"><?php the_field('title_box1');?></h4>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <?php $logo = get_field('image_box1');
                                        if ( !empty($logo)) : ?>
                                        <div class="col-md-5 mb-0 mb-4">
                                            <img class="img-fluid" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                                        </div>
                                        <?php endif; ?>

                                        <div class="col-md">
                                            <?php if(get_field('form_box1')): ?>
                                                <div class="box-contact mt-4"><?php the_field('form_box1');?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="trident-content-box box-2 p-5 mb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php if(get_field('ce_title')): ?>
                                                <h4 class="cl-bluel"><?php the_field('ce_title');?></h4>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="content-text pb-0">
                                                <?php if(get_field('ce_content')): ?>
                                                    <?php the_field('ce_content');?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-start">
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php if(get_field('ce_case1')): ?>
                                                        <h4 class="cl-bluel"><?php the_field('ce_case1');?></h4>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <?php if(get_field('ce_case1_subtitle')): ?>
                                                        <p class=""><?php the_field('ce_case1_subtitle');?></p>
                                                    <?php endif; ?>
                                                </div>                                                
                                                <div class="col-md-12">
                                                    <?php if(get_field('ce_case1_image')): 
                                                            $img = get_field('ce_case1_image');
                                                    ?>
                                                        <img src="<?php echo $img['url'] ?>" alt="" style="width: 100%;">
                                                    <?php endif; ?>
                                                </div>                                                    
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php if(get_field('ce_case2')): ?>
                                                        <h4 class="cl-bluel"><?php the_field('ce_case2');?></h4>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <?php if(get_field('ce_case2_subtitle')): ?>
                                                        <p class=""><?php the_field('ce_case2_subtitle');?></p>
                                                    <?php endif; ?>
                                                </div>                                                
                                                <div class="col-md-12">
                                                    <?php if(get_field('ce_case2_image')): 
                                                            $img = get_field('ce_case2_image');
                                                    ?>
                                                        <img src="<?php echo $img['url'] ?>" alt="" style="width: 100%;">
                                                    <?php endif; ?>
                                                </div>                                                    
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php if(get_field('ce_case3')): ?>
                                                        <h4 class="cl-bluel"><?php the_field('ce_case3');?></h4>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <?php if(get_field('ce_case3_subtitle')): ?>
                                                        <p class=""><?php the_field('ce_case3_subtitle');?></p>
                                                    <?php endif; ?>
                                                </div>                                                
                                                <div class="col-md-12">
                                                    <?php if(get_field('ce_case3_image')): 
                                                            $img = get_field('ce_case3_image');
                                                    ?>
                                                        <img src="<?php echo $img['url'] ?>" alt="" style="width: 100%;">
                                                    <?php endif; ?>
                                                </div>                                                    
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <?php
                                                $form = get_field('ce_form');
                                                echo do_shortcode($form); 
                                            ?>
                                        </div>
                                    </div>
                                </div>
								<div class="trident-contnet pb-0">
									<p>Trident<sup>TM</sup> Bunker Fuel Additives has an extensive product portfolio for treating individual blend stocks, including sustainable blend stocks, and finished fuel blends. </p><p>If you would like to speak directly to one of our Bunker Fuels team, please complete the form below and our team will get in touch.</p>		
									<div>
										<?php echo do_shortcode('[gravityform id="54" title="false" description="false" ajax="true"]'); ?>
									</div>
								</div>
							<div class="trident-content-text pb-0" style="color: #36a9e1;">
								<p>Innospec works with several industry groups to understand the needs of the market, develop fuel specifications, and verify the performance of our additives. </p>
								<p>- The ISO working group responsible for the development of the Classification & Specification of Marine Fuels – ISO8216 and ISO8217</p>
								<p>- The International Council of Combustion Engines (CIMAC) working group 7 (Fuels)</p>
								<p>- Lloyds Register & multi-national oil company marine groups which have independently verified the claims associated with specified Innospec products, providing assurance that the products perform as designed.</p>

							</div>
                            </div><!-- wrap-product -->
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php

get_footer();

?>
