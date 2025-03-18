<?php $project_list = get_sub_field('our_work_project_list_project');   ?>
    <section class="section-projects projects-work ps-md-5 pe-md-5 bg-white pt-5 pb-5">
        <div class="container pt-lg-5 pb-lg-5">
            <div class="row">
                <?php foreach ( $project_list as $project ): ?>
                    <?php
                        $project_obj = $project['our_work_project_list_project_obj'];
                        $use_light_color_text = $project['use_light_text_color'];
                        $short_description = $project['our_work_project_list_project_short_description'];
                        $featured_img_url = get_the_post_thumbnail_url($project_obj->ID,'full');
                        $thumbnail_id = get_post_thumbnail_id( $project_obj->ID );
                        $permalink = get_the_permalink( $project_obj->ID );
                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                    ?>
                    <div class="col-lg-4 mb-3">
                        <div class="inner-wrap radius-6">
                            <img class="fluid-img w-100 h-100 fit-cover-center radius-6" src="<?php echo $featured_img_url; ?>" />
                            <div class="radius-6 content-wrap d-flex flex-column h-100 justify-content-between p-5 p-3 text-center <?php echo ($use_light_color_text ? 'project-content-light' : 'project-content-dark'); ?>">
                               <div class="box-title">
                                   <h4 class="text-uppercase wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo get_the_title( $project_obj->ID ); ?></h4>
                                   <div class="dp-1 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php
                                       $short_description = $short_description ? $short_description : get_the_excerpt( $project_obj->ID );
                                       $phrase = $short_description;
                                       $max_words = 10;
                                       $phrase_array = explode(' ',$phrase);
                                       if(count($phrase_array) > $max_words && $max_words > 0)
                                           $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...';
                                       echo $phrase; ?>
                                   </div>
                               </div>
                                <div class="w-100 d-flex justify-content-center align-items-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><a tabindex="0" href="<?php echo $permalink; ?>" class="cta-btn cta-btn-single w-100">Read more</a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
