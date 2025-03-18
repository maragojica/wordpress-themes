<?php
global $post;
$post_slug = $post->post_name;
$post_type = $post->post_type;

$blogs_design = get_sub_field('design');
$blogs_title = get_sub_field('title');
$blogs_content = get_sub_field('content');
$blogs_button_text = get_sub_field('button_text');
$blogs_button_link = get_sub_field('button_link');
$blogs_button_position = get_sub_field('button_position');
$blogs_show_lastest = get_sub_field('show_lastest');
$blogs_show_excerpt = get_sub_field('show_excerpt');
$blogs_category = get_sub_field('select_category');
$blogs_post_per_page = get_sub_field('post_per_page');
$clave = 1;
if(!empty($blogs_category)) {
    $clave = array_search(10, $blogs_category); //Check if select Press Release/*if($clave){print_r($clave);exit;}*/
}
?>
<section id="section-blog-three-columns" class="blog-page-sections <?php echo $post_slug.' '.'type-'.$post_type; ?> d-flex align-items-center justify-content-center position-relative wow fadeIn" data-wow-delay="0.2s">
	<div class="container">
        <?php if ($blogs_button_position == 'Top'): ?>
		<div class="row align-items-center justify-content-between">
			<div class="<?php echo $blogs_button_text != '' ? 'col-md-7' : 'col-md-12' ?>">
				<h2 class="title-section cl-gray font-adrianna pb-2"><?php echo wp_kses_post( $blogs_title ); ?></h2>
				<div class="copy-text font-adrianna cl-black">
					<?php echo wp_kses_post( $blogs_content ); ?>
				</div>
			</div>
			<?php if ($blogs_button_text != '') : ?>
			<div class="col-md-5 pb-4 pb-md-0 <?php if ($post_slug == 'home'): ?>d-none d-md-block <?php endif; ?>">
				<a href="<?php echo wp_kses_post( $blogs_button_link ); ?>" class="btn btn-orange text-uppercase"><?php echo wp_kses_post( $blogs_button_text ); ?></a>
			</div>
			<?php endif; ?>
		</div>
        <?php endif; ?>

        <?php if ( $blogs_show_lastest ) : ?>
            <?php
            if($clave){
                $args = array(
                    'posts_per_page'    =>  $blogs_post_per_page,
                    'category__in' => $blogs_category,
                    'category__not_in' => array(10)
                );
            }else{
                $args = array(
                    'posts_per_page'    =>  $blogs_post_per_page,
                    'cat'     =>  $blogs_category
                );
            }
            $blogs = new WP_Query( $args );
            if( $blogs->have_posts() ) : ?>
		    <div class="row justify-content-start">
                <?php if ($blogs_button_position == 'Bottom'): ?>
                    <div class="col-md-12">
                        <h2 class="title-blog font-adrianna cl-gray text-uppercase text-center pb-5"><?php echo $blogs_title; ?></h2>
                    </div>
                <?php endif; ?>
			    <?php while( $blogs->have_posts() ) : $blogs->the_post(); ?>
                    <?php if ($blogs_design == 'list') : ?>
                        <div class="col-md-12 wow fadeIn" data-wow-delay="0.2s">
                            <div class="pb-4 pt-4 pr-4 pl-4 card mb-4">
                                <h3 class="sub-title-section-side font-adrianna pb-4 mb-0 text-uppercase"><a class="cl-gray cl-orange-hover" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	                            <?php if ($blogs_show_excerpt): ?>
                                    <div class="copy-text font-adrianna cl-gray-ligth mb-3 mt-0">
			                           <p><?php echo wp_trim_words( get_the_excerpt(), 20, ' [...]' ); ; ?></p>
                                    </div>
	                            <?php endif; ?>
                                <a href="<?php the_permalink(); ?>" class="read-more cl-orange-hover"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="col-md-4">
                            <div class="card">
	                            <?php
	                            $the_post_thumbnail_url = get_the_post_thumbnail_url();
	                            ?>
                                <?php if (!empty($the_post_thumbnail_url)): ?>
                                    <img class="card-img-top" alt="<?php the_title(); ?>" src="<?php echo $the_post_thumbnail_url; ?>">
                                <?php else: ?>
                                    <img class="card-img-top" alt="<?php the_title(); ?>" src="<?php bloginfo('template_url'); ?>/assets/img/thumbnail-default.jpg">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title font-adrianna cl-blue"><?php echo esc_attr( get_the_date( 'F j' ) ); ?></h5>
                                    <p class="card-text cl-black font-adrianna"><?php the_title(); ?></p>
                                    <?php if ($blogs_show_excerpt): ?>
                                        <p class="card-subtext cl-gray-ligth font-adrianna">
                                            <?php echo wp_trim_words( get_the_excerpt(), 20, ' [...]' ); ; ?>
                                        </p>
                                    <?php endif; ?>
                                    <a href="<?php the_permalink(); ?>" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
			    <?php
			    endwhile;
			    wp_reset_postdata();
			    ?>
		    </div>
            <?php endif; ?>
        <?php
        else :
            $posts_selected = get_sub_field('select_posts');
            if( ! empty($posts_selected) ) :
            ?>
                <div class="row justify-content-start">
	                <?php foreach ($posts_selected as $post) : ?>
	                <?php if ($blogs_design == 'list') : ?>
                        <div class="col-md-12">
                            <div class="">
                                <p class="card-title font-adrianna cl-blue mb-3"><a href="<?php echo get_the_permalink( $post->ID ); ?>"><?php echo $post->post_title ?></a></p>
                                <?php if ($blogs_show_excerpt): ?>
                                    <p class="card-text cl-black font-adrianna mb-3">
                                        <?php echo wp_trim_words( get_the_excerpt( $post->ID ), 20, ' [...]' ); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
	                <?php else : ?>
                        <div class="col-md-4">
                            <div class="card">
                            <?php $the_post_thumbnail_url = get_the_post_thumbnail_url( $post->ID ); ?>
                            <?php if ( ! empty($the_post_thumbnail_url) ) { ?>
                                <img class="card-img-top" alt="<?php echo $post->post_title ?>" src="<?php echo $the_post_thumbnail_url; ?>" />
	                        <?php } else { ?>
                                <img class="card-img-top" alt="<?php the_title( $post->ID ); ?>" src="<?php bloginfo('template_url'); ?>/assets/img/thumbnail-default.jpg">
                            <?php } ?>
                                <div class="card-body">
                                    <h5 class="card-title font-adrianna cl-blue"><?php echo esc_attr( get_the_date( 'F j' ), $post->ID ); ?></h5>
                                    <p class="card-text cl-black font-adrianna"><?php echo $post->post_title ?></p>
	                                <?php if ($blogs_show_excerpt): ?>
                                        <p class="card-subtext cl-gray-ligth font-adrianna">
			                                <?php echo wp_trim_words( get_the_excerpt( $post->ID ), 20, ' [...]' ); ?>
                                        </p>
	                                <?php endif; ?>
                                    <a href="<?php echo get_the_permalink( $post->ID ); ?>" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                                </div>
                            </div>
                        </div>
		            <?php endif; ?>
	                <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php if ($blogs_button_position == 'Bottom'): ?>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12 text-center">
                    <a href="<?php echo $blogs_button_link; ?>" class="btn btn-orange text-uppercase float-none"><?php echo $blogs_button_text; ?></a>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($post_slug == 'home'): ?>
            <div class="row">
                <div class="col-12">
                    <a href="<?php echo $blogs_button_link; ?>" class="btn btn-orange text-uppercase d-lg-none"><?php echo $blogs_button_text; ?></a>
                </div>
            </div>
        <?php endif; ?>
	</div>
</section>