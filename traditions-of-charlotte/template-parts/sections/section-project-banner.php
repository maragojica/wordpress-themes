
 <section class="section-project-banner">
 <?php echo get_the_post_thumbnail( get_the_id(), 'full', array( 'class'  => 'w-100 h-100 fit-cover-center' ) ); ?>
       <div class="overlay">
           <div class="container">
               <div class="project-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><h2 class="cl-forest-green m-t0 mb-0"><?php echo the_title(); ?></h2></div>
           </div>
       </div>            
</section>
