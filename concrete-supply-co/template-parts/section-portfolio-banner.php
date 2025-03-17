<?php
if (have_rows('banner')) {
    while (have_rows('banner')) {
        the_row(); 
        $banner_type = get_sub_field('banner_type'); 
        $bg_color = get_sub_field('bg_color'); ?>
        <section class="page-internal-hero banner-portfolio flex">           
            <div class="overlay<?php if ( $banner_type['value'] != "color") : ?> overlay-bg2 <?php endif; ?> p-y6" <?php if($bg_color): ?>style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
                <?php $headline = get_sub_field('headline');
                $subheadline = get_sub_field('subheadline');                
                $cta = get_sub_field('cta_button'); ?>
                <div class="container h-100 flex flex-column top-xs end-xs text-left">
                    <div class="row">
                       <div class="col-xs-12">
                           <div class="line"></div>
                           <?php if($headline): ?>
                                <h1 class="cl-blue text-uppercase mt-0 mb-02 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $headline; ?></h1>
                           <?php endif; ?> 
                           <?php if($subheadline): ?>
                                <h2 class="subheading cl-black text-uppercase mt-0 m-b1 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo $subheadline; ?></h2>
                           <?php endif; ?> 
                           <?php if( $cta ):
                                $link_url = $cta['url'];
                                $link_title = $cta['title'];
                                $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                               <div class="button-wrapper blue animate__animated" data-animation="fadeBottom" data-duration="2s">>
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