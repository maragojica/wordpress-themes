
<?php $heading = get_field('section_title_electric_team');  
$electric_team = get_field('electric_team');
$arrayelectric = array();
if( $electric_team ): 
     foreach( $electric_team as $team ): 
        $arrayelectric[] = $team->ID; 
     endforeach; 
 endif; ?>
    <section class="section-team p-t0">
        <div class="container">
            <div class="row middle-xs justify-center">                       
                <div class="col-xs-12 col-lg-8">
                    <?php if ($heading) : ?>
                        <h2 class="section-title text-center text-uppercase cl-black mt-0 mb-3 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $heading; ?></h2>
                    <?php endif; ?>                    
                </div>
            </div>   
            <?php   $query = array(
                    'post_type' => array( 'team-member' ),     //All Team Members
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'desc',
                    'posts_per_page' => -1,
                    'post__in' => array_values($arrayelectric)
                );
                $allpost = new WP_Query($query);
                if ( $allpost->have_posts() ) : $animation_delay = 1; ?> 
                <div class="row row-team justify-center">
                <?php while($allpost->have_posts()) : $allpost->the_post(); 
                    $title = get_the_title(); 
                    $position = get_field('job_title');  
                    $duration = $animation_delay . 's'; ?>
                    <div class="col-xs-12 col-md-6 col-lg-3 p-b2 text-center animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                        <div class="box-team">
                        <?php if ( has_post_thumbnail() ) {
                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                            $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                            $srcset = wp_get_attachment_image_srcset($thumbnail_id);
                            $sizes = wp_get_attachment_image_sizes($thumbnail_id, 'full');  ?>
                            <img class="img-fluid w-100 fit-cover-top" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>" height="290" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>">
                        <?php } ?>
                        </div>
                        <?php if($title): ?>
                            <h4 class="cl-black text-uppercase mt-1 mb-0"><?php echo $title;?></h4>
                        <?php endif; ?>    
                        <?php if($position): ?>
                            <div class="position cl-black"><?php echo $position;?></div>
                        <?php endif; ?> 
                    </div>
                    <?php $animation_delay += 0.75;endwhile; ?>
                </div>
                <?php endif;  wp_reset_postdata(); ?>                                           
        </div>    
</section>
