<?php
/**
* Portfolio related items
*/
$headline = get_field('title_related_projects'); 
$cta = get_field('cta_button');   
$portfolio_terms = get_the_terms(get_the_ID(), 'portfolio-type');
if ($portfolio_terms && !is_wp_error($portfolio_terms)): ?>
<section class="portfolio-related flex flex-col align-center p-t0">
    <div class="container">
    <div class="row center-xs p-b2">                    
        <div class="col-xs-12 col-lg-7">            
            <?php if ($headline) : ?>
                <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $headline; ?></h2>
            <?php endif; ?>                             
        </div>
    </div>    
    <div class="projects-row portfolio-row flex flex-row">
        <?php        
        $term_ids = wp_list_pluck($portfolio_terms, 'term_id');
            $args = array(
                'post_type' => 'portfolio',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'portfolio-type',
                        'field'    => 'term_id',
                        'terms'    => $term_ids,
                        'operator' => 'IN',
                    ),
                ),
                'post__not_in' => array(get_the_ID()), // Exclude current post
                'posts_per_page' => 3, // Change this number as required
                'orderby' => 'rand' 
            );

        $query = new WP_Query($args);  

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();  
                $post_thumbnail_id = get_post_meta( get_the_ID(), '_thumbnail_id', true );
                $srcset = wp_get_attachment_image_srcset($post_thumbnail_id);
                $sizes = wp_get_attachment_image_sizes($post_thumbnail_id, 'full');?>
                <div class="project column portfolio-block-33">
                  <div class="project-items">
                        <img src="<?php echo get_the_post_thumbnail_url($post_thumbnail_id, 'full'); ?>" alt="<?php the_title(); ?>" height="400" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>">
                        <div class="overlay"><?php the_title(); ?></div>
                  </div>
                </div>
                <?php
            }
            wp_reset_postdata();
        } else {
            echo '<p>No portfolio items found.</p>';
        }
        ?>
    </div>
    <?php if( $cta ):
        $link_url = $cta['url'];
        $link_title = $cta['title'];
        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
            <div class="row center-xs p-t2">                    
                <div class="col-xs-12 col-lg-7">   
                <div class="button-wrapper blue animate__animated" data-animation="fadeBottom" data-duration="1.75s">
                    <a tabindex="0" class="button black" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                </div>
            </div>
        </div>
    <?php endif; ?>  
    </div>
</section>
<?php endif; ?>
