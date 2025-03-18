<?php
/**
 * Template Name (Done): Documentation Subpage Template
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
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-55 right-15 top-35 z-index-0">
    </section>
    <section class="single-content single simple-sidebar content-wide relative d-flex align-items-center justify-content-center mb-5 pb-5 pt-4 mb-mv-0 pb-mv-0">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-30 left-10 bottom-17 z-index-0">
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
                            <div class="row row-title align-items-center justify-content-center">
                                <div class="col-md-12">
                                    <h2 class="title-section cl-gray font-adrianna text-left mb-0 pb-0">Performance 2.0 - Admin Perspective</h2>
                                    <div class="box-breadcrumbs font-adrianna"><p>Documentation / The Performance Suite / Performance 2.0 - Admin Perspective</p></div>
                                </div>
                            </div>
                            <div class="row align-items-center justify-content-start pb-4">
                                <div class="col-md-12">
                                    <h3 class="sub-title-section-side cl-gray font-adrianna text-left pb-1 mb-0 text-uppercase">Overview</h3>
                                    <div class="copy-text font-adrianna cl-gray pb-4">
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                                        <ul>
                                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                            <li>Sed pulvinar dolor in justo feugiat, sodales porta nisl ullamcorper.</li>
                                            <li>Donec sit amet magna molestie, cursus risus ut, cursus nunc.</li>
                                            <li>Maecenas lobortis quam sed mi elementum ultrices.</li>
                                            <li>Nulla finibus dolor et volutpat pharetra.</li>
                                            <li>Nulla vestibulum sapien eu placerat lobortis.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center justify-content-start pb-4">
                                <div class="col-md-12">
                                    <h3 class="sub-title-section-side cl-gray font-adrianna text-left pb-1 mb-0 text-uppercase">Documentation Sub-Section Heading</h3>
                                    <div class="copy-text font-adrianna cl-gray pb-4">
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                                        <p>Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing</p>
                                        <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. </p>

                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center justify-content-start pb-4">
                                <div class="col-md-12">
                                    <h3 class="sub-title-section-side cl-gray font-adrianna text-left pb-4 text-uppercase">Related Topics</h3>
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
                            <div class="row row-title align-items-center justify-content-center">
                                <div class="col-md-12">
                                    <h2 class="title-section cl-gray font-adrianna text-left mb-0 pb-0">Performance 2.0 - Admin Perspective</h2>
                                    <div class="box-breadcrumbs font-adrianna"><p>Documentation / The Performance Suite / Performance 2.0 - Admin Perspective</p></div>
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
                            <div class="row row-title align-items-center justify-content-center">
                                <div class="col-md-12">
                                    <h2 class="title-section cl-gray font-adrianna text-left mb-0 pb-0">Performance 2.0 - Admin Perspective</h2>
                                    <div class="box-breadcrumbs font-adrianna"><p>Documentation / The Performance Suite / Performance 2.0 - Admin Perspective</p></div>
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
                            <div class="row row-title align-items-center justify-content-center">
                                <div class="col-md-12">
                                    <h2 class="title-section cl-gray font-adrianna text-left mb-0 pb-0">Performance 2.0 - Admin Perspective</h2>
                                    <div class="box-breadcrumbs font-adrianna"><p>Documentation / The Performance Suite / Performance 2.0 - Admin Perspective</p></div>
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
<script type="text/javascript">
    document.getElementById("defaultOpen").click();
</script>
