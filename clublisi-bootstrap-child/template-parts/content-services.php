<?php
/**
 * The template for displaying content in the page-services.php template.
 *
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if( have_rows('slider_testimonials') ): ?>
        <section class="section-testimonials">
            <div class="section-inside-testimonials position-relative m-md-5 m-3">
                <div class="slider-testimonials owl-carousel">
                    <?php while ( have_rows('slider_testimonials') ) : the_row();
                        $title = get_sub_field('title_slider_testimonials');
                        $testimonial = get_sub_field('testimonial_slider_testimonials');
                        $image = get_sub_field('image_slider_testimonials');
                        $cta = get_sub_field('cta_slider_testimonials');
                        $number = get_sub_field('number_slider_testimonials'); ?>
                       <div class="item animated fadeIn item-testimonial">
                           <div class="w-100 h-100 position-relative">
                               <?php if ( !empty($image)) : ?>
                                   <img class="img-fluid fit-cover-center-top w-100 h-100" width="1594" height="560" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                               <?php endif; ?>
                               <div class="overlay overlay-testimonials d-flex align-items-center justify-content-center">
                                   <div class="container h-100">
                                       <div class="row h-100 justify-content-center equal">
                                           <div class="col-md-6">
                                               <div class="box-testimonials w-100 h-100 d-flex align-items-md-center justify-content-center flex-column position-relative">
                                                   <?php if($title): ?>
                                                       <div class="title-banner cl-white mb-3 hide-md"><?php echo $title;?></div>
                                                   <?php endif; ?>
                                                   <?php if($testimonial): ?>
                                                       <div class="headline text-md-center text-left cl-white pb-5"><?php echo $testimonial;?></div>
                                                   <?php endif; ?>
                                                   <?php
                                                   if($cta){
                                                       $link_url = $cta['url'];
                                                       $link_title = $cta['title'];
                                                       $link_target = $cta['target'] ? $cta['target'] : '_self';?>
                                                       <a class="link-testimonials d-flex justify-content-md-center" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?></a>
                                                   <?php } ?>
                                               </div>
                                               <?php if($number): ?><div class="number"><?php echo $number;?></div><?php endif; ?>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php $title_club = get_field('title_club');
    $subtitle_club = get_field('subtitle_club');
    $info_club = get_field('info_club');
    $column_text_1_club = get_field('column_text_1_club');
    $column_text_2_club = get_field('column_text_2_club');
    $column_text_3_club = get_field('column_text_3_club');?>
    <section class="section-club pt-5 pb-md-5">
        <div class="container pt-md-0 pb-md-0 pt-5 pb-5">
            <div class="row">
                <div class="col-md-3 ps-md-5 pe-md-4">
                    <?php if($title_club): ?>
                        <h2 class="cl-black pb-md-0 pb-4"><?php echo $title_club;?></h2>
                    <?php endif; ?>
                    <?php if($subtitle_club): ?>
                        <div class="dp-1 cl-dark pt-lg-4 pt-2 hide-md"><strong><i><?php echo $subtitle_club;?></i></strong></div>
                    <?php endif; ?>
                </div>
                <div class="col-md pe-md-5 ps-md-5 col-r-home">
                    <div class="row">
                        <div class="col-md-4 hide-md">
                            <?php if($column_text_1_club): ?>
                                <div class="dp-1 cl-dark"><?php echo $column_text_1_club;?></div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if($info_club): ?>
                                        <div class="dp-2 cl-dark text-uppercase pb-md-3"><?php echo $info_club;?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 hide-md">
                                    <?php if($column_text_2_club): ?>
                                        <div class="dp-1 cl-dark"><?php echo $column_text_2_club;?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 hide-md">
                                    <?php if($column_text_3_club): ?>
                                        <div class="dp-1 cl-dark"><?php echo $column_text_3_club;?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $title_services = get_field('title_services');
    $cta_services = get_field('cta_services');
    $list_services = get_field('list_services');
   if( have_rows('list_services') ): ?>
    <section class="section-our-services pb-5">
        <div class="container pt-md-5 pb-md-5">
            <div class="row equal">
                <div class="col-md-6 col-lg-5 ps-md-5 pe-md-5 hide-md">
                    <div id="component-nav" class="uk-switcher h-100">
                        <?php while ( have_rows('list_services') ) : the_row();
                        $image = get_sub_field('image_list_services'); ?>
                        <div class="h-100">
                            <?php if ( !empty($image)) : ?>
                                <img class="img-fluid fit-cover-center w-100 h-100" width="452" height="617" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="col-md col-lg">
                    <div class="h-100">
                        <?php if($title_services): ?>
                            <h2 class="cl-black pb-4"><?php echo $title_services;?></h2>
                        <?php endif; ?>
                        <div class="uk-nav uk-nav-default pb-5" uk-accordion="collapsible: false" uk-switcher="connect: #component-nav; animation: uk-animation-fade">
                            <?php while ( have_rows('list_services') ) : the_row();
                            $image = get_sub_field('image_list_services');
                            $title = get_sub_field('title_list_services');
                             $text = get_sub_field('text_list_services');?>
                            <li>
                               <?php if($title): ?>
                                    <a class="uk-accordion-title" href="#"><?php echo $title;?></a>
                               <?php endif; ?>
                                <?php if($text): ?>
                                <div class="uk-accordion-content dp-1 cl-dark">
                                    <?php if ( !empty($image)) : ?>
                                        <img class="img-fluid fit-cover-center w-100 h-100 mb-3 show-md" width="452" height="617" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>
                                    <?php echo $text; ?>
                                </div>
                                <?php endif; ?>
                            </li>
                            <?php endwhile; ?>
                        </div>
                        <?php if($cta_services) {
                            $link_url = $cta_services['url'];
                            $link_title = $cta_services['title'];
                            $link_target = $cta_services['target'] ? $cta_services['target'] : '_self';?>
                            <div class="mt-5 pt-5">
                                <a class="link-post d-flex justify-content-end" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?> <div class="se-icon ps-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 411.79 271.53"><path d="M299.95 9.95c-5.42-6.39-15.02-7.18-21.44-1.74-6.4 5.44-7.19 15.04-1.74 21.44l76.61 90.17H22.22c-8.41 0-15.22 6.81-15.22 15.22s6.81 15.22 15.22 15.22h331.15l-76.61 90.19c-5.45 6.4-4.67 16 1.74 21.44 2.87 2.44 6.36 3.63 9.84 3.63 4.32 0 8.6-1.83 11.61-5.36l106.3-125.11-106.3-125.1z"></path></svg></div></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <?php endif; ?>
    <?php
    $title_case_studies = get_field('title_case_studies');
    $cta_case_studies = get_field('cta_case_studies');
    if( have_rows('list_case_studies') ): ?>
        <section class="section-case-studies pt-5 pb-5">
            <div class="container pt-md-5 pb-md-5">
                <?php if($title_case_studies): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="cl-black"><?php echo $title_case_studies;?></h2>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row row-case-studies equal pt-5">
                    <?php while ( have_rows('list_case_studies') ) : the_row();
                    $text = get_sub_field('text_list_case_studies');
                    $title = get_sub_field('title_list_case_studies');
                    $number = get_sub_field('number_list_case_studies');?>
                        <div class="col-md-4 col-case-studies">
                            <div class="w-100 h-100">
                                <?php if($title):?>
                                    <div class="title-case-studies pb-5 pt-5 text-md-center position-relative">
                                        <?php if($number): ?>
                                            <div class="number-case-studies"><?php echo $number;?></div>
                                        <?php endif; ?>
                                        <?php echo $title;?>
                                    </div>
                                <?php endif; ?>
                                <?php if($text): ?>
                                    <div class="text-case-studies dp-1 cl-dark ps-md-4 pe-md-4">
                                        <?php echo $text;?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php if($cta_services) {
                    $link_url = $cta_services['url'];
                    $link_title = $cta_services['title'];
                    $link_target = $cta_services['target'] ? $cta_services['target'] : '_self';?>
                   <div class="pt-5 mt-md-5">
                       <div class="pt-md-5">
                           <a class="link-post d-flex justify-content-center flex-column align-items-center text-center" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?><div class="line-cta"></div></a>
                       </div>
                   </div>
                <?php } ?>
            </div>
        </section>
    <?php endif; ?>
</article>
<!-- #post-## -->