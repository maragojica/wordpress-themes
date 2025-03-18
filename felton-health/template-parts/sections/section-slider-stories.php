<?php if (have_rows('slider_stories')):  
while (have_rows('slider_stories')): the_row(); 
    $section_id = get_sub_field('section_id');   
    $section_bg_color = get_sub_field('section_bg_color'); 
    $headline = get_sub_field('heading');  
    $padding_size = get_sub_field('padding_size'); 
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); 
    $stories_list = get_sub_field('stories_list'); // 
    if ($stories_list) : ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> <?php if($section_bg_color): ?>style="background-color: <?php echo $section_bg_color; ?>"<?php endif; ?> class="section-slider-center wow fadeIn <?php if($padding_size): echo $padding_size['value']; endif; ?> <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" data-wow-duration="0.6s" data-wow-delay="0.2s">
        <div class="container">        
            <div class="row justify-center"> 
                <div class="col-xs-12 col-lg-8 col-xl-7 col-xxl-5 text-center">                 
                    <?php if ($headline) : ?>
                        <h2 class="cl-white text-uppercase mt-0 mb-10px"><?php echo $headline; ?></h2>
                    <?php endif; ?>                         
                </div>
                         
            </div>                                                    
       </div>   
        <div class="stories-slider m-t3 owl-carousel">
            <?php $i = 1; foreach ($stories_list as $story):
                $image_front = get_the_post_thumbnail_url($story->ID, 'full'); 
                $title = get_the_title($story->ID);               
                $content = get_field('iframe', $story->ID);
            ?>
                <div class="item">
                    <a href="#modal-story-<?php echo $i; ?>" uk-toggle aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="h-100">
                        <?php if (!empty($image_front)) : ?>
                            <img class="front-image" src="<?php echo esc_url($image_front); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" />
                        <?php endif; ?>
                    </a>
                    <div class="story-details">
                        <h3 class="cl-tan text-uppercase text-center m-t1"><a href="#modal-story-<?php echo $i; ?>" uk-toggle class="cl-tan text-uppercase"><?php echo esc_html($title); ?></a></h3>  
                    </div>
                </div>
            <?php $i++; endforeach; ?>
        </div>
    </section>
    <?php $i = 1; foreach ($stories_list as $story):       
        $title = get_the_title($story->ID);        
        $content = get_field('iframe', $story->ID);
    ?>
        <div id="modal-story-<?php echo $i; ?>" class="uk-flex-top uk-modal-container modal-story" uk-modal>
            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="row">                                               
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">        
                    <h3 class="cl-sage text-uppercase text-center m-b1"><?php echo esc_html($title); ?></h3>  
                    </div>                                     
                        <?php if($content): ?>
                            <div class="box-video-iframe"><?php echo $content;?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php $i++; endforeach; ?>
    <?php endif; 
endwhile; 
endif; ?>
