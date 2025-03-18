<?php
/**
 * The template for displaying content in the page-home.php template.
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php $headline = get_field('title_home');
    $image = get_field('image_banner_home');
    $imgdescr = get_field('img_deschome');
    $descr = get_field('description_home');
    $cta = get_field('cta_banner');?>
    <section class="section-banner-home bg-lighter d-flex align-items-center position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <?php if($headline): ?>
                    <h1 class="headline cl-dark"><?php echo $headline;?></h1>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php if ( !empty($image)) : ?>
            <img class="img-banner-home img-fluid h-100 hide-lg fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
    </section>
    <?php if ( !empty($imgdescr) || $descr) : ?>
        <section class="section-description pt-md-5 pb-md-5" id="section-description">
            <div class="container-fluid ps-lg-0 pt-md-5 pb-md-5">
                <div class="row align-items-center">
                    <?php if ( !empty($imgdescr)) : ?>
                        <div class="col-lg-5 pb-lg-0 pb-4">
                            <img class="img-fluid w-100 h-100 fit-cover-center" src="<?php echo esc_url($imgdescr['url']); ?>" alt="<?php echo esc_attr($imgdescr['alt']); ?>" />
                        </div>
                    <?php endif; ?>
                    <?php if($descr): ?>
                        <div class="col-lg ps-lg-5">
                            <div class="dp-1 cl-dark"><?php echo $descr;?></div>
                            <?php
                            if($cta) {
                                $link_url = $cta['url'];
                                $link_title = $cta['title'];
                                $link_target = $cta['target'] ? $cta['target'] : '_self';?>

                                <div class="box-cta-btn d-flex align-items-center pt-md-5 pt-3 pb-md-0 pb-5">
                                    <a class="cta-btn cta-btn-lg d-flex align-items-center cl-dark-green cl-dark-green-h bg-white bg-white-h border-dark-green border-dark-green-h" aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                                        <span class="cta-title"><?php echo $link_title; ?></span>
                                        <span class="cta-arrows d-flex align-items-center">
                                            <svg class="arrow-short" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_412_77)">
                                                    <path d="M2.32498 10.5H16.875" stroke="#028A8B" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M11.5167 3.83331L17.15 10.025C17.3833 10.2833 17.3833 10.7083 17.15 10.9666L11.5167 17.1583" stroke="#028A8B" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_412_77">
                                                        <rect width="20" height="20" fill="white" transform="translate(0 0.5)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                      </span>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php $query = array(
        'post_type' => 'post',     //Last 5 Post
        'post_status' => 'publish',
        'orderby' => 'post_date',
        'order' => 'desc',
        'posts_per_page' => 5
    );
    $postslist = new WP_Query($query); ?>
    <?php if ( $postslist->have_posts() ) : ?>
    <section class="section-news bg-beige pt-5 pb-5">
        <div class="container pt-md-5 pb-md-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <?php  $title_news = get_field('title_news');
                    if($title_news): ?>
                        <h2 class="cl-dark-green pb-4 mb-2"><?php echo $title_news; ?></h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="container pb-md-5">
            <div class="posts-carousel owl-carousel">
                <?php while($postslist->have_posts()) : $postslist->the_post();
                $id = get_the_ID(); $permalink = get_permalink($id);
                $publiname = get_field('publication_name'); ?>
                <div class="item animated fadeIn">
                    <div class="card card-post w-100 h-100">
                        <?php if ( has_post_thumbnail() ) {
                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                            $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
                            <a href="<?php the_permalink(); ?>" aria-label="<?php the_title();?>">
                                <div class="card-img position-relative">
                                  <img class="card-img-top w-100 h-100 fluid-img fit-cover-center" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
                                </div>
                            </a>
                        <?php } ?>
                        <div class="card-body">
                            <?php  if( !isinternal($permalink) ){ ?>
                                <?php if($publiname): ?>
                                <p class="label-1 pb-md-2 cl-dark-green text-uppercase"><?php echo $publiname;?></p>
                                <?php endif; ?>
                            <?php }else{ ?>
                                <?php if(!empty(get_the_category())){ ?>
                                    <div class="d-flex">
                                        <p class="label-1 pb-md-2 cl-dark-green text-uppercase">
                                            <?php $i=1;
                                            foreach((get_the_category()) as $category) {
                                                $catename = $category->cat_name;

                                                if($i>1){
                                                    echo  ', '. $catename;
                                                }else{echo  $catename;  }
                                                $i++;
                                            }
                                            ?></p>
                                    </div>
                                <?php }?>
                            <?php } ?>
                            <h5 class="card-title title-post cl-dark cl-dark-h pb-2 mb-0"><a href="<?php the_permalink(); ?>" class="cl-dark cl-dark-h"><?php the_title();?></a></h5>
                            <div class="d-flex align-items-start flex-column">
                                <span class="date-post pb-4"><?php the_time('F') ?> <?php the_time('j') ?>, <?php the_time('Y') ?></span>
                                    <a class="link-external" href="<?php the_permalink(); ?>" aria-label="<?php the_title();?>">
                                        <?php  if( !isinternal($permalink) ){
                                          echo "Read on ".$publiname;
                                       }else{ echo "Read more"; } ?>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php endif; wp_reset_postdata();?>

    <?php if( have_rows('list_partners') ):

        $title_partners = get_field('title_partners');
        $description_partners = get_field('description_partners');?>
        <section class="section-partners pt-5 pb-5 bg-white">
            <div class="container pt-md-5 pb-md-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <?php if($title_partners): ?>
                            <h2 class="cl-dark-green text-center pb-md-5 pb-4 mb-0 pt-md-5"><?php echo $title_partners;?></h2>
                        <?php endif; ?>
                        <?php if($description_partners): ?>
                            <div class="dp-1 cl-dark text-center pb-md-4"><?php echo $description_partners;?></div>
                        <?php endif; ?>
                    </div>
                </div>
                 <div class="partner-carousel logos-carousel owl-carousel mb-md-5">
                    <?php while( have_rows('list_partners') ): the_row();
                        $photo = get_sub_field('logo_partners');
                        $link = get_sub_field('link_partners'); ?>
                        <div class="item animated fadeIn">
                            <?php if(!empty($photo)): ?>
                            <?php  if($link) {
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                            <a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>" class="w-100 h-100"><?php } ?>
                                <img class="logo-partner fluid-img m-auto d-block" src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" />
                            <?php if($link) { ?>
                            </a>
                            <?php } ?>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                    </div>
            </div>
        </section>
    <?php endif; ?>
<?php if( have_rows('slider_news') ): ?>
<section class="section-news-events">
    <div class="news-events-carousel owl-carousel">
        <?php while( have_rows('slider_news') ): the_row();
            $type = get_sub_field('type');
            $description_news = get_sub_field('description_news');
            $image = get_sub_field('image');
            $video_source = get_sub_field('video_source');
            $poster = get_sub_field('video_poster');
            $captions = get_sub_field('captions');
            $youtube = get_sub_field('youtube_id');
            $vimeo = get_sub_field('vimeo_id');
            $local = get_sub_field('video_url');
            $videomp4 = get_sub_field('video_mp4');
            $videowebm = get_sub_field('video_webm');
            $videoogg = get_sub_field('video_ogg'); ?>
             <div class="item animated fadeIn">
                 <div class="box-media-news w-100">
                     <?php if($type['value'] == "image"){ ?>
                         <?php if ( !empty($image) ) : ?>
                             <img class="img-fluid d-block m-auto h-100 w-100 fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                         <?php endif; ?>
                     <?php }elseif($type['value'] == "video"){ ?>
                         <?php if( $video_source['value'] == "file" || $video_source['value'] == "local" ): ?>
                             <video class="player" playsinline controls <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>>
                                 <?php if($video_source['value'] == "local" && $local){ ?>
                                     <source src="<?php echo $local; ?>" type="video/mp4">
                                 <?php }else{ ?>
                                     <?php if( $videomp4 ): ?>
                                         <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                                     <?php endif; ?>
                                     <?php if( $videoogg ): ?>
                                         <source src="<?php echo $videoogg['url']; ?>" type="video/ogg">
                                     <?php endif; ?>
                                     <?php if( $videowebm ): ?>
                                         <source src="<?php echo $videowebm['url']; ?>" type="video/webm">
                                     <?php endif; ?>
                                     Your browser does not support the video tag.
                                 <?php } ?>
                                 <?php if( $captions ): ?>
                                     <!-- Captions are optional -->
                                     <track kind="captions" label="English captions" src="<?php echo $captions['url']; ?>" srclang="en" default />
                                 <?php endif; ?>
                             </video>
                         <?php endif; ?>
                         <?php if( $video_source['value'] == "youtube" ): ?>
                             <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $youtube;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>></div>
                         <?php endif; ?>
                         <?php if( $video_source['value'] == "vimeo" ): ?>
                             <div class="player" data-plyr-provider="vimeo" data-plyr-embed-id="<?php echo $vimeo;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>></div>
                         <?php endif; ?>
                     <?php } ?>
                 </div>
                 <?php if($description_news): ?>
                     <div class="box-description metadata cl-grey text-center w-100 p-md-4 p-3"><?php echo $description_news;?></div>
                 <?php endif; ?>
             </div>
        <?php endwhile; ?>
    </div>
</section>
<?php endif; ?>
    <?php if( get_field('title_bottom') || get_field('text_bottom')): ?>
        <section class="section-box-info bg-orange pt-md-5 pb-md-5">
            <div class="container">
                <div class="box-container-info bg-white">
                    <div class="row equal align-items-center">
                        <?php $title = get_field('title_bottom');
                        $text = get_field('text_bottom');
                        $cta = get_field('cta_bottom');
                        ?>
                        <div class="col-md-7 pb-md-0 pb-2">
                            <div class="w-100 h-100">
                                <?php if($title): ?>
                                    <h2 class="cl-red pb-3"><?php echo $title;?></h2>
                                <?php endif; ?>
                                <?php if($text): ?>
                                    <div class="dp-1 dp-2 cl-dark"><?php echo $text;?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                        if($cta) {
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self';?>

                            <div class="col-md">
                                <div class="box-cta-btn cta-btn-md d-flex align-items-center justify-content-md-end justify-content-start">
                                    <a class="cta-btn d-flex align-items-center cl-red cl-red-h bg-white bg-white-h border-red border-red-h" aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                                        <span class="cta-title"><?php echo $link_title; ?></span>
                                        <span class="cta-arrows d-flex align-items-center">
                                            <svg class="arrow-short" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_412_77)">
                                                    <path d="M2.32498 10.5H16.875" stroke="#EE6C4D" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M11.5167 3.83331L17.15 10.025C17.3833 10.2833 17.3833 10.7083 17.15 10.9666L11.5167 17.1583" stroke="#EE6C4D" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_412_77">
                                                        <rect width="20" height="20" fill="white" transform="translate(0 0.5)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                      </span>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</article>
<!-- #post-## -->