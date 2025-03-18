<?php
/**
 * The template for displaying content in the single.php template.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="section-main-single bg-lighter pb-5">
        <div class="container pt-md-5 pt-4">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="content-cat d-flex align-items-center cl-green">
                            <?php $i=1;
                            foreach((get_the_category()) as $category) {
                                $catename = $category->cat_name;
                                $cateslug = $category->slug;?>
                                <a href="/category/<?php echo $cateslug;?>" class="link-content-cat cl-green" aria-label="<?php echo  $catename;?>">
                               <?php if($i>1){
                                    echo  ' // '. $catename;
                                }else{echo  $catename;  } ?>
                                </a>
                               <?php $i++;
                            }
                            ?>
                    </div>
                    <h2 class="big-h2-mv cl-black mb-md-5 mb-4"><?php the_title(); ?></h2>
                    <h5 class="cl-dark mb-5"><?php the_excerpt(); ?></h5>
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <span class="date-post">
                            Updated <?php the_time('j') ?>/<?php the_time('n') ?>/<?php the_time('Y') ?>
                        </span>
                    </div>
                </div>
                <div class="col-md-12 pt-5">
                    <?php if ( has_post_thumbnail() ) {
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                        $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
                        <img class="img-fluid w-100" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
                    <?php } ?>
                </div>
                <div class="col-lg-7 pt-5">
                    <div class="dp-1 cl-black"><?php the_content();?></div>
                </div>
            </div>
            <div class="row justify-content-center pb-4 mb-md-5">
                <div class="col-lg-7">
                    <div class="back"><a href="/blog" aria-label="Back to blog"><svg class="me-2" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.25 7.75C12.6642 7.75 13 7.41422 13 7C13 6.58579 12.6642 6.25 12.25 6.25V7.75ZM1.75 6.25C1.33579 6.25 1 6.58579 1 7C1 7.41421 1.33579 7.75 1.75 7.75L1.75 6.25ZM12.25 6.25L1.75 6.25L1.75 7.75L12.25 7.75V6.25Z" fill="#89A5B4"/>
                                <path d="M4.13634 10.4467C4.42923 10.7396 4.9041 10.7396 5.197 10.4467C5.48989 10.1538 5.48989 9.67891 5.197 9.38601L4.13634 10.4467ZM1.75 6.99967L1.21967 6.46934C0.926777 6.76224 0.926777 7.23711 1.21967 7.53L1.75 6.99967ZM5.197 4.61334C5.48989 4.32044 5.48989 3.84557 5.197 3.55268C4.9041 3.25978 4.42923 3.25978 4.13634 3.55268L5.197 4.61334ZM5.197 9.38601L2.28033 6.46934L1.21967 7.53L4.13634 10.4467L5.197 9.38601ZM2.28033 7.53L5.197 4.61334L4.13634 3.55268L1.21967 6.46934L2.28033 7.53Z" fill="#89A5B4"/>
                            </svg>

                            Back to blog</a></div>
                </div>
            </div>
        </div>
    </section>
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
</article><!-- /#post-<?php the_ID(); ?> -->