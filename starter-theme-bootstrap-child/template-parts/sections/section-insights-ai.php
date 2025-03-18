<?php 
$titlesection = get_field('title_insights'); 
$insights = get_field('insights');?>
    <?php if( $insights ): ?>
    <section class="section-insights">
       <div class="container">
            <div class="row">
                <div class="col-md-12 pt-lg-5 pb-lg-5">
                    <?php if($titlesection): ?>
                        <div class="title-section-service cl-orange text-center"><?php echo $titlesection;?></div>
                     <?php endif; ?>   
                </div>
            </div>
            <?php $query = array(
                    'post_type' => array( 'post' ),     //All Post
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'desc',
                    'posts_per_page' => 3                 
                ); 
                $allpost = new WP_Query($query); 
                if ( $allpost->have_posts() ) {  ?>
            <div class="row ">
            <?php while($allpost->have_posts()) : $allpost->the_post(); ?>       
                <a class="col-lg-4 mb-4" href="<?php the_permalink(); ?>">  
                 <?php
                 $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                 $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                 $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>
                    <div class="wrap-box-post">
                      <?php if ( has_post_thumbnail() ) { ?>
                      <div class="box-post"><img class="img-post img-fluid w-100 fit-cover-center" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>" width="415" height="295"/>
                      </div>
                      <?php } ?>
                      <div class="title-post cl-white text-center"><?php echo the_title();?></div>
                      <div class="desc-post cl-white text-center"><?php echo get_the_excerpt();?></div>                    
                    </div> 
                </a>     
                <?php endwhile; ?>
            </div>
            <?php  wp_reset_postdata(); 
                } else {
                    echo '<p>No posts found.</p>';
                }?> 
       </div>
    </section>
<?php endif;  wp_reset_postdata(); ?>    

