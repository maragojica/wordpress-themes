<?php
$persons_show_all = get_sub_field('show_all');
$persons_section_title = get_sub_field('section_title');
$persons_section_description = get_sub_field('section_description');

if ($persons_show_all):

    $args = array(
        'post_type'     =>  'board-persons',
        'post_status'   =>  'publish',
        'order'         =>  'ASC'
    );

    $persons = new WP_Query( $args );

    if ( $persons->have_posts() ) :
    ?>

    <section id="section-persons-three-columns" class="d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <?php while ($persons->have_posts()) : $persons->the_post(); ?>
                <div class="col-md-4">
                    <div class="card border-0 mb-5">
                        <img class="card-img-top" alt="<?php the_title(); ?>" src="<?php the_post_thumbnail_url(); ?>">
                        <div class="card-body">
                            <div class="card-person-info">
                                <h5 class="person-title font-adrianna cl-gray text-uppercase"><?php the_title(); ?></h5>
                                <h5 class="person-subtitle font-adrianna cl-gray-ligth text-uppercase"><?php echo get_field('subtitle'); ?></h5>
                            </div>
                            <div class="card-text cl-black font-adrianna"><?php the_content(); ?></div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php endif;
else:
    $persons_selected = get_sub_field('selected_board_persons');

    if( ! empty($persons_selected) ) :
        ?>
        <section id="section-persons-three-columns" class="d-flex align-items-center justify-content-center">
            <div class="container">
                <h3 class="text-center"><?php echo $persons_section_title; ?></h3>
                <p class="text-center"><?php echo $persons_section_description; ?></p>
                <div class="row justify-content-center">
                    <?php foreach ($persons_selected as $person): ?>
                        <div class="col-md-3 text-center">
                            <div class="card border-0 mb-5">
                                <img class="card-img-top" alt="<?php echo $person->post_title; ?>" src="<?php echo get_the_post_thumbnail_url($person->ID); ?>">
                                <div class="card-body">
                                    <div class="card-person-info">
                                        <h5 class="person-title font-adrianna cl-gray text-uppercase"><?php echo $person->post_title; ?></h5>
                                        <h5 class="person-subtitle font-adrianna cl-gray-ligth text-uppercase"><?php echo $person->subtitle; ?></h5>
                                        <ul class="social-list">
                                            <?php if ($person->website): ?>
                                            <li><a href="<?php echo $person->website; ?>" target="_blank"><i class="fa fa-globe"></i></a></li>
                                            <?php endif; ?>
                                            <?php if ($person->twitter): ?>
                                                <li><a href="<?php echo $person->twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                            <?php endif; ?>
                                            <?php if ($person->linkedin): ?>
                                                <li><a href="<?php echo $person->linkedin; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                            <?php endif; ?>
                                        </ul>
                                        <p><?php echo $person->card_description; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

<style>
    .social-list{list-style: none; text-align: center; padding: 0;}
    .social-list li{display: inline-block; margin-left: 15px;}
</style>

<?php endif; ?>