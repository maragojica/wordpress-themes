<?php
/**
 * Template name: Home2023
 */

get_header();
?>
    <section class="home-hero" style="min-height: 500px;">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery(".regular").slick({
                    dots: true,
                    infinite: true,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 3000,

                    speed: 500,
                    fade: true,
                    cssEase: 'linear',
                });
            });
        </script>
        <style type="text/css">
            .wrap-banner .slider,
            .wrap-banner .slider .item{
                align-items: center;
                display: flex;
                height: 500px;
                overflow: hidden;
            }
            .wrap-banner .slider .item{
                align-items: center;

                display: flex;
                flex-direction: column;
                justify-content: flex-end;
                
                
                padding-left: 20px;
                padding-right: 20px;
            }
            .wrap-banner .slider .headline{
                color:white;
                font-family: 'Formata-Medium' !important;
                font-weight: 700;
                font-size: 47px;
                line-height: 48px;
                margin-bottom: 1rem;
                margin-left: auto;
                margin-right: auto;
                max-width: 1050px;
                text-align: center !important;
                text-shadow: 1px 1px 5px #000 !important;
            }
            .wrap-banner .slider .cta{
                margin-bottom: 6.5rem;
                text-align: center;
            }
            .wrap-banner .slider .cta a{
                color: #b2bb1c !important;
                display: block !important;
                font-family: sans-serif !important;
                font-size: 20px !important;
                font-weight: bold;
                text-align: center;
                text-transform: uppercase !important;
                text-decoration:none;
                text-shadow: 1px 1px 3px #000 !important;
            }
            .wrap-banner .slider .slick-dots {
                bottom: 45px;
            }
            .wrap-banner .slider .slick-dots li button:before{
                border:2px solid white;
                border-radius: 50%;
                width: 15px;
                height: 15px;
                opacity: 1;
                color: transparent;
            }
            .wrap-banner .slider .slick-dots li.slick-active button:before{
                background: black;
            }
            .banner-inner{
                padding: 0 50px;
            }
            @media(max-width:1200px){
                .wrap-banner .slider,
                .wrap-banner .slider .item{
                    height: 400px;
                }
                .wrap-banner .slider .headline{
                    font-size: 36px;
                    line-height: 40px;
                }
                .banner-inner{
                    padding: 0px;
                }
            }
        </style>
        <div class="wrap-banner" style="visibility: hidden;">
           <div class="regular slider">
                <div class="item" style="background: url(https://innospec.com/wp-content/uploads/2023/05/lab-scaled-1-jpg.webp) no-repeat;background-size: cover;">
                </div>
                <div class="item" style="background: url(https://innospec.com/wp-content/uploads/2023/05/slide-second-jpg.webp) no-repeat;background-size: cover;">
                    <div class="headline">Innospec offers a wide range of fit-for-purpose  environmentally friendly additives.</div>
                    <div class="cta">
                        <a href="/fuel-additives/renewable-fuel-specialties/">&gt; Learn More</a>
                    </div>
                </div>
                <div class="item" style="background:url(https://innospec.com/wp-content/uploads/2023/05/results-scaled-1-jpg.webp) no-repeat;background-size: cover;">
                    <div class="headline">Innospec Schedules Q2 2023 Earnings Release and Conference Call</div>
                    <div class="cta">
                        <a target="_blank" href="https://innospec.com/wp-content/uploads/2023/07/IOSP_Q22023_Results_Schedule.pdf">&gt; Learn More</a>
                    </div>
                </div>
                <div class="item" style="background:url(https://innospec.com/wp-content/uploads/2023/05/hair_care-scaled-1-jpg.webp) no-repeat;background-size: cover;">
                    <div class="headline">Explore an award-winning chelating agent for hair care and hand cleansing.</div>
                    <div class="cta">
                        <a href="/personal-care/">&gt; Learn More</a>
                    </div>
                </div>
                <div class="item" style="background:url(https://innospec.com/wp-content/uploads/2023/05/fuel_additive-scaled-1-jpg.webp) no-repeat;background-size: cover;">
                    <div class="headline">Developing innovative fuel additive solutions for over 80 years.</div>
                    <div class="cta">
                        <a href="/fuel-additives/">&gt; Learn More</a>
                    </div>
                </div>
                <div class="item" style="background:url(https://innospec.com/wp-content/uploads/2023/05/carbon_reduction-scaled-1-jpg.webp) no-repeat;background-size: cover;">
                    <div class="headline">Providing the carbon reduction guidance to meet Canada’s Clean Fuel Standard requirements.</div>
                    <div class="cta">
                        <a href="https://www.cleanfuelcanada.com/">&gt; Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container" style="height: 360px;">
        <div class="row">
            <div class="col-lg-12" style="height: 173px;">
                <div class="main-content banner justify-content-md-center" style="height: 222px;">
                   <div class="banner-inner" style="height: 170px;"><?php the_content(); ?></div>
                </div>
            </div>
        </div>
        <div class="row row-last-news">
            <div class="col-md-6" style="height: 188px">
                <div class="box-news">
                    <div class="box-text">

                        <?php
                        $arg = array(
                            'showposts' => 3,
                            'category_name' => 'news'
                        );

                        $the_query = new WP_Query($arg);
                        if($the_query->have_posts()): ?>
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="asset-title">Latest News</h3>
                            <!--<a href="/about-us/news/"><i class="fas fa-angle-right"></i> News Archives</a>-->
                        </div>
                        <div class="row">
                            <?php
                            while($the_query->have_posts()):
                                $the_query->the_post();
                                ?>

                                <div class="box-asset col-md-4 copy-text-asset">
                                    <a href="<?php the_permalink(); ?>">
                                        <h6><?php the_title(); ?></h6>
                                        <p class="p-more"><i class="fas fa-angle-right"></i> More</p>
                                    </a>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_query();
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="height: 188px">
                <div class="box-news">
                    <div class="box-text">
                        <?php
                        $post_id = 2338;
                        $i = 1;
                        ?>
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="asset-title">Press Releases</h3>
                            <a href="/investors/press-releases/#press-release"><i class="fas fa-angle-right"></i> Press Release Archives</a> 
                        </div>
                        <div class="row">
                            <?php
                            while (have_rows('years', $post_id)): the_row();
                                while (have_rows('items_repeat', $post_id)):
                                    the_row();
                                    if($i == 4) break;
                                    ?>
                                    <div class="box-asset col-md-4 copy-text-asset">
                                        <a href="<?php the_permalink(get_sub_field('file')); ?>" target="_blank">
                                            <h6><?php echo get_sub_field('title'); ?></h6>
                                            <p class="p-more"><i class="fas fa-angle-right"></i> More</p>
                                        </a>
                                    </div>
                                    <?php
                                    $i++;
                                endwhile;
                            endwhile;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="products section-products-page" style="background-color:#f5f5f7;">
        <h1 class="title-section-page">Market Segments</h1>
        <div class="container products-home">
            <div class="row pb-3 line">
                <?php
                if( have_rows('first_row') ):

                    while( have_rows('first_row') ) : the_row(); ?>
                        <div class="col-sm-6 col-md-3 pb-3">
                            <div class="card">
                                <div class="icon">
                                    <div><img src="<?php echo get_sub_field('icon') ?>" alt="<?php echo get_sub_field('title') ?>" style="width: 100%"></div>
                                </div>
                                <div class="title">
                                    <?php echo get_sub_field('title') ?>
                                </div>
                                <div class="content" style="padding: 0 19px;">
                                    <?php echo substr(get_sub_field('content'),0,153).'...' ?>
                                </div>
                                <div class="learn-more" style="padding: 0 19px;">
                                    <a href="<?php echo get_sub_field('learn_more'); ?>"><i class="fas fa-angle-right"></i> More</a>
                                </div>
                            </div>
                        </div>
                       <?php
                    endwhile;
                else :
                    echo "Has not rows";
                endif;
                ?>
                <?php
                if( have_rows('second_row') ):

                    while( have_rows('second_row') ) : the_row(); ?>
                        <div class="col-sm-6 col-md-3 pb-3">
                            <div class="card">
                                <div class="icon">
                                    <div><img src="<?php echo get_sub_field('icon') ?>" alt="<?php echo get_sub_field('title') ?>" style="width: 100%"></div>
                                </div>
                                <div class="title">
                                    <?php echo get_sub_field('title') ?>
                                </div>
                                <div class="content" style="padding: 0 19px;">
                                    <?php echo substr(get_sub_field('content'),0,153).'...' ?>
                                </div>
                                <div class="learn-more" style="padding: 0 19px;">
                                    <a href="<?php echo get_sub_field('learn_more'); ?>"><i class="fas fa-angle-right"></i> Learn More</a>
                                </div>
                            </div>
                        </div>
                       <?php
                    endwhile;

                else :
                    echo "Has not rows";
                endif;
                ?>
            </div>
        </div>
    </section>
    <section class="callbanner" style="background-color:#fff ">
        <div class="container">
            <div class="row">
                <div id="wrap-banner-bottom">
                    <a target="_blank" href="<?php echo get_field('homebannerurl'); ?>">
                        <img class="img-fluid" src="<?php echo get_field('homebanner'); ?>" style="width:100% !important;">
                    </a>
                </div>
            </div>
        </div>
        <h1 class="title-section-page">Primary Locations</h1>
        <div class="container businessunit section-businessunit">
            <div class="row justity-content-center">
            	<div class="col-sm-3 mb-3" style="text-align: center;">
                    <div class="title"><?php echo get_field('name_location_1home'); ?></div>
                    <div class="address"><?php echo get_field('address_line_1home');?></div>
                    <div class="address"><?php echo get_field('address_line_2home');?></div>
                </div>
            </div>
            <div class="row justity-content-center">
                <div class="col-sm-3 mb-3" style="text-align: center;">
                    <div class="title"><?php echo get_field('second_location_name'); ?></div>
                    <div class="address"><?php echo get_field('second_location_address_line_1'); ?></div>
                    <div class="address"><?php echo get_field('second_location_address_line_2'); ?></div>
                </div>
                <div class="col-sm-3 mb-3" style="text-align: center;">
                    <div class="title"><?php echo get_field('third_location_name'); ?></div>
                    <div class="address"><?php echo get_field('third_location_address_line_1'); ?></div>
                    <div class="address"><?php echo get_field('third_location_address_line_2'); ?></div>
                </div>
                <div class="col-sm-3" style="text-align: center;">
                    <div class="title"><?php echo get_field('fourth_location_name'); ?></div>
                    <div class="address"><?php echo get_field('fourth_location_1'); ?></div>
                    <div class="address"><?php echo get_field('fourth_location_2'); ?></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                     <a href="<?php echo get_bloginfo('url') ?>/contact-us/" class="link-more-locations"><i class="fas fa-angle-right"></i> See All Worldwide Locations</a>
                </div>
            </div>
        </div>

    </section>
<?php
get_footer();
?>
