<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Virginia_Interfaith
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php  // Get ACF fields
                    $news_title = get_the_title();
                    if (has_post_thumbnail()) {
                        $featured_image = [
                            'url' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                            'alt' => get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)
                        ];
                    } else {
                        $featured_image = null;
                    }
                    if (has_excerpt()) {
                        $short_description = get_the_excerpt();
                    } else {
                        $short_description = '';
                    }

                 ?>
                
                <div class="event-card news-card  news-item ">
                            <?php if ($featured_image && !empty($featured_image['url'])) : ?>
                                <div class="event-image relative overflow-visible">
                                    <a class="block w-full h-full" href="<?php echo esc_url(get_permalink()); ?>" aria-label="<?php echo esc_html($news_title); ?>" title="<?php echo esc_html($news_title); ?>" tabindex="0">
                                        <img src="<?php echo esc_url($featured_image['url']); ?>" 
                                            alt="<?php echo esc_attr($featured_image['alt']); ?>">
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="event-content group">
                                <?php
                        $display_date = strtoupper( get_the_date( 'F j, Y' ) );

                        // get first term from news-type taxonomy for this post
                        $terms = get_the_terms( get_the_ID(), 'news-type' );
                        $term_label = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : '';
                        ?>
                        <div class="eyebrow text-secondary mb-[20px]">
                            <?php if ( $display_date ) : ?>
                                <?php echo esc_html( $display_date ); ?>
                            <?php endif; ?>

                            <?php if ( $display_date && $term_label ) : ?>  |  <?php endif; ?>

                            <?php if ( $term_label ) : ?>
                                <?php echo esc_html( $term_label ); ?>
                            <?php endif; ?>
                        </div>
                        
                       
                        <h4 class="event-title mt-[10px] text-foreground">
                            <a class="group-hover:text-primary"  href="<?php echo esc_url(get_permalink()); ?>" aria-label="<?php echo esc_html(get_the_title()); ?>" title="<?php echo esc_html(get_the_title()); ?>" tabindex="0">
                                <?php echo esc_html(get_the_title()); ?>
                            </a>
                    </h4>
                        
                        <?php if ($short_description != '') : ?>
                            <div class="event-description text-foreground mt-[10px]">
                                <?php echo esc_html($short_description); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

</article><!-- #post-${ID} -->
