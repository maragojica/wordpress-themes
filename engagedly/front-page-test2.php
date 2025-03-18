<?php
/**
 * Template Name (Done): Home Page Test Template
 * The Home page test 2 template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 */?>
<?php get_header(); ?>
    <section id="banner-home" class="relative">
        <svg class="home-slider-svg-1" viewBox="0 0 100 100" height="100%" width="100%">
            <circle cx="100%" cy="40%" r="65" stroke-width="0" fill="#2175BC" fill-opacity="0.08" />
        </svg>
        <div class="container relative">
            <div class="box-banner-home">
                <img class="img-fluid m-auto d-block img-banner-home-mv" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Intersection 14@2x.png">
                <h1 class="title-page cl-gray pb-5 mb-0">Progressive Performance Management</h1>
                <div class="copy-text font-adrianna cl-black pb-4">
                    <p>A People enablement platform for the digital generation. Performance Management, Engagement and Development</p>
                </div>
                <a href="#" class="btn btn-orange text-uppercase font-adrianna">Request Demo</a>
            </div>
        </div>
    </section>
    <style>
        #banner-home .container{
            background-image: url("<?php echo get_stylesheet_directory_uri(); ?>/assets/img/bg-container-banner-home.png");
            background-size: 46%;
            background-repeat: no-repeat;
        }
    </style>
    <?php
    $args = array(
        'post_type'   => 'sponsors',
        'post_status' => 'publish'
    );

    $sponsors = new WP_Query( $args );
    if( $sponsors->have_posts() ) :
	?>
    <section id="slider-sponsor">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel-sponsor">
                        <div class="owl-carousel owl-theme owl-fourcol-sponsor">
							<?php while( $sponsors->have_posts() ) : $sponsors->the_post(); ?>
                                <div class="item">
                                    <img alt="<?php the_title() ?>" src="<?php the_post_thumbnail_url(); ?>" />
                                </div>
							<?php
							endwhile;
							wp_reset_postdata();
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

    <section class="section-product section-grid product-grid-two-columns-left position-relative">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-30 left-10 top-15">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-20 right-10 bottom-10">
        <div class="container-fluid pr-0 pl-0">
            <div class="row flex-lg-row-reverse align-items-center mr-0 ml-0">
                <div class="col-lg-6">
                    <div class="wrap-text-bullet">
                        <h4 class="title-coniferous">Product solutions</h4>
                        <h2 class="title text-uppercase">Continuous Performance Management</h2>
                        <ul class="list-special"  uk-switcher="connect: #TabsProducts1Content; animation: uk-animation-fade">
                            <li><a href="#">Engaging Performance Reviews and Competency Assessments</a></li>
                            <li class="long-line"><a href="#">Set and Track OKRs/Goals</a></li>
                            <li><a href="#">Drive Frequent Conversations with Ongoing Check-Ins</a></li>
                            <li><a href="#">Comprehensive 360/Multi-rater</a></li>
                            <li><a href="#">Get and Request Real Time Feedback</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 pl-0">
                    <div class="wrap-box position-relative">
                        <div class="wrap-image img-resp">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/happy-colleagues-sitting-in-office-coworking-PHYA6TG.jpg" alt="">
                        </div>
                        <div class="wrap-text wrap-text-overlay wrap-text-floating">
                            <div id="TabsProducts1Content" class="uk-switcher" >
                                <div class="tabsproducts">
                                    <p>Use Engagedly’s 360 feedback tool and help your employees to :</p>
                                    <ul class="mb-4">
                                        <li>Share peer feedback with each other</li>
                                        <li>Increase self-awareness</li>
                                        <li>Uncover blind-spots</li>
                                        <li>Improve planning and implementation of career development opportunities</li>
                                        <li>Enhanced team-working experience</li>
                                    </ul>
                                    <a href="#" class="btn btn-white">REQUEST FREE DEMO</a>
                                </div>
                                <div class="tabsproducts">
                                    <p>2Use Engagedly’s 360 feedback tool and help your employees to :</p>
                                    <ul class="mb-4">
                                        <li>Share peer feedback with each other</li>
                                        <li>Increase self-awareness</li>
                                        <li>Uncover blind-spots</li>
                                        <li>Improve planning and implementation of career development opportunities</li>
                                        <li>Enhanced team-working experience</li>
                                    </ul>
                                    <a href="#" class="btn btn-white">REQUEST FREE DEMO</a>
                                </div>
                                <div class="tabsproducts">
                                    <p>3Use Engagedly’s 360 feedback tool and help your employees to :</p>
                                    <ul class="mb-4">
                                        <li>Share peer feedback with each other</li>
                                        <li>Increase self-awareness</li>
                                        <li>Uncover blind-spots</li>
                                        <li>Improve planning and implementation of career development opportunities</li>
                                        <li>Enhanced team-working experience</li>
                                    </ul>
                                    <a href="#" class="btn btn-white">REQUEST FREE DEMO</a>
                                </div>
                                <div class="tabsproducts">
                                    <p>4Use Engagedly’s 360 feedback tool and help your employees to :</p>
                                    <ul class="mb-4">
                                        <li>Share peer feedback with each other</li>
                                        <li>Increase self-awareness</li>
                                        <li>Uncover blind-spots</li>
                                        <li>Improve planning and implementation of career development opportunities</li>
                                        <li>Enhanced team-working experience</li>
                                    </ul>
                                    <a href="#" class="btn btn-white">REQUEST FREE DEMO</a>
                                </div>
                                <div class="tabsproducts">
                                    <p>5Use Engagedly’s 360 feedback tool and help your employees to :</p>
                                    <ul class="mb-4">
                                        <li>Share peer feedback with each other</li>
                                        <li>Increase self-awareness</li>
                                        <li>Uncover blind-spots</li>
                                        <li>Improve planning and implementation of career development opportunities</li>
                                        <li>Enhanced team-working experience</li>
                                    </ul>
                                    <a href="#" class="btn btn-white">REQUEST FREE DEMO</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-product section-grid product-grid-two-columns-right position-relative">
        <div class="container-fluid pr-0 pl-0">
            <div class="row align-items-center mr-0 ml-0">
                <div class="col-lg-6">
                    <div class="wrap-text-bullet">
                        <h4 class="title-coniferous">Product solutions</h4>
                        <h2 class="title text-uppercase">Employee Engagement</h2>
                        <ul class="list-special"  uk-switcher="connect: #TabsProducts2Content; animation: uk-animation-fade">
                            <li><a href="#">Drive Employee Recognition with Badges</a></li>
                            <li class="long-line"><a href="#">Social Praise to give shout outs!</a></li>
                            <li><a href="#">Drive behaviors with Gamification and Rewards</a></li>
                            <li><a href="#">Easy to use Employee Surveys</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 pr-0">
                    <div class="wrap-box position-relative">
                        <div class="wrap-image img-resp">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/christmas-visit-SEX4Y7L.png" alt="Christmas Visit">
                        </div>
                        <div class="wrap-text wrap-text-overlay wrap-text-floating">
                            <div id="TabsProducts2Content" class="uk-switcher" >
                                <div class="tabsproducts">
                                    <p class="mb-4">6Badges are basically icons that users receive for participating in the Engagedly application. There are 6 different badges and each badge has 5 levels. When a user accumulates a certain number of points for an activity in the employee recognition software, such as sharing knowledge with others in the organization for example, they will unlock badges.</p>
                                    <a href="#" class="btn btn-white">REQUEST FREE DEMO</a>
                                </div>
                                <div class="tabsproducts">
                                    <p class="mb-4">7Badges are basically icons that users receive for participating in the Engagedly application. There are 6 different badges and each badge has 5 levels. When a user accumulates a certain number of points for an activity in the employee recognition software, such as sharing knowledge with others in the organization for example, they will unlock badges.</p>
                                    <a href="#" class="btn btn-white">REQUEST FREE DEMO</a>
                                </div>
                                <div class="tabsproducts">
                                    <p class="mb-4">8Badges are basically icons that users receive for participating in the Engagedly application. There are 6 different badges and each badge has 5 levels. When a user accumulates a certain number of points for an activity in the employee recognition software, such as sharing knowledge with others in the organization for example, they will unlock badges.</p>
                                    <a href="#" class="btn btn-white">REQUEST FREE DEMO</a>
                                </div>
                                <div class="tabsproducts">
                                    <p class="mb-4">9Badges are basically icons that users receive for participating in the Engagedly application. There are 6 different badges and each badge has 5 levels. When a user accumulates a certain number of points for an activity in the employee recognition software, such as sharing knowledge with others in the organization for example, they will unlock badges.</p>
                                    <a href="#" class="btn btn-white">REQUEST FREE DEMO</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-product section-grid product-grid-two-columns-left position-relative">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-30 left-10 top-10">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-20 right-5 bottom-10">
        <div class="container-fluid pr-0 pl-0">
            <div class="row flex-lg-row-reverse align-items-center mr-0 ml-0">
                <div class="col-lg-6">
                    <div class="wrap-text-bullet">
                        <h4 class="title-coniferous">Product solutions</h4>
                        <h2 class="title text-uppercase">Employee Development and Growth</h2>
                        <ul class="list-special"  uk-switcher="connect: #TabsProducts3Content; animation: uk-animation-fade">
                            <li><a href="#">Drive Development Learning Management System (LMS)</a></li>
                            <li class="long-line"><a href="#">Increase Retention and Growth with Talent Mobility</a></li>
                            <li><a href="#">Mentoring Program Management</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 pl-0">
                    <div class="wrap-box position-relative">
                        <div class="wrap-image img-resp">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/happy-colleagues-sitting-in-office-coworking-PHYA6TG.jpg" alt="">
                        </div>
                        <div class="wrap-text wrap-text-overlay wrap-text-floating">
                            <div id="TabsProducts3Content" class="uk-switcher" >
                                <div class="tabsproducts">
                                    <p>10Use Engagedly’s 360 feedback tool and help your employees to :</p>
                                    <ul class="mb-4">
                                        <li>Share peer feedback with each other</li>
                                        <li>Increase self-awareness</li>
                                        <li>Uncover blind-spots</li>
                                        <li>Improve planning and implementation of career development opportunities</li>
                                        <li>Enhanced team-working experience</li>
                                    </ul>
                                    <a href="#" class="btn btn-white">REQUEST FREE DEMO</a>
                                </div>
                                <div class="tabsproducts">
                                    <p>11Use Engagedly’s 360 feedback tool and help your employees to :</p>
                                    <ul class="mb-4">
                                        <li>Share peer feedback with each other</li>
                                        <li>Increase self-awareness</li>
                                        <li>Uncover blind-spots</li>
                                        <li>Improve planning and implementation of career development opportunities</li>
                                        <li>Enhanced team-working experience</li>
                                    </ul>
                                    <a href="#" class="btn btn-white">REQUEST FREE DEMO</a>
                                </div>
                                <div class="tabsproducts">
                                    <p>12Use Engagedly’s 360 feedback tool and help your employees to :</p>
                                    <ul class="mb-4">
                                        <li>Share peer feedback with each other</li>
                                        <li>Increase self-awareness</li>
                                        <li>Uncover blind-spots</li>
                                        <li>Improve planning and implementation of career development opportunities</li>
                                        <li>Enhanced team-working experience</li>
                                    </ul>
                                    <a href="#" class="btn btn-white">REQUEST FREE DEMO</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-product section-grid product-grid-two-columns-right position-relative">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-20 left-10 bottom-10">
            <div class="container-fluid pr-0 pl-0">
                <div class="row align-items-center mr-0 ml-0">
                    <div class="col-lg-6">
                        <div class="wrap-text-bullet">
                            <h4 class="title-coniferous">Product solutions</h4>
                            <h2 class="title text-uppercase">Analytics and Workforce Planning</h2>
                            <ul class="list-special"  uk-switcher="connect: #TabsProducts4Content; animation: uk-animation-fade">
                                <li><a href="#">Develop Advanced Talent Insights</a></li>
                                <li class="long-line"><a href="#">Proactive Succession Planning and 9 Box</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 pr-0">
                        <div class="wrap-box position-relative">
                            <div class="wrap-image img-resp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/christmas-visit-SEX4Y7L.png" alt="Christmas Visit">
                            </div>
                            <div class="wrap-text wrap-text-overlay wrap-text-floating">
                                <div id="TabsProducts4Content" class="uk-switcher" >
                                    <div class="tabsproducts">
                                        <p class="mb-4">13Badges are basically icons that users receive for participating in the Engagedly application. There are 6 different badges and each badge has 5 levels. When a user accumulates a certain number of points for an activity in the employee recognition software, such as sharing knowledge with others in the organization for example, they will unlock badges.</p>
                                        <a href="#" class="btn btn-white">REQUEST FREE DEMO</a>
                                    </div>
                                    <div class="tabsproducts">
                                        <p class="mb-4">14Badges are basically icons that users receive for participating in the Engagedly application. There are 6 different badges and each badge has 5 levels. When a user accumulates a certain number of points for an activity in the employee recognition software, such as sharing knowledge with others in the organization for example, they will unlock badges.</p>
                                        <a href="#" class="btn btn-white">REQUEST FREE DEMO</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php
    $args = array(
        'post_type'   => 'testimonials',
        'post_status' => 'publish'
    );

    $testimonials = new WP_Query( $args );
    if( $testimonials->have_posts() ) :
	?>
    <section id="testimonials-two-columns" class="testimonials-area relative d-flex align-items-center justify-content-center z-index-2">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row flex-md-row-reverse align-items-center justify-content-center">
                <div class="col-md-12 col-lg-6">
                    <div class="carousel-onecol-testimonials">
                        <div class="open-qote cl-orange-2">&ldquo;</div>
                        <div class="owl-carousel owl-theme owl-onecol-testimonials">
	                        <?php while( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
                            <div class="item row row-testimonials align-items-center justify-content-center">
                                <div class="col-9">
                                    <p>“<?php echo strip_tags(get_the_content()); ?>”</p>
                                    <h6 class="name-testimonials cl-gray"><?php echo get_field( "testimonial_name" ); ?></h6>
                                </div>
                                <div class="col-3">
                                    <img class="rounded-50 mx-auto d-block img-testimonials" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                </div>
                            </div>
	                        <?php
	                        endwhile;
	                        wp_reset_postdata();
	                        ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <h2 class="title-section cl-white font-adrianna pb-2">With the Engagedly Platform, organizations can <span class="font-coniferous cl-orange-2">align and motivate</span> THEIR WORKFORCE!</h2>
                    <div class="copy-text font-adrianna cl-ligth-white">
                        <p>We believe that companies can improve employee engagement by making the workplace fun and motivating. This belief is the core of everything we do.</p>
                    </div>
                    <a href="#" class="btn btn-white text-uppercase">Learn About Our Technology</a>

                </div>

            </div>
        </div>
    </section>
    <?php endif; ?>
    <style>
        #testimonials-two-columns{
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/happy-colleagues-sitting-in-office-coworking-PHYA6TG@2x.png) top center;
        }
    </style>
    <section id="section-blog-three-columns" class="d-flex align-items-center justify-content-center position-relative">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-30 right-20 top-10">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-40 left-5 bottom-10">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-7">
                    <h2 class="title-section cl-gray font-adrianna pb-2">News <span class="font-coniferous cl-orange-2">and Knowledge Base</span></h2>
                    <div class="copy-text font-adrianna cl-black">
                        <p>On the back of their explosive growth of employee engagement solutions and performance management methodology, Engagedly has been ranked #2 on the list of top 10 Velocity Brands by The Starr Conspiracy.</p>
                    </div>
                </div>
                <div class="col-md-5">
                    <a href="#" class="btn btn-orange text-uppercase">KNOWLEDGE CENTER</a>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/post1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">December 16</h5>
                            <p class="card-text cl-black font-adrianna">A beginners guide to effective one on one meetings</p>
                            <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/post2.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">December 16</h5>
                            <p class="card-text cl-black font-adrianna">A beginners guide to effective one on one meetings</p>
                            <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/post3.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">December 16</h5>
                            <p class="card-text cl-black font-adrianna">A beginners guide to effective one on one meetings</p>
                            <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                READ MORE</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row align-items-center justify-content-center row-view-post">
                <div class="col-md-12">
                    <a href="#" class="btn btn-orange text-uppercase">View All posts</a>
                </div>
            </div>
        </div>
    </section>
    <section id="section-banner-two-columns" class="d-flex align-items-center justify-content-center z-index-2 position-relative">
        <div class="container-fluid pr-0 pl-0">
            <div class="row align-items-center justify-content-center bg-gray mr-0 ml-0 position-relative">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main-2.svg" class="bg-elipse width-10 left5 top0">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main-2.svg" class="bg-elipse width-20 left25 top5">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main-2.svg" class="bg-elipse width-15 left-5 bottom-5">
                <div class="col-lg-6 pr-0 pl-0">
                    <div class="box-text">
                        <h4 class="title-coniferous">Supercharge</h4>
                        <h2 class="title-section cl-white font-adrianna pb-2">Your Team’s Engagement</h2>
                        <div class="copy-text font-adrianna cl-ligth-white">
                            <p>Let your employees connect & collaborate, share ideas, ask for help and communicate values organization wide.</p>
                        </div>
                        <a href="#" class="btn btn-white text-uppercase">Request Free Demo</a>
                    </div>
                </div>
                <div class="col-lg-6 pr-0 pl-0 wrap-image">
                    <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/three-business-people-in-the-office-talking-PZMXXU7@2x.png" alt="img-banner">
                </div>
            </div>
        </div>
    </section>
    <section id="section-newsletter">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h2 class="title-section cl-gray font-adrianna pb-2">Join Our NEWSLETTER</h2>
                    <div class="box-newsletter-email">
                        <a class="newsletter-email font-coniferous" href="mailto:welove@engagedly.com" target="_blank">welove@engagedly.com</a>
                    </div>
                    <a href="#" class="btn btn-border-orange text-uppercase">Subscribe here</a>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
