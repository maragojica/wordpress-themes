<?php
/**
 * The template for displaying content in the page-ourwork.php template.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
        $bg_graphic = get_field('bg_graphic');
       $description = get_field('description');
    ?>
    <section class="section-main-single section-banner section-portfolio-header pb-md-5 pb-4" <?php if(!empty($bg_graphic)): ?>style="background: url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php endif; ?>>
        <div class="container pt-md-5 pt-4">
            <div class="row pt-lg-5">
                <div class="col-lg-8">
                    <h1 class="cl-white text-uppercase mb-4 pb-lg-5 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php the_title(); ?></h1>
                    <?php if($description): ?>
                    <h3 class="cl-white wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $description; ?></h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php $show_slider = get_field('show_slider');
        if($show_slider):
        if( have_rows('our_work_carousel') ): ?>
                <div class="container-fluid container-fluid-center pe-0 ps-0 pt-5">
                    <div class="posts-carousel owl-carousel pt-md-5 pb-md-5">
                        <?php
                        while( have_rows('our_work_carousel') ): the_row();
                            $slide = get_sub_field('image');
                            ?>
                            <div class="item animated fadeIn">
                                <?php if ( !empty($slide)) : ?>
                                    <div class="w-100 h-100 box-image-slider radius-6">
                                        <img class="img-fluid radius-6 h-100 w-100 h-100 fit-cover-center" src="<?php echo esc_url($slide['url']); ?>" alt="<?php echo esc_attr($slide['alt']); ?>" />
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
        <?php endif; ?>       
        <?php endif; ?>  
        <?php if( have_rows('areas_of_work') ): ?>
            <?php while( have_rows('areas_of_work') ): the_row();

                // Get sub field values.
                $headline = get_sub_field('headline');
                $project_goals_section_id = get_sub_field('section_id');              
                ?>
               <div class="section-areas pt-5 pb-md-5 pb-2">
               <div class="container pt-md-5 pt-2" id="<?php echo $project_goals_section_id; ?>">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <h2 class="cl-white text-uppercase pb-md-5 mb-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                            </div>
                        </div>
                        <div class="row project-goals-images">
                            <?php
                            if( have_rows('list_areas') ):

                                // Loop through rows.
                                while( have_rows('list_areas') ) : the_row();

                                    // Load sub field value.
                                    $image = get_sub_field('image');
                                    $title = get_sub_field('title');
                                    $desc = get_sub_field('description');
                                    ?>
                                    <div class="col-lg-4 text-center mb-3">
                                        <figure>
                                            <img class="icon-goals fluid-img" src="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr($image['alt']) ?>" width="165" height="164">
                                        </figure>
                                        <h4 class="text-uppercase cl-white mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo strip_tags($title); ?></h4>
                                        <p class="dp-1 cl-white wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo strip_tags($desc); ?></p>
                                    </div>
                                    <?php
                                    // Do something...

                                    // End loop.
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                    </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>    
    <?php if (have_rows('modules_flexible')): ?>               
        <?php while(have_rows('modules_flexible')): the_row();
            get_template_part('template-parts/template-flexible/content', get_row_layout());
        endwhile; ?>              
     <?php endif; ?> 
     
    <?php $show_info_bottom= get_field('show_info_bottom');
    if($show_info_bottom): ?>
        <section class="bg-golden-yellow pb-5 pt-5">
            <div class="container">
                <div class="row align-items-center pt-lg-5 pb-lg-5">
                    <?php $title = get_field('title_contact_info');
                    if($title): ?>
                        <div class="col-lg-6">
                            <h3 class="cl-dark-brown mb-lg-0 mb-3 text-lg-start text-center"><?= $title;?></h3>
                        </div>
                    <?php endif; ?>
                    <?php
                    $link = get_field('cta_contact_info');
                    if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                        <div class="col-lg-6 text-lg-start text-center">
                            <a tabindex="0" class="cta-1 big-cta cl-dark-brown cl-dark-brown-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?> <i class="fas fa-arrow-right"></i></a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </section>
    <?php endif; ?>
</article><!-- /#post-<?php the_ID(); ?> -->