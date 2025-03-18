
<?php
    $id_section_team = get_sub_field('id_section_team');
    $query = array(
        'post_type' => array( 'team' ),     //All Team Members
        'post_status' => 'publish',
        'orderby' => 'post_date',
        'order' => 'desc',
        'posts_per_page' => -1
    );
    $allpost = new WP_Query($query);
    if ( $allpost->have_posts() ) : ?>
     <section class="section-team pt-5 pb-md-5" <?php if($id_section_team):?>id="<?= $id_section_team; ?>" <?php endif; ?>>
         <div class="container pt-lg-5 pb-lg-5">
             <?php $title_section_team = get_sub_field('title_section_team');   $sutitle_section_team = get_sub_field('subtitle_section_team');  ?>
                 <div class="row">
                     <div class="col-md-12">
                     <?php if($title_section_team): ?>
                        <h2 class="cl-dark-brown text-uppercase link-text mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title_section_team; ?></h2>
                        <?php endif; ?>    
                        <?php if($sutitle_section_team): ?>
                         <h3 class="cl-dark-brown pb-lg-5 pb-3 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $sutitle_section_team;?></h3>
                         <?php endif; ?>
                     </div>
                 </div>
           
             <div class="row equal">
                 <?php while($allpost->have_posts()) : $allpost->the_post(); $position = get_field('position'); $pronouns = get_field('pronouns');?>
                     <div class="col-md-6 col-lg-4 pb-4 mb-md-2">
                         <div class="w-100 h-100 box-team-member">
                             <?php if ( has_post_thumbnail() ) {
                                 $featured_img_url = get_the_post_thumbnail_url($id,'full');
                                 $thumbnail_id = get_post_thumbnail_id( $id );
                                 $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
                                 <div  class="link-img-team">
                                     <a tabindex="0" href="<?php the_permalink(); ?>" aria-label="<?php the_title();?>" class="w-100 h-100" tabindex="0">
                                         <img class="img-team img-fluid m-auto h-100 w-100 d-block fit-cover-center" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
                                     </a>
                                 </div>
                             <?php } ?>
                             <h4 class="team-name mb-lg-2 mb-0 mt-3 cl-slate text-uppercase wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><a tabindex="0" class="cl-slate cl-slate-h" href="<?php the_permalink(); ?>" aria-label="<?php the_title();?>"><?php the_title();?></a></h4>
                             <?php if($pronouns): ?>
                                 <div class="pronouns dp-1 cl-slate wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><?php echo $pronouns; ?></div>
                             <?php endif; ?>
                             <?php if($position): ?>
                                 <div class="dp-1 cl-slate-lt wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.5s"><?php echo $position; ?></div>
                             <?php endif; ?>
                         </div>
                     </div>
                 <?php endwhile; ?>
             </div>
         </div>
     </section>
    <?php endif; wp_reset_postdata(); ?>