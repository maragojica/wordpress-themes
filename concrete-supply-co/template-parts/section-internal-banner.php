<?php
if (have_rows('internal_banner')) {
    while (have_rows('internal_banner')) {
        the_row(); 
        $banner_type = get_sub_field('banner_type'); ?>
        <section class="page-internal-hero flex">
            <?php if($banner_type['value'] == "image"){ $banner_image = get_sub_field('banner_image'); ?>
                <?php if ( !empty($banner_image)) : 
                    $srcset = wp_get_attachment_image_srcset($banner_image['ID']);
                    $sizes = wp_get_attachment_image_sizes($banner_image['ID'], 'full'); ?>                
                    <img class="fit-cover-center w-100 h-100" src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo esc_attr($banner_image['alt']); ?>" height="792" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                <?php endif; ?>  
            <?php }elseif($banner_type['value'] == "video"){ 
                $videomp4 = get_sub_field('banner_video'); ?> 
                <video id="background-video" autoplay loop muted playsinline style="pointer-events: none;">
                    <?php if($videomp4): ?>
                    <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                    <?php endif; ?>
                </video>                     
            <?php } ?>
            <div class="overlay overlay-bg2 p-y6">
                <?php $headline = get_sub_field('headline');
                $subheadline = get_sub_field('subheadline');                
                $cta = get_sub_field('cta_button'); ?>
                <div class="container h-100 flex flex-column top-xs end-xs text-left">
                    <div class="row">
                       <div class="col-xs-12 col-lg-6 col-xl-7">
                           <div class="line"></div>
                           <?php if($headline): ?>
                                <h1 class="cl-white text-uppercase mt-0 mb-02 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $headline; ?></h1>
                           <?php endif; ?> 
                           <?php if($subheadline): ?>
                                <h2 class="subheading cl-white text-uppercase mt-0 m-b1 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo $subheadline; ?></h2>
                           <?php endif; ?> 
                           <?php if( $cta ):
                                $link_url = $cta['url'];
                                $link_title = $cta['title'];
                                $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                               <div class="button-wrapper blue animate__animated" data-animation="fadeBottom" data-duration="2s">
                                    <a tabindex="0" class="button black" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                                </div>
                            <?php endif; ?>
                       </div>  
                    </div>        
                </div>                    
            <div>
        </section>           
<?php }
} ?>