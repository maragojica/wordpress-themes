<?php
/**
 * Template Name (Done): Advisory Board Template
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

<section class="banner-internal-page banner-internal-page-shape-5 bg-gray z-index-5">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-62 width-80-sm right-15 top-15 z-index-1">
    <div class="overlay overlay-bg-white overlay-page-shape-5"></div>
    <div class="container container-absolute d-flex align-items-center justify-content-start z-index-2">
            <div class="box-banner-internal">
                <h4 class="title-coniferous mb-0">About Us</h4>
                <h1 class="title-page cl-gray pb-4 mb-0 text-uppercase">Advisory Board</h1>
                <div class="copy-text font-adrianna cl-black">
                    <p>Improve employee engagement by making the workplace fun and motivating.</p>
                </div>
                <a href="#" class="btn btn-orange text-uppercase mt-2">Request Free Demo</a>
            </div>
    </div>
</section>
    <section id="section-persons-three-columns" class="d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card border-0 mb-5">
                        <img class="card-img-top" alt="Person Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/person1.jpg">
                        <div class="card-body">
                            <div class="card-person-info">
                                <h5 class="person-title font-adrianna cl-gray text-uppercase">William Tincup</h5>
                                <h5 class="person-subtitle font-adrianna cl-gray-ligth text-uppercase">SPHR/SHRM-SCP</h5>
                            </div>
                            <div class="card-text cl-black font-adrianna">William is the CEO of HR consultancy Tincup &Co. At the intersection of HR and Technology, he’s a Writer, Speaker, Advisor, Consultant, Investor, Storyteller & Teacher. He been writing about HR related issues for over a decade. William serves on the Board of Advisors / Board of Directors for 15 HR technology startups. He is a graduate of the University of Alabama of Birmingham with a BA in Art History. He also earned an MA from the University of Arizona and an MBA from Case Western Reserve University.</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 mb-5">
                        <img class="card-img-top" alt="Person Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/person2.jpg">
                        <div class="card-body">
                            <div class="card-person-info">
                                <h5 class="person-title font-adrianna cl-gray text-uppercase">Dan Bloch</h5>
                            </div>
                            <div class="card-text cl-black font-adrianna">Dan is currently the Vice President of North American Financial Services/Canada Applications, Oracle. Before he became VP at Oracle, Dan was a valued employee at Microsoft, where he began as a Senior Enterprise Consultant before working his way up to being Director of Enterprise Sales for Central Canada. With 22 years of experience of tech industry, Dan has a reputation for being an excellent communicator and a charismatic leader. After a Bachelor’s of Science in Neurobiology at McGill University, Dan completed his Master’s in Business Administration from Phoenix University.</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 mb-5">
                        <img class="card-img-top" alt="Person Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/person3.jpg">
                        <div class="card-body">
                            <div class="card-person-info">
                                <h5 class="person-title font-adrianna cl-gray text-uppercase">Gordon Rapkin</h5>
                            </div>
                            <div class="card-text cl-black font-adrianna">Gordon is currently the Principal at ALBA Advantage, helping boards of directors and executives to build positive, sustainable partnerships that create the opportunity to maximize value creation and business success. With over 30 years of experience, Gordon is a multi-time CEO and has held many executive leadership positions. Gordon was most recently the CEO of Archive Systems where he helped the company grow significantly and define a new direction for the records management industry. Archive Systems was purchased by Access Corp. in late 2015. Prior to Archive Systems, Gordon was the CEO of Protegrity Corporation, a pioneer and leader in data security. Earlier in his career, he was a member of the executive team at Hyperion Software, where he was Vice President and General Manager of the Enterprise Business. Gordon was a key member of the team that led the company to an extremely successful initial public offering in October of 1991.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
