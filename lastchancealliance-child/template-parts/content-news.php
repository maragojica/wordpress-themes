<?php
/**
 * Displays the content when the news template is used.
 * * @package WordPress
 * @subpackage Twenty_Twenty * @since 1.0.0 */
?>
<section class="banner-inner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <?php if (get_field('title_headlines_inner')): ?>
                    <h3 class="headline-section cl-dark"><?php echo the_field('title_headlines_inner'); ?></h3>
                <?php endif; ?>
                <?php if (get_field('text_headlines_inner')): ?>
                    <div class="copy-text cl-dark mb-5 pb-2 pb-md-5">
                        <?php echo the_field('text_headlines_inner'); ?>
                    </div>
                <?php endif; ?>
                <?php $cta = get_field('cta_link_headlines_inner');
                if ($cta) {
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                    <div>
                        <a class="cta-link cl-dark-green cl-dark-greenh mt-2" href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"><?php echo htmlspecialchars_decode($link_title); ?> &rarr;                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<section class="info-inner-page">
    <div class="container wrap-news">
        <div class="row align-items-center wrap-filter mb-4">
            <?php $site_url = get_site_url(); ?>
            <div class="col-md-4 mb-5 mb-md-0">
                <span class="mr-2 filterby">FILTER BY </span>
                <select name="cat-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
                    <!--<option value="">Category  </option>-->
                    <?php
                   /* $option = '<option value="' . $site_url . '/news/">All</option>'; // change category to your custom page slug
                    $categories = get_categories();
                    foreach ($categories as $category) {
                     $selected = ($_GET['cat'] == $category->slug)?'selected':'';
                     $option .= '<option '.$selected.' value="'.$site_url.'/news/?cat='.$category->slug.'">';
                     $option .= $category->cat_name;
                    $option .= '</option>';
                    }*/
                     ?>
                    <!--<option value="">Tag  </option>-->
                    <?php
                    $option = '<option value="' . $site_url . '/news/">All</option>';
                    $tag_names = array();
                    $tags = get_tags();
                    foreach ($tags as $tag) {
                        $selected = ($_GET['tag'] == $tag->slug)?'selected':'';
                        $option .= '<option '.$selected.' value="'.$site_url.'/news/?tag='.$tag->slug.'">';
                        $option .= $tag->name;
                        $option .= '</option>';
                    }
                    echo $option; ?>

                </select>
            </div>
            <div class="col-md"><span class="mr-2">SORT BY: </span>
                <span>
                    <?php
                    $categories = get_categories();
                    foreach ($categories as $category) {
                        $cat_names[] = '<a href="' . $site_url . '/news/?cat=' . $category->slug . '">' . $category->cat_name . '</a>';
                    }
                    echo implode(' <span>/</span> ', $cat_names); ?>
                    <!--<a href="<?php echo $site_url . '/news/?tag=press-release-tag';?>">Press Release</a>
                    <span>/</span>
                    <a href="<?php echo $site_url . '/news/?tag=in-the-news-tag';?>">In The News</a>-->
                </span>
            </div>
        </div>
        <div  class="loadmoreitems">
            <?php $arg = array("post_type" => "post", 'order' => 'DESC', 'orderby' => 'date', 'category_name' => $_GET['cat'], 'tag_slug__in' => $_GET['tag'],);
            $wp_post = new WP_Query($arg);
            while ($wp_post->have_posts()): $wp_post->the_post();
                $id = get_the_ID();
                $post_categories = get_post_primary_category($id, 'category');
                $primary_category = $post_categories['primary_category'];
                $nameprimary = $primary_category->name;
                $excerpt = get_field('excerpt_inthenews');
                $externalink = get_field('external_link_inthenews');
                if ($externalink) {
                    $link_url = $externalink['url'];
                    $link_title = $externalink['title'];
                    $link_target = $externalink['target'] ? $externalink['target'] : '_self'; ?><?php } ?>
                <div class="row-news-items">
                    <div class="row">
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="col-md-5">
                                <?php if ($nameprimary == "In the News") { ?>
                                    <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                                        <img  src="<?php echo get_the_post_thumbnail_url(); ?>"></a>
                                <?php } else { ?>
                                    <a href="<?php the_permalink(); ?>"> <img src="<?php echo get_the_post_thumbnail_url(); ?>"></a>
                                <?php } ?>
                            </div>           <?php } ?>
                        <div class="col-md pt-4">
                            <div class="inner-news">
                                <div>
                                    <div class="category"><?php echo get_the_category_list(", "); ?><?php if (get_field('source_inthenews')): ?> <span class="divide">|</span> <?php the_field('source_inthenews'); endif; ?></div>
                                    <?php if ($nameprimary == "In the News") { ?>
                                        <h3><a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"><?php the_title(); ?></a>
                                        </h3>
                                    <?php } else { ?>
                                        <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> </h3>
                                    <?php } ?>
                                    <div  class="mb-5">
                                        <?php if ($nameprimary == "In the News") { ?>
                                            <strong class="date"><?php the_date(); ?></strong> &ndash;
                                            <?php if ($excerpt) {
                                                echo strip_tags($excerpt);
                                            } ?>
                                            <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"   class="read-more"><?php echo $link_title; ?> &rarr;</a>
                                        <?php } else { ?>
                                            <strong class="date"><?php the_date(); ?></strong> &ndash; <?php echo strip_tags(get_the_excerpt()); ?>
                                            <a href="<?php the_permalink(); ?>" class="read-more">READ MORE &rarr;</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php $tags = wp_get_post_tags($post->ID);
                                if (count($tags) > 0): ?>
                                    <div>
                                        <div class="tags d-inline"><strong>TAGS: </strong>
                                            <?php $buffer_tags = array();
                                            foreach ($tags as $tag) {
                                                $buffer_tags[] = $tag->name;
                                            }
                                            echo implode(', ', $buffer_tags); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="line-separator w-100"></div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

