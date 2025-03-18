<?php
/**
 * Template Name (Done): Request A Demo Template
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
    <section class="empty-banner"></section>
    <section class="banner-internal relative d-flex align-items-center justify-content-center mb-5 pb-5 mb-mv-0 pb-mv-0">
        <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-7">
                        <h4 class="title-coniferous">See it For Yourself</h4>
                        <h1 class="title-page pb-4 mb-0 cl-gray text-uppercase">Request A free Demo</h1>
                        <div class="copy-text font-adrianna cl-black pb-4">
                            <p>No credit card required, no software to install. With your demo, you get:</p>
                            <ul>
                                <li>Performance Management</li>
                                <li>360 Multirater Feedback</li>
                                <li>Real-Time Feedback</li>
                                <li>Employee Goal Setting Software</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md col-lg pr-mv-0 pl-mv-0">
                        <div class="box-bg-forms w-100 bg-gray">
                            <div class="col-md-12">
                                <h2 class="title-section cl-white font-adrianna pb-2">SCHEDULE A DEMO</h2>
								<!-- SharpSpring Form for Request Demo  -->
								<script type="text/javascript">
									var ss_form = {'account': 'MzawMDGzMDY2AQA', 'formID': 'S7GwMExLtUjWNTUzMdY1MTA217VITTXRNTIzTkpNMTczSUtOBQA'};
									ss_form.width = '100%';
									ss_form.height = '1000';
									ss_form.domain = 'app-3QNET3PCG0.marketingautomation.services';
									// ss_form.hidden = {'Company': 'Anon'}; // Modify this for sending hidden variables, or overriding values
								</script>
								<script type="text/javascript" src="https://koi-3QNET3PCG0.marketingautomation.services/client/form.js?ver=1.1.1"></script>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
<?php get_footer(); ?>