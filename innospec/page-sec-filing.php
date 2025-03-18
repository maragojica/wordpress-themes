<?php
//Template name: Page SEC Filings
get_header();
?>
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
        <div class="row">
            <div class="col-lg-3 content-sidebar">
                <?php get_sidebar(); ?>
            </div>
            <div class="col-lg-9 content-main">
                <div class="row">
                    <?php
                    while(have_posts()): the_post();

                        if(get_field("enabled_sidebar")){
                            $col1 = "col-lg-8";
                            $col2 = "col-lg-4";
                        }else{
                            $col1 = "col-lg-12";
                        }
                    ?>

                        <div class="<?php echo $col1; ?>">

                            <div class="wrap-product wrap-content">

                                <?php if(get_the_post_thumbnail_url(get_the_ID(),'full')): ?>
                                    <div class="box-banner img-resp box-banner-margin-left">
                                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="<?php the_title(); ?>">
                                    </div>
                                <?php endif; ?>

                                <?php if(get_field('show_banners')): ?>
                                    <?php if( have_rows('banners') ): ?>
                                        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/assets/css/flexslider.css" type="text/css" media="screen" />

                                        <!-- FlexSlider -->
                                        <script defer src="<?php bloginfo('template_url') ?>/assets/js/jquery.flexslider.js"></script>

                                        <script type="text/javascript">
                                            jQuery(window).load(function(){
                                              jQuery('.flexslider').flexslider({
                                                animation: "fade",
                                                prevText: "",           //String: Set product-titleproduct-titlethe text for the "previous" directionNav item
                                                nextText: "",
                                              });
                                            });
                                        </script>
                                        <div class="box-banner img-resp box-banner-margin-left">
                                            <div class="flexslider">
                                                <ul class="slides">
                                                    <?php while( have_rows('banners') ) : the_row(); ?>
                                                    <li>
                                                        <img src="<?php echo get_sub_field('image') ?>" alt="Banner Innospec"/>
                                                    </li>
                                                    <?php endwhile; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php $parents = get_post_ancestors( $post->ID ); ?>
                                <?php if(count($parents) > 0): ?>
                                    <h1 class="product-title">
                                        <?php if(get_field('link_headline')): ?>
                                            <a href="<?php echo get_field('link_headline') ?>">
                                        <?php endif; ?>
                                            <?php the_title(); ?></h1>
                                        <?php if(get_field('link_headline')): ?>
                                            </a>
                                        <?php endif; ?>
                                    </h1>
                                <?php endif; ?>

                                <div class="content-text">

                                    <?php the_content(); ?>

                                    <?php
                                    $arg = array(
                                        "post_type" => 'sec-filings',
                                        'order' => 'DESC',
                                        'orderby' => 'meta_value',
                                        'meta_query' => array(
                                            array('key' => 'date'))
                                    );
                                    $the_query = new WP_Query($arg); ?>
                                    <style type="text/css">

                                        table.table td {
                                            border: 1px solid #e4e4e4;
                                            padding: 6px 15px;
                                        }
                                        table.table td i{
                                            font-size: 20px;
                                        }
                                        table.table thead th{
                                            border-bottom: none !important;
                                        }

                                        .table-trading {
                                            border-collapse: collapse !important;
                                        }
                                        table.dataTable.no-footer {
                                            border-bottom: none !important;
                                        }
                                        .table-trading tbody {
                                            border: none;
                                        }
                                    </style>

                                    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
                                    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

                                    <table id="data-table" class="table table-trading" style="width:100%" cellpadding="0" cellspacing="0">
                                        <thead class="thead">
                                            <tr>
                                                <th align="center" class="hidden border-none-left border-none-top"></th>
                                                <th align="center" class="center">FILING DATE</th>
                                                <th align="center" class="center">FILING</th>

                                                <th align="center" class="center">DOWNLOAD</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        while($the_query->have_posts()): $the_query->the_post();
                                        ?>
                                        <tr>
                                            <td><?php the_title(); ?></td>
                                            <td><?php echo get_field('date'); ?></td>
                                            <td>
                                                <a target="_blank" href="<?php echo get_field('filing_link') ?>">
                                                <?php echo get_field('filing_text'); ?>
                                                </a>
                                            </td>

                                            <td>
                                                <?php if(get_field('word_download')): ?>
                                                <a download href="<?php echo get_field('word_download') ?>" class="mr-1">
                                                    <i class="fas fa-file-word"></i>
                                                </a>
                                                <?php endif; ?>

                                                <?php if(get_field('excel_download')): ?>
                                                <a download href="<?php echo get_field('excel_download') ?>" class="mr-1">
                                                    <i class="fas fa-file-excel"></i>
                                                </a>
                                                <?php endif; ?>

                                                <?php if(get_field('pdf_download')): ?>
                                                <a target="_blank"> href="<?php echo get_field('pdf_download') ?>" class="mr-1">
                                                    <i class="fas fa-file-pdf"></i>
                                                </a>
                                                <?php endif; ?>

                                                <?php if(get_field('file_download')): ?>
                                                <a target="_blank" href="<?php echo get_field('file_download') ?>" class="mr-1">
                                                    <i class="fas fa-file-alt"></i>
                                                </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php
                                        endwhile;
                                        ?>
                                        </tbody>
                                    </table>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('#data-table').DataTable({
                                                "lengthChange": false,
                                                "bSort": false,
                                            });
                                        } );
                                    </script>
                                </div>
                            </div><!-- wrap-product -->
                        </div>
                        <?php if(get_field("enabled_sidebar")): ?>
                            <div class="<?php echo $col2; ?> sidebar-right">
                                <?php get_sidebar('right'); ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php

get_footer();

?>
