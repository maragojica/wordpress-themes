<?php 
$titlesection = get_the_title();
$headline = get_field('title_section'); 
$cta = get_field('cta_button'); 
  
        $cat_args = array(
            'orderby'       => 'term_id',
            'order'         => 'ASC',
            'hide_empty'    => false,
    ); 
    $categories = get_terms('service-category', $cat_args); ?>
    <section class="section-services">
       <div class="container-fluid pt-5 pb-3">
            <div class="row">
                <div class="col-md-12 pt-3 pb-5">
                    <?php if($titlesection): ?>
                        <h1 class="title-section cl-l-blue text-center"><?php echo $titlesection;?></h1>
                     <?php endif; ?>   
                </div>
            </div>
            <?php $i=1; ?>
           <?php foreach ($categories as $category) {
            $query = array(
                'post_type' => array( 'service' ),     //All Services
                'post_status' => 'publish',
                'orderby' => 'menu_order',
                'order' => 'desc',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                            'taxonomy' => 'service-category',
                            'field' => 'slug',
                            'terms' => $category->slug
                    )
            )
            );
            $allpost = new WP_Query($query);
            if ( $allpost->have_posts() ) : ?>
            <div id="section-<?php echo $i; ?>" class="title-section-service title-<?php echo $i; ?>"><?php echo $category->name;?></div>
            <div class="content-services content-<?php echo $i; ?>">
            <?php while ($allpost->have_posts()) : $allpost->the_post();  ?>
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="box-service">
                        <div class="title-service"><?php echo the_title();?></div>
                        <div class="desc-service"><?php echo the_content();?></div>
                    </div>
                </div>
            </div>           
            <?php endwhile; ?>
           </div>
           <?php endif; wp_reset_postdata(); $i++; ?>    
            <?php } ?>
            <?php if($headline): ?>
                <div class="row justify-content-center row-headline-wondering">
                    <div class="col-lg-10"> 
                        <h2 class="cl-l-blue text-center"><?php echo $headline;?></h2>
                    </div>
                </div>
            <?php endif; ?>
        <?php if( $cta ):

        $link_url = $cta['url'];

        $link_title = $cta['title'];

        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>    
         <div class="row mb-md-5 pt-md-4 row-cta-learn-more">
                <div class="col-md-12">                       
                     <a tabindex="0" class="btn-cta center-btn" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
            </div>
         </div>
        <?php endif; ?>
       </div>
    </section>


