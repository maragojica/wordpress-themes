<?php
/**
 * Template Name (Done): Industries Template
 * The Case Studies page template file
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
<?php get_header("inner"); ?>
    <section class="banner-internal-page banner-internal-page-shape-2 bg-white">
        <div class="overlay overlay-bg-light overlay-page-shape-2"></div>
        <div class="container d-flex align-items-center justify-content-center container-absolute">
            <div class="box-banner-internal">
                <h1 class="title-page pb-4 mb-0 cl-white text-uppercase">Supercharge with Progressive Talent Management for <span class="cl-orange-2">Technology</span></h1>
                <div class="copy-text font-adrianna cl-ligth-white pb-4">
                    <p>Hundreds of <span class="cl-orange-2">Technology Organizations</span> around the globe use Engagedly to Drive Superior Performance, Engage and Retain People, Drive Innovation and Develop people.</p>
                </div>
                <a href="#" class="btn btn-orange text-uppercase font-adrianna">Request Free Demo</a>
            </div>
        </div>
    </section>
    <style>
        .banner-internal-page-shape-2::before{
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-white-papers.png) no-repeat top center;
        }
        @media (max-width: 575.98px) {
            .banner-internal-page-shape-2::before{
                background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-whitepapers-mv.png) no-repeat top center;
            }
        }
    </style>
    <section id="content-shape-banner" class="bg-gray footer-shape content-higher position-relative z-index-1">
        <div class="container">
            <div class="row flex-lg-row-reverse align-items-start justify-content-center">
                <div class="col-lg-6">
                    <h5 class="info-case-study cl-white font-adrianna">See How We Increased Experian’s Employee Engagement in Just 6 Months</h5>
                    <div class="stack-btn row">
                        <div class="col-md-12">
                            <a href="#" class="btn btn-orange text-uppercase mr-lg-3">See the Case Study</a>
                            <a href="#" target="_blank" class="stack-logo"><img src="http://engagedly.co/wp-content/uploads/2020/02/1280px-Experian_logo.svg_.png" alt="Experian"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                        <div class="blockquote-row bg-gray">
                            <div class="row">
                                <div class="col-1 col-lg-2 pr-0 text-right"><span class="text-blockquote cl-white">&ldquo;</span></div>
                                <div class="col col-text-blockquote">
                                    <p><em>From the process standpoint, we have revolutionized the efficiency of reviews.</em></p>
                                    <h6 class="name-blockquote cl-white pt-3 mb-0">- Mark Nemeth, Experian</h6>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section-offers-container-width">
        <section class="section-grid product-grid-two-columns-right position-relative z-index-0">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/shapes/arrow-center-2.png" class="bg-elipse bg-elipse-tb-none width-45 width-55-smd-1 left15 top-5 top-15-smd-1 z-index-0">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-30 width-70-tb right-10 right-35-tb top-10 top-10-tb z-index-0">
            <div class="container">
                <div class="row flex-lg-row-reverse align-items-center justify-content-center position-relative z-index-3">
                    <div class="col-lg-6">
                        <div class="wrap-box position-relative">
                            <div class="wrap-image img-resp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-1-offers.png" alt="Offers 1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="title-offer font-adrianna cl-gray">Continuous Performance and Project Reviews</h2>
                        <div class="copy-text font-adrianna cl-black pb-4">
                            <p>- Set and align Goals/OKRs to organizational objectives. Research has shown that people that write and track their goals are 42% more likely to achieve them.<br>
                                - Drive check ins and conversations with Ongoing Check Ins with your team.<br>
                                - Set up project teams and project reviews with 360 assessment and CheckIns</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-grid product-grid-two-columns-left position-relative z-index-0">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-35 width-60-tb left-10 right-15-tb top2 top-unset-tb bottom2-tb z-index-0">
            <div class="container">
                <div class="row align-items-center justify-content-center position-relative z-index-3">
                    <div class="col-lg-6">
                        <div class="wrap-box position-relative">
                            <div class="wrap-image img-resp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-1-offers.png" alt="Offers 1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="title-offer font-adrianna cl-gray">Engage and Retain People</h2>
                        <div class="copy-text font-adrianna cl-black pb-4">
                            <p>- Get a pulse on your teams with Engagedly Survey tool.<br>
                                - Get a sense of where the key engagement drivers are and areas within the organizations that need to focussed on.<br>
                                - Develop action plans to improve engagement within your teams with Goals.<br>
                                - Drive organizational culture with value recognition within organization with Badges</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-grid product-grid-two-columns-right position-relative z-index-0">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/shapes/arrow-center-3.png" class="bg-elipse bg-elipse-tb-none width-40 left30 top0 z-index-0">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-35 width-70-tb right-15 right-35-tb top2 top-unset-tb bottom0-tb z-index-0">
            <div class="container">
                <div class="row flex-lg-row-reverse align-items-center justify-content-center position-relative z-index-3">
                    <div class="col-lg-6">
                        <div class="wrap-box position-relative">
                            <div class="wrap-image img-resp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-1-offers.png" alt="Offers 1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="title-offer font-adrianna cl-gray">Drive Innovation</h2>
                        <div class="copy-text font-adrianna cl-black pb-4">
                            <p>- Inspire your teams with Innovation Badges.<br>
                                - Drive more collaboration within project teams and cross functional teams with collaboration tools, groups and knowledge sharing tools.<br>
                                - Set innovation goals with OKRs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-grid product-grid-two-columns-left position-relative z-index-0">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/shapes/arrow-left-3.png" class="bg-elipse bg-elipse-tb-none width-40 left-3 bottom-5 z-index-0">
            <div class="container">
                <div class="row align-items-center justify-content-center position-relative z-index-3">
                    <div class="col-lg-6">
                        <div class="wrap-box position-relative">
                            <div class="wrap-image img-resp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-1-offers.png" alt="Offers 1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="title-offer font-adrianna cl-gray">Develop Skills and Career Growth</h2>
                        <div class="copy-text font-adrianna cl-black pb-4">
                            <p>- Use the Engagedly LMS to launch customized learning modules.<br>
                                - Ensure people stay ahead of the curve with changing regulations and compliance requirements.<br>
                                - Track learning and development organization-wide. Set up internal certifications. Identify and develop future leaders with Engagedly 9 Box.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section id="full-container-banner" class="banner-info banner-info-wform relative d-flex align-items-center justify-content-center z-index-1">
        <div class="overlay overlay-bg-light"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <h2 class="title-section cl-white font-adrianna pb-2 text-center">Request a Demo</h2>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <form class="request-demo-form w-100 m-auto">
                    <div class="row row-form">
                        <div class="col-md-6 pr-up-mv-5 pl-up-mv-5">
                            <div class="box">
                                <label class="d-block">Name</label>
                                <input class="w-100" name="your_name" type="text" placeholder="Jane Doe">
                            </div>
                        </div>
                        <div class="col-md-6 pr-up-mv-5 pl-up-mv-5">
                            <div class="box">
                                <label class="d-block">Region</label>
                                <select name="select_region" class="wide">
                                    <option value="0" data-display="Select">-Select One-</option>
                                    <option value="1">Some option</option>
                                    <option value="2">Another option</option>
                                    <option value="3">Potato</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row row-form">
                        <div class="col-md-6 pr-up-mv-5 pl-up-mv-5">
                            <div class="box">
                                <label class="d-block">Email Address</label>
                                <input class="w-100" name="your_email" type="email" placeholder="John@examplewebsite.com">
                            </div>
                        </div>
                        <div class="col-md-6 pr-up-mv-5 pl-up-mv-5">
                            <div class="box">
                                <label class="d-block">Phone Number</label>
                                <input class="w-100" name="your_phone" type="text" placeholder="520-123-4567">
                            </div>
                        </div>
                    </div>
                    <div class="row row-form">
                        <div class="col-md-6 pr-up-mv-5 pl-up-mv-5">
                            <div class="box">
                                <label class="d-block">Company Name</label>
                                <input class="w-100" name="company_name" type="text" placeholder="The Sher Agency">
                            </div>
                        </div>
                        <div class="col-md-6 pr-up-mv-5 pl-up-mv-5">
                            <div class="box">
                                <label class="d-block">Employee Count</label>
                                <select name="select_employee_count" class="wide">
                                    <option value="0" data-display="Select">-Select One-</option>
                                    <option value="1">Some option</option>
                                    <option value="2">Another option</option>
                                    <option value="3">Potato</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row row-btn-submit row--request-demo-form pt-4">
                        <div class="col-md-12 pr-up-mv-5 pl-up-mv-5">
                            <button type="submit" class="btn-submit w-100">Schedule Now</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </section>
    <style>
        .banner-info{
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-forrm-industries.png) top center;
        }

    </style>
    <section id="section-blog-three-columns" class="d-flex align-items-center justify-content-center position-relative">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 right-15 top-10 z-index-0">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-40 left-20 bottom-5 z-index-0">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-7">
                    <h2 class="title-section cl-gray font-adrianna pb-2">News <span class="font-coniferous cl-orange-2">and Updates</span></h2>
                    <div class="copy-text font-adrianna cl-black">
                        <p>On the back of their explosive growth of employee engagement solutions and performance management methodology, Engagedly has been ranked #2 on the list of top 10 Velocity Brands by The Starr Conspiracy.</p>
                    </div>
                </div>
                <div class="col-md-5 pb-4 pb-md-0">
                    <a href="" class="btn btn-orange text-uppercase">View All posts</a>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="A beginners guide to effective one on one meetings" src="http://engagedly.co/wp-content/uploads/2020/02/post1.jpg">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">February 20</h5>
                            <p class="card-text cl-black font-adrianna">A beginners guide to effective one on one meetings</p>
                            <a href="http://engagedly.co/2020/02/20/a-beginners-guide-to-effective-one-on-one-meetings-3/" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="A beginners guide to effective one on one meetings" src="http://engagedly.co/wp-content/uploads/2020/02/post2.jpg">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">February 20</h5>
                            <p class="card-text cl-black font-adrianna">A beginners guide to effective one on one meetings</p>
                            <a href="http://engagedly.co/2020/02/20/a-beginners-guide-to-effective-one-on-one-meetings-2/" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="A beginners guide to effective one on one meetings" src="http://engagedly.co/wp-content/uploads/2020/02/post3.jpg">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">February 20</h5>
                            <p class="card-text cl-black font-adrianna">A beginners guide to effective one on one meetings</p>
                            <a href="http://engagedly.co/2020/02/20/a-beginners-guide-to-effective-one-on-one-meetings/" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center row-view-post">
                <div class="col-md-12">
                    <a href="http://engagedly.co/" class="btn btn-orange text-uppercase">View All posts</a>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>