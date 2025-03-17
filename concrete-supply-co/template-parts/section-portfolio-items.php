<?php
/**
* Portfolio output in pattern
*/
?>
<?php if (have_rows('our_work')):  
     while (have_rows('our_work')) :
        the_row(); 
        $headline = get_sub_field('heading');
        $subheading = get_sub_field('subheading');  
        $description = get_sub_field('description');  
        $list_work = get_sub_field('list_work');                
        $cta = get_sub_field('cta_button');   ?>
<section class="portfolio-filters flex flex-col align-center p-lg-b0">
    <div class="container">
    <div class="row center-xs p-b2">                    
        <div class="col-xs-12 col-lg-7">
            <?php if ($subheading) : ?>
                <span class="section-subtitle text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $subheading; ?></span>
            <?php endif; ?>
            <?php if ($headline) : ?>
                <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo $headline; ?></h2>
            <?php endif; ?>
            <?php if ($description) : ?>
                <div class="description cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo wp_kses_post($description); ?></div>
            <?php endif; ?>                     
        </div>
    </div>    
    <?php if( $list_work): ?>
    <div class="portfolio-row flex flex-row">
       <?php $pattern = array('40', '30', '30', '30', '30', '40', '40', '30', '30', '30', '30', '40');
             $counter = 0;   ?>
         <?php foreach( $list_work as $project ):                
            $title = get_the_title( $project->ID ); 
            $permalink = get_permalink( $project->ID );
            $class = 'portfolio-block-' . $pattern[$counter % count($pattern)];
            $post_thumbnail_id = get_post_meta( $project->ID, '_thumbnail_id', true );
            $srcset = wp_get_attachment_image_srcset($post_thumbnail_id);
            $sizes = wp_get_attachment_image_sizes($post_thumbnail_id, 'full');
            $counter++; ?>
            <div class="project column <?php echo $class; ?>">
                <div class="project-items">
                    <img src="<?php echo get_the_post_thumbnail_url($project->ID, 'full'); ?>" alt="<?php echo $title; ?>" height="350" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>">
                    <div class="overlay"><?php echo $title; ?></div>
                </div>
            </div>                                
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <?php if( $cta ):
        $link_url = $cta['url'];
        $link_title = $cta['title'];
        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
            <div class="row center-xs p-t2">                    
                <div class="col-xs-12 col-lg-7">   
                <div class="button-wrapper blue animate__animated" data-animation="fadeBottom" data-duration="2.5s">
                    <a tabindex="0" class="button black" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                </div>
            </div>
        </div>
    <?php endif; ?>  
    </div>
</section>
<?php 
     endwhile;
endif;
?>
