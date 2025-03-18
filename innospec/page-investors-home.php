<?php
//Template name: Investors Home

get_header();
?>
<div class="investors home">
    <section id="hero" style="background:url(/wp-content/uploads/2022/05/hero-investors.jpg) no-repeat !important;background-size: cover!important;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="headline-hero">Investors</div>
                </div>
                <div class="col-md-6"> 
                    <?php //if(isset($_GET['stock'])): ?>
                    <?php echo do_shortcode("[nasdaq]"); ?>
                    <?php //endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
            <nav class="breadcrumb">
                <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                </nav>
            </div>
        </div>
        <div class="row row-intro">
            <div class="col-lg-6"> 
                <?php the_content(); ?>
            </div>
            <div class="col-lg-6">
                <div class="investment">
                    <div class="item">
                        <div class="value">$<span class="display-counter" data-value="1.96" id="value16">0</span>bn</div>
                        <div class="text">2022 Net Sales</div>
                    </div>
                    <div class="item">
                        <div class="value display-counter" data-value="2100" id="value1900">0</div>
                        <div class="text">Employees</div>
                    </div>
                    <div class="item">
                        <div class="value display-counter" data-value="13" id="value188">0</div>
                        <div class="text">Manufacturing Sites</div>
                    </div>
                    <div class="item">
                        <div class="value display-counter" data-value="25" id="value24">0</div>
                        <div class="text">Countries</div>
                    </div>

                    <style type="text/css">
                        .display-counter{
                            display: inline-block;
                        }
                        #value16{ min-width: 80px; }
                        #value1900{ min-width: 92px; }
                        #value188{ min-width: 69px; }
                        #value24{ min-width: 46px; }

                        @media(max-width: 767px){
                            #value16{ min-width: 50px; }
                            #value1900{ min-width: 60px; }
                            #value188{ min-width: 45px; }
                            #value24{ min-width: 30px; }
                        }
                    </style>
                    
                    <script type="text/javascript">
                    jQuery(document).ready(function(){
                        jQuery(".display-counter").each(function () {
                            jQuery(this)
                              .prop("Counter", 0)
                              .animate(
                                {
                                  Counter: jQuery(this).data('value')
                                },
                                {
                                  duration: 4000,
                                  easing: "swing",
                                  step: function (now, tween) {
                                    // Check added for decimal number
                                    if(parseInt(tween.end) == parseFloat(tween.end)){
                                      jQuery(this).text(Math.ceil(now));
                                    } else{
                                      jQuery(this).text(now.toFixed(2));
                                    }
                                  },
                                }
                              );
                          });
                    });                    
                    </script>
                </div>
            </div>
        </div>
    </section>
    <div class=" section-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    
                    <div class="featured-information">
                        <h3 class="headline">Featured Information</h3>
                        <p>Click on the links below to view</p>
                        <div class="icon-down">
                            <a style="color: inherit; margin-right: 15px;" href="https://innospecsustainability.com/" target="_blank">
                                <img src="<?php echo get_template_directory_uri() ?>/img/icon-download.png">
                                Sustainability Report
                            </a>
                        </div>
                        <div class="icon-down">
                            <a style="color: inherit; margin-right: 15px;" href="https://innospec.ir.edgar-online.com/fetchFilingFrameset.aspx?FilingID=15668981&Type=HTML&filename=INNOSPEC_INC_DEF_14A_20220318" target="_blank">
                                <img src="<?php echo get_template_directory_uri() ?>/img/icon-download.png">
                                Proxy Statement
                            </a> 
                        </div>
                        <!--<div class="icon-down">
                            <a style="color: inherit; margin-right: 15px;" href="https://innospec.ir.edgar-online.com/fetchFilingFrameset.aspx?FilingID=15577261&Type=HTML&filename=INNOSPEC_INC_10K_20220216" target="_blank">
                                <img src="<?php echo get_template_directory_uri() ?>/img/icon-download.png">
                                Form 10-K
                            </a>
                        </div>-->
                    </div>
                    
                </div>
                <!--<div class="col-lg-4">
                    <div class="latest-news">
                        <?php
                        $arg = array(
                            'showposts' => 3,
                            'category_name' => 'news'
                        );

                        $the_query = new WP_Query($arg);
                        if($the_query->have_posts()): ?>

                        <div class="headline-btn">
                            <h3 class="headline">
                                <span>Latest News</span>
                                
                            </h3>
                        </div>
                        <?php
                        while($the_query->have_posts()):
                            $the_query->the_post();
                            ?>
                        <div class="items">
                            <div class="item">
                                <div class="meta"><?php the_time('m/d/y'); ?></div>
                                <div class="title"><?php the_title(); ?></div>
                                <div class="more">
                                    <a href="<?php the_permalink(); ?>">> More</a>
                                </div>
                            </div>
                        </div>
                        <?php
                            endwhile;
                        wp_reset_query();
                        endif;
                        ?>
                    </div>
                </div>-->
                <div class="col-lg-6">
                    <div class="latest-news" id="press-release">
                        <div class="headline-btn">
                            <h3 class="headline">
                                <span>Press Release</span>
                                <!--<a href="#">View All News</a>-->
                            </h3>
                        </div>
                        <div class="items">
                            <?php
                            $post_id = 2338;
                            $i = 1;
                            
                            while (have_rows('years', $post_id)): the_row();
                                while (have_rows('items_repeat', $post_id)):
                                    the_row();
                                    if($i > 5) break;
                                    ?>
                                    <div class="item">
                                        <div class="title"><?php echo get_sub_field('title'); ?></div>
                                        <div class="more">
                                            <a target="_blank" href="<?php the_permalink(get_sub_field('file')); ?>">> More</a>
                                        </div>
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
    </div>
    <div class="latest-presentation">
        <div class="container">
            <h3 class="headline" style="border:none;">Latest Presentation</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="slide-tools mx-auto">
                         <?php
             $file = get_field('pdf_file');
             if( $file ): ?>
                        <iframe title="<?php echo the_field('pdf_title'); ?>" style="width: 1170px;height: 650px;max-width: 100%;max-height: 100%;" src="<?php echo site_url(); ?>/pdf-js/viewer.html?file=<?php echo $file; ?>#zoom=page-fit" allowfullscreen webkitallowfullscreen>></iframe>
             <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row meta">
                <div class="col-lg-12">
                    <div class="wrap-subhead">
                        <div class="date"><?php the_field('pdf_date'); ?></div>
                        <h3><?php the_field('pdf_title'); ?></h3>
                         <?php if( $file ): ?>
                        <div class="download-pdf"><a href="<?php echo $file; ?>"><img src="<?php echo get_template_directory_uri() ?>/img/icon-download-white.png"> Download PDF</a></div>
                        <?php endif; ?>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div class="section-bg">
        <section class="container">
            <div class="row align-items-center">
                <!--<div class="col-lg-6">
                    <div class="featured-events">
                        <div class="headline-btn">
                            <h3 class="headline">
                                <span>Featured Events</span>
                                <a href="#">View All Events</a>
                            </h3>
                        </div>
                        <div class="events">
                            <link href="https://addtocalendar.com/atc/1.5/atc-style-blue.css" rel="stylesheet" type="text/css">
                            <script type="text/javascript">(function () {
                                if (window.addtocalendar)if(typeof window.addtocalendar.start == "function")return;
                                if (window.ifaddtocalendar == undefined) { window.ifaddtocalendar = 1;
                                    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                                    s.type = 'text/javascript';s.charset = 'UTF-8';s.async = true;
                                    s.src = ('https:' == window.location.protocol ? 'https' : 'http')+'://addtocalendar.com/atc/1.5/atc.min.js';
                                var h = d[g]('body')[0];h.appendChild(s); }})();
                            </script>

                            <?php
                            if( have_rows('events') ):
                                while( have_rows('events') ) : the_row();
                                    ?>
                                    <div class="event">
                                        <div class="event-date"><?php echo get_sub_field('event_date_start'); ?></div>
                                        <div class="event-title"><?php echo get_sub_field('event_title'); ?></div>
                                        <div class="event-link">
                                            <span class="addtocalendar atc-style-blue">
                                                <a class="atcb-link">> Add to Calendar</a>
                                                <var class="atc_event">
                                                    
                                                    <var class="atc_date_start"><?php echo get_sub_field('event_date_start'); ?></var>
                                                    <var class="atc_date_end"><?php echo get_sub_field('event_date_end'); ?></var>
                                                    <var class="atc_timezone"><?php echo get_sub_field('event_timezone'); ?></var>
                                                    <var class="atc_title"><?php echo get_sub_field('event_title'); ?></var>
                                                    <var class="atc_description"><?php echo get_sub_field('event_description'); ?></var>
                                                    <var class="atc_location"><?php echo get_sub_field('event_location'); ?></var>
                                                    <var class="atc_organizer"><?php echo get_sub_field('event_organizer'); ?></var>
                                                    <var class="atc_organizer_email"><?php echo get_sub_field('event_organizer_email'); ?></var>
                                                 
                                                </var>
                                            </span>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                            else :
                                echo "<p>No exist events</p>";
                            endif;
                            ?>
                        </div>
                    </div>
                </div>-->
                
                <div class="col-lg-6">
                    <div class="featured-earnings">
                        <h3 class="headline">Latest Earnings Report</h3>
                        <p>Click on the links below to view</p>
                        <div class="icon-down">
                            <a target="_blank" style="color: inherit; margin-right: 15px;" href="/investors/reporting/#quarterly-conference-call">
                                <img src="<?php echo get_template_directory_uri() ?>/img/icon-download.png">
                                Conference Call
                            </a>
                        </div>
                        <div class="icon-down">
                            <a target="_blank" style="color: inherit; margin-right: 15px;" href="https://innospec.com/investors/reporting/#sec-filings">
                                <img src="<?php echo get_template_directory_uri() ?>/img/icon-download.png">
                                Form 10-Q
                            </a> 
                        </div>
                        <div class="icon-down">
                            <a target="_blank" style="color: inherit; margin-right: 15px;" href="https://innospec.com/investors/reporting/#quarterly-earnings">
                                <img src="<?php echo get_template_directory_uri() ?>/img/icon-download.png">
                                Presentation
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </section>
    </div>

    <?php get_template_part( 'footer-investors' ); ?>

</div>

<?php
get_footer();
?>
