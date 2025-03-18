<?php
/**
 * Template Name (Done): Documentation Template
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
    <!--<section class="banner-internal relative d-flex align-items-center justify-content-center">-->
    <section class="banner-internal-page banner-internal-page-shape bg-gray">
        <div class="overlay overlay-bg-light-1 overlay-page-shape"></div>
        <div class="container d-flex align-items-center justify-content-center container-absolute">
            <div class="box-banner-internal">
                <h1 class="title-page pb-4 mb-0 cl-white text-uppercase">Product documentation</h1>
                <div class="copy-text font-adrianna cl-ligth-white pb-4">
                    <p>Unlock your team’s potential with Engagedly’s wide range of features.</p>
                    <p>Engagedly’s document aims to give an overview of the capabilities with detailed how-to instructions for its prospective customers and existing users. Click on the following features to understand how Engagedly can help your team!</p>
                </div>
            </div>
        </div>
    </section>
    <style>
        .banner-internal-page-shape::before{
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-documentation.png) top center;
        }
        @media (max-width: 575.98px) {
            .banner-internal-page-shape::before{
                background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-doc-mv.png) top center;
            }
        }
    </style>
    <!--<secion class="top-shape-banner">
        <svg class="banner-internal-left-svg-1" height="130" width="73%">
            <line x1="0" x2="100%" style="stroke:#494B57;stroke-width:30" y1="40" y2="85%"></line>
        </svg>
        <svg class="banner-internal-rigth-svg-1" height="130" width="27%">
            <line style="stroke:#494B57;stroke-width:30" x2="0" y1="40" y2="85%" x1="100%"></line>
        </svg>
    </secion>
    <secion class="bottom-shape-banner">
        <svg class="banner-internal-left-svg-2" width="73%" height="130">
            <line x1="0" x2="100%" y2="85%" y1="40" style="stroke:#ffffff;stroke-width:60"></line>
        </svg>
        <svg class="banner-internal-rigth-svg-2" height="130" width="27%">
            <line x2="0" y1="40" y2="85%" x1="100%" style="stroke:#ffffff;stroke-width:60"></line>
        </svg>
    </secion>-->

    <section class="single-content single simple-sidebar content-wide relative d-flex align-items-center justify-content-center mb-5 pb-5 pt-4 mb-mv-0 pb-mv-0">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-30 right-15 bottom-15 z-index-0">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-35 left-20 top10-percent z-index-0">
        <div class="container">
            <div class="row align-items-start justify-content-center">
                <div class="col-md-4 col-lg-3">
                    <!--left sidebar area-->

                    <div id="side-list-menu" class="card-list-accordeon side-menu fadeInLeft bg-gray mb-5">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span uk-icon="close"></span></a>
                        <div class="nav nav-tabs" id="nav-tab-1" role="tablist">
                            <ul uk-accordion="collapsible: false">
                                <li>
                                    <a class="uk-accordion-title" href="#"><span>Getting Started</span></a>
                                    <div class="uk-accordion-content">
                                        <div class="tablinks w-100 tabintegration" onclick="openCity(event, 'content-integration1')" id="defaultOpen">Performance 2.0 - Admin Perspective</div>
                                        <div class="tablinks w-100 tabintegration" onclick="openCity(event, 'content-integration2')">Performance 2.0 - Admin Perspective</div>
                                    </div>
                                </li>
                                <li>
                                    <a class="uk-accordion-title" href="#"><span>The Performance Suite</span></a>
                                    <div class="uk-accordion-content">
                                        <div class="tablinks w-100 tabintegration" onclick="openCity(event, 'content-integration3')">Performance 2.0 - Admin Perspective</div>
                                    </div>
                                </li>
                                <li>
                                    <a class="uk-accordion-title" href="#"><span>The Employee</span></a>
                                    <div class="uk-accordion-content">
                                        <div class="tablinks w-100 tabintegration" onclick="openCity(event, 'content-integration4')">Performance 2.0 - Admin Perspective</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="open-list-menu d-flex align-items-center justify-content-center" onclick="openNav()"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>

                    <!--end left sidebar area-->
                </div>
                <div class="col-md col-lg">
                    <div class="box-three-products">
                        <div id="content-integration1" class="tabcontent">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-12">
                                    <h3 class="sub-title-section-side cl-gray font-adrianna pb-4 text-uppercase">Getting Started</h3>
                                </div>
                            </div>
                            <div class="row align-items-center justify-content-start">
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>Zapier</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>Zapier</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                    <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                    <div class="copy-text font-adrianna cl-gray-ligth">
                                        <p>Zapier</p>
                                    </div>
                                    <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                </div>
                            </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>User Dashboard</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>User Dashboard</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>User Dashboard</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="content-integration2" class="tabcontent">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-12">
                                    <h3 class="sub-title-section-side cl-gray font-adrianna pb-4 text-uppercase">The Performance Suite</h3>
                                </div>
                            </div>
                            <div class="row align-items-center justify-content-start">
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>Zapier1</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>Zapier1</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>Zapier1</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>User Dashboard2</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>User Dashboard2</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>User Dashboard2</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="content-integration3" class="tabcontent">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-12">
                                    <h3 class="sub-title-section-side cl-gray font-adrianna pb-4 text-uppercase">The Employee Development Suite</h3>
                                </div>
                            </div>
                            <div class="row align-items-center justify-content-start">
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>Zapier3</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>Zapier3</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>Zapier3</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>User Dashboard3</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>User Dashboard3</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>User Dashboard3</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="content-integration4" class="tabcontent">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-12">
                                    <h3 class="sub-title-section-side cl-gray font-adrianna text-uppercase pb-4 text-uppercase">The Employee Engagement Suite</h3>
                                </div>
                            </div>
                            <div class="row align-items-center justify-content-start">
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>Zapier4</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>Zapier4</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>Zapier4</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>User Dashboard4</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>User Dashboard4</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 pb-4">
                                    <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                        <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                                        <div class="copy-text font-adrianna cl-gray-ligth">
                                            <p>User Dashboard4</p>
                                        </div>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
