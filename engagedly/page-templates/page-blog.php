<?php
/**
 * Template Name (Done): Blog Template
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
    <section class="banner-internal-page banner-internal-page-shape bg-orange">
        <div class="overlay overlay-bg-light-1 overlay-page-shape"></div>
        <div class="container d-flex align-items-center justify-content-center container-absolute">
           <div class="box-banner-internal m-auto">
               <h1 class="title-page pb-4 mb-0 cl-white text-uppercase text-center">The Engagedly Blog</h1>
               <form name="search" method="get" action="/" class="form-search">
                   <div class="input-group">
                       <span class="input-group-btn group-img-search"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ios-search.svg" border="0"> </span>
                       <input type="text" class="form-control" name="s" id="search" placeholder="Search terms, topics, or questions.">
                       <span class="input-group-btn group-btn-search"> <button type="submit" class="btn btn-default btn-search">SEARCH</button> </span>
                   </div>
               </form>
           </div>
        </div>
    </section>
    <style>
        .banner-internal-page-shape::before{
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-blog.png) top center;
        }
        @media (max-width: 575.98px) {
            .banner-internal-page-shape::before{
                background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-blog-mv.png) top center;
            }
        }
    </style>

    <section id="section-blog-three-columns" class="blog-page-sections relative d-flex align-items-center justify-content-center">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 right-10 bottom-10 z-index-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h2 class="title-blog font-adrianna cl-gray text-uppercase text-center pb-5">360 Degree Feedback</h2>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Press Release" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/press-release-post.jpg">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">November 14</h5>
                            <p class="card-text cl-black font-adrianna">Quick tips for giving effective feedback to your co-workers</p>
                            <p class="card-subtext cl-gray-ligth font-adrianna">Most organizations these days are designed in such a way that all these different departments are interconnected and contribute to accomplishing</p>
                            <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Press Release" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/post-blog-1.jpg">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">November 14</h5>
                            <p class="card-text cl-black font-adrianna">Choosing the right 360 feedback software</p>
                            <p class="card-subtext cl-gray-ligth font-adrianna">A feedback culture where employees enthusiastically participate by receiving and giving feedback to their managers, colleagues and theirs…</p>
                            <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Press Release" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/post-blog-2.jpg">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">November 14</h5>
                            <p class="card-text cl-black font-adrianna">Gratitude is a part of employee recognition too</p>
                            <p class="card-subtext cl-gray-ligth font-adrianna">The holiday season is upon us.</p>
                            <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <a href="#" class="btn btn-orange text-uppercase float-none">All Articles</a>
                </div>
            </div>
            <div class="row align-items-center justify-content-center pt-100">
                <div class="col-md-12">
                    <h2 class="title-blog font-adrianna cl-gray text-uppercase text-center pb-5">Employee Engagement</h2>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Press Release" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/post-blog-3.jpg">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">November 14</h5>
                            <p class="card-text cl-black font-adrianna">Navigate the office holiday party like a boss</p>
                            <p class="card-subtext cl-gray-ligth font-adrianna">It’s that time of the year again.</p>
                            <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Press Release" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/post-blog-4.jpg">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">November 14</h5>
                            <p class="card-text cl-black font-adrianna">Hr management software for work-life balance</p>
                            <p class="card-subtext cl-gray-ligth font-adrianna">Work/ life balance is one of the most vital aspects of the corporate world. It is not clear what work/life balance actually signifies. It means different things...</p>
                            <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Press Release" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/post-blog-5.jpg">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">November 14</h5>
                            <p class="card-text cl-black font-adrianna">Boost employee engagement by boosting productivity</p>
                            <p class="card-subtext cl-gray-ligth font-adrianna">It’s not just important to work hard. Working smart is also crucial.</p>
                            <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12 text-center">
                    <a href="#" class="btn btn-orange text-uppercase float-none">All Articles</a>
                </div>
            </div>

        </div>
    </section>


<?php get_footer(); ?>
