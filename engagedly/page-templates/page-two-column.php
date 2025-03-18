<?php
/**
 * Template Name (Done): Page Two Columns Template
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
    <section class="banner-internal-page banner-internal-page-shape-2 bg-orange">
        <div class="overlay overlay-bg-light-1 overlay-page-shape-2"></div>
        <div class="container d-flex align-items-center justify-content-center container-absolute">
            <div class="row">
                <div class="col-lg-7">
                    <h4 class="title-coniferous cl-white">Case Study</h4>
                    <h1 class="title-page pb-4 mb-0 cl-white text-uppercase">“THERE WERE A LOT OF COSTS TO DOING PERFORMANCE REVIEW THE OLD WAY.”</h1>
                    <div class="copy-text font-adrianna cl-white pb-4">
                        <p><em>- Mark Nemeth, Experian</em></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .banner-internal-page-shape-2::before{
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-products-releases.png) no-repeat top center;
        }
        @media (max-width: 575.98px) {
            .banner-internal-page-shape-2::before{
                background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-press-releases-mv.png) no-repeat top center;
            }
        }
    </style>

    <section class="single-content single relative d-flex align-items-center justify-content-center mt-5 pt-5 mb-5 pb-5 mb-mv-0 pb-mv-0">
        <img src="http://engagedly.co/wp-content/themes/engagedly/assets/img/elipse-main.svg" class="bg-elipse width-30 width-50-sm right-10 bottom-20 bottom-35-sm z-index-0">
        <div class="container">
            <div class="row flex-lg-row-reverse align-items-start justify-content-center">
                <div class="col-lg-6">
                    <!--sidebar area-->
                    <div class="box-become-partner-form z-index-top box-contact-mt mb-5">
                        <h2 class="title-section cl-gray font-adrianna pb-2 text-center">DOWNLOAD CASE STUDY</h2>
                        <form class="become-partner-form w-100 m-auto">
                            <div class="row row-form">
                                <div class="col-md-12">
                                    <div class="box">
                                        <label class="d-block">Name</label>
                                        <input class="w-100" name="your_name" type="text" placeholder="Jane Doe">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="box">
                                        <label class="d-block">Email Address</label>
                                        <input class="w-100" name="your_email" type="email" placeholder="John@examplewebsite.com">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="box">
                                        <label class="d-block">Phone Number</label>
                                        <input class="w-100" name="your_phone" type="text" placeholder="520-123-4567">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="box">
                                        <label class="d-block">Company Name</label>
                                        <input class="w-100" name="company_name" type="text" placeholder="The Sher Agency">
                                    </div>
                                </div>
                                <div class="col-md-12">
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
                                <div class="col-md-12">
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

                            <div class="row row-btn-submit row-request-demo-form pt-4">
                                <div class="col-md-12">
                                    <button type="submit" class="btn-submit w-100">DOWNLOAD NOW</button>
                                </div>
                            </div>
                        </form>
                    </div>					<!--end sidebar area-->
                </div>
                <div class="col-lg-6">
                        <h2 class="title-section pb-4 mb-0 cl-gray text-uppercase">Experian</h2>
                        <h2 class="sub-title-section pb-4 mb-0 cl-gray text-uppercase">CUSTOMIZED, USER-FRIENDLY PERFORMANCE PLATFORM INCREASES EMPLOYEE ENGAGEMENT</h2>
                        <div class="copy-text font-adrianna cl-black pb-4">
                            <p>See How We Increased Emid’s Employee Engagement in Just 6 Months</p>
                            <p>When Mark Nemeth, Head of Performance Optimization, began his position at Experian Data Quality, he found himself wading (or, more likely, drowning) in a sea of Word documents–one for each employee’s annual performance review. “The documents would get lost,” Nemeth explains, “with lots of going back and forth. There would be multiple versions across different emails, with printouts not matching attachments. There was no process to reference those documents and no way to do so systematically, even if we wanted to.” After using Engagedly, however, Experian saw a dramatic change.</p>
                            <ul>
                                <li>Customized gamification promotes employee engagement and recognition</li>
                                <li>Efficient platform cuts time spent on performance review process from four months to four weeks</li>
                                <li>Streamlined system that integrates employee goals and performance into the daily workflow</li>
                                <li>Employee engagement increased by 10% just six months after implementation</li>
                            </ul>
                        </div>
                </div>

            </div>
        </div>
    </section>
<?php get_footer(); ?>
