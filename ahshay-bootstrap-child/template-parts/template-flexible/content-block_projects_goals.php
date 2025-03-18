

<?php $headline = get_sub_field('headline');
       $section_id = get_sub_field('section_id');
        ?>
<section class="section-home section-project-goals module-project-goals pb-5" <?php if($section_id): ?>id="<?php echo $section_id; ?>" <?php endif; ?>>
    <div class="container pb-md-5">
        <?php if($headline): ?>
        <div class="row">
            <div class="col-lg-12 mb-3">
                <h2 class="cl-dark-brown pb-md-5 mb-0 text-uppercase text-lg-start text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
            </div>
        </div>
        <?php endif; ?>
        <div class="row project-goals-images">
            <?php 
            if( have_rows('goals') ):

                // Loop through rows.
                while( have_rows('goals') ) : the_row();

                    // Load sub field value.
                    $image = get_sub_field('image');
                    $title = get_sub_field('title');
                    $desc = get_sub_field('description');
                    ?>
                    <div class="col-lg-4 text-center mb-3">
                            <img class="icon-goals fluid-img" src="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr($image['alt']) ?>" width="165" height="164">
                        <h4 class="text-uppercase cl-dark-brown mb-4 mt-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo strip_tags($title); ?></h4>
                        <p class="dp-1 cl-dark-brown wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo strip_tags($desc); ?></p>
                    </div>
                    <?php
                    // Do something...

                // End loop.
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>

     