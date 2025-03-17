
<section class="back-and-forth-row normal back-and-forth-bottom-mv">
    <div class="container-fluid content-back-forth">
    <div class="row middle-xs row-back-forth row-reverse-mv">
        <div class="col-xs-12 col-lg-6 ps-0 pe-0 w-100">                            
            <div class="back-and-forth-media animate__animated" data-animation="fadeLeft" data-duration="2s">
            <?php if ( has_post_thumbnail() ) {
                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                $post_thumbnail_id = get_post_meta( get_the_ID(), '_thumbnail_id', true );
                $srcset = wp_get_attachment_image_srcset($post_thumbnail_id);
                $sizes = wp_get_attachment_image_sizes($post_thumbnail_id, 'full'); ?>
                <img class="img-fluid parallax-image" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>" height="648" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>">
            <?php } ?>                
            </div>                            
        </div>
        <div class="col-xs-12 col-lg-6 col-text">       
            <?php $title_details = get_field('title_details');  
            if($title_details): ?>           
            <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $title_details; ?></h2>       
            <?php endif; ?>   
            <?php if (get_the_content()) : ?>
                <div class="description cl-black animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php the_content(); ?></div>
            <?php endif; ?>            
        </div>
        </div>
    </div>                    
</section>           
