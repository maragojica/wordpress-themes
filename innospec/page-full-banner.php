<?php
//Template name: Page Full Banner
get_header();
?>
    <section class="defaulttemplate">
        <div class="container">
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
        </div>

        <div class="content-banner" style="background-color: #3775ba;">
           <div class="container">
               <?php if(get_the_post_thumbnail_url(get_the_ID(),'full')): ?>
                   <div class="box-banner img-resp box-banner-margin-left">
                       <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="<?php the_title(); ?>">
                   </div>
               <?php endif; ?>
           </div>
        </div>
        <div class="container">
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

                        <div class="<?php echo $col1; ?>">

                            <div class="wrap-product wrap-content">

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
											        	<img src="<?php echo get_sub_field('image') ?>" alt="Banner Innospec" />
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
                                    <?php the_content(); ?>

                                </div>
                            </div><!-- wrap-product -->

                        </div>
                        <?php if(get_field("enabled_sidebar")): ?>
                            <div class="<?php echo $col2; ?> sidebar-right">
                                <?php get_sidebar('right'); ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        </div>
    </section>
<?php

get_footer();

?>
