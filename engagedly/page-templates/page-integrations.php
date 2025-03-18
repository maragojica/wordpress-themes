<?php
/**
 * Template Name (Done): Integrations Template
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
<?php get_header(); ?>
    <section class="empty-banner relative">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-55 right-15 top-40 z-index-0">
    </section>
    <section class="single-content single simple-sidebar content-wide relative d-flex align-items-center justify-content-center mb-5 pb-5 mb-mv-0 pb-mv-0">
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
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-12">
                                <h2 class="title-section cl-gray font-adrianna pb-4">Integrations</h2>
                            </div>
                        </div>
                        <div id="content-integration1" class="tabcontent">
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
    <section id="section-banner-two-columns" class="d-flex align-items-center justify-content-center">
        <div class="container-fluid pr-0 pl-0">
            <div class="row align-items-center justify-content-center bg-gray mr-0 ml-0 position-relative">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main-2.svg" class="bg-elipse width-10 left5 top0 z-index-0">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main-2.svg" class="bg-elipse width-20 left25 top5 z-index-0">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main-2.svg" class="bg-elipse width-15 left-5 bottom-5 z-index-0">
                <div class="col-lg-6 pr-0 pl-0">
                    <div class="box-text">
                        <h4 class="title-coniferous mb-0">Supercharge</h4>
                        <h2 class="title-section cl-white font-adrianna pb-2 mt-0">Your Team’s Engagement</h2>
                        <div class="copy-text font-adrianna cl-ligth-white"><p>Let your employees connect &amp; collaborate, share ideas, ask for help and communicate values organization wide.</p>
                        </div>
                        <a href="" class="btn btn-white text-uppercase">Request Free Demo</a>
                    </div>
                </div>
                <div class="col-lg-6 pr-0 pl-0 wrap-image">
                    <img class="img-fluid" src="http://engagedly.co/wp-content/uploads/2020/02/three-business-people-in-the-office-talking-PZMXXU7@2x.png" alt="three-business-people-in-the-office-talking-PZMXXU7@2x">
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>