<?php
/**
 * Displays the content when the archive or search template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<div class="row equal mb-5 pb-lg-5">
             <?php if ( has_post_thumbnail() ) {
                 $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                 $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                 $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
                <div class="col-lg-6 mb-lg-0 mb-4">
                 <div class="w-100 h-100">
                     <a class="link-post d-block w-100 h-100" href="<?php the_permalink(); ?>">
                         <div class="card-head w-100 h-100 position-relative">
                             <img class="card-img-top img-fluid w-100 h-100 fit-cover-center" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
                             <div class="overlay overlay-post"></div>
                         </div>
                     </a>
                 </div>
                 </div>
             <?php } ?>
             <div class="col-lg">
                 <div class="card-post d-flex flex-column h-100 w-100">
                     <?php $source = get_field('source_news');
                     $id = get_the_ID();
                     $post_categories = get_post_primary_category($id, 'category');
                     $primary_category = $post_categories['primary_category'];
                     $nameprimary = $primary_category->name;
                     $category_link = get_category_link( $primary_category->term_id );?>
                     <div class="card-meta cl-ultra-violet">
                         <a class="cl-ultra-violet cl-black-h" href="<?php echo $category_link;?>"><?php echo $nameprimary;?></a><?php if( $source ): ?><span class="divide">|</span><span><?php echo $source;?></span> <?php endif; ?>
                     </div>
                     <h5 class="card-title mb-lg-5 mb-4 mr-0 ml-0 pb-lg-2 cl-stormy-sea cl-black-h"><a class="cl-black cl-black-h text-stormy-h" href="<?php the_permalink(); ?>"><span data-content="<?php the_title(); ?>"><?php the_title(); ?></span></a></h5>
                     <?php $excerpt = ''; ?>
                        <div class="copy-description cl-stormy-sea mb-lg-5 mb-4">
                            <span class="date-post d-inline text-uppercase"><?php the_time('F') ?> <?php the_time('j') ?>, <?php the_time('Y') ?></span>
                            <?php if (has_excerpt()) { echo " — ".wp_strip_all_tags( get_the_excerpt(), true ); } ?>
                        </div>
                     <a href="<?php the_permalink(); ?>" class="cta-read cl-ultra-violet cl-black-h">
                         READ MORE
                         <svg class="icon-arrow-r d-inline" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="20px" viewBox="0 0 24 24" width="30px" fill="#3825FD"><rect fill="none" height="20" width="30"/><path d="M15,5l-1.41,1.41L18.17,11H2V13h16.17l-4.59,4.59L15,19l7-7L15,5z"/></svg>
                     </a>
                     <?php $post_tags = get_the_tags();
                     if ( ! empty( $post_tags ) ) { $i = 0; ?>
                      <div class="d-flex mt-4 show-deks">
                     <?php foreach ( $post_tags as $tag ) {
                         if($i < 3){?>
                        <div class="link-border-wrap">
                            <a class="link-tags" href="<?php echo esc_attr( get_tag_link( $tag->term_id ) );?>"><?php echo $tag->name;?></a>
                        </div>
                    <?php }$i++; } ?>
                     </div>
                     <?php }?>
                 </div>
             </div>
         </div>