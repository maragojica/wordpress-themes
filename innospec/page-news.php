<?php
//Template name: News
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
                    //while(have_posts()): the_post();

                        if(get_field("enabled_sidebar")){
                            $col1 = "col-lg-8";
                            $col2 = "col-lg-4";
                        }else{
                            $col1 = "col-lg-12";
                        }
                    ?>

                        <div class="<?php echo $col1; ?>">

                            <div class="wrap-product wrap-content">

                                <?php if(get_the_post_thumbnail_url(get_the_ID(),'full')): ?>
	                                <div class="box-banner img-resp box-banner-margin-left">
	                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="<?php the_title(); ?>">
	                                </div>
                                <?php endif; ?>

                                <?php if(get_field('show_banners')): ?>
                                	<?php if( have_rows('banners') ): ?>
		                                <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/assets/css/flexslider.css" type="text/css" media="screen" />

										<!-- FlexSlider -->
										<script defer src="<?php bloginfo('template_url') ?>/assets/js/jquery.flexslider.js"></script>

										<script type="text/javascript">
											jQuery(window).load(function(){
											  jQuery('.flexslider').flexslider({
											    animation: "fade",
											    prevText: "",           //String: Set the text for the "previous" directionNav item
    											nextText: "",
											  });
											});
										</script>
		                                <div class="box-banner img-resp box-banner-margin-left">
		                                    <div class="flexslider">
											    <ul class="slides">
											    	<?php while( have_rows('banners') ) : the_row(); ?>
											      	<li>
											        	<img src="<?php echo get_sub_field('image') ?>" alt="<?php the_title(); ?>"/>
											      	</li>
											      	<?php endwhile; ?>
											    </ul>
											</div>
		                                </div>
		                            <?php endif; ?>
                                <?php endif; ?>

                                <?php $parents = get_post_ancestors( $post->ID ); ?>
                                <?php if(count($parents) > 0): ?>
                                <h1 class="product-title">
                                    <?php if(get_field('link_headline')): ?>
                                        <a href="<?php echo get_field('link_headline') ?>">
                                    <?php endif; ?>
                                        <?php the_title(); ?></h1>
                                    <?php if(get_field('link_headline')): ?>
                                        </a>
                                    <?php endif; ?>
                                </h1>
                                <?php endif; ?>

                                <div class="content-text">
                                    <?php
                                    wp_reset_postdata();
                                    $arg = array(
                                        'post_type' => 'post',
                                        'order' => 'DESC',
                                        'orderby' => 'date',
                                        'cat' => '3',
                                        'showposts' => 1000
                                    );
                                    $the_query = new WP_Query($arg);
                                    while ( $the_query->have_posts() ) : $the_query->the_post();
                                    ?>
                                    <article>
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <h2><?php the_title(); ?></h2>

                                                <?php the_excerpt(); ?>
                                            </div>
                                            <div class="col-lg-3 text-right">
                                                <a href="<?php the_permalink(); ?>" class="link-learnmore">Learn more</a>
                                            </div>
                                        </div>
                                    </article>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                            </div><!-- wrap-product -->

                        </div>
                        <?php if(get_field("enabled_sidebar")): ?>
                        <div class="<?php echo $col2; ?> sidebar-right">
                            <?php if(get_field("show_download_button")): ?>
                                <div class='wrap-resources wrap-download-button-sidebar sidebar-title'>
                                    <h3>DOWNLOADS</h3>
                                    <ul>
                                    <?php while( have_rows('download_buttons') ) : the_row(); ?>
                                        <li><a href="<?php echo get_sub_field('file'); ?>" download><?php echo get_sub_field('title_name') ?></a></li>
                                    <?php endwhile; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <?php if(get_field("show_download_brochure")): ?>
                                <div class='wrap-download-brochure-sidebar sidebar-title'>
                                    <h3>DONWLOAD BROCHURE</h3>
                                    <a href="<?php echo get_field('download_brochure_file'); ?>" download><img src="<?php echo get_field('download_brochure_image'); ?>" alt="Brochure image"></a>
                                </div>
                            <?php endif; ?>

                        	<?php if(get_field("show_simgle_image")): ?>
                            	<div class='wrap-image-sidebar'>
                            		<img src="<?php echo get_field("single_image"); ?>" alt="Innospect Image">
                            		<?php if(get_field('text_under_single_image')): ?>
                            		<div class="wrap-text-sidebar">
                            			<?php echo get_field('text_under_single_image'); ?>
                            		</div>
                            		<?php endif; ?>
                            	</div>
                        	<?php endif; ?>
                            <div class="wrap-video wrap-resources">
                                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-right') ) : ?> <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php //endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php

get_footer();

?>
